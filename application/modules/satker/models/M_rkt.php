<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rkt extends CI_Model {
    
        function __construct(){
            parent::__construct();
            $this->tb_area_perubahan = 'area_perubahan';
            $this->tb_program = 'program';
            $this->tb_wbk = 'master_wbkwbbm';
            $this->tb_pelaksanaan = 'waktu_pelaksanaan';
            $this->tb_kegiatan = 'kegiatan';
            $this->tb_wbk = 'master_wbkwbbm';
            $this->tb_satker = 'satker';
            $this->tb_user = 'user';
            $this->tb_role = 'role';
            $this->tb_rincian_wbk = 'wbk_detail';
            $this->tb_user_wbk = 'wbk_detail_user';
            $this->tb_catatan_rkt = 'catatan_rkt';
            $this->tb_notiifkasi = 'notifikasi';
            $this->tb_rkt = 'master_rkt';
            $this->tb_user_rkt = 'rkt_user';
            $this->tb_upload_rkt = 'upload_rkt';
            $this->tb_pelaksanaan_rkt = 'waktu_pelaksanaan_rkt';
        }
        
          public function get_rkt($id_rkt,$satker){
            $this->db->select('ap.nama_area, ap.id_area');
            $this->db->from( $this->tb_user_rkt.' ds');
            $this->db->join($this->tb_rkt.' mp', 'ds.id_rkt = mp.id_rkt');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->join($this->tb_program.' p', 'ap.id_program =p.id_program');
            $this->db->where('ds.iduser', $satker);
            $this->db->where('mp.id_rkt', $id_rkt);
            $this->db->group_by('ap.id_area');
            return $this->db->get();
            
        }
        
        public function get_kategori_penilaian($id_area,$id_satker){
            $this->db->select('mp.kegiatan, mp.id_rkt');
            $this->db->from( $this->tb_user_rkt.' ds');
            $this->db->join($this->tb_rkt.' mp', 'ds.id_rkt = mp.id_rkt');
            $this->db->where('ds.iduser', $id_satker);
            $this->db->where('mp.id_rkt', $id_area);
            $this->db->group_by('mp.id_rkt');
            return $this->db->get();
        }
        
        public function get_poin_penilaian($id_rkt,$satker){
             $this->db->select('pr.id_pelaksanaan,pr.waktu_pelaksanaan, mp.kegiatan, mp.id_rkt, mp.indikator_keberhasilan, mp.daduk, ds.iduser, ds.id_rkt_user');
            $this->db->from( $this->tb_user_rkt.' ds');
            $this->db->join($this->tb_rkt.' mp', 'ds.id_rkt = mp.id_rkt');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->join($this->tb_program.' p', 'ap.id_program =p.id_program');
            $this->db->join($this->tb_pelaksanaan_rkt.' pr', 'ds.id_rkt_user = pr.id_rkt_user');
            $this->db->where('ds.iduser', $satker);
            $this->db->where('mp.id_rkt', $id_rkt);
            $this->db->group_by('pr.waktu_pelaksanaan');
            return $this->db->get();
        }
        
        public function get_data_dukung($id_pelaksanaan){
            $this->db->select('*,p.status as status');
           $this->db->from($this->tb_upload_rkt.' u_k');
           $this->db->join($this->tb_pelaksanaan_rkt.' p', 'u_k.id_pelaksanaan = p.id_pelaksanaan');
           $this->db->join($this->tb_user_rkt.' ds', 'p.id_rkt_user = ds.id_rkt_user');
           $this->db->where('p.id_pelaksanaan', $id_pelaksanaan); 
           return $this->db->get();
            
        }
        
        public function verifikasi(){
            $this->db->set('status', $this->input->post('val', TRUE));
            $this->db->where('id_pelaksanaan', $this->input->post('ref', TRUE));
           // $this->db->where('iduser', $this->input->post('satker')); 
            $this->db->update( $this->tb_pelaksanaan_rkt );
        }
        
        public function add_catatan(){
            $this->db->where('id_role', $this->session->userdata('role'));
            $role = $this->db->get($this->tb_role);
            $role = $role->row()->role;
            
            $this->db->set('catatan', $this->input->post('catatan'));
              $this->db->set('waktu_pelaksanaan', $this->input->post('waktu'));
            $this->db->set('id_detail', $this->input->post('detail'));
            //$this->db->set('satker', $this->input->post('satker'));
            $this->db->set('pengirim', $this->session->userdata('nama').' , <i>'.$role.'</i>');
            $this->db->set('create_date', date('Y-m-d H:i:s'));
            $this->db->insert( $this->tb_catatan_rkt);
        }
        
        public function get_catatan($id_detail, $waktu){
            $this->db->where('id_detail', $id_detail);
             $this->db->where('waktu_pelaksanaan', $waktu);
            
            return $this->db->get($this->tb_catatan_rkt);
        }
        
        public function upload_data_dukung($image,$path, $satker, $ref,$caption){
            $this->db->set('id_detail', $ref);
             $this->db->set('id_pelaksanaan', $ref);
            $this->db->set('user_upload', $satker);
            $this->db->set('namafile', $image);
            $this->db->set('path', $path);
            $this->db->set('caption', $caption);
            $this->db->set('upload_date', date('Y-m-d H:i:s'));
            $this->db->insert($this->tb_upload_rkt);
        }
        
        public function get_area_perubahan($tahun, $id_satker){
            $this->db->select('ap.nama_area, ap.id_area');
            $this->db->from( $this->tb_user_rkt.' ds');
           
            $this->db->join($this->tb_rkt.' mp', 'ds.id_rkt = mp.id_rkt');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->where('ds.iduser', $id_satker);
            $this->db->where('ap.tahun_area', $tahun);
            $this->db->group_by('ap.id_area');
            return $this->db->get();
        
        }
        
        public function get_rkt_by_area($id_area,$id_satker){
            $this->db->select('mp.kegiatan, mp.id_rkt, ap.nama_area, ap.id_area');
            $this->db->from( $this->tb_user_rkt.' ds');
            $this->db->join($this->tb_rkt.' mp', 'ds.id_rkt= mp.id_rkt');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->join($this->tb_program.' p', 'ap.id_program =p.id_program');
            $this->db->where('ds.iduser', $id_satker);
            $this->db->where('mp.id_area', $id_area);
            $this->db->group_by('mp.id_rkt');
            return $this->db->get();
        }
        
        public function get_satker_rkt(){
            $this->db->from($this->tb_user_rkt.' up');
            $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
            $this->db->group_by('up.iduser');
            return $this->db->get();
        }
        
          public function get_satker_rkt_count_old(){
             $this->db->select('count(s.SatkerID) as total');
            $this->db->from($this->tb_user_rkt.' up');
            $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
            $this->db->group_by('up.iduser');
              if($this->input->get('q', TRUE)){
                $this->db->like('Satker',$this->input->get('q', TRUE));
            }
            if($this->session->userdata('role') == '6'){
                $satker = $this->session->userdata('satker');
                $satker_last = $satker+98;
                $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
              
            }
            return $this->db->get();
        }
        
        public function get_satker_rkt_count(){
            if($this->session->userdata('ver_satker') == '0'){
                $this->db->from($this->tb_user_rkt.' up');
                $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
                if($this->input->get('q', TRUE)){
                    $this->db->like('Satker',$this->input->get('q', TRUE));
                }
                $this->db->group_by('up.iduser');
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
                    $this->db->from($this->tb_user_rkt.' up');
                    $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
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
                      $this->db->group_by('up.iduser');
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
        
        
        
        public function get_satker_rkt_limit_old($perpage,$offset){
            
            $this->db->from($this->tb_user_rkt.' up');
            $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
            $this->db->group_by('up.iduser');
             if($this->input->get('q', TRUE)){
                $this->db->like('Satker',$this->input->get('q', TRUE));
            }
            if($this->session->userdata('role') == '6'){
                $satker = $this->session->userdata('satker');
                $satker_last = $satker+98;
                $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
              
            }
            $this->db->limit($perpage, $offset);
            return $this->db->get();
            
                
        }
        
        
        public function get_satker_rkt_limit($perpage,$offset){
            if($this->session->userdata('ver_satker') == '0'){
                $this->db->from($this->tb_user_rkt.' up');
                $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
                if($this->input->get('q', TRUE)){
                    $this->db->like('Satker',$this->input->get('q', TRUE));
                }
                $this->db->group_by('up.iduser');
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
                    $this->db->from($this->tb_user_rkt.' up');
                    $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
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
                      $this->db->group_by('up.iduser');
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
        
        public function send_notif($notif){
            $this->db->insert($this->tb_notiifkasi, $notif);
        }
        
        public function get_penilaian_rkt($id_detail_user){
            $this->db->from($this->tb_user_rkt.' up');
            $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
           
            $this->db->join($this->tb_rkt.' mp', 'up.id_rkt = mp.id_rkt');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->join($this->tb_program.' p', 'ap.id_program =p.id_program');
            $this->db->where('up.id_rkt_user', $id_detail_user);
            return $this->db->get();
        }
        
        public function get_status_penilaian($id_pelaksanaan){
            $this->db->where('id_pelaksanaan', $id_pelaksanaan);
            return $this->db->get($this->tb_pelaksanaan_rkt);
        }
        
        public function total_rkt($id_rkt, $satker){
            $this->db->select('count(rw.id_rkt) as total');
            $this->db->join($this->tb_rkt.' du','rw.id_rkt = du.id_rkt');
            $this->db->join($this->tb_pelaksanaan_rkt.' p', 'rw.id_rkt_user = p.id_rkt_user');
            $this->db->where('rw.id_rkt', $id_rkt);
            $this->db->where('rw.iduser', $satker);
            return $this->db->get($this->tb_user_rkt.' rw')->row()->total;
        }
        
        public function total_lengkap_rkt($id_rkt, $satker){
            $this->db->select('count(rw.id_rkt) as total');
            $this->db->join($this->tb_rkt.' du','rw.id_rkt = du.id_rkt');
             $this->db->join($this->tb_pelaksanaan_rkt.' p', 'rw.id_rkt_user = p.id_rkt_user');
            $this->db->where('rw.id_rkt', $id_rkt);
            $this->db->where('p.status', 'lengkap');
            $this->db->where('rw.iduser', $satker);
            return $this->db->get($this->tb_user_rkt.' rw')->row()->total;
        }
        
         public function total_rkt_area($id_area,$satker){
            $this->db->select('count(rw.id_rkt) as total');
            $this->db->join($this->tb_rkt.' w','rw.id_rkt = w.id_rkt');
             $this->db->join($this->tb_pelaksanaan_rkt.' p', 'rw.id_rkt_user = p.id_rkt_user');
            $this->db->where('w.id_area', $id_area);
            $this->db->where('rw.iduser', $satker);
            return $this->db->get($this->tb_user_rkt.' rw')->row()->total;
        }
        
        public function total_lengkap_rkt_area($id_area, $satker){
            $this->db->select('count(rw.id_rkt) as total');
            $this->db->join($this->tb_rkt.' w','rw.id_rkt = w.id_rkt');
             $this->db->join($this->tb_pelaksanaan_rkt.' p', 'rw.id_rkt_user = p.id_rkt_user');
            $this->db->where('w.id_area', $id_area);
            $this->db->where('p.status', 'lengkap');
            $this->db->where('rw.iduser', $satker);
            return $this->db->get($this->tb_user_rkt.' rw')->row()->total;
        }
        
       public function count_area_rkt_upload_new($id_area,$satker){
            $query = "
                SELECT count(rw.id_rkt_user) as total FROM `rkt_user` `rw`
                JOIN `waktu_pelaksanaan_rkt` `pr` ON `rw`.`id_rkt_user` = `pr`.`id_rkt_user`
                JOIN `upload_rkt` `uw` ON `pr`.`id_pelaksanaan` = `uw`.`id_detail`
                JOIN `master_rkt` `w` ON `rw`.`id_rkt` = `w`.`id_rkt`
                JOIN `area_perubahan` `a` ON `w`.`id_area` = `a`.`id_area`
                WHERE  `rw`.`iduser` = '$satker'
                AND w.id_area = '$id_area'
                AND (`pr`.`status` = 'belum lengkap' OR `pr`.`status` IS NULL)
                GROUP BY pr.id_pelaksanaan
            ";
            return $this->db->query($query)->num_rows();
        }
        
        public function count_rkt_poin_upload_new($id_rkt,$satker){
            $query = "
               SELECT count(rw.id_rkt_user) as total FROM `rkt_user` `rw`
                JOIN `waktu_pelaksanaan_rkt` `pr` ON `rw`.`id_rkt_user` = `pr`.`id_rkt_user`
                JOIN `upload_rkt` `uw` ON `pr`.`id_pelaksanaan` = `uw`.`id_detail`
                WHERE  `rw`.`iduser` = '$satker'
                AND rw.id_rkt = '$id_rkt'
                AND (`pr`.`status` = 'belum lengkap' OR `pr`.`status` IS NULL)
                GROUP BY pr.id_pelaksanaan
            ";
            return $this->db->query($query)->num_rows();
        }
        
         function rdok($id){
            $this->db->where("ID", $id);
            $file = $this->db->get($this->tb_upload_rkt);
            
            //remove file
            $old_file = './uploads/rkt/'.$file->row()->namafile;
            chown($old_file, 666);
            unlink($old_file);
        
            //remove from db
            $this->db->where("ID", $id);
            $this->db->delete($this->tb_upload_rkt);
        }
        
        //cetak
        public function get_cetak($id_satker,$tahun){
            $this->db->select('ap.nama_area, ap.id_area, mp.id_rkt');
            $this->db->from( $this->tb_user_rkt.' ds');
            $this->db->join($this->tb_rkt.' mp', 'ds.id_rkt = mp.id_rkt');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->where('ds.iduser', $id_satker);
            $this->db->where('ap.tahun_area', $tahun);
            $this->db->group_by('ap.id_area');
            return $this->db->get();
        }
        
        public function get_kategori_penilaian_cetak( $id_satker){
            $this->db->select('mp.kegiatan, mp.id_rkt');
            $this->db->from( $this->tb_user_rkt.' ds');
            $this->db->join($this->tb_rkt.' mp', 'ds.id_rkt = mp.id_rkt');
            $this->db->where('ds.iduser', $id_satker);
            $this->db->group_by('mp.id_rkt');
            return $this->db->get();
        }
        
        public function get_target_waktu(){
            return $this->db->get('master_target');
        }
        
        function check_satker_reupload(){
            $this->db->select('count(id_reupload_wbk) as status');
            $this->db->where('id_satker', $this->session->userdata('satker'));
            return $this->db->get('wbk_satker_reupload');
        }
 
      
}
