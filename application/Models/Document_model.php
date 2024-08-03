<?php
class Document_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all() {
        $query = $this->db->get('documents');
        return $query->result_array();
    }

    public function get_by_id($id) {
        $query = $this->db->get_where('documents', array('id' => $id));
        return $query->row_array();
    }

    public function insert($data) {
        return $this->db->insert('documents', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('documents', $data);
    }

    public function delete($id) {
        return $this->db->delete('documents', array('id' => $id));
    }
}
?>
