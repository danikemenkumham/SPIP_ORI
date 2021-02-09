        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Komponen <?php echo strtoupper($this->uri->segment(4)) ?></a></h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post">
                    <div class="form-group">
                      <label>Indeks</label>
                      <input name="indeks_dum" disabled="" type="text" value="<?php echo strtoupper($this->uri->segment(4))?>" class="form-control " >
                        <input type="hidden" name="ref" value="<?php echo $komponen->row()->id_komponen;?>" />
                    </div>
                    
                    <div class="form-group">
                      <label>Tahun</label>
                      <div class="inp-append">
                       <select name="tahun" class="form-control" required>
                        <option value="">-- Pilih Tahun --</option>
                        <?php
                            $tahun = array('2017','2018','2019','2020');
                            foreach($tahun as $dt_tahun){
                               if($dt_tahun == $komponen->row()->tahun){
                                $selected = 'selected="selected"';
                               }else{
                                $selected = '';
                               }
                               echo ' <option value="'.$dt_tahun.'" '.$selected.' >'.$dt_tahun.'</option>';
                            }
                        ?>
                       
                      
                       </select>
                      </div>
                    
                    </div>
                    
                    <div class="form-group">
                      <label>Komponen</label>
                      <div class="inp-append">
                      
                        <input required name="komponen" value="<?php echo $komponen->row()->komponen;?>" type="text" class="form-control mb-3">
                      </div>
                    
                    </div>
                    <div class="form-group">
                      <label>Bobot</label>
                      <div class="inp-append">
                        <input required name="bobot" value="<?php echo $komponen->row()->bobot;?>" type="number" class="form-control mb-3">
                      </div>
                    
                    </div>
                    
                    <div class="form-group">
                      <label>Nilai</label>
                      <div class="inp-append">
                        <input required name="nilai" value="<?php echo $komponen->row()->nilai;?>" type="text" class="form-control mb-3">
                      </div>
                    
                    </div>
                    
                    <hr />
                    
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>