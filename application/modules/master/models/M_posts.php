<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_posts extends CI_Model{

	var $tb_post = 'posts';
	var $tb_kategori = 'kategori';


	function get_post(){
	   $this->db->where('is_delete', '0');
	   return $this->db->get($this->tb_post);
	}
    
    function get_post_limit($perpage, $offset){
	   $this->db->where('is_delete', '0');
       $this->db->limit($perpage, $offset);
	   return $this->db->get($this->tb_post);
	}
    
    function get_kategori_by_id($id){
        $this->db->where('id_post', $id);
        return $this->db->get($this->tb_post);
    }
    
    
   	function get_kategori(){
	    $this->db->where('is_delete', '0');
        $this->db->where('jenis', 'post');
        $this->db->order_by('kategori', 'asc');
        return $this->db->get($this->tb_kategori);
	}
    
    function tambah($path, $namefile){
        $this->db->set('title', $this->input->post('title', TRUE));
        $this->db->set('body', $this->input->post('content', TRUE));
        $this->db->set('featured_image',$namefile);
        $this->db->set('status',$this->input->post('status',TRUE));
        $this->db->set('path_featured_image',$path);
        $this->db->set('created', date('Y-m-d H:i:s'));
        $this->db->set('user_id', $this->session->userdata('iduser'));
        $this->db->set('kategori_id', $this->input->post('kategori',TRUE));
        $this->db->insert($this->tb_post);
    }
    
    public function edit($id,$path,$filename){
        $this->db->set('title', $this->input->post('title', TRUE));
        $this->db->set('body', $this->input->post('content', TRUE));
        $this->db->set('status',$this->input->post('status', TRUE));
        $this->db->set('kategori_id', $this->input->post('kategori', TRUE));
        $this->db->set('modified', date('Y-m-d H:i:s'));
       
        if($path != NULL){
            $this->db->set('path_featured_image', $path);
            $this->db->set('featured_image', $filename);
        }
        $this->db->set('is_delete', '0');
        $this->db->where('id_post', $id);
        $this->db->update($this->tb_post);
    }
    
    public function hapus($id){
        $this->db->set('is_delete', '1');
        $this->db->where('id_post', $id);
        $this->db->update($this->tb_post);
    }

}