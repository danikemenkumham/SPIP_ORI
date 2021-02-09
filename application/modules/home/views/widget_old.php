           
                        <?php //widget sidebar?>
                        <?php echo modules::run('home/get_berita_widget',5)?>
                                
                          
                        <div class="single-widget social-widget">
                            <h4 class="widget-title">Social Links</h4>
                            <ul>
                                <li>
                                    <a target="_blank" href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="#">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="#">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                        <?php //video widget?>
                         <?php echo modules::run('home/get_video_widget',5)?>
                        <?php //gallery widget?>
                         <?php echo modules::run('home/get_galley_widget', 6)?>
                        <div class="single-widget archive-widget">
                            <h4 class="widget-title">Archive</h4>
                            <ul>
                                <li class="d-flex justify-content-between">
                                    <a href="#">January 2018</a>
                                    <span>(29)</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <a href="#">February 2018</a>
                                    <span>(23)</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <a href="#">March 2018</a>
                                    <span>(43)</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <a href="#">April 2018</a>
                                    <span>(12)</span>
                                </li>
                            </ul>
                        </div>
                        <div class="single-widget banner-widget">
                            <img class="img-fluid" src="img/banner.jpg" alt="">
                        </div>
                        <div class="single-widget tags-widget">
                            <h4 class="widget-title">Tags</h4>
                            <ul>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Tech</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Reviews</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Music</a></li>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Gadget</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Gaming</a></li>
                            </ul>
                        </div>