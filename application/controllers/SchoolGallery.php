<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SchoolGallery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('SchoolGallery_model');
        $this->load->helper('upload_helper');
    }

    public function index() {
        $this->load->view('upload_form');
    }

    public function view_gallery() {
        $data['images'] = $this->SchoolGallery_model->get_images();
        $this->load->view('school_gallery', $data);
    }

    
    public function upload_images() {
        $gallery_type = 'school'; 
        $result = handle_uploads('./uploads/' , $gallery_type);
        
        if (isset($result['error'])) {
            echo "Error: " . $result['error'];
        } else {
            $this->load->view('upload_success');
        }
    }
    
}
