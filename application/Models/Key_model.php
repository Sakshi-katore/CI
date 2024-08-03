<?php
class Key_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->helper('custom'); // Load the CRUD helper
    }

   
}
