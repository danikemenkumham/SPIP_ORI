<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pmprb extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_master', 'master');
    }
    
    
    public function index(){   
        $this->load->library('pagination');
        $config['base_url'] = base_url().'master/pmprb';
        $config['total_rows'] = $this->master->get_pmprb()->num_rows();
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        $data['pmprb'] = $this->master->get_pmprb_limit($config['per_page'],$page);
        $data['content'] = 'pmprb/pmprb';
        $this->load->view('template', $data);
	}
    
    public function tambah_pmprb(){
        
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('area', 'Area Perubahan', 'required|trim');
            $this->form_validation->set_rules('kategori_penilaian', 'Kategori Penilaian', 'required|trim');
            
            if($this->form_validation->run()){ 
              $this->master->tambah_pmprb();
              redirect('master/pmprb');
            }else{ 
              return FALSE; 
            }
        }else{
            $data['js'] = array(
                "<script src='".base_url()."assets/page/js/master.js'/></script>", 
                
            );  
           $data['content'] = 'pmprb/tambah_pmprb';
           $data['perubahan'] = $this->master->get_area('pmprb'); 
           $this->load->view('template', $data);    
        }
        
	}
    
    public function edit_pmprb($encryp){
        if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('area', 'Area Perubahan', 'required|trim');
            $this->form_validation->set_rules('kategori_penilaian', 'Kategori Penilaian', 'required|trim');
            
            if($this->form_validation->run()){ 
              $this->master->edit_pmprb($encryp);
              redirect('master/pmprb');
            }else{ 
              return FALSE; 
            }
        }else{          
            $data['content'] = 'pmprb/edit_pmprb';
            $data['area'] = $this->master->get_area();
            $data['pmprb'] = $this->master->get_pmprb_byid($encryp);
            $this->load->view('template', $data);    
        }
	}
    
     public function hapus_pmprb(){
        $this->master->hapus_pmprb($this->input->post('ref'));
     }

     public function rincian(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'master/pmprb/rincian';
        $config['total_rows'] = $this->master->get_rincian_pmprb()->num_rows();
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        $data['rincian_pmprb'] = $this->master->get_rincian_pmprb_limit($config['per_page'],$page);      
        $data['content'] = 'pmprb/rincian_pmprb';

        $this->load->view('template', $data);
	}
    
     public function tambah_rincian(){
       
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('pmprb', 'Pilih Poin Indikator', 'required|trim');
            $this->form_validation->set_rules('penjelasan', 'penjelasan', 'required|trim');
            $this->form_validation->set_rules('objek_penilaian', 'Objek Penilaian', 'required|trim');
            $this->form_validation->set_rules('jenis_lkp', 'jenis lkp', 'required|trim');
            $this->form_validation->set_rules('data_dukung', 'data_dukung', 'required|trim');
           
            if($this->form_validation->run()){ 
              $this->master->tambah_rincian_pmprb();
              redirect('master/pmprb/rincian');
            }else{ 
              return FALSE; 
            }
        }else{
            $data['js'] = array(
                "<script src='".base_url()."assets/page/js/master.js'/></script>", 
                 "<script src='".base_url()."assets/page/js/treeview.js'/></script>", 
                  "<script src='".base_url()."assets/page/js/logger.js'/></script>", 
                   
            );  
           $data['content'] = 'pmprb/tambah_rincian';
           $data['pmprb'] = $this->master->get_pmprb(); 
           $data['satker'] = $this->master->get_satker();
           $this->load->view('template', $data);    
        }
        
	}
    
    
    public function edit_rincian_pmprb($id_rincian){
        
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('pmprb', 'Pilih Kategori Penilaian', 'required|trim');
            $this->form_validation->set_rules('penjelasan', 'penjelasan', 'required|trim');
             $this->form_validation->set_rules('objek_penilaian', 'Objek Penilaian', 'required|trim');
              $this->form_validation->set_rules('jenis_lkp', 'jenis lkp', 'required|trim');
              $this->form_validation->set_rules('data_dukung', 'data_dukung', 'required|trim');
           
            if($this->form_validation->run()){ 
              $this->master->edit_rincian_pmprb($id_rincian);
              redirect('master/pmprb/rincian');
            }else{ 
              return FALSE; 
            }
        }else{
        
             $data['js'] = array(
                "<script src='".base_url()."assets/page/js/master.js'/></script>", 
                 "<script src='".base_url()."assets/page/js/treeview.js'/></script>", 
                  "<script src='".base_url()."assets/page/js/logger.js'/></script>", 
                   
            );   
           $data['content'] = 'pmprb/edit_rincian';
           $data['pmprb'] = $this->master->get_pmprb();
            $data['rincian'] = $this->master->get_rincian_pmprb_edit($id_rincian);  
           $data['satker'] = $this->master->get_satker();
           $this->load->view('template', $data);    
        }
        
	}
    
    public function get_satker_rincian($id){
        echo $this->master->get_satker_rincian($id);
    }
    
    public function get_satker_edit_pmprb($id){
        return $this->master->get_satker_edit_pmprb($id);
    }
    
    public function add_satker_detail(){
       $this->master->add_satker_detail_pmprb();
    }
    
    public function rem_satker_detail(){
        $this->master->remove_satker_detail($this->input->post('detail'));
    }
    
     public function hapus_detail(){
        $this->master->hapus_detail_pmprb($this->input->post('ref'));
     }
     
     
     public function get_satker_list(){
        $esel = $this->master->getsatker($this->input->post('tipe'));
        foreach($esel->result() as $dt_esel){
            echo '<div class="col-md-4">';
            echo ' <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="satker[]" value="'.$dt_esel->SatkerID.'">
                          '.$dt_esel->Satker.'
                        <i class="input-helper"></i></label>
                    </div>';
            echo '</div>';
        }
     }
     
     
     function check_satker($satker,$id_detail){
       $check =  $this->master->check_detail_pmprb_satker($satker,$id_detail);
       if($check->num_rows() > 0){
        echo '1';
       }else{
        echo '0';
       }
     }
     
     
    
   

         
}
