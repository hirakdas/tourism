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

    function get_all($table_name){
        $query = $this->db->get($table_name);
        return $query->result_array();
    }

    function get_one($table_name,$column_name,$column_id){
        $this->db->where($column_name,$column_id);
        $query = $this->db->get($table_name);
        return $query->row_array();
    }

    function update($table_name,$column_name,$column_id,$data){
        $this->db->where($column_name, $column_id);
        $this->db->update($table_name, $data);
        return TRUE;
    }

    function delete($table_name,$column_name,$column_id){
        $this->db->where($column_name, $column_id);
        $this->db->delete($table_name);
        return TRUE;
    }

    function add_batch($table_name,$data){
        try {
            $this->db->insert_batch($table_name,$data);
            return $this->db->insert_id();
        } catch (Exception $e) {
            return FALSE;
        }
    }
}