<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SchoolGallery_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Method to save uploaded file information
    /*public function save_file($file_name, $upload_path) {
        $data = array(
            'file_name' => $file_name,
            'upload_path' => $upload_path,
            
        );
        
        return $this->db->insert('uploaded_files', $data);
    }*/

    public function save_file($file_name) {
        $data = array(
            'file_name' => $file_name,
            'upload_path' => 'uploads/' . $file_name,
            'uploaded_on' => date('Y-m-d H:i:s') // Set current timestamp
        );
    
        return $this->db->insert('uploaded_files', $data);
    }
    
    // Method to fetch all images
    public function get_images() {
        $query = $this->db->get('uploaded_files');
        return $query->result();
    }
}