<?php
class Hooks {

    var $CI;

    function Hooks()
    {
        $this->CI =& get_instance();
        if(!isset($this->CI->session))  
        $this->CI->load->library('session'); 
    }
    
    function checkSession() {
        
        $url = explode("/", $_SERVER['REQUEST_URI']);
         if(count($url) <= 3)
            return;
         if(!$this->CI->session->userdata['id']){ 
             redirect($url[2]);
        }
    }

}

?> 