<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//require(APPPATH.'/libraries/REST_Controller.php');

//use Restserver\Libraries\REST_Controller;

class Api extends CI_Controller {

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
	
	
    public function check_user(){
        
        $result = 0;
        
        $details = '';
        
        $data = array();
        
        $key = $this->getKey();
        
        $token = '';
        
        $headers = $this->input->request_headers();
        
        if(@$headers['Authorization']){
            
            $token = explode(' ', $headers['Authorization']);
        
            try{
            
                $decoded = $this->jwt->decode($token[1], $key, array("HS256"));
                
                if($decoded){
                    
                    $result = 1;
                    
                    $details = "success";
                    
                    $data['user'] = $decoded;
                    
                }else{
                    
                    $details = "Invalid token";
                    
                }
            }catch (Exception $ex){
               
               $details = "Exception error";
               
            }
            
        }else{
            
            $details = "No authorization key";
            
        }
        
        echo json_encode(array("response" => $result, "details" => $details, "data" => $data));
        
    }
    
    private function getKey()
    {
        //return getenv(JWT_SECRET_KEY);
        return "crowther@051684";
    }
	
}