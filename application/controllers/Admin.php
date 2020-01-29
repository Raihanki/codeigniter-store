<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Admin extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('email')) {
            if($this->session->userdata('role_id') != 1){
                redirect('auth/block');
            }
        }else{
            redirect('auth');
        }
    }
    
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/topbar',$data);
        $this->load->view('admin/dashboard',$data);
        $this->load->view('admin/footer',$data);
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
                "password" => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                "image" => 'default.png',
                "role_id" => 2,
                "is_active" => 1,
                "date_created" => time()
            ];

            $this->db->insert('user',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Register success lets login
            </div>');
            redirect('admin');

        }
    }

    public function user()
    {
        $data['title'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ["email" => $this->session->userdata('email')])->row_array();
        $data['datauser'] = $this->db->get('user')->result_array();

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

        $this->form_validation->set_rules('email','Email','Required|trim|valid_email');
        $this->form_validation->set_rules('username','Username','Required|trim');
        $this->form_validation->set_rules('role_id','Role_id','Required|trim');
        $this->form_validation->set_rules('active','Active','Required|trim');

        if($this->form_validation->run() == false){
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/topbar',$data);
        $this->load->view('admin/edituser',$data);
        $this->load->view('admin/footer',$data);
        }else{
            $data = [
                "email" => htmlspecialchars($this->input->post('email')),
                "username" => htmlspecialchars($this->input->post('username')),
                "role_id" => htmlspecialchars($this->input->post('role_id')),
                "is_active" => htmlspecialchars($this->input->post('active'))
            ];

            $this->db->set($data);
            $this->db->where('id',$id);
            $this->db->update('user');
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Data Edited
            </div>');
            redirect('admin/user');

        }
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

    public function menu()
    {
        $data['title'] = 'Data Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('menu')->result_array();
        
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/topbar',$data);
        $this->load->view('admin/menu',$data);
        $this->load->view('admin/footer',$data);

    }

    public function addMenu()
    {
        $data['title'] = 'Add Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->form_validation->set_rules('namamenu','Menu Name','required|trim');
        $this->form_validation->set_rules('hargamenu','Menu Price','required|trim');
        $this->form_validation->set_rules('kategori','Category','required|trim');
        $this->form_validation->set_rules('porsi','Qty','required|trim');

        if($this->form_validation->run() == false){
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar',$data);
            $this->load->view('admin/topbar',$data);
            $this->load->view('admin/addMenu',$data);
            $this->load->view('admin/footer',$data);
        }else{
                $config['upload_path']          = './assets/imgmenu';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = '4000';
                $this->load->library('upload', $config);

                if(!$this->upload->do_upload('gambar')){
                    $error = $this->upload->display_errors('<div class="alert alert-danger" role="alert">','</div>');
                }else{
                    $a = $this->upload->data('file_name');
                    
                    $data = [
                        "nama_menu" => htmlspecialchars($this->input->post('namamenu',true)),
                        "harga" => htmlspecialchars($this->input->post('hargamenu',true)),
                        "kategori" => htmlspecialchars($this->input->post('kategori',true)),
                        "porsi" => htmlspecialchars($this->input->post('porsi',true)),
                        "gambar" => $a
                    ];
                    
                    $this->db->insert('menu',$data);
                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                    Menu Added
                    </div>');
                    redirect('admin/menu');
                }
        }
    }

    public function editMenu($id)
    {
        $data['title'] = 'Edit Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get_where('menu', ['id' => $id])->row_array();

        $this->form_validation->set_rules('namamenu','Menu Name','required|trim');
        $this->form_validation->set_rules('hargamenu','Menu Price','required|trim');
        $this->form_validation->set_rules('kategori','Category','required|trim');
        $this->form_validation->set_rules('porsi','Qty','required|trim');

        if($this->form_validation->run() == false){
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar',$data);
            $this->load->view('admin/topbar',$data);
            $this->load->view('admin/editMenu',$data);
            $this->load->view('admin/footer',$data);
        }else{
            $data = [
                "nama_menu" => htmlspecialchars($this->input->post('namamenu',true)),
                "harga" => htmlspecialchars($this->input->post('hargamenu',true)),
                "kategori" => htmlspecialchars($this->input->post('kategori',true)),
                "porsi" => htmlspecialchars($this->input->post('porsi',true)),
                "gambar" => htmlspecialchars($this->input->post('gambar',true))
            ];

            $this->db->set($data);
            $this->db->where('id',$id);
            $this->db->update('menu');
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Menu Added
            </div>');
            redirect('admin/menu');
        }
    }

    public function deleteMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('menu');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Menu Deleted
        </div>');
        redirect('admin/menu');
    }

    public function kategori()
    {
        $data['title'] = 'Kategori';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/topbar',$data);
        $this->load->view('admin/kategori',$data);
        $this->load->view('admin/footer',$data);
    }

    public function addKategori()
    {
        $this->form_validation->set_rules('kategori', 'Kategori','required|trim');
        $data['title'] = 'Kategori';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();

        if($this->form_validation->run() == false){
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar',$data);
            $this->load->view('admin/topbar',$data);
            $this->load->view('admin/kategori',$data);
            $this->load->view('admin/footer',$data);
        }else{
            $data = [
                "kategori" => htmlspecialchars($this->input->post('kategori',true))
            ];

            $this->db->insert('kategori',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Kategori Added
            </div>');
            redirect('admin/kategori');
        }
    }

    public function editKategori($id)
    {
        $data['title'] = 'Kategori';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->db->get_where('kategori',['id' => $id])->row_array();

        $this->form_validation->set_rules('kategori', 'Kategori','required|trim');

        if($this->form_validation->run() == false){
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar',$data);
            $this->load->view('admin/topbar',$data);
            $this->load->view('admin/editKategori',$data);
            $this->load->view('admin/footer',$data);
        }else{
            $data = [
                "kategori" => htmlspecialchars($this->input->post('kategori',true))
            ];

            $this->db->set($data);
            $this->db->where('id',$id);
            $this->db->update('kategori');
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Kategori Edited
            </div>');
            redirect('admin/kategori');
        }
    }   

    public function deleteKategori($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('kategori');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Kategori Dihapus
        </div>');
        redirect('admin/kategori');
    }

    public function histori()
    {
        $data['title'] = 'Histori Penjualan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['histori'] = $this->db->get('histori_pembelian')->result_array();
        
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/topbar',$data);
        $this->load->view('admin/histori',$data);
        $this->load->view('admin/footer',$data);
    }

    public function hapusHistori()
    {
        $this->db->empty_table('histori_pembelian');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Histori Dihapus
        </div>');
        redirect('admin/histori');
    }
 
}
