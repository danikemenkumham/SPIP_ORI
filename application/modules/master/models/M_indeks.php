<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_indeks extends CI_Model{

	var $tb_indeks = 'indeks';
    var $tb_komponen = 'indeks_komponen';
    var $tb_keterangan = 'indeks_keterangan';
    var $tb_nilai = 'indeks_nilai';
    var $tb_area = 'area_perubahan';



	function get_menu(){
	   $this->db->where('is_delete', '0');
	   return $this->db->get($this->tb_indeks);
	}
    
    function get_komponen($tahun, $indeks){
         //get indeks
        $this->db->where('url_path',$indeks);
        $indek = $this->db->get($this->tb_indeks);
        
        $this->db->where('id_indeks', $indek->row()->id_indeks);
        $this->db->where('tahun', $tahun);
        return $this->db->get($this->tb_komponen);
    }
    
    function tambah_komponen(){
        //get indeks
        $this->db->where('url_path', $this->input->post('indeks', TRUE));
        $indeks = $this->db->get($this->tb_indeks);
        
        
        $this->db->set('komponen', $this->input->post('komponen', TRUE));
        $this->db->set('bobot', $this->input->post('bobot', TRUE));
        $this->db->set('tahun', $this->input->post('tahun', TRUE));
        $this->db->set('nilai', $this->input->post('nilai', TRUE));
        $this->db->set('id_indeks', $indeks->row()->id_indeks);
        $this->db->insert($this->tb_komponen);
    }
    
     function get_komponen_byid($ref){
         $this->db->where('id_komponen', $ref);
          return $this->db->get($this->tb_komponen);
     }
     
     function edit_komponen($komponen){
        $this->db->set('komponen', $this->input->post('komponen', TRUE));
        $this->db->set('bobot', $this->input->post('bobot', TRUE));
        $this->db->set('tahun', $this->input->post('tahun', TRUE));
        $this->db->set('nilai', $this->input->post('nilai', TRUE));
        $this->db->where('id_komponen', $komponen);
        $this->db->update($this->tb_komponen);
    }
    
    function hapus($ref){
        $this->db->where('id_komponen', $ref);
        $this->db->delete($this->tb_komponen);
    }
    
    function get_keterangan($tahun, $indeks){
          //get indeks
        $this->db->where('url_path',$indeks);
        $indek = $this->db->get($this->tb_indeks);
        
        $this->db->where('id_indeks', $indek->row()->id_indeks);
        $this->db->where('tahun', $tahun);
        return $this->db->get($this->tb_keterangan);
    }
    
    function tambah_keterangan(){
        //get indeks
        $this->db->where('url_path', $this->input->post('indeks', TRUE));
        $indeks = $this->db->get($this->tb_indeks);
        
        $this->db->set('keterangan', $this->input->post('keterangan', TRUE));
        $this->db->set('id_indeks', $indeks->row()->id_indeks);
        $this->db->set('tahun', $this->input->post('year', TRUE));
        $this->db->insert($this->tb_keterangan);
    }
    
    
    //new form master indeks
    
    function indeks(){
         return $this->db->get($this->tb_indeks);
        
    }
    
    
    function get_indeks($tahun){
        $this->db->join($this->tb_nilai.' n', 'i.id_indeks = n.id_indeks');
        $this->db->where('tahun',$tahun);
        return $this->db->get($this->tb_indeks.' i');
    }
    
  
    
    public function get_indeks_list(){
        $this->db->select('count(id_indeks) total');
        return $this->db->get($this->tb_indeks);
    }
    
     public function get_indeks_limit($perpage,$offset){
        $this->db->join($this->tb_area.' a', 'i.id_area = a.id_area', 'left');
        $this->db->limit($perpage, $offset);
        return $this->db->get($this->tb_indeks.' i');
        
     }
     
     function get_area(){
        $this->db->where('id_program', '7');
        return $this->db->get($this->tb_area);
     }
     
     function tambah_indeks(){
        $path = strtolower($this->input->post('indeks'));
        $path = str_replace(" ", "-", $path);
        $this->db->set('indeks',$this->input->post('indeks', TRUE));
        $this->db->set('keterangan',$this->input->post('keterangan', TRUE));
        $this->db->set('id_area',$this->input->post('area', TRUE));
        $this->db->set('url_path', $path);
        $this->db->insert($this->tb_indeks);
     }
     
     function edit_indeks($id){
        $path = strtolower($this->input->post('indeks', TRUE));
        $path = str_replace(" ", "-", $path);
        $this->db->set('indeks',$this->input->post('indeks', TRUE));
        $this->db->set('keterangan',$this->input->post('keterangan', TRUE));
        $this->db->set('id_area',$this->input->post('area', TRUE));
        $this->db->set('url_path', $path);
        $this->db->where('md5(id_indeks)', $id);
        $this->db->update($this->tb_indeks);
     }
     
     function get_indeks_byid($id){
        $this->db->where('md5(id_indeks)',$id);
        return $this->db->get($this->tb_indeks);
     }
     
     function remove_indeks($id){
         $this->db->where('md5(id_indeks)',$id);
        $this->db->delete($this->tb_indeks);
     }
     
     function remove_nilai($id){
         $this->db->where('md5(idnilai)',$id);
        $this->db->delete($this->tb_nilai);
     }
     
     function addnilai(){
        $nilai = str_replace(",", ".", $this->input->post('nilai', TRUE));
        $this->db->set('id_indeks',$this->input->post('indeks', TRUE));
        $this->db->set('tahun',$this->input->post('tahun', TRUE));
        $this->db->set('nilai',$nilai);
        $this->db->insert($this->tb_nilai);
     }
     
     function check_nilai(){
        $this->db->where('id_indeks',$this->input->post('indeks', TRUE));
        $this->db->where('tahun',$this->input->post('tahun', TRUE));
        return $this->db->get($this->tb_nilai);
        
     }
     
     function edit_nilai($ref, $val){
        $this->db->set('nilai',$val);
        $this->db->where('md5(idnilai)',$ref);
        $this->db->update($this->tb_nilai);
     }
     
     function get_trends($id){
        $this->db->select('tahun, nilai, indeks, url_path');
        $this->db->join($this->tb_indeks.' i', 'n.id_indeks=i.id_indeks');
        $this->db->where('n.id_indeks', $id);
        $this->db->order_by('tahun', 'asc');
        return $this->db->get($this->tb_nilai.' n');
     }
     
      function check_trends($id_indeks){
        $this->db->select('idnilai');
        $this->db->where('id_indeks', $id_indeks);
        return $this->db->get($this->tb_nilai);
     }
   

}