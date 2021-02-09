        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Nilai RB</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post">
                    <div class="form-group">
                      <label>Indeks</label>
                      <select class="form-control" name="indeks" required>
                            <option value="">-- Pilih Indeks -- </option>
                            <?php foreach($indeks->result() as $dt_indeks){?>
                                <option value="<?php echo $dt_indeks->id_indeks?>"><?php echo $dt_indeks->indeks?></option>
                            <?php };?>
                      </select>  
                    </div>
                    
                    <div class="form-group">
                      <label>Tahun</label>
                      <div class="inp-append">
                       <select name="tahun" class="form-control" required>
                        <option value="">-- Pilih Tahun --</option>
                        <?php
                            $tahun = array('2016','2017','2018','2019','2020');
                            foreach($tahun as $dt_tahun){
                             
                               echo ' <option value="'.$dt_tahun.'">'.$dt_tahun.'</option>';
                            }
                        ?>
                       </select>
                      </div>
                    
                    </div>
                  
                    <div class="form-group">
                      <label>Nilai</label>
                      <div class="inp-append">
                        <input  name="nilai" type="text" class="form-control mb-3" required>
                      </div>
                    
                    </div>
                    
                    <hr />
                    
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>