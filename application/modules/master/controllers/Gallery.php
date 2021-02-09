<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_gallery', 'gallery');

	}

	public function index(){
	    $this->load->library('pagination');
        $config['base_url'] = base_url().'master/gallery';
        $config['total_rows'] = $this->gallery->get_gallery()->num_rows();
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        $data['album'] = $this->gallery->get_gallery_limit($config['per_page'],$page);
	    
        $data['content'] = 'gallery/gallery';
        $this->load->view('template', $data);
	}
    
   	public function tambah(){
   	    
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama_gallery', 'Judul Artikel', 'required|trim');
            $this->form_validation->set_rules('kategori', 'kategori', 'required|trim');
            $this->form_validation->set_rules('keterangan', 'status tampil', 'required|trim');
            if($this->form_validation->run()){ 
                    $id = $this->gallery->tambah();
                    redirect('master/gallery/edit/'.$id);
            }else{ 
                 echo validation_errors();
              //redirect('produk/tambah_produk');
            }
        }else{
            $data['kategori'] = $this->gallery->get_kategori();
            $data['content'] = 'gallery/tambah_gallery';
            $this->load->view('template', $data);     
        }
   	}
    
    
    public function edit($id){
            if($this->input->post('submit')){
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama_gallery', 'Judul Artikel', 'required|trim');
            $this->form_validation->set_rules('kategori', 'kategori', 'required|trim');
            $this->form_validation->set_rules('keterangan', 'status tampil', 'required|trim');
            if($this->form_validation->run()){ 
                $this->gallery->edit($this->input->post('ref'));
                redirect('master/gallery');
            }else{ 
                 echo validation_errors();
              //redirect('produk/tambah_produk');
            }
        }else{
             $data['js'] = array(
                "<script src='".base_url()."assets/page/js/gallery.js'/></script>",  
            );  
            $data['gallery'] = $this->gallery->get_gallery_by_id($id);
            $data['photo'] = $this->gallery->get_photo_gallery($id);
            $data['kategori'] = $this->gallery->get_kategori();
            $data['content'] = 'master/gallery/edit';
            $this->load->view('template', $data);     
        }
        
        
    }
    function unset_gallery(){
          $this->gallery->hapus_gallery($this->input->post('ref'));
    }
        
    public function unset_photo(){
        $this->gallery->hapus_photo($this->input->post('ref'));
        
        $old_file = './uploads/gallery/'.$this->input->post('fileold');
        chown($old_file, 666);
        unlink($old_file);
    }
    
      function do_upload(){
        $config['upload_path']="./uploads/gallery";
        $config['allowed_types']='gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload('userfile')){
            $data = array('upload_data' => $this->upload->data());
 
            $title= $this->input->post('caption');
            $image= $data['upload_data']['file_name'];
            $path= base_url().'uploads/gallery/'.$data['upload_data']['file_name'];
            $this->gallery->upload_gallery($image,$path);
            
            $gallery = $this->gallery->get_photo_gallery($this->input->post('gallery'));
            foreach($gallery->result() as $dt_photo){
                 echo '<div class="col-md-2 mt-2 rows'.$dt_photo->id_photo.'">' ;
                 echo   '<div class="card border-1 p-2">';
                 echo       '<img class="card-img rounded" src="'.$dt_photo->path_photo.'" alt="'.$dt_photo->caption.'">';
                 echo '<button class="btn btn-danger btn-xs mt-3 photo_del"  data-old="'.$dt_photo->nama_file.'" data-ref="'.$dt_photo->id_photo.'">Hapus</button>';
                 echo     '</div>';
                 echo   '</div>';
            }; 
        
        }else{
            echo 'terjadi kesalaham upload, harap ulangi kembali';
        }
 
     }
    
    

}
