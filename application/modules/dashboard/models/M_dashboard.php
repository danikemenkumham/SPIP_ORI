<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->tb_area_perubahan = 'area_perubahan';
        $this->tb_program = 'program';
        $this->tb_wbk = 'master_wbkwbbm';
        $this->tb_pelaksanaan = 'waktu_pelaksanaan';
        $this->tb_kegiatan = 'kegiatan';
        $this->tb_pmprb = 'master_pmprb';
        $this->tb_satker = 'satker';
        $this->tb_user = 'user';
        $this->tb_role = 'role';
        $this->tb_rincian_pmprb = 'pmprb_detail';
        $this->tb_user_pmprb = 'pmprb_detail_user';
        $this->tb_rincian_wbk = 'wbk_detail';
        $this->tb_user_wbk = 'wbk_detail_user';
        $this->tb_rkt = 'master_rkt';
        $this->tb_user_rkt = 'rkt_user';
         $this->tb_waktu_pelaksanaan = 'waktu_pelaksanaan_rkt';
        
    }
    function get_area($tipe){
         $this->db->join($this->tb_program.' p', 'ap.id_program = p.id_program');
        $this->db->where('p.tipe', $tipe);
        $this->db->where('ap.is_delete', '0');
        return $this->db->get($this->tb_area_perubahan.' ap');
    }
    
    //wbk
    
     public function total_lke_area($id_area,$satker){
        $this->db->select('count(rw.id_wbk) as total');
        $this->db->join($this->tb_user_wbk.' du','rw.id_detail = du.id_detail');
        $this->db->join($this->tb_wbk.' w','rw.id_wbk = w.id_wbk');
        $this->db->where('w.id_area', $id_area);
        $this->db->where('du.iduser',$satker);
        return $this->db->get($this->tb_rincian_wbk.' rw')->row()->total;
    }
    
    public function total_lengkap_lke_area($id_area,$satker){
        $this->db->select('count(rw.id_wbk) as total');
        $this->db->join($this->tb_user_wbk.' du','rw.id_detail = du.id_detail');
        $this->db->join($this->tb_wbk.' w','rw.id_wbk = w.id_wbk');
        $this->db->where('w.id_area', $id_area);
        $this->db->where('du.status', 'lengkap');
        $this->db->where('du.iduser',$satker);
        return $this->db->get($this->tb_rincian_wbk.' rw')->row()->total;
    }
    
    //pmprb
     public function total_pmprb_area($id_area,$satker){
            $this->db->select('count(rw.id_pmprb) as total');
            $this->db->join($this->tb_user_pmprb.' du','rw.id_detail = du.id_detail');
            $this->db->join($this->tb_pmprb.' w','rw.id_pmprb = w.id_pmprb');
            $this->db->where('w.id_area', $id_area);
            $this->db->where('du.iduser', $satker);
            return $this->db->get($this->tb_rincian_pmprb.' rw')->row()->total;
     }
        
    public function total_lengkap_pmprb_area($id_area,$satker){
        $this->db->select('count(rw.id_pmprb) as total');
        $this->db->join($this->tb_user_pmprb.' du','rw.id_detail = du.id_detail');
        $this->db->join($this->tb_pmprb.' w','rw.id_pmprb = w.id_pmprb');
        $this->db->where('w.id_area', $id_area);
        $this->db->where('du.status', 'lengkap');
         $this->db->where('du.iduser', $satker);
        return $this->db->get($this->tb_rincian_pmprb.' rw')->row()->total;
    }
    
    //rkt
    public function total_rkt_area($id_area,$satker){
            $this->db->select('count(rw.id_rkt) as total');
            $this->db->join($this->tb_rkt.' w','rw.id_rkt = w.id_rkt');
             $this->db->join($this->tb_waktu_pelaksanaan.' p', 'rw.id_rkt_user = p.id_rkt_user');
            $this->db->where('w.id_area', $id_area);
            $this->db->where('rw.iduser', $satker);
            return $this->db->get($this->tb_user_rkt.' rw')->row()->total;
        }
        
    public function total_lengkap_rkt_area($id_area, $satker){
        $this->db->select('count(rw.id_rkt) as total');
        $this->db->join($this->tb_rkt.' w','rw.id_rkt = w.id_rkt');
         $this->db->join($this->tb_waktu_pelaksanaan.' p', 'rw.id_rkt_user = p.id_rkt_user');
        $this->db->where('w.id_area', $id_area);
        $this->db->where('p.status', 'lengkap');
        $this->db->where('rw.iduser', $satker);
        return $this->db->get($this->tb_user_rkt.' rw')->row()->total;
    }
    
    
    function count_pmprb_satker($id_satker){
        $this->db->select('kategori_penilaian, p.id_pmprb'); 
        $this->db->join($this->tb_rincian_pmprb.' pd', 'u.id_detail = pd.id_detail');
        $this->db->join($this->tb_pmprb.' p', 'pd.id_pmprb = p.id_pmprb');
        $this->db->where('u.iduser', $id_satker);
        $this->db->group_by('p.id_pmprb');
        return $this->db->get($this->tb_user_pmprb.' u');
        
    }
    
    //PMPRB
    
    function get_pmprb_satker_limit($perpage,$offset){
        $this->db->select('SatkerID, Satker, count(status) as total');
        $this->db->join($this->tb_satker.' s','du.iduser = s.SatkerID');
        $this->db->group_by('iduser');
      
        if($this->input->get('q')){
            $this->db->like('Satker',$this->input->get('q'));
        }
        if($this->session->userdata('role') == '6'){
            $satker = $this->session->userdata('satker');
            $satker_last = $satker+98;
            $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
          
        }
        $this->db->order_by('total','desc');
        $this->db->limit($perpage, $offset);
        return $this->db->get($this->tb_user_pmprb.' du');   
    }
    
    
    function get_pmprb_satker($limit){
        $this->db->select('SatkerID, Satker, count(status) as total');
        $this->db->join($this->tb_satker.' s','du.iduser = s.SatkerID');
        $this->db->group_by('iduser');
        if($limit!= NULL){
            $this->db->limit($limit);
        }
        if($this->input->get('q')){
            $this->db->like('Satker',$this->input->get('q'));
        }
        if($this->session->userdata('role') == '6'){
            $satker = $this->session->userdata('satker');
            $satker_last = $satker+98;
            $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
          
        }
        $this->db->where('status', 'lengkap');
        $this->db->order_by('total','desc');
        
        return $this->db->get($this->tb_user_pmprb.' du');
    }
    
    
    function total_pmprb_satker($satker){
        $this->db->select('count(rw.id_pmprb) as total');
        $this->db->join($this->tb_user_pmprb.' du','rw.id_detail = du.id_detail');
        $this->db->join($this->tb_pmprb.' w','rw.id_pmprb = w.id_pmprb');
        $this->db->where('du.iduser', $satker);
        return $this->db->get($this->tb_rincian_pmprb.' rw')->row()->total;
    }

    public function total_lengkap_pmprb_satker($satker){
        $this->db->select('count(rw.id_pmprb) as total');
        $this->db->join($this->tb_user_pmprb.' du','rw.id_detail = du.id_detail');
        $this->db->join($this->tb_pmprb.' w','rw.id_pmprb = w.id_pmprb');
        $this->db->where('du.status', 'lengkap');
         $this->db->where('du.iduser', $satker);
        return $this->db->get($this->tb_rincian_pmprb.' rw')->row()->total;
    }
    
    function total_pmprb_nasinoal(){
        $this->db->select('count(rw.id_pmprb) as total');
        $this->db->join($this->tb_user_pmprb.' du','rw.id_detail = du.id_detail');
        $this->db->join($this->tb_pmprb.' w','rw.id_pmprb = w.id_pmprb');
        if($this->session->userdata('role') == '6'){
            $satker = $this->session->userdata('satker');
            $satker_last = $satker+98;
            $this->db->where("du.iduser BETWEEN ".$satker." AND ".$satker_last."");
          
        }
        return $this->db->get($this->tb_rincian_pmprb.' rw')->row()->total;
    }
    
     public function total_lengkap_pmprb_nasional(){
        $this->db->select('count(rw.id_pmprb) as total');
        $this->db->join($this->tb_user_pmprb.' du','rw.id_detail = du.id_detail');
        $this->db->join($this->tb_pmprb.' w','rw.id_pmprb = w.id_pmprb');
        $this->db->where('du.status', 'lengkap');
        if($this->session->userdata('role') == '6'){
            $satker = $this->session->userdata('satker');
            $satker_last = $satker+98;
            $this->db->where("du.iduser BETWEEN ".$satker." AND ".$satker_last."");
          
        }        
        return $this->db->get($this->tb_rincian_pmprb.' rw')->row()->total;
    }
    
    
    //WBK,WBBM
    
    
    function get_wbk_satker_limit($perpage,$offset){
        $this->db->select('SatkerID, Satker, count(status) as total');
        $this->db->join($this->tb_satker.' s','du.iduser = s.SatkerID');
        if($this->input->get('q')){
            $this->db->like('Satker',$this->input->get('q'));
        }
        if($this->session->userdata('role') == '6'){
            $satker = $this->session->userdata('satker');
            $satker_last = $satker+98;
            $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
          
        }
        $this->db->group_by('iduser');
        $this->db->order_by('total','desc');
        $this->db->limit($perpage, $offset);
        return $this->db->get($this->tb_user_wbk.' du');
    }
    
    
    function get_wbk_satker($limit=NULL){
        $this->db->select('SatkerID, Satker, count(status) as total');
        $this->db->join($this->tb_satker.' s','du.iduser = s.SatkerID');
         if($limit!= NULL){
            $this->db->limit($limit);
        }
        if($this->input->get('q')){
            $this->db->like('Satker',$this->input->get('q'));
        }
        if($this->session->userdata('role') == '6'){
            $satker = $this->session->userdata('satker');
            $satker_last = $satker+98;
            $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
          
        }
        $this->db->limit($limit);
         $this->db->where('status', 'lengkap');
        $this->db->group_by('iduser');
        $this->db->order_by('total','desc');
        return $this->db->get($this->tb_user_wbk.' du');
    }
   
    
    function total_wbk_satker($satker){
        $this->db->select('count(rw.id_wbk) as total');
        $this->db->join($this->tb_user_wbk.' du','rw.id_detail = du.id_detail');
        $this->db->join($this->tb_wbk.' w','rw.id_wbk = w.id_wbk');
        $this->db->where('du.iduser', $satker);
        return $this->db->get($this->tb_rincian_wbk.' rw')->row()->total;
    }

    public function total_lengkap_wbk_satker($satker){
        $this->db->select('count(rw.id_wbk) as total');
        $this->db->join($this->tb_user_wbk.' du','rw.id_detail = du.id_detail');
        $this->db->join($this->tb_wbk.' w','rw.id_wbk = w.id_wbk');
        $this->db->where('du.status', 'lengkap');
         $this->db->where('du.iduser', $satker);
        return $this->db->get($this->tb_rincian_wbk.' rw')->row()->total;
    }
    
    function total_wbk_nasinoal(){
        $this->db->select('count(rw.id_wbk) as total');
        $this->db->join($this->tb_user_wbk.' du','rw.id_detail = du.id_detail');
        $this->db->join($this->tb_wbk.' w','rw.id_wbk = w.id_wbk');
        if($this->session->userdata('role') == '6'){
            $satker = $this->session->userdata('satker');
            $satker_last = $satker+98;
            $this->db->where("du.iduser BETWEEN ".$satker." AND ".$satker_last."");
          
        }       
        return $this->db->get($this->tb_rincian_wbk.' rw')->row()->total;
    }
    
     public function total_lengkap_wbk_nasional(){
        $this->db->select('count(rw.id_wbk) as total');
        $this->db->join($this->tb_user_wbk.' du','rw.id_detail = du.id_detail');
        $this->db->join($this->tb_wbk.' w','rw.id_wbk = w.id_wbk');
        $this->db->where('du.status', 'lengkap');
        if($this->session->userdata('role') == '6'){
            $satker = $this->session->userdata('satker');
            $satker_last = $satker+98;
            $this->db->where("du.iduser BETWEEN ".$satker." AND ".$satker_last."");
          
        }       
        return $this->db->get($this->tb_rincian_wbk.' rw')->row()->total;
    }
    
    //RKT
    
     function get_rkt_satker_limit($perpage,$offset){
        $this->db->select('SatkerID, Satker, count(status) as total');
        $this->db->join($this->tb_satker.' s','du.iduser = s.SatkerID');
        if($this->input->get('q')){
            $this->db->like('Satker',$this->input->get('q'));
        }
        if($this->session->userdata('role') == '6'){
            $satker = $this->session->userdata('satker');
            $satker_last = $satker+98;
            $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
          
        }
        $this->db->group_by('iduser');
        $this->db->order_by('total','desc');
        $this->db->limit($perpage, $offset);
        return $this->db->get($this->tb_user_rkt.' du');
    }
    
    function get_rkt_satker($limit=NULL){
        $this->db->select('SatkerID, Satker, count(status) as total');
        $this->db->join($this->tb_satker.' s','du.iduser = s.SatkerID');
        if($limit!= NULL){
            $this->db->limit($limit);
        }
        if($this->input->get('q')){
            $this->db->like('Satker',$this->input->get('q'));
        }
        if($this->session->userdata('role') == '6'){
            $satker = $this->session->userdata('satker');
            $satker_last = $satker+98;
            $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
          
        }
        $this->db->limit($limit);
        $this->db->group_by('iduser');
        $this->db->order_by('total','desc');
        return $this->db->get($this->tb_user_rkt.' du');
    }
    
    function total_rkt_satker($satker){
        $this->db->select('count(rw.id_rkt) as total');
        $this->db->join($this->tb_rkt.' w','rw.id_rkt = w.id_rkt');
        $this->db->join($this->tb_waktu_pelaksanaan.' p', 'rw.id_rkt_user = p.id_rkt_user');
        $this->db->where('rw.iduser', $satker);
        return $this->db->get($this->tb_user_rkt.' rw')->row()->total;
    }

    public function total_lengkap_rkt_satker($satker){
        $this->db->select('count(rw.id_rkt) as total');
        $this->db->join($this->tb_rkt.' w','rw.id_rkt = w.id_rkt');
        $this->db->join($this->tb_waktu_pelaksanaan.' p', 'rw.id_rkt_user = p.id_rkt_user');
        $this->db->where('p.status', 'lengkap');
        $this->db->where('rw.iduser', $satker);
        return $this->db->get($this->tb_user_rkt.' rw')->row()->total;
    }
    
    function total_rkt_nasinoal(){
        $this->db->select('count(rw.id_rkt) as total');
        $this->db->join($this->tb_rkt.' w','rw.id_rkt = w.id_rkt');
        $this->db->join($this->tb_waktu_pelaksanaan.' p', 'rw.id_rkt_user = p.id_rkt_user');
        if($this->session->userdata('role') == '6'){
            $satker = $this->session->userdata('satker');
            $satker_last = $satker+98;
            $this->db->where("rw.iduser BETWEEN ".$satker." AND ".$satker_last."");
          
        }       
        return $this->db->get($this->tb_user_rkt.' rw')->row()->total;
    }
    
     public function total_lengkap_rkt_nasional(){
        $this->db->select('count(rw.id_rkt) as total');
        $this->db->join($this->tb_rkt.' w','rw.id_rkt = w.id_rkt');
        $this->db->join($this->tb_waktu_pelaksanaan.' p', 'rw.id_rkt_user = p.id_rkt_user');
        $this->db->where('p.status', 'lengkap');
        if($this->session->userdata('role') == '6'){
            $satker = $this->session->userdata('satker');
            $satker_last = $satker+98;
            $this->db->where("rw.iduser BETWEEN ".$satker." AND ".$satker_last."");
          
        }       
        return $this->db->get($this->tb_user_rkt.' rw')->row()->total;
    }
    
    function get_nama_satker($satker){
        $this->db->select('Satker');
        $this->db->where('SatkerID', $satker);
        return $this->db->get('satker');
    }
    
    
    
     
    
}