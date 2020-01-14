<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Admin extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }

}
