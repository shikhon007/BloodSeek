<?php
class Donor extends Base_controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        $ip             = $this->getUserIpAddr();
        $geopluginURL   = 'http://www.geoplugin.net/php.gp?ip=45.127.249.149';
        $addrDetailsArr = unserialize(file_get_contents($geopluginURL));
        $data['city']   = $addrDetailsArr['geoplugin_city'];

        if($this->session->userdata('lang')=='en'){
            $sessArr    = array(
                'title'     =>  'Find your blood - Blood Book'
            );
        }elseif($this->session->userdata('lang')=='bn'){
            $sessArr    = array(
                'title'     =>  'প্রয়োজনীয় রক্ত খুজুন - Blood Book'
            );
        }
        $this->session->set_userdata($sessArr);
        $this->load->view('header');
        $this->load->view('bloodbook', $data);
        $this->load->view('footer');
    }

    function regDonor(){
        $fname 		= $this->input->post('fName');
        $lname 		= $this->input->post('lName');
        $phone 		= $this->input->post('phone');
        $email 		= $this->input->post('email');
        $pass 		= $this->input->post('pass');
        $bgroup 	= $this->input->post('bg');
        $gender 	= $this->input->post('gender');
        $country 	= $this->input->post('country');
        $city 	    = $this->input->post('city');
        $area 	    = $this->input->post('area');

        $token      = rand(10101010, 99999999);

        $newUser 	= array(
            'first_name'	=>	$fname,
            'last_name'     =>  $lname,
            'phone'		    =>	$phone,
            'email'			=>	$email,
            'password'		=>	md5($token.$pass),
            'blood'			=>	$bgroup,
            'gender'		=>	$gender,
            'country'       =>  $country,
            'city'          =>  $city,
            'area'          =>  $area,
            'state'			=>	'A',
            'status'		=>	'1',
            'token'         =>  $token,
            'createDate'	=>	date('Y-m-d H:i:s')
        );
        //$check = true;
        $check 		= $this->blood_model->insertTableData('user', $newUser);
        if($check == 1){
            print "Success||alert-success||<strong>Success!</strong>User Registered successfully";
            $selArr     = array('u_id');
            $check      = array(
                'phone'    =>  $phone,
                'email'     =>  $email
            );
            $userId     = $this->blood_model->getDataMultipleCheck('user', $selArr, $check);
            $sessArr 	= array(
                'u_id'      =>  $userId->u_id,
                'name'		=>	$fname." ".$lname,
                'phone'     =>  $phone,
                'email'     =>  $email,
                'state'     =>  'A'
            );
            $this->session->set_userdata($sessArr);
        }else{
            print "Failed||alert-danger||<strong>Failed!</strong>User Registration Failed";
        }
    }

    function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    function donorDetails(){
        $uid    = $this->input->post('u_id');
        $lang   = $this->input->post('lang');

?>
        <div class="donor-details-panel">
            <div class="donor-details-field">
                <div class="donor-panel-head">
                    <div class="donor-id">
                        <h4>User ID: 100213574</h4>
                        <span id="close-donor"><img src="<?=icon_url()?>close.png"></span>
                    </div>
                    <div class="donor-profile">
                        <img src="<?=icon_url()?>profile.png">
                    </div>
                </div>
                <div class="donor-panel-body">
                    <div class="donor-body-details">
                        <p><label>Blood Group : </label><span>AB+</span></p>
                        <p><label>Name : </label><span>MD. Rakibul Hasan</span></p>
                        <p><label>Area : </label><span>Adabor</span></p>
                        <p><label>City : </label><span>Dhaka</span></p>
                        <p><label>Profession : </label><span>Business</span></p>
                        <p><label>E-mail : </label><span>rakibhssn90@gmail.com</span></p>
                        <p><label>Weekend : </label><span>Friday, Satday</span></p>
                        <p><label>Last Donationn Date : </label><span>19th Mar, 2019</span></p>
                    </div>
                </div>
                <div class="donor-panel-footer">
                    <div class="donor-contact-action">
                        <a href="sms:01739171768?body=From%20Blood%20Book,%0a"><img src="<?=icon_url()?>sms.png"></a>
                        <a href="tel:01739171768"><img src="<?=icon_url()?>call.png"></a>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}