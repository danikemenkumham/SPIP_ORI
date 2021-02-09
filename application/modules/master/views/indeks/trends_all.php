        <div class="container-fluid">
          <div class="card mb-4">
            
            <div class="card-body text-center">
               <h4 class=" align-middle">Trends Reformasi Birokrasi Kemenkumham</h4> 
              
               <hr />
              <div class="row">
              
                    <?php foreach($indeks->result() as $dt_indeks){ ?>
                        <?php
                            $check = modules::run('master/indeks/check_trends', $dt_indeks->id_indeks);
                            if($check > 0){ ?>
                             <div class="col-md-6">
                                <canvas id="<?php echo $dt_indeks->url_path?>"></canvas>
                            </div>
                        <?php }; ?>
                    
                    
                    
                <?php }?>
              </div>
              
            </div>
          </div>

        </div>