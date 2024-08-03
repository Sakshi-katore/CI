<?php
class Marks extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('database'); // Load the custom helper
        $this->load->library('form_validation');
        $this->load->model('Mark_model'); 
    }

    public function index() {
        $data['marks'] = get_all_records('marks');
        $this->load->view('marks/index', $data);
    }

    public function create() {
        $this->form_validation->set_rules('record_id', 'Record ID', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('marks', 'Marks', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('marks/create');
        } else {
            $data = array(
                'record_id' => $this->input->post('record_id'),
                'subject' => $this->input->post('subject'),
                'marks' => $this->input->post('marks')
            );
            if (insert_record('marks', $data)) {
                redirect('marks');
            } else {
                $data['error'] = 'Error inserting record.';
                $this->load->view('marks/create', $data);
            }
        }
    }

    public function edit($id) {
        $this->form_validation->set_rules('record_id', 'Record ID', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('marks', 'Marks', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $data['mark'] = get_record('marks', $id);
            if ($data['mark']) {
                $this->load->view('marks/edit', $data);
            } else {
                show_404();
            }
        } else {
            $data = array(
                'record_id' => $this->input->post('record_id'),
                'subject' => $this->input->post('subject'),
                'marks' => $this->input->post('marks')
            );
            if (update_record('marks', $id, $data)) {
                redirect('marks');
            } else {
                $data['error'] = 'Error updating record.';
                $data['mark'] = get_record('marks', $id);
                $this->load->view('marks/edit', $data);
            }
        }
    }

    public function delete($id) {
        if (delete_record('marks', $id)) {
            redirect('marks');
        } else {
            $data['error'] = 'Error deleting record.';
            $this->load->view('marks/index', $data);
        }
    }
}
?>
