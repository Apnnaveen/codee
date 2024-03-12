<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        // Load Facebook library
        $this->load->library('facebook');
    }

    public function index()
    {
        $this->load->view('login/login');
    }

    public function do_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        // Check if the email and password combination exists in the database
        $is_valid = $this->login_model->validate_credentials($email, $password);
    
        if ($is_valid) {
            // Credentials are valid, redirect to the list page in the post controller
            redirect('post');
        } else {
            // Invalid credentials, redirect back to the login page with an error
            redirect('login?error=1');
        }
    }
    

    public function fblogin()
    {
        if ($this->facebook->is_authenticated()) {
            // User is logged in via Facebook, handle accordingly
            $user = $this->facebook->request('get', '/me?fields=id,name,email');
            if (!isset($user['error'])) {
                // User details are retrieved successfully, handle further actions
                // Load necessary views or perform actions
            }
        } else {
            // User is not authenticated, redirect to login page
            redirect('login/index');
        }
    }

    public function fblogout()
    {
        $this->facebook->destroy_session(); 
        $this->session->unset_userdata('user'); 
        redirect('login/fblogin/');
    }
}
