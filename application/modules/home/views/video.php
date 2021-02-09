<section class="blog-lists-section ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0 mb-2">
                        <h3 class="p-3 text-danger"><i class="ti-comment-alt"></i> &nbsp;Video RB</h3>
                    </div>
                    <div class="blog-details">
                        <div class="post-details">
                            <ul class="tags">
                                <li><a href="<?php echo base_url()?>">Home</a></li>
                                <li><a href="<?php echo current_url()?>">Video</a></li>
                            </ul>
                            <div class="row mt-4">
                               <?php foreach($video->result() as $dt_video){?>
                               <?php
                                    $url = $dt_video->url;
                                    $video_id = explode('/', $url);
                                    
                                ?>
                                <div class="col-md-6 mt-3 ">
                                    <div class="card">
                                        <a href="<?php echo site_url('home/video_r/'.$dt_video->id_video.'/'.$dt_video->seo_url)?>">
                                           <img class="main-vid" style="width: 100%;"  src="https://img.youtube.com/vi/<?php echo $video_id[sizeof($video_id)-1];?>/0.jpg " />
                                          
                                         <h5 class="p-3 text-center">
                                            <?php echo $dt_video->caption?>
                                            <hr />
                                            <small class="text-danger "><?php echo ucwords(strtolower($dt_video->nama))?></small>
                                        </h5>
                                        </a>
                                    </div>
                                   
                                </div>
                                <?php }?>
                            </div>
                            
                            
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