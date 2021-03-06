<?php

class User_model extends MY_Model {

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
            $this->table = 'users';
            $this->pk = 'user_id';
    }

    public function check_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0)    return true;
        else    return false;
    }


}