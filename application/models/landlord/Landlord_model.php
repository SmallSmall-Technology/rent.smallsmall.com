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


    public function get_subscriber($propId)
    {
        $this->db->select('a.*');

        $this->db->from('property_tbl as a');

        $this->db->where('a.propertyID', $propId);

        $query = $this->db->get();

        return $query->row_array();
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
}
