<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_posts', 'post');

	}

	public function posts(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'master/posts/posts/';
        $config['total_rows'] = $this->post->get_post()->num_rows();
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        $data['post'] = $this->post->get_post_limit($config['per_page'],$page);
     
        $data['content'] = 'posts/posts';
        $this->load->view('template', $data);
	}
    
   	public function tambah(){
   	    
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Judul Artikel', 'required|trim');
            $this->form_validation->set_rules('content', 'konten', 'required|trim');
            $this->form_validation->set_rules('kategori', 'kategori', 'required|trim');
            $this->form_validation->set_rules('status', 'status tampil', 'required|trim');
            if (empty($_FILES['userfile']['name']))
            {
               $this->form_validation->set_rules('userfile', 'featured image', 'required|trim');
            }
            
            if($this->form_validation->run()){ 
                $config['upload_path']="./uploads/post";
                $config['allowed_types']='jpg|png';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload',$config);
                
                if($this->upload->do_upload('userfile')){
                    $data = array('upload_data' => $this->upload->data());
                    $path= base_url().'uploads/post/'.$data['upload_data']['file_name'];
                    $this->post->tambah($path, $data['upload_data']['file_name']);
                    redirect('master/posts/posts');
                }else{
                    print_r($this->upload->display_errors());
                }
                
            }else{ 
                 echo validation_errors();
              //redirect('produk/tambah_produk');
            }
        }else{
            $data['kategori'] = $this->post->get_kategori();
            $data['content'] = 'posts/tambah_post';
            $this->load->view('template', $data);     
        }
   	}
    
    
      public function edit($id){
            if($this->input->post('submit')){
            
            $this->load->library('form_validation');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Judul Artikel', 'required|trim');
            $this->form_validation->set_rules('content', 'konten', 'required|trim');
            $this->form_validation->set_rules('kategori', 'kategori', 'required|trim');
            $this->form_validation->set_rules('status', 'status tampil', 'required|trim');
            if($this->form_validation->run()){ 
                if (!empty($_FILES['userfile']['name'])){
                    $config['upload_path']="./uploads/post";
                    $config['allowed_types']='jpg|png';
                    $config['encrypt_name'] = TRUE;
                    $this->load->library('upload',$config);
                    
                    if($this->upload->do_upload('userfile')){
                        $data = array('upload_data' => $this->upload->data());
                        $path= base_url().'uploads/post/'.$data['upload_data']['file_name'];
                        
                        $old_file = './uploads/post/'.$this->input->post('fileold');
                        chown($old_file, 666);
                        unlink($old_file);
                      
                       $this->post->edit($this->input->post('ref'),$path,$data['upload_data']['file_name']);
                       
                        redirect('master/posts/posts');
                    }else{
                        print_r($this->upload->display_errors());
                    }
                }else{
                    $this->post->edit($this->input->post('ref'),NULL,NULL);
                     redirect('master/posts/posts');
                }
                
                
            }else{ 
                 echo validation_errors();
              //redirect('produk/tambah_produk');
            }
        }else{
            $data['post'] = $this->post->get_kategori_by_id($id);
            $data['kategori'] = $this->post->get_kategori();
            $data['content'] = 'master/posts/edit';
            $this->load->view('template', $data);     
        }
        
        
    }
    
        
    public function hapus(){
        $this->post->hapus($this->input->post('ref'));
    }
    
    

}
