<?php 
Class Model_search extends CI_Model{
    public function search()
    {
        $key = $this->input->post('search');
        $this->db->like('nama_menu',$key);
        return $this->db->get('menu')->result_array();
    }

}