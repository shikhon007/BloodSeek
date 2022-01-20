        <?php
            $lang   = $this->session->userdata('lang');
        ?>
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
            <div class="oval-footer-template">
                <div class="white-shape"></div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6  footer-menu">
                        <ul class="foot-menu">
                            <li><a href="<?=base_url()?>profile" alt="Profile"><?php if($lang=='en'){echo 'Profile';}elseif($lang=='bn'){echo 'প্রোফাইল';}?></a></li>
                            <li><a href="<?=base_url()?>donor" alt="Blood Book"><?php if($lang=='en'){echo 'Blood Book';}elseif($lang=='bn'){echo 'রক্তবহী';}?></a></li>
                            <li><a href="<?=base_url()?>blood/life" alt="Blood Life"><?php if($lang=='en'){echo 'Blood Life';}elseif($lang=='bn'){echo 'রক্ত জিবনী';}?></a></li>
                            <li><a href="<?=base_url()?>blog" alt="Blog"><?php if($lang=='en'){echo 'Blog';}elseif($lang=='bn'){echo 'ব্লগ';}?></a></li>
                        </ul>
                        <ul class="foot-menu">
                            <li><a href="<?=base_url()?>about" alt="About Us"><?php if($lang=='en'){echo 'About Us';}elseif($lang=='bn'){echo 'আমাদের কথা';}?></a></li>
                            <li><a href="<?=base_url()?>contact" alt="Contact Us"><?php if($lang=='en'){echo 'Contact Us';}elseif($lang=='bn'){echo 'যোগাযোগ';}?></a></li>
                            <li><a href="<?=base_url()?>terms" alt="Terms & Condition"><?php if($lang=='en'){echo 'Terms & Condition';}elseif($lang=='bn'){echo 'বিধি-নিষেধ এবং শর্তাবলী';}?></a></li>
                            <li><a href="<?=base_url()?>policy" alt="Privacy Policy"><?php if($lang=='en'){echo 'Privacy Policy';}elseif($lang=='bn'){echo 'গোপনীয়তা নীতি';}?></a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                        <div class="mail-subscribe">
                            <p><?php if($lang=='en'){echo 'To get letest update info please subscribe here';}elseif($lang=='bn'){echo 'নতুন নতুন তথ্য জানতে এখানে নিবন্ধন করুন';}?></p>
                            <div class="subs-mail">
                                <input type="email" id="smail" placeholder="<?php if($lang=='en'){echo 'Enter Your Email';}elseif($lang=='bn'){echo 'ইমেইল প্রবেশ করুন';}?>">
                                <span><i class="fa fa-angle-right"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nav-footer">
            <div class="col-md- 6 col-xs-12 col-sm-6 col-lg-6">
                <p class="footer-copyright"><?php if($lang=='en'){echo '2019 &copy; Copyright By Blood';}elseif($lang=='bn'){echo '২০১৯ &copy; রক্ত বহির কপিরাইট';}?></p>
            </div>
            <div class="col-md- 6 col-xs-12 col-sm-6 col-lg-6">
                    <span>
                        <i class="fa fa-facebook-square "></i>
                        <i class="fa fa-twitter-square "></i>
                        <i class="fa fa-instagram "></i>
                    </span>
            </div>
        </div>
    </body>
</html>