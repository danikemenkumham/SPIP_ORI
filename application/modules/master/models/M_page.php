<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_page extends CI_Model{

	var $tb_page = 'page';



	function get_page(){
	   $this->db->where('is_delete', '0');
	   return $this->db->get($this->tb_page);
	}
    
    function get_page_byid($id){
        $this->db->where('id_page', $id);
        return $this->db->get($this->tb_page);
    }
    
    

    function tambah(){
        $seo_url =  preg_replace('/\s+/', '-', $this->input->post('title', TRUE));
        $this->db->set('title', $this->input->post('title', TRUE));
        $this->db->set('body', $this->input->post('content', TRUE));
        $this->db->set('seo_url', $seo_url);
        $this->db->set('created', date('Y-m-d H:i:s'));
        $this->db->set('user_id', $this->session->userdata('iduser'));
        $this->db->insert($this->tb_page);
    }
    
    public function edit($id){
        $this->db->set('title', $this->input->post('title', TRUE));
        $this->db->set('body', $this->input->post('content', TRUE));
      
        $this->db->set('modified', date('Y-m-d H:i:s'));
        $this->db->where('id_page', $id);
        $this->db->update($this->tb_page);
    }
    
    public function hapus($id){
        $this->db->set('is_delete', '1');
        $this->db->where('id_post', $id);
        $this->db->update($this->tb_page);
    }

}