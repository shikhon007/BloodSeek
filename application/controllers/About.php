<?php
 class About extends Base_controller{
     function __construct(){
         parent::__construct();
     }

     function index(){
         if($this->session->userdata('lang')=='en'){
             $sessArr    = array(
                 'title'     =>  'Know about us more - Blood Book'
             );
         }elseif($this->session->userdata('lang')=='bn'){
             $sessArr    = array(
                 'title'     =>  'আমাদের সম্পর্কে আরো জানুন - Blood Book'
             );
         }
         $this->session->set_userdata($sessArr);
         $this->load->view('header');
         $this->load->view('about');
         $this->load->view('footer');
     }
 }