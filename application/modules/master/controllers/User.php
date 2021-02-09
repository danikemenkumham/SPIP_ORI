<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_master', 'master');
    }
    
    public function index(){
        
        $this->load->library('pagination');
        $config['base_url'] = base_url().'master/user';
        $config['total_rows'] = $this->master->get_user()->row()->total;
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        $data['user'] = $this->master->get_user_limit($config['per_page'],$page);
        $data['content'] = 'user/user';
        $this->load->view('template', $data);
	}
    
    public function tambah_user(){
        if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('nama', 'nama', 'required|trim');
            $this->form_validation->set_rules('username', 'usernam', 'required|trim');
            $this->form_validation->set_rules('password', 'password', 'required|trim');
            $this->form_validation->set_rules('status', 'status', 'required|trim');
            $this->form_validation->set_rules('role', 'role', 'required|trim');
            $this->form_validation->set_rules('satker', 'satuan kerja', 'required|trim'); 
            if($this->form_validation->run()){ 
              $this->master->tambah_user();
              redirect('master/user');
            }else{ 
                echo validation_errors();
            }
        }else{
            /*
            $data['css'] = array(
                "<link rel='stylesheet' type='text/css' href='".base_url()."assets/page/js/program.js'/>",  
            );
            */  
            $data['js'] = array(
                "<script src='".base_url()."assets/page/js/user.js'/></script>",  
            );  
           $data['role'] = $this->master->get_role();
           $data['satker'] = $this->master->get_satker_list();
           $data['content'] = 'user/tambah_user';
           $this->load->view('template', $data);    
        }
        
	}
    
    public function edit_user($encryp){
        if($this->input->post('submit')){
            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('nama', 'nama', 'required|trim');
            $this->form_validation->set_rules('username', 'usernam', 'required|trim');
            
            $this->form_validation->set_rules('status', 'status', 'required|trim');
            $this->form_validation->set_rules('role', 'role', 'required|trim');
            $this->form_validation->set_rules('satker', 'satuan kerja', 'required|trim'); 
            if($this->form_validation->run()){ 
              $this->master->edit_user($encryp);
              redirect('master/user');
            }else{ 
                echo validation_errors();
            }
        }else{
            $data['role'] = $this->master->get_role();
            $data['satker'] = $this->master->get_satker_list();
            $data['content'] = 'user/edit_user';
            $data['user'] = $this->master->get_user_byid($encryp);
            $this->load->view('template', $data);    
        }
	}
    
     public function hapus_user(){
        $this->master->hapus_user($this->input->post('ref'));
     }
     
     public function generate_user($tipe){
        if($tipe == 'esel'){
            //$this->db->where('Eselon','21');
            //$satker = $this->db->get('satker'); 
            $sql = "SELECT * FROM `satker` where SatkerID like '____' and SatkerID BETWEEN 1701 and 4967";
            $satker = $this->db->query($sql); 
            foreach($satker->result() as $dt_satker){
                $data = '1234567890abcefghijklmnopqrstuvwxyz';
                $pass = substr(str_shuffle($data), 0, 4);
                $this->db->set('nama',$dt_satker->Satker);
                $this->db->set('username', $dt_satker->SatkerID);
                $this->db->set('id_role','5');
                $this->db->set('satker_id',$dt_satker->SatkerID);
        		$options = array(
        			'cost' => 12,
        		);
        		$password = password_hash($pass, PASSWORD_BCRYPT, $options);
                $this->db->set('password',$password);
                $this->db->set('textpass',$pass);
                $this->db->set('status','1');
                $this->db->insert('user');
                
               
            }  
        }elseif($tipe=='upt'){
            
        }
        
        
        
     }
     
     public function buat_pass(){
         $satkerid = $dt_satker.'__';
                $sql = "select * from Satker where SatkerID like '$satkerid'";
                $biro = $this->db->query($sql); 
                foreach($biro->result() as $dt_biro){
                     $data_2 = '1234567890abcefghijklmnopqrstuvwxyz';
                    $pass_2 = substr(str_shuffle($data_2), 0, 4);
                    $this->db->set('nama',$dt_biro->Satker);
                    $this->db->set('username', $dt_biro->SatkerID);
                    $this->db->set('id_role','5');
                    $this->db->set('satker_id',$dt_biro->SatkerID);
            		$options = array(
            			'cost' => 12,
            		);
            		$password_2 = password_hash($pass_2, PASSWORD_BCRYPT, $options);
                    $this->db->set('password',$password_2);
                    $this->db->set('textpass',$pass_2);
                    $this->db->set('status','1');
                    $this->db->insert('user');
                }  
        
     }

         
}
