<?php
class Events extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Event_model');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['events'] = $this->Event_model->get_events();
        $this->load->view('events/index', $data);
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('events/create');
        } else {
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date')
            );
            $this->Event_model->add_event($data);
            redirect('event');
        }
    }

    public function delete($id) {
        $this->Event_model->delete_event($id);
        redirect('event');
    }
}
