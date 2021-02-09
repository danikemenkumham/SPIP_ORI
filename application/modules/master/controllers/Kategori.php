<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_master', 'kategori');
    }
    
    public function index(){
        $data['content'] = 'kategori/kategori';
        $data['kategori'] = $this->kategori->get_kategori();
        $this->load->view('template', $data);
	}
    
    public function tambah_kategori(){
        if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('kategori', 'kategori', 'required|trim');
            $this->form_validation->set_rules('jenis', 'jenis', 'required|trim');
            if($this->form_validation->run()){ 
              $this->kategori->tambah_kategori();
              redirect('master/kategori');
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
         
           $data['content'] = 'kategori/tambah_kategori';
           $this->load->view('template', $data);    
        }
        
	}
    
    public function edit_kategori($encryp){
        if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('kategori', 'kategori', 'required|trim');
             $this->form_validation->set_rules('jenis', 'jenis', 'required|trim');
            if($this->form_validation->run()){ 
              $this->kategori->edit_kategori($encryp);
              redirect('master/kategori');
            }else{ 
              return FALSE; 
            }
        }else{
            $data['content'] = 'kategori/edit_kategori';
            $data['kategori'] = $this->kategori->get_kategori_byid($encryp);
            $this->load->view('template', $data);    
        }
	}
    
     public function hapus_kategori(){
        $this->kategori->hapus_kategori($this->input->post('ref'));
     }

         
}
