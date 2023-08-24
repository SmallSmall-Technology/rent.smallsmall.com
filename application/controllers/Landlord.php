<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Landlord extends CI_Controller {



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
 
		 //$this->load->model('landlord/Landlord_model');
	 }
 
	 public function index()
	 {
		if($this->session->has_userdata('userID')){
 
			 $data['userID'] = $this->session->userdata('userID');
			 
			 $data['proptys'] = $this->landlord_model->get_propty($data['userID']);

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

			//$this->load->view('landlord/indexHeader.php', $data);

			$this->load->view('landlord/index.php', $data);
 
		}
		else{			
 
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

			//$this->load->view('landlord/indexHeader.php', $data);

			$this->load->view('landlord/notification.php', $data);

			//$this->load->view('landlord/footer.php', $data);
 			
		}else{			

		 	redirect( base_url()."login" ,'refresh');			

		}
    }


	public function property()
    {
        if($this->session->has_userdata('userID')){			

			$data['userID'] = $this->session->userdata('userID');

			$data['proptys'] = $this->landlord_model->get_propty($data['userID']);
			
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

			//$this->load->view('landlord/indexHeader.php', $data);

			$this->load->view('landlord/property.php', $data);

			//$this->load->view('landlord/footer.php', $data);
 			
		}else{			

		 	redirect( base_url()."login" ,'refresh');			

		}
    }

	public function subscriber()
    {
        if($this->session->has_userdata('userID')){			

			$data['userID'] = $this->session->userdata('userID');
			
			$data['count'] = $this->rss_model->get_counts($data['userID']);

			$data['usersdata'] = $this->landlord_model->get_SubscriberInfo($data['userID']);

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

			//$this->load->view('landlord/indexHeader.php', $data);

			$this->load->view('landlord/subscriber.php', $data);

			//$this->load->view('landlord/footer.php', $data);
 			
		}else{			

		  redirect( base_url()."login" ,'refresh');			

		}
    }

	public function repair()
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

			//$this->load->view('landlord/indexHeader.php', $data);

			$this->load->view('landlord/repair.php', $data);

			//$this->load->view('landlord/footer.php', $data);
 			
		}else{			

		  redirect( base_url()."login" ,'refresh');			

		}
    }

	public function agreement()
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

			//$this->load->view('landlord/indexHeader.php', $data);

			$this->load->view('landlord/agreement.php', $data);

			//$this->load->view('landlord/footer.php', $data);
 			
		}else{			

			redirect( base_url()."login" ,'refresh');			

		}
    }

	public function single_property($prop_id)
    {
        if($this->session->has_userdata('userID')){			

			$data['userID'] = $this->session->userdata('userID');

			$data['userdata'] = $this->landlord_model->get_userinfo($data['userID'], $prop_id); 

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

			//$this->load->view('landlord/indexHeader.php', $data);

			$this->load->view('landlord/singleproperty.php', $data);

			//$this->load->view('landlord/footer.php', $data);
 			
		}else{			

		 	redirect( base_url()."login" ,'refresh');			

		}
    }

	public function subscriber_profile($id)
    {
        if($this->session->has_userdata('userID')){			

			$data['userID'] = $this->session->userdata('userID');
			
			$data['userdata'] = $this->landlord_model->get_subscriberprofile($data['userID'], $id);

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

			//$this->load->view('landlord/indexHeader.php', $data);

			$this->load->view('landlord/subscriber-profile.php', $data);

			//$this->load->view('landlord/footer.php', $data);
 			
		}else{			

		 	redirect( base_url()."login" ,'refresh');			

		}
    }

	public function mark_as_read()
	{
		$notificationID = $this->input->post('notification_id');

		$this->buytolet_model->markNotificationAsReads($notificationID);

		echo $notificationID; // Return a response to the AJAX call
	}
}