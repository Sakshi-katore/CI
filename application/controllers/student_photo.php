<?php
class Student_photo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Upload_model');
        $this->load->helper('upload');
    }

    public function upload() {
        if (empty($_FILES['student_photo']['name'])) {
            $error = array('error' => 'No file selected.');
            $this->load->view('upload_form', array_merge($error, ['upload_url' => site_url('student_photo/upload')]));
            return;
        }

        $result = handle_file_upload($_FILES['student_photo'], 'studentgallery');

        if (!empty($result['errors'])) {
            $data['error'] = implode('<br>', $result['errors']);
            $this->load->view('upload_form', array_merge($data, ['upload_url' => site_url('student_photo/upload')]));
        } else {
            $this->load->view('upload_success', ['upload_data' => $result['upload_data']]);
        }
    }
}
?>
