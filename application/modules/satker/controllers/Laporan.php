<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_laporan', 'satker');
    }
    
    public function index($id_satker=NULL){
        if($id_satker == NULL || $id_satker == date('Y')){
            $id_satker = $this->session->userdata('satker');
        }
        $data['js'] = array(
                "<script src='".base_url()."assets/page/js/satker.js'/></script>",  
            ); 
             
        $data['content'] = 'laporan/tahun';
        $this->load->view('template', $data);
	}
    
    public function upload(){
        
        $data['js'] = array(
                "<script src='".base_url()."assets/page/js/laporan_satker.js'/></script>",  
            );  
        $data['content'] = 'laporan/list_upload';
        $this->load->view('template', $data);
	}
    
     function do_upload(){
        $config['upload_path']="./uploads/laporan";
        $config['allowed_types']='jpg|png|pdf|doc|docx|xls|xlsx|zip|rar';
        $config['encrypt_name'] = TRUE;
        $config['max_size']    = 50000;
        $config['detect_mime'] = TRUE;
        
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload('userfile')){
            $data = array('upload_data' => $this->upload->data());
 
            $title= $this->input->post('title');
            $image= $data['upload_data']['file_name'];
            $path= base_url().'uploads/laporan/'.$data['upload_data']['file_name'];
            $this->satker->upload_laporan($image,$path);
            
            $satker = $this->satker->get_satker($this->input->post('satker'));
            echo '<a  href="'.$path.'" target="_blank">'.'Laporan RB Triwulan '.$this->input->post('ref').' '.$satker->row()->Satker.'</a>';
         
        }else{
            
              echo $this->upload->display_errors();
        }
 
     }
     
     
     function check_laporan($tahun, $triwulan, $satker){
        return $this->satker->check_laporan($tahun, $triwulan, $satker);
     }
     
      function rlap(){
        $this->satker->rlap($this->input->post('ref'));
     }
     
      public function satker(){
        if($this->session->userdata('role') != 5 ){
            if($this->input->get('satker') == NULL){
                $id_satker = $this->session->userdata('satker');
            }
            $data['js'] = array(
                    "<script src='".base_url()."assets/page/js/rkt_satker.js'/></script>",  
                );
            
            $this->load->library('pagination');
            $config['base_url'] = base_url().'satker/laporan/satker/'.$this->uri->segment(4).'/'.$this->uri->segment(5);
            $config['total_rows'] = $this->satker->get_satker_laporan_count()->num_rows();
            $config['per_page'] = 10;
            $config['page_query_string'] = TRUE;
            $config['query_string_segment'] = 'page';
            $this->pagination->initialize($config);
            $page = $this->input->get('page') ? $this->input->get('page') : 0;
            $data['satker'] = $this->satker->get_satker_laporan_limit($config['per_page'],$page);

            $data['content'] = 'satker/laporan/satker';
            $this->load->view('template', $data);
            
        }else{
          show_404();
        }
        
	}
    
     public function listlaporan(){
         $data['js'] = array(
                "<script src='".base_url()."assets/page/js/laporan_satker.js'/></script>",  
            );  
        $data['content'] = 'laporan/list_laporan';
        $this->load->view('template', $data);
     }
     
     public function tahunlaporan(){
       
        $data['js'] = array(
                "<script src='".base_url()."assets/page/js/satker.js'/></script>",  
            ); 
             
        $data['content'] = 'laporan/tahun_laporan';
        $this->load->view('template', $data);
     }
         
}
