<section class="blog-lists-section ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0 mb-2">
                        <h3 class="p-3 text-danger"><i class="ti-comment-alt"></i> &nbsp;Gallery RB</h3>
                    </div>
                    <div class="blog-details">
                        <div class="post-details">
                            <ul class="tags">
                                <li><a href="<?php echo base_url()?>">Home</a></li>
                                <li><a href="<?php echo current_url()?>">Gallery</a></li>
                            </ul>
                            <div class="row mt-4">
                               <?php foreach($gallery->result() as $dt_gallery){?>
                                <div class="col-md-6 mt-3 ">
                                    <div class="card">
                                        <a href="<?php echo site_url('home/gallery_r/'.$dt_gallery->id_gallery.'/'.$dt_gallery->slug)?>">
                                        <img class="img-fluid" src="<?php echo modules::run('home/get_featured_photo', $dt_gallery->id_gallery)?>" />
                                        
                                        <h5 class=" p-3"><?php echo $dt_gallery->nama_gallery?></h5>
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