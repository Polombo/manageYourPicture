<?php

error_reporting(0);

class Upload extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper('funciones_helper');
    }

    /*
      function index()
      {
      $this->load->view('upload_form', array('error' => ' ' ));
      } */

//    function do_upload() {
//        $nombre_directorio = $this->uri->segment(1);
//
//        echo "nombre directorio: $nombre_directorio";
//        //exit;
//        //replace spaces with underscore
//        //$nombre_cadena = clean($email);
////        $nombre_hotel = clean($nombre_hotel);
////        $last_id_inserted = $last_id;
//        //echo "luego  ".$nombre_cadena;
//        //$path = "./uploads/".$nombre_directorio."/".$nombre_cadena."/".$nombre_hotel."/images/";
//
//        $path = "./uploads/images/" . $nombre_directorio . "/";
//
//
//        if (!is_dir($path)) { //create the folder if it's not already exists
//            mkdir($path, 0775, true);
//        }
//
//        $this->load->library('upload');
//
//        $files = $_FILES;
//        $cpt = count($_FILES['userfile']['name']);
//
//        //echo "<pre> $cpt $files</pre>";
//
//        for ($i = 0; $i < $cpt; $i++) {
//            echo "ostas";
//            $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
//            $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
//            $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
//            $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
//            $_FILES['userfile']['size'] = $files['userfile']['size'][$i];
//
//            $this->upload->initialize($this->set_upload_options($path));
////            $this->upload->do_upload();
//
//            /*             * ********************
//              Update full path in DB
//             * ******************** */
//            $config['file_name'] = $_FILES['userfile']['name'];
//            $config['upload_path'] = $path;
//            $config['full_path'] = $path . $config['file_name'];
//
//            $data_foto = array(
//                'url_image' => $config['full_path']
//            );
//            $last_id_inserted = 1;
//
//            $this->_update($last_id_inserted, $data_foto);
//
//            if (!$this->upload->do_upload()) {
//                $error = array('error' => $this->upload->display_errors());
//
//                $this->load->view('upload_form', $error);
//            } else {
//                $data = array('upload_data' => $this->upload->data());
//
//                $this->load->view('upload_success', $data);
//            }
//        }
//    }

    function do_upload($nombre, $email) {
//        echo $nombre;
//        echo $email;

        $nombre_cadena = clean($nombre);
        $nombre_directorio = $this->uri->segment(1);
        $path = "./uploads/images/" . $nombre_directorio . "/$email/";

        if (!is_dir($path)) { //create the folder if it's not already exists
            mkdir($path, 0775, true);
        }

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $config['overwrite'] = TRUE;
       

        $this->load->library('upload', $config);
        
        $files = $_FILES;
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form', $error);
        } else {
            // $data = array('upload_data' => $this->upload->data());

            $data_foto = array(
                'url_image' => $config['upload_path'].$_FILES['userfile']['name']
            );
            //$last_id_inserted = 1;

            $this->_update($email, $data_foto);
            
            $data['module'] = "upload";
            $data['view_file'] = "upload_form";
            $data['title'] = "";
            $data['url_image'] = $config['upload_path'].$_FILES['userfile']['name'];
            echo Modules::run('template/web_template', $data);


            // $this->load->view('upload_success', $data);
        }
    }

//    private function set_upload_options($path) {
////  upload an image options
//        $config = array();
//        $config['upload_path'] = $path;
//        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size'] = '100000';
//        $config['overwrite'] = FALSE;
//
//        return $config;
//    }

    function _update($email, $data) {
        $this->load->model('mdl_upload');
        $this->mdl_upload->_update($email, $data);
    }

}

?>