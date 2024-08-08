<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    function handle_uploads($upload_path, $gallery_type) {
        $CI =& get_instance();
        $CI->load->library('upload');
        
        // Load configuration
        $CI->config->load('gallery');
        $model_name = $CI->config->item('gallery_model_mapping')[$gallery_type] ?? null;

        if ($model_name) {
            $CI->load->model($model_name); // Load the appropriate model
        } else {
            return ['error' => 'Invalid gallery type.'];
        }

        $files = $_FILES;          // Get all the files that were uploaded.
        $number_of_files = count($_FILES['userfile']['name']);        //then count

        $uploaded_files = [];            // Array to store

        for ($i = 0; $i < $number_of_files; $i++) {
            $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
            $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
            $_FILES['userfile']['size'] = $files['userfile']['size'][$i];




            // Generate a unique file name with a timestamp
            $new_filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048; // 2 MB
            $config['file_name'] = $new_filename;
            $config['overwrite'] = TRUE;

            $CI->upload->initialize($config);           // Initialize the upload library with the config.


            if (!$CI->upload->do_upload('userfile')) {
                return ['error' => $CI->upload->display_errors()];
            } else {
                $upload_data = $CI->upload->data();
                $uploaded_files[] = $upload_data['file_name'];   

                
                $CI->$model_name->save_file($upload_data['file_name']);  // Save file information in the database using the model
            } 
        }

        return ['uploaded_files' => $uploaded_files];       // Return the list of uploaded files
    }

    function get_file_path($file_name, $upload_dir) {
        return base_url($upload_dir . '/' . $file_name);
    }



