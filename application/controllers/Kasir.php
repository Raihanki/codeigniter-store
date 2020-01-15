<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Kasir extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'DAFTAR MENU';
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['menu'] = $this->db->get('menu')->result_array();
        $this->load->view('kasir/index',$data);
    }

    public function makanan()
    {
        $data['title'] = 'DAFTAR MENU - MAKANAN';
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['menu'] = $this->db->get_where('menu',['kategori' => "makanan"])->result_array();
        $this->load->view('kasir/index',$data);
    }

    public function minuman()
    {
        $data['title'] = 'DAFTAR MENU - MINUMAN';
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['menu'] = $this->db->get_where('menu',['kategori' => "minuman"])->result_array();
        $this->load->view('kasir/index',$data);
    }

}