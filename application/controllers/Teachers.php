<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('database_helper');
        $this->load->library('form_validation');
        $this->load->model('Teacher_model');
    }

    public function index() {
        $data['teachers'] = get_all_records('teachers');
        $this->load->view('teachers/index', $data);
    }

    public function create() {
        // Set form validation rules for fields that are actually in the form
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('teachers/create');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'subject' => $this->input->post('subject'),
                'email' => $this->input->post('email')
            );
            if (insert_record('teachers', $data)) {
                redirect('teachers');
            } else {
                $data['error'] = 'Error inserting record.';
                $this->load->view('teachers/create', $data);
            }
        }
    }
    
    

    public function edit($id) {
        $data['teacher'] = $this->Teacher_model->get_teacher_by_id($id);

        if (empty($data['teacher'])) {
            show_404();
        }

        $this->load->view('teachers/edit', $data);
    }

    public function update() {
        $id = $this->input->post('id');
        $data = array(
            'name' => $this->input->post('name'),
            'subject' => $this->input->post('subject'),
            'email' => $this->input->post('email')
        );

        if ($this->Teacher_model->update_teacher($id, $data)) {
            redirect('teachers');
        } else {
            $data['error'] = 'Error updating record.';
            $this->load->view('teachers/edit', $data);
        }
    }

    public function delete($id) {
        if ($this->Teacher_model->delete_teacher($id)) {
            redirect('teachers');
        } else {
            $data['error'] = 'Error deleting record.';
            $data['teachers'] = get_all_records('teachers');
            $this->load->view('teachers/index', $data);
        }
    }
}
?>
