<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_page', 'page');

	}

	public function index(){
	    $data['page'] = $this->page->get_page();
        $data['content'] = 'page/page';
        $this->load->view('template', $data);
	}
    
   	public function tambah(){
   	    
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Judul Artikel', 'required|trim');
            $this->form_validation->set_rules('content', 'konten', 'required|trim');
            
            if($this->form_validation->run()){ 
                $this->page->tambah();
                redirect('master/page');
            }else{ 
                 echo validation_errors();
              //redirect('produk/tambah_produk');
            }
        }else{
            $data['content'] = 'page/tambah_page';
            $this->load->view('template', $data);     
        }
   	}
    
    
      public function edit($id){
            if($this->input->post('submit')){
            
            $this->load->library('form_validation');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Judul Artikel', 'required|trim');
            $this->form_validation->set_rules('content', 'konten', 'required|trim');
            if($this->form_validation->run()){ 
                $this->page->edit($id);
                redirect('master/page');
            }else{ 
                 echo validation_errors();
              //redirect('produk/tambah_produk');
            }
        }else{
            $data['page'] = $this->page->get_page_byid($id);
          
            $data['content'] = 'master/page/edit';
            $this->load->view('template', $data);     
        }
        
        
    }
    
        
    public function hapus(){
        $this->page->hapus($this->input->post('ref'));
    }
    
    

}
