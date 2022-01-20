<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	if(!function_exists('asset_url')){
		function asset_url(){
			return base_url().'assets/';
		}
	}

	if(!function_exists('css_url')){
		function css_url(){
			return base_url().'assets/css/';
		}
	}

	if(!function_exists('js_url')){
		function js_url(){
			return base_url().'assets/js/';
		}
	}

	if(!function_exists('image_url')){
		function image_url(){
			return base_url().'assets/images/';
		}
	}

	if(!function_exists('profile_url')){
		function profile_url(){
			return 'D:/xampp/htdocs/Google/bloodbook/assets/images/profile/';
		}
	}

	if(!function_exists('voterid_url')){
		function voterid_url(){
			return 'D:/xampp/htdocs/Google/bloodbook/assets/images/voterid/';
		}
	}

	if(!function_exists('icon_url')){
		function icon_url(){
			return base_url().'assets/images/icon/';
		}
	}

	if(!function_exists('banner_url')){
		function banner_url(){
			return base_url().'assets/images/banner/';
		}
	}
?>