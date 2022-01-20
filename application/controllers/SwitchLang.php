<?php
defined('BASEPATH') or die("Unable to load script automatically");

class SwitchLang extends Base_controller{
    function __construct(){
        parent::__construct();
    }

    function switchLanguage(){
        if(isset($_SERVER['HTTP_REFERER'])) {
            $previous = $_SERVER['HTTP_REFERER'];
        }
        $lang   = $this->uri->segment('3');
        $this->switchLang($lang);
        redirect($previous);
    }
}