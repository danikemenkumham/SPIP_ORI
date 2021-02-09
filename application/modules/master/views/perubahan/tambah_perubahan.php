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
                    <!--
                    <div class="form-group">
                      <label>Kode Area Perubahan</label>
                      <input name="kode" type="text" class="form-control col-lg-4" >
                    </div>
                    -->
                    <div class="form-group">
                      <label>Tahun</label>
                      <select name="tahun" class="form-control col-lg-4">
                         <option value="2019">2019</option>
                         <option value="2019">2020</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Program</label>
                      <select required class="form-control" name="program">
                        <option value="">--Pilih Program</option>
                        <?php foreach($program->result() as $dt_program){?>
                            <option value="<?php echo $dt_program->id_program?>"><?php echo $dt_program->kode_program.' - '.ucwords($dt_program->nama_program)?></option>
                        <?php }?>
                      </select>
                    </div>
                     
                    <div class="form-group">
                      <label>Nama Area Perubahan</label>
                      <input name="perubahan" type="text" class="form-control " >
                    </div>
                    <div class="form-group">
                     <label>Uraian Area Perubahan</label>
                      <textarea name="keterangan" class="form-control" rows="4"></textarea>
                    </div>
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>