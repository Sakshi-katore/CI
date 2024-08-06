<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*function get_company_phone() {
    return get_value_from_db('company_Number');
}

function get_company_name() {
    return get_value_from_db('Company_name');
}

function get_company_email() {
    return get_value_from_db('email');
}

function get_company_number() {
    return get_value_from_db('Company_number');
} */

function get_company_info($key) {
    $CI =& get_instance();
    $CI->load->database();

    $CI->db->limit(1);  //get one row
    $query = $CI->db->get_where('key_value_store', array('key' => $key));  //select where key matches key!

    $result = $query->row_array();            //          fetches the query

    return $result['value'] ?? 'Not available';
}

function set_company_info($key, $value) {
    $CI =& get_instance();
    $CI->load->database();
    $data = array('value' => $value); //  prepares the data array that will be inserted or updated

    if (key_exists_in_db($key)) {
        $CI->db->where('key', $key);
        return $CI->db->update('key_value_store', $data);
    } else {
        $data['key'] = $key;
        return $CI->db->insert('key_value_store', $data);
    }
}

function key_exists_in_db($key) {
    $CI =& get_instance();
    $CI->load->database();
    $CI->db->limit(1);
    $query = $CI->db->get_where('key_value_store', array('key' => $key));
    return $query->num_rows() > 0;
}

function delete_company_info($key) {
    $CI =& get_instance();
    $CI->load->database();
    $CI->db->where('key', $key);
    return $CI->db->delete('key_value_store');
}

function format_phone_number($number) {
    $number = preg_replace('/[^0-9]/', '', $number);
    if (strlen($number) == 10) {
        return '+91 ' . substr($number, 0, 3) . ' ' . substr($number, 3, 3) . ' ' . substr($number, 6, 4);
    } else {
        return $number;
    }
}
?>