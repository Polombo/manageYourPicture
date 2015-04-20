<?php
class Site_security extends MX_Controller 
{

    function __construct() {
        parent::__construct();
    }
    
    function make_hash($password){
        $safe = md5($password);
        return $safe;
    }

    
    function make_sure_is_admin(){
        $user_id = $this->session->userdata('admin');
        
        if(!is_numeric($user_id)){
            redirect(base_url());
        }
    }

}