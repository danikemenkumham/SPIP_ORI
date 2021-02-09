<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perubahan extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_master', 'master');
    }
    
    
    public function index(){
        
        $this->load->library('pagination');
        $config['base_url'] = base_url().'master/perubahan';
        $config['total_rows'] = $this->master->get_area_perubahan()->row()->total;
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
      
        $data['perubahan'] = $this->master->get_area_perubahan_limit($config['per_page'],$page);
        $data['program'] = $this->master->get_program();
        $data['content'] = 'perubahan/perubahan';
        $this->load->view('template', $data);
	}
    
    public function tambah_area_perubahan(){
        
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('perubahan', 'Area Perubahan', 'required|trim');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
              
            if($this->form_validation->run()){ 
              $this->master->tambah_area_perubahan();
              redirect('master/perubahan');
            }else{ 
              return FALSE; 
            }
        }else{
           $data['content'] = 'perubahan/tambah_perubahan';
           $data['program'] = $this->master->get_program(); 
           $this->load->view('template', $data);    
        }
        
	}
    
    public function edit_area_perubahan($encryp){
        if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('perubahan', 'Area Perubahan', 'required|trim');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
            if($this->form_validation->run()){ 
              $this->master->edit_area_perubahan($encryp);
              redirect('master/perubahan');
            }else{ 
              return FALSE; 
            }
        }else{          
            $data['content'] = 'perubahan/edit_perubahan';
            $data['program'] = $this->master->get_program();
            $data['perubahan'] = $this->master->get_perubahan_byid($encryp);
            $this->load->view('template', $data);    
        }
	}
    
     public function hapus_area_prubahan(){
        $this->master->hapus_area_perubahan($this->input->post('ref'));
     }
     
    

         
}
