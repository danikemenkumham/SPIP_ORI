<?php if($this->session->userdata('iduser') == FALSE){
     $this->session->sess_destroy();
     redirect('login');
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ERB - Kemenkumham</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/template/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/template/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/template/css/style.css">
  <!-- endinject -->
   <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url()?>/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url()?>/assets/favicon//apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>/assets/favicon//apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>/assets/favicon//apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>/assets/favicon//apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url()?>/assets/favicon//apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url()?>/assets/favicon//apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url()?>/assets/favicon//apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>/assets/favicon//apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url()?>/assets/favicon//android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url()?>/assets/favicon//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url()?>/assets/favicon//favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>/assets/favicon//favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url()?>/assets/favicon//manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url()?>/assets/favicon//ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
  <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="base" data-url="<?php echo base_url()?>">
  <div class="container-scroller">
    <!-- partial:<?php echo base_url()?>assets/template/partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="<?php echo base_url('dashboard')?>">
          E-RB
          <!--<img src="<?php echo base_url()?>assets/template/images/logo.svg" alt="logo"/> -->
          </a>
          <a class="navbar-brand brand-logo-mini" href="<?php echo base_url('dashboard')?>"><img src="<?php echo base_url()?>assets/template/images/logo-mini.svg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
       <ul class="navbar-nav mr-md-4">
          <li class="nav-item nav-search">
           
             <p>Portal Elektronik Reformasi Birokrasi Kemenkumham RI</p>
           
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right ">
          <!--
          <li class="nav-item dropdown ">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-message-text mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notif</p>
              <?php $notifs = modules::run('notifikasi/get_notif_widget', 5)?>
              <?php foreach($notifs->result() as $dt_notif){?>
              <a class="dropdown-item" href="<?php echo site_url('notifikasi/read/'.$dt_notif->id_notif)?>">
                <div class="item-thumbnail">
                   <?php if($dt_notif->is_read == 0){?>
                    <i class="mdi mdi-36px  mdi-comment-check-outline text-danger"></i>
                   <?php }else{?>
                    <i class="mdi mdi-36px  mdi-comment-check text-success"></i>
                   <?php }?>
                   
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal"><?php echo $dt_notif->pengirim?>
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    <?php echo $dt_notif->pesan?>
                  </p>
                </div>
              </a>
              <?php }?>
              <hr />
               <a href="<?php echo site_url('notifikasi')?>" class="dropdown-item  text-center">
                
                <div class="item-content">
                  
                  <b class="text-primary"><i class="mdi mdi-bell-outline menu-icon"></i>Semua Notifikasi</b>
                  
                </div>
              
              </a>
    
    
      
            </div>
          </li>
          -->
            <li class="nav-item">
             <p><?php echo $this->session->userdata('nama')?></p>
            </li>
        
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="<?php echo base_url()?>/assets/favicon/apple-icon-120x120.png" alt="profile"/>
              <span class="nav-profile-name"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              
              <a class="dropdown-item" href="<?php echo site_url('login/logout')?>">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:<?php echo base_url()?>assets/template/partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
       
        <ul class="nav">
         <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('dashboard')?>">
              <i class="mdi mdi-home menu-icon text-info"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
           <?php if($this->session->userdata('iduser') == '1222' || $this->session->userdata('iduser') == '1223' || $this->session->userdata('iduser') == '1409' ){?>
          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#indeks" aria-expanded="false" aria-controls="indeks">
              <i class="mdi mdi-chart-areaspline menu-icon text-info"></i>
              <span class="menu-title">INDEKS RB</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="indeks" style="">
              <ul class="nav flex-column sub-menu">
             
               <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('master/indeks/indekslist')?>">Indeks</a></li>
               <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('master/indeks/nilai?tahun='.date('Y'))?>">Nilai</a></li>
               <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('master/indeks/trends')?>">Trends</a></li>
                
              </ul>
            </div>
          </li>
          <?php }?>
          
          
         <?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 4){?>
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('master/program')?>">
              <i class="mdi mdi-file-pdf menu-icon text-info"></i>
              <span class="menu-title">Program</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('master/perubahan')?>">
              <i class="mdi mdi-file-pdf menu-icon text-info"></i>
              <span class="menu-title">Area Perubahan</span>
            </a>
          </li>
             
          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#wbk" aria-expanded="false" aria-controls="wbk">
              <i class="mdi mdi-database menu-icon text-info"></i>
              <span class="menu-title">WBK/WBBM</span>
              <i class="menu-arrow"></i>
            </a>
              <div class="collapse " id="wbk" style="">
              <ul class="nav flex-column sub-menu">
             
                   
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('master/wbk')?>">Wbk Wbbm</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('master/wbk/rincian')?>">Detail Wbk Wbbm</a></li>
                 
              </ul>
            </div>
          </li>
          
          
          
          
          
          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#pmprb" aria-expanded="false" aria-controls="pmprb">
              <i class="mdi mdi-database menu-icon text-info"></i>
              <span class="menu-title">PMPRB</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="pmprb" style="">
              <ul class="nav flex-column sub-menu">
                
              
                  <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('master/pmprb')?>">Pmprb</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('master/pmprb/rincian')?>">Detail Pmprb</a></li>
                
              </ul>
            </div>
          </li>
          
           <li class="nav-item">
            <a class="nav-link " href="<?php echo site_url('master/rkt/satker')?>" >
              <i class="mdi mdi-database menu-icon text-info"></i>
              <span class="menu-title">RKT</span>
            </a>
           
          </li>
          
          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#indeks" aria-expanded="false" aria-controls="indeks">
              <i class="mdi mdi-account-key menu-icon text-info"></i>
              <span class="menu-title">INDEKS RB</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="indeks" style="">
              <ul class="nav flex-column sub-menu">
             
               <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('master/indeks/indekslist')?>">Indeks</a></li>
               <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('master/indeks/nilai?tahun='.date('Y'))?>">Nilai</a></li>
               <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('master/indeks/trends')?>">Trends</a></li>
                
              </ul>
            </div>
          </li>
          
          
          
          
           <?php }?>
            <?php if($this->session->userdata('role') == 1 ){?>
          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="admin">
              <i class="mdi mdi-account-key menu-icon text-info"></i>
              <span class="menu-title">Admin Page</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="admin" style="">
              <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('master/role')?>">Role</a></li>
               <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('master/user')?>">User</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('master/satker')?>">Satker</a></li>
              </ul>
            </div>
          </li>
          <?php }?>
         
           <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#program" aria-expanded="false" aria-controls="program">
              <i class="mdi mdi-library-books menu-icon text-danger"></i>
              <span class="menu-title">Kegiatan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="program" style="">
              <ul class="nav flex-column sub-menu">
              <?php if($this->session->userdata('ver_satker') == '0'){?>
                    
                    <?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 3 || $this->session->userdata('role') == 6){?>
                   <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('satker/wbk/satker/2020')?>">LKE WBK/WBBM</a></li>
                  <?php }else{
                      //reupload wbk  
                      $this->db->select('count(id_reupload_wbk) as status');
                      $this->db->where('id_satker', $this->session->userdata('satker'));
                      $reupload = $this->db->get('wbk_satker_reupload') ;
                      $check_reupload = $reupload->row()->status;
                      //$check_reupload = modules::run('satker/wbk/wbk_reupload');
                            if($check_reupload == '1'){       
                        ?>
                            <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('satker/wbk/area/2020')?>">LKE WBK/WBBM</a></li>
                    <?php }?>
                  <?php }?>
                 
                 
                   <?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 3 || $this->session->userdata('role') == 6){?>
                   <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('satker/pmprb/satker/2020')?>">LKP PMPRB</a></li>
                  <?php }else{?>
                   <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('satker/pmprb/area/2020')?>">LKP RB</a></li>
                  <?php }?>
                  
                   <?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 3 || $this->session->userdata('role') == 6){?>
                   <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('satker/rkt/satker/2020')?>">RKT</a></li>
                  <?php }else{?>
                   <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('satker/rkt/area/2020')?>">RKT</a></li>
                  <?php }?>
                    
                <?php }else{?>
                      <?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 3 || $this->session->userdata('role') == 6){?>
                          <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('satker/wbk/satker/'.$this->session->userdata('tahun').'?satker='.$this->session->userdata('satker'))?>">LKE WBK/WBBM</a></li>
                      <?php }else{?>
                       <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('satker/wbk/area/'.$this->session->userdata('tahun'))?>">LKE WBK/WBBM</a></li>
                      <?php }?>
                <?php }?>
              
              
              </ul>
            </div>
          </li>
          
          <?php if($this->session->userdata('role') != 2){?>
           <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('produk')?>">
              <i class="mdi mdi-file-pdf menu-icon text-success"></i>
              <span class="menu-title">Produk RB</span>
            </a>
          </li>
          <?php }?>
          <?php if($this->session->userdata('role') == 5 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 1){?>
          
          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#laporan" aria-expanded="false" aria-controls="laporan">
              <i class="mdi mdi-email-outline menu-icon text-warning"></i>
              <span class="menu-title">Pelaporan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="laporan" style="">
              <ul class="nav flex-column sub-menu">
               
                <?php if( $this->session->userdata('role') == 2 || $this->session->userdata('role') == 1){?>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('satker/laporan/satker?satker='.$this->session->userdata('satker'))?>">Pelaksanaan RB</a></li>
                <?php }else{ ?>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('satker/laporan')?>">Pelaksanaan RB</a></li>
                <?php }?>
               
             
              </ul>
            </div>
          </li>
     
          <?php }?>
          
           <?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 4){?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('master/kategori')?>">
              <i class="mdi mdi-comment-text menu-icon text-info"></i>
              <span class="menu-title">Kategori</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('master/posts/posts')?>">
              <i class="mdi mdi-comment-text menu-icon text-info"></i>
              <span class="menu-title">Berita RB</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('master/page')?>">
              <i class="mdi mdi-comment-text menu-icon text-info"></i>
              <span class="menu-title">Page</span>
            </a>
          </li>
           
           <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('master/gallery')?>">
              <i class="mdi mdi-file-image menu-icon text-info"></i>
              <span class="menu-title">Gallery Foto</span>
            </a>
          </li>
          <?php }?>
          <?php if($this->session->userdata('ver_satker') == 0){?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('master/video')?>">
              <i class="mdi mdi-video menu-icon text-primary"></i>
              <span class="menu-title">Video</span>
            </a>
          </li>
          <?php }?>
        </ul>
        
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
         
            <?php $this->load->view($content)?>
         
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:<?php echo base_url()?>assets/template/partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 Kemenkumham</span>
            <!--
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Powered by Pusdatin</span>
            -->
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url()?>assets/template/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url()?>assets/template/js/off-canvas.js"></script>
  <script src="<?php echo base_url()?>assets/template/js/hoverable-collapse.js"></script>
  
  <script src="<?php echo base_url()?>assets/template/js/template.js"></script>
 
  <!-- endinject -->
    <!-- js page -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/js/froala_editor.pkgd.min.js"></script>
  <script>
   $( document ).ready(function(){
        base_url = "<?php echo base_url()?>";
        $('.delete').click(function(){
            konfirm = confirm('apakah anda ingin menghapus data ini ?');
            if(konfirm == true){
                <?php
                    if($this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'perubahan'){
                        $url = site_url('master/perubahan/hapus_area_prubahan');
                    }else if($this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'program'){
                        $url = site_url('master/program/hapus_program');
                    }else if($this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'pelaksanaan'){
                        $url = site_url('master/pelaksanaan/hapus_pelaksanaan');
                    }else if($this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'wbk' && $this->uri->segment(3) == 'rincian'){
                        $url = site_url('master/wbk/hapus_detail');
                    }else if($this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'wbk'){
                        $url = site_url('master/wbk/hapus_wbk');
                    }else if($this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'pmprb' && $this->uri->segment(3) == 'rincian'){
                        $url = site_url('master/pmprb/hapus_detail');
                    }else if($this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'pmprb'){
                        $url = site_url('master/pmprb/hapus_pmprb');
                    }else if($this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'rkt'){
                        $url = site_url('master/rkt/hapus_rkt');
                    }else if($this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'satker'){
                        $url = site_url('master/satker/hapus_satker');
                    }else if($this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'user'){
                        $url = site_url('master/user/hapus_user');
                    }else if($this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'role'){
                        $url = site_url('master/role/hapus_role');
                    }else if($this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'video'){
                        $url = site_url('master/video/hapus');
                    }else if($this->uri->segment(1) == 'produk'){
                        $url = site_url('produk/hapus');
                    }else if($this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'posts'){
                        $url = site_url('master/posts/hapus');
                    }else if($this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'gallery'){
                        $url = site_url('master/gallery/unset_gallery');
                    }else if($this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'kategori'){
                        $url = site_url('master/kategori/hapus_kategori');
                    }else if($this->uri->segment(1) == 'master' && $this->uri->segment(3) == 'indekslist'){
                        $url = site_url('master/indeks/remindeks');
                    }else if($this->uri->segment(1) == 'master' && $this->uri->segment(3) == 'nilai'){
                        $url = site_url('master/indeks/remnilai');
                    }else{
                        $url = '';
                    }    
                ?>  
                url = '<?php echo $url ?>';
                id = $(this).attr('data-ref');
                $.post(url,{ref:id}, function(data){
                    if(data == 'reload'){
                        location.reload();
                    }else{
                        $('.row_'+id).remove();  
                    }
                })  
            }else{
                return false;
            }
        })
        
        
        
    
   })
  </script>
   <script>
        $(function(){
            $('.editor').froalaEditor({
                key : 'JA3A1C2A2qB1F1A4C3I1B16B10D3E6D6drC-7vysujmicnH3biA6am==', 
                placeholderText: 'isi kontent artikel', 
                heightMin: 300,
                heightMax: 380,
                tabSpaces: 7,
		         listAdvancedTypes : true,
                tableStyles: {
                    class1: 'Class 1',
                    class2: 'Class 2'
                  },
                tableColors: ['#61BD6D', '#1ABC9C', '#54ACD2', 'REMOVE'],
                toolbarButtons: ['bold', 'italic', 'underline', 'align', 'formatOL', 'formatUL', 'indent', 'outdent', 'undo', 'redo','insertTable','clearFormatting']
            }) 
        });
  </script>
  <!--custom js -->
  <?php if(!empty($js)){
        foreach($js as $js_re){
            echo $js_re;
        }
    }?>
    
    
    <?php if($this->uri->segment(1) == 'master'){?>
        <script>
             $('#satker_pusat').treeview({
        debug : true,
        data : ['links', 'Do WHile loop']
    });
    
       $('#satker_kanwil').treeview({
        debug : true,
        data : ['links', 'Do WHile loop']
    });


    $('.check_all').click(function(){
        parent = $(this).data('ref');
        check = $('.'+parent+"_0").prop('checked');
        if(check == true){
            $('.'+parent).prop('checked', true);
        }
        else{
            $('.'+parent).prop('checked', false);
        }
    })

        </script>
    <?php }?>
    
    <?php if($this->uri->segment(1) == 'dashboard'){ ?>
        <script>
        $(function(){
              var doughnutPieData2 = {
                datasets: [{
                  <?php
                    $total_lengkap =  modules::run('dashboard/pmprb_lengkap_nasional');
                  ?>      
                  data: [<?php echo $total_lengkap?>, <?php echo 100-$total_lengkap?>],
                  backgroundColor: [
                  'rgba(154, 18, 199, 0.5)',
                  'rgba(150, 242, 207, 0.5)',
                  ],
                  borderColor: [
                  'rgba(154, 18, 199, 1)',
                   'rgba(150, 242, 207, 0.5)',
                  ],
                }],
            
                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                  
                 
                  'Lengkap',
                   'Belum Lengkap',
                ]
              };
              
              
              
              var doughnutPieOptions = {
                responsive: true,
                animation: {
                  animateScale: true,
                  animateRotate: true
                }
              };
            
            if ($("#doughnutChart").length) {
                var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
                var doughnutChart = new Chart(doughnutChartCanvas, {
                  type: 'doughnut',
                  data: doughnutPieData2,
                  options: doughnutPieOptions
                });
              }
             var doughnutPieDataWbk = {
                datasets: [{
                  <?php
                    $total_lengkap =  modules::run('dashboard/wbk_lengkap_nasional');
                  ?>      
                  data: [<?php echo $total_lengkap?>, <?php echo 100-$total_lengkap?>],
                  backgroundColor: [
                    'rgba(255, 0, 13, 0.5)',
                    'rgba(108, 201, 235, 0.5)',
                  
                  ],
                  borderColor: [
                     'rgba(255, 0, 13, 0.5)',
                    'rgba(108, 201, 235, 0.5)',
                   
                  ],
                }],
            
                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                  
                 
                  'Lengkap',
                   'Belum Lengkap',
                ]
              }; 
             if ($("#doughnutChartwbk").length) {
                var doughnutChartCanvas = $("#doughnutChartwbk").get(0).getContext("2d");
                var doughnutChart = new Chart(doughnutChartCanvas, {
                  type: 'doughnut',
                  data: doughnutPieDataWbk,
                  options: doughnutPieOptions
                });
              } 
              
              
              //rkt
              var doughnutPieDataRkt = {
                datasets: [{
                  <?php
                    $total_lengkap =  modules::run('dashboard/rkt_lengkap_nasional');
                  ?>      
                  data: [<?php echo $total_lengkap?>, <?php echo 100-$total_lengkap?>],
                  backgroundColor: [
                    'rgba(0, 0, 0, 0.5)',
                    'rgba(195, 108, 235, 0.5)'
                  
                  ],
                  borderColor: [
                    'rgba(0, 0, 0, 0.5)',
                    'rgba(195, 108, 235, 0.5)'
                   
                  ],
                }],
            
                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                  
                 
                  'Lengkap',
                   'Belum Lengkap',
                ]
              }; 
             if ($("#doughnutChartrkt").length) {
                var doughnutChartCanvas = $("#doughnutChartrkt").get(0).getContext("2d");
                var doughnutChart = new Chart(doughnutChartCanvas, {
                  type: 'doughnut',
                  data: doughnutPieDataRkt,
                  options: doughnutPieOptions
                });
              }
              
          })
        </script>
        
    <?php } ?>
     <script>
        $(document).on('click', '.produk_', function(){
           
            url = "<?php echo site_url('home/get_produk')?>";
            ref = $(this).data('ref');
            $('.loader_').show();
            $('.pills-'+ref).hide();
            $.post(url,{ref:ref}, function(data){
                $('.del_tab').remove();
                $('.loader_').hide();
                $('.pills-'+ref).show();
                $('.pills-'+ref).html(data);
            })
            
        })
        </script>
        
        <?php if($this->uri->segment('3') == 'trends'){?>
    <script src="<?php echo base_url()?>assets/chart/Chart.bundle.js"></script>
    <script src="<?php echo base_url()?>assets/chart/utils.js"></script>
    
    	<script>
            function getRandomColor() {
              var letters = '0123456789ABCDEF';
              var color = '#';
              for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
              }
              return color;
            }
            
            <?php foreach($indeks->result() as $dt_indeks){ ?>
                    <?php
                        $check = modules::run('master/indeks/check_trends', $dt_indeks->id_indeks);
                        if($check > 0){ ?>
                        drawchart(<?php echo $dt_indeks->id_indeks?>);
                    <?php }; ?>
                    
                        
                <?php }?>
            
            function drawchart(val){

                url= "<?php echo site_url('master/indeks/gettrend')?>";
                    val = val
                    color = getRandomColor;
                    $.post(url,{val:val}, function(data){
                       trend= JSON.parse(data);  
                       var config = {
            			type: 'line',
            			data: {
            				labels: trend.tahun,
            				datasets: [{
            				    label: 'Indeks '+trend.indeks,
                				data: trend.nilai,
            					backgroundColor: color,
            					borderColor: color,
            					
            					fill: false,
            				},]
            			},
            			options: {
            				responsive: true,
            				title: {
            					display: true,
            					text: ''
            				},
            				tooltips: {
            					mode: 'index',
            					intersect: false,
            				},
            				hover: {
            					mode: 'nearest',
            					intersect: true
            				},
            				scales: {
            					x: {
            						display: true,
            						scaleLabel: {
            							display: true,
            							labelString: 'tahun'
            						}
            					},
            					y: {
            						display: true,
            						scaleLabel: {
            							display: true,
            							labelString: 'nilai'
            						}
            					}
            				}
            			}
            		};
                    var grapharea = document.getElementById(""+trend.path+"").getContext("2d");
                    
    
                    var myChart = new Chart(grapharea, config);
                    	
                    myChart.destroy();
                    
                    myChart = new Chart(grapharea, config);
                })
            }
            
            $('.tindeks').change(function(){
                url= "<?php echo site_url('master/indeks/gettrend')?>";
                val = $(this).val();
                color = getRandomColor;
                $.post(url,{val:val}, function(data){
                   trend= JSON.parse(data);  
                   var config = {
        			type: 'line',
        			data: {
        				labels: trend.tahun,
        				datasets: [{
        				    label: 'Indeks '+trend.indeks,
            				data: trend.nilai,
        					backgroundColor: color,
        					borderColor: color,
        					
        					fill: false,
        				},]
        			},
        			options: {
        				responsive: true,
        				title: {
        					display: true,
        					text: ''
        				},
        				tooltips: {
        					mode: 'index',
        					intersect: false,
        				},
        				hover: {
        					mode: 'nearest',
        					intersect: true
        				},
        				scales: {
        					x: {
        						display: true,
        						scaleLabel: {
        							display: true,
        							labelString: 'tahun'
        						}
        					},
        					y: {
        						display: true,
        						scaleLabel: {
        							display: true,
        							labelString: 'nilai'
        						}
        					}
        				}
        			}
        		};
                var grapharea = document.getElementById(""+trend.path+"").getContext("2d");
                

                var myChart = new Chart(grapharea, config);
                	
                myChart.destroy();
                
                myChart = new Chart(grapharea, config);


                })
            })
       
            
    
    	</script>
    
    
    
    <?php }?>

  
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
  <!-- 
  <?php //print_r($this->session->all_userdata());?>
  
  -->
</body>

</html>
