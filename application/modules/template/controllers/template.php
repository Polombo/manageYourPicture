<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MX_Controller {

    function one_col($data){
        $this->load->view('one_col', $data);
    }
    
    function two_col($data){
        $this->load->view('two_col', $data);
    }
    
    function admin($data){
        $this->load->view('admin_temp', $data);
    }
    
    function web_template($data){
        $this->load->view('web_template', $data);
    }
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
