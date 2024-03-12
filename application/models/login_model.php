<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function validate_credentials($email, $password) {
        // Query the backend table to check if the email exists
        $query_backend = $this->db->get_where('backend', array('email' => $email));
        $email_exists = $query_backend->num_rows() > 0;

        // Query the frontend table to check if the password exists
        $query_frontend = $this->db->get_where('frontend', array('password' => $password));
        $password_exists = $query_frontend->num_rows() > 0;

        // Return true if both email and password exist
        return $email_exists && $password_exists;
    }

}
?>
