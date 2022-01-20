<?php
    $lang   = $this->session->userdata('lang');
?>
<div class="container-fluid profile-body">
    <div class="col-md-12 ccol-xs-12 col-sm-12 col-lg-12">
        <?php
            $selArr     = array('first_name', 'last_name', 'email', 'o_phone', 'o_email', 'blood', 'gender', 'bod', 'image', 'voter_font', 'voter_back', 'voter_id', 'area', 'city', 'post_code', 'country', 'address', 'service', 'institute', 'weekend', 'state');
            $chckArr    = array(
                'u_id'  =>  $u_id
            );
            $details    = $this->blood_model->tableMultipleDataCheck('user', $selArr, $chckArr);
        ?>
        <div class="info-panel">
            <div class="info-head">
                <h3>Information Update</h3>
            </div>
            <div class="info-body">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="info-image">
                        <div class="image-load">
                            <?php
                            if($details->image == ""){
                                ?>
                                <img alt="Profile Icon" src="<?=icon_url()?>profile.png"/>
                                <?php
                            }else{
                                ?>
                                <img alt="Profile Image" src="<?=image_url().'profile/'.$details->image?>"/>
                                <?php
                            }
                            ?>
                            <div class="spin-field">
                                <span class="spinner"><i class="fa fa-spinner animate"></i></span>
                            </div>
                        </div>
                        <div class="image-upload">
                            <div class="image-preview-input">
                                <span class="image-preview-input-title"><?php if($lang=='en'){echo 'Choose Profile';}elseif($lang=='bn'){echo 'ছবি নির্বাচন';}?></span>
                                <input type="file" id="profile" name="input-file-preview"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="voter-img">
                        <div class="voter-front-image">
                            <div class="image-load">
                                <?php
                                if($details->voter_font == ""){
                                    ?>
                                    <img alt="Voter Front Icon" src="<?=icon_url()?>voter.png"/>
                                    <?php
                                }else{
                                    ?>
                                    <img alt="Voter Front ID" src="<?=image_url().'voterid/'.$details->voter_font?>"/>
                                    <?php
                                }
                                ?>
                                <div class="vot-spin-field">
                                    <span class="spinner"><i class="fa fa-spinner animate"></i></span>
                                </div>
                            </div>
                            <div class="voter-image-upload">
                                <div class="image-preview-input">
                                    <span class="image-preview-input-title"><?php if($lang=='en'){echo 'Voter ID Front';}elseif($lang=='bn'){echo 'আইডি সম্মুখ অংশ';}?></span>
                                    <input type="file" id="voter-front" name="input-file-preview"/>
                                </div>
                            </div>
                        </div>
                        <div class="voter-back-image">
                            <div class="image-load">
                                <?php
                                if($details->voter_back == ""){
                                    ?>
                                    <img alt="Voter Back Icon" src="<?=icon_url()?>voter.png"/>
                                    <?php
                                }else{
                                    ?>
                                    <img alt="Voter Back ID" src="<?=image_url().'voterid/'.$details->voter_back?>"/>
                                    <?php
                                }
                                ?>
                                <div class="vot-spin-field">
                                    <span class="spinner"><i class="fa fa-spinner animate"></i></span>
                                </div>
                            </div>
                            <div class="voter-image-upload">
                                <div class="image-preview-input">
                                    <span class="image-preview-input-title"><?php if($lang=='en'){echo 'Voter ID Front';}elseif($lang=='bn'){echo 'আইডি পেছন অংশ';}?></span>
                                    <input type="file" id="voter-back" name="input-file-preview"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="upd_info" value="<?=$details->first_name?>" placeholder="<?php if($lang=='en'){echo 'First Name';}elseif($lang=='bn'){echo 'নামের প্রথম অংশ';}?>" id="fName">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="upd_info" value="<?=$details->last_name?>" placeholder="<?php if($lang=='en'){echo 'Last Name';}elseif($lang=='bn'){echo 'নামের শেষ অংশ';}?>" id="lName">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="upd_info" value="<?=$this->session->userdata('phone')?>" placeholder="<?php if($lang=='en'){echo 'Phone Number';}elseif($lang=='bn'){echo 'মোবাইল নম্বর';}?>" id="phone" disabled>
                            <span class="spinner"><i class="fa fa-spinner animate"></i></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="email" class="form-control" name="upd_info" value="<?=$details->email?>" placeholder="<?php if($lang=='en'){echo 'E-mail';}elseif($lang=='bn'){echo 'ই-মেইল';}?>" id="email">
                            <span class="spinner"><i class="fa fa-spinner animate"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="upd_info" value="<?=$details->o_phone?>" placeholder="<?php if($lang=='en'){echo 'Phone Number (Optional)';}elseif($lang=='bn'){echo 'মোবাইল নম্বর (অতিরিক্ত)';}?>" id="o_phone">
                            <span class="spinner"><i class="fa fa-spinner animate"></i></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="email" class="form-control" name="upd_info" value="<?=$details->o_phone?>" placeholder="<?php if($lang=='en'){echo 'E-mail (Optional)';}elseif($lang=='bn'){echo 'ই-মেইল (অতিরিক্ত)';}?>" id="o_email">
                            <span class="spinner"><i class="fa fa-spinner animate"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="date" class="form-control" value="<?=$details->bod?>" name="upd_info" placeholder="<?php if($lang=='en'){echo 'Date of Birth';}elseif($lang=='bn'){echo 'জন্ম তারিখ';}?>" id="bod">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" name="upd_info" class="form-control" value="<?=$details->voter_id?>" id="v_id" placeholder="<?php if($lang=='en'){echo 'Voter ID';}elseif($lang=='bn'){echo 'আইডি নং';}?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                        <div class="form-group">
                            <select name="upd_info" class="form-control" id="bGroup">
                                <option value=""><?php if($lang=='en'){echo 'Blood Group';}elseif($lang=='bn'){echo 'রক্তের গ্রুপ';}?></option>
                                <?php
                                $selArr     = array('b_id', 'name');
                                $chckArr    = array('lang'  =>  $lang, 'status'=>1);
                                $bloods     =   $this->blood_model->tableMultipleDataMultipleCheck('blood', $selArr, $chckArr);
                                foreach ($bloods as $blood) {
                                    if($blood->b_id == $details->blood){
                                        ?>
                                        <option value="<?=$blood->b_id?>" selected><?=$blood->name?></option>
                                        <?php
                                    }else{
                                        ?>
                                        <option value="<?=$blood->b_id?>"><?=$blood->name?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                        <div class="form-group">
                            <select name="upd_info" class="form-control" id="gender">
                                <option value=""><?php if($lang=='en'){echo 'Select Gender';}elseif($lang=='bn'){echo 'লিঙ্গ';}?></option>
                                <?php
                                $selArr     = array('g_id', 'name');
                                $chckArr    = array('lang'  =>  $lang, 'status'=>1);
                                $genders    =   $this->blood_model->tableMultipleDataMultipleCheck('gender', $selArr, $chckArr);
                                foreach ($genders as $gender) {
                                    if($gender->g_id == $details->gender){
                                        ?>
                                        <option value="<?=$gender->g_id?>" selected><?=$gender->name?></option>
                                        <?php
                                    }else{
                                        ?>
                                        <option value="<?=$gender->g_id?>"><?=$gender->name?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="form-group">
                        <input type="text" name="upd_info" class="form-control" id="address" value="<?=$details->address?>" placeholder="<?php if($lang=='en'){echo 'Address (Ex. Flat No, House No, Road No)';}elseif($lang=='bn'){echo 'ঠিকানা (যেমনঃ ফ্ল্যাট নং, বাড়ী নং, রোড নং)';}?>">
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                        <div class="form-group">
                            <select class="form-control" name="upd_info" id="country">
                                <option value=""><?php if($lang=='en'){echo 'Select Country';}elseif($lang=='bn'){echo 'দেশ';}?></option>
                                <?php
                                $selArr        = array('count_id', 'name');
                                $chckArr       = array('lang'=>$lang, 'status'=>'1');
                                $countries     = $this->blood_model->tableMultipleDataMultipleCheck('country', $selArr, $chckArr);
                                foreach ($countries as $country) {
                                    if($details->country == $country->count_id){
                                        echo '<option value="'.$country->count_id.'" selected>'.$country->name.'</option>';
                                    }else{
                                        echo '<option value="'.$country->count_id.'">'.$country->name.'</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                        <div class="form-group">
                            <select class="form-control" name="upd_info" id="city" alt="<?=$lang?>">
                                <option value=""><?php if($lang=='en'){echo 'Select City';}elseif($lang=='bn'){echo 'শহর';}?></option>
                                <?php
                                if($details->city != ""){
                                    $selArr     = array('cit_id', 'name');
                                    $chckArr    = array('count_id'=>$details->country, 'lang'=>$lang, 'status'=>'1');
                                    $cities       = $this->blood_model->tableMultipleDataMultipleCheck('city', $selArr, $chckArr);
                                    foreach ($cities as $city) {
                                        if($details->city == $city->cit_id){
                                            echo '<option value="'.$city->cit_id.'" selected>'.$city->name.'</option>';
                                        }else{
                                            echo '<option value="'.$city->cit_id.'">'.$city->name.'</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                        <div class="form-group">
                            <select class="form-control" name="upd_info" id="area" alt="<?=$lang?>">
                                <option value=""><?php if($lang=='en'){echo 'Select Area';}elseif($lang=='bn'){echo 'এলাকা';}?></option>
                                <?php
                                if($details->area != ""){
                                    $selArr     = array('ara_id', 'name');
                                    $chckArr    = array('cit_id'=>$details->city, 'lang'=>$lang, 'status'=>'1');
                                    $areas       =  $this->blood_model->tableMultipleDataMultipleCheck('area', $selArr, $chckArr);
                                    foreach ($areas as $area) {
                                        if($details->area == $area->ara_id){
                                            echo '<option value="'.$area->ara_id.'" selected>'.$area->name.'</option>';
                                        }else{
                                            echo '<option value="'.$area->ara_id.'">'.$area->name.'</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" id="postCode" name="upd_info" value="<?=$details->post_code?>" class="form-control" placeholder="<?php if($lang=='en'){echo 'Post Code';}elseif($lang=='bn'){echo 'পোস্ট কোড';}?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="form-group">
                        <input type="text" id="institute" name="upd_info" class="form-control" value="<?=$details->institute?>" placeholder="<?php if($lang=='en'){echo 'Institute Name';}elseif($lang=='bn'){echo 'প্রতিষ্ঠানের নাম';}?>">
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                        <div class="form-group">
                            <select id="service" name="upd_info" class="form-control">
                                <option value=""><?php if($lang=='en'){echo 'Profession/Service';}elseif($lang=='bn'){echo 'পেশা';}?></option>
                                <?php
                                $selArr     = array('serv_id', 'name');
                                $chckArr    = array('lang'=>$lang,'status'=>'1');
                                $services   = $this->blood_model->tableMultipleDataMultipleCheckOrderBY('service', $selArr, $chckArr, 'name', 'ASC');
                                foreach ($services as $service){
                                    if($service->serv_id == $details->service){
                                        echo '<option value="'.$service->serv_id.'" selected>'.$service->name.'</option>';
                                    }else{
                                        echo '<option value="'.$service->serv_id.'">'.$service->name.'</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" id="weekend" name="upd_info" class="form-control" value="<?=$details->weekend?>" placeholder="<?php if($lang=='en'){echo 'Weekend (Ex. Fri, Sat)';}elseif($lang=='bn'){echo 'ছুটির দিন (যেমনঃ শুক্র, শনি)';}?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-footer">
                <input type="button" id="upd-info" value="<?php if($lang=='en'){echo 'Update Info';}elseif($lang=='bn'){echo 'তথ্য হালনাগাদ';}?>">
            </div>
        </div>
    </div>
</div>