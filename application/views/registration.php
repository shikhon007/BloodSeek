<?php
    $lang   = $this->session->userdata('lang');
?>
<div class="register-panel">
    <div class="register-field">
        <h3><?php if($lang=='en'){echo 'New Account';}elseif($lang=='bn'){echo 'নতুন অ্যাকাউন্ট';}?></h3>
        <h5><?php if($lang=='en'){echo 'Give blood, Take blood & Save life';}elseif($lang=='bn'){echo 'রক্ত দাও, রক্ত নাও এবং জীবন বাচাও';}?></h5>
        <div class="new-account-create-box">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <input type="text" placeholder="<?php if($lang=='en'){echo 'First Name';}elseif($lang=='bn'){echo 'নামের প্রথম অংশ';}?>" id="fName">
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <input type="text" placeholder="<?php if($lang=='en'){echo 'Last Name';}elseif($lang=='bn'){echo 'নামের শেষ অংশ';}?>" id="lName">
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <input type="text" placeholder="<?php if($lang=='en'){echo 'Phone Number';}elseif($lang=='bn'){echo 'মোবাইল নম্বর';}?>" id="phone">
                    <span class="spinner"><i class="fa fa-spinner animate"></i></span>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <input type="email" placeholder="<?php if($lang=='en'){echo 'E-mail';}elseif($lang=='bn'){echo 'ই-মেইল';}?>" id="email">
                    <span class="spinner"><i class="fa fa-spinner animate"></i></span>
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <input type="password" placeholder="<?php if($lang=='en'){echo 'Password';}elseif($lang=='bn'){echo 'পাসোয়ার্ড';}?>" id="password">
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <input type="password" placeholder="<?php if($lang=='en'){echo 'Confirm Password';}elseif($lang=='bn'){echo 'পাসওয়ার্ড নিশ্চিতকরণ';}?>" id="cPassword">
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <input type="date" placeholder="<?php if($lang=='en'){echo 'Date of Birth';}elseif($lang=='bn'){echo 'জন্ম তারিখ';}?>" id="bod">
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <select id="service">
                        <option value=""><?php if($lang=='en'){echo 'Profession/Service';}elseif($lang=='bn'){echo 'পেশা';}?></option>
                        <?php
                            $selArr     = array('serv_id', 'name');
                            $chckArr    = array('lang'=>$lang,'status'=>'1');
                            $services   = $this->blood_model->tableMultipleDataMultipleCheckOrderBY('service', $selArr, $chckArr, 'name', 'ASC');
                            foreach ($services as $service){
                                echo '<option value="'.$service->serv_id.'">'.$service->name.'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <select id="bGroup">
                        <option value=""><?php if($lang=='en'){echo 'Blood Group';}elseif($lang=='bn'){echo 'রক্তের গ্রুপ';}?></option>
                        <?php
                        $selArr     = array('b_id', 'name');
                        $chckArr    = array('lang'  =>  $lang, 'status'=>1);
                        $bloods     =   $this->blood_model->tableMultipleDataMultipleCheck('blood', $selArr, $chckArr);
                        foreach ($bloods as $blood) {
                            ?>
                            <option value="<?=$blood->b_id?>"><?=$blood->name?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <select id="gender">
                        <option value=""><?php if($lang=='en'){echo 'Select Gender';}elseif($lang=='bn'){echo 'লিঙ্গ';}?></option>
                        <?php
                        $selArr     = array('g_id', 'name');
                        $chckArr    = array('lang'  =>  $lang, 'status'=>1);
                        $bloods     =   $this->blood_model->tableMultipleDataMultipleCheck('gender', $selArr, $chckArr);
                        foreach ($bloods as $blood) {
                            ?>
                            <option value="<?=$blood->g_id?>"><?=$blood->name?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <input type="text" placeholder="<?php if($lang=='en'){echo 'Address (Ex. Flat No, House No, Road No)';}elseif($lang=='bn'){echo 'ঠিকানা (যেমনঃ ফ্ল্যাট নং, বাড়ী নং, রোড নং)';}?>" id="address">
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <select id="country" alt="<?=$lang?>">
                        <option value=""><?php if($lang=='en'){echo 'Select Country';}elseif($lang=='bn'){echo 'দেশ';}?></option>
                        <?php
                        $selArr     =   array('count_id', 'name');
                        $chckArr    =   array('lang'=>$lang, 'status'=>'1');
                        $areas      =   $this->blood_model->tableMultipleDataMultipleCheck('country', $selArr, $chckArr);
                        foreach ($areas as $area){
                            echo '<option value="'.$area->count_id.'">'.$area->name.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <select id="city" alt="<?=$lang?>">
                        <option value=""><?php if($lang=='en'){echo 'Select City';}elseif($lang=='bn'){echo 'শহর';}?></option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <select id="area" alt="<?=$lang?>">
                        <option value=""><?php if($lang=='en'){echo 'Select Area';}elseif($lang=='bn'){echo 'এলাকা';}?></option>
                    </select>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <input type="text" placeholder="<?php if($lang=='en'){echo 'Postal Code';}elseif($lang=='bn'){echo 'পোস্ট কোড';}?>" id="postCode">
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <input type="button" value="<?php if($lang=='en'){echo 'Create Account';}elseif($lang=='bn'){echo 'নতুন অ্যাকাউন্ট';}?>" id="register">
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <p class="notice"><?php if($lang=='en'){echo '** All data keeps secret except contacts info thats are not problem at all.';}elseif($lang=='bn'){echo '** সব ধরনের তথ্য গোপন রাখা হয় শুধু যোগাযোগ তথ্য ব্যতীত যা সমস্যা করবে না ব্যবহারকারীকে ।';}?></p>
            </div>
        </div>
    </div>
</div>