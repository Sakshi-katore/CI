<?php
class Keys extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Key_model');
        $this->load->helper('custom'); // Load helper
        $this->load->library('form_validation'); // Load the form validation library
    }

    public function index() {
        // Load the custom helper
        //$this->load->helper('custom');
        
        // Call the helper function directly
        $data['keys'] = get_all_records('keys');
        
        // Load the view and pass the data
        $this->load->view('keys/index', $data);
    }
    

    public function create() {
        $this->form_validation->set_rules('date_key', 'Date Key', 'required');
        $this->form_validation->set_rules('company_name', 'Company Name', 'required');
        $this->form_validation->set_rules('company_address', 'Company Address', 'required');
        $this->form_validation->set_rules('email1', 'Email 1', 'required|valid_email');
        $this->form_validation->set_rules('email2', 'Email 2', 'required|valid_email');
        $this->form_validation->set_rules('dateTime', 'Date Time', 'required');
        $this->form_validation->set_rules('company_number', 'Company Number', 'required|regex_match[/^[0-9]{10}$/]', array('regex_match' => 'The %s field must be exactly 10 digits.'));
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('keys/create');
        } else {
            $company_number = $this->input->post('company_number');
            $formatted_company_number = '+91 ' . substr($company_number, 0, 3) . ' ' . substr($company_number, 3, 3) . ' ' . substr($company_number, 6, 4);
    
            $data = array(
                'date_key' => $this->input->post('date_key'),
                'company_name' => $this->input->post('company_name'),
                'company_address' => $this->input->post('company_address'),
                'email1' => $this->input->post('email1'),
                'email2' => $this->input->post('email2'),
                'dateTime' => $this->input->post('dateTime'),
                'company_number' => $formatted_company_number
            );
            create_record('keys', $data);
            redirect('keys');
        }
    }

    public function edit($id) {
        $this->form_validation->set_rules('date_key', 'Date Key', 'required');
        $this->form_validation->set_rules('company_name', 'Company Name', 'required');
        $this->form_validation->set_rules('company_address', 'Company Address', 'required');
        $this->form_validation->set_rules('email1', 'Email 1', 'required|valid_email');
        $this->form_validation->set_rules('email2', 'Email 2', 'required|valid_email');
        $this->form_validation->set_rules('dateTime', 'Date Time', 'required');
        $this->form_validation->set_rules('company_number', 'Company Number', 'required|regex_match[/^[0-9]{10}$/]', array('regex_match' => 'The %s field must be exactly 10 digits.'));
    
        if ($this->form_validation->run() === FALSE) {
            $data['key'] = read_record('keys', array('id' => $id), TRUE);
            $this->load->view('keys/edit', $data);
        } else {
            $company_number = $this->input->post('company_number');
            $formatted_company_number = '+91 ' . substr($company_number, 0, 3) . ' ' . substr($company_number, 3, 3) . ' ' . substr($company_number, 6, 4);
    
            $data = array(
                'date_key' => $this->input->post('date_key'),
                'company_name' => $this->input->post('company_name'),
                'company_address' => $this->input->post('company_address'),
                'email1' => $this->input->post('email1'),
                'email2' => $this->input->post('email2'),
                'dateTime' => $this->input->post('dateTime'),
                'company_number' => $formatted_company_number
            );
            update_record('keys', $data, array('id' => $id));
            redirect('keys');
        }
    }

    public function delete($id) {
        delete_record('keys', array('id' => $id));
        redirect('keys');
    }
}

?>
