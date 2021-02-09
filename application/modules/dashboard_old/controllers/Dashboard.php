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
    
    public function pmprb(){
        $data['area'] = $this->dashboard->get_area(7);
        $data['pmprb'] =  $this->dashboard->count_pmprb_satker(1701);
        $data['content'] = 'table';
        $this->load->view('template', $data);
    }

         
}
