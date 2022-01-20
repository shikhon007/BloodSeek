<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        <meta name="title" content="<?=$this->session->userdata('title')?>">
        <meta name="description" content="<?=$this->session->userdata('meta_descrip')?>">
        <title><?=$this->session->userdata('title')?></title>
        <link rel="canonical" href="http://bloodseek.com/">
        <link rel="SHORTCUT ICON" href="<?=icon_url()?>Logo/favicon.ico">
        <link rel="stylesheet" type="text/css" href="<?=css_url()?>bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?=css_url()?>font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?=css_url()?>style.css">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans|Roboto+Condensed|Slabo+27px" rel="stylesheet">
        <script type="text/javascript" src="<?=js_url()?>jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?=js_url()?>base.js"></script>
        <script type="text/javascript" src="<?=js_url()?>script.js"></script>
    </head>
    <body>
    <?php
    $lang   = $this->session->userdata('lang');
    ?>
    <div class="header">
        <div class="container-fluid">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="desk-menu">
                    <?php
                    if($lang == 'bn'){
                    echo '<a href="'.base_url().'switchLang/switchLanguage/en"><span><img alt="en" title="en" src="'.icon_url().'en.png"></span> English</a>';
                    }elseif($lang == 'en'){
                    echo '<a href="'.base_url().'switchLang/switchLanguage/bn"><span><img alt="bn" title="bn" src="'.icon_url().'bn.png"></span> বাংলা</a>';
                    }
                    ?>
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                        <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3">
                            <a href="<?=base_url()?>" class="logo-link">
                                <img class="img-responsive" alt="Site Logo" title="Site Logo" src="<?=icon_url()?>Logo/logo.png">
                            </a>
                        </div>
                        <div class="col-md-9 col-xs-9 col-sm-9 col-lg-9">
                            <div class="menu-panel">
                                <ul>
                                    <li><a class="active-menu" href="<?=base_url()?>" alt="Home"><?php if($lang=='en'){echo 'Home';}elseif($lang=='bn'){echo 'হোম';}?></a></li>
                                    <li><a href="<?=base_url()?>profile" alt="Profile"><?php if($lang=='en'){echo 'Profile';}elseif($lang=='bn'){echo 'প্রোফাইল';}?></a></li>
                                    <li><a href="<?=base_url()?>donor" alt="Blood Book"><?php if($lang=='en'){echo 'Blood Book';}elseif($lang=='bn'){echo 'রক্তবহী';}?></a></li>
                                    <li><a href="<?=base_url()?>blood/life" alt="Blood Life"><?php if($lang=='en'){echo 'Blood Life';}elseif($lang=='bn'){echo 'রক্ত জিবনী';}?></a></li>
                                    <li><a href="<?=base_url()?>blog" alt="Blog"><?php if($lang=='en'){echo 'Blog';}elseif($lang=='bn'){echo 'ব্লগ';}?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mob-menu">
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                        <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3">
                            <a href="<?=base_url()?>" class="logo-link">
                                <img class="img-responsive" alt="Site Logo" title="Site Logo" src="<?=icon_url()?>Logo/logo.png">
                            </a>
                        </div>
                        <div class="col-md-9 col-xs-9 col-sm-9 col-lg-9">
                            <div class="menu-panel">
									<span id="menu-bar">
										<span id="menu"></span>
										<i class="fa fa-bar"></i>
										<i class="fa fa-bar"></i>
										<i class="fa fa-bar"></i>
										<i class="fa fa-bar"></i>
										<i class="fa fa-bar"></i>
									</span>
                            </div>
                            <div class="menu-field">
                                <div class="menu-space">
                                    <div class="menu-header">
                                        <?php
                                        if($this->session->userdata('lang') == 'bn'){
                                        echo '<a href="'.base_url().'switchLang/switchLanguage/en"><span><img alt="en" title="en" src="'.icon_url().'en.png"></span> English</a>';
                                        }elseif($this->session->userdata('lang') == 'en'){
                                        echo '<a href="'.base_url().'switchLang/switchLanguage/bn"><span><img alt="bn" title="bn" src="'.icon_url().'bn.png"></span> বাংলা</a>';
                                        }
                                        ?>
                                    </div>
                                    <ul>
                                        <li><a class="active-menu" href="<?=base_url()?>" alt="Home"><?php if($lang=='en'){echo 'Home';}elseif($lang=='bn'){echo 'হোম';}?></a></li>
                                        <li><a href="<?=base_url()?>profile" alt="Profile"><?php if($lang=='en'){echo 'Profile';}elseif($lang=='bn'){echo 'প্রোফাইল';}?></a></li>
                                        <li><a href="<?=base_url()?>donor" alt="Blood Book"><?php if($lang=='en'){echo 'Blood Book';}elseif($lang=='bn'){echo 'রক্তবহী';}?></a></li>
                                        <li><a href="<?=base_url()?>blood/life" alt="Blood Life"><?php if($lang=='en'){echo 'Blood Life';}elseif($lang=='bn'){echo 'রক্ত জিবনী';}?></a></li>
                                        <li><a href="<?=base_url()?>blog" alt="Blog"><?php if($lang=='en'){echo 'Blog';}elseif($lang=='bn'){echo 'ব্লগ';}?></a></li>
                                    </ul>
                                    <?php
                                    $log    = '';
                                    if($lang=="en"){$log="Log Out";}elseif($lang=="bn"){$log="লগ আউট";}
                                    if($this->session->userdata('u_id') != ""){
                                    echo '<a href="'.base_url().'profile/logout" class="logout"><span><i class="fa fa-sign-out"></i></span> '.$log.'</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
