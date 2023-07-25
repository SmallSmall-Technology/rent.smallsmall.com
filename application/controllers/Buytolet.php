<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Buytolet extends CI_Controller {



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
	
	function fetchBssRequests(){
	    
        $output = '';
        
        $userID = $this->session->userdata('userID');
        
        $usertype = $this->session->userdata('user_type');
      
        $data = $this->buytolet_model->fetch_requests($userID, $this->input->post('limit'), $this->input->post('start'));
      
        if($data->num_rows() > 0){
            
            foreach($data->result() as $row){
        
                $stat = '';
                
                if(ucfirst($row->status) == 'New'){
        
					$stat = "green";

				}else{

					$stat = "red";
					
				}
                
                $output .= '<tr class="tr-content">
                                <td class="td-content"><div class="td-txt"><a href="https://buy.smallsmall.com/property/'.$row->propertyID.'" target="_blank">'.$row->property_name.'</a></div></td>
                                <td class="td-content">'.ucfirst($row->plan).'</td>
                                <td class="td-content">'.number_format($row->payable).'</td>
                                <td class="td-content '.$stat.'-txt">'.$row->status.'</td>
                                <td class="td-content"><div class="bss-action-btn '.$usertype.'"><a href="'.base_url().''.$usertype.'/bss-unit/'.$row->propertyID.'">Details</a></div></td>
                            </tr>';
            }
            
        }
        
        echo $output;
        
    }
    
    function fetchUnitPayment(){
	    
        $output = '';
        
        $userID = $this->session->userdata('userID');
        
        $usertype = $this->session->userdata('user_type');
        
        $refID = $this->input->post("refID");
        
        $propertyID = $this->input->post("propertyID");
      
        $data = $this->buytolet_model->fetch_payments($userID, $this->input->post('limit'), $this->input->post('start'), $refID, $propertyID);
      
        if($data->num_rows() > 0){
            
            foreach($data->result() as $row){
        
                $stat = '';
                
                if(ucfirst($row->payment_status) == 'Completed'){
        
					$stat = "green";

				}else{

					$stat = "red";
					
				}
                
                $output .= '<tr class="tr-content">
                                <td class="td-content"><div class="td-txt"><a href="https://buy.smallsmall.com/property/'.$row->propertyID.'" target="_blank">'.$row->property_name.'</a></div></td>
                                <td class="td-content">N'.number_format($row->amount).'</td>
                                <td class="td-content">'.date('d F, Y', strtotime($row->transactionDate)).'</td>
                                <td class="td-content '.$stat.'-txt">'.$row->payment_status.'</td>
                            </tr>';
            }
            
        }
        
        echo $output;
        
    }
    
    public function buysmallsmall_requests(){		

		if($this->session->has_userdata('userID')){			

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
			
			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);
			
			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);

			$data['profile_title'] = "Buysmallsmall";

			$data['title'] = "Requests BuySmallSmall";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/landlord/profile-header', $data);

			$this->load->view('rss-partials/landlord/bss-requests', $data);

			$this->load->view('templates/landlord-sidebar', $data);

			$this->load->view('templates/landlord-footer-js', $data);

			$this->load->view('templates/footer');				

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}		

	}
	public function buysmallsmall_requests_tenant(){		

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
			
			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);

			$data['profile_title'] = "My Requests";

			$data['title'] = "My Requests SmallSmall";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/bss-requests', $data);
			
			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('templates/footer-user');					

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}		

	}
	
	public function bss_unit($id){		

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
			
			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);
			
			$data['unit'] = $this->buytolet_model->get_unit_details($id);

			$data['profile_title'] = "My Requests";

			$data['title'] = "My Requests SmallSmall";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/landlord/profile-header', $data);

			$this->load->view('rss-partials/landlord/bss-unit-details', $data);
			
			$this->load->view('templates/landlord-footer-js', $data);

			$this->load->view('templates/landlord-sidebar', $data);

			$this->load->view('templates/footer');	

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}		

	}
	
	public function bss_unit_tenant($id){		

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
			
			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);
			
			$data['debt'] = $this->rss_model->get_debt($data['userID']);
			
			$data['balance'] = $this->rss_model->get_wallet_balance($data['userID']);
			
			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);
			
			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);
			
			$data['unit'] = $this->buytolet_model->get_unit_details($id);

			$data['profile_title'] = "My Requests";

			$data['title'] = "My Requests SmallSmall";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/bss-unit-details', $data);
			
			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('templates/footer-user');	

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}		

	}
	
	public function finance_details($id){		

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
			
			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);
			
			$data['unit'] = $this->buytolet_model->get_finance_details($id);

			$data['profile_title'] = "My Requests";

			$data['title'] = "My Finance Details";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/landlord/profile-header', $data);

			$this->load->view('rss-partials/landlord/bss-financing-details', $data);
			
			$this->load->view('templates/landlord-footer-js', $data);

			$this->load->view('templates/landlord-sidebar', $data);

			$this->load->view('templates/footer');	

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}		

	}
	
	public function finance_details_tenant($id){		

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
			
			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);
			
			$data['unit'] = $this->buytolet_model->get_finance_details($id);

			$data['profile_title'] = "My Requests";

			$data['title'] = "My Finance Details";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/bss-finance-details', $data);
			
			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('templates/footer-user');	

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}		

	}
	
	public function payment_details($id){		

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
			
			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);
			
			$data['propertyID'] = $id;
			
			$data['unit'] = $this->buytolet_model->get_finance_details($id);

			$data['profile_title'] = "My Payments";

			$data['title'] = "My Finance Details";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/landlord/profile-header', $data);

			$this->load->view('rss-partials/landlord/bss-payment-details', $data);
			
			$this->load->view('templates/landlord-footer-js', $data);

			$this->load->view('templates/landlord-sidebar', $data);

			$this->load->view('templates/footer');	

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}		

	}
	
	public function payment_details_tenant($id){		

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
			
			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);
			
			$data['propertyID'] = $id;
			
			$data['unit'] = $this->buytolet_model->get_finance_details($id);
			
			//$data['unitpayments'] = $this->buytolet_model->get_payment_details($unit['refID'], $id);

			$data['profile_title'] = "My Payments";

			$data['title'] = "My Finance Details";

			$this->load->view('templates/rss-dashboard-header', $data);

			$this->load->view('rss-partials/user/profile-header', $data);

			$this->load->view('rss-partials/user/bss-payment-details', $data);
			
			$this->load->view('templates/tenant-footer-js', $data);

			$this->load->view('templates/user-sidebar', $data);

			$this->load->view('templates/footer-user');	

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}		

	}
	
}