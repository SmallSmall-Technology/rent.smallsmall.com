<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Furnisure extends CI_Controller {



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

	public function __construct() {

		Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure

	   	parent::__construct();

		

		$this->load->library('session');   

	}

	

	public function furnisure_home(){

		

		

		//$data['appliances'] = $this->furnisure_model->fetchAppliances();			



				

		if($this->session->has_userdata('loggedIn')){			



			$data['userID'] = $this->session->userdata('userID');

			

			$data['fname'] = $this->session->userdata('fname');

			

			$data['lname'] = $this->session->userdata('lname');

		}

		

		if ( ! file_exists(APPPATH.'views/furnisure-partials/home.php'))

        {

                // Whoops, we don't have a page for that!

                show_404();

        }

		

		$data['types'] = $this->furnisure_model->fetchFurnisureTypes();

		

		

		$data['title'] = "Furnisure Home";

		$this->load->view('templates/furnisure-header', $data);

		$this->load->view('furnisure-partials/home', $data);

		$this->load->view('templates/footer');

		

		

	}

	

	public function get_furniture_by_type($id){

		return $this->furnisure_model->get_furniture_by_type($id);

	}
	
	public function verify_details(){
        
		if($this->session->has_userdata('userID')){	
		    
		    $p_data = $this->session->userdata('payment');
		
    		//Decrypt both parameters		
    		$email = $p_data['email'];
    		
    		$amount = $p_data['amount'];
    		
    		$ref = $p_data['ref'];
    		
    		$method = $p_data['method'];
    		
			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');			

			$data['dets'] = $this->furnisure_model->get_payment_details($ref);
			
			$data['item_count'] = $this->furnisure_model->count_items($ref);
			
			$data['items'] = $this->furnisure_model->item_info($ref);
			
			$data['profile_title'] = "Verify Payment";

			$data['title'] = "Furnisure Details";

			$this->load->view('templates/furnisure-header', $data);

			$this->load->view('furnisure-partials/verify-details', $data);

			$this->load->view('templates/footer');			

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}		

	}

	public function verification($page){

		

		if($this->session->has_userdata('userID')){
			

			$data['userID'] = $this->session->userdata('userID');
			

			$data['fname'] = $this->session->userdata('fname');
			

			$data['lname'] = $this->session->userdata('lname');	
		

			$data['title'] = "Profile Verification";

			$this->load->view('templates/furnisure-header', $data);

			$this->load->view('furnisure-partials/'.$page, $data);

			$this->load->view('templates/footer');

		

		}else{

			//$userdata = array('page_link' => base_url().'verification/'.$page);

			//$_SESSION['page_link'] = base_url().'verification/'.$page;

			redirect( base_url().'login' ,'refresh');			

		}

		

	}

	public function furnitures(){

		

		$id = $this->furnisure_model->get_type_slug(strtolower('furniture'));

		

		$config['total_rows'] = $this->furnisure_model->countFurnitures($id['id']);

		

		$data['total_count'] = $config['total_rows'];

		

		$config['suffix'] = '';

        



		if ($config['total_rows'] > 0) {



			$page_number = $this->uri->segment(3);



			$config['base_url'] = base_url() . 'furnisure/furnitures/';



			if (empty($page_number))



				$page_number = 1;



			$offset = ($page_number - 1) * $this->pagination->per_page;



			$this->furnisure_model->setPageNumber($this->pagination->per_page);



			$this->furnisure_model->setOffset($offset);



			$this->pagination->cur_page = $offset;



			$this->pagination->initialize($config);



			$data['page_links'] = $this->pagination->create_links();

            

			$data['furnitures'] = $this->furnisure_model->fetchFurnitures($id['id']);			



		}

		

		

		//check if Admin is logged in

		if($this->session->has_userdata('loggedIn')){			



			$data['userID'] = $this->session->userdata('userID');

			

			$data['fname'] = $this->session->userdata('fname');

			

			$data['lname'] = $this->session->userdata('lname');

		}

			

		$data['title'] = "Furnitures :: RSS";

		$this->load->view('templates/furnisure-header', $data);

		$this->load->view('furnisure-partials/furnitures' , $data);

		$this->load->view('templates/footer');

		

		

	}

	public function appliances(){

		

		$id = $this->furnisure_model->get_type_slug(strtolower('appliances'));

		

		$config['total_rows'] = $this->furnisure_model->countFurnitures($id['id']);

		

		$data['total_count'] = $config['total_rows'];

		

		$config['suffix'] = '';

        



		if ($config['total_rows'] > 0) {



			$page_number = $this->uri->segment(3);



			$config['base_url'] = base_url() . 'furnisure/appliances/';



			if (empty($page_number))



				$page_number = 1;



			$offset = ($page_number - 1) * $this->pagination->per_page;



			$this->furnisure_model->setPageNumber($this->pagination->per_page);



			$this->furnisure_model->setOffset($offset);



			$this->pagination->cur_page = $offset;



			$this->pagination->initialize($config);



			$data['page_links'] = $this->pagination->create_links();

            

			$data['furnitures'] = $this->furnisure_model->fetchFurnitures($id['id']);			



		}

		

		

		//check if Admin is logged in

		if($this->session->has_userdata('loggedIn')){			



			$data['userID'] = $this->session->userdata('userID');

			

			$data['fname'] = $this->session->userdata('fname');

			

			$data['lname'] = $this->session->userdata('lname');

		}

			

		$data['title'] = "Furnitures :: RSS";

		$this->load->view('templates/furnisure-header', $data);

		$this->load->view('furnisure-partials/furnitures' , $data);

		$this->load->view('templates/footer');

		

		

	}

	

	public function item($id){		

		//$data['appliances'] = $this->furnisure_model->fetchAppliances();

		if($this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');
			
			$data['verified'] = $this->session->userdata('verified');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');

		}		

		if ( ! file_exists(APPPATH.'views/furnisure-partials/item.php'))

        {
                // Whoops, we don't have a page for that!

                show_404();
        }		

		$data['furniture'] = $this->furnisure_model->fetchSingleFurniture($id);
		
		$views = intval($data['furniture']['views']) + 1;
		
		$this->furnisure_model->updateViews($views, $id);
		
		$data['related_furnitures'] = $this->furnisure_model->fetchRelatedFurniture($data['furniture']['category']);		

		$data['title'] = "Furnisure Home";

		$this->load->view('templates/furnisure-header', $data);

		$this->load->view('furnisure-partials/item', $data);

		$this->load->view('templates/footer');		

	}

	

	public function checkout(){

		

		

		//$data['appliances'] = $this->furnisure_model->fetchAppliances();			



				

		if($this->session->has_userdata('loggedIn')){			



			$data['userID'] = $this->session->userdata('userID');

			

			$data['fname'] = $this->session->userdata('fname');

			

			$data['lname'] = $this->session->userdata('lname');

		}		

		if ( ! file_exists(APPPATH.'views/furnisure-partials/checkout.php'))

        {

                // Whoops, we don't have a page for that!

                show_404();

        }		

		//$data['furniture'] = $this->furnisure_model->fetchSingleFurniture($id);		

		//$data['related_furnitures'] = $this->furnisure_model->fetchRelatedFurniture($data['furniture']['category']);		

		$data['title'] = "Furnisure Home";

		$this->load->view('templates/furnisure-header', $data);

		$this->load->view('furnisure-partials/checkout', $data);

		$this->load->view('templates/footer');

				

	}
	public function payment_success($ref){
		
		//$this->session->unset_userdata('payment');
		
		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');
		}
		
		$dets = $this->rss_model->getDetails($ref);
		
		$data['payment_status'] = "Payment Success";
		
		$data['title'] = "Payment Successful"; 

		$data['propPrice'] = $dets['amount'];

		$data['type'] = $dets['type'];

		$this->load->view('templates/no-nav-header', $data);

		$this->load->view('pages/payment-result', $data);

		$this->load->view('templates/footer');
	}
	public function verification_complete(){
		
		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');
		
			$data['title'] = "Completed";
			
			$data['payment'] = 0;

			$data['status'] = '<span style="color:#00CDA6">Hurray!</span>';

			$data['reason'] = 'Thank you for taking your time to fill our verification forms, you will be contacted as soon as possible with the result of our verification';

			$this->load->view('templates/furnisure-header', $data);

			$this->load->view('pages/confirmation-result', $data);

			$this->load->view('templates/footer');
		}else{
			redirect( base_url() ,'refresh');
		}
	}
	
	public function get_countries(){

		return $this->functions_model->get_countries();

	}

	public function get_states(){

		$country_code = $this->input->post('country');

		

		$states = $this->functions_model->get_states($country_code);

		

		echo json_encode(array('status' => 'success', 'msg' => $states));

	}
    public function updatePayment(){
        
        $refID = $this->input->post("referenceID");
        
        $amount = $this->input->post("amount");
			
		$userID = $this->session->userdata('userID');
		
		if($this->furnisure_model->paymentUpdate($refID)){
		    
		    echo 1;
		    
		}else{
		    
		    echo 0;
		    
		}
        
    }
    public function make_transfer(){
	    //Transfer
		//redirect to thank you page
		//Create PDF invoice and send to user email
		$this->session->unset_userdata('payment');
		
		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');
		}
		$data['title'] = "Booking Successful";
		
		$data['payment'] = 1;

		$data['status'] = '<span style="color:#00CDA6">Booked!</span>';

		$data['reason'] = 'You have successfully purchased, our representative will get in contact with you as soon as possible. You can log in to view your purchases. You need to make payment within 24Hrs.';

		$this->load->view('templates/furnisure-header', $data);

		$this->load->view('pages/confirmation-result', $data);

		$this->load->view('templates/footer');
	}
	public function get_cities(){

		$state_code = $this->input->post('states');

		

		$cities = $this->functions_model->get_cities($state_code);

		

		echo json_encode(array('status' => 'success', 'msg' => $cities));

	}
    
    	public function insert_stats(){
		
		//Get IP Address		
		$ip_add = $_SERVER['REMOTE_ADDR'];
		
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		
		$referrer = 'https://www.rentsmallsmall.com';
		
		if(isset($_SERVER['HTTP_REFERER'])){
		    $referrer = $_SERVER['HTTP_REFERER'];
		}
		
		//Get Device Type
		
		//Get Country and city
		$geo = $this->getGeo($ip_add);
		
		$country = $geo[0];
		
		$city = $geo[1];
		
		$ua = $this->browserName($user_agent);
		
		//Browser name
		$browser_name = $ua['name'];
		
		//Device name
		$device = $ua['userAgent'];
		
		$visits = 1;
		
		//Check if user has visits today already
		
		$today_result = $this->rss_model->check_returning($ip_add);
		
		$visits = $today_result['visits'] + 1;
		
		if(!$today_result){
		    //Add to visits today
		    $this->rss_model->addVisits($ip_add, $country, $city, $browser_name, 1, $device, $referrer);
		}else{
		    $this->rss_model->updateVisits( $visits, $ip_add );
		}
		
	}
	
	public function getGeo($ip){ 
  
		// Use JSON encoded string and converts 
		// it into a PHP variable 
		$ipdat = @json_decode(file_get_contents( 
			"http://www.geoplugin.net/json.gp?ip=" . $ip)); 
		
		$geos = array($ipdat->geoplugin_countryName, $ipdat->geoplugin_city );
		
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
	
	public function browserName($u_agent){
		
		  $bname = 'Unknown';
		  $platform = 'Unknown';
		  $version= "";

		  //First get the platform?
		  if (preg_match('/linux/i', $u_agent)) {
			$platform = 'linux';
		  }elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
			$platform = 'mac';
		  }elseif (preg_match('/windows|win32/i', $u_agent)) {
			$platform = 'windows';
		  }

		  // Next get the name of the useragent yes seperately and for good reason
		  if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
			$bname = 'Internet Explorer';
			$ub = "MSIE";
		  }elseif(preg_match('/Firefox/i',$u_agent)){
			$bname = 'Mozilla Firefox';
			$ub = "Firefox";
		  }elseif(preg_match('/OPR/i',$u_agent)){
			$bname = 'Opera';
			$ub = "Opera";
		  }elseif(preg_match('/Chrome/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
			$bname = 'Google Chrome';
			$ub = "Chrome";
		  }elseif(preg_match('/Safari/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
			$bname = 'Apple Safari';
			$ub = "Safari";
		  }elseif(preg_match('/Netscape/i',$u_agent)){
			$bname = 'Netscape';
			$ub = "Netscape";
		  }elseif(preg_match('/Edge/i',$u_agent)){
			$bname = 'Edge';
			$ub = "Edge";
		  }elseif(preg_match('/Trident/i',$u_agent)){
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
			if (strripos($u_agent,"Version") < strripos($u_agent,@$ub)){
				$version= $matches['version'][0];
			}else {
				$version= $matches['version'][1];
			}
		  }else {
			$version= $matches['version'][0];
		  }

		  // check if we have a number
		  if ($version==null || $version=="") {$version="?";}

		  return array(
			'userAgent' => $u_agent,
			'name'      => $bname,
			'version'   => $version,
			'platform'  => $platform,
			'pattern'    => $pattern
		  );
		 
	} 

}