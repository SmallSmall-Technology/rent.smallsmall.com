<?php

class Landlord_model extends CI_Model {

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

	public function setLimit($limit) {

		$this->_limit = $limit;

	}

	public function setPageNumber($pageNumber) {

		$this->_pageNumber = $pageNumber;

	}

	public function setOffset($offset) {

		$this->_offset = $offset;

	}
	
}