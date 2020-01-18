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
        $this->load->view('kasir/header',$data);
        $this->load->view('kasir/index',$data);
        $this->load->view('kasir/footer',$data);
    }

    public function keranjang()
    {
        $data['title'] = 'KERANJANG';
        $data['keranjang'] = $this->db->get('keranjang')->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('bayar','Bayar','required|trim|integer',[
            'required' => 'Silahkan Inputkan Uang Anda di Atas',
            'integer' => 'Tolong Masukan Angka Dari Nominal Uang Saja'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('kasir/header',$data);    
            $this->load->view('kasir/keranjang',$data);
            $this->load->view('kasir/footer',$data);
        }else{
            $uang = $this->input->post('bayar');
            $total = $this->input->post('total');
        }
    }
    
    public function tambahKeranjang($id)
    {   
        $data['keranjang'] = $this->db->get_where('menu',['id' => $id])->row_array();
        $menu = [
            "nama_menu" => $data['keranjang']['nama_menu'],
            "jumlah" => $data['keranjang']['porsi'],
            "harga" => $data['keranjang']['harga'],
            "gambar" => $data['keranjang']['gambar'],
            "tanggal" => time()
         ];
         $this->db->insert('keranjang',$menu);
         redirect('kasir');
    }

    public function deleteKeranjang($id)
    {   
        $this->db->where('id',$id);
        $this->db->delete('keranjang');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Berhasil Di Cancel
            </div>');
            redirect('kasir/keranjang');
    }

    public function makanan()
    {
        $data['title'] = 'DAFTAR MENU - MAKANAN';
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['menu'] = $this->db->get_where('menu',['kategori' => "makanan"])->result_array();
        $this->load->view('kasir/header',$data);
        $this->load->view('kasir/index',$data);
        $this->load->view('kasir/footer',$data);
    }

    public function minuman()
    {
        $data['title'] = 'DAFTAR MENU - MINUMAN';
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['menu'] = $this->db->get_where('menu',['kategori' => "minuman"])->result_array();
        $this->load->view('kasir/header',$data);
        $this->load->view('kasir/index',$data);
        $this->load->view('kasir/footer',$data);
    }

}