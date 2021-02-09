<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends MX_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('M_notifikasi', 'notifikasi');
    }
    
    public function index(){
        $data['content'] = 'notifikasi/notifikasi';
        $data['notifikasi'] = $this->notifikasi->get_notifikasi();
        $this->load->view('template', $data);
	}
    
    public function read($id){
        $notif_read = $this->notifikasi->is_read($id);
        redirect($notif_read->row()->link);    
    }
    
    
    public function get_notif_widget($limit){
        return $this->notifikasi->get_notif_widget($limit);
    }
    
    
  

         
}
