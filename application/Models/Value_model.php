<?php
class Value_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_values($key_id) {
        $query = $this->db->get_where('values', array('key_id' => $key_id));
        return $query->result_array();
    }

    public function add_value($key_id, $value) {
        $data = array(
            'key_id' => $key_id,
            'value' => $value
        );
        return $this->db->insert('values', $data);
    }

    public function update_value($id, $value) {
        $data = array(
            'value' => $value
        );
        $this->db->where('id', $id);
        return $this->db->update('values', $data);
    }

    public function delete_value($id) {
        return $this->db->delete('values', array('id' => $id));
    }
}
