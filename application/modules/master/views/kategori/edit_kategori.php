        <div class="container-fluid">
          
          <div class="card mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Edit Kategori</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post">
                    <div class="form-group">
                      <label>Jenis</label>
                      <div class="inp-append">
                       <select name="jenis" class="form-control">
                            <option value="">-- pilih jenis --</option>
                            <option value="post" <?php echo $kategori->row()->jenis == 'post' ? 'selected="selected"':'';?>>Berita</option>
                            <option value="video" <?php echo $kategori->row()->jenis == 'video' ? 'selected="selected"':'';?>>Video</option>
                            <option value="gallery" <?php echo $kategori->row()->jenis == 'gallery' ? 'selected="selected"':'';?>>Gallery</option>
                            <option value="produk" <?php echo $kategori->row()->jenis == 'produk' ? 'selected="selected"':'';?>>Produk RB</option>
                       </select>
                      </div>
          
                    </div>
                    <div class="form-group">
                      <label>Nama kategori</label>
                      <div class="inp-append">
                        <input required="required" name="kategori" value="<?php echo $kategori->row()->kategori;?>" type="text" class="form-control mb-3">
                      </div>
           
                    </div>
                    <hr />
                    
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>