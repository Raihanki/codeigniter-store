<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Auth extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        
        if($this->form_validation->run() == false){
            $this->load->view('auth/login');
        }else{
            $this->_login();
        }
    }
    
    public function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $user = $this->db->get_where('user',['email' => $email])->row_array();

        if($user){
            if($user['is_active'] == 1){
                if(password_verify($password, $user['password'])){
                    $data = [
                        "email" => $user['email'],
                        "role_id" => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 1){
                        redirect('admin');
                    }elseif($user['role_id'] == 2){
                        echo "b";
                    }
                }else{
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Wrong Password
                    </div>');
                    redirect('auth');
                }
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                Email is not activate
                </div>');
                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Email is not registered
            </div>');
            redirect('auth');
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your account have been logged out
          </div>');
          redirect('auth');
    }


}