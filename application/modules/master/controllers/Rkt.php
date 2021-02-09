<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rkt extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_master', 'master');
    }

    public function satker(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'master/rkt/satker';
        $config['total_rows'] = $this->master->get_rkt()->num_rows();
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        $data['rkt'] = $this->master->get_rkt_limit($config['per_page'],$page);
        $data['content'] = 'rkt/rkt';
        $this->load->view('template', $data);
	}
 
    
     public function tambah_rkt(){
        
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('area', 'area perubahan ', 'required|trim');
            $this->form_validation->set_rules('kegiatan', 'kegiatan', 'required|trim');
            $this->form_validation->set_rules('daduk', 'data dukung', 'required|trim');
            $this->form_validation->set_rules('waktu[]', 'waktu Pelaksanan', 'required|trim');
           
            if($this->form_validation->run()){ 
              $this->master->tambah_rkt();
              redirect('master/rkt/satker/'.$tipe);
            }else{ 
              print_r(validation_errors());
            }
        }else{
            $data['js'] = array(
                "<script src='".base_url()."assets/page/js/master.js'/></script>", 
                 "<script src='".base_url()."assets/page/js/treeview.js'/></script>", 
                  "<script src='".base_url()."assets/page/js/logger.js'/></script>", 
                   
            );     
           $data['content'] = 'rkt/tambah_rkt';
           $data['area'] = $this->master->get_area('rkt'); 
           $this->load->view('template', $data);    
        }
        
	}
    
    public function get_satker($tipe){
        return $this->master->get_satker_rkt_byesel($tipe);
    }
    
    
    public function edit_rkt( $id_rkt){
        
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('area', 'area perubahan ', 'required|trim');
            $this->form_validation->set_rules('kegiatan', 'kegiatan', 'required|trim');
            $this->form_validation->set_rules('daduk', 'data dukung', 'required|trim');
            $this->form_validation->set_rules('waktu[]', 'waktu Pelaksanan', 'required|trim');
           
            if($this->form_validation->run()){ 
              $this->master->edit_rkt($id_rkt);
              redirect('master/rkt/satker/'.$tipe);
            }else{ 
               print_r(validation_errors());
            }
        }else{
            $data['js'] = array(
                "<script src='".base_url()."assets/page/js/master.js'/></script>", 
                 "<script src='".base_url()."assets/page/js/treeview.js'/></script>", 
                  "<script src='".base_url()."assets/page/js/logger.js'/></script>", 
                   
            );      
           $data['content'] = 'rkt/edit_rkt';
           $data['area'] = $this->master->get_area('rkt'); 
           $data['rkt'] = $this->master->get_rincian_rkt_edit($id_rkt);   
           $this->load->view('template', $data);    
            
        }
        
	}
    
    public function get_satker_rincian_rkt($id){
        echo  $this->master->get_satker_rincian_rkt($id);
    }
    
    public function get_waktu($id_rkt){
        $waktu =  $this->master->get_waktu_rkt($id_rkt);
        $wkt = [];
        foreach($waktu->result() as $dt_waktu){
            array_push($wkt, $dt_waktu->waktu_pelaksanaan);
        }
        return $wkt;
    }
    
    
    
    public function get_user_rkt($id){
        return $this->master->get_satker_edit_rkt($id);
    }
    
    public function add_satker_detail(){
       $this->master->add_satker_detail_rkt();
    }
    
    public function rem_satker_detail(){
        $this->master->remove_satker_detail($this->input->post('detail'));
    }
    
     public function hapus_rkt(){
        $this->master->hapus_rkt($this->input->post('ref'));
     }
     
     function check_satker($satker,$id_detail){
       $check =  $this->master->check_detail_rkt_satker($satker,$id_detail);
       if($check->num_rows() > 0){
        echo '1';
       }else{
        echo '0';
       }
     }
    
   

         
}
