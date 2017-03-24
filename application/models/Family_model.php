<?php

class Family_model extends MY_Model {

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
            $this->table = 'families';
            $this->pk = 'family_id';
    }


}