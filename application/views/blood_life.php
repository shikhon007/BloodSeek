<?php
    $lang   = $this->session->userdata('lang');
?>
<div class="container-fluid blood-life-main-body">
    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
        <h1 class="blood-generation-title"><?php if($lang=='en'){echo 'Blood Type Elements';}elseif($lang=='bn'){echo 'রক্তের উপাদান্সমূহ';}?></h1>
        <div class="blood-gen-trans-field">
            <h4><?php if($lang=='en'){echo 'Click a blood type to learn more.';}elseif($lang=='bn'){echo 'বিস্তারিত জানতে একটি রক্তের দলে ক্লিক করুন ।';}?></h4>
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="col-md-4 col-xs-12 col-sm-4 col-lg-4">
                    <div class="blood-group" alt="<?=$lang?>">
                        <div class="col-md-12 col-xs-6 col-sm-12 col-lg-12">
                            <label class="active-group" alt="A"><?php if($lang=='en'){echo 'Group A';}elseif($lang=='bn'){echo 'দল এ';}?></label>
                        </div>
                        <div class="col-md-12 col-xs-6 col-sm-12 col-lg-12">
                            <label alt="B"><?php if($lang=='en'){echo 'Group B';}elseif($lang=='bn'){echo 'দল বি';}?></label>
                        </div>
                        <div class="col-md-12 col-xs-6 col-sm-12 col-lg-12">
                            <label alt="AB"><?php if($lang=='en'){echo 'Group AB';}elseif($lang=='bn'){echo 'দল এবি';}?></label>
                        </div>
                        <div class="col-md-12 col-xs-6 col-sm-12 col-lg-12">
                            <label alt="O"><?php if($lang=='en'){echo 'Group O';}elseif($lang=='bn'){echo 'দল ও';}?></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-8 col-lg-8">
                    <div class="blood-group-details">
                        <div class="col-md-4 col-xs-12 col-sm-4 col-lg-4">
                            <div class="blood-bottle">
                                <img alt="Bottole" title="Bottle" src="<?=icon_url()?>bottle.svg">
                                <img alt="Shape" title="Shape" src="<?=icon_url()?>shape.svg">
                                <img alt="Blood" title="Blood" src="<?=icon_url()?>bg-blood.svg">
                                <div class="red-cell">
                                    <span id="A">A</span>
                                    <span id="B">B</span>
                                    <span><?php if($lang=='en'){echo 'PLASMA';}elseif($lang=='bn'){echo 'রক্তরস';}?></span>
                                    <span><?php if($lang=='en'){echo 'RED CELL';}elseif($lang=='bn'){echo 'লাল কোষ';}?></span>
                                    <span class="cell-dot"></span>
                                    <span class="cell-dot"></span>
                                    <span class="cell-dot"></span>
                                    <span class="cell-dot"></span>
                                    <span class="cell-dot"></span>
                                    <span class="cell-dot"></span>
                                    <span class="cell-dot"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-xs-12 col-sm-8 col-lg-8">
                            <div class="blood-group-text">
                                <h2><?php if($lang=='en'){echo 'Group A';}elseif($lang=='bn'){echo 'দল এ';}?></h2>
                                <p><?php if($lang=='en'){echo 'has only the A antigen on red cells (and B antibody in the plasma)';}elseif($lang=='bn'){echo 'রক্তের লাল কোষে থাকবে এ এন্টিজেন (এবং রক্তরসে থাকবে বি এন্টিবডি)';}?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
        <h2 class="article-title"><?php if($lang=='en'){echo 'How Blood Type Determined';}elseif($lang=='bn'){echo 'কিভাবে রক্তের ধরন নির্ধারিত হয়?';}?></h2>
        <div class="blood-gen-trans-field">
            <h4><?php if($lang=='en'){echo 'Click a blood type to see how how passed on genetically.';}elseif($lang=='bn'){echo 'পরবর্তি প্রজন্মের রক্তের ধরন জানতে যেকোনো একটিতে ক্লিক করুন ।';}?></h4>
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="col-md-8 col-xs-12 col-sm-8 col-lg-8">
                    <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                            <div class="blood-list">
                                <label alt="O" title="<?=$lang?>"><?php if($lang=='en'){echo 'O';}elseif($lang=='bn'){echo 'ও';}?></label>
                                <label alt="A" title="<?=$lang?>"><?php if($lang=='en'){echo 'A';}elseif($lang=='bn'){echo 'এ';}?></label>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                            <div class="blood-list">
                                <label alt="B" title="<?=$lang?>"><?php if($lang=='en'){echo 'B';}elseif($lang=='bn'){echo 'বি';}?></label>
                                <label alt="AB" title="<?=$lang?>"><?php if($lang=='en'){echo 'AB';}elseif($lang=='bn'){echo 'এবি';}?></label>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                            <h3 class="blood-deter-title-gend"><?php if($lang=='en'){echo 'Parent 1';}elseif($lang=='bn'){echo 'অভিভাবক ১';}?></h3>
                            <div class="parent-logo" id="parent1">
                                <span><i class="fa fa-male" aria-hidden="true"></i></span>
                                <span class="blood" alt="O"><?php if($lang=='en'){echo 'O';}elseif($lang=='bn'){echo 'ও';}?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                            <div class="blood-list">
                                <label alt="O" title="<?=$lang?>"><?php if($lang=='en'){echo 'O';}elseif($lang=='bn'){echo 'ও';}?></label>
                                <label alt="A" title="<?=$lang?>"><?php if($lang=='en'){echo 'A';}elseif($lang=='bn'){echo 'এ';}?></label>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                            <div class="blood-list">
                                <label alt="B" title="<?=$lang?>"><?php if($lang=='en'){echo 'B';}elseif($lang=='bn'){echo 'বি';}?></label>
                                <label alt="AB" title="<?=$lang?>"><?php if($lang=='en'){echo 'AB';}elseif($lang=='bn'){echo 'এবি';}?></label>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                            <h3 class="blood-deter-title-gend"><?php if($lang=='en'){echo 'Parent 2';}elseif($lang=='bn'){echo 'অভিভাবক ২';}?></h3>
                            <div class="parent-logo" id="parent2">
                                <span><i class="fa fa-male" aria-hidden="true"></i></span>
                                <span class="blood" alt="O"><?php if($lang=='en'){echo 'O';}elseif($lang=='bn'){echo 'ও';}?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4 col-lg-4">
                    <div class="space-blood-gen-trans"></div>
                    <h3 class="blood-deter-title-gend"><?php if($lang=='en'){echo 'Possible blood type of child';}elseif($lang=='bn'){echo 'সন্তানের সম্ভাব্য রক্তের ধরন';}?></h3>
                    <div class="child-logo">
                        <span><i class="fa fa-child" aria-hidden="true"></i></span>
                        <span class="child-blood" alt="O"><?php if($lang=='en'){echo 'O';}elseif($lang=='bn'){echo 'ও';}?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>