<section class="feature-section " id="feature-section">
        <div class="container">
            <div class="row align-items-center feature-wrap">
                
                <div class="col-lg-12">
                    <h1 class="text-center mb-5">
                        Reformasi Birokrasi
                    </h1>
                    <div class="row features-wrap">
                        <div class="col-md-3">
                            <div class="single-feature relative">
                                <div class="overlay overlay-bg"></div>
                                <a href="<?php echo site_url('home/page_r/sejarah-rb')?>">
                                    <span class="ti-book"></span>
                                    <h3>Sejarah RB</h3>
                                    <p>
                                       Reformasi birokrasi   merupakan upaya untuk  pembaharuan dan perubahan mendasar terhadap sistem penyelenggaraan pemerintahan
                                    </p>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="single-feature relative">
                                
                                <div class="overlay overlay-bg"></div>
                                <a href="<?php echo site_url('home/page_r/roadmap-rb')?>">
                                    <span class="ti-map"></span>
                                    <h3>RoadMap RB</h3>
                                    <p>
                                        Acuan dalam pelaksanaan reformasi birokrasi oleh 11 unit eselon I di Kementerian Hukum dan HAM, baik tingkat pusat mau pun daerah
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="single-feature relative">
                                <div class="overlay overlay-bg"></div>
                                <a href="<?php echo site_url('home/page_r/pmprb')?>">
                                    <span class="ti-ruler-alt"></span>
                                    <h3>PMPRB</h3>
                                    <p>
                                       upaya melakukan pembaharuan dan perubahan mendasar terhadap sistem penyelenggaraan pemerintahan
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="single-feature relative">
                                <div class="overlay overlay-bg"></div>
                                <a href="<?php echo site_url('home/page_r/wbk-wbbm')?>">
                                      <img class="mt-3" width="100px" src="<?php echo base_url()?>assets/image/siapzi-1.png" />
                                    <h3 class="mt-4">Zona Integritas</h3>
                                    <p>
                                        mewujudkan good <i>governance</i> dan <i>clean government</i> menuju aparatur Kementerian Hukum dan HAM yang bersih dan bebas dari KKN
                                    </p>
                                </a>
                            </div>
                        </div>
                      
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
        <section class="testimonial-section " id="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 testimonial-left">
                    <a href="<?php echo site_url('home/berita')?>"><h2 class="text-danger">Berita Terbaru RB</h2></a>
                    <p>
                        informasi terkini reformasi birokrasi di seluruh lingkungan kementerian hukum dan ham
                    </p>
                </div>
                <div class="col-lg-9 testimonial-right">
                    <div class="testimonial-carusel owl-carousel" id="testimonial-carusel">
                        
                        <?php foreach($post->result() as $dt_post){?>
                        <div class="single-testimonial item">
                            <div class="single-blog-post">
                            <div class="post-details">
                               
                                <div class="row">
                                    <div class="col-md-12" >
                                         <div class="img-post" style="background-image: url('<?php echo $dt_post->path_featured_image?>');">
                                          <img src="<?php echo $dt_post->path_featured_image?>" style="visibility: hidden;" />
                                         </div>
                                    </div>
                                    <div class="col-md-12 text-left">
                                        <a href="<?php echo site_url('home/post_r/'.$dt_post->id_post.'/'.$dt_post->seo_url)?>">
                                            <?php echo $dt_post->title;?>
                                        </a>
                                  
                                         <div class="user-details d-flex align-items-center">
                                                <p><small><?php echo $dt_post->created?></small></p>
                                        </div>
                                       
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        </div>
                        <?php }?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
        <!-- Start screenshot section -->
    <section class="screenshot-section">
        <div class="container">
            <div class="section-title">
                <a href="<?php echo site_url('home/video')?>"><h2 class="text-center text-danger">Video RB</h2></a>
            </div>
            <div class="row">
                <div class=" col-md-12">
                <div class="screenshot_slider owl-carousel" id="screenshot-carusel">
                    <?php foreach($video->result() as $dt_video){?>
                     <?php
                        $url = $dt_video->url;
                        $video_id = explode('/', $url);
                        
                    ?>
                    <div class="item">
                       <a href="<?php echo site_url('home/video_r/'.$dt_video->id_video.'/'.$dt_video->seo_url)?>">
                           <img class="main-vid" src="https://img.youtube.com/vi/<?php echo $video_id[sizeof($video_id)-1];?>/0.jpg " />
                           <img class="cover-vid" src="<?php echo base_url()?>assets/frontend/img/play.png" />
                       </a>
                    </div>
                    <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    
    <section class="feature-section section-gap-half gallery" id="feature-section">
        <div class="container">
            <div class="row feature-wrap">
               
                <div class="col-lg-9">
                    <div class="row features-wrap">
                        
                        <?php foreach($gallery->result() as $dt_gallery){?>
                        <div class="col-md-6">
                            <a href="<?php echo site_url('home/gallery_r/'.$dt_gallery->id_gallery.'/'.$dt_gallery->slug)?>">
                            <div class="single-feature item" style="background-image: url('<?php echo modules::run('home/get_featured_photo', $dt_gallery->id_gallery)?>');">
                             
                                <h5><?php echo $dt_gallery->nama_gallery?></h5>
                              </a>  
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                
                 <div class="col-lg-3 header-left ">
                    <a href="<?php  echo site_url('home/gallery')?>">
                        <h2 class="text-danger"> 
                            Gallery RB
                        </h2>
                    </a>
                     <p>
                        kegiatan rb di lingkungan kementerian hukum dan ham
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    

    <section class="blog-lists-section ">
        <div class="container">
            <div class="sidebar-wrap ">
                    <div class="row">
                          <div class="col-md-4">
                               <?php echo modules::run('home/get_produk_widget',5)?>
                            </div> 
                        </div> 
                        
                         <div class="col-md-4">  
                             <?php echo modules::run('home/get_berita_widget',5,1)?>
                        </div>

                            <div class="col-md-4">
                                 <?php echo modules::run('home/get_galley_widget', 6)?>
                            </div>
              
                       
                    </div>
               
            </div>
        </div>
    </section>
   
   
