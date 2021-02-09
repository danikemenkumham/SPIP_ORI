<section class="blog-lists-section ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details">
                        <div class="post-thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="<?php echo $post->row()->path_featured_image?>" alt="">
                        </div>
                        <div class="post-details">
                            <ul class="tags">
                                <li><a href="<?php echo base_url()?>">Home</a></li>
                                <li><a href="#">Page</a></li>
                            </ul>
                           
                                <h1 class="mt-3 mb-3"><?php echo ucwords($post->row()->title)?></h1>
                       
                            
                          <?php echo $post->row()->body?>
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