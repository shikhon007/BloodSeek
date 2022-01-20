$(document).ready(function(){
    $href       = window.location.pathname;
    console.log($href.indexOf('profile'));
    if($href.indexOf('profile') > -1){
        $(".menu-panel>ul>li>a").removeClass('active-menu');
        $(".menu-panel>ul>li:nth-child(2)>a").addClass('active-menu');
        $(".menu-space>ul>li>a").removeClass('active-menu');
        $(".menu-space>ul>li:nth-child(2)>a").addClass('active-menu');
    }else if($href.indexOf('donor') > -1){
        $(".menu-panel>ul>li>a").removeClass('active-menu');
        $(".menu-panel>ul>li:nth-child(3)>a").addClass('active-menu');
        $(".menu-space>ul>li>a").removeClass('active-menu');
        $(".menu-space>ul>li:nth-child(3)>a").addClass('active-menu');
    }else if($href.indexOf('life') > -1){
        $(".menu-panel>ul>li>a").removeClass('active-menu');
        $(".menu-panel>ul>li:nth-child(4)>a").addClass('active-menu');
        $(".menu-space>ul>li>a").removeClass('active-menu');
        $(".menu-space>ul>li:nth-child(4)>a").addClass('active-menu');
    }else if($href.indexOf('blog') > -1){
        $(".menu-panel>ul>li>a").removeClass('active-menu');
        $(".menu-panel>ul>li:nth-child(5)>a").addClass('active-menu');
        $(".menu-space>ul>li>a").removeClass('active-menu');
        $(".menu-space>ul>li:nth-child(5)>a").addClass('active-menu');
    }else{
        showSlides();
        showSlides1();
        $(".menu-panel>ul>li>a").removeClass('active-menu');
        $(".menu-panel>ul>li:nth-child(1)>a").addClass('active-menu');
        $(".menu-space>ul>li>a").removeClass('active-menu');
        $(".menu-space>ul>li:nth-child(1)>a").addClass('active-menu');
    }
    setInterval(function(){
        $len    = $("#nearby>#donor-len").val();

    }, 5000);
	$(".cell-dot").each(function() {
	    $top 	= Math.floor(Math.random()*150)+130;
	    $left 	= Math.floor(Math.random()*70)+15;
	    $(this).animate({'top':$top, 'left': $left});
	});
	setInterval(function(){
		$(".cell-dot").each(function() {
		    $p 	= $(this).position();
		   	if(i === 0){
		   		$(this).animate({'top': ($p.top+10)+'px'}, 800);
		   	}else{
		   		$(this).animate({'top': ($p.top-10)+'px'}, 800);
		   	}
		});
		if(i === 0){
			i = 1;
		}else{
			i = 0;
		}
	}, 1150);
	$("#menu").on("click", function(){
		//$(".menu-field").animate({width: "toggle"});
	    $(".menu-field").toggle(1000, "swing");
	});
	$(document).on("click", ".blood-list>label", function(){
		$(this).parent().parent().parent().children().children().find('label').css({'background': '#fff', 'color': '#000'});
		$(this).css({'background': '#f6516a', 'color': '#fff'});
		$bblood     = $(this).text();
		$blood 		= $(this).attr('alt');
        $lang 		= $(this).attr('title');
		$(this).parent().parent().parent().children().children().find('.blood').text($bblood);
		$(this).parent().parent().parent().children().children().find('.blood').attr('alt', $blood);
		$parent1 	= $("#parent1>.blood").attr('alt');
		$parent2 	= $("#parent2>.blood").attr('alt');
		$childBlood = childBloodType($parent1, $parent2, $lang);
		$(".child-blood").html($childBlood);
	});
	$(document).on("click", ".blood-group>div>label", function(){
	    $lang   = $(this).parent().parent().attr('alt');
        $blood  = $(this).attr('alt');
		$(this).parent().parent().children().find(".active-group").removeClass('active-group');
		$(this).addClass('active-group');
		$(".blood-group-text>h2").text($(this).text());
		if($lang == 'en'){
            if($blood === 'A'){
                $(".red-cell>#A").animate({'top':'50%'}, 1000);
                $(".red-cell>#B").animate({'top':'10%'}, 1000);
                $(".blood-group-text>p").text('has only the A antigen on red cells (and B antibody in the plasma)');
            }else if($blood === 'B'){
                $(".red-cell>#A").animate({'top':'10%'}, 1000);
                $(".red-cell>#B").animate({'top':'50%'}, 1000);
                $(".blood-group-text>p").text('has only the B antigen on red cells (and A antibody in the plasma)');
            }else if($blood === 'AB'){
                $(".red-cell>#A").animate({'top':'50%'}, 1000);
                $(".red-cell>#B").animate({'top':'50%'}, 1000);
                $(".blood-group-text>p").text('has both A and B antigens on red cells (but neither A nor B antibody in the plasma)');
            }else if($blood === 'O'){
                $(".red-cell>#A").animate({'top':'10%'}, 1000);
                $(".red-cell>#B").animate({'top':'10%'}, 1000);
                $(".blood-group-text>p").text('has neither A nor B antigens on red cells (but both A and B antibody are in the plasma)');
            }
        }else if($lang == 'bn'){
            if($blood === 'A'){
                $(".red-cell>#A").animate({'top':'50%'}, 1000);
                $(".red-cell>#B").animate({'top':'10%'}, 1000);
                $(".blood-group-text>p").text('রক্তের লাল কোষে আছে এ এন্টিজেন (এবং রক্তরসে আছে বি এন্টিবডি)');
            }else if($blood === 'B'){
                $(".red-cell>#A").animate({'top':'10%'}, 1000);
                $(".red-cell>#B").animate({'top':'50%'}, 1000);
                $(".blood-group-text>p").text('রক্তের লাল কোষে আছে বি এন্টিজেন (এবং রক্তরসে আছে এ এন্টিবডি)');
            }else if($blood === 'AB'){
                $(".red-cell>#A").animate({'top':'50%'}, 1000);
                $(".red-cell>#B").animate({'top':'50%'}, 1000);
                $(".blood-group-text>p").text('রক্তের লাল কোষে আছে এ এবং বি এন্টিজেন (এবং রক্তরসে কোন এ বা বি এন্টিবডি নাই)');
            }else if($blood === 'O'){
                $(".red-cell>#A").animate({'top':'10%'}, 1000);
                $(".red-cell>#B").animate({'top':'10%'}, 1000);
                $(".blood-group-text>p").text('রক্তের লাল কোষে কোন এ বা বি এন্টিজেন নাই (এবং রক্তরসে আছে এ এবং বি এন্টিবডি)');
            }
        }
	});
	$(document).on("focusout", "#phone, #email", function(){
        $(this).parent().find(".spinner").show();
	    $val        = $(this).val();
	    $field      = $(this).attr('id');

	    if($val != ""){
            $.ajax({
                url: base_url+"blood/uservaliditycheck",
                type: "POST",
                data: {'field': $field, 'val': $val},
                context: this,
                success: function(response){
                    if (response == 'S'){
                        $(this).val("");
                        $(this).parent().find("p").remove();
                        $(this).css({'border-bottom': '1px solid #fd1e3f'});
                        if($field == 'phone'){
                            $(this).parent().append('<p>**Phone Already Exists!</p>');
                        }else if($field == 'email'){
                            $(this).parent().append('<p>**E-mail Already Exists!</p>');
                        }
                        $(this).parent().find("p").css({'color': '#fd1e3f', 'font-family': 'PT Sans', 'font-size': '11px','padding-top': '5px', 'margin-bottom': '0'});
                        if($(this).parent().find("p").length > 0){
                            $(".blood-site-operation-box").css({'height': '360px'});
                        }else{
                            $(".blood-site-operation-box").css({'height': '340px'});
                        }
                    } else if(response == 'F'){
                        $(this).css({'border-bottom': '1px solid #ccc'});
                        $(this).parent().find("p").remove();
                        $(".blood-site-operation-box").css({'height': '360px'});
                    }
                    $(this).parent().find(".spinner").hide();
                }
            });
        }
    });
	$("#pmail").on("focusout", function(){
        $(this).parent().find(".spinner").show();
	    $val    = $(this).val();
	    $field  = '';
	    if($val.indexOf('@') > -1){
	        $field  = 'email';
        }else{
	        $field  = 'phone';
        }
        $.ajax({
            url: base_url+"blood/uservaliditycheck",
            type: "POST",
            data: {'field': $field, 'val': $val},
            context: this,
            success: function(response){
                if (response == 'F'){
                    $(this).val("");
                    $(this).css({'border-bottom': '1px solid #fd1e3f'});
                    if($(this).parent().find("p").length > 0){
                        $(this).parent().find("p").remove();
                        $(this).parent().append('<p>Invalid User! Please enter correct.</p>');
                        $(this).parent().find("p").css({'color': '#fd1e3f', 'font-family': 'PT Sans', 'font-size': '11px','padding-top': '5px', 'margin-bottom': '0'});
                    }else{
                        $(this).parent().append('<p>Invalid User! Please enter correct.</p>');
                        $(this).parent().find("p").css({'color': '#fd1e3f', 'font-family': 'PT Sans', 'font-size': '11px','padding-top': '5px', 'margin-bottom': '0'});
                    }
                } else if(response == 'S'){
                    $(this).css({'border-bottom': '1px solid #ccc'});
                    $(this).parent().find("p").remove();
                }
                $(this).parent().find(".spinner").hide();
            }
        });
    });
    $("#login").on("click", function(){
        $pmval      = $("#pmail").val();
        $pass       = $("#pass").val();

        if($pmval.indexOf('@') > -1){
            $field  = 'email';
        }else{
            $field  = 'phone';
        }
        $.ajax({
            url: base_url+"profile/login",
            type: "POST",
            data: {'pmval': $pmval, 'pass': $pass, 'field': $field},
            context: this,
            success: function(response){
                if(response == 'F'){
                    $("#pass").parent().find("p").remove();
                    $("#pass").css({'border-bottom': '1px solid #fd1e3f'});
                    $("#pass").parent().append('<p>** Invalid Password!</p>');
                    $("#pass").parent().find("p").css({'color': '#fd1e3f', 'font-family': 'PT Sans', 'font-size': '11px','padding-top': '5px', 'margin-bottom': '0'});
                }else {
                    window.location.reload();
                }
            }
        });
    });
	$("#submit").click(function(){
		$body 		= $(".main-body");
		$alert 		= $(".alert");
        $state  = 'S';
        $stArr  = '';
        $fData  = new FormData();
        $(".doner-entry-box input, .doner-entry-box select").each(function(){
            if($(this).attr('id') != "submit") {
                $fData.append($(this).attr('id'), $(this).val());
                if ($(this).val() == "") {
                    $state = 'F';
                    if ($stArr == "") {
                        $stArr = $(this).attr('id') + '|F';
                    } else {
                        $stArr = $stArr + "||" + $(this).attr('id') + '|F';
                    }
                } else {
                    if ($stArr == "") {
                        $stArr = $(this).attr('id') + '|S';
                    } else {
                        $stArr = $stArr + "||" + $(this).attr('id') + '|S';
                    }
                }
            }
        });
		if($state == 'S'){
            $.ajax({
                url: base_url+"blood/regDonor",
                type: "POST",
                data: $fData,
                context: this,
                success: function(response){
                    $spArr 	= response.split("||");
                    if($spArr[0] === 'Success'){
                        $body.html('<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12"><div class="blood-site-operation-reg"><div class="alert '+$spArr[1]+' alert-dismissible">'+$spArr[2]+'</div><div class="col-md-12 col-xs-12 col-sm-12 col-lg-12"><div class="col-md-6 col-xs-6 col-sm-6 col-lg-6"><div class="face1"><h3>Donor</h3><span><i class="fa fa-smile-o"></i></span></div></div><div class="col-md-6 col-xs-6 col-sm-6 col-lg-6"><div class="face2"><h3>RECIPIENT</h3><span><i class="fa fa-frown-o" aria-hidden="true"></i></span></div></div></div></div></div>');
                        $alert.show('slow');

                        setTimeout(function(){
                            window.location.href = base_url+"profile";
                        }, 10000);
                    }else{
                        setTimeout(function(){
                            $(".alert").hide('slow');
                        }, 3000);
                    }

                    $face1  = $(".face1>span").offset();
                    $face2  = $(".face2>span").offset();

                    $face1Right     = $face1.left+$(".face1>span").outerHeight(true);
                    $face2Left      = $face2.left;
                    $(".blood-site-operation-reg").append('<div class="blood-drop"><div></div></div><div class="col-md-12 col-xs-12 col-sm-12 col-lg-12"><div class="progress-info"><h3><b>Thank You!</b><br>Welcome to Online Large Blood Donation Program</h3><p>Wait few seconds to move on your profile automatically and complete registration to help people donating blood. This program helps you to find in your need too.<br>If want to go on without westing time please <a href="'+base_url+'blood/profile"><u><i>Click Here</i></u></a></p></div></div>');
                    $bloodDrop      = $(".blood-drop");
                    $bloodDropChild = $(".blood-drop>div");
                    $bloodDropChild.css({'width': '0px'});
                    if($(window).width() < 450){
                        $bloodDrop.css({'left': ($face1Right-58)+'px'});
                        $bloodDrop.css({'width': ($face2Left-$face1Right+45)+'px'});
                        setTimeout(function(){
                            setInterval(function(){
                                if(parseInt($bloodDropChild.width()) < parseInt($face2Left-$face1Right+45)){
                                    $bloodDropChild.css({'width': ($bloodDropChild.width()+1)+'px'});
                                }else{
                                    $(".face2>span>i").removeClass('fa-frown-o');
                                    $(".face2>span>i").addClass('fa-smile-o');
                                    $(".face2>span").css({'color': '#fd1e3f'});
                                    $bloodDropChild.css({'border-top-right-radius': '0px', 'border-bottom-right-radius': '0px'});
                                }
                            }, 20);
                        }, 500);
                    }else{
                        $bloodDrop.css({'left': ($face1Right-49)+'px'});
                        $bloodDrop.css({'width': ($face2Left-$face1Right+34)+'px'});
                        setTimeout(function(){
                            setInterval(function(){
                                if(parseInt($bloodDropChild.width()) < parseInt($face2Left-$face1Right+36)){
                                    $bloodDropChild.css({'width': ($bloodDropChild.width()+1)+'px'});
                                }else{
                                    $(".face2>span>i").removeClass('fa-frown-o');
                                    $(".face2>span>i").addClass('fa-smile-o');
                                    $(".face2>span").css({'color': '#fd1e3f'});
                                    $bloodDropChild.css({'border-top-right-radius': '0px', 'border-bottom-right-radius': '0px'});
                                }
                            }, 20);
                        }, 500);
                    }

                }
            });
        }else{
		    $(".blood-site-operation>div>div>div").css({'height': '420px'});
            $stArrs     = $stArr.split('||');
            for ($i = 0; $i < $stArrs.length; $i++) {
                $fields     = $stArrs[$i].split("|");
                if($fields[1] == 'F'){
                    $("#"+$fields[0]).parent().find("p").remove();
                    $("#"+$fields[0]).parent().append('<p style="color: #f00;font-size: 11px;margin-bottom: 0;margin-top: 5px">** Must fill this input!</p>');
                }else{
                    $("#"+$fields[0]).parent().find("p").remove();
                }
            }
        }
	});
	$(document).on("change", "#profile", function(){
	    $(this).parent().parent().parent().children().find(".spin-field").show();
        var fd = new FormData();
        var files = $(this)[0].files[0];
        fd.append('userfile', files);
        fd.append('type', 'profile');

        $.ajax({
            url: base_url+"profile/img_upload",
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,
            context: this,
            success: function(response){
				console.log(response);
                $(this).parent().parent().parent().children().find("img").attr('src', profile_url+response);
                $(this).parent().parent().parent().children().find(".spin-field").hide();
            }
        });
    });
	$(document).on("change", "#voter-front, #voter-back", function(){
        $(this).parent().parent().parent().children().find(".vot-spin-field").show();
        var fd = new FormData();
        var files = $(this)[0].files[0];
        fd.append('userfile', files);
        console.log($(this).attr('id'));
        if($(this).attr('id') == 'voter-front'){
            fd.append('type', 'voter_font');
        }else if($(this).attr('id') == 'voter-back'){
            fd.append('type', 'voter_back');
        }

        $.ajax({
            url: base_url+"profile/img_upload",
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,
            context: this,
            success: function(response){
                $(this).parent().parent().parent().children().find("img").attr('src', voterid_url+response);
                $(this).parent().parent().parent().children().find(".vot-spin-field").hide();
            }
        });
    });
	$(".alert").hide();
	$(document).on("focusout", ".new-account-create-box input, .new-account-create-box select, .info-body input[name='upd_info'], .info-body select[name='upd_info']", function(){
	    if($(this).val() == ""){
            $(this).parent().find("p").remove();
	        $(this).css({'border-bottom': '1px solid #f00'});
	        $(this).parent().append('<p style="color: #f00;font-size: 11px;margin-bottom: 0;margin-top: 5px">** Must fill this input!</p>');
	        if($(this).attr('id') == 'cPassword' && $("#password").val() != $("#cPassword").val()){
	            $(this).parent().append('<p style="color: #f00;font-size: 11px;margin-bottom: 0;margin-top: 5px">** Password Missmatch!</p>');
            }
        }else{
            $(this).parent().find("p").remove();
            $(this).css({'border-bottom': '0'});
        }
    });
	$("#register").click(function(){
        $body 		= $(".register-panel");
        $alert 		= $(".alert");
	    $state  = 'S';
	    $stArr  = '';
        $fData  = new FormData();
        $(".new-account-create-box input, .new-account-create-box select").each(function(){
            if($(this).attr('id') != "register") {
                $fData.append($(this).attr('id'), $(this).val());
                if ($(this).val() == "") {
                    $state = 'F';
                    if ($stArr == "") {
                        $stArr = $(this).attr('id') + '|F';
                    } else {
                        $stArr = $stArr + "||" + $(this).attr('id') + '|F';
                    }
                } else {
                    if ($stArr == "") {
                        $stArr = $(this).attr('id') + '|S';
                    } else {
                        $stArr = $stArr + "||" + $(this).attr('id') + '|S';
                    }
                }
            }
        });

        if($state == 'S'){
            $.ajax({
                url: base_url+"profile/registration",
                type: "POST",
                data: $fData,
                processData: false,
                contentType: false,
                cache: false,
                context: this,
                success: function(response){
                    $spArr 	= response.split("||");
                    if($spArr[0] === 'Success'){
                        $body.html('<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12"><div class="blood-site-operation-reg"><div class="alert '+$spArr[1]+' alert-dismissible">'+$spArr[2]+'</div><div class="col-md-12 col-xs-12 col-sm-12 col-lg-12"><div class="col-md-6 col-xs-6 col-sm-6 col-lg-6"><div class="face1"><h3>Donor</h3><span><i class="fa fa-smile-o"></i></span></div></div><div class="col-md-6 col-xs-6 col-sm-6 col-lg-6"><div class="face2"><h3>RECIPIENT</h3><span><i class="fa fa-frown-o" aria-hidden="true"></i></span></div></div></div></div></div>');
                        $alert.show('slow');

                        setTimeout(function(){
                            window.location.href = base_url+"profile";
                        }, 10000);
                    }else{
                        setTimeout(function(){
                            $(".alert").hide('slow');
                        }, 3000);
                    }

                    $face1  = $(".face1>span").offset();
                    $face2  = $(".face2>span").offset();

                    $face1Right     = $face1.left+$(".face1>span").outerHeight(true);
                    $face2Left      = $face2.left;
                    $(".blood-site-operation-reg").append('<div class="blood-drop"><div></div></div><div class="col-md-12 col-xs-12 col-sm-12 col-lg-12"><div class="progress-info"><h3><b>Thank You!</b><br>Welcome to Online Large Blood Donation Program</h3><p>Wait few seconds to move on your profile automatically and complete registration to help people donating blood. This program helps you to find in your need too.<br>If want to go on without westing time please <a href="'+base_url+'blood/profile"><u><i>Click Here</i></u></a></p></div></div>');
                    $bloodDrop      = $(".blood-drop");
                    $bloodDropChild = $(".blood-drop>div");
                    $bloodDropChild.css({'width': '0px'});
                    if($(window).width() < 450){
                        $bloodDrop.css({'left': ($face1Right-58)+'px'});
                        $bloodDrop.css({'width': ($face2Left-$face1Right+45)+'px'});
                        setTimeout(function(){
                            setInterval(function(){
                                if(parseInt($bloodDropChild.width()) < parseInt($face2Left-$face1Right+45)){
                                    $bloodDropChild.css({'width': ($bloodDropChild.width()+1)+'px'});
                                }else{
                                    $(".face2>span>i").removeClass('fa-frown-o');
                                    $(".face2>span>i").addClass('fa-smile-o');
                                    $(".face2>span").css({'color': '#fd1e3f'});
                                    $bloodDropChild.css({'border-top-right-radius': '0px', 'border-bottom-right-radius': '0px'});
                                }
                            }, 20);
                        }, 500);
                    }else{
                        $bloodDrop.css({'left': ($face1Right-49)+'px'});
                        $bloodDrop.css({'width': ($face2Left-$face1Right+34)+'px'});
                        setTimeout(function(){
                            setInterval(function(){
                                if(parseInt($bloodDropChild.width()) < parseInt($face2Left-$face1Right+36)){
                                    $bloodDropChild.css({'width': ($bloodDropChild.width()+1)+'px'});
                                }else{
                                    $(".face2>span>i").removeClass('fa-frown-o');
                                    $(".face2>span>i").addClass('fa-smile-o');
                                    $(".face2>span").css({'color': '#fd1e3f'});
                                    $bloodDropChild.css({'border-top-right-radius': '0px', 'border-bottom-right-radius': '0px'});
                                }
                            }, 20);
                        }, 500);
                    }
                }
            });
        }else{
            $stArrs     = $stArr.split('||');
            for ($i = 0; $i < $stArrs.length; $i++) {
                $fields     = $stArrs[$i].split("|");
                if($fields[1] == 'F'){
                    $("#"+$fields[0]).parent().find("p").remove();
                    $("#"+$fields[0]).parent().append('<p style="color: #f00;font-size: 11px;margin-bottom: 0;margin-top: 5px">** Must fill this input!</p>');
                }else{
                    $("#"+$fields[0]).parent().find("p").remove();
                }
            }
        }
    });
	$(document).on("click", "#upd-info", function(){
        $state  = 'S';
        $stArr  = '';
        $updData  = new FormData();
        $(".info-body input[name='upd_info'], .info-body select[name='upd_info']").each(function(){
            $updData.append($(this).attr('id'), $(this).val());
            if ($(this).val() == "" && $(this).attr('id') != 'o_phone' && $(this).attr('id') != 'o_email') {
                $state = 'F';
                if ($stArr == "") {
                    $stArr = $(this).attr('id') + '|F';
                } else {
                    $stArr = $stArr + "||" + $(this).attr('id') + '|F';
                }
            } else {
                if ($stArr == "") {
                    $stArr = $(this).attr('id') + '|S';
                } else {
                    $stArr = $stArr + "||" + $(this).attr('id') + '|S';
                }
            }
        });
        if($state == 'S'){
            $.ajax({
                url: base_url+"profile/update_info",
                type: "POST",
                data: $updData,
                processData: false,
                contentType: false,
                cache: false,
                context: this,
                success: function (response) {
                    console.log(response);
                    if(response == 'S'){
                        window.location.reload();
                    }else{

                    }
                }
            });
        }else{
            $stArrs     = $stArr.split('||');
            for ($i = 0; $i < $stArrs.length; $i++) {
                $fields     = $stArrs[$i].split("|");
                if($fields[1] == 'F'){
                    $("#"+$fields[0]).parent().find("p").remove();
                    $("#"+$fields[0]).parent().append('<p style="color: #f00;font-size: 11px;margin-bottom: 0;margin-top: 5px">** Must fill this input!</p>');
                }
            }
        }
    });
	$(document).on("change", "#country", function(){
        $lang       = $(this).attr('alt');
        $count_id   = $(this).val();
        $.ajax({
            url: base_url+"basic/checkCity",
            type: "POST",
            data: {'lang': $lang, 'cid': $count_id},
            context: this,
            success: function (response) {
                console.log(response);
                $("#city").html(response);
            }
        });
    });
    $(document).on("change", "#city", function(){
        $lang       = $(this).attr('alt');
        $cit_id     = $(this).val();
        $.ajax({
            url: base_url+"basic/checkArea",
            type: "POST",
            data: {'lang': $lang, 'cid': $cit_id},
            context: this,
            success: function (response) {
                $("#area").html(response);
            }
        });
    });
    $(document).on("click", ".voter-icon-list>span", function(){
         $(".voter-id-pic-show").show('slow');
    });
    $(document).on("click", "#close_id", function(){
        $(".voter-id-pic-show").hide('slow');
    });
    $(document).on("click", "#close-donor", function(){
        $(".donor-details-panel").remove();
    });
    $(document).on("click", "#search", function(){
        $state  = 'S';
        $stArr  = '';
        $fData  = new FormData();
        $(".doner-find-box select").each(function(){
            $fData.append($(this).attr('id'), $(this).val());
            if($(this).val() == ""){
                $state  = 'F';
                if($stArr == ""){
                    $stArr = $(this).attr('id')+'|F';
                }else{
                    $stArr  = $stArr + "||" + $(this).attr('id')+'|F';
                }
            }else{
                if($stArr == ""){
                    $stArr = $(this).attr('id')+'|S';
                }else{
                    $stArr  = $stArr + "||" + $(this).attr('id')+'|S';
                }
            }
        });
        if($state == 'S'){
            console.log($fData);
        }else{
            $strArrs    = $stArr.split('||');
            for($i = 0;$i<$strArrs.length;$i++){
                $str    = $strArrs[$i].split('|');
                if($str[1] == 'F'){
                    $("#"+$str[0]).parent().find("p").remove();
                    $("#"+$str[0]).parent().append('<p style="color: #f00;font-size: 11px;margin-bottom: 0;margin-top: 5px">** Must fill this input!</p>');
                }else{
                    $("#"+$str[0]).parent().find("p").remove();
                }
            }
        }
    });
    $(document).on("change", ".donor-list-nearby>div>div>select", function(){
        $lang       = $(this).attr('alt');
        $b_id       = $(this).parent().parent().children().find('#searchNByBGroup').val();
        $ara_id     = $(this).parent().parent().children().find('#searchNByArea').val();
        $.ajax({
            url: base_url+"basic/searchForDonor",
            type: "POST",
            data: {'lang': $lang, 'co_id': '', 'ci_id': '', 'a_id': $ara_id, 'b_id': $b_id},
            context: this,
            success: function (response) {
                $(this).parent().parent().parent().children().find("#blood-donor-list").html(response);
            }
        });
    });
    $(document).on("change", ".donor-list-all>div>div>select", function(){
        $title  = $(this).attr('title');
        $lang   = $(this).attr('alt');
        if($title == 'country'){
            $count_id   = $(this).val();
            $.ajax({
                url: base_url + "basic/checkCity",
                type: "POST",
                data: {'lang': $lang, 'cid': $count_id},
                context: this,
                success: function (response) {
                    $("#searchByCity").html(response);
                }
            });
        }
        if($title == 'city'){
            $cit_id   = $(this).val();
            $.ajax({
                url: base_url + "basic/checkArea",
                type: "POST",
                data: {'lang': $lang, 'cid': $cit_id},
                context: this,
                success: function (response) {
                    $("#searchByArea").html(response);
                }
            });
        }

        $count_id   = $(this).parent().parent().children().find("#searchByCountry").val();
        $cit_id     = $(this).parent().parent().children().find("#searchByCity").val();
        $ara_id     = $(this).parent().parent().children().find("#searchByArea").val();
        $b_id       = $(this).parent().parent().children().find("#searchByBGroup").val();

        $.ajax({
            url: base_url+"basic/searchForDonor",
            type: "POST",
            data: {'lang': $lang, 'co_id': $count_id, 'ci_id': $cit_id, 'a_id': $ara_id, 'b_id': $b_id},
            context: this,
            success: function (response) {
                $(this).parent().parent().parent().children().find("#blood-donor-list").html(response);
            }
        });
    });
    $(document).on("click", ".donor-list-option>label", function(){
        $(".donor-list-option>label").removeClass('active-option');
        $(this).addClass('active-option');
        $id     = $(this).attr('for');
        console.log($id);
        $(".donor-list-body>div").css({'display': 'none'});
        $(".donor-list-body>#"+$id).css({'display': 'initial'});
    });
    $(document).on("click", ".blood-donor-info-box", function(){
        $id     = $(this).attr('id');
        $lang   = $(this).attr('alt');
        $.ajax({
            url: base_url+"donor/donorDetails",
            type: "POST",
            data: {'u_id': $id, 'lang': $lang},
            context: this,
            success: function(response){
                $("body").append(response);
            }
        });
    });
    $(document).on("focusout", "#cu_pass", function(){
        $pass   = $(this).val();
        if($pass != ""){
            $.ajax({
                url: base_url+"basic/checkcurrent_password",
                type: "POST",
                data: {'pass': $pass},
                context: this,
                success: function(response){
                    if(response == 'F'){
                        $(this).parent().find("p").remove();
                        $(this).css({'border-bottom': '1px solid #f00'});
                        $(this).parent().append('<p style="color: #f00;font-size: 11px;margin-bottom: 0;margin-top: 5px">** Wrong Password!</p>');
                    }else{
                        $(this).css({'border-bottom': '1px solid #f5f5f5'});
                        $(this).parent().find("p").remove();
                    }

                }
            });
        }else{
            $(this).css({'border-bottom': '1px solid #f5f5f5'});
            $(this).parent().find("p").remove();
        }
    });
    $(document).on("focusout", "#co_pass", function(){
        $n_pass     = $("#n_pass").val();
        $c_pass     = $(this).val();

        if($n_pass != $c_pass){
            $(this).parent().find("p").remove();
            $(this).css({'border-bottom': '1px solid #f00'});
            $(this).parent().append('<p style="color: #f00;font-size: 11px;margin-bottom: 0;margin-top: 5px">** Password Missmatch!</p>');
        }else{
            $(this).parent().find("p").remove();
            $(this).css({'border-bottom': '1px solid #f5f5f5'});
            $(this).parent().append('<p style="color: green;font-size: 11px;margin-bottom: 0;margin-top: 5px">** Password Matched!</p>');
        }
    });
    $(document).on("focusout", "#n_pass", function(){
        $n_pass     = $(this).val();
        if($n_pass != ""){
            $(this).parent().find("p").remove();
            $(this).css({'border-bottom': '1px solid #f5f5f5'});
        }
    });
    $(document).on("click", "#reset", function(){
        $pass       = $("#cu_pass").val();
        $n_pass     = $("#n_pass").val();
        $c_pass     = $("#co_pass").val();
        if($pass != "" && $n_pass != "" && $c_pass != "" && $n_pass == $c_pass){
            $.ajax({
                url: base_url+"basic/checkcurrent_password",
                type: "POST",
                data: {'pass': $pass},
                context: this,
                success: function(response){
                    if(response == 'F'){
                        $("#cu_pass").parent().find("p").remove();
                        $("#cu_pass").css({'border-bottom': '1px solid #f00'});
                        $("#cu_pass").parent().append('<p style="color: #f00;font-size: 11px;margin-bottom: 0;margin-top: 5px">** Wrong Password!</p>');
                    }else{
                        $.ajax({
                            url: base_url+"basic/reset_pass",
                            type: "POST",
                            data: {'pass': $c_pass},
                            success: function(response){
                                if(response == 'S'){
                                    $(".reset-panel").hide();
                                    $(".success-panel").show();
                                    window.location.href = base_url+"profile";
                                }else{
                                    $(".alert").removeClass('hide');
                                    $(".alert").addClass('show');
                                }
                            }
                        });
                    }

                }
            });
        }else{
            if($pass == ""){
                $("#cu_pass").parent().find("p").remove();
                $("#cu_pass").css({'border-bottom': '1px solid #f00'});
                $("#cu_pass").parent().append('<p style="color: #f00;font-size: 11px;margin-bottom: 0;margin-top: 5px">** Must Fill Input!</p>');
            }
            if($n_pass == ""){
                $("#n_pass").parent().find("p").remove();
                $("#n_pass").css({'border-bottom': '1px solid #f00'});
                $("#n_pass").parent().append('<p style="color: #f00;font-size: 11px;margin-bottom: 0;margin-top: 5px">** Must Fill Input!</p>');
            }
            if($c_pass == ""){
                $("#co_pass").parent().find("p").remove();
                $("#co_pass").css({'border-bottom': '1px solid #f00'});
                $("#co_pass").parent().append('<p style="color: #f00;font-size: 11px;margin-bottom: 0;margin-top: 5px">** Must Fill input!</p>');
            }
            if($n_pass != $c_pass){
                $("#co_pass").parent().find("p").remove();
                $("#co_pass").css({'border-bottom': '1px solid #f00'});
                $("#co_pass").parent().append('<p style="color: #f00;font-size: 11px;margin-bottom: 0;margin-top: 5px">** Password Missmatch!</p>');
            }
        }
    });
    $('.close').click(function(){
        $(".alert").removeClass("show");
        $(".alert").addClass("hide");
    });
    $('#benefit-close').click(function(){
        $(".benefit-panel").hide('slow');
    });
    $("#new-submit").click(function(){
        $body 		= $(".main-body");
        $alert 		= $(".alert");
        $state  = 'S';
        $stArr  = '';
        $fData  = new FormData();
        $(".new-reg-field input, .new-reg-field select").each(function(){
            if($(this).attr('id') != "submit") {
                $fData.append($(this).attr('id'), $(this).val());
                if ($(this).val() == "") {
                    $state = 'F';
                    if ($stArr == "") {
                        $stArr = $(this).attr('id') + '|F';
                    } else {
                        $stArr = $stArr + "||" + $(this).attr('id') + '|F';
                    }
                } else {
                    if ($stArr == "") {
                        $stArr = $(this).attr('id') + '|S';
                    } else {
                        $stArr = $stArr + "||" + $(this).attr('id') + '|S';
                    }
                }
            }

            if($state == 'S'){
                $.ajax({
                    url: base_url + "donor/regDonor",
                    type: "POST",
                    data: $fData,
                    context: this,
                    success: function (response) {
                        $spArr = response.split("||");
                        if($spArr[0] === 'Success'){
                            $(".slide-show").remove();
                            $body.html('<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12"><div class="blood-site-operation-reg"><div class="alert '+$spArr[1]+' alert-dismissible">'+$spArr[2]+'</div><div class="col-md-12 col-xs-12 col-sm-12 col-lg-12"><div class="col-md-6 col-xs-6 col-sm-6 col-lg-6"><div class="face1"><h3>Donor</h3><span><i class="fa fa-smile-o"></i></span></div></div><div class="col-md-6 col-xs-6 col-sm-6 col-lg-6"><div class="face2"><h3>RECIPIENT</h3><span><i class="fa fa-frown-o" aria-hidden="true"></i></span></div></div></div></div></div>');
                            $alert.show('slow');

                            setTimeout(function(){
                                window.location.href = base_url+"profile";
                            }, 10000);
                        }else{
                            setTimeout(function(){
                                $(".alert").hide('slow');
                            }, 3000);
                        }

                        $face1  = $(".face1>span").offset();
                        $face2  = $(".face2>span").offset();

                        $face1Right     = $face1.left+$(".face1>span").outerHeight(true);
                        $face2Left      = $face2.left;
                        $(".blood-site-operation-reg").append('<div class="blood-drop"><div></div></div><div class="col-md-12 col-xs-12 col-sm-12 col-lg-12"><div class="progress-info"><h3><b>Thank You!</b><br>Welcome to Online Large Blood Donation Program</h3><p>Wait few seconds to move on your profile automatically and complete registration to help people donating blood. This program helps you to find in your need too.<br>If want to go on without westing time please <a href="'+base_url+'blood/profile"><u><i>Click Here</i></u></a></p></div></div>');
                        $bloodDrop      = $(".blood-drop");
                        $bloodDropChild = $(".blood-drop>div");
                        $bloodDropChild.css({'width': '0px'});
                        if($(window).width() < 450){
                            $bloodDrop.css({'left': ($face1Right-58)+'px'});
                            $bloodDrop.css({'width': ($face2Left-$face1Right+45)+'px'});
                            setTimeout(function(){
                                setInterval(function(){
                                    if(parseInt($bloodDropChild.width()) < parseInt($face2Left-$face1Right+45)){
                                        $bloodDropChild.css({'width': ($bloodDropChild.width()+1)+'px'});
                                    }else{
                                        $(".face2>span>i").removeClass('fa-frown-o');
                                        $(".face2>span>i").addClass('fa-smile-o');
                                        $(".face2>span").css({'color': '#fd1e3f'});
                                        $bloodDropChild.css({'border-top-right-radius': '0px', 'border-bottom-right-radius': '0px'});
                                    }
                                }, 20);
                            }, 500);
                        }else{
                            $bloodDrop.css({'left': ($face1Right-49)+'px'});
                            $bloodDrop.css({'width': ($face2Left-$face1Right+34)+'px'});
                            setTimeout(function(){
                                setInterval(function(){
                                    if(parseInt($bloodDropChild.width()) < parseInt($face2Left-$face1Right+36)){
                                        $bloodDropChild.css({'width': ($bloodDropChild.width()+1)+'px'});
                                    }else{
                                        $(".face2>span>i").removeClass('fa-frown-o');
                                        $(".face2>span>i").addClass('fa-smile-o');
                                        $(".face2>span").css({'color': '#fd1e3f'});
                                        $bloodDropChild.css({'border-top-right-radius': '0px', 'border-bottom-right-radius': '0px'});
                                    }
                                }, 20);
                            }, 500);
                        }
                    }
                });
            }else{
                $stArrs     = $stArr.split('||');
                for ($i = 0; $i < $stArrs.length; $i++) {
                    $fields     = $stArrs[$i].split("|");
                    if($fields[1] == 'F'){
                        $("#"+$fields[0]).parent().find("p").remove();
                        $("#"+$fields[0]).parent().append('<p style="color: #f00;font-size: 11px;margin-bottom: 0;margin-top: 5px">** Must fill this input!</p>');
                    }else{
                        $("#"+$fields[0]).parent().find("p").remove();
                    }
                }
            }
        });
    });
    $(document).on("click", ".benifit-tag-box>div>ul>li", function () {
        $lang   = $(this).attr('title');
        $title  = $(this).attr('alt');
        $(".benefit-panel").show('slow');
        if($lang == 'en'){
            if($title=='Benefit1'){
                $(".benefit-head>h3").html("Reduce Heart and liver aliments");
                $(".benefit-body").html("<p>Blood donation is beneficial in reducing the risk of heart and liver ailments caused by the iron overload in the body. Intake of iron-rich diet may increase the iron levels in the body, and since only limited proportions can be absorbed, excess iron gets stored in the heart, liver, and the pancreas. This, in turn, increases the risk of cirrhosis, liver failure, damage to the pancreas, and heart abnormalities like irregular heart rhythms. Blood donation helps in maintaining iron levels and reduces the risk of various health ailments.</p>");
            }else if($title=='Benefit2'){
                $(".benefit-head>h3").html("Weight Reduce");
                $(".benefit-body").html("<p>Regular blood donation reduces the weight of the donors. This is helpful for those who are obese and are at a higher risk of cardiovascular diseases and other health disorders. However, blood donation should not be very frequent and you may consult your doctor before donating blood to avoid any health issues.</p>");
            }else if($title=='Benefit3'){
                $(".benefit-head>h3").html("lowering the risk of cancer");
                $(".benefit-body").html("<p>Blood donation helps in lowering the risk of cancer. By donating blood the iron stores in the body are maintained at healthy levels. According to a study published in the Journal of the National Cancer Institute, iron may cause of cancer and aging in the body. Researchers concluded that reduced iron stores caused due to blood donation may reduce cancer risk.</p>");
            }else if($title=='Benefit4'){
                $(".benefit-head>h3").html("reduced risk of hemochromatosis");
                $(".benefit-body").html("<p>Blood donation reduced risk of hemochromatosis. Hemochromatosis is a health condition that arises due to excess absorption of iron by the body. This may be inherited or may be caused due to alcoholism, anemia or other disorders. Regular blood donation may help in reducing iron overload. Make sure that the donor meets the standard blood donation eligibility criteria.</p>");
            }else if($title=='Benefit5'){
                $(".benefit-head>h3").html("Boosts new blood cells");
                $(".benefit-body").html("<p>After donating blood, the body works to replenish the blood loss. This stimulates the production of new blood cells and, in turn, helps in maintaining good health.</p>");
            }
        }else if($lang == 'bn'){
            if($title=='Benefit1'){
                $(".benefit-head>h3").html("হৃদরোগ এবং যকৃতের রোগের ঝুঁকি হ্রাস");
                $(".benefit-body").html("<p>শরীরের আয়রনের মাত্রা বৃদ্ধির ফলে হৃদরোগ এবং যকৃতের রোগের ঝুঁকি হ্রাসে রক্তদান উপকারী। আয়রন সমৃদ্ধ খাবার খাওয়ার ফলে শরীরের আয়রনের মাত্রা বৃদ্ধি পায়, এবং যা শরীর সীমিত অনুপাতকে শোষণ করতে পারে, অতিরিক্ত আয়রন জমা হয় হৃৎপিণ্ড, যকৃত এবং প্যানক্রিয়া গুলিতে। এর ফলে, সিরোসি, যকৃত সমস্যা, প্যানক্রিরি ক্ষতি সাধন, এবং হৃদযন্ত্রে অনিয়মিত হৃদরোগের ঝুঁকি বৃদ্ধি পায়। রক্তদান আয়রনের স্তরের সাম্য বজায় রাখতে সাহায্য করে এবং শরীরে বিভিন্ন রোগের ঝুঁকি হ্রাস করে।</p>");
            }else if($title=='Benefit2'){
                $(".benefit-head>h3").html("ওজন হ্রাস");
                $(".benefit-body").html("<p>নিয়মিত রক্তদান, দানকারীর ওজন হ্রাস করে। যারা স্থূলকায়, অতিরিক্ত কার্ডিওভাসকুলার রোগে  আক্রান্ত এবং অন্যান্য স্বাস্থ্যগত সমস্যার ঝুঁকিতে আছেন তাদের জন্য এটা সহায়ক। তবে, রক্ত দান খুব ঘন ঘন হওয়া উচিৎ নয় এবং স্বাস্থ্যগত যেকোনো সমস্যা এড়াতে রক্ত দান করার আগে আপনি আপনার ডাক্তারের সাথে পরামর্শ করতে পারেন।</p>");
            }else if($title=='Benefit3'){
                $(".benefit-head>h3").html("ক্যান্সারের ঝুঁকি কমায়");
                $(".benefit-body").html("<p>রক্তদান ক্যান্সারের ঝুঁকি কমাতে সাহায্য করে। রক্ত দান করার মধ্যমে শরীরের আয়রনের পরিমাণ স্বাস্থ্যকর মাত্রায় নিয়ন্ত্রিত থাকে। জাতীয় ক্যান্সার ইনস্টিটিউটের জার্নালে প্রকাশিত একটি গবেষণার মতে, আয়রন  শরীরের ক্যান্সার এবং বার্ধক্য বৃদ্ধির কারণ হতে পারে। গবেষকরা এই সিদ্ধান্তে পৌঁছেছেন যে, রক্ত দাণের কারণে রক্তের নিয়ন্ত্রিত আয়রনের পরিমাণ ক্যান্সারের ঝুঁকি কমাতে পারে। </p>");
            }else if($title=='Benefit4'){
                $(".benefit-head>h3").html("হেমোক্রোমাটোসিসের ঝুঁকি হ্রাস");
                $(".benefit-body").html("<p>রক্ত দান হেমোক্রোমাটোসিসের ঝুঁকি হ্রাস করে। হেমোক্রোমাটোসিস শরীরের অতিরিক্ত আয়রন শোষণের কারণে সৃষ্ট স্বাস্থ্যের একটি অবস্থা। এটা উত্তরাধিকারসূত্রে প্রাপ্ত হতে পারে বা মদ, অ্যানিমিয়া বা অন্যান্য রোগের কারণেও হতে পারে। নিয়মিত রক্ত দান আয়রনের মাত্রা কমাতে সাহায্য করতে পারে। নিশ্চিত করুন যে, দানকারী আদর্শ রক্ত দান যোগ্যতা মানদণ্ড পূরণ করে।</p>");
            }else if($title=='Benefit5'){
                $(".benefit-head>h3").html("নতুন রক্তকোষ উৎপাদন");
                $(".benefit-body").html("<p>রক্ত দান করার পর, শরীর রক্তের ক্ষতি পূরণে কাজ করে। এটি নতুন রক্তের কোষ উৎপাদনকে উদ্দীপিত করে এবং এর ফলে ভাল স্বাস্থ্য বজায় রাখতে সহায়তা করে।</p>");
            }
        }
    });
    $(window).scroll(function () {
        let position =$(this).scrollTop();
        if(position >=60){
            $('.left').addClass('fromLeft');
            $('.right').addClass('fromRight');
            $('.bottom').addClass('fromBottom');
        }
    });
});

function childBloodType($parent1, $parent2, $lang){
	$childBlood 	= '';
	if($lang == 'en'){
        if($parent1 === 'O'){
            if($parent2 === 'O'){
                $childBlood 	= 'O';
            }else if($parent2 === 'A'){
                $childBlood 	= 'O or A';
            }else if($parent2 === 'B'){
                $childBlood 	= 'O or B';
            }else if($parent2 === 'AB'){
                $childBlood 	= 'A or B';
            }
        }else if($parent1 === 'A'){
            if($parent2 === 'O'){
                $childBlood 	= 'O or A';
            }else if($parent2 === 'A'){
                $childBlood 	= 'O or A';
            }else if($parent2 === 'B'){
                $childBlood 	= 'O, A, B <b>or</b> AB';
            }else if($parent2 === 'AB'){
                $childBlood 	= 'A, B <b>or</b> AB';
            }
        }else if($parent1 === 'B'){
            if($parent2 === 'O'){
                $childBlood 	= 'O or B';
            }else if($parent2 === 'A'){
                $childBlood 	= 'O, A, B <b>or</b> AB';
            }else if($parent2 === 'B'){
                $childBlood 	= 'O or B';
            }else if($parent2 === 'AB'){
                $childBlood 	= 'A, B <b>or</b> AB';
            }
        }else if($parent1 === 'AB'){
            if($parent2 === 'O'){
                $childBlood 	= 'A or B';
            }else if($parent2 === 'A'){
                $childBlood 	= 'A, B <b>or</b> AB';
            }else if($parent2 === 'B'){
                $childBlood 	= 'A, B <b>or</b> AB';
            }else if($parent2 === 'AB'){
                $childBlood 	= 'A, B <b>or</b> AB';
            }
        }
    }else if($lang == 'bn'){
        if($parent1 === 'O'){
            if($parent2 === 'O'){
                $childBlood 	= 'ও';
            }else if($parent2 === 'এ'){
                $childBlood 	= 'ও বা এ';
            }else if($parent2 === 'B'){
                $childBlood 	= 'ও বা বি';
            }else if($parent2 === 'AB'){
                $childBlood 	= 'এ বা বি';
            }
        }else if($parent1 === 'A'){
            if($parent2 === 'O'){
                $childBlood 	= 'ও বা এ';
            }else if($parent2 === 'A'){
                $childBlood 	= 'ও বা এ';
            }else if($parent2 === 'B'){
                $childBlood 	= 'ও, এ, বি <b>বা</b> এবি';
            }else if($parent2 === 'AB'){
                $childBlood 	= 'এ, বি <b>বা</b> এবি';
            }
        }else if($parent1 === 'B'){
            if($parent2 === 'O'){
                $childBlood 	= 'ও বা বি';
            }else if($parent2 === 'A'){
                $childBlood 	= 'ও, এ, বি <b>বা</b> এবি';
            }else if($parent2 === 'B'){
                $childBlood 	= 'ও বা বি';
            }else if($parent2 === 'AB'){
                $childBlood 	= 'এ, বি <b>বা</b> এবি';
            }
        }else if($parent1 === 'AB'){
            if($parent2 === 'O'){
                $childBlood 	= 'এ বা বি';
            }else if($parent2 === 'A'){
                $childBlood 	= 'এ, বি <b>বা</b> এবি';
            }else if($parent2 === 'B'){
                $childBlood 	= 'এ, বি <b>বা</b> এবি';
            }else if($parent2 === 'AB'){
                $childBlood 	= 'এ, বি <b>বা</b> এবি';
            }
        }
    }
	return $childBlood;
}

var slideIndex = 0;
function showSlides() {
    showSlides1();

    function showSlides1() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 12000);
    }
}
var slideIndex1 = 0;
function showSlides1() {
    showSlides2();

    function showSlides2() {
        var i;
        var slides = document.getElementsByClassName("mySlides1");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides1, 12000);
    }
}