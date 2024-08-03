<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Student_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['marks'] = $this->Student_model->get_all_records(); // Fetch all student records
        $this->load->view('students/index', $data); // Pass data to the view
    }

    public function create() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|exact_length[10]|is_unique[records.mobile]');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[records.email]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('students/create');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'mobile' => $this->input->post('mobile'),
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email')
            );
            if ($this->Student_model->insert_record($data)) {
                redirect('students');
            } else {
                $data['error'] = 'Error inserting record.';
                $this->load->view('students/create', $data);
            }
        }
    }

    public function edit($id) {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|exact_length[10]|callback_mobile_check[' . $id . ']');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check[' . $id . ']');
    
        if ($this->form_validation->run() === FALSE) {
            $data['mark'] = $this->Student_model->get_by_id($id);
            if ($data['mark']) {
                $this->load->view('students/edit', $data);
            } else {
                show_404();
            }
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'mobile' => $this->input->post('mobile'),
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email')
            );
            if ($this->Student_model->update($id, $data)) {
                redirect('/');
            } else {
                $data['error'] = 'Error updating record.';
                $data['mark'] = $this->Student_model->get_by_id($id);
                $this->load->view('students/edit', $data);
            }
        }
    }
    

    public function delete($id) {
        if ($this->Student_model->delete_record($id)) {
            redirect('students');
        } else {
            $data['error'] = 'Error deleting record.';
            $data['marks'] = $this->Student_model->get_all_records();
            $this->load->view('students/index', $data);
        }
    }

    public function mobile_check($mobile, $id) {
        if ($this->Student_model->mobile_exists($mobile, $id)) {
            $this->form_validation->set_message('mobile_check', 'The mobile number is already in use.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function email_check($email, $id) {
        if ($this->Student_model->email_exists($email, $id)) {
            $this->form_validation->set_message('email_check', 'The email address is already in use.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
