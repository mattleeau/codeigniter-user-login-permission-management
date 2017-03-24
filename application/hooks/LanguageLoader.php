<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LanguageLoader
{
    var $CI;

    function __construct(){

        $this->CI =& get_instance();

    }

    function loadLanguage() {
        include(APPPATH.'config/custom.php');
        $lang = $this->CI->input->get('lang', TRUE) ? $this->CI->input->get('lang', TRUE) : 'eu';
        $this->CI->session->set_userdata('lang', $lang);
        $this->CI->config->set_item('language', $config['language_codes'][$lang]);
        $this->CI->lang->load('interface');
    }

}
