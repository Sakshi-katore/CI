<?php
class Student_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all_records() {
        $query = $this->db->get('records'); // Replace 'records' with your table name
        return $query->result_array();
    }

    public function get_by_id($id) {
        $query = $this->db->get_where('records', array('id' => $id)); // Replace 'records' with your table name
        return $query->row_array();
    }

    public function insert_record($data) {
        return $this->db->insert('records', $data); // Replace 'records' with your table name
    }

    public function update_record($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('records', $data); // Replace 'records' with your table name
    }

    public function delete_record($id) {
        return $this->db->delete('records', array('id' => $id)); // Replace 'records' with your table name
    }

    public function mobile_exists($mobile, $id) {
        $this->db->where('mobile', $mobile);
        $this->db->where('id !=', $id);
        $query = $this->db->get('records'); // Replace 'records' with your table name
        return $query->num_rows() > 0;
    }

    public function email_exists($email, $id) {
        $this->db->where('email', $email);
        $this->db->where('id !=', $id);
        $query = $this->db->get('records'); // Replace 'records' with your table name
        return $query->num_rows() > 0;
    }
}
