<?php
    class Blog extends Base_controller{
        function __construct(){
            parent::__construct();
        }

        function index(){
            if($this->session->userdata('lang')=='en'){
                $sessArr    = array(
                    'title'     =>  'Build community to share blood - Blood Seek'
                );
            }elseif($this->session->userdata('lang')=='bn'){
                $sessArr    = array(
                    'title'     =>  'রক্তের সামাজিক পরিবেশ তৈরি করুন - রক্ত খুজুন'
                );
            }
            $this->session->set_userdata($sessArr);
            $this->load->view('header');
            $this->load->view('blog_index');
            $this->load->view('footer');
        }
    }