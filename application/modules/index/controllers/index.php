<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        //$data['module'] = "pages";
        /* Index es la pantalla principal
         * Se le tienen que pasar las noticias y los videos que 
         * hay en la web.Tendran que ser consultas separadas para cada parte del
         * contenido.
         */
        //$this->load->module('noticias');
        //obtener ultimas 7 noticias de dos meses atras
        //$query_news = $this->noticias->getLastnews();
        //$data['query_news'] = $query_news;

        /* $this->load->module('videos');
          $query_videos = $this->videos->get('fecha');
          $data['query_videos'] = $query_videos; */

        
        $data['module'] = "index";
        $data['view_file'] = "index";
        $data['title'] = "";
        //$this->load->view('tasks/display',$data);
        //echo "ANTES MODULES RUN";
        echo Modules::run('template/web_template', $data);        
    }

    function get($order_by) {
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_perfectcontroller');
        $this->mdl_perfectcontroller->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_perfectcontroller');
        $this->mdl_perfectcontroller->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_perfectcontroller');
        $this->mdl_perfectcontroller->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_perfectcontroller');
        $count = $this->mdl_perfectcontroller->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_perfectcontroller');
        $max_id = $this->mdl_perfectcontroller->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->_custom_query($mysql_query);
        return $query;
    }

}
