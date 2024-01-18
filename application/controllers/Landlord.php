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

	
	public function wallet()
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

			$this->load->view('landlord/payout.php', $data);
 
		}
		else{			
 
		  redirect( base_url()."login" ,'refresh');			
		}
	}

	public function profile()
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

			$this->load->view('landlord/profile.php', $data);
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

			$data['proptys'] = $this->landlord_model->get_propty($data['userID']);

			$data['history'] = $this->landlord_model->get_history($data['userID']);
			
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

			$data['sub_dats'] = $this->landlord_model->checkSub($data['userID']);
			
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

	public function repair_details($id)
    {
        if($this->session->has_userdata('userID')){			

			$data['userID'] = $this->session->userdata('userID');

			$data['repairID'] = $id;

			$data['sub_dats'] = $this->landlord_model->checkSub($data['userID']);

			$data['repairdata'] = $this->landlord_model->checkrepairdata($id);
			
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

			$this->load->view('landlord/repair-details.php', $data);

			//$this->load->view('landlord/footer.php', $data);
 			
		}else{			

			redirect( base_url()."login" ,'refresh');			

		}
    }

	public function single_property($prop_id)
    {
        if($this->session->has_userdata('userID')){			

			$data['userID'] = $this->session->userdata('userID');

			$data['propID'] = $prop_id;

			$data['userdata'] = $this->landlord_model->get_userinfo($data['userID'], $prop_id);

			//$data['inspectiondata'] = $this->landlord_model->get_Inspectioninfo($prop_id);
			
			//$data['prophistory'] = $this->landlord_model->get_prophstry($data['userID'], $prop_id);

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

	function fetchInspections()
	{

		$output = '';

		$userID = $this->session->userdata('userID');

		$data = $this->landlord_model->get_Inspectioninfo($this->input->post('prop_id'), $this->input->post('limit'), $this->input->post('start'));

		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {

				$date = strtotime($row->inspectionDate);

				$year = date("Y", $date); $month = date("F", $date); $day = date("d", $date); if($row->inspectionDate != ''){ $time = $day.' '.$month.', '.$year;}

				$remarks = $row->inspection_remarks;

				$comment = $row->comment;

				$output .= '<tr>
							<td>'.$time.'</td>
							<td>'.$remarks.'</td>
							<td>'.$comment.'</td>
						</tr>';
			}
		}

		echo $output;
	}

	function fetchTenantHistory()
	{

		$output = '';

		$userID = $this->session->userdata('userID');
		
		$data = $this->landlord_model->get_prophstry($userID, $this->input->post('prop_id'), $this->input->post('limits'), $this->input->post('starts'));

		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {

				$name = $row->firstName .' '. $row->lastName;

				$gender = $row->gender;

				$marrital_sts =	$row->marital_status;

				$date = strtotime($row->moveIndate); $year = date("Y", $date); $month = date("F", $date); $day = date("d", $date);

				$moveindt = $day.' '.$month.', '.$year;

				$moveoutdt = '';

				$date = strtotime($row->moveOutdate); $year = date("Y", $date); $month = date("F", $date); $day = date("d", $date); if($row->moveOutdate != ''){$moveoutdt = $day.' '.$month.', '.$year;}
				
				$output .= '<tr>
                <td>'.$name.'</td>
                <td>'.$gender.'</td>
                <td>'.$marrital_sts.'</td>
                <td>
                  <p class="d-flex align-items-center">'.$moveindt.'<i style="font-size: 13px;"
                      class="mx-2 fa-solid fa-arrow-right"></i>
                      '.$moveoutdt.'</p>
                </td>
              </tr>';
			}
		}

		echo $output;
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

	public function add_repairs()
	{
		$count = count($_FILES['imgName']['name']);

		$val = '';

		for($i=0; $i<$count; $i++)
        {
			$config['upload_path']          = './uploads/agreement/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 0;
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;
			$config['file_name'] = $_FILES['imgName']['name'][$i];

			$this->load->library('upload', $config);

			// if (!$this->upload->do_upload('imgName'))
			// {
			// 	$error = array('error' => $this->upload->display_errors());

			// 	$this->load->view('agr_error', $error);
			// }

			$img = $_FILES['imgName']['name'][$i];

			$postimg_tmp = $_FILES['imgName']['tmp_name'][$i];
            move_uploaded_file($postimg_tmp,"uploads/agreement/$img");

			$data = $this->upload->data();

			$val .= $img." ";
		}

		
		$filename = $val;
		
		$details = $this->input->post('details');
				
		$type = $this->input->post('repair_type');

		$cost = $this->input->post('cost');

		$date = $this->input->post('repair_date');

		$property = $this->input->post('sub-propty');

		$status = $this->input->post('repair_status');

		$res = $this->landlord_model->insertCxrepairs($type, $cost, $date, $property, $status, $filename, $details);

		if ($res) {

			// Assuming you're using CodeIgniter, use the URL helper to create URLs
		$user_profile_url = site_url('admin/addRepairs/');

		// Redirect to user profile with a success message
		echo "<script>
				alert('Upload Successful');
				window.location.href='$user_profile_url';
			</script>";
		}
	}

	public function approve()
	{		
		$repairId = $this->input->post('repairID');
		//$date = 
				
		$res = $this->landlord_model->editCxRepair($repairId);

		if ($res) {

			// Assuming you're using CodeIgniter, use the URL helper to create URLs
		$user_profile_url = site_url('landlord/repair');

		// Redirect to user profile with a success message
		echo "<script>
				alert('Upload Successful');
				window.location.href='$user_profile_url';
			</script>";
		}
	}
}