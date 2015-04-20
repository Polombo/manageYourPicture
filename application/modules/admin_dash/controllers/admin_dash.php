<?php
class Admin_dash extends MX_Controller 
{

    function __construct() {
        parent::__construct();
        Modules::run('site_security/make_sure_is_admin');
    }
    
    function index(){
       // echo "index admin dash";
    }
    
    function menuAdmin() {
        
        $data['view_file'] = "";
        $this->load->module('template');
        $this->template->admin($data);
    
    }
    
    function manage_users(){

        $this->load->module('users');
        $this->users->manage_users();
    }

}