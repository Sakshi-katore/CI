<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_file($data, $table) {
        return $this->db->insert($table, $data);
    }

    public function get_files($gallery_type) {
        $table = ($gallery_type == 'student_photos') ? 'student_photos' : 'uploaded_files';
        return $this->db->get($table)->result_array();
    }
}
