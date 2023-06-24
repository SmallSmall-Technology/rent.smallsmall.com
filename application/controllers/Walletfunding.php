<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Flutter Wave Library for CodeIgniter 3.X.X
 *
 * Library for Flutter Wave payment gateway. It helps to integrate Flutter Wave payment gateway's Standard Method
 * in the CodeIgniter application.
 *
 * It requires Flutterwave configuration file and it should be placed in the config directory.
 *
 * @package     CodeIgniter
 * @category    Libraries
 * @author      Jaydeep Goswami
 * @link        https://infinitietech.com
 * @GITHUB link https://github.com/jaydeepgiri/Flutterwave-Payments-CodeIgniter-3.X.X-Library
 * @license     https://github.com/jaydeepgiri/Flutterwave-Payments-CodeIgniter-3.X.X-Library/blob/master/LICENSE
 * @version     1.0
 */

class Walletfunding extends CI_Controller {
	
	protected $response = '';
	
	public function __construct(){
	    
		parent::__construct();
		
		/*$this->load->helper('url');
		
		$this->load->library(['flutterwave_lib','session']);*/
		
	}
	
	public function create_transaction(){
	    
		$data = $this->input->post();
		
    	$referenceID = $data['referenceID'];
		
		$data = array(
		    
			'amount'=>$data['cost_amount'],
			
			'customer_email' => $data['customer_email'],
			
			'redirect_url'=>base_url("walletfunding/payment_status/"),
			
			'payment_plan'=>$data['payment_plan']
			
		);
		
		$this->response = $this->flutterwave_lib->create_payment($data);
		
		
		if(!empty($this->response) || $this->response != ''){
		    
			$this->response = json_decode($this->response,1);
			
			if(isset($this->response['status']) && $this->response['status'] == 'success'){
			    
			    $payment_details = array("payment_for" => "wallet", "refID" => $referenceID);
			    
			    $this->session->set_userdata($payment_details);
				
				redirect($this->response['data']['link']);
				
			}else{
				
				//$this->session->set_flashdata('message', 'API returned error >> '.$this->response['message']);
				
				$data['status'] = '<span style="color:red">Error!</span>';
    
        		$data['reason'] = 'API returned error >> '.$this->response['message'];
        
        		$this->load->view('templates/rss-header', $data);
        		
        		$this->load->view('templates/blank-hero', $data);
        
        		$this->load->view('pages/confirmation-result', $data);
        
        		$this->load->view('templates/footer');
				
			}
		}
		
	}
	public function payment_status()
	{
	    
		$params = $this->input->get();
		
		if(empty($params)){
		    
			$data['status'] = 'error';
			
			$data['message'] = "No parameters found.";
			
			//$this->load->view('payment_status',$data);
			
		}elseif(isset($params['txref']) && !empty($params['txref'])){
		    
			$response = $this->flutterwave_lib->verify_transaction($params['txref']);
			
			if(!empty($response)){
			    
				$response = json_decode($response,1);
				
				if($response['status'] == 'success' && isset($response['data']['chargecode']) && ( $response['data']['chargecode'] == '00' || $response['data']['chargecode'] == '0') ){
					
					$data['customer_email'] = $response['data']['custemail'];
					
					$data['txn_id'] = $response['data']['txref'];
					
					$data['amount'] = $response['data']['amount'];
					
					$data['currency_code'] = $response['data']['currency'];
					
					$data['status'] = $response['data']['status'];
					
					$data['message'] = $response['message'];
					
					//$data['full_data']      = $response;
					
					$data['refID'] = $this->session->userdata("refID");
					
					if($this->session->has_userdata('userID')){

            			$data['userID'] = $this->session->userdata('userID');
            
            			$data['fname'] = $this->session->userdata('fname');
            
            			$data['lname'] = $this->session->userdata('lname');
            		}
            		
            		$details = $this->loan_model->get_account_details($data['userID']);
	        
        	        $account_balance = $details['account_balance'] + $amount;
        	        
            	    //Update account balance and insert wallet transaction
            	    
            	    $update_response = $this->loan_model->update_balance($data['userID'], $account_balance);
            	    
            	    $insert_resp = $this->loan_model->insert_wallet_funding($data['userID'], $data['amount'], 'Credit', $data['refID'], 'Successful', 'Flutterwave', $data['txn_id']);
            	    
            	    if($update_response && $insert_resp){
            		
                		$data['status'] = '<span style="color:#007DC1">Successful!</span>';
    
                		$data['reason'] = 'Your wallet has been successfully funded. You can do to your dashboard to enjoy the limitless opportunities we offer.';
                
                		$this->load->view('templates/rss-header', $data);
                		
                		$this->load->view('templates/blank-hero', $data);
                
                		$this->load->view('pages/confirmation-result', $data);
                
                		$this->load->view('templates/footer');
                		
            	    }else{
            	        
            	        $data['status'] = '<span style="color:red">Error!</span>';
    
                		$data['reason'] = 'Error updating balance/wallet transaction details. Please contact customer service.';
                
                		$this->load->view('templates/rss-header', $data);
                		
                		$this->load->view('templates/blank-hero', $data);
                
                		$this->load->view('pages/confirmation-result', $data);
                
                		$this->load->view('templates/footer');
            	    }
					
					
				}elseif( (isset($params['cancelled']) && $params['cancelled'] == true)){
				    
					$data['status'] = '<span style="color:red">Cancelled</span>';
					
					$data['reason'] = 'Payment Cancelled by you or some other reasons. Try again!';
					
					$data['full_data']      = "No data found";
            
            		$this->load->view('templates/rss-header', $data);
            		
            		$this->load->view('templates/blank-hero', $data);
            
            		$this->load->view('pages/confirmation-result', $data);
            
            		$this->load->view('templates/footer');
					
					
				}elseif( $response['status'] == 'error'){
				    
					$data['status'] = '<span style="color:red">Error</span>';
					
					$data['message'] = $response['message'];
					
					$data['full_data']      = $response;
					
					$data['status'] = '<span style="color:red">Error</span>';
					
					$data['reason'] = 'Error details : ('.$response['message'].')';
            
            		$this->load->view('templates/rss-header', $data);
            		
            		$this->load->view('templates/blank-hero', $data);
            
            		$this->load->view('pages/confirmation-result', $data);
            
            		$this->load->view('templates/footer');
				}
			}else{
			    
				$data['status'] = '<span style="color:red">Error</span>';
				
				$data['reason'] = "No data returned from Flutterwave";
					
				$this->load->view('templates/rss-header', $data);
            		
        		$this->load->view('templates/blank-hero', $data);
        
        		$this->load->view('pages/confirmation-result', $data);
        
        		$this->load->view('templates/footer');
			}
		}
	}/* end of payment_status() */
	
	
	/* 
		Flutter wave webhook 
		-------------------------------------------------------------
		You can give this URL in flutter wave dashboard as webhook URL 
		Ex: yourdomain.com/flutterwave/webhook
	*/
    public function webhook(){
        $this->config->load('flutterwave');
        
        $local_secret_hash = $this->config->item('secret_hash');
        
        $body = @file_get_contents("php://input");
        
        $response = json_decode($body,1);
        
		/* 
			to store the flutter wave response and server response into the log file, 
			which can be found under 'application/logs/' folder
			Make a note many times codeIgniter cannot directly read the values of '$_SERVER' variable therefore if such problem arises 
			you can add the following line in your root .htaccess file
			
			SetEnvIf Authorization "(.*)" HTTP_AUTHORIZATION=$1 
			
		*/
        log_message('debug', 'Flutter Wave Webhook - Normal Response - JSON DATA --> ' . var_export($response, true));
        log_message('debug', 'Server Variable --> '.var_export($_SERVER,true));
        
		/* Reading the signature sent by flutter wave webhook */
        $signature = (isset($_SERVER['HTTP_VERIF_HASH']))?$_SERVER['HTTP_VERIF_HASH']:'';
        
		/* comparing our local signature with received signature */
        if(empty($signature) || $signature != $local_secret_hash ){
            log_message('error', 'Flutter Wave Webhook - Invalid Signature - JSON DATA --> ' . var_export($response, true));
            log_message('error', 'Server Variable --> '.var_export($_SERVER,true));
            exit();
        }
		
        if(strtolower($response['status']) == 'successful') {
            // TIP: you may still verify the transaction
            // before giving value.
            $response = $this->flutterwave->verify_transaction($response['txRef']);
            
            $response = json_decode($response,1);
            
            if(!empty($response) && isset($response['data']['status']) && strtolower($response['data']['status']) == 'successful' 
                && isset($response['data']['chargecode']) && ( $response['data']['chargecode'] == '00' || $response['data']['chargecode'] == '0')
            ){
                
                $payer_email = $response['data']['custemail'];
                $paymentplan = $response['data']['paymentplan'];
                
                /* 
					Perform Database Operations here 
					Add your custom code here for any other operation like 
					selling good / inserting / update transaction record in database / anything else
				*/
                
            }else{
                /* Transaction failed */
                log_message('error', 'Flutter Wave Webhook - Inner Verification Failed --> ' . var_export($response, true));
                log_message('error', 'Server Variable -->  '.var_export($_SERVER,true));
            }
            
        }else{
            /* Transaction failed */
            log_message('error', 'Flutter Wave Webhook - Outter Verification Failed --> ' . var_export($response, true));
            log_message('error', 'Server Variable -->  '.var_export($_SERVER,true));
        }
        
    }
}