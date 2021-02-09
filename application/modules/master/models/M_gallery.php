<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gallery extends CI_Model{

	var $tb_gallery = 'gallery';
	var $tb_kategori = 'kategori';
    var $tb_photo_gallery = 'photo_gallery';



	function get_gallery(){
	   $this->db->where('is_delete', '0');
       $this->db->where('status', '1');
	   return $this->db->get($this->tb_gallery);
	}
    
   	function get_gallery_limit($perpage, $limit){
	   $this->db->where('is_delete', '0');
       $this->db->where('status', '1');
       $this->db->limit($perpage,$limit);
	   return $this->db->get($this->tb_gallery);
	}
    
    function get_gallery_by_id($id){
        $this->db->where('id_gallery', $id);
        return $this->db->get($this->tb_gallery);
    }
    
   	function get_kategori(){
	    $this->db->where('is_delete', '0');
        $this->db->where('jenis', 'gallery');
        $this->db->order_by('kategori', 'asc');
        return $this->db->get($this->tb_kategori);
	}
    
    function upload_gallery($image, $path){
        $this->db->set('caption', $this->input->post('caption', TRUE));
        $this->db->set('path_photo', $path);
        $this->db->set('nama_file', $image);
         $this->db->set('id_gallery', $this->input->post('gallery', TRUE));
        $this->db->set('created', date('Y-m-d H:i:s'));
        $this->db->insert(($this->tb_photo_gallery));
    }
    
    

    function tambah(){
        $seo_url =  preg_replace('/\s+/', '-', $this->input->post('nama_gallery', TRUE));
        $this->db->set('nama_gallery', $this->input->post('nama_gallery', TRUE));
        $this->db->set('keterangan', $this->input->post('keterangan', TRUE));
         $this->db->set('status', $this->input->post('status', TRUE));
        $this->db->set('slug', $seo_url);
        $this->db->set('created', date('Y-m-d H:i:s'));
        $this->db->set('user_id', $this->session->userdata('iduser'));
        $this->db->insert($this->tb_gallery);
        
        return  $this->db->insert_id();
    }
    
    public function edit($id){
        $seo_url =  preg_replace('/\s+/', '-', $this->input->post('nama_gallery', TRUE));
        $this->db->set('nama_gallery', $this->input->post('nama_gallery', TRUE));
        $this->db->set('keterangan', $this->input->post('keterangan', TRUE));
        $this->db->set('status', $this->input->post('status', TRUE));
        $this->db->set('slug', $seo_url);
        $this->db->where('id_gallery', $id);
        $this->db->update($this->tb_gallery);
    }
    
    public function hapus_photo($id){
        $this->db->where('id_photo', $id);
        $this->db->delete($this->tb_photo_gallery);
    }
    
    public function get_photo_gallery($id){
        $this->db->where('id_gallery', $id);
        return $this->db->get($this->tb_photo_gallery);
    }
    
     public function hapus_gallery($id){
        $this->db->where('id_gallery', $id);
        $photo = $this->db->get($this->tb_photo_gallery);
        foreach($photo->result() as $dt_photo){
            
            //hapus file photo
            $old_file = './uploads/gallery/'.$dt_photo->nama_file;
            chown($old_file, 666);
            unlink($old_file);
            
            //hapus 
             $this->db->where('id_gallery', $dt_photo->id_photo);
             $this->db->delete($this->tb_photo_gallery);
        }
        
        //hapus gallery
        
        $this->db->where('id_gallery', $id);
        $this->db->delete($this->tb_gallery);
        
        
        
        
    }

}