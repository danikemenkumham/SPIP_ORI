<section class="blog-lists-section ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0 mb-2">
                        <h3 class="p-3 text-danger"><i class="ti-comment-alt"></i> &nbsp;Berita RB</h3>
                    </div>
                    <div class="blog-details">
                        <div class="post-details">
                            <ul class="tags">
                                <li><a href="<?php echo base_url()?>">Home</a></li>
                                <li><a href="<?php echo current_url()?>">Berita</a></li>
                            </ul>
                            
                            <?php foreach($berita->result() as $dt_berita){?>
                            <div class="mt-5">
                                <div class="media">
                                  <div class="row">
                                    <div class="col-md-2">
                                        <img class="img-fluid rounded"  src="<?php echo $dt_berita->path_featured_image?>" class="mr-3" alt="<?php echo $dt_berita->title?>">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="media-body">
                                            <a href="<?php echo site_url('home/post_r/'.$dt_berita->id_post.'/'.$dt_berita->seo_url)?>"><h5 class="mt-0"><?php echo $dt_berita->title?></h5></a>
                                            <p class="mt-2">
                                            <?php
                                                $pos=strpos($dt_berita->body, ' ', 200);
                                                echo substr($dt_berita->body,0,$pos ); 
                                            
                                            ?>
                                            <br />
                                            <small><?php echo $dt_berita->created?></small>
                                            </p>
                                        </div>
                                    </div>
                                  </div>
                                  
                                  
                                </div>
                            
                            </div>
                            <hr />
                            <?php }?>
                            <nav>
                                 <?php echo $this->pagination->create_links() ?>
                            </nav>
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