<?php
    defined('BASEPATH') or die("Unable to load script automatically");

    class Basic extends Base_controller{
        function __construct(){
            parent::__construct();
        }

        function checkCity(){
            $lang       = $this->input->post('lang');
            $count_id   = $this->input->post('cid');

            $selArr     = array('cit_id', 'name');
            $chckArr    = array('count_id'=>$count_id, 'lang'=>$lang, 'status'=>'1');
            $cities     = $this->blood_model->tableMultipleDataMultipleCheck('city', $selArr, $chckArr);
?>
            <option value=""><?php if($lang=='en'){echo 'Select City';}elseif($lang=='bn'){echo 'শহর';}?></option>
<?php
            foreach ($cities as $citi){
                echo '<option value="'.$citi->cit_id.'">'.$citi->name.'</option>';
            }
        }

        function checkArea(){
            $lang       = $this->input->post('lang');
            $cit_id     = $this->input->post('cid');

            $selArr     = array('ara_id', 'name');
            $chckArr    = array('cit_id'=>$cit_id, 'lang'=>$lang, 'status'=>'1');
            $areas      = $this->blood_model->tableMultipleDataMultipleCheck('area', $selArr, $chckArr);
?>
            <option value=""><?php if($lang=='en'){echo 'Select Area';}elseif($lang=='bn'){echo 'এলাকা';}?></option>
<?php
            foreach ($areas as $area){
                echo '<option value="'.$area->ara_id.'">'.$area->name.'</option>';
            }
        }

        function searchCountryBlood(){
            $lang       = $this->input->post('lang');
            $cout_id    = $this->input->post('cid');

            $selArr     = array('first_name', 'last_name', 'phone', 'blood', 'area', 'city');
            $chckArr    = array('country'=>$cout_id, 'status'=>'1');
            $bloodLists = $this->blood_model->tableMultipleDataMultipleCheck('user', $selArr, $chckArr);
            foreach ($bloodLists as $bloodList){
?>
                 
<?php
            }
        }

        function checkcurrent_password(){
            $pass   = $this->input->post('pass');
            $id     = $this->session->userdata('u_id');

            $checks = $this->blood_model->tableMultipleDataCheck('user', array('password', 'token'), array('u_id'=>$id));
            if($checks->password == md5($checks->token.$pass)){
                print 'S';
            }else{
                print 'F';
            }
        }

        function reset_pass(){
            $pass   = $this->input->post('pass');
            $id     = $this->session->userdata('u_id');
            $checks = $this->blood_model->tableMultipleDataCheck('user', array('password', 'token'), array('u_id'=>$id));
            $check  = $this->blood_model->updateTableInfoCheck('user', array('password'=>md5($checks->token.$pass), 'last_pass'=>$checks->password), array('u_id'=>$id));
            if($check == 1){
                print 'S';
            }else{
                print 'F';
            }
        }

        function searchForDonor(){
            $co_id  = $this->input->post('co_id');
            $ci_id  = $this->input->post('ci_id');
            $a_id   = $this->input->post('a_id');
            $b_id   = $this->input->post('b_id');
            $lang   = $this->input->post('lang');

            $str    = '';
            if($co_id != ""){
                $str    = $str."co.count_id = '".$co_id."' AND ";
            }
            if($ci_id != ""){
                $str    = $str."ci.cit_id = '".$ci_id."' AND ";
            }
            if($a_id != ""){
                $str    = $str."a.ara_id = '".$a_id."' AND ";
            }
            if($b_id != ""){
                $str    = $str."b.b_id = '".$b_id."' AND";
            }

            $users  = $this->blood_model->getDataByTableQuery("SELECT u.u_id as u_id, b.name as b_name, a.name as a_name, co.name as co_name, ci.name as ci_name, s.name as s_name, bb.last_donate_date as donate_date FROM user as u, blood as b, country as co, city as ci, area as a, service as s, blood_bank as bb WHERE u.status = '1' AND u.state = 'A' AND b.b_id = u.blood AND co.count_id = u.country AND ci.cit_id = u.city AND ".$str." a.ara_id = u.area AND s.serv_id = u.service AND b.lang = '".$lang."' AND ci.lang = '".$lang."' AND co.lang = '".$lang."' AND a.lang = '".$lang."' AND s.lang = '".$lang."' ORDER BY u.u_id LIMIT 50");
            foreach ($users as $user){
                $startTimeStamp = strtotime(date('Y-m-d'));
                $endTimeStamp = strtotime($user->donate_date);
                $timeDiff = abs($endTimeStamp - $startTimeStamp);
                $numberDays = $timeDiff/86400;
                ?>
                <div class="blood-donor-info-box" id="<?=$user->u_id?>">
                    <p id="1"><label><?php if($lang=='en'){echo 'Blood Group';}elseif($lang=='bn'){echo 'রক্তের গ্রুপ';}?> : </label> <span><?=$user->b_name?></span></p>
                    <p id="1"><label><?php if($lang=='en'){echo 'Area';}elseif($lang=='bn'){echo 'এলাকা';}?> : </label> <span><?=$user->a_name?></span></p>
                    <p id="1"><label><?php if($lang=='en'){echo 'City';}elseif($lang=='bn'){echo 'শহর';}?> : </label> <span><?=$user->ci_name?></span></p>
                    <p id="1"><label><?php if($lang=='en'){echo 'Profession';}elseif($lang=='bn'){echo 'পেশা';}?> : </label> <span><?=$user->s_name?></span></p>
                    <p id="1"><label><?php if($lang=='en'){echo 'Last Donation';}elseif($lang=='bn'){echo 'সর্বশেষ রক্তদান';}?> : </label> <span><?=$numberDays?> Days(<?=$user->donate_date?>)</span></p>
                </div>
<?php
            }
        }
    }