<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Pages extends CI_Controller {

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

	}

	public function old_index()
	{  
	    $data['color'] = "";
	    
	    $data['mob_color'] = "none-white";
	    
	    $data['mob_icons'] = "white";
	    
	    $data['logo'] = "white";
	    
	    $data['image'] = "with-image";

		if($this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');
			
			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');			

			$data['user_type'] = $this->session->userdata('user_type');	

		}
		
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

		//$data['cities'] = $this->rss_model->fetchCities($country['id']);

		$data['featureds'] = $this->rss_model->fetchFeaturedProperties();

		$data['shareds'] = $this->rss_model->fetchHomeProperties(8);

		$data['premiums'] = $this->rss_model->fetchPremiumProperties();

		$data['new_props'] = $this->rss_model->fetchHomeLatestProperties();

		$data['populars'] = $this->rss_model->fetchHomeHighestViewedProperties();

		$data['title'] = "Home :: Rent";

		$this->load->view('templates/rss-header', $data);

		$this->load->view('rss-partials/index', $data);

		$this->load->view('templates/rss-footer', $data);
	}
	
	public function signup(){
	    
		if(!$this->session->has_userdata('userID')){

			$data['title'] = "Signup RentSmallSmall";

			$this->load->view('templates/header', $data);

			$this->load->view('rss-partials/signup');

			//$this->load->view('templates/footer');

		}else{

			redirect( base_url() ,'refresh');

		}

	}

	public function verification($page){

		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');				

			$data['user_type'] = $this->session->userdata('user_type');	

			$data['title'] = "Profile Verification";

			$this->load->view('templates/rss-header', $data);

			$this->load->view('rss-partials/'.$page, $data);

			$this->load->view('templates/footer');

		}else{

			//$userdata = array('page_link' => base_url().'verification/'.$page);

			//$_SESSION['page_link'] = base_url().'verification/'.$page;

			redirect( base_url().'login' ,'refresh');			

		}

	}

	public function property_alert(){

		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');			

			$data['user_type'] = $this->session->userdata('user_type');	
		}
		
		//$data['result'] = $this->rss_model->getUpcomingProp($id);

		$data['propTypes'] = $this->rss_model->getPropTypes();

		$data['title'] = "Property Alert";

		$this->load->view('templates/rss-header', $data);

		$this->load->view('rss-partials/property-alert', $data);

		$this->load->view('templates/footer');
		
	}
	public function upcoming_properties(){

		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');				

			$data['user_type'] = $this->session->userdata('user_type');	

		}

		$data['upcomingProps'] = $this->rss_model->getUpcomingProps();

		$data['title'] = "Upcoming Properties";

		$this->load->view('templates/rss-header', $data);

		$this->load->view('rss-partials/upcoming-properties', $data);

		$this->load->view('templates/footer');

	}
	
	public function get_upcoming_streets($city){
	
	    return $this->rss_model->getUpcomingStr($city);
	    
	}
    public function get_units($city){
        
        return $this->rss_model->getUnits($city);
        
    }
	public function partner_with_us(){

		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');
			
			$data['lname'] = $this->session->userdata('lname');			

			$data['user_type'] = $this->session->userdata('user_type');	

		}

		//$data['propTypes'] = $this->rss_model->getUpcomingProps();
		$data['color'] = "";
	    
	    $data['mob_color'] = "none-white";
	    
	    $data['mob_icons'] = "white";
	    
	    $data['logo'] = "white";
	    
	    $data['image'] = "with-image";

		$data['title'] = "Partner with us";

		$this->load->view('templates/rss-header', $data);

		$this->load->view('pages/partner-with-us', $data);

		$this->load->view('templates/rss-footer', $data);	

	}

	public function add_property(){
		

		if($this->session->has_userdata('userID')){			

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');			

			$data['user_type'] = $this->session->userdata('user_type');			

			$data['rentTypes'] = $this->rss_model->getRentTypes();

			$data['propTypes'] = $this->rss_model->getPropTypes();

			$data['title'] = "Add Property";

			$this->load->view('templates/rss-header', $data);

			$this->load->view('pages/add-property', $data);

			$this->load->view('templates/footer');
			
		}else{
			//$_SESSION['page_link'] = base_url().'add-property;
			redirect( base_url().'login' ,'refresh');
			
		}

	}

	public function add_amenities(){
		

		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');				

			$data['user_type'] = $this->session->userdata('user_type');			

			$data['rentTypes'] = $this->rss_model->getRentTypes();

			$data['title'] = "Add Amenities";

			$this->load->view('templates/rss-header', $data);

			$this->load->view('pages/add-amenities', $data);

			$this->load->view('templates/footer');	
		}else{
			//$_SESSION['page_link'] = base_url().'add-property;
			redirect( base_url().'login' ,'refresh');
			
		}

	}

	public function thank_you(){

		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');
			
			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');			

			$data['user_type'] = $this->session->userdata('user_type');	

		}
		

		$data['title'] = "Thank you";

		$this->load->view('templates/rss-header', $data);

		$this->load->view('pages/thank-you', $data);

		$this->load->view('templates/footer');			

	}

	public function frequently_asked_questions(){

		//$data['propTypes'] = $this->rss_model->getUpcomingProps();

		$data['title'] = "Frequently Asked Questions";

		$this->load->view('templates/rss-navless-header', $data);

		$this->load->view('pages/frequently-asked-questions', $data);

		//$this->load->view('templates/rss-empty-footer');

	}

	public function tenancy_terms(){

		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');				

			$data['user_type'] = $this->session->userdata('user_type');	

		}

		$data['mob_color'] = "white";
		
		$data['mob_icons'] = "blue";
		
		$data['color'] = "white";
		
		$data['logo'] = "blue";
		
		$data['image'] = "without-image";
		
		$data['title'] = "Tenancy Terms RentSmallSmall";

		$this->load->view('templates/rss-header', $data);

		$this->load->view('pages/tenancy-terms', $data);

		$this->load->view('templates/rss-footer');	

	}

	public function contact_us(){

		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');				

			$data['user_type'] = $this->session->userdata('user_type');	

		}

		//$data['propTypes'] = $this->rss_model->getUpcomingProps();
		$data['title'] = "Contact Us RentSmallSmall";

		$this->load->view('templates/rss-header', $data);

		$this->load->view('templates/blank-hero', $data);

		$this->load->view('pages/contact-us', $data);

		$this->load->view('templates/footer');

	}

	public function privacy_policy(){

		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');				

			$data['user_type'] = $this->session->userdata('user_type');	
		}
		
// 		$data['mob_color'] = "white";
		
// 		$data['mob_icons'] = "blue";
		
// 		$data['color'] = "white";
		
// 		$data['logo'] = "blue";
		
// 		$data['image'] = "without-image";

		//$data['propTypes'] = $this->rss_model->getUpcomingProps();
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

        $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "Privacy Policy RentSmallSmall";

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('pages/privacy-policy', $data);
		
		$this->load->view('templates/rss-updated-js-files');

		$this->load->view('templates/rss-updated-footer', $data);

// 		$this->load->view('templates/rss-footer');

	}

	public function terms_of_use(){

		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');				

			$data['user_type'] = $this->session->userdata('user_type');	

		}
// 		$data['mob_color'] = "white";
		
// 		$data['mob_icons'] = "blue";
		
// 		$data['color'] = "white";
		
// 		$data['logo'] = "blue";
		
// 		$data['image'] = "without-image";

		//$data['propTypes'] = $this->rss_model->getUpcomingProps();
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

        $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "Terms of Use RentSmallSmall";

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('pages/terms-of-use', $data);
		
		$this->load->view('templates/rss-updated-js-files');

		$this->load->view('templates/rss-updated-footer', $data);

	}

	public function about(){

		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');				

			$data['user_type'] = $this->session->userdata('user_type');	

		}
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

        $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		//$data['propTypes'] = $this->rss_model->getUpcomingProps();

		$data['content'] = $this->admin_model->get_rss_about_us();

		$data['title'] = "About RentSmallSmall";
		
		$this->load->view('templates/rss-updated-header', $data);

// 		$this->load->view('templates/rss-header', $data);

		$this->load->view('pages/about', $data);
		
		$this->load->view('templates/rss-updated-js-files');

		$this->load->view('templates/rss-updated-footer', $data);


// 		$this->load->view('templates/footer');

	}

	public function news(){

		$config['total_rows'] = $this->rss_model->countArticles();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(2);

			$config['base_url'] = base_url() . 'blog';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * 12;

			$this->rss_model->setPageNumber(12);

			$this->rss_model->setOffset($offset);

			$this->pagination->cur_page = $offset;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['articles'] = $this->rss_model->getArticles();

		}

		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');				

			$data['user_type'] = $this->session->userdata('user_type');	

		}
		
// 		$data['mob_color'] = "white";
		
// 		$data['mob_icons'] = "blue";
		
// 		$data['color'] = "white";
		
// 		$data['logo'] = "blue";
		
// 		$data['image'] = "without-image";

		$data['title'] = "Newsroom";
		
		$this->load->view('templates/rss-updated-header', $data);

// 		$this->load->view('templates/rss-header', $data);

		$this->load->view('pages/blog', $data);
		
		$this->load->view('templates/rss-updated-js-files');

		$this->load->view('templates/rss-updated-footer', $data);



// 		$this->load->view('templates/rss-footer');		

	}
    public function refer_and_earn(){

		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');	
			
			$data['user_type'] = $this->session->userdata('user_type');

		}
		
		$data['mob_color'] = "white";
		
		$data['mob_icons'] = "blue";
		
		$data['color'] = "white";
		
		$data['logo'] = "blue";
		
		$data['image'] = "without-image";

		//$data['propTypes'] = $this->rss_model->getUpcomingProps();

		$data['title'] = "Refer and earn";

		$this->load->view('templates/rss-header', $data);

		$this->load->view('pages/refer-and-earn', $data);

		$this->load->view('templates/rss-footer');	

	}
	public function article($id){

		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');			

			$data['user_type'] = $this->session->userdata('user_type');	
		}

		$data['article'] = $this->rss_model->getArticle($id);
		
		$data['og_title'] = $data['article']['articleTitle'];
		
		$view = $this->rss_model->get_view($id);
		
		$views = $view['views'] + 1;
		
		$data['mob_color'] = "white";
		
		$data['mob_icons'] = "blue";
		
		$data['color'] = "white";
		
		$data['logo'] = "blue";
		
		$data['image'] = "without-image";
		
		$this->rss_model->increaseView($views, $id);
		
		$data['title'] = "Article RentSmallSmall";

		$this->load->view('templates/rss-header', $data);

		$this->load->view('pages/article', $data);

		$this->load->view('templates/rss-footer');

	}

	public function setupAlert(){
		$firstname = $this->input->post("firstname");
		$lastname = $this->input->post("lastname");
		$email = $this->input->post("email");
		$phone = $this->input->post("phone");
		$renting_as = $this->input->post("renting_as");
		$rent_plan = $this->input->post("rent_plan");
		$min_price = $this->input->post("min_price");
		$max_price = $this->input->post("max_price");
		$property_type = $this->input->post("property_type");
		$city = $this->input->post("city");
		
		$alerted = $this->rss_model->insertAlert($firstname, $lastname, $email, $min_price, $max_price, $property_type, $city, $phone, $renting_as, $rent_plan);
		if($alerted){
			echo 1;
		}else{
			echo 0;
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

	public function get_cities(){

		$state_code = $this->input->post('states');

		$cities = $this->functions_model->get_cities($state_code);

		echo json_encode(array('status' => 'success', 'msg' => $cities));

	}
	public function get_available_date($propID){
		
		$res = $this->rss_model->get_available_date($propID);
		if($res){
			return $res;
		}else{
			return 0;
		}
	}
	
	public function shorten_title($string){
		
		if (strlen($string) >= 30) {
			echo substr($string, 0, 30). " ... ";
		}
		else {
			echo $string;
		}
		
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
		
		if(@$today_result){
		
		    $visits = $today_result['visits'] + 1;
		    
		}
		
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
	
	public function landlord_landing(){

		if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');
			
			$data['lname'] = $this->session->userdata('lname');			

			$data['user_type'] = $this->session->userdata('user_type');	

		}
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

        $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "Landlord Landing";

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('pages/landlord-landing', $data);
		
		$this->load->view('templates/rss-updated-js-files');	

		$this->load->view('templates/rss-updated-footer');	

	
	}
	
	public function faq_update(){
	    
	    if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');
			
			$data['lname'] = $this->session->userdata('lname');			

			$data['user_type'] = $this->session->userdata('user_type');	

		}
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

        $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "FAQ";

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('pages/faq-update', $data);
		
		$this->load->view('templates/rss-updated-js-files');	

		$this->load->view('templates/rss-updated-footer');	

	    
	}
	
	// For Mobile App
	
	public function rss_faq(){
	    
	    if($this->session->has_userdata('userID')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');
			
			$data['lname'] = $this->session->userdata('lname');			

			$data['user_type'] = $this->session->userdata('user_type');	

		}
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

        $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "FAQ";

		$this->load->view('pages/rss-faq-update', $data);
		
		$this->load->view('templates/rss-updated-js-files');	

	}
	
	public function subscription(){

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');
		}
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

        $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "Subscription FAQ";

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('pages/subscription', $data);

		$this->load->view('templates/rss-updated-js-files');

		$this->load->view('templates/rss-updated-footer');
	
	}

	public function apartment_policy(){

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');
		}
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

        $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "Apartment Policy";

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('pages/apartment-policy', $data);

// 		$this->load->view('templates/rss-updated-js-files');

		$this->load->view('templates/rss-updated-footer');
		
		$this->load->view('templates/rss-updated-js-files');


	}

	public function move_in(){

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');
		}
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

        $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "FAQ Moving";

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('pages/move-in', $data);

		$this->load->view('templates/rss-updated-js-files');

		$this->load->view('templates/rss-updated-footer');

	}

	public function safety_and_security(){

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');
		}
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

        $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "Safety & Security";

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('pages/safety-and-security', $data);

		$this->load->view('templates/rss-updated-js-files');

		$this->load->view('templates/rss-updated-footer');

	}
	
	public function faq_tenants(){

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');
		}
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

        $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "Tenants";

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('pages/faq-tenants', $data);

		$this->load->view('templates/rss-updated-js-files');

		$this->load->view('templates/rss-updated-footer');

	}


	public function faq_payout(){

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');
		}
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

        $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "Pay Out";

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('pages/faq-payout', $data);

		$this->load->view('templates/rss-updated-js-files');

		$this->load->view('templates/rss-updated-footer');

	}

	public function property_management(){

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');
		}
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

        $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "Property Management";

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('pages/property-management', $data);

		$this->load->view('templates/rss-updated-js-files');

		$this->load->view('templates/rss-updated-footer');

	}
	
	// Test for new index page

	public function index()
	{  
		if($this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');
			
			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');			

			$data['user_type'] = $this->session->userdata('user_type');	

		}
		
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

		//$data['cities'] = $this->rss_model->fetchCities($country['id']);

		$data['featureds'] = $this->rss_model->fetchFeaturedProperties();

		$data['shareds'] = $this->rss_model->fetchHomeProperties(8);

		$data['premiums'] = $this->rss_model->fetchPremiumProperties();

		$data['new_props'] = $this->rss_model->fetchHomeLatestProperties();

		$data['populars'] = $this->rss_model->fetchHomeHighestViewedProperties();
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

	    $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "RentSmallsmall: Rent & Pay Monthly";

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('rss-partials/new-index', $data);

		$this->load->view('templates/rss-updated-js-files');
		
		$this->load->view('templates/rss-updated-footer', $data);
	}
	
// End of New Index Test

    public function subscription_terms()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');
		}
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

        $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "Subscription Terms RentSmallSmall";

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('pages/subscription-terms', $data);

		$this->load->view('templates/rss-updated-js-files');

		$this->load->view('templates/rss-updated-footer', $data);
	}
	
	// For Mobile App Dev
	
	public function rss_subscription_terms()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');
		}
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

        $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "Subscription Terms RentSmallSmall";

		$this->load->view('pages/rss-subscription-terms', $data);

		$this->load->view('templates/rss-updated-js-files');

	}
	
	
	public function careers()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');
		}
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

        $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "Careers RentSmallSmall";

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('pages/careers', $data);

		$this->load->view('templates/rss-updated-js-files');

		$this->load->view('templates/rss-updated-footer', $data);
	}
	
	
	public function ask_us()
	{

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');
		}
		
		$data['verification_status'] = $this->session->userdata('verified');

        $data['account_details'] = $this->rss_model->get_account_details($data['userID']);

        $data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);

		$data['title'] = "Ask Us RentSmallSmall";

		$this->load->view('templates/rss-updated-header', $data);

		$this->load->view('pages/ask-us', $data);

		$this->load->view('templates/rss-updated-js-files');

		$this->load->view('templates/rss-updated-footer', $data);
	}




} 