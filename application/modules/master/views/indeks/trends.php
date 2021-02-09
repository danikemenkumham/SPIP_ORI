        <div class="container-fluid">
          <div class="card mb-4">
            
            <div class="card-body">
               <h4 class=" align-middle">Trends Reformasi Birokrasi Kemenkumham</h4> 
               <hr />
              <div class="form-group">
              
                      <select class="form-control tindeks" name="indeks" required>
                            <option value="">-- Pilih Indeks -- </option>
                            <?php foreach($indeks->result() as $dt_indeks){?>
                                <option value="<?php echo $dt_indeks->id_indeks?>"><?php echo $dt_indeks->indeks?></option>
                            <?php };?>
                      </select>  
                    </div>
                    

               <hr />
              
              <div class="col-md-6 mt-5 text-center p-3 bg-white rounded">
                    <?php foreach($indeks->result() as $dt_indeks){ ?>
                        <canvas id="<?php echo $dt_indeks->url_path?>"></canvas>
                    <?php }?>
                    
            	
              </div>
              
            </div>
          </div>

        </div>