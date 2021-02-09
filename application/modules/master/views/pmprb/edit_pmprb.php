        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form PMPRB</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post">
                    <div class="form-group">
                      <label>Area Perubahan</label>
                      <select class="form-control" name="area">
                        <option value="">--Pilih Area Perubahan</option>
                        <?php foreach($area->result() as $dt_area){?>
                            <option <?php echo $dt_area->id_area == $pmprb->row()->id_area ? 'selected="selected"':'';?> value="<?php echo $dt_area->id_area?>"><?php echo $dt_area->kode_area.'-'.ucwords($dt_area->nama_area)?></option>
                        <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Kategori Penilaian</label>
                      <input value="<?php echo $pmprb->row()->kategori_penilaian?>" required="" name="kategori_penilaian" type="text" class="form-control"  >
                    </div>
                    
                   
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>