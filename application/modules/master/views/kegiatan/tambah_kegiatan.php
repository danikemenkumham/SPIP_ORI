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
                    <div class="form-group col-md-4">
                      <label>Kode Kegiatan</label>
                      <input name="kode" type="text" class="form-control " >
                    </div>
                    <div class="form-group col-md-6">
                      <label>Area Perubahan</label>
                      <select class="form-control perubahan" name="area_perubahan">
                            <option value="">-- Pilih Area Perubahan --</option>
                        <?php foreach($area_perubahan->result() as $dt_perubahan){?>
                            <option value="<?php echo $dt_perubahan->id_area_perubahan?>"><?php echo $dt_perubahan->area_perubahan?></option>
                        <?php }?>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                     <label>Capaian</label>
                      <select class="form-control" name="capaian">
                        <option value="">-- Pilih Area Perubahan Dahulu --</option>
                      </select>
                    </div>
                    
                    <div class="form-group col-md-10">
                     <label>Kegiatan</label>
                      <textarea name="kegiatan" class="form-control" rows="4"></textarea>
                    </div>
                    
                    <div class="form-group col-md-10">
                     <label>Indikator Keberhasilan</label>
                      <textarea name="indikator" class="form-control" rows="4"></textarea>
                    </div>
                    
                    <div class="form-group col-md-10">
                     <label>Data Dukung</label>
                      <textarea name="data_dukung" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                     <label>Watktu Pelaksanaan</label>
                      <textarea name="waktu" class="form-control" rows="4"></textarea>
                    </div>
                     <div class="form-group col-md-4">
                     <label>Penanggung Jawab</label>
                      <textarea name="penanggung_jawab" class="form-control" rows="4"></textarea>
                    </div>
                    
                    
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>