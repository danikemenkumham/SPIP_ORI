        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tambah program</h1>
          <!-- DataTales Example -->
          <div class="card mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Program</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post">
                    <div class="form-group">
                      <label>Kode</label>
                      <input name="kode" type="text" class="form-control " >
                    </div>
                    
                    <div class="form-group">
                      <label>Nama Program</label>
                      <div class="inp-append">
                        <input required name="program" type="text" class="form-control mb-3">
                      </div>
                      <!--
                      <button type="button" class="btn btn-warning btn-sm add_program">+ program</button>
                        -->
                    </div>
                    <hr />
                    
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>