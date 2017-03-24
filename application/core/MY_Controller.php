<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    var $error;

    public function __construct()
    {
        parent::__construct();
    }

    public function display($view, $vars = array(), $return = FALSE)
    {
        $data = $vars;
        $data['msg'] = $this->session->userdata('msg');
        $data['lang'] = $this->session->userdata('lang');
        $userdata = $this->session->userdata('logged_in');
        $this->load->view('page/header', $userdata);
        $vars['error'] = $this->error;
        $this->load->view($view, $data);
        $this->load->view('page/footer');
    }

}
