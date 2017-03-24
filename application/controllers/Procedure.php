<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procedure extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Procedure_model');
        $this->load->model('Family_model');
        $this->load->model('Group_model');
        $this->load->model('Option_model');
    }

    public function index()
    {
        $data['lang'] = $this->session->userdata('lang');
        $data['procedures'] = $this->Procedure_model->get_rows();
        $data['current'] = $this->session->userdata('logged_in');
        $this->display('procedure/list', $data);
    }

    public function add()
    {
        $procedure = array();

        $fields = $this->Procedure_model->get_all_fields();
        $families = $this->_get_all_families();
        $defaul_family = -1;
        foreach ($families as $key=>$val) {
            $defaul_family = $key;
            break;
        }
        $groups = $this->_get_all_groups(array('family_id'=>$defaul_family));
        $dropdowns = $this->_get_all_dropdowns();
        $lang = $this->session->userdata('lang');
        $other_lang = $lang=='eu' ? 'es' : 'eu';
        $languages = $this->config->item('language_codes');
        foreach ($fields as $field)
        {
            $procedure[$field] = '';
        }
        $this->display('procedure/edit', array('procedure'=>$procedure, 'dropdowns'=>$dropdowns, 'families'=>$families, 'groups'=>$groups, 'lang'=>$lang, 'other_lang'=>$other_lang, 'languages'=>$languages));
    }

    public function edit($id)
    {
        $families = $this->_get_all_families();
        $defaul_family = -1;
        foreach ($families as $key=>$val) {
            $defaul_family = $key;
            break;
        }
        $groups = $this->_get_all_groups(array('family_id'=>$defaul_family));
        $procedure = $this->Procedure_model->get_row($id);
        $procedure['family_id'] = unserialize($procedure['family_id']);
        $procedure['group_id'] = unserialize($procedure['group_id']);
        $procedure['who_can_apply'] = unserialize($procedure['who_can_apply']);
        $procedure['where_is_processed'] = unserialize($procedure['where_is_processed']);
        $procedure['more_information'] = unserialize($procedure['more_information']);
        $procedure['applicable_regulations'] = unserialize($procedure['applicable_regulations']);
        $dropdowns = $this->_get_all_dropdowns();
        $lang = $this->session->userdata('lang');
        $other_lang = $lang=='eu' ? 'es' : 'eu';
        $languages = $this->config->item('language_codes');

        $this->display('procedure/edit', array('procedure'=>$procedure, 'dropdowns'=>$dropdowns, 'families'=>$families, 'groups'=>$groups, 'lang'=>$lang, 'other_lang'=>$other_lang, 'languages'=>$languages));
    }

    public function save()
    {
        $post = $this->input->post();
        $post['family_id'] = serialize($post['family_id']);
        $post['group_id'] = serialize($post['group_id']);
        $post['who_can_apply'] = serialize($post['who_can_apply']);
        $post['where_is_processed'] = serialize($post['where_is_processed']);
        $post['more_information'] = serialize($post['more_information']);
        $post['applicable_regulations'] = serialize($post['applicable_regulations']);
        $lang = $this->session->userdata('lang');

        $this->form_validation->set_rules('procedure_name_'.$lang, $this->lang->line('Procedure'), 'required');
        $this->form_validation->set_rules('what_is_'.$lang, $this->lang->line('What is'), 'required');
        $this->form_validation->set_rules('documents_to_be_submitted_'.$lang, $this->lang->line('Documents to be submitted'), 'required');
        $this->form_validation->set_rules('economic_cost_'.$lang, $this->lang->line('Economic cost'), 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_userdata('msg', validation_errors());
            redirect(base_url_with_language('procedure/edit/'.$post['procedure_id']));
        }
        else
        {
            if (!$post['procedure_id'])
            {
                $this->Procedure_model->insert($post);
            }
            else
            {
                $this->Procedure_model->update($post);
            }

            redirect(base_url_with_language('procedure'));
        }

    }

    function delete($id)
    {
        $this->Procedure_model->delete($id);
        redirect(base_url_with_language("/procedure"));
    }

    public function _get_all_dropdowns()
    {
        $grouped_options = array(
            DROPDOWN_WHO => array(),
            DROPDOWN_WHERE => array(),
            DROPDOWN_MORE => array()
        );
        $all_options = $this->Option_model->get_rows();
        $dropdowns = $this->config->item('dropdowns');
        $lang = $this->session->userdata('lang');

        foreach ($all_options as $option) {
            $grouped_options[$option['dropdown']][$option['option_id']] = $option['option_title_'.$lang];
        }

        return $grouped_options;

    }
    public function _get_all_families()
    {
        $families_in_current_language = array();
        $lang = $this->session->userdata('lang');
        $families = $this->Family_model->get_rows();
        foreach ($families as $family) {
            $families_in_current_language[$family['family_id']] = $family['family_name_'.$lang];
        }

        return $families_in_current_language;
    }
    public function _get_all_groups($vars)
    {
        $groups_in_current_language = array();
        $lang = $this->session->userdata('lang');
        $groups = $this->Group_model->get_rows($vars);
        foreach ($groups as $group) {
            $groups_in_current_language[$group['group_id']] = $group['group_name_'.$lang];
        }

        return $groups_in_current_language;
    }
}