<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    private $table_name;
    private $view_name;

    public function __construct($table_name = null, $view_name = null) {
        parent::__construct();
        $this->table_name = $table_name;
        $this->view_name = $view_name;
    }

    public function index() {
        $this->load->view('upload_form');
    }

    public function view_gallery($type) {
        $this->load->model('Gallery_model');

        $this->initialize_table_and_view($type);

        // Fetch the data
        $data['images'] = $this->Gallery_model->get_images($this->table_name);

        // Load the view with the data
        $this->load->view($this->view_name, $data);
    }

    public function upload_images($type) {
        $this->load->library('upload');
        $this->load->model('Gallery_model');

        $this->initialize_table_and_view($type);

        // Configuration for file upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2 MB
        $config['max_width'] = 2048;
        $config['max_height'] = 2048;

        $this->upload->initialize($config);

        if (!empty($_FILES['userfile']['name'][0])) {
            $files = $_FILES;
            $number_of_files = count($_FILES['userfile']['name']);

            for ($i = 0; $i < $number_of_files; $i++) {
                $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

                if ($this->upload->do_upload('userfile')) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $upload_path = 'uploads/' . $file_name;

                    // Save file information in the database
                    $this->Gallery_model->save_file($this->table_name, $file_name, $upload_path);
                } else {
                    // Error handling
                    $error = $this->upload->display_errors();
                    echo "Error: " . $error;
                }
            }

            // Load success view
            $this->load->view('upload_success');
        } else {
            // No files selected
            echo "No files selected.";
        }
    }

    private function initialize_table_and_view($type) {
        if ($type === 'student') {
            $this->table_name = 'student_photos';
            $this->view_name = 'student_gallery';
        } elseif ($type === 'school') {
            $this->table_name = 'uploaded_files';
            $this->view_name = 'school_gallery';
        } else {
            show_404();
        }
    }
}
