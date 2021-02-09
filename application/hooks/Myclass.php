<?php 
class Myclass{
 
 function maintenis(){
    echo 'website dalam perbaikan';
    exit();
 }
     function url_role_old(){
         $ci =& get_instance();
         if($ci->uri->segment(1) == 'master'){
            if($ci->session->userdata('role') != 1){
               if($ci->uri->segment(1) == 'master' &&  $ci->uri->segment(2) != 'video'){
                echo '<h4 style="text-align:center;  background:maroon; padding:5px 10px; color:white;">You are not allowed</h4>';
                exit();
                }
            }    
        }   
    }
    
    function url_role(){
     
         $ci =& get_instance();
         $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $uri_segments = explode('/', $uri_path);
            
            $uri_1 = $uri_segments[0]; 
            $uri_2 = $uri_segments[1]; 
         
         
         if($uri_1 == 'master'){
            if($ci->session->userdata('role') != 1){
               if($uri_1 == 'master' &&  $uri_2 != 'video'){
                echo '<h4 style="text-align:center;  background:maroon; padding:5px 10px; color:white;">You are not allowed</h4>';
                exit();
                }
            }    
        }
    
    }
}

?>