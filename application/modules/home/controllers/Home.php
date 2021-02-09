<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
         //get ikm data from balitbangham
        var $url_sdp;
    	var $auth_sdp = array();
    
    	var $url_survei;
    	var $auth_survei = array(); 

    function __construct(){
        parent::__construct();
        $this->load->model('M_home', 'home');
        
        //balitbang api
        $this->url_survei = 'https://survei.balitbangham.go.id/api';
		// Rest Authentication
		$this->auth_survei['rest_server_http_auth'] = 'digest';
		$this->auth_survei['rest_server_http_user'] = 'pU5D@tInKumH4m';
		$this->auth_survei['rest_server_http_pass'] = 'eac3202bc9f7fe2efe62ce2423780f69';
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
                                
                                <div class="">
                                    <h5><a  class="text-dark" target="_blank" href="'.$dt_produk->link_file.'"><i class="mdi mdi-file-document-box"></i>&nbsp;'.ucwords($dt_produk->judul).'</a></h5>
                                </div>
                            </div>
                               
                        </div>
                    </li>';
                    }
                   
         echo  '</ul>';
    }
    
    
    public function dashboard($tipe=NULL){
        $data['wilayah'] = $this->home->get_wilayah();
        $data['content'] = 'dashboard';
        $this->load->view('template', $data);
    }
    
    public function get_modal(){
       $this->load->library('rest',
		array(
				'server'    => $this->url_survei, 
				'http_user' => $this->auth_survei['rest_server_http_user'],
				'http_pass' => $this->auth_survei['rest_server_http_pass'],
				'http_auth' => $this->auth_survei['rest_server_http_auth']
			), 'rest_client'
		);
		
		$this->rest_client->option(CURLOPT_TIMEOUT, 5000);

		/**
		 *  Set Parameter
		 */
		$params = array();
		$params['page'] = NULL;		
		$params['limit'] = NULL;
		$params['event_name'] = 'Survei Balitbangham pada Satker Kementerian Hukum dan HAM 2020';
		// $params['subject_organization'] = 'KANTOR IMIGRASI KELAS I PALANGKA RAYA';
		// // $params['subject_organization_code'] = '013051400418332000KD';
		// $params['weight_name'] = 'IKM';
		// $params['score_grade_name'] = 'Sangat Baik';
		// $params['score_quality_value'] = 'A';
		// // $params['province_name'] = 'Kalimantan Tengah';
		$params['sort_field'] = 'score';
	   $params['sort_order'] = 'desc';

		$data['survey'] =  $this->rest_client->get('Survey_result/ikm_ipk?year=2020', $params);
        $data['wilayah'] = $this->input->post('ref');
        if($this->input->post('tipe') == 'ikm'){
            $this->load->view('modal_survei_ikm',$data);
        }else{
             $this->load->view('modal_survei_ipk',$data);
        }
       
    }
    
    public function get_modal_integritas(){
       $this->load->library('rest',
		array(
				'server'    => $this->url_survei, 
				'http_user' => $this->auth_survei['rest_server_http_user'],
				'http_pass' => $this->auth_survei['rest_server_http_pass'],
				'http_auth' => $this->auth_survei['rest_server_http_auth']
			), 'rest_client'
		);
		
		$this->rest_client->option(CURLOPT_TIMEOUT, 5000);

		/**
		 *  Set Parameter
		 */
		$params = array();
		$params['page'] = NULL;		
		$params['limit'] = NULL;
		$params['event_name'] = 'Survei Balitbangham pada Satker Kementerian Hukum dan HAM 2019';
		// $params['subject_organization'] = 'KANTOR IMIGRASI KELAS I PALANGKA RAYA';
		// // $params['subject_organization_code'] = '013051400418332000KD';
		// $params['weight_name'] = 'IKM';
		// $params['score_grade_name'] = 'Sangat Baik';
		// $params['score_quality_value'] = 'A';
		// // $params['province_name'] = 'Kalimantan Tengah';
		$params['sort_field'] = 'score';
	   $params['sort_order'] = 'desc';

		$data['survey'] =  $this->rest_client->get('Survey_result/integritas?year=2020', $params);
        $data['wilayah'] = $this->input->post('ref');
        $this->load->view('modal_survei_integritas',$data);
        
       
    }
    
   function produk($offset=NULL){
        if($offset == NULL){
            $offset = 0;
        }else{
            $offset = $offset;
        }
        $jumlah_data = $this->home->get_all_produk(10);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'home/produk';
		$config['total_rows'] = $jumlah_data->row()->total;
		$config['per_page'] = 10;

		$this->pagination->initialize($config);	
       // $data['produk'] = $this->home->get_all_produk_paging($config['per_page'],$offset,5);
       $data['produk'] = $this->home->get_produk(10);
        $data['kategori'] = $this->home->get_kategori('produk');
        $data['content'] = 'produk';
        $this->load->view('template', $data);
    }
    
    function get_produk(){
        $data['produk'] = $this->home->get_produk($this->input->post('ref'));
        $this->load->view('ajax_produk', $data);
    }
    
  function get_not_exist_survey($exist){
   return $this->home->get_not_wilayah($exist);
  }
  function get_wilayah_all(){
   return $this->home->get_wilayah_all();
  }
  
  
  public function get_survey(){
       $this->load->library('rest',
		array(
				'server'    => $this->url_survei, 
				'http_user' => $this->auth_survei['rest_server_http_user'],
				'http_pass' => $this->auth_survei['rest_server_http_pass'],
				'http_auth' => $this->auth_survei['rest_server_http_auth']
			), 'rest_client'
		);
		
		$this->rest_client->option(CURLOPT_TIMEOUT, 5000);

		/**
		 *  Set Parameter
		 */
		$params = array();
		$params['page'] = NULL;		
		$params['limit'] = NULL;
		$params['event_name'] = 'Survei Balitbangham pada Satker Kementerian Hukum dan HAM 2020';
		// $params['subject_organization'] = 'KANTOR IMIGRASI KELAS I PALANGKA RAYA';
		// // $params['subject_organization_code'] = '013051400418332000KD';
		// $params['weight_name'] = 'IKM';
		// $params['score_grade_name'] = 'Sangat Baik';
		// $params['score_quality_value'] = 'A';
		// // $params['province_name'] = 'Kalimantan Tengah';
		$params['sort_field'] = 'score';
	   $params['sort_order'] = 'desc';
       $tipe = $this->input->post('tipe');
        if($tipe == 'ikm' || $tipe == 'ipk'){
            	$data['ikm'] =  $this->rest_client->get('Survey_result/ikm_ipk?year=2020', $params);
        }else{
            	$data['integritas'] =  $this->rest_client->get('Survey_result/integritas?year=2020', $params);
        }
	
        if($tipe == 'ikm'){
            $this->load->view('survei_ikm',$data);
        }elseif($tipe == 'ipk'){
            $this->load->view('survei_ipk',$data);
        }else{
            $this->load->view('survei_integritas',$data);
        }
    }
    
    function get_dashboard_pmprb(){
        $this->load->view('dashboard_pmprb');
    }
    
    function get_dashboard_wbk(){
        $this->load->view('dashboard_wbk');
    }
    
    function get_dashboard_rkt(){
        $this->load->view('dashboard_rkt');
    }
    
    function capaian(){
        $data['content'] = 'capaian';
        $this->load->view('template', $data);
    }
    
    

    
    

         
}
