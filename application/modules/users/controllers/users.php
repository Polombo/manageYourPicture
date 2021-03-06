<?php

require './src/Instagram.php';

use MetzWeb\Instagram\Instagram;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function manage() {
        $insertion = false;
        $data = '';

//      echo "DENTRO DE UsersMAnage";
        $name = str_replace('%20', ' ', $this->uri->segment(3));
        $email = $this->uri->segment(4);

        if ($name == '' || $email == '') {
            redirect('http://localhost/manage_your_picture');
        }

        $this->load->model('mdl_users');
        $userExistance = $this->mdl_users->checkUserExistance($name, $email);

        //echo $userExistance;
        //If user exists
        if ($userExistance === TRUE) {
            //echo "entro";
            $userTerms = $this->mdl_users->checkUserTerms($email);
            //echo "userterms $userTerms";
            if ($userTerms === TRUE) {
                //echo "firmados terms";                      
                $data['module'] = "upload";
                $data['view_file'] = "upload_form";
                $data['title'] = "";
                $data['url_image'] = $this->mdl_users->getUrlImage($email);
            } else {
                $data['module'] = "users";
                $data['view_file'] = "terms";
                $data['title'] = "";
            }
        } else {
            //echo "/n NO existe/n";
            $date = date("Y-m-d H:i:s");
            $data_col = array(
                'name' => $name,
                'email' => $email,
                'sign_in_date' => $date
            );

            //Quick email check
            if (strpos($email, '@') !== FALSE) {
                $this->mdl_users->_insert($data_col);
                $insertion = TRUE;
            }

            //If user is inserted open terms screen to accept
            if ($insertion === TRUE) {
                $data['module'] = "users";
                $data['view_file'] = "terms";
                $data['title'] = "";
            }
        }

        echo Modules::run('template/web_template', $data);
    }

    function manageInsta() {

        //session_start();

        
        $data = '';
        $email = null;
        $instagram = new Instagram(array(
            'apiKey' => '347cba88348f415b8338f90b1cc289b6',
            'apiSecret' => 'a11565cb51a6435a85ea967fe6725e0f',
            'apiCallback' => 'http://localhost/manageYourPicture/users/manageInsta/'
        ));

        $code = $_GET['code'];
        $dataInsta = $instagram->getOAuthToken($code);
        $name = $dataInsta->user->username;

        $this->load->model('mdl_users');
        $userExistance = $this->mdl_users->checkUserExistance($name, $email);

        if ($userExistance === TRUE) {
            $userTerms = $this->mdl_users->checkUserTermsInsta($name);
            if ($userTerms === TRUE) {
//                echo "firmados terms";                      
                $data['module'] = "upload";
                $data['view_file'] = "upload_form";
                $data['title'] = "";
                $data['url_image'] = $this->mdl_users->getUrlImageInsta($name);
            } else {
//                echo 'no firmados';
                $data['module'] = "users";
                $data['view_file'] = "terms";
                $data['title'] = "";
                $data['nameInsta'] = $name;
            }
        } else {
            //echo "/n NO existe/n";
            $date = date("Y-m-d H:i:s");
            $data_col = array(
                'name' => $name,
                'sign_in_date' => $date
            );

            $this->mdl_users->_insert($data_col);

            $data['module'] = "users";
            $data['view_file'] = "terms";
            $data['title'] = "";
        }

        echo Modules::run('template/web_template', $data);
    }

    function submitTerms() {
        
        //session_start();
        
        $data = '';
        $nameInsta = $this->uri->segment(3);      
        $email = $this->uri->segment(4);
        //echo $email;

        $this->load->model('mdl_users');
        
        if ($nameInsta !== "") {            
            $this->mdl_users->setUserTermsInsta($nameInsta);
            $data['url_image'] = $this->mdl_users->getUrlImageInsta($nameInsta);
        } else {
            $this->mdl_users->setUserTerms($email);
            $data['url_image'] = $this->mdl_users->getUrlImage($email);
        }

        $data['module'] = "upload";
        $data['view_file'] = "upload_form";
        $data['title'] = "";

        echo Modules::run('template/web_template', $data);
    }

    function agree_check($str) {

        if ($str != '1') {
            $this->form_validation->set_message('agree_check', ' Debe marcar como aceptadas las condiciones de la web');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function manage_users() {

        $sql_users = "SELECT * FROM users";

        $data['query'] = $this->_custom_query($sql_users);
        $data['view_file'] = "manage_users";
        $data['module'] = "users";
        //$data['idtiponoticia'] = $idtiponoticia;
        //TITULO DE LA VENTANA (PARA TODOS ES LA MISMA)
        //$data['title']="ACTUALIDADES";

        $this->load->module('template');
        $this->template->admin($data);
    }

    function get($order_by) {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_users');
        $this->mdl_users->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_users');
        $this->mdl_users->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_users');
        $this->mdl_users->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_users');
        $count = $this->mdl_users->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_users');
        $max_id = $this->mdl_users->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->_custom_query($mysql_query);
        return $query;
    }

}
