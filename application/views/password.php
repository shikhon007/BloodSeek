<?php
    $lang   = $this->session->userdata('lang');
    if($type == 'reset'){
?>
        <div class="reset-panel">
            <div class="alert alert-danger alert-dismissible fade hide" role="alert">
                <strong><?php if($lang=='en'){echo 'Failed!';}elseif($lang=='bn'){echo 'দুঃখিত';}?></strong> <?php if($lang=='en'){echo 'Try Again to reset password.';}elseif($lang=='bn'){echo 'পাসওয়ার্ড পরিবর্তনে পুনরায় চেষ্টা করুন।';}?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="reset-field">
                <h3><?php if($lang=='en'){echo 'Reset Your Password';}elseif($lang=='bn'){echo 'আপনার পাসওয়ার্ড পরিবর্তন করুন';}?></h3>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="form-group">
                        <input type="password" id="cu_pass" class="form-control" placeholder="<?php if($lang=='en'){echo 'Current Password';}elseif($lang=='bn'){echo 'বর্তমান পাসওয়ার্ড';}?>">
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="form-group">
                        <input type="password" id="n_pass" class="form-control" placeholder="<?php if($lang=='en'){echo 'New Password';}elseif($lang=='bn'){echo 'নতুন পাসওয়ার্ড';}?>">
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="form-group">
                        <input type="password" id="co_pass" class="form-control" placeholder="<?php if($lang=='en'){echo 'Confirm Password';}elseif($lang=='bn'){echo 'পাসওয়ার্ড নিশ্চিতকরণ';}?>">
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <input type="button" value="<?php if($lang=='en'){echo 'Reset Password';}elseif($lang=='bn'){echo 'পাসওয়ার্ড পরিবর্তন';}?>" id="reset">
                </div>
            </div>
        </div>
<?php
    }elseif($type == 'forget'){
?>
        <div class="forget-panel">
            <div class="alert alert-danger alert-dismissible fade hide" role="alert">
                <strong><?php if($lang=='en'){echo 'Failed!';}elseif($lang=='bn'){echo 'দুঃখিত';}?></strong> <?php if($lang=='en'){echo 'Try again to restore password';}elseif($lang=='bn'){echo 'পাসওয়ার্ড পুনরুদ্ধারে পুনরায় চেষ্টা করুন।';}?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="forget-field">
                <h3><?php if($lang=='en'){echo 'Forget Your Password?';}elseif($lang=='bn'){echo 'আপনার পাসওয়ার্ড ভুলে গেছেন?';}?></h3>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="form-group">
                        <input type="text" id="co_pass" class="form-control" placeholder="<?php if($lang=='en'){echo 'Confirm Password';}elseif($lang=='bn'){echo 'পাসওয়ার্ড নিশ্চিতকরণ';}?>">
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <input type="button" value="<?php if($lang=='en'){echo 'Reset Password';}elseif($lang=='bn'){echo 'পাসওয়ার্ড পরিবর্তন';}?>" id="reset">
                </div>
            </div>
        </div>
<?php
    }
?>
<div class="success-panel">
    <div class="success-field">

    </div>
</div>
