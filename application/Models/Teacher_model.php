<?php
class Teacher_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all_teachers() {
        return get_all_records('teachers');
    }

    public function get_teacher_by_id($id) {
        return get_record('teachers', $id);
    }

    public function insert_teacher($data) {
        return insert_record('teachers', $data);
    }

    public function update_teacher($id, $data) {
        return update_record('teachers', $id, $data);
    }

    public function delete_teacher($id) {
        return delete_record('teachers', $id);
    }
}

