<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Admin extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ["email" => $this->session->userdata('email')])->row_array();
        
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/topbar',$data);
        $this->load->view('admin/dashboard',$data);
        $this->load->view('admin/footer',$data);
    }

    public function user()
    {
        $data['title'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ["email" => $this->session->userdata('email')])->row_array();
        $data['datauser'] = $this->db->get_where('user', ["email" => $this->session->userdata('email')])->result_array();

        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/topbar',$data);
        $this->load->view('admin/user',$data);
        $this->load->view('admin/footer',$data);
    }

    public function editUser($id)
    {
        $data['title'] = 'Edit User';
        $data['user'] = $this->db->get_where('user', ["email" => $this->session->userdata('email')])->row_array();
        $data['dataid'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/topbar',$data);
        $this->load->view('admin/edituser',$data);
        $this->load->view('admin/footer',$data);
    }

    public function deleteUser($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('user');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        User Deleted
        </div>');
        redirect('admin/user');
    }

}
