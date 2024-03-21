<?php

class Rss_model extends CI_Model
{

	public function __construct()
	{

		parent::__construct();
	}

	private $_limit;

	private $_pageNumber;

	private $_offset;

	// setter getter functionf

	public function setLimit($limit)
	{

		$this->_limit = $limit;
	}

	public function setPageNumber($pageNumber)
	{

		$this->_pageNumber = $pageNumber;
	}

	public function setOffset($offset)
	{

		$this->_offset = $offset;
	}

	public function count_premium_properties()
	{

		$this->db->from('property_tbl');

		$this->db->where('premium_property', 1);

		return $this->db->count_all_results();
	}

	public function count_bedspaces()
	{

		$this->db->from('property_tbl');

		$this->db->where('propertyType', 11);

		return $this->db->count_all_results();
	}

	public function count_shared_homes()
	{

		$this->db->from('property_tbl');

		$this->db->where('propertyType', 8);

		return $this->db->count_all_results();
	}

	public function fetchCountry($country_name)
	{

		$this->db->select('*');

		$this->db->from('countries');

		$this->db->where('name', $country_name);

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function fetchStates($id)
	{

		$this->db->select('*');

		$this->db->from('states');

		$this->db->where('country_id', $id);

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function fetchHomeCities($ids)
	{

		$this->db->select('a.city, b.name, b.id, b.state_id');

		$this->db->from('property_tbl as a');

		$this->db->where_in('b.state_id', $ids);

		$this->db->join('cities as b', 'b.name = a.city');

		$this->db->group_by('a.city');

		$this->db->order_by('b.name', 'ASC');

		//$this->db->limit(12);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function fetchAvailableStates($country)
	{

		$this->db->select('a.state, b.name, b.id as state_id');

		$this->db->from('property_tbl as a');

		$this->db->where_in('b.country_id', $country);

		$this->db->join('states as b', 'b.id = a.state');

		$this->db->group_by('a.state');

		$this->db->order_by('b.name', 'ASC');

		$query = $this->db->get();

		return $query->result_array();
	}
	public function areasWeCoverCities($id)
	{

		$this->db->select('a.city, b.name, b.id, b.state_id');

		$this->db->from('property_tbl as a');

		$this->db->where('b.state_id', $id);

		$this->db->join('cities as b', 'b.name = a.city');

		$this->db->group_by('a.city');

		$this->db->order_by('b.name', 'ASC');

		$query = $this->db->get();

		return $query->result_array();
	}
	/*public function fetchAreasWeCover($id){
		
		$this->db->select('a.city, b.name, b.id, b.state_id');

		$this->db->from('property_tbl as a');
		
		$this->db->where('b.state_id', $id ); 
		
		$this->db->join('cities as b', 'b.name = a.city');
		
		$this->db->group_by('a.city'); 

		$this->db->limit(12);

		$query = $this->db->get();

		return $query->result_array(); 
		
	}*/
	public function get_city_name($id)
	{

		$this->db->select('name');

		$this->db->from('cities');

		$this->db->where('id', $id);

		$query = $this->db->get();

		return $query->row_array();
	}
	public function get_city_id($name)
	{

		$this->db->select('id');

		$this->db->from('cities');

		$this->db->where('name', $name);

		$query = $this->db->get();

		return $query->row_array();
	}
	public function fetchCities($id)
	{

		$this->db->select('*');

		$this->db->from('cities');

		$this->db->where('state_id', $id);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function countProperties()
	{

		$this->db->from('property_tbl');

		return $this->db->count_all_results();
	}
	public function countPropertyType($slug)
	{

		$this->db->from('apt_type_tbl as a');

		if ($slug != 'all') {

			$this->db->where('a.slug', $slug);
		}

		$this->db->join('property_tbl as b', 'b.propertyType = a.id');

		return $this->db->count_all_results();
	}
	public function countMyProperties($id)
	{

		$this->db->from('property_tbl');

		$this->db->where('property_owner', $id);

		return $this->db->count_all_results();
	}
	public function countAllPayouts($id)
	{

		$this->db->from('payout_transactions');

		$this->db->where('user_id', $id);

		//$this->db->where('status', 'paid');

		return $this->db->count_all_results();
	}

	public function countAllFilteredPayouts($id, $s_data)
	{

		$this->db->from('payout_transactions');

		$this->db->where('user_id', $id);

		if ($s_data['property']) {

			$this->db->where('property_id', $s_data['property']);
		}

		if ($s_data['startDate'] && $s_data['endDate']) {

			$this->db->where('payout_date >=', date('Y-m-d', strtotime($s_data['startDate'])));

			$this->db->where('payout_date <=', date('Y-m-d', strtotime($s_data['endDate'])));
		} elseif ($s_data['startDate']) {

			$this->db->where('payout_date >=', date('Y-m-d', strtotime($s_data['startDate'])));
		} elseif ($s_data['endDate']) {

			$this->db->where('payout_date <=', date('Y-m-d', strtotime($s_data['endDate'])));
		}

		//$query = $this->db->get();

		//print_r($this->db->last_query()); 

		//print_r($query);
		//exit;

		return $this->db->count_all_results();
	}

	public function countAllRentedProps($id)
	{

		$this->db->from('property_tbl');

		$this->db->where('property_owner', $id);

		$this->db->where('available_date >=', date('Y-m-d'));

		return $this->db->count_all_results();
	}
	public function getTenantFilterCount($id, $sdata)
	{

		$this->db->from('property_tbl');

		if ($sdata['property']) {

			$this->db->where('propertyID', $sdata['property']);
		}

		$this->db->where('property_owner', $id);

		$this->db->where('available_date >=', date('Y-m-d'));

		return $this->db->count_all_results();
	}
	public function countAllVacantProps($id)
	{

		$this->db->from('property_tbl');

		$this->db->where('property_owner', $id);

		$this->db->where('available_date <', date('Y-m-d'));

		return $this->db->count_all_results();
	}
	public function countMyMessages($id)
	{

		$this->db->from('landlord_messages');

		$this->db->where('receiver', $id);

		return $this->db->count_all_results();
	}

	public function countMySentMessages($id)
	{

		$this->db->from('landlord_messages');

		$this->db->where('sender', $id);

		return $this->db->count_all_results();
	}

	public function countArticles()
	{

		$this->db->from('blog_tbl');

		return $this->db->count_all_results();
	}

	public function getBookingCount($id)
	{

		$this->db->from('bookings');

		$this->db->where("userID", $id);

		return $this->db->count_all_results();
	}

	public function countAreasWeCover($city)
	{

		$this->db->from('property_tbl');

		$this->db->where('city', $city);

		return $this->db->count_all_results();
	}

	public function getArticles()
	{

		$this->db->select('*');

		$this->db->from('blog_tbl');

		$this->db->order_by('articleID', 'DESC');

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getArticle($slug)
	{

		$this->db->select('*');

		$this->db->from('blog_tbl');

		$this->db->where('articleSlug', $slug);

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_view($slug)
	{

		$this->db->select('views');

		$this->db->from('blog_tbl');

		$this->db->where('articleSlug', $slug);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function increaseView($num, $slug)
	{

		$view = array('views' => $num);

		$this->db->where('articleSlug', $slug);

		return $this->db->update('blog_tbl', $view);
	}

	public function getNearbyFacilities($id)
	{

		$this->db->select('*');

		$this->db->from('neighborhood_facility_tbl');

		$this->db->where('property', $id);

		$this->db->limit(3);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function fetchHomeProperties($propType)
	{

		$this->db->select('*');

		$this->db->from('property_tbl');

		$this->db->where('propertyType', $propType);

		$this->db->limit(6);

		$this->db->order_by('id', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	}
	public function fetchPremiumProperties()
	{

		$this->db->select('*');

		$this->db->from('property_tbl');

		$this->db->where('premium_property', 1);

		$this->db->limit(6);

		$this->db->order_by('available_date', 'ASC');

		$query = $this->db->get();

		return $query->result_array();
	}
	public function fetchFeaturedProperties()
	{

		$this->db->select('*');

		$this->db->from('property_tbl');

		$this->db->where('featured_property', 'yes');

		$this->db->limit(8);

		$this->db->order_by('available_date', 'ASC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function fetchHomeLatestProperties()
	{

		$this->db->select('*');

		$this->db->from('property_tbl');

		$this->db->limit(6);

		$this->db->order_by('id', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	}
	public function fetchHomeHighestViewedProperties()
	{

		$this->db->select('*');

		$this->db->from('property_tbl');

		$this->db->limit(6);

		$this->db->order_by('available_date', 'ASC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function fetchRelatedProperties($propType, $limit)
	{

		$this->db->select('*');

		$this->db->from('property_tbl');

		$this->db->where('propertyType', $propType);

		$this->db->limit($limit);

		$this->db->order_by('available_date', 'ASC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function fetchProperties()
	{

		$this->db->select('*');

		$this->db->from('property_tbl');

		$this->db->limit(12, $this->_offset);

		$this->db->order_by('available_date', 'ASC');

		$query = $this->db->get();

		return $query->result_array();
	}
	public function fetchPropertyType($slug)
	{

		$this->db->select('a.*, b.*');

		$this->db->from('apt_type_tbl as a');

		if ($slug != 'all') {

			$this->db->where('a.slug', $slug);
		}

		$this->db->join('property_tbl as b', 'b.propertyType = a.id');

		$this->db->limit(12, $this->_offset);

		$this->db->order_by('b.available_date', 'ASC');

		$query = $this->db->get();

		return $query->result_array();
	}
	public function fetchLandlordProperties($id)
	{

		$this->db->select('*');

		$this->db->from('property_tbl');

		$this->db->where('property_owner', $id);

		$this->db->limit($this->_pageNumber, $this->_offset);

		$this->db->order_by('id', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	}
	public function fetchAreasWeCover($city)
	{

		$this->db->select('*');

		$this->db->from('property_tbl');

		$this->db->where('city', $city);

		$this->db->limit($this->_pageNumber, $this->_offset);

		$this->db->order_by('available_date', 'ASC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_available_date($propID)
	{

		$this->db->select('*');

		$this->db->from('bookings');

		$this->db->where('propertyID', $propID);

		$this->db->order_by('id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	/*public function get_user($id){

		$this->db->select('a.*, b.firstName as ad_fname, b.lastName as ad_lname, b.email as ad_email, b.phone as ad_phone');

		$this->db->from('user_tbl as a');
		
		$this->db->where('a.userID', $id);
		
		$this->db->join('admin_tbl as b', 'b.adminID = a.account_manager', 'LEFT OUTER');

		$query = $this->db->get();

		return $query->row_array();

	}*/
	public function get_user($id)
	{

		$this->db->select('*');

		$this->db->from('user_tbl');

		$this->db->where('userID', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_admin($id)
	{

		$this->db->select('*');

		$this->db->from('admin_tbl');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function fetch_bookings($id, $limit, $start)
	{

		$this->db->select('a.id, a.bookingID, a.verification_id, a.reference_id, a.propertyID, a.userID, a.booked_as, a.payment_plan, a.duration, a.move_in_date, a.rent_expiration, a.booked_on, a.updated_at, a.rent_status, a.next_rental, b.verified, b.user_type, c.*, c.state, d.*, d.name as state_name');

		$this->db->from('bookings as a');

		$this->db->where('a.userID', $id);

		$this->db->join('user_tbl as b', 'b.userID = a.userID', 'LEFT OUTER');

		$this->db->join('property_tbl as c', 'c.propertyID = a.propertyID', 'LEFT OUTER');

		$this->db->join('states as d', 'd.id = c.state', 'LEFT OUTER');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit($limit, $start);

		$query = $this->db->get();

		return $query;
	}
	public function fetch_repairs($id, $limit, $start)
	{

		$this->db->select('a.*, a.status as repair_status, b.*');

		$this->db->from('repair_tbl as a');

		$this->db->where('a.user_id', $id);

		$this->db->join('property_tbl as b', 'b.propertyID = a.property_id');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit($limit, $start);

		$query = $this->db->get();

		return $query;
	}

	public function fetch_stayone_bookings($id, $limit, $start)
	{

		$this->db->select('a.*, b.*, c.*, d.name as state_name');

		$this->db->from('stayone_booking as a');

		$this->db->where('a.userID', $id);

		$this->db->join('user_tbl as b', 'b.userID = a.userID');

		$this->db->join('stayone_apartments as c', 'c.apartmentID = a.aptID');

		$this->db->join('states as d', 'd.id = c.state');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit($limit, $start);

		$query = $this->db->get();

		return $query;
	}
	public function getBookingDetails($userID, $propID)
	{

		$this->db->select('*');

		$this->db->from('bookings');

		$this->db->where('userID', $userID);

		$this->db->where('propertyID', $propID);

		$query = $this->db->get();

		return $query->row_array();
	}
	public function getLastBookingDetails($id)
	{

		$this->db->select('*');

		$this->db->from('bookings');

		$this->db->where('userID', $id);

		$this->db->where('rent_status', 'Occupied');

		$this->db->order_by('id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}
	public function getPropTypes()
	{

		$this->db->select('*');

		$this->db->from('apt_type_tbl');

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getRentTypes()
	{

		$this->db->select('*');

		$this->db->from('rent_type');

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function fetch_messages($id, $limit, $start)
	{

		$this->db->select('a.*, a.id as msg_id, b.*');

		$this->db->from('messages_tbl as a');

		$this->db->where('a.receiver', $id);

		$this->db->join('admin_tbl as b', 'b.adminID = a.sender');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit($limit, $start);

		$query = $this->db->get();

		return $query;
	}


	public function fetch_message($id, $limit, $start)
	{

		$this->db->select('*');

		$this->db->from('user_notification');

		$this->db->where('userID', $id);

		$this->db->order_by('entry_date', 'DESC');

		$this->db->limit($limit, $start);

		$query = $this->db->get();

		return $query;
	}

	public function fetch_landlord_messages($id, $limit, $start)
	{

		$this->db->select('a.*, a.id as msg_id, b.*');

		$this->db->from('landlord_messages as a');

		$this->db->where('a.receiver', $id);

		$this->db->join('admin_tbl as b', 'b.adminID = a.sender');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit($limit, $start);

		$query = $this->db->get();

		return $query;
	}
	public function get_transactions($id, $limit, $start)
	{

		$this->db->select('*');

		$this->db->from('transaction_tbl');

		$this->db->where('userID', $id);

		$this->db->order_by('id', 'DESC');

		$this->db->limit($limit, $start);

		$query = $this->db->get();

		return $query;
	}

	public function get_wallet_transactions($id, $limit, $start)
	{

		$this->db->select('*');

		$this->db->from('wallet_transactions');

		$this->db->where('user_id', $id);

		$this->db->order_by('id', 'DESC');

		$this->db->limit($limit, $start);

		$query = $this->db->get();

		return $query;
	}

	public function get_property($id)
	{

		$this->db->select('a.*, b.*, c.name as state_name');

		$this->db->from('property_tbl as a');

		$this->db->where('a.propertyID', $id);

		$this->db->join('apt_type_tbl as b', 'b.id = a.propertyType');

		$this->db->join('states as c', 'c.id = a.state');

		$query = $this->db->get();

		return $query->row_array();
	}
	public function get_vacant_property($id)
	{

		$this->db->select('*');

		$this->db->from('property_tbl');

		$this->db->where('propertyID', $id);

		$this->db->where('available_date >=', date('Y-m-d'));

		return $this->db->count_all_results();
	}
	public function get_existing_property($id)
	{

		$this->db->select('*');

		$this->db->from('property_tbl');

		$this->db->where('propertyID', $id);

		$query = $this->db->get();

		return $query->row_array();
	}
	public function get_booking_details($propID, $bookingID, $refID)
	{

		$this->db->select('a.*, b.*, c.*, c.propertyID as pID');

		$this->db->from('transaction_tbl as a');

		$this->db->where('a.transaction_id', $bookingID);

		$this->db->where('a.reference_id', $refID);

		$this->db->join('bookings as c', 'c.reference_id = a.reference_id', 'LEFT OUTER');

		$this->db->join('property_tbl as b', 'b.propertyID = c.propertyID', 'LEFT OUTER');

		$query = $this->db->get();

		return $query->row_array();
	}
	public function get_renewal_det($trans_id)
	{

		$this->db->select('a.id, a.verification_id, a.transaction_id, a.reference_id, a.amount, a.payment_type, a.status, b.bookingID, b.payment_plan, b.duration, b.propertyID, b.userID, b.next_rental as rent_expiration, c.firstName, c.lastName, c.email, c.phone, d.propertyTitle, d.price');

		$this->db->from('transaction_tbl as a');

		$this->db->where('a.transaction_id', $trans_id);

		$this->db->join('bookings as b', 'b.bookingID = a.transaction_id');

		$this->db->join('user_tbl as c', 'c.userID = b.userID');

		$this->db->join('property_tbl as d', 'd.propertyID = b.propertyID');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_transaction($id)
	{

		$this->db->select('*');

		$this->db->from('transaction_tbl');

		$this->db->where('transaction_id', $id);

		$this->db->order_by('id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_payment_details($id)
	{

		$this->db->select('a.*, b.*, c.*, d.*');

		// 		$this->db->select('a.id, a.verification_id, a.reference_id, a.amount, a.transaction_id, a.status, a.transaction_date, a.type, a.payment_type, b.reference_id, b.bookingID, b.verification_id, b.propertyID, b.payment_plan, b.duration, b.rent_status, b.rent_expiration, b.booked_on, c.propertyTitle, c.price, c.securityDeposit, c.securityDepositTerm, d.email, d.firstName, d.lastName'); 

		$this->db->from('transaction_tbl as a');

		$this->db->where('a.reference_id', $id);

		$this->db->join('bookings as b', 'b.bookingID = a.transaction_id');

		$this->db->join('property_tbl as c', 'c.propertyID = b.propertyID');

		$this->db->join('user_tbl as d', 'd.userID = a.userID');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function check_email($email)
	{

		$this->db->select('email, password, userID');

		$this->db->from('user_tbl');

		$this->db->where('email', $email);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_user_login($user_id)
	{

		$this->db->select('a.password, a.lastLogin, a.confirmation, b.*, b.user_type');

		$this->db->from('login_tbl as a');

		$this->db->where('a.userID', $user_id);

		$this->db->where('b.status', 'Active');

		$this->db->join('user_tbl as b', 'b.userID = a.userID');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function update_password_to_hash($id, $password){

		$new_password = array("password" => $password);

		$this->db->where('userID', $id);

		if($this->db->update('user_tbl', $new_password)){

			if($this->db->update('login_tbl', $new_password)){
				
				return 1;

			}else{

				return 0;

			}

		}else{

			return 0;

		}

	}

	public function changeRefferal($referral, $id)
	{

		$updates = array("referral" => $referral);

		$this->db->where("userID", $id);

		$this->db->update("user_tbl", $updates);
	}

	public function check_reset_email($email)
	{

		$this->db->select('*');

		$this->db->from('user_tbl');

		$this->db->where('email', $email);

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function insertResetDetails($userID, $reset_code)
	{

		$this->userID = $userID;

		$this->reset_code = $reset_code;

		$this->request_date = date('Y-m-d H:i:s');

		$this->expiry_date = date('Y-m-d H:i:s', strtotime("+2 days"));

		return $this->db->insert('pwd_reset', $this);
	}

	public function fetchProperty($id)
	{

		$this->db->select('a.propertyID, a.propertyTitle, a.propertyType, a.propertyDescription, a.rentalCondition, a.address, a.city, a.state, a.zip, a.price, a.serviceCharge, a.serviceChargeTerm, a.securityDeposit, a.securityDepositTerm, a.paymentPlan, a.intervals, a.frequency, a.imageFolder, a.featuredImg, a.amenities, a.bed, a.bath, a.toilet, a.poster, a.furnishing, a.status, a.available_date, a.views, a.dateOfEntry, b.name, b.category, b.distance, c.name, d.id, d.type, d.slug as type_slug, e.manager');

		$this->db->from('property_tbl as a');

		$this->db->where('propertyID', $id);

		$this->db->join('neighborhood_facility_tbl as b', 'b.property = a.propertyID', 'LEFT');

		$this->db->join('states as c', 'c.id = a.state', 'LEFT');

		$this->db->join('apt_type_tbl as d', 'd.id = a.propertyType', 'LEFT');

		$this->db->join('property_managers as e', 'e.id = a.managed_by', 'LEFT OUTER');

		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			return $query->row_array();
		} else {

			return 0;
		}
	}
	public function rent_status($id)
	{

		$this->db->select('a.id, a.propertyID, a.bookingID, a.verification_id, a.duration, a.userID, a.move_in_date, a.booked_on, b.verification_id, b.transaction_id, b.status, b.amount');

		$this->db->from('bookings as a');

		$this->db->where('a.propertyID', $id);

		$this->db->where('b.status', 'approved');

		$this->db->join('transaction_tbl as b', 'b.verification_id = a.verification_id', 'LEFT');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {

			return $query->row_array();
		} else {

			return 0;
		}
	}
	public function get_user_log_details($email)
	{

		$this->db->select('a.*, b.*');

		$this->db->from('user_tbl as a');

		$this->db->where('a.email', $email);

		$this->db->join('login_tbl as b', 'a.userID = b.userID');

		$query = $this->db->get();

		return $query->row_array();
	}
	public function get_user_pic($id)
	{

		$this->db->select('profile_picture');

		$this->db->from('user_tbl');

		$this->db->where('userID', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function login($username, $password)
	{

		$this->db->select('a.password, a.lastLogin, a.confirmation, b.*, b.user_type');

		$this->db->from('login_tbl as a');

		$this->db->where('a.email', $username);

		$this->db->where('b.status', 'Active');

		$this->db->join('user_tbl as b', 'b.userID = a.userID', 'LEFT');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function register($fname, $lname, $email, $password, $phone, $income, $confirmationCode, $referral, $user_type, $interest, $referred_by, $rc, $age, $gender, $user_agent)
	{

		$digits = 12;

		$randomNumber = '';

		$count = 0;

		while ($count < $digits) {

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

		$this->referral = $referral;

		$this->age = $age;

		$this->gender = $gender;

		$this->referred_by = $referred_by;

		$this->referral_code = $rc;

		$this->user_type = $user_type;

		$this->interest = $interest;

		$this->verified = 'no';

		$this->points = 0;

		$this->platform = 'Web';

		$this->user_agent = $user_agent;

		$this->status = 'Active';

		$this->regDate = date('Y-m-d H:i:s');

		if ($this->db->insert('user_tbl', $this)) {

			$lastlog = date('Y-m-d H:i:s');

			$res = $this->db->insert('login_tbl', array('email' => $email, 'password' => $password, 'userID' => $id, 'lastLogin' => $lastlog, 'confirmation' => $confirmationCode));

			if ($res) {

				return 1;
			} else {

				return "Error inserting in Login table.";
			}
		} else {

			return "Profile insertion error!";
		}
	}
	public function check_verification_status($id)
	{

		$this->db->select('verified');

		$this->db->from('user_tbl');

		$this->db->where('userID', $id);

		$query = $this->db->get();

		return $query->row_array();
	}
	public function register_from_app($id, $fname, $lname, $email, $password, $phone, $income, $referral, $user_type, $interest, $verified)
	{

		$this->userID = $id;

		$this->firstName = $fname; // please read the below note

		$this->lastName = $lname;

		$this->email = $email;

		$this->password = $password;

		$this->phone = $phone;

		$this->income = $income;

		$this->referral = $referral;

		$this->user_type = $user_type;

		$this->interest = $interest;

		$this->verified = 'no';

		$this->status = 'Active';

		$this->regDate = date('Y-m-d H:i:s');

		if ($this->db->insert('user_tbl', $this)) {

			$lastlog = date('Y-m-d H:i:s');

			$res = $this->db->insert('login_tbl', array('email' => $email, 'password' => $password, 'userID' => $id, 'lastLogin' => $lastlog, 'confirmation' => ""));


			if ($res) {

				return 1;
			} else {

				return "Error inserting in Login table.";
			}
		} else {

			return "Profile insertion error!";
		}
	}



	public function bookInspection($inspection_id, $propID, $inspectionDate, $userID, $inspectionType)
	{

		$this->inspectionID = $inspection_id;

		$this->propertyID = $propID;

		$this->userID = $userID;

		$this->inspectionType = $inspectionType;

		$this->inspectionDate = $inspectionDate;

		$this->platform = 'Web';

		$this->dateOfEntry = date('Y-m-d H:i:s');

		if ($this->db->insert('inspection_tbl', $this)) {

			$content = "Is the property available for visitation on " . $inspectionDate . "<br />Inspection Type: " . $inspectionType . " ?";

			$msg = $this->db->insert('messages_tbl', array('requestID' => $inspection_id, 'sender' => $userID, 'content' => $content, 'subject' => "Inspection Request", 'status' => 'unread', 'dateOfEntry' => date('Y-m-d H:i:s')));

			if ($msg) {

				return 1;
			} else {

				return 0;
			}
		}
	}

	public function getVerification($user_id)
	{

		$this->db->select('verification_id, user_id');

		$this->db->from('verifications');

		$this->db->where('user_id', $user_id);

		$this->db->order_by('id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function setAvailability($lock_date, $propID)
	{

		$data = array("available_date" => $lock_date);

		$this->db->where("propertyID", $propID);

		return $this->db->update("property_tbl", $data);
	}

	public function insertVerification($firstname, $lastname, $email, $phone, $gross_pay, $dob, $gender, $marital_status, $state, $city, $linkedinUrl, $country, $passport_number, $present_address, $rent_country, $rent_state, $rent_city, $previous_rent_duration, $renting_status, $previous_eviction, $pet, $critical_illness, $landlord_fullname, $landlord_email, $landlord_phone, $landlord_address, $reason_for_leaving, $employment_status, $job_title, $company_address, $manager_hr_name, $manager_hr_email, $manager_hr_phone, $guarantor_name, $guarantor_email, $guarantor_phone, $guarantor_job_title, $guarantor_address, $statement_path, $id_path, $user_id, $company_name, $platform, $user_agent, $propertyID = NULL)
	{

		$digits = 10;

		$randomNumber = '';

		$count = 0;

		while ($count < $digits) {

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;
		}

		$ver_id = $randomNumber;

		$this->user_id = $user_id;

		$this->verification_id = $ver_id;

		$this->gross_annual_income = $gross_pay;

		$this->birth_place = $city;

		$this->country_id = $country;

		$this->birth_place = $state;

		$this->dob = date('Y-m-d', strtotime($dob));

		$this->marital_status = $marital_status;

		$this->present_address = $present_address;

		$this->present_country = $rent_country;

		$this->duration_present_address = $previous_rent_duration;

		$this->current_renting_status = $renting_status;

		$this->disability = $critical_illness;

		$this->pets = $pet;

		$this->present_landlord = $landlord_fullname;

		$this->landlord_email = $landlord_email;

		$this->landlord_phone = $landlord_phone;

		$this->landlord_address = $landlord_address;

		$this->reason_for_living = $reason_for_leaving;

		$this->employment_status = $employment_status;

		$this->occupation = $job_title;

		$this->company_name = $company_name;

		$this->company_address = $company_address;

		$this->hr_manager_name = $manager_hr_name;

		$this->hr_manager_email = $manager_hr_email;

		$this->office_phone = $manager_hr_phone;

		$this->guarantor_name = $guarantor_name;

		$this->guarantor_email = $guarantor_email;

		$this->guarantor_phone = $guarantor_phone;

		$this->guarantor_occupation = $guarantor_job_title;

		$this->guarantor_address = $guarantor_address;

		$this->linkedin_url = $linkedinUrl;

		$this->platform = $platform;

		$this->user_agent = $user_agent;

		$this->propertyID = $propertyID;

		$this->created_at = date("Y-m-d H:i:s");

		$this->updated_at = date("Y-m-d H:i:s");

		if ($this->db->insert('verifications', $this)) {

			$ver_stat = array("verified" => "received");

			$this->db->where("userID", $user_id);

			if ($this->db->update("user_tbl", $ver_stat)) {

				$bank = $this->db->insert('bank_statements', array('verification_id' => $ver_id, 'user_id' => $user_id, 'file_path' => $statement_path, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')));

				if ($bank) {

					if ($this->db->insert('valid_ids', array('verification_id' => $ver_id, 'user_id' => $user_id, 'file_path' => $id_path, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')))) {

						return $ver_id;
					}
				} else {

					return 0;
				}
			}
		}
	}

	public function insertTransaction($orderType, $user_id, $productID, $prodPrice)
	{

		$digits = 10;

		$randomNumber = '';

		$count = 0;

		while ($count < $digits) {

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;
		}

		$id = $randomNumber;

		$this->db->insert('transaction_tbl', array('transction_id' => $id, 'user_id' => $user_id, 'product_id' => $productID, 'amount' => $prodPrice, 'status' => 'pending', 'payment_type' => 'paystack', 'transaction_date' => date('Y-m-d')));
	}


	public function insertBooking($id, $verificationID, $user_id, $productID, $productTitle, $paymentPlan, $prodPrice, $imageLink, $productUrl, $securityDeposit, $duration, $booked_as, $move_in_date, $payment_type, $total_cost, $ref, $subscriptionFees, $serviceChargeDeposit, $securityDepositFund, $total)
	{

		//$nMonths = 12;

		$startdate = date("Y-m-d", strtotime($move_in_date));

		if ($paymentPlan == 'Upfront') {
			if ($duration == 12) {

				$nMonths = 12;
			} elseif ($duration == 9) {

				$nMonths = 9;
			} elseif ($duration == 6) {

				$nMonths = 6;
			} elseif ($duration == 3) {

				$nMonths = 3;
			}
		} else if ($paymentPlan == 'Bi-annual') {

			$nMonths = 6;
		} else if ($paymentPlan == 'Quarterly') {

			$nMonths = 3;
		} else if ($paymentPlan == 'Monthly') {

			$nMonths = 1;
		}

		$expiry = $this->endCycle($startdate, $nMonths);

		// get the eviction deposit value
		if (empty($prodPrice) || is_null($prodPrice)) {

			$evictionDeposit = 0; // set default

		} elseif ($prodPrice < 200000) {

			$evictionDeposit = 200000;
		} else {

			$evictionDeposit = $prodPrice;
		}


		$bookingData = array(
			'verification_id' => $verificationID,
			'bookingID' => $id,
			'reference_id' => $ref,
			'propertyID' => $productID,
			'userID' => $user_id,
			'booked_as' => $booked_as,
			'payment_plan' => $paymentPlan,
			'duration' => $duration,
			'move_in_date' => $move_in_date,
			'rent_expiration' => $expiry,
			'next_rental' => $move_in_date,
			'rent_status' => 'Vacant',
			'booked_on' => date("Y-m-d"),
			'updated_at' => date("Y-m-d H:i:s"),
			'eviction_deposit' => $evictionDeposit,
			'subscription_fees' => $subscriptionFees,
			'service_charge_deposit' => $serviceChargeDeposit,
			'security_deposit_fund' => $securityDepositFund,
			'total' => $total
		);


		if ($this->db->insert('bookings', $bookingData)) {

			$this->db->insert('transaction_tbl', array('verification_id' => $verificationID, 'type' => 'rss', 'transaction_id' => $id, 'reference_id' => $ref, 'userID' => $user_id, 'amount' => $total_cost, 'status' => 'pending', 'payment_type' => $payment_type, 'transaction_date' => date('Y-m-d')));


			// Store the bookingReferenceID value in the session
			$this->session->set_userdata('bookingReferenceID', $ref);

			return 1;
		} else {

			return 0;
		}
	}

	public function editBooking($paymentPlan, $prodPrice, $duration, $booked_as, $move_in_date, $payment_type, $total_cost, $ref, $id, $verificationID, $user_id, $subscriptionFees, $serviceChargeDeposit, $securityDepositFund, $total)
	{

		$startdate = date("Y-m-d", strtotime($move_in_date));

		$nMonths = 12;

		/*if($paymentPlan == 'Upfront'){
		    
			if($duration == 12){
				
				$nMonths = 12;
				
			}elseif($duration == 9){
				
				$nMonths = 9;
				
			}elseif($duration == 6){
				
				$nMonths = 6;
				
			}elseif($duration == 3){
				
				$nMonths = 3;
				
			}			

		}else if($paymentPlan == 'Bi-annual'){

			$nMonths = 6;

		}else if($paymentPlan == 'Quarterly'){

			$nMonths = 3;

		}else if($paymentPlan == 'Monthly'){

			$nMonths = 1;

		}*/

		$expiry = $this->endCycle($startdate, $nMonths);

		// eviction deposit value
		if (empty($prodPrice) || is_null($prodPrice)) {

			$evictionDeposit = 0; // set default

		} elseif ($prodPrice < 200000) {

			$evictionDeposit = 200000;
		} else {

			$evictionDeposit = $prodPrice;
		}

		$bookingUpdates = array(
			'booked_as' => $booked_as, 'payment_plan' => $paymentPlan, 'duration' => $duration, 'move_in_date' => $move_in_date, "next_rental" => $move_in_date, "rent_expiration" => $expiry, "rent_status" => "Vacant", 'booked_on' => date("Y-m-d"), "updated_at" => date("Y-m-d H:i:s"), 'eviction_deposit' => $evictionDeposit, 'subscription_fees' => $subscriptionFees,
			'service_charge_deposit' => $serviceChargeDeposit,
			'security_deposit_fund' => $securityDepositFund,
			'total' => $total
		);

		$this->db->where("bookingID", $id);

		if ($this->db->update('bookings', $bookingUpdates)) {

			$this->db->insert('transaction_tbl', array('verification_id' => $verificationID, 'type' => 'rss', 'transaction_id' => $id, 'reference_id' => $ref, 'userID' => $user_id, 'amount' => $total_cost, 'status' => 'pending', 'payment_type' => $payment_type, 'transaction_date' => date('Y-m-d')));

			return 1;
		} else {

			return 0;
		}
	}

	public function insertFurnisureOrders($verificationID, $user_id, $productID, $productTitle, $paymentPlan, $prodPrice, $duration, $payment_type, $curr_pos, $order_size, $total_price, $ref)
	{

		$digits = 4;

		$randomNumber = '';

		$count = 0;
		//position of last item of array recursion
		$right_pos = $order_size - 1;

		while ($count < $digits) {

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;
		}

		$id = $randomNumber;

		if ($this->db->insert('furnisure_order', array('verification_id' => $verificationID, 'reference_id' => $ref, 'orderID' => $id, 'userID' => $user_id, 'productID' => $productID, 'price' => $prodPrice, 'payment_plan' => $duration, 'purchase_date' => date("Y-m-d H:i:s")))) {
			//Check if this is the last item of array recursion
			if ($curr_pos == $right_pos) {
				$this->db->insert('transaction_tbl', array('verification_id' => $verificationID, 'type' => 'furnisure', 'transaction_id' => $id, 'reference_id' => $ref, 'userID' => $user_id, 'amount' => $total_price, 'status' => 'pending', 'payment_type' => $payment_type, 'transaction_date' => date('Y-m-d')));
			}
			return 1;
		} else {

			return 0;
		}
	}

	public function reply_message($receiverID, $messageID, $subject, $reply, $userID)
	{

		$this->requestID = $messageID;

		$this->content = $reply;

		$this->sender = $userID;

		$this->receiver = $receiverID;

		$this->subject = "RE: " . $subject;

		$this->status = "unread";

		$this->dateOfEntry = date("Y-m-d H:i:s");

		if ($this->db->insert('messages_tbl', $this)) {

			return 1;
		} else {

			return 0;
		}
	}

	public function insertAlert($firstname, $lastname, $email, $min_price, $max_price, $property_type, $city, $phone, $renting_as, $rent_plan)
	{

		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->email = $email;
		$this->phone = $phone;
		$this->rent_plan = $rent_plan;
		$this->renting_as = $renting_as;
		$this->min_price = $min_price;
		$this->max_price = $max_price;
		$this->property_type = $property_type;
		$this->city = $city;
		$this->dateOfEntry = date("Y-m-d H:i:s");

		if ($this->db->insert('property_alert', $this)) {
			return 1;
		} else {
			return 0;
		}
	}

	public function insertPropDetails($propTitle, $propDesc, $email, $propType, $country, $states, $city, $rent_type, $furnishing, $services, $bed, $base_rent, $service_charge, $bath, $toilet, $amenities, $address, $rental_condition, $details, $folder, $userID)
	{

		$this->property_title = $propTitle;

		$this->property_description = $propDesc;

		$this->address = $address;

		$this->email = $email;

		$this->property_type = $propType;

		$this->country = $country;

		$this->states = $states;

		$this->city = $city;

		$this->rent_type = $rent_type;

		$this->furnishing = $furnishing;

		$this->services = $services;

		$this->bed = $bed;

		$this->base_rent = $base_rent;

		$this->service_charge = $service_charge;

		$this->bath = $bath;

		$this->toilet = $toilet;

		$this->amenities = serialize($amenities);

		$this->rental_condition = $rental_condition;

		$this->landlord_details = $details;

		$this->folder = $folder;

		$this->poster = $userID;

		$this->dateOfEntry = date('Y-m-d H:i:s');

		if ($this->db->insert('prospective_property', $this)) {

			return 1;
		} else {

			return 0;
		}
	}
	public function get_message($mID, $userID)
	{

		$this->db->select('a.*, b.*');

		$this->db->from('messages_tbl as a');

		$this->db->where('id', $mID);

		$this->db->join('admin_tbl as b', 'b.adminID = a.sender');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function mark_as_read($mID, $userID)
	{

		$data = array("status" => "read", "updated" => date("Y-m-d H:i:s"));

		$this->db->where("id", $mID);

		return $this->db->update("messages_tbl", $data);
	}

	public function getPropertyFilterCount($s_data)
	{


		$this->db->select('*');

		$this->db->from('property_tbl');

		//$this->db->join('tbl_specialisation as ts', 'ts.spec_id = td.spec_id','left');

		if (@$s_data['property_type']) {

			$this->db->like('propertyType', $s_data['property_type']);
		}

		if (@$s_data['state']) {

			$this->db->where('state', $s_data['state']);
		}

		if (@$s_data['city'] && @$s_data['city'] != 'Any') {

			$this->db->like('city', $s_data['city']);
		}

		if (@$s_data['beds']) {

			$this->db->where('bed', $s_data['beds']);
		}

		if (@$s_data['bath']) {

			$this->db->where('bath', $s_data['bath']);
		}

		if (@$s_data['renting_as']) {

			$this->db->like('renting_as', $s_data['renting_as']);
		}

		if (@$s_data['furnishing']) {

			$this->db->like('furnishing', $s_data['furnishing']);
		}

		if (@$s_data['min_price']) {

			$this->db->where('price >=', intval($s_data['min_price']));

			$this->db->where('price <=', intval($s_data['max_price']));
		}

		if (@$s_data['availability_val']) {

			if ($s_data['availability_val'] == 'now') {

				$this->db->where('available_date <=', date('Y-m-d'));

				//return date('Y-m-d');
				//exit;

			} elseif ($s_data['availability_val'] == 2) {

				$from_date = date('Y-m-d', strtotime("+1 month"));

				$to_date = date('Y-m-d', strtotime("+2 months"));

				$this->db->where('available_date >=', $from_date);

				$this->db->where('available_date <=', $to_date);
			} elseif ($s_data['availability_val'] == 4) {

				$from_date = date('Y-m-d', strtotime("+3 month"));

				$to_date = date('Y-m-d', strtotime("+4 months"));

				$this->db->where('available_date >=', $from_date);

				$this->db->where('available_date <=', $to_date);
			} elseif ($s_data['availability_val'] == 6) {

				$from_date = date('Y-m-d', strtotime("+5 month"));

				$to_date = date('Y-m-d', strtotime("+6 months"));

				$this->db->where('available_date >=', $from_date);

				$this->db->where('available_date <=', $to_date);
			} elseif ($s_data['availability_val'] == 7) {

				$from_date = date('Y-m-d', strtotime("+7 month"));

				$this->db->where('available_date >=', $from_date);
			}
		}

		return $this->db->count_all_results();
	}

	public function get_quick_list($s_data)
	{

		$this->db->select('*');


		$this->db->from('property_tbl');


		if (@$s_data['property_type']) {

			$this->db->where('propertyType', $s_data['property_type']);
		}

		if (@$s_data['state']) {

			$this->db->where('state', $s_data['state']);
		}

		if (@$s_data['city'] && @$s_data['city'] != 'Any') {

			$this->db->like('city', $s_data['city']);
		}

		if (@$s_data['beds']) {

			$this->db->where('bed', $s_data['beds']);
		}

		if (@$s_data['bath']) {

			$this->db->where('bath', $s_data['bath']);
		}

		if (@$s_data['renting_as']) {

			$this->db->like('renting_as', $s_data['renting_as']);
		}

		if (@$s_data['furnishing']) {

			$this->db->like('furnishing', $s_data['furnishing']);
		}

		if (@$s_data['min_price']) {

			$this->db->where('price >=', intval($s_data['min_price']));

			$this->db->where('price <=', intval($s_data['max_price']));
		}

		if (@$s_data['availability_val']) {

			if ($s_data['availability_val'] == 'now') {

				$this->db->where('available_date <=', date('Y-m-d'));

				//return date('Y-m-d');
				//exit;

			} elseif ($s_data['availability_val'] == 1) {

				$from_date = date('Y-m-d');

				$to_date = date('Y-m-d', strtotime("+1 months"));

				$this->db->where('available_date >=', $from_date);

				$this->db->where('available_date <=', $to_date);
			} elseif ($s_data['availability_val'] == 6) {

				$from_date = date('Y-m-d');

				$to_date = date('Y-m-d', strtotime("+6 months"));

				$this->db->where('available_date >=', $from_date);

				$this->db->where('available_date <=', $to_date);
			} elseif ($s_data['availability_val'] == 9) {

				$from_date = date('Y-m-d');

				$to_date = date('Y-m-d', strtotime("+9 months"));

				$this->db->where('available_date >=', $from_date);

				$this->db->where('available_date <=', $to_date);
				//$from_date = date('Y-m-d', strtotime("+7 month"));

				//$this->db->where('available_date >=', $from_date);

			}
		}

		$this->db->limit($this->_pageNumber, $this->_offset);

		$this->db->order_by('available_date', 'ASC');

		$query = $this->db->get();

		//print_r($this->db->last_query());

		//exit;

		return $query->result_array();
	}

	public function getAllPropty()
	{
		$this->db->select('*');

		$this->db->from('property_tbl');

		$this->db->limit($this->_pageNumber, $this->_offset);

		$this->db->order_by('available_date', 'ASC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_counts($id)
	{

		$this->db->from('user_notification');

		$this->db->where('userID', $id);

		$this->db->where('status', 0);

		//$this->db->order_by('entry_date', 'DESC');

		// //$this->db->limit($limit, $start);

		//// $query = $this->db->get();

		return $this->db->count_all_results();

		// $this->db->from('property_tbl');

		//  $this->db->where('premium_property', 1);

		//  return $this->db->count_all_results();

	}


	public function get_confirmation_link($email)
	{

		$this->db->select('a.email, a.confirmation, b.firstName, b.email');


		$this->db->from('login_tbl as a');


		$this->db->where('a.email', $email);


		$this->db->join('user_tbl as b', 'b.email = a.email', 'LEFT');


		$this->db->limit(1);


		$query = $this->db->get();


		if ($query->num_rows() > 0) {

			return $query->row_array();
		} else {

			return 0;
		}
	}

	public function confirm_code($code)
	{

		$this->db->select('a.userID, a.email, a.confirmation, b.firstName, b.email, b.referral');


		$this->db->from('login_tbl as a');


		$this->db->where('a.confirmation', $code);


		$this->db->join('user_tbl as b', 'b.email = a.email', 'LEFT');


		$this->db->limit(1);


		$query = $this->db->get();


		if ($query->num_rows() > 0) {

			return $query->row_array();
		} else {

			return 0;
		}
	}

	public function removeConfirmationLink($id)
	{

		$data = array('confirmation' => "");

		$this->db->where('confirmation', $id);

		$res = $this->db->update('login_tbl', $data);

		if ($res) {

			return 1;
		} else {

			return 0;
		}
	}

	function updateLoginDate($id)
	{

		$newDate = date('Y-m-d H:i:s');

		$data = array('lastLogin' => $newDate);

		$this->db->where('userID', $id);

		$det = $this->db->update('login_tbl', $data);

		if ($det) {

			return 1;
		} else {

			return 0;
		}
	}
	public function reset_password($user_id, $reset_code)
	{

		$today = date("Y-m-d H:i:s");

		$this->db->select('reset_code, userID, request_date, expiry_date');

		$this->db->from('pwd_reset');

		$this->db->where('reset_code', $reset_code);

		$this->db->where('userID', $user_id);

		$this->db->where('expiry_date >=', $today);

		$this->db->order_by("id", "DESC");

		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			return $query->row_array();
		} else {

			return 0;
		}
	}
	public function updateInfo($firstname, $lastname, $email, $phone, $income_level, $id)
	{

		$data = array('firstName' => $firstname, "lastName" => $lastname, "email" => $email, "phone" => $phone, "income" => $income_level);

		$this->db->where('userID', $id);

		return $this->db->update('user_tbl', $data);
	}
	public function insertProfilePic($user_id, $file_name)
	{

		$data = array('profile_picture' => $file_name);

		$this->db->where('userID', $user_id);

		//$this->updated_date = date('Y-m-d H:i:s');

		if ($this->db->update('user_tbl', $data)) {

			return 1;
		} else {

			return 0;
		}
	}

	public function updateViews($views, $id)
	{
		$data = array('views' => $views);

		$this->db->where('propertyID', $id);

		if ($this->db->update('property_tbl', $data)) {

			return 1;
		} else {

			return 0;
		}
	}

	public function getem()
	{

		$this->db->select('user_pass, user_email, display_name, user_registered');

		$this->db->from('wp_users');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function updateReferral($ref, $userID)
	{

		$data = array("referral" => "Instagram");

		$this->db->where('userID', $userID);

		$this->db->update('user_tbl', $data);
	}

	public function getReferral($userID)
	{

		$this->db->select('*');

		$this->db->from('user_tbl');

		$this->db->where('userID', $userID);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function changePass($pass, $userID, $referral)
	{

		$pass = password_hash($pass, PASSWORD_DEFAULT);

		if ($referral == 'wordpress') {

			$referral = 'Instagram';
		}

		//Update user_tbl
		$data = array('password' => $pass, "referral" => $referral);

		$this->db->where('userID', $userID);

		if ($this->db->update('user_tbl', $data)) {

			//Update Login table
			$this->db->where('userID', $userID);

			return $this->db->update('login_tbl', array("password" => $pass));
		}
	}

	public function setem($fname, $lname, $email, $password, $phone, $income, $confirmationCode, $referral, $reg_date)
	{



		$digits = 12;

		$randomNumber = '';

		$count = 0;



		while ($count < $digits) {

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

		$this->user_type = 'tenant';

		$this->verified = 'no';

		$this->interest = ' ';

		$this->referral = $referral;

		$this->status = 'Active';

		$this->regDate = $reg_date;

		if ($this->db->insert('user_tbl', $this)) {

			$lastlog = date('Y-m-d H:i:s');

			$res = $this->db->insert('login_tbl', array('email' => $email, 'password' => $password, 'userID' => $id, 'lastLogin' => $lastlog, 'confirmation' => $confirmationCode));

			if ($res) {

				return 1;
			} else {

				return "Error inserting in Login table.";
			}
		} else {

			return "Profile insertion error!";
		}
	}

	public function checkRSSLastTrans($id)
	{

		$this->db->select('a.id, a.verification_id, a.transaction_id, a.userID, a.amount, a.status, a.type as transaction_type, a.transaction_date, a.payment_type, b.bookingID, b.propertyID, b.payment_plan, b.duration, b.move_in_date, b.next_rental, b.rent_expiration, b.booked_on, b.rent_status, c.*, c.propertyTitle, c.price, d.type');

		$this->db->from('transaction_tbl as a');

		$this->db->join('bookings as b', 'a.transaction_id = b.bookingID', 'LEFT OUTER');

		$this->db->join('property_tbl as c', 'b.propertyID = c.propertyID', 'LEFT OUTER');

		$this->db->join('apt_type_tbl as d', 'd.id = c.propertyType', 'LEFT OUTER');

		$this->db->where('a.userID', $id);

		$this->db->where('a.type', 'rss');

		$this->db->where('a.status', 'approved');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function checkRSSLastTran($id)
	{

		$this->db->select('a.*, a.reference_id as refID, a.amount as transAmount, a.type as transaction_type, a.userID as usersID, b.*, b.propertyID as proptyID, c.*, c.intervals as userIntervals, d.type, e.email, e.firstName, e.lastName, e.email as userEmail');

		$this->db->from('transaction_tbl as a');

		$this->db->join('bookings as b', 'a.transaction_id = b.bookingID');

		$this->db->join('property_tbl as c', 'b.propertyID = c.propertyID', 'LEFT OUTER');

		$this->db->join('apt_type_tbl as d', 'd.id = c.propertyType', 'LEFT OUTER');

		$this->db->join('user_tbl as e', 'e.userID = a.userID');

		$this->db->where('a.userID', $id);

		$this->db->where('a.type', 'rss');

		//$this->db->where('a.status', 'approved');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function checkLastApprovedSubscriptionPayment($id)
	{

		$this->db->select('a.id, a.verification_id, a.transaction_id, a.userID, a.amount, a.status, a.type as transaction_type, a.transaction_date, a.payment_type, b.bookingID, b.propertyID, b.payment_plan, b.duration, b.move_in_date, b.next_rental, b.rent_expiration, b.booked_on, b.rent_status, c.*, c.propertyTitle, c.price, d.type');

		$this->db->from('transaction_tbl as a');

		$this->db->join('bookings as b', 'a.transaction_id = b.bookingID', 'LEFT OUTER');

		$this->db->join('property_tbl as c', 'b.propertyID = c.propertyID', 'LEFT OUTER');

		$this->db->join('apt_type_tbl as d', 'd.id = c.propertyType', 'LEFT OUTER');

		$this->db->where('a.userID', $id);

		$this->db->where('a.type', 'rss');

		$this->db->where('a.status', 'approved');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function checkFurnisureLastTrans($id)
	{

		$this->db->select('a.id, a.verification_id, a.transaction_id, a.userID, a.amount, a.status, a.type as transaction_type, a.transaction_date, a.payment_type, b.*, c.*');

		$this->db->from('transaction_tbl as a');

		$this->db->join('furnisure_order as b', 'b.reference_id = a.reference_id');

		$this->db->join('furnisure_tbl as c', 'b.productID = c.applianceID');

		$this->db->where('a.userID', $id);

		$this->db->where('a.type', 'furnisure');

		$this->db->where('a.status', 'approved');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function getUser($id)
	{

		$this->db->select('*');

		$this->db->from('user_tbl');

		$this->db->where('userID', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function checkLastBooking($id)
	{

		$this->db->select('*');

		$this->db->from('bookings');

		$this->db->where('verification_id', $id);

		$this->db->order_by('id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}



	public function checkLastFurnisureOrder($id)
	{

		$this->db->select('*');

		$this->db->from('furnisure_order');

		$this->db->where('verification_id', $id);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function updateBookingPlan($duration, $pPlan, $price, $bookingID, $userID)
	{

		$updates = array("payment_plan" => $pPlan, "duration" => $duration, "updated_at" => date("Y-m-d H:i:s"));

		$this->db->where('id', $bookingID);

		$this->db->where('userID', $userID);

		if ($this->db->update("bookings", $updates)) {

			return 1;
		} else {

			return 0;
		}
	}
	public function updatePayment($bID, $expiry, $refID, $propertyID)
	{

		$updates = array("status" => "approved");

		$this->db->where("transaction_id", $bID);

		if ($this->db->update("transaction_tbl", $updates)) {

			$bookings_update = array("rent_status" => "Occupied", "updated_at" => date('Y-m-d H:i:s'));

			$this->db->where("bookingID", $bID);

			if ($this->db->update("bookings", $bookings_update)) {

				$prop_update = array("available_date" => $expiry);

				$this->db->where("propertyID", $propertyID);

				return $this->db->update('property_tbl', $prop_update);
			}
		}
	}
	public function getTransDetails($ref)
	{

		$this->db->select('reference_id, verification_id, type');

		$this->db->from('transaction_tbl');

		$this->db->where('reference_id', $ref);

		$query = $this->db->get();

		return $query->row_array();
	}
	public function updateTransaction($status, $id)
	{

		$updates = array('status' => $status);

		$this->db->where('reference_id', $id);

		if ($this->db->update('transaction_tbl', $updates)) {

			return 1;
		} else {

			return 0;
		}
	}

	public function updateBookingStat($id, $expiry)
	{

		$updates = array('renting_status' => 'Occupied', 'rent_expiration' => $expiry);

		$this->db->where('bookingID', $id);

		if ($this->db->update('bookings', $updates)) {

			return 1;
		} else {

			return 0;
		}
	}

	public function getDetails($ref)
	{

		/*$this->db->select('a.id, a.reference_id, a.price, a.propertyID, b.propertyID as pID, b.propertyTitle, c.type, c.amount, c.reference_id');
		
		$this->db->from('bookings as a');
		
		$this->db->where('a.reference_id', $ref);
		
		$this->db->join('property_tbl as b', 'b.propertyID = a.propertyID');
		
		$this->db->join('transaction_tbl as c', 'c.reference_id = b.reference_id');*/


		$this->db->select('c.id, c.reference_id, c.propertyID, b.propertyID as pID, b.propertyTitle, a.type, a.amount, a.reference_id, c.rent_expiration');

		$this->db->from('transaction_tbl as a');

		$this->db->where('a.reference_id', $ref);

		$this->db->join('bookings as c', 'c.bookingID = a.transaction_id');

		$this->db->join('property_tbl as b', 'b.propertyID = c.propertyID');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function updatePropStat($propID, $rent_duration)
	{

		$update = array("available_date" => $rent_duration);

		$this->db->where("propertyID", $propID);

		return $this->db->update("property_tbl", $update);
	}

	public function getTheBookingID($id)
	{

		$this->db->select('transaction_id');

		$this->db->from('transaction_tbl');

		$this->db->where('reference_id', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_renewal_details($id)
	{

		$this->db->select('a.id, a.verification_id, a.reference_id, a.amount, a.transaction_id, a.status, a.transaction_date, a.type, a.payment_type, b.reference_id, b.bookingID, b.verification_id, b.propertyID, b.payment_plan, b.duration, b.rent_status, b.rent_expiration, b.booked_on, c.price, c.securityDeposit, d.email, d.firstName, d.lastName');

		$this->db->from('transaction_tbl as a');

		$this->db->where('a.reference_id', $id);

		$this->db->join('bookings as b', 'b.bookingID = a.transaction_id');

		$this->db->join('property_tbl as c', 'c.propertyID = b.propertyID');

		$this->db->join('user_tbl as d', 'd.userID = a.userID');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function renewRssTrans($product, $userID, $productID, $prodPrice, $ref, $verID, $transID)
	{

		if ($this->db->insert('transaction_tbl', array('verification_id' => $verID, 'type' => 'rss', 'transaction_id' => $transID, 'reference_id' => $ref, 'userID' => $userID, 'amount' => $prodPrice, 'status' => 'pending', 'payment_type' => 'paystack', 'transaction_date' => date('Y-m-d')))) {

			return 1;
		} else {

			return 0;
		}
	}

	public function switchPaymentMode($pType, $id)
	{

		$update = array("payment_type" => $pType);

		$this->db->where("transaction_id", $id);

		if ($this->db->update("transaction_tbl", $update)) {

			return 1;
		} else {

			return 0;
		}
	}
	public function verification_profile_checker($id)
	{

		$this->db->select('*');

		$this->db->from("verifications");

		$this->db->where("user_id", $id);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			return 1;
		} else {

			return 0;
		}
	}
	public function updateAvailDate($expiration_date, $property_id)
	{

		$update = array("available_date" => $expiration_date);

		$this->db->where("propertyID", $property_id);

		if ($this->db->update("property_tbl", $update)) {

			return 1;
		} else {

			return 0;
		}
	}

	public function check_returning($ip_add)
	{

		$this->db->select('*');

		$this->db->from('rss_stats');

		$this->db->where("ip_address", $ip_add);

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function addVisits($ip_add, $country, $city, $browser_name, $visit, $device, $referrer)
	{

		$this->ip_address = $ip_add;

		$this->country = $country;

		$this->city = $city;

		$this->browser_type = $browser_name;

		$this->device_type = $device;

		$this->visits = $visit;

		$this->referrer_website = $referrer;

		$this->visit_time = date("Y-m-d H:i:s");

		$this->date_of_entry = date("Y-m-d H:i:s");

		if ($this->db->insert('rss_stats', $this)) {
			return 1;
		} else {
			return 0;
		}
	}

	public function updateVisits($visits, $ip)
	{

		$updates = array('visits' => $visits);

		$this->db->where("ip_address", $ip);

		$this->db->update('rss_stats', $updates);
	}

	public function contactFormData($name, $phone, $email, $msg)
	{

		$this->name = $name;

		$this->phone = $phone;

		$this->email = $email;

		$this->msg = $msg;

		$this->date_of_entry = date("Y-m-d H:i:s");

		if ($this->db->insert("contact_us", $this)) {

			return 1;
		} else {

			return 0;
		}
	}
	public function add_months($months, DateTime $dateObject)
	{
		$next = new DateTime($dateObject->format('Y-m-d'));
		$next->modify('last day of +' . $months . ' month');

		if ($dateObject->format('d') > $next->format('d')) {
			return $dateObject->diff($next);
		} else {
			return new DateInterval('P' . $months . 'M');
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

	public function get_props_furnishing()
	{

		$this->db->select('id, furnishing');

		$this->db->from("property_tbl");

		$query = $this->db->get();

		return $query->result_array();
	}


	public function get_all_locations()
	{

		$this->db->distinct();

		$this->db->select('city');

		$this->db->from("property_tbl");

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_city_details($name)
	{

		$this->db->select('*');

		$this->db->from("cities");

		$this->db->where("name", $name);

		$query = $this->db->get();

		return $query->row_array();
	}


	public function get_props()
	{

		$this->db->select('*');

		$this->db->from('property_tbl');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function transInsert($bID, $refID, $amount, $verificationID, $duration, $userID)
	{

		return $this->db->insert('transaction_tbl', array('verification_id' => $verificationID, 'transaction_id' => $bID, 'userID' => $userID, 'reference_id' => $refID, 'type' => 'rss', 'amount' => $amount, 'status' => 'approved', 'payment_type' => 'paystack', 'transaction_date' => date('Y-m-d')));
	}
	public function transUpdate($bID, $refID, $amount)
	{

		$update = array("status" => "approved", "transaction_date" => date("Y-m-d"), "amount" => $amount);

		$this->db->where("transaction_id", $bID);

		$this->db->where("reference_id", $refID);

		return $this->db->update("transaction_tbl", $update);
	}
	public function insert_wallet_transaction($refID, $amount, $txn_type, $userID)
	{

		$this->txn_id = $refID;

		$this->amount = $amount;

		$this->transaction_type = $txn_type;

		$this->user_id = $userID;

		return $this->db->insert("wallet_transactions", $this);
	}
	public function bookingUpdate($bookingID, $rent_exp, $duration, $paymentPlan, $propertyID)
	{

		$nMonths = 0;

		$startdate = date("Y-m-d", strtotime($rent_exp));

		if ($paymentPlan == 'Upfront') {
			if ($duration == 12) {

				$nMonths = 12;
			} elseif ($duration == 9) {

				$nMonths = 9;
			} elseif ($duration == 6) {

				$nMonths = 6;
			} elseif ($duration == 3) {

				$nMonths = 3;
			}
		} else if ($paymentPlan == 'Bi-annual') {

			$nMonths = 6;
		} else if ($paymentPlan == 'Quarterly') {

			$nMonths = 3;
		} else if ($paymentPlan == 'Monthly') {

			$nMonths = 1;
		}

		$expiry = $this->endCycle($startdate, $nMonths);

		$update = array("booked_on" => date("Y-m-d"), "updated_at" => date("Y-m-d H:i:s"), "next_rental" => $expiry, "rent_status" => "Occupied");

		$this->db->where("bookingID", $bookingID);

		return $this->db->update("bookings", $update);
	}

	public function selktPaymentDet($id)
	{

		$this->db->select('a.*, a.id, a.verification_id, a.transaction_id, a.reference_id as refID, a.transaction_date as transDate, a.userID, a.amount as totalAmount, a.status, a.type as transaction_type, a.transaction_date, a.payment_type, b.*, b.bookingID, b.propertyID, b.payment_plan, b.duration, b.move_in_date, b.next_rental, b.rent_expiration, b.booked_on, b.rent_status, c.*, c.propertyTitle, c.price, d.type, e.*, e.email as userEmail');

		$this->db->from('transaction_tbl as a');

		$this->db->join('bookings as b', 'a.transaction_id = b.bookingID', 'LEFT OUTER');

		$this->db->join('property_tbl as c', 'b.propertyID = c.propertyID', 'LEFT OUTER');

		$this->db->join('apt_type_tbl as d', 'd.id = c.propertyType', 'LEFT OUTER');

		$this->db->join('user_tbl as e', 'e.userID = a.userID');

		$this->db->where('a.userID', $id);

		$this->db->where('a.type', 'rss');

		$this->db->where('a.status', 'approved');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function selktBookingDet($userID, $transID)
	{

		$this->db->select('a.*');

		$this->db->from('bookings as a');

		$this->db->where('a.userID', $userID);

		$this->db->where('a.bookingID', $transID);

		$query = $this->db->get();

		return $query;
	}

	public function getBookingDet($userid)
	{

		$this->db->select('a.*');

		$this->db->from('bookings as a');

		$this->db->where('a.userID', $userid);

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function getTransDet($userid)
	{

		$this->db->select('a.*');

		$this->db->from('transaction_tbl as a');

		$this->db->where('a.userID', $userid);

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function insTransUpdate($verification_id, $bkId, $refrID, $userID, $amount, $type, $payment_type, $invoice, $approved_by, $transaction_date)
	{

		$this->verification_id = $verification_id;

		$this->transaction_id = $bkId;

		$this->reference_id = $refrID;

		$this->userID = $userID;

		$this->amount = $amount;

		$this->status = 'pending';

		$this->type = 'rss';

		$this->payment_type = $payment_type;

		$this->invoice = $invoice;

		$this->approved_by = $approved_by;

		$this->transaction_date = $transaction_date;

		$this->db->insert('transaction_tbl', $this);
	}

	public function insTransUpdates($verification_id, $bkId, $refrID, $userID, $amount, $type, $payment_type, $invoice, $approved_by, $transaction_date, $planCode)
	{

		$this->verification_id = $verification_id;

		$this->transaction_id = $bkId;

		$this->reference_id = $refrID;

		$this->userID = $userID;

		$this->amount = $amount;

		$this->status = 'approved';

		$this->type = 'rss';

		$this->payment_type = 'paystack';

		$this->invoice = $invoice;

		$this->approved_by = $approved_by;

		$this->transaction_date = $transaction_date;

		$this->planCode = $planCode;

		$this->db->insert('transaction_tbl', $this);
	}


	public function insBookingUpdate($verification_id, $refrID, $bkId, $propertyID, $userID, $booked_as, $payment_plan, $duration, $move_in_date, $move_out_date, $move_out_reason, $rent_expiration, $next_rental, $booked_on, $updated_at, $rent_status, $eviction_deposit, $subscription_fees, $service_charge_deposit, $security_deposit_fund, $total)
	{

		$this->verification_id = $verification_id;

		$this->reference_id = $refrID;

		$this->bookingID = $bkId;

		$this->propertyID = $propertyID;

		$this->userID = $userID;

		$this->booked_as = $booked_as;

		$this->payment_plan = $payment_plan;

		$this->duration = $duration;

		$this->move_in_date = $move_in_date;

		$this->move_out_date = $move_out_date;

		$this->move_out_reason = $move_out_reason;

		$this->rent_expiration = $rent_expiration;

		$this->next_rental = $next_rental;

		$this->booked_on = $booked_on;

		$this->updated_at = $updated_at;

		$this->rent_status = $rent_status;

		$this->eviction_deposit = $eviction_deposit;

		$this->subscription_fees = $subscription_fees;

		$this->service_charge_deposit = $service_charge_deposit;

		$this->security_deposit_fund = $security_deposit_fund;

		$this->total = $total;

		//$this->request_date = date('Y-m-d H:i:s');

		$this->db->insert('bookings', $this);
	}

	public function checkUserPayment($userid, $proptyID)
	{

		$this->db->select('a.*, a.type as transaction_type, b.*, b.propertyID as proptyID, c.*, d.type, e.email, e.firstName, e.lastName');

		$this->db->from('transaction_tbl as a');

		$this->db->join('bookings as b', 'a.transaction_id = b.bookingID', 'LEFT OUTER');

		$this->db->join('property_tbl as c', 'b.propertyID = c.propertyID', 'LEFT OUTER');

		$this->db->join('apt_type_tbl as d', 'd.id = c.propertyType', 'LEFT OUTER');

		$this->db->join('user_tbl as e', 'e.userID = a.userID');

		$this->db->where('a.userID', $userid);

		$this->db->where('b.propertyID', $proptyID);

		$this->db->where('a.type', 'rss');

		$this->db->where('a.status', 'approved');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->num_rows();
	}

	public function paymentUpdate($bookingID, $expiry, $refID, $propertyID)
	{

		$transUpd = array("status", "approved");

		$this->db->where("transaction_id", $bookingID);

		$this->db->update('transaction_tbl', $transUpd);

		$update = array("updated_at" => date("Y-m-d H:i:s"), "rent_status" => "Occupied");

		$this->db->where("bookingID", $bookingID);

		return $this->db->update("bookings", $update);
	}

	public function getUpcomingProps()
	{

		$this->db->select('a.units, a.address, a.state, a.city as city_id, a.tenant_type, a.property_type, b.name, b.id');

		$this->db->from('upcoming_property as a');

		$this->db->join('cities as b', 'a.city = b.id');

		$this->db->join('apt_type_tbl as c', 'a.property_type = c.id');

		$this->db->group_by('a.city');

		$this->db->order_by('id', 'DESC');

		//$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getUpcomingStr($city)
	{

		$this->db->select('address, id, airtable_url');

		$this->db->from('upcoming_property');

		$this->db->where("city", $city);

		$this->db->group_by('address');

		$query = $this->db->get();

		return $query->result_array();
	}
	public function getUpcomingProp($id)
	{

		$this->db->select('a.units, a.country as country_id, a.address, a.state as state_id, a.city as city_id, a.airtable_url, a.tenant_type, a.property_type, b.name, b.id');

		$this->db->from('upcoming_property as a');

		$this->db->where("a.id", $id);

		$this->db->join('cities as b', 'a.city = b.id');

		$this->db->join('apt_type_tbl as c', 'a.property_type = c.id');

		//$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function getUnits($city)
	{
		$this->db->select('a.id as unit_id, a.units, a.country as country_id, a.address, a.state as state_id, a.city as city_id, a.tenant_type, a.property_type, a.price, a.airtable_url, c.id, c.type');

		$this->db->from('upcoming_property as a');

		$this->db->where("a.city", $city);

		$this->db->join('apt_type_tbl as c', 'a.property_type = c.id');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_rental_detail()
	{

		$this->db->select('*');

		$this->db->from('bookings');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_last_trans($bid)
	{

		$this->db->select('*');

		$this->db->from('transaction_tbl');

		$this->db->where('transaction_id', $bid);

		$this->db->where('status', 'approved');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function update_renewal_date($id, $expiry)
	{

		$update = array("next_rental" => $expiry);

		$this->db->where("id", $id);

		return $this->db->update("bookings", $update);
	}

	public function get_all_desktop_users()
	{

		$this->db->select('*');

		$this->db->from('user_tbl');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getConfirmationUser($id)
	{

		$this->db->select('a.confirmation, a.email, b.firstName');

		$this->db->from('login_tbl as a');

		$this->db->where('a.userID', $id);

		$this->db->join('user_tbl as b', 'a.userID = b.userID');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_rented_apt()
	{

		$this->db->select('*');

		$this->db->from('property_tbl');

		$this->db->where('available_date >', date('Y-m-d'));

		$query = $this->db->get();

		return $query->result_array();
	}


	public function check_inspection($user_id, $property_id)
	{

		$this->db->select('*');

		$this->db->from('inspection_tbl');

		$this->db->where('userID', $user_id);

		$this->db->where('propertyID', $property_id);

		return $this->db->count_all_results();
	}
	public function get_insp_dets($inspectionID)
	{

		$this->db->select('*');

		$this->db->from('inspection_tbl');

		$this->db->where('inspectionID', $inspectionID);

		$result = $this->db->get();

		return $result->row_array();
	}

	public function get_debt($id)
	{

		$this->db->select_sum('amount_owed');

		$this->db->from('debt');

		$this->db->where('user_id', $id);

		$this->db->where('status', 'Unpaid');

		$result = $this->db->get();

		return $result->row_array();
	}

	/*public function get_wallet($id){
	    
	    $this->db->select_sum('amount');
	    
	    $this->db->from('wallet');
	    
	    $this->db->where('user_id', $id);
	    
	    $result = $this->db->get();
	    
	    return $result->row_array();
	}*/

	public function get_wallet_balance($id)
	{

		$this->db->select_sum('account_balance');

		$this->db->from('virtual_account');

		$this->db->where('userID', $id);

		$result = $this->db->get();

		return $result->row_array();
	}

	public function get_ref_code($id)
	{

		$this->db->select('referral_code');

		$this->db->from('user_tbl');

		$this->db->where('userID', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_payouts($id, $limit, $start, $date_from, $date_to)
	{

		$this->db->select('*');

		$this->db->from('payout_transactions');

		$this->db->where('user_id', $id);

		if ($date_from) {

			$this->db->where('payout_date >=', $date_from);
		}

		if ($date_to) {

			$this->db->where('payout_date <=', $date_to);
		}

		//$this->db->where('payout_status', 'paid');

		$this->db->order_by('payout_date', 'DESC');

		$this->db->limit($limit, $start);

		$query = $this->db->get();

		return $query;
	}

	public function fetchAllFilteredPayouts($id, $s_data)
	{

		$this->db->select('*');

		$this->db->from('payout_transactions');

		$this->db->where('user_id', $id);

		if ($s_data['property']) {

			$this->db->where('property_id', $s_data['property']);
		}

		if ($s_data['startDate'] && $s_data['endDate']) {

			$this->db->where('payout_date >=', date('Y-m-d', strtotime($s_data['startDate'])));

			$this->db->where('payout_date <=', date('Y-m-d', strtotime($s_data['endDate'])));
		} elseif ($s_data['startDate']) {

			$this->db->where('payout_date >=', date('Y-m-d', strtotime($s_data['startDate'])));
		} elseif ($s_data['endDate']) {

			$this->db->where('payout_date <=', date('Y-m-d', strtotime($s_data['endDate'])));
		}

		$this->db->limit($this->_pageNumber, $this->_offset);

		$this->db->order_by('payout_date', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_first_payout($id)
	{

		$this->db->select('*');

		$this->db->from('payout_transactions');

		$this->db->where('user_id', $id);

		$this->db->where('status', 'paid');

		$this->db->order_by('id', 'ASC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_last_payout($id)
	{

		$this->db->select('*');

		$this->db->from('payout_transactions');

		$this->db->where('user_id', $id);

		$this->db->where('status', 'paid');

		$this->db->order_by('id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_next_payout($id)
	{

		$this->db->select('*');

		$this->db->from('payout_transactions');

		$this->db->where('user_id', $id);

		$this->db->where('status', 'pending');

		$this->db->order_by('id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function pending_payout_sum($id)
	{

		$this->db->select_sum('amount_paid');

		$this->db->from('payout_transactions');

		$this->db->where('user_id', $id);

		$this->db->where('status', 'pending');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function paid_payout_sum($id)
	{

		$this->db->select_sum('amount_paid');

		$this->db->from('payout_transactions');

		$this->db->where('user_id', $id);

		$this->db->where('status', 'paid');

		$query = $this->db->get();

		return $query->row_array();
	}
	public function fetchAllRentedProps($id)
	{

		$this->db->select('a.*, b.*, c.*, d.*');

		$this->db->from('property_tbl as a');

		$this->db->where('a.property_owner', $id);

		$this->db->where('a.available_date >=', date('Y-m-d'));

		$this->db->join('bookings as b', 'b.propertyID = a.propertyID', 'LEFT OUTER');

		$this->db->join('user_tbl as c', 'c.userID = b.userID', 'LEFT OUTER');

		$this->db->join('verifications as d', 'd.user_id = c.userID', 'LEFT OUTER');

		$this->db->group_by('a.propertyID');

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getTenantList($id, $sdata)
	{

		$this->db->select('a.*, b.*, c.*, d.dob, d.occupation, d.marital_status');

		$this->db->from('property_tbl as a');

		if ($sdata) {

			$this->db->where('a.propertyID', $sdata['property']);
		}

		$this->db->where('a.property_owner', $id);

		$this->db->where('a.available_date >=', date('Y-m-d'));

		$this->db->join('bookings as b', 'b.propertyID = a.propertyID', 'LEFT OUTER');

		$this->db->join('user_tbl as c', 'c.userID = b.userID', 'LEFT OUTER');

		$this->db->join('verifications as d', 'd.user_id = c.userID', 'LEFT OUTER');

		$this->db->group_by('a.propertyID');

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function fetchMyProperties($id)
	{

		$this->db->select('a.*, a.propertyID as propID, b.*, c.*, d.*');

		$this->db->from('property_tbl as a');

		$this->db->where('a.property_owner', $id);

		$this->db->join('apt_type_tbl as b', 'b.id = a.propertyType', 'LEFT OUTER');

		$this->db->join('bookings as c', 'c.propertyID = a.propertyID', 'LEFT OUTER');

		$this->db->join('user_tbl as d', 'd.userID = c.userID', 'LEFT OUTER');

		$this->db->group_by('a.propertyID');

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function fetchMyRepairs($id)
	{

		$this->db->select('*');

		$this->db->from('repair_tbl as a');

		$this->db->where('a.landlord_id', $id);

		$this->db->join('property_tbl as b', 'b.propertyID = a.property_id');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function myProperties($id)
	{

		$this->db->select('*');

		$this->db->from('property_tbl');

		$this->db->where('property_owner', $id);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function fetchMyProps($id)
	{

		$this->db->select('*');

		$this->db->from('property_tbl');

		$this->db->where('property_owner', $id);

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function fetchSidebarProp($id)
	{

		$this->db->select('a.*, b.*, c.*');

		$this->db->from('property_tbl as a');

		$this->db->where('a.property_owner', $id);

		$this->db->join('apt_type_tbl as b', 'b.id = a.propertyType', 'LEFT OUTER');

		$this->db->join('bookings as c', 'c.propertyID = a.propertyID', 'LEFT OUTER');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function fetchMyMessages($id)
	{

		$this->db->select('a.*, b.*');

		$this->db->from('landlord_messages as a');

		$this->db->where('a.receiver', $id);

		$this->db->join('admin_tbl as b', 'b.id = a.sender');

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function fetchMySentMessages($id)
	{

		$this->db->select('a.*, b.*');

		$this->db->from('landlord_messages as a');

		$this->db->where('a.sender', $id);

		$this->db->join('admin_tbl as b', 'b.id = a.receiver');

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_users_refcodes()
	{

		$this->db->select('firstName, email, referral_code');

		$this->db->from('user_tbl');

		$this->db->where('user_type', 'tenant');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_upcoming_payout($id)
	{

		$this->db->select('payout_day');

		$this->db->from('landlord_payout');

		$this->db->where('userID', $id);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function insert_rent_review($userID, $amount, $reason, $propertyID, $payment_plan)
	{

		$this->user_id = $userID;

		$this->new_amount = $amount;

		$this->reason = $reason;

		$this->payment_plan = $payment_plan;

		$this->propertyID = $propertyID;

		$this->status = 'Pending';

		$this->date_of_entry = date('Y-m-d');

		return $this->db->insert('rent_review', $this);
	}

	public function update_available_date($property, $date)
	{

		$expiry = '0000-00-00';

		if ($date) {

			$nMonths = 12;

			$startdate = date("Y-m-d", strtotime($date));


			$expiry = $this->endCycle($startdate, $nMonths);
		}

		$updates = array("available_date" => $expiry);

		$this->db->where('propertyID', $property);

		return $this->db->insert('property_tbl', $updates);
	}

	public function get_landlord_manager($userID)
	{

		$this->db->select('account_manager');

		$this->db->from('user_tbl');

		$this->db->where('userID', $userID);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function send_landlord_message($msgID, $subject, $content, $sender, $receiver)
	{

		$this->messageID = $msgID;

		$this->subject = $subject;

		$this->content = $content;

		$this->sender = $sender;

		$this->receiver = $receiver;

		$this->status = "Unread";

		$this->received_on = date('Y-m-d H:i:s');

		return $this->db->insert('landlord_messages', $this);
	}

	public function checkBVN($userID)
	{

		$this->db->select('bvn');

		$this->db->from('user_tbl');

		$this->db->where('userID', $userID);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function update_bvn($id, $bvn)
	{

		$update = array("bvn" => $bvn);

		$this->db->where('userID', $id);

		return $this->db->update('user_tbl', $update);
	}

	public function generate_report($id, $s_data)
	{

		$this->db->select('a.*, b.*, c.*, c.name as state_name');

		$this->db->from('payout_transactions as a');

		$this->db->where('a.user_id', $id);

		if ($s_data['property']) {

			$this->db->where('property_id', $s_data['property']);
		}

		if ($s_data['startDate'] && $s_data['endDate']) {

			$this->db->where('payout_date >=', date('Y-m-d', strtotime($s_data['startDate'])));

			$this->db->where('payout_date <=', date('Y-m-d', strtotime($s_data['endDate'])));
		} elseif ($s_data['startDate']) {

			$this->db->where('payout_date >=', date('Y-m-d', strtotime($s_data['startDate'])));
		} elseif ($s_data['endDate']) {

			$this->db->where('payout_date <=', date('Y-m-d', strtotime($s_data['endDate'])));
		}

		$this->db->join('property_tbl as b', 'b.propertyID = a.property_id', 'LEFT OUTER');

		$this->db->join('states as c', 'c.id = b.state', 'LEFT OUTER');

		$this->db->order_by('payout_date', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_account_details($id)
	{

		$this->db->select('*');

		$this->db->from('virtual_account');

		$this->db->where('userID', $id);

		$query = $this->db->get();

		return $query->row_array();
	}
	public function get_points($id)
	{

		$this->db->select('points');

		$this->db->from('user_tbl');

		$this->db->where('userID', $id);

		$query = $this->db->get();

		return $query->row_array();
	}
	public function get_account_manager($id)
	{

		$this->db->select('account_manager');

		$this->db->from('user_tbl');

		$this->db->where('userID', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function send_message($receiver, $message, $subject, $sender)
	{

		$id = md5(date('H:i:s'));

		return $this->db->insert('messages_tbl', array('requestID' => $id, 'sender' => $sender, 'content' => $message, 'subject' => $subject, 'status' => 'unread', "receiver" => $receiver, 'dateOfEntry' => date('Y-m-d H:i:s')));
	}

	public function sendRepair($repairCat, $repairNote, $userID, $propertyID)
	{

		$details = array("repair_category" => $repairCat, "repair_note" => $repairNote, "user_id" => $userID, "property_id" => $propertyID, "entry_date" => date('Y-m-d H:i:s'));

		return $this->db->insert('repair_tbl', $details);
	}

	public function sendRating($grade, $satisfaction, $userID, $propertyID, $ratingNote)
	{

		$details = array("grade" => $grade, "satisfaction" => $satisfaction, "rated_by" => $userID, "rating_note" => $ratingNote, "property_id" => $propertyID, "entry_date" => date('Y-m-d H:i:s'));

		return $this->db->insert('property_rating_tbl', $details);
	}

	public function sendFeedback($grade, $satisfaction, $userID, $feedbackNote)
	{

		$details = array("grade" => $grade, "satisfaction" => $satisfaction, "user" => $userID, "feedback_note" => $feedbackNote, "entry_date" => date('Y-m-d H:i:s'));

		return $this->db->insert('feedback_tbl', $details);
	}

	public function all_transactions($id)
	{

		$this->db->select_sum('amount');

		$this->db->from('transaction_tbl');

		$this->db->where('userID', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_credit($id, $limit, $start)
	{

		$this->db->select('a.*, b.*');

		$this->db->from('loan_requests as a');

		$this->db->join('loans as b', 'b.loanID = a.loanID');

		$this->db->where('b.userID', $id);

		$this->db->limit($limit, $start);

		$query = $this->db->get();

		return $query;
	}

	public function get_requested_credit($id)
	{

		$this->db->select('*');

		$this->db->from('loans');

		$this->db->where('userID', $id);

		$this->db->where('paymentStatus', 'Owing');

		$query = $this->db->get();

		return $query->row();
	}

	public function get_min_rent()
	{

		$this->db->select_min('price');

		$this->db->from('property_tbl');

		$query = $this->db->get();

		return $query->row();
	}

	public function get_max_rent()
	{

		$this->db->select_max('price');

		$this->db->from('property_tbl');

		$query = $this->db->get();

		return $query->row();
	}

	public function get_bookings($id)
	{

		$this->db->select('a.*, a.status as transaction_status, b.*, c.*, d.*, e.name as state_name');

		$this->db->from('transaction_tbl as a');

		$this->db->where('a.userID', $id);

		$this->db->join('bookings as b', 'b.bookingID = a.transaction_id');

		$this->db->join('property_tbl as c', 'c.propertyID = b.propertyID', 'LEFT OUTER');

		$this->db->join('user_tbl as d', 'd.userID = b.userID', 'LEFT OUTER');

		$this->db->join('states as e', 'e.id = c.state', 'LEFT OUTER');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_stayone_bookings($id)
	{

		$this->db->select('a.*, b.*, c.*, d.*, e.name as state_name');

		$this->db->from('stayone_transactions as a');

		$this->db->where('a.user_id', $id);

		$this->db->join('stayone_booking as b', 'b.bookingID = a.booking_id', 'LEFT OUTER');

		$this->db->join('stayone_apartments as c', 'c.apartmentID = b.aptID', 'LEFT OUTER');

		$this->db->join('user_tbl as d', 'd.userID = b.userID', 'LEFT OUTER');

		$this->db->join('states as e', 'e.id = c.state', 'LEFT OUTER');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}
	public function fetch_inspections($id, $limit, $start)
	{

		$this->db->select('a.*, b.*, c.*, d.name as state_name');

		$this->db->from('inspection_tbl as a');

		$this->db->where('a.userID', $id);

		$this->db->join('user_tbl as b', 'b.userID = a.userID', 'LEFT OUTER');

		$this->db->join('property_tbl as c', 'c.propertyID = a.propertyID', 'LEFT OUTER');

		$this->db->join('states as d', 'd.id = c.state', 'LEFT OUTER');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit($limit, $start);

		$query = $this->db->get();

		return $query;
	}

	public function checkSub($id)
	{
		//$ids = $this->session->userdata('userID');

		$this->db->select('a.id, a.start_year, a.filename, a.end_year, b.propertyTitle');

		$this->db->from('sub_agreement as a');

		$this->db->join('property_tbl as b', 'a.property = b.propertyID', 'LEFT OUTER');

		$this->db->where('a.userId', $id);

		$this->db->order_by('a.id', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function checkSubsequentPayment($id)
	{

		$this->db->from('transaction_tbl');

		$this->db->where('userID', $id);

		$this->db->where('type', 'rss');

		$this->db->where('status', 'approved');

		return $this->db->count_all_results();
	}

	public function fetchNotification()
	{

		$today = date('Y-m-d');

		$this->db->select('*');

		$this->db->from('notification_tbl');

		$this->db->where('start_date <=', $today);

		$this->db->where('end_date >=', $today);

		// Adding a condition to filter by notification_platform
		$this->db->where_in('notification_platform', array('RSS', 'All'));

		$this->db->order_by('end_date', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}
}
