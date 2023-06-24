<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends CI_Controller
{


   public function __construct()
   {

	   parent::__construct();

   }


   public function index()
   {

	   if($this->session->has_userdata('userID')){

		$data['userID'] = $this->session->userdata('userID');

		$data['fname'] = $this->session->userdata('fname');

		$data['lname'] = $this->session->userdata('lname');

	   }
// 	    $data['mob_color'] = "white";
		
// 		$data['mob_icons'] = "blue";
		
// 		$data['color'] = "white";
		
// 		$data['logo'] = "blue";
		
// 		$data['image'] = "without-image";

		$data['title'] = "Error 404";

		$data['status'] = '<span style="color:#FF0000">Error 404!</span>';

		$data['reason'] = 'Looks like you just entered the wrong apartment. You can contact us if you cannot find what you are looking for, we will be glad to help.';

		$this->load->view('templates/rss-updated-header', $data);

// 		$this->load->view('templates/rss-header', $data);

		$this->load->view('pages/confirmation-result', $data);

// 		$this->load->view('templates/rss-footer');
		
		$this->load->view('templates/rss-updated-footer', $data);
		
		$this->load->view('templates/rss-updated-js-files');




   }
	public function insert_stats(){
		
		//Get IP Address		
		$ip_add = $_SERVER['REMOTE_ADDR'];
		
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		
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
		
		$referrer = 'https://www.rentsmallsmall.com';
		
		if(isset($_SERVER['HTTP_REFERER'])){
		    $referrer = $_SERVER['HTTP_REFERER'];
		}
		
		
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
	
	public function browserName(){
		
		  $u_agent = $_SERVER['HTTP_USER_AGENT'];
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
		  $known = array('Version', $ub, 'other');
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
			if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
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