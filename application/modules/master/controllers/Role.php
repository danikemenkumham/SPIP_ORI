<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_master', 'role');
    }
    
    public function index(){
        $data['content'] = 'role/role';
        $data['role'] = $this->role->get_role();
        $this->load->view('template', $data);
	}
    
    public function tambah_role(){
        if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('role', 'role', 'required|trim');
            if($this->form_validation->run()){ 
              $this->role->tambah_role();
              redirect('master/role');
            }else{ 
              return FALSE; 
            }
        }else{
            /*
            $data['css'] = array(
                "<link rel='stylesheet' type='text/css' href='".base_url()."assets/page/js/role.js'/>",  
            );
            */  
            $data['js'] = array(
                "<script src='".base_url()."assets/page/js/role.js'/></script>",  
            );  
         
           $data['content'] = 'role/tambah_role';
           $this->load->view('template', $data);    
        }
        
	}
    
    public function edit_role($encryp){
        if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('role', 'role', 'required|trim');
            if($this->form_validation->run()){ 
              $this->role->edit_role($encryp);
              redirect('master/role');
            }else{ 
              return FALSE; 
            }
        }else{
            $data['content'] = 'role/edit_role';
            $data['role'] = $this->role->get_role_byid($encryp);
            $this->load->view('template', $data);    
        }
	}
    
     public function hapus_role(){
        $this->role->hapus_role($this->input->post('ref'));
     }

         
}
