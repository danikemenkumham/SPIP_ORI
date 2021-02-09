<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_login', 'login');
    }
    
    public function index(){
    if($this->input->post()){
           $this->load->library('form_validation'); 
           $this->form_validation->set_rules('password', 'password', 'required');	       
	       $this->form_validation->set_rules('username', 'username', 'required');
           if($this->form_validation->run() == FALSE){
                $data['set_value'] = array(
                        'username' => set_value('username')
				);
                $this->load->view('login', $data);  
           }else{
                $password = $this->input->post('password');
                $username = $this->input->post('username');
                
                $login = $this->login->login($password,$username);
                if($login == TRUE){
                    if($this->session->userdata('role') == '1'){
                
                        redirect('dashboard');  
                    }else if($this->session->userdata('role') == '2'){
                        redirect('dashboard');    
                    }else if($this->session->userdata('role') == '5'){
                        redirect('dashboard');    
                    }
                    
                }else{
                   $this->session->set_flashdata('notice', array('class' => 'danger', 'msg' => 'username atau password anda salah'));         
                   echo 'Username/Password salah';
                }
           }
       }else{
            $this->load->view('login');
       }
	}
    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
    public function form_error($field){
        echo "<span class='help-block ".$field."_error has-error'>".form_error($field)."</span>";
    }
         
}
