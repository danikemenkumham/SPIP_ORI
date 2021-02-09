        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Pelaksanaan</h1>

     
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Pelaksanaan</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post">
                    <div class="form-group">
                      <label>Kode Waktu Pelaksanaan</label>
                      <input name="kode_waktu_pelaksanaan" type="text" class="form-control" value="<?php echo $pelaksanaan->row()->kode_waktu_pelaksanaan?>" >
                    </div>
                    <div class="form-group">
                      <label>Waktu Pelaksanaan</label>
                      <input name="waktu_pelaksanaan" type="text" class="form-control " value="<?php echo $pelaksanaan->row()->waktu_pelaksanaan?>" >
                    </div>
                   
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>