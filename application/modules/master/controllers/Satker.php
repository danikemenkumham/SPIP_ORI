<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satker extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_master', 'master');
    }
    
    public function index(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'master/satker';
        $config['total_rows'] = $this->master->get_satker_all()->num_rows();
        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        $data['satker'] = $this->master->get_satker_limit($config['per_page'],$page);
        
        $data['content'] = 'satker/satker';
        $this->load->view('template', $data);
	}
    
    public function tambah_satker(){
        if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('satker', 'satker', 'required|trim');
            $this->form_validation->set_rules('kode', 'Kode Satker', 'required|trim'); 
            if($this->form_validation->run()){ 
              $this->master->tambah_satker();
              redirect('master/satker');
            }else{ 
              return FALSE; 
            }
        }else{
            /*
            $data['css'] = array(
                "<link rel='stylesheet' type='text/css' href='".base_url()."assets/page/js/program.js'/>",  
            );
            */  
            $data['js'] = array(
                "<script src='".base_url()."assets/page/js/satker.js'/></script>",  
            );  
         
           $data['content'] = 'satker/tambah_satker';
           $this->load->view('template', $data);    
        }
        
	}
    
    public function edit_satker($encryp){
        if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('satker', 'program', 'required|trim'); 
            if($this->form_validation->run()){ 
              $this->master->edit_satker($encryp);
              redirect('master/satker');
            }else{ 
              return FALSE; 
            }
        }else{
            $data['content'] = 'satker/edit_satker';
            $data['satker'] = $this->master->get_satker_byid($encryp);
            $this->load->view('template', $data);    
        }
	}
    
     public function hapus_satker(){
        $this->master->hapus_satker($this->input->post('ref'));
     }
     
     
      function get_esel(){
        return $this->master->get_esel();
     }
     
    function get_biro($esel){
        return $this->master->get_biro($esel);
    }
     
      function get_kanwil(){
        return $this->master->get_satker_kanwil();
     }
     
    function get_upt($kanwil){
        return $this->master->get_upt_kanwil($kanwil);
     }

         
}
