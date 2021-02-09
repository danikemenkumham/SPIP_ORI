<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indeks extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_indeks', 'indeks');
    }
    
    public function nilai(){
        $data['js'] = array(
                    "<script src='".base_url()."assets/page/js/indeks.js'/></script>",  
                ); 
        $data['indeks'] = $this->indeks->get_indeks($this->input->get('tahun'));
        $data['content'] = 'indeks/nilai';
        $this->load->view('template', $data);
	}
    
    function menu(){
       $menu =  $this->indeks->get_menu();
        foreach($menu->result() as $dt_menu){
            echo ' <li class="nav-item"> <a class="nav-link" href="'.base_url('master/indeks/opt/'.$dt_menu->url_path.'?opt=year').'">'.ucwords($dt_menu->indeks).'</a></li>';
        }
    }
    
     function opt($indeks){
       
        $data['content'] = 'indeks/tahun';
        $this->load->view('template', $data);
    }
    
    
    function komponen($indeks){
        if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
            if($this->form_validation->run()){ 
              $this->indeks->tambah_keterangan();
              redirect('master/indeks/komponen/'.$indeks.'?year='.$this->input->post('year'));
            }else{ 
              return FALSE; 
            }
        }else{
            $data['js'] = array(
                    "<script src='".base_url()."assets/page/js/indeks.js'/></script>",  
                ); 
            $data['komponen'] = $this->indeks->get_komponen($this->input->get('year'), $indeks);
            $keterangan = $this->indeks->get_keterangan($this->input->get('year'), $indeks);
            if($keterangan->num_rows() > 0){
                $data['keterangan'] = $keterangan->row()->keterangan;
                 $data['ref'] = $keterangan->row()->id_keterangan;
            }else{
                $data['ref'] = '';
                $data['keterangan'] = '';
            }
            
            $data['content'] = 'indeks/point';
            $this->load->view('template', $data);    
        }
        
    }
    
    
    function addkomponen($indeks){
       if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('komponen', 'komponen', 'required|trim');
            $this->form_validation->set_rules('bobot', 'bobot', 'required|trim');
            $this->form_validation->set_rules('tahun', 'tahun', 'required|trim');
            $this->form_validation->set_rules('nilai', 'nilai', 'required|trim');  
            if($this->form_validation->run()){ 
              $this->indeks->tambah_komponen();
              redirect('master/indeks/komponen/'.$indeks.'?year='.$this->input->post('tahun'));
            }else{ 
              return FALSE; 
            }
        }else{
           $data['content'] = 'indeks/tambah_komponen';
           $this->load->view('template', $data);    
        }   
    }
    
    
    function editkomponen($indeks,$ref){
       if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('komponen', 'komponen', 'required|trim');
            $this->form_validation->set_rules('bobot', 'bobot', 'required|trim');
            $this->form_validation->set_rules('tahun', 'tahun', 'required|trim');
            $this->form_validation->set_rules('nilai', 'nilai', 'required|trim');  
            if($this->form_validation->run()){ 
              $this->indeks->edit_komponen($this->input->post('ref'));
              redirect('master/indeks/komponen/'.$indeks.'?year='.$this->input->post('tahun'));
            }else{ 
              return FALSE; 
            }
        }else{
           $data['komponen'] = $this->indeks->get_komponen_byid($ref);
           $data['content'] = 'indeks/edit_komponen';
           $this->load->view('template', $data);    
        }   
    }
   
    
   
    
     public function hapus(){
        $this->indeks->hapus($this->input->post('ref'));
        echo 'reload';
     }
     
     
     //new form
     
     function indekslist(){
        $this->load->library('pagination');
     
        $config['base_url'] = base_url().'master/indeks/indekslist';
        $config['total_rows'] = $this->indeks->get_indeks_list()->row()->total;
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
      
        $data['indeks'] = $this->indeks->get_indeks_limit($config['per_page'],$page);
        $data['content'] = 'indeks/indeks';
        $this->load->view('template', $data);
     }
     
     function addindeks(){
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('indeks', 'nama indeks', 'required|trim');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
              
            if($this->form_validation->run()){ 
              $this->indeks->tambah_indeks();
              redirect('master/indeks/indekslist');
            }else{ 
              return FALSE; 
            }
        }else{
           $data['content'] = 'indeks/tambah_indeks';
           $data['area'] = $this->indeks->get_area(); 
           $this->load->view('template', $data);    
        }
     }
     
     public function editindeks($encryp){
        if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('area', 'area perubahan', 'required|trim');
            $this->form_validation->set_rules('indeks', 'nama indeks', 'required|trim');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
            if($this->form_validation->run()){ 
              $this->indeks->edit_indeks($encryp);
              redirect('master/indeks/indekslist');
            }else{ 
              return FALSE; 
            }
        }else{          
            $data['content'] = 'indeks/edit_indeks';
            $data['area'] = $this->indeks->get_area(); 
            $data['indeks'] = $this->indeks->get_indeks_byid($encryp);
            $this->load->view('template', $data);   
           
             
        }
	}
     public function remindeks(){
        $this->indeks->remove_indeks($this->input->post('ref'));
        echo 'reload';
     }
     
     public function remnilai(){
        $this->indeks->remove_nilai($this->input->post('ref'));
        echo 'reload';
     }
     
     
     function addnilai(){
       if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('tahun', 'tahun', 'required|trim');
            $this->form_validation->set_rules('nilai', 'nilai', 'required');  
            if($this->form_validation->run()){ 
              $check = $this->indeks->check_nilai();
              if($check->num_rows() > 0){
               echo "<script>
                    alert('Data nilai sudah pernah dimasukkan !');
                    window.location.href= '';
                    </script>";
              }else{
                $this->indeks->addnilai();
                redirect('master/indeks/nilai?tahun='.$this->input->post('tahun'));
              }
              
            }else{ 
              return FALSE; 
            }
        }else{
            $data['indeks'] = $this->indeks->indeks();
           $data['content'] = 'indeks/add_nilai';
           $this->load->view('template', $data);    
        }   
    }
    
    function enilai(){
        $this->indeks->edit_nilai($this->input->post('ref'),$this->input->post('val'));
    } 
    
    
    //trends chart
    
    function trends(){
        $data['indeks'] = $this->indeks->indeks();
        $data['content'] = 'indeks/trends_all';
        $this->load->view('template', $data);  
    }
    
    function gettrend(){
        $indeks = $this->indeks->get_trends($this->input->post('val'));
        $tahun =array();
        $nilai = array();
        foreach($indeks->result() as $dt_indeks){
             array_push( $tahun, $dt_indeks->tahun);
             array_push( $nilai, $dt_indeks->nilai);
            //$data[] = array_push($dt_indeks->nilai);      
        }
        $data['tahun'] = $tahun;
        $data['nilai'] = $nilai;
        if($indeks->num_rows() > 0){
            $data['indeks'] = $indeks->row()->indeks;
            $data['path'] = $indeks->row()->url_path;
        }else{
            $data['indeks'] = '';
            $data['path'] = '';
        }
        
        echo json_encode($data);
    }
    
    function check_trends($id_indeks){
        $trend = $this->indeks->check_trends($id_indeks);
        if($trend->num_rows() >  0){
            echo '1';
        }else{
            echo '0';
        }
    }
     
     
   
}
