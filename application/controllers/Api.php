<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
//use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        
    }

    //Menampilkan data kontak
    function evidencewbk_get($id=NULL) {
       //$id = $this->input->get('satker');
       if($id == true){
            $this->db->select('SatkerID, Satker');
           $this->db->join('satker s', 'wdu.iduser = s.SatkerID');
           if($id  != ''){
            $this->db->where('SatkerID', $id);
           }
           $this->db->group_by('iduser');
           
           $wbk = $this->db->get('wbk_detail_user wdu');
           $satker = array();
           foreach($wbk->result() as $dt_wbk){
               //get point indikator
               $this->db->select('a.id_area,w.id_wbk, nama_area, indikator, poin_indikator, wd.id_detail, wdu.id_detail_wbk_user');
               
               $this->db->join('wbk_detail wd', 'wdu.id_detail = wd.id_detail');
               $this->db->join('master_wbkwbbm w', 'wd.id_wbk = w.id_wbk');
               $this->db->join('area_perubahan a', 'w.id_area = a.id_area');
               $this->db->where('wdu.iduser', $dt_wbk->SatkerID);
               $this->db->group_by('id_detail');
               $point = $this->db->get('wbk_detail_user wdu');
                   foreach($point->result() as $dt_point){
                        //get evidence
                        $this->db->select('path, caption');
                        $this->db->where('uw.id_detail', $dt_point->id_detail_wbk_user);
                        $evidence_result = $this->db->get('upload_wbk uw');
                       
                        $evidence = array();
                        foreach($evidence_result->result() as $dt_evidence){
                            $evidence[] = array(
                                'judul' => $dt_evidence->caption,
                                'keterangan' => '',
                                'jenis' => 'link',
                                'path' => $dt_evidence->path,
                            ); 
                        }
                        
                        
                        $poin_indikator[] = array(
                             'kode_indikator' => $dt_point->id_area.'.'.$dt_point->id_wbk.'.'.$dt_point->id_detail,
                             'area' => $dt_point->nama_area,
                             'sub_area' => $dt_point->indikator,
                             'indikator' => $dt_point->poin_indikator,
                             'evidence' => $evidence
                        );
                   }
              
                
            
                $satker[] = array(
                    'kode_satker' => $dt_wbk->SatkerID,
                    'nama_satker' => $dt_wbk->Satker,
                    'usulan' => 'WBK',
                    'lke' => $poin_indikator
                );
           }
        
       }else{
          $satker = array('msg' =>  'reference code required');  
       }
       $this->response($satker, 200);
    }
    
     function satker_get(){
        $this->db->select('SatkerID, Satker');
        $satker = $this->db->get('satker')->result();
        $this->response($satker, 200);  
     }
    
    
    //Masukan function selanjutnya disini
}
?>