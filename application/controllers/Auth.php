<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Auth extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('auth/login');
    }

    public function register()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[5]');

        if($this->form_validation->run() == false){
            $this->load->view('auth/register');
        }else {
            $data = [
                "email" => htmlspecialchars($this->input->post('email',true)),
                "username" => htmlspecialchars($this->input->post('username',true)),
                "password" => htmlspecialchars($this->input->post('password',true)),
                "image" => 'default.jpg',
                "role_id" => 2,
                "is_active" => 1,
                "date_created" => time()
            ];

            $this->db->insert('user',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Register success lets login
            </div>');
            redirect('auth');

        }
    }

}