        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Indeks RB</h1>

     
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Indeks RB</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post">
                    <div class="form-group">
                      <label>Area</label>
                      <select required class="form-control" name="area">
                      
                        <option value="">--Pilih area</option>
                        <?php foreach($area->result() as $dt_area){?>
                            <option <?php echo $dt_area->id_area == $indeks->row()->id_area ? 'selected="selected"':'';?> value="<?php echo $dt_area->id_area?>"><?php echo ucwords($dt_area->nama_area)?></option>
                        <?php }?>
                       
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Indeks</label>
                      <input value="<?php echo $indeks->row()->indeks?>" name="indeks" type="text" class="form-control"  >
                    </div>
                    <div class="form-group">
                     <label>Keterangan</label>
                      <textarea name="keterangan" class="form-control" rows="4"><?php echo $indeks->row()->keterangan?></textarea>
                    </div>
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>