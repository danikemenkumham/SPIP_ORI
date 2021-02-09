        <div class="container-fluid">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Gallery</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Judul</label>
                      <input name="nama_gallery" type="text" class="form-control" value="<?php echo $gallery->row()->nama_gallery ?>" required="" >
                         <input type="hidden" name="ref" value="<?php echo $gallery->row()->id_gallery?>" />
                    </div>
                    <div class="form-group">
                      <label>Kategori</label>
                      <select class="form-control col-md-3" name="kategori" required>
                            <?php foreach($kategori->result() as $dt_kategori){ ?>
                                <option value="<?php echo $dt_kategori->id_kategori?>" <?php echo $dt_kategori->id_kategori == $gallery->row()->id_kategori ? 'selected="selected"':''; ?> ><?php echo $dt_kategori->kategori?></option>
                            <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" rows="4" name="keterangan" required=""><?php echo $gallery->row()->keterangan ?></textarea>
                    </div>
                    
                   
                    <div class="form-group">
                     <label>Tampil</label>
                     <select class="form-control col-md-3" name="status" required>
                            <option value="1" <?php echo  $gallery->row()->status == 1 ? 'selected="selected"':''; ?>>Tampil</option>
                             <option value="0"  <?php echo  $gallery->row()->status == 0 ? 'selected="selected"':''; ?>>Tidak Tampil</option>
                      </select>
                      </div>
                    <hr />
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
                    <br />
                  <hr />
                  <h3>Foto Gallery</h3>
                  <div class="row list-photo">
                  <?php if($photo->num_rows() > 0){?>
                        <?php foreach($photo->result() as $dt_photo){ ?>
                             <div class="col-md-2 mt-2 rows<?php echo $dt_photo->id_photo?>"> 
                              <div class="card border-1 p-2">
                                <img class="card-img rounded" src="<?php echo $dt_photo->path_photo?>" alt="Card image">
                                <button class="btn btn-danger btn-xs mt-3 photo_del" data-old="<?php echo $dt_photo->nama_file?>" data-ref="<?php echo $dt_photo->id_photo?>">Hapus</button>
                              </div>
                            </div> 
                        <?php }?>
                  <?php }else{?>
                        <div class="alert alert-danger" role="alert">
                          Belum ada foto pada gallery ini
                        </div>
                  <?php }?>
                    
                    
                  </div>
                  
                   <hr />
                    <h5>Upload Foto</h5>
                    <div style="display: none;"  class="spinner-border text-success spin" >
                      <span class="sr-only">Loading...</span>
                    </div>
                    
                    
                    <div class="row mt-4 up-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Caption Foto</label>
                                    <input type="text"  class="form-control caption " name="caption" />
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" class="form-control file"  onchange="uploadFile(event,'<?php echo $gallery->row()->id_gallery?>')" name="userfile" />
                                </div> 
                            </div> 
                    </div>  
            </div>
          </div>

        </div>