<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wbk extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_wbk', 'satker');
    }
    
    public function area($tahun, $id_satker=NULL){
        if($id_satker == NULL || $id_satker == '2020'){
            $id_satker = $this->session->userdata('satker');
        }
        $data['js'] = array(
                "<script src='".base_url()."assets/page/js/wbk.js'/></script>",  
            );  
        $data['area'] = $this->satker->get_area_perubahan($tahun,$id_satker);
        $data['content'] = 'wbk/area';
        $this->load->view('template', $data);
	}
    
    
    public function satker($tahun, $id_satker=NULL){
        if($this->session->userdata('role') != 5 ){
            if($id_satker == NULL){
                $id_satker = $this->session->userdata('satker');
            }
            $data['js'] = array(
                    "<script src='".base_url()."assets/page/js/wbk.js'/></script>",  
            );
            
            
            $this->load->library('pagination');
            $config['base_url'] = base_url().'satker/wbk/satker/'.$this->uri->segment(4).'/'.$this->uri->segment(5);
            $config['total_rows'] = $this->satker->get_satker_wbk()->num_rows();
            $config['per_page'] = 10;
            $config['page_query_string'] = TRUE;
            $config['query_string_segment'] = 'page';
            $this->pagination->initialize($config);
            $page = $this->input->get('page') ? $this->input->get('page') : 0;
            $data['satker'] = $this->satker->get_satker_wbk_limit($config['per_page'],$page);
           
            $data['content'] = 'wbk/satker';
            $this->load->view('template', $data);
            
        }else{
          show_404();
        }
        
	}
    
    public function poin($id_area,$id_satker=NULL){
        if($id_satker == NULL || $id_satker == '2020'){
            $id_satker = $this->session->userdata('satker');
        }
        $data['js'] = array(
                "<script src='".base_url()."assets/page/js/wbk.js'/></script>",  
            );  
        $data['poin'] = $this->satker->get_wbk_by_area($id_area,$id_satker);
     
        $data['content'] = 'wbk/poin';
        $this->load->view('template', $data);
    }
    
    public function detail($idwbk,$id_satker=NULL){
        if($id_satker == NULL || $id_satker == '2020'){
            $id_satker = $this->session->userdata('satker');
        }
        $data['js'] = array(
                "<script src='".base_url()."assets/page/js/wbk.js'/></script>",  
            );  
        $data['wbk'] = $this->satker->get_wbk($idwbk,$id_satker);
        $data['content'] = 'wbk/wbk';
        $this->load->view('template', $data);
	}
    
    public function get_kategori_penilaian($id_area, $id_satker=NULL){
      
        return $this->satker->get_kategori_penilaian($id_area,$id_satker);
    }
    
    public function get_poin_penilaian($id_wbk, $satker){
         return $this->satker->get_poin_penilaian($id_wbk, $satker);
    }
    
    public function get_data_dukung($id_detail){
         return $this->satker->get_data_dukung($id_detail);
    }
    
    public function verifikasi(){
        $this->satker->verifikasi();
    }
    
    public function add_catatan(){
        $this->satker->add_catatan();
        $catatan = $this->satker->get_catatan($this->input->post('detail'));
        //send notif
        if($this->session->userdata('role') == 5){
            $notif = array(
                'link' => site_url('satker/wbk/penilaian/'.$this->input->post('detail')),
                'pesan' => 'ada catatan dari baru dari '.$this->session->userdata('nama'),
                'pengirim' => $this->session->userdata('nama'),
                'create_date' => date('Y-m-d H:i:s'),
                'is_read' => '0',
                'is_verifikator' => '1',
                'is_admin' => '1',
            );
            
        }else{
            $notif = array(
                'link' => site_url('satker/wbk/penilaian/'.$this->input->post('detail')),
                'pesan' => 'ada catatan dari '.$this->session->userdata('nama'),
                'pengirim' => $this->session->userdata('nama'),
                'create_date' => date('Y-m-d H:i:s'),
                'penerima' => $this->input->post('satker'),
                'is_read' => '0',
            );
            
        }
        
            $this->satker->send_notif($notif);
        
        
        foreach($catatan->result() as $dt_catatan){
            echo '<li class="media my-2  p-1 bg-white rounded border">                                                           
                   <span class="bg-info rounded m-1">  
                <img class="p-1" src="'.base_url().'/assets/image/account.png">  
                </span>                 
                <div class="media-body ml-2 ">
                  
                   <div class="date"><small><b>'.$dt_catatan->pengirim.'</b> , <i>'.$dt_catatan->create_date.'</i> </small></div> 
                    '.$dt_catatan->catatan.'                                                                            
                  </div>   
              </li>';
        }
    }
    
    public function get_catatan($detail){
        return $this->satker->get_catatan($detail);
    }
    
    public function  get_satker($satker){
        $this->db->where('SatkerID', $satker);
        $satker=  $this->db->get('satker');
        echo $satker->row()->Satker;
    }
    
    function do_upload(){
        $config['upload_path']="./uploads/wbk";
        $config['allowed_types']='gif|jpg|png|pdf|doc|docx|xls|xlsx|ppt|pptx|zip|rar';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload('userfile')){
            $data = array('upload_data' => $this->upload->data());
 
            $title= $this->input->post('title');
            $image= $data['upload_data']['file_name'];
            $path= base_url().'uploads/wbk/'.$data['upload_data']['file_name'];
            $result= $this->satker->upload_data_dukung($image,$path,$this->session->userdata('iduser'),$this->input->post('ref'), $this->input->post('caption'));
            //send notif ke verifikator
            $notif = array(
                'link' => site_url('satker/wbk/penilaian/'.$this->input->post('poin_penilaian')),
                'pesan' => 'Telah menggungah data dukung, mohon untuk diperiksa',
                'pengirim' => $this->session->userdata('nama'),
                'create_date' => date('Y-m-d H:i:s'),
                'is_verifikator' => '1',
                'is_read' => '0',
            );
            $this->satker->send_notif($notif);
            $data_dukung= $this->get_data_dukung($this->input->post('ref'));
            echo '<ul>';
                foreach($data_dukung->result() as $dt_dukung){
                    echo '<li><a style="width: 100%;" target="_blank" href="'.$dt_dukung->path.'" class="text-dark"><i class="mdi mdi-attachment menu-icon"></i> '.$dt_dukung->caption.'</a></li>';
                }
            echo '</ul>'; 
        }else{
            print_r($this->upload->display_errors());
        }
 
     }
     
     
      public function penilaian($iddetail_user){
         $data['js'] = array(
                "<script src='".base_url()."assets/page/js/wbk.js'/></script>",  
            );  
         $data['content'] = 'wbk/penilaian_wbk';
         $data['wbk'] = $this->satker->get_penilaian_wbk($iddetail_user); 
         $this->load->view('template', $data);    
    }
    
    public function get_status_penilaian($id){
        return $this->satker->get_status_penilaian($id);
        
    }
    
    public function count_lke($id_wbk,$id_satker){
        $coun_all = $this->satker->total_lke($id_wbk, $id_satker); 
        $coun_lengkap = $this->satker->total_lengkap_lke($id_wbk, $id_satker); 
        if($coun_lengkap == 0){
             $presentase = 0;
        }else{
            
             $presentase =  ($coun_lengkap/$coun_all)*100;
             $presentase = number_format((float)$presentase, 1, '.', '');
        }
        echo '<div class="progress progress-xl mt-3" style="height:28px">
              <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: '.$presentase.'%" aria-valuenow="'.$presentase.'" aria-valuemin="0" aria-valuemax="100"><b>'.$presentase.'%</b></div>
            </div> ';
    }
    
    public function count_lke_area($id_area, $id_satker){
        $coun_all = $this->satker->total_lke_area($id_area, $id_satker); 
        $coun_lengkap = $this->satker->total_lengkap_lke_area($id_area, $id_satker); 
        if($coun_lengkap == 0){
             $presentase = 0;
        }else{
            
             $presentase =  ($coun_lengkap/$coun_all)*100;
             $presentase = number_format((float)$presentase, 0, '.', '');
        }
         
        echo '<div class="progress progress-xl mt-3" style="height:28px">
              <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: '.$presentase.'%" aria-valuenow="'.$presentase.'" aria-valuemin="0" aria-valuemax="100"><b>'.$presentase.'%</b></div>
            </div> ';
    }
    
     public function count_lke_area_upload_new($id_area, $id_satker){
          $coun_all = $this->satker->total_lke_area_upload($id_area, $id_satker); 
          echo $coun_all;
       
     }
     
     public function count_lke_poin_upload_new($id_wbk, $id_satker){
          $coun_all = $this->satker->total_lke_poin_upload($id_wbk, $id_satker); 
          echo $coun_all;
     }
     
     function rdok(){
        $this->satker->rdok($this->input->post('ref'));
     }
     
     
    
   

         
}
