<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_satker extends CI_Model {
    
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
            $this->tb_upload_pmprb = 'upload_pmprb';
             $this->tb_catatan_pmprb = 'catatan_pmprb';
             $this->tb_notiifkasi = 'notifikasi';
        }
        
        public function get_pmprb($id_pmprb,$satker){
            $this->db->select('ap.nama_area, ap.id_area');
            $this->db->from( $this->tb_user_pmprb.' ds');
            $this->db->join($this->tb_rincian_pmprb.' pd', 'ds.id_detail = pd.id_detail');
            $this->db->join($this->tb_pmprb.' mp', 'pd.id_pmprb = mp.id_pmprb');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->join($this->tb_program.' p', 'ap.id_program =p.id_program');
            $this->db->where('ds.iduser', $satker);
            $this->db->where('mp.id_pmprb', $id_pmprb);
            $this->db->group_by('ap.id_area');
            return $this->db->get();
            
        }
        
        public function get_kategori_penilaian($id_area,$id_satker){
            $this->db->select('mp.kategori_penilaian, mp.id_pmprb');
            $this->db->from( $this->tb_user_pmprb.' ds');
            $this->db->join($this->tb_rincian_pmprb.' pd', 'ds.id_detail = pd.id_detail');
            $this->db->join($this->tb_pmprb.' mp', 'pd.id_pmprb = mp.id_pmprb');
         
            $this->db->where('ds.iduser', $id_satker);
            $this->db->where('mp.id_pmprb', $id_area);
            $this->db->group_by('mp.id_pmprb');
            return $this->db->get();
        }
        
        public function get_poin_penilaian($id_pmprb,$satker){
             $this->db->select('pd.jenis_lkp,pd.objek_penilaian,pd.data_dukung, pd.id_detail, pd.penjelasan, ds.iduser, ds.id_detail_pmprb_user');
            $this->db->from( $this->tb_user_pmprb.' ds');
            $this->db->join($this->tb_rincian_pmprb.' pd', 'ds.id_detail = pd.id_detail');
            $this->db->join($this->tb_pmprb.' mp', 'pd.id_pmprb = mp.id_pmprb');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->join($this->tb_program.' p', 'ap.id_program =p.id_program');
            $this->db->where('ds.iduser', $satker);
             $this->db->where('pd.id_pmprb', $id_pmprb);
           
            return $this->db->get();
        }
        
        public function get_data_dukung($id_detail){
           $this->db->from($this->tb_upload_pmprb.' u_p');
           $this->db->join($this->tb_user_pmprb.' ds', 'u_p.id_detail = ds.id_detail_pmprb_user');
          
           $this->db->where('u_p.id_detail', $id_detail); 
           return $this->db->get();
            
        }
        
        public function verifikasi(){
            $this->db->set('status', $this->input->post('val', TRUE));
            $this->db->where('id_detail', $this->input->post('ref', TRUE));
            $this->db->where('iduser', $this->input->post('satker', TRUE)); 
            $this->db->update( $this->tb_user_pmprb );
        }
        
        public function add_catatan(){
            $this->db->where('id_role', $this->session->userdata('role'));
            $role = $this->db->get($this->tb_role);
            $role = $role->row()->role;
            
            $this->db->set('catatan', $this->input->post('catatan', TRUE));
            $this->db->set('id_detail', $this->input->post('detail', TRUE));
            //$this->db->set('satker', $this->input->post('satker'));
            $this->db->set('pengirim', $this->session->userdata('nama').' , <i>'.$role.'</i>');
            $this->db->set('create_date', date('Y-m-d H:i:s'));
            $this->db->insert( $this->tb_catatan_pmprb );
        }
        
        public function get_catatan($id_detail){
            $this->db->where('id_detail', $id_detail);
            return $this->db->get($this->tb_catatan_pmprb);
        }
        
        public function upload_data_dukung($image,$path, $satker, $ref,$caption){
            $this->db->set('id_detail', $ref);
            $this->db->set('user_upload', $satker);
            $this->db->set('namafile', $image);
            $this->db->set('path', $path);
            $this->db->set('caption', $caption);
            $this->db->set('upload_date', date('Y-m-d H:i:s'));
            $this->db->insert($this->tb_upload_pmprb);
        }
        
        public function get_area_perubahan($tahun, $id_satker){
            $this->db->select('ap.nama_area, ap.id_area');
            $this->db->from( $this->tb_user_pmprb.' ds');
            $this->db->join($this->tb_rincian_pmprb.' pd', 'ds.id_detail = pd.id_detail');
            $this->db->join($this->tb_pmprb.' mp', 'pd.id_pmprb = mp.id_pmprb');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->where('ds.iduser', $id_satker);
            $this->db->where('ap.tahun_area', $tahun);
            $this->db->group_by('ap.id_area');
            return $this->db->get();
        
        }
        
        public function get_pmrb_by_area($id_area,$id_satker){
             $this->db->select('mp.kategori_penilaian, mp.id_pmprb, ap.nama_area, ap.id_area');
            $this->db->from( $this->tb_user_pmprb.' ds');
            $this->db->join($this->tb_rincian_pmprb.' pd', 'ds.id_detail = pd.id_detail');
            $this->db->join($this->tb_pmprb.' mp', 'pd.id_pmprb = mp.id_pmprb');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->join($this->tb_program.' p', 'ap.id_program =p.id_program');
            $this->db->where('ds.iduser', $id_satker);
            $this->db->where('mp.id_area', $id_area);
            $this->db->group_by('mp.id_pmprb');
            return $this->db->get();
        }
        
        public function get_satker_pmprb(){
            $this->db->from($this->tb_user_pmprb.' up');
            $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
            if($this->input->get('q', TRUE)){
                $this->db->like('Satker',$this->input->get('q'));
            }
            $this->db->group_by('up.iduser');
            return $this->db->get();
        }
         public function get_satker_pmprb_count(){
            $this->db->select('count(s.SatkerID) as total');
            $this->db->from($this->tb_user_pmprb.' up');
            $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
            if($this->input->get('q', TRUE)){
                $this->db->like('Satker',$this->input->get('q', TRUE));
            }
            if($this->session->userdata('role') == '6'){
                $satker = $this->session->userdata('satker');
                $satker_last = $satker+98;
                $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
              
            }
            $this->db->group_by('up.iduser');
            return $this->db->get();
        }
        
        public function get_satker_pmprb_limit($perpage,$offset){
            $this->db->from($this->tb_user_pmprb.' up');
            $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
            if($this->input->get('q', TRUE)){
                $this->db->like('Satker',$this->input->get('q', TRUE));
            }
            if($this->session->userdata('role') == '6'){
                $satker = $this->session->userdata('satker');
                $satker_last = $satker+98;
                $this->db->where("SatkerID BETWEEN ".$satker." AND ".$satker_last."");
              
            }
            $this->db->group_by('up.iduser');
            $this->db->limit($perpage, $offset);
            return $this->db->get();
        }
        
        public function send_notif($notif){
            $this->db->insert($this->tb_notiifkasi, $notif);
        }
        
        public function get_penilaian_pmprb($id_detail_user){
            $this->db->from($this->tb_user_pmprb.' up');
            $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
            $this->db->join($this->tb_rincian_pmprb.' pd', 'up.id_detail = pd.id_detail');
            $this->db->join($this->tb_pmprb.' mp', 'pd.id_pmprb = mp.id_pmprb');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->join($this->tb_program.' p', 'ap.id_program =p.id_program');
            $this->db->where('up.id_detail_pmprb_user', $id_detail_user);
            return $this->db->get();
        }
        
        public function get_status_penilaian($id){
            $this->db->where('id_detail_pmprb_user', $id);
            return $this->db->get($this->tb_user_pmprb);
        }
        
        
         public function total_pmprb($id_pmprb,$satker){
            $this->db->select('count(id_pmprb) as total');
            $this->db->join($this->tb_user_pmprb.' du','rw.id_detail = du.id_detail');
            $this->db->where('rw.id_pmprb', $id_pmprb);
             $this->db->where('du.iduser', $satker);
            return $this->db->get($this->tb_rincian_pmprb.' rw')->row()->total;
        }
        
        public function total_lengkap_pmprb($id_pmprb,$satker){
            $this->db->select('count(id_pmprb) as total');
            $this->db->join($this->tb_user_pmprb.' du','rw.id_detail = du.id_detail');
            $this->db->where('rw.id_pmprb', $id_pmprb);
             $this->db->where('du.status', 'lengkap');
              $this->db->where('du.iduser', $satker);
            return $this->db->get($this->tb_rincian_pmprb.' rw')->row()->total;
        }
        
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
        
        public function count_pmprb_area_upload_new($id_area,$satker){
            $query = "
                SELECT count(du.id_detail_pmprb_user) as total FROM `pmprb_detail` `rw`
                JOIN `pmprb_detail_user` `du` ON `rw`.`id_detail` = `du`.`id_detail`
                JOIN `upload_pmprb` `uw` ON `du`.`id_detail_pmprb_user` = `uw`.`id_detail`
                JOIN `master_pmprb` `w` ON `rw`.`id_pmprb` = `w`.`id_pmprb`
                JOIN `area_perubahan` `a` ON `w`.`id_area` = `a`.`id_area`
                WHERE  `du`.`iduser` = '$satker'
                AND w.id_area = '$id_area'
                AND (`du`.`status` = 'belum lengkap' OR `du`.`status` IS NULL)
                GROUP BY id_detail_pmprb_user
            ";
            return $this->db->query($query)->num_rows();
        }
        
        public function count_pmprb_poin_upload_new($id_pmprb,$satker){
            $query = "
               SELECT count(du.id_detail_pmprb_user) as total FROM `pmprb_detail` `rw`
                JOIN `pmprb_detail_user` `du` ON `rw`.`id_detail` = `du`.`id_detail`
                JOIN `upload_pmprb` `uw` ON `du`.`id_detail_pmprb_user` = `uw`.`id_detail`
                WHERE  `du`.`iduser` = '$satker'
                AND rw.id_pmprb = '$id_pmprb'
                AND (`du`.`status` = 'belum lengkap' OR `du`.`status` IS NULL)
                GROUP BY id_detail_pmprb_user
            ";
            return $this->db->query($query)->num_rows();
        }
        
         function rdok($id){
            $this->db->where("ID", $id);
            $file = $this->db->get($this->tb_upload_pmprb);
            
            //remove file
            $old_file = './uploads/pmprb/'.$file->row()->namafile;
            chown($old_file, 666);
            unlink($old_file);
        
            //remove from db
            $this->db->where("ID", $id);
            $this->db->delete($this->tb_upload_pmprb);
        }
        
        //cetak
        public function get_cetak($satker,$tahun){
            $this->db->select('ap.nama_area, ap.id_area');
            $this->db->from( $this->tb_user_pmprb.' ds');
            $this->db->join($this->tb_rincian_pmprb.' pd', 'ds.id_detail = pd.id_detail');
            $this->db->join($this->tb_pmprb.' mp', 'pd.id_pmprb = mp.id_pmprb');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->where('ds.iduser', $satker);
            $this->db->where('ap.tahun_area', $tahun);
            $this->db->group_by('ap.id_area');
            return $this->db->get();
            
        }
        
        public function get_kategori_penilaian_cetak($id_satker, $id_area){
            $this->db->select('mp.kategori_penilaian, mp.id_pmprb');
            $this->db->from( $this->tb_user_pmprb.' ds');
            $this->db->join($this->tb_rincian_pmprb.' pd', 'ds.id_detail = pd.id_detail');
            $this->db->join($this->tb_pmprb.' mp', 'pd.id_pmprb = mp.id_pmprb');
            $this->db->join($this->tb_area_perubahan.' ap', 'mp.id_area =ap.id_area');
            $this->db->where('ds.iduser', $id_satker);
            $this->db->where('ap.id_area', $id_area);
            $this->db->group_by('mp.id_pmprb');
            return $this->db->get();
        }
 
 
      
}
