<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('upload');

    }

    public function index() {
        $data['error'] = ''; //error message passed to the view
        $this->load->view('upload_form', $data);
    }

    public function do_upload() {
        // echo '<pre>';
        // print_r($_POST);
        // print_r($_FILES);
        // // exit();
                
        //$config['upload_path'] = './uploads/';

        $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] .'/uploads';     // Use the path from config
        //$config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 4096;  // 4MB
        $config['max_width'] = 5000;  // Increased max width to 5000px
        $config['max_height'] = 5000;  // Increased max height to 5000px

        //$config['upload_path'] = './uploads/';
        //$config['upload_path'] = './ci/uploads/';
        //$config['upload_path'] = 'E:/php working/CodeIgniter-3.1.13/ci/uploads/';


        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        // echo '<pre>';
        // print_r($this->upload->initialize($config));
        // exit();
        if (!$this->upload->do_upload('userfile')) {
            print_r($this->upload->display_errors());
            //if failed
            exit();
            $data['error'] = $this->upload->display_errors();
            $this->load->view('upload_form', $data);
        } else {
            //if success
            $data['upload_data'] = $this->upload->data();
            $this->load->view('upload_success', $data);
        }
    }
}
