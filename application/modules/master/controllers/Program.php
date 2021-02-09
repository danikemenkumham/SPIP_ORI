<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_master', 'program');
    }
    
    public function index(){
        $data['content'] = 'program/program';
        $data['program'] = $this->program->get_program();
        $this->load->view('template', $data);
	}
    
    public function tambah_program(){
        if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('program', 'program', 'required|trim');
            $this->form_validation->set_rules('kode', 'Kode program', 'required|trim'); 
            if($this->form_validation->run()){ 
              $this->program->tambah_program();
              redirect('master/program');
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
                "<script src='".base_url()."assets/page/js/program.js'/></script>",  
            );  
         
           $data['content'] = 'program/tambah_program';
           $this->load->view('template', $data);    
        }
        
	}
    
    public function edit_program($encryp){
        if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('program', 'program', 'required|trim');
            $this->form_validation->set_rules('kode', 'Kode program', 'required|trim'); 
            if($this->form_validation->run()){ 
              $this->program->edit_program($encryp);
              redirect('master/program');
            }else{ 
              return FALSE; 
            }
        }else{
            $data['content'] = 'program/edit_program';
            $data['program'] = $this->program->get_program_byid($encryp);
            $this->load->view('template', $data);    
        }
	}
    
     public function hapus_program(){
        $this->program->hapus_program($this->input->post('ref'));
     }

         
}
