<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


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



		//$this->load->model('admin/admin_model');

	}

	public function login_admin(){

		 $username = $this->input->post('username');

		 $password = $this->input->post('password');

		 $data['user'] = $this->admin_model->login($username, $password); 

		 if($data['user'] === 0)
		 {

			echo 0; 


		 }else{

			$userdata = array('fname' => $data['user']['firstName'], 'lname' => $data['user']['lastName'], 'adminID' => $data['user']['adminID'], 'userAccess' => $data['user']['userAccess'], 'adminLoggedIn' => 'yes', 'photo' => $data['user']['profilePic']);

			$this->session->set_userdata($userdata);

			echo 'admin/dashboard';

		 }

   	}

	public function login(){

		if(!$this->session->has_userdata('adminLoggedIn')){	
		    
			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['title'] = "RSS Admin Login";

			$this->load->view('admin/pages/login', $data);

		}else{

			redirect( base_url()."admin/dashboard" ,'refresh');

		}

	}

	public function dashboard(){

		if($this->session->has_userdata('adminLoggedIn')){

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');
			
			$data['lname'] = $this->session->userdata('lname');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			//All properties
			$data['prop_count'] = $this->admin_model->countProperties();
			
			//All registered users
			$data['user_count'] = $this->admin_model->countUsers();
			
			//All buy to let properties
			$data['btl_prop_count'] = $this->admin_model->countBtlProperties();
			
			$data['snippet_properties'] = $this->admin_model->fetchSnippetProperties();

			$data['title'] = "RSS Dashboard";

			$this->load->view('admin/templates/header', $data);

			$this->load->view('admin/templates/sidebar', $data);

			$this->load->view('admin/pages/dashboard', $data);		

			$this->load->view('admin/templates/footer', $data);

		}else{

			redirect( base_url()."admin/login" ,'refresh');

		}

	}

	public function statistics(){

		if ( ! file_exists(APPPATH.'views/admin/pages/statistics.php'))
        {

            // Whoops, we don't have a page for that!
            show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['lsd'] = $this->admin_model->visitorsLSD("rss_stats");

			$data['visitslsd'] = $this->admin_model->visitsLSD("rss_stats");

			$data['todayVisitors'] = $this->admin_model->visitorsToday("rss_stats");
			
			$data['rvt'] = $this->admin_model->returningVisitorsToday("rss_stats");

			$data['visitorsYesterday'] = $this->admin_model->visitorsYesterday("rss_stats");
			
			$data['visitsYesterday'] = $this->admin_model->visitsYesterday("rss_stats");

			$data['visitorsThirty'] = $this->admin_model->visitorsThirty("rss_stats");
			
			$data['visitsThirty'] = $this->admin_model->visitsThirty("rss_stats");

			$data['visitorsYear'] = $this->admin_model->visitorsYear("rss_stats");
			
			$data['visitsYear'] = $this->admin_model->visitsYear("rss_stats");

			$data['totalVisitors'] = $this->admin_model->totalVisitors("rss_stats");
			
			$data['totalVisits'] = $this->admin_model->totalVisits("rss_stats");
			
			$data['browsers'] = $this->admin_model->browserTypes("rss_stats");
			
			$data['countries'] = $this->admin_model->country_visits("rss_stats");
			
			$data['cities'] = $this->admin_model->city_visits("rss_stats");
			
			$data['referrers'] = $this->admin_model->referrers("rss_stats");

			$data['adminPriv'] = $this->functions_model->getUserAccess();
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['adminID'] = $this->session->userdata('adminID');

			$data['title'] = "Statistics :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/statistics.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);


		}else{

			redirect( base_url().'admin/login','refresh');

		}

	}
	public function btl_statistics(){

		if ( ! file_exists(APPPATH.'views/admin/pages/btl-stats.php'))
        {

            // Whoops, we don't have a page for that!
            show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['lsd'] = $this->admin_model->visitorsLSD("btl_stats");

			$data['visitslsd'] = $this->admin_model->visitsLSD("btl_stats");

			$data['todayVisitors'] = $this->admin_model->visitorsToday("btl_stats");
			
			$data['rvt'] = $this->admin_model->returningVisitorsToday("btl_stats");

			$data['visitorsYesterday'] = $this->admin_model->visitorsYesterday("btl_stats");
			
			$data['visitsYesterday'] = $this->admin_model->visitsYesterday("btl_stats");

			$data['visitorsThirty'] = $this->admin_model->visitorsThirty("btl_stats");
			
			$data['visitsThirty'] = $this->admin_model->visitsThirty("btl_stats");

			$data['visitorsYear'] = $this->admin_model->visitorsYear("btl_stats");
			
			$data['visitsYear'] = $this->admin_model->visitsYear("btl_stats");

			$data['totalVisitors'] = $this->admin_model->totalVisitors("btl_stats");
			
			$data['totalVisits'] = $this->admin_model->totalVisits("btl_stats");
			
			$data['browsers'] = $this->admin_model->browserTypes("btl_stats");
			
			$data['countries'] = $this->admin_model->country_visits("btl_stats");
			
			$data['cities'] = $this->admin_model->city_visits("btl_stats");
			
			$data['referrers'] = $this->admin_model->referrers("btl_stats");

			$data['adminPriv'] = $this->functions_model->getUserAccess();
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['adminID'] = $this->session->userdata('adminID');

			$data['title'] = "Statistics :: Buy2let";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/btl-stats.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

		}else{

			redirect( base_url().'admin/login','refresh');

		}

	}
	public function add_notification(){

		if ( ! file_exists(APPPATH.'views/admin/pages/new-notification.php'))
        {
                // Whoops, we don't have a page for that!

                show_404();

        }

		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "New Notification :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/new-notification.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);


		}else{

			redirect( base_url().'admin/login','refresh');

		}

	}
    public function edit_notification($id){

		if ( ! file_exists(APPPATH.'views/admin/pages/edit-notification.php'))
        {
                // Whoops, we don't have a page for that!

                show_404();

        }

		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){
		    
		    $data['notification'] = $this->admin_model->get_notification($id);

			$data['adminPriv'] = $this->functions_model->getUserAccess();
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['adminID'] = $this->session->userdata('adminID');

			$data['title'] = "Edit Notification :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/edit-notification.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);


		}else{

			redirect( base_url().'admin/login','refresh');

		}

	}
	public function add_admin(){

		if ( ! file_exists(APPPATH.'views/admin/pages/add-admin.php'))
        {

                // Whoops, we don't have a page for that!
                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Add Admin :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/add-admin.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

		}else{

			redirect( base_url().'admin/login','refresh');

		}

	}

	public function add_news(){	

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = 'Post News Article :: RSS'; // Capitalize the first letter

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/add-news.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

		}else{

			redirect( base_url().'admin-login','refresh');		

		}

	}
    public function view_all_news(){
		
		$config['total_rows'] = $this->admin_model->countAllNews();		

		$data['total_count'] = $config['total_rows'];		

		$config['suffix'] = '';  

		if ($config['total_rows'] > 0) {


			$page_number = $this->uri->segment(3);
			

			$config['base_url'] = base_url() . 'admin/view-all-news';

			if (empty($page_number))

				$page_number = 1;
				
			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['articles'] = $this->admin_model->fetchAllNews();

		}
		
		if ( ! file_exists(APPPATH.'views/admin/pages/view-all-news.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "All News :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/view-all-news' , $data);

			$this->load->view('admin/templates/footer.php' , $data);	

		}else{			
 
			redirect( base_url().'admin/login','refresh');				

		}

	}
	public function edit_article($id){
	    
	    if ( ! file_exists(APPPATH.'views/admin/pages/edit-article.php'))

        {
			// Whoops, we don't have a page for that!

			show_404();

        } 

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['article'] = $this->admin_model->fetchArticle($id);

			$data['title'] = "Edit Article :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/edit-article.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

		

		}else{

			redirect( base_url().'admin/login','refresh');		

		}
	}
	public function amenities(){

		$config['total_rows'] = $this->admin_model->countAmenity();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {
		    
			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/amenities';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);
			
			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);
			
			$data['page_links'] = $this->pagination->create_links();

			$data['amenities'] = $this->admin_model->fetchAmenities();

		}

		if ( ! file_exists(APPPATH.'views/admin/pages/amenities.php'))
        {

            // Whoops, we don't have a page for that!
            show_404();

        }

		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Amenities :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/amenities.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			$this->load->view('admin/templates/amenity-modal.php' , $data);

		}else{

			redirect( base_url().'admin/login','refresh');

		}

	}
	public function rss_users(){

		$config['total_rows'] = $this->admin_model->countRssUsers();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/rss-users';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['rss_users'] = $this->admin_model->fetchRssUsers();

		}

		if ( ! file_exists(APPPATH.'views/admin/pages/rss-users.php'))
        {

                // Whoops, we don't have a page for that!
                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Small Small Users :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/rss-users.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);	

		}else{

			redirect( base_url().'admin/login','refresh');			

		}

	}


	public function rss_verfd(){

		$config['total_rows'] = $this->admin_model->countRssUser();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/rss-verfd';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['rss_users'] = $this->admin_model->fetchRssUser();

		}

		if ( ! file_exists(APPPATH.'views/admin/pages/rss-users.php'))
        {

                // Whoops, we don't have a page for that!
                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Small Small Users :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/rss-users.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);	

		}else{

			redirect( base_url().'admin/login','refresh');			

		}

	}
	
	public function agr_upload(){
	    
	    $config['upload_path']          = './uploads/agreement/';
        $config['allowed_types']        = 'doc|docx|pdf';
        $config['max_size']             = 0;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        
        // $usrs = $this->session->userdata('userID');
        
        // $usrs = $this->admin_model->get_username($usrs);

        if (!$this->upload->do_upload('filename'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('agr_error', $error);
        }
        
        else
        {
                $data = $this->upload->data();
                
                $id = $this->input->post('sub_id');
                
                $str_yr = $this->input->post('start-yr');
                
                $data = array(
                    'filename' => $data['file_name'],
                    'userId'   => $id,
                    'start_year' => $str_yr,
                    'end_year' => $this->input->post('end-yr'),
                    'property' => $this->input->post('sub-propty'),
                    // 'admin' => $usrs['email'],
                    'date' => date('Y-m-d H:i:s')
                    );
                    
                $this->db->insert('sub_agreement', $data);
                
                //print_r($data);
                
                echo "<script>
                            alert('Upload Successful');
                            window.location.href='user-profile/".$id."';
                      </script>";
        }
	}

	public function app_users(){

		$config['total_rows'] = $this->admin_model->countAppUsers();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';


		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/app-users';

			if (empty($page_number))

				$page_number = 1;
				
			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['app_users'] = $this->admin_model->fetchAppUsers();

		}
		
		if ( ! file_exists(APPPATH.'views/admin/pages/app-users.php'))
        {

            // Whoops, we don't have a page for that!
            show_404();

        }

		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "App Users :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/app-users.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);	

		}else{

			redirect( base_url().'admin/login','refresh');			

		}

	}
	public function btl_users(){

		$config['total_rows'] = $this->admin_model->countBtlUsers();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/btl-users';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;
			
			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['btl_users'] = $this->admin_model->fetchBtlUsers();

		}

		if ( ! file_exists(APPPATH.'views/admin/pages/btl-users.php'))
        {

            // Whoops, we don't have a page for that!
            show_404();

        }

		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');
			
			$data['title'] = "Buytolet Users :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/btl-users.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);	

		}else{

			redirect( base_url().'admin/login','refresh');			

		}

	}
	public function pages(){		

		$config['total_rows'] = $this->admin_model->countAmenity();		

		$data['total_count'] = $config['total_rows'];		

		$config['suffix'] = '';


		if ($config['total_rows'] > 0) {			

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/amenities';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();            

			$data['amenities'] = $this->admin_model->fetchAmenities();

		}		

		if ( ! file_exists(APPPATH.'views/admin/pages/amenities.php')){

                // Whoops, we don't have a page for that!

                show_404();

        }
		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){			

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');	
			
			$data['userAccess'] = $this->session->userdata('userAccess');		

			$data['title'] = "Amenities :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/amenities.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			$this->load->view('admin/templates/amenity-modal.php' , $data);		

		}else{			

			redirect( base_url().'admin/login','refresh');				

		}

	}
	public function rss_about_us(){		

		$data['content'] = $this->admin_model->get_rss_about_us();

		if ( ! file_exists(APPPATH.'views/admin/pages/rss-about-us.php')){

                // Whoops, we don't have a page for that!

                show_404();

        }
		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){			

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');	
			
			$data['userAccess'] = $this->session->userdata('userAccess');		

			$data['title'] = "About Us :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/rss-about-us.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);	

		}else{			

			redirect( base_url().'admin/login','refresh');				

		}

	}
	
	public function profile($id){
	    
	    $data['ids'] = $id;

		$data['details'] = $this->admin_model->get_verification($id);

		if ( ! file_exists(APPPATH.'views/admin/pages/profile.php')){

                // Whoops, we don't have a page for that!

                show_404();

        }
        
		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){			

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');			

			$data['title'] = "Verification Profile :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/profile.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);	

		}else{			

			redirect( base_url().'admin/login','refresh');				

		}

	} 

	public function download($id){
	    
	    $config['upload_path'] = './uploads/agreement/';
	    
	    if(!empty($id))
	    {
	         //load download helper
	         $this->load->helper('download');
	         
	         //get file from db
	         
	         $fileInfo = $this->admin_model->getRows($id);
	         
	         //file path
	         $file = './uploads/agreement/'.$fileInfo['filename'];
	         
	         //download file 
	         force_download($file, NULL);
	         
	         redirect(dashboard/subscription-agreement);
	         
	         //echo $id;
	    }
        
	}
	
	public function user_profile($id){
	    
	    $data['ids'] = $id;

		$data['details'] = $this->admin_model->get_user_details($id);

		$data['bookings'] = $this->admin_model->get_user_bookings($id);

		$data['user_hstry'] = $this->admin_model->get_user_hstry($id);
		
		$data['proptys'] = $this->admin_model->get_user_propty($id);
		
		$data['user_transactions'] = $this->admin_model->get_user_transactions($id);

		$data['debts'] = $this->admin_model->get_debts($id);

		if ( ! file_exists(APPPATH.'views/admin/pages/user-profile.php')){

                // Whoops, we don't have a page for that!

                show_404();

        }
        
		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){			

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');	
			
			$data['userAccess'] = $this->session->userdata('userAccess');		

			$data['title'] = "User Profile :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/user-profile.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			$this->load->view('admin/templates/payment-modal.php' , $data);	

		}else{			

			redirect( base_url().'admin/login','refresh');				

		}

	} 
	
	public function get_ver_property($id){
	    
	    return $this->admin_model->get_ver_property($id);
	    
	}
	public function get_ver_furniture($id){
	    
	    return $this->admin_model->get_ver_furniture($id);
	    
	}
	public function get_ver_prop($id){
	    
	    return $this->admin_model->get_ver_prop($id);
	    
	}
	public function app_profile($id){		

		$data['details'] = $this->admin_model->get_app_verification($id);

		if ( ! file_exists(APPPATH.'views/admin/pages/app-profile.php')){

                // Whoops, we don't have a page for that!

                show_404();

        }
		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){			

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');			

			$data['title'] = "Verification Profile :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/app-profile.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);	

		}else{			

			redirect( base_url().'admin/login','refresh');				

		}

	} 
	public function btl_user($id){		

		$data['details'] = $this->admin_model->get_btl_user($id);

		if ( ! file_exists(APPPATH.'views/admin/pages/btl-user.php')){

                // Whoops, we don't have a page for that!

                show_404();

        }
		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){			

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');	
			
			$data['userAccess'] = $this->session->userdata('userAccess');		

			$data['title'] = "Buy2let Profile";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/btl-user.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);	

		}else{			

			redirect( base_url().'admin/login','refresh');				

		}

	} 
	public function buytolet_about_us(){		

		$data['content'] = $this->admin_model->get_buytolet_about_us();

		if ( ! file_exists(APPPATH.'views/admin/pages/buytolet-about-us.php')){

                // Whoops, we don't have a page for that!

                show_404();

        }
		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){			

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');	
			
			$data['userAccess'] = $this->session->userdata('userAccess');		

			$data['title'] = "About Us :: Buytolet";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/buytolet-about-us.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);	

		}else{			

			redirect( base_url().'admin/login','refresh');				

		}

	}
	public function btl_how_it_works(){		

		$data['content'] = $this->admin_model->get_btl_how_it_works();

		if ( ! file_exists(APPPATH.'views/admin/pages/btl-how-it-works.php')){

                // Whoops, we don't have a page for that!

                show_404();

        }
		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){			

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');			

			$data['title'] = "About Us :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/btl-how-it-works.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);	

		}else{			

			redirect( base_url().'admin/login','refresh');				

		}

	}
	public function bookings(){

		

		$config['total_rows'] = $this->admin_model->countPropBookings();		

		$data['total_count'] = $config['total_rows'];		

		$config['suffix'] = ''; 

		if ($config['total_rows'] > 0) {


			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/bookings';

			if (empty($page_number))

				$page_number = 1;

				$offset = ($page_number - 1) * $this->pagination->per_page;

				$this->admin_model->setPageNumber($this->pagination->per_page);

				$this->admin_model->setOffset($offset);

				$this->pagination->cur_page = $page_number;

				$this->pagination->initialize($config);

				$data['page_links'] = $this->pagination->create_links();

				$data['bookings'] = $this->admin_model->fetchBookings();

		}
		
		if ( ! file_exists(APPPATH.'views/admin/pages/bookings.php'))
        {
                // Whoops, we don't have a page for that!

                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Bookings :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/bookings.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			$this->load->view('admin/templates/booking-modal.php' , $data);		

		}else{			
 
			redirect( base_url().'admin/login','refresh');				

		}

	}
	
	
	public function furnisure_category(){

		$config['total_rows'] = $this->admin_model->countFurnisureCategory();
		
		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/furnisure-category';

			if (empty($page_number))
			
				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;
			
			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['appliances'] = $this->admin_model->fetchFurnisureCategories();

		}
		if ( ! file_exists(APPPATH.'views/admin/pages/furnisure-category.php'))
        {

            // Whoops, we don't have a page for that!
            show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Furnisure Category :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/furnisure-category.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			$this->load->view('admin/templates/furnisure-category-modal.php' , $data);

		}else{

			redirect( base_url().'admin/login','refresh');

		}

	}

	public function furnisure_type(){

		$config['total_rows'] = $this->admin_model->countFurnisureType();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/furnisure-type';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;
			
			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['types'] = $this->admin_model->fetchFurnisureTypes();

		}
		if ( ! file_exists(APPPATH.'views/admin/pages/furnisure-type.php'))
        {

            // Whoops, we don't have a page for that!
            show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Furnisure Type :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/furnisure-type.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			$this->load->view('admin/templates/furnisure-type-modal.php' , $data);

		}else{

			redirect( base_url().'admin/login','refresh');

		}

	}

	public function facility_category(){

		$config['total_rows'] = $this->admin_model->countFacilityCategory();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {
		    
			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/facility-category';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['categories'] = $this->admin_model->fetchFacilityCategories();			

		}

		if ( ! file_exists(APPPATH.'views/admin/pages/facility-category.php'))
        {

            // Whoops, we don't have a page for that!
            show_404();

        }

		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Category :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/facility-category.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			$this->load->view('admin/templates/facility-category-modal.php' , $data);

		}else{

			redirect( base_url().'admin/login','refresh');
			
		}

	}

	public function neighborhood_distance(){

		$config['total_rows'] = $this->admin_model->countNeighborhoodDistance();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0){

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/neighborhood-distance';

			if (empty($page_number))
			
				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);
			
			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['distances'] = $this->admin_model->fetchNeighborhoodDistance();

		}

		if ( ! file_exists(APPPATH.'views/admin/pages/neighborhood-distance.php'))
        {

            // Whoops, we don't have a page for that!
            show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Neighbourhood :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/neighborhood-distance.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			$this->load->view('admin/templates/neighborhood-distance-modal.php' , $data);

		}else{
		    
			redirect( base_url().'admin/login','refresh');

		}

	}

	public function apartment_type(){

		$config['total_rows'] = $this->admin_model->countAptType();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/apt-type';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['types'] = $this->admin_model->fetchAptType();			

		}

		if ( ! file_exists(APPPATH.'views/admin/pages/apartment-type.php'))
        {

            //Whoops, we don't have a page for that!
            show_404();

        }

		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Apartment Type :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/apartment-type.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			$this->load->view('admin/templates/apartment-type-modal.php' , $data);

		}else{

			redirect( base_url().'admin/login','refresh');

		}

	}

	public function rent_type(){

		$config['total_rows'] = $this->admin_model->countRentType();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/apt-type';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['types'] = $this->admin_model->fetchRentType();

		}

		if ( ! file_exists(APPPATH.'views/admin/pages/rent-type.php'))
        {

            // Whoops, we don't have a page for that!
            show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Apartment Type :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/rent-type.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			$this->load->view('admin/templates/rent-type-modal.php' , $data);

		}else{
		    
			redirect( base_url().'admin/login','refresh');
			
		}

	}
    public function get_all_admin(){
	    
	    $values = array();
	    
	    $admins = $this->admin_model->get_all_admin();
	    
	    for($i = 0; $i < count($admins); $i++){
	        
	        array_push($values, $admins[$i]['adminID']);
	        
	    }
	    
	    $result = $this->admin_model->get_recieved_msgs($values);
	    
	    //print_r($result);
	    
	    //exit;
	}
	public function inspection_requests(){

		$values = array();
		
		$admins = $this->admin_model->get_all_admin();
	    
	    for($i = 0; $i < count($admins); $i++){
	        
	        array_push($values, $admins[$i]['adminID']);
	        
	    }
		
		$data['adminID'] = $this->session->userdata('adminID');

		$config['total_rows'] = $this->admin_model->countRequests($data['adminID']);

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/inspection';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			//$data['inspections'] = $this->admin_model->fetchRequests($data['adminID']);	
			$data['inspections'] = $this->admin_model->fetchRequests($values);
			
		}

		if ( ! file_exists(APPPATH.'views/admin/pages/inspection.php'))
        {

            // Whoops, we don't have a page for that!

            show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			//$data['aptTypes'] = $this->admin_model->fetchAptType();
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['title'] = "Inspection :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/inspection.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			$this->load->view('admin/templates/request-modal.php' , $data);

		}else{ 

			redirect( base_url().'admin/login','refresh');		 	

		} 

	}
	public function app_residential_inspections(){

		$config['total_rows'] = $this->admin_model->countAppRequests();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';


		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/residential-inspections';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['inspections'] = $this->admin_model->fetchAppInspRequests();



		}

		if ( ! file_exists(APPPATH.'views/admin/pages/residential-inspections.php'))

        {

                // Whoops, we don't have a page for that!

                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			//$data['aptTypes'] = $this->admin_model->fetchAptType();

			$data['adminPriv'] = $this->functions_model->getUserAccess();
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['adminID'] = $this->session->userdata('adminID');

			$data['title'] = "Inspection :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/residential-inspections.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			$this->load->view('admin/templates/request-modal.php' , $data);

		}else{ 

			redirect( base_url().'admin/login','refresh');		 	

		} 

	}
	
	public function btl_inspection_requests(){

		$config['total_rows'] = $this->admin_model->countBtlInspRequests();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/btl-inspections';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);
			
			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['inspections'] = $this->admin_model->fetchBtlInspRequests();

		}
		
		
		if ( ! file_exists(APPPATH.'views/admin/pages/btl-inspections.php'))
        {

            // Whoops, we don't have a page for that!
            show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			//$data['aptTypes'] = $this->admin_model->fetchAptType();

			$data['adminPriv'] = $this->functions_model->getUserAccess();
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['adminID'] = $this->session->userdata('adminID');

			$data['title'] = "Buy2Let Inspection Requests";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/btl-inspections.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			/*$this->load->view('admin/templates/request-modal.php' , $data);*/

		}else{ 
		    
			redirect( base_url().'admin/login','refresh');		 	

		} 

	}
	
	public function verifications(){		

		$config['total_rows'] = $this->admin_model->countVerifications();		

		$data['total_count'] = $config['total_rows'];		

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/verifications';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();            

			$data['verifications'] = $this->admin_model->fetchVerifications();	

		}

		if ( ! file_exists(APPPATH.'views/admin/pages/rss-verification.php'))
        {       // Whoops, we don't have a page for that!

                show_404();
        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){			

			//$data['aptTypes'] = $this->admin_model->fetchAptType();

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Verifications :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/rss-verification.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			$this->load->view('admin/templates/request-modal.php' , $data);

		}else{ 

			redirect( base_url().'admin/login','refresh');		 	

		} 
	}

	public function app_verifications(){		

		$config['total_rows'] = $this->admin_model->countAppVerifications();		

		$data['total_count'] = $config['total_rows'];		

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/app-verifications';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();            

			$data['verifications'] = $this->admin_model->fetchAppVerifications();	

		}
	

		if ( ! file_exists(APPPATH.'views/admin/pages/app-verification.php'))
        {       // Whoops, we don't have a page for that!

                show_404();
        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){			

			//$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "App Verifications :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/app-verification.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			//$this->load->view('admin/templates/request-modal.php' , $data);

		}else{ 

			redirect( base_url().'admin/login','refresh');		 	

		} 

	}

    public function add_new_buytolet_property(){
		
		if ( ! file_exists(APPPATH.'views/admin/pages/new-buytolet-property.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){
			
			$data['aptTypes'] = $this->admin_model->fetchAptType();
			
			$data['investTypes'] = $this->admin_model->fetchInvestType();
			
			$data['adminPriv'] = $this->functions_model->getUserAccess();
			
			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');
			
			$data['countries'] = $this->functions_model->get_countries();
			
			$data['title'] = "Add Property :: Buy2Let";
			$this->load->view('admin/templates/header.php' , $data);
			$this->load->view('admin/templates/sidebar.php' , $data);
			$this->load->view('admin/pages/new-buytolet-property.php' , $data);
			$this->load->view('admin/templates/footer.php' , $data);
		
		}else{
			
			redirect( base_url().'admin/login','refresh');		
			
		}
	}
	public function add_new_rss_property(){

		if ( ! file_exists(APPPATH.'views/admin/pages/new-rss-property.php'))
        {

                // Whoops, we don't have a page for that!
                show_404();

        }

		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){

			$data['aptTypes'] = $this->admin_model->fetchAptType();
			
			$data['furnishings'] = $this->admin_model->fetchFurnishings();
			
			$data['services'] = $this->admin_model->fetchServices();

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['countries'] = $this->functions_model->get_countries();

			$data['title'] = "Add Property :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/new-rss-property.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

		}else{

			redirect( base_url().'admin/login','refresh');

		}

	}
	public function new_apartment(){
		
		if($this->session->has_userdata('adminLoggedIn')){	
		    
		    $data['stayTypes'] = $this->admin_model->fetchStayType();
		    
		    $data['aptTypes'] = $this->admin_model->fetchAptType();

			$data['adminPriv'] = $this->functions_model->getUserAccess();
			
			$data['countries'] = $this->functions_model->get_countries();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');
		
			
			$data['title'] = "Stay SmallSmall Apartment";
			
			$this->load->view('admin/templates/header', $data);
			
			$this->load->view('admin/templates/sidebar', $data);
			
			$this->load->view('admin/pages/new-apartment', $data);	
			
			$this->load->view('admin/templates/footer', $data);
			
		}else{
			
			redirect( base_url()."admin/login" ,'refresh');
			
		}
	}
	public function edit_apartment($id){
		
		if($this->session->has_userdata('adminLoggedIn')){	
		    
		    $data['property'] = $this->admin_model->fetchApartment($id);
		    
		    $data['aptTypes'] = $this->admin_model->fetchAptType();
		    
		    $data['stayTypes'] = $this->admin_model->fetchStayType();

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');
			
			$data['title'] = "Edit apartment";
			
			$this->load->view('admin/templates/header', $data);
			
			$this->load->view('admin/templates/sidebar', $data);
			
			$this->load->view('admin/pages/edit-apartment', $data);	
			
			$this->load->view('admin/templates/footer', $data);
			
		}else{
			
			redirect( base_url()."admin/login" ,'refresh');
			
		}
	}
	public function add_furniture(){

		if ( ! file_exists(APPPATH.'views/admin/pages/new-furnisure-item.php'))
        {

                // Whoops, we don't have a page for that!

                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['categories'] = $this->admin_model->fetchFurnisureCategories();

			$data['types'] = $this->admin_model->fetchFurnisureTypes();

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Add Furniture :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/new-furnisure-item.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

		}else{

			redirect( base_url().'admin/login','refresh');	
			
		}

	}
	
	public function edit_property($id){
		

		if ( ! file_exists(APPPATH.'views/admin/pages/edit-rss-property.php'))

        {
			// Whoops, we don't have a page for that!

			show_404();

        } 

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			

			$data['aptTypes'] = $this->admin_model->fetchAptType();
			
			$data['furnishings'] = $this->admin_model->fetchFurnishings();
			
			$data['services'] = $this->admin_model->fetchServices();
			
			$data['facility_categories'] = $this->admin_model->fetchFacilityCategories();
			
			$data['distances'] = $this->admin_model->fetchNeighborhoodDistance();

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['property'] = $this->admin_model->fetchProperty($id);
			
			$data['countries'] = $this->functions_model->get_countries();

			$data['states'] = $this->functions_model->get_states($data['property']['country']);

			$data['cities'] = $this->functions_model->get_cities($data['property']['state']);

			$data['title'] = "Edit Property :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/edit-rss-property.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

		

		}else{

			redirect( base_url().'admin/login','refresh');		

		}

	}
	
	public function edit_buytolet_property($id){ 
		

		if ( ! file_exists(APPPATH.'views/admin/pages/edit-buytolet-property.php'))

        {
			// Whoops, we don't have a page for that!

			show_404();

        } 

		//check if Admin is logged in
		if($this->session->has_userdata('adminLoggedIn')){			

			$data['aptTypes'] = $this->admin_model->fetchAptType();
			
			$data['investTypes'] = $this->admin_model->fetchInvestType();

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');	
			
			$data['userAccess'] = $this->session->userdata('userAccess');		

			$data['countries'] = $this->functions_model->get_countries();

			$data['property'] = $this->admin_model->fetchBuytoletProperty($id);
			
			$data['states'] = $this->admin_model->fetchStates($data['property']['country']);
			
			//Get Images
			$data['btl_images'] = file_get_contents('https://buy.smallsmall.com/buytolet/get-all-images/'.$data['property']['image_folder'].'/'.$data['property']['featured_image']);

			$data['title'] = "Edit Property :: Buytolet";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/edit-buytolet-property.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

		

		}else{

			redirect( base_url().'admin/login','refresh');		

		}

	}

	public function edit_item($id){

		if ( ! file_exists(APPPATH.'views/admin/pages/edit-furnisure-item.php'))
        {
			// Whoops, we don't have a page for that!

			show_404();

        } 

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){


			$data['adminPriv'] = $this->functions_model->getUserAccess();
			
			$data['categories'] = $this->admin_model->fetchFurnisureCategories();

			$data['types'] = $this->admin_model->fetchFurnisureTypes();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['item'] = $this->admin_model->fetchItem($id);

			$data['title'] = "Edit Item :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/edit-furnisure-item.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

		}else{

			redirect( base_url().'admin/login','refresh');		

		}

	}
	public function createAmenity(){

		$file_element_name = 'userfile';

        $title = $this->input->post('title');

        $amenity_type = $this->input->post('amenity_type');

		if (!is_dir('uploads/amenity/')) {

			mkdir('./uploads/amenity/', 0777, TRUE);

		}
		
		$config['upload_path'] = './uploads/amenity/';

		$config['allowed_types'] = 'jpg|png';

		$config['max_size'] = 1024 * 8;

		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($file_element_name)){

			$status = 'error';

			$msg = $this->upload->display_errors('', '');

		}else{

			$data = $this->upload->data();

			if($data){

				$folder = $data['file_name'];

				$res = $this->admin_model->insertAmenity($title, $amenity_type, $folder);

				if($res){

					$status = 'success';
					
					$msg = 1;

				}else{

					$status = 'error';
					
					$msg = 0;

				}

			}

		}

	}

	public function createFacilityCategory(){

        $category = $this->input->post('category');

		$slug = url_title($category, 'dash', true);

		$res = $this->admin_model->insertFCat($category, $slug);

		if($res){

			echo 1;

		}else{

			echo 0;
			
		}

	}

	public function createFurnisureCategory(){

        $category = $this->input->post('category');

		$slug = url_title($category, 'dash', true);

		$res = $this->admin_model->insertFurnisureCat($category, $slug);

		if($res){
		    
			echo 1;
			
		}else{

			echo 0;

		}

	}

	public function createFurnisureType(){

        $type = $this->input->post('type');

		$slug = url_title($type, 'dash', true);

		$res = $this->admin_model->insertFurnisureType($type, $slug);

		if($res){
		    
			echo 1;
			
		}else{

			echo 0;

		}

	}

	public function createAptType(){

        $category = $this->input->post('category');

		$slug = url_title($category, 'dash', true);
		
		$res = $this->admin_model->insertAptType($category, $slug);

		if($res){

			echo 1;

		}else{

			echo 0;

		}

	}

	public function createRentType(){

        $rent_type = $this->input->post('rent_type');

		$slug = url_title($rent_type, 'dash', true);

		$res = $this->admin_model->insertRentType($rent_type, $slug);

		if($res){

			echo 1;

		}else{

			echo 0;

		}

	}

	public function createNeighborhoodDistance(){

        $distance = $this->input->post('distance');

		$slug = url_title($distance, 'dash', true);

		$res = $this->admin_model->insertNDist($distance, $slug);

		if($res){

			echo 1;

		}else{

			echo 0;
			
		}

	}

	public function addAdmin(){        

        $fname = $this->input->post('fname');

        $lname = $this->input->post('lname');

        $access = $this->input->post('userAccess');

        $email = $this->input->post('email'); 
		
		$pass = md5(date('Ymdhis')); 
		
		$password = strtoupper(substr($pass, 0, 8));

		$res = $this->admin_model->insertAdmin($fname, $lname, $email, $access, md5($password));
 
		if($res){

			$data['lname'] = $lname;                        

			$data['name'] = $fname.' '.$lname; 

			$data['password'] = $password;

			$data['username'] = $email;

			$this->email->from('noreply@smallsmall.com', 'Administrator');

			$this->email->to($email);            

			$this->email->subject("Login Password");   
			
			$this->email->set_mailtype("html");         

			$message = $this->load->view('email/header.php', $data, TRUE);            

			$message .= $this->load->view('email/admin-password-email.php', $data, TRUE);            

			$message .= $this->load->view('email/footer.php', $data, TRUE);            

			$this->email->message($message);            

			$emailRes = $this->email->send();            			

			$status = "success";
			
			$msg = "You have successfully added user";

		}  

       	echo json_encode(array('status' => $status, 'msg' => $msg));

	}

	

	public function getDistance(){

		$msg = "";

		$error = "";

        

		$res = $this->admin_model->getNDist();

		if($res){

			$status = "success";		

			$msg = $res;



		}else{

			$status = "error";

			$msg = "Error!";

		}

				

		echo json_encode(array('status' => $status, 'msg' => $msg));	

	}

	public function getCategory(){

		$msg = "";

		$error = "";

        

		$res = $this->admin_model->getFCat();

		if($res){

			$status = "success";		

			$msg = $res;



		}else{

			$status = "error";

			$msg = "Error!";

		}

				

		echo json_encode(array('status' => $status, 'msg' => $msg));	

	}

	public function uploadProperty(){

		//Get data from AJAX

		$propName = $this->input->post('propTitle');

		$propType = $this->input->post('propType');

		$propDesc = htmlentities($this->input->post('propDesc', ENT_QUOTES));

		$propNote = htmlentities($this->input->post('propNote', ENT_QUOTES));

		$address = $this->input->post('propAddress');

		$country = $this->input->post('country');

		$city = $this->input->post('city');

		$state = $this->input->post('states');

		$price = $this->input->post('monthly-price');

		$service_charge = $this->input->post('service-charge'); 
		
		$service_charge_term = $this->input->post('service-charge-term');

		$security_deposit = $this->input->post('security-deposit');
		
		$security_deposit_term = $this->input->post('security-deposit-term');

		$payment_plan = $this->input->post('payment-plan');

		$intervals = $this->input->post('intervals');

		$frequency = $this->input->post('frequency');

		$imageFolder = $this->input->post('foldername');

		$featuredPic = $this->input->post('featuredPic');

		$amenities = $this->input->post('amenities');

		$services = $this->input->post('services');

		$bed = $this->input->post('bed-number');

		$bath = $this->input->post('bath-number');

		$toilet = $this->input->post('toilet-number');

		$facilityName = $this->input->post('facility-name');

		$facilityCat = $this->input->post('facility-category');

		$facilityDist = $this->input->post('facility-distance');

		$availableFrom = $this->input->post('availableFrom');

		$status = "no";
		
		$featuredProp = "no";

		$furnishing = $this->input->post('furnishing');

		$renting_as = $this->input->post('suitable-for');
		
		$is_city = $this->functions_model->check_city($city, $state);
				
		if(!$is_city){
		    
		    $this->functions_model->insert_city($city, $state);
		    
		}
		
		if($this->input->post('featuredProp')){
			
			$featuredProp = "yes";
				
		}
		
		if($this->input->post('newProp')){
			
			$status = "yes"; 
				
		}

		if($this->session->has_userdata('adminLoggedIn')){

			$userID = $this->session->userdata('adminID');

            $city_id = $this->admin_model->get_city_id($city);

			//Populate the property table

			$property = $this->admin_model->insertProperty($propName, $propType, $propDesc, $propNote, $address, $city, $state, $country, $price, $service_charge, $service_charge_term, $security_deposit, $payment_plan, $intervals, $frequency, $imageFolder, $featuredPic, $amenities, $bed, $bath, $toilet, $userID, $status, $furnishing, $renting_as, $services, $featuredProp, $availableFrom, $city_id['id'], $security_deposit_term);

			if($property && is_array($facilityName)){

				$facility_count = count($facilityName);

				for($i = 0; $i < $facility_count; $i++){

					if (!is_dir('./uploads/properties/'.$imageFolder.'/facilities')) {

						mkdir('./uploads/properties/'.$imageFolder.'/facilities', 0777, TRUE);

					}

					$output = '';

					$config["upload_path"] = './uploads/properties/'.$imageFolder.'/facilities';

					$config["allowed_types"] = 'jpg|jpeg|png';

					$config['max_size'] = '5000';

					$this->load->library('upload', $config);

					$this->upload->initialize($config);

					$_FILES["file"]["name"] = $_FILES["files"]["name"][$i];

					$_FILES["file"]["type"] = $_FILES["files"]["type"][$i];

					$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$i];

					$_FILES["file"]["error"] = $_FILES["files"]["error"][$i];

					$_FILES["file"]["size"] = $_FILES["files"]["size"][$i];

					

					if($this->upload->do_upload('file')){					

						

						$data = $this->upload->data();

					}

					$this->admin_model->insertFacilities($property, $facilityName[$i], $facilityCat[$i], $facilityDist[$i], $data['file_name']);

				}
				//$facilities = $this->admin_model->insertFacilities($property['id'], $facilityName, $facilityCat, $facilityDist);
				//Check city if it is in table
				
				echo 1;

			}elseif($property){
			    
			    echo 1;
			    
			}else{

				echo "Could not upload property";

			}

		}else{			

			redirect( base_url()."admin/dashboard" ,'refresh');			

		}

	}
	public function uploadAptImages($folder){			

		if(!$folder){			

			$folder = md5(date("Ymd His"));			

		}		

		sleep(3);		

		if (!is_dir('../stay.smallsmall.com/uploads/apartments/'.$folder)) {

			mkdir('../stay.smallsmall.com/uploads/apartments/'.$folder, 0777, TRUE);
			
		}		

		if($_FILES["files"]["name"] != ''){
			

			$output = '';
			
			$error = 0;

			$config["upload_path"] = '../stay.smallsmall.com/uploads/apartments/'.$folder;

			$config["allowed_types"] = 'jpg|jpeg|png';

			$config['encrypt_name'] = TRUE;

			$config['max_size'] = 10 * 1024;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);
			

			for($count = 0; $count<count($_FILES["files"]["name"]); $count++){
				

				$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];

				$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];

				$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];

				$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];

				$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
				

				if($this->upload->do_upload('file')){				

					$data = $this->upload->data();	
					
					

					$output .= '
								<span class="imgCover removal-id-'.$count.'" id="id-'.$data["file_name"].'"><img src="https://stay.smallsmall.com/uploads/apartments/'.$folder.'/'.$data["file_name"].'" id="'.$data["file_name"].'" class="upldImg img-responsive img-thumbnail" onclick="selectFeatured(this.id)" title="Click to select as featured image" />
								<div class="remove-img img-removal" id="img-properties-'.$data['file_name'].'-'.$count.'">remove <i class="fa fa-trash"></i></div>
								<!--<span class="featTT">featured</span>--></span>';
				}else{
					$error = $this->upload->display_errors('', '');
				}			

			}
			//echo $output;

			echo json_encode(array('pictures' => $output, 'folder' => $folder, 'error' => $error));		

		}		

	}
	
	public function uplUpcomingProp(){

		//Get data from AJAX

		$units = $this->input->post('units');

		$propType = $this->input->post('propType');

		$address = $this->input->post('propAddress');

		$country = $this->input->post('country');

		$city = $this->input->post('city');

		$state = $this->input->post('state');

		$price = $this->input->post('price');

		$services = $this->input->post('services');

		$airtable_url = $this->input->post('airtable_url');

		$typeOfTenant = $this->input->post('typeOfTenant');


		if($this->session->has_userdata('adminLoggedIn')){

			$userID = $this->session->userdata('adminID');

            $city_id = $this->admin_model->get_city_id($city);

			//Populate the property table

			$property = $this->admin_model->insertUpcomingProperty($units, $propType, $address, $state, $country, $price, $userID, $services, $typeOfTenant, $city_id['id'], $airtable_url);



			if($property){
			    
				echo 1;

			}else{

				echo "Could not upload property";

			}

		}else{			

			redirect( base_url()."admin/dashboard" ,'refresh');			

		}

	}
	
	public function editProperty(){

		//Get data from AJAX
		$propID = $this->input->post('propID');

		$propName = $this->input->post('propTitle');

		$propType = $this->input->post('propType');

		$propDesc = htmlentities($this->input->post('propDesc', ENT_QUOTES));

		$propNote = htmlentities($this->input->post('propNote', ENT_QUOTES));

		$address = $this->input->post('propAddress');

		$country = $this->input->post('country');

		$states = $this->input->post('states');

		$city = $this->input->post('city');

		$price = $this->input->post('monthly-price');

		$security_deposit = $this->input->post('security-deposit');

		$security_deposit_term = $this->input->post('security-deposit-term');

		$featuredPic = $this->input->post('featuredPic');

		$amenities = $this->input->post('amenities');

		$services = $this->input->post('services');
		
		$service_charge = $this->input->post('service-charge');
		
		$service_charge_term = $this->input->post('service-charge-term');

		$bed = $this->input->post('bed-number');

		$bath = $this->input->post('bath-number');

		$toilet = $this->input->post('toilet-number');

		$featuredProp = $this->input->post('featuredProp');
		
		$availableFrom = $this->input->post('availableFrom');
		
		$payment_plan = $this->input->post('payment-plan');
		
		$intervals = $this->input->post('intervals');
		
		$frequency = $this->input->post('frequency');
		
		$status = 'no';

		$furnishing = $this->input->post('furnishing');

		$renting_as = $this->input->post('suitable-for');

		$facilityName = $this->input->post('facility-name');

		$facilityCat = $this->input->post('facility-category');

		$facilityDist = $this->input->post('facility-distance');
		
		$featuredProp = 'no';
		
		$is_city = $this->functions_model->check_city($city, $states);
				
		if(!$is_city){
		    
		    $this->functions_model->insert_city($city, $states);
		    
		}
		
		if($this->input->post('featuredProp')){
			
			$featuredProp = "yes";
				
		}
		
		if($this->input->post('newProp')){
			
			$status = "yes";
				
		}

		if($this->session->has_userdata('adminLoggedIn')){

			$userID = $this->session->userdata('adminID');
			
			$city_id = $this->admin_model->get_city_id($city);

			//Populate the property table

			$property = $this->admin_model->editProperty($propID, $propName, $propType, $propDesc, $propNote, $address, $price, $security_deposit, $service_charge_term, $featuredPic, $amenities, $bed, $bath, $toilet, $userID, $furnishing, $renting_as, $services, $featuredProp, $availableFrom, $status, $intervals, $frequency, $payment_plan, $country, $states, $city, $city_id['id'], $security_deposit_term, $service_charge);  

			if($property && is_array(@$facilityName)){

				$facility_count = count($facilityName);

				for($i = 0; $i < $facility_count; $i++){

					if (!is_dir('./uploads/properties/'.$imageFolder.'/facilities')) {

						mkdir('./uploads/properties/'.$imageFolder.'/facilities', 0777, TRUE);

					}					

					$output = '';

					$config["upload_path"] = './uploads/properties/'.$imageFolder.'/facilities';

					$config["allowed_types"] = 'jpg|jpeg|png';

					$config['max_size'] = '5000';

					$this->load->library('upload', $config);

					$this->upload->initialize($config);

					$_FILES["file"]["name"] = $_FILES["files"]["name"][$i];

					$_FILES["file"]["type"] = $_FILES["files"]["type"][$i];

					$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$i];

					$_FILES["file"]["error"] = $_FILES["files"]["error"][$i];

					$_FILES["file"]["size"] = $_FILES["files"]["size"][$i];

				
					if($this->upload->do_upload('file')){					

						$data = $this->upload->data();

					}
					$this->admin_model->insertFacilities($property, $facilityName[$i], $facilityCat[$i], $facilityDist[$i], $data['file_name']);

				}
				//$facilities = $this->admin_model->insertFacilities($property['id'], $facilityName, $facilityCat, $facilityDist);
				echo 1;
			}elseif($property){
			    
                echo 1;
                
			}else{

				echo "Could not edit property";

			}

		}else{			

			redirect( base_url()."admin/dashboard" ,'refresh');			

		}

	}
	public function editApt(){
		//Get data from AJAX
		
		$id = $this->input->post('aptID');

		$propName = $this->input->post('propTitle');

		$propType = $this->input->post('propType');
		
		$stayType = $this->input->post('stayType');

		$propDesc = htmlentities($this->input->post('propDesc', ENT_QUOTES));

		$policies = htmlentities($this->input->post('policies', ENT_QUOTES));

		$house_rules = htmlentities($this->input->post('house_rules', ENT_QUOTES));

		$address = $this->input->post('propAddress');

		$cost = $this->input->post('cost');

		$security_deposit = $this->input->post('security-deposit');

		$imageFolder = $this->input->post('foldername');

		$featuredPic = $this->input->post('featuredPic');

		$amenities = $this->input->post('amenities');

		$bed = $this->input->post('bed-number');

		$bath = $this->input->post('bath-number');

		$toilet = $this->input->post('toilet-number');

		$guest = $this->input->post('guest-number');
		
		if($this->session->has_userdata('adminLoggedIn')){

			$userID = $this->session->userdata('adminID');

			//Populate the property table

			$property = $this->admin_model->editApartment($id, $propName, $propType, $stayType, $propDesc, $address, $cost, $security_deposit, $imageFolder, $featuredPic, $amenities, $bed, $bath, $toilet, $guest, $policies, $house_rules);

			if($property != 0){

				echo 1;

			}else{

				echo "Could not upload property";

			}

		}else{			

			redirect( base_url()."admin/dashboard" ,'refresh');			

		}

		

	}
	public function all_apartments(){

		$config['total_rows'] = $this->admin_model->countApartments();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/all-apartments';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['apartments'] = $this->admin_model->fetchApartments();			

		}

		if ( ! file_exists(APPPATH.'views/admin/pages/all-apartments.php'))
        {

                // Whoops, we don't have a page for that!
                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Properties :: Stay SmallSmall";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/all-apartments.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			//$this->load->view('admin/templates/furnisure-category-modal.php' , $data);

		}else{
		    
			redirect( base_url().'admin/login','refresh');

		}

	}
	public function all_bookings(){

		$config['total_rows'] = $this->admin_model->countBookings();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/all-bookings';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);
			
			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['apartments'] = $this->admin_model->fetchStayoneBookings();			

		}

		if ( ! file_exists(APPPATH.'views/admin/pages/all-stayone-bookings.php'))
        {

                // Whoops, we don't have a page for that!
                show_404();

        }
		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Bookings :: Stay SmallSmall";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/all-stayone-bookings.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			//$this->load->view('admin/templates/furnisure-category-modal.php' , $data);
	
		}else{
	
			redirect( base_url().'admin/login','refresh');		

		}
	}
	
	public function booking_details($id){
		
		if($this->session->has_userdata('adminLoggedIn')){	
		    
		    $data['details'] = $this->admin_model->fetchBookingDetails($id);

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');
		
			
			$data['title'] = "Booking Details";
			
			$this->load->view('admin/templates/header', $data);
			
			$this->load->view('admin/templates/sidebar', $data);
			
			$this->load->view('admin/pages/booking-details', $data);
			
			$this->load->view('admin/templates/footer', $data);
			
		}else{
			
			redirect( base_url()."admin/login" ,'refresh');
			
		}
	}
	
	public function btl_request_details($id){
		
		if($this->session->has_userdata('adminLoggedIn')){	
		    
		    $data['details'] = $this->admin_model->fetchRequestDetails($id);
		    
		    $data['beneficiaries'] = $this->admin_model->fetchRequestBeneficiaries($id);

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');
		
			
			$data['title'] = "Request Details";
			
			$this->load->view('admin/templates/header', $data);
			
			$this->load->view('admin/templates/sidebar', $data);
			
			$this->load->view('admin/pages/request-details', $data);
			
			$this->load->view('admin/templates/footer', $data);
			
		}else{
			
			redirect( base_url()."admin/login" ,'refresh');
			
		}
	}

	public function upload_furniture(){

		//Get data from AJAX

		$title = $this->input->post('title');

		$category = $this->input->post('category');

		$type = $this->input->post('type');

		$desc = htmlentities($this->input->post('desc', ENT_QUOTES));

		$delivery = htmlentities($this->input->post('delivery', ENT_QUOTES));

		$spec = htmlentities($this->input->post('spec', ENT_QUOTES));

		$payment = htmlentities($this->input->post('payment', ENT_QUOTES));

		$cost = $this->input->post('cost');

		$security_deposit = $this->input->post('securityDep');		

		$imageFolder = $this->input->post('foldername');

		$featuredPic = $this->input->post('featuredPic');

		if($this->session->has_userdata('adminLoggedIn')){

			$userID = $this->session->userdata('adminID');

			//Populate the property table

			$furniture = $this->admin_model->insertFurniture($title, $type, $category, $cost, $security_deposit, $desc, $delivery, $spec, $payment, $imageFolder, $featuredPic);

			if($furniture != 0){

				echo 1;

			}else{

				echo "Could not upload property";

			}
		}else{

			redirect( base_url()."admin/dashboard" ,'refresh');

		}

	}
	
	public function edit_furniture(){

		//Get data from AJAX

		$title = $this->input->post('title');

		$category = $this->input->post('category');

		$type = $this->input->post('type');

		$desc = htmlentities($this->input->post('desc', ENT_QUOTES));

		$delivery = htmlentities($this->input->post('delivery', ENT_QUOTES));

		$spec = htmlentities($this->input->post('spec', ENT_QUOTES));

		$payment = htmlentities($this->input->post('payment', ENT_QUOTES));

		$cost = $this->input->post('cost');

		$security_deposit = $this->input->post('securityDep');		

		$imageFolder = $this->input->post('foldername');

		$featuredPic = $this->input->post('featuredPic');

		$app_id = $this->input->post('app_id');

		if($this->session->has_userdata('adminLoggedIn')){

			$userID = $this->session->userdata('adminID');

			//Populate the property table

			$furniture = $this->admin_model->updateFurniture($title, $type, $category, $cost, $security_deposit, $desc, $delivery, $spec, $payment, $imageFolder, $featuredPic, $app_id);
			
			if($furniture != 0){

				echo 1;

			}else{

				echo "Could not upload property";
				
			}

		}else{
		    
			redirect( base_url()."admin/dashboard" ,'refresh');

		}

	}

	public function uploadImages($folder){			

		if(!$folder){			

			$folder = md5(date("Ymd His"));			

		}		

		sleep(3);		

		if (!is_dir('./uploads/properties/'.$folder)) {

			mkdir('./uploads/properties/'.$folder, 0777, TRUE);

		}		

		if($_FILES["files"]["name"] != ''){
			

			$output = '';
			
			$error = 0;

			$config["upload_path"] = './uploads/properties/'.$folder;

			$config["allowed_types"] = 'jpg|jpeg|png';

			$config['encrypt_name'] = TRUE;

			$config['max_size'] = 10 * 1024;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);
			

			for($count = 0; $count<count($_FILES["files"]["name"]); $count++){
				

				$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];

				$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];

				$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];

				$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];

				$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
				

				if($this->upload->do_upload('file')){				

					$data = $this->upload->data();	
					
					

					$output .= '
								<span class="imgCover removal-id-'.$count.'" id="id-'.$data["file_name"].'"><img src="'.base_url().'uploads/properties/'.$folder.'/'.$data["file_name"].'" id="'.$data["file_name"].'" class="upldImg img-responsive img-thumbnail" onclick="selectFeatured(this.id)" title="Click to select as featured image" />
								<div class="remove-img img-removal" id="img-properties-'.$data['file_name'].'-'.$count.'">remove <i class="fa fa-trash"></i></div>
								<!--<span class="featTT">featured</span>--></span>';
				}else{
					$error = $this->upload->display_errors('', '');
				}			

			}
			//echo $output;

			echo json_encode(array('pictures' => $output, 'folder' => $folder, 'error' => $error));		

		}		

	}

	public function uploadFurnisureImages($folder){

		if(!$folder){

			$folder = md5(date("Ymd His"));

		}
		
		sleep(3);

		if (!is_dir('./uploads/furnisure/'.$folder)) {

			mkdir('./uploads/furnisure/'.$folder, 0777, TRUE);

		}

		if($_FILES["files"]["name"] != ''){
		    
			$output = '';
			
			$error = 0;

			$config["upload_path"] = './uploads/furnisure/'.$folder;

			$config["allowed_types"] = 'jpg|jpeg|png';

			$config['encrypt_name'] = TRUE;

			$config['max_size'] = 10 * 1024;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			for($count = 0; $count < count($_FILES["files"]["name"]); $count++){

				$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];

				$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];

				$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];

				$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];

				$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];

				if($this->upload->do_upload('file')){

					$data = $this->upload->data();

					$output .= '
								<span class="imgCover removal-id-'.$count.'" id="id-'.$data["file_name"].'"><img src="'.base_url().'uploads/furnisure/'.$folder.'/'.$data["file_name"].'" id="'.$data["file_name"].'" class="upldImg img-responsive img-thumbnail" onclick="selectFeatured(this.id)" title="Click to select as featured image" />
								<div class="remove-img img-removal" id="img-furnisure-'.$data['file_name'].'-'.$count.'">remove <i class="fa fa-trash"></i></div>
								<!--<span class="featTT">featured</span>--></span>';

				}else{
					$error = $this->upload->display_errors('', '');
				}			

			}
			//echo $output;

			echo json_encode(array('pictures' => $output, 'folder' => $folder, 'error' => $error));

		}		

	}

	public function addNews(){

	    $file_element_name = 'userfile';

        $title = $this->input->post('title');

        $content = htmlentities($this->input->post('content', ENT_QUOTES));

        $credit = $this->input->post('credit');

		$slug = url_title($title, 'dash', true);

		$status = "";

		$userID = $this->session->userdata('adminID');

        if (!is_dir('./uploads/news/'.$slug)) {

			mkdir('./uploads/news/'.$slug, 0777, TRUE);

		}

		$config['upload_path'] = './uploads/news/'.$slug;

		$config['allowed_types'] = 'jpg|png|jpeg';

		$config['max_size'] = 1024 * 8;

		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);


		if (!$this->upload->do_upload($file_element_name)){

			$status = 'error';

			$msg = $this->upload->display_errors('', '');

		}else{

			$data = $this->upload->data();
            //($data['file_name'], $category, $parent, $slug);

			if($data){

			    $folder = "uploads/news/".$slug;

			    $res = $this->admin_model->insertNews($title, $content, $credit, $slug, $data['file_name'], $userID);

                if($res){

                    $status = "success";
                    
				    $msg = "Successfully Uploaded"; 

                }else{

                    unlink($data['full_path']);

                    $status = "error";

				    $msg = "Error inserting article";

                }

			}else{

				unlink($data['full_path']);

				$status = "error";

				$msg = "Something went wrong when saving the file, please try again.";

			}

		}

		@unlink($_FILES[$file_element_name]);

	    echo json_encode(array('status' => $status, 'msg' => $msg));

	}
	public function editNews(){

	    $file_element_name = 'userfile';

        $title = $this->input->post('title');

        $content = htmlentities($this->input->post('content', ENT_QUOTES));

        $credit = $this->input->post('credit');

        $articleID = $this->input->post('articleID');

        $featImg = $this->input->post('featImg');

        $folder = $this->input->post('folder');
        
        $data = array();

		$slug = url_title($title, 'dash', true);

		$status = "";

		$userID = $this->session->userdata('adminID');

        if (!is_dir('./uploads/news/'.$folder)) {

			mkdir('./uploads/news/'.$folder, 0777, TRUE);

		}

		$config['upload_path'] = './uploads/news/'.$folder;



		$config['allowed_types'] = 'jpg|png|jpeg';

		$config['max_size'] = 1024 * 20;

		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($file_element_name)){

			$data['file_name'] = $featImg;

		}else{

			$data = $this->upload->data();
		}
			

		if($data){

		    $folder = "uploads/news/".$folder;

		    $res = $this->admin_model->editNews($title, $content, $folder, $data['file_name'], $articleID);

            if($res){

                $status = "success";

			    $msg = "Successfully Uploaded";

            }else{

                $status = "error";

			    $msg = "Error inserting article";

            }

		}else{

			$status = "error";

			$msg = "Something went wrong when saving the file, please try again.";

		}

		@unlink($_FILES[$file_element_name]);

	    echo json_encode(array('status' => $status, 'msg' => $msg));

	}
	
	

	public function get_userDetails($user_id){

		$profile = $this->functions_model->get_user_details($user_id);

		return $profile;

	}

	public function get_propDetails($prop_id){

		$property = $this->functions_model->get_prop_details($prop_id);

		return $property;

	}
	
	public function view_properties(){

		$config['total_rows'] = $this->admin_model->countProperties();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/view-properties';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['properties'] = $this->admin_model->fetchProperties();

		}

		if ( ! file_exists(APPPATH.'views/admin/pages/view-properties.php'))
        {

                // Whoops, we don't have a page for that!

                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){
			

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');
			

			$data['title'] = "Properties :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/view-properties.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			//$this->load->view('admin/templates/furnisure-category-modal.php' , $data);
		

		}else{
			

			redirect( base_url().'admin/login','refresh');		

			

		}

	}
	
	public function property_alert_list(){
		

		$config['total_rows'] = $this->admin_model->countPropertyAlert();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/property-alerts';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['properties'] = $this->admin_model->fetchPropertyAlert();	


		}

		if ( ! file_exists(APPPATH.'views/admin/pages/property-alerts.php'))
        {

                // Whoops, we don't have a page for that!
                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Property Alert List :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/property-alerts.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

		}else{

			redirect( base_url().'admin/login','refresh');
		}

	}
	
	public function all_buytolet_properties(){

		$config['total_rows'] = $this->admin_model->countBuytoletProperties();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/all-buytolet-properties';

			if (empty($page_number))

				$page_number = 1;
				
			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['properties'] = $this->admin_model->fetchBuytoletProperties();

		}

		if ( ! file_exists(APPPATH.'views/admin/pages/btl-properties.php'))
        {

                // Whoops, we don't have a page for that!

                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Properties :: Buytolet";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/btl-properties.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			//$this->load->view('admin/templates/furnisure-category-modal.php' , $data);

		}else{
		    
			redirect( base_url().'admin/login','refresh');	

		}

	}
	public function switchProperty(){
	    
	    $verificationID = $this->input->post('verificationID');
	    
	    $user_id = $this->input->post('userID');
	    
	    $propertyID = $this->input->post('propertyID');
	    
	    $bookingID = $this->input->post('bookingID');
	    
	    $newPropertyID = $this->input->post('newPropertyID');
	    
	    $paymentPlan = $this->input->post('paymentPlan');
	    
	    $securityDeposit = $this->input->post('securityDeposit');
	    
	    $period_paid = $this->input->post('period_paid');
	    
	    $duration = 12;
	    
	    $booked_as = $this->input->post('renting_as');
	    
	    $newBookingId = $this->random_strings(5);
	    
	    $move_in_date = date('Y-m-d', strtotime($this->input->post('move_in_date')));
	    
	    $payment_type = "Transfer";
	    
	    $ref = 'rss_'.md5(rand(1000000, 9999999999));
	    
	    //Get Property
	    $prop_response = $this->rss_model->get_vacant_property($newPropertyID);
	  
	    if(!$prop_response){
	        
	        $exists = $this->rss_model->get_existing_property($newPropertyID);
	        
	        if($exists){
	        
    	        $total_cost = $securityDeposit + ($exists['price'] * $period_paid);
    	        
    	        //Insert booking and insert new date for property
    	        $response = $this->rss_model->insertBooking($newBookingId, $verificationID, $user_id, $newPropertyID, '', $paymentPlan, $exists['price'], '', '', $securityDeposit, $duration, $booked_as, $move_in_date, $payment_type, $total_cost, $ref,'','','','');
    	        
    	        //Update previous booking
    	        $booking_response = $this->admin_model->update_booking($bookingID, $move_in_date);
    	        
    	        //Get User Details
    	        $user = $this->admin_model->get_user($user_id);
    	        
    	        //update new property
    	        $this->rss_model->update_available_date($newPropertyID, $move_in_date);
    	        
    	        $this->rss_model->update_available_date($propertyID, '');
    	        
    	        if($response){
    	            
    	           //Send email to user
        	        $data['name'] = $user['firstName'].' '.$user['lastName'];
        					
        			$data['email'] = $user['email'];
        			
        			$data['phone'] = $user['phone'];
        			
        			$data['propName'] = $exists['propertyTitle'];
        			
        			$data['propAddress'] = $exists['address'];
        			
        			$data['amount'] = $exists['price'];
        			
        			$data['paymentOption'] = $payment_type;
        			
        			$data['duration'] = $duration;
        			
        			$data['paymentPlan'] = $paymentPlan;
        			
                    $this->email->from('noreply@rentsmallsmall.com', 'Automated');
        
        			$this->email->to('customerexperience@rentsmallsmall.com');      
        
        			$this->email->subject("Property Booked");   
        			
        			$this->email->set_mailtype("html");         
        
        			$message = $this->load->view('email/header.php', $data, TRUE);  
        
        			$message .= $this->load->view('email/apt-booking-email.php', $data, TRUE);            
        
        			$message .= $this->load->view('email/footer.php', $data, TRUE); 
        
        			$this->email->message($message);            
        
        			$emailRes = $this->email->send(); 
    	        }
	        }else{
	            
	            echo "Property does not exist";
	            
	        }
	    }else{
	        
	        echo "Property is rented";
	        
	    }
	    
	}
	public function changeBookingStatus(){
	    
	    $reason = $this->input->post("reason");
	    
	    $status_note = $this->input->post("status_note");
	    
	    $booking_id = $this->input->post("booking_id");
	    
	    $user_id = $this->input->post("user_id");
	    
	    $move_out_date = $this->input->post("move_out_date");
	    
	    $response = $this->admin_model->update_booking($reason, $status_note, $booking_id, $user_id, $move_out_date);
	    
	    if($response){
	        
	        echo 1;
	        
	    }else{
	        
	        echo 0;
	        
	    }
	}
	public function insertNewBooking(){
	    
	    $verificationID = $this->input->post('verificationID');
	    
	    $user_id = $this->input->post('userID'); 
	    
	    $productID = $this->input->post('propID');
	    
	    $paymentPlan = $this->input->post('paymentPlan'); 
	    
	    $duration = $this->input->post('duration');
	    
	    $booked_as = $this->input->post('booked_as');
	    
	    $move_in_date = $this->input->post('move_in_date');
	    
	    $response = $this->admin_model->insertNewBooking($verificationID, $user_id, $productID, $paymentPlan, $duration, $booked_as, $move_in_date);
	    
	    if($response){
	        echo 1;
	    }else{
	        echo 0;
	    }
    	
    }
	public function changeStayoneBookingStatus(){
	    
	    $status = 0;
	    
	    $bookingID = $this->input->post('bookingID');
	    
	    $action = $this->input->post('action');
	    
	    $invoiceID = strtoupper($this->random_strings(8));
	    
	    $the_file_name = $invoiceID.'_invoice.pdf';
	    
	    if($action == 'lock'){
	        
	        $status = 1;
	        
	    }
	    
	    $transaction = $this->admin_model->getStayoneTransaction($bookingID);
	    
	    $result = $this->admin_model->changeStayoneBookingStatus($bookingID, $status);
	    
	    if($result){
	        
	        if(!empty($transaction)){
	            
	            if($this->admin_model->updateStayonePaymentStatus($bookingID, 'Approved')){
	                
	                $details = $this->admin_model->getStayoneBookingDetails($bookingID);
	                
	                $name = $details['firstname'].' '.$details['lastname'];
	                
	                $user_address = $details['booking_address'].', '.$details['booking_city'];
	                
	                $apt_address = $details['apt_address'].', '.$details['apt_city'];
	                
	                //Generate PDF here
		            $pdf_content = $this->prep_invoice($invoiceID, $bookingID, $details['email'], $details['phone'], $name, $user_address, $details['apartmentName'], $apt_address, $details['no_of_nights'], $details['cost'], $details['securityDeposit'], $details['amount'], $details['discount'], $details['vat'], $details['pickup_option'], $details['pickup_cost']);
		            
		            if (!is_dir('uploads/invoice/'.$invoiceID)) {
		    
                        mkdir('./uploads/invoice/'.$invoiceID, 0777, TRUE);
                    
                    }
                    
                    //Set folder to save PDF to
                    $this->html2pdf->folder('./uploads/invoice/'.$invoiceID.'/');
                    
                    //Set the filename to save/download as
                    $this->html2pdf->filename($the_file_name);
                    
                    //Set the paper defaults
                    $this->html2pdf->paper('a4', 'portrait');
                    
                    //Load html view
                    $this->html2pdf->html($pdf_content); 
            		 
                    //Create the PDF
                    $path = $this->html2pdf->create('save');
        		    
        		    
        		    $data['name'] = $details['firstName'].' '.$details['lastName'];
        		    
        		    $data['aptName'] = $details['apartmentName'];
        		    
        		    $data['aptID'] = $details['apartmentID'];
        		    
        			//Send email to customer and cx
        			
			        $notify = $this->functions_model->insert_user_notifications('Payment Approval', 'Your payment has been successfully approved.', $details['userID'], 'Stay');
        			
        			$this->email->from('noreply@smallsmall.com', 'Small Small');
        
        			$this->email->to($details['email']);            
        
        			$this->email->subject("Payment Approval");   
        			
        			$this->email->set_mailtype("html");         
        
        			$message = $this->load->view('email/header.php', $data, TRUE);            
        
        			$message .= $this->load->view('email/payment-approval-email.php', $data, TRUE);            
        
        			$message .= $this->load->view('email/footer.php', $data, TRUE);     
        
        			$this->email->message($message); 
        			
        			$inv_update = $this->admin_model->updateStayoneInvoice($bookingID, $the_file_name);
        			
        			if($path || !$inv_update){
            			
            		    $this->email->attach($path);
            		    
            		}else{
            		    
            		    echo "Could not attach invoice/update invoice in table";
            		    
            		}
            		
            		if($this->email->send()){
            		    
            		    echo 1;
            		    
            		}else{
            		    
            		    echo "Email not sent";
            		    
            		}
	            }else{
	                
	                echo "Payment status update error";
	                
	            }
	            
	        }else{
	            
	            echo "Empty transaction dataset";
	            
	        }
	        
	    }else{
	        
	        echo "Booking status change failed";
	        
	    }
	}
	
	public function changeStatus(){
		
		$action = $this->input->post('action');

		$details = $this->input->post('details');
		
		if(is_array($details)){
			
			$det_len = count($details);
			
			for($i = 0; $i < $det_len; $i++){
				
				if($action == 'delete'){
				
					$res = $this->admin_model->del_user($details[$i]['id']);

				}else if($action == 'activate'){

					$res = $this->admin_model->activate_user($details[$i]['id']);

				}else if($action == 'deactivate'){

					$res = $this->admin_model->deactivate_user($details[$i]['id']);

				}else if($action == 'verify'){

					$res = $this->admin_model->verify_user($details[$i]['id']);

				}
			 
			}
		}
		echo 1;
	}
	
	public function changePropStatus(){
		
		$action = $this->input->post('action');

		$details = $this->input->post('details');
		
		if(is_array($details)){
			
			$det_len = count($details);
			
			for($i = 0; $i < $det_len; $i++){
				
				if($action == 'delete'){
				
					$res = $this->admin_model->del_property($details[$i]['id']);

				}else if($action == 'release'){

					$res = $this->admin_model->release_property($details[$i]['id']);

				}
			 
			}
		}
		echo 1;
	}
	
	public function getInspMsg(){
		
		$status = "error";
		
		$request_id = $this->input->post('id');
		
		$msgID = $this->input->post('msgID');
		
		$res = $this->admin_model->getReqMsg($request_id, $msgID); 
		
		if($res){
			
			$status = "success";
			
		}
		 
		$this->admin_model->setMsgStatus($res['msgID']);
		
		echo json_encode(array('status' => $status, 'userID' => $res['user_id'], 'msgID' => $res['inspectionID'], 'content' => $res['content'], 'inspectionDate' => date('d F Y', strtotime($res['inspectionDate'])), 'inspectionType' => $res['inspectionType'], 'firstname' => $res['firstName'], 'lastname' => $res['lastName'] )); 
				
	}
	
	public function replyInspMsg(){
		
		$msgID = $this->input->post("msg_id");
		
		$userID = $this->input->post("user_id");
		
		$message = $this->input->post('reply_msg');
		
		$adminID = $this->session->userdata('adminID');
		
		$user = $this->rss_model->getUser($userID);
		
		$res = $this->admin_model->replyInspectionMessage($msgID, $userID, $message, $adminID);
		
		if($res){
		    
		    //Split name
			$names = $user['firstName'].' '.$user['lastName'];
			
			$data['name'] = $names;
			
			$data['message'] = $message;
			
			$this->email->from('donotreply@smallsmall.com', 'Small Small');

			$this->email->to($user['email']);

			$this->email->subject("RE: Inspection Request");

			$this->email->set_mailtype("html");

			$message = $this->load->view('email/header.php', $data, TRUE);

			$message .= $this->load->view('email/newmessage.php', $data, TRUE);

			$message .= $this->load->view('email/footer.php', $data, TRUE);

			$this->email->message($message);
			
			$notify = $this->functions_model->insert_user_notifications('RE: Inspection Request', 'You have a message waiting for you in your inbox. Thank you.', $user['userID'], 'Rent');

			if($emailRes = $this->email->send()){
				
				$data['msg'] = $message;
				
				$this->email->to('fieldagent@smallsmall.com');
				
				$this->email->set_mailtype("html");
				
				$message = $this->load->view('email/header.php', $data, TRUE);
				
				$message .= $this->load->view('email/fx-inspection-message.php', $data, TRUE);

				$message .= $this->load->view('email/footer.php', $data, TRUE);
				
				$this->email->message($message);
				
				echo 1;
			}
			
		}else{
		
			echo 0;
			
		}
	
	}
	
	public function transactions($the_page){	
		
		
		$config['total_rows'] = $this->admin_model->countTransactions($the_page);		

		$data['total_count'] = $config['total_rows'];		

		$config['suffix'] = '';  

		if ($config['total_rows'] > 0) {


			$page_number = $this->uri->segment(4);
			

			$config['base_url'] = base_url() . 'admin/transactions/'.$the_page;

			if (empty($page_number))

				$page_number = 1;
				
			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['bookings'] = $this->admin_model->fetchTransactions($the_page);

		}
		
		if ( ! file_exists(APPPATH.'views/admin/pages/'.$the_page.'-transactions.php'))
        {
                // Whoops, we don't have a page for that!

                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Transactions :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/'.$the_page.'-transactions.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			$this->load->view('admin/templates/booking-modal.php' , $data);		

		}else{			
 
			redirect( base_url().'admin/login','refresh');				

		}

	}
	public function wallet_accounts(){
		
		$config['total_rows'] = $this->admin_model->countWalletAccounts();		

		$data['total_count'] = $config['total_rows'];		

		$config['suffix'] = '';  

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/wallet-accounts';

			if (empty($page_number))

				$page_number = 1;
				
			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['accounts'] = $this->admin_model->fetchWalletAccounts();

		}
		
		if ( ! file_exists(APPPATH.'views/admin/pages/wallet-accounts.php'))
        {
                // Whoops, we don't have a page for that!

                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Wallets :: SS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/wallet-accounts' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			//$this->load->view('admin/templates/booking-modal.php' , $data);		

		}else{			
 
			redirect( base_url().'admin/login','refresh');				

		}

	}
	
	public function search_accounts(){
	    
	    $s_data['s_query']  = $this->input->post('search-input');
		
		if ($s_data['s_query'] === null ) $s_data = $this->session->userdata('search');
		
		else $this->session->set_userdata('search', $s_data);
		
		$config['total_rows'] = $this->admin_model->countWalletAccountsSearch($s_data);		

		$data['total_count'] = $config['total_rows'];		

		$config['suffix'] = '';  

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/search-accounts';

			if (empty($page_number))

				$page_number = 1;
				
			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['accounts'] = $this->admin_model->searchWalletAccounts($s_data);

		}
		
		if ( ! file_exists(APPPATH.'views/admin/pages/wallet-accounts.php'))
        {
                // Whoops, we don't have a page for that!

                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');

			$data['title'] = "Wallets :: SS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/wallet-accounts' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			//$this->load->view('admin/templates/booking-modal.php' , $data);		

		}else{			
 
			redirect( base_url().'admin/login','refresh');				

		}

	}

	public function wallet_transactions($userID){
		
		$config['total_rows'] = $this->admin_model->countUserWalletAccounts($userID);		

		$data['total_count'] = $config['total_rows'];		

		$config['suffix'] = '';  

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(4);

			$config['base_url'] = base_url() . 'admin/wallet/'.$userID;

			if (empty($page_number))

				$page_number = 1;
				
			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['transactions'] = $this->admin_model->fetchUserWalletAccounts($userID);

		}
		
		if ( ! file_exists(APPPATH.'views/admin/pages/wallet-transactions.php'))
        {
                // Whoops, we don't have a page for that!

                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Transactions :: SS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/wallet-transactions' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			//$this->load->view('admin/templates/booking-modal.php' , $data);		

		}else{			
 
			redirect( base_url().'admin/login','refresh');				

		}

	}
	public function app_transactions(){	
		
		
		$config['total_rows'] = $this->admin_model->countAppTransactions();		

		$data['total_count'] = $config['total_rows'];		

		$config['suffix'] = '';  

		if ($config['total_rows'] > 0) {


			$page_number = $this->uri->segment(4);
			

			$config['base_url'] = base_url() . 'admin/app-transactions';

			if (empty($page_number))

				$page_number = 1;
				
			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['txns'] = $this->admin_model->fetchAppTransactions();

		}
		
		if ( ! file_exists(APPPATH.'views/admin/pages/app-transactions.php'))
        {
                // Whoops, we don't have a page for that!

                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');


			$data['title'] = "Transactions :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/app-transactions.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);	

		}else{			
 
			redirect( base_url().'admin/login','refresh');				

		}

	}
	
	public function uploadBuytoletImages($folder){
				
		if(!$folder){
			
			$folder = md5(date("Ymd His"));
			
		}
		
		//sleep(3);
		
		if (!is_dir('../buy.smallsmall.com/uploads/buytolet/'.$folder)) {

			mkdir('../buy.smallsmall.com/uploads/buytolet/'.$folder, 0777, TRUE);
			
		}
		//Connect to buy2let and create property Image folder
		//$success = file_get_contents("https://buy.smallsmall.com/create-folder/".$folder);
		
		//if(!$success){
			//Create the floor plan folder
			//file_get_contents("https://www.buy2let.ng/create-folder/".$folder."/floor-plan");
			//$error = "Could not create remote folder";
			
		//}		
		
		if($_FILES["files"]["name"] != ''){
			
			$output = '';
			
			$error = 0;
			
			$config["upload_path"] = '../buy.smallsmall.com/uploads/buytolet/'.$folder;
			
			$config["allowed_types"] = 'jpg|jpeg|png';

			$config['encrypt_name'] = TRUE;
			
			$config['max_size'] = 10 * 1024;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);
			
			for($count = 0; $count < count($_FILES["files"]["name"]); $count++){
				
				$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
				
				$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
				
				$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
				
				$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
				
				$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
				
				//$this->upload->do_upload('file');
				
				//$data = $this->upload->data();
				
				if($this->upload->do_upload('file')){
				
    				//$site1FileMd5 = md5_file('./tmp/'.$data["file_name"]);
    				
    				//$upl_result = file_get_contents('https://buy.smallsmall.com/upload-images/'.$data["file_name"].'/'.$site1FileMd5.'/'.$folder);
    				
    				//if($upl_result){
					
					$data = $this->upload->data();
					
					$output .= '
								<span class="imgCover removal-id-'.$count.'" id="id-'.$data["file_name"].'"><img src="https://buy.smallsmall.com/uploads/buytolet/'.$folder.'/'.$data["file_name"].'" id="'.$data["file_name"].'" class="upldImg img-responsive img-thumbnail" onclick="selectFeatured(this.id)" title="Click to select as featured image" />
								<div class="remove-btl-img img-removal" id="img-buytolet-'.$data['file_name'].'-'.$count.'">remove <i class="fa fa-trash"></i></div>
								<!--<span class="featTT">featured</span>--></span>';
				}else{
				    
					$error = $this->upload->display_errors('', '');
					
				}			

			}

			echo json_encode(array('pictures' => $output, 'folder' => $folder, 'error' => $error));	
			
		}		
	}
	public function uploadBuytoletProperty(){
		//Get data from AJAX
		$propName = $this->input->post('propTitle');
		$propType = $this->input->post('propType');
		$propDesc = htmlentities($this->input->post('propDesc', ENT_QUOTES));
		$locationInfo = htmlentities($this->input->post('locationInfo', ENT_QUOTES));
		$address = $this->input->post('propAddress');
		$city = $this->input->post('city');
		$state = $this->input->post('state');
		$country = $this->input->post('country');
		$tenantable = $this->input->post('tenantable');
		$asset_appreciation_1 = $this->input->post('asset_appreciation_1');
		$asset_appreciation_2 = $this->input->post('asset_appreciation_2');
		$asset_appreciation_3 = $this->input->post('asset_appreciation_3');
		$asset_appreciation_4 = $this->input->post('asset_appreciation_4');
		$asset_appreciation_5 = $this->input->post('asset_appreciation_5');
		$price = $this->input->post('price');
		$marketValue = $this->input->post("marketValue");
		$outrightDiscount = $this->input->post("outrightDiscount");
		$promo_price = $this->input->post('promo_price');
		$promo_category = $this->input->post('promo_category');
		$expected_rent = $this->input->post('expected_rent');
		$bed = $this->input->post('bed');
		$bath = $this->input->post('bath');
		$toilet = $this->input->post('toilet');
		$hpi = $this->input->post('hpi');
		$payment_plan = $this->input->post('payment_plan');
		$payment_plan_period = $this->input->post('payment_plan_period');
		$min_pp_val = $this->input->post('min_pp_val');
		$mortgage = $this->input->post('mortgage');
		$propertySize = $this->input->post('propertySize');
		$investmentType = $this->input->post('investmentType');
		$imageFolder = $this->input->post('imageFolder');
		$featuredPic = $this->input->post('featuredPic');
		$pool_buy = $this->input->post('pool_buy');
		$pooling_units = $this->input->post('pooling_units');
		$floor_level = $this->input->post('floor_level');
		$construction_lvl = $this->input->post('construction_lvl');
		$start_date = date('Y-m-d', strtotime($this->input->post('start_date')));
		$finish_date = date('Y-m-d', strtotime($this->input->post('finish_date')));
		$maturity_date = date('Y-m-d', strtotime($this->input->post('maturity_date')));
		$closing_date = date('Y-m-d', strtotime($this->input->post('closing_date')));
		$hold_period = $this->input->post('hold_period');
		$co_appr = explode(',', $this->input->post('co_appr'));
		$co_rent = explode(',', $this->input->post('co_rent'));
		$status = "";
		
		
		if($this->session->has_userdata('adminLoggedIn')){
			
			$userID = $this->session->userdata('adminID');
			$file_element_name = 'plan-image';
			
			//Check if upload folder exists
			if (!is_dir('./tmp/')) {

				mkdir('./tmp/', 0777, TRUE);

			}
			
			
			$config['upload_path'] = './tmp/';

			$config['allowed_types'] = 'jpg|png|jpeg';

			$config['max_size'] = 1024 * 10;

			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload($file_element_name)){

				$status = 'error';

				$msg = $this->upload->display_errors('', '');

			}else{

				$data = $this->upload->data();	
				
				$folder = 
				
				$site1FileMd5 = md5_file('./tmp/'.$data["file_name"]);
				
				$upl_result = file_get_contents('https://buy.smallsmall.com/upload-fp-image/'.$data["file_name"].'/'.$site1FileMd5.'/'.$imageFolder."/floor-plan/");
				
				unlink('./tmp/'.$data["file_name"]);
				
				//Populate the property table
				$property = $this->admin_model->insertBuytoletProperty($propName, $propType, $propDesc, $locationInfo, $address, $city, $state, $country, $tenantable, $price, $expected_rent, $imageFolder, $featuredPic, $bed, $toilet, $bath, $hpi, $userID, 'New', $propertySize, $data['file_name'], $mortgage, $payment_plan, $payment_plan_period, $min_pp_val, $pooling_units, $pool_buy, $promo_price, $promo_category, $asset_appreciation_1, $asset_appreciation_2, $asset_appreciation_3, $asset_appreciation_4, $asset_appreciation_5, $investmentType, $marketValue, $outrightDiscount, $floor_level, $construction_lvl, $start_date, $finish_date, $co_appr, $co_rent, $maturity_date, $closing_date, $hold_period);
				 
				if($property != 0){					

					$status = "success";
					
					$msg = "Property successfully uploaded";

				}else{
					$status = "error";

					$msg = "Could not upload property";

				}
			}
			
		}else{
			
			redirect( base_url()."admin/dashboard" ,'refresh');
			
		}
		
		@unlink($_FILES[$file_element_name]);


		echo json_encode(array('status' => $status, 'msg' => $msg));
		
	}
	
	public function editBuytoletProperty(){
		//Get data from AJAX
		$propID = $this->input->post('propID');
		$propName = $this->input->post('propTitle');
		$propType = $this->input->post('propType');
		$propDesc = htmlentities($this->input->post('propDesc', ENT_QUOTES));
		$locationInfo = htmlentities($this->input->post('locationInfo', ENT_QUOTES));
		$address = $this->input->post('propAddress');
		$city = $this->input->post('city');
		$state = $this->input->post('state');
		$country = $this->input->post('country');
		$asset_appreciation_1 = $this->input->post('asset_appreciation_1');
		$asset_appreciation_2 = $this->input->post('asset_appreciation_2');
		$asset_appreciation_3 = $this->input->post('asset_appreciation_3');
		$asset_appreciation_4 = $this->input->post('asset_appreciation_4');
		$asset_appreciation_5 = $this->input->post('asset_appreciation_5');
		$tenantable = $this->input->post('tenantable');
		$price = $this->input->post('price');
		$marketValue = $this->input->post('marketValue');
		$outrightDiscount = $this->input->post("outrightDiscount");
		$promo_price = $this->input->post('promo_price');
		$promo_category = $this->input->post('promo_category');
		$expected_rent = $this->input->post('expected_rent');
		$bed = $this->input->post('bed');
		$toilet = $this->input->post('toilet');
		$bath = $this->input->post('bath');
		$payment_plan = $this->input->post('payment_plan');
		$payment_plan_period = $this->input->post('payment_plan_period');
		$min_pp_val = $this->input->post('min_pp_val');
		$mortgage = $this->input->post('mortgage');
		$propertySize = $this->input->post('propertySize');
		$pool_buy = $this->input->post('pool_buy');
		$pooling_units = $this->input->post('pooling_units');
		$available_units = $this->input->post('available_units');
		$imageFolder = $this->input->post('imageFolder');
		$featuredPic = $this->input->post('featuredPic');
		$investmentType = $this->input->post('investmentType');
		$floor_level = $this->input->post('floor_level');
		$construction_lvl = $this->input->post('construction_lvl');
		$start_date = date('Y-m-d', strtotime($this->input->post('start_date')));
		$finish_date = date('Y-m-d', strtotime($this->input->post('finish_date')));
		$maturity_date = date('Y-m-d', strtotime($this->input->post('maturity_date')));
		$closing_date = date('Y-m-d', strtotime($this->input->post('closing_date')));
		$hold_period = $this->input->post('hold_period');
		$co_appr = explode(',', $this->input->post('co_appr'));
		$co_rent = explode(',', $this->input->post('co_rent'));
		$status = "";
		
		
		if($this->session->has_userdata('adminLoggedIn')){
			
			$userID = $this->session->userdata('adminID');
			
			$file_element_name = 'plan-image';
			
			/*if($_FILES[$file_element_name]['name']){
				print_r($_FILES[$file_element_name]['name']);
			}else{
				echo "Nothing in here brody!";
			}*/		
			
			
			if($_FILES[$file_element_name]['name']){
				
			
			
				$config['upload_path'] = './uploads/buytolet/'.$imageFolder.'/floor-plan/';

				$config['allowed_types'] = 'jpg|png|jpeg';

				$config['max_size'] = 1024 * 10;

				$config['encrypt_name'] = FALSE;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload($file_element_name)){

					$status = 'error';

					$msg = $this->upload->display_errors('', '');

				}else{

					$data = $this->upload->data();				


					$site1FileMd5 = md5_file('./tmp/'.$data["file_name"]);

					$upl_result = file_get_contents('https://buy.smallsmall.com/upload-images/'.$data["file_name"].'/'.$site1FileMd5.'/'.$imageFolder."/floor-plan");

					unlink('./tmp/'.$data["file_name"]);

					//Populate the property table
					$property = $this->admin_model->editBuytoletProperty($propName, $propType, $propDesc, $locationInfo, $address, $city, $state, $country, $tenantable, $price, $expected_rent, $imageFolder, $featuredPic, $bed, $toilet, $bath, $propertySize, $data['file_name'], $mortgage, $payment_plan, $payment_plan_period, $propID, $min_pp_val, $promo_price, $promo_category, $pool_buy, $pooling_units, $asset_appreciation_1, $asset_appreciation_2, $asset_appreciation_3, $asset_appreciation_4, $asset_appreciation_5, $investmentType, $userID, $marketValue, $outrightDiscount, $floor_level, $construction_lvl, $start_date, $finish_date, $co_appr, $co_rent, $available_units, $maturity_date, $closing_date, $hold_period);

					if($property != 0){					

						$status = "success";

						$msg = "Property successfully uploaded";

					}else{
						$status = "error";

						$msg = "Could not upload property";

					}
				}
			}else{
				$property = $this->admin_model->editBuytoletProperty($propName, $propType, $propDesc, $locationInfo, $address, $city, $state, $country, $tenantable, $price, $expected_rent, $imageFolder, $featuredPic, $bed, $toilet, $bath, $propertySize, 'no', $mortgage, $payment_plan, $payment_plan_period, $propID, $min_pp_val, $promo_price, $promo_category, $pool_buy, $pooling_units, $asset_appreciation_1, $asset_appreciation_2, $asset_appreciation_3, $asset_appreciation_4, $asset_appreciation_5, $investmentType, $userID, $marketValue, $outrightDiscount, $floor_level, $construction_lvl, $start_date, $finish_date, $co_appr, $co_rent, $available_units, $maturity_date, $closing_date, $hold_period);

				if($property != 0){					

					$status = "success";

					$msg = "Property successfully uploaded";

				}else{
					$status = "error";

					$msg = "Could not upload property";

				}
			}
			
		}else{
			
			redirect( base_url()."admin/dashboard" ,'refresh');
			
		}
		
		@unlink($_FILES[$file_element_name]);


		echo json_encode(array('status' => $status, 'msg' => $msg));
		
	}
	
	public function updateAbout(){
		
		$title = $this->input->post('title');
		
		$content = htmlentities($this->input->post('content', ENT_QUOTES));
		
		$id = $this->input->post('id');
		
		$story_one = htmlentities($this->input->post('story_one', ENT_QUOTES));
		
		$story_two = htmlentities($this->input->post('story_two', ENT_QUOTES));
		
		$res = $this->admin_model->update_about($title, $content, $id, $story_one, $story_two);
		
		if($res){
			
			echo 1;
			
		}else{
			
			echo 0;
			
		}
	}
	
	public function updateBuytoletAbout(){
		
		$what_we_do = htmlentities($this->input->post('what_we_do', ENT_QUOTES));
		
		$id = $this->input->post('id');
		
		$story = htmlentities($this->input->post('our_story', ENT_QUOTES));
		
		$res = $this->admin_model->update_buytolet_about($what_we_do, $story, $id);
		
		if($res){
			
			echo 1;
			
		}else{
			
			echo 0;
			
		}
	}
	
	public function updateBtlHiw(){
		
		$search = htmlentities($this->input->post('search', ENT_QUOTES));
		
		$analyse = htmlentities($this->input->post('analyse', ENT_QUOTES));
		
		$id = $this->input->post('id');
		
		$qualify = htmlentities($this->input->post('qualify', ENT_QUOTES));
		
		$checkout = htmlentities($this->input->post('checkout', ENT_QUOTES));
		
		$res = $this->admin_model->update_btl_hiw($search, $analyse, $qualify, $checkout, $id);
		
		if($res){
			
			echo 1;
			
		}else{
			
			echo 0;
			
		}
	}
	public function deleteBooking(){
		
		$id = $this->input->post('bookingID');
		
		$propID = $this->input->post('propertyID');		
				
		$res = $this->admin_model->delBooking($id, $propID);

		if($res){
			
			echo 1;
			
		}else{
			
			echo 0;
			
		}
	}
	public function deleteType(){
		
		$id = $this->input->post('type_id');		
				
		$res = $this->admin_model->del_apt_type($id);

		if($res){
			
			echo 1;
			
		}else{
			
			echo 0;
			
		}
	}
	public function removeBtlImg(){
		
		$folder = $this->input->post('folder');
		
		$img_name = $this->input->post('imgName');
		
		if ($folder && $img_name) {
		    
		    $filename = "../buy.smallsmall.com/uploads/".$folder."/".$img_name; 
			
			if (file_exists($filename)) {
				
				unlink($filename);
				
			  	echo 1;
				
			} else {
				
			  	echo $filename;
				
			}
		}
	}
	
	public function removeImg(){
		
		$folder = $this->input->post('folder');
		
		$img_name = $this->input->post('imgName');
		
		if ($folder && $img_name) {
			
			$filename = "./uploads/".$folder."/".$img_name; 
			
			if (file_exists($filename)) {
				
				unlink($filename);
				
			  	echo 1;
				
			} else {
				
			  	echo $filename;
				
			}
		}
	}
	public function removeStayoneImg(){
		
		$folder = $this->input->post('folder');
		
		$img_name = $this->input->post('imgName');
		
		if ($folder && $img_name) {
			
			$filename = "../stay.smallsmall.com/uploads/".$folder."/".$img_name; 
			
			if (file_exists($filename)) {
				
				unlink($filename);
				
			  	echo 1;
				
			} else {
				
			  	echo $filename;
				
			}
		}
	}
	public function search_properties(){

		$s_data['s_query']  = $this->input->post('search-input');
			

		$config['total_rows'] = $this->admin_model->getSearchCount($s_data);

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/search-properties';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links(); 

			$data['properties'] = $this->admin_model->get_property_list($s_data);
			

		}

		//if ( ! file_exists(APPPATH.'views/admin/pages/search-properties.php')){

			// Whoops, we don't have a page for that!

			//show_404();

		//}
		
		if($this->session->has_userdata('adminLoggedIn')){
			

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');
		
			$data['title'] = "Search Result Small Small";
			
			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/search-properties.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);
		}else{
			
			redirect( base_url().'admin/login','refresh');
			
		}

	}
	
	public function search_users(){

		$s_data['s_query']  = $this->input->post('search-input');
		
		if ($s_data['s_query'] === null ) $s_data = $this->session->userdata('search');
		
		else $this->session->set_userdata('search', $s_data);

		$config['total_rows'] = $this->admin_model->getUserSearchCount($s_data);

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/search-users';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links(); 

			$data['rss_users'] = $this->admin_model->get_user_list($s_data);
			

		}
		
		if($this->session->has_userdata('adminLoggedIn')){
			

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');
		
			$data['title'] = "User Search Result Small Small";
			
			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/rss-users.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);
		}else{
			
			redirect( base_url().'admin/login','refresh');
			
		}

	}
	public function get_facilities($id){

		$facilities = $this->rss_model->getNearbyFacilities($id);

		return $facilities;

	}
	public function logout(){

		$this->session->sess_destroy();

		//$url = $_SERVER['HTTP_REFERER'];

		redirect(base_url('admin'));

   	}
	
	public function view_items(){

		

		$config['total_rows'] = $this->admin_model->countItems();

		

		$data['total_count'] = $config['total_rows'];

		

		$config['suffix'] = '';

        



		if ($config['total_rows'] > 0) {



			$page_number = $this->uri->segment(3);



			$config['base_url'] = base_url() . 'admin/view-items';



			if (empty($page_number))



				$page_number = 1;



			$offset = ($page_number - 1) * $this->pagination->per_page;



			$this->admin_model->setPageNumber($this->pagination->per_page);



			$this->admin_model->setOffset($offset);



			$this->pagination->cur_page = $page_number;



			$this->pagination->initialize($config);



			$data['page_links'] = $this->pagination->create_links();

            

			$data['furnitures'] = $this->admin_model->fetchItems();			



		}

		

		if ( ! file_exists(APPPATH.'views/admin/pages/view-furnisure-items.php'))

        {

                // Whoops, we don't have a page for that!

                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Furnisure Items :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/view-furnisure-items.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

		

		}else{

			

			redirect( base_url().'admin/login','refresh');		

			

		}

	}
	
	public function delProp(){
		
		$propID = $this->input->post("propID");		
		
		//Get the image folders
		$prop = $this->admin_model->get_folder_name($propID);
		
		$target =  base_url().'uploads/properties/'.$prop['imageFolder'].'/facilities/';
		
		$this->delete_files($target);
		
		$target2 =  base_url().'uploads/properties/'.$prop['imageFolder'].'/';
		
		$this->delete_files($target2);
		
		$result = $this->admin_model->delProp($propID);
		
		if($result){
			
			echo 1;
			
		}else{
			
			echo 0;
			
		} 
	}
	public function delArticle(){
		
		$articleID = $this->input->post("articleID");
		
		$folder = $this->input->post("folder");
		
		$target =  base_url().'uploads/news/'.$folder.'/';
		
		$this->delete_files($target);
		
		$result = $this->admin_model->delArticle($articleID);
		
		if($result){
			
			echo 1;
			
		}else{
			
			echo 0;
			
		} 
	}
	public function delete_files($target){
		
		if(is_dir($target)){
			
			$files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned

			foreach( $files as $file ){
				
				delete_files( $file ); 
				
			}

			rmdir( $target );
			
		} elseif(is_file($target)) {
			
			unlink( $target ); 
			
		}
	}
	public function delBtlProp(){
		
		$propID = $this->input->post("propID");

        $propFolder = $this->input->post("propFolder");
        
		$result = $this->admin_model->delBtlProp($propID);
		
		if($result){
			
			file_get_contents('https://buy.smallsmall.com/delete-images/'.$propFolder);
			
			echo 1;
			
		}else{
			
			echo 0;
			
		}
	}
	
	public function propListing(){
		
		$propID = $this->input->post("propID");
		
		$theState = $this->input->post("propState");
		
		$result = $this->admin_model->propListing($propID, $theState);
		
		if($result){
			
			echo 1;
			
		}else{
			
			echo 0;
			
		}
	}
	
	public function clone_property($propID){
		
		$digits = 12;

		$randomNumber = '';

		$count = 0;

		while($count < $digits){

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;

		}
		
		$imageFolder = md5(date("Y-m-d H:i:s"));
		
		$id = $randomNumber;
		
		$property = $this->admin_model->get_property_details($propID);
		
		$facilities = $this->admin_model->get_facilities($propID);
	
		
		$userID = $this->session->userdata('adminID');
		
		if (!is_dir('./uploads/properties/'.$imageFolder)) {

			mkdir('./uploads/properties/'.$imageFolder, 0777, TRUE);

		}
		
		// Store the path of source file 
		$source = './uploads/properties/'.$property['imageFolder'];  

		// Store the path of destination file 
		$destination = './uploads/properties/'.$imageFolder;  
		
		$dir = opendir($source);
		// Copy the file from /user/desktop/geek.txt  
		// to user/Downloads/geeksforgeeks.txt' 
		// directory 
		while($file = readdir($dir)){
			// Skip . and .. 
			if(($file != '.') && ($file != '..')){  
			  	// Check if it's folder / directory or file 
			  	if(is_dir($source.'/'.$file)){  
					// Recursively calling this function for sub directory  
					//recursive_files_copy($source.'/'.$file, $destination.'/'.$file); 
			  	}else{  
					// Copying the files
					copy($source.'/'.$file, $destination.'/'.$file);  
			  	}  
			}  
		}  

		closedir($dir);
		//Get city ID
		$city_id = $this->admin_model->get_city_id($property['city']);
		//Insert new property 
		
		
		$new_id = $this->admin_model->insertPropertyClone($id, $property['propertyTitle'], $property['propertyType'], $property['propertyDescription'], $property['rentalCondition'], $property['address'], $property['city'], $property['state'], $property['country'], $property['price'], $property['serviceCharge'], $property['securityDeposit'], $property['paymentPlan'], $property['intervals'], $property['frequency'], $imageFolder, $property['featuredImg'], $property['amenities'], $property['bed'], $property['bath'], $property['toilet'], $userID, $property['status'], $property['furnishing'], $property['renting_as'], $property['services'], $property['featured_property'], $property['available_date'], $city_id['id']);
		
		if($new_id){
			
			if (!is_dir('./uploads/properties/'.$imageFolder.'/facilities')) {

				mkdir('./uploads/properties/'.$imageFolder.'/facilities', 0777, TRUE);

			}
			
			$source_2 = './uploads/properties/'.$property['imageFolder']."/facilities";
			
			$destination_2 = './uploads/properties/'.$imageFolder."/facilities";
			
			$dir2 = opendir($source_2);
			
			while($file = readdir($dir2)){
				// Skip . and .. 
				if(($file != '.') && ($file != '..')){  
					// Check if it's folder / directory or file 
					if(is_dir($source_2.'/'.$file)){  
						// Recursively calling this function for sub directory  
						//recursive_files_copy($source.'/'.$file, $destination.'/'.$file); 
					}else{  
						// Copying the files
						copy($source_2.'/'.$file, $destination_2.'/'.$file);  
					}  
				}  
			}  

			closedir($dir2);
			
			foreach($facilities as $facility){

				//echo $facility['name']."<br />";
				$this->admin_model->insertFacilities($new_id, $facility['name'], $facility['category'], $facility['distance'], $facility['file_path']);

			}
			
		}
		
		
		redirect( base_url()."admin/view-properties" ,'refresh');
		
	}
	
	public function clone_btl_property($propID){
		
		$digits = 12;

		$randomNumber = '';

		$count = 0;

		while($count < $digits){

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;

		}
		
		$imageFolder = md5(date("Y-m-d H:i:s"));
		
		$id = $randomNumber;
		
		$property = $this->admin_model->get_btl_property_details($propID);
	
		
		$userID = $this->session->userdata('adminID');
		
		//Create folder on remote server
		
		$success = file_get_contents('https://buy.smallsmall.com/create-folder/'.$imageFolder);
		
		if(!$success){
			//Create the floor plan folder
			//file_get_contents("https://www.buy2let.ng/create-folder/".$folder."/floor-plan");
			$error = "Could not create remote folder";
			
		}
		
		
		
		//Insert new property
		$views = 0;
		
		$new_id = $this->admin_model->insertBtlPropertyClone($id, $property['property_name'], $property['apartment_type'], $property['price'], $property['promo_price'], $property['promo_category'] , $property['address'], $property['city'], $property['state'], $property['country'], $property['bed'], $property['bath'], $property['toilet'], $property['tenantable'], $property['expected_rent'], $property['hpi'], $property['developer'], $property['mortgage'], $property['payment_plan'], $property['payment_plan_period'], $imageFolder, $property['pool_units'], $property['available_units'],  $userID, $property['pool_buy'], $property['property_size'], $property['property_info'], $property['location_info'], $property['floor_plan'], $property['featured_image'], $property['status'], $views, $property['availability'], $property['asset_appreciation_1'], $property['asset_appreciation_2'], $property['asset_appreciation_3'], $property['asset_appreciation_4'], $property['asset_appreciation_5'], $property['floor_level'], $property['construction_lvl'], $property['start_date'], $property['finish_date'], $property['investment_type'], $property['marketValue']);
		
		if($new_id){
		    
		    $sourceFolder = $property['image_folder'];
		    
		    $destinationFolder = $imageFolder;
			
			//Initiate a copy on the remote server
			$result = file_get_contents('https://buy.smallsmall.com/copy-images/'.$sourceFolder.'/'.$destinationFolder);
			
			if($result){
			    
			    echo 1;
			    
			}else{
			    
			    echo $result;
			    
			}
			
		}
		
		
		redirect( base_url()."admin/all-buytolet-properties" ,'refresh');
		
	}
	
	public function count_unread_requests(){
		
		return $this->admin_model->countUnreadRequests();
		
	}
	
	public function get_unverifieds(){
		
		return $this->admin_model->get_unverifieds();
	}
	public function soldProp(){
	    
	    $prop_id = $this->input->post("propID");
	    
	    $result = $this->admin_model->soldProp($prop_id);
	    
	    if($result){
	        echo 1;
	    }else{
	        echo 0;
	    }
	}

	public function verifyUser(){
	    
	    require 'vendor/autoload.php'; // For Unione template authoload

		$id = $this->input->post("id");
		
		$prop_id = $this->input->post("prop_id");

		$prop_det = $this->admin_model->get_property_details($prop_id); // Added to get property Name
	    	    	    
	    $propertyName = $prop_det['propertyTitle']; // Added

		$result = $this->admin_model->verifyUser($id, $prop_id);
		
		$user = $this->admin_model->get_user($id);
		
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
			"id" => "0470bdea-11a5-11ee-8c98-92b7969ef90b"
		];
		
		$requestBodyAdmin =[
		     "id" => "6ce150b0-11aa-11ee-9147-b2a7eef590f9"
		    ];

		// end Unione Template
		
		if($result){
			
			//Send email to user to notify them of verification
			$data['name'] = $user['firstName'] . ' ' . $user['lastName'];
			
			$data['result_title'] = "Verification Successful!";
			
			$data['result_note'] = "Thank you for showing interest in renting one of our properties. This is to inform you that your verification has been completed and you are eligible to rent this property . You can now proceed to pay for your already booked apartment/Furniture. Proceed to your dashboard to continue.
			<p><strong style='font-size:14px'>Please note: If payment is not made within 12 hours, the property will be available for the next person in the queue. Also, if payment is made after the stipulated time, the process of initiating a refund takes 7 days or a sum of two thousand naira (N2000) will be charged for an immediate refund. If you choose to cancel your booking, a 5% deduction would be applied.</strong></p>
			<p style='font-size:12px'>
			    Rent payment is easy on our platform, we use Paystack to collect payments on a modern secure payment gateway, this gateway offers users different modes of payment.  Small Small does not store bank card or personal account data.<br /><br />
			    If you encounter any problem using the payment gateway please contact Small Small Customer experience at<br /><br /> customerexperience@smallsmall.com or Call 070-877 89 815/ 0903-722-2669/ 0903-633-9800 for assistance <br />Thanks
			</p>";
			
			$data['login_button'] = '<div style="width:100px;line-height:30px;border-radius:4px;text-align:center;margin:auto;border-radius:4px;" class="verify-but"><a style="text-decoration:none;display:inline-block;width:100%;height:100%;background:#00CDA6;color:#000;font-family:avenir-demi;border-radius:4px;font-size:14px;" href="'.base_url().'login">Dashboard</a></div>';
			
		//Unione Template

				try {
					$response = $client->request('POST', 'template/get.json', array(
						'headers' => $headers,
						'json' => $requestBody,
					));

					$jsonResponse = $response->getBody()->getContents();
					
					$responseData = json_decode($jsonResponse, true);

					$htmlBody = $responseData['template']['body']['html'];

					// Get the unique username
					// $user = $this->admin_model->get_user($id);
					
					$username = $data['name'];
					
					// Replace the placeholder in the HTML body with the username
					$htmlBody = str_replace('{{Name}}', $username, $htmlBody);

					$data['response'] = $htmlBody;

					// Prepare the email data
					$emailData = [
						"message" => [
							"recipients" => [
								["email" => $user['email']],
							],
							"body" => ["html" => $htmlBody],
							"subject" => "Verification Successful!",
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
			
			$notify = $this->functions_model->insert_user_notifications('Verification Successful!', 'We are glad to inform you that your verification process has been successful, you can now start subscribing with us.', $user['userID'], 'Rent');
			
			if($responseEmail){
			    
			    	//Unione Template for CX

				try {
					$response = $client->request('POST', 'template/get.json', array(
						'headers' => $headers,
						'json' => $requestBodyAdmin,
					));

					$jsonResponse = $response->getBody()->getContents();
					
					$responseData = json_decode($jsonResponse, true);

					$htmlBody = $responseData['template']['body']['html'];

					// Get the unique username

					$username = $data['name'];

					$propertyID = $prop_id;

					// Replace the placeholder in the HTML body with the username
					$htmlBody = str_replace('{{Name}}', $username, $htmlBody);
					
					$htmlBody = str_replace('{{PropertyID}}', $propertyName, $htmlBody);

					$data['response'] = $htmlBody;

					// Prepare the email data
					$emailDataCx = [
						"message" => [
							"recipients" => [
								["email" => 'customerexperience@smallsmall.com'],
							],
							"body" => ["html" => $htmlBody],
							"subject" => "Verification Successful!",
							"from_email" => "donotreply@smallsmall.com",
							"from_name" => "Smallsmall",
						],
					];

					// Send the email using the Unione API
					$responseEmail = $client->request('POST', 'email/send.json', [
						'headers' => $headers,
						'json' => $emailDataCx,
					]);
					
				} catch (\GuzzleHttp\Exception\BadResponseException $e) {
					$data['response'] = $e->getMessage();
				}
			
			}
			
			echo 1;
						
		}else{
			
			echo 0;
			
		}
	}

	public function unverifyUser(){
		
		$id = $this->input->post("id");
		
		$result = $this->admin_model->verificationFailed($id);
		
		$user = $this->admin_model->get_user($id);
		
		if($result){
			
			//Send email to user to notify them of verification
			$data['name'] = $user['firstName'];
			
			$data['result_title'] = "Verification Failed!";
			
			$data['result_note'] = "Thank you for showing interest in renting with us.<br /><br />We are sorry to inform that you did not pass our verification process and are therefore not eligible to rent with us at the moment, therefore you can’t make payment.";
			
			$data['login_button'] = ' ';

			$this->email->from('donotreply@smallsmall.com', 'Small Small');

			$this->email->to($user['email']);

			$this->email->subject("Verification failed!");	

			$this->email->set_mailtype("html");

			$message = $this->load->view('email/header.php', $data, TRUE);

			$message .= $this->load->view('email/verification-result-email.php', $data, TRUE);

			$message .= $this->load->view('email/footer.php', $data, TRUE);

			$this->email->message($message);

			$emailRes = $this->email->send();
			
			$notify = $this->functions_model->insert_user_notifications('Verification Failed!', 'We are sorry to inform that you did not pass our verification process and are therefore not eligible to rent with us at the moment, therefore you can’t make payment.', $user['userID'], 'Rent');
			
			echo 1;
						
		}else{
			
			echo 0;
			
		}
	}
	public function approvePayment(){
		
		$transactionID = $this->input->post("transactionID");
		
		$refID = $this->input->post("refID");
		
		$approvedBy = $this->session->userdata('adminID');
		
		//Get transaction Details
		$transaction = $this->admin_model->get_transaction($transactionID, $refID);
		
		
		//Get the rent expiry date from the bookings table
		$result = $this->admin_model->get_booking($transactionID);
		
		$the_file_name = $transactionID.'_'.$randomNum.'_invoice.pdf';
		
		//Update the transaction table		
		$res = $this->admin_model->updatePaymentTransaction($transactionID, $refID, $result['propertyID'], $result['rent_expiration'], $approvedBy, $the_file_name);
		
		$prop = $this->admin_model->get_property_details($result['propertyID']);
		
		$path = "";
		
		$rent_amount = 0;
		
		$security_deposit = 0;
		
		$randomNum = rand(10, 99999);
		
		//$rent_amount = $prop['price'];
		
		$security_deposit = $prop['price'] * $prop['securityDepositTerm'];
		
		if($security_deposit > $transaction['amount']){
		    
		    $rent_amount = $security_deposit - $transaction['amount'];
		    
		}else if($transaction['amount'] > $security_deposit){
		    
		    $rent_amount = $transaction['amount'] - $security_deposit;
		    
		}else{
		    
		    $rent_amount = $transaction['amount'];
		    
		}
		
		//Get the sum of months paid for
		$duration = $rent_amount / $prop['price'];
		
		if($res){
			
		    //get user information
		    $user = $this->admin_model->get_user($result['userID']);
		    
		    
		    
		    $name = $user['firstName'].' '.$user['lastName'];
		    
		    //Generate PDF here
		    $pdf_content = '<div style="width:90%;margin:auto;padding-top:50px;"><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="logo"><img width="150px" src="https://www.rentsmallsmall.com/assets/img/logo.png" /></div></td><td width="33.3%"></td><td width="33.3%"><div class="company-address" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>From Address</b><br />www.smallsmall.com<br />No. 1 Akinyemi Avenue,<br />Lekki Phase 1,<br />Lekki Lagos,<br />Nigeria.<br />(+234)903 722 2669</div></td></tr></table><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="invoice-details" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>Invoice:</b> '.$transactionID.'_'.$randomNum.'<br /><b>Transaction ID:</b> '.$refID.'<br />Invoice date: '.date("d/m/Y").'<br />Email: '.$user['email'].'<br />Phone Number: '.$user['phone'].'</div></td><td width="33.3%"></td><td width="33.3%"><div class="company-address" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>Billing Address</b><br />'.$name.'<br /><!---9b Adedapo Williams Close, Off Emeka Nweze Str<br />Lekki Phase 1,<br />Lekki Lagos,<br />--->Nigeria.<br />'.$user['phone'].'</div></td></tr></table><table width="100%" cellpadding="10" style="border:1px solid #f1f3f3;"><tr><th style="background:#2E2E2E;width:60%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Description</th><th style="background:#2E2E2E;width:20%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Duration</th><th style="background:#2E2E2E;width:20%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Cost</th></tr><tr><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left"><b>'.$prop['propertyTitle'].'</b><div style="font-family:helvetica;font-size:12px;color:#333333">'.$prop['address'].', '.$prop['city'].'</div></td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">'.$duration.' Month(s)</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N'.number_format($rent_amount).'.00</td></tr><tr><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;"><b>Security Deposit</b></td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">'.$prop['securityDepositTerm'].' Month(s)</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N '.number_format($security_deposit).'.00</td></tr></table><table width="100%" cellpadding="10" style="border:1px solid #f1f3f3;display:table"><tr><td width="80%" valign="top" style="border:1px solid #f1f3f3;font-weight:bold;font-family:helvetica;font-size:14px;text-align:right">Subtotal</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N'.number_format($transaction['amount']).'.00</td></tr><tr><td width="80%" valign="top" style="border:1px solid #f1f3f3;font-weight:bold;font-family:helvetica;font-size:14px;text-align:right">Total</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N'.number_format($transaction['amount']).'.00</td></tr></table><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="invoice-details" style="font-family:helvetica;font-size:14px;line-height:25px;">Account Number: 7900982382<br />Providus Bank<br />RentSmallSmall Ltd.</div></td><td width="33.3%"></td><td width="33.3%"></td></tr></table></div>';
		    
		    if (!is_dir('assets/pdf/tenant/'.$transactionID)) {
		    
                mkdir('./assets/pdf/tenant/'.$transactionID, 0777, TRUE);
            
            }
            
            //Set folder to save PDF to
            $this->html2pdf->folder('./assets/pdf/tenant/'.$transactionID.'/');
            
            //Set the filename to save/download as
            $this->html2pdf->filename($the_file_name);
            
            //Set the paper defaults
            $this->html2pdf->paper('a4', 'portrait');
            
            //Load html view
            $this->html2pdf->html($pdf_content); 
    		 
            //Create the PDF
            $path = $this->html2pdf->create('save');
		    
		    
		    $data['name'] = $user['firstName'].' '.$user['lastName'];
		    
		    $data['propertyName'] = $prop['propertyTitle'];
		    
		    $data['prop_id'] = $prop['propertyID'];
		    
			$notify = $this->functions_model->insert_user_notifications('Payment Approved!', 'Your payment has been successfully approved.', $user['userID'], 'Rent');
		    
			//Send email to customer and cx
			
			$this->email->from('customerexperience@smallsmall.com', 'Small Small');

			$this->email->to($user['email']);            

			$this->email->subject("Payment Approval");   
			
			$this->email->set_mailtype("html");         

			$message = $this->load->view('email/header.php', $data, TRUE);            

			$message .= $this->load->view('email/payment-approval-email.php', $data, TRUE);            

			$message .= $this->load->view('email/footer.php', $data, TRUE);     

			$this->email->message($message); 
			
			if($path){
    			
    		    $this->email->attach($path);
    		    
    		}
    		
    		$emailSent = $this->email->send();

			if($emailSent){
			    
			    $this->email->from('no-reply@smallsmall.com', 'Small Small');
			    
			    $this->email->to('customerexperience@smallsmall.com');      

    			$this->email->subject("Payment Approval");   
    			
    			$this->email->set_mailtype("html");         
    
    			$message = $this->load->view('email/header.php', $data, TRUE);            
    
    			$message .= $this->load->view('email/cx-payment-approval-notification.php', $data, TRUE);            
    
    			$message .= $this->load->view('email/footer.php', $data, TRUE);
    			
    			$this->email->message($message); 
			
    			if($path){
        			
        		    $this->email->attach($path);
        		}
        		
        		$this->email->send();
			    
			    echo 1;
			}
			
			
		}else{
			
			echo 0;
			
		}
	}
	
	public function shorten_title($string){
		
		if (strlen($string) >= 20) {
			return substr($string, 0, 20). " ... ";
		}
		else {
			return $string;
		}
		
	}
	
	public function send_another_verification_email($id, $prop_id){
	    
	    $result = $this->admin_model->verifyUser($id, $prop_id);
	    
	    $user = $this->admin_model->get_user($id);
	     
		if($result){
			
			//Send email to user to notify them of verification
			$data['name'] = $user['firstName'];
			
			$data['result_title'] = "Verification Successful!";
			
			
			$data['result_note'] = "Thank you for showing interest in renting one of our properties. This is to inform you that your verification has been completed and you are eligible to rent this property . You can now proceed to pay for your already booked apartment. Proceed to your dashboard to continue.
			<p><strong style='font-size:14px'>Please note: If payment is not made within 12 hours, the property will be available for the next person in the queue. Also, if payment is made after the stipulated time, the process of initiating a refund takes 7 days or a sum of two thousand naira (N2000) will be charged for an immediate refund. If you choose to cancel your booking, a 5% deduction would be applied.</strong></p>
			<p style='font-size:12px'>
			    Rent payment is easy on our platform, we use Paystack to collect payments on a modern secure payment gateway, this gateway offers users different modes of payment.  Small Small does not store bank card or personal account data.<br /><br />
			    If you encounter any problem using the payment gateway please contact Small Small Customer experience at<br /><br /> customerexperience@smallsmall.com or Call 070-877 89 815/ 0903-722-2669/ 0903-633-9800 for assistance <br />Thanks
			</p>";
			
			$data['login_button'] = '<div style="width:100px;line-height:30px;border-radius:4px;text-align:center;margin:auto;border-radius:4px;" class="verify-but"><a style="text-decoration:none;display:inline-block;width:100%;height:100%;background:#00CDA6;color:#000;font-family:avenir-demi;border-radius:4px;font-size:14px;" href="'.base_url().'login">Dashboard</a></div>';

			$this->email->from('donotreply@smallsmall.com', 'Small Small');

			$this->email->to($user['email']);

			$this->email->bcc('customerexperience@smallsmall.com');

			$this->email->subject("Congratulations!");	

			$this->email->set_mailtype("html");

			$message = $this->load->view('email/header.php', $data, TRUE);

			$message .= $this->load->view('email/verification-result-email.php', $data, TRUE);

			$message .= $this->load->view('email/footer.php', $data, TRUE);

			$this->email->message($message);

			$emailRes = $this->email->send();
			
			echo "Successful";
						
		}else{
			
			echo "Errors";
			
		}   
	
	}
	
	public function lockTransaction(){
	    
	    $verificationID = $this->input->post("verID");
	    
	    $rent_amount = $this->input->post("rent_amount");
	    
	    $propID = $this->input->post("propID");
	    
	    $userID = $this->input->post("userID");
	    
	    $bookingID = $this->input->post("bookingID");
	    
	    $duration = $this->input->post("duration");
	    
	    $due_date = $this->input->post("rentDue");
	    
	    $security_deposit = $this->input->post("security_deposit");
	    
	    $sec_dep_term = $this->input->post("sec_dep_term");
	    
	    $payment_lvl = $this->input->post("payment_lvl");
	    
	    $nMonths = $duration;
	    
	    $path = "";
	    
	    $expiry = $due_date;
	    
	    if($payment_lvl == 'Full' ){
		
    		$startdate = date("Y-m-d", strtotime($due_date));
    		
    		$expiry = $this->endCycle($startdate, $nMonths);
	    }
	    
	    $prop_det = $this->admin_model->get_property_details($propID);
	    
	    $user = $this->rss_model->get_user($userID);
	    
	    $data['name'] = $user['firstName'].' '.$user['lastName'];
	    
	    $data['propertyName'] = $prop_det['propertyTitle'];
	    
	    $data['prop_id'] = $prop_det['propertyID'];
	    
	    $amount = $rent_amount + $security_deposit; //($prop_det['price'] * $duration) + $security_deposit;
	    
	    $randomNum = rand(10, 99999);
	    
	    $ref = 'rss_'.md5(rand(1000000, 9999999999));
	    
	    $txn = $this->admin_model->createTransaction($userID, $bookingID, $amount, $verificationID, $expiry, $ref, $bookingID.'_'.$randomNum.'_invoice.pdf', $duration);
	    
	    if($txn){
	        //Create invoice and send
	        
	        $pdf_content = '<div style="width:90%;margin:auto;padding-top:50px;"><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="logo"><img width="150px" src="https://rent.smallsmall.com/assets/img/logo.png" /></div></td><td width="33.3%"></td><td width="33.3%"><div class="company-address" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>From Address</b><br />rent.smallsmall.com<br />No. 1 Akinyemi Avenue,<br />Lekki Phase 1,<br />Lekki Lagos,<br />Nigeria.<br />(+234)903 722 2669</div></td></tr></table><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="invoice-details" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>Invoice:</b> '.$bookingID.'_'.$randomNum.'<br /><b>Transaction ID:</b> '.$ref.'<br />Invoice date: '.date("d/m/Y").'<br />Email: '.$user['email'].'<br />Phone Number: '.$user['phone'].'</div></td><td width="33.3%"></td><td width="33.3%"><div class="company-address" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>Billing Address</b><br />'.$user['firstName'].' '.$user['lastName'].'<br />Nigeria.<br />'.$user['phone'].'</div></td></tr></table><table width="100%" cellpadding="10" style="border:1px solid #f1f3f3;"><tr><th style="background:#2E2E2E;width:60%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Description</th><th style="background:#2E2E2E;width:20%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Duration</th><th style="background:#2E2E2E;width:20%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Cost</th></tr><tr><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left"><b>'.$prop_det['propertyTitle'].'</b><div style="font-family:helvetica;font-size:12px;color:#333333">'.$prop_det['address'].', '.$prop_det['city'].'</div></td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">'.$duration.' Month(s)</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N'.number_format($amount).'.00</td></tr><tr><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;"><b>Security Deposit</b></td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">'.$sec_dep_term.' Month(s)</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N '.number_format($security_deposit).'.00</td></tr></table><table width="100%" cellpadding="10" style="border:1px solid #f1f3f3;display:table"><tr><td width="80%" valign="top" style="border:1px solid #f1f3f3;font-weight:bold;font-family:helvetica;font-size:14px;text-align:right">Subtotal</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N'.number_format($amount).'.00</td></tr><tr><td width="80%" valign="top" style="border:1px solid #f1f3f3;font-weight:bold;font-family:helvetica;font-size:14px;text-align:right">Total</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N'.number_format($amount).'.00</td></tr></table><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="invoice-details" style="font-family:helvetica;font-size:14px;line-height:25px;">Account Number: 7900982382<br />Providus Bank<br />RentSmallSmall Ltd.</div></td><td width="33.3%"></td><td width="33.3%"></td></tr></table></div>';
            
            if (!is_dir('assets/pdf/tenant/'.$bookingID)) {
		    
                mkdir('./assets/pdf/tenant/'.$bookingID, 0777, TRUE);
            
            }
            
            //Set folder to save PDF to
            $this->html2pdf->folder('./assets/pdf/tenant/'.$bookingID.'/');
            
            //Set the filename to save/download as
            $this->html2pdf->filename($bookingID.'_'.$randomNum.'_invoice.pdf');
            
            //Set the paper defaults
            $this->html2pdf->paper('a4', 'portrait');
            
            //Load html view
            $this->html2pdf->html($pdf_content); 
    		 
            //Create the PDF
            $path = $this->html2pdf->create('save');
            
            $this->email->from('no-reply@smallsmall.com', 'SmallSmall');
    
    		$this->email->to($user['email']);
    		
    		$this->email->cc('accounts@smallsmall.com');
    		
    		$this->email->bcc('customerexperience@smallsmall.com');
    				
    		$this->email->set_mailtype("html");
    
    		$this->email->subject("Successful renewal!");	
    
    		$message = $this->load->view('email/header.php', $data, TRUE);
    
    		$message .= $this->load->view('email/payment-confirmation-email.php', $data, TRUE);
    
    		$message .= $this->load->view('email/footer.php', $data, TRUE);
    
    		$this->email->message($message);
            
            if($path){
    			
    		    $this->email->attach($path);
    		    
    		}
    
    		$emailRes = $this->email->send();
    		
    		if($emailRes){
    		    
    		    echo 1;
    		    
    		}else{
    		    
    		    echo 0;
    		}
	    }
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
	
	public function addDebt(){
	    
	    $d_data = $this->input->post();
	    
	    $res = $this->admin_model->insert_debt($d_data);
	    
	    if($res){
	        
	        echo 1;
	        
	    }else{
	        
	        echo 0;
	        
	    }
	}
	public function search_inspection(){

		$values = array();
		
		$admins = $this->admin_model->get_all_admin();
		
		$s_data['s_query']  = $this->input->post('search-input');
		
		if ($s_data['s_query'] === null ) $s_data = $this->session->userdata('search');
		
		else $this->session->set_userdata('search', $s_data);
	    
	    for($i = 0; $i < count($admins); $i++){
	        
	        array_push($values, $admins[$i]['adminID']);
	        
	    }
		
		$data['adminID'] = $this->session->userdata('adminID');

		$config['total_rows'] = $this->admin_model->countInspSearchRequests($data['adminID'], $s_data);

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';
		
		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/search-inspection';

			if (empty($page_number))
			
				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			//$data['inspections'] = $this->admin_model->fetchRequests($data['adminID']);	
			$data['inspections'] = $this->admin_model->fetchInspSearchRequests($values, $s_data);

		}

		if ( ! file_exists(APPPATH.'views/admin/pages/inspection.php'))
        {
            // Whoops, we don't have a page for that!

            show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			//$data['aptTypes'] = $this->admin_model->fetchAptType();

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['title'] = "Inspection :: RSS";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/inspection.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			$this->load->view('admin/templates/request-modal.php' , $data);

		}else{

			redirect( base_url().'admin/login','refresh');		 	

		} 

	}
	public function alert_landlord_payout(){
	    
	    if($this->input->is_cli_request()){
	        
	        $config['hostname'] = 'localhost';
        	$config['username'] = 'rentsmallsmall_buytolet';
        	$config['password'] = 'Buytolet@2021';
        	$config['database'] = 'rentsmallsmall_furnisure_buytolet_database';
        	/*$config['username'] = 'rentsmallsmall_seuncrowther';
        	$config['password'] = 'RSSpassw0rd';
        	$config['database'] = 'rentsmallsmall_test_db';*/
        	$config['dbdriver'] = 'mysqli';
        	$config['dbprefix'] = '';
        	$config['pconnect'] = FALSE;
        	$config['db_debug'] = (ENVIRONMENT !== 'production');
        	$config['cache_on'] = FALSE;
        	$config['cachedir'] = '';
        	$config['char_set'] = 'utf8';
        	$config['dbcollat'] = 'utf8_general_ci';
        	$config['swap_pre'] = '';
        	$config['encrypt'] = FALSE;
        	$config['compress'] = FALSE;
        	$config['stricton'] = FALSE;
        	$config['failover'] = array();
        	$config['save_queries'] = TRUE;
        	
        	$this->db = $this->load->database($config, TRUE);
	        
	        $due_date = date('Y-m-d', strtotime(' +2 day'));
	        
	        $results = $this->admin_model->get_next_payouts($due_date);
	        
	        if(count($results) > 0){
	        
    	        for($i = 0; $i < count($results); $i++){

        			$data['name'] = $results[$i]['landlord_name'];
        	        
        	        $this->email->from('donotreply@smallsmall.com', 'Auto Notification');
        
        			$this->email->to('customerexperience@smallsmall.com');
        
        			$this->email->subject("Payout Notifier");	
        			
        			$this->email->set_mailtype("html");
        
        			$message = $this->load->view('email/header.php', $data, TRUE);
        
        			$message .= $this->load->view('email/payoutnotifier.php', $data, TRUE);
        
        			$message .= $this->load->view('email/footer.php', $data, TRUE);
        
        			$this->email->message($message);
        
        			$emailRes = $this->email->send();
    	            
    	        }
	        }
	        
	    }
	}
	public function uploadApt(){
		//Get data from AJAX

		$propName = $this->input->post('propTitle');

		$propType = $this->input->post('propType');

		$stayType = $this->input->post('stayType');

		$propDesc = htmlentities($this->input->post('propDesc', ENT_QUOTES));

		$house_rules = htmlentities($this->input->post('house_rules', ENT_QUOTES));

		$policies = htmlentities($this->input->post('policies', ENT_QUOTES));

		$address = $this->input->post('propAddress');

		$country = $this->input->post('country');

		$city = $this->input->post('city');

		$state = $this->input->post('state');

		$cost = $this->input->post('cost');

		$security_deposit = $this->input->post('security-deposit');

		$imageFolder = $this->input->post('foldername');

		$featuredPic = $this->input->post('featuredPic');

		$amenities = $this->input->post('amenities');

		$bed = $this->input->post('bed-number');

		$bath = $this->input->post('bath-number');

		$toilet = $this->input->post('toilet-number');

		$guest = $this->input->post('guest-number');
		

		
		if($this->session->has_userdata('adminLoggedIn')){

			$userID = $this->session->userdata('adminID');

			//Populate the property table

			$property = $this->admin_model->insertApartment($propName, $propType, $stayType, $propDesc, $address, $city, $state, $country, $cost, $security_deposit, $imageFolder, $featuredPic, $amenities, $bed, $bath, $toilet, $guest, $policies, $house_rules);



			if($property != 0){

				echo 1;

			}else{

				echo "Could not upload property";

			}

		}else{			

			redirect( base_url()."admin/dashboard" ,'refresh');			

		}

		

	}
	
	public function startProcessing(){
	    
	    $user_id = $this->input->post('user_id');
	    
	    $res = $this->admin_model->start_processing($user_id);
	    
	    $user = $this->admin_model->get_user_details($user_id);
	    
	    if($res){
	        
	        $data['name'] = $user['lastName'];
	        
	        $this->email->from('noreply@smallsmall.com', 'Small Small');

			$this->email->to($user['email']);            

			$this->email->subject("Verification in process.");   
			
			$this->email->set_mailtype("html");         

			$message = $this->load->view('email/header.php', $data, TRUE);     

			$message .= $this->load->view('email/verification-in-process.php', $data, TRUE);            

			$message .= $this->load->view('email/footer.php', $data, TRUE);     

			$this->email->message($message);            

			$emailRes = $this->email->send();
	        
	        echo 1;
	        
	    }else{
	        
	        echo 0;
	        
	    }
	}
	public function addNotification(){

        $title = $this->input->post('title');
        
        $link = $this->input->post('link');
        
        $startDate = $this->input->post('startDate');
        
        $endDate = $this->input->post('endDate');

		$userID = $this->session->userdata('adminID');

        $res = $this->admin_model->insertNotification($title, $link, $startDate, $endDate);

		if($res){
		    
		    echo 1;
		    
		}else{
		    
		    echo 0;
		    
		}

	}
	public function editNotification(){

        $title = $this->input->post('title');
        
        $link = $this->input->post('link');
        
        $startDate = $this->input->post('startDate');
        
        $endDate = $this->input->post('endDate');

		$id = $this->input->post('id');

		$userID = $this->session->userdata('adminID');

        $res = $this->admin_model->editNotification($title, $link, $startDate, $endDate, $id);

		if($res){
		    
		    echo 1;
		    
		}else{
		    
		    echo 0;
		    
		}

	}
	public function all_notifications(){

		$config['total_rows'] = $this->admin_model->countNotifications();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/all-notifications';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['notifications'] = $this->admin_model->fetchNotifications();			

		}

		if ( ! file_exists(APPPATH.'views/admin/pages/all-notifications.php'))
        {

                // Whoops, we don't have a page for that!
                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Notifications :: SmallSmall";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/all-notifications.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			//$this->load->view('admin/templates/furnisure-category-modal.php' , $data);

		}else{
		    
			redirect( base_url().'admin/login','refresh');

		}

	}
	
	public function prep_invoice($invoiceID, $transactionID, $email, $phone, $name, $address, $apartmentName, $apartmentAddress, $duration, $cost_amount, $security_deposit, $amount_paid, $discount, $vat, $pickup_option, $pickup_cost){
	    
	    $pickup = "";
	    
	    if($pickup_option == 'yes'){
	        
	        $pickup = '<tr><td width="80%" valign="top" style="border:1px solid #f1f3f3;font-weight:bold;font-family:helvetica;font-size:14px;text-align:right">Pickup Cost</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N'.number_format($pickup_cost).'.00</td></tr>';
	        
	    }
	    
	    $pdf_content = '<div style="width:90%;margin:auto;padding-top:50px;"><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="logo"><img width="150px" src="https://stay.smallsmall.com/assets/img/logo.png" /></div></td><td width="33.3%"></td><td width="33.3%"><div class="company-address" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>From Address</b><br />stay.smallsmall.com<br />No. 1 Akinyemi Avenue,<br />Lekki Phase 1,<br />Lekki Lagos,<br />Nigeria.<br />(+234)903 722 2669</div></td></tr></table><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="invoice-details" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>Invoice:</b> '.$invoiceID.'<br /><b>Transaction ID:</b> '.$transactionID.'<br />Invoice date: '.date('M d, Y').'<br />Email: '.$email.'<br />Phone Number: '.$phone.'</div></td><td width="33.3%"></td><td width="33.3%"><div class="company-address" style="font-family:helvetica;font-size:14px;line-height:25px;"><b>Billing Address</b><br />'.$name.'<br />'.$address.'<br />Nigeria.<br />'.$phone.'</div></td></tr></table><table width="100%" cellpadding="10" style="border:1px solid #f1f3f3;"><tr><th style="background:#2E2E2E;width:60%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Description</th><th style="background:#2E2E2E;width:20%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Duration</th><th style="background:#2E2E2E;width:20%;text-align:left;font-family:helvetica;font-size:14px;line-height:25px;color:#FFF;">Cost</th></tr><tr><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left"><b>'.$apartmentName.'</b><div style="font-family:helvetica;font-size:12px;color:#333333">'.$apartmentAddress.'</div></td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">'.$duration.'</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N'.number_format($cost_amount).'.00</td></tr><tr><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;"><b>Security Deposit</b></td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">1</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N'.number_format($security_deposit).'.00</td></tr></table><table width="100%" cellpadding="10" style="border:1px solid #f1f3f3;display:table"><tr><td width="80%" valign="top" style="border:1px solid #f1f3f3;font-weight:bold;font-family:helvetica;font-size:14px;text-align:right">Subtotal</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N'.$subtotal.'.00</td></tr><tr><td width="80%" valign="top" style="border:1px solid #f1f3f3;font-weight:bold;font-family:helvetica;font-size:14px;text-align:right">Discount</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;color:red">- N'.number_format($discount).'0.00</td></tr>'.$pickup.'<tr><td width="80%" valign="top" style="border:1px solid #f1f3f3;font-weight:bold;font-family:helvetica;font-size:14px;text-align:right">VAT</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N'.number_format($vat).'.00</td></tr><tr><td width="80%" valign="top" style="border:1px solid #f1f3f3;font-weight:bold;font-family:helvetica;font-size:14px;text-align:right">Total</td><td valign="top" style="border:1px solid #f1f3f3;font-family:helvetica;font-size:14px;text-align:left;">N'.number_format($amount_paid).'.00</td></tr></table><table width="100%" style="margin-bottom:30px"><tr><td width="33.3%" valign="top"><div class="invoice-details" style="font-family:helvetica;font-size:14px;line-height:25px;">Account Number: 7900982382<br />Providus Bank<br />RentSmallSmall Ltd.</div></td><td width="33.3%"></td><td width="33.3%"></td></tr></table></div>';
	    
	    return $pdf_content;
	    
	}
	public function buytolet_property_requests(){

		$config['total_rows'] = $this->admin_model->countBuytoletRequests();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/btl-requests';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);
			
			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['requests'] = $this->admin_model->fetchBuytoletRequests();			

		}

		if ( ! file_exists(APPPATH.'views/admin/pages/btl-property-requests.php'))
        {

                // Whoops, we don't have a page for that!
                show_404();

        }
		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Requests :: Stay SmallSmall";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/btl-property-requests.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);

			//$this->load->view('admin/templates/furnisure-category-modal.php' , $data);
	
		}else{
	
			redirect( base_url().'admin/login','refresh');		

		}
	}
	public function approve_finance(){
	    
	    $refID = $this->input->post('refID');
	    
	    $userID = $this->input->post('userID');
	    
	    $result = $this->admin_model->approve_finance($refID);
	    
	    if($result){
	        //Send approved email and populate the payment schedule table
	        
	        $details = $this->admin_model->fetchRequestDetails($refID);
	        
	        $res = $this->fill_payment_table($userID, $refID, $details['payment_period'], $details['finance_balance']);
	        
	        $data['name'] = $details['firstName'];	

			$data['email'] = $details['email'];

			$this->email->from('donotreply@smallsmall.com', 'Small Small');

			$this->email->to($details['email']);

			$this->email->subject("Finance Approval SmallSmall");	

			$this->email->set_mailtype("html");

			$message = $this->load->view('email/header.php', $data, TRUE);

			$message .= $this->load->view('email/finance-approval.php', $data, TRUE);

			$message .= $this->load->view('email/footer.php', $data, TRUE);

			$this->email->message($message);

			$emailRes = $this->email->send();
			
	        echo 1;
	        
	    }else{
	        
	        echo 0;
	        
	    }
	    
	}


	public function deductWallet(){

		require 'vendor/autoload.php'; // For Unione template authoload
	    
	    $result = 0;
	    
	    $message = "";
	    
	    $adminID = $this->session->userdata('adminID');
	    
	    $amount = $this->input->post('amount');
	    
	    $purpose = $this->input->post('purpose');
	    
	    $userID = $this->input->post('userID');
	    
	    $new_amount = $this->deduct_wallet($userID, $amount);

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
			"id" => "8dae4af2-140f-11ee-9d68-0a93cf78caa3"
		];

		$requestCxBody = [
			"id" => "3a1e3ed8-1414-11ee-99b5-76c23e12fa03"
		];

		// end Unione Template
	    
	    if($new_amount["result"]){
	    
    	    //Update wallet
    	    if($this->admin_model->update_wallet($userID, $new_amount['amount'])){
    	        
    	        $reference = 'RSS_C_'.$this->random_strings(10);
    	        
    	        //Proceed to update transaction table
    	        if($this->loan_model->insert_wallet_transaction($reference, $userID, $amount, 'Debit', 'Successful', 'Wallet', $purpose, $adminID)){
    	            
    	            $result = 1;
    	            
    	            $message = "success";
    	            
    	            $user = $this->rss_model->get_user($userID);

					$data['name'] = $user['firstName'].' '.$user['lastName'];

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

						$deductionType = $purpose;
					
						$deductionAmount = $amount;

						$transactionDate = date('Y-m-d H:i:s');

						$transactionID = $reference;

						$walletBallance = $new_amount;

						// Replace the placeholder in the HTML body with the username

						$htmlBody = str_replace('{{Name}}', $username, $htmlBody);
						$htmlBody = str_replace('{{amount}}', $deductionAmount, $htmlBody);
						$htmlBody = str_replace('{{DeductionType}}', $deductionType, $htmlBody);

						$htmlBody = str_replace('{{Amount}}', $deductionAmount, $htmlBody);
						$htmlBody = str_replace('{{TransactioDate}}', $transactionDate, $htmlBody);
						$htmlBody = str_replace('{{DeductionType}}', $deductionType, $htmlBody);
						$htmlBody = str_replace('{{TransactionID}}', $transactionID, $htmlBody);
						$htmlBody = str_replace('{{WalletBalance}}', $walletBallance, $htmlBody);

						$data['response'] = $htmlBody;

					// Prepare the email data
						$emailData = [
							"message" => [
								"recipients" => [
									["email" => $user['email']],
								],
							"body" => ["html" => $htmlBody],
							"subject" => "Wallet Deduction Successful notification!",
							"from_email" => "donotreply@smallsmall.com",
							"from_name" => "SmallSmall Alert",
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

						//Unione Template

					try {
						$response = $client->request('POST', 'template/get.json', array(
							'headers' => $headers,
							'json' => $requestCxBody,
					));

						$jsonResponse = $response->getBody()->getContents();

						$responseData = json_decode($jsonResponse, true);

						$htmlBody = $responseData['template']['body']['html'];

						$username = $data['name'];

						$deductionType = $purpose;

						$deductionAmount = $amount;

						$transactionDate = date('Y-m-d H:i:s');

						$transactionID = $reference;

						$walletBallance = $new_amount;

						// Replace the placeholder in the HTML body with the username

						$htmlBody = str_replace('{{Name}}', $username, $htmlBody);
						$htmlBody = str_replace('{{DeductionAmount}}', $deductionAmount, $htmlBody);
						$htmlBody = str_replace('{{TransactionDate}}', $transactionDate, $htmlBody);
						$htmlBody = str_replace('{{DeductionType}}', $deductionType, $htmlBody);
						$htmlBody = str_replace('{{TransactionID}}', $transactionID, $htmlBody);

						$data['response'] = $htmlBody;

					// Prepare the email data
						$emailData = [
							"message" => [
								"recipients" => [
									["email" => 'customerexperience@smallsmall.com'],
									["email" => 'accounts@smallsmall.com'],
								],
							"body" => ["html" => $htmlBody],
							"subject" => "Wallet Deduction Successful notification!",
							"from_email" => "donotreply@smallsmall.com",
							"from_name" => "SmallSmall Alert",
							],
						];

					// Send the email using the Unione API
						$responseCxEmail = $client->request('POST', 'email/send.json', [
							'headers' => $headers,
							'json' => $emailData,
						]);
					} catch (\GuzzleHttp\Exception\BadResponseException $e) {
						$data['response'] = $e->getMessage();
					}
				} 

				if ($responseCxEmail) {

					//Unione Template

				try {
					$response = $client->request('POST', 'template/get.json', array(
						'headers' => $headers,
						'json' => $requestCxBody,
				));

					$jsonResponse = $response->getBody()->getContents();

					$responseData = json_decode($jsonResponse, true);

					$htmlBody = $responseData['template']['body']['html'];

					$username = $data['name'];

					$deductionType = $purpose;

					$deductionAmount = $amount;

					$transactionDate = date('Y-m-d H:i:s');

					$transactionID = $reference;

					$walletBallance = $new_amount;

					// Replace the placeholder in the HTML body with the username

					$htmlBody = str_replace('{{Name}}', $username, $htmlBody);
					$htmlBody = str_replace('{{DeductionAmount}}', $deductionAmount, $htmlBody);
					$htmlBody = str_replace('{{TransactionDate}}', $transactionDate, $htmlBody);
					$htmlBody = str_replace('{{DeductionType}}', $deductionType, $htmlBody);
					$htmlBody = str_replace('{{TransactionID}}', $transactionID, $htmlBody);

					$data['response'] = $htmlBody;

				// Prepare the email data
					$emailData = [
						"message" => [
							"recipients" => [
								["email" => 'accounts@smallsmall.com'],
							],
						"body" => ["html" => $htmlBody],
						"subject" => "Wallet Deduction Successful notification!",
						"from_email" => "donotreply@smallsmall.com",
						"from_name" => "SmallSmall Alert",
						],
					];

				// Send the email using the Unione API
					$responseCxEmail = $client->request('POST', 'email/send.json', [
						'headers' => $headers,
						'json' => $emailData,
					]);
				} catch (\GuzzleHttp\Exception\BadResponseException $e) {
					$data['response'] = $e->getMessage();
				}
			} 
				
				// else {

				// // echo 0;
				// // }

    	            
    	            //Send email to user
    	            // $data['name'] = $user['lastName'];
    	            
    	            // $data['amount'] = $amount;

            	    // $this->email->from('donotreply@smallsmall.com', 'SmallSmall Alert');
            
            		// $this->email->to($user['email']);
            
            		// $this->email->subject("Debit Alert!");	
            
            		// $this->email->set_mailtype("html");
            
            		// $message = $this->load->view('email/header.php', $data, TRUE);
            
            		// $message .= $this->load->view('email/debitalert.php', $data, TRUE);
            
            		// $message .= $this->load->view('email/footer.php', $data, TRUE);
            
            		// $this->email->message($message);
            
            		// $emailRes = $this->email->send();
    	        }
    	    }else{
    	        
    	        $message = "Error updating wallet";
    	        
    	    }
	    }else{
	        
	        $message = "Account balance not sufficient";
	    }
	    
	    echo json_encode(array("response" => $result, "message" => $message));
	    
	}

	
	public function deduct_wallet($userID, $amount = 0){
	    
	    $result = 0;
	    
	    $new_amount = 0;
	    
	    //Get wallet amount
	    $wallet_details = $this->admin_model->walletDetails($userID);
	    
	    if(!empty($wallet_details) && $amount > 0 && $wallet_details['account_balance'] >= $amount){
	        
	        $new_amount = $wallet_details['account_balance'] - $amount;
	        
	        //$amount = $new_amount;
	        
	        $result = 1;
	    }
	    
	    return array("result" => $result, "amount" => $new_amount);
	    
	}
	public function fill_payment_table($userID, $refID, $payment_period, $finance_balance){
	    
	    $year_one = 0;
        $year_one_months = 0;
        $year_two = 0;
        $year_two_months = 0;
        $year_three = 0;
        $year_three_months = 0;
        $year_four = 0;
        $year_four_months = 0;
        $year_five = 0;
        $year_five_months = 0;
        $year_six = 0;
        $year_six_months = 0;
        
        if($payment_period == 1){
            
            $year_one = $finance_balance;
            
            $year_one_payments = $year_one / 12;
            
            $year_one_months = $payment_period * 12;
            
            $payDate = date('Y-m-d');
            
            for($i = 1; $i <= $year_one_months; $i++){
            
                $this->admin_model->insert_schedule($userID, $refID, $year_one_payments, $payDate);
                
                $payDate = $this->endCycle($payDate, 1);
            
            }
            
        }else if($payment_period == 2){
            
            $year_two_months = $payment_period * 12;
            
            $year_one = $finance_balance * 0.6;
            
            $year_two = $inance_balance * 0.4;
            
            $year_one_payments = $year_one / 12;
            
            $year_two_payments = $year_two / 12;
            
            $payDate = date('Y-m-d');
            
            for($i = 1; $i <= $year_two_months; $i++){
                
                if($i <= 12){
            
                    $this->admin_model->insert_schedule($userID, $refID, $year_one_payments, $payDate);
                    
                    $payDate = $this->endCycle($payDate, 1);
                    
                }else if($i > 12 && $i <= 24){
                
                    for($i = 13; $i <= $year_two_months; $i++){
                    
                        $this->admin_model->insert_schedule($userID, $refID, $year_two_payments, $payDate);
                        
                        $payDate = $this->endCycle($payDate, 1);
                        
                    }
                    
                }
            
            }
            
            
        }else if($payment_period == 3){
            
            $year_three_months = $payment_period * 12;
            
            $year_one = $finance_balance * 0.45;
            
            $year_two = $finance_balance * 0.35;
            
            $year_three = $finance_balance * 0.2;
            
            $year_one_payments = $year_one / 12;
            
            $year_two_payments = $year_two/ 12;
            
            $year_three_payments = $year_three / 12;
            
            $payDate = date('Y-m-d');
            
            for($i = 1; $i <= $year_three_months; $i++){
                
                if($i <= 12){
            
                    $this->admin_model->insert_schedule($userID, $refID, $year_one_payments, $payDate);
                    
                    $payDate = $this->endCycle($payDate, 1);
                    
                }else if($i > 12 && $i <= 24){
                
                    for($i = 25; $i <= $year_three_months; $i++){
                    
                        $this->admin_model->insert_schedule($userID, $refID, $year_two_payments, $payDate);
                        
                        $payDate = $this->endCycle($payDate, 1);
                        
                    }
                    
                }else if($i > 24 && $i <= 36){
                
                    for($i = 37; $i <= $year_three_months; $i++){
                    
                        $this->admin_model->insert_schedule($userID, $refID, $year_three_payments, $payDate);
                        
                        $payDate = $this->endCycle($payDate, 1);
                        
                    }
                    
                }
            
            }
            
        }else if($payment_period == 4){
            
            $year_four_months = $payment_period * 12;
            
            $year_one = $finance_balance * 0.4;
            
            $year_two = $finance_balance * 0.3;
            
            $year_four = $finance_balance * 0.1;
            
            $year_three = $finance_balance * 0.2;
            
            $year_one_payments = $year_one / 12;
            
            $year_two_payments = $year_two / 12;
            
            $year_three_payments = $year_three / 12;
            
            $year_four_payments = $year_four / 12;
            
            $payDate = date('Y-m-d');
            
            for($i = 1; $i <= $year_four_months; $i++){
                
                if($i <= 12){
            
                    $this->admin_model->insert_schedule($userID, $refID, $year_one_payments, $payDate);
                    
                    $payDate = $this->endCycle($payDate, 1);
                    
                }else if($i > 12 && $i <= 24){
                
                    for($i = 25; $i <= $year_four_months; $i++){
                    
                        $this->admin_model->insert_schedule($userID, $refID, $year_two_payments, $payDate);
                        
                        $payDate = $this->endCycle($payDate, 1);
                        
                    }
                    
                }else if($i > 24 && $i <= 36){
                
                    for($i = 37; $i <= $year_four_months; $i++){
                    
                        $this->admin_model->insert_schedule($userID, $refID, $year_three_payments, $payDate);
                        
                        $payDate = $this->endCycle($payDate, 1);
                        
                    }
                    
                }else if($i > 37 && $i <= 48){
                
                    for($i = 49; $i <= $year_four_months; $i++){
                    
                        $this->admin_model->insert_schedule($userID, $refID, $year_four_payments, $payDate);
                        
                        $payDate = $this->endCycle($payDate, 1);
                        
                    }
                    
                }
            
            }
            
        }else if($payment_period == 5){
            
            $year_five_months = $payment_period * 12;
            
            $year_one = $finance_balance * 0.4;
            
            $year_two = $finance_balance * 0.25;
            
            $year_three = $finance_balance * 0.2;
            
            $year_four = $finance_balance * 0.1;
            
            $year_five = $finance_balance * 0.05;
            
            $year_one_payments = $year_one / 12;
            
            $year_two_payments = $year_two / 12;
            
            $year_three_payments = $year_three / 12;
            
            $year_four_payments = $year_four / 12;
            
            $year_five_payments = $year_five / 12;
            
            $payDate = date('Y-m-d');
            
            for($i = 1; $i <= $year_five_months; $i++){
                
                if($i <= 12){
            
                    $this->admin_model->insert_schedule($userID, $refID, $year_one_payments, $payDate);
                    
                    $payDate = $this->endCycle($payDate, 1);
                    
                }else if($i > 12 && $i <= 24){
                
                    for($i = 25; $i <= $year_five_months; $i++){
                    
                        $this->admin_model->insert_schedule($userID, $refID, $year_two_payments, $payDate);
                        
                        $payDate = $this->endCycle($payDate, 1);
                        
                    }
                    
                }else if($i > 24 && $i <= 36){
                
                    for($i = 37; $i <= $year_five_months; $i++){
                    
                        $this->admin_model->insert_schedule($userID, $refID, $year_three_payments, $payDate);
                        
                        $payDate = $this->endCycle($payDate, 1);
                        
                    }
                    
                }else if($i > 37 && $i <= 48){
                
                    for($i = 49; $i <= $year_five_months; $i++){
                    
                        $this->admin_model->insert_schedule($userID, $refID, $year_four_payments, $payDate);
                        
                        $payDate = $this->endCycle($payDate, 1);
                        
                    }
                    
                }else if($i > 49 && $i <= 60){
                
                    for($i = 61; $i <= $year_five_months; $i++){
                    
                        $this->admin_model->insert_schedule($userID, $refID, $year_five_payments, $payDate);
                        
                        $payDate = $this->endCycle($payDate, 1);
                        
                    }
                    
                }
            
            }
            
        }else if($unit['payment_period'] == 6){
            
            $year_six_months = $payment_period * 12;
            
            $year_one = $finance_balance * 0.35;
            
            $year_two = $finance_balance * 0.25;
            
            $year_three = $finance_balance * 0.20;
            
            $year_four = $finance_balance * 0.1;
            
            $year_five = $finance_balance * 0.05;
            
            $year_six = $finance_balance * 0.05;
            
            $year_one_payments = $year_one / 12;
            
            $year_two_payments = $year_two / 12;
            
            $year_three_payments = $year_three / 12;
            
            $year_four_payments = $year_four / 12;
            
            $year_five_payments = $year_five / 12;
            
            $year_six_payments = $year_six / 12;
            
            $payDate = date('Y-m-d');
            
            for($i = 1; $i <= $year_six_months; $i++){
                
                if($i <= 12){
            
                    $this->admin_model->insert_schedule($userID, $refID, $year_one_payments, $payDate);
                    
                    $payDate = $this->endCycle($payDate, 1);
                    
                }else if($i > 12 && $i <= 24){
                
                    for($i = 25; $i <= $year_six_months; $i++){
                    
                        $this->admin_model->insert_schedule($userID, $refID, $year_two_payments, $payDate);
                        
                        $payDate = $this->endCycle($payDate, 1);
                        
                    }
                    
                }else if($i > 24 && $i <= 36){
                
                    for($i = 37; $i <= $year_six_months; $i++){
                    
                        $this->admin_model->insert_schedule($userID, $refID, $year_three_payments, $payDate);
                        
                        $payDate = $this->endCycle($payDate, 1);
                        
                    }
                    
                }else if($i > 37 && $i <= 48){
                
                    for($i = 49; $i <= $year_six_months; $i++){
                    
                        $this->admin_model->insert_schedule($userID, $refID, $year_four_payments, $payDate);
                        
                        $payDate = $this->endCycle($payDate, 1);
                        
                    }
                    
                }else if($i > 49 && $i <= 60){
                
                    for($i = 61; $i <= $year_six_months; $i++){
                    
                        $this->admin_model->insert_schedule($userID, $refID, $year_five_payments, $payDate);
                        
                        $payDate = $this->endCycle($payDate, 1);
                        
                    }
                    
                }else if($i > 61 && $i <= 72){
                
                    for($i = 73; $i <= $year_six_months; $i++){
                    
                        $this->admin_model->insert_schedule($userID, $refID, $year_six_payments, $payDate);
                        
                        $payDate = $this->endCycle($payDate, 1);
                        
                    }
                    
                }
            
            }
            
        }
        
        return 1;
	    
	}
	
	public function share_form(){

		if ( ! file_exists(APPPATH.'views/admin/pages/send-shares.php'))
        {

                // Whoops, we don't have a page for that!
                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Send Shares";

			$this->load->view('admin/templates/header' , $data);

			$this->load->view('admin/templates/sidebar' , $data);

			$this->load->view('admin/pages/send-shares' , $data);

			$this->load->view('admin/templates/footer' , $data);

		}else{

			redirect( base_url().'admin/login','refresh');

		}

	}
	
	public function promo_form(){

		if ( ! file_exists(APPPATH.'views/admin/pages/promo-form.php'))
        {

                // Whoops, we don't have a page for that!
                show_404();

        }

		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "Send Shares";

			$this->load->view('admin/templates/header' , $data);

			$this->load->view('admin/templates/sidebar' , $data);

			$this->load->view('admin/pages/promo-form' , $data);

			$this->load->view('admin/templates/footer' , $data);

		}else{

			redirect( base_url().'admin/login','refresh');

		}

	}
	
	public function getBuytoletProperties(){
	    
	    $response = 'error';
	    
	    $result = $this->admin_model->getBuytoletProperties();
	    
	    if(!empty($result)){
	        
	        $response = 'success';
	        
	    }
	    
	    echo json_encode(array("response" => $response, "data" => $result));
	    
	}
	
	public function sendShares(){

	    $response = 'error';
	    
	    $message = '';
	    
	    $ref = md5(date('YmdHis'));
                        
        $user_id = '';
		
		$adminID = $this->session->userdata('adminID');
		
		$buyer_type = 'Investor';
		
		$payment_plan = 'co-own';
		
		$property_id = $this->input->post("properties");
		
		$prop = $this->admin_model->getBytoletPropertyByID($property_id);

		$buyBackReturnsRate = $prop['co_appr_1'] + $prop['co_appr_2'] + $prop['co_appr_3'] + $prop['co_appr_4'] + $prop['co_appr_5'] + $prop['co_appr_6'] +  $prop['co_rent_1'] + $prop['co_rent_2'] + $prop['co_rent_3'] + $prop['co_rent_4'] + $prop['co_rent_5'] + $prop['co_rent_6'];

		$propName = $prop['property_name'];

		$propLocation = $prop['location_info'];

		$buyBackRate = $buyBackReturnsRate;
		
		$holdPeriod = $prop['hold_period'];

		$migrationDate = $prop['closing_date'];

		$paymentPlanPeriod = $prop['payment_plan_period'];
		
		$email = $this->input->post('email');
		
		$company_name = $this->input->post('company');
		
		$position = $this->input->post('position');
		
		$occupation = $this->input->post('occupation');
		
		$income_range = $this->input->post('income');
		
		$company_address = $this->input->post('company-address');
		
		$promo_code = "";
		
		$unit_amount = $this->input->post("shares-amount");
		
		$offer_type = $this->input->post("offer-type");

		$payable = $unit_amount * $prop['price'];
		
		$cost = $prop['marketValue'];
		
		$payment_period = '';
		
		$mop = "Promotional";
		
		$beneficiary_id_path = 0;
		
		$id_path = 0;
		
		$res = TRUE;
		
		$user_email = 'new_user';
		
		//Get user
	    $user = $this->admin_model->check_email($email);
        
        if($user){
            //Get user ID
            $user_details = $this->admin_model->get_user_by_email($email);
            
            $user_id = $user_details['userID'];
            
            $firstname = $user_details['firstName'];
            
            $lastname = $user_details['lastName'];
            
            $phone = $user_details['phone'];
            
            $user_email == 'old_user';
            
        }else{
            //Generate new ID
            $user_id = $this->generate_user_id(12);
            
            $firstname = $this->input->post('firstname');
		
		    $lastname = $this->input->post('lastname');
		    
		    $phone = $this->input->post('phone');
            
            $details['userID'] =  $user_id;

			$details['fname'] = $firstname;

			$details['lname'] = $lastname;

			$details['email'] = $email;

			$details['phone'] = $phone;

			$res = $this->create_user_account($details);
        }
        
        if($res){
        
    		$result = $this->admin_model->insertCoOwnRequest($ref, $buyer_type, $payment_plan, $property_id, $payable, $user_id, $payable, 0, $mop, $payment_period, $unit_amount, $promo_code, $id_path, $beneficiary_id_path, $firstname, $lastname, $email, $phone, $company_name, $position, $occupation, $income_range, $company_address, $adminID, $offer_type);
    		
    		if($result){
    		    //Update the remaining pool units
    		    $new_pool_units = $prop['available_units'] - $unit_amount;
    		    
    			if($this->admin_model->update_buytolet_units($new_pool_units, $property_id)){
    			    
    			    $hash = ($offer_type == 'champions')? '53324d32554663764b30356b563146366444466851575a6b6479396e51324e526446525a5648464c6555703351556c75546c517a5532316d637a303d' : '53324d32554663764b30356b563146366444466851575a6b6479396e51324e526446525a5648464c6555703351556c75546c517a5532316d637a303d';
    			    
    			    // $email_response = $this->send_mmio_email($firstname, $lastname, $email, $hash);

					// $email_response = $this->send_unione_email($lastname, $unit_amount, $propName, $propLocation, $cost, $paymentPlanPeriod, $buyBackRate, $holdPeriod, $migrationDate, $email, $hash);

					$email_response = $this->send_buytolet_freeshares_email($lastname, $unit_amount, $propName, $email);


    			    $response = "success";
    			        
    			    if($email_response){

						$email_CxTeam = $this->send_Cx_freeshares_notification($lastname, $unit_amount, $propName, $email);
    			    
    			        $message = "Successfully sent";
    			        
    			    }else{
    			        
    			        $message = "Email send error";
    			        
    			    }
    			    
    			}else{
    			    
    			    $message = "Error updating";
    			    
    			}
    			
    		}else{
    		    
    		    $message = "Could not insert request";
    		    
    		}
        }else{
            $message = "Could not create new user";
        }
		
		echo json_encode(array("response" => $response, "msg" => $message));
	}
	
	public function publishPromo(){
	    
	    $response = 'error';
	    
	    $message = '';
	    
	    $adminID = $this->session->userdata('adminID');
	    
	    $details = $this->input->post();
	    
	    $result = $this->admin_model->publish_promo($details, $adminID);
	    
	    if($result){
	        
	        $response = "success";
	        
	        $message = "Successfully uploaded";
	        
	    }else{
	        
	        $message = "Error uploading promo";
	        
	    }
	    
	    echo json_encode(array("response" => $response, "msg" => $message));
	}
	
	public function generate_user_id($number){
	    
	    $digits = $number;
	    
		$randomNumber = '';
		
		$count = 0;

		while($count < $digits){

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;

		}		

		return $randomNumber;
	}
	
	public function send_unione_email($lastname, $unit_amount, $propName, $propLocation, $cost, $paymentPlanPeriod, $buyBackRate, $holdPeriod, $migrationDate, $email, $hash){
	    
		require 'vendor/autoload.php'; // For Unione template authoload

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
			"id" => "c67f2132-f3dd-11ed-ad01-dabfde6df242"
		];

		// end Unione Template

		try {
			$response = $client->request('POST', 'template/get.json', array(
				'headers' => $headers,
				'json' => $requestBody,
			));

			$jsonResponse = $response->getBody()->getContents();
			
			$responseData = json_decode($jsonResponse, true);

			$htmlBody = $responseData['template']['body']['html'];
			
			$username = $lastname;
			$noOFSharesBought = $unit_amount;
			$propertyInfo = $propName;
			$propertyLocation = $propLocation;
			$amountPaid = $payable;
			$completionDate = $paymentPlanPeriod;
			$propBuyBackRate = $buyBackRate;
			$propHoldPeriod = $holdPeriod;
			$propMigrationDate = $migrationDate;

			// Replace the placeholder in the HTML body with the username
			
			$htmlBody = str_replace('{{Name}}', $username, $htmlBody);
			$htmlBody = str_replace('{{sharesAmount}}', $noOFSharesBought, $htmlBody);
			$htmlBody = str_replace('{{propertyName}}', $propertyInfo, $htmlBody);
			$htmlBody = str_replace('{{propertyLocation}}', $propertyLocation, $htmlBody);
			$htmlBody = str_replace('{{amount}}', $amountPaid, $htmlBody);
			$htmlBody = str_replace('{{completionDate}}', $completionDate, $htmlBody);
			$htmlBody = str_replace('{{rate}}', $propBuyBackRate, $htmlBody);
			$htmlBody = str_replace('{{holdPeriod}}', $propHoldPeriod, $htmlBody);
			$htmlBody = str_replace('{{migrationDate}}', $propMigrationDate, $htmlBody);


			$data['response'] = $htmlBody;

			// Prepare the email data
			$emailData = [
				"message" => [
					"recipients" => [
						["email" => $email],
					],
					"body" => ["html" => $htmlBody],
					"subject" => "Thank you for your order from Buysmallsmall",
					"from_email" => "donotreply@smallsmall.com",
					"from_name" => "Buysmallsmall",
				],
			];

			// Send the email using the Unione API
			$responseEmail = $client->request('POST', 'email/send.json', [
				'headers' => $headers,
				'json' => $emailData,
			]);

			$response = json_decode($responseEmail->getBody()->getContents(), true);

        	return $response['status'];
	
		} catch (\GuzzleHttp\Exception\BadResponseException $e) {
			$data['response'] = $e->getMessage();
		}
	    
	}
	

	public function send_buytolet_freeshares_email($lastname, $unit_amount, $propName, $email){
	    
		require 'vendor/autoload.php'; // For Unione template authoload

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
			"id" => "bdf6cc3e-2c92-11ee-a048-725d8dbd0ffa"
		];

		// end Unione Template

		try {
			$response = $client->request('POST', 'template/get.json', array(
				'headers' => $headers,
				'json' => $requestBody,
			));

			$jsonResponse = $response->getBody()->getContents();
			
			$responseData = json_decode($jsonResponse, true);

			$htmlBody = $responseData['template']['body']['html'];
			
			$username = $lastname;
			$noOFShares = $unit_amount;
			$propertyName = $propName;

			// Replace the placeholder in the HTML body with the username
			
			$htmlBody = str_replace('{{Name}}', $username, $htmlBody);
			$htmlBody = str_replace('{{SharesAmount}}', $noOFShares, $htmlBody);
			$htmlBody = str_replace('{{PropertyName}}', $propertyName, $htmlBody);


			$data['response'] = $htmlBody;

			// Prepare the email data
			$emailData = [
				"message" => [
					"recipients" => [
						["email" => $email],
					],
					"body" => ["html" => $htmlBody],
					"subject" => "You have been sent Property Shares From Buysmallsmall",
					"from_email" => "donotreply@smallsmall.com",
					"from_name" => "Buysmallsmall",
				],
			];

			// Send the email using the Unione API
			$responseEmail = $client->request('POST', 'email/send.json', [
				'headers' => $headers,
				'json' => $emailData,
			]);

			$response = json_decode($responseEmail->getBody()->getContents(), true);

        	return $response['status'];
	
		} catch (\GuzzleHttp\Exception\BadResponseException $e) {

			$data['response'] = $e->getMessage();

		}
	    
	}

	public function send_Cx_freeshares_notification($lastname, $unit_amount, $propName, $email){
	    
		require 'vendor/autoload.php'; // For Unione template authoload

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
			"id" => "08cf2ff0-2c69-11ee-a93c-9e797bd96141"
		];

		// end Unione Template

		try {
			$response = $client->request('POST', 'template/get.json', array(
				'headers' => $headers,
				'json' => $requestBody,
			));

			$jsonResponse = $response->getBody()->getContents();
			
			$responseData = json_decode($jsonResponse, true);

			$htmlBody = $responseData['template']['body']['html'];
			
			$username = $lastname;
			$noOFShares = $unit_amount;
			$propertyName = $propName;
			$subscriberEmail = $email;
			$todayDate = date('m/d/Y');

			// Replace the placeholder in the HTML body with the username
			
			$htmlBody = str_replace('{{AmountofFreeShares}}', $noOFShares, $htmlBody);
			$htmlBody = str_replace('{{Email}}', $username, $htmlBody);
			$htmlBody = str_replace('{{EmailAddress}}', $subscriberEmail, $htmlBody);
			$htmlBody = str_replace('{{FreeShares}}', $noOFShares, $htmlBody);
			$htmlBody = str_replace('{{PropertyName}}', $propertyName, $htmlBody);
			$htmlBody = str_replace('{{Date}}', $todayDate, $htmlBody);

			$data['response'] = $htmlBody;

			// Prepare the email data
			$emailData = [
				"message" => [
					"recipients" => [
						["email" => 'hello@buysmallsmall.ng'],
						["email" => 'chisom.o@smallsmall.com'],
					],
					"body" => ["html" => $htmlBody],
					"subject" => "Free Shares has been sent to a User From Buysmallsmall",
					"from_email" => "donotreply@smallsmall.com",
					"from_name" => "Buysmallsmall",
				],
			];

			// Send the email using the Unione API
			$responseEmail = $client->request('POST', 'email/send.json', [
				'headers' => $headers,
				'json' => $emailData,
			]);

			$response = json_decode($responseEmail->getBody()->getContents(), true);

        	return $response['status'];
	
		} catch (\GuzzleHttp\Exception\BadResponseException $e) {

			$data['response'] = $e->getMessage();

		}
	    
	}



	//parameter array
	public function create_user_account($details){

		$password = md5('Password@123');

		$confirmationCode = md5(date('YmdHis'));

		return $this->admin_model->create_user_account($details['id'], $details['fname'], $details['lname'], $details['email'], $password, $details['phone'], $details['refCode'], $confirmationCode);

	}
	
	public function buytolet_stp_subscribers(){

		$config['total_rows'] = $this->admin_model->countSubscribers();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'admin/stp-subscribers';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->admin_model->setPageNumber($this->pagination->per_page);

			$this->admin_model->setOffset($offset);
			
			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['subscriptions'] = $this->admin_model->fetchSubscribers();			

		}

		if ( ! file_exists(APPPATH.'views/admin/pages/stp-subscribers.php'))
        {

                // Whoops, we don't have a page for that!
                show_404();

        }
		//check if Admin is logged in

		if($this->session->has_userdata('adminLoggedIn')){

			$data['adminPriv'] = $this->functions_model->getUserAccess();

			$data['adminID'] = $this->session->userdata('adminID');
			
			$data['userAccess'] = $this->session->userdata('userAccess');

			$data['title'] = "STP :: Stay SmallSmall";

			$this->load->view('admin/templates/header.php' , $data);

			$this->load->view('admin/templates/sidebar.php' , $data);

			$this->load->view('admin/pages/stp-subscribers.php' , $data);

			$this->load->view('admin/templates/footer.php' , $data);
	
		}else{
	
			redirect( base_url().'admin/login','refresh');		

		}
	}
	function random_strings($length_of_string) 
    { 
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; 
        return substr(str_shuffle($str_result), 0, $length_of_string); 
    } 
	
}
