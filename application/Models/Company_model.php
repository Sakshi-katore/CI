<?php
class Company_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_settings() {
        $query = $this->db->get('company_settings');
        return $query->result_array();
    }

    public function get_setting($id) {
        $query = $this->db->get_where('company_settings', array('id' => $id));
        return $query->row_array();
    }

    public function update_setting($id, $data) {
        $this->db->where('id', $id);
        if (!$this->db->update('company_settings', $data)) {
            // Log the error
            log_message('error', 'Database update error: ' . $this->db->_error_message());
            return false;
        }
        return true;
    }
    
    

    public function add_setting($data) {
        return $this->db->insert('company_settings', $data);
    }

    public function delete_setting($id) {
        $this->db->where('id', $id);
        return $this->db->delete('company_settings');
    }

    public function get_setting_by_key($key) {
        $query = $this->db->get_where('company_settings', array('key' => $key));
        return $query->row_array();
    }
}
?>
