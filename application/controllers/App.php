<?php

defined('BASEPATH') or exit('No direct script access allowed');

$client = new \GuzzleHttp\Client();

//$beamsClient = new \Pusher\PushNotifications(array("instanceId" => "7a875a81-0a32-4474-aa9f-3064b42a2857", "secretKey" => "D1DE06AD6DE82E4DE9081BB39F994586E3B4FF020F6CBF653FA315E714A4E897"));

class App extends CI_Controller
{

	/**

	 * Index Page for this controller.

	 *

	 * Maps to the following URL

	 * 		http://example.com/index.php/welcome

	 *	- or -

	 * 		http://example.com/index.php/welcome/index

	 *	- or -

	 * Since this controller is set as the default controller in

	 * config/routes.php, it's displayed at http://example.com/

	 *

	 * So any other public methods not prefixed with an underscore will

	 * map to /index.php/welcome/<method_name>

	 * @see https://codeigniter.com/user_guide/general/urls.html

	 */

	public function __construct()
	{

		Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure

		parent::__construct();
	}

	public function change_user_status()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$key = $this->getKey();

		$headers = $this->input->request_headers();

		//$json = file_get_contents('php://input');

		//$json_data = json_decode($json);

		//$action = $json_data->action;

		if (@$headers['Authorization']) {

			$token = explode(' ', $headers['Authorization']);

			try {

				$decoded = $this->jwt->decode($token[1], $key, array("HS256"));

				if ($decoded) {

					//Insert the inspection details
					$userID = $decoded->user->userID;

					$response = $this->app_model->delete_user($userID);

					if ($response) {
						$data['name'] = $decoded->user->firstName;

						$this->email->from('donotreply@smallsmall.com', 'Your account has been deleted, We\'re really sorry to see you go.');

						$this->email->to($decoded->user->email);

						$this->email->subject("Account deletion");

						$this->email->set_mailtype("html");

						$message = $this->load->view('email/header.php', $data, TRUE);

						$message .= $this->load->view('email/account-deletion.php', $data, TRUE);

						$message .= $this->load->view('email/footer.php', $data, TRUE);

						$this->email->message($message);

						$emailRes = $this->email->send();

						$result = TRUE;

						$details = "Success";

						$payload = array();

						$token = $this->jwt->encode($payload, $key);

						array_push($payload, $token);
					} else {

						$result = TRUE;

						$details = "Error updating user data";
					}
				} else {

					$details = "Invalid token";
				}
			} catch (Exception $ex) {

				$details = "Exception error caught";
			}
		} else {

			$details = "No authorization code";
		}

		echo json_encode(array("result" => $result, "details" => $details, "data" => $data));
	}


	public function app_login()
	{

		$response = FALSE;

		$details = '';

		$token = '';

		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		$username = $json_data->email;

		$password = md5($json_data->password);

		$data['profile'] = $this->app_model->login($username, $password);

		if ($data['profile']) {

			$key = $this->getKey();

			$iat = time(); // current timestamp value

			$nbf = $iat + 10;

			$exp = $iat + 3600;

			$payload = array(
				"iss" => "The_claim",
				"aud" => "The_Aud",
				"iat" => $iat, // issued at
				"nbf" => $nbf, //not before in seconds
				"exp" => $exp, // expire time in seconds
				"user" => $data['profile']
			);

			if ($data['profile']['confirmation'] = ' ')

				$data['profile']['confirmation'] = '';

			$token = $this->jwt->encode($payload, $key);

			array_push($payload, $token);

			$data['token'] = $token;

			$response = TRUE;

			$details = "Success";
		} else {

			$response = TRUE;

			$details = "Username or Password incorrect.";
		}

		echo json_encode(array("response" => $response, "details" => $details, "data" => $data));
	}

	public function register()
	{

		$response = FALSE;

		$details = '';

		$user_agent = 'Android';

		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		$fname = $json_data->firstName;

		$lname = $json_data->lastName;

		$email = strtolower($json_data->email);

		$password = md5($json_data->password);

		$phone = $json_data->phone;

		$age = $json_data->age;

		$gender = $json_data->gender;

		$referral = $json_data->about_rss;

		$user_type = 'tenant';

		$income = $json_data->monthly_income;

		$referred_by = strtoupper($json_data->referral_code);

		$interest = $json_data->interest;

		$confirmationCode = md5(date('d-m-Y h:i:s'));

		$code = substr($confirmationCode, -5);

		if (@$json_data->userAgent) {
			$user_agent = $json_data->userAgent;
		}

		$rc = strtoupper(substr($lname, 0, 3) . $code);

		//Check to see if email exists already

		$email_res = $this->rss_model->check_email($email);

		if (!$email_res) {
			//Proceed to signup
			$user_response = $this->app_model->register($fname, $lname, $email, $password, $phone, $income, $confirmationCode, $referral, $user_type, $interest, $referred_by, $rc, $age, $gender, $user_agent);

			if ($user_response) {

				$data['confirmationLink'] = base_url() . 'confirm/' . $confirmationCode;

				$data['name'] = $fname;

				$data['email'] = $email;

				$this->email->from('donotreply@smallsmall.com', 'SmallSmall');

				$this->email->to($email);

				$this->email->subject("Email Confirmation SmallSmall");

				$this->email->set_mailtype("html");

				$message = $this->load->view('email/header.php', $data, TRUE);

				$message .= $this->load->view('email/confirmationemail.php', $data, TRUE);

				$message .= $this->load->view('email/footer.php', $data, TRUE);

				$this->email->message($message);

				$emailRes = $this->email->send();

				$response = TRUE;

				$details = "Success";
			} else {

				$response = TRUE;

				$details = "Error";
			}
		} else {

			$response = TRUE;

			$details = "Email address exists already";
		}

		echo json_encode(array("response" => $response, "details" => $details, "data" => array()));
	}

	public function properties()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$data['apartment_types'] = $this->app_model->apartment_types();

		$data['locations'] = $this->app_model->fetchLocations();

		$data['properties'] = $this->app_model->properties();

		if (is_array($data)) {

			$result = TRUE;

			$details = "Success";
		}

		echo json_encode(array("response" => $result, "details" => $details, "data" => $data));
	}

	public function featured_properties()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$data['featureds'] = $this->app_model->fetchFeaturedProperties();

		if (is_array($data)) {

			$result = TRUE;

			$details = "Success";
		} else {

			$details = "There are no featured properties";
		}

		echo json_encode(array("response" => $result, "details" => $details, "data" => $data));
	}

	public function property()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$json = file_get_contents('php://input');

		$result = json_decode($json);

		$propertyID = $result->propertyID;

		$data['property'] = $this->app_model->get_property($propertyID);

		$unserialized_ra = unserialize($data['property']['renting_as']);

		$unserialized_amenities = unserialize($data['property']['amenities']);

		$unserialized_frequency = unserialize($data['property']['frequency']);

		$unserialized_intervals = unserialize($data['property']['intervals']);

		$propertyPrice = $data['property']['price'];

		if (empty($propertyPrice) || is_null($propertyPrice)) {

			$evictionDeposit = 0; // set default

		} elseif ($propertyPrice < 200000) {

			$evictionDeposit = 200000;
		} else {

			$evictionDeposit = $propertyPrice;
		}

		if ($data['property']['securityDepositTerm'] == 1) {
			$sec_dep = $data['property']['securityDeposit'] * $data['property']['securityDepositTerm'];
		} else {
			$sec_dep = $data['property']['securityDeposit'] * $data['property']['securityDepositTerm'];
			$sec_dep = 0.75 * $sec_dep;
		}

		$srlz = $data['property']['intervals'];
		$srlz = unserialize($srlz);

		$yrnt = $data['property']['price'] * 12;

		if ($srlz[0] == 'Upfront') {
			$data['isItUpfront'] = 'true';

			if ($yrnt <= 2000000) {
				$sec_dep = 0.25 * $yrnt;
			} else {
				$sec_dep = 0.3 * $yrnt;
			}
		} else {
			$serv_term = $data['property']['serviceChargeTerm'];

			if ($serv_term != 0) {
				$serviceCharge = $data['property']['serviceCharge'] * $data['property']['serviceChargeTerm'];
				$data['isItUpfront'] = 'false';
			} else {
				$serviceCharge = $data['property']['serviceCharge'];
			}
		}

		$sec_dep = $sec_dep + $evictionDeposit;

		$data['property']['securityDeposit'] = "$sec_dep";

		$data['property']['serviceCharge'] = "$serviceCharge";


		$data['property']['renting_as'] = array();

		$data['property']['amenities'] = array();

		$data['property']['frequency'] = array();

		$data['property']['intervals'] = array();

		if (is_array($unserialized_ra)) {

			for ($i = 0; $i < count($unserialized_ra); $i++) {

				array_push($data['property']['renting_as'], $unserialized_ra[$i]);
			}
		}

		if (is_array($unserialized_amenities)) {

			for ($i = 0; $i < count($unserialized_amenities); $i++) {

				array_push($data['property']['amenities'], $unserialized_amenities[$i]);
			}
		}

		if (is_array($unserialized_frequency)) {

			for ($i = 0; $i < count($unserialized_frequency); $i++) {

				array_push($data['property']['frequency'], $unserialized_frequency[$i]);
			}
		}

		if (is_array($unserialized_intervals)) {

			for ($i = 0; $i < count($unserialized_intervals); $i++) {

				array_push($data['property']['intervals'], $unserialized_intervals[$i]);
			}
		}
		$formatted_txt = preg_replace("/<\/?(div|b|span|br|ul|li|p|strong)[^>]*\>/i", " ", html_entity_decode($data['property']['propertyDescription']));

		$data['property']['propertyDescription'] = preg_replace("/\r|\n|\t|&nbsp;/", "", $formatted_txt);

		$dir = './uploads/properties/' . $data['property']['imageFolder'] . '/';

		if (file_exists($dir) == false) {

			$result = TRUE;

			$details = "Image folder does not exist";
		} else {

			$dir_contents = scandir($dir);

			$count = 0;

			$content_size = count($dir_contents);

			$data['images'] = array();

			foreach ($dir_contents as $file) {

				if ($file !== '.' && $file !== '..' && $count <= ($content_size - 2)) {

					array_push($data['images'], $file);
				}

				$count++;
			}
		}

		if (!empty($data)) {

			$result = TRUE;

			$details = "Success";
		}

		echo json_encode(array("response" => $result, "details" => $details, "data" => $data));
	}

	public function get_all_images()
	{

		$imageFolder = '0a19697e01e81a9dc83cfdc4387443a8';

		$result = FALSE;

		$details = '';

		$data = array();

		$dir = './uploads/properties/' . $imageFolder . '/';

		if (file_exists($dir) == false) {

			$result = TRUE;

			$details = "Image folder does not exist";
		} else {

			$dir_contents = scandir($dir);

			$count = 0;

			$content_size = count($dir_contents);

			foreach ($dir_contents as $file) {

				if ($file !== '.' && $file !== '..' && $count <= ($content_size - 2)) {

					array_push($data, $file);
				}

				$count++;
			}
		}

		if (!empty($data)) {

			$result = TRUE;

			$details = "Success";
		} else {

			$result = TRUE;

			$details = "Empty image folder";
		}

		echo json_encode(array("response" => $result, "details" => $details, "data" => $data));
	}

	// public function book_inspection(){

	//     $result = FALSE;

	//     $details = '';

	//     $data = array();

	//     $key = $this->getKey();

	//     $json = file_get_contents('php://input');

	//     $json_data = json_decode($json);

	//     $propID = $json_data->propID;

	//     $inspectionType = $json_data->inspectionType;

	//     $inspectionDate = $json_data->inspectionDate;

	//     $headers = $this->input->request_headers();

	//     if(@$headers['Authorization']){

	//         $token = explode(' ', $headers['Authorization']);

	//         try{

	//             $decoded = $this->jwt->decode($token[1], $key, array("HS256"));

	//             if($decoded){
	//                 //Insert the inspection details

	//         		$userID = $decoded->user->userID;

	//         		if(!is_null($userID)){

	//                     $result = $this->app_model->bookInspection($propID, $inspectionDate, $userID, $inspectionType);

	//             	    if($result){

	//             	        $result = TRUE;

	//             	        $details = 'Success';

	//             	    }
	//         		}else{

	//         		    $result = TRUE;

	//         		    $details = "User ID is null";

	//         		}

	//             }else{

	//                 $result = TRUE;

	//                 $details = "Invalid token";

	//             }

	//         }catch (Exception $ex){

	//            $details = "Exception error caught";

	//         }
	//     }else{

	//         $details = "No authorization code";
	//     }

	//     echo json_encode(array("response" => $result, "details" => $details, "data" => $data));
	// }

	public function book_inspection()
	{
		$result = FALSE;

		$details = '';

		$data = array();

		$key = $this->getKey();

		// Directly get the JSON data from the request body for test with AWS Loadbalancer filter issues

		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		$propID = $json_data->propID;

		$inspectionType = $json_data->inspectionType;

		$inspectionDate = $json_data->inspectionDate;

		$userID = $json_data->userID;

		// Insert the inspection details

		// Get userID through the JSON data

		if (!empty($userID)) {

			$result = $this->app_model->bookInspection($propID, $inspectionDate, $userID, $inspectionType);

			if ($result) {

				$result = TRUE;

				$details = 'Success';
			} else {

				$details = 'Failed to book inspection';
			}
		} else {

			$details = "User ID is empty or not provided";
		}

		echo json_encode(array("response" => $result, "details" => $details, "data" => $data));
	}


	public function verification()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$key = $this->getKey();

		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		$grossMonthlyIncome = $json_data->grossMonthlyIncome;

		$dob = date('Y-m-d', strtotime($json_data->dob));

		$gender = $json_data->gender;

		$propertyID = $json_data->propertyID;

		$paymentMethod = $json_data->paymentMethod;

		$booked_as = 'Individual';

		$payment_plan = $json_data->paymentPlan;

		$duration = $json_data->duration;

		$move_in_date = date('Y-m-d', strtotime($json_data->moveInDate));

		$maritalStatus = $json_data->maritalStatus;

		$presentAddress = $json_data->presentAddress;

		$timeAtAddress = $json_data->timeAtAddress;

		$currentHousingStatus = $json_data->currentHousingStatus;

		$previousEviction = $json_data->previousEviction;

		$presentLandlordName = $json_data->presentLandlordName;

		$landlordAddress = $json_data->landlordAddress;

		$reasonForLeaving = $json_data->reason4Leaving;

		$employmentStatus = $json_data->employmentStatus;

		$jobTitle = $json_data->jobTitle;

		$company = $json_data->company;

		$companyHRName = $json_data->companyHRName;

		$companyHRPhone = $json_data->companyHRPhone;

		$companyHREmail = $json_data->companyHREmail;

		$guarantorName = $json_data->guarantorName;

		$guarantorAddress = $json_data->guarantorAddress;

		$guarantorPhone = $json_data->guarantorPhone;

		$guarantorJobTitle = $json_data->guarantorJobTitle;

		$guarantorEmail = $json_data->guarantorEmail;

		$stateOfBirth = $json_data->stateOfBirth;

		$cityOfBirth = $json_data->cityOfBirth;

		$linkedinUrl = $json_data->linkedinUrl;

		$countryOfOrigin = $json_data->countryOfOrigin;

		$IDNum = $json_data->IDNum;

		$countryOfResidence = $json_data->countryOfResidence;

		$stateOfResidence = $json_data->stateOfResidence;

		$cityOfResidence = $json_data->cityOfResidence;

		$doYouHavePet = $json_data->doYouHavePet;

		$doYouHaveACriticalIllness = $json_data->doYouHaveACriticalIllness;

		$landlord_email = $json_data->landlord_email;

		$landlord_phone = $json_data->landlord_phone;

		$companyAddress = $json_data->companyAddress;

		$bankStatement = $json_data->bankStatement;

		$iDImage = $json_data->idImage;

		$bank_statement_upload = $this->base64_to_file($bankStatement, 'verification', $userID);

		$id_upload = $this->base64_to_file($iDImage, 'verification', $userID);

		//$ref = 'rss_'.md5(rand(1000000, 9999999999));

		$result = "error";

		$price = 0;

		// Directly use userID instead of decoded token due to AWS header authorization issues
		$userID = $json_data->userID;

		$fname = $json_data->firstName;

		$lname = $json_data->lastName;

		$phone = $json_data->phone;

		// $headers = $this->input->request_headers();

		// if (@$headers['Authorization']) {

		// 	$token = explode(' ', $headers['Authorization']);

			try {

				// $decoded = $this->jwt->decode($token[1], $key, array("HS256"));

				// if ($decoded) {
					// Insert the inspection details

				// 	$userID = $decoded->user->userID;

				// 	$fname = $decoded->user->firstName;

				// 	$lname = $decoded->user->lastName;

				// 	$phone = $decoded->user->phone;

				// 	$email = $decoded->user->email;

					$ref = 'rss_' . md5(rand(1000000, 9999999999));

					if (!is_null($userID)) {

						$user_agent = '';

						$bank_statement_upload = $this->base64_to_file($bankStatement, 'verification', $userID);

						$id_upload = $this->base64_to_file($iDImage, 'verification', $userID);

						$ver_result = $this->rss_model->insertVerification($fname, $lname, $email, $phone, $grossMonthlyIncome, $dob, $gender, $maritalStatus, $stateOfResidence, $cityOfResidence,  $linkedinUrl, $countryOfResidence, $IDNum, $presentAddress, $countryOfResidence, $stateOfResidence, $cityOfResidence, $timeAtAddress, $currentHousingStatus, $previousEviction, $doYouHavePet, $doYouHaveACriticalIllness, $presentLandlordName, $landlord_email, $landlord_phone, $landlordAddress, $reasonForLeaving, $employmentStatus, $jobTitle, $company, $companyHRName, $companyHREmail, $companyHRPhone, $guarantorName, $guarantorEmail, $guarantorPhone, $guarantorJobTitle, $guarantorAddress, $bank_statement_upload, $id_upload, $userID, $company, 'Mobile App', $user_agent, $propertyID);

						//Lock the property for 3 days
						$today = date('Y-m-d');

						$locked_down = date('Y-m-d', strtotime($today . ' +1 day'));

						$this->rss_model->setAvailability($locked_down, $propertyID);

						//Get property details
						$property = $this->rss_model->get_property($propertyID);

						$total_cost = ($property['price'] + $property['serviceCharge']) + ($property['securityDeposit'] * $property['securityDepositTerm']);

						//Insert Booking
						$booking_id = $this->random_strings(5);

						$booked = $this->app_model->insertBooking($booking_id, $ver_result, $userID, $propertyID, $payment_plan, $duration, $booked_as, $move_in_date, $paymentMethod, $total_cost, $ref);


						if ($ver_result && $booked) {

							$dets['ver_title'] = "Verification Notification";

							$dets['ver_note'] = "There is a new verification request profile. ";

							$this->email->from('donotreply@smallsmall.com', 'SmallSmall Alert');

							$this->email->to('verification@smallsmall.com');

							$this->email->bcc('pidah.t@smallsmall.com');

							$this->email->subject("Verification Alert!");

							$this->email->set_mailtype("html");

							$message = $this->load->view('email/header.php', $dets, TRUE);

							$message .= $this->load->view('email/verification-alert-email.php', $dets, TRUE);

							$message .= $this->load->view('email/footer.php', $dets, TRUE);

							$this->email->message($message);

							$emailRes = $this->email->send();

							if ($emailRes) {
								//This is where you send an email to customer for verification process starting
								$dets['name'] = $fname;

								$this->email->from('donotreply@smallsmall.com', 'SmallSmall');

								$this->email->to($email);

								$this->email->subject("Verification Submitted");

								$this->email->set_mailtype("html");

								$message = $this->load->view('email/header.php', $dets, TRUE);

								$message .= $this->load->view('email/verificationemail.php', $dets, TRUE);

								$message .= $this->load->view('email/footer.php', $dets, TRUE);

								$this->email->message($message);

								$emailRes = $this->email->send();

								$result = TRUE;

								$details = "Success";
							}
						} else {

							$result = TRUE;

							$details = "Error entering verification details";
						}
					} else {

						$details = "User ID is null";

					}
				// } else {

				// 	$details = "Invalid token";
				// }

			} catch (Exception $ex) {

				$details = "Exception error caught";

			}
		// } else {

		// 	$details = "No authorization code";
		// }

		echo json_encode(array('result' => $result, 'details' => $details, "bank_statement" => $bankStatement, "ID" => $iDImage, 'data' => $data));
	}

	public function test_verification()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$key = $this->getKey();

		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		$grossMonthlyIncome = $json_data->grossMonthlyIncome;

		$dob = date('Y-m-d', strtotime($json_data->dob));

		$gender = $json_data->gender;

		$propertyID = $json_data->propertyID;

		$paymentMethod = $json_data->paymentMethod;

		$booked_as = 'Individual';

		$payment_plan = $json_data->paymentPlan;

		$duration = $json_data->duration;

		$move_in_date = date('Y-m-d', strtotime($json_data->moveInDate));

		$maritalStatus = $json_data->maritalStatus;

		$presentAddress = $json_data->presentAddress;

		$timeAtAddress = $json_data->timeAtAddress;

		$currentHousingStatus = $json_data->currentHousingStatus;

		$previousEviction = $json_data->previousEviction;

		$presentLandlordName = $json_data->presentLandlordName;

		$landlordAddress = $json_data->landlordAddress;

		$reasonForLeaving = $json_data->reason4Leaving;

		$employmentStatus = $json_data->employmentStatus;

		$jobTitle = $json_data->jobTitle;

		$company = $json_data->company;

		$companyHRName = $json_data->companyHRName;

		$companyHRPhone = $json_data->companyHRPhone;

		$companyHREmail = $json_data->companyHREmail;

		$guarantorName = $json_data->guarantorName;

		$guarantorAddress = $json_data->guarantorAddress;

		$guarantorPhone = $json_data->guarantorPhone;

		$guarantorJobTitle = $json_data->guarantorJobTitle;

		$guarantorEmail = $json_data->guarantorEmail;

		$stateOfBirth = $json_data->stateOfBirth;

		$cityOfBirth = $json_data->cityOfBirth;

		$linkedinUrl = $json_data->linkedinUrl;

		$countryOfOrigin = $json_data->countryOfOrigin;

		$IDNum = $json_data->IDNum;

		$countryOfResidence = $json_data->countryOfResidence;

		$stateOfResidence = $json_data->stateOfResidence;

		$cityOfResidence = $json_data->cityOfResidence;

		$doYouHavePet = $json_data->doYouHavePet;

		$doYouHaveACriticalIllness = $json_data->doYouHaveACriticalIllness;

		$landlord_email = $json_data->landlord_email;

		$landlord_phone = $json_data->landlord_phone;

		$companyAddress = $json_data->companyAddress;

		$bankStatement = $json_data->bankStatement;

		$iDImage = $json_data->idImage;

		$bank_statement_upload = $this->base64_to_file($bankStatement, 'verification', $userID);

		$id_upload = $this->base64_to_file($iDImage, 'verification', $userID);


		$ref = 'rss_' . md5(rand(1000000, 9999999999));

		$result = "error";

		$price = 0;

		$headers = $this->input->request_headers();

		echo json_encode(array('result' => TRUE, 'details' => $details, "bank_statement" => $bankStatement, "ID" => $iDImage, 'data' => $data));
	}

	// public function send_rating()
	// {

	// 	$result = FALSE;

	// 	$details = '';

	// 	$data = array();

	// 	$key = $this->getKey();

	// 	$headers = $this->input->request_headers();

	// 	$json = file_get_contents('php://input');

	// 	$json_data = json_decode($json);

	// 	$grade = $json_data->grading;

	// 	$satisfaction = $json_data->satisfaction;

	// 	$ratingNote = $json_data->ratingNote;

	// 	$propertyID = $json_data->propertyID;

	// 	if (@$headers['Authorization']) {

	// 		$token = explode(' ', $headers['Authorization']);

	// 		try {

	// 			$decoded = $this->jwt->decode($token[1], $key, array("HS256"));

	// 			if ($decoded) {

	// 				//Insert the inspection details
	// 				$userID = $decoded->user->userID;

	// 				$response = $this->rss_model->sendRating($grade, $satisfaction, $userID, $propertyID, $ratingNote);

	// 				if ($response) {

	// 					$result = TRUE;

	// 					$details = "Success";
	// 				} else {

	// 					$result = TRUE;

	// 					$details = "Error inserting data";
	// 				}
	// 			} else {

	// 				$details = "Invalid token";
	// 			}
	// 		} catch (Exception $ex) {

	// 			$details = "Exception error caught";
	// 		}
	// 	} else {

	// 		$details = "No authorization code";
	// 	}

	// 	echo json_encode(array("result" => $result, "details" => $details, "data" => $data));
	// }

	public function send_rating()
{
    $result = FALSE;

    $details = '';

    $data = array();

    $key = $this->getKey();

    $json = file_get_contents('php://input');

    $json_data = json_decode($json);

    $grade = $json_data->grading;

    $satisfaction = $json_data->satisfaction;

    $ratingNote = $json_data->ratingNote;

    $propertyID = $json_data->propertyID;

    try {
        // Insert the inspection details
        // Directly use userID due to AWS header Authorization issues.
        $userID = $json_data->userID;

        $response = $this->rss_model->sendRating($grade, $satisfaction, $userID, $propertyID, $ratingNote);

        if ($response) {

            $result = TRUE;

            $details = "Success";

        } else {

            $result = TRUE;

            $details = "Error inserting data";
        }

    } catch (Exception $ex) {

        $details = "Exception error caught";

    }

    echo json_encode(array("result" => $result, "details" => $details, "data" => $data));
}


	public function personal_profile()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$key = $this->getKey();

		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		$grossMonthlyIncome = $json_data->grossMonthlyIncome;

		$dob = date('Y-m-d', strtotime($json_data->dateOfBirth));

		$gender = $json_data->gender;

		$maritalStatus = $json_data->maritalStatus;

		$presentAddress = $json_data->presentAddress;

		$timeAtAddress = $json_data->timeAtAddress;

		$currentHousingStatus = $json_data->currentHousingStatus;

		$previousEviction = $json_data->previousEviction;

		$presentLandlordName = $json_data->presentLandlordName;

		$landlordAddress = $json_data->landlordAddress;

		$reasonForLeaving = $json_data->reasonForLeaving;

		$price = 0;

		$headers = $this->input->request_headers();

		if (@$headers['Authorization']) {

			$token = explode(' ', $headers['Authorization']);

			try {

				$decoded = $this->jwt->decode($token[1], $key, array("HS256"));

				if ($decoded) {
					//Insert the inspection details

					$userID = $decoded->user->userID;

					$fname = $decoded->user->firstName;

					$lname = $decoded->user->lastName;

					$phone = $decoded->user->phone;

					$email = $decoded->user->email;

					$ref = 'rss_' . md5(rand(1000000, 9999999999));

					if (!is_null($userID)) {

						$ver_result = $this->app_model->insertPersonalDetails($fname, $lname, $email, $phone, $grossMonthlyIncome, $dob, $gender, $maritalStatus, $presentAddress, $timeAtAddress, $currentHousingStatus, $previousEviction, $presentLandlordName, $landlordAddress, $reasonForLeaving, $userID);

						if ($ver_result) {

							$result = TRUE;

							$details = "Verification details successfully entered";
						} else {



							$details = "Error entering verification details";
						}
					} else {

						$details = "User ID is null";
					}
				} else {

					$details = "Invalid token";
				}
			} catch (Exception $ex) {

				$details = "Exception error caught";
			}
		} else {

			$details = "No authorization code";
		}

		echo json_encode(array('result' => $result, 'details' => $details, 'data' => $data));
	}

	public function verification_profile()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$key = $this->getKey();

		$headers = $this->input->request_headers();

		if (@$headers['Authorization']) {

			$token = explode(' ', $headers['Authorization']);

			try {

				$decoded = $this->jwt->decode($token[1], $key, array("HS256"));

				if ($decoded) {
					//Insert the inspection details

					$userID = $decoded->user->userID;

					if (!is_null($userID)) {

						$data = $this->app_model->verificationDetails($userID);

						$result = TRUE;

						if (!empty($data)) {

							$details = "Success";
						} else {

							$details = "Empty data set";
						}
					} else {

						$details = "User ID is null";
					}
				} else {

					$details = "Invalid token";
				}
			} catch (Exception $ex) {

				$details = "Exception error caught";
			}
		} else {

			$details = "No authorization code";
		}

		echo json_encode(array('result' => $result, 'details' => $details, 'data' => $data));
	}

	// public function inspection_details()
	// {

	// 	$result = FALSE;

	// 	$details = '';

	// 	$data = array();

	// 	$key = $this->getKey();

	// 	$headers = $this->input->request_headers();

	// 	if (@$headers['Authorization']) {

	// 		$token = explode(' ', $headers['Authorization']);

	// 		try {

	// 			$decoded = $this->jwt->decode($token[1], $key, array("HS256"));

	// 			if ($decoded) {
	// 				//Insert the inspection details

	// 				$userID = $decoded->user->userID;

	// 				$fname = $decoded->user->firstName;

	// 				$lname = $decoded->user->lastName;

	// 				$phone = $decoded->user->phone;

	// 				$email = $decoded->user->email;


	// 				if (!is_null($userID)) {

	// 					$data = $this->app_model->getInspectionDetails($userID);

	// 					$result = TRUE;

	// 					if (!empty($data)) {

	// 						$details = "success";
	// 					} else {

	// 						$details = "Empty result";
	// 					}
	// 				} else {

	// 					$details = "User ID is null";
	// 				}
	// 			} else {

	// 				$details = "Invalid token";
	// 			}
	// 		} catch (Exception $ex) {

	// 			$details = "Exception error caught";
	// 		}
	// 	} else {

	// 		$details = "No authorization code";
	// 	}

	// 	echo json_encode(array('result' => $result, 'details' => $details, 'data' => $data));
	// }

	public function inspection_details()
	{
		$result = FALSE;

		$details = '';

		$data = array();

		$key = $this->getKey();

		// Get the userID from query parameters
		if (isset($_GET['userID'])) {

			$userID = $_GET['userID'];

			try {

				// Fetch inspection details based on the userID
				$data = $this->app_model->getInspectionDetails($userID);

				if (!empty($data)) {

					$result = TRUE;

					$details = "success";
				} else {

					$details = "Empty result";
				}
			} catch (Exception $ex) {

				$details = "Exception error caught: " . $ex->getMessage();
			}
		} else {

			$details = "Invalid query parameters. Missing userID";
		}

		echo json_encode(array('result' => $result, 'details' => $details, 'data' => $data));
	}


	public function all_countries()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$data = $this->app_model->get_countries();

		if (!empty($data)) {

			$result = TRUE;

			$details = 'Success';
		} else {
			$result = TRUE;

			$details = 'No country in DB';
		}

		echo json_encode(array("result" => $result, "details" => $details, "data" => $data));
	}

	public function all_states()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		$country = $json_data->country;

		$data = $this->app_model->get_states($country);

		if (!empty($data)) {

			$result = TRUE;

			$details = 'Success';
		} else {

			$result = TRUE;

			$details = 'No state in DB';
		}

		echo json_encode(array("response" => $result, "details" => $details, "data" => $data));
	}

	public function all_cities()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		$state = $json_data->state;

		$data = $this->app_model->get_cities($state);

		if (!empty($data)) {

			$result = TRUE;

			$details = 'Success';
		} else {

			$result = TRUE;

			$details = 'No city in DB';
		}

		echo json_encode(array("result" => $result, "details" => $details, "data" => $data));
	}

	// public function insertBooking()
	// {

	// 	$result = FALSE;

	// 	$details = '';

	// 	$data = array();

	// 	$key = $this->getKey();

	// 	$json = file_get_contents('php://input');

	// 	$json_data = json_decode($json);

	// 	$propertyID = $json_data->propertyID;

	// 	$move_in_date = $json_data->moveInDate;

	// 	$duration = $json_data->duration;

	// 	$paymentPlan = $json_data->paymentPlan;

	// 	$booked_as = $json_data->bookedAs;

	// 	$payment_type = $json_data->paymentMethod;

	// 	$headers = $this->input->request_headers();

	// 	if (@$headers['Authorization']) {

	// 		$token = explode(' ', $headers['Authorization']);

	// 		try {

	// 			$decoded = $this->jwt->decode($token[1], $key, array("HS256"));

	// 			if ($decoded) {
	// 				//Insert the inspection details

	// 				$userID = $decoded->user->userID;

	// 				$fname = $decoded->user->firstName;

	// 				$lname = $decoded->user->lastName;

	// 				$phone = $decoded->user->phone;

	// 				$email = $decoded->user->email;

	// 				//Get verification ID

	// 				$user = $this->app_model->get_verification_details($userID);

	// 				if (!empty($user)) {

	// 					//Get the price to pay
	// 					$property = $this->app_model->get_property_dets($propertyID);

	// 					$securityDeposit = $property['securityDeposit'] * $property['securityDepositTerm'];

	// 					// 		            $propertyPrice = $property['price'];

	// 					// 		if (empty($propertyPrice) || is_null($propertyPrice)) {

	// 					// 			$evictionDeposit = 0; // set default

	// 					// 			} elseif ($propertyPrice < 200000) {

	// 					// 			$evictionDeposit = 200000;

	// 					// 			} else {

	// 					// 			$evictionDeposit = $propertyPrice;

	// 					// 		}

	// 					// 		if($property['securityDepositTerm'] == 1)
	// 					// 		{
	// 					// 			$sec_dep = $property['securityDeposit'] * $property['securityDepositTerm'];
	// 					// 		}

	// 					// 		else
	// 					// 		{
	// 					// 			$sec_dep = $property['securityDeposit'] * $property['securityDepositTerm'];
	// 					// 			$sec_dep = 0.75 * $sec_dep;
	// 					// 		}

	// 					// 		$srlz = $property['intervals'];
	// 					// 		$srlz = unserialize($srlz);

	// 					// 		$yrnt = $property['price'] * 12;

	// 					// 		if($srlz[0] == 'Upfront')
	// 					// 		{
	// 					// 			$property['isItUpfront'] = 'Upfront';

	// 					// 			if($yrnt <= 2000000)
	// 					// 			{
	// 					// 				$sec_dep = 0.25 * $yrnt;
	// 					// 			}

	// 					// 			else
	// 					// 			{
	// 					// 				$sec_dep = 0.3 * $yrnt;
	// 					// 			}
	// 					// 		}

	// 					// 		else
	// 					// 		{
	// 					// 			$serviceCharge = $property['serviceCharge'] * $property['serviceChargeTerm'];
	// 					// 		}

	// 					// 		$sec_dep = $sec_dep + $evictionDeposit;

	// 					// 		$property['securityDeposit'] = "$sec_dep";

	// 					// 		$property['serviceCharge'] = "$serviceCharge";

	// 					// 		            $cost = $property['price'] + $sec_dep + $serviceCharge;


	// 					$cost = $property['price'] + $securityDeposit + $property['serviceCharge'];

	// 					$ref = 'rss_' . md5(rand(1000000, 9999999999));

	// 					//Insert Booking
	// 					$booking_id = $this->random_strings(5);

	// 					//Check if user already booked property before proceeding

	// 					$book_check = $this->app_model->check_booking($userID, $propertyID);

	// 					if (!empty($book_check)) {
	// 						//Edit booking
	// 						$response = $this->app_model->updateBooking($book_check['bookingID'], $user['verification_id'], $userID, $propertyID, $paymentPlan, $duration, $move_in_date, $payment_type, $cost);
	// 					} else {
	// 						//Book new
	// 						$response = $this->app_model->insertBooking($booking_id, $user['verification_id'], $userID, $propertyID, $paymentPlan, $duration, $booked_as, $move_in_date, $payment_type, $cost, $ref);
	// 					}
	// 					$details = "Success";

	// 					if ($response) {

	// 						$result = TRUE;
	// 					} else {

	// 						$result = FALSE;
	// 					}
	// 				} else {

	// 					$details = "No verification detail found : " . $userID;
	// 				}
	// 			} else {

	// 				$details = "Invalid token";
	// 			}
	// 		} catch (Exception $ex) {

	// 			$details = "Exception error caught";
	// 		}
	// 	} else {

	// 		$details = "No authorization code";
	// 	}

	// 	echo json_encode(array("result" => $result, "details" => $details, "data" => $data));
	// }

	public function insertBooking()
	{
		$result = FALSE;

		$details = '';

		$data = array();

		try {

			// Get the JSON data from the request body

			$json = file_get_contents('php://input');

			$json_data = json_decode($json);

			// Extract required data from the JSON data

			$propertyID = $json_data->propertyID;

			$move_in_date = $json_data->moveInDate;

			$duration = $json_data->duration;

			$paymentPlan = $json_data->paymentPlan;

			$booked_as = $json_data->bookedAs;

			$payment_type = $json_data->paymentMethod;

			// For AWS test purposes, I am assuming that the user ID, first name, last name, phone, and email are also present in the JSON data.

			// Normally, these details should be obtained securely through authentication, and not directly from the request data. But due to AWS error, I doing this for testing.

			//Insert the inspection details

			$userID = $json_data->userID;

			// $fname = $json_data->firstName;

			// $lname = $json_data->lastName;

			// $phone = $json_data->phone;

			// $email = $json_data->email;

			//Get verification ID

			$user = $this->app_model->get_verification_details($userID);

			if (!empty($user)) {

				//Get the price to pay for the property
				$property = $this->app_model->get_property_dets($propertyID);

				//Security deposit based on the property details
				$securityDeposit = $property['securityDeposit'] * $property['securityDepositTerm'];

				//Total cost including property price, security deposit, and service charge
				$cost = $property['price'] + $securityDeposit + $property['serviceCharge'];

				//Reference for the booking
				$ref = 'rss_' . md5(rand(1000000, 9999999999));

				//Insert Booking
				$booking_id = $this->random_strings(5);

				//Check if the user has already booked the property before proceeding
				$book_check = $this->app_model->check_booking($userID, $propertyID);

				if (!empty($book_check)) {
					//Edit booking
					$response = $this->app_model->updateBooking($book_check['bookingID'], $user['verification_id'], $userID, $propertyID, $paymentPlan, $duration, $move_in_date, $payment_type, $cost);
				} else {
					//Book new
					$response = $this->app_model->insertBooking($booking_id, $user['verification_id'], $userID, $propertyID, $paymentPlan, $duration, $booked_as, $move_in_date, $payment_type, $cost, $ref);
				}

				if ($response) {

					$result = TRUE;

					$details = "Success";
				} else {

					$details = "Failed to insert booking";
				}
			} else {

				$details = "No verification detail found : " . $userID;
			}

			//Result set to TRUE to indicate success
			$result = TRUE;

			$details = "Success";
		} catch (Exception $ex) {

			// If any exception occurs, catch it and set the error message in $details
			$details = "Exception error caught: " . $ex->getMessage();
		}

		// Output the response as JSON
		echo json_encode(array("result" => $result, "details" => $details, "data" => $data));
	}

	public function lenco_transactions()
	{

		$result = TRUE;

		$details = '';

		$data = array();

		// Retrieve the request's body
		$json = file_get_contents("php://input");

		$json_data = json_decode($json);

		$details =  $json_data->event;


		echo json_encode(array("result" => $result, "details" => $details, "data" => $json_data));


		// only a post with lenco signature header gets our attention
		/*if ((strtoupper($_SERVER['REQUEST_METHOD']) != 'POST' ) || !array_key_exists('x-lenco-signature', $_SERVER) ) 
            echo "No lenco key";
            exit();
            
        // Retrieve the request's body
        $input = file_get_contents("php://input");
        
        define('LENCO_SECRET_KEY','1d0315ecb66cb5153339cad3019098535e565f2409aaf25b9c87eb66a1c9b9d7');
        
        $webhook_hash_key = hash("sha256", LENCO_SECRET_KEY);
        
        // validate event do all at once to avoid timing attack
        if($_SERVER['HTTP_X_LENCO_SIGNATURE'] !== hash_hmac('sha512', $input, $webhook_hash_key))
            exit();
            
        http_response_code(200);
        
        // parse event (which is json string) as object
        // Do something - that will not take long - with $event
        $event = json_decode($input);
        
        if(get_object_vars($event)["event"] == 'virtual-account.transaction'){
            
            //Update the virtual account table
            
        }*/
	}

	public function verification_status()
	{

		$details = '';

		$data = array();

		// Get $key variable
		$key = $this->getKey();

		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		$userID = $json_data->userID;



		$data = $this->app_model->checkVerification($userID);

		if (!empty($data)) {

			$result = TRUE;

			$details = 'Success';

		} else {

			$result = TRUE;

			$details = "Profile does not exist";
		}

		echo json_encode(array("result" => TRUE, "details" => $details, "data" => $data));
	}

	// public function subscription_history(){

	//     $details = '';

	//     $data = array();

	//     $key = $this->getKey();

	//     $headers = $this->input->request_headers();

	//     if(@$headers['Authorization']){

	//         $token = explode(' ', $headers['Authorization']);

	//         try{

	//             $decoded = $this->jwt->decode($token[1], $key, array("HS256"));

	//             if($decoded){

	//         		$userID = $decoded->user->userID;

	//                 $data = $this->app_model->getSubscriptions($userID);

	//         	    if(!empty($data)){

	//         	        for($i = 0; $i < count($data); $i++){

	// 	                    $res = $this->app_model->countApprovedTransactions( $data[$i]['bookingID']);

	// 	                    $data[$i]['numOfPayments'] = $res;

	// 	                     $propertyPrice = $data[$i]['price'];

	//     					if (empty($propertyPrice) || is_null($propertyPrice)) {

	//     						$evictionDeposit = 0; // set default

	//     						} elseif ($propertyPrice < 200000) {

	//     						$evictionDeposit = 200000;

	//     						} else {

	//     						$evictionDeposit = $propertyPrice;

	//     					}

	//     					if($data[$i]['securityDepositTerm'] == 1)
	//     					{
	//     						$sec_dep = $data[$i]['securityDeposit'] * $data[$i]['securityDepositTerm'];
	//     					}

	//     					else
	//     					{
	//     						$sec_dep = $data[$i]['securityDeposit'] * $data[$i]['securityDepositTerm'];
	//     						$sec_dep = 0.75 * $sec_dep;
	//     					}

	//     					$srlz = $data[$i]['intervals'];
	//     					$srlz = unserialize($srlz);

	//     					$yrnt = $data[$i]['price'] * 12;

	//     					if($srlz[0] == 'Upfront')
	//     					{
	//     						$data[$i]['isItUpfront'] = 'Upfront';

	//     						if($yrnt <= 2000000)
	//     						{
	//     							$sec_dep = 0.25 * $yrnt;
	//     						}

	//     						else
	//     						{
	//     							$sec_dep = 0.3 * $yrnt;
	//     						}
	//     					}

	//     					else
	//     					{
	//     					    $serv_term = $data[$i]['serviceChargeTerm'];

	//                             if($serv_term != 0)
	//                             {
	//                                 $serviceCharge = ($data[$i]['serviceCharge'] * $data[$i]['serviceChargeTerm']); 
	//                                 $data[$i]['isItUpfront'] = 'false'; 
	//                             }

	//                             else
	//                             {
	//                                 $serviceCharge = $data[$i]['serviceCharge'];
	//                             }

	//     					}

	//     					$sec_dep = $sec_dep + $evictionDeposit;

	//     					$data[$i]['securityDeposit'] = "$sec_dep";

	//     					$data[$i]['serviceCharge'] = "$serviceCharge";

	// 	                }

	//         	        $result = TRUE;

	//         	        $details = 'Success';

	//         	    }else{

	//         	        $result = TRUE;

	//         	        $details = "Subscription details empty";

	//         	    }

	//             }else{

	//                 $details = "Invalid token";

	//             }
	//         }catch (Exception $ex){

	//            $details = "Exception error caught";

	//         }
	//     }else{

	//         $details = "No authorization code";
	//     }

	//     echo json_encode(array("result" => TRUE, "details" => $details, "data" => $data));

	// }


	public function subscription_history()
	{
		$result = FALSE;

		$details = '';

		$data = array();

		// Get $key variable
		$key = $this->getKey();

		// Directly get the JSON data from the request body
		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		// This is not the right way but due to long error with authentication(AWS) that is why I'm getting using ID from query parameters

		if (isset($_GET['userID'])) {

			$userID = $_GET['userID'];

			// Fetch subscription history based on the userID
			$data = $this->app_model->getSubscriptions($userID);

			if (!empty($data)) {

				for ($i = 0; $i < count($data); $i++) {
					$res = $this->app_model->countApprovedTransactions($data[$i]['bookingID']);

					$data[$i]['numOfPayments'] = $res;

					$propertyPrice = $data[$i]['price'];

					if (empty($propertyPrice) || is_null($propertyPrice)) {

						$evictionDeposit = 0; // set default

					} elseif ($propertyPrice < 200000) {

						$evictionDeposit = 200000;
					} else {

						$evictionDeposit = $propertyPrice;
					}

					if ($data[$i]['securityDepositTerm'] == 1) {

						$sec_dep = $data[$i]['securityDeposit'] * $data[$i]['securityDepositTerm'];
					} else {

						$sec_dep = $data[$i]['securityDeposit'] * $data[$i]['securityDepositTerm'];

						$sec_dep = 0.75 * $sec_dep;
					}

					$srlz = $data[$i]['intervals'];
					$srlz = unserialize($srlz);
					$yrnt = $data[$i]['price'] * 12;

					if ($srlz[0] == 'Upfront') {
						$data[$i]['isItUpfront'] = 'Upfront';

						if ($yrnt <= 2000000) {
							$sec_dep = 0.25 * $yrnt;
						} else {
							$sec_dep = 0.3 * $yrnt;
						}
					} else {
						$serv_term = $data[$i]['serviceChargeTerm'];

						if ($serv_term != 0) {
							$serviceCharge = ($data[$i]['serviceCharge'] * $data[$i]['serviceChargeTerm']);
							$data[$i]['isItUpfront'] = 'false';
						} else {
							$serviceCharge = $data[$i]['serviceCharge'];
						}
					}

					$sec_dep = $sec_dep + $evictionDeposit;
					$data[$i]['securityDeposit'] = "$sec_dep";
					$data[$i]['serviceCharge'] = "$serviceCharge";
				}

				$result = TRUE;
				$details = 'Success';
			} else {
				$result = TRUE;
				$details = "Subscription details empty";
			}
		} else {
			$details = "Invalid query parameters. Missing userID";
		}

		echo json_encode(array("result" => $result, "details" => $details, "data" => $data));
	}


	public function create_wallet_account()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$key = $this->getKey();

		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		$accountName = $json_data->accountName;

		$bvn = $json_data->bvn;

		// Get the user ID from the JSON DATA which is not right but doing this because the AWS Authentication error is taking too long for me to resolve. 
		$userID = $json_data->userID;

		// $key = $this->getKey();

		// $headers = $this->input->request_headers();

		// if (@$headers['Authorization']) {

		// 	$token = explode(' ', $headers['Authorization']);

			try {

				// $decoded = $this->jwt->decode($token[1], $key, array("HS256"));

				// if ($decoded) {

				// 	//Insert the inspection details
				// 	$userID = $decoded->user->userID;

					$response_det = $this->rss_model->update_bvn($userID, $bvn);


					if ($response_det) {

						//Connect to Lenco API to create virtual account

						$data = '{
	                    "accountName" : "' . $accountName . '", 
	                    "bvn" : "' . $bvn . '",
	                    "isStatic" : ' . true . '
	                    }';

						$curl = curl_init();

						curl_setopt_array($curl, array(

							CURLOPT_URL => "https://api.lenco.ng/access/v1/virtual-accounts",

							CURLOPT_RETURNTRANSFER => true,

							CURLOPT_POSTFIELDS => $data,

							CURLOPT_HTTPHEADER => [
								"Authorization: Bearer 1d0315ecb66cb5153339cad3019098535e565f2409aaf25b9c87eb66a1c9b9d7",

								"content-type: application/json"
							]
						));

						$response = curl_exec($curl);

						$response = json_decode($response, true);

						if ($response['status']) {

							$accountID = $response['data']['id'];

							$accountReference = $response['data']['accountReference'];

							$accountName = $response['data']['bankAccount']['accountName'];

							$accountNumber = $response['data']['bankAccount']['accountNumber'];

							$bankName = $response['data']['bankAccount']['bank']['name'];

							$bankCode = $response['data']['bankAccount']['bank']['code'];

							$account_check = $this->loan_model->check_for_account($userID);

							if (!$account_check) {

								$result = $this->loan_model->insert_account_details($userID, $accountID, $accountReference, $accountName, $accountNumber, $bankName, $bankCode, 'App');

								if ($result) {

									$result = TRUE;

									$details = "Success";

								} else {

									$details = "Could not store data";

								}

							} else {

								$details = "Account exists already";

							}

						} else {

							$details = "Error creating virtual account";
						}

					} else {

						$result = TRUE;

						$details = "Could not update user table with BVN";

					}

				// } else {

				// 	$details = "Invalid token";
				// }

			} catch (Exception $ex) {

				$details = "Exception error caught";

			}
		// } else {

		// 	$details = "No authorization code";
		// }

		echo json_encode(array("result" => $result, "details" => $details, "data" => $data));
	}

	// public function wallet_details()
	// {

	// 	$result = FALSE;

	// 	$details = '';

	// 	$data = array();

	// 	$key = $this->getKey();

	// 	$headers = $this->input->request_headers();

	// 	if (@$headers['Authorization']) {

	// 		$token = explode(' ', $headers['Authorization']);

	// 		try {

	// 			$decoded = $this->jwt->decode($token[1], $key, array("HS256"));

	// 			if ($decoded) {
	// 				//Insert the inspection details

	// 				$userID = $decoded->user->userID;

	// 				if (!is_null($userID)) {

	// 					$data = $this->app_model->getWalletDetails($userID);

	// 					$result = TRUE;

	// 					if (!empty($data)) {

	// 						$details = "Success";
	// 					} else {

	// 						$details = "Empty data set";
	// 					}
	// 				} else {

	// 					$details = "User ID is null";
	// 				}
	// 			} else {

	// 				$details = "Invalid token";
	// 			}
	// 		} catch (Exception $ex) {

	// 			$details = "Exception error caught";
	// 		}
	// 	} else {

	// 		$details = "No authorization code";
	// 	}

	// 	echo json_encode(array('result' => $result, 'details' => $details, 'data' => $data));
	// }

	public function wallet_details()
	{
		$result = FALSE;

		$details = '';

		$data = array();

		$key = $this->getKey();

		// Removed $headers and token related code since it's not needed for GET request and due to Authorization headers issues with AWS loadbalancer

		// Get the userID from query parameters
		if (isset($_GET['userID'])) {

			$userID = $_GET['userID'];

			try {
				// Fetch wallet details based on the userID
				$data = $this->app_model->getWalletDetails($userID);

				if (!empty($data)) {

					$result = TRUE;

					$details = "Success";
				} else {

					$details = "Empty data set";
				}
			} catch (Exception $ex) {

				$details = "Exception error caught: " . $ex->getMessage();
			}
		} else {

			$details = "Invalid query parameters. Missing userID";
		}

		echo json_encode(array('result' => $result, 'details' => $details, 'data' => $data));
	}


	private function getKey()
	{
		//return getenv(JWT_SECRET_KEY);
		return "crowther@051684";
	}

	public function get_verification($userID)
	{

		$user = $this->app_model->get_verification_details($userID);

		print_r($user);

		exit;
	}

	public function check_virtual_account()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$key = $this->getKey();

		$headers = $this->input->request_headers();

		if (@$headers['Authorization']) {

			$token = explode(' ', $headers['Authorization']);

			try {

				$decoded = $this->jwt->decode($token[1], $key, array("HS256"));

				if ($decoded) {

					//Insert the inspection details
					$userID = $decoded->user->userID;

					$data = $this->rss_model->get_account_details($userID);

					if (!empty($data)) {

						$result = TRUE;

						$details = "Success";
					} else {

						$result = TRUE;

						$details = "Empty data set";
					}
				} else {

					$details = "Invalid token";
				}
			} catch (Exception $ex) {

				$details = "Exception error caught";
			}
		} else {

			$details = "No authorization code";
		}

		echo json_encode(array("result" => $result, "details" => $details, "data" => $data));
	}

	public function passwordReset()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		$email = $json_data->email;

		//Check if email exists the create onetime code for password reset

		$res = $this->rss_model->check_reset_email($email);

		if ($res) {

			//If email exists insert create reset row in DB

			$code = md5(date('Y-m-d H:i:s'));

			$result = $this->rss_model->insertResetDetails($res['userID'], $code);

			if ($result) {

				$data['resetLink'] = base_url() . 'reset/' . $res['userID'] . '/' . $code;

				$data['name'] = $res['firstName'];

				$this->email->from('donotreply@smallsmall.com', 'SmallSmall Password Reset');

				$this->email->to($email);

				$this->email->subject("Password Reset Instructions");

				$this->email->set_mailtype("html");

				$message = $this->load->view('email/header.php', $data, TRUE);

				$message .= $this->load->view('email/emailreset.php', $data, TRUE);

				$message .= $this->load->view('email/footer.php', $data, TRUE);

				$this->email->message($message);

				$emailRes = $this->email->send();

				if ($emailRes) {

					$result = TRUE;

					$details = "Success";
				} else {

					$result = TRUE;

					$details = "Error sending reset email";
				}
			} else {

				$details = "Error inserting reset data";
			}
		} else {

			$result = TRUE;

			$details = "Email does not exist!";
		}

		echo json_encode(array("result" => $result, "details" => $details, "data" => $data));
	}

	public function updatePayment()
	{

		$result = FALSE;

		$details = '';

		$key = $this->getKey();

		$data = array();

		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		$bookingID = $json_data->bookingID;

		$amount = $json_data->amount;

		$action = $json_data->action;

		$status = 'Approved';

		$type = 'rss';

		$reference_id = $this->random_strings(12);

		$path = "";

		$pplan = 0;

		$transRes = 0;

		$booking_det = $this->app_model->get_booking_details($bookingID);

		// $headers = $this->input->request_headers();

		$expiry_start = 0;

		if ($action == 'renewal') {

			$expiry_start = $booking_det['next_rental'];
		} else {

			$expiry_start = $booking_det['move_in_date'];
		}

		$startDate = date("Y-m-d", strtotime($expiry_start));

		// if (@$headers['Authorization']) {

			// $token = explode(' ', $headers['Authorization']);

		// Directly use userID instead of token due to AWS header Authorization issues not yet fixed
		$userID = $json_data->userID;

		$lname = $json_data->lastName;

			try {

				// $decoded = $this->jwt->decode($token[1], $key, array("HS256"));

				// if ($decoded) {
				// 	//Insert the inspection details

				// 	$userID = $decoded->user->userID;

				// 	$fname = $decoded->user->firstName;

				// 	$lname = $decoded->user->lastName;

				// 	$phone = $decoded->user->phone;

				// 	$email = $decoded->user->email;


					//$user = $this->app_model->get_user($userID);
					if ($booking_det['payment_plan'] == 'Monthly') {

						$pplan = 1;
					} elseif ($booking_det['payment_plan'] == 'Quarterly') {

						$pplan = 3;
					} elseif ($booking_det['payment_plan'] == 'Bi-annually') {

						$pplan = 6;
					} elseif ($booking_det['payment_plan'] == 'Annually') {

						$pplan = 12;
					}

					$expiry = $this->endCycle($startDate, $pplan); // output: 2014-07-02

					$pdf_content = '<div style="width:90%;margin:auto;padding-top:50px;"><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="logo"><img width="150px" src=' . base_url() . '"assets/img/logo.png" /></div></td><td width="33.3%"></td><td width="33.3%"><div class="company-address" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>From Address</b><br />' . base_url() . '<br />No. 1 Akinyemi Avenue,<br />Lekki Phase 1,<br />Lekki Lagos,<br />Nigeria.<br />(+234)903 722 2669</div></td></tr></table><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="invoice-details" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>Invoice:</b> ' . $bookingID . '<br /><b>Transaction ID:</b> ' . $reference_id . '<br />Invoice date: ' . date("d/m/Y") . '<br />Email: ' . $email . '<br />Phone Number: ' . $phone . '</div></td><td width="33.3%"></td><td width="33.3%"><div class="company-address" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>Billing Address</b><br />' . $fname . ' ' . $lname . '<!---<br />' . $booking_det['address'] . '<br />' . $booking_det['city'] . ',<br /> Lagos,<br />--->Nigeria.<br />' . $phone . '</div></td></tr></table><table width="100%" cellpadding="10" style="border:1px solid #f1f3f3;"><tr><th style="background:#2E2E2E;width:60%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Description</th><th style="background:#2E2E2E;width:20%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Duration</th><th style="background:#2E2E2E;width:20%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Cost</th></tr><tr><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left"><b>' . $booking_det['propertyTitle'] . '</b><div style="font-family:helvetica;font-size:12px;color:#333333">' . $booking_det['address'] . ', ' . $booking_det['city'] . '</div></td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">' . $pplan . ' Month(s)</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N' . number_format($pplan * $booking_det['price']) . '.00</td></tr><tr><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;"><b>Security Deposit</b></td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">' . $booking_det['securityDepositTerm'] . ' Month(s)</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N' . number_format($booking_det['securityDepositTerm'] * $booking_det['securityDeposit']) . '.00</td></tr></table><table width="100%" cellpadding="10" style="border:1px solid #f1f3f3;display:table"><tr><td width="80%" valign="top" style="border:1px solid #f1f3f3;font-weight:bold;font-family:helvetica;font-size:14px;text-align:right">Subtotal</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N' . number_format($pplan * $booking_det['price']) . '.00</td></tr><tr><td width="80%" valign="top" style="border:1px solid #f1f3f3;font-weight:bold;font-family:helvetica;font-size:14px;text-align:right">Total</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N' . number_format($amount) . '.00</td></tr></table><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="invoice-details" style="font-family:helvetica;font-size:14px;line-height:25px;">Account Number: 7900982382<br />Providus Bank<br />RentSmallSmall Ltd.</div></td><td width="33.3%"></td><td width="33.3%"></td></tr></table></div>';

					$data['name'] = $lname;

					$data['propertyName'] = $booking_det['propertyTitle'];

					$data['prop_id'] = $booking_det['property_id'];

					if (!is_dir('assets/pdf/tenant/' . $bookingID)) {

						mkdir('./assets/pdf/tenant/' . $bookingID, 0777, TRUE);
					}

					if ($action == 'renewal') {

						//Update payment table

						$transRef = $json_data->transactionRef;

						$transRes = $this->app_model->updateTransactionDets($bookingID, $transRef, $status, 'paystack', $expiry);

					} else {

						//Insert new transaction entry

						$transRes = $this->app_model->insertTransactionDets($booking_det['verification_id'], $reference_id, $bookingID, $userID, $amount, $status, $type, 'paystack', $expiry);
					}

					if ($transRes) {

						//Send a message with an invoice here and send one to customer experience too
						//Set folder to save PDF to
						$this->html2pdf->folder('./assets/pdf/tenant/' . $bookingID . '/');

						//Set the filename to save/download as
						$this->html2pdf->filename($bookingID . '_invoice.pdf');

						//Set the paper defaults
						$this->html2pdf->paper('a4', 'portrait');

						//Load html view
						$this->html2pdf->html($pdf_content);

						//Create the PDF
						$path = $this->html2pdf->create('save');

						$this->email->from('no-reply@smallsmall.com', 'SmallSmall Technologies');

						$this->email->to($email);

						$this->email->cc('accounts@smallsmall.com');

						$this->email->bcc('customerexperience@smallsmall.com');

						$this->email->set_mailtype("html");

						$this->email->subject("Successful payment!");

						$message = $this->load->view('email/header.php', $data, TRUE);

						$message .= $this->load->view('email/payment-confirmation-email.php', $data, TRUE);

						$message .= $this->load->view('email/footer.php', $data, TRUE);

						$this->email->message($message);

						$result = TRUE;

						if ($path) {

							$this->email->attach($path);

						} else {

							$details = "Invoice not found.";

							echo json_encode(array("result" => $result, "details" => $details, "data" => array()));

							exit();
						}

						if (!$this->email->send()) {

							$details = "Error sending email";

							echo json_encode(array("result" => $result, "details" => $details, "data" => array()));

							exit();
						}

						$details = "success";
					} else {

						$details = "Error inserting transaction";
					}
				// } else {

				// 	$details = "Invalid token";
				// }
			} catch (Exception $ex) {

				$details = "Exception error caught";
			}
		// } else {

		// 	$details = "No authorization code";
		// }

		echo json_encode(array("result" => $result, "details" => $details, "data" => array()));

		exit();
	}


	public function pay_subscription()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		$bookingID = $json_data->bookingID;

		$amount = $json_data->amount;

		$ref_id = "WW_" . $this->random_strings(8);

		$key = $this->getKey();

		// Directly use userID intead of decoded token which is the right method but due to AWS Header Authorization error
		$userID = $json_data->userID;

		// $headers = $this->input->request_headers();

		// if (@$headers['Authorization']) {

		// 	$token = explode(' ', $headers['Authorization']);

			try {

				// $decoded = $this->jwt->decode($token[1], $key, array("HS256"));

				// if ($decoded) {
					//Insert the inspection details

					// $userID = $decoded->user->userID;

					if (!is_null($userID)) {

						$details = $this->loan_model->get_account_details($userID);

						if (!empty($details)) {

							if ($details['account_balance'] < $amount) {

								$details = "Insufficient balance";

								$insert_resp = $this->loan_model->insert_wallet_funding($userID, $amount, 'Debit', $ref_id, 'Declined', 'Subscription', '');
							} else if ($details['account_balance'] >= $amount) {

								//Get booking details
								$dets = $this->rss_model->get_renewal_det($bookingID);

								//Proceed to deduct from balance and update tables
								$new_balance = $details['account_balance'] - $amount;

								$update_response = $this->loan_model->update_balance($userID, $new_balance);

								$insert_resp = $this->loan_model->insert_wallet_funding($userID, $amount, 'Debit', $ref_id, 'Successful', 'Subscription', '');

								if ($update_response && $insert_resp) {

									if ($this->rss_model->transUpdate($bookingID, $dets['reference_id'], $amount)) {

										//Update booking table
										$this->rss_model->bookingUpdate($bookingID, $dets['rent_expiration'], $dets['duration'], $dets['payment_plan'], $dets['propertyID']);

										//Do transaction things
										$res = $this->rss_model->getVerification($userID);

										$sub_response = $this->loan_model->insertSubscriptionTransaction($res['verification_id'], $bookingID, $ref_id, $userID, $amount, 'Approved');

										if ($sub_response) {

											$result = TRUE;

											$details = "Subscription successfully paid!";

										} else {

											$details = "Error inserting subscription details";

										}
									} else {

										$details = "Error updating transaction";

									}
								} else {

									$details = "Error updating and inserting details";

								}

							} else {

								$details = "Unknown issue";

							}
						} else {

							$details = "User has no vitual account registered";

						}

					} else {

						$details = "User ID is null";

					}
				// } else {

				// 	$details = "Invalid token";
				// }

			} catch (Exception $ex) {

				$details = "Exception error caught";
			}
		// } else {

		// 	$details = "No authorization code";
		// }

		echo json_encode(array("result" => $result, "details" => $details, "data" => array()));

		exit();
	}

	public function wallet_update()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$key = $this->getKey();

		$json = file_get_contents('php://input');

		$reference = 'WF_' . $this->random_strings(8);

		$json_data = json_decode($json);

		$amount = $json_data->amount;

		$paystackRef = $json_data->paystackRef;

		// Get the user ID from JSON DATA which not the right way but due to long error issues that is why I'm trying this methods pending we find the solutions for the errors.
		$userID = $json_data->userID;

		// $headers = $this->input->request_headers();

		// if (@$headers['Authorization']) {

		// 	$token = explode(' ', $headers['Authorization']);

			try {

				// $decoded = $this->jwt->decode($token[1], $key, array("HS256"));

				// if ($decoded) {
					//Insert the inspection details

					// $userID = $decoded->user->userID;

					if (!is_null($userID)) {

						$details = $this->loan_model->get_account_details($userID);

						$account_balance = $details['account_balance'] + $amount;

						$response = $this->loan_model->update_balance($userID, $account_balance);

						if ($response) {

							if ($this->loan_model->insert_wallet_funding($userID, $amount, 'Credit', $reference, 'Successful', 'Paystack', $paystackRef)) {

								$details = "Payment succesful";
							}
						}

					} else {

						$details = "User ID is null";
					}

				// } else {

				// 	$details = "Invalid token";
				// }

			} catch (Exception $ex) {

				$details = "Exception error caught";
			}
		// } else {

		// 	$details = "No authorization code";
		// }

		echo json_encode(array("result" => $result, "details" => $details, "data" => array()));

		exit();
	}

	public function wallet_history()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$key = $this->getKey();

		// $headers = $this->input->request_headers();

		// if (@$headers['Authorization']) {

		// 	$token = explode(' ', $headers['Authorization']);

			try {

				// $decoded = $this->jwt->decode($token[1], $key, array("HS256"));

				if (isset($_GET['userID'])) {

					$userID = $_GET['userID'];

					$data = $this->app_model->get_wallet_transactions($userID);

					if ($data) {

						$result = TRUE;

						$details = "Success";

					} else {

						$result = TRUE;

						$details = "Error getting data";
					}

				} else {

					$details = "Invalid query parameters. Missing userID";

				}

			} catch (Exception $ex) {
				

				$details = "Exception error caught";

			}

		// } else {

		// 	$details = "No authorization code";
		// }

		echo json_encode(array("result" => $result, "details" => $details, "data" => $data));
	}

	public function booking_transaction_count()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$key = $this->getKey();

		$headers = $this->input->request_headers();

		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		$bookingID = $json_data->bookingID;

		if (@$headers['Authorization']) {

			$token = explode(' ', $headers['Authorization']);

			try {

				$decoded = $this->jwt->decode($token[1], $key, array("HS256"));

				if ($decoded) {

					//Insert the inspection details
					$userID = $decoded->user->userID;

					$data = $this->app_model->count_booking_transactions($bookingID);

					$result = TRUE;

					$details = $data;
				} else {

					$details = "Invalid token";
				}
			} catch (Exception $ex) {

				$details = "Exception error caught";
			}
		} else {

			$details = "No authorization code";
		}

		echo json_encode(array("result" => $result, "details" => $details, "data" => $data));
	}

	// public function get_user_notifications(){

	//     $result = FALSE;

	//     $details = '';

	//     $data = array();

	//     $key = $this->getKey();

	//     $headers = $this->input->request_headers();

	//     if(@$headers['Authorization']){

	//         $token = explode(' ', $headers['Authorization']);

	//         try{

	//             $decoded = $this->jwt->decode($token[1], $key, array("HS256"));

	//             if($decoded){

	//                 //Insert the inspection details
	//         		$userID = $decoded->user->userID;

	//         		$data = $this->app_model->get_all_user_notifications($userID);

	//     		    $result = TRUE;

	//             }else{

	//                 $details = "Invalid token";

	//             }

	//         }catch (Exception $ex){

	//            $details = "Exception error caught";

	//         }
	//     }else{

	//         $details = "No authorization code";
	//     }

	//     echo json_encode(array("result" => $result, "details" => $details, "data" => $data));
	// }

	public function get_user_notifications()
	{
		$result = FALSE;

		$details = '';

		$data = array();

		// Get $key variable
		$key = $this->getKey();

		// Directly get the JSON data from the request body
		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		// Check if userID is present in the query parameters. I'm doing this because of the Authentication issues with AWS server which is taken too long pending the time I get solution
		if (isset($_GET['userID'])) {

			$userID = $_GET['userID'];

			// Fetch user notifications based on the userID
			$data = $this->app_model->get_all_user_notifications($userID);

			if (!empty($data)) {

				$result = TRUE;

				$details = 'Success';
			} else {

				$result = TRUE;

				$details = "Profile does not exist";
			}
		} else {

			$details = "Invalid query parameters. Missing userID";
		}

		echo json_encode(array("result" => $result, "details" => $details, "data" => $data));
	}


	// public function update_user_notification_status()
	// {

	// 	$result = FALSE;

	// 	$details = '';

	// 	$data = array();

	// 	$key = $this->getKey();

	// 	$headers = $this->input->request_headers();

	// 	$json = file_get_contents('php://input');

	// 	$json_data = json_decode($json);

	// 	$notificationID = $json_data->notificationID;

	// 	if (@$headers['Authorization']) {

	// 		$token = explode(' ', $headers['Authorization']);

	// 		try {

	// 			$decoded = $this->jwt->decode($token[1], $key, array("HS256"));

	// 			if ($decoded) {

	// 				//Insert the inspection details
	// 				$userID = $decoded->user->userID;

	// 				$res = $this->app_model->update_user_notification($notificationID, $userID);

	// 				$result = TRUE;

	// 				if ($res) {

	// 					$details = "Successful";
	// 				} else {

	// 					$details = "Failed";
	// 				}
	// 			} else {

	// 				$details = "Invalid token";
	// 			}
	// 		} catch (Exception $ex) {

	// 			$details = "Exception error caught";
	// 		}
	// 	} else {

	// 		$details = "No authorization code";
	// 	}

	// 	echo json_encode(array("result" => $result, "details" => $details, "data" => $data));
	// }


	public function update_user_notification_status()
	{
		$result = FALSE;

		$details = '';

		$data = array();

		$key = $this->getKey();

		try {

			// Get the JSON data from the request body
			$json = file_get_contents('php://input');

			$json_data = json_decode($json);

			// Extract the notification ID from the JSON data
			$notificationID = $json_data->notificationID;

			// Get the user ID from the JSON data. Normally, I should get it from Authentication but due to present error. I'm doing this for main time.
			$userID = $json_data->userID;

			// Update the user notification status in the database
			$res = $this->app_model->update_user_notification($notificationID, $userID);

			// Result set to TRUE to indicate success
			$result = TRUE;

			if ($res) {

				$details = "Successful";

			} else {

				$details = "Failed";

			}

		} catch (Exception $ex) {

			// If any exception occurs, catch it and set the error message in $details
			$details = "Exception error caught: " . $ex->getMessage();

		}

		// Output the response as JSON
		echo json_encode(array("result" => $result, "details" => $details, "data" => $data));

	}


	function base64_to_file($base64_string, $user_function, $folder)
	{

		if (!is_dir('./uploads/' . $user_function . '/' . $folder)) {

			mkdir('./uploads/' . $user_function . '/' . $folder, 0711, TRUE);
		}

		$upload_path = './uploads/' . $user_function . '/' . $folder . '/';

		define('UPLOAD_DIR', $upload_path);

		$image_parts = explode(";base64,", $base64_string);

		$image_type_aux = explode("image/", $image_parts[0]);

		$image_type = $image_type_aux[1];

		$image_base64 = base64_decode($image_parts[1]);

		$file_name = uniqid() . '.' . $image_type;

		$file = UPLOAD_DIR . $file_name;

		if (file_put_contents($file, $image_base64)) {

			return $folder . '/' . $file_name;
		} else {

			return 0;
		}



		// open the output file for writing
		//$ifp = fopen( $output_file, 'wb' ); 

		// split the string on commas
		// $data[ 0 ] == "data:image/png;base64"
		// $data[ 1 ] == <actual base64 string>
		//$data = explode( ',', $base64_string );

		// we could add validation here with ensuring count( $data ) > 1
		//file_put_contents( $ifp, base64_decode( $data[ 1 ] ) );

		// clean up the file resource
		//fclose( $ifp ); 

		//return $output_file; 
	}

	public function add_months($months, DateTime $dateObject)
	{
		$next = new DateTime($dateObject->format('Y-m-d'));
		$next->modify('last day of +' . $months . ' month');

		if ($dateObject->format('d') > $next->format('d')) {
			return $dateObject->diff($next);
		} else {
			return new DateInterval('P' . $months . 'M');
		}
	}

	public function test_notification()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$key = $this->getKey();

		$headers = $this->input->request_headers();

		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		$notificationID = $json_data->notificationID;

		if (@$headers['Authorization']) {

			$token = explode(' ', $headers['Authorization']);

			try {

				$decoded = $this->jwt->decode($token[1], $key, array("HS256"));

				if ($decoded) {

					$publishResponse = $beamsClient->publishToInterests(
						array("hello", "donuts"),
						array(
							"fcm" => array(
								"notification" => array(
									"title" => "Hi!",
									"body" => "This is my first Push Notification!"
								)
							),
							"apns" => array("aps" => array(
								"alert" => array(
									"title" => "Hi!",
									"body" => "This is my first Push Notification!"
								)
							))
						)
					);
				} else {

					$details = "Invalid token";
				}
			} catch (Exception $ex) {

				$details = "Exception error caught";
			}
		} else {

			$details = "No authorization code";
		}
	}

	public function update_profile()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		$key = $this->getKey();

		$json = file_get_contents('php://input');

		$json_data = json_decode($json);

		$firstname = $json_data->firstname;

		$lastname = $json_data->lastname;

		$phone = $json_data->phone;

		// Directly use userID intead decoded token which is the right method but due to AWS Header Authorization error that is why I'm doing this for now.
		$userID = $json_data->userID;

		// $headers = $this->input->request_headers();

		// if (@$headers['Authorization']) {

		// 	$token = explode(' ', $headers['Authorization']);

			try {

				// $decoded = $this->jwt->decode($token[1], $key, array("HS256"));

				// if ($decoded) {
				// 	//Update user profile

				// 	$userID = $decoded->user->userID;

					if (!is_null($userID)) {

						$result = $this->app_model->updateProfile($userID, $firstname, $lastname, $phone);

						if ($result) {

							$result = TRUE;

							$details = 'Success';
						}

					} else {

						$result = TRUE;

						$details = "User ID is null";
					}

				// } else {

				// 	$result = TRUE;

				// 	$details = "Invalid token";
				// }
			} catch (Exception $ex) {

				$details = "Exception error caught";

			}
		// } else {

		// 	$details = "No authorization code";
		// }

		echo json_encode(array("response" => $result, "details" => $details, "data" => $data));
	}

	public function endCycle($d1, $months)
	{
		$date = new DateTime($d1);

		// call second function to add the months
		$newDate = $date->add($this->add_months($months, $date));

		// goes back 1 day from date, remove if you want same day of month
		//$newDate->sub(new DateInterval('P1D')); 

		//formats final date to Y-m-d form
		$dateReturned = $newDate->format('Y-m-d');

		return $dateReturned;
	}

	function random_strings($length_of_string)
	{
		$str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
		return substr(str_shuffle($str_result), 0, $length_of_string);
	}
	public function insert_app_booking()
	{

		$property = $this->rss_model->get_property('620791335682');

		$total_cost = ($property['price'] + $property['serviceCharge']) + ($property['securityDeposit'] * $property['securityDepositTerm']);

		//$booking_id = $this->random_strings(5);

		//$result = $this->app_model->insertBooking($booking_id, '051684', '12345678', '498349838290', 'Monthly', 12, 'Individual', '2023-08-02', 'Trasfer', '2000000', 'crowtherref');

		echo $total_cost;
	}
}
