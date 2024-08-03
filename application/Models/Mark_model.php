<?php
class Mark_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // No need to define insert, update, delete, or get methods here
    // as we are using helper functions for these operations.
}
?>
