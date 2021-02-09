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
                      <label>Jenis</label>
                      <div class="inp-append">
                       <select name="jenis" class="form-control">
                            <option value="">-- pilih jenis --</option>
                            <option value="post">Berita</option>
                            <option value="video">Video</option>
                            <option value="gallery">Gallery</option>
                            <option value="produk">Produk RB</option>
                       </select>
                      </div>
          
                    </div>
                    <div class="form-group">
                      <label>Nama Role</label>
                      <div class="inp-append">
                        <input required="required" name="kategori" type="text" class="form-control mb-3">
                      </div>
          
                    </div>
                    <hr />
                    
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>