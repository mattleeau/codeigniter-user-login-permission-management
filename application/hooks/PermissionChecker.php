<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermissionChecker
{
    var $CI;

    function __construct(){

        $this->CI =& get_instance();

        if(!isset($this->CI->session))
        {
            $this->CI->load->library('session');
        }
    }

    function initializePermission() {

        if (strtolower($this->CI->router->class)!="front" && !($this->CI->router->class=="user" && ($this->CI->router->method=="login" || $this->CI->router->method=="do_login")))
        {
            if(!$this->CI->session->userdata('logged_in'))
            {
                redirect('user/login');
            }
        }
    }

}
