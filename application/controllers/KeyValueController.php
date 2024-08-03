<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KeyValueController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('key_value'); // Load the custom helper
    }

    public function index() {
        $this->load->view('key_value_view');
    }

    public function get_value($key) {
        $data = get_value_from_db($key); // Use the helper function
        if ($data) { // If the key was found in the database
            echo json_encode($data); // Return the data as JSON
        } else {
            echo json_encode(array('error' => 'Key not found'));
        }
    }

    public function set_value() {
        $key = $this->input->post('key');
        $value = $this->input->post('value');
        if (set_value_in_db($key, $value)) { // Use the helper function
            echo "Value set successfully";
        } else {
            echo "Failed to set value";
        }
    }

    public function delete_value() {
        $key = $this->input->post('key');
        if (delete_value_from_db($key)) { // Use the helper function
            echo "Value deleted successfully";
        } else {
            echo "Failed to delete value";
        }
    }

    public function view_value() {
        $this->load->view('view_value_form');
    }

    public function fetch_value() {
        $key = $this->input->post('key');
        $data['value'] = get_value_from_db($key); // Use the helper function
        $this->load->view('key_value_view', $data);
    }
}
?>
