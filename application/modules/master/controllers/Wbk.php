<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wbk extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_master', 'master');
    }
    
    
    public function index(){
         
        $this->load->library('pagination');
        $config['base_url'] = base_url().'master/wbk';
        $config['total_rows'] = $this->master->get_wbk()->num_rows();
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
      
        $data['wbk'] = $this->master->get_wbk_limit($config['per_page'],$page);
        
        
        $data['content'] = 'wbk/wbk';
        $this->load->view('template', $data);
	}
    
    public function tambah_wbk(){
        
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('area', 'Area Perubahan', 'required|trim');
            $this->form_validation->set_rules('indikator', 'Keterangan', 'required|trim');
              
            if($this->form_validation->run()){ 
              $this->master->tambah_wbk();
              redirect('master/wbk');
            }else{ 
              return FALSE; 
            }
        }else{
           $data['content'] = 'wbk/tambah_wbk';
           $data['perubahan'] = $this->master->get_area('wbk'); 
           $this->load->view('template', $data);    
        }
        
	}
    
    public function edit_wbk($encryp){
        if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('area', 'Area Perubahan', 'required|trim');
            $this->form_validation->set_rules('indikator', 'Keterangan', 'required|trim');
            if($this->form_validation->run()){ 
              $this->master->edit_wbk($encryp);
              redirect('master/wbk');
            }else{ 
              return FALSE; 
            }
        }else{          
            $data['content'] = 'wbk/edit_wbk';
            $data['area'] = $this->master->get_area('wbk');
            $data['wbk'] = $this->master->get_wbk_byid($encryp);
            $this->load->view('template', $data);    
        }
	}
    
     public function hapus_wbk(){
        $this->master->hapus_wbk($this->input->post('ref'));
     }
     
     
     //detial wbk/wbbm
      public function rincian(){
        
        $this->load->library('pagination');
        $config['base_url'] = base_url().'master/wbk/rincian';
        $config['total_rows'] = $this->master->get_rincian_wbk()->num_rows();
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $page = $this->input->get('page') ? $this->input->get('page') : 0;  
        $data['rincian_wbk'] = $this->master->get_rincian_wbk_limit($config['per_page'],$page);
    
        $data['content'] = 'wbk/rincian_wbk';
        $this->load->view('template', $data);
	}
    
     public function tambah_rincian(){
        
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('wbk', 'Pilih Indikator Wbk/Wbbm', 'required|trim');
            $this->form_validation->set_rules('juknis', 'Petunjuk Tekni', 'required|trim');
            $this->form_validation->set_rules('poin_indikator', 'Poin Indikator', 'required|trim');
            $this->form_validation->set_rules('daduk', 'Data Dukung', 'required|trim');
            if($this->form_validation->run()){ 
              $this->master->tambah_rincian_wbk();
              redirect('master/wbk/rincian');
            }else{ 
              return FALSE; 
            }
        }else{
            $data['js'] = array(
                "<script src='".base_url()."assets/page/js/master.js'/></script>", 
                 "<script src='".base_url()."assets/page/js/treeview.js'/></script>", 
                  "<script src='".base_url()."assets/page/js/logger.js'/></script>", 
                   
            );    
           $data['content'] = 'wbk/tambah_rincian';
           $data['wbk'] = $this->master->get_wbk(); 
           $data['satker'] = $this->master->get_satker();
           $this->load->view('template', $data);    
        }
        
	}
    
     public function edit_rincian_wbk($id_rincian){
        
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('wbk', 'Pilih Indikator Wbk/Wbbm', 'required|trim');
            $this->form_validation->set_rules('juknis', 'Petunjuk Tekni', 'required|trim');
            $this->form_validation->set_rules('poin_indikator', 'Poin Indikator', 'required|trim');
            $this->form_validation->set_rules('daduk', 'Data Dukung', 'required|trim');
            if($this->form_validation->run()){ 
              $this->master->edit_rincian_wbk($id_rincian);
              redirect('master/wbk/rincian');
            }else{ 
              return FALSE; 
            }
        }else{
           $data['js'] = array(
                "<script src='".base_url()."assets/page/js/master.js'/></script>", 
                 "<script src='".base_url()."assets/page/js/treeview.js'/></script>", 
                  "<script src='".base_url()."assets/page/js/logger.js'/></script>", 
                   
            );  
           $data['content'] = 'wbk/edit_rincian';
           $data['wbk'] = $this->master->get_wbk();
            $data['rincian'] = $this->master->get_rincian_wbk_edit($id_rincian);  
           $data['satker'] = $this->master->get_satker();
           $this->load->view('template', $data);    
        }
        
	}
    
     public function get_satker_rincian_wbk($id){
        echo $this->master->get_satker_rincian_wbk($id);
    }
    
    public function get_satker_edit_wbk($id){
        return $this->master->get_satker_edit_wbk($id);
    }
    
    public function rem_satker_detail(){
        $this->master->remove_satker_detail_wbk($this->input->post('detail'));
    }
    
     public function add_satker_detail(){
       $this->master->add_satker_detail_wbk();
    }
    
    public function hapus_detail(){
        $this->master->hapus_detail_wbk($this->input->post('ref'));
     }
     
     
     function check_satker($satker,$id_detail){
       $check =  $this->master->check_detail_wbk_satker($satker,$id_detail);
       if($check->num_rows() > 0){
        echo '1';
       }else{
        echo '0';
       }
     }
    
   
    

         
}
