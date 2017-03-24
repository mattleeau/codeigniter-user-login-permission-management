<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Family_model');
        $this->load->model('Group_model');
        $this->load->model('Option_model');
        $this->load->model('Procedure_model');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $data['procedures'] = array();
        $data['lang'] = $this->session->userdata('lang');
        $data['families'] = $this->_get_all_families();
        $data['groups'] = $this->_get_all_groups();
        $procedures = $this->Procedure_model->get_rows();
        foreach ($procedures as $p) {
            $p['family_id'] = unserialize($p['family_id']);
            $p['group_id'] = unserialize($p['group_id']);
            $p['who_can_apply'] = unserialize($p['who_can_apply']);
            $p['where_is_processed'] = unserialize($p['where_is_processed']);
            $p['more_information'] = unserialize($p['more_information']);
            $p['applicable_regulations'] = unserialize($p['applicable_regulations']);
            
            foreach ($p['family_id'] as $f_id) {
                foreach ($p['group_id'] as $g_id) {
                    $data['procedures'][$f_id][$g_id][$p['procedure_id']] = $p;
                }
            }
        }
        $count_family = count($data['families'])!=0?count($data['families']):1;
        $data['width'] = ceil(100 / $count_family);
        $data['width2'] = ($count_family - 1) * 150;

        $this->display('front', $data);
    }

    public function procedure($id) {
        $procedure = $this->Procedure_model->get_row($id);
        
        $procedure['family_id'] = unserialize($procedure['family_id']);
        $procedure['group_id'] = unserialize($procedure['group_id']);
        $procedure['who_can_apply'] = unserialize($procedure['who_can_apply']);
        $procedure['where_is_processed'] = unserialize($procedure['where_is_processed']);
        $procedure['more_information'] = unserialize($procedure['more_information']);
        $procedure['applicable_regulations'] = unserialize($procedure['applicable_regulations']);
        
        $data['procedure'] = $procedure;
        
        $data['lang'] = $this->session->userdata('lang');
        $data['families'] = $this->_get_all_families();
        $data['groups'] = $this->_get_all_groups();
        $data['dropdowns'] = $this->_get_all_dropdowns();
        $this->display('front/procedure', $data);
    }

    public function _get_all_families()
    {
        $families_in_current_language = array();
        $lang = $this->session->userdata('lang');
        $families = $this->Family_model->get_rows();
        foreach ($families as $family) {
            $families_in_current_language[$family['family_id']] = array('name'=>$family['family_name_'.$lang], 'color'=>$family['color']);
        }

        return $families_in_current_language;
    }
    public function _get_all_groups()
    {
        $groups_in_current_language = array();
        $lang = $this->session->userdata('lang');
        $groups = $this->Group_model->get_rows();
        foreach ($groups as $group) {
            $groups_in_current_language[$group['group_id']] = array('name'=>$group['group_name_'.$lang], 'icon'=>$group['icon']);
        }

        return $groups_in_current_language;
    }

    public function _get_all_dropdowns()
    {
        $dropdowns_with_current_language = array();
        $dropdowns = $this->Option_model->get_rows();
        $lang = $this->session->userdata('lang');
        foreach ($dropdowns as $d) {
            $dropdowns_with_current_language[$d['option_id']] = $d['option_title_'.$lang];
        }

        return $dropdowns_with_current_language;
    }
}
