<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_wbk extends CI_Model {
    
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
            $this->tb_upload_wbk = 'upload_wbk';
             $this->tb_catatan_wbk = 'catatan_wbk';
             $this->tb_notiifkasi = 'notifikasi';
        }
        
        public function get_wbk($id_wbk,$satker){
            $this->db->select('ap.nama_area, ap.id_area');
            $this->db->from( $this->tb_user_wbk.' ds');
            $this->db->join($this->tb_rincian_wbk.' pd', 'ds.id_detail = pd.id_detail');
            $this->db->join($this->tb_wbk.' mp', 'pd.id_wbk = mp.id_wbk');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->join($this->tb_program.' p', 'ap.id_program =p.id_program');
            $this->db->where('ds.iduser', $satker);
            $this->db->where('mp.id_wbk', $id_wbk);
            $this->db->group_by('ap.id_area');
            return $this->db->get();
            
        }
        
        public function get_kategori_penilaian($id_area,$id_satker){
            $this->db->select('mp.indikator, mp.id_wbk');
            $this->db->from( $this->tb_user_wbk.' ds');
            $this->db->join($this->tb_rincian_wbk.' pd', 'ds.id_detail = pd.id_detail');
            $this->db->join($this->tb_wbk.' mp', 'pd.id_wbk = mp.id_wbk');
         
            $this->db->where('ds.iduser', $id_satker);
            $this->db->where('mp.id_wbk', $id_area);
            $this->db->group_by('mp.id_wbk');
            return $this->db->get();
        }
        
        public function get_poin_penilaian($id_wbk,$satker){
             $this->db->select('pd.poin_indikator, pd.id_detail, pd.juknis,pd.daduk, ds.iduser, ds.id_detail_wbk_user');
            $this->db->from( $this->tb_user_wbk.' ds');
            $this->db->join($this->tb_rincian_wbk.' pd', 'ds.id_detail = pd.id_detail');
            $this->db->join($this->tb_wbk.' mp', 'pd.id_wbk = mp.id_wbk');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->join($this->tb_program.' p', 'ap.id_program =p.id_program');
            $this->db->where('ds.iduser', $satker);
            $this->db->where('pd.id_wbk', $id_wbk);
           
            return $this->db->get();
        }
        
        public function get_data_dukung($id_detail){
           $this->db->from($this->tb_upload_wbk.' u_p');
           $this->db->join($this->tb_user_wbk.' ds', 'u_p.id_detail = ds.id_detail_wbk_user');
          
           $this->db->where('u_p.id_detail', $id_detail); 
           return $this->db->get();
            
        }
        
        public function verifikasi(){
            $this->db->set('status', $this->input->post('val'));
            $this->db->where('id_detail', $this->input->post('ref'));
            $this->db->where('iduser', $this->input->post('satker')); 
            $this->db->update( $this->tb_user_wbk );
        }
        
        public function add_catatan(){
            $this->db->where('id_role', $this->session->userdata('role'));
            $role = $this->db->get($this->tb_role);
            $role = $role->row()->role;
            
            $this->db->set('catatan', $this->input->post('catatan'));
            $this->db->set('id_detail', $this->input->post('detail'));
            //$this->db->set('satker', $this->input->post('satker'));
            $this->db->set('pengirim', $this->session->userdata('nama').' , <i>'.$role.'</i>');
            $this->db->set('create_date', date('Y-m-d H:i:s'));
            $this->db->insert( $this->tb_catatan_wbk);
        }
        
        public function get_catatan($id_detail){
            $this->db->where('id_detail', $id_detail);
            return $this->db->get($this->tb_catatan_wbk);
        }
        
        public function upload_data_dukung($image,$path, $satker, $ref,$caption){
            $this->db->set('id_detail', $ref);
            $this->db->set('user_upload', $satker);
            $this->db->set('namafile', $image);
            $this->db->set('path', $path);
            $this->db->set('caption', $caption);
            $this->db->set('upload_date', date('Y-m-d H:i:s'));
            $this->db->insert($this->tb_upload_wbk);
        }
        
        public function get_area_perubahan($tahun, $id_satker){
            $this->db->select('ap.nama_area, ap.id_area');
            $this->db->from( $this->tb_user_wbk.' ds');
            $this->db->join($this->tb_rincian_wbk.' pd', 'ds.id_detail = pd.id_detail');
            $this->db->join($this->tb_wbk.' mp', 'pd.id_wbk = mp.id_wbk');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->where('ds.iduser', $id_satker);
            $this->db->where('ap.tahun_area', $tahun);
            $this->db->group_by('ap.id_area');
            return $this->db->get();
        
        }
        
        public function get_wbk_by_area($id_area,$id_satker){
            $this->db->select('mp.indikator, mp.id_wbk, ap.nama_area, ap.id_area');
            $this->db->from( $this->tb_user_wbk.' ds');
            $this->db->join($this->tb_rincian_wbk.' pd', 'ds.id_detail = pd.id_detail');
            $this->db->join($this->tb_wbk.' mp', 'pd.id_wbk = mp.id_wbk');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->join($this->tb_program.' p', 'ap.id_program =p.id_program');
            $this->db->where('ds.iduser', $id_satker);
            $this->db->where('mp.id_area', $id_area);
            $this->db->group_by('mp.id_wbk');
            return $this->db->get();
        }
        
        public function get_satker_wbk(){
            /*
            $this->db->from($this->tb_user_wbk.' up');
            $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
            $this->db->group_by('up.iduser');
            if($this->input->get('q')){
                $this->db->like('Satker',$this->input->get('q'));
            }
             if($this->session->userdata('role') == '6'){
                $satker = $this->session->userdata('satker');
                $satker_last = $satker+98;
                $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
              
            }
            return $this->db->get();
            */
            
            if($this->session->userdata('ver_satker') == '0'){
                $this->db->from($this->tb_user_wbk.' up');
                $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
                if($this->input->get('q')){
                    $this->db->like('Satker',$this->input->get('q'));
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
                        $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
                        $this->db->where("specialAdmin", null);   
                      }
                }
                
            }else{
                if($this->input->get('satker') == true){
                    $this->db->from($this->tb_user_wbk.' up');
                    $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
                    if($this->input->get('q')){
                        $this->db->like('Satker',$this->input->get('q'));
                    }
                      $satker = $this->input->get('satker').'02';
                      $satker_last = $satker+98;
                      $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
                      if($this->session->userdata('satker') == 11){
                        $this->db->where('specialAdmin', 'imigrasi');
                      }elseif($this->session->userdata('satker') == 10){
                         $this->db->where('specialAdmin', 'ditpas');
                      }elseif($this->session->userdata('satker') == 16){
                         $this->db->where('specialAdmin', 'bpsdm');
                      }elseif($this->session->userdata('satker') == '09'){
                         $this->db->where('specialAdmin', 'yankum');
                      }
                      $this->db->order_by('eselon', 'asc');
                     
                }else{
                    $this->db->from($this->tb_satker.' up');
                    if($this->input->get('q')){
                        $this->db->like('Satker',$this->input->get('q'));
                    }
                    $this->db->where("SatkerID BETWEEN 17 AND 49");
                }
                
                
            }
            return $this->db->get();
        }
        
         public function get_satker_wbk_limit($perpage,$offset){
            if($this->session->userdata('ver_satker') == '0'){
                $this->db->from($this->tb_user_wbk.' up');
                $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
                if($this->input->get('q')){
                    $this->db->like('Satker',$this->input->get('q'));
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
                        $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
                        $this->db->where("specialAdmin", null);   
                      }
                }
                $this->db->limit($perpage, $offset);
            
            }else{
                if($this->input->get('satker') == true){
                    $this->db->from($this->tb_user_wbk.' up');
                    $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
                    if($this->input->get('q')){
                        $this->db->like('Satker',$this->input->get('q'));
                    }
                      $satker = $this->input->get('satker').'02';
                      $satker_last = $satker+98;
                      $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
                      if($this->session->userdata('satker') == 11){
                        $this->db->where('specialAdmin', 'imigrasi');
                      }elseif($this->session->userdata('satker') == 10){
                         $this->db->where('specialAdmin', 'ditpas');
                      }elseif($this->session->userdata('satker') == 16){
                         $this->db->where('specialAdmin', 'bpsdm');
                      }elseif($this->session->userdata('satker') == '09'){
                         $this->db->where('specialAdmin', 'yankum');
                      }
                      $this->db->order_by('eselon', 'asc');
                       $this->db->limit($perpage, $offset);
                }else{
                    $this->db->from($this->tb_satker.' up');
                    if($this->input->get('q')){
                        $this->db->like('Satker',$this->input->get('q'));
                    }
                    $this->db->where("SatkerID BETWEEN 17 AND 49");
                }
                
                
            }
            return $this->db->get();
        }
        
        public function send_notif($notif){
            $this->db->insert($this->tb_notiifkasi, $notif);
        }
        
        public function get_penilaian_wbk($id_detail_user){
            $this->db->from($this->tb_user_wbk.' up');
            $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
            $this->db->join($this->tb_rincian_wbk.' pd', 'up.id_detail = pd.id_detail');
            $this->db->join($this->tb_wbk.' mp', 'pd.id_wbk = mp.id_wbk');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->join($this->tb_program.' p', 'ap.id_program =p.id_program');
            $this->db->where('up.id_detail_wbk_user', $id_detail_user);
            return $this->db->get();
        }
        
        public function get_status_penilaian($id){
            $this->db->where('id_detail_wbk_user', $id);
            return $this->db->get($this->tb_user_wbk);
        }
        
        public function total_lke($id_wbk,$satker){
            $this->db->select('count(id_wbk) as total');
            $this->db->join($this->tb_user_wbk.' du','rw.id_detail = du.id_detail');
            $this->db->where('rw.id_wbk', $id_wbk);
            $this->db->where('du.iduser',$satker);
            return $this->db->get($this->tb_rincian_wbk.' rw')->row()->total;
        }
        
        public function total_lengkap_lke($id_wbk,$satker){
            $this->db->select('count(id_wbk) as total');
            $this->db->join($this->tb_user_wbk.' du','rw.id_detail = du.id_detail');
            $this->db->where('rw.id_wbk', $id_wbk);
            $this->db->where('du.status', 'lengkap');
            $this->db->where('du.iduser',$satker);
            return $this->db->get($this->tb_rincian_wbk.' rw')->row()->total;
        }
        
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
        public function total_lke_area_upload($id_area,$satker){
 
            
            $query = "
                SELECT count(du.id_detail_wbk_user) as total FROM `wbk_detail` `rw`
                JOIN `wbk_detail_user` `du` ON `rw`.`id_detail` = `du`.`id_detail`
                JOIN `upload_wbk` `uw` ON `du`.`id_detail_wbk_user` = `uw`.`id_detail`
                JOIN `master_wbkwbbm` `w` ON `rw`.`id_wbk` = `w`.`id_wbk`
                JOIN `area_perubahan` `a` ON `w`.`id_area` = `a`.`id_area`
                WHERE  `du`.`iduser` = '$satker'
                AND w.id_area = '$id_area'
                AND (`du`.`status` = 'belum lengkap' OR `du`.`status` IS NULL)
                GROUP BY id_detail_wbk_user
            ";
            
            return $this->db->query($query)->num_rows();
        }
        
         public function total_lke_poin_upload($id_wbk,$satker){
   
            $query = "
                SELECT count(du.id_detail_wbk_user) as total FROM `wbk_detail` `rw`
                JOIN `wbk_detail_user` `du` ON `rw`.`id_detail` = `du`.`id_detail`
                JOIN `upload_wbk` `uw` ON `du`.`id_detail_wbk_user` = `uw`.`id_detail`
                WHERE  `du`.`iduser` = '$satker'
                AND rw.id_wbk = '$id_wbk'
                AND (`du`.`status` = 'belum lengkap' OR `du`.`status` IS NULL)
                GROUP BY id_detail_wbk_user
            ";
            
         
            return $this->db->query($query)->num_rows();
        }
        
        function rdok($id){
            $this->db->where("ID", $id);
            $file = $this->db->get($this->tb_upload_wbk);
            
            //remove file
            $old_file = './uploads/wbk/'.$file->row()->namafile;
            chown($old_file, 666);
            unlink($old_file);
        
            //remove from db
            $this->db->where("ID", $id);
            $this->db->delete($this->tb_upload_wbk);
        }
        
        
                //cetak
        public function get_cetak($id_satker,$tahun){
           $this->db->select('ap.nama_area, ap.id_area');
            $this->db->from( $this->tb_user_wbk.' ds');
            $this->db->join($this->tb_rincian_wbk.' pd', 'ds.id_detail = pd.id_detail');
            $this->db->join($this->tb_wbk.' mp', 'pd.id_wbk = mp.id_wbk');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->where('ds.iduser', $id_satker);
            $this->db->where('ap.tahun_area', $tahun);
            $this->db->group_by('ap.id_area');
            return $this->db->get();
        }
        
        public function get_kategori_penilaian_cetak($id_satker, $id_area){
            $this->db->select('mp.indikator, mp.id_wbk');
            $this->db->from( $this->tb_user_wbk.' ds');
            $this->db->join($this->tb_rincian_wbk.' pd', 'ds.id_detail = pd.id_detail');
            $this->db->join($this->tb_wbk.' mp', 'pd.id_wbk = mp.id_wbk');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->where('ds.iduser', $id_satker);
            $this->db->where('ap.id_area', $id_area);
            $this->db->group_by('mp.id_wbk');
            return $this->db->get();
        
        }
 
        
        
       
 
      
}
