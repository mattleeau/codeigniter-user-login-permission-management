<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Family_model');
        $this->load->model('Group_model');
    }

    public function index()
    {
        $data['families'] = $this->_get_all_families();
        $data['groups'] = $this->Group_model->get_rows();
        $this->display('group/list', $data);
    }

    public function add()
    {
        $user = array();
        $families = $this->_get_all_families();
        $fields = $this->Group_model->get_all_fields();
        $lang = $this->session->userdata('lang');
        $other_lang = $lang=='eu' ? 'es' : 'eu';
        $languages = $this->config->item('language_codes');
        foreach ($fields as $field)
        {
            $group[$field] = '';
        }
        $this->display('group/edit', array('group'=>$group, 'families'=>$families, 'lang'=>$lang, 'other_lang'=>$other_lang, 'languages'=>$languages));
    }

    public function edit($id=-1)
    {
        if ($id==-1) {
            redirect(base_url_with_language('group/add'));
        }
        $families = $this->_get_all_families();
        $group = $this->Group_model->get_row($id);
        $lang = $this->session->userdata('lang');
        $other_lang = $lang=='eu' ? 'es' : 'eu';
        $languages = $this->config->item('language_codes');

        $this->display('group/edit', array('group'=>$group, 'families'=>$families, 'lang'=>$lang, 'other_lang'=>$other_lang, 'languages'=>$languages));
    }

    public function save()
    {
        $lang = $this->session->userdata('lang');
        $post = $this->input->post();

        $this->form_validation->set_rules('family_id', $this->lang->line('Family'), 'required');
        $this->form_validation->set_rules('group_name_'.$lang, $this->lang->line('Group'), 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_userdata('msg', validation_errors());
            redirect(base_url_with_language('group/edit/'.$post['group_id']));
        }
        else
        {
            $uploaded_icon = false;
            if ($post['icon_is_changed']==1 || ($post['icon_is_changed']==0 && $post['old_icon']=="")) {
                $uploaded_icon = $this->do_upload();
                if (!$uploaded_icon) {
                    redirect(base_url_with_language('group/edit/'.$post['group_id']));
                } else {
                    $post['icon'] = $uploaded_icon['upload_data']['file_name'];
                }
            } else {
                $post['icon'] = $post['old_icon'];
            }
            unset($post['icon_is_changed']);
            if ($uploaded_icon || ($post['old_icon'] != "")) {
                unset($post['old_icon']);
                if (!$post['group_id'])
                {
                    $this->Group_model->insert($post);
                }
                else
                {
                    $this->Group_model->update($post);
                }

                redirect(base_url_with_language('group'));
            } else {
                redirect(base_url_with_language('group/edit/'.$post['group_id']));
            }
        }

    }

    function delete($id)
    {
        $this->Group_model->delete($id);
        redirect(base_url_with_language("/group"));
    }

    public function do_upload() {
        $config['upload_path'] = '/home/tramites/public_html/skin/icons/';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size']    = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('icon'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_userdata('msg', $error['error']);
            return false;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
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

    public function get_groups_of_family() {
        $html = '';
        $post = $this->input->post();
        $lang = $post['lang'];
        $groups = $this->Group_model->get_rows(array('family_id'=>$post['family_id'][0]));
        foreach ($groups as $group) {
            $val = $group['group_id'];
            $title = $group['group_name_'.$lang];
            $html .= "<option value='$val'>$title</option>";
        }

        echo $html;
    }
}