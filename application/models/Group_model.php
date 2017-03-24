<?php

class Group_model extends MY_Model {

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
            $this->table = 'groups';
            $this->pk = 'group_id';
    }

}