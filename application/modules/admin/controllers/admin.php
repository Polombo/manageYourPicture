<?php

class Admin extends MX_Controller {

    function index() {


        if ($this->session->userdata('admin')) {
            //echo "ADMIN SESEION";
            $data = "";
            $this->load->module('template');
            $this->template->admin($data);
        } else {
            //echo "ADMIN NO SESEION";
            $this->load->view('login');
        }
    }

    function submitLogin() {

        //echo "Form login submitted";

        $this->load->library('form_validation');

        $this->form_validation->set_rules('admin', 'Admin', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('pass', 'Password', 'required|max_length[100]|xss_clean|callback_pword_check');

        if ($this->form_validation->run() == FALSE) {
            //echo "VALIDACION MALA";
            //si el formulario falla...se carga el modulo de nuevo
            $this->load->view('login');
            //redirect("admin");
        } else {
            //echo "VALIDACION BUENA";
            $username = $this->input->post('admin', TRUE);
            $pass = $this->input->post('pass', TRUE);

            $pass = md5($pass);
            //echo "$username md5($pass)";

            $this->_in_you_go($username);
        }
    }

    /*     * ***** FUNCION QUE VIENE DEL CALLBACK DE LAS REGLAS DEL FORM ************* */

    function pword_check($pass) {

        echo "PASS CHECK";
        exit;
        $username = $this->input->post('admin', TRUE);

        $pass = Modules::run('site_security/make_hash', $pass);

        $this->load->model('mdl_admin');
        $result = $this->mdl_admin->pword_check($username, $pass);

        if ($result == FALSE) {
            $this->form_validation->set_message('pword_check', 'Usuario y/o password incorrectos');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function _in_you_go($username) {
        //give them a session and send them to the admin panel
        //echo "VALIDACION USER";
        $query = $this->get_where_custom('nombre_admin', $username);
        foreach ($query->result() as $row) {
            $user_id = $row->id_administrador;
        }
        $this->session->set_userdata('admin', $user_id);

        $data = "";
        echo Modules::run('template/admin', $data);
    }

    function get($order_by) {
        $this->load->model('mdl_admin');
        $query = $this->mdl_admin->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_admin');
        $query = $this->mdl_admin->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_admin');
        $query = $this->mdl_admin->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_admin');
        $query = $this->mdl_admin->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_admin');
        $this->mdl_admin->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_admin');
        $this->mdl_admin->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_admin');
        $this->mdl_admin->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_admin');
        $count = $this->mdl_admin->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_admin');
        $max_id = $this->mdl_admin->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_admin');
        $query = $this->mdl_admin->_custom_query($mysql_query);
        return $query;
    }

}
