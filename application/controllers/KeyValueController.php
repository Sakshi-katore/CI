<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KeyValueController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('key_value_helper');
    }

    public function company_info() {
        $this->load->view('company_info_view');
    }

    public function index() {
        $this->load->view('key_value_view');
    }

    public function set_value() {
        $key = $this->input->post('key');
        $value = $this->input->post('value');

        // d-m-Y format
        if (preg_match('/^\d{2}-\d{2}-\d{4}$/', $value)) {
            $date = DateTime::createFromFormat('d-m-Y', $value);
            if ($date) {
                $value = $date->format('Y-m-d');
            } else {
                echo "Invalid date format";
                return;
            }
        }

        if (in_array($key, ['company_Number', 'company_number', 'companyNumber', 'companynumber'])) {
            $value = format_phone_number($value);
        }

        if (set_company_info($key, $value)) {
            echo "Value set successfully";
        } else {
            echo "Failed to set value";
        }
    }

    public function fetch_value() {
        $key = $this->input->post('key');
        $data['key'] = $key;
        $data['value'] = get_company_info($key);

        $this->load->view('key_value_view', $data);
    }

    public function delete_value() {
        $key = $this->input->post('key');
        if (delete_company_info($key)) {
            echo "Value deleted successfully";
        } else {
            echo "Failed to delete value";
        }
    }
}
?>