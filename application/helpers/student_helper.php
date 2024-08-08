<?php
if (!function_exists('handle_file_upload')) {
    function handle_file_upload($files, $config = [], $additional_fields = []) {
        $CI =& get_instance();
        $CI->load->library('upload');
        $CI->load->database();

        // Ensure $config is an array
        if (!is_array($config)) {
            $config = [];
        }

        // Ensure $additional_fields is an array
        if (!is_array($additional_fields)) {
            $additional_fields = [];
        }

        // Set default configuration values
        $default_config = [
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|jpeg|png',
            'max_size' => 4096,
            'max_width' => 5000,
            'max_height' => 5000,
            'table_name' => 'uploaded_files',
        ];

        // Merge provided config with default config
        $config = array_merge($default_config, $config);

        $upload_data = [];
        $errors = [];

        // Check if the input is an array or a single file
        if (isset($files['name']) && is_array($files['name'])) {
            // Multiple files
            foreach ($files['name'] as $key => $name) {
                $_FILES['file']['name'] = $files['name'][$key];
                $_FILES['file']['type'] = $files['type'][$key];
                $_FILES['file']['tmp_name'] = $files['tmp_name'][$key];
                $_FILES['file']['error'] = $files['error'][$key];
                $_FILES['file']['size'] = $files['size'][$key];

                $unique_id = uniqid();
                $timestamp = time();
                $extension = pathinfo($name, PATHINFO_EXTENSION);
                $new_name = $unique_id . '_' . $timestamp . '.' . $extension;

                $upload_config = $config;
                $upload_config['file_name'] = $new_name;

                $CI->upload->initialize($upload_config);

                if (!$CI->upload->do_upload('file')) {
                    $errors[] = $CI->upload->display_errors();
                } else {
                    $data = $CI->upload->data();
                    $upload_data[] = $data;

                    $file_data = array_merge([
                        'file_name' => $data['file_name'],
                        'upload_path' => $data['full_path'],
                        'uploaded_on' => date('Y-m-d H:i:s')
                    ], $additional_fields);

                    $CI->db->insert($config['table_name'], $file_data);
                }
            }
        } elseif (isset($files['name']) && !is_array($files['name'])) {
            // Single file
            $_FILES['file']['name'] = $files['name'];
            $_FILES['file']['type'] = $files['type'];
            $_FILES['file']['tmp_name'] = $files['tmp_name'];
            $_FILES['file']['error'] = $files['error'];
            $_FILES['file']['size'] = $files['size'];

            $unique_id = uniqid();
            $timestamp = time();
            $extension = pathinfo($files['name'], PATHINFO_EXTENSION);
            $new_name = $unique_id . '_' . $timestamp . '.' . $extension;

            $upload_config = $config;
            $upload_config['file_name'] = $new_name;

            $CI->upload->initialize($upload_config);

            if (!$CI->upload->do_upload('file')) {
                $errors[] = $CI->upload->display_errors();
            } else {
                $data = $CI->upload->data();
                $upload_data[] = $data;

                $file_data = array_merge([
                    'file_name' => $data['file_name'],
                    'upload_path' => $data['full_path'],
                    'uploaded_on' => date('Y-m-d H:i:s')
                ], $additional_fields);

                $CI->db->insert($config['table_name'], $file_data);
            }
        } else {
            $errors[] = 'Invalid file input.';
        }

        return ['upload_data' => $upload_data, 'errors' => $errors];
    }
}
?>
