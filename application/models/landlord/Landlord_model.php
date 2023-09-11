<?php

class Landlord_model extends CI_Model
{

    public function __construct()
    {

        parent::__construct();

        $this->load->database();

        $this->db2 = $this->load->database('second', TRUE);
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

    public function get_propty($userId)
    {
        $this->db->select('a.*');

        $this->db->from('property_tbl as a');

        $this->db->where('a.property_owner', $userId);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_history($userId)
    {
        $this->db->select('a.*, b.*');

        $this->db->from('property_tbl as a');

        $this->db->where('a.property_owner', $userId);

        $this->db->join('cx_repairs as b', 'b.propertyId = a.propertyID', 'LEFT OUTER');

        $query = $this->db->get();

        return $query->result_array();
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


    public function get_subscriber($propId)
    {
        $this->db->select('a.*');

        $this->db->from('property_tbl as a');

        $this->db->where('a.propertyID', $propId);

        $query = $this->db->get();

        return $query;
    }

    public function get_repairs($propId)
    {
        $this->db->select('a.*, a.status as repair_status, b.*');

        $this->db->from('repair_tbl as a');

        $this->db->where('a.property_id', $propId);

        $this->db->join('property_tbl as b', 'b.propertyID = a.property_id');

        $query = $this->db->get();

        return $query;
    }
    
    public function get_userinfo($userID, $propId)
    {
        $this->db->select('a.status as transaction_status, c.*, d.userID as tenant_id, d.firstName, d.lastName, e.name as state_name'); 
		
		$this->db->from('transaction_tbl as a');

        $this->db->where('a.status', 'Approved');
	    
	    $this->db->where('c.property_owner', $userID);

        $this->db->where('c.propertyID', $propId);
	    
	    $this->db->join('bookings as b', 'b.bookingID = a.transaction_id', 'LEFT OUTER');
	    
	    $this->db->join('property_tbl as c', 'c.propertyID = b.propertyID', 'LEFT OUTER');
	    
	    $this->db->join('user_tbl as d', 'd.userID = a.userID', 'LEFT OUTER');
	    
	    $this->db->join('states as e', 'e.id = c.state', 'LEFT OUTER');
		
		$this->db->order_by('a.id', 'DESC');

		$this->db->limit(1);
		
		$query = $this->db->get();
		
		return $query->row_array();
    }

    public function get_prophstry($userID, $propId, $limit, $start)
    {
        $this->db->select('a.status as transaction_status, a.transaction_date, b.move_in_date as moveIndate, b.move_out_date as moveOutdate, c.*, d.userID as tenant_id, d.firstName, d.lastName, d.gender, e.name as state_name, f.marital_status'); 
		
		$this->db->from('transaction_tbl as a');
	    
	    $this->db->where('c.property_owner', $userID);

        $this->db->where('c.propertyID', $propId);

        $this->db->where('a.status', 'Approved');
	    
	    $this->db->join('bookings as b', 'b.bookingID = a.transaction_id');
	    
	    $this->db->join('property_tbl as c', 'c.propertyID = b.propertyID');
	    
	    $this->db->join('user_tbl as d', 'd.userID = a.userID');
	    
	    $this->db->join('states as e', 'e.id = c.state');

        $this->db->join('verifications as f', 'f.user_id = a.userID');
		
		$this->db->order_by('a.id', 'DESC');

        $this->db->limit($limit, $start);
		
		$query = $this->db->get();
		
		return $query;
    }

    
    public function get_Inspectioninfo($propId, $limit, $start)
    {
        $this->db->select('a.*'); 
		
		$this->db->from('inspection_tbl as a');
	    
	    $this->db->where('a.propertyID', $propId);
		
		$this->db->order_by('a.id', 'DESC');

        $this->db->limit($limit, $start);
		
		$query = $this->db->get();
		
		return $query;
    }

    public function get_SubscriberInfo($userID)
    {
        $this->db->select('a.status as transaction_status, a.transaction_date, c.*, d.userID as tenant_id, d.firstName, d.lastName, d.gender, e.name as state_name'); 
		
		$this->db->from('transaction_tbl as a');
	    
	    $this->db->where('c.property_owner', $userID);

        $this->db->where('a.status', 'Approved');
	    
	    $this->db->join('bookings as b', 'b.bookingID = a.transaction_id');
	    
	    $this->db->join('property_tbl as c', 'c.propertyID = b.propertyID');
	    
	    $this->db->join('user_tbl as d', 'd.userID = a.userID');
	    
	    $this->db->join('states as e', 'e.id = c.state');
		
		$this->db->order_by('a.id', 'DESC');
		
		$query = $this->db->get();
		
		return $query->result_array();
    }

    public function get_subscriberprofile($landlordID, $userID)
    {
        $this->db->select('a.status as transaction_status, b.move_in_date as moveInDate, a.transaction_date, c.*, d.userID as tenant_id, d.*, e.name as state_name, f.*'); 
		
		$this->db->from('transaction_tbl as a');
	    
	    $this->db->where('c.property_owner', $landlordID);

        $this->db->where('a.status', 'Approved');

        $this->db->where('d.userID', $userID);
	    
	    $this->db->join('bookings as b', 'b.bookingID = a.transaction_id');
	    
	    $this->db->join('property_tbl as c', 'c.propertyID = b.propertyID');
	    
	    $this->db->join('user_tbl as d', 'd.userID = a.userID');

        $this->db->join('verifications as f', 'f.user_id = a.userID');
	    
	    $this->db->join('states as e', 'e.id = c.state');
		
		$this->db->order_by('a.id', 'DESC');
		
		$query = $this->db->get();
		
		return $query->row_array();
    }

    public function insertCxrepairs($type, $cost, $date, $property, $status, $filename, $details){

        $data = array(
            'repair_type' => $type,
            'cost'   => $cost,
            'Date' => $date,
            'propertyId' => $property,
            'status' => $status,
            'filename' => $filename,
            'details' => $details
        );

		if($this->db->insert('cx_repairs', $data)){

			return 1;

		}else{

			return 0;

		}	
		
	}
} 
