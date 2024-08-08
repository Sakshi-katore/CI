<?php
class Mul_upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('Upload_model');
        $this->load->helper('upload_helper');
    
    }
    
    public function multiple_upload() {
        if (empty($_FILES['images']['name'][0])) { // Checks if the first file name is empty, indicating no files were selected.
            $error = array('error' => 'No files selected.');
            $this->load->view('mul_upload_form', $error);
            return;
        }
    
        // Handle the file upload using helper function
        $result = handle_file_upload($_FILES['images'], './uploads/', 'gif|jpg|jpeg|png', 4096, 5000, 5000, 'uploaded_files');
    
        if (!empty($result['errors'])) { // If there are errors
            $data['error'] = implode('<br>', $result['errors']);
            $this->load->view('mul_upload_form', $data);
        } else { // If no errors
            $this->load->view('mul_upload_success', array('upload_data' => $result['upload_data']));
        }
    }
    }
    ?> 
    
    
    