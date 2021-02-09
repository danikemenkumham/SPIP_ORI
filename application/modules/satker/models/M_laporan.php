<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {
    
        function __construct(){
            parent::__construct();
            $this->tb_satker = 'satker';
            $this->tb_laporan = 'laporan_rb';
        }

        public function upload_laporan($image,$path){
            
            $satker = $this->get_satker($this->input->post('satker', TRUE));
            
            $this->db->set('tahun', $this->input->post('tahun', TRUE));
            $this->db->set('triwulan',  $this->input->post('ref', TRUE));
            $this->db->set('idsatker',  $this->input->post('satker', TRUE));
            $this->db->set('filename', $image);
            $this->db->set('path_file_laporan', $path);
            $this->db->set('caption', 'Laporan RB Triwulan '.$this->input->post('ref', TRUE).' '.$satker->row()->Satker);
            $this->db->set('upload_date', date('Y-m-d H:i:s'));
            $this->db->set('iduser', $this->session->userdata('iduser'));
            $this->db->insert($this->tb_laporan);
        }
        
        public function get_satker($id){
            $this->db->select('Satker');
            $this->db->where('SatkerID',$id);
            return $this->db->get($this->tb_satker);
        }
        
        public function check_laporan($tahun, $triwulan, $satker){
            $this->db->where('triwulan', $triwulan);
            $this->db->where('idsatker', $satker);
            $this->db->where('tahun', $tahun);
            return $this->db->get($this->tb_laporan);
        }
        
         public function rlap($lap){
            $this->db->where('id_laporan', $lap);
            $file = $this->db->get($this->tb_laporan);
            
            //remove file
            $old_file = './uploads/laporan/'.$file->row()->filename;
            chown($old_file, 666);
            unlink($old_file);
        
            //remove from db
            $this->db->where('id_laporan', $lap);
            $this->db->delete($this->tb_laporan);
        }
        
        public function get_satker_laporan_count(){
            if($this->session->userdata('ver_satker') == '0'){
                $this->db->from($this->tb_laporan.' up');
                $this->db->join($this->tb_satker.' s', 'up.idsatker = s.SatkerID');
                if($this->input->get('q', TRUE)){
                    $this->db->like('Satker',$this->input->get('q', TRUE));
                }
                $this->db->group_by('up.idsatker');
                if($this->session->userdata('role') == '6'){
                    $satker = $this->session->userdata('satker');
                    if($this->session->userdata('satker') == 11){
                        $this->db->where('specialAdmin', 'imigrasi');
                      }elseif($this->session->userdata('satker') == 10){
                         $this->db->where('specialAdmin', 'ditpas');
                      }elseif($this->session->userdata('satker') == 16){
                         $this->db->where('specialAdmin', 'bpsdm');
                      }elseif($this->session->userdata('satker') == '09'){
                         $this->db->where('specialAdmin', 'yankum');
                      }else{
                        $satker_last = $satker+98;
                        $this->db->where("SatkerI BETWEEN ".$satker." AND ".$satker_last."");
                        //$this->db->where("specialAdmin", null);   
                      }
                }
              
            
            }else{
                if($this->input->get('satker', TRUE) == true){
                    $this->db->from($this->tb_laporan.' up');
                    $this->db->join($this->tb_satker.' s', 'up.idsatker = s.SatkerID');
                    if($this->input->get('q', TRUE)){
                        $this->db->like('Satker',$this->input->get('q', TRUE));
                    }
                      $satker = $this->input->get('satker', TRUE).'02';
                      $satker_last = $satker+97;
                      $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
                      if($this->session->userdata('ver_tipe') != ''){
                           if($this->session->userdata('ver_tipe') == 'imi'){
                            $this->db->where('specialAdmin', 'imigrasi');
                          }elseif($this->session->userdata('ver_tipe') == 'pas'){
                             $this->db->where('specialAdmin', 'ditpas');
                          }elseif($this->session->userdata('ver_tipe') == 'bpsdm'){
                             $this->db->where('specialAdmin', 'bpsdm');
                          }elseif($this->session->userdata('ver_tipe') == 'ahu'){
                             $this->db->where('specialAdmin', 'yankum');
                          }  
                      }else{
                            if($this->session->userdata('satker') == 11){
                            $this->db->where('specialAdmin', 'imigrasi');
                          }elseif($this->session->userdata('satker') == 10){
                             $this->db->where('specialAdmin', 'ditpas');
                          }elseif($this->session->userdata('satker') == 16){
                             $this->db->where('specialAdmin', 'badiklat');
                          }elseif($this->session->userdata('satker') == 09){
                             $this->db->where('specialAdmin', 'yankum');
                          }
                      }
                      $this->db->group_by('up.idsatker');
                      $this->db->order_by('eselon', 'asc');
                     
                }else{
                    if($this->session->userdata('ver_tipe') == NULL){
                       $this->db->from($this->tb_satker.' up');
                       $satker = $this->session->userdata('satker').'02';
                       $satker_last = $satker+97;
                       $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
                    
                    }else{
                        $this->db->from($this->tb_satker.' up');
                        if($this->input->get('q', TRUE)){
                            $this->db->like('Satker',$this->input->get('q', TRUE));
                        }
                        $this->db->where("SatkerID BETWEEN 17 AND 49");    
                    }
                    
                    
                }
                
                
            }
            return $this->db->get();
        }
        
        public function get_satker_laporan_limit($perpage,$offset){
            if($this->session->userdata('ver_satker') == '0'){
                $this->db->from($this->tb_laporan.' up');
                $this->db->join($this->tb_satker.' s', 'up.idsatker = s.SatkerID');
                if($this->input->get('q', TRUE)){
                    $this->db->like('Satker',$this->input->get('q', TRUE));
                }
                $this->db->group_by('up.idsatker');
                if($this->session->userdata('role') == '6'){
                    $satker = $this->session->userdata('satker');
                    if($this->session->userdata('satker') == 11){
                        $this->db->where('specialAdmin', 'imigrasi');
                      }elseif($this->session->userdata('satker') == 10){
                         $this->db->where('specialAdmin', 'ditpas');
                      }elseif($this->session->userdata('satker') == 16){
                         $this->db->where('specialAdmin', 'bpsdm');
                      }elseif($this->session->userdata('satker') == '09'){
                         $this->db->where('specialAdmin', 'yankum');
                      }else{
                        $satker_last = $satker+98;
                        $this->db->where("SatkerI BETWEEN ".$satker." AND ".$satker_last."");
                        //$this->db->where("specialAdmin", null);   
                      }
                }
                $this->db->limit($perpage, $offset);
            
            }else{
                if($this->input->get('satker', TRUE) == true){
                    $this->db->from($this->tb_laporan.' up');
                    $this->db->join($this->tb_satker.' s', 'up.idsatker = s.SatkerID');
                    if($this->input->get('q', TRUE)){
                        $this->db->like('Satker',$this->input->get('q', TRUE));
                    }
                      $satker = $this->input->get('satker', TRUE).'02';
                      $satker_last = $satker+97;
                      $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
                      if($this->session->userdata('ver_tipe') != ''){
                           if($this->session->userdata('ver_tipe') == 'imi'){
                            $this->db->where('specialAdmin', 'imigrasi');
                          }elseif($this->session->userdata('ver_tipe') == 'pas'){
                             $this->db->where('specialAdmin', 'ditpas');
                          }elseif($this->session->userdata('ver_tipe') == 'bpsdm'){
                             $this->db->where('specialAdmin', 'bpsdm');
                          }elseif($this->session->userdata('ver_tipe') == 'ahu'){
                             $this->db->where('specialAdmin', 'yankum');
                          }  
                      }else{
                            if($this->session->userdata('satker') == 11){
                            $this->db->where('specialAdmin', 'imigrasi');
                          }elseif($this->session->userdata('satker') == 10){
                             $this->db->where('specialAdmin', 'ditpas');
                          }elseif($this->session->userdata('satker') == 16){
                             $this->db->where('specialAdmin', 'badiklat');
                          }elseif($this->session->userdata('satker') == 09){
                             $this->db->where('specialAdmin', 'yankum');
                          }
                      }
                      $this->db->group_by('up.idsatker');
                      $this->db->order_by('eselon', 'asc');
                       $this->db->limit($perpage, $offset);
                }else{
                    if($this->session->userdata('ver_tipe') == NULL){
                       $this->db->from($this->tb_satker.' up');
                       $satker = $this->session->userdata('satker').'02';
                       $satker_last = $satker+97;
                       $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
                    
                    }else{
                        $this->db->from($this->tb_satker.' up');
                        if($this->input->get('q', TRUE)){
                            $this->db->like('Satker',$this->input->get('q', TRUE));
                        }
                        $this->db->where("SatkerID BETWEEN 17 AND 49");    
                    }
                    
                    
                }
                
                
            }
            return $this->db->get();
        }
      
      
}
