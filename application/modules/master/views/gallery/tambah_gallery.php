        <div class="container-fluid">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Gallery</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Judul</label>
                      <input name="nama_gallery" type="text" class="form-control" value="" required="" />
                        
                    </div>
                    <div class="form-group">
                      <label>Kategori</label>
                      <select class="form-control col-md-3" name="kategori" required>
                            <?php foreach($kategori->result() as $dt_kategori){ ?>
                                <option value="<?php echo $dt_kategori->id_kategori?>" ><?php echo $dt_kategori->kategori?></option>
                            <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" rows="4" name="keterangan" required=""></textarea>
                    </div>
                    
                   
                    <div class="form-group">
                     <label>Tampil</label>
                     <select class="form-control col-md-3" name="status" required>
                            <option value="1" >Tampil</option>
                             <option value="0" >Tidak Tampil</option>
                      </select>
                      </div>
                    <hr />
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
                    <br />
 
            </div>
          </div>

        </div>