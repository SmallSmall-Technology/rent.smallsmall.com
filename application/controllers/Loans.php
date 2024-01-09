<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$client = new \GuzzleHttp\Client();

class Loans extends CI_Controller {
	
	protected $response = '';
	
	public function __construct(){
	    
		parent::__construct();
		
	}
	
	public function post_transaction(){
	    
	    $result = "error";
	        
	    $msg = "";
	    
	    //Check if user still has some amount in credit, or is owing
	    if($this->session->has_userdata('userID')){	
	        
	        $user_id = $this->session->userdata('userID');
	        
	        $amount = $this->input->post("amount");
	        
	        //Generate a unique transaction code
    		$loan_id = 'RSS_C_'.$this->random_strings(8);
    		
    		$reference = 'RSS_C_'.$this->random_strings(10);
        
            $purpose = $this->input->post("purpose");
            
            $today = date('Y-m-d');
            
            $interest_rate = 0.04;
            
            $amount_due = $amount + ($amount * $interest_rate);
            
            $startDate = date("Y-m-d", strtotime($today)); //select date in Y-m-d format
				
    	    $nMonths = 1;
    	    
            $due_date = $this->endCycle($startDate, $nMonths); // output: 2014-07-02
            
            $details = $this->loan_model->get_account_details($user_id);
            
	        $credit_result = $this->loan_model->get_loan_stat($user_id);
	        
	        //If User has ever borrowed a loan 
	        if(!empty($credit_result)){
	        
    	        $outstanding_credit = $credit_result['credit_limit'] - $credit_result['principal'];
    	        
    	        //Check if there is a pending loan and amount is below remaining credit
    	        if($credit_result['paymentStatus'] != 'Paid' && $amount <= $outstanding_credit){
    	            
    	            //Not a first time lender
    	            //$response = $this->borrowMoney($amount, $details['account_number'], $details['bank_code'], $reference);
        		
    		        //if(get_object_vars($response)['status']){
    		            
		            $new_amount = $amount + $credit_result['principal'];
		            
		            $amount_due = $amount_due + $credit_result['payableAmount'];
		            
		            //Edit the loan table
		            $loan_response = $this->loan_model->edit_loan($user_id , $credit_result['loanID'], $new_amount, $amount_due, 0, 'Owing', $due_date);
		            
		            if($loan_response){
    		            //Insert request in table
            		    $loan_insert = $this->loan_model->insert_loan_request($credit_result['loanID'], $reference, $amount, $purpose, $due_date, $amount_due);
            		
            		    if($loan_insert){
            		        
            		        $new_balance = $details['account_balance'] + $amount;
            		        
                		    //Update account balance
                		    $acc_update = $this->loan_model->update_balance($user_id, $new_balance);
                		    
                		    //Insert into the wallet transaction table
                		    $this->loan_model->insert_wallet_transaction($reference, $user_id, $amount, 'Credit', 'Successful', 'RSS Credit');
                		    
            		    }
		            }
        		    
            		$result = "success";
            		
            		$msg = "Your account has been successfully credited 01";
            		  
            		
    	        }elseif($credit_result['paymentStatus'] == 'Paid'){
    	            
    	            //Not a first time lender
    	            //$response = $this->borrowMoney($amount, $details['account_number'], $details['bank_code'], $reference);
        		
    		        //if(get_object_vars($response)['status']){
    		            
		            //Insert in loan table
		            $loan_response = $this->loan_model->insert_loan($userID , $loan_id, $amount, $amount_due, 0, 'Owing', $due_date);
		            
		            if($loan_response){
		                
    		            //Insert request in table
            		    $loan_response = $this->loan_model->insert_loan_request($loan_id, $reference, $amount, $purpose, $due_date, $amount_due);
            		    
            		    //Increase account balance
            		    $new_balance = $details['account_balance'] + $amount;
            		        
            		    //Update account balance
            		    $acc_update = $this->loan_model->update_balance($user_id, $new_balance);
            		    
            		    //Insert into the wallet transaction table
            		    $this->loan_model->insert_wallet_transaction($reference, $user_id, $amount, 'Credit', 'Successful', 'RSS Credit');
            		    
		            }
        		
            		$result = "success";
            		
            		$msg = "Your account has been successfully credited 02";
            		    
    		        //}else{
                		
                		//$msg = get_object_vars($response)['message'];
                		
    		        //}
            		
    	        }elseif($amount > $outstanding_credit){
                		
                	$msg = "Amount is greater than available credit limit";
    	            
    	        }else{
    	            
    	            $msg = "Can't access credit at this time, contact support";
    	            
    	        }
    	        
	        }elseif($details['credit_limit'] >= $amount){
	            
	            //User is a first time lender so create new loan entry
	            //$response = $this->borrowMoney($amount, $details['account_number'], $details['bank_code'], $reference);
    		
		        //if(get_object_vars($response)['status']){
		            
	            //Insert in loan table
	            $loan_response = $this->loan_model->insert_loan($user_id , $loan_id, $amount, $amount_due, 0, 'Owing', $due_date);
	            
	            if($loan_response){
	                
		            //Insert request in table
        		    $loan_response = $this->loan_model->insert_loan_request($loan_id, $reference, $amount, $purpose, $due_date, $amount_due);
        		    
        		    echo $loan_response;
        		    
        		    exit;
        		    
        		    //Increase account balance
        		    $new_balance = $details['account_balance'] + $amount;
        		        
        		    //Update account balance
        		    $acc_update = $this->loan_model->update_balance($user_id, $new_balance);
        		    
        		    //Insert into the wallet transaction table
        		    $this->loan_model->insert_wallet_transaction($reference, $user_id, $amount, 'Credit', 'Successful', 'RSS Credit');
	            }
    		
        		$result = "success";
        		
        		$msg = "Your account has been successfully credited";
        		    
		        //}else{
            		
            		//$msg = get_object_vars($response)['message'];
            		
		        //}
	            
	        }else{
	            
	            $result = "error";
	            
	            $msg = "Amount requested is greater than eligible amount";
	            
	        }
	           
	        
    		
	    }else{
	        
	        $msg = "Your session has expired, you need to log in to proceed.";
	        
	    }
	    
	    echo json_encode(array("result" => $result, "msg" => $msg));
	    
	}

	public function get_loan(){
	    
	    $email = $this->input->post("email");
	    
	    $phone = $this->input->post("phone");
	    
	    $curl = curl_init();
        			
		curl_setopt_array($curl, array(
			
		  	CURLOPT_URL => "https://sandbox.lenco.co/access/v1/banks",

		  	CURLOPT_RETURNTRANSFER => true,

		  	CURLOPT_HTTPHEADER => [
				"Authorization: Bearer ea926fe1f5c7e6adaa3f42851350d2766f683b22a6beacaff35f83d693299956",

				"content-type: application/json"
		  	]
		));

		$response = curl_exec($curl);
		
		$err = curl_error($curl);
		
		echo "Response: ".$response." Error: ".$err;
		
		
	}
	
	/*public function createAccount(){
	    
	    $result = "error";
	    
	    $account_name = $this->input->post("account_name");
	    
	    $bvn = $this->input->post("bvn");
	    
	    $userID = $this->session->userdata("userID");
	    
	    $response = $this->rss_model->update_bvn($id, $this->encrypt->encode($bvn));
	    
	    $data = '{
                "accountName" : "'.$account_name.'", 
                "bvn" : "'.$bvn.'",
                "isStatic" : '.true.'
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
		
		$response = json_decode($response);
		
		if(get_object_vars($response)['status']){
		    
		    $accountID = get_object_vars($response->data->virtualAccounts[0])['id'];
		    
		    $accountReference = get_object_vars($response->data->virtualAccounts[0])['accountReference'];
		    
		    $accountName = get_object_vars($response->data->virtualAccounts[0]->bankAccount)['accountName'];
		    
		    $accountNumber = get_object_vars($response->data->virtualAccounts[0]->bankAccount)['accountNumber'];
		    
		    $bankName = get_object_vars($response->data->virtualAccounts[0]->bank)['name'];
		    
		    $bankCode = get_object_vars($response->data->virtualAccounts[0]->bank)['code'];
		    
		    $result = $this->loan_model->insert_account_details($userID, $accountID, $accountReference, $accountName, $accountNumber, $bankName, $bankCode);
		    
		    if($result){
		        
		        $result = "success";
		    }
		}
		
        echo json_encode(array("result" => $result));
    
	}*/
	
	public function createAccount(){
	    
	    $result = "error";
	    
	    $account_name = $this->input->post("account_name");
	    
	    $bvn = $this->input->post("bvn");
	    
	    $userID = $this->session->userdata("userID");
	    
	    $response = $this->rss_model->update_bvn($userID, $bvn);
	    
	    $data = '{
                "accountName" : "'.$account_name.'", 
                "bvn" : "'.$bvn.'",
                "isStatic" : '.true.'
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
		
		$response = json_decode($response);
		
		if(get_object_vars($response)['status']){
		    
		    $accountID = get_object_vars($response->data->virtualAccounts[0])['id'];
		    
		    $accountReference = get_object_vars($response->data->virtualAccounts[0])['accountReference'];
		    
		    $accountName = get_object_vars($response->data->virtualAccounts[0]->bankAccount)['accountName'];
		    
		    $accountNumber = get_object_vars($response->data->virtualAccounts[0]->bankAccount)['accountNumber'];
		    
		    $bankName = get_object_vars($response->data->virtualAccounts[0]->bank)['name'];
		    
		    $bankCode = get_object_vars($response->data->virtualAccounts[0]->bank)['code'];
		    
		    //check if account exists already
		    
		    $account_check = $this->loan_model->check_for_account($userID);
		    
		    if(!$account_check){
		        $result = $this->loan_model->insert_account_details($userID, $accountID, $accountReference, $accountName, $accountNumber, $bankName, $bankCode);
		    
    		    if($result){
    		        
    		        $result = "success";
    		    }
		    }else{
		        
		        $result = "exists";
		        
		    }
		    
		}
		
		//echo "Response: ".$response." Error: ".$err;
        echo json_encode(array("result" => $result));
    
	}
	
	public function get_balance($uid){
	    
	    $curl = curl_init();
        			
		curl_setopt_array($curl, array(
			
		  	CURLOPT_URL => "https://api.lenco.ng/access/v1/account/".$uid."/balance",

		  	CURLOPT_RETURNTRANSFER => true,

		  	CURLOPT_HTTPHEADER => [
				"Authorization: Bearer bcfc75cff7c348f3bee5c1117f4a104807cd7ba7005c0fe75eddeacd6d721a9d",

				"content-type: application/json"
		  	]
		));

		$response = curl_exec($curl);
		
		if(get_object_vars($response)['status']){
		    
		    echo get_object_vars($response->data)['availableBalance'];
		    
		}else{
		
		    $err = curl_error($curl);
		    
		}
	}
	
	public function create_virtual_account()
	{

		require 'vendor/autoload.php'; // For Unione template authoload

		$resp = FALSE;

		$result_data = array();

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
			"id" => "a40755b4-223d-11ee-b680-02e1ff456000"
		];

		if ($this->session->has_userdata('userID')) {

			$userID = $this->session->userdata('userID');

			$bvn = $this->input->post("bvn");

			$account_name = $this->input->post("account_name");

			$website = 'RSS';

			//check if account exists already
			$account_check = $this->loan_model->check_for_account($userID);

			if (empty($account_check)) {

				$update_response = $this->rss_model->update_bvn($userID, $bvn);

				if ($update_response) {

					$data = '{
                        "accountName" : "' . $account_name . '", 
                        "bvn" : "' . $bvn . '",
                        "isStatic" : ' . true . ',
						"createNewAccount": ' . true . '
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

						$result = $this->loan_model->insert_account_details($userID, $accountID, $accountReference, $accountName, $accountNumber, $bankName, $bankCode, $website, 'Web');

						$resp = TRUE;

						if ($result) {

							$user = $this->rss_model->get_user($userID);

							$data['name'] = $user['firstName'] . ' ' . $user['lastName'];

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

								$accountNameDetail = $accountName;

								$accoutNumberDetails = $accountNumber;

								$BankNameDetail = $bankName;

								$accountCreatedDate = date('Y-m-d H:i:s');

								// Replace the placeholder in the HTML body with the username

								$htmlBody = str_replace('{{Name}}', $username, $htmlBody);
								$htmlBody = str_replace('{{AccountName}}', $accountNameDetail, $htmlBody);
								$htmlBody = str_replace('{{AccountNumber}}', $accoutNumberDetails, $htmlBody);
								$htmlBody = str_replace('{{BankName}}', $BankNameDetail, $htmlBody);
								$htmlBody = str_replace('{{CreatedDate}}', $accountCreatedDate, $htmlBody);

								$data['response'] = $htmlBody;

								// Prepare the email data
								$emailData = [
									"message" => [
										"recipients" => [
											["email" => $user['email']],
										],
										"body" => ["html" => $htmlBody],
										"subject" => "RentSmallsmall Wallet Created Successfully!",
										"from_email" => "donotreply@smallsmall.com",
										"from_name" => "Rentsmallsmall",
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

							$details = "success";

							redirect('/dashboard/wallet', 'refresh');
						} else {

							$details = "Unable to insert details in DB";
						}
					} else {

						$details = "Error : " . $response['message'];
					}
				} else {

					$details = "Could not update BVN details";
				}
			} else {

				$details = "Account exists already";
			}
		} else {

			$details = "Session timed out please login again";
		}

		echo json_encode(array("result" => $resp, "details" => $details, "data" => $result_data));
	}

	public function walletFunding()
	{

		require 'vendor/autoload.php'; // For Unione template authoload

		//if($this->session->has_userdata('userID')){	

		$reference = 'WF_' . $this->random_strings(8);

		$user_id = $this->input->post('userID');

		$amount = $this->input->post("amount");

		$paystack_ref = $this->input->post('paystack_reference');

		$referenceID = $this->input->post('referenceID');

		$details = $this->loan_model->get_account_details($user_id);

		$account_balance = $details['account_balance'] + $amount;

		//Added data

		$email = $details['email'];

		$names = explode(" ", $details['firstName']);

		$data['name'] = $names[0];

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
			"id" => "56ab446a-0f3c-11ee-93cb-821d93a29a48"
		];

		// end Unione Template

		//Update account balance and insert wallet transaction

		$response = $this->loan_model->update_balance($user_id, $account_balance);

		if ($response) {

			// if($this->loan_model->insert_wallet_funding($user_id, $amount, 'Credit', $reference, 'Successful', 'Paystack', $paystack_ref)){

			//     echo 1;

			// }else{

			//     echo 0;

			// }

			$this->loan_model->insert_wallet_funding($user_id, $amount, 'Credit', $reference, 'Successful', 'Paystack', $paystack_ref);

			//Send Notification to users for successful funding
			$data['transactioDate'] = $this->transaction_date = date('Y-m-d H:i:s');

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

				$TransactioDate = $data['transactioDate'];

				$topUpAmount = $amount;

				$transactionID = $reference;

				// Replace the placeholder in the HTML body with the username

				$htmlBody = str_replace('{{Name}}', $username, $htmlBody);
				$htmlBody = str_replace('{{TransactioDate}}', $TransactioDate, $htmlBody);
				$htmlBody = str_replace('{{TopupAmount}}', $topUpAmount, $htmlBody);
				$htmlBody = str_replace('{{TransactionID}}', $transactionID, $htmlBody);

				$data['response'] = $htmlBody;

				// Prepare the email data
				$emailData = [
					"message" => [
						"recipients" => [
							["email" => $email],
						],
						"body" => ["html" => $htmlBody],
						"subject" => "RentSmallsmall Wallet Top up successful notification",
						"from_email" => "donotreply@smallsmall.com",
						"from_name" => "Smallsmall",
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

			if ($responseEmail) {

				echo 1;
			} else {

				echo "The email could not be sent. Please contact support for assistance.";
			}
		}

		//}else{

		//redirect( base_url()."login" ,'refresh');

		//}

	}

	
	public function getLoan(){
	    
	    if($this->session->has_userdata('userID')){	
	        
	        $reference = 'WF_'.md5(time());
	        
	        $user_id = $this->session->userdata('userID');
	        
	        $amount = $this->input->post("amount");
	        
	        $referenceID = $this->input->post('referenceID');
	        
	        $details = $this->loan_model->get_account_details($user_id);
	        
	        $today = date('Y-m-d');
	        
	        $amount_due = $amount * $interest_rate;
	    
    	    /* Data */
            $data = '{
                    "accountId":"'.$details['accountID'].'", 
                    
                    "amount" : "'.$amount.'",
                    
                    "narration" : "Wallet funding",
                    
                    "reference" : "'.$referenceID.'"
                }';
            
            $curl = curl_init();
            			
    		curl_setopt_array($curl, array(
    			
    		  	CURLOPT_URL => "https://api.lenco.ng/access/v1/transactions",
    
    		  	CURLOPT_RETURNTRANSFER => true,
    		  	
    		  	CURLOPT_POSTFIELDS => $data,
    
    		  	CURLOPT_HTTPHEADER => [
    				"Authorization: Bearer ea926fe1f5c7e6adaa3f42851350d2766f683b22a6beacaff35f83d693299956",
    
    				"content-type: application/json"
    		  	]
    		));
    
    		$response = curl_exec($curl);
    		
    		$response = json_decode($response);
    		
    		if(get_object_vars($response)['status']){
    		    
    		    //Insert request in table
    		    $loan_response = $this->loan_model->insert_wallet_transaction($referenceID, $user_id, $amount, 'Paystack', 'Successful', $today);
    		    
    		}else{
    		    
    		    //Insert request in table
    		    $loan_response = $this->loan_model->insert_wallet_transaction($referenceID, $user_id, $amount, 'Paystack', 'Pending', $today);
    		    
    		}
    		
	    }else{
	        
	        redirect( base_url()."login" ,'refresh');
	        
	    }
	}
	
	public function loanRepayment(){
	    
	    if($this->session->has_userdata('userID')){	
	        
	        $reference = 'WF_'.md5(time());
	        
	        $user_id = $this->session->userdata('userID');
	        
	        $amount = $this->input->post("amount");
	        
	        $referenceID = $this->input->post('referenceID');
	        
	        //$details = $this->loan_model->get_account_details($user_id);
	        
	        $today = date('Y-m-d');
	        
	        $amount_due = $amount * $interest_rate;
	    
    	    /* Data */
            $data = '{
                    "accountId":"'.$details['accountID'].'", 
                    
                    "amount" : "'.$amount.'",
                    
                    "narration" : "Wallet funding",
                    
                    "reference" : "'.$referenceID.'"
                }';
            
            $curl = curl_init();
            			
    		curl_setopt_array($curl, array(
    			
    		  	CURLOPT_URL => "https://api.lenco.ng/access/v1/transactions",
    
    		  	CURLOPT_RETURNTRANSFER => true,
    		  	
    		  	CURLOPT_POSTFIELDS => $data,
    
    		  	CURLOPT_HTTPHEADER => [
    				"Authorization: Bearer ea926fe1f5c7e6adaa3f42851350d2766f683b22a6beacaff35f83d693299956",
    
    				"content-type: application/json"
    		  	]
    		));
    
    		$response = curl_exec($curl);
    		
    		$response = json_decode($response);
    		
    		if(get_object_vars($response)['status']){
    		    
    		    //Insert request in table
    		    $loan_response = $this->loan_model->insert_wallet_transaction($referenceID, $user_id, $amount, 'Paystack', 'Successful', $today);
    		    
    		}else{
    		    
    		    //Insert request in table
    		    $loan_response = $this->loan_model->insert_wallet_transaction($referenceID, $user_id, $amount, 'Paystack', 'Pending', $today);
    		    
    		}
    		
	    }else{
	        
	        redirect( base_url()."login" ,'refresh');
	        
	    }
	    
	}
    
    public function purchase(){
        
        $status = "error";
        
        $details = "";
        
        if($this->session->has_userdata("userID")){
            
            $ref_id = "WW_".$this->random_strings(8);
        
            $purchase_type = $this->input->post("purchase_type");
            
            $bookingID = $this->input->post('bookingID');
            
            $amount = $this->input->post("amount");
            
            $user_id = $this->session->userdata("userID");
            
            $fname = $this->session->userdata("fname");
            
            $lname = $this->session->userdata("lname");
            
            $details = $this->loan_model->get_account_details($user_id);
            
            //Check user balance
            if($details['account_balance'] < $amount){
                
                $details = "Insufficient balance";
                
                $insert_resp = $this->loan_model->insert_wallet_funding($user_id, $amount, 'Debit', $ref_id, 'Declined', 'Subscription', '');
                
            }else if($details['account_balance'] >= $amount){
                
                //Get booking details
                $dets = $this->rss_model->get_renewal_det($bookingID);
                
                //Proceed to deduct from balance and update tables
                $new_balance = $details['account_balance'] - $amount;
                
                $update_response = $this->loan_model->update_balance($user_id, $new_balance);
                
                $insert_resp = $this->loan_model->insert_wallet_funding($user_id, $amount, 'Debit', $ref_id, 'Successful', 'Subscription', '');
                
                $status = "success";
                
                if($update_response && $insert_resp){
                    
                    if($this->rss_model->transUpdate($bookingID, $dets['reference_id'], $amount)){
            
                        //Update booking table
                        $this->rss_model->bookingUpdate($bookingID, $dets['rent_expiration'], $dets['duration'], $dets['payment_plan'], $dets['propertyID']);
                    
                        if($purchase_type == 'subscription'){
                            
                            //Do transaction things
                            $res = $this->rss_model->getVerification($user_id);
                            
                            $sub_response = $this->loan_model->insertSubscriptionTransaction($res['verification_id'], $bookingID, $ref_id, $user_id, $amount, 'Approved');
                            
                            if($sub_response){
                                
                                $details = "Subscription successfully paid!";
                                
                            }else{
                                
                                $details = "Error inserting subscription details";
                                
                            }
                            
                        }else if($purchase_type == 'utilities'){
                            
                            //Utilities payment
                            
                        }
                    }
                }else{
                    
                    $details = "Error completing request";
                    
                }
                
            }else{
                
                $details = "Unknown issue";
                
            }
        }else{
	        
	        $details = "Session expired, you need to login";
	        
	    }
	    
	    echo json_encode(array("result" => $status, "message" => $details));
        
    }
    
	public function add_months($months, DateTime $dateObject) 
    {
        $next = new DateTime($dateObject->format('Y-m-d'));
        
        $next->modify('last day of +'.$months.' month');

        if($dateObject->format('d') > $next->format('d')) {
            
            return $dateObject->diff($next);
            
        } else {
            
            return new DateInterval('P'.$months.'M');
            
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
    
    public function borrowMoney($amount, $account_number, $bank_code, $reference){
         
	    /* Data */
        $data = '{
                "accountId":"6e9b19bd-70d1-429f-bb8f-7bb6f5b9b560", 
                "amount" : "'.$amount.'",
                "narration" : "RSS Finance Credit",
                "accountNumber" : "'.$account_number.'",
                "bankCode" : "'.$bank_code.'",
                "reference" : "'.$reference.'"
            }';
    
        $curl = curl_init();
        			
		curl_setopt_array($curl, array(
			
		  	CURLOPT_URL => "https://api.lenco.ng/access/v1/transactions",

		  	CURLOPT_RETURNTRANSFER => true,
		  	
		  	CURLOPT_POSTFIELDS => $data,

		  	CURLOPT_HTTPHEADER => [
				"Authorization: Bearer ea926fe1f5c7e6adaa3f42851350d2766f683b22a6beacaff35f83d693299956",

				"content-type: application/json"
		  	]
		));

		$response = curl_exec($curl);
		
		$response = json_decode($response);
		
		return $response;
		
		
    }
    
    public function transfer_money(){
        
        $userID = $this->session->userdata("userID");
        
        if($userID){
        
            $refID = "wdr_".$this->random_strings(8);
            
            $amount = $this->input->post('amount');
            
            $account_number = $this->input->post('account_number');
            
            $bank = $this->input->post('bank');
            
            $narration = $this->input->post('narration');
            
            $user = $this->loan_model->get_account_details($userID);
            
            if($amount < 0){
                
                echo json_encode(array("status" => FALSE, "message" => "Amount cannot be negative number", "data" => array()));
                
                exit;
                
            }
            
            if($user['account_balance'] < $amount){
                
                echo json_encode(array("status" => FALSE, "message" => "Insufficient funds", "data" => array()));
                
                exit;
                
            }
            
            $insert = $this->loan_model->insert_wallet_transaction($refID, $userID, $amount, 'Debit', 'Pending', "Transfer");
            
            if(!$insert){
                
                echo json_encode(array("status" => FALSE, "message" => "Server error, try again later.", "data" => array()));
                
                exit;
                
            }
            
            /* Data */
            /*$data = '{
                    "accountId":"705bad0e-c7dd-4318-9c6f-ef9e111f127a", 
                    "amount" : "'.$amount.'",
                    "narration" : "'.$narration.'",
                    "accountNumber" : "'.$account_number.'",
                    "bankCode" : "'.$bank.'",
                    "reference" : "'.$refID.'"
                }';
        
            $curl = curl_init();
            			
    		curl_setopt_array($curl, array(
    			
    		  	CURLOPT_URL => "https://api.lenco.ng/access/v1/transactions/",
    
    		  	CURLOPT_RETURNTRANSFER => true,
    		  	
    		  	CURLOPT_POSTFIELDS => $data,
    
    		  	CURLOPT_HTTPHEADER => [
    				"Authorization: Bearer 1d0315ecb66cb5153339cad3019098535e565f2409aaf25b9c87eb66a1c9b9d7",
    
    				"content-type: application/json"
    		  	]
    		));*/
    
    		//$json_response = curl_exec($curl);
    		
    		//$response = json_decode($json_response, true);
    		
    		@$response['status'] = 1;
    		
    		$response['data']['transactionReference'] = 'wdr_3232jhkjwrnkjnki2i32o';
    		
    		$response['data']['reasonForFailure'] = '';
    		
    		if(@$response['status']){
    		    //Deduct from account balance
    		    $new_balance = $user['account_balance'] - $amount;
    		    
    		    //Update account balance
    		    $acc_update = $this->loan_model->update_balance($userID, $new_balance);
    		    
    		    $this->loan_model->update_wallet_transaction_status($refID, "Approved", $response['data']['transactionReference'], '');
    		    
    		}else{
    		    
    		    $this->loan_model->update_wallet_transaction_status($refID, "Declined", $response['data']['transactionReference'], $response['data']['reasonForFailure']);
    		    
    		}
    		
    		echo json_encode(array("status" => $response['status'], "message" => 'Error : '.$response['message'].' : ('.$response['data']['reasonForFailure'].')'));
    		
        }else{
            
            //User not signed in
            echo json_encode(array("status" => FALSE, "message" => "Session expired", "data" => array()));
                
            exit;
            
        }
    
    }
    
    public function get_loan_stat($user_id){
        
       $credit_result = $this->loan_model->get_loan_stat($user_id); 
       
       print_r($credit_result);
       
       exit;
       
    }
    
    public function bank_codes(){
        
        $curl = curl_init();
        			
		curl_setopt_array($curl, array(
			
		  	CURLOPT_URL => "https://api.lenco.ng/access/v1/banks",

		  	CURLOPT_RETURNTRANSFER => true,

		  	CURLOPT_HTTPHEADER => [
				"Authorization: Bearer ea926fe1f5c7e6adaa3f42851350d2766f683b22a6beacaff35f83d693299956",

				"content-type: application/json"
		  	]
		));

		$response = curl_exec($curl);
		
		//$response = json_decode($response);
		
		echo $response;
    
    }
    
    public function account_details(){
        
        $curl = curl_init();
    
		curl_setopt_array($curl, array(
			
		  	CURLOPT_URL => "https://api.lenco.ng/access/v1/account/6e9b19bd-70d1-429f-bb8f-7bb6f5b9b560",

		  	CURLOPT_RETURNTRANSFER => true,

		  	CURLOPT_HTTPHEADER => [
				"Authorization: Bearer ea926fe1f5c7e6adaa3f42851350d2766f683b22a6beacaff35f83d693299956",

				"content-type: application/json"
		  	]
		));

		$response = curl_exec($curl);
		
		$response = json_decode($response);
		
		print_r($response);
    
    }
    
    public function virtual_transactions(){
        
        $curl = curl_init();
    
		curl_setopt_array($curl, array(
			
		  	CURLOPT_URL => "https://api.lenco.ng/access/v1/virtual-accounts/transactions?page=1",

		  	CURLOPT_RETURNTRANSFER => true,

		  	CURLOPT_HTTPHEADER => [
				"Authorization: Bearer 1d0315ecb66cb5153339cad3019098535e565f2409aaf25b9c87eb66a1c9b9d7",

				"content-type: application/json"
		  	]
		));

		$response = curl_exec($curl);
		
		$response = json_decode($response);
		
		print_r($response);
    
    }
    
    public function lenco_transactions(){
		
           
        // only a post with lenco signature header gets our attention
        if((strtoupper($_SERVER['REQUEST_METHOD']) != 'POST' ) || !array_key_exists('HTTP_X_LENCO_SIGNATURE', $_SERVER) )
            exit();
            
        // Retrieve the request's body
        $input = @file_get_contents("php://input");
        
        define('LENCO_SECRET_KEY','1d0315ecb66cb5153339cad3019098535e565f2409aaf25b9c87eb66a1c9b9d7');
        
        
        $webhook_hash_key = hash("sha256", LENCO_SECRET_KEY);
        
        // validate event do all at once to avoid timing attack
        if(@$_SERVER['HTTP_X_LENCO_SIGNATURE'] != hash_hmac('sha512', $input, $webhook_hash_key))
            exit();
            
        http_response_code(200);
        
        
        // parse event (which is json string) as object
        $event = json_decode($input, true);
        
        $reference = 'WF_'.$this->random_strings(8);
        
        
        // Do something - that will not take long - with $event
        if($event["event"] == 'virtual-account.transaction' && $event['data']['type'] == 'credit' && $event['data']['status'] == 'successful'){
            
            //Successful account transaction
            //Get account details using account ID
            $acct_detail = $this->loan_model->get_account_details_using_acct_num($event['data']['virtualAccount']['id']);
            
            //Calculate new balance
            $new_balance = $acct_detail['account_balance'] + $event['data']['transactionAmount'];
            		        
		    //Update new account balance
		    $acc_update = $this->loan_model->update_balance($acct_detail['userID'], $new_balance);
		    
		    //Insert entry into wallet transactions
		    $walletInsert = $this->loan_model->insert_wallet_funding($acct_detail['userID'], $event['data']['transactionAmount'], 'Credit', $reference, 'Successful', 'Bank Deposit', $event['data']['transactionReference']);
		    
		    //Optional email to notify RSS of transaction
		    $this->send_email("Success", "Deposit of N".$event['data']['transactionAmount']." made by ".$event['data']['virtualAccount']['bankAccount']['accountName']);
		    
		    //Exit block
		    exit();
		    
		    
        }else if($event["event"] == 'virtual-account.rejected-transaction'){
            
            $acct_detail = $this->loan_model->get_account_details_using_acct_num($event['data']['virtualAccount']['id']);
            
            //Update the virtual account table using user account number
            //$new_balance = $details['account_balance'] + $event['data']['amount'];
            		        
		    //Update account balance
		    //$acc_update = $this->loan_model->update_balance($event['data']['userID'], $new_balance);
		    
		    $this->loan_model->insert_wallet_funding($acct_detail['userID'], $event['data']['transactionAmount'], 'Credit', $reference, 'Declined', 'Bank Deposit', $event['data']['transactionReference']);
            
            $this->send_email("Success", "Deposit of N".$event['data']['transactionAmount']." rejected from ".$event['data']['virtualAccount']['bankAccount']['accountName']);
            
            exit();
            
        }else if($event['event'] == 'account.balance-updated' || $event['transaction.successful']){
            
            //$this->send_email("Success", "The details of transaction: ".var_dump($event)."-".json_encode(array("result" => $result, "details" => $event, "data" => $event)));
            
            exit();
        }
        
       
    }
    
    public function send_email($title, $reason){
        
        $data['ver_title'] = $title;
		    
		$data['ver_note'] = $reason;
        
        $this->email->from('donotreply@rentsmallsmall.com', 'RentSmallSmall Alert');

		$this->email->to('customerexperience@smallsmall.com');

		$this->email->bcc('accounts@smallsmall.com, seuncrowther@yahoo.com');

		$this->email->subject("Lenco deposit alert!");	

		$this->email->set_mailtype("html");

		$message = $this->load->view('email/header.php', $data, TRUE);

		$message .= $this->load->view('email/verification-alert-email.php', $data, TRUE);

		$message .= $this->load->view('email/footer.php', $data, TRUE);

		$this->email->message($message);

		$emailRes = $this->email->send();
        
    }
    
    public function get_virtual_accounts(){
    
        $curl = curl_init();
    
		curl_setopt_array($curl, array(
			
		  	CURLOPT_URL => 'https://api.lenco.ng/access/v1/virtual-accounts/transactions?page=1',

		  	CURLOPT_RETURNTRANSFER => true,

		  	CURLOPT_HTTPHEADER => [
				"Authorization: Bearer 1d0315ecb66cb5153339cad3019098535e565f2409aaf25b9c87eb66a1c9b9d7",

				"content-type: application/json"
		  	]
		));

		$response = curl_exec($curl);
		
		$response = json_decode($response, true);
		
		$total = count($response['data']['transactions']);
		
		echo $total;
		
		$message = '<div style="width:80%;margin:30px auto;">';
		
		for($i = 0; $i < $total; $i++){
		
		    $message .= "<div style='width:100%;padding:50px;background:#f9f9f9;border-radius:10px;font-family:helvetica;margin-bottom:30px;'>Account name: ".$response['data']['transactions'][$i]['virtualAccount']['bankAccount']['accountName']."<br />"."Account number : ".$response['data']['transactions'][$i]['virtualAccount']['bankAccount']['accountNumber']."<br />"."Transaction amount : ".$response['data']['transactions'][$i]['transactionAmount']."<br />"."Settled amount : ".$response['data']['transactions'][$i]['settledAmount']."<br />"."Type : ".$response['data']['transactions'][$i]['type']."<br />"."Status : ".$response['data']['transactions'][$i]['status']."<br />"."Date : ".$response['data']['transactions'][$i]['datetime']."<br /></div>";
		
		}
		
		$message .= '</div>';
		
		echo $message;
    
    }


    function random_strings($length_of_string){ 
        
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; 
        
        return substr(str_shuffle($str_result), 0, $length_of_string); 
    } 
	
}
