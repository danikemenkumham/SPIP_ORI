<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master extends CI_Model {
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
         $this->tb_kategori = 'kategori';
    }
     

    //model maste area perubahan   
    public function tambah_area_perubahan(){
        $this->db->set('nama_area',$this->input->post('perubahan', TRUE));
        $this->db->set('keterangan_area',$this->input->post('keterangan', TRUE));
        $this->db->set('tahun_area',$this->input->post('tahun', TRUE));
       // $this->db->set('kode_area',$this->input->post('kode'));
        $this->db->set('id_program',$this->input->post('program', TRUE));
        $this->db->insert($this->tb_area_perubahan);
    }
    public function get_area_perubahan(){
        $this->db->select('count(id_area) total');
        if($this->input->get('q')){
            $this->db->like('nama_area',$this->input->get('q'));
        }
        $this->db->where('is_delete', '0');
        $this->db->order_by('nama_area', 'asc');
        
        $this->db->join( $this->tb_program.' tp',  'ta.id_program = tp.id_program');
        return $this->db->get($this->tb_area_perubahan.' ta');
    }
    
     public function get_area_perubahan_limit($perpage,$offset){
        
        $this->db->join( $this->tb_program.' tp',  'ta.id_program = tp.id_program');
        $this->db->where('is_delete', '0');
        if($this->input->get('q')){
            $this->db->like('nama_area',$this->input->get('q'));
        }
        $this->db->order_by('nama_program', 'desc');
        
        $this->db->limit($perpage, $offset);
        return $this->db->get($this->tb_area_perubahan.' ta');
    }
    
    public function get_perubahan_byid($id){
        $this->db->where('id_area', $id);
        return $this->db->get($this->tb_area_perubahan);
    }
    
    public function edit_area_perubahan($id){
        //$this->db->set('kode_area',$this->input->post('kode'));
        $this->db->set('nama_area',$this->input->post('perubahan', TRUE));
        $this->db->set('keterangan_area',$this->input->post('keterangan', TRUE));
        $this->db->set('tahun_area',$this->input->post('tahun', TRUE));
        $this->db->set('id_program',$this->input->post('program', TRUE));
        $this->db->where('id_area', $id);
        $this->db->update($this->tb_area_perubahan);
    }
    
    public function hapus_area_perubahan($id){
        $this->db->set('is_delete', '1');
        $this->db->where('id_area', $id);
        return $this->db->update($this->tb_area_perubahan);
    }
    
    
    //model maste area program   
    public function tambah_program(){
        $this->db->set('nama_program',$this->input->post('program', TRUE));
        $this->db->set('kode_program',$this->input->post('kode', TRUE));
        $this->db->set('create_date', date('Y-m-d h:i:s'));
        $this->db->insert($this->tb_program);
    }
    public function get_program(){
        return $this->db->get($this->tb_program);
    }
    public function get_program_byid($id){
        $this->db->where('id_program', $id);
        return $this->db->get($this->tb_program);
    }
    
    public function edit_program($id){
        $this->db->set('nama_program',$this->input->post('program', TRUE));
        $this->db->set('kode_program',$this->input->post('kode', TRUE));
        $this->db->where('id_program', $id);
        $this->db->update($this->tb_program);
    }
    
    public function hapus_program($id){
        $this->db->where('id_program', $id);
        return $this->db->delete($this->tb_program);
    }
    
    
    
    //wbk wbbm 
    public function tambah_wbk(){
        $this->db->set('indikator',$this->input->post('indikator', TRUE));
        $this->db->set('id_area',$this->input->post('area', TRUE));
        $this->db->insert($this->tb_wbk);
    }
    
    public function get_wbk_limit($perpage,$offset){
        $this->db->join( $this->tb_area_perubahan.' ap',  'ap.id_area = tw.id_area');
       
       
         if($this->input->get('q')){
            $this->db->like('indikator',$this->input->get('q', TRUE));
        }
        $this->db->order_by('nama_area', 'asc');
        $this->db->limit($perpage, $offset);  
        return $this->db->get($this->tb_wbk.' tw');
    }
    
    public function get_wbk(){
        
        $this->db->join( $this->tb_area_perubahan.' ap',  'ap.id_area = tw.id_area');
         if($this->input->get('q')){
            $this->db->like('indikator',$this->input->get('q', TRUE));
        }
        
        
        return $this->db->get($this->tb_wbk.' tw');
    }
    public function get_wbk_byid($id){
        $this->db->where('id_wbk', $id);
        return $this->db->get($this->tb_wbk);
    }
    
    public function edit_wbk($id){
        $this->db->set('indikator',$this->input->post('indikator', TRUE));
        $this->db->set('id_area',$this->input->post('area', TRUE));
        $this->db->where('id_wbk', $id);
        $this->db->update($this->tb_wbk);
    }
    
    public function hapus_wbk($id){
        $this->db->where('id_wbk', $id);
        return $this->db->delete($this->tb_wbk);
    }
    
    public function get_area($jenis){
       $this->db->join( $this->tb_program.' tp',  'ta.id_program = tp.id_program');
        $this->db->where('is_delete', '0');
        $this->db->where('tp.tipe', $jenis);
        $this->db->order_by('nama_area', 'asc');
        
        return $this->db->get($this->tb_area_perubahan.' ta');
    }
    
    //pmprb
    public function tambah_pmprb(){
        $this->db->set('kategori_penilaian',$this->input->post('kategori_penilaian', TRUE));
      
        $this->db->set('id_area',$this->input->post('area', TRUE));
        $this->db->insert($this->tb_pmprb);
    }
    public function get_pmprb(){
        $this->db->join( $this->tb_area_perubahan.' ap',  'ap.id_area = tw.id_area');
        if($this->input->get('q')){
            $this->db->like('kategori_penilaian',$this->input->get('q', TRUE));
        }
        return $this->db->get($this->tb_pmprb.' tw');
    }
    
     public function get_pmprb_limit($perpage,$offset){
        $this->db->join( $this->tb_area_perubahan.' ap',  'ap.id_area = tw.id_area');
        if($this->input->get('q')){
            $this->db->like('kategori_penilaian',$this->input->get('q', TRUE));
        }
        $this->db->order_by('ap.id_area', 'asc');
        $this->db->order_by('kategori_penilaian', 'asc');
        
        $this->db->limit($perpage, $offset);
        return $this->db->get($this->tb_pmprb.' tw');
    }
    
    public function get_pmprb_byid($id){
        $this->db->where('id_pmprb', $id);
        return $this->db->get($this->tb_pmprb);
    }
    
    public function edit_pmprb($id){
        $this->db->set('kategori_penilaian',$this->input->post('kategori_penilaian', TRUE));
    
        $this->db->set('id_area',$this->input->post('area'));
        $this->db->where('id_pmprb', $id);
        $this->db->update($this->tb_pmprb);
    }
    
    public function hapus_pmprb($id){
        $this->db->where('id_pmprb', $id);
        return $this->db->delete($this->tb_pmprb);
    }
    
    
    //model maste pelaksanaan   
    public function get_pelaksanaan(){
        $this->db->where('is_delete', '0');
        return $this->db->get($this->tb_pelaksanaan);
    }
    
    public function tambah_pelaksanaan(){
        $this->db->set('waktu_pelaksanaan',$this->input->post('waktu_pelaksanaan', TRUE));
        $this->db->set('kode_waktu_pelaksanaan',$this->input->post('kode_waktu_pelaksanaan', TRUE));
        $this->db->insert($this->tb_pelaksanaan);
    }
    
    public function get_pelaksanaan_byid($id){
        $this->db->where('id_waktu_pelaksanaan', $id);
        return $this->db->get($this->tb_pelaksanaan);
    }
    
    public function edit_pelaksanaan($id){
        $this->db->set('waktu_pelaksanaan',$this->input->post('waktu_pelaksanaan', TRUE));
        $this->db->set('kode_waktu_pelaksanaan',$this->input->post('kode_waktu_pelaksanaan', TRUE));
        $this->db->where('id_waktu_pelaksanaan', $id);
        $this->db->update($this->tb_pelaksanaan);
    }
    
    public function hapus_pelaksanaan($id){
        $this->db->set('is_delete', '1');
        $this->db->where('id_waktu_pelaksanaan', $id);
        return $this->db->update($this->tb_pelaksanaan);
    }
    
    
     //model master kegiatan   
    public function get_kegiatan(){
        $this->db->join($this->tb_capaian.' c', 'c.id_capaian = k.id_capaian');
        $this->db->join($this->tb_area_perubahan.' ap', 'c.id_area_perubahan = ap.id_area_perubahan');
        $this->db->where('k.is_delete', '0');
        return $this->db->get($this->tb_kegiatan.' k');
    }
    
    public function tambah_kegiatan(){
         $this->db->set('kode_kegiatan',$this->input->post('kode', TRUE));
        $this->db->set('nama_kegiatan',$this->input->post('kegiatan', TRUE));
        $this->db->set('indikator_keberhasilan',$this->input->post('indikator', TRUE));
        $this->db->set('data_dukung',$this->input->post('data_dukung', TRUE));
        $this->db->set('penanggung_jawab',$this->input->post('penanggung_jawab', TRUE));
        $this->db->set('id_capaian',$this->input->post('capaian', TRUE));
        $this->db->set('waktu_pelaksanaan',$this->input->post('waktu', TRUE));
        $this->db->insert($this->tb_kegiatan);
    }
    
    public function get_kegiatan_byid($id){
        $this->db->where('id_waktu_pelaksanaan', $id);
        return $this->db->get($this->tb_kegiatan);
    }
    
    public function edit_kegiatan($id){
        $this->db->set('waktu_pelaksanaan',$this->input->post('waktu_pelaksanaan', TRUE));
        $this->db->set('kode_waktu_pelaksanaan',$this->input->post('kode_waktu_pelaksanaan', TRUE));
        $this->db->where('id_waktu_pelaksanaan', $id);
        $this->db->update($this->tb_kegiatan);
    }
    
    public function hapus_kegiatan($id){
        $this->db->set('is_delete', '1');
        $this->db->where('id_waktu_pelaksanaan', $id);
        return $this->db->update($this->tb_pelaksanaan);
    }
    
    public function get_capaian_by_perubahan($id){
        $this->db->where('is_delete', 0);
        $this->db->where('id_area_perubahan', $id);
        return $this->db->get($this->tb_capaian);
    }
    
    //model maste area satker   
    public function tambah_satker(){
        $this->db->set('Satker',$this->input->post('satker'));
        $this->db->set('SatkerID',$this->input->post('kode'));
        $this->db->insert($this->tb_satker);
    }
    public function get_satker(){
        $this->db->limit(100);
        $this->db->where('eselon', '21');
        $this->db->order_by('SatkerID', 'desc');
        return $this->db->get($this->tb_satker);
    }
    public function get_satker_all(){
        $this->db->where('SatkerID <=', 4999);
        $this->db->where('eselon <=', 42);
        return $this->db->get($this->tb_satker);    
        
    }
    public function get_satker_limit($perpage, $limit){
        $this->db->where('SatkerID <=', 4999);
        $this->db->where('eselon <=', 42);
        if($this->input->get('q')){
            $this->db->like('satker',$this->input->get('q'));
        }
        $this->db->limit($perpage, $limit);
        return $this->db->get($this->tb_satker);    
        
    }
    
    
    public function get_satker_byid($id){
        $this->db->where('SatkerID', $id);
        return $this->db->get($this->tb_satker);
    }
    
    public function edit_satker($id){
        //update nama user
        $this->db->set('nama',$this->input->post('satker'));
        $this->db->where('username', $id);
        $this->db->update($this->tb_user);
        
        //update satker
        $this->db->set('Satker',$this->input->post('satker'));
        $this->db->where('SatkerID', $id);
        $this->db->update($this->tb_satker);
    }
    
    public function hapus_satker($id){
        $this->db->where('SatkerID', $id);
        return $this->db->delete($this->tb_satker);
    }
    
    //model master user    
    public function tambah_user(){
        $this->db->set('nama',$this->input->post('nama', TRUE));
        $this->db->set('username',$this->input->post('username', TRUE));
        $this->db->set('status',$this->input->post('status', TRUE));
        $this->db->set('id_role',$this->input->post('role', TRUE));
        $this->db->set('satker_id',$this->input->post('satker', TRUE));
		$options = array(
			'cost' => 12,
		);
		$password = password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT, $options);
        $this->db->set('password',$password);
        $this->db->insert($this->tb_user);
    }
    public function get_role(){
        return $this->db->get('role');
    }
    
    
    public function get_role_limit(){
         $this->db->limit($perpage, $offset);        
        return $this->db->get('role');
    }
                
    public function get_satker_list(){
        $this->db->where('eselon', '21');

        return $this->db->get($this->tb_satker);
    }
    public function get_user(){
        $this->db->select('count(tu.iduser) as total');
        $this->db->join($this->tb_satker.' ts', 'tu.satker_id = ts.SatkerID');
        $this->db->join($this->tb_role.' tr', 'tu.id_role = tr.id_role');
        return $this->db->get($this->tb_user.' tu');
    }
    
    
     public function get_user_limit($perpage,$offset){
        $this->db->join($this->tb_satker.' ts', 'tu.satker_id = ts.SatkerID');
        $this->db->join($this->tb_role.' tr', 'tu.id_role = tr.id_role');
        $this->db->limit($perpage, $offset);
        return $this->db->get($this->tb_user.' tu');
    }
    
    
    
    
    public function get_user_byid($id){
        $this->db->where('iduser', $id);
        return $this->db->get($this->tb_user);
    }
    
    public function edit_user($id){
        $this->db->set('nama',$this->input->post('nama', TRUE));
        $this->db->set('username',$this->input->post('username', TRUE));
        $this->db->set('status',$this->input->post('status', TRUE));
        $this->db->set('id_role',$this->input->post('role', TRUE));
        $this->db->set('satker_id',$this->input->post('satker', TRUE));
        if($this->input->post('password') != ''){
            $options = array(
    			'cost' => 12,
    		);
    		$password = password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT, $options);
            $this->db->set('password',$password);    
        }
		
        $this->db->where('iduser', $id);
        $this->db->update($this->tb_user);
    }
    
    public function hapus_user($id){
        $this->db->where('iduser', $id);
        return $this->db->delete($this->tb_user);
    }
    
    
    //model master Role   
    public function tambah_role(){
        $this->db->set('role',$this->input->post('role', TRUE));
        $this->db->insert($this->tb_role);
    }
    public function get_role_list(){
        return $this->db->get($this->tb_role);
    }
    public function get_role_byid($id){
        $this->db->where('id_role', $id);
        return $this->db->get($this->tb_role);
    }
    
    public function edit_role($id){
        $this->db->set('role',$this->input->post('role', TRUE));
        $this->db->where('id_role', $id);
        $this->db->update($this->tb_role);
    }
    
    public function hapus_role($id){
        $this->db->where('id_role', $id);
        return $this->db->delete($this->tb_role);
    }
    
    
    //rincian pmprb
    public function tambah_rincian_pmprb(){
        
        $this->db->set('penjelasan', $this->input->post('penjelasan', TRUE));
        $this->db->set('objek_penilaian', $this->input->post('objek_penilaian', TRUE));
        $this->db->set('id_pmprb', $this->input->post('pmprb, TRUE'));
        $this->db->set('jenis_lkp', $this->input->post('jenis_lkp', TRUE));
        $this->db->set('data_dukung', $this->input->post('data_dukung', TRUE));
        $this->db->insert($this->tb_rincian_pmprb);
        $id = $this->db->insert_id();
        
        $satker = $_POST['satker_list'];
        foreach($satker as $dt_satker){
            if($dt_satker != ''){
                if($dt_satker != 'on'){
                   $this->db->set('id_detail', $id);
                   $this->db->set('iduser', $dt_satker);
                   $this->db->insert($this->tb_user_pmprb);    
                }  
            }
        }   
    }
    
    public function edit_rincian_pmprb($id_rincian){
        $this->db->set('penjelasan', $this->input->post('penjelasan', TRUE));
        $this->db->set('objek_penilaian', $this->input->post('objek_penilaian', TRUE));
        $this->db->set('jenis_lkp', $this->input->post('jenis_lkp', TRUE));
        $this->db->set('id_pmprb', $this->input->post('pmprb', TRUE));
         $this->db->set('data_dukung', $this->input->post('data_dukung', TRUE));
        $this->db->where('id_detail', $id_rincian);
        $this->db->update($this->tb_rincian_pmprb);
        
        
        $this->db->where('id_detail', $id_rincian);
        $user = $this->db->get($this->tb_user_pmprb);
        $user_exist = [];
        foreach($user->result() as $dt_user){
             $user_exist[] = $dt_user->iduser;
          
        }
         $satker = $_POST['satker_list'];
         $delete = array_diff($user_exist,$satker );
         foreach($delete  as $dt_delete){
            if($dt_delete != ''){
                if($dt_delete != 'on'){
                    $this->db->where('iduser',$dt_delete);
                    $this->db->where('id_detail',$id_rincian);
                    $this->db->delete($this->tb_user_pmprb);
                }
            }
            
         }
         
         $new = array_diff($satker,$user_exist );
         foreach($new  as $dt_new){
            if($dt_new != ''){
                if($dt_new != 'on'){
                    $this->db->set('iduser',$dt_new);
                    $this->db->set('id_detail',$id_rincian);
                    $this->db->insert($this->tb_user_pmprb);
                }
            }
         }
    
    }
    
    public function hapus_detail_pmprb($ref){
        $this->db->where('id_detail', $ref);
        $this->db->delete($this->tb_rincian_pmprb);
        $this->db->where('id_detail', $ref);
        $this->db->delete($this->tb_user_pmprb);
    }
    
    
    
    public function get_rincian_pmprb_limit($perpage,$offset){
        $this->db->join( $this->tb_pmprb.' p',  'rp.id_pmprb = p.id_pmprb');
        $this->db->join( $this->tb_area_perubahan.' ap',  'p.id_area = ap.id_area');
        
        if($this->input->get('q')){
            $this->db->like('objek_penilaian',$this->input->get('q'));
        }
        $this->db->order_by('nama_area', 'asc');
        $this->db->order_by('kategori_penilaian', 'asc');
        $this->db->limit($perpage, $offset);
        return $this->db->get($this->tb_rincian_pmprb.' rp');
    }
    
    public function get_rincian_pmprb(){
        $this->db->join( $this->tb_pmprb.' p',  'rp.id_pmprb = p.id_pmprb');
        if($this->input->get('q')){
            $this->db->like('objek_penilaian',$this->input->get('q'));
        }
      
        return $this->db->get($this->tb_rincian_pmprb.' rp');
    }
    
    public function get_rincian_pmprb_edit($id){
        $this->db->join( $this->tb_pmprb.' p',  'rp.id_pmprb = p.id_pmprb');
        $this->db->where('rp.id_detail', $id);
        return $this->db->get($this->tb_rincian_pmprb.' rp');
    }
    
    
    public function get_rincian_pmprb_byid($id){
        $this->db->where('id_pmprb', $id);
        return $this->db->get($this->tb_pmprb);
    }

    
    public function hapus_rincian_pmprb($id){
        $this->db->where('id_pmprb', $id);
        return $this->db->delete($this->tb_pmprb);
    }
    
    public function get_satker_rincian($id){
        $this->db->select('count(id_detail_pmprb_user) as total');
        $this->db->where('id_detail', $id);
        return $this->db->get($this->tb_user_pmprb)->row()->total;
    }
    
    public function get_satker_edit_pmprb($id){
        $this->db->from($this->tb_user_pmprb.' uk');
        $this->db->join($this->tb_satker.' s', 'uk.iduser = s.SatkerID');
        $this->db->where('id_detail', $id);
        return $this->db->get();
    }
    
    public function get_waktu_edit_pmprb($id){
        $this->db->from($this->tb_user_pmprb.' uk');
        $this->db->join($this->tb_satker.' s', 'uk.iduser = s.SatkerID');
        $this->db->where('id_detail', $id);
        return $this->db->get();
    }
    
    public function add_satker_detail_pmprb(){
        $this->db->set('iduser', $this->input->post('satker'));
        $this->db->set('id_detail', $this->input->post('detail'));
        $this->db->insert($this->tb_user_pmprb);
    }
    
    public function remove_satker_detail($id){
        $this->db->where('id_detail_pmprb_user', $id);
        $this->db->delete($this->tb_user_pmprb);
    }
    
    
    //rincian wbk,wbbm
     public function get_rincian_wbk(){
        $this->db->join( $this->tb_wbk.' p',  'rw.id_wbk = p.id_wbk');
        $this->db->join( $this->tb_area_perubahan.' ap',  'p.id_area = ap.id_area');
        if($this->input->get('q')){
            $this->db->like('poin_indikator',$this->input->get('q'));
        }
        $this->db->group_by('rw.poin_indikator');
        
        return $this->db->get($this->tb_rincian_wbk.' rw');
    }
    
    public function get_rincian_wbk_limit($perpage,$offset){
        $this->db->join( $this->tb_wbk.' p',  'rw.id_wbk = p.id_wbk');
        $this->db->join( $this->tb_area_perubahan.' ap',  'p.id_area = ap.id_area');
        if($this->input->get('q')){
            $this->db->like('poin_indikator',$this->input->get('q'));
        }
        $this->db->group_by('rw.poin_indikator');
        $this->db->order_by('nama_area', 'asc');
        $this->db->order_by('indikator', 'asc');
        $this->db->limit($perpage, $offset);
        return $this->db->get($this->tb_rincian_wbk.' rw');
    }
    
    
     public function tambah_rincian_wbk(){
        
        $this->db->set('daduk', $this->input->post('daduk', TRUE));
        $this->db->set('poin_indikator', $this->input->post('poin_indikator', TRUE));
        $this->db->set('juknis', $this->input->post('juknis', TRUE));
        $this->db->set('id_wbk', $this->input->post('wbk', TRUE));
        $this->db->insert($this->tb_rincian_wbk);
        $id = $this->db->insert_id();
        
        $satker = $_POST['satker_list'];
        foreach($satker as $dt_satker){
             if($dt_satker != ''){
                if($dt_satker != 'on'){
                    $this->db->set('id_detail', $id);
                    $this->db->set('iduser', $dt_satker);
                    $this->db->insert($this->tb_user_wbk);
                }
            }
        }   
    }
    
    public function edit_rincian_wbk($id_rincian){
        $this->db->set('daduk', $this->input->post('daduk', TRUE));
        $this->db->set('poin_indikator', $this->input->post('poin_indikator', TRUE));
        $this->db->set('juknis', $this->input->post('juknis', TRUE));
        $this->db->set('id_wbk', $this->input->post('wbk', TRUE));
        $this->db->where('id_detail', $id_rincian);
        $this->db->update($this->tb_rincian_wbk);
        
        
        
        $this->db->where('id_detail', $id_rincian);
        $user = $this->db->get($this->tb_user_wbk);
        $user_exist = [];
        foreach($user->result() as $dt_user){
             $user_exist[] = $dt_user->iduser;
          
        }
         $satker = $_POST['satker_list'];
         $delete = array_diff($user_exist,$satker );
         foreach($delete  as $dt_delete){
            if($dt_delete != ''){
                if($dt_delete != 'on'){
                    $this->db->where('iduser',$dt_delete);
                    $this->db->where('id_detail',$id_rincian);
                    $this->db->delete($this->tb_user_wbk);
                }
            }
            
         }
         
         $new = array_diff($satker,$user_exist );
         foreach($new  as $dt_new){
            if($dt_new != ''){
                if ($dt_new != 'on'){
                    $this->db->set('iduser',$dt_new);
                    $this->db->set('id_detail',$id_rincian);
                    $this->db->insert($this->tb_user_wbk);
                }
            }
         }
        
    
    }
    
     public function get_satker_rincian_wbk($id){
        $this->db->select('count(id_detail_wbk_user) as total');
        $this->db->where('id_detail', $id);
        return $this->db->get($this->tb_user_wbk)->row()->total;
    }
    
    public function get_rincian_wbk_edit($id){
        $this->db->join( $this->tb_wbk.' p',  'rp.id_wbk = p.id_wbk');
        $this->db->where('rp.id_detail', $id);
        return $this->db->get($this->tb_rincian_wbk.' rp');
    }
    
     public function get_satker_edit_wbk($id){
        $this->db->from($this->tb_user_wbk.' up');
        $this->db->join($this->tb_satker.' s', 'up.iduser = s.SatkerID');
        $this->db->where('id_detail', $id);
        return $this->db->get();
    }
    
    public function remove_satker_detail_wbk($id){
        $this->db->where('id_detail_wbk_user', $id);
        $this->db->delete($this->tb_user_wbk);
    }
    
    public function add_satker_detail_wbk(){
        $this->db->set('iduser', $this->input->post('satker', TRUE));
        $this->db->set('id_detail', $this->input->post('detail', TRUE));
        $this->db->insert($this->tb_user_wbk);
    }
    
     public function hapus_detail_wbk($ref){
        $this->db->where('id_detail', $ref);
        $this->db->delete($this->tb_rincian_wbk);
        
        
        $this->db->where('id_detail', $ref);
        $this->db->delete($this->tb_user_wbk);
    }
    
    //rkt model
     public function get_rkt(){
        $this->db->join( $this->tb_user_rkt.' ur',  'r.id_rkt = ur.id_rkt');
        $this->db->join( $this->tb_satker.' s',  'ur.iduser = s.SatkerID');
        $this->db->join($this->tb_area_perubahan.' a', 'r.id_area= a.id_area');
        if($this->input->get('q')){
            $this->db->like('kegiatan',$this->input->get('q', TRUE));
        }
        $this->db->group_by('r.id_rkt');
        return $this->db->get($this->tb_rkt.' r');
    }
    
    public function get_rkt_limit($perpage,$offset){  
        $this->db->join( $this->tb_user_rkt.' ur',  'r.id_rkt = ur.id_rkt');
        $this->db->join( $this->tb_satker.' s',  'ur.iduser = s.SatkerID');
        $this->db->join($this->tb_area_perubahan.' a', 'r.id_area= a.id_area');
      
        if($this->input->get('q')){
            $this->db->like('kegiatan',$this->input->get('q', TRUE));
        }
        $this->db->limit($perpage, $offset);
        $this->db->group_by('r.id_rkt');
        return $this->db->get($this->tb_rkt.' r');
    }
    
    public function get_satker_rkt_byesel($tipe){
        if($tipe == 'biro'){
            $this->db->where("SatkerID BETWEEN 0501 AND 0507");
            return $this->db->get($this->tb_satker);
        }elseif($tipe == 'esel1'){
            $this->db->where("SatkerID BETWEEN 05 AND 16");
            return $this->db->get($this->tb_satker);
        }elseif($tipe == 'kanwil'){
            $this->db->where("SatkerID BETWEEN 1701 AND 4901");
            $this->db->where('Eselon', 21);
            return $this->db->get($this->tb_satker);
        }
    }
    
    public function tambah_rkt(){
        $this->db->set('kegiatan', $this->input->post('kegiatan', TRUE));
        $this->db->set('id_area', $this->input->post('area', TRUE));
        $this->db->set('daduk', $this->input->post('daduk', TRUE));
        $this->db->insert($this->tb_rkt);
        $id = $this->db->insert_id();
        
        $satker = $_POST['satker_list'];
       
        foreach($satker as $dt_satker){
             if($dt_satker != ''){
                if($dt_satker != 'on'){
                    $this->db->set('id_rkt', $id);
                    $this->db->set('iduser', $dt_satker);
                    $this->db->insert($this->tb_user_rkt);
                    
                    $id_user = $this->db->insert_id();
                    $waktu = $_POST['waktu'];
                    foreach($waktu as $dt_waktu){
                        $this->db->set('id_rkt_user', $id_user);
                        $this->db->set('waktu_pelaksanaan', $dt_waktu);
                        $this->db->insert($this->tb_waktu_pelaksanaan);
                    }
                }
            }  
        }
        
            
    }
    
    public function edit_rkt($id_rkt){
        //update data kegiatan
        
        $this->db->set('kegiatan', $this->input->post('kegiatan', TRUE));
        $this->db->set('id_area', $this->input->post('area', TRUE));
        $this->db->set('daduk', $this->input->post('daduk', TRUE));
        $this->db->where('id_rkt', $id_rkt);
        $this->db->update($this->tb_rkt);
        
       
            $this->db->where('id_rkt', $id_rkt);
            $rkt = $this->db->get($this->tb_user_rkt);
            $user_exist = [];
            foreach($rkt->result() as  $dt_rkt){
                $user_exist[] = $dt_rkt->iduser;
            }
       
            $satker = $_POST['satker_list'];
            $delete = array_diff($user_exist,$satker );
            //delete user rkt
            foreach($delete  as $dt_delete){
                if($dt_satker != ''){
                    if ($dt_satker != 'on'){
                        $this->db->where('iduser', $dt_delete);
                        $this->db->where('id_rkt', $id_rkt);
                        $rkt_user = $this->db->get($this->tb_user_rkt);
                        
                        //delete waktu pelaksanaa
                        $this->db->where('id_rkt_user', $rkt_user->row()->id_rkt_user);
                        $this->db->delete($this->tb_waktu_pelaksanaan);
                        
                        //delete user rkt
                        $this->db->where('id_rkt_user', $rkt_user->row()->id_rkt_user);
                        $this->db->delete($this->tb_user_rkt);
                    }
                }
            }
            
            //tambahkan user baru
            $new = array_diff($satker,$user_exist );
            foreach($new as $dt_satker){
                if($dt_satker != ''){
                    if($dt_satker != 'on'){
                        $this->db->set('id_rkt', $id_rkt);
                        $this->db->set('iduser', $dt_satker);
                        $this->db->insert($this->tb_user_rkt);
                        
                        //tambahkan waktu pelaksanaan untuk user baru
                        $id_user = $this->db->insert_id();
                        $waktu = $_POST['waktu'];
                        foreach($waktu as $dt_waktu){
                            $this->db->set('id_rkt_user', $id_user);
                            $this->db->set('waktu_pelaksanaan', $dt_waktu);
                            $this->db->insert($this->tb_waktu_pelaksanaan);
                        }  
                    }
                }
            }
            
            
            //update waktu pelaksannan
            $this->db->join($this->tb_waktu_pelaksanaan. ' w', 'uk.id_rkt_user = w.id_rkt_user');
            $this->db->where('id_rkt', $id_rkt);
            $this->db->group_by('waktu_pelaksanaan');
            $waktu = $this->db->get($this->tb_user_rkt.' uk');
           
            $user_exist = [];
            $waktu_exist = [];
            foreach($waktu->result() as  $dt_rkt){
                $waktu_exist[] = $dt_rkt->waktu_pelaksanaan;
            }
            
            $satker = $_POST['satker_list'];
            $waktu = $_POST['waktu'];

           
            $waktu_baru = array_diff($waktu,$waktu_exist );
            $waktu_hapus = array_diff($waktu_exist,$waktu );
            
         
            $this->db->where('id_rkt', $id_rkt);
            $rkt = $this->db->get($this->tb_user_rkt);
            foreach($rkt->result() as $dt_rkt){
                //tambah waktu baru
                foreach($waktu_baru  as $wkt_baru){
                    $this->db->set('waktu_pelaksanaan', $wkt_baru);
                    $this->db->set('id_rkt_user', $dt_rkt->id_rkt_user);
                    $this->db->insert($this->tb_waktu_pelaksanaan);
                }
                //hapus waktu lama yang ke upadate
                 foreach($waktu_hapus  as $wkt_lama){
                    $this->db->where('id_rkt_user', $dt_rkt->id_rkt_user);
                    $this->db->where('waktu_pelaksanaan', $wkt_lama);
                    $this->db->delete($this->tb_waktu_pelaksanaan);
                 }
            }
            
            
    }
    
    public function get_satker_rincian_rkt($id){
        $this->db->select('count(id_rkt_user) as total');
        $this->db->where('id_rkt', $id);
        return $this->db->get($this->tb_user_rkt)->row()->total;
    }
    
    public function get_rincian_rkt_edit($id_rkt){
        $this->db->where('id_rkt', $id_rkt);
        return $this->db->get($this->tb_rkt.' r');
    }
    
    public function get_waktu_rkt($id_rkt){

        $this->db->join($this->tb_waktu_pelaksanaan.' wp', 'r.id_rkt_user= wp.id_rkt_user');
        $this->db->where('id_rkt', $id_rkt);
        $this->db->group_by('wp.waktu_pelaksanaan');
        return $this->db->get($this->tb_user_rkt.' r');
    }
    
    public function add_satker_detail_rkt(){
        $this->db->set('iduser', $this->input->post('satker', TRUE));
        $this->db->set('id_rkt', $this->input->post('detail', TRUE));
        $this->db->insert($this->tb_user_rkt);
    }
    
    public function hapus_rkt($ref){
        $this->db->where('id_rkt', $ref);
        $rkt = $this->db->get($this->tb_user_rkt);
        //delete table pelaksanaan
        foreach($rkt->result() as $dt_rkt){
            $this->db->where('id_rkt_user', $dt_rkt->id_rkt_user);
            $this->db->delete($this->tb_waktu_pelaksanaan);
        }
        //delete user rkt
        $this->db->where('id_rkt', $ref);
        $this->db->delete($this->tb_user_rkt);
        
        //delete rkt
        $this->db->where('id_rkt', $ref);
        $this->db->delete($this->tb_rkt);
        
    }
    
     public function get_satker_edit_rkt($id){
        $this->db->from($this->tb_user_rkt.' uk');
        $this->db->join($this->tb_satker.' s', 'uk.iduser = s.SatkerID');
        $this->db->where('id_rkt', $id);
        return $this->db->get();
    }
    
    public function get_waktu_edit_rkt($id){
        $this->db->from($this->tb_user_rkt.' uk');
        $this->db->join($this->tb_satker.' s', 'uk.iduser = s.SatkerID');
        $this->db->where('id_rkt', $id);
        return $this->db->get();
    }
    
    public function getsatker($type){
        if($type == 'esel'){
            $this->db->where('Eselon','11');
            return $this->db->get($this->tb_satker);    
        }elseif($type == 'kanwil'){
            $this->db->where("SatkerID  BETWEEN 1701 AND 4901");
            $this->db->where('Eselon', 21);    
            return $this->db->get($this->tb_satker);    
        }
        
    }
    
    
    //satker
    function get_satker_kanwil(){
        $this->db->where("SatkerID  BETWEEN 1701 AND 4901");
        $this->db->where('Eselon', 21);    
        return $this->db->get($this->tb_satker);    
    }
    
    function get_upt_kanwil($kanwil){
        $satkerid = substr($kanwil,0,2);
        $satkerid = $satkerid.'__';
        $sql = "select * from satker where SatkerID like '$satkerid'";
        return $this->db->query($sql);    
    }
    
    function get_esel(){
        $this->db->where('Eselon','11');
        return $this->db->get($this->tb_satker); 
    }
    function get_biro($esel){
        $satkerid = $esel.'__';
        $sql = "select * from satker where SatkerID like '$satkerid'";
        return $this->db->query($sql);     
    }
    
    function check_detail_pmprb_satker($satker, $id_detail){
        $this->db->select('iduser');
        $this->db->where('iduser', $satker);
        $this->db->where('id_detail', $id_detail);
        return $this->db->get($this->tb_user_pmprb);
    }
    
     function check_detail_wbk_satker($satker, $id_detail){
        $this->db->select('iduser');
        $this->db->where('iduser', $satker);
        $this->db->where('id_detail', $id_detail);
        return $this->db->get($this->tb_user_wbk);
    }
    
    function check_detail_rkt_satker($satker,$id_detail ){
        $this->db->select('iduser');
        $this->db->where('iduser', $satker);
        $this->db->where('id_rkt', $id_detail);
        return $this->db->get($this->tb_user_rkt);
    }
    
    //kategori
    
    function get_kategori(){
        $this->db->where('is_delete', '0');
        return $this->db->get('kategori');
    }
    
     //model master Role   
    public function tambah_kategori(){
        $this->db->set('jenis',$this->input->post('jenis', TRUE));
        $this->db->set('kategori',$this->input->post('kategori', TRUE));
        $this->db->insert($this->tb_kategori);
    }
    public function get_kategori_list(){
        return $this->db->get($this->tb_kategori);
    }
    public function get_kategori_byid($id){
        $this->db->where('id_kategori', $id);
        return $this->db->get($this->tb_kategori);
    }
    
    public function edit_kategori($id){
        $this->db->set('kategori',$this->input->post('kategori', TRUE));
        $this->db->set('jenis',$this->input->post('jenis', TRUE));
        $this->db->where('id_kategori', $id);
        $this->db->update($this->tb_kategori);
    }
    
    public function hapus_kategori($id){
        $this->db->set('is_delete', '1');
        $this->db->where('id_kategori', $id);
        return $this->db->update($this->tb_kategori);
    }
    
    
    

  
      
}
