<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('show_message'))
{
    function show_message() {
        $CI =& get_instance();
        if ($CI->session->userdata('msg') != "") {
            echo '<div class="alert alert-warning" role="alert">';
            echo $CI->session->userdata('msg');
            echo '</div>';
        }
        $CI->session->unset_userdata('msg');
    }

}

if ( ! function_exists('base_url_with_language'))
{
    function base_url_with_language($uri) {
        $CI =& get_instance();
        return base_url($uri) . '?lang=' . $CI->session->userdata('lang');
    }

}
