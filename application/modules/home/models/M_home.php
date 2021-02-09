<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {
    
    var $tb_post = 'posts';
    var $tb_produk = 'produk_rb';
    var $tb_video = 'video';
    var $tb_gallery = 'gallery';
    var $tb_photo_gallery = 'photo_gallery';
    var $tb_page = 'page';
    var $tb_wilayah = 'master_wilayah';
    var $tb_user = 'user';
    
    
    function get_all_post(){
        $this->db->select('count(id_post) as total');
        $this->db->where('status', '1');
        $this->db->where('is_delete', '0');
        return $this->db->get($this->tb_post);
    }
    
    function get_all_post_paging($limit,$offset){
        $this->db->select('title, id_post,path_featured_image, body,seo_url,created');
        $this->db->where('status', '1');
        $this->db->where('is_delete', '0');
          $this->db->order_by('id_post', 'desc');
        return $this->db->get($this->tb_post,$limit, $offset);
    }


    function get_post($limit){
        $this->db->where('is_delete', '0');
        $this->db->order_by('id_post', 'desc');
        $this->db->limit($limit);
        return $this->db->get($this->tb_post);
    }   
    function get_produk_rb($limit){
        $this->db->where('is_delete', '0');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit($limit);
        return $this->db->get($this->tb_produk);
    }   
    
    function get_video($limit){
         $this->db->where('is_delete', '0');
         $this->db->where('status', '1');
        $this->db->limit($limit);
        $this->db->order_by('id_video', 'desc');
        return $this->db->get($this->tb_video);
    }
    
    
    
    //gallery
    function get_all_gallery(){
        $this->db->select('count(id_gallery) as total');
        $this->db->where('status', '1');
        $this->db->where('is_delete', '0');
        return $this->db->get($this->tb_gallery);
    }
    
    function get_all_gallery_paging($limit,$offset){
        $this->db->select('nama_gallery, id_gallery,slug,created');
        $this->db->where('status', '1');
        $this->db->where('is_delete', '0');
        return $this->db->get($this->tb_gallery,$limit, $offset);
    }
    
     function get_gallery($limit){
        $this->db->limit($limit);
        $this->db->order_by('id_gallery', 'desc');
        return $this->db->get($this->tb_gallery);
    }
    
    function get_featured_photo($id){
        $this->db->limit(1);
        $this->db->where('id_gallery', $id);
        return $this->db->get($this->tb_photo_gallery);
    }
    
    function get_page($url){
        $this->db->where('seo_url', $url);
        return $this->db->get($this->tb_page);
    }
    
    function get_post_view($id){
        $this->db->where('id_post', $id);
        return $this->db->get($this->tb_post);
    }
    function get_gallery_page($id){
        $this->db->join($this->tb_photo_gallery.' pg', 'g.id_gallery = pg.id_gallery');
        $this->db->where('g.id_gallery', $id);
        return $this->db->get($this->tb_gallery.' g');
    }
    
    //video
    function get_all_video(){
        $this->db->select('count(id_video) as total');
        $this->db->where('status', '1');
        $this->db->where('is_delete', '0');
        return $this->db->get($this->tb_video);
    }
    
    function get_all_video_paging($limit,$offset){
        $this->db->select('caption, id_video,url,seo_url, u.nama');
        $this->db->join($this->tb_user.' u','v.user_id = u.iduser');
        $this->db->where('v.status', '1');
        $this->db->where('v.is_delete', '0');
         $this->db->order_by('v.id_video', 'desc');
        return $this->db->get($this->tb_video.' v',$limit, $offset);
    }
    
    
    function get_wacth_video($id){
          $this->db->select('caption, id_video,url,seo_url, u.nama');
        $this->db->join($this->tb_user.' u','v.user_id = u.iduser');
        $this->db->where('v.id_video', $id);
        return $this->db->get($this->tb_video.' v');
    }
    
    //produk rb
    function get_all_produk($kategori){
        $this->db->select('count(id_produk) as total');
        $this->db->where('is_delete', '0');
         $this->db->where('kategori', $kategori);
        return $this->db->get($this->tb_produk);
    }
    
    function get_all_produk_paging($limit,$offset,$kategori){
        $this->db->select('*');
        $this->db->where('is_delete', '0');
        $this->db->order_by('id_produk', 'desc');
        $this->db->where('kategori', $kategori);
        return $this->db->get($this->tb_produk,$limit, $offset);
    }
    function get_produk($kategori){
        $this->db->select('*');
        $this->db->where('is_delete', '0');
        $this->db->order_by('id_produk', 'desc');
        $this->db->where('kategori', $kategori);
         return $this->db->get($this->tb_produk);
        
    }
    
    function get_wilayah(){
        return $this->db->get($this->tb_wilayah);
    }
    
    function get_not_wilayah($exist){
        //$exist =  implode( ", ", $exit );
        $sql = "select * from master_wilayah where kd_wilayah NOT IN ($exist)";
        return $this->db->query($sql);
    }
    function get_wilayah_all(){
        //$exist =  implode( ", ", $exit );
        $sql = "select * from master_wilayah where kd_wilayah is not null";
        return $this->db->query($sql);
    }
    
    function get_kategori($tipe){
        $this->db->where('jenis', $tipe);
        return $this->db->get('kategori');
    }
      
}
