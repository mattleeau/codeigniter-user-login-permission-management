<?php

class Option_model extends MY_Model {

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
            $this->table = 'options';
            $this->pk = 'option_id';
    }

    public function get_rows($vars=array())
    {
        $result = array();

        foreach ($vars as $key=>$val)
        {
            $this->db->where($key, $val);
        }

	$this->db->from($this->table);
	$this->db->order_by("dropdown", "asc");
	$query = $this->db->get(); 
	
        foreach ($query->result_array() as $row)
        {
            $result[] = $row;
        }

        return $result;
    }



}