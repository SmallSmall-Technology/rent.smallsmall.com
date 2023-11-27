<?php

class Admin_model extends CI_Model {

	public function __construct()
	{

		parent::__construct();

		//$this->load->database();
		
		$this->db2 = $this->load->database('second', TRUE);

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
	
	public function getSearchCount($s_data) {


		$this->db->select('*');

		$this->db->from('property_tbl');   

		//$this->db->join('tbl_specialisation as ts', 'ts.spec_id = td.spec_id','left');

		if($s_data['s_query']){

			$this->db->like('propertyTitle', $s_data['s_query']);

		}

		/*if($s_data['s_query']){

			$this->db->where('propertyID', $s_data['s_query']);

		}*/
		
		return $this->db->count_all_results();

	}
	public function getUserSearchCount($s_data) {

		$this->db->select('a.*, b.*');

		$this->db->from('user_tbl as a'); 
		
		$this->db->join('login_tbl as b', 'b.userID = a.userID');
		
		$this->db->where("(a.firstName LIKE '%".$s_data['s_query']."%' OR a.lastName LIKE '%".$s_data['s_query']."%')");
		
		return $this->db->count_all_results();

	}
	public function countWalletAccounts() {

		$this->db->from('virtual_account as a'); 
		
		$this->db->join('user_tbl as b', 'b.userID = a.userID');
		
		//$this->db->where("(a.firstName LIKE '%".$s_data['s_query']."%' OR a.lastName LIKE '%".$s_data['s_query']."%')");
		
		return $this->db->count_all_results();

	}
	public function countWalletAccountsSearch($s_data) {

		$this->db->from('virtual_account as a'); 
		
		$this->db->join('user_tbl as b', 'b.userID = a.userID');
		
		$this->db->where("(b.firstName LIKE '%".$s_data['s_query']."%' OR b.lastName LIKE '%".$s_data['s_query']."%')");
		
		return $this->db->count_all_results();

	}
	public function countUserWalletAccounts($id) {

		$this->db->from('wallet_transactions'); 
		
		$this->db->where('user_id', $id);
		
		return $this->db->count_all_results();

	}
	public function countBuytoletRequests(){
	    
	    $this->db->from('buytolet_request');
	    
	    return $this->db->count_all_results();
	    
	}
	public function countUnreadRequests(){
		$this->db->select('*');

		$this->db->from('messages_tbl'); 
		
		$this->db->where('status', 'unread');
		
		return $this->db->count_all_results();
	}
	public function countRequests($id) {

		$this->db->from('messages_tbl');
		
		$this->db->like('receiver', $id);
		
		$this->db->like('receiver', "");

		return $this->db->count_all_results();

	}
	public function countNotifications() {

		$this->db->from('notification_tbl');

		return $this->db->count_all_results();

	}
	public function countInspSearchRequests($id, $s_data) {
	
		$this->db->select('a.*, b.*');

		$this->db->from('user_tbl as a'); 
		
		$this->db->join('messages_tbl as b', 'b.sender = a.userID');
		
		$this->db->where("(a.firstName LIKE '%".$s_data['s_query']."%' OR a.lastName LIKE '%".$s_data['s_query']."%')");
		
		return $this->db->count_all_results();

	}
	public function countApartments() {

		$this->db->from('stayone_apartments');

		return $this->db->count_all_results();

	}

	public function countAdverts() {

		$this->db->from('cx_adverts');

		return $this->db->count_all_results();
	}

	public function get_advert($id) {       

		$this->db->select('*');

		$this->db->from('cx_adverts');          

		$this->db->where('id', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function delAdvert($bookingID){
	    
	    $this->db-> where('id', $bookingID);
    	
		if($this->db->delete('cx_adverts')){
		    
		   return 1; 
		        
		}

		else{
			
			return 0;
			
		}
		
	}

	public function fetchadverts() {       

		$this->db->select('*');

		$this->db->from('cx_adverts');          

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();

	}

	public function countBookings() {

		$this->db->from('stayone_booking');

		return $this->db->count_all_results();
	}

	public function countAppRequests() {

		$this->db2->from('residential_inspections');

		return $this->db2->count_all_results();

	}
	public function countVerifications() {

		$this->db->from('verifications');

		return $this->db->count_all_results();

	}
	public function countAppVerifications() {

		$this->db->from('verifications');

		return $this->db2->count_all_results();

	}
	public function countItems() {

		$this->db->from('furnisure_tbl');

		return $this->db->count_all_results();

	}
	public function countProperties() {

		$this->db->from('property_tbl');

		return $this->db->count_all_results();

	}
	public function countPropertyAlert() {

		$this->db->from('property_alert');

		return $this->db->count_all_results();

	}
	public function countBuytoletProperties() {

		$this->db->from('buytolet_property');

		return $this->db->count_all_results();

	}

	public function countRssUsers() {

		$this->db->from('user_tbl');

		return $this->db->count_all_results();

	}

	public function countRssUser() {

		$this->db->from('user_tbl');
        
        $this->db->where('verified', 'yes');
        
		return $this->db->count_all_results();

	}

	public function countBtlUsers() {

		$this->db->from('user_tbl');
		
		$this->db->where('interest', 'Buy');

		return $this->db->count_all_results();

	}
	public function countTransactions($type) {

		$this->db->from('transaction_tbl');
		
		$this->db->where('type', $type);

		return $this->db->count_all_results();

	}
	public function countAppTransactions() {

		$this->db2->from('user_payments');

		return $this->db2->count_all_results();

	}
	public function countPropBookings(){
		
		$this->db->from('bookings');

		return $this->db->count_all_results();
	}
	public function countBtlProperties() {

		$this->db->from('buytolet_property');

		return $this->db->count_all_results();

	}
	public function countBtlInspRequests() {

		$this->db->from('buytolet_inspection');

		return $this->db->count_all_results();

	}
	public function countUsers() {

		$this->db->from('user_tbl');

		return $this->db->count_all_results();

	}
    public function countAppUsers() {

		$this->db2->from('users');

		return $this->db2->count_all_results();

	}
	public function countAmenity() {

		$this->db->from('amenity_tbl');

		return $this->db->count_all_results();

	}

	public function countAptType() {

		$this->db->from('apt_type_tbl');

		return $this->db->count_all_results();

	}

	public function countRentType() {

		$this->db->from('apt_type_tbl');

		return $this->db->count_all_results();

	}
    public function countAllNews() {

		$this->db->from('blog_tbl');

		return $this->db->count_all_results();

	}
	public function countFurnisureType() {

		$this->db->from('furnisure_type_tbl');

		return $this->db->count_all_results();

	}

	public function countFacilityCategory() {

		$this->db->from('facility_category');

		return $this->db->count_all_results();

	}

	public function countNeighborhoodDistance() {

		$this->db->from('distance_tbl');

		return $this->db->count_all_results();

	}

	public function countFurnisureCategory() {

		$this->db->from('furnisure_category_tbl');

		return $this->db->count_all_results();

	}

	public function fetchFurnisureCategories() {       

		$this->db->select('*');

		$this->db->from('furnisure_category_tbl');          

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();

	}
	public function fetchServices() {       

		$this->db->select('*');

		$this->db->from('services_tbl'); 

		$query = $this->db->get();

		return $query->result_array();

	}
	public function fetchItems(){
		
		$this->db->select('a.id, a.applianceID, a.applianceName, a.category, a.applianceType, a.cost, a.securityDeposit, a.folderName, a.featuredImg, a.views, a.dateOfEntry, b.id, b.category as categoryName, c.id, c.type');
		
		$this->db->from('furnisure_tbl as a');
		
		$this->db->join('furnisure_category_tbl as b', 'b.id = a.category'); 
		
		$this->db->join('furnisure_type_tbl as c', 'c.id = a.applianceType');
		
		$this->db->order_by('a.id', 'DESC');
		
		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
		
		
	}
	public function fetchVerifications(){
		
		$this->db->select('a.id, a.verification_id, a.user_id, a.gross_annual_income, a.marital_status, a.occupation, a.created_at, a.updated_at, a.employment_status, b.firstName, b.lastName, b.status, b.email, b.verified');
		
		$this->db->from('verifications as a');
		
		$this->db->join('user_tbl as b', 'b.userID = a.user_id'); 
		
		$this->db->order_by('a.id', 'DESC');
		
		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
		
		
	}
	public function fetchAppVerifications(){
		
		$this->db2->select('a.id, a.user_id, a.gross_annual_income, a.marital_status, a.occupation, a.created_at, a.updated_at, a.employment_status, b.name, b.email, a.is_verified');
		
		$this->db2->from('verifications as a');
		
		$this->db2->join('users as b', 'b.id = a.user_id'); 
		
		$this->db2->order_by('a.id', 'DESC');
		
		$this->db2->limit($this->_pageNumber, $this->_offset);

		$query = $this->db2->get();

		return $query->result_array();
		
		
	}
	public function fetchItem($id){
		
		$this->db->select('*');
		
		$this->db->from('furnisure_tbl');
		
		$this->db->where('applianceID', $id);

		$query = $this->db->get();

		return $query->row_array();
		
		
	}
	public function fetchRssUsers() {       

		$this->db->select('a.firstName, a.lastName, a.id, a.userID, a.email, a.phone, a.income, a.verified, a.referral, a.regDate, b.userID, b.lastLogin');

		$this->db->from('user_tbl as a'); 
		
		$this->db->join('login_tbl as b', 'b.userID = a.userID');
		
		$this->db->order_by('a.id', 'DESC');

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();

	}

	public function get_username($propID)
	{
		$this->db->select('*');
		
		$this->db->from('user_tbl');
		
		$this->db->where('userID', $propID);
		
		$query = $this->db->get();
		
		return $query->row_array();
	}

	public function fetchRssUser() {       

		$this->db->select('a.firstName, a.lastName, a.id, a.userID, a.email, a.phone, a.income, a.verified, a.referral, a.regDate, b.userID, b.lastLogin');

		$this->db->from('user_tbl as a'); 
		
		$this->db->where('a.verified', 'yes');
		
		$this->db->join('login_tbl as b', 'b.userID = a.userID');
		
		$this->db->order_by('a.id', 'DESC');

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();

	}

	public function fetchAppUsers() {       

		$this->db2->select('*');

		$this->db2->from('users'); 
		
		$this->db2->order_by('id', 'DESC');

		$this->db2->limit($this->_pageNumber, $this->_offset);

		$query = $this->db2->get();

		return $query->result_array();

	}
	public function fetchBtlUsers() {       

		$this->db->select('*');

		$this->db->from('user_tbl'); 
		
		$this->db->where('interest', 'Buy');
		
		$this->db->order_by('id', 'DESC');         

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();

	}
	public function get_btl_user($id) {       

		$this->db->select('*');

		$this->db->from('buytolet_users');

		$this->db->where('userID', $id);            

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->row_array();

	}
	public function fetchFurnisureTypes() {       

		$this->db->select('*');

		$this->db->from('furnisure_type_tbl');          

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();

	}

	public function fetchRequests($id) {
	    
	    $this->db->select('a.id as msgID, a.requestID, a.content, a.sender, a.receiver, a.subject, a.status as msg_status, a.dateOfEntry, b.id as insID, b.inspectionID, b.propertyID, b.userID, b.inspectionDate, b.inspectionType, c.firstName, c.lastName, c.userID, d.propertyTitle ');

		$this->db->from('messages_tbl as a');
		
		$this->db->where_not_in('a.sender', $id);
		
		$this->db->join('inspection_tbl as b', "b.inspectionID = a.requestID");
		
		$this->db->join('user_tbl as c', "c.userID = b.userID");
		
		$this->db->join('property_tbl as d', "d.propertyID = b.propertyID");

		$this->db->limit($this->_pageNumber, $this->_offset);
		
		$this->db->order_by('msgID', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	    

		/*$this->db->select('a.id, a.inspectionID, a.userID, a.propertyID, a.inspectionDate, a.inspectionType, a.dateOfEntry, b.id as msgID, b.requestID, b.subject,b.content,b.sender, b.status as msg_status, b.updated, c.firstName, c.lastName, c.userID, d.propertyTitle'); 

		$this->db->from('inspection_tbl as a');
		
		$this->db->join('messages_tbl as b', "b.requestID = a.inspectionID");
		
		$this->db->join('user_tbl as c', "c.userID = a.userID");
		
		$this->db->join('property_tbl as d', "d.propertyID = a.propertyID");

		$this->db->limit($this->_pageNumber, $this->_offset);
		
		$this->db->order_by('id', 'DESC');

		$query = $this->db->get();

		return $query->result_array();*/

	}
	
	public function fetchInspSearchRequests($id, $s_data) {
	    
	    $this->db->select('a.id as msgID, a.requestID, a.content, a.sender, a.receiver, a.subject, a.status as msg_status, a.dateOfEntry, b.id as insID, b.inspectionID, b.propertyID, b.userID, b.inspectionDate, b.inspectionType, c.firstName, c.lastName, c.userID, d.propertyTitle ');
	    
	    $this->db->from('user_tbl as c');
	    
	    $this->db->where("(c.firstName LIKE '%".$s_data['s_query']."%' OR c.lastName LIKE '%".$s_data['s_query']."%')");
		
		$this->db->where_not_in('a.sender', $id);

		$this->db->join('messages_tbl as a', 'a.sender = c.userID');
		
		$this->db->join('inspection_tbl as b', "b.inspectionID = a.requestID");
		
		$this->db->join('property_tbl as d', "d.propertyID = b.propertyID");

		$this->db->limit($this->_pageNumber, $this->_offset);
		
		$this->db->order_by('a.id', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	    
	}

	public function fetchAmenities() {       

		$this->db->select('*');

		$this->db->from('amenity_tbl');          

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();

	}

	public function getNDist(){

		$this->db->select('*');

		$this->db->from('distance_tbl');          

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();

	}

	public function getFCat(){

		$this->db->select('*');

		$this->db->from('facility_category');          

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();

	}

	public function fetchAptType() {       

		$this->db->select('*');

		$this->db->from('apt_type_tbl');          

		$query = $this->db->get();

		return $query->result_array(); 

	}
	public function fetchInvestType() {       

		$this->db->select('*');

		$this->db->from('buytolet_investment_type');          

		$query = $this->db->get();

		return $query->result_array(); 

	}
	public function fetchStayType() {       

		$this->db->select('*');

		$this->db->from('stay_type_tbl');          

		$query = $this->db->get();

		return $query->result_array(); 

	}
	public function fetchFurnishings() {       

		$this->db->select('*');

		$this->db->from('furnishings');          

		$query = $this->db->get();

		return $query->result_array(); 

	}

	public function fetchRentType() {       

		$this->db->select('*');

		$this->db->from('rent_type');          

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();

	}

	public function fetchFurnitureType() {       

		$this->db->select('*');

		$this->db->from('furnisure_category_tbl');          

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();

	}

	public function fetchFacilityCategories() {       

		$this->db->select('*');

		$this->db->from('facility_category');          

		$query = $this->db->get();

		return $query->result_array();

	}
	public function fetchProperties() {       

		$this->db->select('a.id, a.propertyID, a.propertyTitle, a.propertyDescription, a.rentalCondition, a.furnishing, a.price, a.serviceCharge, a.securityDeposit, a.verification, a.propertyType as prop_type, a.renting_as, a.paymentPlan, a.frequency, a.intervals, a.amenities, a.bed, a.toilet, a.bath, a.address, a.city, a.state, a.country, a.status, a.imageFolder, a.featuredImg, a.poster, a.views, a.available_date, a.dateOfEntry, b.type, b.id, b.slug, c.name, c.id, c.country_id');

		$this->db->from('property_tbl as a');  
		
		$this->db->join('apt_type_tbl as b', 'b.id = a.propertyType','left');
		
		$this->db->join('states as c', 'c.id = a.state','left');

		$this->db->limit($this->_pageNumber, $this->_offset);
		
		$this->db->order_by('a.id', 'DESC');

		$query = $this->db->get();

		return $query->result_array(); 

	}
	public function fetchBuytoletProperties() {       

		$this->db->select('a.id, a.propertyID, a.property_name, a.price, a.property_info, a.apartment_type as prop_type, a.bed, a.toilet, a.bath, a.address, a.city, a.state, a.country, a.status, a.image_folder, a.featured_image, a.poster, a.views, a.date_of_entry, a.payment_plan, a.payment_plan_period, a.minimum_payment_plan, a.pool_units, a.pool_buy, a.availability, a.active, a.promo_price, a.promo_category, a.asset_appreciation_1, a.asset_appreciation_2, a.asset_appreciation_3, a.asset_appreciation_4, a.asset_appreciation_5, b.type, b.id, b.slug, c.name, c.id, c.country_id, d.type as investmentType');

		$this->db->from('buytolet_property as a');  
		
		$this->db->join('apt_type_tbl as b', 'b.id = a.apartment_type','left');
		
		$this->db->join('states as c', 'c.id = a.state','left'); 
		
		$this->db->join('buytolet_investment_type as d', 'd.id = a.investment_type','left'); 

		$this->db->limit($this->_pageNumber, $this->_offset); 
		
		$this->db->order_by('a.id', 'DESC');

		$query = $this->db->get();

		return $query->result_array();  

	}
	public function fetchPropertyAlert() {       

		$this->db->select('a.* , b.*');

		$this->db->from('property_alert as a');  
		
		$this->db->join('apt_type_tbl as b', 'b.id = a.property_type','left');
		
		$this->db->limit($this->_pageNumber, $this->_offset);
		
		$this->db->order_by('a.id', 'DESC');

		$query = $this->db->get();

		return $query->result_array(); 

	}
	public function get_property_list($s_data){
		$this->db->select('a.id, a.propertyID, a.propertyTitle, a.propertyDescription, a.rentalCondition, a.furnishing, a.price, a.serviceCharge, a.securityDeposit, a.verification, a.propertyType as prop_type, a.renting_as, a.paymentPlan, a.frequency, a.intervals, a.amenities, a.bed, a.toilet, a.bath, a.address, a.city, a.state, a.country, a.status, a.imageFolder, a.featuredImg, a.poster, a.views, a.available_date, a.dateOfEntry, b.type, b.id, b.slug, c.name, c.id, c.country_id');
		

		$this->db->from('property_tbl as a'); 


		/*if($s_data['s_query']){

			$this->db->like('propertyID', $s_data['s_query']);

		}*/
		
		if($s_data['s_query']){

			$this->db->like('a.propertyTitle', $s_data['s_query']);

		}
		
		$this->db->join('apt_type_tbl as b', 'b.id = a.propertyType','left');
		
		$this->db->join('states as c', 'c.id = a.state','left');

		$this->db->limit($this->_pageNumber, $this->_offset);

		$this->db->order_by('a.id', 'DESC'); 

		$query = $this->db->get(); 

		return $query->result_array(); 
		
	}
	public function get_user_list($s_data){
		
		$this->db->select('a.*, b.userID, b.lastLogin');

		$this->db->from('user_tbl as a'); 
		
		$this->db->join('login_tbl as b', 'b.userID = a.userID');
		
		$this->db->where("(a.firstName LIKE '%".$s_data['s_query']."%' OR a.lastName LIKE '%".$s_data['s_query']."%')");

		$this->db->limit($this->_pageNumber, $this->_offset);

		$this->db->order_by('a.id', 'DESC'); 

		$query = $this->db->get(); 

		return $query->result_array(); 
		
	}
	public function fetchSnippetProperties() {       

		$this->db->select('a.propertyID, a.propertyTitle, a.propertyDescription, a.rentalCondition, a.furnishing, a.price, a.serviceCharge, a.securityDeposit, a.verification, a.propertyType as prop_type, a.renting_as, a.paymentPlan, a.frequency, a.intervals, a.amenities, a.bed, a.toilet, a.bath, a.address, a.city, a.state, a.country, a.status, a.imageFolder, a.featuredImg, a.poster, a.views, a.dateOfEntry, b.type, b.id, b.slug, c.name, c.id, c.country_id');

		$this->db->from('property_tbl as a');  
		
		$this->db->join('apt_type_tbl as b', 'b.id = a.propertyType','left');
		
		$this->db->join('states as c', 'c.id = a.state','left');

		$this->db->limit(10);

		$query = $this->db->get();

		return $query->result_array(); 

	}
	public function fetchProperty($id) {       

		$this->db->select('a.propertyID, a.propertyTitle, a.propertyDescription, a.rentalCondition, a.furnishing, a.services, a.price, a.serviceCharge, a.serviceChargeTerm, a.securityDeposit, a.securityDepositTerm, a.verification, a.propertyType as prop_type, a.renting_as, a.paymentPlan, a.frequency, a.intervals, a.amenities, a.bed, a.toilet, a.bath, a.address, a.city, a.state, a.country, a.status, a.imageFolder, a.featuredImg, a.poster, a.featured_property, a.available_date, a.views, a.dateOfEntry, b.type, b.id, b.slug, c.name, c.id, c.country_id');

		$this->db->from('property_tbl as a');
		
		$this->db->where('a.propertyID', $id);
		
		$this->db->join('apt_type_tbl as b', 'b.id = a.propertyType','left');
		
		$this->db->join('states as c', 'c.id = a.state','left');

		$query = $this->db->get();

		return $query->row_array(); 

	}
	public function fetchBuytoletProperty($id) {       

		$this->db->select('a.*, b.type, b.id, b.slug, c.name, c.id, c.country_id');

		$this->db->from('buytolet_property as a'); 
		
		$this->db->where('a.propertyID', $id);  
		
		$this->db->join('apt_type_tbl as b', 'b.id = a.apartment_type','left');
		
		$this->db->join('states as c', 'c.id = a.state','left');

		$query = $this->db->get();

		return $query->row_array(); 

	}
	public function fetchNeighborhoodDistance() {       

		$this->db->select('*');

		$this->db->from('distance_tbl');          

		$query = $this->db->get();

		return $query->result_array();

	}

	public function check_email($email){

		$this->db->select('email');

		$this->db->from('login_tbl');

		$this->db->where('email', $email);

		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() > 0){

			return 1;

		}else{

			return 0;

		}

	}

	public function login($username, $password){
		
		$this->db->select('adminID, firstName, lastName, email, password, lastLogin, profilePic, status, userAccess, dateOfCreation');

		$this->db->from('admin_tbl');

		$this->db->where('email', $username);

		$this->db->where('password', md5($password));

		$this->db->where('status', 'Active');

		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() > 0){

			return $query->row_array();

		}else{

			return 0;

		}

	}
	
	public function get_property_details($id){
		
		$this->db->select("*");
		
		$this->db->from("property_tbl");
		
		$this->db->where("propertyID", $id);
		
		$query = $this->db->get();
		
		return $query->row_array();
		
	}
	
	public function get_btl_property_details($id){
		
		$this->db->select("*");
		
		$this->db->from("buytolet_property");
		
		$this->db->where("propertyID", $id);
		
		$query = $this->db->get();
		
		return $query->row_array();
		
	}

	public function register($fname, $lname, $email, $password, $phone, $income, $confirmationCode){

		$digits = 12;

		$randomNumber = '';

		$count = 0;

		while($count < $digits){

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;

		}

		$id = $randomNumber;

		$this->userID = $id;

		$this->firstName = $fname; // please read the below note

		$this->lastName = $lname;

		$this->email = $email;

		$this->password = $password;

		$this->phone = $phone;

		$this->income = $income;

		$this->status = 'Active';

		$this->regDate = date('Y-m-d H:i:s');

		if($this->db->insert('user_tbl', $this)){

			$lastlog = date('Y-m-d H:i:s');

			$res = $this->db->insert('login_tbl', array('email' => $email, 'password' => $password, 'userID' => $id, 'lastLogin' => $lastlog, 'confirmationLink' => $confirmationLink));

			if($res){

				$det = $this->db->insert('progress_tbl', array('progressVal' => 10, 'userID' => $id));

				if($det){

					return 1;

				}else{

					return "Error uploading details!";

				}
			}else{
			    
				return "Error inserting in Login table.";

			}
		}else{

			return "Basic profile insertion error!";
			
		}			

	}

	public function insertAdmin($fname, $lname, $email, $access, $password){

	    $this->firstName = $fname; // please read the below note

		$this->lastName = $lname;

		$this->email = $email; // please read the below note

		$this->userAccess = $access;

		$this->profilePic = ''; 

		$this->password = $password;

		$this->status = 'Active';

		$this->dateOfCreation = date('Y-m-d H:i:s');

		if($this->db->insert('admin_tbl', $this)){

			return 1;

		}else{

			return 0;

		}	

	}

	public function insertAmenity($title, $amenity_type, $filename){

	    $this->name = $title; // please read the below note

		$this->type = $amenity_type;

		$this->image = $filename; // please read the below note

		if($this->db->insert('amenity_tbl', $this)){

			return 1;

		}else{

			return 0;
			
		}	

	}
    public function get_city_id($name){
		
		$this->db->select('id');

		$this->db->from('cities');
		
		$this->db->where('name', $name ); 

		$query = $this->db->get();

		return $query->row_array();
		
	}
	public function insertFCat($category, $slug){

	    $this->category = $category; // please read the below note

		$this->slug = $slug;		

		if($this->db->insert('facility_category', $this)){

			return 1;

		}else{

			return 0;

		}	

	}

	public function insertFurnisureCat($category, $slug){

		$this->category = $category; // please read the below note

		$this->slug = $slug;

		if($this->db->insert('furnisure_category_tbl', $this)){

			return 1;
			
		}else{

			return 0;

		}

	}
	public function insertApartment($propName, $propType, $stayType, $propDesc, $address, $city, $state, $country, $cost, $security_deposit, $imageFolder, $featuredPic, $amenities, $bed, $bath, $toilet, $guest, $policies, $house_rules){
	    
	    $digits = 12;

		$randomNumber = '';

		$count = 0;



		while($count < $digits){

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;

		}

		$id = $randomNumber;
	    
	    $this->apartmentID = $id;
	    
	    $this->apartmentName = $propName;
	    
	    $this->apartmentType = $propType;
	    
	    $this->stayType = $stayType;
	    
	    $this->description = $propDesc;
	    
	    $this->policies = $policies;
	    
	    $this->house_rules = $house_rules;
	    
	    $this->address = $address;
	    
	    $this->state = $state;
	    
	    $this->city = $city;
	    
	    $this->price = $cost;
	    
	    $this->securityDeposit = $security_deposit;
	    
	    $this->folder = $imageFolder;
	    
	    $this->featuredImg = $featuredPic;
	    
	    $this->amenities = serialize($amenities);
	    
	    $this->bedroom = $bed;
	    
	    $this->bathroom = $bath;
	    
	    $this->toilet = $toilet;
	    
	    $this->guests = $guest;
	    
	    if($this->db->insert('stayone_apartments', $this)){
	        return 1;
	    }else{
	        return 0;
	    }
	}
	
	public function editApartment($id, $propName, $propType, $stayType, $propDesc, $address, $cost, $security_deposit, $imageFolder, $featuredPic, $amenities, $bed, $bath, $toilet, $guest, $policies, $house_rules){
	  
	    
	    $this->apartmentName = $propName;
	    
	    $this->apartmentType = $propType;
	    
	    $this->stayType = $stayType;
	    
	    $this->description = $propDesc;
	    
	    $this->policies = $policies;
	    
	    $this->house_rules = $house_rules;
	    
	    $this->address = $address;
	    
	    $this->price = $cost;
	    
	    $this->securityDeposit = $security_deposit;
	    
	    $this->folder = $imageFolder;
	    
	    $this->featuredImg = $featuredPic;
	    
	    $this->amenities = serialize($amenities);
	    
	    $this->bedroom = $bed;
	    
	    $this->bathroom = $bath;
	    
	    $this->toilet = $toilet;
	    
	    $this->guests = $guest;
	    
	    $this->db->where("apartmentID", $id);
	    
	    if($this->db->update('stayone_apartments', $this)){
	        return 1;
	    }else{
	        return 0;
	    }
	}
	public function fetchApartments() {  
	    
        $this->db->select('a.apartmentID, a.apartmentName, a.apartmentType, a.address, a.state, a.city, a.price, a.securityDeposit, a.folder, a.featuredImg, a.amenities, a.bedroom, a.bathroom, a.toilet, a.guests, a.views, a.status, b.id, b.type');
	    
	    $this->db->from('stayone_apartments as a');
	    
	    $this->db->join('apt_type_tbl as b', 'b.id = a.apartmentType');

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array(); 

	}
	public function fetchApartment($id) {  
	    
        $this->db->select('*');
	    
	    $this->db->from('stayone_apartments');
	    
	    $this->db->where("apartmentID", $id);

		$query = $this->db->get();

		return $query->row_array(); 

	}
	public function fetchStayoneBookings(){
	    
	    $this->db->select('a.bookingID, a.aptID, a.guests, a.checkin, a.checkout, a.firstname, a.lastname, a.email, a.phone, a.address, a.comment, a.no_of_nights, a.date_of_booking, a.status, b.apartmentID, b.apartmentName, b.apartmentType, b.folder, b.featuredImg, c.type');
	    
	    $this->db->from('stayone_booking as a');
	    
	    $this->db->join('stayone_apartments as b', 'b.apartmentID = a.aptID');
	    
	    $this->db->join('apt_type_tbl as c', 'c.id = b.apartmentType');

		$this->db->limit($this->_pageNumber, $this->_offset);
		
		$this->db->order_by('a.id', 'DESC');
		
		$query = $this->db->get();

		return $query->result_array();
	}

	public function insertAptType($category, $slug){

	    $this->type = $category; // please read the below note

		$this->slug = $slug;

		if($this->db->insert('apt_type_tbl', $this)){

			return 1;

		}else{

			return 0;

		}	

	}

	public function insertRentType($rent_type, $slug){

	    $this->rent_type = $rent_type; // please read the below note

		$this->slug = $slug;

		if($this->db->insert('rent_type', $this)){

			return 1;

		}else{

			return 0;

		}	

	}

	public function insertFurnisureType($type, $slug){

	    $this->type = $type; // please read the below note

		$this->slug = $slug;

		if($this->db->insert('furnisure_type_tbl', $this)){

			return 1;

		}else{
		    
			return 0;

		}	

	}

	public function insertNDist($distance, $slug){

	    $this->distance = $distance; // please read the below note

		$this->slug = $slug;
		
		if($this->db->insert('distance_tbl', $this)){

			return 1;

		}else{
		    
			return 0;

		}	

	}
    public function insertUpcomingProperty($units, $propType, $address, $state, $country, $price, $userID, $services, $typeOfTenant, $city, $airtable_url){
        
        $this->units = $units;
        
        $this->property_type = $propType;
        
        $this->address = $address;
        
        $this->state = $state;
        
        $this->country = $country;
        
        $this->city = $city;
        
        $this->price = $price;
        
        $this->poster = $userID;
        
        $this->services = $services;
        
        $this->tenant_type = serialize($typeOfTenant);
        
        $this->airtable_url = $airtable_url;
        
        $this->posted_on = date("Y-m-d H:i:s");
        
        if($this->db->insert('upcoming_property', $this)){
            
            return 1;
            
        }else{
            
            return 0;
            
        }
        
    }
	public function insertProperty($propName, $propType, $propDesc, $propNote, $address, $city, $state, $country, $price, $service_charge,$service_charge_term, $security_deposit, $payment_plan, $intervals, $frequency, $imageFolder, $featuredPic, $amenities, $bed, $bath, $toilet, $userID, $status, $furnishing, $renting_as, $services, $featuredProp, $availableFrom, $cityID, $security_deposit_term){

		$digits = 12;

		$randomNumber = '';

		$count = 0;

		while($count < $digits){

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;

		}

		$id = $randomNumber;

		$this->propertyID = $id;

		$this->propertyTitle = $propName;

		$this->propertyType = $propType;

		$this->propertyDescription = $propDesc;

		$this->rentalCondition = $propNote;

		$this->address = $address;

		$this->city = $city;

		$this->state = $state;

		$this->country = $country;

		$this->price = $price;

		$this->serviceCharge = $service_charge;
		
		$this->serviceChargeTerm = $service_charge_term;

		$this->securityDeposit = $security_deposit;
		
		$this->securityDepositTerm = $security_deposit_term;

		$this->paymentPlan = $payment_plan;

		$this->intervals = serialize($intervals);

		$this->frequency = serialize($frequency);

		$this->imageFolder = $imageFolder;

		$this->featuredImg = $featuredPic;

		$this->amenities = serialize($amenities);

		$this->bed = $bed;

		$this->bath = $bath;

		$this->toilet = $toilet;

		$this->poster = $userID;

		$this->furnishing = $furnishing; 

		$this->services = $services;

		$this->status = $status;
		
		$this->views = 0;
		
		$this->featured_property = $featuredProp;
		
		$this->available_date = $availableFrom;

		$this->renting_as = serialize($renting_as);

		$this->dateOfEntry = date('Y-m-d H:i:s');

		if($this->db->insert('property_tbl', $this)){
            
			return $id;

		}else{

			return 0;

		}

	}
	
	public function editProperty($propID, $propName, $propType, $propDesc, $propNote, $address, $price, $security_deposit, $service_charge_term, $featuredPic, $amenities, $bed, $bath, $toilet, $userID, $furnishing, $renting_as, $services, $featuredProp, $availableFrom, $status, $intervals, $frequency, $payment_plan, $country, $states, $city, $city_id, $security_deposit_term, $service_charge){

		$updates = array("propertyTitle" => $propName, "propertyType" => $propType, "propertyDescription" => $propDesc, "rentalCondition" => $propNote, "address" => $address, "country" => $country, "state" => $states, "city" => $city, "price" => $price, "securityDeposit" => $security_deposit, "serviceChargeTerm" => $service_charge_term, "securityDepositTerm" => $security_deposit_term, "featuredImg" => $featuredPic, "amenities" => serialize($amenities), "bed" => $bed, "bath" => $bath, "toilet" => $toilet, "poster" => $userID, "furnishing" => $furnishing, "services" => $services, "renting_as" => serialize($renting_as), "featured_property" => $featuredProp, "available_date" => $availableFrom, "status" => $status, "intervals" => serialize($intervals), "frequency" => serialize($frequency), "paymentPlan" => $payment_plan, "serviceCharge" => $service_charge);

		$this->db->where("propertyID", $propID);
		
	    return $this->db->update("property_tbl", $updates);

	}

	public function insertFurniture($title, $type, $category, $cost, $security_deposit, $desc, $delivery, $spec, $payment, $imageFolder, $featuredPic){

		$digits = 10;

		$randomNumber = '';

		$count = 0;

		while($count < $digits){

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;

		}

		$id = $randomNumber;

		$this->applianceID = $id;

		$this->applianceName = $title;

		$this->applianceType = $type;

		$this->category = $category;

		$this->cost = $cost;

		$this->securityDeposit = $security_deposit;

		$this->description = $desc;

		$this->paymentInfo = $payment;

		$this->specification = $spec;

		$this->delivery = $delivery;

		$this->tandc = "";

		$this->folderName = $imageFolder;
 
		$this->featuredImg = $featuredPic;

		$this->views = 0;

		$this->dateOfEntry = date('Y-m-d H:i:s');

		return $this->db->insert('furnisure_tbl', $this);

	}

	public function insertNews($title, $content, $credit, $slug, $file_name, $userID){

		$this->articleTitle = $title;

		$this->content = $content;

		$this->credit = $credit;

		$this->articleSlug = $slug;

		$this->featuredImage = $file_name;

		$this->status = "Active";

		$this->poster = $userID;

		$this->views = 0;

		$this->datePosted = date('Y-m-d H:i:s');

		return $this->db->insert('blog_tbl', $this);

	}
	public function insertNotification($title, $link, $startDate, $endDate){

		$this->message = $title;

		$this->notification_link = $link;

		$this->start_date = $startDate;

		$this->end_date = $endDate;

		$this->entry_date = date('Y-m-d H:i:s');

		return $this->db->insert('notification_tbl', $this);

	}
	public function editNotification($title, $link, $startDate, $endDate, $id){
	    
	    $update = array("message" => $title, "notification_link" => $link, "start_date" => $startDate, "end_date" => $endDate);
		
		$this->db->where('id', $id);

		return $this->db->update('notification_tbl', $update);

	}
	public function editNews($title, $content, $slug, $featuredImage, $articleID){
	    
	    $this->articleTitle = $title;

		$this->content = $content;

		$this->articleSlug = $slug;

		$this->featuredImage = $featuredImage;
		
		$this->db->where("articleID", $articleID);

		return $this->db->update('blog_tbl', $this);
	    
	}
    public function fetchAllNews() {       

		$this->db->select('a.articleID, a.articleTitle, a.content, a.credit, a.articleSlug, a.featuredImage, a.status, a.poster, a.views, a.datePosted, b.adminID, b.firstName, b.lastName');

		$this->db->from('blog_tbl as a'); 
		
		$this->db->join('admin_tbl as b', 'b.adminID = a.poster');

		$this->db->limit($this->_pageNumber, $this->_offset);
		
		$this->db->order_by("articleID", "DESC");

		$query = $this->db->get();

		return $query->result_array();

	}
	public function fetchArticle($id) {       

		$this->db->select('*');

		$this->db->from('blog_tbl');  
		
		$this->db->where("articleID", $id);

		$query = $this->db->get();

		return $query->row_array();

	}
	
	public function delArticle($articleID){
	    
	    $this->db-> where('articleID', $articleID);
    	
		return $this->db->delete('blog_tbl');
		
	}
	public function delBooking($bookingID, $propID){
	    
	    $this->db-> where('bookingID', $bookingID);
    	
		if($this->db->delete('bookings')){
		    
		    $this->db->where("transaction_id", $bookingID);
		    
		    if($this->db->delete("transaction_tbl")){
		        
		        $this->db->where("propertyID", $propID);
		    
		        return $this->db->update("property_tbl", array("available_date" => "0000-00-00")); 
		        
		    }else{
		        
		        return 0;
		        
		    }
		}else{
		    
		    return 0;
		    
		}
		
	}
	public function insertFacilities($propertyID, $facilityName, $facilityCat, $facilityDist, $file_path){		

		$this->db->insert('neighborhood_facility_tbl', array('property' => $propertyID, 'name' => $facilityName, 'category' => $facilityCat, 'distance' => $facilityDist, 'file_path' => $file_path));		

	}
	
	public function get_facilities($propID){
		$this->db->select('*');
		
		$this->db->from('neighborhood_facility_tbl');
		
		$this->db->where('property', $propID);
		
		$query = $this->db->get();
		
		return $query->result_array();
	}

	public function searchPropty($id){
		
		$this->db->select("*");
		
		$this->db->from("property_tbl");
		
		$this->db->like('propertyTitle', $id);
		
		$query = $this->db->get();
		
		return $query;
		
	}

	public function delAgreement($bookingID){
	    
	    $this->db-> where('id', $bookingID);
    	
		if($this->db->delete('sub_agreement')){
		    
		   return 1; 
		        
		}

		else{
			
			return 0;
			
		}
		
	}

	public function getRows($propID)
	{
		$this->db->select('*');
		
		$this->db->from('sub_agreement');
		
		$this->db->where('id', $propID);
		
		$query = $this->db->get();
		
		return $query->row_array();
	}
	
	public function getReqMsg($id, $msgID){
		
		$this->db->select('a.id, a.inspectionID, a.propertyID, a.userID as user_id, a.inspectionDate, a.inspectionType, a.dateOfEntry, b.id as msgID, b.requestID, b.content, b.sender, b.receiver, b.subject, b.status as msg_status, b.updated, c.userID, c.firstName, c.lastName, c.email'); 

		$this->db->from('inspection_tbl as a'); 
		
		$this->db->where('a.id', $id);
		
		$this->db->where('b.id', $msgID);
		
		$this->db->join('messages_tbl as b', 'b.requestID = a.inspectionID','left');
		
		$this->db->join('user_tbl as c', 'c.userID = a.userID','left');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array(); 
		
	}	
	public function setMsgStatus($id){
		
		$updates = array("status" => "read");
		
		$this->db->where("id", $id);
		
		$this->db->update("messages_tbl", $updates);
	}
	
	// public function fetchBookings(){   
		
	// 	$this->db->select('a.id, a.verification_id, a.bookingID, a.propertyID, a.userID, a.booked_as, a.payment_plan, a.duration, a.move_in_date, a.next_rental, a.rent_expiration, a.booked_on, b.verification_id, b.transaction_id, b.amount, b.status, b.payment_type, b.type, b.transaction_date, b.reference_id, c.firstName, c.lastName, d.propertyID, d.propertyTitle, d.propertyType');

	// 	$this->db->from('bookings as a');
		
	// 	$this->db->where('b.type', 'rss');
		
	// 	$this->db->join('transaction_tbl as b', 'b.verification_id = a.verification_id');
		
	// 	$this->db->join('user_tbl as c', 'a.userID = c.userID');
		
	// 	$this->db->join('property_tbl as d', 'd.propertyID = a.propertyID');

	// 	$this->db->limit($this->_pageNumber, $this->_offset);
		
	// 	$this->db->group_by('a.bookingID');
		
	// 	$this->db->order_by('a.id', 'DESC');

	// 	$query = $this->db->get();

	// 	return $query->result_array();
		
	// }


	public function fetchBookings(){   
		
		$this->db->select('DISTINCT(a.userID), c.*');

		$this->db->from('bookings as a');
		
		$this->db->where('b.type', 'rss');
		
		$this->db->join('transaction_tbl as b', 'b.verification_id = a.verification_id');
		
		$this->db->join('user_tbl as c', 'a.userID = c.userID');
		
		//$this->db->join('property_tbl as d', 'd.propertyID = a.propertyID');

		$this->db->limit($this->_pageNumber, $this->_offset);
		
		//$this->db->group_by('a.bookingID');
		
		$this->db->order_by('a.id', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function fetchBooking($id){   
		
		$this->db->select('a.id, a.verification_id, a.bookingID, a.propertyID, a.userID, a.booked_as, a.payment_plan, a.duration, a.move_in_date, a.next_rental, a.rent_expiration, a.booked_on, b.verification_id, b.transaction_id, b.amount, b.status, b.payment_type, b.type, b.transaction_date, b.reference_id, c.firstName, c.lastName, c.userID as buserId, d.propertyID, d.propertyTitle, d.propertyType');

		$this->db->from('bookings as a');
		
		$this->db->where('b.type', 'rss');

		$this->db->where('c.userID', $id);
		
		$this->db->join('transaction_tbl as b', 'b.verification_id = a.verification_id');
		
		$this->db->join('user_tbl as c', 'a.userID = c.userID');
		
		$this->db->join('property_tbl as d', 'd.propertyID = a.propertyID');

		$this->db->limit($this->_pageNumber, $this->_offset);
		
		$this->db->group_by('a.bookingID');
		
		$this->db->order_by('a.id', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
		
	}


	// public function fetchBookingDetails($id){
	    
	//     $this->db->select('a.*, b.*, c.*, d.amount');
	    
	//     $this->db->from('stayone_booking as a');
	    
	//     $this->db->where('a.bookingID', $id);
	    
	//     $this->db->join('stayone_apartments as b', 'b.apartmentID = a.aptID');
	    
	//     $this->db->join('apt_type_tbl as c', 'c.id = b.apartmentType');
	    
	//     $this->db->join('stayone_transactions as d', 'd.booking_id = a.bookingID');

	// 	$this->db->limit($this->_pageNumber, $this->_offset);
		
	// 	$query = $this->db->get();

	// 	return $query->row_array();
	// }

	public function fetchBookingDetails($id){
	    
	    $this->db->select('a.*, a.reference_id as refID, a.amount as transAmount, a.type as transaction_type, a.userID as usersID, b.*, b.propertyID as proptyID, c.*, c.intervals as userIntervals, d.type, e.email, e.firstName, e.lastName, e.email as userEmail');
		
		$this->db->from('transaction_tbl as a');
		
		$this->db->join('bookings as b', 'a.transaction_id = b.bookingID');
		
		$this->db->join('property_tbl as c', 'b.propertyID = c.propertyID', 'LEFT OUTER');
		
		$this->db->join('apt_type_tbl as d', 'd.id = c.propertyType', 'LEFT OUTER');

		$this->db->join('user_tbl as e', 'e.userID = a.userID');
		
		//$this->db->where('a.userID', $id);
		
		$this->db->where('a.type', 'rss');
		
		$this->db->where('a.transaction_id', $id);
		
		$this->db->order_by('a.id', 'DESC');
		
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		return $query->row_array();
	}

	public function fetchTransactions($type){   
		
		$this->db->select('a.id, a.reference_id, a.verification_id, a.transaction_id, a.amount, a.userID, a.status, a.type, a.payment_type, a.transaction_date, c.firstName, c.lastName');

		$this->db->from('transaction_tbl as a'); 
		
		$this->db->where('a.type', $type);
		
		$this->db->join('user_tbl as c', 'a.userID = c.userID');

		$this->db->limit($this->_pageNumber, $this->_offset);
		
		$this->db->order_by('a.id', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
		
	}
	public function fetchAppTransactions(){   
		
		$this->db2->select('a.id, a.txn_reference, a.amount, a.user_id, a.property_id, a.status, a.created_at, a.expires_at, b.name');

		$this->db2->from('user_payments as a'); 
		
		$this->db2->join('users as b', 'b.id = a.user_id');

		$this->db2->limit($this->_pageNumber, $this->_offset);
		
		$this->db2->order_by('a.id', 'DESC');

		$query = $this->db2->get();

		return $query->result_array();
		
	}
	public function editBuytoletProperty($propName, $lockdownPeriod,$lockdownFee, $propType, $propDesc, $locationInfo, $address, $city, $state, $country, $tenantable, $price, $expected_rent, $imageFolder, $featuredPic, $bed, $toilet, $bath, $propertySize, $floorPlan, $mortgage, $payment_plan, $payment_plan_period, $id, $min_pp_val, $promo_price, $promo_category, $pool_buy, $pooling_units, $asset_appreciation_1, $asset_appreciation_2, $asset_appreciation_3, $asset_appreciation_4, $asset_appreciation_5, $investmentType, $userID, $marketValue, $outrightDiscount, $floor_level, $construction_lvl, $start_date, $finish_date, $co_appr, $co_rent, $available_units, $maturity_date, $closing_date, $hold_period){
	    
		$this->property_name = $propName;
		$this->apartment_type = $propType;
		$this->price = $price;
		$this->marketValue = $marketValue;
		$this->outrightDiscount = $outrightDiscount;
		$this->promo_price = $promo_price;
		$this->promo_category = $promo_category;
		$this->address = $address;
		$this->country = $country;
		$this->state = $state;
		$this->city = $city;
		$this->asset_appreciation_1 = $asset_appreciation_1;
		$this->asset_appreciation_2 = $asset_appreciation_2;
		$this->asset_appreciation_3 = $asset_appreciation_3;
		$this->asset_appreciation_4 = $asset_appreciation_4;
		$this->asset_appreciation_5 = $asset_appreciation_5;
		$this->tenantable = $tenantable;
		$this->expected_rent = $expected_rent;
		$this->property_size = $propertySize;
		$this->bed = $bed;
		$this->toilet = $toilet;
		$this->bath = $bath;
		$this->property_info = $propDesc;
		$this->location_info = $locationInfo;
		if($floorPlan != 'no'){
			$this->floor_plan = $floorPlan;
		}
		$this->mortgage = $mortgage;
		$this->payment_plan = $payment_plan;
		$this->payment_plan_period = $payment_plan_period;
		$this->minimum_payment_plan = $min_pp_val;
		$this->poster = $userID;
		$this->pool_units = $pooling_units;
		$this->available_units = $available_units;
		$this->pool_buy = $pool_buy;
		$this->image_folder = $imageFolder;
		$this->featured_image = $featuredPic;
		$this->investment_type = $investmentType;
		$this->floor_level = $floor_level;
		$this->construction_lvl = $construction_lvl;
		$this->start_date = $start_date;
		$this->finish_date = $finish_date;
		$this->maturity_date = $maturity_date;
		$this->lockdown_fee = $lockdownFee;
		$this->lockdown_period = $lockdownPeriod;
		$this->closing_date = $closing_date;
		$this->hold_period = $hold_period;
		$this->co_appr_1 = $co_appr[0];
		$this->co_appr_2 = $co_appr[1];
		$this->co_appr_3 = $co_appr[2];
		$this->co_appr_4 = $co_appr[3];
		$this->co_appr_5 = $co_appr[4];
		$this->co_appr_6 = $co_appr[5];
		$this->co_rent_1 = $co_rent[0];
		$this->co_rent_2 = $co_rent[1];
		$this->co_rent_3 = $co_rent[2];
		$this->co_rent_4 = $co_rent[3];
		$this->co_rent_5 = $co_rent[4];
		$this->co_rent_6 = $co_rent[5];
		$this->updated_at = date('Y-m-d H:i:s');
		
		$this->db->where('propertyID', $id);
		
		if($this->db->update('buytolet_property', $this)){
			
			return 1;
			
		}else{
			
			return 0;
			
		}
		
	}
	public function insertBuytoletProperty($propName, $lockdownPeriod, $lockdownFee, $propType, $propDesc, $locationInfo, $address, $city, $state, $country, $tenantable, $price, $expected_rent, $imageFolder, $featuredPic, $bed, $toilet, $bath, $hpi, $userID, $status, $propertySize, $floorPlan, $mortgage, $payment_plan, $payment_plan_period, $min_pp_val, $pooling_units, $pool_buy, $promo_price, $promo_category, $asset_appreciation_1, $asset_appreciation_2, $asset_appreciation_3, $asset_appreciation_4, $asset_appreciation_5, $investmentType, $marketValue, $outrightDiscount, $floor_level, $construction_lvl, $start_date, $finish_date, $co_appr, $co_rent, $maturity_date, $closing_date, $hold_period){
	    
		$digits = 12;
		
		$randomNumber = '';
		
		$count = 0;

		while($count < $digits){
		    
			$randomDigit = mt_rand(0, 9);
			
			$randomNumber .= $randomDigit;
			
			$count++;
		}
		
		$id = $randomNumber;
		
		$this->propertyID = $id;
		$this->property_name = $propName;
		$this->apartment_type = $propType;
		$this->price = $price;
		$this->marketValue = $marketValue;
		$this->outrightDiscount = $outrightDiscount;
		$this->promo_price = $promo_price;
		$this->promo_category = $promo_category;
		$this->address = $address;
		$this->country = $country;
		$this->state = $state;
		$this->city = $city;
		$this->asset_appreciation_1 = $asset_appreciation_1;
		$this->asset_appreciation_2 = $asset_appreciation_2;
		$this->asset_appreciation_3 = $asset_appreciation_3;
		$this->asset_appreciation_4 = $asset_appreciation_4;
		$this->asset_appreciation_5 = $asset_appreciation_5;
		$this->tenantable = $tenantable;
		$this->expected_rent = $expected_rent;
		$this->property_size = $propertySize;
		$this->bed = $bed;
		$this->toilet = $toilet;
		$this->bath = $bath;
		$this->hpi = $hpi;
		$this->property_info = $propDesc;
		$this->location_info = $locationInfo;
		$this->floor_plan = $floorPlan;
		$this->status = $status;
		$this->mortgage = $mortgage;
		$this->lockdown_fee = $lockdownFee;
		$this->lockdown_period = $lockdownPeriod;
		$this->payment_plan = $payment_plan;
		$this->payment_plan_period = $payment_plan_period;
		$this->minimum_payment_plan = $min_pp_val;
		$this->poster = $userID;
		$this->views = 0;
		$this->image_folder = $imageFolder;
		$this->featured_image = $featuredPic;
		$this->pool_units = $pooling_units;
		$this->available_units = $pooling_units;
		$this->pool_buy = $pool_buy;
		$this->availability = 'Available';
		$this->investment_type = $investmentType;
		$this->floor_level = $floor_level;
		$this->construction_lvl = $construction_lvl;
		$this->start_date = $start_date;
		$this->finish_date = $finish_date;
		$this->maturity_date = $maturity_date;
		$this->closing_date = $closing_date;
		$this->hold_period = $hold_period;
		$this->co_appr_1 = $co_appr[0];
		$this->co_appr_2 = $co_appr[1];
		$this->co_appr_3 = $co_appr[2];
		$this->co_appr_4 = $co_appr[3];
		$this->co_appr_5 = $co_appr[4];
		$this->co_appr_6 = $co_appr[5];
		$this->co_rent_1 = $co_rent[0];
		$this->co_rent_2 = $co_rent[1];
		$this->co_rent_3 = $co_rent[2];
		$this->co_rent_4 = $co_rent[3];
		$this->co_rent_5 = $co_rent[4];
		$this->co_rent_6 = $co_rent[5];
		$this->active = 1;
		$this->date_of_entry = date('Y-m-d H:i:s');
		
		if($this->db->insert('buytolet_property', $this)){
			
			return 1;
			
		}else{
			
			return 0;
			
		}

	}
	public function get_rss_about_us(){
		
		$this->db->select("*");
		$this->db->from('rss_about_us');
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_buytolet_about_us(){
		
		$this->db->select("*");
		$this->db->from('buytolet_about_us');
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_btl_how_it_works(){
		
		$this->db->select("*");
		$this->db->from('buytolet_hiw');
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function update_about($title, $content, $id, $story_one, $story_two){
		
		$updateData = array("title" => $title, "content" => $content, "story_1" => $story_one, "story_2" => $story_two);

		$this->db->where("id",$id);
		
	    if($this->db->update("rss_about_us",$updateData)){
	        return 1;
	    }else{
	        return 0;
	    }
		
	}
	public function update_buytolet_about($what_we_do, $story, $id){
		
		$updateData = array("our_story" => $story, "what_we_do" => $what_we_do);

		$this->db->where("id",$id);
		
		if($this->db->update("buytolet_about_us",$updateData)){
		    return 1;
		} else{
		    return 0;
		}
		
	}
	public function update_btl_hiw($search, $analyse, $qualify, $checkout, $id){
		
		$updateData = array("search" => $search, "analyze_" => $analyse, "qualify" => $qualify, "checkout" => $checkout);

		$this->db->where("id",$id);
		
		if($this->db->update("buytolet_hiw",$updateData)){
		    return 1;
		} else{
		    return 0;
		}
		
	}
	
	public function del_apt_type($id){
		
		$this -> db -> where('id', $id);
    	
		return $this -> db -> delete('apt_type_tbl');
		
	}
	
	public function del_user($id){
		
		$this->db->where('userID', $id);
    	
		if($this->db->delete('user_tbl')){
			
			$this->db->where('userID', $id);
			
			return $this->db->delete('login_tbl');
			
		}
		
	}
	public function release_property($id){
	    
	    $status = array("available_date" => '0000-00-00');
	    
	    $this->db->where('propertyID', $id);
	    
	    return $this->db->update("property_tbl", $status);
	    
	}
	
	
	public function del_property($id){
		
		$this->db->where('propertyID', $id);
    	
		return $this->db->delete('property_tbl');
		
	}
	
	public function update_btl_property($action, $propertyID){

		$result = 0;

		if($action == 'delete') {

			$this->db->where('propertyID', $propertyID);
    	
			$result = $this->db->delete('buytolet_property');

		} else {

			$status = array("availability" => $action);
	    
	    	$this->db->where('propertyID', $propertyID);
	    
	    	$result = $this->db->update("buytolet_property", $status);

		}

		return $result;

	}
	public function activate_user($id){
		
		$updateData = array("status" => 'Active');
		
		$this->db->where('userID', $id);
    	
		return $this->db->update('user_tbl', $updateData);
		
	}
	public function deactivate_user($id){
		
		$updateData = array("status" => 'Inactive');
		
		$this->db->where('userID', $id);
    	
		return $this->db->update('user_tbl', $updateData);
		
	}
	public function verify_user($id){
		
		$updateData = array("verified" => 'yes');
		
		$this->db->where('userID', $id);
    	
		return $this->db->update('user_tbl', $updateData);
		
	}
	public function updateFurniture($title, $type, $category, $cost, $security_deposit, $desc, $delivery, $spec, $payment, $imageFolder, $featuredPic, $app_id){


		$this->applianceName = $title;

		$this->applianceType = $type;

		$this->category = $category;

		$this->cost = $cost;

		$this->securityDeposit = $security_deposit;

		$this->description = $desc;

		$this->paymentInfo = $payment;

		$this->specification = $spec;

		$this->delivery = $delivery;

		$this->tandc = "";

		$this->folderName = $imageFolder;
 
		$this->featuredImg = $featuredPic;
		
		$this->db->where("applianceID",$app_id);		

		return $this->db->update('furnisure_tbl', $this);

	}	
	public function get_folder_name($id){
		
		$this->db->select('imageFolder, propertyID');
		
		$this->db->from('property_tbl');
		
		$this->db->where('propertyID', $id);
		
		$query = $this->db->get();
		
		return $query->row_array();
	}
	
	public function delProp($id){
		
		$this->db-> where('propertyID', $id);
    	
		return $this->db->delete('property_tbl');
		
	} 
	public function delBtlProp($id){
		
		$this->db-> where('propertyID', $id);
    	
		return $this->db->delete('buytolet_property');
		
	} 
	public function soldProp($id){
	    
	    $updates = array("availability" => "Sold");
		
		$this->db-> where('propertyID', $id);
    	
		if($this->db->update('buytolet_property', $updates)){
		    return 1;
		}else{
		    return 0;
		}
		
		
	} 
	public function propListing($id, $theState){
	    
	    $updates = array("active" => $theState);
		
		$this->db-> where('propertyID', $id);
    	
		if($this->db->update('buytolet_property', $updates)){
		    return 1;
		}else{
		    return 0;
		}
		
		
	} 
	public function insertPropertyClone($id, $propName, $propType, $propDesc, $propNote, $address, $city, $state, $country, $price, $service_charge, $security_deposit, $payment_plan, $intervals, $frequency, $imageFolder, $featuredPic, $amenities, $bed, $bath, $toilet, $userID, $status, $furnishing, $renting_as, $services, $featured, $available_date, $city_id){

		//$id = $randomNumber;		

		$this->propertyID = $id;

		$this->propertyTitle = $propName;

		$this->propertyType = $propType;

		$this->propertyDescription = $propDesc;

		$this->rentalCondition = $propNote;

		$this->address = $address;

		$this->city = $city;

		$this->state = $state;

		$this->country = $country;

		$this->price = $price;

		$this->serviceCharge = $service_charge;

		$this->securityDeposit = $security_deposit;

		$this->paymentPlan = $payment_plan;

		$this->intervals = $intervals;

		$this->frequency = $frequency;

		$this->imageFolder = $imageFolder;

		$this->featuredImg = $featuredPic;

		$this->amenities = $amenities;

		$this->bed = $bed;

		$this->bath = $bath;

		$this->toilet = $toilet;

		$this->poster = $userID;

		$this->furnishing = $furnishing; 

		$this->services = $services;

		$this->status = $status;
		
		$this->featured_property = $featured;
		
		$this->available_date = $available_date;
		
		$this->views = 0;

		$this->renting_as = $renting_as;

		$this->dateOfEntry = date('Y-m-d H:i:s');
		
		//Insert property

		return $this->db->insert('property_tbl', $this);

	}
	public function insertBtlPropertyClone($id, $property_name, $apartment_type, $price, $promo_price, $promo_category, $address, $city, $state, $country, $bed, $bath, $toilet, $tenantable, $expected_rent, $hpi, $developer, $mortgage, $payment_plan, $payment_plan_period, $imageFolder, $pool_units, $available_units, $userID, $pool_buy, $property_size, $property_info, $location_info, $floor_plan, $featured_image, $status, $views, $availability, $asset_appreciation_1, $asset_appreciation_2, $asset_appreciation_3, $asset_appreciation_4, $asset_appreciation_5, $floor_level, $construction_lvl, $start_date, $finish_date, $investment_type, $marketValue){
	    
	    $this->propertyID = $id;
	    
	    $this->property_name = $property_name;
	    
	    $this->apartment_type = $apartment_type;
	    
	    $this->price = $price;
	    
	    $this->promo_price = $promo_price;
	    
	    $this->promo_category = $promo_category;
	    
	    $this->address = $address;
	    
	    $this->city = $city;
	    
	    $this->state = $state;
	    
	    $this->country = $country;
	    
	    $this->bed = $bed;
	    
	    $this->bath = $bath;
	    
	    $this->toilet = $toilet;
	    
	    $this->tenantable = $tenantable;
	    
	    $this->expected_rent = $expected_rent;
	    
	    $this->hpi = $hpi;
	    
	    $this->developer = $developer;
	    
	    $this->mortgage = $mortgage;
	    
	    $this->payment_plan = $payment_plan;
	    
	    $this->payment_plan_period = $payment_plan_period;
	    
	    $this->image_folder = $imageFolder;
	    
	    $this->pool_units = $pool_units; 
	    
	    $this->available_units = $available_units;
	    
	    $this->poster = $userID;
	    
	    $this->pool_buy = $pool_buy;
	    
	    $this->property_size = $property_size;
	    
	    $this->property_info = $property_info; 
	    
	    $this->location_info = $location_info;
	    
	    $this->floor_plan = $floor_plan;
	    
	    $this->featured_image = $featured_image;
	    
	    $this->status = $status;
	    
	    $this->views = $views;
	    
	    $this->asset_appreciation_1 = $asset_appreciation_1;
	    
	    $this->asset_appreciation_2 = $asset_appreciation_2;
	    
	    $this->asset_appreciation_3 = $asset_appreciation_3;
	    
	    $this->asset_appreciation_4 = $asset_appreciation_4;
	    
	    $this->asset_appreciation_5 = $asset_appreciation_5;
	    
	    $this->construction_lvl = $construction_lvl;
	    
	    $this->start_date = $start_date; 
	    
	    $this->finish_date = $finish_date;
	    
	    $this->investment_type = $investment_type;
	    
	    $this->marketValue = $marketValue;
	    
	    $this->floor_level = $floor_level;
	    
	    $this->availability = $availability;
	    
	    $this->date_of_entry = date("Y-m-d H:i:s");
	    
	    $this->updated_at = date("Y-m-d H:i:s");
	    
	    return $this->db->insert('buytolet_property', $this);
	    
	}
	public function get_ver_furniture($id){
	    
	    $this->db->select('a.*, b.*');
		
		$this->db->from('furnisure_order as a');
		
		$this->db->where('a.verification_id', $id);
		
		$this->db->join('furnisure_tbl as b', 'b.applianceID = a.productID');  

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_verification($id){
		
		$this->db->select('a.id, a.verification_id as vID, a.user_id, a.gross_annual_income, a.marital_status, a.dob, a.birth_place, a.country_id, a.present_address, a.present_country, a.duration_present_address, a.current_renting_status, a.disability, a.pets, a.present_landlord, a.landlord_email, a.landlord_phone, a.landlord_address, a.reason_for_living, a.employment_status, a.occupation, a.company_name, a.company_address, a.hr_manager_name, a.hr_manager_email, a.office_phone, a.guarantor_name, a.guarantor_email, a.guarantor_phone, a.guarantor_occupation, a.guarantor_address, a.created_at, a.updated_at, b.firstName, b.lastName, b.status, b.email, b.verified, c.file_path as valid_id_file_path, d.file_path as bank_statement_file_path, e.propertyID, e.verification_id, f.*, f.propertyID as propID, g.*, h.*');
		
		$this->db->from('verifications as a');
		
		$this->db->where('a.verification_id', $id);
		
		$this->db->join('user_tbl as b', 'b.userID = a.user_id'); 

		$this->db->join('valid_ids as c', 'c.verification_id = a.verification_id', 'LEFT OUTER'); // Used this so that it't will return data, even if the path is empty here
		
		// $this->db->join('valid_ids as c', 'c.verification_id = a.verification_id'); 
		
		$this->db->join('bank_statements as d', 'd.verification_id = a.verification_id', 'LEFT OUTER'); // Apply same here. Make its left join
		
		$this->db->join('bookings as e', 'e.verification_id = a.verification_id', 'LEFT OUTER');
		
		$this->db->join('property_tbl as f', 'f.propertyID = e.propertyID', 'LEFT OUTER');
		
		$this->db->join('apt_type_tbl as g', 'g.id = f.propertyType', 'LEFT OUTER'); 
		
		$this->db->join('states as h', 'h.id = f.state', 'LEFT OUTER');

		$query = $this->db->get();

		return $query->row_array();
	}
	
	public function get_app_verification($id){
		
		$this->db2->select('a.id, a.user_id, a.gross_annual_income, a.marital_status, a.dob, a.birth_place, a.country_id, a.present_address, a.present_country, a.duration_present_address, a.current_renting_status, a.disability, a.pets, a.present_landlord, a.landlord_email, a.landlord_phone, a.landlord_address, a.reason_for_living, a.employment_status, a.occupation, a.company_name, a.company_address, a.hr_manager_name, a.hr_manager_email, a.office_phone, a.guarantor_name, a.guarantor_email, a.guarantor_phone, a.guarantor_occupation, a.guarantor_address, a.created_at, a.updated_at, a.is_verified, a.validID_path, a.bank_statement_1, a.bank_statement_2, a.bank_statement_3, a.pID, b.id, b.name, b.income_level, b.email');
		
		$this->db2->from('verifications as a');
		
		$this->db2->where('a.id', $id);
		
		$this->db2->join('users as b', 'b.id = a.user_id'); 

		$query = $this->db2->get();

		return $query->row_array();
	}
	
	public function get_ver_property($id){
	    
	    $this->db->select('a.propertyID, a.propertyTitle, a.price, a.securityDeposit, a.propertyType, a.city, a.state, b.id, b.type, c.id, c.name');
		
		$this->db->from('property_tbl as a');
		
		$this->db->where('a.id', $id);
		
		$this->db->join('apt_type_tbl as b', 'b.id = a.propertyType'); 
		
		$this->db->join('states as c', 'c.id = a.state'); 

		$query = $this->db->get();

		return $query->row_array();
	}
	
	public function get_ver_prop($id){
	    
	    $this->db->select('a.propertyID, a.propertyTitle, a.price, a.securityDeposit, a.propertyType, a.city, a.state, b.id, b.type, c.id, c.name');
		
		$this->db->from('property_tbl as a');
		
		$this->db->where('a.propertyID', $id);
		
		$this->db->join('apt_type_tbl as b', 'b.id = a.propertyType'); 
		
		$this->db->join('states as c', 'c.id = a.state'); 

		$query = $this->db->get();

		return $query->row_array();
	}
	
	public function get_unverifieds(){
		
		$this->db->select('a.user_id, b.userID, b.status, b.verified');
		
		$this->db->from('verifications as a');
		
		$this->db->where("b.verified", "no"); 
		
		$this->db->join('user_tbl as b', 'b.userID = a.user_id'); 		

		return $this->db->count_all_results(); 
	}
	
	public function verifyUser($id, $prop_id){
		
		$updates = array("verified" => "yes");
		
		$update_prop = array("available_date" => "0000-00-00");
		
		$this->db->where("userID", $id);
		
		if($this->db->update('user_tbl', $updates)){
		    
		    $this->db->where('propertyID', $prop_id);
		        
		    return $this->db->update('property_tbl', $update_prop);
		   
		}else{
		    
		    return 0;
		    
		}
	}
	public function verificationFailed($id){
		
		$updates = array("verified" => "failed");
		
		$this->db->where("userID", $id);
		
		return $this->db->update('user_tbl', $updates);
		
	}
	public function verifyAppUser($id){
		
		$updates = array("is_verified" => 2);
		
		$this->db2->where("user_id", $id);
		
		if($this->db2->update("verifications", $updates)){
		    
		    $this->db2->where('id', $id);
		    
		    return $this->db2->update('users', array("verified" => 'yes'));
			
		}else{
			
			return 0;
			
		}
	}
	public function unverifyUser($id){
		
		$updates = array("verified" => "no");
		
		$this->db->where("userID", $id);
		
		return $this->db->update("user_tbl", $updates);
		
	}
	
	public function get_user($id){
		
		$this->db->select('*');
		
		$this->db->from('user_tbl'); 
		
		$this->db->where("userID", $id); 		

		$query = $this->db->get(); 
		
		return $query->row_array();
	}
	
	public function get_app_user($id){
		
		$this->db2->select('name, email, id');
		
		$this->db2->from('users'); 
		
		$this->db2->where("user_id", $id); 		

		$query = $this->db2->get(); 
		
		return $query->row_array();
	}
	public function fetchStates($id){
		$this->db->select('*');
		
		$this->db->from('states'); 
		
		$this->db->where("country_id", $id); 		

		$query = $this->db->get(); 
		
		return $query->result_array();
	}
	public function get_booking($id){
		
		$this->db->select('*');
		
		$this->db->from('bookings'); 
		
		$this->db->where("bookingID", $id); 		

		$query = $this->db->get(); 
		
		return $query->row_array();
	}
	public function get_booking_details($id){
		
		$this->db->select('*');
		
		$this->db->from('bookings'); 
		
		$this->db->where("bookingID", $id); 		

		$query = $this->db->get(); 
		
		return $query->row_array();
	}
	public function get_transaction($id, $ref){
	    
	    $this->db->select('*');
		
		$this->db->from('transaction_tbl'); 
		
		$this->db->where("reference_id", $ref); 
		
		$this->db->where("transaction_id", $id); 		

		$query = $this->db->get(); 
		
		return $query->row_array();
	    
	}
	public function get_user_transactions($id){
	    
	    $this->db->select('a.*, a.status as payment_status, b.*, c.*');
		
		$this->db->from('transaction_tbl as a'); 
		
		$this->db->where("a.userID", $id); 
		
		$this->db->join('bookings as b', 'b.bookingID = a.transaction_id', 'LEFT OUTER');
		
		$this->db->join('user_tbl as c', 'c.userID = a.userID', 'LEFT OUTER');

		$query = $this->db->get(); 
		
		return $query->result_array();
	    
	}
	
	public function getTransaction($id){
	    
	    $this->db->select('*');
		
		$this->db->from('transaction_tbl'); 
		
		$this->db->where("reference_id", $id); 		

		$query = $this->db->get(); 
		
		return $query->row_array();
	    
	}
	public function updatePaymentTransaction($transID, $refID, $propertyID, $expiry, $approvedBy, $the_file_name){
	    
		//Update transaction table
		$updates = array("invoice" => $the_file_name, "status" => "approved", "approved_by" => $approvedBy);
		
		$this->db->where("reference_id", $refID);
		
		if($this->db->update("transaction_tbl", $updates)){
		    
			//Update booking table
			$booking_update = array("rent_status" => "Occupied", "updated_at" => date('Y-m-d H:i:s'));
			
			$this->db->where("bookingID", $transID);
			
			if($this->db->update("bookings", $booking_update)){
			    
			    //Update property table
			    $prop_update = array("available_date" => $expiry);
			    
			    $this->db->where("propertyID", $propertyID);
			    
			    if($this->db->update("property_tbl", $prop_update)){
			        
			        return 1;
			        
			    }else{
			        
			        return 0;
			        
			    }
			}else{
				
				return 0;
				
			}
			
		}else{
			
			return 0;
			
		}
		
	}
	public function getBookingID($id){
	    
	    $this->db->select('transaction_id, reference_id');
	    
	    $this->db->from('transaction_tbl');
	    
	    $this->db->where('reference_id', $id);
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	}
	
	public function updatePropertyStatus($id, $rent_expiry){
		
		$updates = array("available_date" => $rent_expiry);
		
		$this->db->where("propertyID", $id);
		
		return $this->db->update("property_tbl", $updates);
		
	}
	public function fetchAppInspRequests(){
		
		$this->db2->select('a.id, a.residential_id, a.user_id, a.inspection_time, a.created_at, b.id, b.name, c.id, c.title, c.pID');
		
		$this->db2->from('residential_inspections as a');
		
		$this->db2->join('users as b', 'b.id = a.user_id');
		
		$this->db2->join('residentials as c', 'c.id = a.residential_id');
		
		$this->db2->order_by('a.id', 'DESC');
		
		$this->db2->limit($this->_pageNumber, $this->_offset);
		
		$query = $this->db2->get();
		
		return $query->result_array();
	}
	
	public function fetchBtlInspRequests(){
		
		$this->db->select('a.*, b.*, c.*, d.*');
		
		$this->db->from('buytolet_inspection as a');
		
		$this->db->join('user_tbl as b', 'b.userID = a.userID', 'LEFT OUTER');
		
		$this->db->join('buytolet_property as c', 'c.propertyID = a.propertyID', 'LEFT OUTER');
		
		$this->db->join('buytolet_users as d', 'd.userID = b.userID', 'LEFT OUTER');
		
		$this->db->order_by('a.id', 'DESC');
		
		$this->db->limit($this->_pageNumber, $this->_offset);
		
		$query = $this->db->get();
		
		return $query->result_array();
	}
	public function replyInspectionMessage($msgID, $userID, $message, $adminID){

		$msg = $this->db->insert('messages_tbl', array('requestID' => $msgID, 'sender' => $adminID, 'content' => $message, 'subject' => "RE:Inspection Request", 'status' => 'unread', 'receiver' => $userID, 'dateOfEntry' => date('Y-m-d H:i:s')));

		if($msg){ 

			return 1;

		}else{

			return 0;

		}		

	}
	public function assign_admin($id){
	    
	    $update = array("receiver" => $id);
	    
	    $this->db->like("receiver", "");
	    
	    $this->db->update("messages_tbl", $update);
	    
	}
	public function visitorsToday($table){
	    
	    $this->db->select("*");
	    
	    $this->db->from($table);
	    
	    $this->db->where('date_of_entry', date('Y-m-d'));
	    
	    return $this->db->count_all_results();
	}
	public function returningVisitorsToday($table){
	    
	    $this->db->select("*");
	    
	    $this->db->from($table);
	    
	    $this->db->where('date_of_entry', date('Y-m-d'));
	    
	    $this->db->group_by('ip_address');
	    
	    return $this->db->count_all_results();
	}
	public function visitorsLSD($table){
	    
	    $this->db->select("*");
	    
	    $this->db->from($table);
	    
	    $this->db->where('date_of_entry >= date(NOW()) - INTERVAL 7 DAY');
	    
	    return $this->db->count_all_results();
	}
	public function visitsLSD($table){
	    
	    $this->db->select("*");
	    
	    $this->db->from($table);
	    
	    $this->db->where('date_of_entry >= date(NOW()) - INTERVAL 7 DAY');
	    
	    $this->db->group_by('ip_address');
	    
	    return $this->db->count_all_results();
	}
	public function visitorsYesterday($table){
	    
	    $this->db->select("*");
	    
	    $this->db->from($table);
	    
	    $this->db->where('date_of_entry >= date(NOW()) - INTERVAL 1 DAY');
	    
	    return $this->db->count_all_results();
	}
	public function visitsYesterday($table){
	    
	    $this->db->select("*");
	    
	    $this->db->from($table);
	    
	    $this->db->where('date_of_entry >= date(NOW()) - INTERVAL 1 DAY');
	    
	    $this->db->group_by('ip_address');
	    
	    return $this->db->count_all_results();
	}
	
	public function visitorsThirty($table){
	    
	    $this->db->select("*");
	    
	    $this->db->from($table);
	    
	    $this->db->where('date_of_entry >= date(NOW()) - INTERVAL 30 DAY');
	    
	    return $this->db->count_all_results();
	}
	public function visitsThirty($table){
	    
	    $this->db->select("*");
	    
	    $this->db->from($table);
	    
	    $this->db->where('date_of_entry >= date(NOW()) - INTERVAL 30 DAY');
	    
	    $this->db->group_by('ip_address');
	    
	    return $this->db->count_all_results();
	}
	public function visitorsYear($table){
	    
	    $this->db->select("*");
	    
	    $this->db->from($table);
	    
	    $this->db->where('date_of_entry >= date(NOW()) - INTERVAL 365 DAY');
	    
	    return $this->db->count_all_results();
	}
	public function visitsYear($table){
	    
	    $this->db->select("*");
	    
	    $this->db->from($table);
	    
	    $this->db->where('date_of_entry >= date(NOW()) - INTERVAL 365 DAY');
	    
	    $this->db->group_by('ip_address');
	    
	    return $this->db->count_all_results();
	}
	
	public function totalVisitors($table){
	    
	    $this->db->select("*");
	    
	    $this->db->from($table);
	    
	    return $this->db->count_all_results();
	}
	public function totalVisits($table){
	    
	    $this->db->select("*");
	    
	    $this->db->from($table);
	    
	    $this->db->group_by('ip_address');
	    
	    return $this->db->count_all_results();
	}
	
	public function browserTypes($table){
	    
	    $this->db->select("browser_type, SUM(visits) as hits");
	    
	    $this->db->from($table);
	    
	    $this->db->group_by('browser_type');
	    
	    $this->db->limit(7);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function country_visits($table){
	    
	    $this->db->select("country, SUM(visits) as hits");
	    
	    $this->db->from($table);
	    
	    $this->db->group_by('country');
	    
	    $this->db->order_by("hits", "DESC");
	    
	    $this->db->limit(10);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function city_visits($table){
	    
	    $this->db->select("city, SUM(visits) as hits");
	    
	    $this->db->from($table);
	    
	    $this->db->group_by('city');
	    
	    $this->db->order_by("hits", "DESC");
	    
	    $this->db->limit(10);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function referrers($table){
	    
	    $this->db->select("referrer_website as referrer, SUM(visits) as hits");
	    
	    $this->db->from($table);
	    
	    $this->db->group_by('referrer_website');
	    
	    $this->db->order_by("hits", "DESC");
	    
	    $this->db->limit(10);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function get_all_admin(){
	    
	    $this->db->select('adminID');
	    
	    $this->db->from('admin_tbl');
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	}
	
	public function get_recieved_msgs($ids) { 
	    
	    
	    $this->db->select('a.id as msgID, a.requestID, a.content, a.sender, a.receiver, a.subject, a.status as msg_status, a.dateOfEntry, b.id as insID, b.inspectionID, b.propertyID, b.userID, b.inspectionDate, b.inspectionType, c.firstName, c.lastName, c.userID, d.propertyTitle ');

		$this->db->from('messages_tbl as a');
		
		$this->db->where_not_in('a.sender', implode(",", $ids));
		
		/*$this->db->like('a.receiver', $id);
		
		$this->db->like('a.receiver', "");*/
		
		$this->db->join('inspection_tbl as b', "b.inspectionID = a.requestID");
		
		$this->db->join('user_tbl as c', "c.userID = b.userID");
		
		$this->db->join('property_tbl as d', "d.propertyID = b.propertyID");

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
		
	}
	
	public function get_user_details($user_id){
	    
	    $this->db->select('a.*, b.*');
	    
	    $this->db->from('user_tbl as a');
	    
	    $this->db->where('a.userID', $user_id);
	    
	    $this->db->join('verifications as b', 'b.user_id = a.userID', 'LEFT OUTER');
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	}
	
	public function get_user_bookings($user_id){
	    
	    $this->db->select('a.*, b.*, c.*, c.propertyID as pID');
	    
	    $this->db->from('bookings as a');
	    
	    $this->db->where('a.userID', $user_id);
	    
	    $this->db->join('transaction_tbl as b', 'b.transaction_id = a.bookingID', 'LEFT OUTER');
	    
	    $this->db->join('property_tbl as c', 'c.propertyID = a.propertyID', 'LEFT OUTER');
	    
	    $this->db->group_by('c.propertyID');
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	}

	public function get_user_hstry($user_id){
	    
	    $this->db->select('a.*, b.firstName, b.lastName, c.propertyTitle, c.propertyID as pID');
	    
	    $this->db->from('sub_agreement as a');
	    
	    $this->db->where('a.userId', $user_id);
	    
	    $this->db->join('user_tbl as b', 'b.userID = a.userId', 'LEFT OUTER');
	    
	    $this->db->join('property_tbl as c', 'c.propertyID = a.property', 'LEFT OUTER');
	    
	    $this->db->order_by('a.id', 'DESC');
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	}
	
	public function get_user_propty($user_id){
	    
	    $this->db->select('a.*');
	    
	    $this->db->from('property_tbl as a');
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	}
	
	public function get_property_price($propID){
	    
	    $this->db->select('price');
	    
	    $this->db->from('property_tbl');
	    
	    $this->db->where('propertyID', $propID);
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	}
	
	public function createTransaction($user_id, $bookingID, $amount, $verificationID, $expiry, $ref, $invoice_num, $duration){

		if($this->db->insert('transaction_tbl', array('verification_id' => $verificationID, 'type' => 'rss', 'transaction_id' => $bookingID, 'reference_id' => $ref, 'userID' => $user_id, 'amount' => $amount, 'status' => 'approved', 'invoice' => $invoice_num, 'payment_type' => 'transfer', 'transaction_date' => date('Y-m-d H:i:s')))){
		    
		    $updates = array("duration" => $duration, "next_rental" => $expiry, "updated_at" => date('Y-m-d H:i:s'), "rent_status" => "Occupied");
		    
		    $this->db->where('bookingID', $bookingID);
		    
		    return $this->db->update('bookings', $updates);
		}

	}
	public function get_debts($id){
	    
	    $this->db->select('*');
	    
	    $this->db->from('debt');
	    
	    $this->db->where('user_id', $id);
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	}
	
	public function insert_debt($d_data){
	    
	    $this->entry_by = $d_data['adminID'];
	    
	    $this->user_id = $d_data['debtorID'];
	    
	    $this->owed_on = $d_data['debt_period'];
	    
	    $this->amount_owed = $d_data['amount'];
	    
	    $this->note = $d_data['note'];
	    
	    $this->updated_on = date('Y-m-d H:i:s');
	    
	    $this->date_of_entry = date('Y-m-d H:i:s');
	    
	    return $this->db->insert('debt', $this);
	    
	    
	}
	
	public function get_payouts(){
	    
	    $this->db->select('payout_date, payout_day, landlord_name');
	    
	    $this->db->from('landlord_payouts');
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	}
	
	public function payout_notifications($landlord_name, $due_date){
	    
	    $this->landlord_name = $landlord_name;
	    
	    $this->due_date = $due_date;
	    
	    $this->entry_date = date("Y-m-d H:i:s");
	    
	    return $this->db->insert('payout_notifications', $this);
	}
	public function start_processing($user_id){
	    
	    $edits = array("verified" => "processing");
	    
	    $this->db->where("userID", $user_id);
	    
	    return $this->db->update("user_tbl", $edits);
	    
	}
	public function changeStayoneBookingStatus($bookingID, $status){
	    
	    $this->status = $status;
	    
	    $this->db->where("bookingID", $bookingID);
	    
	    return $this->db->update("stayone_booking", $this);
	    
	}
	
	public function getStayoneTransaction($bookingID){
	    
	    $this->db->select('*');
	    
	    $this->db->from('stayone_transactions');
	    
	    $this->db->where('booking_id', $bookingID);
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	    
	}
	
	public function updateStayonePaymentStatus($bookingID, $status){
	    
	    $updates = array("status" => $status, "updated_on" => date('Y-m-d H:i:s'));
	    
	    $this->db->where("booking_id", $bookingID);
	    
	    return $this->db->update("stayone_transactions", $updates);
	    
	}
	public function getStayoneBookingDetails($bookingID){
	    
	    $this->db->select('a.*, a.status as booking_status, a.address as booking_address, b.*, b.status as transaction_status, c.*, c.status as user_status, d.*, d.address as apt_address, d.city as apt_city');
	    
	    $this->db->from('stayone_booking as a');
	    
	    $this->db->where('a.bookingID', $bookingID);
	    
	    $this->db->where('a.status', 1);
	    
	    $this->db->join('stayone_transactions as b', 'b.booking_id = a.bookingID');
	    
	    $this->db->join('user_tbl as c', 'c.userID = a.userID');
	    
	    $this->db->join('stayone_apartments as d', 'd.apartmentID = a.aptID');
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	}
	public function fetchWalletAccounts(){
	    
	    $this->db->select('a.*, b.*, b.userID as user_id');
	    
	    $this->db->from('virtual_account as a');
	    
	    $this->db->join('user_tbl as b', 'b.userID = a.userID');
	    
	    $this->db->order_by('b.lastName', 'ASC');
	    
	    $this->db->limit($this->_pageNumber, $this->_offset);
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	}
	public function searchWalletAccounts($s_data){
	    
	    $this->db->select('a.*, b.*, b.userID as user_id');
	    
	    $this->db->from('virtual_account as a');
	    
	    $this->db->join('user_tbl as b', 'b.userID = a.userID');
	    
	    $this->db->where("(b.firstName LIKE '%".$s_data['s_query']."%' OR b.lastName LIKE '%".$s_data['s_query']."%')");
	    
	    $this->db->order_by('b.lastName', 'ASC');
	    
	    $this->db->limit($this->_pageNumber, $this->_offset);
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	}
	public function fetchUserWalletAccounts($id){
	    
	    $this->db->select('*');
	    
	    $this->db->from('wallet_transactions');
	    
	    $this->db->where('user_id', $id);
	    
	    $this->db->order_by('transaction_date', 'DESC');
	    
	    $this->db->limit($this->_pageNumber, $this->_offset);
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	}
	public function fetchNotifications() {       

		$this->db->select('*');

		$this->db->from('notification_tbl');          

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();

	}
	public function get_notification($id) {       

		$this->db->select('*');

		$this->db->from('notification_tbl');          

		$this->db->where('id', $id);

		$query = $this->db->get();

		return $query->row_array();

	}
	public function updateStayoneInvoice($bookingID, $invoice){
	    
	    $updates = array("invoice" => $invoice, "updated_on" => date('Y-m-d H:i:s'));
	    
	    $this->db->where("booking_id", $bookingID);
	    
	    return $this->db->update("stayone_transactions", $updates);
	    
	}
	public function update_booking($bookingID, $move_out_date){
	    
	    $update = array("rent_status" => "Vacant", "move_out_reason" => "Switch", "move_out_date" => $move_out_date);
	    
	    $this->db->where("bookingID", $bookingID);
	    
	    return $this->db->update("bookings", $update);
	}
	public function fetchBuytoletRequests(){
	    
	    $this->db->select('a.*, b.*, c.*, d.type as investmentType');
	    
	    $this->db->from('buytolet_request as a');
	    
	    $this->db->join('user_tbl as b', 'b.userID = a.userID', 'LEFT OUTER');
	    
	    $this->db->join('buytolet_property as c', 'c.propertyID = a.propertyID', 'LEFT OUTER');
	    
	    $this->db->join('buytolet_investment_type as d', 'd.id = c.investment_type', 'LEFT OUTER');
	    
	    $this->db->order_by('a.id', 'DESC');
	    
	    $this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
	    
	}
	
	public function fetchRequestDetails($id){
	    
	    $this->db->select('a.*, a.firstname as buyer_fname, a.lastname as buyer_lname, a.email as buyer_email, a.phone as buyer_phone, a.status as request_status, b.*, c.*, d.name as stateName, e.*, f.statementPath, g.idPath, h.*, h.status as payment_status');
	    
	    $this->db->from('buytolet_request as a');
	    
	    $this->db->where('a.refID', $id);
	    
	    $this->db->join('user_tbl as b', 'b.userID = a.userID', 'LEFT OUTER');
	    
	    $this->db->join('buytolet_property as c', 'c.propertyID = a.propertyID', 'LEFT OUTER');
	    
	    $this->db->join('states as d', 'd.id = c.state', 'LEFT OUTER');
	    
	    $this->db->join('apt_type_tbl as e', 'e.id = c.apartment_type', 'LEFT OUTER');
	    
	    $this->db->join('buytolet_bank_statement as f', 'f.userID = b.userID', 'LEFT OUTER');
	    
	    $this->db->join('buytolet_finance_id as g', 'g.userID = b.userID', 'LEFT OUTER');
	    
	    $this->db->join('buytolet_transactions as h', 'h.transaction_id = a.refID', 'LEFT OUTER');
	    
	    $this->db->order_by('a.id', 'DESC');
	    
	    $this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->row_array();
	    
	}
	
	public function fetchRequestBeneficiaries($id){
	    
	    $this->db->select('*');
	    
	    $this->db->from('buytolet_beneficiary_details');
	    
	    $this->db->where('requestID', $id);
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	    
	}
	
	public function approve_finance($refID){
	    
	    $update = array('status' => 'approved');
	    
	    $this->db->where('refID', $refID);
	    
	    return $this->db->update('buytolet_request', $update);
	}
	
	public function insert_schedule($userID, $refID, $year_one_payments, $payDate){
	    
	    $this->userID = $userID;
	    
	    $this->reference_id = $refID;
	    
	    $this->amount = $year_one_payments;
	    
	    $this->dates = $payDate;
	    
	    return $this->db->insert('buytolet_payment_schedule', $this);
	}
	public function walletDetails($userID){
	    
	    $this->db->select('account_balance');
	    
	    $this->db->from('virtual_account');
	    
	    $this->db->where('userID', $userID);
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	    
	}
	public function update_wallet($userID, $amount){
	    
	    $update = array("account_balance" => $amount);
	    
	    $this->db->where("userID", $userID);
	    
	    return $this->db->update('virtual_account', $update);
	    
	}
	
	public function getBuytoletProperties(){
	    
	    $this->db->select('property_name, propertyID');
	    
	    $this->db->from('buytolet_property');
	    
	    $this->db->where('investment_type', 5);
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	}
	
	public function get_user_by_email($email){

		$this->db->select('*');

		$this->db->from('user_tbl');
		
		$this->db->where('email', $email);

		$query = $this->db->get();

		return $query->row_array();

	}
	
	public function getBytoletPropertyByID($id){		

		$this->db->select('*');		

		$this->db->from('buytolet_property');	

		$this->db->where('propertyID', $id);			

		$query = $this->db->get();

		return $query->row_array();

	}

	public function editCxAdvert($link, $filename, $title, $id){
	    
	    $edits = array("link" => $link, "filename" => $filename, "title" => $title, "date" => date('Y-m-d'));
	    
	    $this->db->where("id", $id);
	    
	    return $this->db->update("cx_adverts", $edits);
	    
	}


	public function insertCxAdvert($link, $filename, $title){

        $data = array(
			'title' => $title,
            'link' => $link,
            'filename'   => $filename,
            'Date' => date('Y-m-d'),
        );

		if($this->db->insert('cx_adverts', $data)){

			return 1;

		}else{

			return 0;

		}	
		
	}


	
	public function insertCoOwnRequest($ref, $buyer_type, $payment_plan, $property_id, $cost, $userID, $payable, $balance, $mop, $payment_period, $unit_amount, $promo_code, $id_path, $statement_path, $firstname, $lastname, $email, $phone, $company_name, $position, $occupation, $income_range, $company_address, $admin_id, $offer_type, $share_condition = 1){ 
	    
	    if($offer_type == 'champions'){
	        
	        $share_condition = 0;
	        
	    }
	    
	    $today = date('Y-m-d H:i:s');
	    
		$this->userID = $userID;
		
		$this->refID = $ref;
		
		$this->propertyID = $property_id;
		
		$this->plan = $payment_plan;
		
		$this->buyer_type = $buyer_type;
		
		$this->firstname = $firstname;
		
		$this->lastname = $lastname;
		
		$this->email = $email;
		
		$this->phone = $phone;
		
		$this->company = $company_name;
		
		$this->occupation = $occupation;
		
		$this->position = $position;
		
		$this->income_range = $income_range;

		$this->company_address = $company_address;
		
		$this->amount = $cost;
		
		$this->payable = $payable;
		
		$this->finance_balance = $balance;
		
		$this->method = $mop;
		
		$this->unit_amount = $unit_amount;
		
		$this->status = 'new'; 
		
		$this->payment_period = $payment_period;
		
		$this->promo_code = $promo_code;
		
		$this->purchase_beneficiary = ucfirst($offer_type);
		
		$this->share_condition = $share_condition;
		
		$this->request_date = $today;
		
		if($this->db->insert("buytolet_request", $this)){
		    
            if($offer_type == 'champions'){
                
                //Insert into gift basket
                $basket_array = array("user_id" => $userID, "request_id" => $ref, "shares" => $unit_amount, "property_id" => $property_id, "status" => "Locked", "type" => "Champions", "date_created" => $today);
	    
        	    $this->db->insert('gift_basket', $basket_array);
        	    
        	}
        	
        	//Insert transaction
            $trans_dets = array("propertyID" => $property_id, "userID" => $userID, "transaction_id" => $ref, "amount" => $payable, "payment_type" => 'Promotional', "status" => "Completed", "transactionDate" => $today);
            
            if($this->db->insert("buytolet_transactions", $trans_dets)){
                
                $promotion_dets = array("user_id" => $userID, "property_id" => $property_id, "reference_id" => $ref, "given_by" => $admin_id, "entry_date" => $today);
                
                if($this->db->insert('buytolet_promotion', $promotion_dets)){
        	        
        	        return 1;
        	    
                }else{
                    
                    return 0;
                }
        	    
            }else{
                
                return 0;
                
            }
		}else{
			
			return 0;
			
		}
	}
	
	public function update_buytolet_units($units, $id){
	    
		$data = array('available_units' => $units);
		
		$this->db->where('propertyID', $id);
		
		if($this->db->update('buytolet_property', $data)){
			
			return 1;
			
		}else{
			
			return 0;
			
		}	
	}
	
	public function create_user_account($id, $fname, $lname, $email, $password, $phone, $refCode, $confirmationCode){

		$today = date('Y-m-d H:i:s');

        $user_insert = array("userID" => $id, "firstName" => $fname, "lastName" => $lname, "email" => $email, "password" => $password, "phone" => $phone, "income" => 0, "referral" => 'Buysmallsmall Gift', "user_type" => 'Landlord', "interest" => 'Buy', "verified" => 'no', "points" => 0, "status" => 'Active', "referred_by" =>$refCode, "regDate" => $today);

        if($this->db->insert('user_tbl', $user_insert)){

            return $this->db->insert('login_tbl', array('email' => $email, 'password' => $password, 'userID' => $id, 'lastLogin' => $today, 'confirmation' => $confirmationCode));
            
        }else{
            
            return 0;
        }

    }
    
    public function publish_promo($details, $id){
        
        $this->promo_title = $details['promo_title'];
        
        $this->type = $details['promo_type'];
        
        $this->promo_code = $details['promo_code'];
        
        $this->promo_value = $details['promo_value'];
        
        $this->promo_term = $details['promo_term'];
        
        $this->promo_beneficiary = $details['promo_beneficiary'];
        
        $this->status = 1;
        
        $this->start_date = date('Y-m-d', strtotime($details['start_date']));
        
        $this->end_date = date('Y-m-d', strtotime($details['end_date']));
        
        $this->created_by = $id;
        
        return $this->db->insert('buytolet_promos', $this);
        
    }

    public function countSubscribers() {

	$this->db->select('a.*, b.*');

	$this->db->from('target_options as a'); 
	
	$this->db->join('user_tbl as b', 'b.userID = a.userID');
	
	return $this->db->count_all_results();

   }

public function fetchSubscribers() {

	$this->db->select('a.*, a.id as stp_id, a.userID as user_id, b.*, c.*');

	$this->db->from('target_options as a'); 
	
	$this->db->join('user_tbl as b', 'b.userID = a.userID');

	$this->db->join('buytolet_transactions as c', 'c.transaction_id = a.request_id');
    
    	$this->db->limit($this->_pageNumber, $this->_offset);

	$query = $this->db->get();
	
	return $query->result_array();

}
	
}
