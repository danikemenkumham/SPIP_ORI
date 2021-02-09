<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_notifikasi extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->tb_notifikasi = 'notifikasi';
    }
     

    public function get_notifikasi(){
        if($this->session->userdata('role') == 5 ||  $this->session->userdata('role') == 4){
            $this->db->where('penerima', $this->session->userdata('satker'));
            $this->db->order_by('id_notif', 'desc');
            return $this->db->get($this->tb_notifikasi);
        }else{
            $this->db->where('is_verifikator', 1);
            $this->db->order_by('id_notif', 'desc');
            return $this->db->get($this->tb_notifikasi);
        }
        
    }
    
    public function get_notif_widget($limit){
        if($this->session->userdata('role') == 5 ||  $this->session->userdata('role') == 4){
            $this->db->where('penerima', $this->session->userdata('satker'));
            $this->db->order_by('id_notif', 'desc');
            $this->db->limit($limit);
            return $this->db->get($this->tb_notifikasi);
        }else{
            $this->db->where('is_verifikator', 1);
            $this->db->order_by('id_notif', 'desc');
            $this->db->limit($limit);
            return $this->db->get($this->tb_notifikasi);
        }
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
    
   

    
   
      
}
