<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_home', 'home');
    }
    
    public function index(){
        $limit = 5;
        $limit_video = 4;
        $limit_gallery = 4;
        
        $data['post'] = $this->home->get_post($limit);
        $data['produk'] = $this->home->get_produk_rb($limit);
        $data['video'] = $this->home->get_video($limit_video);
        $data['gallery'] = $this->home->get_gallery($limit_gallery);
        $data['content'] = 'home';
        $this->load->view('template', $data);
	}
    
    function page_r($url){
        $data['page'] = $this->home->get_page($url);
        if($data['page']->num_rows() > 0){
             $data['content'] = 'page_read';
             $this->load->view('template', $data);
        }else{
            show_404();
        }
    }
    
    function berita($offset=NULL){
        if($offset == NULL){
            $offset = 0;
        }else{
            $offset = $offset;
        }
        $jumlah_data = $this->home->get_all_post();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'home/berita';
		$config['total_rows'] = $jumlah_data->row()->total;
		$config['per_page'] = 10;
       
       
		$this->pagination->initialize($config);	
         $data['berita'] = $this->home->get_all_post_paging($config['per_page'],$offset);
        $data['content'] = 'post';
        $this->load->view('template', $data);
    }
   
     function post_r($id){
        $data['post'] = $this->home->get_post_view($id);
        if($data['post']->num_rows() > 0){
             $data['content'] = 'post_read';
             $this->load->view('template', $data);
        }else{
            show_404();
        }
    }
    
    function gallery($offset=NULL){
        if($offset == NULL){
            $offset = 0;
        }else{
            $offset = $offset;
        }
        $jumlah_data = $this->home->get_all_gallery();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'home/gallery';
		$config['total_rows'] = $jumlah_data->row()->total;
		$config['per_page'] = 10;
       
       
		$this->pagination->initialize($config);	
         $data['gallery'] = $this->home->get_all_gallery_paging($config['per_page'],$offset);
        $data['content'] = 'gallery';
        $this->load->view('template', $data);
    }
    
    function gallery_r($id,$url){
        $data['gallery'] = $this->home->get_gallery_page($id);
        if($data['gallery']->num_rows() > 0){
             $data['content'] = 'gallery_read';
             $this->load->view('template', $data);
        }else{
            show_404();
        }
    }
    
    
    //video 
    
    function video($offset=NULL){
        if($offset == NULL){
            $offset = 0;
        }else{
            $offset = $offset;
        }
        $jumlah_data = $this->home->get_all_video();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'home/video';
		$config['total_rows'] = $jumlah_data->row()->total;
		$config['per_page'] = 10;
       
       
		$this->pagination->initialize($config);	
         $data['video'] = $this->home->get_all_video_paging($config['per_page'],$offset);
        $data['content'] = 'video';
        $this->load->view('template', $data);
    }
    
    function video_r($id){
        $data['video'] = $this->home->get_wacth_video($id);
        if($data['video']->num_rows() > 0){
             $data['content'] = 'video_read';
             $this->load->view('template', $data);
        }else{
            show_404();
        }
    }
    
    
    function get_featured_photo($id_gallery){
        $photo = $this->home->get_featured_photo($id_gallery);
        if($photo->num_rows() > 0){
            echo $photo->row()->path_photo;
        }else{
            echo base_url().'assets/image/df-image.png';
        }
    }
    
    function widget(){
        $this->load->view('widget');
    }
    
    function get_berita_widget($limit, $is_image=NULL){
       $post =  $this->home->get_post($limit);
        echo '<div class="single-widget recent-post-widget">
                    <h4 class="widget-title text-danger">Berita RB</h4>
                    <ul>';
        foreach($post->result() as $dt_post){
           if($is_image == NULL){
                echo '<li class="d-flex flex-row align-items-center border-bottom pb-3">
                        <div class="thumbs">
                            <img style="width:60px" src="'.$dt_post->path_featured_image.'" alt="">
                        </div>
                        <div class="details">
                            <a href="'.site_url("home/post_r/").$dt_post->id_post.'/'.$dt_post->seo_url.'">
                                <h5>'.$dt_post->title.'</h5>
                            </a>
                            <p class="text-uppercase">
                                '.$dt_post->created.'
                            </p>
                        </div>
                    </li>
                ';
           }else{
                echo '<li class="d-flex flex-row align-items-center border-bottom pb-3">
                      
                        <div class="details">
                            <a href="'.site_url("home/post_r/").$dt_post->id_post.'/'.$dt_post->seo_url.'">
                                <h5>'.$dt_post->title.'</h5>
                            </a>
                            <p class="text-uppercase">
                                '.$dt_post->created.'
                            </p>
                        </div>
                    </li>
                ';
            
           }
            
        }
        echo '<a href="'.site_url("home/berita").'" class="btn btn-sm btn-success text-right">Semue Berita RB >></a></ul></div>';
    }
    
    function get_galley_widget($limit){
        $gallery =  $this->home->get_gallery($limit);
        echo '<div class="single-widget ">
              <h4 class="widget-title text-danger">Gallery RB</h4>
                <div class="row">';
        foreach($gallery->result() as $dt_gallery){
            echo '
                <div class="col-md-6 mt-2">
                     <a href="'.site_url("home/gallery_r/".$dt_gallery->id_gallery.'/'.$dt_gallery->slug).'">
                        <img class="img-fluid rounded" style="height:75px" src="'.modules::run('home/get_featured_photo', $dt_gallery->id_gallery).'" />
                     </a>
                </div>
            ';
        }
        echo '</div><a href="'.site_url("home/gallery").'" class="btn btn-sm btn-warning text-right mt-3">Semue Gallery RB >></a></ul></div>';
        
    }
    
    function get_video_widget($limit){
        $video =  $this->home->get_video($limit);
       
        echo '<div class="single-widget ">
              <h4 class="widget-title text-danger">Gallery RB</h4>
                <div class="row">';
        foreach($video->result() as $dt_video){
            $url = $dt_video->url;
            $video_id = explode('/', $url);
            echo '
                <div class="col-md-6 mt-2">
                     <a href="'.site_url("home/video_r/".$dt_video->id_video.'/'.$dt_video->seo_url).'">
                        <img class="img-fluid rounded" src="https://img.youtube.com/vi/'.$video_id[sizeof($video_id)-1].'/0.jpg" />
                     </a>
                </div>
            ';
        }
        echo '</div><a href="'.site_url("home/video").'" class="btn btn-sm btn-info text-right mt-3">Semue Video RB >></a></ul></div>';
        
    }
    
    function get_produk_widget($limit){
        $produk = $this->home->get_produk_rb($limit);
        
        echo  '<div class="single-widget recent-post-widget p-4">
                <h4 class="widget-title title">Produk RB</h4>
                <ul class="aktivitas">';
                foreach($produk->result() as $dt_produk){
         echo ' <li class="d-flex flex-row align-items-center">
                        <div class="details">
                            <div class="row">
                                <div class="col-md-2">
                                     <img width="32px" class="img-fluid" src="'.base_url().'assets/image/attachment.png" />
                                </div>
                                <div class="col-md-10">
                                    <h5>&nbsp;'.ucwords($dt_produk->judul).'</h5>
                                </div>
                            </div>
                               
                        </div>
                    </li>';
                    }
                   
         echo  '</ul>';
    }
    
     public function dashboard(){
        $data['content'] = 'dashboard';
        $this->load->view('template', $data);
    }

    
    

         
}
