<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
    
        public function login($password,$username){
    		$this->db->select('*');
            $this->db->where('username', $username);
            $this->db->limit(1);
            $auth = $this->db->get('user');
           
    		if ($auth->num_rows() > 0){
    		    $hash = $auth->row()->password;
                
    			if(password_verify($password, $hash)){
    			    //get detail user 
                    
  		            $this->session->set_userdata('iduser', $auth->row()->iduser);
                    $this->session->set_userdata('nama', $auth->row()->nama);  
                    $this->session->set_userdata('role', $auth->row()->id_role);  
                    $this->session->set_userdata('satker', $auth->row()->satker_id);
    				$this->session->set_userdata('ver_satker', $auth->row()->verifikator_satker);
                    $this->session->set_userdata('tahun', '2020');    
    				return TRUE;
    			}else{
    			    //print_r(password_verify($password, $hash));
                    return FALSE;
    			}
    		}
      
    	}
        
 
      
}
