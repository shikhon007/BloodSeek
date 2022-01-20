<?php
class Base_controller extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('blood_model');
        if($this->session->userdata('lang') == ""){
            $this->switchLang();
        }
    }

    function switchLang($lang = 'en'){
        $this->session->set_userdata('lang', $lang);
    }
}