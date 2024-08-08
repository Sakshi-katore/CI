<?php

class StudentGallery_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Method to save uploaded file information
    public function save_file($file_name) {
        $data = array(
            'file_name' => $file_name,
            'upload_path' => 'uploads/' . $file_name,
            'uploaded_on' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('student_photos', $data);
    }

    // Method to fetch all images
    public function get_images() {
        $query = $this->db->get('student_photos');
        return $query->result();
    }

    
    public function get_image_by_id($student_id) {
        $this->db->where('id', $student_id);
        $query = $this->db->get('student_photos');
        
        return $query->row();
    }
    
}
?>