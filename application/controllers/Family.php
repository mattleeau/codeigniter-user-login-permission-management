<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Family_model');
    }

    public function index()
    {
        $data = array();
        $data['lang'] = $this->session->userdata('lang');
        $data['families'] = $this->Family_model->get_rows();
        $this->display('family/list', $data);
    }

    public function add()
    {
        $user = array();
        $fields = $this->Family_model->get_all_fields();
        $lang = $this->session->userdata('lang');
        $other_lang = $lang=='eu' ? 'es' : 'eu';
        $languages = $this->config->item('language_codes');
        foreach ($fields as $field)
        {
            $family[$field] = '';
        }
        $this->display('family/edit', array('family'=>$family, 'lang'=>$lang, 'other_lang'=>$other_lang, 'languages'=>$languages));
    }

    public function edit($id)
    {
        $family = $this->Family_model->get_row($id);
        $lang = $this->session->userdata('lang');
        $other_lang = $lang=='eu' ? 'es' : 'eu';
        $languages = $this->config->item('language_codes');

        $this->display('family/edit', array('family'=>$family, 'lang'=>$lang, 'other_lang'=>$other_lang, 'languages'=>$languages));
    }

    public function save()
    {
        $lang = $this->session->userdata('lang');
        $post = $this->input->post();

        $this->form_validation->set_rules('family_name_'.$lang, $this->lang->line('Family'), 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_userdata('msg', validation_errors());
            redirect(base_url_with_language('family/edit/'.$post['family_id']));
        }
        else
        {
            if (!$post['family_id'])
            {
                $this->Family_model->insert($post);
            }
            else
            {
                $this->Family_model->update($post);
            }

            redirect(base_url_with_language('family'));
        }

    }

    function delete($id)
    {
        $this->Family_model->delete($id);
        redirect(base_url_with_language("/family"));
    }

}