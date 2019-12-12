<?php
class Common_model extends CI_Model{

    function add($table_name,$data){
        try {
            $this->db->insert($table_name, $data);
            return $this->db->insert_id();
        } catch (Exception $e) {
            return FALSE;
        }
    }
}