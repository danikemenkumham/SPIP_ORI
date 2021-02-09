<section class="blog-lists-section ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details">
                       
                        <div class="post-details">
                            <div id="demo" class="carousel slide" data-ride="carousel">
                            
                              <!-- Indicators -->
                              <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                                <li data-target="#demo" data-slide-to="2"></li>
                              </ul>
                            
                              <!-- The slideshow -->
                              <div class="carousel-inner">
                                <?php $no =1; foreach($gallery->result() as $dt_gallery){?>
                                <div class="carousel-item <?php echo $no == 1 ? 'active':'';?>">
                                  <img src="<?php echo$dt_gallery->path_photo ?>" alt="<?php echo$dt_gallery->caption ?>">
                                  <p class="text-center mt-4">
                                <?php echo $dt_gallery->caption;?>
                                </p>  
                                </div>
                                
                                <?php $no++; }?>
                               
                              </div>
                            
                              <!-- Left and right controls -->
                              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                              </a>
                              <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                              </a>
                            
                            </div>
                           
                        </div>
                    </div>

                  
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-wrap">
                        <?php echo modules::run('home/widget')?>
                    </div>
                </div>
            </div>
        </div>
    </section>