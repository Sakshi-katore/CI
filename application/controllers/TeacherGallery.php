<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeacherGallery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('TeacherGallery_model');
        $this->load->helper('upload_helper');
    }

    public function index() {
        $this->load->view('upload_form_teacher');
    }

    public function fetch_teacher() {
        $teacher_id = $this->input->post('teacher_id');
        $data['image'] = $this->TeacherGallery_model->get_image_by_id($teacher_id);

        if (!empty($data['image'])) {
            $this->load->view('teacher_gallery', $data);
        } else {
            echo "No image found for Teacher ID: " . $teacher_id;
        }
    }

    public function view_gallery() {
        $data['images'] = $this->TeacherGallery_model->get_images();
        $this->load->view('teacher_gallery', $data);
    }

    public function upload_images() {
        $gallery_type = 'teachers'; // or 'school' or 'teachers'
        $result = handle_uploads('./uploads/' , $gallery_type);
        
        if (isset($result['error'])) {
            echo "Error: " . $result['error'];
        } else {
            $this->load->view('upload_success');
        }
    }

    public function teacher_gallery($id) {
        $data['image'] = $this->TeacherGallery_model->get_image_by_id($id);
        $this->load->view('teacher_gallery', $data);
    }
}
