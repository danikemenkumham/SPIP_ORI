<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rkt extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_rkt', 'satker');
    }
    
    public function area($tahun, $id_satker=NULL){
        if($id_satker == NULL || $id_satker == '2020'){
            $id_satker = $this->session->userdata('satker');
        }
        $data['js'] = array(
                "<script src='".base_url()."assets/page/js/rkt_satker.js'/></script>",  
            );  
        $data['area'] = $this->satker->get_area_perubahan($tahun,$id_satker);
        $data['content'] = 'rkt/area';
        $this->load->view('template', $data);
	}
    
    
    public function satker($tahun, $id_satker=NULL){
        if($this->session->userdata('role') != 5 ){
            if($id_satker == NULL){
                $id_satker = $this->session->userdata('satker');
            }
            $data['js'] = array(
                    "<script src='".base_url()."assets/page/js/rkt_satker.js'/></script>",  
                );
            
            $this->load->library('pagination');
            $config['base_url'] = base_url().'satker/rkt/satker/'.$this->uri->segment(4).'/'.$this->uri->segment(5);
            $config['total_rows'] = $this->satker->get_satker_rkt_count()->num_rows();
            $config['per_page'] = 10;
            $config['page_query_string'] = TRUE;
            $config['query_string_segment'] = 'page';
            $this->pagination->initialize($config);
            $page = $this->input->get('page') ? $this->input->get('page') : 0;
            $data['satker'] = $this->satker->get_satker_rkt_limit($config['per_page'],$page);

            $data['content'] = 'satker/rkt/satker';
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
                "<script src='".base_url()."assets/page/js/rkt_satker.js'/></script>",  
            );  
        $data['poin'] = $this->satker->get_rkt_by_area($id_area,$id_satker);
     
        $data['content'] = 'rkt/poin';
        $this->load->view('template', $data);
    }
    
    public function detail($idrkt,$id_satker=NULL){
        if($id_satker == NULL || $id_satker == '2020'){
            $id_satker = $this->session->userdata('satker');
        }
        $data['js'] = array(
                "<script src='".base_url()."assets/page/js/rkt_satker.js'/></script>",  
            );  
        $data['rkt'] = $this->satker->get_rkt($idrkt,$id_satker);
        $data['content'] = 'rkt/rkt';
        $this->load->view('template', $data);
	}
    
    public function get_kategori_penilaian($id_area, $id_satker=NULL){
      
        return $this->satker->get_kategori_penilaian($id_area,$id_satker);
    }
    
    public function get_poin_penilaian($id_rkt, $satker){
         return $this->satker->get_poin_penilaian($id_rkt, $satker);
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
                'link' => site_url('satker/rkt/penilaian/'.$this->input->post('detail')),
                'pesan' => 'ada catatan dari baru dari '.$this->session->userdata('nama'),
                'pengirim' => $this->session->userdata('nama'),
                'create_date' => date('Y-m-d H:i:s'),
                'is_read' => '0',
                'is_verifikator' => '1',
                'is_admin' => '1',
            );
            
        }else{
            $notif = array(
                'link' => site_url('satker/rkt/penilaian/'.$this->input->post('detail')),
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
        $config['upload_path']="./uploads/rkt";
        $config['allowed_types']='jpg|png|pdf|doc|docx|xls|xlsx|zip|rar';
        $config['encrypt_name'] = TRUE;
        $config['max_size']    = 50000;
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload('userfile')){
            $data = array('upload_data' => $this->upload->data());
 
            $title= $this->input->post('title');
            $image= $data['upload_data']['file_name'];
            $path= base_url().'uploads/rkt/'.$data['upload_data']['file_name'];
            $result= $this->satker->upload_data_dukung($image,$path,$this->session->userdata('iduser'),$this->input->post('ref'), $this->input->post('caption'));
            //send notif ke verifikator
            $notif = array(
                'link' => site_url('satker/rkt/penilaian/'.$this->input->post('poin_penilaian')),
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
            echo $this->upload->display_errors('<p>', '</p>');
        }
 
     }
     
     
      public function penilaian($iddetail_user){
         $data['js'] = array(
                "<script src='".base_url()."assets/page/js/rkt_satker.js'/></script>",  
            );  
         $data['content'] = 'rkt/penilaian_rkt';
         $data['rkt'] = $this->satker->get_penilaian_rkt($iddetail_user); 
         $this->load->view('template', $data);    
    }
    
    public function get_status_penilaian($id){
        return $this->satker->get_status_penilaian($id);
        
    }
    
    public function count_rkt($id_rkt,$id_satker){
        $coun_all = $this->satker->total_rkt($id_rkt, $id_satker); 
        $coun_lengkap = $this->satker->total_lengkap_rkt($id_rkt, $id_satker); 
        if($coun_lengkap == 0){
             $presentase = 0;
        }else{
            
             $presentase =  ($coun_lengkap/$coun_all)*100;
             $presentase = number_format((float)$presentase, 0, '.', '');
        }
        echo '<div class="progress progress-xl mt-3" style="height:28px">
              <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: '.$presentase.'%" aria-valuenow="'.$presentase.'" aria-valuemin="0" aria-valuemax="100"><b>'.$presentase.'%</b></div>
            </div> ';
    }
    
    public function count_rkt_area($id_area, $id_satker){
        $coun_all = $this->satker->total_rkt_area($id_area, $id_satker); 
        $coun_lengkap = $this->satker->total_lengkap_rkt_area($id_area, $id_satker); 
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
    
     function count_rkt_poin_upload_new($id_rkt, $id_satker){
          $coun_all = $this->satker->count_rkt_poin_upload_new($id_rkt, $id_satker); 
          echo $coun_all;
     }
     
     function count_area_rkt_upload_new($id_rkt, $id_satker){
          $coun_all = $this->satker->count_area_rkt_upload_new($id_rkt, $id_satker); 
          echo $coun_all;
     }
      function rdok(){
        $this->satker->rdok($this->input->post('ref'));
     }
     
     function paper($id_satker){
        
        $data['rkt'] = $this->satker->get_cetak($id_satker, $this->session->userdata('tahun'));
        //$this->load->view('rkt/paper', $data);
        
        $this->load->library('pdf');   
        $this->pdf->load_view('rkt/paper', $data);
        
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->render();
        $satker_name = modules::run('satker/rkt/get_satker', $id_satker);
        $file_name = 'RKT_'.$satker_name.'_'.$this->session->userdata('tahun');
        $this->pdf->stream($file_name, array("Attachment" => false));
        
        //$path = "web_uploads/".$file_name;        
        //$pdf_string = $this->pdf->output();
        
        //file_put_contents($path, $pdf_string );  
        
     }
     
     
     public function get_kategori_penilaian_cetak($id_satker=NULL, $id_area){
      
        return $this->satker->get_kategori_penilaian_cetak($id_satker, $id_area);
    }
    
    public function count_rkt_cetak($id_rkt, $id_satker){
        $coun_all = $this->satker->total_rkt($id_rkt, $id_satker); 
        $coun_lengkap = $this->satker->total_lengkap_rkt($id_rkt, $id_satker); 
        if($coun_lengkap == 0){
             $presentase = 0;
        }else{
            
             $presentase =  ($coun_lengkap/$coun_all)*100;
             $presentase = number_format((float)$presentase, 0, '.', '');
        }
        echo $presentase;
    }
     
     
    
    
}
