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
    function get_all_where($table_name,$column_name,$column_id){
        $this->db->where($column_name,$column_id);
        $query = $this->db->get($table_name);
        return $query->result_array();
    }

    function get_one($table_name,$column_name,$column_id){
        $this->db->where($column_name,$column_id);
        $query = $this->db->get($table_name);
        return $query->row_array();
    }

    function update($table_name,$column_name,$column_id,$data){
        try {
        $this->db->where($column_name, $column_id);
        $this->db->update($table_name, $data);

        return TRUE;
        }
        catch (Exception $e) {
            return FALSE;
        }
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

    function get_tour_id($tour_name){
        $this->db->where('tour_name',$tour_name);
        $this->db->select('id');
        $query = $this->db->get('destination');
        return $query->row_array();
    }

    function get_all_destination($id){
        $this->db->select('*');
        $this->db->from('destination');
        $this->db->join('destination_text', 'destination.id = destination_text.tour_id');
        $this->db->where('destination.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
}