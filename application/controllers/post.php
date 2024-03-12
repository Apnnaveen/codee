<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('crud');
    }

    public function index()
    {
        $frontend_data = $this->crud->get_records('frontend');
        $backend_data = $this->crud->get_records('backend');

        $data = array(
            'frontend_data' => $frontend_data,
            'backend_data' => $backend_data
        );

        $this->load->view('post/list', $data);
    }

    public function create()
    {
        $this->load->view('post/create');
    }

    public function store()
    {
        $frontend_data['password'] = $this->input->post('password');
        $frontend_data['description'] = $this->input->post('description');

        $frontend_id = $this->crud->insert('frontend', $frontend_data);

        $backend_data['frontend_id'] = $frontend_id;
        $backend_data['email'] = $this->input->post('email');

        $this->crud->insert('backend', $backend_data);

        $this->session->set_flashdata('message', '<div class="alert alert-success">Record has been saved successfully.</div>');
        redirect(base_url('post/'));
    }

    public function edit($id)
    {
        $data['post'] = $this->crud->find_record_by_id('frontend', $id);
        $data['backend'] = $this->crud->find_record_by_id('backend', $data['post']->id);
        $this->load->view('post/edit', $data);
    }

    public function update($id)
    {
        $frontend_data['password'] = $this->input->post('password');
        $frontend_data['description'] = $this->input->post('description');

        $this->crud->update('frontend', $frontend_data, $id);

        $backend_data['email'] = $this->input->post('email');

        $this->crud->update('backend', $backend_data, $id);

        $this->session->set_flashdata('message', '<div class="alert alert-success">Record has been updated successfully.</div>');
        redirect(base_url('post'));
    }

    public function delete($id)
    {
        $this->db->where('frontend_id', $id);
        $this->db->delete('backend');

        $this->db->where('id', $id);
        $this->db->delete('frontend');

        
        $this->session->set_flashdata('message', '<div class="alert alert-success">Record has been deleted successfully.</div>');
        redirect(base_url('post'));
    }
    // {
    //     // Construct the SQL query to delete records from both frontend and backend tables
    //     $sql_delete_records = "DELETE frontend, backend FROM frontend 
    //         JOIN backend ON frontend.id = backend.frontend_id 
    //         WHERE frontend.id = ?";
        
    //     // Execute the delete query
    //     $this->db->query($sql_delete_records, array($id));
    
    //     // Set flash message and redirect
    //     $this->session->set_flashdata('message', '<div class="alert alert-success">Record has been deleted successfully.</div>');
    //     redirect(base_url('post'));
    // }
    
}

?>