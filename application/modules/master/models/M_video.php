<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_video extends CI_Model{

	var $tb_video = 'video';
	var $tb_kategori = 'kategori';


	function get_video(){
	    if($this->session->userdata('role') == '5'){
            $this->db->where('user_id', $this->session->userdata('iduser'));
        }
	   $this->db->where('is_delete', '0');
	   return $this->db->get($this->tb_video);
	}
    
    function get_video_limit($perpage,$offset){
        if($this->session->userdata('role') == '5'){
            $this->db->where('user_id', $this->session->userdata('iduser'));
        }
	   $this->db->where('is_delete', '0');
       $this->db->limit($perpage,$offset);
	   return $this->db->get($this->tb_video);
	}
    
    function get_video_by_id($id){
        $this->db->where('id_video', $id);
        return $this->db->get($this->tb_video);
    }
    
    
   	function get_kategori(){
	    $this->db->where('is_delete', '0');
        $this->db->where('jenis', 'video');
        $this->db->order_by('kategori', 'asc');
        return $this->db->get($this->tb_kategori);
	}
    
    function tambah(){
        $url = str_replace("watch","embed",$this->input->post('url', TRUE));
        $url = str_replace("?v=","/",$url);
        $seo_url =  preg_replace('/\s+/', '-', $this->input->post('title', TRUE));
        $this->db->set('seo_url', $seo_url);
        $this->db->set('caption', $this->input->post('title', TRUE));
        $this->db->set('status',$this->input->post('status', TRUE));
        $this->db->set('url',$url);
        $this->db->set('created', date('Y-m-d H:i:s'));
        $this->db->set('user_id', $this->session->userdata('iduser'));
        $this->db->set('id_kategori', $this->input->post('kategori', TRUE));
        $this->db->insert($this->tb_video);

    }
    
    public function edit($id){
        $url = str_replace("watch","embed",$this->input->post('url', TRUE));
        $url = str_replace("?v=","/",$url);
        $seo_url =  preg_replace('/\s+/', '-', $this->input->post('title', TRUE));
        $this->db->set('seo_url', $seo_url);
        $this->db->set('caption', $this->input->post('title', TRUE));
        $this->db->set('status',$this->input->post('status', TRUE));
        $this->db->set('url',$url);
        $this->db->set('id_kategori', $this->input->post('kategori', TRUE));
        $this->db->where('id_video', $id);
        $this->db->update($this->tb_video);
    }
    
    public function hapus($id){
        $this->db->set('is_delete', '1');
        $this->db->where('id_video', $id);
        $this->db->update($this->tb_video);
    }

}