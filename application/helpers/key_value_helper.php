<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Function to get a value from the database for a given key
function get_value_from_db($key) {
    $C =& get_instance();
    $C->load->database();
    $C->db->limit(1); // Ensure only one row is fetched
    $query = $C->db->get_where('key_value_store', array('key' => $key));
    
    return $query->row_array(); // Fetch a single row
}

// Function to set (insert or update) a value in the database for a given key
function set_value_in_db($key, $value) {
    $C =& get_instance();
    $C->load->database();

    // Check if the value is a date in dd-mm-yyyy or dd/mm/yyyy format and convert it to yyyy-mm-dd
    if (preg_match('/^\d{2}[-\/]\d{2}[-\/]\d{4}$/', $value)) {
        $value = convert_date_to_yyyy_mm_dd($value);
    }

    // Check if the value is a mobile number and format it
    if (preg_match('/^\d{10}$/', $value)) {
        $value = format_mobile_number($value);
    }

    $data = array(
        'key' => $key,
        'value' => $value
    );

    // Check if the key already exists in the 'key_value_store' table
    $C->db->where('key', $key);
    $query = $C->db->get('key_value_store');

    if ($query->num_rows() > 0) {
        // Key exists, update the existing value
        $C->db->where('key', $key);
        return $C->db->update('key_value_store', $data);
    } else {
        // Key does not exist, insert a new key-value pair
        return $C->db->insert('key_value_store', $data);
    }
}

// Function to delete a value from the database for a given key
function delete_value_from_db($key) {
    $C =& get_instance();
    $C->load->database();
    $C->db->where('key', $key);
    return $C->db->delete('key_value_store');
}

// Function to convert date to yyyy-mm-dd format
function convert_date_to_yyyy_mm_dd($date) {
    $date = str_replace('/', '-', $date); // Replace '/' with '-' if present
    return date('Y-m-d', strtotime($date));
}

// Function to format mobile number to +91 777 699 3990
function format_mobile_number($number) {
    return '+91 ' . substr($number, 0, 3) . ' ' . substr($number, 3, 3) . ' ' . substr($number, 6, 4);
}

?>
