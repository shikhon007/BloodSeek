<?php
class LanguageLoader{
    function initialize(){
        $ci = & get_instance();
        $ci->load->helper('language');

        $lang = $ci->session->userdata('lang');
        if($lang){
            $ci->lang->load('message', $lang);
        }else{
            $ci->lang->load('message', 'bn');
        }
    }
}