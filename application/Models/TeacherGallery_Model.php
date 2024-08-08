<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeacherGallery_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function save_file($file_name) {
        $data = array(
            'file_name' => $file_name,
            'upload_path' => 'uploads/' . $file_name,
            'uploaded_on' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('teacher_photos', $data);
    }

    public function get_images() {
        $query = $this->db->get('teacher_photos');
        return $query->result();
    }

    public function get_image_by_id($teacher_id) {
        $this->db->where('id', $teacher_id);
        $query = $this->db->get('teacher_photos');
        return $query->row();
    }
}
