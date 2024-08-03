<?php
class Values extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Value_model');
        $this->load->helper('custom'); // Load the helper here
    }

    