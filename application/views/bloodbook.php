<?php
    $lang   = $this->session->userdata('lang');
?>
<div class="container-fluid blood-book">
    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
        <h3 class="seek-title"><label>Seek For Blood</label></h3>
        <div class="blood-donor-search-panel">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                    <div class="form-group">
                        <select class="form-control" id="country" alt="<?=$lang?>">
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
                </div>
                <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                    <div class="form-group">
                        <select class="form-control" id="city" alt="<?=$lang?>">
                            <option value=""><?php if($lang=='en'){echo 'Select City';}elseif($lang=='bn'){echo 'শহর';}?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                    <div class="form-group">
                        <select class="form-control" id="area" alt="<?=$lang?>">
                            <option value=""><?php if($lang=='en'){echo 'Select Area';}elseif($lang=='bn'){echo 'এলাকা';}?></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                    <div class="form-group">
                        <select class="form-control" id="bGroup">
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
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">

                </div>
                <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                    <div class="form-group">
                        <input type="button" id="search" value="<?php if($lang=='en'){echo 'Find Donor';}elseif($lang=='bn'){echo 'দাতা খুজুন';}?>" class="btn btn-sm pull-right">
                    </div>
                </div>
            </div>
        </div>
        <div id="search-result">
            <label>Find your blood donor......</label>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
        <div class="donor-list-header">
            <div class="donor-list-option">
                <label class="active-option" for="nearby"><?php if($lang=='en'){echo 'Nearby Donor';}elseif($lang=='bn'){echo 'নিকটবর্তী দাতা';}?></label>
                <label for="all"><?php if($lang=='en'){echo 'All Donor';}elseif($lang=='bn'){echo 'সকল দাতা';}?></label>
            </div>
        </div>
        <div class="donor-list-body">
            <div class="donor-list-nearby" id="nearby">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                        <select id="searchNByArea" alt="<?=$lang?>">
                            <option value=""><?php if($lang=='en'){echo 'Select Area';}elseif($lang=='bn'){echo 'এলাকা';}?></option>
                            <?php
                            $citi       =   $this->blood_model->uniqeDataGet('city', 'cit_id', array('name'=>$city, 'lang'=>'en'));
                            $selArr     = array('ara_id', 'name');
                            $chckArr    = array('cit_id'=>$citi, 'lang'  =>  $lang, 'status'=>1);
                            $areas      =   $this->blood_model->tableMultipleDataMultipleCheck('area', $selArr, $chckArr);
                            foreach ($areas as $area) {
                                ?>
                                <option value="<?=$area->ara_id?>"><?=$area->name?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                        <select id="searchNByBGroup" alt="<?=$lang?>">
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
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <input type="hidden" id="donor-len" value="0,50">
                    <div id="blood-donor-list">
                        <?php
                            $citi       =   $this->blood_model->uniqeDataGet('city', 'cit_id', array('name'=>$city, 'lang'=>'en'));
                            $users      =   $this->blood_model->getDataByTableQuery("SELECT u.u_id as u_id, b.name as b_name, a.name as a_name, c.name as c_name, s.name as s_name, bb.last_donate_date as donate_date FROM user as u, blood as b, city as c, area as a, service as s, blood_bank as bb WHERE u.status = '1' AND u.state = 'A' AND b.b_id = u.blood AND c.cit_id = u.city AND c.cit_id = '".$citi."' AND a.ara_id = u.area AND s.serv_id = u.service AND b.lang = '".$lang."' AND c.lang = '".$lang."' AND a.lang = '".$lang."' AND s.lang = '".$lang."' ORDER BY u.u_id LIMIT 50");
                            foreach ($users as $user){
                                $startTimeStamp = strtotime(date('Y-m-d'));
                                $endTimeStamp = strtotime($user->donate_date);
                                $timeDiff = abs($endTimeStamp - $startTimeStamp);
                                $numberDays = round($timeDiff/86400);
                        ?>
                                <div class="blood-donor-info-box" id="<?=$user->u_id?>">
                                    <p id="1"><label><?php if($lang=='en'){echo 'Blood Group';}elseif($lang=='bn'){echo 'রক্তের গ্রুপ';}?> : </label> <span><?=$user->b_name?></span></p>
                                    <p id="1"><label><?php if($lang=='en'){echo 'Area';}elseif($lang=='bn'){echo 'এলাকা';}?> : </label> <span><?=$user->a_name?></span></p>
                                    <p id="1"><label><?php if($lang=='en'){echo 'City';}elseif($lang=='bn'){echo 'শহর';}?> : </label> <span><?=$user->c_name?></span></p>
                                    <p id="1"><label><?php if($lang=='en'){echo 'Profession';}elseif($lang=='bn'){echo 'পেশা';}?> : </label> <span><?=$user->s_name?></span></p>
                                    <p id="1"><label><?php if($lang=='en'){echo 'Last Donation';}elseif($lang=='bn'){echo 'সর্বশেষ রক্তদান';}?> : </label> <span><?=$numberDays?> Days(<?=$user->donate_date?>)</span></p>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="donor-list-all" id="all">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 top-search">
                    <div class="col-md-3 col-xs-6 col-sm-3 col-lg-3">
                        <select id="searchByCountry" title="country" alt="<?=$lang?>">
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
                    <div class="col-md-3 col-xs-6 col-sm-3 col-lg-3">
                        <select id="searchByCity" title="city" alt="<?=$lang?>">
                            <option value=""><?php if($lang=='en'){echo 'Select City';}elseif($lang=='bn'){echo 'শহর';}?></option>
                        </select>
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-3 col-lg-3">
                        <select id="searchByArea" title="area" alt="<?=$lang?>">
                            <option value=""><?php if($lang=='en'){echo 'Select Area';}elseif($lang=='bn'){echo 'এলাকা';}?></option>
                        </select>
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-3 col-lg-3">
                        <select id="searchByBGroup" title="blood" alt="<?=$lang?>">
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
                </div>

                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <input type="hidden" id="donor-len" value="0,50">
                    <div id="blood-donor-list">
                        <?php
                            $users      =   $this->blood_model->getDataByTableQuery("SELECT u.u_id as u_id, b.name as b_name, a.name as a_name, c.name as c_name, s.name as s_name, bb.last_donate_date as donate_date FROM user as u, blood as b, city as c, area as a, service as s, blood_bank as bb WHERE u.status = '1' AND u.state = 'A' AND b.b_id = u.blood AND c.cit_id = u.city AND a.ara_id = u.area AND s.serv_id = u.service AND b.lang = '".$lang."' AND c.lang = '".$lang."' AND a.lang = '".$lang."' AND s.lang = '".$lang."' ORDER BY u.u_id LIMIT 50");
                            foreach ($users as $user){
                                $startTimeStamp = strtotime("2011/07/01");
                                $endTimeStamp = strtotime("2011/07/17");
                                $timeDiff = abs($endTimeStamp - $startTimeStamp);
                                $numberDays = round($timeDiff/86400);
                        ?>
                                <div class="blood-donor-info-box" id="<?=$user->u_id?>">
                                    <p id="1"><label><?php if($lang=='en'){echo 'Blood Group';}elseif($lang=='bn'){echo 'রক্তের গ্রুপ';}?> : </label> <span><?=$user->b_name?></span></p>
                                    <p id="1"><label><?php if($lang=='en'){echo 'Area';}elseif($lang=='bn'){echo 'এলাকা';}?> : </label> <span><?=$user->a_name?></span></p>
                                    <p id="1"><label><?php if($lang=='en'){echo 'City';}elseif($lang=='bn'){echo 'শহর';}?> : </label> <span><?=$user->c_name?></span></p>
                                    <p id="1"><label><?php if($lang=='en'){echo 'Profession';}elseif($lang=='bn'){echo 'পেশা';}?> : </label> <span><?=$user->s_name?></span></p>
                                    <p id="1"><label><?php if($lang=='en'){echo 'Last Donation';}elseif($lang=='bn'){echo 'সর্বশেষ রক্তদান';}?> : </label> <span><?=$numberDays?> Days(<?=$user->donate_date?>)</span></p>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>