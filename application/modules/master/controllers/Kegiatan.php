<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_master', 'master');
        $this->load->helper('function');
    }
    
    
    public function index(){
        $data['content'] = 'kegiatan/kegiatan';
        $data['kegiatan'] = $this->master->get_kegiatan();
        $this->load->view('template', $data);
	}
    
    public function tambah_area_kegiatan(){
        
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('kode', 'Kode Kegiatan', 'required|trim');
            $this->form_validation->set_rules('capaian', 'Capaian', 'required|trim');
            $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required|trim');
            $this->form_validation->set_rules('indikator', 'Indikator', 'required|trim');
            $this->form_validation->set_rules('data_dukung', 'Data Dukung', 'required|trim');
            $this->form_validation->set_rules('waktu', 'Waktu Pelaksanaan', 'required|trim');
            $this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required|trim');
              
            if($this->form_validation->run()){ 
              $this->master->tambah_kegiatan();
              redirect('master/kegiatan');
            }else{ 
              echo 'sadsa';
            }
        }else{
             $data['js'] = array(
                "<script src='".base_url()."assets/page/js/kegiatan.js'/></script>",  
            );  
            $data['area_perubahan'] = $this->master->get_area_perubahan();
            $data['content'] = 'kegiatan/tambah_kegiatan';
        
           $this->load->view('template', $data);    
        }
        
	}
    
    public function edit_area_perubahan($encryp){
        if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('perubahan', 'Area Perubahan', 'required|trim');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
            if($this->form_validation->run()){ 
              $this->master->edit_area_perubahan($encryp);
              redirect('master/perubahan');
            }else{ 
              return FALSE; 
            }
        }else{          
            $data['content'] = 'perubahan/edit_perubahan';
            $data['perubahan'] = $this->master->get_perubahan_byid($encryp);
            $this->load->view('template', $data);    
        }
	}
    
     public function hapus_area_prubahan(){
        $this->master->hapus_area_perubahan($this->input->post('ref'));
     }
     
     public function get_capaian(){
        $capaian = $this->master->get_capaian_by_perubahan($this->input->post('ref'));
        if($capaian->num_rows() > 0){
            foreach($capaian->result() as $dt_capaian){
                echo '<option value="'.$dt_capaian->id_capaian.'">'.$dt_capaian->kode_capaian. ' - ' .$dt_capaian->capaian.'</option>';
            }
        }else{
            echo '<option value="">-- belum ada data --</option>';
        }
        
     }

     
    

         
}
