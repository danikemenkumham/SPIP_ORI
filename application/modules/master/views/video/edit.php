        <div class="container-fluid">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Video</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Judul</label>
                      <input name="title" type="text" class="form-control" value="<?php echo $video->row()->caption ?>" required="" >
                         <input type="hidden" name="ref" value="<?php echo $video->row()->id_video?>" />
                    </div>
                    <div class="form-group">
                      <label>Kategori</label>
                      <select class="form-control col-md-3" name="kategori" required>
                            <?php foreach($kategori->result() as $dt_kategori){ ?>
                                <option value="<?php echo $dt_kategori->id_kategori?>" <?php echo $dt_kategori->id_kategori == $video->row()->id_kategori ? 'selected="selected"':''; ?> ><?php echo $dt_kategori->kategori?></option>
                            <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Url Youtube</label>
                        <input name="url" type="text" class="form-control" value="<?php echo $video->row()->url ?>" required="" >
                    </div>
                   
                    <div class="form-group">
                     <label>Tampil</label>
                     <select class="form-control col-md-3" name="status" required>
                            <option value="1" <?php echo  $video->row()->status == 1 ? 'selected="selected"':''; ?>>Tampil</option>
                             <option value="0"  <?php echo  $video->row()->status == 0 ? 'selected="selected"':''; ?>>Tidak Tampil</option>
                      </select>
                      </div>
                    <hr />
                    
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>