<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blood extends Base_controller {

	function __construct(){
		parent::__construct();
	}
	public function index(){
        if($this->session->userdata('lang')=='en'){
            $sessArr    = array(
                                'title'         =>  'Donate blood and Save life - Blood Seek',
                                'meta_descrip'  =>  'Share blood and save life. Share blood around you who seeks for. Your blood can save a life and spread joys around.'
                            );
        }elseif($this->session->userdata('lang')=='bn'){
            $sessArr    = array(
                                'title'         =>  'রক্ত দাও এবং জীবন বাচাও - রক্ত খুজুন',
                                'meta_descrip'  =>  'রক্ত দিন এবং জীবন বাচান। প্রয়জনের ব্যক্তিকে রক্ত দান করুন। আপনার রক্ত একজনের জীবন বাচাতে পারে এবং ছড়াতে পারে অনাবিল আনন্দ।'
                            );
        }
        $this->session->set_userdata($sessArr);
		$this->load->view('header');
		$this->load->view('welcome_message');
		$this->load->view('footer');
	}

    function uservaliditycheck(){
	    $field  = $this->input->post('field');
        $val  = $this->input->post('val');

        $check  = $this->blood_model->tableSingleDataCheck('user', 'u_id', $field, $val);
        if(!empty($check) && $check != ""){
            print "S";
        }else{
            print "F";
        }
    }

    function life(){
        if($this->session->userdata('lang')=='en'){
            $sessArr    = array(
                'title'         =>  'Know more about blood - Blood Seek',
                'meta_descrip'  =>  'Share blood and save life. Share blood around you who seeks for. Your blood can save a life and spread joys around.'
            );
        }elseif($this->session->userdata('lang')=='bn'){
            $sessArr    = array(
                'title'         =>  'রক্ত সম্পর্কে ও রক্ত নিয়ে আরো জানুন - রক্ত খুজুন',
                'meta_descrip'  =>  'রক্ত দিন এবং জীবন বাচান। প্রয়জনের ব্যক্তিকে রক্ত দান করুন। আপনার রক্ত একজনের জীবন বাচাতে পারে এবং ছড়াতে পারে অনাবিল আনন্দ।'
            );
        }
        $this->session->set_userdata($sessArr);
        $this->load->view('header');
        $this->load->view('blood_life');
        $this->load->view('footer');
    }

}
