<?php
defined('BASEPATH') OR exit('No direct script access allowed');


    function create_record($table, $data) {
        $C =& get_instance();
        return $C->db->insert($table, $data);
    }



    function update_record($table, $data, $where) {
        $C =& get_instance();
        $C->db->where($where);
        return $C->db->update($table, $data);
    }



    function delete_record($table, $where) {
        $C =& get_instance();
        $C->db->where($where);
        return $C->db->delete($table);
    }



    function read_record($table, $where = array(), $single = FALSE) {
        $C =& get_instance();
        if (!empty($where)) {
            $C->db->where($where);
        }
        $query = $C->db->get($table);
        return $single ? $query->row_array() : $query->result_array();
    }



    function get_all_records($table) {
        $C =& get_instance();
        $query = $C->db->get($table);
        return $query->result_array();
    }

?>
