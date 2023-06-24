<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


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

    public function dashboard(){
    
		if ( ! file_exists(APPPATH.'views/rss-partials/user-staging/dashboard.php')){

            // Whoops, we don't have a page for that!
            show_404();

        }

		if($this->session->has_userdata('userID')){

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
			
			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);
			
			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);

			$data['profile_title'] = "Dashboard";

			$data['title'] = "Dashboard";

			$this->load->view('rss-partials/user-staging/templates/header', $data);

            $this->load->view('rss-partials/user-staging/templates/verification-bar', $data);

			$this->load->view('rss-partials/user-staging/dashboard', $data);
			
			$this->load->view('rss-partials/user-staging/templates/js-files', $data);

			$this->load->view('rss-partials/user-staging/templates/footer');		

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}

	}
    	
    public function messages(){		

		if($this->session->has_userdata('userID')){			

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');			

			$data['email'] = $this->session->userdata('email');	

			$data['refCode'] = $this->session->userdata('referral_code');		

			$data['user_type'] = $this->session->userdata('user_type');	
			
			$data['profile'] = $this->rss_model->get_user($data['userID']);
			
			$data['rss_points'] = $this->rss_model->get_points($data['userID']);
			
			$data['verification_status'] = $this->session->userdata('verified');
			
			$data['profile_pic'] = $this->rss_model->get_user_pic($data['userID']);
			
			//$data['rss_transaction'] = $this->rss_model->checkRSSLastTrans($data['userID']);
			
			//$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);
			
			//$data['debt'] = $this->rss_model->get_debt($data['userID']);
			
			//$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);
			

			//$data['messages'] = $this->rss_model->get_messages($data['userID']);		

			$data['profile_title'] = "Messages";

			$data['title'] = "My Messages";

			$this->load->view('rss-partials/user-staging/templates/header', $data);
    
            $this->load->view('rss-partials/user-staging/templates/verification-bar', $data);

			$this->load->view('rss-partials/user-staging/messages', $data);
			
			$this->load->view('rss-partials/user-staging/templates/js-files', $data);

			$this->load->view('rss-partials/user-staging/templates/footer');		

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}

	}
	function fetchMessages(){
	    
        $output = '';
        
        $status = '';
        
        $userID = $this->session->userdata('userID');
      
        $data = $this->rss_model->fetch_messages($userID, $this->input->post('limit'), $this->input->post('start'));
      
        if($data->num_rows() > 0){
            
            foreach($data->result() as $row){
                
                if($row->status == 'New'){
                    
                    $status = 'active-inbox';
                    
                }else{
                    
                    $status = '';
                    
                }
                
                $output .= '<div id="message-'.$row->msg_id.'" class="inbox-left--msg d-flex  p-2  '.$status.' open-msg open-message">
                            <div class="inbox-msg-icon py-3  mr-2">
                              <div class="msg-icon d-flex justify-content-center align-items-center">CX</div>
                            </div>
                            <div class="inbox-msg-intro flex-grow-1  py-3 pl-2">
                              <h5>'.$row->firstName.' '.$row->lastName.'</h5>
                              <h5>'.$row->subject.'</h5>
                              <p>'.$this->shorten_title($row->content, 30).'</p>
                            </div>
                            <div class="inbox-date" style="font-size: 12px">
                              <p>'.date('Y.m.d', strtotime($row->dateOfEntry)).'</p>
                            </div>
                            <input type="hidden" id="message-id-'.$row->msg_id.'" value="'.$row->requestID.'" />
							<input type="hidden" id="receiver-id-'.$row->msg_id.'" value="'.$row->sender.'" />
							<input type="hidden" id="subject-'.$row->msg_id.'" value="'.$row->subject.'" />
                        </div>';
            }
            
        }
        
        echo $output;
        
    }
    public function bookings(){	
		
		//$data['stayone_bookings'] = $this->rss_model->get_stayone_bookings($data['userID']);
		
		if($this->session->has_userdata('userID')){			

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');			

			$data['email'] = $this->session->userdata('email');	

			$data['refCode'] = $this->session->userdata('referral_code');		

			$data['user_type'] = $this->session->userdata('user_type');	
			
			$data['profile'] = $this->rss_model->get_user($data['userID']);		

			$data['rss_points'] = $this->rss_model->get_points($data['userID']);
			
			$data['verification_status'] = $this->session->userdata('verified');
			
			$data['rss_transaction'] = $this->rss_model->checkRSSLastTrans($data['userID']);
			
			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);
			
			$data['debt'] = $this->rss_model->get_debt($data['userID']);
			
			$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);
			
			//get current booking.
			
			//$data['furnisure_transaction'] = $this->rss_model->checkFurnisureLastTrans($data['userID']);

			$data['bookings'] = $this->rss_model->get_bookings($data['userID']);
			
			$data['stayone_bookings'] = $this->rss_model->get_stayone_bookings($data['userID']);

			$data['profile_title'] = "Bookings";

			$data['title'] = "Bookings";

			$this->load->view('rss-partials/user-staging/templates/header', $data);
    
            $this->load->view('rss-partials/user-staging/templates/bookings-submenu', $data);
    
            $this->load->view('rss-partials/user-staging/templates/verification-bar', $data);

			$this->load->view('rss-partials/user-staging/bookings', $data);
			
			$this->load->view('rss-partials/user-staging/templates/js-files', $data);

			$this->load->view('rss-partials/user-staging/templates/footer');		

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}	

	}
	public function wallet(){		

		if($this->session->has_userdata('userID')){			

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');			

			$data['email'] = $this->session->userdata('email');		

			$data['refCode'] = $this->session->userdata('referral_code');		

			$data['user_type'] = $this->session->userdata('user_type');		

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

			$data['title'] = "Wallet";
			
			$data['bvn'] = $check_bvn['bvn'];

			$this->load->view('rss-partials/user-staging/templates/header', $data);
    
            $this->load->view('rss-partials/user-staging/templates/verification-bar', $data);

			$this->load->view('rss-partials/user-staging/wallet', $data);
			
			$this->load->view('rss-partials/user-staging/templates/js-files', $data);

			$this->load->view('rss-partials/user-staging/templates/footer');			

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}
		
	}
	function fetchWalletTransactions(){
	    
        $output = '';
        
        $userID = $this->session->userdata('userID');
      
        $data = $this->rss_model->get_wallet_transactions($userID, $this->input->post('limit'), $this->input->post('start'));
      
        if($data->num_rows() > 0){
            
            foreach($data->result() as $row){
                
                $stat = '';
                
                $type = '';
                
                if($row->transaction_type == 'Debit'){
                    
                    $type = "red";
                    
                }else{
                    
                    $type = "green";
                    
                }
                
                if(ucfirst($row->status) == 'Declined' ){
        
					$stat = "red";

				}elseif(ucfirst($row->status) == 'Pending' ){

					$stat = "orange";

				}elseif(ucfirst($row->status) == 'Successful' ){

					$stat = "green";

				}
                
                $output .= '<tr>
                                <td>'.$row->txn_id.'</td>
                                <td>&#8358;'.number_format($row->amount).'</td>
                                <td>
                                  <p class="d-flex align-items-center">'.date('d M, Y', strtotime($row->transaction_date)).'</p>
                                </td>
                                <td>'.$row->transaction_type.'</td>
                                <td style="color:'.$stat.'">'.ucfirst($row->status).'</td>
                            </tr>';
    
            }
            
        }
        
        echo $output;
        
    }
    function fetchBookings(){
	    
        $output = '';
        
        $userID = $this->session->userdata('userID');
      
        $data = $this->rss_model->fetch_bookings($userID, $this->input->post('limit'), $this->input->post('start'));
      
        if($data->num_rows() > 0){
            
            foreach($data->result() as $row){
                
                $output .= '<tr>
                                <td>'.$row->propertyTitle.'</td>
                                <td>'.$row->state_name.'</td>
                                <td>'.$row->payment_plan.'</td>
                                <td>&#8358;'.number_format($row->price).'</td>
                                <td>
                                  <p class="d-flex align-items-center">'.date('d M, y', strtotime($row->move_in_date)).' <i style="font-size: 13px;"
                                      class="mx-2 fa-solid fa-arrow-right"></i>
                                    '.date('d M, y', strtotime($row->rent_expiration)).'</p>
                                </td>
                            </tr>';
            }
            
        }
        
        echo $output;
        
    }
    public function my_inspections(){		

		if($this->session->has_userdata('userID')){			

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');			

			$data['email'] = $this->session->userdata('email');	

			$data['refCode'] = $this->session->userdata('referral_code');		

			$data['user_type'] = $this->session->userdata('user_type');	
			
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

			$data['title'] = "Inspections";

			$this->load->view('rss-partials/user-staging/templates/header', $data);
    
            $this->load->view('rss-partials/user-staging/templates/bookings-submenu', $data);
    
            $this->load->view('rss-partials/user-staging/templates/verification-bar', $data);

			$this->load->view('rss-partials/user-staging/inspections', $data);
			
			$this->load->view('rss-partials/user-staging/templates/js-files', $data);

			$this->load->view('rss-partials/user-staging/templates/footer');		

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}

	}
	function fetchInspections(){
	    
        $output = '';
        
        $userID = $this->session->userdata('userID');
      
        $data = $this->rss_model->fetch_inspections($userID, $this->input->post('limit'), $this->input->post('start'));
      
        if($data->num_rows() > 0){
            
            foreach($data->result() as $row){
                
                $output .= '<tr>
                                <td>'.$row->propertyTitle.'</td>
                                <td>'.$row->city.', '.$row->state_name.'</td>
                                <td>&#8358;'.number_format($row->price).'</td>
                                <td>'.date('d M, Y', strtotime($row->dateOfEntry)).'</td>
                                <td>
                                  <button type="button" class="btn btn-dark"><a href="'.base_url().'property/'.$row->propertyID.'">view</a></button>
                                </td>
                            </tr>';
            }
            
        }
        
        echo $output;
        
    }
    
    public function repairs(){

		if ( ! file_exists(APPPATH.'views/rss-partials/user/repairs.php')){

            // Whoops, we don't have a page for that!
            show_404();

        }

		if($this->session->has_userdata('userID')){

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
			
			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);
			
			$data['booking'] = $this->rss_model->getLastBookingDetails($data['userID']);

			$data['profile_title'] = "Repairs";

			$data['title'] = "Repairs";

			$this->load->view('rss-partials/user-staging/templates/header', $data);
    
            $this->load->view('rss-partials/user-staging/templates/bookings-submenu', $data);
    
            $this->load->view('rss-partials/user-staging/templates/verification-bar', $data);

			$this->load->view('rss-partials/user-staging/repairs', $data);
			
			$this->load->view('rss-partials/user-staging/templates/js-files', $data);

			$this->load->view('rss-partials/user-staging/templates/footer');

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}

	}
	function fetchRepairs(){
	    
        $output = '';
        
        $userID = $this->session->userdata('userID');
      
        $data = $this->rss_model->fetch_repairs($userID, $this->input->post('limit'), $this->input->post('start'));
      
        if($data->num_rows() > 0){
            
            foreach($data->result() as $row){
                
                $fixed_on = '';
                
                if(is_null($row->fixed_on)){
                    $fixed_on = "Not fixed";
                }else{
                    $fixed_on = date('d M, Y', strtotime($row->fixed_on));
                }
                
                $stat = '';
                
                if(ucfirst($row->repair_status) == 'Logged' ){
        
					$stat = "red";

				}elseif(ucfirst($row->repair_status) == 'Processing' ){

					$stat = "orange";

				}elseif(ucfirst($row->repair_status) == 'Completed' ){

					$stat = "green";
					
				}
                
                $output .= '<tr>
                                <td>'.$row->repair_category.'</td>
                                <td>'.date('d M, Y', strtotime($row->entry_date)).'</td>
                                <td>'.$fixed_on.'</td>
                                <td style="color:'.$stat.'">'.$row->repair_status.'</td>
                            </tr>';
            }
            
        }
        
        echo $output;
        
    }
	
	public function transactions(){

		if($this->session->has_userdata('userID')){			

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');			

			$data['email'] = $this->session->userdata('email');		

			$data['refCode'] = $this->session->userdata('referral_code');		

			$data['user_type'] = $this->session->userdata('user_type');			

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

			$data['title'] = "Transactions";

			$this->load->view('rss-partials/user-staging/templates/header', $data);
    
            $this->load->view('rss-partials/user-staging/templates/bookings-submenu', $data);
    
            $this->load->view('rss-partials/user-staging/templates/verification-bar', $data);

			$this->load->view('rss-partials/user-staging/transactions', $data);
			
			$this->load->view('rss-partials/user-staging/templates/js-files', $data);

			$this->load->view('rss-partials/user-staging/templates/footer');

		}else{

			redirect( base_url()."login" ,'refresh');

		}
	}
	
	function fetchTransactions(){
	    
        $output = '';
        
        $userID = $this->session->userdata('userID');
      
        $data = $this->rss_model->get_transactions($userID, $this->input->post('limit'), $this->input->post('start'));
      
        if($data->num_rows() > 0){
            
            foreach($data->result() as $row){
                
                $stat = '';
                
                if(ucfirst($row->status) == 'Declined' ){
        
					$stat = "red";

				}elseif(ucfirst($row->status) == 'Pending' ){

					$stat = "orange";

				}elseif(ucfirst($row->status) == 'Approved' ){

					$stat = "green";

				}
                
                $output .= '<tr>
                                <td>'.ucfirst($row->payment_type).'</td>
                                <td>'.$row->reference_id.'</td>
                                <td>'.date('d M, Y', strtotime($row->transaction_date)).'</td>
                                <td>&#8358;'.number_format($row->amount).'</td>
                                <td style="color:'.$stat.'">
                                  '.ucfirst($row->status).'
                                </td>
                             </tr>';
    
            }
            
        }
        
        echo $output;
        
    }
    public function shorten_title($string, $num){
		
		return (strlen($string) >= $num) ? substr($string, 0, ($num - 5)). " ... " : $string ;

	}
}