<?php
defined('BASEPATH') or die("Unable to load any script");
class Contact extends Base_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('blood_model');
    }

    function index(){
        $this->load->view('header');
        $this->load->view('contact_us');
        $this->load->view('footer');
    }
}