<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
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
    <!-- Author Meta -->
    <meta name="author" content="">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>ERB - Kemenkumham RI</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700" rel="stylesheet">

    <!--
CSS
============================================= -->

    <link rel="stylesheet" href="<?php echo base_url()?>assets/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/frontend/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/frontend/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/frontend/css/responsive.css">
     <link rel="stylesheet" href="<?php echo base_url()?>assets/frontend/css/custom.css">
<style>
.bg-h{
    background-color: #252459;
}
</style>
</head>

<body <?php echo $this->uri->segment(2) == 'dashboard' ? "onload='get_dash()'":"";?> >

    <!-- Start header section -->
    <header class="header-area <?php echo $this->uri->segment(1) == TRUE ? 'bg-h':''?>" id="header-area"  >
        <div class="dope-nav-container" style="z-index: 999999;">
            <div class="container">
                <div class="row">
                    <!-- dope Menu -->
                    <nav class="dope-navbar justify-content-between p-0" id="dopeNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="<?php echo base_url() ?>" >
                                <img style="width: 300px;"  src="<?php echo base_url()?>assets/image/logo_new.png"/>
                                
                        </a>

                        <!-- Navbar Toggler -->
                        <div class="dope-navbar-toggler">
                            <span class="navbarToggler">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>

                        <!-- Menu -->
                        <div class="dope-menu">

                            <!-- close btn -->
                            <div class="dopecloseIcon">
                                <div class="cross-wrap">
                                    <span class="top"></span>
                                    <span class="bottom"></span>
                                </div>
                            </div>

                            <!-- Nav Start -->
                            <div class="dopenav">
                                <ul id="nav">
                                    <li>
                                        <a href="<?php echo site_url()?>">HOME</a>
                                    </li>
                                   
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          REFORMASI BIROKRASI
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                         <a class="dropdown-item text-dark" href="<?php echo site_url('home/page_r/sejarah-rb')?>">SEJARAH RB</a>
                                         <a class="dropdown-item text-dark" href="<?php echo site_url('home/page_r/roadmap-rb')?>">ROAD MAP RB</a>
                                         <a class="dropdown-item text-dark" href="<?php echo site_url('home/page_r/pmprb')?>">PMPRB</a>
                                         <a class="dropdown-item text-dark" href="<?php echo site_url('home/produk')?>">PRODUK RB</a>
                                        </div>
                                      </li>
                                   <li>
                                        <a href="<?php echo site_url('home/dashboard')?>">DASHBOARD</a>
                                    </li>
                                   <li>
                                        <a href="<?php echo site_url('home/capaian')?>">CAPAIAN RB</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('home/page_r/wbk-wbbm')?>"><img width="75px" src="<?php echo base_url()?>assets/image/siapzi.png" /></a>
                                    </li>
                                
                                    <li>
                                        <a href="<?php echo site_url('login')?>">LOGIN</a>
                                    </li>
                                </ul>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Start header section -->
    <?php if($this->uri->segment(1) == FALSE){?>
    <section class="banner-section relative section-gap-half header" id="banner-section">
       <div class="wave">
            <svg class="nectar-shape-divider" fill="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">
                <path d="M 1000 299 l 2 -279 c -155 -36 -310 135 -415 164 c -102.64 28.35 -149 -32 -232 -31 c -80 1 -142 53 -229 80 c -65.54 20.34 -101 15 -126 11.61 v 54.39 z"></path>
                <path d="M 1000 286 l 2 -252 c -157 -43 -302 144 -405 178 c -101.11 33.38 -159 -47 -242 -46 c -80 1 -145.09 54.07 -229 87 c -65.21 25.59 -104.07 16.72 -126 10.61 v 22.39 z"></path>
                <path d="M 1000 300 l 1 -230.29 c -217 -12.71 -300.47 129.15 -404 156.29 c -103 27 -174 -30 -257 -29 c -80 1 -130.09 37.07 -214 70 c -61.23 24 -108 15.61 -126 10.61 v 22.39 z"></path>
            </svg>
        </div>
        
        
       <div class="container">
            <div class="row align-items-center justify-content-md-center">
                <div class="col-md-6 banner-left  banner ">

                    <h2 class="text-uppercase ">Selamat Datang, </h2>
                    <p class=" h4 mt-4 mb-3">
                        Portal Reformasi Birokrasi <br/> Kementerian Hukum dan Hak Asasi Manusia <br/> Republik Indonesia <br />
                        
                    </p>
                  
                </div>
                <div class="col-md-6 banner-right text-center">
                       <div class="capaian-slide owl-carousel" id="capaian-slide">
                        <div class="single-testimonial item">
                            <a href="<?php echo site_url('home/capaian')?>">
                            <img class="img-fluid rounded" src="<?php echo base_url()?>uploads/capaian/grafik_new.png" alt="">
                            </a>
                        </div>
                         
                         <div class="single-testimonial item">
                         <a href="<?php echo site_url('home/capaian')?>">
                            <img class="img-fluid rounded" src="<?php echo base_url()?>uploads/capaian/m_wbk_new.png" alt="">
                            </a>
                        </div>
                        
                       
                    </div>
                </div>
                
            </div>
        </div>
       
       
    </section>
    <?php }?>
    <div <?php echo $this->uri->segment(1) == TRUE ? 'style="margin-top:100px";':''?>>
    <?php $this->load->view($content)?>
    </div>
   
   
    <!-- Start download section -->
    <section class="download-section section-gap-half" id="download-section">
        <div class="container">
            <div class="row download-wrap justify-content-md-center">
               <div class="col-md-8">
                    <div class="row justify-items-between align-items-center">
                        <div class="col-2 ">
                            <img class="img-fluid" src="<?php echo base_url()?>assets/image/egov.png" alt="">
                        </div>
                        <div class="col-2">
                            <img class="img-fluid" src="<?php echo base_url()?>assets/image/always.png" alt="">
                        </div>
                        <div class="col-2">
                            <img class="img-fluid" src="<?php echo base_url()?>assets/image/ref-hukum.png" alt="">
                        </div>
                        <div class="col-2">
                            <img class="img-fluid" src="<?php echo base_url()?>assets/image/wbk.png" alt="">
                        </div>
                          <div class="col-2">
                            <img class="img-fluid" src="<?php echo base_url()?>assets/image/icare.png" alt="">
                        </div>
                         <div class="col-2">
                            <img class="img-fluid" src="<?php echo base_url()?>assets/image/EG.jpg" alt="">
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <!-- End download section -->

    <!-- Start footer section -->
    <footer class="footer-section section-gap-half">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 footer-left">
                  
                    <p class="copyright-text">&copy; 2019  &nbsp;
                         <!--<img style="width: 125px;" class="img-fluid" src="<?php echo base_url()?>assets/image/pusdatin.png" />  &nbsp; |-->  Kemenkumham RI
                    </p>
                </div>
                <div class="col-lg-5">
                       
                    <ul class="footer-menu">
                        <li>
                            <a href="<?php echo base_url()?>">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('home/page_r/rb')?>">TENTANG RB</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('home/page_r/pmprb')?>">PMPRB</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('home/page_r/wbk-wbbm')?>"><img src="<?php echo base_url()?>assets/image/siapzi.png" width="75px" /></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('home/page_r/produk-rb')?>">PRODUK RB</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer section -->

    <div class="scroll-top">
        <i class="ti-angle-up"></i>
    </div>

    <!--
JS
============================================= -->
    <script src="<?php echo base_url()?>assets/frontend/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/js/vendor/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/js/jquery.easing.1.3.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/js/jquery.parallax-scroll.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/js/dopeNav.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/js/waypoints.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/js/jquery.stellar.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/js/main.js"></script>
    
    <?php if($this->uri->segment(2) == 'dashboard'){?>
    <script>
        $(document).on('click', '.ikm_modal', function(){
            ref = $(this).data('ref');
            url = "<?php echo site_url('home/get_modal')?>";
            tipe = 'ikm';
            $('.loader').show();
            $('.con-modal').hide();
            $.post(url,{ref:ref,tipe:tipe},function(data){
                $('.loader').hide();
                 $('.con-modal').show();
                $('.con-modal').html(data);
            })
        })
        
        
        $(document).on('click', '.ipk_modal', function(){
            ref = $(this).data('ref');
            url = "<?php echo site_url('home/get_modal')?>";
            tipe = 'ipk';
             $('.loader').show();
            $('.con-modal').hide();
            $.post(url,{ref:ref,tipe:tipe},function(data){
                $('.loader').hide();
                $('.con-modal').show();
                $('.con-modal').html(data);
            })
        })
        
        $(document).on('click', '.integritas_modal', function(){
            ref = $(this).data('ref');
            url = "<?php echo site_url('home/get_modal_integritas')?>";
            $('.loader').show();
            $('.con-modal').hide();
            $.post(url,{ref:ref,},function(data){
                $('.loader').hide();
                 $('.con-modal').show();
                $('.con-modal').html(data);
            })
        })
        
        $(document).on('click', '.ikm-pil', function(){
            url = "<?php echo site_url('home/get_survey')?>";
            $('.loader_').show();
            $('.pills-ikm').hide();
            tipe = 'ikm';
            $.post(url,{tipe:tipe}, function(data){
                $('.loader_').hide();
                $('.pills-ikm').show();
                $('.pills-ikm').html(data);
            })
            
        })
         $(document).on('click', '.ipk-pil', function(){
            url = "<?php echo site_url('home/get_survey')?>";
            $('.loader_').show();
            $('.pills-ipk').hide();
            tipe = 'ipk';
            $.post(url,{tipe:tipe}, function(data){
                $('.loader_').hide();
                $('.pills-ipk').show();
                $('.pills-ipk').html(data);
            })
            
        })
        
        $(document).on('click', '.integritas-pil', function(){
            url = "<?php echo site_url('home/get_survey')?>";
            $('.loader_').show();
            $('.pills-integritas').hide();
            tipe = 'integritas';
            $.post(url,{tipe:tipe}, function(data){
                $('.loader_').hide();
                $('.pills-integritas').show();
                $('.pills-integritas').html(data);
            })
            
        })
        
        
        $(document).on('click', '.wbk-pil', function(){
            url = "<?php echo site_url('home/get_dashboard_wbk')?>";
            $('.loader_').show();
            $('.pills-wbk').hide();
            $.get(url,function(data){
                $('.loader_').hide();
                $('.pills-wbk').show();
                $('.pills-wbk').html(data);
                
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
              
             var doughnutPieOptions = {
                responsive: true,
                animation: {
                  animateScale: true,
                  animateRotate: true
                }
              };
              
             if ($("#doughnutChartwbk").length) {
                var doughnutChartCanvas = $("#doughnutChartwbk").get(0).getContext("2d");
                var doughnutChart = new Chart(doughnutChartCanvas, {
                  type: 'doughnut',
                  data: doughnutPieDataWbk,
                  options: doughnutPieOptions
                });
              } 
              
              
                
                
            })
            
        })
        
        $(document).on('click', '.rkt-pil', function(){
            url = "<?php echo site_url('home/get_dashboard_rkt')?>";
            $('.loader_').show();
            $('.pills-rkt').hide();
            $.get(url,function(data){
                $('.loader_').hide();
                $('.pills-rkt').show();
                $('.pills-rkt').html(data);
                
                var doughnutPieDataRkt = {
                datasets: [{
                  <?php
                    $total_lengkap =  modules::run('dashboard/rkt_lengkap_nasional');
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
              
             var doughnutPieOptions = {
                responsive: true,
                animation: {
                  animateScale: true,
                  animateRotate: true
                }
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
            
        })
    </script>
     
     <script src='<?php echo base_url()?>assets/template/vendors/chart.js/Chart.min.js'/></script>
     <script src='<?php echo base_url()?>assets/template/js/chart.js'/></script>    
    
    <script>
       
          
          function get_dash(){
           url = "<?php echo site_url('home/get_dashboard_pmprb')?>";
            $('.loader_').show();
            $('.pills-pmprb').hide();
            tipe = 'integritas';
            $.post(url,{tipe:tipe}, function(data){
                $('.loader_').hide();
                $('.pills-pmprb').show();
                $('.pills-pmprb').html(data);
                
                
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
            
            if ($("#doughnutChart").length){
                var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
                var doughnutChart = new Chart(doughnutChartCanvas, {
                  type: 'doughnut',
                  data: doughnutPieData2,
                  options: doughnutPieOptions
                });
              }
                
                
                
            })
        }
          
        </script>
        
    <?php }?>
    <?php if($this->uri->segment(2) == 'produk'){?>
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
    <?php }?>
</body>

</html>
