<?php

defined('BASEPATH') or exit('No direct script access allowed');

$client = new \GuzzleHttp\Client();

//$beamsClient = new \PushePushNotifications\PushNotifications(array("instanceId" => "7a875a81-0a32-4474-aa9f-3064b42a2857", "secretKey" => "D1DE06AD6DE82E4DE9081BB39F994586E3B4FF020F6CBF653FA315E714A4E897"));

class Rss extends CI_Controller
{

	protected $response = '';

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

		//aws s3 integration
		// $this->load->library('aws_s3');
	}

	public function login_form()
	{

		$result = 'error';

		$user_type = '';

		$details = '';

		$username = strtolower($this->input->post('username'));

		$password = md5($this->input->post('password'));

		$users = $this->rss_model->login($username, $password);

		if ($users) {

			if (trim($users['confirmation']) == '' || $users['confirmation'] == '') {

				if ($users['referral'] != 'wordpress' && $users['password'] == $password) {

					//Update login date to now
					$this->rss_model->updateLoginDate($users['userID']);

					$key = $users['userID'];

					//Set session keys
					$userdata = array('userID' => $users['userID'], 'loggedIn' => 'yes', 'fname' => $users['firstName'], 'lname' => $users['lastName'], 'email' => $users['email'], 'verified' => $users['verified'], "user_type" => $users['user_type'], 'referral_code' => $users['referral_code'], 'rss_points' => $users['points'], 'interest' => $users['interest']);

					$this->session->set_userdata($userdata);
					//print_r($userdata);
					//Ok
					$result = "success";

					$user_type = $users['user_type'];
				} else if ($users['about_us'] != 'wordpress' && $users['password'] != $password) {

					$details = "Username/Password incorrect";
				} else {

					//Set session keys
					$userdata = array('tempID' => $users['userID']);

					$this->session->set_userdata($userdata);

					//redirect user to change password
					$result = 'redirect';
				}
			} else {

				$details = 'Account not confirmed!';
			}
		} else {

			$details =  "Account does not exist";
		}

		echo json_encode(array("details" => $details, "result" => $result, "user_type" => $user_type));
	}

	public function properties_old()
	{ // properties change to properties_old

		$config['total_rows'] = $this->rss_model->countProperties();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(2);

			$config['base_url'] = base_url() . 'properties';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->rss_model->setPageNumber($this->pagination->per_page);

			$this->rss_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$post_per_page = 12;

			$data['page_links'] = $this->pagination->create_links();

			$data['from_row'] = $offset + 1;

			$data['properties'] = $this->rss_model->fetchProperties();

			if (is_array($data['properties'])) {
				$data['to_row'] = $page_number * count($data['properties']);
			} else {
				$data['to_row'] = 0;
				$data['from_row'] = 0;
			}
		}

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['mob_color'] = "white";

		$data['mob_icons'] = "blue";

		$data['color'] = "white";

		$data['logo'] = "blue";

		$data['image'] = "without-image";

		//$data['condos'] = $this->rss_model->fetchAllProperties();
		//$states = array('2648', '2671');

		$countries = array('160');

		$data['min'] = $this->rss_model->get_min_rent();

		$data['max'] = $this->rss_model->get_max_rent();

		//$data['available_cities'] = $this->rss_model->fetchHomeCities($states);

		$data['available_states'] = $this->rss_model->fetchAvailableStates($countries);

		$data['apt_types'] = $this->rss_model->getPropTypes();

		$data['title'] = "Properties SmallSmall";

		$this->load->view('templates/rss-header', $data);

		$this->load->view('rss-partials/properties', $data);

		$this->load->view('templates/rss-footer', $data);
	}

	public function property_type($slug)
	{

		$config['total_rows'] = $this->rss_model->countPropertyType($slug);

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'type/' . $slug;

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->rss_model->setPageNumber($this->pagination->per_page);

			$this->rss_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$post_per_page = 12;

			$data['page_links'] = $this->pagination->create_links();

			$data['from_row'] = $offset + 1;

			$data['properties'] = $this->rss_model->fetchPropertyType($slug);

			if (is_array($data['properties'])) {
				$data['to_row'] = $page_number * count($data['properties']);
			} else {
				$data['to_row'] = 0;
				$data['from_row'] = 0;
			}
		}

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');
		}

		// 		$data['mob_color'] = "white";

		// 		$data['mob_icons'] = "blue";

		// 		$data['color'] = "white";

		// 		$data['logo'] = "blue";

		// 		$data['image'] = "without-image";

		//$data['condos'] = $this->rss_model->fetchAllProperties();
		$states = array('2648', '2671');

		$data['min'] = $this->rss_model->get_min_rent();

		$data['max'] = $this->rss_model->get_max_rent();

		$data['available_cities'] = $this->rss_model->fetchHomeCities($states);

		$data['apt_types'] = $this->rss_model->getPropTypes();

		$data['title'] = "Properties SmallSmall";

		//  	$this->load->view('templates/rss-header', $data);

		// 		$this->load->view('rss-partials/properties', $data);

		// 		$this->load->view('templates/rss-footer', $data);	

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('rss-partials/properties', $data);

		$this->load->view('templates/rss-updated-footer', $data);
	}

	public function areas_we_cover()
	{

		$city = $this->rss_model->get_city_name($this->uri->segment(2));

		$config['total_rows'] = $this->rss_model->countAreasWeCover($city['name']);

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'areas-we-cover/' . $this->uri->segment(2);

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->rss_model->setPageNumber($this->pagination->per_page);

			$this->rss_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$post_per_page = 10;

			$data['page_links'] = $this->pagination->create_links();

			$data['from_row'] = $offset + 1;

			$data['properties'] = $this->rss_model->fetchAreasWeCover($city['name']);

			if (is_array($data['properties'])) {

				$data['to_row'] = $page_number * count($data['properties']);
			} else {

				$data['to_row'] = 0;

				$data['from_row'] = 0;
			}
		}

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');
		}
		// 		$data['mob_color'] = "white";

		// 		$data['mob_icons'] = "blue";

		// 		$data['color'] = "white";

		// 		$data['logo'] = "blue";

		// 		$data['image'] = "without-image";

		$data['verification_status'] = $this->session->userdata('verified');

		$data['account_details'] = $this->rss_model->get_account_details($data['userID']);

		$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['curr_city']['name'] = $city['name'];

		$countries = array('160');

		$data['min'] = $this->rss_model->get_min_rent();

		$data['max'] = $this->rss_model->get_max_rent();

		//$data['available_cities'] = $this->rss_model->fetchHomeCities($states);

		$data['available_states'] = $this->rss_model->fetchAvailableStates($countries);

		//$data['condos'] = $this->rss_model->fetchAllProperties();

		$data['apt_types'] = $this->rss_model->getPropTypes();

		//$data['available_cities'] = $this->rss_model->fetchHomeCities($states);

		$data['title'] = "Properties SmallSmall";

		// 		$this->load->view('templates/rss-header', $data);

		// 		$this->load->view('rss-partials/properties', $data);

		// 		$this->load->view('templates/rss-footer');

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('rss-partials/properties', $data);

		$this->load->view('templates/rss-updated-footer', $data);
	}

	public function get_facilities($id)
	{

		$facilities = $this->rss_model->getNearbyFacilities($id);

		return $facilities;
	}

	public function get_admin($id)
	{

		$admin = $this->rss_model->get_admin($id);

		return $admin;
	}

	public function property($id)
	{

		$data['property'] = $this->rss_model->fetchProperty($id);

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['verified'] = $this->session->userdata('verified');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');
		}

		if ($this->session->has_userdata('userID')) {

			$data['verification_profile'] = $this->rss_model->verification_profile_checker($data['userID']);

			$data['check_inspection'] = $this->rss_model->check_inspection($data['userID'], $data['property']['propertyID']);
		}

		$data['mob_color'] = "white";

		$data['mob_icons'] = "blue";

		$data['color'] = "white";

		$data['logo'] = "blue";

		$data['image'] = "without-image";

		if (!empty($data['property'])) {

			//Update property views
			$views = intval($data['property']['views']) + 1;

			$this->rss_model->updateViews($views, $id);

			$data['rent_status'] = $this->rss_model->rent_status($data['property']['propertyID']);

			$data['relatedProps'] = $this->rss_model->fetchRelatedProperties($data['property']['propertyType'], 3);

			$data['load_boots'] = 'boots';

			$data['title'] = $data['property']['propertyTitle'] . " SmallSmall";

			$this->load->view('templates/rss-header', $data);

			$this->load->view('rss-partials/property', $data);

			$this->load->view('templates/rss-footer');
		} else {

			show_404();
		}
	}

	public function verification($page)
	{

		if ($this->session->has_userdata('userID')) {

			// $data['mob_color'] = "white";

			// $data['mob_icons'] = "blue";

			// $data['color'] = "white";

			// $data['logo'] = "blue";

			$data['image'] = "without-image";

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');

			//Get users detail 

			$user = $this->rss_model->get_user($data['userID']);

			$data['name'] = $user['firstName'] . ' ' . $user['lastName'];

			$data['phone'] = $user['phone'];

			$data['gender'] = $user['gender'];

			$data['title'] = "Profile Verification";

			// $this->load->view('templates/rss-header', $data);

			// $this->load->view('rss-partials/' . $page, $data);

			// $this->load->view('templates/rss-footer', $data);

			$this->load->view('templates/rss-updated-header', $data);

			$this->load->view('rss-partials/' . $page, $data);

			$this->load->view('templates/rss-updated-footer', $data);

		} else {

			//$userdata = array('page_link' => base_url().'verification/'.$page);

			//$_SESSION['page_link'] = base_url().'verification/'.$page;

			redirect(base_url() . 'login', 'refresh');
		}
	}
	public function signup()
	{

		if (!file_exists(APPPATH . 'views/rss-partials/signup.php')) {
			// Whoops, we don't have a page for that!

			show_404();
		}

		if (!$this->session->has_userdata('userID')) {

			//  $data['mob_color'] = "white"; 

			//  $data['mob_icons'] = "blue"; 

			//  $data['logo'] = "blue";

			$data['title'] = "Signup SmallSmall";

			$this->load->view('templates/rss-login-header', $data);

			// 			$this->load->view('templates/no-nav-header', $data);

			$this->load->view('rss-partials/signup', $data);

			// 			$this->load->view('templates/flat-footer', $data);


		} else {

			redirect(base_url(), 'refresh');
		}
	}

	public function login()
	{

		if (!file_exists(APPPATH . 'views/rss-partials/login.php')) {

			// Whoops, we don't have a page for that!

			show_404();
		}

		if (!$this->session->has_userdata('userID')) {

			//  $data['mob_color'] = "white"; 

			//  $data['mob_icons'] = "blue"; 

			//  $data['logo'] = "blue";

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['userId'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');

			$data['title'] = "Login SmallSmall";

			// 			$this->load->view('templates/no-nav-header', $data);

			$this->load->view('templates/rss-login-header', $data);

			$this->load->view('rss-partials/login', $data);

			// 			$this->load->view('templates/flat-footer', $data);


		} else {

			redirect(base_url(), 'refresh');
		}
	}

	public function reset_password()
	{

		if (!file_exists(APPPATH . 'views/rss-partials/password-reset.php')) {
			// Whoops, we don't have a page for that!

			show_404();
		}

		if (!$this->session->has_userdata('userID')) {

			$data['title'] = "Reset Password SmallSmall";

			$this->load->view('templates/rss-login-header', $data);

			$this->load->view('rss-partials/password-reset.php', $data);
		} else {

			redirect(base_url(), 'refresh');
		}
	}

	public function profile()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['interest'] = $this->session->userdata('interest');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$data['profile_pic'] = $this->rss_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['debt'] = $this->rss_model->get_debt($data['userID']);

			$data['ref_code'] = $this->rss_model->get_ref_code($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['profile_title'] = "Profile";

			$data['title'] = "Profile SmallSmall";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/profile', $data);

			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}
	public function renew_payment($transactionID)
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['interest'] = $this->session->userdata('interest');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['verification_status'] = $this->session->userdata('verified');

			$data['rss_transaction'] = $this->rss_model->checkRSSLastTrans($data['userID']);

			$data['debt'] = $this->rss_model->get_debt($data['userID']);

			$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

			$data['furnisure_transaction'] = $this->rss_model->checkFurnisureLastTrans($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['dets'] = $this->rss_model->get_renewal_det($transactionID);

			$data['profile_title'] = "Renew Payment";

			$data['title'] = "Renew SmallSmall";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/renewal-details', $data);

			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('templates/footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}
	public function pay_now($transactionID, $method)
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');

			$data['method'] = $method;

			$data['dets'] = $this->rss_model->get_renewal_det($transactionID);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['profile_title'] = "Pay Now";

			$data['title'] = "Pay Now";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/pay-now', $data);

			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	/*public function pay_now($transactionID){
        
		if($this->session->has_userdata('userID')){	
		    
		    //Get payment details
		    $data['dets'] = $this->rss_model->get_renewal_det($transactionID);
    		
    		$amount = $data['dets']['price'] + $data['dets']['serviceCharge'];
    		
    		$ref = $p_data['ref'];
    		
    		$method = $p_data['method'];
    		
			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');			

			$data['email'] = $this->session->userdata('email');		

			$data['user_type'] = $this->session->userdata('user_type');			
			
			$data['property'] = $this->rss_model->get_property($data['dets']['propertyID']);
			
			$data['profile_title'] = "Verify Payment";

			$data['title'] = "Renew SmallSmall";

			$this->load->view('templates/rss-header', $data);

			$this->load->view('rss-partials/verify-details', $data);

			$this->load->view('templates/rss-footer');			

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}		

	}*/
	public function verify_details()
	{

		if ($this->session->has_userdata('userID')) {

			$p_data = $this->session->userdata('payment');

			//Decrypt both parameters		
			$email = $p_data['email'];

			$amount = $p_data['amount'];

			$ref = $p_data['ref'];

			$method = $p_data['method'];

			$data['mob_color'] = "white";

			$data['mob_icons'] = "blue";

			$data['color'] = "white";

			$data['logo'] = "blue";

			$data['image'] = "without-image";

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');

			$data['dets'] = $this->rss_model->get_payment_details($ref);

			$data['property'] = $this->rss_model->get_property($data['dets']['propertyID']);

			$data['profile_title'] = "Verify Payment";

			$data['title'] = "Renew SmallSmall";

			$this->load->view('templates/rss-header', $data);

			$this->load->view('rss-partials/verify-details', $data);

			$this->load->view('templates/rss-footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}
	public function bookings()
	{

		//$data['stayone_bookings'] = $this->rss_model->get_stayone_bookings($data['userID']);

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['interest'] = $this->session->userdata('interest');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$data['rss_points'] = $this->rss_model->get_points($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['rss_transaction'] = $this->rss_model->checkRSSLastTrans($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['debt'] = $this->rss_model->get_debt($data['userID']);

			$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

			//$data['furnisure_transaction'] = $this->rss_model->checkFurnisureLastTrans($data['userID']);

			$data['bookings'] = $this->rss_model->get_bookings($data['userID']);

			$data['stayone_bookings'] = $this->rss_model->get_stayone_bookings($data['userID']);

			$data['profile_title'] = "Bookings";

			$data['title'] = "Profile SmallSmall";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/bookings', $data);

			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	function fetchBookings()
	{

		$output = '';

		$userID = $this->session->userdata('userID');

		$data = $this->rss_model->fetch_bookings($userID, $this->input->post('limit'), $this->input->post('start'));

		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {

				$output .= '<tr class="tr-content">
                                <td class="td-content"><div class="td-txt">' . $row->propertyTitle . '</div></td>
                                <td class="td-content"><div class="td-txt">' . $row->city . ', ' . $row->state_name . '</div></td>
                                <td class="td-content">' . $row->payment_plan . ' plan</td>
                                <td class="td-content"><span style="font-family:helvetica">&#x20A6;</span>' . number_format($row->price) . '</td>
                                <td class="td-content">' . date('d M, Y', strtotime($row->move_in_date)) . ' - ' . date('d M, Y', strtotime($row->rent_expiration)) . '</td>
                            </tr>';
			}
		}

		echo $output;
	}

	function fetchTransactions()
	{

		$output = '';

		$userID = $this->session->userdata('userID');

		$data = $this->rss_model->get_transactions($userID, $this->input->post('limit'), $this->input->post('start'));

		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {

				$stat = '';

				if (ucfirst($row->status) == 'Declined') {

					$stat = "red";
				} elseif (ucfirst($row->status) == 'Pending') {

					$stat = "orange";
				} elseif (ucfirst($row->status) == 'Approved') {

					$stat = "green";
				}

				$output .= '<tr class="tr-content">
                                <td class="td-content">' . ucfirst($row->payment_type) . '</td>
                                <td class="td-content"><div class="td-txt">' . $row->reference_id . '</div></td>
                                <td class="td-content">' . date('d M, Y', strtotime($row->transaction_date)) . '</td>
                                <td class="td-content"><span style="font-family:helvetica">&#x20A6;</span>' . number_format($row->amount) . '</td>
                                <td class="td-content"><span class="' . $stat . '-txt">' . ucfirst($row->status) . '</span></td>
                                <td class="td-content"><span class="download-icn"></span></td>
                            </tr>';
			}
		}

		echo $output;
	}


	function fetchTransaction()
	{

		$output = '';

		$userID = $this->session->userdata('userID');

		$data = $this->rss_model->get_transactions($userID, $this->input->post('limit'), $this->input->post('start'));

		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {

				$stat = '';

				if (ucfirst($row->status) == 'Declined') {

					$stat = "red";
				} elseif (ucfirst($row->status) == 'Pending') {

					$stat = "orange";
				} elseif (ucfirst($row->status) == 'Approved') {

					$stat = "green";
				}

				$output .= '<tr class="tr-content">
                                <td class="td-content">' . ucfirst($row->payment_type) . '</td>
                                <td class="td-content"><div class="td-txt">' . $row->reference_id . '</div></td>
                                <td class="td-content">' . date('d M, Y', strtotime($row->transaction_date)) . '</td>
                                <td class="td-content"><span style="font-family:helvetica">&#x20A6;</span>' . number_format($row->amount) . '</td>
                                <td class="td-content"><span class="' . $stat . '-txt">' . ucfirst($row->status) . '</span></td>
                            </tr>';
			}
		}

		echo $output;
	}

	function fetchWalletTransactions()
	{

		$output = '';

		$userID = $this->session->userdata('userID');

		$data = $this->rss_model->get_wallet_transactions($userID, $this->input->post('limit'), $this->input->post('start'));

		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {

				$stat = '';

				$type = '';

				if ($row->transaction_type == 'Debit') {

					$type = "red";
				} else {

					$type = "green";
				}

				if (ucfirst($row->status) == 'Declined') {

					$stat = "red";
				} elseif (ucfirst($row->status) == 'Pending') {

					$stat = "orange";
				} elseif (ucfirst($row->status) == 'Successful') {

					$stat = "green";
				}

				$output .= '<tr class="tr-content">
                                <td class="td-content"><span style="font-family:helvetica">&#x20A6;</span>' . number_format($row->amount) . '</td>
                                <td class="td-content"><div class="td-txt">' . $row->txn_id . '</div></td>
                                <td class="td-content"><span class="' . $type . '-txt">' . $row->transaction_type . '</span></td>
                                <td class="td-content">' . date('d M, Y', strtotime($row->transaction_date)) . '</td>
                                <td class="td-content"><span class="' . $stat . '-txt">' . ucfirst($row->status) . '</span></td>
                            </tr>';
			}
		}

		echo $output;
	}


	function fetchWalletTransaction()
	{

		$output = '';

		$userID = $this->session->userdata('userID');

		$data = $this->rss_model->get_wallet_transactions($userID, $this->input->post('limit'), $this->input->post('start'));

		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {

				$stat = '';

				$type = '';

				if ($row->transaction_type == 'Debit') {

					$type = "red";
				} else {

					$type = "green";
				}

				if (ucfirst($row->status) == 'Declined') {

					$stat = "red";
				} elseif (ucfirst($row->status) == 'Pending') {

					$stat = "orange";
				} elseif (ucfirst($row->status) == 'Successful') {

					$stat = "green";
				}

				$output .= '<tr class="tr-content">
                                <td class="td-content"><span style="font-family:helvetica">&#x20A6;</span>' . number_format($row->amount) . '</td>
                                <td class="td-content"><div class="td-txt">' . $row->txn_id . '</div></td>
                                <td class="td-content">' . date('d M, Y', strtotime($row->transaction_date)) . '</td>
                                <td class="td-content"><span class="' . $stat . '-txt">' . ucfirst($row->status) . '</span></td>
                            </tr>';
			}
		}

		echo $output;
	}

	function fetchPayouts()
	{

		$output = '';

		$userID = $this->session->userdata('userID');

		$date_from = '';

		$date_to = '';

		if ($this->input->post('date_from') != '') {

			$date_from = date('Y-m-d', strtotime($this->input->post('date_from')));
		}

		if ($this->input->post('date_to') != '') {

			$date_to = date('Y-m-d', strtotime($this->input->post('date_to')));
		}

		$data = $this->rss_model->get_payouts($userID, $this->input->post('limit'), $this->input->post('start'), $date_from, $date_to);

		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {

				$output .= '<tr class="tr-content">
                                <td class="td-content"><span style="font-family:helvetica">&#x20A6;</span>' . number_format($row->amount_paid) . '</td>
                                <td class="td-content">' . date('d M, Y', strtotime($row->payout_date)) . '</td>
                                <td class="td-content"><span class="green-txt">' . $row->status . '</span></td>
                                <td class="td-content"><span class="download-icn"></span></td>
                            </tr>';
			}
		}

		echo $output;
	}

	public function fetchCreditHistory()
	{

		$output = '';

		$userID = $this->session->userdata('userID');

		$data = $data['transactions'] = $this->rss_model->get_credit($userID, $this->input->post('limit'), $this->input->post('start'));

		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {

				$stat = '';

				if (ucfirst($row->status) == 'Declined') {

					$stat = "red";
				} elseif (ucfirst($row->status) == 'Pending') {

					$stat = "orange";
				} elseif (ucfirst($row->status) == 'Approved') {

					$stat = "green";
				}

				$output .= '<tr class="tr-content">
                                <td class="td-content"><span style="font-family:helvetica">&#x20A6;</span>' . number_format($row->amountBorrowed) . '</td>
                                <td class="td-content"><span style="font-family:helvetica">&#x20A6;</span>' . number_format($row->amount_due) . '</td>
                                <td class="td-content"><div class="td-txt">' . $row->loanID . '</div></td>
                                <td class="td-content">' . date('M d, Y', strtotime($row->date_of_request)) . '</td>
                                <td class="td-content"><span class="' . $stat . '-txt">' . $row->status . '</span></td>
                            </tr>';
			}
		}

		echo $output;
	}
	function fetchStayoneBookings()
	{

		$output = '';

		$userID = $this->session->userdata('userID');

		$data = $this->rss_model->fetch_stayone_bookings($userID, $this->input->post('limit'), $this->input->post('start'));

		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {

				$output .= '<tr class="tr-content">
                                <td class="td-content"><div class="td-txt">' . $row->apartmentName . '</div></td>
                                <td class="td-content"><div class="td-txt">' . $row->city . ', ' . $row->state_name . '</div></td>
                                <td class="td-content">Nightly</td>
                                <td class="td-content"><span style="font-family:helvetica">&#x20A6;</span>' . number_format($row->price) . '</td>
                                <td class="td-content">' . date('d M, Y', strtotime($row->checkin)) . ' - ' . date('d M, Y', strtotime($row->checkout)) . '</td>
                            </tr>';
			}
		}

		echo $output;
	}

	function fetchRepairs()
	{

		$output = '';

		$userID = $this->session->userdata('userID');

		$data = $this->rss_model->fetch_repairs($userID, $this->input->post('limit'), $this->input->post('start'));

		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {

				$fixed_on = '';

				if (is_null($row->fixed_on)) {
					$fixed_on = "Not fixed";
				} else {
					$fixed_on = date('d M, Y', strtotime($row->fixed_on));
				}

				$stat = '';

				if (ucfirst($row->repair_status) == 'Logged') {

					$stat = "red";
				} elseif (ucfirst($row->repair_status) == 'Processing') {

					$stat = "orange";
				} elseif (ucfirst($row->repair_status) == 'Completed') {

					$stat = "green";
				}

				$output .= '<tr class="tr-content">
                                <td class="td-content"><div class="td-txt">' . $row->repair_category . '</div></td>
                                <td class="td-content">' . date('d M, Y', strtotime($row->entry_date)) . '</td>
                                <td class="td-content"><div class="td-txt">' . $fixed_on . '</div></td>
                                <td class="td-content ' . $stat . '-txt">' . $row->repair_status . '</td>
                            </tr>';
			}
		}

		echo $output;
	}
	function fetchInspections()
	{

		$output = '';

		$userID = $this->session->userdata('userID');

		$data = $this->rss_model->fetch_inspections($userID, $this->input->post('limit'), $this->input->post('start'));

		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {

				$output .= '<tr class="tr-content">
                                <td class="td-content"><div target="_blank" class="td-txt"><a href="' . base_url() . 'property/' . $row->propertyID . '">' . $row->propertyTitle . '</a></div></td>
                                <td class="td-content"><div class="td-txt">' . $row->city . ', ' . $row->state_name . '</div></td>
                                <td class="td-content"><span style="font-family:helvetica">&#x20A6;</span>' . number_format($row->price) . '</td>
                                <td class="td-content">' . date('d M, Y', strtotime($row->dateOfEntry)) . '</td>
                            </tr>';
			}
		}

		echo $output;
	}


	function fetchInspection()
	{

		$output = '';

		$userID = $this->session->userdata('userID');

		$data = $this->rss_model->fetch_inspections($userID, $this->input->post('limit'), $this->input->post('start'));

		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {

				$output .= '<tr class="tr-content">
                                <td class="td-content"><div target="_blank" class="td-txt">' . $row->propertyTitle . '</div></td>
                                <td class="td-content"><div class="td-txt">' . $row->city . ', ' . $row->state_name . '</div></td>
                                <td class="td-content"><span style="font-family:helvetica">&#x20A6;</span>' . number_format($row->price) . '</td>
                                <td class="td-content">' . date('d M, Y', strtotime($row->dte)) . '</td>
								<td>
								<a href="' . base_url() . 'property/' . $row->propertyID . '"><input type="button" class="btn secondary-background" value = "View"></a>
                                </td>
                            </tr>';
			}
		}

		echo $output;
	}


	public function messages()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$data['rss_points'] = $this->rss_model->get_points($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['profile_pic'] = $this->rss_model->get_user_pic($data['userID']);

			$data['rss_transaction'] = $this->rss_model->checkRSSLastTrans($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['debt'] = $this->rss_model->get_debt($data['userID']);

			$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

			$data['furnisure_transaction'] = $this->rss_model->checkFurnisureLastTrans($data['userID']);

			//$data['messages'] = $this->rss_model->get_messages($data['userID']);		

			$data['profile_title'] = "Messages";

			$data['title'] = "Profile SmallSmall";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/messages', $data);

			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}
	public function my_inspections()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$data['rss_points'] = $this->rss_model->get_points($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['profile_pic'] = $this->rss_model->get_user_pic($data['userID']);

			$data['rss_transaction'] = $this->rss_model->checkRSSLastTrans($data['userID']);

			$data['debt'] = $this->rss_model->get_debt($data['userID']);

			$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['furnisure_transaction'] = $this->rss_model->checkFurnisureLastTrans($data['userID']);

			$data['profile_title'] = "Inspections";

			$data['title'] = "Profile SmallSmall";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/inspections', $data);

			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	function fetchMessages()
	{

		$output = '';

		$userID = $this->session->userdata('userID');

		$data = $this->rss_model->fetch_messages($userID, $this->input->post('limit'), $this->input->post('start'));

		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {

				$output .= '<div class="inbox-item">
                                <div class="msg-head">
                                    <div class="msg-sender">' . $row->firstName . ' ' . $row->lastName . '</div>
                                    <div class="msg-stat">
                                        <div id="message-stat-' . $row->msg_id . '" class="stat-ball ' . $row->status . '"></div>
                                    </div>
                                    <div class="msg-date">Today</div>
                                </div>
                                <div class="msg-subject">' . $row->subject . '</div>
                                <div class="msg-inbox-body">
                                    ' . $row->content . '
                                </div>
                                <div id="message-' . $row->msg_id . '" class="open-msg subscribers unread-msg msg-action-btn check-msg open-message">Open</div>
                            	<input type="hidden" id="message-id-' . $row->msg_id . '" value="' . $row->requestID . '" />									

								<input type="hidden" id="receiver-id-' . $row->msg_id . '" value="' . $row->sender . '" />

								<input type="hidden" id="subject-' . $row->msg_id . '" value="' . $row->subject . '" />
                            </div>';
			}
		}

		echo $output;
	}

	// function fetchMessage(){

	//     $output = '';

	//     $userID = $this->session->userdata('userID');

	//     $data = $this->rss_model->fetch_message($userID, $this->input->post('limit'), $this->input->post('start'));

	//     if($data->num_rows() > 0){

	//         $date = ''; 

	//         foreach($data->result() as $row){

	//             if($row->status == 1){

	//             $date1 = $row->entry_date;

	//             if($date1 != $date)
	//             {
	//                 $output .= '<div class="col-12 mb-3">
	// 				<p class="secondary-text-color">'.$row->entry_date.'</p>
	// 			  </div>';

	// 			  $date = $row->entry_date;
	//             }

	// 		  $output .= '<div class="col-12 mb-3" data-toggle="modal" data-target="#example'.$row->id.'">
	// 			<div class="message-container--latest px-3 py-4 justify-content-between d-flex">
	// 			  <div class="d-flex align-items-center">
	// 				<div class="bss-btn px-3 py-2  mr-md-5 d-none d-md-block">
	// 				  Rentsmallsmall
	// 				</div>
	// 				<div class="bss-btn p-2  mr-2 d-md-none d-block">
	// 				  RSS
	// 				</div>
	// 				<div class="msg-intro">
	// 				  <p>'.$row->subject.'</p>
	// 				  <p style="font-size: 13px;">'.substr($row->details, 0, 14).'...</p>
	// 				</div>
	// 			  </div>
	// 			  <div class="align-self-center mr-md-4 mr-1">
	// 				<i class="fa-solid fa-greater-than"></i>
	// 			  </div>
	// 			</div>
	// 		  </div>

	// 		  <!-- Modal -->
	// 		  <div class="modal fade" id="example'.$row->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	// 			aria-hidden="true">
	// 			<div class="modal-dialog " role="document">
	// 			  <div class="modal-content primary-background">
	// 				<div class="modal-header">
	// 				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	// 					<span aria-hidden="true">&times;</span>
	// 				  </button>
	// 				</div>
	// 				<div class="modal-body">
	// 				  <div class="py-4">
	// 					<p class="mb-4">'.$row->entry_date.'</p>
	// 					<h5 class="mb-4">'.$row->subject.'</h5>
	// 					<div class=" d-flex align-items-center ">
	// 					  <div class="inbox-msg-icon py-3  mr-2">
	// 						<div class="msg-icon d-flex justify-content-center align-items-center">RSS</div>
	// 					  </div>
	// 					  <div class="flex-grow-1  py-3 pl-2 text-dark">
	// 						<p style="font-size: 14px; font-weight: 400;">Rentsmallsmall</p>
	// 					  </div>
	// 					</div>
	// 					<div class="inbox-body">
	// 					  <p class="mb-4">'.$row->details.'</p>
	// 					  <p class="mb-4">Please feel free to reach out to us.</p>
	// 					  <p class="mb-4">Regards,<br>
	// 						RSS Customer Experience</p>
	// 					</div>

	// 				  </div>
	// 				</div>

	// 			  </div>
	// 			</div>
	// 		  </div>';

	//             }

	//             else{

	//                 $date1 = $row->entry_date;

	//                 if($date1 != $date)
	//                 {
	//                     $output .= '<div class="col-12 mb-3">
	//     				<p class="secondary-text-color">'.$row->entry_date.'</p>
	//     			  </div>';

	//     			  $date = $row->entry_date;
	//                 }

	//                          $output .= '<div class="col-12 mb-3" data-toggle="modal" data-target="#example'.$row->id.'">
	//                             <div class="message-container px-3 py-4 justify-content-between d-flex">
	//                               <div class="d-flex align-items-center">
	//                                 <div class="bss-btn px-3 py-2  mr-md-5 d-none d-md-block">
	//                                   Rentsmallsmall
	//                                 </div>
	//                                 <div class="bss-btn p-2  mr-2 d-md-none d-block">
	//                                   RSS
	//                                 </div>
	//                                 <div class="msg-intro">
	//                                   <p>'.$row->subject.'</p>
	//                                   <p style="font-size: 13px;">'.substr($row->details, 0, 14).'...</p>
	//                                 </div>
	//                               </div>
	//                               <div class="align-self-center mr-md-4 mr-1">
	//                                 <i class="fa-solid fa-greater-than"></i>
	//                               </div>
	//                             </div>
	//                           </div>

	//                           <!-- Modal -->
	//         			  <div class="modal fade" id="example'.$row->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	//         				aria-hidden="true">
	//         				<div class="modal-dialog " role="document">
	//         				  <div class="modal-content primary-background">
	//         					<div class="modal-header">
	//         					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	//         						<span aria-hidden="true">&times;</span>
	//         					  </button>
	//         					</div>
	//         					<div class="modal-body">
	//         					  <div class="py-4">
	//         						<p class="mb-4">'.$row->entry_date.'</p>
	//         						<h5 class="mb-4">'.$row->subject.'</h5>
	//         						<div class=" d-flex align-items-center ">
	//         						  <div class="inbox-msg-icon py-3  mr-2">
	//         							<div class="msg-icon d-flex justify-content-center align-items-center">RSS</div>
	//         						  </div>
	//         						  <div class="flex-grow-1  py-3 pl-2 text-dark">
	//         							<p style="font-size: 14px; font-weight: 400;">Rentsmallsmall</p>
	//         						  </div>
	//         						</div>
	//         						<div class="inbox-body">
	//         						  <p class="mb-4">'.$row->details.'</p>
	//         						  <p class="mb-4">Please feel free to reach out to us.</p>
	//         						  <p class="mb-4">Regards,<br>
	//         							RSS Customer Experience</p>
	//         						</div>

	//         					  </div>
	//         					</div>

	//         				  </div>
	//         				</div>
	//         			  </div>';
	//             }

	//         }

	//     }

	//     echo $output;

	// }

	function fetchMessage()
	{

		$output = '';

		$userID = $this->session->userdata('userID');

		$data = $this->rss_model->fetch_message($userID, $this->input->post('limit'), $this->input->post('start'));

		if ($data->num_rows() > 0) {

			$date = '';

			foreach ($data->result() as $row) {

				if ($row->status == 0) {

					$date1 = $row->entry_date;

					if ($date1 != $date) {
						$output .= '<br></br><div class="row mb-4">
                    
                    <div class="col-12 mb-3">
    				<p class="secondary-text-color">' . $row->entry_date . '</p>
    			  </div>';

						$date = $row->entry_date;
					}

					$output .= '
                  <div class="col-12" onClick= insVal(' . $row->id . ') data-toggle="modal" data-target="#example' . $row->id . '">
                    <div class="message-container-border">
                      <div class="message-container--latest px-3 py-4 justify-content-between d-flex">
                        <div class="d-flex align-items-center">
                          <div class="bss-btn px-3 py-2  mr-md-5 d-none d-md-flex">
                            RSS
                          </div>
                          <div class="bss-btn p-2  mr-2 d-md-none d-flex">
                            RSS
                          </div>
                          <div class="msg-intro">
                            <p>' . $row->subject . '</p>
                            <p style="font-size: 13px;">' . substr($row->details, 0, 14) . '...</p>
                          </div>
                        </div>
                        <!-- <div class="align-self-center mr-md-4 mr-1">
                                  <i class="fa-solid fa-greater-than"></i>
                                </div> -->
                      </div>
                    </div>
                  </div>
            
                  <!-- Modal -->
                  <div class="modal fade" id="example' . $row->id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog " role="document">
                      <div class="modal-content primary-background">
                        <div class="modal-header" style="border: none;">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body p-md-5 p-3">
                          <div class="py-4">
                            <p class="mb-4">' . $row->entry_date . '</p>
                            <h5 class="mb-4">' . $row->subject . '</h5>
                            <div class=" d-flex align-items-center ">
                              <div class="inbox-msg-icon py-3  mr-2">
                                <div class="msg-icon d-flex justify-content-center align-items-center">CX</div>
                              </div>
                              <div class="flex-grow-1  py-3 pl-2 text-dark">
                                <p style="font-size: 14px; font-weight: 400;">Customer Experience</p>
                              </div>
                            </div>
                            <div class="inbox-body">
                              <p class="mb-4">' . $row->details . '</p>
                              <p class="mb-4">Please feel free to reach out to us.</p>
                              <p class="mb-4">Regards,<br>
                                RSS Customer Experience</p>
                            </div>
            
                          </div>
                        </div>
            
                      </div>
                    </div>
                  </div>';
				} else {

					$date1 = $row->entry_date;

					if ($date1 != $date) {
						$output .= '<br></br><div class="col-12 mb-3">
        				<p class="secondary-text-color">' . $row->entry_date . '</p>
        			  </div>';

						$date = $row->entry_date;
					}

					$output .= '
                          <div class="col-12">
                            <div class="message-container-border">
                              <div class="message-container px-3 py-4 justify-content-between d-flex">
                                <div class="d-flex align-items-center">
                                  <div class="bss-btn px-3 py-2  mr-md-5 d-none d-md-flex">
                                    RSS
                                  </div>
                                  <div class="bss-btn p-2  mr-2 d-md-none d-flex">
                                    RSS
                                  </div>
                                  <div class="msg-intro" data-toggle="modal" data-target="#example' . $row->id . '">
                                    <p>' . $row->subject . '</p>
                                    <p style="font-size: 13px;">' . substr($row->details, 0, 14) . '...</p>
                                  </div>
                                </div>
                                <!-- <div class="align-self-center mr-md-4 mr-1">
                                <i class="fa-solid fa-greater-than"></i>
                              </div> -->
                              </div>
                            </div>
                            </div>
                                                  
                              <!-- Modal -->
            			  <div class="modal fade" id="example' . $row->id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            				aria-hidden="true">
            				<div class="modal-dialog " role="document">
            				  <div class="modal-content primary-background">
            					<div class="modal-header">
            					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            						<span aria-hidden="true">&times;</span>
            					  </button>
            					</div>
            					<div class="modal-body">
            					  <div class="py-4">
            						<p class="mb-4">' . $row->entry_date . '</p>
            						<h5 class="mb-4">' . $row->subject . '</h5>
            						<div class=" d-flex align-items-center ">
            						  <div class="inbox-msg-icon py-3  mr-2">
            							<div class="msg-icon d-flex justify-content-center align-items-center">RSS</div>
            						  </div>
            						  <div class="flex-grow-1  py-3 pl-2 text-dark">
            							<p style="font-size: 14px; font-weight: 400;">Rentsmallsmall</p>
            						  </div>
            						</div>
            						<div class="inbox-body">
            						  <p class="mb-4">' . $row->details . '</p>
            						  <p class="mb-4">Please feel free to reach out to us.</p>
            						  <p class="mb-4">Regards,<br>
            							RSS Customer Experience</p>
            						</div>
            		
            					  </div>
            					</div>
            		
            				  </div>
            				</div>
            			  </div>';
				}
			}
		}

		echo $output;
	}


	function fetchLandlordMessages()
	{

		$output = '';

		$userID = $this->session->userdata('userID');

		$data = $this->rss_model->fetch_landlord_messages($userID, $this->input->post('limit'), $this->input->post('start'));

		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {

				$output .= '<div class="inbox-item">
                                <div class="msg-head">
                                    <div class="msg-sender">' . $row->firstName . ' ' . $row->lastName . '</div>
                                    <div class="msg-stat">
                                        <div id="message-stat-' . $row->msg_id . '" class="stat-ball ' . $row->status . '"></div>
                                    </div>
                                    <div class="msg-date">Today</div>
                                </div>
                                <div class="msg-subject">' . $row->subject . '</div>
                                <div class="msg-body">
                                    ' . $row->content . '
                                </div>
                                <div id="message-' . $row->msg_id . '" class="open-msg subscriber unread-msg msg-action-btn check-msg open-message">Open</div>
                            	<input type="hidden" id="message-id-' . $row->msg_id . '" value="' . $row->messageID . '" />									

								<input type="hidden" id="receiver-id-' . $row->msg_id . '" value="' . $row->sender . '" />

								<input type="hidden" id="subject-' . $row->msg_id . '" value="' . $row->subject . '" />
                            </div>';
			}
		}

		echo $output;
	}

	
	function fetchLandlordMessage()
	{

		$output = '';

		$userID = $this->session->userdata('userID');

		$data = $this->rss_model->fetch_Landlordmessage($userID, $this->input->post('limit'), $this->input->post('start'));

		if ($data->num_rows() > 0) {

			$date = '';

			foreach ($data->result() as $row) {

				if ($row->status == 0) {

					$date1 = $row->entry_date;

					if ($date1 != $date) {
						$output .= '<br></br><div class="row mb-4">
                    
                    <div class="col-12 mb-3">
    				<p class="secondary-text-color">' . $row->entry_date . '</p>
    			  </div>';

						$date = $row->entry_date;
					}

					$output .= '
                  <div class="col-12" onClick= insVal(' . $row->id . ') data-toggle="modal" data-target="#example' . $row->id . '">
                    <div class="message-container-border">
                      <div class="message-container--latest px-3 py-4 justify-content-between d-flex">
                        <div class="d-flex align-items-center">
                          <div class="bss-btn px-3 py-2  mr-md-5 d-none d-md-flex">
                            RSS
                          </div>
                          <div class="bss-btn p-2  mr-2 d-md-none d-flex">
                            RSS
                          </div>
                          <div class="msg-intro">
                            <p>' . $row->subject . '</p>
                            <p style="font-size: 13px;">' . substr($row->details, 0, 14) . '...</p>
                          </div>
                        </div>
                        <!-- <div class="align-self-center mr-md-4 mr-1">
                                  <i class="fa-solid fa-greater-than"></i>
                                </div> -->
                      </div>
                    </div>
                  </div>
            
                  <!-- Modal -->
                  <div class="modal fade" id="example' . $row->id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog " role="document">
                      <div class="modal-content primary-background">
                        <div class="modal-header" style="border: none;">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body p-md-5 p-3">
                          <div class="py-4">
                            <p class="mb-4">' . $row->entry_date . '</p>
                            <h5 class="mb-4">' . $row->subject . '</h5>
                            <div class=" d-flex align-items-center ">
                              <div class="inbox-msg-icon py-3  mr-2">
                                <div class="msg-icon d-flex justify-content-center align-items-center">CX</div>
                              </div>
                              <div class="flex-grow-1  py-3 pl-2 text-dark">
                                <p style="font-size: 14px; font-weight: 400;">Customer Experience</p>
                              </div>
                            </div>
                            <div class="inbox-body">
                              <p class="mb-4">' . $row->details . '</p>
                              <p class="mb-4">Please feel free to reach out to us.</p>
                              <p class="mb-4">Regards,<br>
                                RSS Customer Experience</p>
                            </div>
            
                          </div>
                        </div>
            
                      </div>
                    </div>
                  </div>';
				} else {

					$date1 = $row->entry_date;

					if ($date1 != $date) {
						$output .= '<br></br><div class="col-12 mb-3">
        				<p class="secondary-text-color">' . $row->entry_date . '</p>
        			  </div>';

						$date = $row->entry_date;
					}

					$output .= '
                          <div class="col-12">
                            <div class="message-container-border">
                              <div class="message-container px-3 py-4 justify-content-between d-flex">
                                <div class="d-flex align-items-center">
                                  <div class="bss-btn px-3 py-2  mr-md-5 d-none d-md-flex">
                                    RSS
                                  </div>
                                  <div class="bss-btn p-2  mr-2 d-md-none d-flex">
                                    RSS
                                  </div>
                                  <div class="msg-intro" data-toggle="modal" data-target="#example' . $row->id . '">
                                    <p>' . $row->subject . '</p>
                                    <p style="font-size: 13px;">' . substr($row->details, 0, 14) . '...</p>
                                  </div>
                                </div>
                                <!-- <div class="align-self-center mr-md-4 mr-1">
                                <i class="fa-solid fa-greater-than"></i>
                              </div> -->
                              </div>
                            </div>
                            </div>
                                                  
                              <!-- Modal -->
            			  <div class="modal fade" id="example' . $row->id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            				aria-hidden="true">
            				<div class="modal-dialog " role="document">
            				  <div class="modal-content primary-background">
            					<div class="modal-header">
            					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            						<span aria-hidden="true">&times;</span>
            					  </button>
            					</div>
            					<div class="modal-body">
            					  <div class="py-4">
            						<p class="mb-4">' . $row->entry_date . '</p>
            						<h5 class="mb-4">' . $row->subject . '</h5>
            						<div class=" d-flex align-items-center ">
            						  <div class="inbox-msg-icon py-3  mr-2">
            							<div class="msg-icon d-flex justify-content-center align-items-center">RSS</div>
            						  </div>
            						  <div class="flex-grow-1  py-3 pl-2 text-dark">
            							<p style="font-size: 14px; font-weight: 400;">Rentsmallsmall</p>
            						  </div>
            						</div>
            						<div class="inbox-body">
            						  <p class="mb-4">' . $row->details . '</p>
            						  <p class="mb-4">Please feel free to reach out to us.</p>
            						  <p class="mb-4">Regards,<br>
            							RSS Customer Experience</p>
            						</div>
            		
            					  </div>
            					</div>
            		
            				  </div>
            				</div>
            			  </div>';
				}
			}
		}

		echo $output;
	}

	public function wallet()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');

			$data['rss_points'] = $this->rss_model->get_points($data['userID']);

			//Change this as soon as we migrate tables
			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$check_bvn = $this->rss_model->checkBVN($data['userID']);

			$data['profile_pic'] = $this->rss_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['rss_transaction'] = $this->rss_model->checkRSSLastTrans($data['userID']);

			$data['new_subscription'] = $this->rss_model->checkLastApprovedSubscriptionPayment($data['userID']);

			$data['rss_paid'] = $this->rss_model->checkSubsequentPayment($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['debt'] = $this->rss_model->get_debt($data['userID']);

			$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

			$data['furnisure_transaction'] = $this->rss_model->checkFurnisureLastTrans($data['userID']);

			$data['account_details'] = $this->rss_model->get_account_details($data['userID']);

			$data['profile_title'] = "Wallet";

			$data['title'] = "Wallet SmallSmall";

			$data['bvn'] = $check_bvn['bvn'];

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/wallet', $data);

			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('rss-partials/user/modals/wallet-funding-modal', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function credit()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$data['rss_points'] = $this->rss_model->get_points($data['userID']);

			$data['profile_pic'] = $this->rss_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['rss_transaction'] = $this->rss_model->checkRSSLastTrans($data['userID']);

			$data['debt'] = $this->rss_model->get_debt($data['userID']);

			$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

			$data['requested_credit'] = $this->rss_model->get_requested_credit($data['userID']);

			$data['account_details'] = $this->rss_model->get_account_details($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['profile_title'] = "Credit";

			$data['title'] = "Credit SmallSmall";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/credit', $data);

			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('rss-partials/user/modals/credit-modal', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function transactions()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');

			$data['rss_points'] = $this->rss_model->get_points($data['userID']);

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$data['profile_pic'] = $this->rss_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['rss_transaction'] = $this->rss_model->checkRSSLastTrans($data['userID']);

			$data['debt'] = $this->rss_model->get_debt($data['userID']);

			$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

			$data['transactions'] = $this->rss_model->all_transactions($data['userID']);

			$data['furnisure_transaction'] = $this->rss_model->checkFurnisureLastTrans($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['profile_title'] = "Transactions";

			$data['title'] = "Profile SmallSmall";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/transactions', $data);

			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function get_property($propID)
	{

		$props = $this->rss_model->get_property($propID);

		return $props;
	}
	public function get_transaction($bookingID)
	{

		return $this->rss_model->get_transaction($bookingID);
	}
	public function get_user($id)
	{

		$user = $this->rss_model->get_user($id);

		return $user;
	}

	public function dashboard()
	{

		if (!file_exists(APPPATH . 'views/rss-partials/user/dashboard.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$data['profile_pic'] = $this->rss_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['rss_transaction'] = $this->rss_model->checkRSSLastTrans($data['userID']);

			$data['debt'] = $this->rss_model->get_debt($data['userID']);

			$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);

			$data['profile_title'] = "Dashboard";

			$data['title'] = "Dashboard";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/dashboard', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function property_rating()
	{

		if (!file_exists(APPPATH . 'views/rss-partials/user/property-rating.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$data['profile_pic'] = $this->rss_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['rss_transaction'] = $this->rss_model->checkRSSLastTrans($data['userID']);

			$data['debt'] = $this->rss_model->get_debt($data['userID']);

			$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

			$data['furnisure_transaction'] = $this->rss_model->checkFurnisureLastTrans($data['userID']);

			$data['booking'] = $this->rss_model->getLastBookingDetails($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['profile_title'] = "Rating";

			$data['title'] = "Property Rating";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/property-rating', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function feedback()
	{

		if (!file_exists(APPPATH . 'views/rss-partials/user/property-rating.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$data['profile_pic'] = $this->rss_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['debt'] = $this->rss_model->get_debt($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);


			$data['profile_title'] = "Feedback";

			$data['title'] = "Feedback SmallSmall";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/feedback', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}


	public function repairs()
	{

		if (!file_exists(APPPATH . 'views/rss-partials/user/repairs.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$data['profile_pic'] = $this->rss_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['rss_transaction'] = $this->rss_model->checkRSSLastTrans($data['userID']);

			$data['debt'] = $this->rss_model->get_debt($data['userID']);

			$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['booking'] = $this->rss_model->getLastBookingDetails($data['userID']);

			$data['profile_title'] = "Repairs";

			$data['title'] = "Property Repairs SmallSmall";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/repairs', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}



	public function native_square()
	{

		if (!file_exists(APPPATH . 'views/rss-partials/user/native-square.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$data['profile_pic'] = $this->rss_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['rss_transaction'] = $this->rss_model->checkRSSLastTrans($data['userID']);

			$data['debt'] = $this->rss_model->get_debt($data['userID']);

			$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			//$booking = $this->rss_model->checkLastBooking($data['userID']);

			$data['profile_title'] = "Square";

			$data['title'] = "Native Square SmallSmall";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/native-square', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function checkLastBooking($id)
	{

		return $this->rss_model->checkLastBooking($id);
	}
	public function checkLastFurnisureOrder($id)
	{

		return $this->rss_model->checkLastFurnisureOrder($id);
	}

	public function signup_form()
	{

		require 'vendor/autoload.php'; // For Unione template authoload

		$ua = $_SERVER['HTTP_USER_AGENT'];

		$fname = $this->input->post('fname');

		$lname = $this->input->post('lname');

		$email = strtolower($this->input->post('email'));

		$password = md5($this->input->post('password'));

		$phone = $this->input->post('phone');

		$income = $this->input->post('income');

		$age = $this->input->post('age');

		$gender = $this->input->post('gender');

		$referral = $this->input->post('referral');

		$user_type = $this->input->post('user_type');

		$referred_by = strtoupper($this->input->post('referred_by'));

		$interest = $this->input->post('interest');

		$confirmationCode = md5(date('d-m-Y h:i:s'));

		$code = substr($confirmationCode, -5);

		$rc = strtoupper(substr($lname, 0, 3) . $code);

		// Unione Template

		$headers = array(
			'Content-Type' => 'application/json',
			'Accept' => 'application/json',
			'X-API-KEY' => '6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha',
		);

		$client = new \GuzzleHttp\Client([
			'base_uri' => 'https://eu1.unione.io/en/transactional/api/v1/'
		]);

		$requestBody = [
			"id" => "64e145dc-0f2a-11ee-b56a-969a978c88f7"
		];

		// end Unione Template

		//Check to see if email exists already

		$email_res = $this->rss_model->check_email($email);

		if ($email_res) {

			echo "Email already exists in our database!";

			exit;
		} else {

			$user_agent = $this->browserName($ua);

			$registration = $this->rss_model->register($fname, $lname, $email, $password, $phone, $income, $confirmationCode, $referral, $user_type, $interest, $referred_by, $rc, $age, $gender, $user_agent['userAgent']);

			if ($registration) {

				$data['confirmationLink'] = base_url() . 'confirm/' . $confirmationCode;

				$data['name'] = $fname;

				$data['email'] = $email;

				//Unione Template

				try {
					$response = $client->request('POST', 'template/get.json', array(
						'headers' => $headers,
						'json' => $requestBody,
					));

					$jsonResponse = $response->getBody()->getContents();

					$responseData = json_decode($jsonResponse, true);

					$htmlBody = $responseData['template']['body']['html'];

					$confirmationLink = $data['confirmationLink'];

					// Replace the placeholder in the HTML body with the username

					$htmlBody = str_replace('{{confirmationLink}}', $confirmationLink, $htmlBody);

					$data['response'] = $htmlBody;

					// Prepare the email data
					$emailData = [
						"message" => [
							"recipients" => [
								["email" => $email],
							],
							"body" => ["html" => $htmlBody],
							"subject" => "Email Confirmation RentSmallsmall",
							"from_email" => "donotreply@smallsmall.com",
							"from_name" => "Smallsmall",
						],
					];

					// Send the email using the Unione API
					$responseEmail = $client->request('POST', 'email/send.json', [
						'headers' => $headers,
						'json' => $emailData,
					]);

					// Output the result
					if ($responseEmail) {
						echo 1;
					} else {
						echo 0;
					}
				} catch (\GuzzleHttp\Exception\BadResponseException $e) {
					$data['response'] = $e->getMessage();
				}
			}
		}
	}

	public function resend_verification()
	{

		$email = $this->input->post('email');

		$res = $this->rss_model->get_confirmation_link($email);

		if ($res) {
			$data['confirmationLink'] = base_url() . 'confirm/' . $res['confirmation'];

			$data['name'] = $res['firstName'];

			$data['email'] = $email;

			$this->email->from('donotreply@smallsmall.com', 'SmallSmall Confirmation');

			$this->email->to($email);

			$this->email->subject("Email Confirmation SmallSmall");

			$this->email->set_mailtype("html");

			$message = $this->load->view('email/header.php', $data, TRUE);

			$message .= $this->load->view('email/confirmationemail.php', $data, TRUE);

			$message .= $this->load->view('email/footer.php', $data, TRUE);

			$this->email->message($message);

			$emailRes = $this->email->send();
		} else {
			echo 0;
		}
	}

	public function bookInspection()
	{

		require 'vendor/autoload.php'; // For Unione template authoload

		$inspectionDate = $this->input->post('inspectionDate');

		$inspectionType = $this->input->post('inspectionType');

		$propID = $this->input->post('propID');

		$userID = $this->session->userdata('userID');

		// Unione Template

		$headers = array(
			'Content-Type' => 'application/json',
			'Accept' => 'application/json',
			'X-API-KEY' => '6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha',
		);

		$client = new \GuzzleHttp\Client([
			'base_uri' => 'https://eu1.unione.io/en/transactional/api/v1/'
		]);

		$requestBody = [
			"id" => "e5cc9712-0f36-11ee-8170-969a978c88f7"
		];

		$requestCxBody = [
			"id" => "c457d6ec-254c-11ee-8e35-ee6e33baccfb"
		];

		// end Unione Template

		if ($this->session->has_userdata('loggedIn')) {

			//Proceeds to scheduling inspection

			$user = $this->rss_model->get_user($userID);

			$property = $this->rss_model->get_property($propID);

			$inspection_id = $this->random_strings(8);

			$the_date = date("Y-m-d H:i:s", strtotime($inspectionDate));

			$inspect = $this->rss_model->bookInspection($inspection_id, $propID, $the_date, $userID, $inspectionType);

			if ($inspect) {

				$data['name'] = $user['firstName'] . ' ' . $user['lastName'];

				$data['inspectionDate'] = date('d F Y', strtotime($inspectionDate));

				$data['inspectionType'] = $inspectionType;

				$data['propName'] = $property['propertyTitle'];

				$data['propAddress'] = $property['address'] . ', ' . $property['city'];

				//Unione Template

				try {
					$response = $client->request('POST', 'template/get.json', array(
						'headers' => $headers,
						'json' => $requestBody,
					));

					$jsonResponse = $response->getBody()->getContents();

					$responseData = json_decode($jsonResponse, true);

					$htmlBody = $responseData['template']['body']['html'];

					$username = $data['name'];
					$propertyName = $data['propName'];
					$propertyAddress = $data['propAddress'];
					$dateOfVisit = $data['inspectionDate'];
					$typeOfVisit = $data['inspectionType'];
					$inspectionDateTime = strtotime($inspectionDate);
					$inspectionTime = date('H:i:s', $inspectionDateTime);

					// Replace the placeholder in the HTML body with the username

					$htmlBody = str_replace('{{Name}}', $username, $htmlBody);
					$htmlBody = str_replace('{{PropertyName}}', $propertyName, $htmlBody);
					$htmlBody = str_replace('{{PropertyAddress}}', $propertyAddress, $htmlBody);
					$htmlBody = str_replace('{{DateofVisit}}', $dateOfVisit, $htmlBody);
					$htmlBody = str_replace('{{TypeofVisit}}', $typeOfVisit, $htmlBody);
					$htmlBody = str_replace('{{Time}}', $inspectionTime, $htmlBody);

					$data['response'] = $htmlBody;

					// Prepare the email data
					$emailData = [
						"message" => [
							"recipients" => [
								["email" => $user['email']],
							],
							"body" => ["html" => $htmlBody],
							"subject" => "Property Visit Scheduled RentSmallsmall",
							"from_email" => "donotreply@smallsmall.com",
							"from_name" => "Small Small Inspection",
						],
					];

					// Send the email using the Unione API
					$responseEmail = $client->request('POST', 'email/send.json', [
						'headers' => $headers,
						'json' => $emailData,
					]);
				} catch (\GuzzleHttp\Exception\BadResponseException $e) {
					$data['response'] = $e->getMessage();
				}

				$notify = $this->functions_model->insert_user_notifications('Inspection Scheduled!', 'You have successfully scheduled an inspection', $user['userID'], 'Rent');

				if ($responseEmail) {

					$data['custname'] = $user['firstName'] . ' ' . $user['lastName'];

					$data['custemail'] = $user['email'];

					$data['custphone'] = $user['phone'];

					$data['leadchannel'] = $user['referral'];

					$data['leadsource'] = $user['platform'];

					$data['propertyName'] = $property['propertyTitle'];

					$data['income'] = $user['income'];

					$data['signup_date'] = date('d F Y', strtotime($user['regDate']));

					$data['inspectionDate'] = date('d F Y H:i', strtotime($inspectionDate));

					$data['propID'] = $propID;

					try {
						$response = $client->request('POST', 'template/get.json', array(
							'headers' => $headers,
							'json' => $requestCxBody,
						));

						$jsonResponse = $response->getBody()->getContents();

						$responseData = json_decode($jsonResponse, true);

						$htmlBody = $responseData['template']['body']['html'];

						$subscriberName = $data['custname'];
						$subscriberEmail = $data['custemail'];
						$subscriberPhoneNumber = $data['custphone'];
						$propertyName = $data['propertyName'];
						$propertyAddress = $data['propAddress'];
						$dateOfVisit = $data['inspectionDate'];
						$typeOfVisit = $data['inspectionType'];
						$inspectionDateandTime = $data['signup_date'];

						// Replace the placeholder in the HTML body with the username

						$htmlBody = str_replace('{{SubscriberName}}', $subscriberName, $htmlBody);
						$htmlBody = str_replace('{{SubscriberEmail}}', $subscriberEmail, $htmlBody);
						$htmlBody = str_replace('{{SubscriberPhoneNumber}}', $subscriberPhoneNumber, $htmlBody);
						$htmlBody = str_replace('{{PropertyName}}', $propertyName, $htmlBody);
						$htmlBody = str_replace('{{PropertyAddress}}', $propertyAddress, $htmlBody);
						$htmlBody = str_replace('{{DateofVisit}}', $inspectionTime, $htmlBody);
						$htmlBody = str_replace('{{InspectionDateandTime}}', $inspectionDateandTime, $htmlBody);
						$htmlBody = str_replace('{{TypeofVisit}}', $typeOfVisit, $htmlBody);

						$data['response'] = $htmlBody;

						// Prepare the email data
						$emailCxData = [
							"message" => [
								"recipients" => [
									["email" => 'customerexperience@smallsmall.com'],
								],
								"body" => ["html" => $htmlBody],
								"subject" => "New Inspection Request!",
								"from_email" => "donotreply@smallsmall.com",
								"from_name" => "Small Small Inspection",
							],
						];

						// Send the email using the Unione API
						$responseEmail = $client->request('POST', 'email/send.json', [
							'headers' => $headers,
							'json' => $emailCxData,
						]);
					} catch (\GuzzleHttp\Exception\BadResponseException $e) {
						$data['response'] = $e->getMessage();
					}

					// $this->email->from('donotreply@smallsmall.com', 'Small Small Inspection');

					// $this->email->to('customerexperience@smallsmall.com');

					// $this->email->subject("New Inspection Request!");

					// $this->email->set_mailtype("html");

					// $message = $this->load->view('email/header.php', $data, TRUE);

					// $message .= $this->load->view('email/newinspection.php', $data, TRUE);

					// $message .= $this->load->view('email/footer.php', $data, TRUE);

					// $this->email->message($message);

					// $this->email->send();    

				}
				//Check if it is the weekend then send auto response email
				/*if(date('N', strtotime(date('Y-m-d'))) >= 6 ){
				    if (date('H') >= 17) {
                        //$pre2pm = true;
                        //Send auto-response email
                        $data['name'] = $user['name'];
    				    
    				    $this->email->to($user['email']);
    
            			$this->email->subject("Auto Response !");
            
            			$this->email->set_mailtype("html");
            
            			$message = $this->load->view('email/header.php', $data, TRUE);
            
            			$message .= $this->load->view('email/inspection-auto-response.php', $data, TRUE);
            
            			$message .= $this->load->view('email/footer.php', $data, TRUE);
            
            			$this->email->message($message);
            
            			$this->email->send();
                    }
				}*/

				echo 1;
			} else {

				echo 0;
			}
		} else {

			//Go to login page

			echo 2;
		}
	}

	public function reply_message()
	{

		if ($this->session->has_userdata('userID')) {

			$receiverID = $this->input->post('receiverID');

			$messageID = $this->input->post('messageID');

			$subject = $this->input->post('subject');

			$reply = $this->input->post('reply');

			$userID = $this->session->userdata('userID');

			$send_msg = $this->rss_model->reply_message($receiverID, $messageID, $subject, $reply, $userID);

			if ($send_msg) {

				echo 1;
			} else {

				echo 0;
			}
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function send_message()
	{

		if ($this->session->has_userdata('userID')) {

			$sender = $this->session->userdata('userID');

			$receiver = $this->rss_model->get_account_manager($sender);

			$message = $this->input->post('message');

			$subject = $this->input->post('subject');

			$send_msg = $this->rss_model->send_message($receiver['account_manager'], $message, $subject, $sender);

			if ($send_msg) {

				echo 1;
			} else {

				echo 0;
			}
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function mark_as_read()
	{

		$result = FALSE;

		$details = '';

		$data = array();

		if ($this->session->has_userdata('userID')) {

			$mID = $this->input->post('id');

			$userID = $this->session->userdata('userID');

			$change_stat = $this->rss_model->mark_as_read($mID, $userID);

			if ($change_stat) {

				$data = $this->rss_model->get_message($mID, $userID);

				$data[0]['dateOfEntry'] = date('Y.m.d', strtotime($data[0]['dateOfEntry']));

				if ($data) {

					$result = TRUE;

					$details = "Success";
				} else {
					$details = "Could not retrieve message";
				}
			} else {

				$details = "Message not found";
			}
		} else {

			$details = "User not logged in";
		}


		echo json_encode(array("result" => $result, "details" => $details, "data" => $data));
	}

	public function logout()
	{

		$this->session->unset_userdata('userdata');

		$this->session->sess_destroy();

		$url = @$_SERVER['HTTP_REFERER'];

		if ($url) {

			// 			redirect($url);
			redirect('login');
		} else {

			redirect(base_url(), 'refresh');
		}
	}

	// public function uploadIdentification($folder)
	// {

	// 	$filename = '';

	// 	if (!$folder) {

	// 		$folder = md5(date("Ymd His"));
	// 	}

	// 	sleep(1);


	// 	if (!is_dir('./uploads/verification/' . $folder)) {

	// 		// mkdir('./uploads/verification/' . $folder, 0711, TRUE);
	// 		mkdir('./uploads/verification/' . $folder, 0777, TRUE);
	// 	}


	// 	if ($_FILES["files"]["name"] != '') {

	// 		$output = '';

	// 		$config["upload_path"] = './uploads/verification/' . $folder;

	// 		$config["allowed_types"] = 'jpg|jpeg|png|JPG|PNG|JPEG|pdf';

	// 		$config['max_size'] = '5000';

	// 		$config['encrypt_name'] = TRUE;

	// 		$this->load->library('upload', $config);

	// 		$this->upload->initialize($config);

	// 		if (is_array($_FILES["files"]["name"])) {

	// 			for ($count = 0; $count < count($_FILES["files"]["name"]); $count++) {

	// 				$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];

	// 				$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];

	// 				$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];

	// 				$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];

	// 				$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];

	// 				if ($this->upload->do_upload('file')) {

	// 					$data = $this->upload->data();

	// 					$output = "success";

	// 					$filename = $data["file_name"];

	// 					//$output .= '<span class="imgCover" id="id-'.$data["file_name"].'"><img src="'.base_url().'uploads/furnisure/'.$folder.'/'.$data["file_name"].'" id="'.$data["file_name"].'" class="upldImg img-responsive img-thumbnail" onclick="selectFeatured(this.id)" title="Click to select as featured image" /></span>';

	// 				}
	// 			}
	// 		} else {

	// 			$_FILES["file"]["name"] = $_FILES["files"]["name"];

	// 			$_FILES["file"]["type"] = $_FILES["files"]["type"];

	// 			$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"];

	// 			$_FILES["file"]["error"] = $_FILES["files"]["error"];

	// 			$_FILES["file"]["size"] = $_FILES["files"]["size"];

	// 			//$upload_data = $this->upload->do_upload('file');

	// 			//$file_name = $upload_data['file_name'];

	// 			if ($this->upload->do_upload('file')) {

	// 				$data = $this->upload->data();

	// 				$output = "success";

	// 				$filename = $data["file_name"];

	// 				//$output .= '<span class="imgCover" id="id-'.$data["file_name"].'"><img src="'.base_url().'uploads/furnisure/'.$folder.'/'.$data["file_name"].'" id="'.$data["file_name"].'" class="upldImg img-responsive img-thumbnail" onclick="selectFeatured(this.id)" title="Click to select as featured image" /></span>';

	// 			}
	// 		}

	// 		//echo $output;

	// 		echo json_encode(array('result' => $output, 'folder' => $folder, 'filename' => $filename));
	// 	}
	// }


public function uploadIdentification($folder)
{
		require 'vendor/autoload.php';

    // Step 1: Initialize the variables
    $filename = '';

    // Step 2: Generate folder name if not provided
    if (!$folder) {

        $folder = md5(date("Ymd His"));

    }

    // Step 3: Wait for 1 second (sleep)
    sleep(1);

    // Step 4: Create directory if it doesn't exist

    if (!is_dir('./uploads/verification/' . $folder)) {

        mkdir('./uploads/verification/' . $folder, 0777, TRUE);

    }

    // Step 5: Check if files were uploaded
    if ($_FILES["files"]["name"] != '') {

        $output = '';

        // Step 6: Configure file upload settings
        $config["upload_path"] = './uploads/verification/' . $folder;

        $config["allowed_types"] = 'jpg|jpeg|png|JPG|PNG|JPEG|pdf';

        $config['max_size'] = '5000';

        $config['encrypt_name'] = TRUE;

        // Step 7: Load and initialize the upload library
        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        // Step 8: Loop through uploaded files
        if (is_array($_FILES["files"]["name"])) {

            for ($count = 0; $count < count($_FILES["files"]["name"]); $count++) {

                $_FILES["file"]["name"] = $_FILES["files"]["name"][$count];

                $_FILES["file"]["type"] = $_FILES["files"]["type"][$count];

                $_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];

                $_FILES["file"]["error"] = $_FILES["files"]["error"][$count];

                $_FILES["file"]["size"] = $_FILES["files"]["size"][$count];

                // Step 9: Perform file upload
                if ($this->upload->do_upload('file')) {

                    $data = $this->upload->data();

                    $output = "success";

                    $filename = $data["file_name"];

                    // Step 10: Upload the file to AWS S3
                    $bucket = 'dev-rss-uploads'; // My bucket name

                    $keyname = 'uploads/verification/' . $folder . '/' . $data["file_name"]; // My Object key for the file

                    $s3 = new Aws\S3\S3Client([

                        'version' => 'latest',

                        'region'  => 'eu-west-1' // My region
                    ]);

                    try {
                        // Step 11: Upload data to S3.
                        $result = $s3->putObject([

                            'Bucket' => $bucket,

                            'Key'    => $keyname,

                            'Body'   => file_get_contents($data["full_path"]),
                        ]);

                        // Step 12: Display S3 Object URL
                        $objectUrl = $result['ObjectURL'];

                        echo "File uploaded to S3: " . $objectUrl . PHP_EOL;

                        // Step 13: Perform any additional actions with $objectUrl
                    } catch (Aws\S3\Exception\S3Exception $e) {
                        // Step 14: Handle S3 upload error

                        echo "S3 Upload Error: " . $e->getMessage() . PHP_EOL;

                    }
                }
            }
        } else {
            // ... (same logic as before for a single file)

			$_FILES["file"]["name"] = $_FILES["files"]["name"];

			$_FILES["file"]["type"] = $_FILES["files"]["type"];

			$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"];

			$_FILES["file"]["error"] = $_FILES["files"]["error"];

			$_FILES["file"]["size"] = $_FILES["files"]["size"];

			// Step 9: Perform file upload
			if ($this->upload->do_upload('file')) {

				$data = $this->upload->data();

				$output = "success";

				$filename = $data["file_name"];

				// Step 10: Upload the file to AWS S3
				$bucket = 'dev-rss-uploads'; // My bucket name

				$keyname = 'uploads/verification/' . $folder . '/' . $data["file_name"]; // My Object key for the file

				$s3 = new Aws\S3\S3Client([

					'version' => 'latest',

					'region'  => 'eu-west-1' // My region
				]);

				try {
					// Step 11: Upload data to S3.
					$result = $s3->putObject([
						'Bucket' => $bucket,

						'Key'    => $keyname,

						'Body'   => file_get_contents($data["full_path"]),
					]);

					// Step 12: Display S3 Object URL
					$objectUrl = $result['ObjectURL'];

					echo "File uploaded to S3: " . $objectUrl . PHP_EOL;

					// Step 13: Perform any additional actions with $objectUrl
				} catch (Aws\S3\Exception\S3Exception $e) {

					// Step 14: Handle S3 upload error
					echo "S3 Upload Error: " . $e->getMessage() . PHP_EOL;
				}
			}
        }

        // Step 15: Output JSON response
        echo json_encode(array('result' => $output, 'folder' => $folder, 'filename' => $filename));
    }
}


	public function insertDetails()
	{

		require 'vendor/autoload.php'; // For Unione template authoload

		$details = $this->input->post('details');

		$order = $this->input->post('order');

		$ua = $_SERVER['HTTP_USER_AGENT'];

		$user_agent = $this->browserName($ua);

		$result = "error";

		$msg = "";

		$price = 0;

		$fname = $details['profile'][0]['firstname'];

		$email = $details['profile'][0]['email'];

		$ref = 'rss_' . md5(rand(1000000, 9999999999));

		// Unione Template

		$headers = array(
			'Content-Type' => 'application/json',
			'Accept' => 'application/json',
			'X-API-KEY' => '6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha',
		);

		$client = new \GuzzleHttp\Client([
			'base_uri' => 'https://eu1.unione.io/en/transactional/api/v1/'
		]);

		$requestBody = [
			"id" => "05d45b98-11ae-11ee-9bc2-0a93cf78caa3"
		];

		$requestBodyForTeam = [
			"id" => "f368198a-11c2-11ee-8731-76c23e12fa03"
		];

		// end Unione Template

		//Insert details into verification table

		$ver_result = $this->rss_model->insertVerification($details['profile'][0]['firstname'], $details['profile'][0]['lastname'], $details['profile'][0]['email'], $details['profile'][0]['phone'], $details['profile'][0]['gross_pay'], $details['profile'][0]['dob'], $details['profile'][0]['gender'], $details['profile'][0]['marital_status'], $details['profile'][0]['state'], $details['profile'][0]['city'],  $details['profile'][0]['linkedinUrl'], $details['profile'][0]['country'], $details['profile'][0]['passport_number'], $details['renting'][0]['present_address'], $details['renting'][0]['country'], $details['renting'][0]['state'], $details['renting'][0]['city'], $details['renting'][0]['previous_rent_duration'], $details['renting'][0]['renting_status'], $details['renting'][0]['previous_eviction'], $details['renting'][0]['pet'], $details['renting'][0]['critical_illness'], $details['renting'][0]['landlord_full_name'], $details['renting'][0]['landlord_email'], $details['renting'][0]['landlord_phone'], $details['renting'][0]['landlord_address'], $details['renting'][0]['reason_for_leaving'], $details['employment'][0]['employment_status'], $details['employment'][0]['job_title'], $details['employment'][0]['company_address'], $details['employment'][0]['manager_hr_name'], $details['employment'][0]['manager_hr_email'], $details['employment'][0]['manager_hr_phone'], $details['employment'][0]['guarantor_name'], $details['employment'][0]['guarantor_email'], $details['employment'][0]['guarantor_phone'], $details['employment'][0]['guarantor_job_title'], $details['employment'][0]['guarantor_address'], $details['uploads'][0]['statement_path'], $details['uploads'][0]['id_path'], $details['uploads'][0]['user_id'], $details['employment'][0]['company_name'], 'Web', $user_agent['userAgent']);

		$notify = $this->functions_model->insert_user_notifications('Verification Request Submitted', 'You have successfully submitted a verification request. You will be notified of the status of your verification as it changes.', $details['uploads'][0]['user_id'], 'Rent');

		$data['ver_title'] = "Verification Notification";

		$data['ver_note'] = "There is a new verification request profile. ";

		//Unione Template

		try {
			$response = $client->request('POST', 'template/get.json', array(
				'headers' => $headers,
				'json' => $requestBody,
			));

			$jsonResponse = $response->getBody()->getContents();

			$responseData = json_decode($jsonResponse, true);

			$htmlBody = $responseData['template']['body']['html'];

			$userName = $fname;

			// Replace the placeholder in the HTML body with the username

			$htmlBody = str_replace('{{Name}}', $userName, $htmlBody);

			$data['response'] = $htmlBody;

			// Prepare the email data
			$emailData = [
				"message" => [
					"recipients" => [
						["email" => $email],
					],
					"body" => ["html" => $htmlBody],
					"subject" => "Verification Submitted notification",
					"from_email" => "donotreply@smallsmall.com",
					"from_name" => "SmallSmall Alert",
				],
			];

			// Send the email using the Unione API
			$responseEmail = $client->request('POST', 'email/send.json', [
				'headers' => $headers,
				'json' => $emailData,
			]);
		} catch (\GuzzleHttp\Exception\BadResponseException $e) {
			$data['response'] = $e->getMessage();
		}

		// if ($responseEmail) {

		// 	try {
		// 		$response = $client->request('POST', 'template/get.json', array(
		// 			'headers' => $headers,
		// 			'json' => $requestBodyForTeam,
		// 		));

		// 		$jsonResponse = $response->getBody()->getContents();

		// 		$responseData = json_decode($jsonResponse, true);

		// 		$htmlBody = $responseData['template']['body']['html'];

		// 		$userName = $fname;

		// 		$userEmail = $email;

		// 		$propertyID = $order['property'][0]['productID'];

		// 		// Replace the placeholder in the HTML body with the username

		// 		$htmlBody = str_replace('{{Name}}', $userName, $htmlBody);

		// 		$htmlBody = str_replace('{{Email}}', $userEmail, $htmlBody);

		// 		$htmlBody = str_replace('{{PropertyID}}', $propertyID, $htmlBody);

		// 		$data['response'] = $htmlBody;

		// 		// Prepare the email data
		// 		$emailDataTeam = [
		// 			"message" => [
		// 				"recipients" => [
		// 					["email" => 'verification@smallsmall.com'],
		// 					// ["email" => 'pidah.t@smallsmall.com'],
		// 				],
		// 				"body" => ["html" => $htmlBody],
		// 				"subject" => "New Verification alert",
		// 				"from_email" => "donotreply@smallsmall.com",
		// 				"from_name" => "SmallSmall Alert",
		// 			],
		// 		];

		// 		// Send the email using the Unione API
		// 		$responseEmail = $client->request('POST', 'email/send.json', [
		// 			'headers' => $headers,
		// 			'json' => $emailDataTeam,
		// 		]);
		// 	} catch (\GuzzleHttp\Exception\BadResponseException $e) {
		// 		$data['response'] = $e->getMessage();
		// 	}
		// }

		if ($ver_result) {

			if ($order['orderType'] == "property") {

					$propertyTitle = $order['property'][0]['productTitle'];

					// Replace the placeholder in the HTML body with the username
					
					$htmlBody = str_replace('{{Name}}', $userName, $htmlBody);
					
					$htmlBody = str_replace('{{Email}}', $userEmail, $htmlBody);
					
					$htmlBody = str_replace('{{PropertyID}}', $propertyTitle, $htmlBody);

					$data['response'] = $htmlBody;
				
        		// Prepare the email data
       			 	$emailDataTeam = [
            			"message" => [
                			"recipients" => [
                    			["email" => 'customerexperience@smallsmall.com'],
					// ["email" => 'pidah.t@smallsmall.com'],
                			],
                		"body" => ["html" => $htmlBody],
                		"subject" => "New Verification alert",
                		"from_email" => "donotreply@smallsmall.com",
                		"from_name" => "SmallSmall Alert",
            			],
        			];

				$this->rss_model->setAvailability($locked_down, $order['property'][0]['productID']);

				$price = $order['property'][0]['prodPrice'] /*+ $order['property'][0]['securityDeposit']*/;
				//Insert Booking

				$booking_id = $this->random_strings(5);

				$booked = $this->rss_model->insertBooking($booking_id, $ver_result, $details['uploads'][0]['user_id'], $order['property'][0]['productID'], $order['property'][0]['productTitle'], $order['property'][0]['paymentPlan'], $order['property'][0]['prodPrice'], $order['property'][0]['imageLink'], $order['property'][0]['productUrl'], $order['property'][0]['securityDeposit'], $order['property'][0]['duration'], $order['property'][0]['book_as'], $order['property'][0]['move_in_date'], $order['paymentOption'], $price, $ref);

				if ($booked) {

					//Get property details
					$props = $this->rss_model->get_property($order['property'][0]['productID']);

					//Get user details
					$user = $this->rss_model->get_user($details['uploads'][0]['user_id']);

					$result = "success";

					$data['name'] = $user['firstName'] . ' ' . $user['lastName'];

					$data['email'] = $user['email'];

					$data['phone'] = $user['phone'];

					$data['propName'] = $props['propertyTitle'];

					$data['propAddress'] = $props['address'];

					$data['amount'] = $price;

					$data['paymentOption'] = $order['paymentOption'];

					$data['duration'] = $order['property'][0]['duration'];

					$data['paymentPlan'] = $order['property'][0]['paymentPlan'];

					$this->email->from('noreply@smallsmall.com', 'Automated');

					$this->email->to('customerexperience@smallsmall.com');

					$this->email->subject("Property Booked");

					$this->email->set_mailtype("html");

					$message = $this->load->view('email/header.php', $data, TRUE);

					$message .= $this->load->view('email/apt-booking-email.php', $data, TRUE);

					$message .= $this->load->view('email/footer.php', $data, TRUE);

					$this->email->message($message);

					$emailRes = $this->email->send();
				} else {

					$result = "error";
					$price = 0;
				}
			} else {

				for ($i = 0; $i < count($order['furnisure']); $i++) {

					$price = $price + $order['furnisure'][$i]['prodPrice'] + $order['furnisure'][$i]['securityDeposit'];

					$this->rss_model->insertFurnisureOrders($ver_result, $details['uploads'][0]['user_id'], $order['furnisure'][$i]['productID'], $order['furnisure'][$i]['productTitle'], $order['furnisure'][$i]['paymentPlan'], $order['furnisure'][$i]['prodPrice'], $order['furnisure'][$i]['duration'], $order['paymentOption'], $i, count($order['furnisure']), $price, $ref);

					/*($ver_result, $details['uploads'][0]['user_id'], $order['furnisure'][$i]['productID'], $order['furnisure'][$i]['productTitle'], $order['furnisure'][$i]['paymentPlan'], $order['furnisure'][$i]['prodPrice'], $order['furnisure'][$i]['paymentPlan'], $order['furnisure'][$i]['productUrl'], $order['furnisure'][$i]['securityDeposit'], $order['furnisure'][$i]['duration'], $order['furnisure'][$i]['duration'],$order['paymentOption'], $i, count($order['furnisure']), $price);*/
				}

				$result = "success";
			}
		}
		//This is where you send an email to customer for verification process starting
		$data['name'] = $fname;

		$this->email->from('donotreply@smallsmall.com', 'SmallSmall');

		$this->email->to($email);

		$this->email->subject("Verification Submitted");

		$this->email->set_mailtype("html");

		$message = $this->load->view('email/header.php', $data, TRUE);

		$message .= $this->load->view('email/verificationemail.php', $data, TRUE);

		$message .= $this->load->view('email/footer.php', $data, TRUE);

		$this->email->message($message);

		$emailRes = $this->email->send();

		echo json_encode(array('result' => $result, 'msg' => $price));
	}

	public function insertPropertyDetails()
	{

		$propType = $this->input->post('propType');

		$country = $this->input->post('country');

		$states = $this->input->post('states');

		$city = $this->input->post('city');

		$rent_type = $this->input->post('rent_type');

		$furnishing = $this->input->post('furnishing');

		$services = $this->input->post('services');

		$bed = $this->input->post('bed');

		$base_rent = $this->input->post('base_rent');

		$service_charge = $this->input->post('service_charge');

		$bath = $this->input->post('bath');

		$toilet = $this->input->post('toilet');

		$amenities = $this->input->post('amenities');

		$rental_condition = $this->input->post('rental_condition');

		$details = $this->input->post('details');

		$userID = $this->session->userdata('userID');

		$result = "error";

		$folder = md5(date("YmdHis"));

		if (!is_dir('./uploads/prospective_property/' . $folder)) {

			mkdir('./uploads/prospective_property/' . $folder, 0777, TRUE);
		}

		$file_element_name = 'userfile';

		$config['upload_path'] = './uploads/prospective_property/' . $folder;

		$config['allowed_types'] = 'jpg|png|jpeg';

		$config['max_size'] = 1024 * 10;

		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		$prop = $this->rss_model->insertPropDetails($propTitle, $propDesc, $email, $propType, $country, $states, $city, $rent_type, $furnishing, $services, $bed, $base_rent, $service_charge, $bath, $toilet, $amenities, $address, $rental_condition, $details, $folder, $userID);

		if ($prop) {

			for ($count = 0; $count < count($_FILES["userfile"]["name"]); $count++) {


				$_FILES["file"]["name"] = $_FILES["userfile"]["name"][$count];

				$_FILES["file"]["type"] = $_FILES["userfile"]["type"][$count];

				$_FILES["file"]["tmp_name"] = $_FILES["userfile"]["tmp_name"][$count];

				$_FILES["file"]["error"] = $_FILES["userfile"]["error"][$count];

				$_FILES["file"]["size"] = $_FILES["userfile"]["size"][$count];


				if ($this->upload->do_upload('file')) {

					$data = $this->upload->data();
				}
			}

			$result = "success";

			$msg = 1;
		} else {

			$result = "error";

			$msg = "Error uploading data";
		}

		echo json_encode(array('result' => $result, 'msg' => $msg));
	}

	public function insertOrderDetails()
	{
		$order = $this->input->post('order');

		$userID = $this->session->userdata('userID');

		$price = 0;

		$ref = 'rss_' . md5(rand(1000000, 9999999999));

		//Get details into verification table

		$ver_result = $this->rss_model->getVerification($userID);

		$user = $this->rss_model->getUser($userID);

		if ($ver_result) {

			if ($order['orderType'] == "property") {

				$price = $order['property'][0]['prodPrice'] /*+ $order['property'][0]['securityDeposit']*/;



				// Retrieve the values of the hidden input fields gotten from the rental calculate.
				$subscriptionFees = $order['property'][0]['subscriptionFees'];

				$serviceChargeDeposit = $order['property'][0]['serviceChargeDeposit'];

				$securityDepositFund = $order['property'][0]['securityDepositFund'];

				$total = $order['property'][0]['total'];


				//Insert Booking

				$booking_id = $this->random_strings(5);

				$booked = $this->rss_model->insertBooking($booking_id, $ver_result['verification_id'], $userID, $order['property'][0]['productID'], $order['property'][0]['productTitle'], $order['property'][0]['paymentPlan'], $order['property'][0]['prodPrice'], $order['property'][0]['imageLink'], $order['property'][0]['productUrl'], $order['property'][0]['securityDeposit'], $order['property'][0]['duration'], $order['property'][0]['book_as'], $order['property'][0]['move_in_date'], $order['paymentOption'], $price, $ref, $subscriptionFees, $serviceChargeDeposit, $securityDepositFund, $total);

				$notify = $this->functions_model->insert_user_notifications('Booking Success!', 'Apartment has been successfully booked.', $userID, 'Rent');
			} elseif ($order['orderType'] == "furnisure") {

				for ($i = 0; $i < count($order['furnisure']); $i++) {

					$duration = $order['furnisure'][$i]['paymentPlan'];

					$cost = $order['furnisure'][$i]['prodPrice'];


					if ($duration == 12) {
						//60 percent paid in first three months
						$price = ($cost * 0.6) / 3;
					} elseif ($duration == 6) {
						//60 percent paid in first two months
						$price = ($cost * 0.6) / 2;
					} elseif ($duration == 4) {
						//60 percent paid in first two months
						$price = ($cost * 0.6) / 2;
					}

					$price = $price + $order['furnisure'][$i]['securityDeposit'];

					$this->rss_model->insertFurnisureOrders($ver_result['verification_id'], $userID, $order['furnisure'][$i]['productID'], $order['furnisure'][$i]['productTitle'], $order['furnisure'][$i]['paymentPlan'], $price, $order['furnisure'][$i]['duration'], $order['paymentOption'], $i, count($order['furnisure']), $price, $ref);
				}
			}

			//Set session keys
			$paymentdata = array('email' => $user['email'], "amount" => $price, "method" => $order['paymentOption'], "ref" => $ref);

			$this->session->set_userdata('payment', $paymentdata);

			echo 1;
		} else {

			echo $ver_result;
		}
	}


	public function get_quick_search()
	{

		$s_data['state']  = $this->input->post('state');

		$s_data['price']  = $this->input->post('priceRange');

		$s_data['city']  = $this->input->post('city');

		$s_data['beds']  = $this->input->post('bed_num');

		$s_data['bath']  = $this->input->post('bath_num');

		$s_data['renting_as']  = $this->input->post('renting_as');

		$s_data['furnishing']  = $this->input->post('furnishing');

		$s_data['property_type']  = $this->input->post('property_type');

		$s_data['availability_val']  = $this->input->post('availability_val');

		if ($s_data['price']) {

			$prices = explode(',', $s_data['price']);

			$s_data['min_price'] = $prices[0];

			$s_data['max_price'] = $prices[1];
		}
		/*
		if($this->input->post('mob_city')){
		    
		    $s_data['city'] = $this->input->post('mob_city');
		    
		}*/

		if ($this->input->post('mob_property_type')) {

			$s_data['property_type'] = $this->input->post('mob_property_type');
		}


		if (@$s_data['state'] === null && @$s_data['min_price'] === null && @$s_data['max_price'] === null && @$s_data['city'] === null && @$s_data['beds'] === null && @$s_data['bath'] === null && @$s_data['renting_as'] === null && @$s_data['furnishing'] === null && @$s_data['property_type'] === null && @$s_data['availability_val'] === null) {

			$s_data = $this->session->userdata('search');
		} else {

			$this->session->set_userdata('search', $s_data);
		}

		$config['total_rows'] = $this->rss_model->getPropertyFilterCount($s_data);

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'rss/filter';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->rss_model->setPageNumber($this->pagination->per_page);

			$this->rss_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$post_per_page = 10;

			$data['page_links'] = $this->pagination->create_links();

			$data['from_row'] = $offset + 1;

			$data['properties'] = $this->rss_model->get_quick_list($s_data);

			$data['to_row'] = $page_number * count($data['properties']);
		}

		if (!file_exists(APPPATH . 'views/rss-partials/properties.php')) {

			// Whoops, we don't have a page for that!

			show_404();
		}
		// 		$data['mob_color'] = "white";

		// 		$data['mob_icons'] = "blue";

		// 		$data['color'] = "white";

		// 		$data['logo'] = "blue";

		// 		$data['image'] = "without-image";

		$data['curr_city']['name'] = @$s_data['city'];

		$countries = array('160');

		$data['min'] = $this->rss_model->get_min_rent();

		$data['max'] = $this->rss_model->get_max_rent();

		//$data['available_cities'] = $this->rss_model->fetchHomeCities($states);

		$data['available_states'] = $this->rss_model->fetchAvailableStates($countries);

		$data['apt_types'] = $this->rss_model->getPropTypes();

		$data['verification_status'] = $this->session->userdata('verified');

		$data['account_details'] = $this->rss_model->get_account_details($data['userID']);

		$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "Search Result SmallSmall";

		// 		$this->load->view('templates/rss-header', $data);

		// 		$this->load->view('rss-partials/properties', $data);

		// 		$this->load->view('templates/rss-footer', $data);

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('rss-partials/properties', $data);

		// 		$this->load->view('templates/rss-updated-js-files');

		$this->load->view('templates/rss-updated-footer', $data);
	}

	public function pay()
	{

		$p_data = $this->session->userdata('payment');

		//Decrypt both parameters		
		$email = $p_data['email'];

		$amount = $p_data['amount'];

		$ref = $p_data['ref'];

		$method = $p_data['method'];


		if ($method == "paystack") {

			$curl = curl_init();

			$grandT = $amount;

			$amount = $grandT * 100;

			/*$ref = rand(1000000, 9999999999);*/

			$callback_url = base_url() . 'rss/verify-payment/' . $ref;

			curl_setopt_array($curl, array(

				CURLOPT_URL => "https://api.paystack.co/transaction/initialize",

				CURLOPT_RETURNTRANSFER => true,

				CURLOPT_CUSTOMREQUEST => "POST",

				CURLOPT_POSTFIELDS => json_encode([

					'amount' => $amount,

					'email' => $email,

					"reference" => $ref,

					"callback_url" => $callback_url

				]),

				CURLOPT_HTTPHEADER => [

					"authorization: Bearer sk_live_31982685562b561bd7d18d92333cc09ec78952f7", //replace this with your own test key

					"content-type: application/json",

					"cache-control: no-cache"

				],

			));

			$response = curl_exec($curl);

			$err = curl_error($curl);

			if ($err) {

				// there was an error contacting the Paystack API

				die('Curl returned error: ' . $err);
			}

			$tranx = json_decode($response, true);


			header('Location: ' . $tranx['data']['authorization_url']);
		} else {
			//Transfer
			//redirect to thank you page
			//Create PDF invoice and send to user email
			if ($this->session->has_userdata('userID')) {

				$data['userID'] = $this->session->userdata('userID');

				$data['fname'] = $this->session->userdata('fname');

				$data['lname'] = $this->session->userdata('lname');

				$data['email'] = $this->session->userdata('email');

				$data['user_type'] = $this->session->userdata('user_type');

				$data['interest'] = $this->session->userdata('interest');
			}
			$data['mob_color'] = "white";

			$data['mob_icons'] = "blue";

			$data['color'] = "white";

			$data['logo'] = "blue";

			$data['image'] = "without-image";

			$data['title'] = "Booking Successful";

			$data['payment'] = 1;

			$data['status'] = '<span style="color:#007DC1">Booked!</span>';

			$data['reason'] = 'Your booking has been successfully placed, our representative will get in contact with you as soon as possible. You can log in to view your bookings';

			$notify = $this->functions_model->insert_user_notifications('Booking Successful!', 'Congratulations, your booking has been successfully placed.', $data['userID'], 'Rent');

			$this->load->view('templates/rss-header', $data);

			$this->load->view('pages/confirmation-result', $data);

			$this->load->view('templates/rss-footer');
		}

		$this->session->unset_userdata('payment');

		//$this->session->unset_userdata(array('email' => '', 'amount' => '', 'ref' => '', 'method' => ''));

	}
	public function make_transfer()
	{
		//Transfer
		//redirect to thank you page
		//Create PDF invoice and send to user email
		$this->session->unset_userdata('payment');

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['mob_color'] = "white";

		$data['mob_icons'] = "blue";

		$data['color'] = "white";

		$data['logo'] = "blue";

		$data['image'] = "without-image";

		$data['title'] = "Booking Successful";

		$data['payment'] = 1;

		$data['status'] = '<span style="color:#007DC1">Booked!</span>';

		$data['reason'] = 'Your booking has been successfully placed, our representative will get in contact with you as soon as possible. You can log in to view your bookings. You need to make payment within 24Hrs.';

		$notify = $this->functions_model->insert_user_notifications('Booking Successful!', 'Congratulations, your booking has been successfully placed.', $data['userID'], 'Rent');

		$this->load->view('templates/rss-header', $data);

		$this->load->view('pages/confirmation-result', $data);

		$this->load->view('templates/rss-footer');
	}

	public function verify_payment($ref)
	{

		$result = array();

		$url = 'https://api.paystack.co/transaction/verify/' . $ref;

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		curl_setopt(
			$ch,
			CURLOPT_HTTPHEADER,
			[
				'Authorization: Bearer sk_live_31982685562b561bd7d18d92333cc09ec78952f7'
			]
		);

		$request = curl_exec($ch);

		curl_close($ch);

		//
		if ($request) {

			$result = json_decode($request, true);
			// print_r($result);
			if ($result) {
				if ($result['data']) {

					$ref = $result['data']['reference'];

					//something came in
					if ($result['data']['status'] == 'success') {

						//echo "Transaction was successful";						
						$trans = $this->rss_model->updateTransaction("approved", $ref);

						$booking_res = $this->rss_model->get_renewal_details($ref);

						$startDate = date("Y-m-d", strtotime($booking_res['move_in_date'])); // select date in Y-m-d format

						$expiry = "";

						$nMonths = 0;



						if ($booking_res['type'] == 'rss') {


							if ($booking_res['payment_plan'] == 'Monthly') {

								$nMonths = 1; // choose how many months you want to move ahead

							} else if ($booking_res['payment_plan'] == 'Quaterly') {

								$nMonths = 3; // choose how many months you want to move ahead

							} else if ($booking_res['payment_plan'] == 'Bi-annually') {

								$nMonths = 6; // choose how many months you want to move ahead

							} else if ($booking_res['payment_plan'] == 'Upfront' && $booking_res['duration'] == 12) {

								$nMonths = 12; // choose how many months you want to move ahead

							} else if ($booking_res['payment_plan'] == 'Upfront' && $booking_res['duration'] == 9) {

								$nMonths = 9; // choose how many months you want to move ahead

							} else if ($booking_res['payment_plan'] == 'Upfront' && $booking_res['duration'] == 6) {

								$nMonths = 6; // choose how many months you want to move ahead

							} else if ($booking_res['payment_plan'] == 'Upfront' && $booking_res['duration'] == 3) {

								$nMonths = 3; // choose how many months you want to move ahead

							}

							$expiry = $this->endCycle($startDate, $nMonths); // output: 2014-07-02

							//Update rent status of the booking table
							$res = $this->rss_model->updateBookingStat($booking_res['bookingID'], $expiry);

							//Update available date in Property table

							$propUpd = $this->rss_model->updateAvailDate($expiry, $booking_res['propertyID']);
						}

						header("Location: " . base_url() . 'rss/payment-success/' . $ref);
					} else {
						// the transaction was not successful, do not deliver value'
						// print_r($result);  //uncomment this line to inspect the result, to check why it failed.
						$trans = $this->rss_model->updateTransaction("declined", $ref);

						header("Location: " . base_url() . 'rss/payment-fail/' . $ref);
					}
				} else {
					//No response
					$ref = $result['data']['reference'];

					$trans = $this->rss_model->updateTransaction("declined", $ref);
					//echo $result['message'];
					header("Location: " . base_url() . 'rss/payment-fail/' . $ref);
				}
			} else {

				$ref = $result['data']['reference'];

				$trans = $this->rss_model->updateTransaction("declined", $ref);
				//print_r($result);
				//die("Something went wrong while trying to convert the request variable to json. Uncomment the print_r command to see what is in the result variable.");
				header("Location: " . base_url() . 'rss/payment-fail/' . $ref);
			}
		} else {

			$ref = $result['data']['reference'];

			$trans = $this->rss_model->updateTransaction("declined", $ref);
			//var_dump($request);
			//die("Something went wrong while executing curl. Uncomment the var_dump line above this line to see what the issue is. Please check your CURL command to make sure everything is ok");
			header("Location: " . base_url() . 'rss/payment-fail/' . $ref);
		}
	}
	public function verification_complete()
	{

		if ($this->session->has_userdata('userID')) {

			$data['mob_color'] = "white";

			$data['mob_icons'] = "blue";

			$data['color'] = "white";

			$data['logo'] = "blue";

			$data['image'] = "without-image";

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['title'] = "Completed";

			$data['payment'] = 0;

			$data['status'] = '<span style="color:#007DC1">Congratulations!</span><i class="bx bx-paper-plane"></i>';

			$data['reason'] = 'Thank you for taking your time to fill our verification forms, you are one step closer to making your home dream a reality.<br /> <br />Your details will be reviewed in 48 hours and a response will be sent to your registered email.';

			$this->load->view('templates/rss-header', $data);

			$this->load->view('pages/confirmation-result', $data);

			$this->load->view('templates/rss-footer');
		} else {
			redirect(base_url(), 'refresh');
		}
	}

	public function confirm($code)
	{

		if ($this->session->has_userdata('loggedIn')) {

			redirect(base_url(), 'refresh');
		} else {

			$confirm_response = $this->rss_model->confirm_code($code);

			if ($confirm_response) {
				//Open the welcome page and send welcome email

				if ($confirm_response['referral'] == 'wordpress') {

					$this->rss_model->updateReferral('Instagram');
				}

				$this->rss_model->removeConfirmationLink($code);

				$data['name'] = $confirm_response['firstName'];

				$this->email->from('donotreply@smallsmall.com', 'SmallSmall');

				$this->email->to($confirm_response['email']);

				$this->email->subject("Welcome to SmallSmall");

				$this->email->set_mailtype("html");

				$message = $this->load->view('email/header.php', $data, TRUE);

				$message .= $this->load->view('email/welcomeemail.php', $data, TRUE);

				$message .= $this->load->view('email/footer.php', $data, TRUE);

				$this->email->message($message);

				$emailRes = $this->email->send();

				if ($this->session->has_userdata('userID')) {

					$data['userID'] = $this->session->userdata('userID');

					$data['fname'] = $this->session->userdata('fname');

					$data['lname'] = $this->session->userdata('lname');

					$data['email'] = $this->session->userdata('email');

					$data['user_type'] = $this->session->userdata('user_type');
				}

				//         $data['mob_color'] = "white";

				// 		$data['mob_icons'] = "blue";

				// 		$data['color'] = "white";

				// 		$data['logo'] = "blue";

				// 		$data['image'] = "without-image";

				$data['verification_status'] = $this->session->userdata('verified');

				$data['account_details'] = $this->rss_model->get_account_details($data['userID']);

				$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

				$data['title'] = "Successful Confirmation";

				$data['payment'] = 0;

				$data['status'] = '<span style="color:green">Welcome!</span>';

				$data['reason'] = 'You have successfully confirmed your email address with SmallSmall. You can now proceed to the login page and also browse through our list of apartments for rent.';

				$notify = $this->functions_model->insert_user_notifications('Confirmation Successful!', 'You have successfully confirmed your email address with SmallSmall.', $confirm_response['userID'], 'Rent');

				$this->load->view('templates/rss-updated-header', $data);

				// $this->load->view('templates/rss-header', $data);

				$this->load->view('pages/confirmation-result', $data);

				$this->load->view('templates/rss-updated-js-files');

				// $this->load->view('templates/rss-footer');
				$this->load->view('templates/rss-updated-footer');
			} else {
				//Open page explaining the error encountered
				if ($this->session->has_userdata('userID')) {

					$data['userID'] = $this->session->userdata('userID');

					$data['fname'] = $this->session->userdata('fname');

					$data['lname'] = $this->session->userdata('lname');

					$data['email'] = $this->session->userdata('email');

					$data['user_type'] = $this->session->userdata('user_type');
				}
				$data['title'] = "Unsuccessful Confirmation";

				$data['payment'] = 0;

				$data['status'] = '<span style="color:red">Failed!</span>';

				$data['reason'] = 'The confirmation code is invalid. You can proceed to the signup or login page.';

				// $this->load->view('templates/rss-header', $data);
				$this->load->view('templates/rss-updated-header', $data);

				$this->load->view('pages/confirmation-result', $data);

				$this->load->view('templates/rss-updated-js-files');

				// $this->load->view('templates/rss-footer');
				$this->load->view('templates/rss-updated-footer');
			}
		}
	}
	public function get_countries()
	{

		return $this->functions_model->get_countries();
	}

	public function get_states()
	{

		$country_code = $this->input->post('country');



		$states = $this->functions_model->get_states($country_code);



		echo json_encode(array('status' => 'success', 'msg' => $states));
	}

	public function get_cities()
	{

		$state_code = $this->input->post('states');



		$cities = $this->functions_model->get_cities($state_code);



		echo json_encode(array('status' => 'success', 'msg' => $cities));
	}

	public function passReset()
	{

		require 'vendor/autoload.php';

		$email = $this->input->post('username');

		// Unione Template

		$headers = array(
			'Content-Type' => 'application/json',
			'Accept' => 'application/json',
			'X-API-KEY' => '6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha',
		);

		$client = new \GuzzleHttp\Client([
			'base_uri' => 'https://eu1.unione.io/en/transactional/api/v1/'
		]);

		$requestBody = [
			"id" => "1cc035cc-0f2c-11ee-8166-821d93a29a48"
		];

		// end Unione Template

		//Check if email exists the create onetime code for password reset

		$res = $this->rss_model->check_reset_email($email);

		if ($res) {

			if ($res['referral'] == 'wordpress') {

				$this->rss_model->changeRefferal("Instagram", $res['userID']);
			}

			//If email exists insert create reset row in DB

			$code = md5(date('Y-m-d H:i:s'));

			$result = $this->rss_model->insertResetDetails($res['userID'], $code);

			if ($result) {

				$data['resetLink'] = base_url() . 'reset/' . $res['userID'] . '/' . $code;

				// $names = explode(" ", $res['name']);

				$names = explode(" ", $res['firstName']);

				$data['name'] = $names[0];

				//Unione Template 

				try {
					$response = $client->request('POST', 'template/get.json', array(
						'headers' => $headers,
						'json' => $requestBody,
					));

					$jsonResponse = $response->getBody()->getContents();

					$responseData = json_decode($jsonResponse, true);

					$htmlBody = $responseData['template']['body']['html'];

					// Get the unique username
					// $user = $this->admin_model->get_user($id);

					$username = $data['name'];

					$resetLink = $data['resetLink'];

					// Replace the placeholder in the HTML body with the username
					$htmlBody = str_replace('{{Name}}', $username, $htmlBody);

					$htmlBody = str_replace('{{resetLink}}', $resetLink, $htmlBody);

					$data['response'] = $htmlBody;

					// Prepare the email data
					$emailData = [
						"message" => [
							"recipients" => [
								["email" => $email],
								["email" => 'loyaglobaltech@gmail.com'],
							],
							"body" => ["html" => $htmlBody],
							"subject" => "Password Reset RentSmallsmall",
							"from_email" => "donotreply@smallsmall.com",
							"from_name" => "SmallSmall Password Reset",
						],
					];

					// Send the email using the Unione API
					$responseEmail = $client->request('POST', 'email/send.json', [
						'headers' => $headers,
						'json' => $emailData,
					]);
					
				} catch (\GuzzleHttp\Exception\BadResponseException $e) {

					$data['response'] = $e->getMessage();
				}

				// End Of Unione

				// $this->email->from('donotreply@smallsmall.com', 'Small Small Password Reset');

				// $this->email->to($email);

				// $this->email->subject("Password Reset RentSmallsmall");

				// $this->email->set_mailtype("html");

				// $message = $this->load->view('email/header.php', $data, TRUE);

				// $message .= $this->load->view('email/emailreset.php', $data, TRUE);

				// $message .= $this->load->view('email/footer.php', $data, TRUE);

				// $message = $this->load->view('email/unione-email-template.php', $data, TRUE);

				// $message = 'This is a test message 1.';

				// var_dump($message);

				// $msg = $this->email->message('This is a test message 2.');

				// var_dump($msg);

				// $emailRes = $this->email->send();

				// var_dump($emailRes);

				// Print the debug output
				// echo $this->email->print_debugger();

				$notify = $this->functions_model->insert_user_notifications('Password Reset Request!', 'You initiated a password reset.', $res['userID'], 'Rent');

				if ($responseEmail) {

					echo 1;

				} else {

					echo 0;
				}

			} else {

				echo "Error inserting reset data";
			}
		} else {

			echo "Email does not exist!";
		}
	}


	public function first_timer_reset()
	{


		$data['userID'] = $this->session->userdata('userID');

		$data['ongod'] = 1;

		if ($this->session->has_userdata('userID') || $this->session->userdata('tempID')) {

			$data['title'] = "Reset Password SmallSmall";

			$this->load->view('templates/rss-header', $data);

			$this->load->view('rss-partials/reset-page', $data);

			$this->load->view('templates/footer');
		} else {

			redirect(base_url(), 'refresh');
		}
	}

	public function user_reset($userID, $reset_code)
	{

		$res = $this->rss_model->reset_password($userID, $reset_code);

		if ($res) {
			//echo $res['expiry_date'];

			$data['tempID'] = $res['userID'];

			if (!$this->session->has_userdata('userID')) {

				$userdata = array('tempID' => $res['userID']);

				$this->session->set_userdata($userdata);

				$data['title'] = "Reset Password SmallSmall";

				$this->load->view('templates/rss-login-header', $data);

				$this->load->view('rss-partials/reset-page', $data);
			} else {

				redirect(base_url(), 'refresh');
			}
		} else {

			//  $data['mob_color'] = "white";

			// 		$data['mob_icons'] = "blue";

			// 		$data['color'] = "white";

			// 		$data['logo'] = "blue";

			// 		$data['image'] = "without-image";

			$data['verification_status'] = $this->session->userdata('verified');

			$data['account_details'] = $this->rss_model->get_account_details($data['userID']);

			$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

			$data['title'] = "Reset Error";

			$data['payment'] = 0;

			$data['status'] = '<span style="color:#F00">Unsuccessful!</span>';

			$data['reason'] = 'This reset link is expired or already used, you can request another reset link by clicking on "Forgot Password"';

			// 			$this->load->view('templates/rss-header', $data);
			$this->load->view('templates/rss-updated-header', $data);

			$this->load->view('pages/confirmation-result', $data);

			// 			$this->load->view('templates/rss-footer');

			$this->load->view('templates/rss-updated-footer');

			$this->load->view('templates/rss-updated-js-files');
		}
	}

	public function get_available_date($propID)
	{

		$res = $this->rss_model->get_available_date($propID);
		if ($res) {
			return $res;
		} else {
			return 0;
		}
	}
	public function updateUserInfo()
	{

		$firstname = $this->input->post('firstname');

		$lastname = $this->input->post('lastname');

		$email = $this->input->post('email');

		$phone = $this->input->post('phone');

		$income_level = $this->input->post('income_level');

		$id = $this->input->post('user_id');

		//Check to see if email exists already

		$res = $this->rss_model->updateInfo($firstname, $lastname, $email, $phone, $income_level, $id);

		if ($res) {

			echo 1;
			$notify = $this->functions_model->insert_user_notifications('Profile Update', 'You have successfully updated your profile on SmallSmall.', $confirm_response['userID'], 'Rent');
		} else {

			echo 0;
		}
	}

	public function uploadProfilePicture($folder)
	{

		$userID = $this->session->userdata('userID');

		if (!$folder) {

			$folder = md5(date("Ymd His"));
		}

		sleep(1);

		if (!is_dir('./uploads/users/' . $folder)) {

			mkdir('./uploads/users/' . $folder, 0711, TRUE);
		}

		if ($_FILES["files"]["name"] != '') {

			$output = '';

			$config["upload_path"] = './uploads/users/' . $folder;

			$config["allowed_types"] = 'jpg|jpeg|png';

			$config['max_size'] = 10 * 1024;

			$config['encrypt_name'] = FALSE;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			$_FILES["file"]["name"] = $_FILES["files"]["name"];

			$_FILES["file"]["type"] = $_FILES["files"]["type"];

			$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"];

			$_FILES["file"]["error"] = $_FILES["files"]["error"];

			$_FILES["file"]["size"] = $_FILES["files"]["size"];

			if ($this->upload->do_upload('file')) {

				$data = $this->upload->data();

				$res = $this->rss_model->insertProfilePic($folder, $data['file_name']);

				$output = "success";

				$notify = $this->functions_model->insert_user_notifications('Profile Picture Changed', 'You have successfully cheanged your profile picture', $userID, 'Rent');


				//$output .= '<span class="imgCover" id="id-'.$data["file_name"].'"><img src="'.base_url().'uploads/furnisure/'.$folder.'/'.$data["file_name"].'" id="'.$data["file_name"].'" class="upldImg img-responsive img-thumbnail" onclick="selectFeatured(this.id)" title="Click to select as featured image" /></span>';
				$msg = $data['file_name'];
			} else {

				$output = "error";

				$msg = $this->upload->display_errors('', '');
			}

			//echo $output;

			echo json_encode(array('result' => $output, 'msg' => $msg));
		}
	}

	public function getBookingDuration()
	{

		$booking_id = $this->input->post('booking_id');

		$propID = $this->input->post('property_id');

		$fullduration = 0;

		$duration = array();

		$property = $this->rss_model->fetchProperty($propID);

		//$duration = "<select id='soflow'>";

		//$duration .= '<option value="Monthly" selected >Monthly</option>';

		$frequency = unserialize($property['frequency']);


		for ($i = 0; $i < count($frequency); $i++) {

			if ($frequency[$i] == 12) {

				//$duration .= '<option value="Quarterly">Quarterly</option><option value="Bi-annually">Bi-annually</option>';

				array_push($duration, $frequency[$i]);

				$fullduration = 1;
			}
		}
		//$duration .= '<option value="Upfront">Upfront</option>';

		//$duration .= "</select>";


		$intervals = array();
		//$intervals = "<select id='soflow'>";

		$int = unserialize($property['intervals']);

		for ($i = 0; $i < count($int); $i++) {

			array_push($intervals, $int[$i]);

			/*if($interval[$i] == 12){

				$intervals .= '<option value="'.$interval[$i].'">'.$interval[$i].'</option>';

			}elseif($interval[$i] == 9){

				$intervals .= '<option value="'.$interval[$i].'">'.$interval[$i].'</option>';

			}elseif($interval[$i] == 6){

				$intervals .= '<option value="'.$interval[$i].'">'.$interval[$i].'</option>';

			}elseif($interval[$i] == 3){

				$intervals .= '<option value="'.$interval[$i].'">'.$interval[$i].'</option>';

			}*/
		}

		//$intervals .= "</select>";

		echo json_encode(array("intervals" => $intervals, "duration" => $duration, 'price' => $property['price'], "verID" => $booking_id));
	}
	public function shorten_title($string)
	{

		if (strlen($string) >= 25) {
			echo substr($string, 0, 20) . " ... ";
		} else {
			echo $string;
		}
	}

	public function changePass()
	{

		if ($this->session->has_userdata('tempID')) {

			$user = $this->rss_model->getUser($this->session->userdata('tempID'));

			$password = $this->input->post('password');

			$res = $this->rss_model->changePass($password, $this->session->userdata('tempID'), $user['referral']);

			if ($res) {


				if ($user) {

					$data['name'] = $user['firstName'] . ' ' . $user['lastName'];

					$data['email'] = $user['email'];

					$this->email->from('donotreply@smallsmall.com', 'SmallSmall');

					$this->email->to($user['email']);

					$this->email->subject("Password Change SmallSmall");

					$this->email->set_mailtype("html");

					$message = $this->load->view('email/header.php', $data, TRUE);

					$message .= $this->load->view('email/passwordchange.php', $data, TRUE);

					$message .= $this->load->view('email/footer.php', $data, TRUE);

					$this->email->message($message);

					$this->email->send();

					$this->session->sess_destroy();

					$notify = $this->functions_model->insert_user_notifications('Password Change', 'You have successfully changed your password.', $user['userID'], 'Rent');

					echo 1;
				}
			} else {

				echo 0;
			}
		} else {

			echo 2;
		}
	}
	public function updatePlan()
	{

		if ($this->session->has_userdata('userID')) {

			$duration = $this->input->post('duration');

			$pPlan = $this->input->post('pPlan');

			$price = $this->input->post('price');

			$userID = $this->session->userdata('userID');

			$bookingID = $this->input->post('verification_id');

			$result = $this->rss_model->updateBookingPlan($duration, $pPlan, $price, $bookingID, $userID);

			if ($result) {

				$notify = $this->functions_model->insert_user_notifications('Payment Plan Update', 'You have successfully update your payment plan.', $confirm_response['userID'], 'Rent');

				echo 1;
			} else {

				echo 0;
				$notify = $this->functions_model->insert_user_notifications('Payment Plan Update', 'Your payment plan update failed. Please try again later', $confirm_response['userID'], 'Rent');
			}
		} else {

			redirect(base_url() . 'login', 'refresh');
		}
	}

	public function payment_success($ref)
	{

		require 'vendor/autoload.php'; // For Unione template authoload

		//$this->session->unset_userdata('payment');

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			// $user = $this->rss_model->getUser($this->session->userdata('userID'));

		}

		// Unione Template Header

		$headers = array(
			'Content-Type' => 'application/json',
			'Accept' => 'application/json',
			'X-API-KEY' => '6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha',
		);

		$client = new \GuzzleHttp\Client([
			'base_uri' => 'https://eu1.unione.io/en/transactional/api/v1/'
		]);

		$requestBody = [
			"id" => "5d97bd2a-0f33-11ee-99b6-c60fd5919487"
		];

		// end Unione Template

		$dets = $this->rss_model->getDetails($ref);

		if ($dets) {

			try {
				$response = $client->request('POST', 'template/get.json', array(
					'headers' => $headers,
					'json' => $requestBody,
				));

				$jsonResponse = $response->getBody()->getContents();

				$responseData = json_decode($jsonResponse, true);

				$htmlBody = $responseData['template']['body']['html'];

				// $email = $user['email'];

				$email = $data['email'];

				$userName = $data['fname'];

				$propertyTitle = $dets['propertyTitle'];

				$amountPaid = $dets['amount'];

				$paymentPlan = $dets['type'];

				$paymentType = $dets['payment_type'];

				$referenceID = $ref;

				$paymentPlan = $dets['payment_paln'];

				$duration = $dets['duration'];

				// Replace the placeholder in the HTML body with the username

				$htmlBody = str_replace('{{Name}}', $userName, $htmlBody);

				$htmlBody = str_replace('{{PropertyTitle}}', $propertyTitle, $htmlBody);

				$htmlBody = str_replace('{{Duration}}', $duration, $htmlBody);

				$htmlBody = str_replace('{{PaymentPlan}}', $paymentPlan, $htmlBody);

				$htmlBody = str_replace('{{AmountPaid}}', $amountPaid, $htmlBody);

				$htmlBody = str_replace('{{ModeOfPayment}}', $paymentType, $htmlBody);

				$htmlBody = str_replace('{{TransactionID}}', $referenceID, $htmlBody);

				$data['response'] = $htmlBody;

				// Prepare the email data
				$emailData = [
					"message" => [
						"recipients" => [
							["email" => $email],
							["email" => 'pidah.t@smallsmall.com'], // Just for testing
						],
						"body" => ["html" => $htmlBody],
						"subject" => "RentSmallsmall Payment successful notification",
						"from_email" => "donotreply@smallsmall.com",
						"from_name" => "SmallSmall Payment Alert",
					],
				];

				// Send the email using the Unione API
				$responseEmail = $client->request('POST', 'email/send.json', [
					'headers' => $headers,
					'json' => $emailData,
				]);

				echo 1;
			} catch (\GuzzleHttp\Exception\BadResponseException $e) {
				$data['response'] = $e->getMessage();
			}
		}

		$prop_update = $this->rss_model->updatePropStat($dets['propertyID'], $dets['rent_expiration']);

		$data['payment_status'] = "Payment Success";

		$data['title'] = "Payment Successful";

		$data['propTitle'] = $dets['propertyTitle'];

		$data['propPrice'] = $dets['amount'];

		$data['type'] = $dets['type'];

		$this->load->view('templates/no-nav-header', $data);

		$this->load->view('pages/payment-result', $data);

		$this->load->view('templates/footer');
	}

	public function payment_fail()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');
		}

		$dets = $this->rss_model->getDetails($ref);

		$data['payment_status'] = "Payment Success";

		$data['title'] = "Payment Successful";

		$data['propTitle'] = $dets['propertyTitle'];

		$data['propPrice'] = $dets['amount'];

		$data['type'] = $dets['type'];

		$data['title'] = "Booking Successful";


		$this->load->view('templates/no-nav-header', $data);

		$this->load->view('pages/payment-result', $data);

		$this->load->view('templates/footer');
	}


	public function renew_rent($id)
	{

		$price = 0;

		$ref = 'rss_' . md5(rand(1000000, 9999999999));

		$payment_details = $this->rss_model->get_renewal_details($id);

		$prodPrice = 0;

		if ($payment_details['payment_plan'] == "Monthly") {

			$prodPrice = $payment_details['price'] * 1;
		} elseif ($payment_details['payment_plan'] == "Quarterly") {

			$prodPrice = $payment_details['price'] * 3;
		} elseif ($payment_details['payment_plan'] == "Bi-annually") {

			$prodPrice = $payment_details['price'] * 6;
		} elseif ($payment_details['payment_plan'] == "Upfront") {

			if ($payment_details['duration'] == 12) {

				$prodPrice = $payment_details['price'] * 12;
			} elseif ($payment_details['duration'] == 3) {

				$prodPrice = $payment_details['price'] * 3;
			} elseif ($payment_details['duration'] == 6) {

				$prodPrice = $payment_details['price'] * 6;
			} elseif ($payment_details['duration'] == 9) {

				$prodPrice = $payment_details['price'] * 9;
			}
		}

		$prodPrice = $prodPrice + $payment_details['securityDeposit'];

		//echo $prodPrice;  
		//print_r($payment_details);		
		//exit; 

		//Insert the new transaction
		$renewed = $this->rss_model->renewRssTrans('rss', $this->session->userdata('userID'), $payment_details['propertyID'], $prodPrice, $ref, $payment_details['verification_id'], $payment_details['transaction_id']);

		$p_data['email'] = $payment_details['email'];

		$p_data['amount'] = $prodPrice;

		$p_data['method'] = 'paystack';

		$p_data['ref'] = $ref;

		$this->session->set_userdata('payment', $p_data);

		header("Location:" . base_url() . "pay/");

		//echo json_encode(array('result' => $result, 'msg' => $amount, 'email' => $email, 'method' => 'paystack', 'ref' => $ref));

	}

	public function switchPaymentType()
	{

		$pType = $this->input->post("pType");

		$tID = $this->input->post("tID");

		$res = $this->rss_model->switchPaymentMode($pType, $tID);

		if ($res) {

			echo 1;
		} else {

			echo 0;
		}
	}

	public function insert_stats()
	{

		//Get IP Address		
		$ip_add = $_SERVER['REMOTE_ADDR'];

		$user_agent = $_SERVER['HTTP_USER_AGENT'];

		$referrer = 'https://dev-rent.smallsmall.com';

		if (isset($_SERVER['HTTP_REFERER'])) {
			$referrer = $_SERVER['HTTP_REFERER'];
		}

		//Get Device Type

		//Get Country and city
		$geo = $this->getGeo($ip_add);

		$country = @$geo[0];

		$city = @$geo[1];

		$ua = $this->browserName($user_agent);

		//Browser name
		$browser_name = $ua['name'];

		//Device name
		$device = $ua['userAgent'];

		$visits = 1;

		//Check if user has visits today already

		$today_result = $this->rss_model->check_returning($ip_add);

		$visits = $today_result['visits'] + 1;

		if (!$today_result) {
			//Add to visits today
			$this->rss_model->addVisits($ip_add, $country, $city, $browser_name, 1, $device, $referrer);
		} else {
			$this->rss_model->updateVisits($visits, $ip_add);
		}
	}

	public function getGeo($ip)
	{

		// Use JSON encoded string and converts 
		// it into a PHP variable 
		$ipdat = @json_decode(file_get_contents(
			"http://www.geoplugin.net/json.gp?ip=" . $ip
		));

		$geos = array();

		if (is_array($ipdat))
			$geos = array($ipdat->geoplugin_countryName, $ipdat->geoplugin_city);

		return $geos;

		/*echo 'Country Name: ' . $ipdat->geoplugin_countryName . "\n"; 
		echo 'City Name: ' . $ipdat->geoplugin_city . "\n"; 
		echo 'Continent Name: ' . $ipdat->geoplugin_continentName . "\n"; 
		echo 'Latitude: ' . $ipdat->geoplugin_latitude . "\n"; 
		echo 'Longitude: ' . $ipdat->geoplugin_longitude . "\n"; 
		echo 'Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "\n"; 
		echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n"; 
		echo 'Timezone: ' . $ipdat->geoplugin_timezone; */
	}

	public function browserName($u_agent)
	{

		$bname = 'Unknown';
		$platform = 'Unknown';
		$version = "";
		$ub = "";

		//First get the platform?
		if (preg_match('/linux/i', $u_agent)) {
			$platform = 'linux';
		} elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
			$platform = 'mac';
		} elseif (preg_match('/windows|win32/i', $u_agent)) {
			$platform = 'windows';
		}

		// Next get the name of the useragent yes seperately and for good reason
		if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
			$bname = 'Internet Explorer';
			$ub = "MSIE";
		} elseif (preg_match('/Firefox/i', $u_agent)) {
			$bname = 'Mozilla Firefox';
			$ub = "Firefox";
		} elseif (preg_match('/OPR/i', $u_agent)) {
			$bname = 'Opera';
			$ub = "Opera";
		} elseif (preg_match('/Chrome/i', $u_agent) && !preg_match('/Edge/i', $u_agent)) {
			$bname = 'Google Chrome';
			$ub = "Chrome";
		} elseif (preg_match('/Safari/i', $u_agent) && !preg_match('/Edge/i', $u_agent)) {
			$bname = 'Apple Safari';
			$ub = "Safari";
		} elseif (preg_match('/Netscape/i', $u_agent)) {
			$bname = 'Netscape';
			$ub = "Netscape";
		} elseif (preg_match('/Edge/i', $u_agent)) {
			$bname = 'Edge';
			$ub = "Edge";
		} elseif (preg_match('/Trident/i', $u_agent)) {
			$bname = 'Internet Explorer';
			$ub = "MSIE";
		}

		// finally get the correct version number
		$known = array('Version', @$ub, 'other');
		$pattern = '#(?<browser>' . join('|', $known) .
			')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
		if (!preg_match_all($pattern, $u_agent, $matches)) {
			// we have no matching number just continue
		}
		// see how many we have
		$i = count($matches['browser']);
		if ($i != 1) {
			//we will have two since we are not using 'other' argument yet
			//see if version is before or after the name
			if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
				$version = $matches['version'][0];
			} else {
				$version = $matches['version'][1];
			}
		} else {
			$version = $matches['version'][0];
		}

		// check if we have a number
		if ($version == null || $version == "") {
			$version = "?";
		}

		return array(
			'userAgent' => $u_agent,
			'name'      => $bname,
			'version'   => $version,
			'platform'  => $platform,
			'pattern'    => $pattern
		);
	}
	public function contactFormData()
	{

		$name = $this->input->post('name');

		$phone = $this->input->post('phone');

		$email = $this->input->post('email');

		$msg = $this->input->post('msg');

		$result = $this->rss_model->contactFormData($name, $phone, $email, $msg);

		if ($result) {
			//Send message to CX
			$data['name'] = $name;

			$data['msg'] = $msg;

			$this->email->from($email, $name);

			$this->email->to('customerexperience@smallsmall.com');

			$this->email->subject("Message From Contact Form");

			$this->email->set_mailtype("html");

			$message = $this->load->view('email/header.php', $data, TRUE);

			$message .= $this->load->view('email/cx-new-message.php', $data, TRUE);

			$message .= $this->load->view('email/footer.php', $data, TRUE);

			$this->email->message($message);

			$emailRes = $this->email->send();

			if ($emailRes) {

				echo 1;
			} else {

				echo 0;
			}
		} else {

			echo 0;
		}
	}

	public function pay_test()
	{

		$p_data = $this->session->userdata('payment');

		//Decrypt both parameters		
		$email = 'seuncrowther@yahoo.com';

		$amount = 100;

		$ref = rand(1000000, 9999999999);

		$curl = curl_init();

		$grandT = $amount;

		$amount = $grandT * 100;

		/*$ref = rand(1000000, 9999999999);*/

		$callback_url = base_url() . 'rss/verify-test-payment/' . $ref;

		curl_setopt_array($curl, array(

			CURLOPT_URL => "https://api.paystack.co/transaction/initialize",

			CURLOPT_RETURNTRANSFER => true,

			CURLOPT_CUSTOMREQUEST => "POST",

			CURLOPT_POSTFIELDS => json_encode([

				'amount' => $amount,

				'email' => $email,

				"reference" => $ref,

				"callback_url" => $callback_url

			]),

			CURLOPT_HTTPHEADER => [

				"authorization: Bearer sk_test_c547a9dec4baacddfd7a8726a131758c2102cae7", //replace this with your own test key

				"content-type: application/json",

				"cache-control: no-cache"

			],

		));

		$response = curl_exec($curl);

		$err = curl_error($curl);

		if ($err) {

			// there was an error contacting the Paystack API

			die('Curl returned error: ' . $err);
		}

		$tranx = json_decode($response, true);

		header('Location: ' . $tranx['data']['authorization_url']);



		//$this->session->unset_userdata('payment');

		//$this->session->unset_userdata(array('email' => '', 'amount' => '', 'ref' => '', 'method' => ''));

	}

	public function verify_test_payment($ref)
	{

		$result = array();

		$url = 'https://api.paystack.co/transaction/verify/' . $ref;

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		curl_setopt(
			$ch,
			CURLOPT_HTTPHEADER,
			[
				'Authorization: Bearer sk_test_c547a9dec4baacddfd7a8726a131758c2102cae7'
			]
		);

		$request = curl_exec($ch);

		curl_close($ch);

		//
		if ($request) {

			$result = json_decode($request, true);


			if ($result) {
				if ($result['data']) {
					//something came in
					if ($result['data']['status'] == 'success') {

						//echo "Transaction was successful";
						$ref = $result['data']['reference'];

						$trans = $this->rss_model->updateTransaction("approved", $ref);

						//$transID = $this->rss_model->getTheBookingID($ref);

						$booking_res = $this->rss_model->get_renewal_details($ref);


						$startDate = date("Y-m-d", strtotime($booking_res['move_in_date'])); // select date in Y-m-d format

						$expiry = "";

						$nMonths = 0;



						if ($booking_res['type'] == 'rss') {


							if ($booking_res['payment_plan'] == 'Monthly') {

								$nMonths = 1; // choose how many months you want to move ahead

							} else if ($booking_res['payment_plan'] == 'Quaterly') {

								$nMonths = 3; // choose how many months you want to move ahead

							} else if ($booking_res['payment_plan'] == 'Bi-annually') {

								$nMonths = 6; // choose how many months you want to move ahead

							} else if ($booking_res['payment_plan'] == 'Upfront' && $booking_res['duration'] == 12) {

								$nMonths = 12; // choose how many months you want to move ahead

							} else if ($booking_res['payment_plan'] == 'Upfront' && $booking_res['duration'] == 9) {

								$nMonths = 9; // choose how many months you want to move ahead

							} else if ($booking_res['payment_plan'] == 'Upfront' && $booking_res['duration'] == 6) {

								$nMonths = 6; // choose how many months you want to move ahead

							} else if ($booking_res['payment_plan'] == 'Upfront' && $booking_res['duration'] == 3) {

								$nMonths = 3; // choose how many months you want to move ahead

							}

							$expiry = $this->endCycle($startDate, $nMonths); // output: 2014-07-02

							//Update rent status of the booking table
							$res = $this->rss_model->updateBookingStat($booking_res['bookingID'], $expiry);

							//Update available date in Property table

							$propUpd = $this->rss_model->updateAvailDate($expiry, $booking_res['propertyID']);
						}

						header("Location: " . base_url() . 'rss/payment-success/' . $ref);
					} else {
						// the transaction was not successful, do not deliver value'
						// print_r($result);  //uncomment this line to inspect the result, to check why it failed.
						$trans = $this->rss_model->updateTransaction("declined", $ref);

						header("Location: " . base_url() . 'rss/payment-fail/' . $ref);
					}
				} else {

					$trans = $this->rss_model->updateTransaction("declined", $ref);
					//echo $result['message'];
					header("Location: " . base_url() . 'rss/payment-fail/' . $ref);
				}
			} else {

				$trans = $this->rss_model->updateTransaction("declined", $ref);
				//print_r($result);
				//die("Something went wrong while trying to convert the request variable to json. Uncomment the print_r command to see what is in the result variable.");
				header("Location: " . base_url() . 'rss/payment-fail/' . $ref);
			}
		} else {

			$trans = $this->rss_model->updateTransaction("declined", $ref);
			//var_dump($request);
			//die("Something went wrong while executing curl. Uncomment the var_dump line above this line to see what the issue is. Please check your CURL command to make sure everything is ok");
			header("Location: " . base_url() . 'rss/payment-fail/' . $ref);
		}
	}

	public function test_date()
	{

		$expiry = $this->endCycle(date("Y-m-d"), 2);

		echo $expiry;

		exit;
	}

	public function getting_renewal_details($ref)
	{

		print_r($this->rss_model->get_renewal_details($ref));
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
	public function edit_properties()
	{


		//Get properties from DB1
		$properties = $this->rss_model->get_all_rss_props();

		foreach ($properties as $property) {
			$res = $this->rss_model->update_residential($property['propertyID'], 0);
			if (!$res) {

				echo "There seems to be a problem here with property ID: " . $property['propertyID'] . ' - ' . $res;
			}
		}

		echo "finished";
	}

	public function copy_furnisure()
	{

		$status = 0;

		//Get properties from DB1
		$properties = $this->furnisure_model->get_all_furnisure();

		foreach ($properties as $property) {

			if (!$this->furnisure_model->insert_into_furnisure($property['applianceID'], $property['folderName'], $property['featuredImg'], $property['applianceName'], $property['cost'], $property['applianceType'], $property['description'], $property['dateOfEntry'])) {

				echo "There seems to be a problem here with furniture ID: " . $property['applianceID'];
			}
		}

		echo "finished";
	}


	public function get_images($folder, $product)
	{

		/*
    		Full path to property folder name and featured Image name
    		https://www.rentsmallsmall.com/uploads/properties/{folder_column}
    		https://www.rentsmallsmall.com/uploads/properties/{folder_column}/{featured_image_column}
    	*/
		$item_images = array();

		if ($product == 'properties' || $product == 'furnisure') {

			//Specify the path to property image folder
			$dir = './uploads/' . $product . '/' . $folder . '/';

			//Check to see if folder exists
			if (file_exists($dir) == false) {

				$item_images = 'Directory not found!';
			} else {
				//Get the content of folder
				$dir_contents = scandir($dir);

				$count = 0;

				$content_size = count($dir_contents);

				//Recursively display images
				foreach ($dir_contents as $file) {

					//Make sure the the script picks up only image files because there is another folder in here for facilities
					if ($file !== '.' && $file !== '..' && $count <= ($content_size - 2)) {


						// Display your images here or anything else

						array_push($item_images, $file);
					}
					$count++;
				}
			}
		} else {

			$item_images = 'Wrong product type. Correct product type is either Properties or furnisure';
		}

		echo json_encode($item_images);
	}


	public function updateTransaction()
	{

		$bID = $this->input->post("bookingID");

		$refID = $this->input->post("referenceID");

		$rent_exp = $this->input->post("rent_exp");

		$duration = $this->input->post("duration");

		$amount = $this->input->post("amount");

		$pplan = $this->input->post("pplan");

		$propertyID = $this->input->post("propertyID");

		$userID = $this->input->post("userID");


		if ($this->rss_model->transUpdate($bID, $refID, $amount)) {

			//Update booking table
			$this->rss_model->bookingUpdate($bID, $rent_exp, $duration, $pplan, $propertyID);

			$transdet = $this->rss_model->getTransDet($userID);

			$bkdets = $this->rss_model->getBookingDet($userID);

			$refrID = 'rss_' . md5(rand(1000000, 9999999999));

			$bkId = $this->random_strings(5);

			$trans = $this->rss_model->insTransUpdate($transdet['verification_id'], $bkId, $refrID, $transdet['userID'], $transdet['amount'], $transdet['type'], $transdet['payment_type'], $transdet['invoice'], $transdet['approved_by'], $transdet['transaction_date']);

			$bookings = $this->rss_model->insBookingUpdate($bkdets['verification_id'], $refrID, $bkId, $bkdets['propertyID'], $bkdets['userID'], $bkdets['booked_as'], $bkdets['payment_plan'], $bkdets['duration'], $bkdets['move_in_date'], $bkdets['move_out_date'], $bkdets['move_out_reason'], $bkdets['rent_expiration'], $bkdets['next_rental'], $bkdets['booked_on'], $bkdets['updated_at'], $bkdets['rent_status'], $bkdets['eviction_deposit'], $bkdets['subscription_fees'], $bkdets['service_charge_deposit'], $bkdets['security_deposit_fund'], $bkdets['total']);

			if($trans && $bookings)
			{
				echo 1;
			}
			
		} else {

			echo 0;
		}
	}

	public function renewedTrans()
	{
		$bID = $this->input->post("bookingID");

		$refID = $this->input->post("referenceID");

		$rent_exp = $this->input->post("rent_exp");

		$duration = $this->input->post("duration");

		$amount = $this->input->post("amount");

		$pplan = $this->input->post("pplan");

		$propertyID = $this->input->post("propertyID");

		$verificationID = $this->input->post("verificationID");

		$userID = $this->session->userdata('userID');

		$user = $this->rss_model->get_user($user_id);

		$data['name'] = $user['firstName'] . ' ' . $user['lastName'];

		$data['propertyName'] = $booking_det['propertyTitle'];

		$data['prop_id'] = $propertyID;

		$randomNum = rand(10, 99999);

		if ($pplan == 'Monthly') {
			$p_plan = 1;
		} elseif ($pplan == 'Quarterly') {
			$p_plan = 3;
		} elseif ($pplan == 'Bi-annually') {
			$p_plan = 6;
		} else {
			$p_plan = 12;
		}

		if ($this->rss_model->transInsert($bID, $refID, $amount, $verificationID, $duration, $userID)) {

			$booking_det = $this->rss_model->get_booking_details($propertyID, $bID, $refID);

			//Prepare PDF content
			$pdf_content = '<div style="width:90%;margin:auto;padding-top:50px;"><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="logo"><img width="150px" src=' . base_url() . '"assets/img/logo.png" /></div></td><td width="33.3%"></td><td width="33.3%"><div class="company-address" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>From Address</b><br />' . base_url() . '<br />No. 1 Akinyemi Avenue,<br />Lekki Phase 1,<br />Lekki Lagos,<br />Nigeria.<br />(+234)903 722 2669</div></td></tr></table><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="invoice-details" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>Invoice:</b> ' . $bID . '_' . $randomNum . '<br /><b>Transaction ID:</b> ' . $refID . '<br />Invoice date: ' . date("d/m/Y") . '<br />Email: ' . $user['email'] . '<br />Phone Number: ' . $user['phone'] . '</div></td><td width="33.3%"></td><td width="33.3%"><div class="company-address" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>Billing Address</b><br />' . $user['name'] . '<!---<br />9b Adedapo Williams Close, Off Emeka Nweze Str<br />Lekki Phase 1,<br />Lekki Lagos,<br />--->Nigeria.<br />' . $user['phone'] . '</div></td></tr></table><table width="100%" cellpadding="10" style="border:1px solid #f1f3f3;"><tr><th style="background:#2E2E2E;width:60%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Description</th><th style="background:#2E2E2E;width:20%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Duration</th><th style="background:#2E2E2E;width:20%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Cost</th></tr><tr><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left"><b>' . $booking_det['propertyTitle'] . '</b><div style="font-family:helvetica;font-size:12px;color:#333333">' . $booking_det['address'] . ', ' . $booking_det['city'] . '</div></td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">' . $p_plan . ' Month(s)</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N' . number_format($amount) . '.00</td></tr><tr><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;"><b>Security Deposit</b></td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">0 Month(s)</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N 0.00</td></tr></table><table width="100%" cellpadding="10" style="border:1px solid #f1f3f3;display:table"><tr><td width="80%" valign="top" style="border:1px solid #f1f3f3;font-weight:bold;font-family:helvetica;font-size:14px;text-align:right">Subtotal</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N' . number_format($amount) . '.00</td></tr><tr><td width="80%" valign="top" style="border:1px solid #f1f3f3;font-weight:bold;font-family:helvetica;font-size:14px;text-align:right">Total</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N' . number_format($amount) . '.00</td></tr></table><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="invoice-details" style="font-family:helvetica;font-size:14px;line-height:25px;">Account Number: 7900982382<br />Providus Bank<br />RentSmallSmall Ltd.</div></td><td width="33.3%"></td><td width="33.3%"></td></tr></table></div>';

			//Update booking table
			$this->rss_model->bookingUpdate($bID, $rent_exp, $duration, $pplan, $propertyID);
			//Set folder to save PDF to
			$this->html2pdf->folder('./assets/pdf/tenant/' . $bID . '/');

			//Set the filename to save/download as
			$this->html2pdf->filename($bID . '_' . $randomNum . '_invoice.pdf');

			//Set the paper defaults
			$this->html2pdf->paper('a4', 'portrait');

			//Load html view
			$this->html2pdf->html($pdf_content);

			//Create the PDF
			$path = $this->html2pdf->create('save');

			$this->email->from('no-reply@smallsmall.com', 'SmallSmall');

			$this->email->to($user['email']);

			$this->email->cc('accounts@smallsmall.com');

			$this->email->bcc('customerexperience@smallsmall.com');

			$this->email->set_mailtype("html");

			$this->email->subject("Successful renewal!");

			$message = $this->load->view('email/header.php', $data, TRUE);

			$message .= $this->load->view('email/payment-confirmation-email.php', $data, TRUE);

			$message .= $this->load->view('email/footer.php', $data, TRUE);

			$this->email->message($message);

			if ($path) {

				$this->email->attach($path);
			}

			$emailRes = $this->email->send();

			echo 1;
		} else {

			echo 0;
		}
	}
	public function updatePayment()
	{

		$bID = $this->input->post("bookingID");

		$refID = $this->input->post("referenceID");

		$amount = $this->input->post("amount");

		$expiry = $this->input->post("expiry");

		$propertyID = $this->input->post("propertyID");

		$userID = $this->session->userdata('userID');

		$path = "";

		$pplan = 0;

		$booking_det = $this->rss_model->get_booking_details($propertyID, $bID, $refID);

		$user = $this->rss_model->get_user($userID);

		if ($booking_det['payment_plan'] == 'Monthly') {
			$pplan = 1;
		} elseif ($booking_det['payment_plan'] == 'Quarterly') {
			$pplan = 3;
		} elseif ($booking_det['payment_plan'] == 'Bi-annually') {
			$pplan = 6;
		} else {
			$pplan = 12;
		}

		$pdf_content = '<div style="width:90%;margin:auto;padding-top:50px;"><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="logo"><img width="150px" src=' . base_url() . '"assets/img/logo.png" /></div></td><td width="33.3%"></td><td width="33.3%"><div class="company-address" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>From Address</b><br />' . base_url() . '<br />No. 1 Akinyemi Avenue,<br />Lekki Phase 1,<br />Lekki Lagos,<br />Nigeria.<br />(+234)903 722 2669</div></td></tr></table><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="invoice-details" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>Invoice:</b> ' . $bID . '<br /><b>Transaction ID:</b> ' . $refID . '<br />Invoice date: ' . date("d/m/Y") . '<br />Email: ' . $user['email'] . '<br />Phone Number: ' . $user['phone'] . '</div></td><td width="33.3%"></td><td width="33.3%"><div class="company-address" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>Billing Address</b><br />' . $user['firstName'] . ' ' . $user['lastName'] . '<!---<br />9b Adedapo Williams Close, Off Emeka Nweze Str<br />Lekki Phase 1,<br />Lekki Lagos,<br />--->Nigeria.<br />' . $user['phone'] . '</div></td></tr></table><table width="100%" cellpadding="10" style="border:1px solid #f1f3f3;"><tr><th style="background:#2E2E2E;width:60%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Description</th><th style="background:#2E2E2E;width:20%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Duration</th><th style="background:#2E2E2E;width:20%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Cost</th></tr><tr><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left"><b>' . $booking_det['propertyTitle'] . '</b><div style="font-family:helvetica;font-size:12px;color:#333333">' . $booking_det['address'] . ', ' . $booking_det['city'] . '</div></td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">' . $pplan . ' Month(s)</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N' . number_format($pplan * $booking_det['price']) . '.00</td></tr><tr><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;"><b>Security Deposit</b></td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">' . $booking_det['securityDepositTerm'] . ' Month(s)</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N' . number_format($booking_det['securityDepositTerm'] * $booking_det['securityDeposit']) . '.00</td></tr></table><table width="100%" cellpadding="10" style="border:1px solid #f1f3f3;display:table"><tr><td width="80%" valign="top" style="border:1px solid #f1f3f3;font-weight:bold;font-family:helvetica;font-size:14px;text-align:right">Subtotal</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N' . number_format($pplan * $booking_det['price']) . '.00</td></tr><tr><td width="80%" valign="top" style="border:1px solid #f1f3f3;font-weight:bold;font-family:helvetica;font-size:14px;text-align:right">Total</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N' . number_format($booking_det['amount']) . '.00</td></tr></table><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="invoice-details" style="font-family:helvetica;font-size:14px;line-height:25px;">Account Number: 7900982382<br />Providus Bank<br />RentSmallSmall Ltd.</div></td><td width="33.3%"></td><td width="33.3%"></td></tr></table></div>';

		$data['name'] = $user['lastName'];

		$data['propertyName'] = $booking_det['propertyTitle'];

		$data['prop_id'] = $propertyID;

		if (!is_dir('assets/pdf/tenant/' . $bID)) {

			mkdir('./assets/pdf/tenant/' . $bID, 0711, TRUE);
		}

		if ($this->rss_model->paymentUpdate($bID, $expiry, $refID, $propertyID)) {
			//Send a message with an invoice here and send one to customer experience too
			//Set folder to save PDF to
			$this->html2pdf->folder('./assets/pdf/tenant/' . $bID . '/');

			//Set the filename to save/download as
			$this->html2pdf->filename($bID . '_invoice.pdf');

			//Set the paper defaults
			$this->html2pdf->paper('a4', 'portrait');

			//Load html view
			$this->html2pdf->html($pdf_content);

			//Create the PDF
			$path = $this->html2pdf->create('save');

			$this->email->from('no-reply@smallsmall.com', 'SmallSmall');

			$this->email->to($user['email']);

			$this->email->cc('accounts@smallsmall.com');

			$this->email->bcc('customerexperience@smallsmall.com');

			$this->email->set_mailtype("html");

			$this->email->subject("Successful payment!");

			$message = $this->load->view('email/header.php', $data, TRUE);

			$message .= $this->load->view('email/payment-confirmation-email.php', $data, TRUE);

			$message .= $this->load->view('email/footer.php', $data, TRUE);

			$this->email->message($message);

			if ($path) {

				$this->email->attach($path);
			}

			$emailRes = $this->email->send();

			echo 1;
		} else {

			echo 0;
		}
	}

	public function get_rentals()
	{

		$result = $this->rss_model->get_rental_detail();

		for ($i = 0; $i < count($result); $i++) {

			$trans_date = $this->rss_model->get_last_trans($result[$i]['bookingID']);

			$startDate = date("Y-m-d", strtotime($result[$i]['move_in_date'])); //select date in Y-m-d format

			$expiry = date('Y-m-d', strtotime($result[$i]['move_in_date']));

			$nMonths = 0;

			$occurences = count($trans_date);

			if ($occurences > 0) {

				if ($result[$i]['payment_plan'] == 'Monthly') {

					$nMonths = $occurences;
				} else if ($result[$i]['payment_plan'] == 'Quarterly') {

					$nMonths = $occurences * 3;
				} else if ($result[$i]['payment_plan'] == 'Bi-annually') {

					$nMonths = $occurences * 6;
				}

				$expiry = $this->endCycle($startDate, $nMonths); // output: 2014-07-02
			}

			$res = $this->rss_model->update_renewal_date($result[$i]['id'], $expiry);
		}

		echo "done";
	}


	public function send_confirmation($userID)
	{

		$user = $this->rss_model->getConfirmationUser($userID);

		if (@$user) {

			if ($user['confirmation'] == "") {
				echo "User already confirmed!";
				exit;
			}


			$data['confirmationLink'] = base_url() . 'confirm/' . $user['confirmation'];

			$data['name'] = $user['firstName'];

			$data['email'] = $user['email'];

			$this->email->from('donotreply@smallsmall.com', 'SmallSmall');

			$this->email->to($user['email']);

			$this->email->subject("Email Confirmation SmallSmall");

			$this->email->set_mailtype("html");

			$message = $this->load->view('email/header.php', $data, TRUE);

			$message .= $this->load->view('email/confirmationemail.php', $data, TRUE);

			$message .= $this->load->view('email/footer.php', $data, TRUE);

			$this->email->message($message);

			if ($this->email->send()) {

				echo "Confirmation sent!";
				exit;
			} else {

				echo "Unsuccessful";
				exit;
			}
		} else {

			echo "User does not exist";
			exit;
		}
	}


	public function test_pdf()
	{

		$data['prop_id'] = 356406178223;

		$data['propertyName'] = 'Standard Studio Unit 7 Castle Condo';

		$invoice_num = rand(1, 9999999999);

		$pdf_content = '<div style="width:90%;margin:auto;padding-top:50px;"><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="logo"><img width="150px" src=' . base_url() . '"assets/img/logo.png" /></div></td><td width="33.3%"></td><td width="33.3%"><div class="company-address" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>From Address</b><br />' . base_url() . '<br />No. 1 Akinyemi Avenue,<br />Lekki Phase 1,<br />Lekki Lagos,<br />Nigeria.<br />(+234)903 722 2669</div></td></tr></table><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="invoice-details" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>Invoice:</b> 12345678<br /><b>Transaction ID:</b> EA48458G93K<br />Invoice date: 27/10/2021<br />Email: seuncrowther@yahoo.com<br />Phone Number: 08097532159</div></td><td width="33.3%"></td><td width="33.3%"><div class="company-address" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>Billing Address</b><br />Oluwaseun Crowther<br />9b Adedapo Williams Close, Off Emeka Nweze Str<br />Lekki Phase 1,<br />Lekki Lagos,<br />Nigeria.<br />08097532159</div></td></tr></table><table width="100%" cellpadding="10" style="border:1px solid #f1f3f3;"><tr><th style="background:#2E2E2E;width:60%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Description</th><th style="background:#2E2E2E;width:20%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Duration</th><th style="background:#2E2E2E;width:20%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Cost</th></tr><tr><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left"><b>2 Bedroom flat Awoyaya</b></td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">3 Months</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N148,600.00</td></tr><tr><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;"><b>Security Deposit</b></td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">1 Month</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N49,200.00</td></tr></table><table width="100%" cellpadding="10" style="border:1px solid #f1f3f3;display:table"><tr><td width="80%" valign="top" style="border:1px solid #f1f3f3;font-weight:bold;font-family:helvetica;font-size:14px;text-align:right">Subtotal</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N148,600.00</td></tr><tr><td width="80%" valign="top" style="border:1px solid #f1f3f3;font-weight:bold;font-family:helvetica;font-size:14px;text-align:right">Total</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N148,600.00</td></tr></table><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="invoice-details" style="font-family:helvetica;font-size:14px;line-height:25px;">Account Number: 7900982382<br />Providus Bank<br />RentSmallSmall Ltd.</div></td><td width="33.3%"></td><td width="33.3%"></td></tr></table></div>';

		if (!is_dir('assets/pdf/tenant/' . $bID)) {

			mkdir('./assets/pdf/tenant/' . $bID, 0711, TRUE);
		}

		//Set folder to save PDF to
		$this->html2pdf->folder('./assets/pdf/tenant/' . $bID . '/');

		//Set the filename to save/download as
		$this->html2pdf->filename($invoice_num . '_invoice.pdf');

		//Set the paper defaults
		$this->html2pdf->paper('a4', 'portrait');

		//Load html view
		$this->html2pdf->html($pdf_content);

		//Create the PDF
		$path = $this->html2pdf->create('save');

		$this->email->from('no-reply@smallsmall.com', 'SmallSmall');

		$this->email->to('seuncrowther@yahoo.com');

		$this->email->cc('accounts@smallsmall.com');

		$this->email->bcc('customerexperience@smallsmall.com');

		$this->email->set_mailtype("html");

		$this->email->subject("Invoice");

		$message = $this->load->view('email/header.php', $data, TRUE);

		$message .= $this->load->view('email/confirmationemail.php', $data, TRUE);

		$message .= $this->load->view('email/footer.php', $data, TRUE);

		$this->email->message($message);

		if ($path) {

			$this->email->attach($path);
		}

		$emailRes = $this->email->send();
	}

	public function send_inspection_email($inspectionID)
	{

		$insp = $this->rss_model->get_insp_dets($inspectionID);

		$inspectionDate = $insp['inspectionDate'];

		$inspectionType = $insp['inspectionType'];

		$propID = $insp['propertyID'];

		$userID = $insp['userID'];

		$user = $this->rss_model->get_user($userID);

		$property = $this->rss_model->get_property($propID);

		$the_date = date("Y-m-d H:i:s", strtotime($inspectionDate));

		$data['name'] = $user['firstName'] . ' ' . $user['lastName'];

		$data['inspectionDate'] = date('d F Y', strtotime($inspectionDate));

		$data['inspectionType'] = $inspectionType;

		$data['propName'] = $property['propertyTitle'];

		$data['propAddress'] = $property['address'] . ', ' . $property['city'];

		$data['custname'] = $data['name'];

		$data['custemail'] = $user['email'];

		$data['custphone'] = $user['phone'];

		$data['leadchannel'] = $user['about_us'];

		$data['leadsource'] = $user['platform'];

		$data['propertyName'] = $property['propertyTitle'];

		$data['income'] = $user['income_level'];

		$data['signup_date'] = date('d F Y', strtotime($user['created_at']));

		$data['inspectionDate'] = date('d F Y H:i', strtotime($inspectionDate));
		$data['propID'] = $propID;
		$this->email->from('donotreply@smallsmall.com', 'Small Small');

		$this->email->to('customerexperience@smallsmall.com');

		$this->email->subject("New Inspection Request!");

		$this->email->set_mailtype("html");

		$message = $this->load->view('email/header.php', $data, TRUE);

		$message .= $this->load->view('email/newinspection.php', $data, TRUE);

		$message .= $this->load->view('email/footer.php', $data, TRUE);

		$this->email->message($message);

		$custEmail = $this->email->send();


		if (date('N', strtotime(date('Y-m-d'))) >= 6) {
			if (date('H') >= 17) {
				//$pre2pm = true;
				//Send auto-response email
				$data['name'] = $user['name'];

				$this->email->to($user['email']);

				$this->email->subject("Auto Response !");

				$this->email->set_mailtype("html");

				$message = $this->load->view('email/header.php', $data, TRUE);

				$message .= $this->load->view('email/inspection-auto-response.php', $data, TRUE);

				$message .= $this->load->view('email/footer.php', $data, TRUE);

				$this->email->message($message);

				$this->email->send();
			}
		}

		if ($custEmail)
			echo 1;
		else
			echo 0;
	}
	public function test_lenco()
	{


		if (!file_exists(APPPATH . 'views/rss-partials/test-lenco.php')) {
			// Whoops, we don't have a page for that!

			show_404();
		}

		$data['title'] = "Testing Lenco";

		$this->load->view('templates/rss-header', $data);

		$this->load->view('rss-partials/test-lenco');

		$this->load->view('templates/footer');
	}

	public function payouts()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['verification_status'] = $this->session->userdata('verified');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			if (!file_exists(APPPATH . 'views/rss-partials/landlord/payout.php')) {
				// Whoops, we don't have a page for that!

				show_404();
			}

			$data['profile_title'] = "Payouts";

			$data['title'] = "Payouts";

			$data['first_payout'] = $this->rss_model->get_first_payout($data['userID']);

			$data['last_payout'] = $this->rss_model->get_last_payout($data['userID']);

			$data['next_payout'] = $this->rss_model->get_next_payout($data['userID']);

			$data['paid_sum'] = $this->rss_model->paid_payout_sum($data['userID']);

			$data['sidebar_prop'] = $this->rss_model->fetchSidebarProp($data['userID']);

			$data['properties'] = $this->rss_model->myProperties($data['userID']);

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/landlord/profile-header', $data);

			$this->load->view('rss-partials/landlord/payout', $data);

			$this->load->view('templates/landlord-sidebar', $data);

			$this->load->view('templates/landlord-footer-js', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function filter_payouts()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['verification_status'] = $this->session->userdata('verified');

			$s_data['property'] = $this->input->post('property');

			$s_data['startDate'] = $this->input->post('start-date');

			$s_data['endDate'] = $this->input->post('end-date');

			if ($s_data['property'] === null && $s_data['startDate'] === null && $s_data['endDate'] === null) {

				$s_data = $this->session->userdata('search');
			} else {

				$this->session->set_userdata('search', $s_data);
			}

			$config['total_rows'] = $this->rss_model->countAllFilteredPayouts($data['userID'], $s_data);

			$data['total_count'] = $config['total_rows'];

			$config['suffix'] = '';

			if ($config['total_rows'] > 0) {

				$page_number = $this->uri->segment(3);

				$config['base_url'] = base_url() . 'landlord/filter-payouts';

				if (empty($page_number))

					$page_number = 1;

				$offset = ($page_number - 1) * $this->pagination->per_page;

				$this->rss_model->setPageNumber($this->pagination->per_page);

				$this->rss_model->setOffset($offset);

				$this->pagination->cur_page = $page_number;

				$this->pagination->initialize($config);

				$data['page_links'] = $this->pagination->create_links();


				$data['payouts'] = $this->rss_model->fetchAllFilteredPayouts($data['userID'], $s_data);
			}


			if (!file_exists(APPPATH . 'views/rss-partials/landlord/payout.php')) {

				// Whoops, we don't have a page for that!
				show_404();
			}

			$data['profile_title'] = "Payouts";

			$data['title'] = "Payouts";


			$data['first_payout'] = $this->rss_model->get_first_payout($data['userID']);

			$data['last_payout'] = $this->rss_model->get_last_payout($data['userID']);

			$data['next_payout'] = $this->rss_model->get_next_payout($data['userID']);

			$data['pending_sum'] = $this->rss_model->pending_payout_sum($data['userID']);

			$data['paid_sum'] = $this->rss_model->paid_payout_sum($data['userID']);

			$data['sidebar_prop'] = $this->rss_model->fetchSidebarProp($data['userID']);

			$data['search_props'] = $this->rss_model->fetchMyProps($data['userID']);

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/landlord/profile-header', $data);

			$this->load->view('rss-partials/landlord/payout', $data);

			$this->load->view('templates/landlord-footer-js', $data);

			$this->load->view('templates/landlord-sidebar', $data);

			$this->load->view('templates/footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function subscribers()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['verification_status'] = $this->session->userdata('verified');

			$config['total_rows'] = $this->rss_model->countAllRentedProps($data['userID']);

			$data['total_count'] = $config['total_rows'];

			$config['suffix'] = '';

			if ($config['total_rows'] > 0) {


				$page_number = $this->uri->segment(3);


				$config['base_url'] = base_url() . 'landlord/subscribers';

				if (empty($page_number))

					$page_number = 1;

				$offset = ($page_number - 1) * $this->pagination->per_page;

				$this->rss_model->setPageNumber($this->pagination->per_page);

				$this->rss_model->setOffset($offset);

				$this->pagination->cur_page = $page_number;

				$this->pagination->initialize($config);

				$data['page_links'] = $this->pagination->create_links();

				$data['rented_props'] = $this->rss_model->fetchAllRentedProps($data['userID']);
			}

			if (!file_exists(APPPATH . 'views/rss-partials/landlord/subscribers.php')) {
				// Whoops, we don't have a page for that!
				show_404();
			}

			$data['sidebar_prop'] = $this->rss_model->fetchSidebarProp($data['userID']);

			$data['search_props'] = $this->rss_model->fetchMyProps($data['userID']);

			$data['profile_title'] = "Subscribers";

			$data['title'] = "Subscribers";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/landlord/profile-header', $data);

			$this->load->view('rss-partials/landlord/subscribers', $data);

			$this->load->view('templates/landlord-sidebar', $data);

			$this->load->view('templates/landlord-footer-js', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function landlord_messages()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['verification_status'] = $this->session->userdata('verified');

			$config['total_rows'] = $this->rss_model->countMyMessages($data['userID']);

			$data['total_count'] = $config['total_rows'];

			$config['suffix'] = '';

			if ($config['total_rows'] > 0) {

				$page_number = $this->uri->segment(3);

				$config['base_url'] = base_url() . 'landlord/messages';

				if (empty($page_number))

					$page_number = 1;

				$offset = ($page_number - 1) * $this->pagination->per_page;

				$this->rss_model->setPageNumber($this->pagination->per_page);

				$this->rss_model->setOffset($offset);

				$this->pagination->cur_page = $page_number;

				$this->pagination->initialize($config);

				$data['page_links'] = $this->pagination->create_links();

				$data['messages'] = $this->rss_model->fetchMyMessages($data['userID']);
			}

			if (!file_exists(APPPATH . 'views/rss-partials/landlord/messages.php')) {
				// Whoops, we don't have a page for that!
				show_404();
			}

			$data['sidebar_prop'] = $this->rss_model->fetchSidebarProp($data['userID']);

			$data['profile_title'] = "Messages";

			$data['title'] = "Messages";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/landlord/profile-header', $data);

			$this->load->view('rss-partials/landlord/messages', $data);

			$this->load->view('templates/landlord-footer-js', $data);

			$this->load->view('templates/landlord-sidebar', $data);

			$this->load->view('templates/footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function sent_landlord_messages()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$config['total_rows'] = $this->rss_model->countMySentMessages($data['userID']);

			$data['total_count'] = $config['total_rows'];

			$config['suffix'] = '';

			if ($config['total_rows'] > 0) {

				$page_number = $this->uri->segment(3);

				$config['base_url'] = base_url() . 'landlord/messages';

				if (empty($page_number))

					$page_number = 1;

				$offset = ($page_number - 1) * $this->pagination->per_page;

				$this->rss_model->setPageNumber($this->pagination->per_page);

				$this->rss_model->setOffset($offset);

				$this->pagination->cur_page = $page_number;

				$this->pagination->initialize($config);

				$data['page_links'] = $this->pagination->create_links();

				$data['sent_messages'] = $this->rss_model->fetchMySentMessages($data['userID']);
			}

			if (!file_exists(APPPATH . 'views/rss-partials/landlord/messages.php')) {
				// Whoops, we don't have a page for that!
				show_404();
			}

			$data['sidebar_prop'] = $this->rss_model->fetchSidebarProp($data['userID']);

			$data['profile_title'] = "Messages";

			$data['title'] = "Sent Messages";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/landlord/profile-header', $data);

			$this->load->view('rss-partials/landlord/messages', $data);

			$this->load->view('templates/landlord-footer-js', $data);

			$this->load->view('templates/landlord-sidebar', $data);

			$this->load->view('templates/footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function send_ref_codes()
	{

		$response = $this->rss_model->get_users_refcodes();

		$count = 0;

		for ($i = 0; $i < count($response); $i++) {

			$data['name'] = $response[$i]['firstName'];

			$data['email'] = $response[$i]['email'];

			$data['code'] = $response[$i]['referral_code'];

			$this->email->from('donotreply@smallsmall.com', 'SmallSmall');

			$this->email->to($data['email']);

			$this->email->subject("Get up to 7% off your next rent...");

			$this->email->set_mailtype("html");

			$message = $this->load->view('email/header.php', $data, TRUE);

			$message .= $this->load->view('email/referral-code-email.php', $data, TRUE);

			$message .= $this->load->view('email/footer.php', $data, TRUE);

			$this->email->message($message);

			$emailRes = $this->email->send();

			if ($emailRes)
				$count++;

			//echo $response[$i]['email']."<br />";

		}

		echo "Sent to (" . $count . ") emails in total";
	}

	public function landlord_dashboard()
	{

		if (!file_exists(APPPATH . 'views/rss-partials/landlord/dashboard.php')) {
			// Whoops, we don't have a page for that!

			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['verification_status'] = $this->session->userdata('verified');

			$data['sidebar_prop'] = $this->rss_model->fetchSidebarProp($data['userID']);

			$data['property_count'] = $this->rss_model->countMyProperties($data['userID']);

			$data['occupied_count'] = $this->rss_model->countAllRentedProps($data['userID']);

			$data['vacant_count'] = $this->rss_model->countAllVacantProps($data['userID']);

			$data['properties'] = $this->rss_model->fetchMyProperties($data['userID']);

			$data['last_payout'] = $this->rss_model->get_last_payout($data['userID']);

			$data['paid_sum'] = $this->rss_model->paid_payout_sum($data['userID']);

			$data['repairs'] = $this->rss_model->fetchMyRepairs($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);


			$data['profile_title'] = "Dashboard";

			$data['title'] = "Dashboard Landlords";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/landlord/profile-header', $data);

			$this->load->view('rss-partials/landlord/dashboard', $data);

			$this->load->view('templates/landlord-sidebar', $data);

			$this->load->view('templates/landlord-footer-js', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function landlord_profile()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['debt'] = $this->rss_model->get_debt($data['userID']);

			$data['ref_code'] = $this->rss_model->get_ref_code($data['userID']);

			$data['profile_title'] = "Profile";

			$data['title'] = "Profile SmallSmall";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/landlord/profile-header', $data);

			$this->load->view('rss-partials/landlord/profile', $data);

			$this->load->view('templates/landlord-sidebar', $data);

			$this->load->view('templates/landlord-footer-js', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function landlord_properties()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['verification_status'] = $this->session->userdata('verified');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$config['total_rows'] = $this->rss_model->countMyProperties($data['userID']);

			$data['total_count'] = $config['total_rows'];

			$config['suffix'] = '';

			if ($config['total_rows'] > 0) {


				$page_number = $this->uri->segment(3);


				$config['base_url'] = base_url() . 'landlord/properties';

				if (empty($page_number))

					$page_number = 1;

				$offset = ($page_number - 1) * $this->pagination->per_page;

				$this->rss_model->setPageNumber($this->pagination->per_page);

				$this->rss_model->setOffset($offset);

				$this->pagination->cur_page = $page_number;

				$this->pagination->initialize($config);

				$data['page_links'] = $this->pagination->create_links();

				$data['properties'] = $this->rss_model->fetchMyProperties($data['userID']);
			}

			if (!file_exists(APPPATH . 'views/rss-partials/landlord/properties.php')) {
				// Whoops, we don't have a page for that!
				show_404();
			}
			$data['sidebar_prop'] = $this->rss_model->fetchSidebarProp($data['userID']);

			$data['profile_title'] = "Properties";

			$data['title'] = "Properties";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/landlord/profile-header', $data);

			$this->load->view('rss-partials/landlord/properties', $data);

			$this->load->view('templates/landlord-sidebar', $data);

			$this->load->view('templates/landlord-footer-js', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}
	public function landlord_repairs()
	{

		if (!file_exists(APPPATH . 'views/rss-partials/user/repairs.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->rss_model->get_user($data['userID']);

			$data['profile_pic'] = $this->rss_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['rss_transaction'] = $this->rss_model->checkRSSLastTrans($data['userID']);

			$data['debt'] = $this->rss_model->get_debt($data['userID']);

			$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

			$data['furnisure_transaction'] = $this->rss_model->checkFurnisureLastTrans($data['userID']);

			$data['booking'] = $this->rss_model->getLastBookingDetails($data['userID']);

			$data['profile_title'] = "Repairs";

			$data['title'] = "Property Repairs SmallSmall";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/landlord/profile-header', $data);

			$this->load->view('rss-partials/landlord/repairs', $data);

			$this->load->view('templates/landlord-sidebar', $data);

			$this->load->view('templates/landlord-footer-js', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}
	public function send_rent_review()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$amount = $this->input->post('amount');

			$reason = $this->input->post('reason');

			$payment_plan = $this->input->post('payment_plan');

			$propertyID = $this->input->post('propertyID');

			$response = $this->rss_model->insert_rent_review($data['userID'], $amount, $reason, $propertyID, $payment_plan);

			if ($response) {

				echo 1;
			} else {

				echo 0;
			}
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function send_landlord_message()
	{

		if ($this->session->has_userdata('userID')) {

			$msgID = $this->random_strings(12);

			$data['userID'] = $this->session->userdata('userID');

			$subject = $this->input->post("msg_subject");

			$content = $this->input->post("msg_content");

			$response = $this->rss_model->get_landlord_manager($data['userID']);

			if ($response && !is_null($response['account_manager']) && $response['account_manager'] != '') {

				//Insert message
				$response = $this->rss_model->send_landlord_message($msgID, $subject, $content, $data['userID'], $response['account_manager']);

				if ($response) {

					echo 1;
				} else {

					echo "Error sending message";
				}
			} else {

				echo "No account manager on record";
			}
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function filter_subscribers()
	{

		$s_data['property']  = $this->input->post('property');


		if ($s_data['property'] === null) {

			$s_data = $this->session->userdata('search');
		} else {

			$this->session->set_userdata('search', $s_data);
		}

		if ($this->session->has_userdata('userID')) {

			$id = $this->session->userdata('userID');

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['refCode'] = $this->session->userdata('referral_code');

			$config['total_rows'] = $this->rss_model->getTenantFilterCount($id, $s_data);

			$data['total_count'] = $config['total_rows'];

			$config['suffix'] = '';

			if ($config['total_rows'] > 0) {

				$page_number = $this->uri->segment(3);

				$config['base_url'] = base_url() . 'rss/filter-tenants';

				if (empty($page_number))

					$page_number = 1;

				$offset = ($page_number - 1) * $this->pagination->per_page;

				$this->rss_model->setPageNumber($this->pagination->per_page);

				$this->rss_model->setOffset($offset);

				$this->pagination->cur_page = $page_number;

				$this->pagination->initialize($config);

				$post_per_page = 10;

				$data['page_links'] = $this->pagination->create_links();

				$data['from_row'] = $offset + 1;

				$data['rented_props'] = $this->rss_model->getTenantList($id, $s_data);

				$data['to_row'] = $page_number * count($data['rented_props']);
			}

			if (!file_exists(APPPATH . 'views/rss-partials/subscribers.php')) {

				// Whoops, we don't have a page for that!

				show_404();
			}
			$data['sidebar_prop'] = $this->rss_model->fetchSidebarProp($data['userID']);

			$data['search_props'] = $this->rss_model->fetchMyProps($data['userID']);

			$data['profile_title'] = "Tenants";

			$data['title'] = "Tenants";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/landlord/profile-header', $data);

			$this->load->view('rss-partials/landlord/subscribers', $data);

			$this->load->view('templates/landlord-sidebar', $data);

			$this->load->view('templates/landlord-footer-js', $data);

			$this->load->view('templates/footer-user');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	function generate_payout_report()
	{

		$id = $this->session->userdata("userID");

		$s_data['property'] = $this->input->post("property_name");

		$s_data['startDate'] = date('Y-m-d', strtotime($this->input->post("startDate")));

		$s_data['endDate'] = date('Y-m-d', strtotime($this->input->post("endDate")));

		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("Property name", "City", "State", "Amount paid", "Payout date");

		$column = 0;

		foreach ($table_columns as $field) {

			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

			$column++;
		}

		$payouts = $this->rss_model->generate_report($id, $s_data);

		$excel_row = 2;

		foreach ($payouts as $row) {

			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->propertyTitle);

			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->city);

			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->state_name);

			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->amount_paid);

			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->payout_date);

			$excel_row++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

		header('Content-Type: application/vnd.ms-excel');

		header('Content-Disposition: attachment;filename="Employee Data.xls"');

		$object_writer->save('php://output');

		echo 1;
	}

	public function get_balance($id)
	{

		$details = $this->loan_model->get_account_details($id);

		if ($details) {

			$curl = curl_init();

			curl_setopt_array($curl, array(

				CURLOPT_URL => "https://api.lenco.ng/access/v1/account/1c3d747c-1b13-4499-b773-f228fc305d41",

				CURLOPT_RETURNTRANSFER => true,

				CURLOPT_HTTPHEADER => [
					"Authorization: Bearer 1d0315ecb66cb5153339cad3019098535e565f2409aaf25b9c87eb66a1c9b9d7",

					"content-type: application/json"
				]
			));

			$response = curl_exec($curl);

			$response = json_decode($response);

			//print_r($response);

			//echo get_object_vars($response)['data'];

			//exit;

			if (get_object_vars($response)['status']) {

				echo number_format(get_object_vars($response->data[0])['availableBalance']);
			} else {

				echo $err = curl_error($curl);
			}
		} else {

			echo "0";
		}
	}

	public function check_apt($newPropertyID)
	{

		$prop_response = $this->rss_model->get_existing_property($newPropertyID);

		echo $prop_response;
	}

	public function get_result()
	{

		echo "recieved";

		exit;
	}

	public function payRent()
	{

		$amount = $this->input->post('amount');

		$userID = $this->session->userdata('userID');

		$response = $this->loan_model->get_account_details($userID);

		//Check if amount is lesser than the account balance

		if ($amount <= $response['account_balance']) {

			$new_balance = $response['account_balance'] - $amount;

			$result = $this->loan_model->update_balance($userID, $new_balance);
		}
	}

	public function sendRepair()
	{

		$userID = $this->session->userdata('userID');

		$repairCat = $this->input->post('repairCat');

		$repairNote = $this->input->post('repairNote');

		$propertyID = $this->input->post('propertyID');

		$response = $this->rss_model->sendRepair($repairCat, $repairNote, $userID, $propertyID);

		if ($response) {

			echo 1;
		} else {

			echo 0;
		}
	}

	public function sendRating()
	{

		$userID = $this->session->userdata('userID');

		$grade = $this->input->post('grading');

		$satisfaction = $this->input->post('satisfaction');

		$ratingNote = $this->input->post('ratingNote');

		$propertyID = $this->input->post('propertyID');

		$response = $this->rss_model->sendRating($grade, $satisfaction, $userID, $propertyID, $ratingNote);

		if ($response) {

			echo 1;
		} else {

			echo 0;
		}
	}

	public function sendFeedback()
	{

		$userID = $this->session->userdata('userID');

		$grade = $this->input->post('grading');

		$satisfaction = $this->input->post('satisfaction');

		$ratingNote = $this->input->post('feedbackNote');

		$response = $this->rss_model->sendFeedback($grade, $satisfaction, $userID, $feedbackNote);

		if ($response) {

			echo 1;
		} else {

			echo 0;
		}
	}

	function random_strings($length_of_string)
	{
		$str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
		return substr(str_shuffle($str_result), 0, $length_of_string);
	}

	/*public function email_test($fname = "Seun", $lname = "Crowther", $email = "seuncrowther@yahoo.com"){
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
				
			  	CURLOPT_URL => "https://app.marketingmaster.io/apis_email/webhook_callback_main/?hash=53324d32554663764b30356b563146366444466851575a6b6479396e52584d304e4664314f485676574752784b305a35627a67334c3142485554303d",

			  	CURLOPT_CUSTOMREQUEST => "POST",

			  	CURLOPT_POSTFIELDS => json_encode(array(

					'first_name'=>$fname,

					'last_name'=>$lname,
					
					"email" => $email

			 	)),

			  	CURLOPT_HTTPHEADER => [

					"content-type: application/json"

			  	],

			));

			$response = curl_exec($curl);

			$err = curl_error($curl);
			
			echo "Response: ".$response." Error: ".$err;
			
			exit;
        
    }*/

	/*https://api.selzy.com/en/api/sendEmail?format=json&api_key=KEY &email
=TONAME <EMAILTO>&sender_name=
FROMNAME&sender_email=FROMMAIL&subject=SUBJECT
&body=HTMLBODY&list_id=X&attachments[filename1]=FILE1&attachments
[filename2]=FILE2&lang=LANG&error_checking=1&metadata[meta1]=
value1&metadata[meta2]=value2*/

	public function email_test($lname = "RSS", $email = "seuncrowther@yahoo.com", $key = '6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha', $subject = 'Test Email', $sender_email = 'test@smallsmall.com', $body = 'hi')
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(

			//CURLOPT_URL => "https://api.selzy.com/en/api/sendEmail",
			CURLOPT_URL => 'https://api.selzy.com/en/api/sendEmail?format=json&api_key=' . $key . ' &email=' . $email . '&sender_name=' . $lname . '&sender_email=' . $sender_email . '&subject=' . $subject . '&body=' . $body . '&list_id=112233',

			CURLOPT_CUSTOMREQUEST => "POST",

			CURLOPT_RETURNTRANSFER => true,

			/*CURLOPT_POSTFIELDS => json_encode(array(
			  	    
			  	    "api_key" => $key,

					'sender_name' => $lname,
					
					"email" => $email,

					'subject' => $subject,
					
					'sender_email' => $sender_email,
					
					'body' => $body
					
			 	)),*/

			CURLOPT_HTTPHEADER => [

				"content-type: application/json"

			],

		));

		$response = curl_exec($curl);

		$err = curl_error($curl);

		echo "Response: " . $response . " Error: " . $err;

		exit;
	}

	public function payment_summary()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');

			$data['bookingReferenceID'] = $this->session->userdata('bookingReferenceID');

			$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

			$data['account_details'] = $this->rss_model->get_account_details($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['dets'] = $this->rss_model->checkRSSLastTran($data['userID']);

			//$data['bookings'] = $this->rss_model->get_bookings($data['userID']);
			$data['bookings'] = $this->rss_model->get_payment_details($data['bookingReferenceID']);

			$data['profile_title'] = "Payment Summary";

			$data['title'] = "Payment Summary";

			$this->load->view('templates/rss-updated-header', $data);

			$this->load->view('rss-partials/payment-summary', $data);

			//$this->load->view('templates/rss-updated-js-files');

			$this->load->view('templates/rss-updated-footer');
		} else {


			redirect(base_url() . "login", 'refresh');
		}
	}


	public function properties() // all properties change to properties
	{
		$config['total_rows'] = $this->rss_model->countProperties();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(2);

			$data['page_number'] = $this->uri->segment(2);

			$config['base_url'] = base_url() . 'properties';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->rss_model->setPageNumber($this->pagination->per_page);

			$this->rss_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$post_per_page = 12;

			$data['page_links'] = $this->pagination->create_links();

			$data['from_row'] = $offset + 1;

			$data['properties'] = $this->rss_model->fetchProperties();

			if (is_array($data['properties'])) {

				$data['to_row'] = $page_number * count($data['properties']);
			} else {

				$data['to_row'] = 0;
				$data['from_row'] = 0;
			}
		}

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');
		}

		$countries = array('160');

		$data['min'] = $this->rss_model->get_min_rent();

		$data['max'] = $this->rss_model->get_max_rent();

		//$data['available_cities'] = $this->rss_model->fetchHomeCities($states);

		$data['available_states'] = $this->rss_model->fetchAvailableStates($countries);

		$data['premium_props'] = $this->rss_model->count_premium_properties();

		$data['bedspaces'] = $this->rss_model->count_bedspaces();

		$data['shared_homes'] = $this->rss_model->count_shared_homes();

		$data['verified_homes'] = $this->rss_model->countProperties();

		//Fetch the country code

		$country = $this->rss_model->fetchCountry('Nigeria');

		$data['notifications'] = $this->rss_model->fetchNotification();

		//Use the country code to display the states

		$data['states'] = $this->rss_model->fetchStates($country['id']);

		$states = array('2648', '2671');

		//Explicitly specifying lagos and abuja here for now
		$data['the_cities'] = $this->rss_model->fetchHomeCities($states);

		//Get apartment types

		$data['property_types'] = $this->rss_model->getPropTypes();

		$data['verification_status'] = $this->session->userdata('verified');

		$data['account_details'] = $this->rss_model->get_account_details($data['userID']);

		$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		//$data['cities'] = $this->rss_model->fetchCities($country['id']);

		$data['featureds'] = $this->rss_model->fetchFeaturedProperties();

		$data['shareds'] = $this->rss_model->fetchHomeProperties(8);

		$data['premiums'] = $this->rss_model->fetchPremiumProperties();

		$data['new_props'] = $this->rss_model->fetchHomeLatestProperties();

		$data['populars'] = $this->rss_model->fetchHomeHighestViewedProperties();

		$data['apt_types'] = $this->rss_model->getPropTypes();

		$data['title'] = "Properties SmallSmall";

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('rss-partials/properties', $data);

		//  $this->load->view('templates/rss-updated-js-files');

		$this->load->view('templates/rss-updated-footer', $data);
	}


	public function get_locations()
	{
		$city_id = $this->input->get('city_id');

		// Process the $city_id parameter as needed

		// Example usage: Fetch locations based on city_id
		$locations = $this->rss_model->fetchHomeCities($city_id);

		header('Content-Type: application/json');
		echo json_encode($locations);
	}


	public function single_property($id)
	{

		$data['property'] = $this->rss_model->fetchProperty($id);

		$data['properties'] = $this->rss_model->fetchProperties();

		$data['verification_status'] = $this->session->userdata('verified');

		$data['account_details'] = $this->rss_model->get_account_details($data['userID']);

		$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['verified'] = $this->session->userdata('verified');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['interest'] = $this->session->userdata('interest');
		}

		if ($this->session->has_userdata('userID')) {

			$data['verification_profile'] = $this->rss_model->verification_profile_checker($data['userID']);

			$data['check_inspection'] = $this->rss_model->check_inspection($data['userID'], $data['property']['propertyID']);
		}

		if (!empty($data['property'])) {

			//Update property views
			$views = intval($data['property']['views']) + 1;

			$this->rss_model->updateViews($views, $id);

			$data['rent_status'] = $this->rss_model->rent_status($data['property']['propertyID']);

			$data['relatedProps'] = $this->rss_model->fetchRelatedProperties($data['property']['propertyType'], 3);

			$data['load_boots'] = 'boots';

			$data['title'] = $data['property']['propertyTitle'] . " SmallSmall";

			$this->load->view('templates/rss-updated-header', $data);

			$this->load->view('rss-partials/property', $data);

			$this->load->view('templates/rss-updated-footer', $data);
		} else {

			show_404();
		}
	}

	// Unione API Testing

	public function unione_template_getOLD()
	{
		require 'vendor/autoload.php';

		$headers = array(
			'Content-Type' => 'application/json',
			'Accept' => 'application/json',
			'X-API-KEY' => '6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha',
		);

		$client = new \GuzzleHttp\Client([
			'base_uri' => 'https://eu1.unione.io/en/transactional/api/v1/'
		]);

		// Request body for retrieving the template
		$requestBody = [
			"id" => "1cc035cc-0f2c-11ee-8166-821d93a29a48",
		];

		try {
			// Retrieve the template from the Unione API
			$response = $client->request('POST', 'template/get.json', [
				'headers' => $headers,
				'json' => $requestBody,
			]);

			$responseData = json_decode($response->getBody()->getContents(), true);

			// Get the HTML body from the template response
			$htmlBody = $responseData['template']['body']['html'];

			// Replace placeholders in the HTML body with actual values
			$username = "Yusuf";
			$resetLink = 'https://buy.rentsmallsmall.com/';
			$email = 'yusuf.i@smallsmall.com';
			$htmlBody = str_replace('{{Name}}', $username, $htmlBody);
			$htmlBody = str_replace('{{resetLink}}', $resetLink, $htmlBody);

			// Prepare the email data
			$emailData = [
				"message" => [
					"recipients" => [
						["email" => $email],
					],
					"body" => ["html" => $htmlBody],
					"subject" => "Testing",
					"from_email" => "donotreply@smallsmall.com",
					"from_name" => "Smallsmall",
				],
			];

			// Send the email using the Unione API
			$response = $client->request('POST', 'email/send.json', [
				'headers' => $headers,
				'json' => $emailData,
			]);

			// Output the result
			echo 'Email Sent successfully to ' . $email;
		} catch (\GuzzleHttp\Exception\BadResponseException $e) {

			// Handle API errors
			print_r($e->getMessage());
		} catch (\GuzzleHttp\Exception\BadResponseException $e) {
			// Handle other exceptions
			print_r($e->getMessage());
		}
	}

	public function unione_template_getOLD1()
	{

		require 'vendor/autoload.php';

		$headers = array(
			'Content-Type' => 'application/json',
			'Accept' => 'application/json',
			'X-API-KEY' => '6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha',
		);

		$client = new \GuzzleHttp\Client([
			// 'base_uri' => 'https://us1.unione.io/en/transactional/api/v1/'
			'base_uri' => 'https://eu1.unione.io/en/transactional/api/v1/'

		]);

		$requestBody = [
			"message" => [
				"recipients" => [
					[
						"email" => "bwitlawalyusuf@gmail.com",


					]
				],
				"template_id" => "1cc035cc-0f2c-11ee-8166-821d93a29a48",

				"body" => [
					"html" => "<b>Hello, Yusuf</b>",
					//   "plaintext" => "Hello, {{to_name}}",

				],
				"subject" => "Testing",
				"from_email" => "donotreply@smallsmall.com",
				"from_name" => "SS",
				"reply_to" => "user@smallsmall.com",


			]
		];

		try {
			$response = $client->request(
				'POST',
				'email/send.json',
				array(
					'headers' => $headers,
					'json' => $requestBody,
				)
			);
			print_r($response->getBody()->getContents());
		} catch (\GuzzleHttp\Exception\BadResponseException $e) {
			// handle exception or api errors.
			print_r($e->getMessage());
		}
	}

	function unione_template_get()
	{
		require 'vendor/autoload.php';

		$headers = array(
			'Content-Type' => 'application/json',
			'Accept' => 'application/json',
			'X-API-KEY' => '6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha',
		);

		$client = new \GuzzleHttp\Client([
			'base_uri' => 'https://eu1.unione.io/en/transactional/api/v1/'
		]);

		// Request body for retrieving the template
		$requestBody = [
			"id" => "1cc035cc-0f2c-11ee-8166-821d93a29a48",
		];

		try {
			// Retrieve the template from the Unione API
			$response = $client->request('POST', 'template/get.json', [
				'headers' => $headers,
				'json' => $requestBody,
			]);

			$responseData = json_decode($response->getBody()->getContents(), true);

			// Get the HTML body from the template response
			$htmlBody = $responseData['template']['body']['html'];

			// Replace placeholders in the HTML body with actual values
			$username = "Yusuf";
			$resetLink = 'https://buy.rentsmallsmall.com/';
			$email = 'yusuf.i@smallsmall.com';
			$htmlBody = str_replace('{{Name}}', $username, $htmlBody);
			$htmlBody = str_replace('{{resetLink}}', $resetLink, $htmlBody);

			// Prepare the email data
			$emailData = [
				"message" => [
					"recipients" => [
						["email" => $email],
					],
					"body" => ["html" => $htmlBody],
					"subject" => "Testing",
					"from_email" => "donotreply@smallsmall.com",
					"from_name" => "Smallsmall",
				],
			];

			// Send the email using the Unione API
			$response = $client->request('POST', 'email/send.json', [
				'headers' => $headers,
				'json' => $emailData,
			]);

			// Output the result
			echo 'Email Sent successfully to ' . $email;
		} catch (\GuzzleHttp\Exception\BadResponseException $e) {

			// Handle API errors
			print_r($e->getMessage());
		} catch (\GuzzleHttp\Exception\BadResponseException $e) {
			// Handle other exceptions
			print_r($e->getMessage());
		}
	}

	// public function aws_s3_integration_test()
	// {
	// 	require 'vendor/autoload.php';

	// 	// use Aws\S3\S3Client;

	// 	// require 'aws.php';

	// 	$ssmClient = new Aws\S3\S3Client([
	// 		'version' => 'latest',
	// 		'region' => 'us-east-1', // Replace with your AWS region
	// 	]);

	// 	try {

	// 		$result = $ssmClient->getParameters([
	// 			'Names' => ['ACCESS_KEY_ID', 'SECRET_ACCESS_KEY', 'ACCESS_REGION'],
	// 			'WithDecryption' => true,
	// 		]);

	// 		$awsAccessKeyId = $result['Parameters'][0]['Value'];
	// 		$awsSecretAccessKey = $result['Parameters'][1]['Value'];
	// 		$awsRegion = $result['Parameters'][2]['Value'];

	// 		// Use the retrieved values to create the S3 client
	// 		$objAwsS3Client = new Aws\S3\S3Client([
	// 			'version' => 'latest',
	// 			'region' => $awsRegion,
	// 			'credentials' => [
	// 				'key' => $awsAccessKeyId,
	// 				'secret' => $awsSecretAccessKey,
	// 			]
	// 		]);


	// 		// List all S3 Buckets
	// 		$buckets = $objAwsS3Client->listBuckets();

	// 		if (isset($buckets['Buckets']) && !empty($buckets['Buckets'])) {
	// 			foreach ($buckets['Buckets'] as $bucket) {
	// 				echo $bucket['Name'] . "\n";
	// 			}
	// 		} else {
	// 			echo "No buckets found.\n";
	// 		}
	// 	} catch (Aws\S3\Exception\S3Exception $e) {
	// 		echo "Error: " . $e->getMessage() . "\n";
	// 	}
	// }

	public function aws_s3_integration_test()
{
    require 'vendor/autoload.php';

    // // Initialize the AWS SSM client
    // $ssmClient = new Aws\Ssm\SsmClient([
    //     'version' => 'latest',
    //     'region' => 'us-east-1', // Replace with your AWS region
    // ]);

    // try {
    //     $result = $ssmClient->getParameters([
    //         'Names' => ['ACCESS_KEY_ID', 'SECRET_ACCESS_KEY', 'ACCESS_REGION'],
    //         'WithDecryption' => true,
    //     ]);

    //     $awsAccessKeyId = $result['Parameters'][0]['Value'];
    //     $awsSecretAccessKey = $result['Parameters'][1]['Value'];
    //     $awsRegion = $result['Parameters'][2]['Value'];

    //     // Use the retrieved values to create the S3 client
    //     $objAwsS3Client = new Aws\S3\S3Client([
    //         'version' => 'latest',
    //         'region' => $awsRegion,
    //         'credentials' => [
    //             'key' => $awsAccessKeyId,
    //             'secret' => $awsSecretAccessKey,
    //         ],
    //     ]);

    //     // List all S3 Buckets
    //     $buckets = $objAwsS3Client->listBuckets();

    //     if (isset($buckets['Buckets']) && !empty($buckets['Buckets'])) {
    //         foreach ($buckets['Buckets'] as $bucket) {
    //             echo $bucket['Name'] . "\n";
    //         }
    //     } else {
    //         echo "No buckets found.\n";
    //     }
    // } catch (Aws\S3\Exception\S3Exception $e) {
    //     echo "Error: " . $e->getMessage() . "\n";
    // }

	// require 'vendor/autoload.php';

	// require APPPATH . 'vendor/autoload.php'; // Adjust the path if needed

	// use Aws\S3\S3Client;
	// use Aws\S3\Exception\S3Exception;
	
	$bucket = 'dev-rss-uploads';
	$keyname = 'uploads/hello.txt';
							
	$s3 = new Aws\S3\S3Client([
		'version' => 'latest',
		'region'  => 'eu-west-1'
	]);
	
	try {
		// Upload data.
		$result = $s3->putObject([
			'Bucket' => $bucket,
			'Key'    => $keyname,
			'Body'   => 'Hello, Yusuf!',
			// 'ACL'    => 'public-read'
		]);
	
		// Print the URL to the object.
		echo $result['ObjectURL'] . PHP_EOL;
	} catch (Aws\S3\Exception\S3Exception $e) {
		echo $e->getMessage() . PHP_EOL;
	}
	
}

}
