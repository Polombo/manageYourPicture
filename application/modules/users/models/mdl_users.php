<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_users extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "users";
        return $table;
    }

    function checkUserExistance($name, $email) {

        $table = $this->get_table();
        $this->db->where('name', $name);
        $this->db->where('email', $email);
        $query = $this->db->get($table);
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function checkUserTerms($email) {

        $table = $this->get_table();
        $this->db->where('terms', 'yes');
        $this->db->where('email', $email);
        $query = $this->db->get($table);
        $num_rows = $query->num_rows();

        //echo $this->db->last_query();

        if ($num_rows > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function insertUser($name, $email) {

        $sql_user = "INSERT INTO users (name, email, sign_in_date ) VALUES ('$name', '$email', NOW())";
        echo $sql_user;

        $query = $this->_custom_query($sql_user);
        echo $this->db->last_query();
        //exit;        
        if (!$query) {
            throw new Exception("Error inserting the user");
        } else {
            return TRUE;
        }
    }

    function setUserTerms($email) {

        $sql_set = "UPDATE users SET terms = 'yes' WHERE email = '$email'";       

        $query = $this->_custom_query($sql_set);
        //echo $this->db->last_query();
        //exit;        
        if (!$query) {
            throw new Exception("Error updating the user");
        } else {
            return TRUE;
        }
    }

    function getUserId($email) {

        $sql_getId = "SELECT id FROM users WHERE email = '$email'";
        $query = $this->db->query($sql_getId);
        $data = [];

        foreach ($query->result() as $row) {
            $data['id'] = $row->id;
        }

        //echo $this->db->last_query();
        //exit;        
        if (!$query) {
            throw new Exception("Error DB");
        } else {
            return $data['id'];
        }
    }
    
    function getUrlImage($email) {

        $sql_getUrl = "SELECT url_image FROM users WHERE email = '$email'";
        $query = $this->db->query($sql_getUrl);
        $data = [];

        foreach ($query->result() as $row) {
            $data['url_image'] = $row->url_image;
        }

        //echo $this->db->last_query();
        //exit;        
        if (!$query) {
            throw new Exception("Error DB");
        } else {
            return $data['url_image'];
        }
    }    

    function get($order_by) {
        $table = $this->get_table();
        $this->db->order_by($order_by);
        $query = $this->db->get($table);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $table = $this->get_table();
        $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query = $this->db->get($table);
        return $query;
    }

    function get_where($id) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        return $query;
    }

    function get_where_custom($col, $value) {
        $table = $this->get_table();
        $this->db->where($col, $value);
        $query = $this->db->get($table);
        return $query;
    }

    function _insert($data) {
        $table = $this->get_table();
        $this->db->insert($table, $data);
    }

    function _update($id, $data) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    function _delete($id) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $this->db->delete($table);
    }

    function count_where($column, $value) {
        $table = $this->get_table();
        $this->db->where($column, $value);
        $query = $this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function count_all() {
        $table = $this->get_table();
        $query = $this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function get_max() {
        $table = $this->get_table();
        $this->db->select_max('id');
        $query = $this->db->get($table);
        $row = $query->row();
        $id = $row->id;
        return $id;
    }

    function _custom_query($mysql_query) {
        $query = $this->db->query($mysql_query);
        return $query;
    }

}
