<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Kasir extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'DAFTAR MENU';
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['menu'] = $this->db->get('menu')->result_array();
        $data['keranjang'] = $this->db->get('keranjang')->result_array();
        $this->load->view('kasir/header',$data);
        $this->load->view('kasir/index',$data);
        $this->load->view('kasir/footer',$data);
    }

    public function keranjang()
    { 
            $data['title'] = 'KERANJANG';
            $data['keranjang'] = $this->db->get('keranjang')->result_array();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $a = $data['keranjang'];
            if(!$a){
                redirect('kasir');
            }else{
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
        
                    $st_pembelian = [
                        "nama_kasir" => $data['user']['username'],
                        "tanggal" => time(),
                        "harga_total" => $total,
                        "uang_customer" => $uang,
                        "uang_kembalian" => $uang - $total
                    ];
        
                    $this->db->insert('struk_pembelian',$st_pembelian);
                    redirect('kasir/checkout');
                }
            }
    }

    public function tambahKeranjang($id)
    {
        $data['keranjang'] = $this->db->get_where('menu',['id' => $id])->row_array();
        $menu = [
            "id" => $id,
            "nama_menu" => $data['keranjang']['nama_menu'],
            "jumlah" => $this->input->post('porsi'),
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

    public function checkout()
    {
        $data['title'] = 'CHECKOUT';
        $data['struk'] = $this->db->get('struk_pembelian')->result_array();
        $data['keranjang'] = $this->db->get('keranjang')->result_array();
        $this->load->view('kasir/header',$data);
        $this->load->view('kasir/checkout',$data);
        $this->load->view('kasir/footer',$data); 
    }

    public function histori($id)
    {
        $data['struk'] = $this->db->get_where('struk_pembelian',['id' => $id])->row_array();
        $histori = [
            "id" => $data['struk']['id'],
            "nama_kasir" => $data['struk']['nama_kasir'],
            "tanggal" => date('d F Y', $data['struk']['tanggal']),
            "harga_total" => $data['struk']['harga_total'],
            "uang_customer" => $data['struk']['uang_customer'],
            "uang_kembalian" => $data['struk']['uang_kembalian']
        ];
        $this->db->insert('histori_pembelian',$histori);
        $this->db->empty_table('struk_pembelian');
        $this->db->empty_table('keranjang');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Transaksi Selesai
        </div>');
        redirect('kasir');

    }

    public function makanan()
    {
        $data['title'] = 'DAFTAR MENU - MAKANAN';
        $data['keranjang'] = $this->db->get('keranjang')->result_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['menu'] = $this->db->get_where('menu',['kategori' => "makanan"])->result_array();
        $this->load->view('kasir/header',$data);
        $this->load->view('kasir/index',$data);
        $this->load->view('kasir/footer',$data);
    }

    public function minuman()
    {
        $data['title'] = 'DAFTAR MENU - MINUMAN';
        $data['keranjang'] = $this->db->get('keranjang')->result_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['menu'] = $this->db->get_where('menu',['kategori' => "minuman"])->result_array();
        $this->load->view('kasir/header',$data);
        $this->load->view('kasir/index',$data);
        $this->load->view('kasir/footer',$data);
    }

}