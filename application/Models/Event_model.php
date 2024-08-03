<?php
class Event_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_events() {
        $query = $this->db->get('events');
        return $query->result_array();
    }

    public function add_event($data) {
        return $this->db->insert('events', $data);
    }

    public function delete_event($id) {
        return $this->db->delete('events', array('id' => $id));
    }
}
