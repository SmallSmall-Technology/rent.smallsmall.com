<?php

class Functions_model extends CI_Model {

	public function __construct()
	{
			parent::__construct();
			$this->load->database();
	}

	// Declare variables
	private $_limit;
	private $_pageNumber;
	private $_offset;
	// setter getter function
	public function setLimit($limit) {
		$this->_limit = $limit;
	}

	public function setPageNumber($pageNumber) {
		$this->_pageNumber = $pageNumber;
	}

	public function setOffset($offset) {
		$this->_offset = $offset;
	}
	public function get_user_details($id){
		$this->db->select('*');
		$this->db->from('user_tbl');
		$this->db->where('userID', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_prop_details($id){
		$this->db->select('*');
		$this->db->from('property_tbl');
		$this->db->where('propertyID', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function check_city($city, $state){
	    
		$this->db->from('cities');
		$this->db->like('name', $city);
		$this->db->where('state_id', $state);
		return $this->db->count_all_results();
	}
	public function insert_city($city, $state){
	    
	    $this->name = $city;
	    $this->state_id = $state;
	    $this->insert('cities', $this);
	}
	public function getState($id){
		$this->db->select('*');
		$this->db->from('state_tbl');
		$this->db->where('stateID', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_states($country_code){
		$this->db->select('*');
		$this->db->from('states');
		$this->db->where('country_id', $country_code);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_cities($state_code){
		$this->db->select('name');
		$this->db->from('cities');
		$this->db->where('state_id', $state_code);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_countries(){
		$this->db->select('*');
		$this->db->from('countries');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getCategoryID($category){
		$this->db->select('*');
		$this->db->from('category_tbl');
		$this->db->where('slug', $category);
		$query = $this->db->get();
		return $query->row_array();
	}	
	public function getColorDets($colorID){
		$this->db->select('*');
		$this->db->from('colours_tbl');
		$this->db->where('id', $colorID);         
		$query = $this->db->get();
		return $query->row_array();
	}
	public function getSizeDets($sizeID){
		$this->db->select('*');
		$this->db->from('sizes_tbl');
		$this->db->where('id', $sizeID);         
		$query = $this->db->get();
		return $query->row_array();
	}
	public function getAllCatCount() {

		$this->db->from('category_tbl');
		//$this->db->where('status','active');
		return $this->db->count_all_results();

	}
	public function getCatProdCount($id){

		$this->db->from('products_tbl');
		$this->db->where('productsCat', $id);
		$this->db->where('prodStatus', 'Active');
		return $this->db->count_all_results();

	}	
	public function fetchAllProductCount() {
		$this->db->from('products_tbl');
		return $this->db->count_all_results();

	}
	public function fetchAllProducts() {       
		$this->db->select('*');
		$this->db->from('products_tbl');          
		$this->db->limit($this->_pageNumber, $this->_offset);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function fetchAmenitiesCount() {
		$this->db->from('amenities_tbl');
		return $this->db->count_all_results();

	}
	public function fetchAllAmenities() {       
		$this->db->select('*');
		$this->db->from('amenities_tbl');          
		$this->db->limit($this->_pageNumber, $this->_offset);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getProduct($slug){

		$this->db->select('*');
		$this->db->from('products_tbl');
		$this->db->where('slug', $slug);
		$query = $this->db->get();
		
		if($query){
			return $query->row_array();
		}else{
			return 0;
		}
	}
	// Count all record of table in database.
	public function getParentCount() {

		$this->db->from("parent_tbl");
		//$this->db->where('status','Active');
		return $this->db->count_all_results();

	}
	
	// Count all record of table in database.
	public function getSitterCount() {

		$this->db->from("parent_tbl");
		//$this->db->where('status','Active');
		return $this->db->count_all_results();

	}
	
	// Fetch data according to per_page limit.
	public function getCatProducts($id){ 
		
		$this->db->select('*');
		$this->db->from('products_tbl');
		$this->db->where('productsCat', $id); 
		$this->db->where('prodStatus', 'Active');         
		$this->db->limit($this->_pageNumber, $this->_offset);
		$query = $this->db->get();
		return $query->result_array();
		
	}
	
	public function fetchTax() {       
		$this->db->select('*');
		$this->db->from('tax_tbl');         
		$query = $this->db->get();
		return $query->result_array();
	}
	public function fetchShippingCosts() {       
		$this->db->select('*');
		$this->db->from('shipping_cost_tbl');         
		$query = $this->db->get();
		return $query->result_array();
	}
	public function fetchCategories() {       
		$this->db->select('*');
		$this->db->from('category_tbl');         
		$query = $this->db->get();
		return $query->result_array();
	}
	public function fetchCustomerCount() {
		$this->db->select('*');
		$this->db->from("users_tbl");
		return $this->db->count_all_results();
	}
	public function fetchCustomers() {       
		$this->db->select('*');
		$this->db->from('users_tbl');         
		$query = $this->db->get();
		return $query->result_array();
	}
	public function fetchSellersCount() {
		$this->db->select('*');
		$this->db->from("stores_tbl");
		return $this->db->count_all_results();
	}
	public function fetchSellers() {       
		$this->db->select('*');
		$this->db->from('stores_tbl');         
		$query = $this->db->get();
		return $query->result_array();
	}
	public function fetchColors() {       
		$this->db->select('*');
		$this->db->from('colours_tbl');         
		$query = $this->db->get();
		return $query->result_array();
	}
	public function fetchSizes() {       
		$this->db->select('*');
		$this->db->from('sizes_tbl');         
		$query = $this->db->get();
		return $query->result_array();
	}
	public function fetchStates() {       
		$this->db->select('*');
		$this->db->from('state_tbl');         
		$query = $this->db->get();
		return $query->result_array();
	}
	public function delCategory($id){
		
		$query = $this->db->delete('category_tbl', array('id' => $id)); 

		if($query){
			return 1;
		}else{
			return 0;
		}

	}
	public function delTax($id){
		
		$query = $this->db->delete('tax_tbl', array('id' => $id)); 

		if($query){
			return 1;
		}else{
			return 0;
		}

	}
	public function delColor($id){
		
		$query = $this->db->delete('colours_tbl', array('id' => $id)); 

		if($query){
			return 1;
		}else{
			return 0;
		}

	}
	public function delSize($id){
		
		$query = $this->db->delete('sizes_tbl', array('id' => $id)); 

		if($query){
			return 1;
		}else{
			return 0;
		}

	}
	public function delShippingCost($id){
		
		$query = $this->db->delete('shipping_cost_tbl', array('id' => $id)); 

		if($query){
			return 1;
		}else{
			return 0;
		}

	}
	public function delShippingMethod($id){
		
		$query = $this->db->delete('shipping_methods_tbl', array('id' => $id)); 

		if($query){
			return 1;
		}else{
			return 0;
		}

	}
	public function delSubCategories($id){
		
		$query = $this->db->delete('sub_category_tbl', array('catID' => $id)); 

		if($query){
			return 1;
		}else{
			return 0;
		}

	}
	public function fetchShippingMethods() {       
		$this->db->select('*');
		$this->db->from('shipping_methods_tbl');         
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getAllBlogs() {       
		$this->db->select('*');
		$this->db->from('blog_tbl'); 
		$this->db->where('status', 'Active');        
		$this->db->limit($this->_pageNumber, $this->_offset);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getAllFilteredJobCount($s_data) {

		$this->db->from('jobs_tbl');
		$this->db->where('status','active');


		if($s_data['designation'] ){
			$this->db->like('designation',serialize($s_data['designation']));
		}
		/*
		if($s_data['language']){
			$this->db->like('language',serialize($s_data['language']));
		}
		if($s_data['gender']){
			$this->db->where('gender',$s_data['gender']);
		}
		*/
		if($s_data['state']){
			$this->db->where('state',$s_data['state']);
		}

		if($s_data['city'] ){
			$this->db->like('city',$s_data['city']);
		}	
		return $this->db->count_all_results();

	}

	public function getAllBabysittingJobCount() {

		$this->db->from('jobs_tbl');
		//$this->db->where('status','active');
		$this->db->like('designation',serialize('Babysitter'));
		return $this->db->count_all_results();

	}

	public function getAllNannyJobCount() {

		$this->db->from('jobs_tbl');
		//$this->db->where('status','active');
		$this->db->like('designation',serialize('Nanny'));
		return $this->db->count_all_results();

	}

	/*public function getAllResponseCount($id) {

		$this->db->from('job_response_tbl');
		$this->db->where('jobID',$id);
		return $this->db->count_all_results();

	}*/


	// Fetch data according to per_page limit.
	public function jobSearchList() {       
		$this->db->select('*');
		$this->db->from('jobs_tbl'); 
		//$this->db->where('status', 'active');         
		$this->db->limit($this->_pageNumber, $this->_offset);
		$query = $this->db->get();
		return $query->result_array();
	}

	// Fetch data according to per_page limit.
	public function babysittingJobSearchList() {       
		$this->db->select('*');
		$this->db->from('jobs_tbl'); 
		//$this->db->where('status', 'active');
		$this->db->like('designation',serialize('Babysitter'));			         
		$this->db->limit($this->_pageNumber, $this->_offset);
		$query = $this->db->get();
		return $query->result_array();
	}

	// Fetch data according to per_page limit.
	public function nannyJobSearchList() {       
		$this->db->select('*');
		$this->db->from('jobs_tbl'); 
		//$this->db->where('status', 'active');
		$this->db->like('designation',serialize('Nanny'));         
		$this->db->limit($this->_pageNumber, $this->_offset);
		$query = $this->db->get();
		return $query->result_array();
	}

	// Filter data according to per_page limit.
	public function get_quick_list($s_data)  
	{  
		$this->db->select('*');
		$this->db->from('sitter_tbl'); 
		//$this->db->where('status', 'active');   
		//$this->db->join('tbl_specialisation as ts', 'ts.spec_id = td.spec_id','left');

		if($s_data['designation'] ){
			$this->db->like('designation',serialize($s_data['designation']));
		}
		if($s_data['language']){
			$this->db->like('language',serialize($s_data['language']));
		}
		if($s_data['state']){
			$this->db->where('state',$s_data['state']);
		}
		if($s_data['gender']){
			$this->db->where('gender',$s_data['gender']);
		}			
		if($s_data['city'] ){
			$this->db->like('city',$s_data['city']);
		}


		$this->db->limit($this->_pageNumber, $this->_offset);
		$query = $this->db->get(); 
		return $query->result_array();
	}

	public function get_job_filtered_list($s_data){      
		$this->db->select('*');
		$this->db->from('jobs_tbl'); 
		//$this->db->where('status', 'active');

		if($s_data['designation'] ){
			$this->db->like('designation',serialize($s_data['designation']));
		}
		/*if($s_data['language']){
			$this->db->like('language',serialize($s_data['language']));
		}
		if($s_data['gender']){
			$this->db->where('gender',$s_data['gender']);
		}*/
		if($s_data['state']){
			$this->db->where('state',$s_data['state']);
		}			
		if($s_data['city'] ){
			$this->db->like('city',$s_data['city']);
		}


		$this->db->limit($this->_pageNumber, $this->_offset);
		$query = $this->db->get();
		return $query->result_array();
	}


	public function getPosterDetails($id){
		$this->db->select('*');
		$this->db->from('parent_tbl');
		$this->db->where('parentID', $id);
		$query = $this->db->get();
		return $query->row_array();
	}		

	public function get_designations() {

		$this->db->select('*');
		$this->db->from('designation');
		$query = $this->db->get();
		return $query->result();


	}

	public function get_qualities() {

		$this->db->select('*');
		$this->db->from('qualities');
		$query = $this->db->get();
		return $query->result();


	}
	
	public function getUserAccess() {

		$this->db->select('*');
		$this->db->from('user_access_tbl');
		$query = $this->db->get();
		return $query->result();


	}

	public function get_subscription_plan(){
		$this->db->select('*');
		$this->db->from('subscription_plan_tbl');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_ages() {

		$this->db->select('*');
		$this->db->from('ages');
		$query = $this->db->get();
		return $query->result();


	}

	public function get_parent($id){
		$this->db->select('*');
		$this->db->from('parent_tbl');
		$this->db->where('parentID', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function get_sitter($id){
		$this->db->select('*');
		$this->db->from('sitter_tbl');
		$this->db->where('profileID', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_languages() { 

		$this->db->select('*');
		$this->db->from('languages'); 
		$query = $this->db->get();
		return $query->result();

	}

	public function get_job($jid){
		$this->db->select('*');
		$this->db->from('jobs_tbl');
		$this->db->where('jobID', $jid); 
		$query = $this->db->get();
		return $query->row_array();
	}

	public function messageInfo($mid){
		$this->db->select('*');
		$this->db->from('message_tbl');
		$this->db->where('id', $mid); 
		$query = $this->db->get();
		return $query->row_array();
	}

	public function update_view($jobId, $views)
	{
		$this->views = $views;
		$this->db->where('jobID', $jobId);
		if($this->db->update('jobs_tbl', $this))
		{
			//Successful insertion
			return 1;
		}else{
			return "Error uploading details!";
		}

	}
	
	public function checkEmail($email)
	{

		$this->db->select('email');

		$this->db->from('users_tbl');

		$this->db->where('email', $email);

		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() > 0){

			return $query->row_array();

		}else{

			return 0;

		}

	}
	public function checkShipping($state)
	{

		$this->db->select('*');

		$this->db->from('shipping_cost_tbl');

		$this->db->where("FIND_IN_SET( '$state' , stateID)");

		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() > 0){

			return $query->row_array();

		}else{

			return 0;

		}

	}

	public function check_responder($jobId, $posterId, $responder)
	{

		$this->db->select('*');
		$this->db->from('job_response_tbl');
		$this->db->where('jobID', $jobId);
		$this->db->where('responderID', $responder);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return 1;
		}else{
			return 0;	
		}
	}				

	public function insert_response($jobId, $posterId, $responder){

		$this->jobID    = $jobId; // please read the below note
		$this->posterID    = $posterId;
		$this->responderID    = $responder;
		$this->responseDate = date('Y-m-d H:i:s');

		if($this->db->insert('job_response_tbl', $this)){
			return 1;
		}else{
			return 0;
		}			
	}

	public function msg_info($sitterId, $parentId){

		$this->db->select('*');
		$this->db->from('sitter_tbl');
		$this->db->where('profileID', $sitterId);
		$query = $this->db->get();			
		return $query->row_array();

	}
	public function getAllCategories(){

		$this->db->select('*');
		$this->db->from('category_tbl');
		$query = $this->db->get();			
		return $query->result_array();

	}
	
	public function getSubs($id){
		$this->db->select('*');
		$this->db->from('sub_category_tbl');
		$this->db->where('catID', $id);
		$query = $this->db->get();			
		return $query->result_array();
	}
	
	public function getArticle($slug){

		$this->db->select('*');
		$this->db->from('blog_tbl');
		$this->db->where('articleSlug', $slug);
		$query = $this->db->get();			
		return $query->row_array();

	}
	
	public function customerLogin($username, $password){

		$this->db->select('firstName, lastName, userID, email, status');

		$this->db->from('users_tbl');

		$this->db->where('email', $username);

		$this->db->where('password', $password);

		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() > 0){

			return $query->row_array();

		}else{
			
			return 0;

		}

	}

	public function deleteMessage($msgId)
	{
		$this->status = 'Deleted';
		$this->db->where('id', $msgId);
		if($this->db->update('message_tbl', $this))
		{
			//Successful insertion
			return 1;
		}else{
			return "Error uploading details!";
		}

	}
	
	public function updateMsgStatus($msgID)
	{
		$this->status = 'Read';
		$this->db->where('id', $msgID);
		if($this->db->update('message_tbl', $this))
		{
			//Successful insertion
			return 1;
		}else{
			return "Error updating details!";
		}

	}

	public function send_job_msg($sitterId, $parentId, $sitterEmail, $subject, $message){

		$this->msgContent    = $message; 
		$this->msgReceiver    = $sitterId;
		$this->msgSender    = $parentId;
		$this->msgSubject    = $subject;
		$this->status    = 'Unread';
		$this->receiverEmail    = $sitterEmail;
		$this->dateSent = date('Y-m-d H:i:s');

		if($this->db->insert('message_tbl', $this)){
			return 1;
		}else{
			return 0;
		}
	}
	
	public function insertShippingAddress($s_name, $s_address, $s_city, $s_state, $s_phone, $s_add){
		
	}
	
	public function customerReg($fName, $lName, $b_address, $b_city, $b_state, $phone, $password, $email){
		
		$digits = 10;

		$randomNumber = '';

		$count = 0;

		while($count < $digits){

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;

		}

		$customerID = $randomNumber;
		
		$this->userID    = $customerID; 
		$this->msgReceiver    = $fName;
		$this->msgSender    = $lName;
		$this->address    = $b_address;
		$this->city    = $b_city;
		$this->state    = $b_state;
		$this->phone    = $phone;
		$this->password    = $password;
		$this->email    = $email;
		$this->status  = 'Active';
		
		if($this->db->insert('users_tbl', $this)){
			return 1;
		}else{
			return 0;
		}
	}
	public function insertOrder($orderID, $itemCount, $s_name, $s_address, $s_city, $s_state, $s_phone, $s_add, $totalCost, $shippingAmount){
		
		$digits = 6;

		$randomNumber = '';

		$count = 0;

		while($count < $digits){

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;

		}

		$invoiceID = $randomNumber;
		
		$this->orderID    = $orderID; 
		$this->productCount    = $itemCount;
		$this->shippingName    = $s_name;
		$this->shippingAddress    = $s_address;
		$this->shippingCity    = $s_city;
		$this->shippingState    = $s_state;
		$this->shippingPhone    = $s_phone;
		$this->totalAmt    = $totalCost;
		$this->shippingAmount    = $shippingAmount;
		$this->invoiceNum =  $invoiceID;
		$this->status  = 'Processing';
		$this->purchaseDate =  date('Y-m-d H:i:s');
		
		if($this->db->insert('order_tbl', $this)){
			return 1;
		}else{
			return 0;
		}
	}

	public function send_sitter_msg($sitterId, $parentId, $parentEmail, $subject, $message){

		$this->msgContent    = $message; 
		$this->msgReceiver    = $parentId;
		$this->msgSender    = $sitterId;
		$this->msgSubject    = $subject;
		$this->status    = 'Unread';
		$this->receiverEmail    = $parentEmail;
		$this->dateSent = date('Y-m-d H:i:s');

		if($this->db->insert('message_tbl', $this)){
			return 1;
		}else{
			return 0;
		}
	}

	function xTimeAgo($newTime) {

	   $timestamp = strtotime($newTime);	

	   $strTime = array("second", "minute", "hour", "day", "month", "year");
	   $length = array("60","60","24","30","12","10");

	   $currentTime = time();
	   if($currentTime >= $timestamp) {
			$diff     = time()- $timestamp;
			for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
			$diff = $diff / $length[$i];
			}

			$diff = round($diff);
			if($diff > 1){	
				return $diff . " " . $strTime[$i] . "s ago ";
			}else{
				return $diff . " " . $strTime[$i] . " ago ";
			}
	   }

	} 

	public function get_last_login($myDate){

		$myWeek = array("Today","Yesterday");

		for($i=1;$i<=7;$i++){
			array_push($myWeek,date('l',strtotime('-'.$i.' day')));
		}

		if($myDate> strtotime('-7 day')){
			return $myWeek[(time()-$myDate)/(86400)];
		}
		else{
			return date('d-M-Y',$myDate); // else just return the date as a normal date string
		}

	}

	function shorten_echo($x, $length)
	{
		if(strlen($x)<=$length){
			echo $x;
		}
		else{
			$y=substr($x,0,$length) . ' [...]';
			echo $y;
		}
	}

	function get_fchar_name($str){
		if($str)
		return strtoupper(substr($str, 0, 1));
		return false;	
	}

	public function get_all_state()
	{
		$this->db->select('*');
		$this->db->from('state_tbl'); 
		$query = $this->db->get();
		return $query->result();
	}
	public function getHomeCategories() {       

		$this->db->select('*');

		$this->db->from('category_tbl');  
		
		$this->db->order_by("id", "DESC");       

		$this->db->limit(4);

		$query = $this->db->get();

		return $query->result_array();

	}
	public function getRelatedProductByCategory($categoryID){
		
		$this->db->select('*');

		$this->db->from('products_tbl');  
		
		$this->db->where('productsCat', $categoryID);

		$this->db->limit(4);

		$query = $this->db->get();

		return $query->result_array();
		
	}
	public function getSubscriptionDetails($id){
		$this->db->select('*');
		$this->db->from('subscription_tbl');
		$this->db->where('userID', $id);
		$this->db->where('subscriptionStatus', 'Active');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function update_subscription($id, $amount){

		if($amount == 12000){

			$plan = 'Basic';
			$duration = strtotime("+3 months");

		}elseif($amount == 20000){

			$plan = 'Standard';
			$duration = strtotime("+6 months");

		}elseif($amount == 35000){

			$plan = 'Premium';
			$duration = strtotime("+12 months");

		}else{
			$plan = 'Free';
			$duration = strtotime("+7 days");
		}

		$this->userID = $id;
		$this->amount = $amount;
		$this->subscriptionPlan = $plan;
		$this->subscriptionStatus = 'Active';
		$this->duration = $duration;
		$this->dateOfPayment = date('Y-m-d H:i:s');

		if($this->db->insert('subscription_tbl', $this)){
			$data = array('subscribed' => 'Yes');
			$this->db->where('parentID', $id);
			$res = $this->db->update('parent_tbl', $data);
			
			if($res){
				return 1;
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
	
	public function updateArticleViews($views, $slug){
		
		$data = array('views' => $views);
		$this->db->where('articleSlug', $slug);
		$res = $this->db->update('blog_tbl', $data);
	}
	
	public function insert_user_notifications($title, $message, $userID, $platform){
	    
	    $this->subject = $title;
	    
	    $this->details = $message;
	    
	    $this->userID = $userID;
	    
	    $this->platform = $platform;
	    
	    $this->status = 0;
	    
	    $this->entry_time = date('h:i:s');
	    
	    $this->entry_date = date('Y-m-d');
	    
	    return $this->db->insert('user_notification', $this);
	    
	}

}

?>