<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_video', 'video');

	}

	public function index(){
	   
	    $this->load->library('pagination');
        $config['base_url'] = base_url().'master/video';
        $config['total_rows'] = $this->video->get_video()->num_rows();
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        $data['video'] = $this->video->get_video_limit($config['per_page'],$page);
        $data['content'] = 'video/video';
        $this->load->view('template', $data);
	}
    
   	public function tambah(){
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Judul Video', 'required|trim');
            $this->form_validation->set_rules('url', 'url', 'required|trim');
            $this->form_validation->set_rules('kategori', 'kategori', 'required|trim');
            $this->form_validation->set_rules('status', 'status tampil', 'required|trim');
            if($this->form_validation->run()){ 
                $this->video->tambah();
                redirect('master/video');
            }else{ 
                echo validation_errors();
            }
        }else{
            $data['kategori'] = $this->video->get_kategori();
            $data['content'] = 'video/tambah_video';
            $this->load->view('template', $data);     
        }
   	}
    
    
      public function edit($id){
            if($this->input->post('submit')){
            
            $this->load->library('form_validation');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Judul Video', 'required|trim');
            $this->form_validation->set_rules('url', 'url', 'required|trim');
            $this->form_validation->set_rules('kategori', 'kategori', 'required|trim');
            $this->form_validation->set_rules('status', 'status tampil', 'required|trim');
            if($this->form_validation->run()){ 
                $this->video->edit($this->input->post('ref'));
                redirect('master/video');   
            }else{ 
                echo validation_errors();
            }
        }else{
            $data['video'] = $this->video->get_video_by_id($id);
            $data['kategori'] = $this->video->get_kategori();
            $data['content'] = 'master/video/edit';
            $this->load->view('template', $data);     
        }
        
        
    }
    
        
    public function hapus(){
        $this->video->hapus($this->input->post('ref'));
    }
    
    

}
