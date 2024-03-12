<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Facebook_login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('facebook_api');
    }

    public function index()
    {
        // Redirect to Facebook login
        redirect($this->facebook_api->getLoginUrl());
    }

    public function callback()
    {
        // Handle callback after Facebook login
        // Fetch user profile, register user, etc.
    }
}
