        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Area Perubahan</h1>

     
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Area Perubahan</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post">
                    <div class="form-group">
                      <label>Kode</label>
                      <input value="<?php echo $perubahan->row()->kode_area_perubahan?>" name="kode" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label>Area Perubahan</label>
                      <input value="<?php echo $perubahan->row()->area_perubahan?>" name="perubahan" type="text" class="form-control"  >
                    </div>
                    <div class="form-group">
                     <label>Uraian Indikator</label>
                      <textarea name="keterangan" class="form-control" rows="4"><?php echo $perubahan->row()->keterangan_area?></textarea>
                    </div>
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>