<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends MX_Controller
{

    function __construct() {
        parent::__construct();
    }
    
    function manage(){
        
        $sql_agenda = "SELECT * FROM agenda order by fecha DESC";
        
        $data['query'] = $this->_custom_query($sql_agenda);
        $data['title'] = "AGENDA";
        $data['view_file'] = "manage_agenda";
        $data['module'] = "agenda";

        $this->load->module('template');
        $this->template->admin($data);
        
    }
    
    function get_data_from_post(){
        //var_dump($this->input->post());
        
        $data['titulo'] = $this->input->post('titulo', TRUE);
        $data['imagen'] = $this->input->post('imagenAgenda', TRUE);
        $data['descripcion'] = $this->input->post('descripcion', TRUE);
        $data['txt_corto'] = $this->input->post('txt_corto', TRUE);
        $data['fecha'] = $this->input->post('fecha', TRUE);
        $data['publicado'] = $this->input->post('publicado',TRUE);
        $data['parrilla'] = $this->input->post('parrilla',TRUE);
        $data['lugar'] = $this->input->post('lugar',TRUE);
        
        return $data;
        
    }//get data from post

    function get_data_from_db($update_id){
        
        try {
            
            $query = $this->get_where($update_id);
            
            //var_dump($query);
            foreach($query->result() as $row){
                $data['idagenda'] = $update_id;
                $data['titulo'] = $row->titulo;
                $data['descripcion'] = $row->descripcion;
                $data['txt_corto'] = $row->txt_corto;
                $data['fecha'] = $row->fecha;
                $data['publicado'] = $row->publicado;
                $data['parrilla'] = $row->parrilla;
                $data['lugar'] = $row->lugar;
                                
            }

            return $data;
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }//get data from db
    
    function delete($delete_id){
        
        $this->_delete($delete_id);
        //llamamos al a pantalla inicial        
        $this->manage();
    }
    
    function submit_agenda(){
        
        try{
            //echo "FORMULARIO SUBMIT";
            $this->load->library('form_validation');

            if($this->input->post('chkfile', TRUE)==1){
                $this->form_validation->set_rules('imagenAgenda', 'Imagen', 'required|max_lenght[250]|xss_clean');
            }
            $this->form_validation->set_rules('titulo', 'titulo', 'required|max_lenght[45]|xss_clean');
            $this->form_validation->set_rules('descripcion', 'Descripcion','required|max_lenght[250]|xss_clean');
            $this->form_validation->set_rules('fecha', 'Fecha', 'required|xss_clean');
            $this->form_validation->set_rules('txt_corto', 'Texto Abreviado', 'required|max_lenght[50]|xss_clean');
            
            if ($this->form_validation->run($this) == FALSE)
            {
                $this->create();
            }
            else{

                $data = $this->get_data_from_post();

                //var_dump($data);

                $update_id = $this->uri->segment(3);

                if(is_numeric($update_id)){
                    $sql = "UPDATE agenda
                            SET titulo = '{$data['titulo']}',
                            descripcion = '{$data['descripcion']}',
                            txt_corto = '{$data['txt_corto']}',
                            imagen = '{$data['imagen']}',
                            fecha = '{$data['fecha']}',
                            eliminado = 0,
                            publicado = '{$data['publicado']}',
                            parrilla = '{$data['parrilla']}'
                            WHERE idagenda = {$update_id}";

                    //$this->_update($update_id, $data);
                    //die($sql);
                    $resultado = $this->_custom_query($sql);
                    if(!$resultado){
                        throw new Exception("Error al actualizar la agenda.");
                    }
                    
                    $this->create($update_id);
                    
                }else{
                    
                    //var_dump($data);
                    if($data['publicado']=="0"){
                        $data['publicado']= 1;
                    }else{
                        $data['publicado']=0;
                    }
                    
                    if($data['parrilla']=="0"){
                        $data['parrilla'] = 1;
                    }else{
                        $data['parrilla']= 0;
                    }
                    
                    //echo $data['fecha'];
                    
                    $sql = "INSERT INTO agenda (titulo,descripcion,txt_corto,
                            imagen,fecha,lugar,publicado,parrilla)
                            VALUES ('{$data['titulo']}','{$data['descripcion']}',
                                    '{$data['txt_corto']}','{$data['imagen']}',
                                    '{$data['fecha']}','{$data['lugar']}',
                                    '{$data['publicado']}','{$data['parrilla']}')";

                    //$this->_insert($data);
                    //die();
                    $this->_custom_query($sql);
                    
                    //$this->create();
                    redirect(base_url().'admin_dash/manage_agenda/');
                }

                //redirect('articulos/manage');

            }
            
        }catch (Exception $e){
            //DEBERIA DE HACER UN ROLLBACK
            echo $e->getMessage();
        }
    }//submit agenta
    
    function create(){
        
        $update_id = $this->uri->segment(3);//id pasado por url
        
        $submit = $this->input->post('submit', TRUE);
        
        if($submit=="Alta Agenda"){
            $data = $this->get_data_from_post();
        }else{

            if(is_numeric($update_id)){
                $data =$this->get_data_from_db($update_id);
                
                //print_r($data);
                //die();
            }
        }

        if(!isset($data)){
            $data = $this->get_data_from_post();
        }
        
        //var_dump($data);
        $data['update_id'] = $update_id;
        
        $data['view_file'] = "create_agenda";
        $this->load->module('template');
        $this->template->admin($data);
        
    }//create
    
    function get($order_by){
        $this->load->model('mdl_agenda');
        $query = $this->mdl_agenda->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_agenda');
        $query = $this->mdl_agenda->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id){
        $this->load->model('mdl_agenda');
        $query = $this->mdl_agenda->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_agenda');
        $query = $this->mdl_agenda->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data){
        $this->load->model('mdl_agenda');
        $this->mdl_agenda->_insert($data);
    }

    function _update($id, $data){
        $this->load->model('mdl_agenda');
        $this->mdl_agenda->_update($id, $data);
    }

    function _delete($id){
        $this->load->model('mdl_agenda');
        $this->mdl_agenda->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_agenda');
        $count = $this->mdl_agenda->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_agenda');
        $max_id = $this->mdl_agenda->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_agenda');
        $query = $this->mdl_agenda->_custom_query($mysql_query);
        return $query;
    }

}
