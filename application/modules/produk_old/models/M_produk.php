<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->tb_produk = 'produk_rb';
    }
     

    public function get_produk(){
        $this->db->order_by('id_produk', 'desc');
        $this->db->where('is_delete', '0');
        return $this->db->get($this->tb_produk);  
    }
    
    public function tambah_produk($path,$filename){
        $this->db->set('judul', $this->input->post('judul'));
        $this->db->set('keterangan', $this->input->post('keterangan'));
        $this->db->set('link_file', $path);
        $this->db->set('is_delete', '0');
        $this->db->set('filename', $filename);
        $this->db->set('create_date', date('Y-m-d H:i:s'));
        $this->db->insert($this->tb_produk);
    }
    
     public function edit_produk($id,$path,$filename){
        $this->db->set('judul', $this->input->post('judul'));
        $this->db->set('keterangan', $this->input->post('keterangan'));
        if($path != NULL){
            $this->db->set('link_file', $path);
            $this->db->set('filename', $filename);
        }
        $this->db->set('is_delete', '0');
        $this->db->set('create_date', date('Y-m-d H:i:s'));
        $this->db->where('id_produk', $id);
        $this->db->update($this->tb_produk);
    }
    
    public function get_produk_byid($id){
        $this->db->where('id_produk', $id);
        return $this->db->get($this->tb_produk);
    }
    public function is_read($id){
        //set to read
        $this->db->set('is_read', '1');
        $this->db->where('id_notif', $id);
        $this->db->update($this->tb_notifikasi);
        
        //get link
        $this->db->select('link');
        $this->db->where('id_notif', $id);
        return $this->db->get($this->tb_notifikasi);
        
    }
    
    public function hapus_produk($id){
        $this->db->set('is_delete', '1');
        $this->db->where('id_produk', $id);
        $this->db->update($this->tb_produk);
    }
    
   

    
   
      
}
