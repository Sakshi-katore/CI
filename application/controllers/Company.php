<?php
class Company extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this->load->model('Company_model'); // Load the Company_model
    $this->load->helper(array('url', 'company')); // Load URL and custom helpers
    $this->load->library('form_validation'); // Load form validation library
}

public function index() {
    $data['settings'] = $this->Company_model->get_settings(); // Get all company settings
    $this->load->view('company/index', $data); // Load the index view with settings data
}

public function create() {
    $this->load->view('company/create'); // Load the create view
}

public function store() {
    // Set validation rules for 'key' and 'value'
    $this->form_validation->set_rules('key', 'Key', 'required');
    $this->form_validation->set_rules('value', 'Value', 'required|callback_format_value');

    if ($this->form_validation->run() === FALSE) {
        $this->load->view('company/create'); // Reload the create view if validation fails
    } else {
        $key = $this->input->post('key'); // Get 'key' input
        $value = $this->input->post('value'); // Get 'value' input
        $formatted_value = $this->format_value($value, $key); // Format the value

        if ($formatted_value === false) {
            $this->load->view('company/create'); // Reload the create view if formatting fails
            return;
        }

        // Prepare data for insertion
        $data = array(
            'key' => $key,
            'value' => $formatted_value
        );
        $this->Company_model->add_setting($data); // Add the setting to the database
        redirect('company'); // Redirect to the index method
    }
}

public function edit($id) {
    $data['setting'] = $this->Company_model->get_setting($id); // Get specific setting by ID
    $this->load->view('company/edit', $data); // Load the edit view with setting data
}

public function update() {
    // Set validation rules for 'key' and 'value'
    $this->form_validation->set_rules('key', 'Key', 'required');
    $this->form_validation->set_rules('value', 'Value', 'required|callback_format_value');

    $id = $this->input->post('id'); // Get 'id' input

    if ($this->form_validation->run() === FALSE) {
        $data['setting'] = $this->Company_model->get_setting($id); // Get specific setting by ID if validation fails
        $this->load->view('company/edit', $data); // Reload the edit view
    } else {
        $key = $this->input->post('key'); // Get 'key' input
        $value = $this->input->post('value'); // Get 'value' input
        $formatted_value = $this->format_value($value, $key); // Format the value

        if ($formatted_value === false) {
            $data['setting'] = $this->Company_model->get_setting($id); // Get specific setting by ID if formatting fails
            $this->load->view('company/edit', $data); // Reload the edit view
            return;
        }

        // Prepare data for update
        $data = array(
            'key' => $key,
            'value' => $formatted_value
        );

        // Debugging: Log the data before updating
        // log_message('debug', 'Updating setting with ID: ' . $id);
        // log_message('debug', 'Update data: ' . print_r($data, true));

        $this->Company_model->update_setting($id, $data); // Update the setting in the database

        // Debugging: Check if the update was successful
        if ($this->db->affected_rows() > 0) {
            log_message('debug', 'Update successful'); // Log success message
        } else {
            log_message('debug', 'Update failed'); // Log failure message
        }

        redirect('company'); // Redirect to the index method
    }
}


public function delete($id) {
    $this->Company_model->delete_setting($id); // Delete the setting by ID
    redirect('company'); // Redirect to the index method
}

public function format_value($value, $key) {
    $key = strtolower($key); // Convert key to lowercase

    if (preg_match('/^email\d*$/i', $key)) { // Check if key is an email
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->form_validation->set_message('format_value', 'The {field} field must be a valid email address.');
            return false; // Invalid email format
        }
    } elseif (preg_match('/^date$/i', $key) || preg_match('/^dateformat$/i', $key)) { // Check if key is a date or date format
        $date = DateTime::createFromFormat('d-m-Y', $value);
        if ($date === false) {
            $this->form_validation->set_message('format_value', 'The {field} field must be in the format DD-MM-YYYY.');
            return false; // Invalid date format
        }
        $value = $date->format('Y-m-d'); // Format date to Y-m-d
    } elseif ($key == 'companynumber' || $key == 'mobile') { // Check if key is a company number or mobile
        $cleaned_value = preg_replace('/\D/', '', $value); // Remove non-digit characters

        if (strlen($cleaned_value) == 10) {
            $value = '+91 ' . substr($cleaned_value, 0, 3) . ' ' . substr($cleaned_value, 3, 3) . ' ' . substr($cleaned_value, 6); // Format to +91 XXX XXX XXXX
        } else {
            $this->form_validation->set_message('format_value', 'The {field} field must be a valid 10-digit phone number.');
            return false; // Invalid phone number
        }
    }

    return $value; // Return the formatted value
}
}
?>
