<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelaksanaan extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_master', 'master');
    }
    
    
    public function index(){
        $data['content'] = 'pelaksanaan/pelaksanaan';
        $data['pelaksanaan'] = $this->master->get_pelaksanaan();
        $this->load->view('template', $data);
	}
    
    public function tambah_pelaksanaan(){
        
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan', 'required|trim');
            $this->form_validation->set_rules('kode_waktu_pelaksanaan', 'Kode Waktu Pelaksanaan', 'required|trim');
              
            if($this->form_validation->run()){ 
              $this->master->tambah_pelaksanaan();
              redirect('master/pelaksanaan');
            }else{ 
              return FALSE; 
            }
        }else{
            $data['content'] = 'pelaksanaan/tambah_pelaksanaan';
        
           $this->load->view('template', $data);    
        }
        
	}
    
    public function edit_pelaksanaan($encryp){
        if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan', 'required|trim');
            $this->form_validation->set_rules('kode_waktu_pelaksanaan', 'Kode Waktu Pelaksanaan', 'required|trim');  
            if($this->form_validation->run()){ 
              $this->master->edit_pelaksanaan($encryp);
              redirect('master/pelaksanaan');
            }else{ 
              return FALSE; 
            }
        }else{          
            $data['content'] = 'pelaksanaan/edit_pelaksanaan';
            $data['pelaksanaan'] = $this->master->get_pelaksanaan_byid($encryp);
            $this->load->view('template', $data);    
        }
	}
    
     public function hapus_pelaksanaan(){
        $this->master->hapus_pelaksanaan($this->input->post('ref'));
     }
     
     
}
