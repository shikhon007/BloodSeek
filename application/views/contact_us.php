<?php
    $lang   = $this->session->userdata('lang');
?>
<div class="container-fluid contact-body">
    <div class="contact-panel">
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
               <div class="row-eq-height">
            <div class="col-md-8 col-xs-12 col-sm-8 col-lg-8">
                <div class="contact-input-field">
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 contact-icon-field">
                        <h4><?php if($lang=='en'){echo 'Send Us a Message';}elseif($lang=='bn'){echo 'আপনার মন্তব্য দিয়ে যোগাযোগ করুন';}?></h4>
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                        <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                            <input type="text" placeholder="<?php if($lang == 'en'){ echo 'First Name';}elseif($lang == 'bn'){ echo 'নামের প্রথম অংশ';} ?>" id="fName">
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                            <input type="text" placeholder="<?php if($lang == 'en'){ echo 'Last Name';}elseif($lang == 'bn'){ echo 'নামের শেষ অংশ';} ?>" id="lName">
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                        <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                            <input type="email" placeholder="<?php if($lang == 'en'){ echo 'Email';}elseif($lang == 'bn'){ echo 'ই-মেইল';} ?>" id="email">
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                            <input type="text" placeholder="<?php if($lang == 'en'){ echo 'Phone Number';}elseif($lang == 'bn'){ echo 'মোবাইল নম্বর';} ?>" id="phone">
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
                            <select id="priority">
                                <option value=""><?php if($lang == 'en'){ echo 'Contact Priority';}elseif($lang == 'bn'){ echo 'যোগাযোগের অগ্রাধিকার';} ?></option>
                                <?php
                                $selArr     = array('p_id', 'name');
                                $chckArr    = array('lang'  =>  $lang, 'status'=>1);
                                $priorities =   $this->blood_model->tableMultipleDataMultipleCheck('priority', $selArr, $chckArr);
                                foreach ($priorities as $priority) {
                                    ?>
                                    <option value="<?=$priority->p_id?>"><?=$priority->name?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                        <input type="text" placeholder="<?php if($lang == 'en'){ echo 'Subject';}elseif($lang == 'bn'){ echo 'বিষয়বস্তু';} ?>" id="subj">
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                        <textarea rows="7" id="body" placeholder="<?php if($lang == 'en'){ echo 'Ask your needs to fix issue......';}elseif($lang == 'bn'){ echo 'যেকোনো সমস্যায় আপনার মূল্যবান মন্তব্যের মাধ্যমে সমাধান নিন.........';} ?>"></textarea>
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                        <button id="sent" class="pull-right"><span><i class="fa fa-send-o"></i></span>   <?php if($lang == 'en'){ echo 'Send';}elseif($lang == 'bn'){ echo 'পাঠান';} ?></button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4 col-lg-4 contact-details-field">
                <h4 class="heading"><?php if($lang == 'en'){ echo 'Contact Information';}elseif($lang == 'bn'){ echo 'যোগাযোগের তথ্য';} ?></h4>
                    <div class="contact-details">
                        <p class="text"><span><i class="fa fa-location-arrow icon"></i></span> house: 71, Road: 9/A, Dhanmondi, Dhaka-1209</p>
                        <p class="text"><span><i class="fa fa-mail-forward icon"></i></span> rakibbuzz1@gmail.com</p>
                        <p class="text"><span><i class="fa fa-mobile-phone icon"></i></span> 8801739171768</p>
                        <p class="text">
                            <span><i class="fa fa-facebook-square facebookicon"></i></span>
                            <span><i class="fa fa-twitter-square twittericon"></i></span>
                            <span><i class="fa fa-instagram instagramicon"></i></span>
                        </p>
                    </div>
            </div>
               </div>
         </div>
    </div>
</div>
