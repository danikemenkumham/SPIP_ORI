<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_dashboard', 'dashboard');
    }
    
    public function index(){
        $data['js'] = array(
                "<script src='".base_url()."assets/template/vendors/chart.js/Chart.min.js'/></script>",
                "<script src='".base_url()."assets/template/js/chart.js'/></script>",    
            );
        if($this->session->userdata('role') == '5'){
            $data['lke_area'] = $this->dashboard->get_area('wbk');
            $data['pmprb_area'] = $this->dashboard->get_area('pmprb');
            $data['rkt_area'] = $this->dashboard->get_area('rkt');
            $data['content'] = 'dashboard_kanwil';
        }else{
            $data['content'] = 'dashboard';
        }      
        
        $this->load->view('template', $data);
	}
    
    public function satker($satker){
         $data['lke_area'] = $this->dashboard->get_area('wbk');
         $data['pmprb_area'] = $this->dashboard->get_area('pmprb');
         $data['rkt_area'] = $this->dashboard->get_area('rkt');
         $data['content'] = 'dashboard_satker';
         $this->load->view('template', $data);
    }
    
    //pmprb
    public function pmprb(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'dashboard/pmprb';
        $config['total_rows'] = $this->dashboard->get_pmprb_satker(NULL)->num_rows();
        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        $data['satker'] = $this->dashboard->get_pmprb_satker_limit($config['per_page'],$page);
        $data['content'] = 'satker_all_pmprb';
        $this->load->view('template', $data);
    }
    
     public function wbk(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'dashboard/wbk';
        $config['total_rows'] = $this->dashboard->get_wbk_satker(NULL)->num_rows();
        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        $data['satker'] = $this->dashboard->get_wbk_satker_limit($config['per_page'],$page);
        $data['content'] = 'satker_all_wbk';
        $this->load->view('template', $data);
    }
    
     public function rkt(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'dashboard/rkt';
        $config['total_rows'] = $this->dashboard->get_rkt_satker(NULL)->num_rows();
        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        $data['satker'] = $this->dashboard->get_rkt_satker_limit($config['per_page'],$page);
        $data['content'] = 'satker_all_rkt';
        $this->load->view('template', $data);
    }
    

   
    public function pmprb_satker($limit){
        return $this->dashboard->get_pmprb_satker($limit); 
    }
    
    function total_pmprb_satker($satker){
        $coun_all = $this->dashboard->total_pmprb_satker($satker); 
        $coun_lengkap = $this->dashboard->total_lengkap_pmprb_satker($satker);
        if($coun_lengkap == 0){
             $presentase = 0;
        }else{
            
             $presentase =  ($coun_lengkap/$coun_all)*100;
             $presentase = number_format((float)$presentase, 0, '.', '');
        }
         
        echo $presentase;
    }
    
    function pmprb_lengkap_nasional(){
        $coun_all = $this->dashboard->total_pmprb_nasinoal(); 
        $coun_lengkap = $this->dashboard->total_lengkap_pmprb_nasional();
        if($coun_lengkap == 0){
             $presentase = 0;
        }else{
            
             $presentase =  ($coun_lengkap/$coun_all)*100;
             $presentase = number_format((float)$presentase, 0, '.', '');
        }
         
        echo $presentase;
    }
    
    
    //WBK,WBBM
    public function wbk_satker($limit){
        return $this->dashboard->get_wbk_satker($limit); 
    }
    
    function total_wbk_satker($satker){
        $coun_all = $this->dashboard->total_wbk_satker($satker); 
        $coun_lengkap = $this->dashboard->total_lengkap_wbk_satker($satker);
        if($coun_lengkap == 0){
             $presentase = 0;
        }else{
            
             $presentase =  ($coun_lengkap/$coun_all)*100;
             $presentase = number_format((float)$presentase, 0, '.', '');
        }
         
        echo $presentase;
    }
    
    function wbk_lengkap_nasional(){
        $coun_all = $this->dashboard->total_wbk_nasinoal(); 
        $coun_lengkap = $this->dashboard->total_lengkap_wbk_nasional();
        if($coun_lengkap == 0){
             $presentase = 0;
        }else{
            
             $presentase =  ($coun_lengkap/$coun_all)*100;
             $presentase = number_format((float)$presentase, 0, '.', '');
        }
         
        echo $presentase;
    }
    
    //RKT
   
    public function rkt_satker($limit){
        return $this->dashboard->get_rkt_satker($limit); 
    }
    
    function total_rkt_satker($satker){
        $coun_all = $this->dashboard->total_rkt_satker($satker); 
        $coun_lengkap = $this->dashboard->total_lengkap_rkt_satker($satker);
        if($coun_lengkap == 0){
             $presentase = 0;
        }else{
            
             $presentase =  ($coun_lengkap/$coun_all)*100;
             $presentase = number_format((float)$presentase, 0, '.', '');
        }
         
        echo $presentase;
    }
    
    function rkt_lengkap_nasional(){
        $coun_all = $this->dashboard->total_rkt_nasinoal(); 
        $coun_lengkap = $this->dashboard->total_lengkap_rkt_nasional();
        if($coun_lengkap == 0){
             $presentase = 0;
        }else{
            
             $presentase =  ($coun_lengkap/$coun_all)*100;
             $presentase = number_format((float)$presentase, 0, '.', '');
        }
         
        echo $presentase;
    }
    
    
    
    
    //dashboard kanwil
     public function count_lke_area($id_area, $id_satker){
        $coun_all = $this->dashboard->total_lke_area($id_area, $id_satker); 
        $coun_lengkap = $this->dashboard->total_lengkap_lke_area($id_area, $id_satker); 
        if($coun_lengkap == 0){
             $presentase = 0;
        }else{
            
             $presentase =  ($coun_lengkap/$coun_all)*100;
             $presentase = number_format((float)$presentase, 0, '.', '');
        }
         
        echo $presentase;
    }
    
    public function count_pmprb_area($id_area, $id_satker){
        $coun_all = $this->dashboard->total_pmprb_area($id_area, $id_satker); 
        $coun_lengkap = $this->dashboard->total_lengkap_pmprb_area($id_area, $id_satker); 
        if($coun_lengkap == 0){
             $presentase = 0;
        }else{
            
             $presentase =  ($coun_lengkap/$coun_all)*100;
             $presentase = number_format((float)$presentase, 0, '.', '');
        }
         
        echo $presentase;
    }
    
    public function count_rkt_area($id_area, $id_satker){
        $coun_all = $this->dashboard->total_rkt_area($id_area, $id_satker); 
        $coun_lengkap = $this->dashboard->total_lengkap_rkt_area($id_area, $id_satker); 
        if($coun_lengkap == 0){
             $presentase = 0;
        }else{
             $presentase =  ($coun_lengkap/$coun_all)*100;
             $presentase = number_format((float)$presentase, 0, '.', '');
        }
         
        echo $presentase;
    }
    
    public function get_nama_satker($satker){
        $satker = $this->dashboard->get_nama_satker($satker);
        if($satker->num_rows() > 0){
            echo $satker->row()->Satker;
        }else{
            echo '-';
        }
    }
    
         
}
