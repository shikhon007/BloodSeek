<!--		<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">-->
<!--			<div class="blood-site-operation">-->
<!--				<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">-->
<!--					<div class="alert alert-dismissible">-->
<!--						-->
<!--					</div>-->
<!--					<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">-->
<!--						<div class="blood-site-operation-box">-->
<!--							<div class="blood-site-operation-box-title">-->
<!--								<h3>--><?php //if($lang=='en'){echo 'Be A Donor';}elseif($lang=='bn'){echo 'রক্তদাতা';}?><!--</h3>-->
<!--							</div>-->
<!--							<div class="doner-entry-box">-->
<!--								<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">-->
<!--									<div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">-->
<!--										<div class="form-group">-->
<!--											<input type="text" id="fname" class="form-control" placeholder="--><?php //if($lang=='en'){echo 'First Name';}elseif($lang=='bn'){echo 'নামের প্রথম অংশ';}?><!--">-->
<!--										</div>-->
<!--									</div>-->
<!--									<div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">-->
<!--										<div class="form-group">-->
<!--											<input type="text" id="lname" class="form-control" placeholder="--><?php //if($lang=='en'){echo 'Last Name';}elseif($lang=='bn'){echo 'নামের শেষ অংশ';}?><!--">-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">-->
<!--									<div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">-->
<!--										<div class="form-group">-->
<!--											<select class="form-control" id="bg">-->
<!--												<option value="">--><?php //if($lang=='en'){echo 'Blood Group';}elseif($lang=='bn'){echo 'রক্তের গ্রুপ';}?><!--</option>-->
<!--                                                --><?php
//                                                    $selArr     = array('b_id', 'name');
//                                                    $chckArr    = array('lang'  =>  $lang, 'status'=>1);
//                                                    $bloods     =   $this->blood_model->tableMultipleDataMultipleCheck('blood', $selArr, $chckArr);
//                                                    foreach ($bloods as $blood) {
//                                                ?>
<!--                                                        <option value="--><?//=$blood->b_id?><!--">--><?//=$blood->name?><!--</option>-->
<!--                                                --><?php
//                                                    }
//                                                ?>
<!--											</select>-->
<!--										</div>-->
<!--									</div>-->
<!--									<div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">-->
<!--										<div class="form-group">-->
<!--											<select class="form-control" id="gender">-->
<!--                                                <option value="">--><?php //if($lang=='en'){echo 'Select Gender';}elseif($lang=='bn'){echo 'লিঙ্গ';}?><!--</option>-->
<!--                                                --><?php
//                                                    $selArr     = array('g_id', 'name');
//                                                    $chckArr    = array('lang'  =>  $lang, 'status'=>1);
//                                                    $bloods     =   $this->blood_model->tableMultipleDataMultipleCheck('gender', $selArr, $chckArr);
//                                                    foreach ($bloods as $blood) {
//                                                        ?>
<!--                                                        <option value="--><?//=$blood->g_id?><!--">--><?//=$blood->name?><!--</option>-->
<!--                                                        --><?php
//                                                    }
//                                                ?>
<!--											</select>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">-->
<!--									<div class="form-group">-->
<!--										<input type="text" id="phone" class="form-control" placeholder="--><?php //if($lang=='en'){echo 'Phone Number';}elseif($lang=='bn'){echo 'মোবাইল নম্বর';}?><!--">-->
<!--                                        <span class="spinner"><i class="fa fa-spinner animate"></i></span>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">-->
<!--									<div class="form-group">-->
<!--										<input type="email" id="email" class="form-control" placeholder="--><?php //if($lang=='en'){echo 'Email';}elseif($lang=='bn'){echo 'মেইল';}?><!--">-->
<!--                                        <span class="spinner"><i class="fa fa-spinner animate"></i></span>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">-->
<!--									<div class="form-group">-->
<!--										<input type="password" id="pass" class="form-control" placeholder="--><?php //if($lang=='en'){echo 'Blood Group';}elseif($lang=='bn'){echo 'পাসওয়ার্ড';}?><!--">-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">-->
<!--									<div class="form-group">-->
<!--										<input type="button" id="submit" class="btn btn-sm pull-right" value="--><?php //if($lang=='en'){echo 'Be Donor';}elseif($lang=='bn'){echo 'দাতা হউন';}?><!--">-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">-->
<!--						<div class="blood-site-operation-box">-->
<!--							<div class="blood-site-operation-box-title">-->
<!--								<h3>--><?php //if($lang=='en'){echo 'Find Your Donor';}elseif($lang=='bn'){echo 'দাতা খোঁজ করুন';}?><!--</h3>-->
<!--							</div>-->
<!--							<div class="doner-find-box">-->
<!--								<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">-->
<!--									<div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">-->
<!--										<div class="form-group">-->
<!--											<select class="form-control" id="country" alt="--><?//=$lang?><!--">-->
<!--												<option value="">--><?php //if($lang=='en'){echo 'Select Country';}elseif($lang=='bn'){echo 'দেশ';}?><!--</option>-->
<!--                                                --><?php
//                                                    $selArr     =   array('count_id', 'name');
//                                                    $chckArr    =   array('lang'=>$lang, 'status'=>'1');
//                                                    $areas      =   $this->blood_model->tableMultipleDataMultipleCheck('country', $selArr, $chckArr);
//                                                    foreach ($areas as $area){
//                                                        echo '<option value="'.$area->count_id.'">'.$area->name.'</option>';
//                                                    }
//                                                ?>
<!--											</select>-->
<!--										</div>-->
<!--									</div>-->
<!--									<div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">-->
<!--                                        <div class="form-group">-->
<!--                                            <select class="form-control" id="city" alt="--><?//=$lang?><!--">-->
<!--                                                <option value="">--><?php //if($lang=='en'){echo 'Select City';}elseif($lang=='bn'){echo 'শহর';}?><!--</option>-->
<!--                                            </select>-->
<!--                                        </div>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">-->
<!--									<div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">-->
<!--                                        <div class="form-group">-->
<!--                                            <select class="form-control" id="area" alt="--><?//=$lang?><!--">-->
<!--                                                <option value="">--><?php //if($lang=='en'){echo 'Select Area';}elseif($lang=='bn'){echo 'এলাকা';}?><!--</option>-->
<!--                                            </select>-->
<!--                                        </div>-->
<!--									</div>-->
<!--									<div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">-->
<!--                                        <div class="form-group">-->
<!--                                            <select class="form-control" id="bGroup">-->
<!--                                                <option value="">--><?php //if($lang=='en'){echo 'Blood Group';}elseif($lang=='bn'){echo 'রক্তের গ্রুপ';}?><!--</option>-->
<!--                                                --><?php
//                                                $selArr     = array('b_id', 'name');
//                                                $chckArr    = array('lang'  =>  $lang, 'status'=>1);
//                                                $bloods     =   $this->blood_model->tableMultipleDataMultipleCheck('blood', $selArr, $chckArr);
//                                                foreach ($bloods as $blood) {
//                                                    ?>
<!--                                                    <option value="--><?//=$blood->b_id?><!--">--><?//=$blood->name?><!--</option>-->
<!--                                                    --><?php
//                                                }
//                                                ?>
<!--                                            </select>-->
<!--                                        </div>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">-->
<!--									<div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">-->
<!--										-->
<!--									</div>-->
<!--									<div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">-->
<!--										<div class="form-group">-->
<!--											<input type="button" id="search" value="--><?php //if($lang=='en'){echo 'Find Donor';}elseif($lang=='bn'){echo 'দাতা খুজুন';}?><!--" class="btn btn-sm pull-right">-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->