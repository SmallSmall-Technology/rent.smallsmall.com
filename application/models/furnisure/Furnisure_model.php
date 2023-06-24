<?php

class Furnisure_model extends CI_Model {



	public function __construct()

	{

		parent::__construct();

		$this->load->database();
		
		$this->db2 = $this->load->database('second', TRUE);

	}

	

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

	public function countFurnitures() {

		$this->db->from('furnisure_tbl');

		return $this->db->count_all_results();

	}

	public function fetchFurnitures($id) {       

		$this->db->select('*');

		$this->db->from('furnisure_tbl'); 

		$this->db->where('applianceType', $id);

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();

	}

	public function fetchFurnisureTypes(){

		$this->db->select('*');

		$this->db->from('furnisure_type_tbl');

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();

	}

	public function get_furniture_by_type($id){

		$this->db->select('*');

		$this->db->from('furnisure_tbl');

		$this->db->where('applianceType', $id);

		$this->db->limit(4);

		$query = $this->db->get();

		return $query->result_array();

	}

	public function get_type_slug($type){

		$this->db->select('id');

		$this->db->from('furnisure_type_tbl');

		$this->db->where('slug', $type);       

		$query = $this->db->get();

		return $query->row_array();

	}

	public function fetchSingleFurniture($id) {       

		$this->db->select('*');

		$this->db->from('furnisure_tbl'); 

		$this->db->where('applianceID', $id);

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();

	}

	public function fetchRelatedFurniture($category){

		$this->db->select('*');

		$this->db->from('furnisure_tbl'); 

		$this->db->where('category', $category);

		$this->db->limit(4);

		$query = $this->db->get();

		return $query->result_array();

	}
	
	public function updateViews($views, $id){
		$data = array('views' => $views);
		
		$this->db->where('applianceID', $id);
		
		if($this->db->update('furnisure_tbl', $data)){
			
			return 1;
			
		}else{
			
			return 0;
			
		}	
	}
	
	public function get_all_furnisure(){
	    
	    $this->db->select('*');

		$this->db->from('furnisure_tbl'); 

		$query = $this->db->get();

		return $query->result_array();
	}
	
	public function insert_into_furnisure($pID, $folderName, $featuredImage, $title, $cost_per_month, $type, $description, $created_at){
	
        
        $this->pID = $pID;
        
        $this->folderName = $folderName;
        
        $this->featuredImage = $featuredImage;
        
        $this->furnisure_type_id = $type;
        
        $this->title = $title;
        
        $this->cost_per_month = $cost_per_month;
        
        $this->is_rented = 0;
        
        $this->is_favourite = 0;
        
        $this->is_available = 1;
        
        $this->description = $description;
        
        $this->created_at = $created_at;
        
        $this->updated_at = $created_at;
        
        return $this->db2->insert("furnisures", $this);
        
    }
    public function get_payment_details($id){
	    
		$this->db->select('a.id, a.verification_id, a.reference_id, a.amount, a.transaction_id, a.status, a.transaction_date, a.type, a.payment_type, b.*, c.*, d.email, d.firstName, d.lastName'); 
		
		$this->db->from('transaction_tbl as a');
		
		$this->db->where('a.reference_id', $id);
		
		$this->db->join('furnisure_order as b', 'b.orderID = a.transaction_id');
		
		$this->db->join('furnisure_tbl as c', 'c.applianceID = b.productID');
		
		$this->db->join('user_tbl as d', 'd.userID = a.userID');
		
		$query = $this->db->get();
		
		return $query->row_array();
	}
	public function item_info($refID){
	    
	    $this->db->select('a.*, b.*');
		
		$this->db->from('furnisure_order as a');
		
		$this->db->where('a.reference_id', $refID);
		
		$this->db->join('furnisure_tbl as b', 'b.applianceID = a.productID');

		$query = $this->db->get();

		return $query->result_array();
	}
	public function count_items($ref){
		
		$this->db->from('furnisure_order');
		
		$this->db->where('reference_id', $ref);

		return $this->db->count_all_results();
	}
	public function paymentUpdate($refID){
        
        $transUpd = array("status", "approved");
        
        $this->db-where("reference_id", $refID);
        
        return $this->db->update('transaction_tbl', $transUpd);
        
    }
    public function getDetails($ref){
		
		$this->db->select('*');
		
		$this->db->from('transaction_tbl');
		
		$this->db->where('reference_id', $ref);
		
		$query = $this->db->get();
		
		return $query->row_array();
	}

}

?>