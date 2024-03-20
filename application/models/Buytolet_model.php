<?php

class Buytolet_model extends CI_Model {

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
	public function count_user_requests($id){
	    
	    $this->db->from('buytolet_request');
	    
	    $this->db->where("userID", $id);
	    
	    return $this->db->count_all_results();
	    
	}
	public function count_bss_inspections($id){
	    
	    $this->db->from('buytolet_inspection');
	    
	    $this->db->where("userID", $id);
	    
	    return $this->db->count_all_results();
	    
	}
	public function fetch_requests($id, $limit, $start) {       

		$this->db->select('a.*, b.*');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.userID', $id);
		
		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID');
		
		$this->db->order_by('a.id', 'DESC');

		$this->db->limit($limit, $start);

		$query = $this->db->get();

		return $query;

	}
	
	public function get_unit_details($id){
	    
	    $this->db->select('a.*, b.*');
	    
	    $this->db->from('buytolet_request as a');
	    
	    $this->db->where('a.propertyID', $id);
	    
	    $this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID');
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	}
	public function get_finance_details($id){
	    
	    $this->db->select('a.*, b.property_name, b.city, b.price, c.*');
	    
	    $this->db->from('buytolet_request as a');
	    
	    $this->db->where('a.propertyID', $id);
	    
	    $this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID', 'LEFT OUTER');
	    
	    $this->db->join('states as c', 'c.id = b.state', 'LEFT OUTER');
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	}
	
	public function get_payment_details($id, $prop){
	    
	    $this->db->select('*');
	    
	    $this->db->from('buytolet_transactions');
	    
	    $this->db->where('transaction_id', $id);
	    
	    $this->db->where('propertyID', $prop);
	    
	    $query = $this->db->get();
	    
	    return $query->result_array();
	}
	public function fetch_payments($id, $limit, $start, $refID, $propertyID) {  

		$this->db->select('a.*, a.status as payment_status, b.*');

		$this->db->from('buytolet_transactions as a');

		$this->db->where('a.userID', $id);

		$this->db->where('a.transaction_id', $refID);

		$this->db->where('a.propertyID', $propertyID);
		
		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID', 'LEFT OUTER');
		
		$this->db->order_by('a.id', 'DESC');

		$this->db->limit($limit, $start);

		$query = $this->db->get();

		return $query;

	}
	
	public function markNotificationAsRead($notificationID)
	{
		$this->db->set('status', 1); // set the status as read

		$this->db->where('id', $notificationID);

		$this->db->update('user_notification');
	}
	
}

?>