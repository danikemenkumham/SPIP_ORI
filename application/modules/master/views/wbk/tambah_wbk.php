        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tambah Area Perubahan</h1>

     
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Area Perubahan</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post">
                    <div class="form-group">
                      <label>Area Perubahan</label>
                      <select required class="form-control" name="area">
                        <option value="">--Pilih Area Perubahan</option>
                        <?php foreach($perubahan->result() as $dt_perubahan){?>
                            <option value="<?php echo $dt_perubahan->id_area?>"><?php echo $dt_perubahan->kode_area.' - '.ucwords($dt_perubahan->nama_area)?></option>
                        <?php }?>
                      </select>
                    </div>
                     
                    <div class="form-group">
                      <label>Indikator</label>
                      <input name="indikator" type="text" class="form-control " >
                    </div>
                    
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>