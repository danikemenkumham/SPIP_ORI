        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tambah Role</h1>
          <!-- DataTales Example -->
          <div class="card mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Role</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post">
     
                    <div class="form-group">
                      <label>Nama Role</label>
                      <div class="inp-append">
                        <input required name="role" type="text" class="form-control mb-3">
                      </div>
          
                    </div>
                    <hr />
                    
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>