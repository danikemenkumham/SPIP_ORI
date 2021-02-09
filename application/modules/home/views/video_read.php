<section class="blog-lists-section ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details pb-4">
                        <div class="post-details">
                              <ul class="tags">
                                <li><a href="<?php echo base_url()?>">Home</a></li>
                                <li><a href="<?php echo site_url('home/video')?>">Video</a></li>
                                 <li><a href="<?php echo current_url()?>"><?php echo ucwords($video->row()->caption);?></a></li>
                            </ul>  
                            
                            <div class="container-video my-5">
                                <iframe class="video" style="border-radius: 15px;"  src="<?php echo $video->row()->url?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                             
                              <p class="h5">
                                <?php echo $video->row()->caption?>
                                 <hr />
                                <span class="text-danger"><?php echo ucwords(strtolower($video->row()->nama))?></span>
                            </p>
                            
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