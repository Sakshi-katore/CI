<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    function insert_record($table, $data) {
        $CI =& get_instance(); //needed bcz helpers don’t automatically have access to CI's libraries and methods.
        return $CI->db->insert($table, $data);
    }

    function update_record($table, $id, $data) {
        $CI =& get_instance();
        $CI->db->where('id', $id); //Sets the condition to find the specific record by its ID
        return $CI->db->update($table, $data);
    }

    function delete_record($table, $id) {
        $CI =& get_instance();
        $CI->db->where('id', $id);
        return $CI->db->delete($table);  //Uses CodeIgniter’s Database Library to delete the record
    }

    function get_record($table, $id) {
        $CI =& get_instance();
        $query = $CI->db->get_where($table, array('id' => $id)); //tell us from where to retrieve data
        return $query->row_array();
    }

    function get_all_records($table) {
        $CI =& get_instance();
        $query = $CI->db->get($table);
        return $query->result_array();
    }
?>
