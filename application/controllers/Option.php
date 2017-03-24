<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Option extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Option_model');
    }

    public function index()
    {
        $data['dropdowns'] = $this->_get_all_dropdowns();;
        $data['options'] = $this->_get_all_options();
        $this->display('option/list', $data);
    }

    public function add()
    {
        $user = array();
        $dropdowns = $this->_get_all_dropdowns();
        $fields = $this->Option_model->get_all_fields();
        $lang = $this->session->userdata('lang');
        $other_lang = $lang=='eu' ? 'es' : 'eu';
        $languages = $this->config->item('language_codes');
        foreach ($fields as $field)
        {
            $option[$field] = '';
        }
        $this->display('option/edit', array('option'=>$option, 'dropdowns'=>$dropdowns, 'lang'=>$lang, 'other_lang'=>$other_lang, 'languages'=>$languages));
    }

    public function edit($id)
    {
        $option = $this->Option_model->get_row($id);
        $dropdowns = $this->_get_all_dropdowns();
        $lang = $this->session->userdata('lang');
        $other_lang = $lang=='eu' ? 'es' : 'eu';
        $languages = $this->config->item('language_codes');

        $this->display('option/edit', array('option'=>$option, 'dropdowns'=>$dropdowns, 'lang'=>$lang, 'other_lang'=>$other_lang, 'languages'=>$languages));
    }

    public function save()
    {
        $post = $this->input->post();

        $this->form_validation->set_rules('dropdown', $this->lang->line('Dropdown'), 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_userdata('msg', validation_errors());
            redirect(base_url_with_language('option/edit/'.$post['option_id']));
        }
        else
        {
            if (!$post['option_id'])
            {
                $this->Option_model->insert($post);
            }
            else
            {
                $this->Option_model->update($post);
            }

            redirect(base_url_with_language('option'));
        }

    }

    function delete($id)
    {
        $this->Option_model->delete($id);
        redirect(base_url_with_language("/option"));
    }

    public function _get_all_options()
    {
        return $this->Option_model->get_rows();
    }

    public function _get_all_dropdowns()
    {
        $dropdowns_with_current_language = array();
        $dropdowns = $this->config->item('dropdowns');
        $lang = $this->session->userdata('lang');
        foreach ($dropdowns as $id=>$name) {
            $dropdowns_with_current_language[$id] = $this->lang->line($name);
        }

        return $dropdowns_with_current_language;
    }
}