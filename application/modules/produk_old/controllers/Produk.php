<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_produk', 'produk');
    }
    
    public function index(){
       
        $data['produk'] = $this->produk->get_produk();
        if($this->session->userdata('role') == 1){
             $data['content'] = 'produk';
        }else{
             $data['content'] = 'produk_list';
        }
        $this->load->view('template', $data);
	}
    
    public function tambah_produk(){
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('judul', 'Judul Produk RB', 'required|trim');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
            if (empty($_FILES['userfile']['name']))
            {
               $this->form_validation->set_rules('userfile', 'File Produk RB', 'required|trim');
            }
            
            if($this->form_validation->run()){ 
                $config['upload_path']="./uploads/produk";
                $config['allowed_types']='gif|jpg|png|pdf';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload',$config);
                
                if($this->upload->do_upload('userfile')){
                    $data = array('upload_data' => $this->upload->data());
                    $path= base_url().'uploads/produk/'.$data['upload_data']['file_name'];
                    $this->produk->tambah_produk($path, $data['upload_data']['file_name']);
                    redirect('produk');
                }else{
                    print_r($this->upload->display_errors());
                }
                
            }else{ 
                 echo validation_errors();
              //redirect('produk/tambah_produk');
            }
        }else{
            $data['content'] = 'tambah_produk';
            $this->load->view('template', $data);     
        }
        
    }
    
    
    public function edit_produk($id){
            if($this->input->post('submit')){
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('judul', 'Judul Produk RB', 'required|trim');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
           
            
            if($this->form_validation->run()){ 
                if (!empty($_FILES['userfile']['name'])){
                    $config['upload_path']="./uploads/produk";
                    $config['allowed_types']='gif|jpg|png|pdf';
                    $config['encrypt_name'] = TRUE;
                    $this->load->library('upload',$config);
                    
                    if($this->upload->do_upload('userfile')){
                        $data = array('upload_data' => $this->upload->data());
                        $path= base_url().'uploads/produk/'.$data['upload_data']['file_name'];
                        
                        $old_file = './uploads/produk/'.$this->input->post('fileold');
                        chown($old_file, 666);
                        unlink($old_file);
                      
                       $this->produk->edit_produk($this->input->post('ref'),$path,$data['upload_data']['file_name']);
                       
                        redirect('produk');
                    }else{
                        print_r($this->upload->display_errors());
                    }
                }else{
                    $this->produk->edit_produk($this->input->post('ref'),NULL,NULL);
                     redirect('produk');
                }
                
                
            }else{ 
                 echo validation_errors();
              //redirect('produk/tambah_produk');
            }
        }else{
            $data['produk'] = $this->produk->get_produk_byid($id);
            $data['content'] = 'edit_produk';
            $this->load->view('template', $data);     
        }
        
        
    }
    
    public function hapus(){
        $this->produk->hapus_produk($this->input->post('ref'));
    }
    
    
  

         
}
