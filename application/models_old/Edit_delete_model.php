<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Edit_delete_model extends CI_Model {
    function update_data_onerow($table_name, $data, $where_column, $where_column_value){
        $this->db->where($where_column, $where_column_value);
        $this->db->update($table_name, $data);
    }
    function insert_data($table_name, $data){
        $query=$this->db->insert($table_name, $data);
        return $query;
    }
    function delete_info($table_id, $deleted_id, $table_name){
        $this->db->where($table_id, $deleted_id);
        $query=$this->db->delete($table_name);
        return $query;
    }







}
?>