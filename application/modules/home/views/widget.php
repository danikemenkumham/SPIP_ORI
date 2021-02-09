           
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
                        <!--
                        <div class="single-widget banner-widget">
                            <img class="img-fluid" src="img/banner.jpg" alt="">
                        </div>
                        -->
                       