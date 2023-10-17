<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

        //$this->load->model('admin/admin_model');
    }

    public function index()
    {
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

            $this->load->view('dashboard/index.php', $data);

		}else{			

			redirect( base_url()."login" ,'refresh');			
		}
    }

    public function inbox()
    {
        if($this->session->has_userdata('userID')){			

			$data['userID'] = $this->session->userdata('userID');
			
			$data['count'] = $this->rss_model->get_counts($data['userID']);

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');			

			$data['email'] = $this->session->userdata('email');	

			$data['refCode'] = $this->session->userdata('referral_code');
			
			//$data['rss_count'] = $this->rss_model->get_counts($data['userID']//);

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

			$this->load->view('dashboard/inbox.php', $data);			

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}
    }

    public function booking()
    {
        if($this->session->has_userdata('userID')){			

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

			$data['dets'] = $this->rss_model->checkRSSLastTran($data['userID']);

			$data['lastproptyID'] = $data['dets']['proptyID'];

			$data['UserPayment'] = $this->rss_model->checkUserPayment($data['userID'], $data['lastproptyID']);

			//$data['transactionCount'] = $this->rss_model->get_transCount($data['userID']);
			
			$data['stayone_bookings'] = $this->rss_model->get_stayone_bookings($data['userID']);

			$data['profile_title'] = "Bookings";

			$data['title'] = "Profile SmallSmall";

			$this->load->view('dashboard/booking.php', $data);			

			$this->load->view('templates/footer-user');

		}else{			

	 	    redirect( base_url()."login" ,'refresh');			
		}
        
    }

    public function wallet()
    {
        if($this->session->has_userdata('userID')){			

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

			$this->load->view('dashboard/wallet.php', $data);
			
			//$this->load->view('rss-partials/user/modals/wallet-funding-modal', $data);
			
			$this->load->view('templates/footer-user');

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}
    }

    public function profile()
    {
        if($this->session->has_userdata('userID')){			

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

			$this->load->view('dashboard/profile.php', $data);				

		}else{			

			redirect( base_url()."login" ,'refresh');			

		}
    }

    public function inspection()
    {
        if($this->session->has_userdata('userID')){			

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

			$this->load->view('dashboard/inspection.php', $data);
			
		}else{			

			redirect( base_url()."login" ,'refresh');			
		}
    }

    public function request_repair()
    {
        if($this->session->has_userdata('userID')){
            
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

			$this->load->view('dashboard/request_repair.php', $data);
		}else{			

			redirect( base_url()."login" ,'refresh');			

		}

    }
    
    public function mark_as_read()
	{
		$notificationID = $this->input->post('notification_id');

		$this->buytolet_model->markNotificationAsRead($notificationID);

		echo $notificationID; // Return a response to the AJAX call
	}

    public function subscription_agreement()
    {
        $data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');			

			$data['email'] = $this->session->userdata('email');	
			
			$data['proptys'] = $this->admin_model->get_user_propty($data['userID']);
			
			$data['sub_dats'] = $this->rss_model->checkSub($data['userID']);

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


        $this->load->view('dashboard/subscription_agreement.php', $data);
    }

    public function transaction()
    {
        if($this->session->has_userdata('userID')){			

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

			$this->load->view('dashboard/transaction.php', $data);
			
		}else{

			redirect( base_url()."login" ,'refresh');
		}

    }
}
