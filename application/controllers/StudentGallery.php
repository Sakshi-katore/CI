<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentGallery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('StudentGallery_model');
        $this->load->helper('upload_helper');
    }

    public function index() {
        $this->load->view('upload_form_student');
    }

    public function fetch_student() {
        $student_id = $this->input->post('student_id');
        $data['image'] = $this->StudentGallery_model->get_image_by_id($student_id);

        if (!empty($data['image'])) {
            $this->load->view('student_gallery', $data);
        } else {
            echo "No image found for Student ID: " . $student_id;
        }
    }

    public function view_gallery() {
        $data['images'] = $this->StudentGallery_model->get_images();
        $this->load->view('student_gallery', $data);
    }

   
    public function upload_images() {
        $gallery_type = 'students'; 
        $result = handle_uploads('./uploads/' , $gallery_type);
        
        if (isset($result['error'])) {
            echo "Error: " . $result['error'];
        } else {
            $this->load->view('upload_success');
        }
    }
    
    

    public function student_gallery($id) {
        $data['image'] = $this->StudentGallery_model->get_image_by_id($id);
        $this->load->view('student_gallery', $data);
    }
}
