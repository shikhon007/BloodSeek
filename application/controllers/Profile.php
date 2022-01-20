<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Base_controller{

    function __construct(){
        parent::__construct();
    }

    public function index(){
        $lang   = $this->session->userdata('lang');
        $sessArr = array();
        if($this->session->userdata('u_id') != ""){
            if($lang == 'en'){
                $sessArr    = array(
                    'title'     =>  'Blood Book User Profile - '.$this->session->userdata('name')
                );
            }elseif($lang == 'bn'){
                $sessArr    = array(
                    'title'     =>  'আপনার প্রোফাইলে আপনাকে স্বাগতম - '.$this->session->userdata('name')
                );
            }
        }else{
            if($lang == 'en'){
                $sessArr    = array(
                    'title'     =>  'Login to Your Profile - Blood Seek'
                );
            }elseif($lang == 'bn'){
                $sessArr    = array(
                    'title'     =>  'আপনার প্রোফাইলে লগইন করুন - রক্ত খুজুন'
                );
            }
        }
        $this->session->set_userdata($sessArr);
        $this->load->view('header');
        $this->load->view('user_profile');
        $this->load->view('footer');
    }

    function register(){
        if($this->session->userdata('lang') == 'en'){
            $sessArr    = array(
                'title'     =>  'Create Your New Account - Blood Seek'
            );
        }elseif($this->session->userdata('lang') == 'bn'){
            $sessArr    = array(
                'title'     =>  'নতুন ব্যবহারকারী হিসেবে নিজেকে নিবন্ধন করুন - রক্ত খুজুন'
            );
        }
        $this->session->set_userdata($sessArr);
        $this->load->view('header');
        $this->load->view('registration');
        $this->load->view('footer');
    }

    function login(){
        $pm     = $this->input->post('pmval');
        $pass   = $this->input->post('pass');
        $field  = $this->input->post('field');

        $selArr     = array('u_id', 'first_name', 'phone', 'email', 'password', 'state', 'token');
        $chckArr    = array(
            $field      =>  $pm,
            'status'    =>  1
        );
        //print_r($chckArr);exit;
        $check  = $this->blood_model->tableMultipleDataCheck('user', $selArr, $chckArr);
        if(!empty($check) && $check != ""){
            $password   = $check->password;
            $cpassword  = md5($check->token.$pass);
            if($password == $cpassword){
                $sessArr    = array(
                    'u_id'      =>  $check->u_id,
                    'name'      =>  $check->first_name,
                    'phone'     =>  $check->phone,
                    'email'     =>  $check->email,
                    'state'     =>  $check->state
                );
                $this->session->set_userdata($sessArr);
            }else{
                print 'F';
            }
        }else{
            print "F";
        }
    }

    function img_upload(){
        $type           = $this->input->post('type');
        $upload_path    = '';
        $width          = 0;
        if($type == 'profile'){
            $upload_path    = profile_url();
            $width          = 102;
        }elseif($type == 'voter_font' || $type == 'voter_back'){
            $upload_path    = voterid_url();
            $width          = 220;
        }

        $config['upload_path']      = $upload_path;
        $config['allowed_types']    = 'gif|jpg|png';
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }else{
            $data = array('upload_data' => $this->upload->data());
            foreach ($data as $value){
                print_r($value['file_name']);
                $config['image_library'] = 'gd2';
                $config['source_image'] = $value['full_path'];
                $config['maintain_ratio'] = TRUE;
                $config['width']     = $width;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                if($type == 'profile'){
                    $updArr     = array(
                        'image'     =>  $value['file_name']
                    );
                }elseif($type == 'voter_font'){
                    $updArr     = array(
                        'voter_font'     =>  $value['file_name']
                    );
                }elseif($type == 'voter_back'){
                    $updArr     = array(
                        'voter_back'     =>  $value['file_name']
                    );
                }
                $this->blood_model->updateDataSingleTable('user', $updArr, 'u_id', $this->session->userdata('u_id'));
            }
        }
    }

    function registration(){
        $fName      = $this->input->post('fName');
        $lName      = $this->input->post('lName');
        $phone      = $this->input->post('phone');
        $email      = $this->input->post('email');
        $pass       = $this->input->post('password');
        $bod        = $this->input->post('bod');
        $service    = $this->input->post('service');
        $bGroup     = $this->input->post('bGroup');
        $gender     = $this->input->post('gender');
        $address    = $this->input->post('address');
        $city       = $this->input->post('city');
        $area       = $this->input->post('area');
        $country    = $this->input->post('country');
        $postCode   = $this->input->post('postCode');

        $token      = rand(10101010, 99999999);

        $regArr     = array(
                            'first_name'        =>  $fName,
                            'last_name'         =>  $lName,
                            'phone'             =>  $phone,
                            'email'             =>  $email,
                            'password'          =>  md5($token.$pass),
                            'blood'             =>  $bGroup,
                            'gender'            =>  $gender,
                            'bod'               =>  $bod,
                            'address'           =>  $address,
                            'area'              =>  $area,
                            'city'              =>  $city,
                            'post_code'         =>  $postCode,
                            'country'           =>  $country,
                            'service'           =>  $service,
                            'state'             =>  'A',
                            'status'            =>  1,
                            'token'             =>  $token,
                            'createDate'        =>  date('Y-m-d H:i:s')
                        );
        //$check          = true;
        $check 		= $this->blood_model->insertTableData('user', $regArr);
        if($check == 1){
            if($this->session->userdata('lang') == 'en'){
                print "Failed||alert-danger||<strong>Success!</strong>User Registered Successfully";
            }elseif($this->session->userdata('lang') == 'bn'){
                print "Success||alert-success||<strong>সফল!</strong>ব্যবহারকারীর নিবন্ধন সফল হয়েছে";
            }
            $selArr     = array('u_id');
            $check      = array(
                'phone'    =>  $phone,
                'email'     =>  $email
            );
            $userId     = $this->blood_model->getDataMultipleCheck('user', $selArr, $check);
            $sessArr 	= array(
                'u_id'      =>  $userId->u_id,
                'name'		=>	$fName,
                'phone'     =>  $phone,
                'email'     =>  $email,
                'state'     =>  'A'
            );
            $this->session->set_userdata($sessArr);
        }else{
            if($this->session->userdata('lang') == 'en'){
                print "Failed||alert-danger||<strong>Failed!</strong>User Registration Failed";
            }elseif($this->session->userdata('lang') == 'bn'){
                print "Failed||alert-danger||<strong>দুঃখিত!</strong>ব্যবহারকারীর নিবন্ধন ব্যর্থ";
            }
        }
    }

    function update_info(){
        $fName      = $this->input->post('fName');
        $lName      = $this->input->post('lName');
        $phone      = $this->input->post('phone');
        $email      = $this->input->post('email');
        $o_phone    = $this->input->post('o_phone');
        $o_email    = $this->input->post('o_email');
        $bod        = $this->input->post('bod');
        $nid        = $this->input->post('v_id');
        $bGroup     = $this->input->post('bGroup');
        $gender     = $this->input->post('gender');
        $address    = $this->input->post('address');
        $city       = $this->input->post('city');
        $area       = $this->input->post('area');
        $post_code  = $this->input->post('postCode');
        $country    = $this->input->post('country');
        $institute  = $this->input->post('institute');
        $service    = $this->input->post('service');
        $weekend    = $this->input->post('weekend');

        $updArr     = array(
                            'first_name'    =>  $fName,
                            'last_name'     =>  $lName,
                            'phone'         =>  $phone,
                            'email'         =>  $email,
                            'o_phone'       =>  $o_phone,
                            'o_email'       =>  $o_email,
                            'blood'         =>  $bGroup,
                            'gender'        =>  $gender,
                            'bod'           =>  $bod,
                            'voter_id'      =>  $nid,
                            'address'       =>  $address,
                            'area'          =>  $area,
                            'city'          =>  $city,
                            'post_code'     =>  $post_code,
                            'country'       =>  $country,
                            'service'       =>  $service,
                            'institute'     =>  $institute,
                            'weekend'       =>  $weekend,
                            'state'         =>  'A',
                            'modifyDate'    =>  date('Y-m-d H:i:s')
                        );
        $chkArr     = array(
                            'u_id'  =>  $this->session->userdata('u_id'),
                            'phone' =>  $this->session->userdata('phone')
                        );
        $check  = $this->blood_model->updateTableInfoCheck('user', $updArr, $chkArr);
        if($check == 1){
            print 'S';
            $sessArr    = array(
                                'email'     =>  $email,
                                'state'     =>  'A'
                            );
            $this->session->set_userdata($sessArr);
        }else{
            print 'F';
        }
    }

    function password(){
        $data['type']   = $this->uri->segment(3);
        if($data['type'] == 'reset'){
            if($this->session->userdata('lang') == 'en'){
                $sessArr    = array(
                    'title'     =>  'Reset Your Password - Blood Seek'
                );
            }elseif($this->session->userdata('lang') == 'bn'){
                $sessArr    = array(
                    'title'     =>  'আপনার পাসওয়ার্ড পরিবর্তন করুন - রক্ত খুজুন'
                );
            }
        }else if($data['type'] == 'forget'){
            if($this->session->userdata('lang') == 'en'){
                $sessArr    = array(
                    'title'     =>  'Forget Your Password? - Blood Seek'
                );
            }elseif($this->session->userdata('lang') == 'bn'){
                $sessArr    = array(
                    'title'     =>  'আপনার পাসওয়ার্ড ভুলে গেছেন? - রক্ত খুজুন'
                );
            }
        }
        $this->session->set_userdata($sessArr);
        $this->load->view('header');
        $this->load->view('password', $data);
        $this->load->view('footer');
    }

    function update(){
        $data['u_id']   = $this->uri->segment(3);
        if($this->session->userdata('lang') == 'en'){
            $sessArr    = array(
                'title'     =>  'Update Profile Information - Blood Seek'
            );
        }elseif($this->session->userdata('lang') == 'bn'){
            $sessArr    = array(
                'title'     =>  'আপনার প্রোফাইলের তথ্য পরিবর্তন করুন - রক্ত খুজুন'
            );
        }
        $this->session->set_userdata($sessArr);
        $this->load->view('header');
        $this->load->view('update_info', $data);
        $this->load->view('footer');
    }

    function logout(){
        $sessArr 	= array(
            'u_id'      =>  '',
            'name'		=>	'',
            'phone'     =>  '',
            'email'     =>  '',
            'state'     =>  ''
        );
        $this->session->set_userdata($sessArr);
        redirect('profile');
    }
}