        <div class="container-fluid">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Artikel</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Judul</label>
                      <input name="title" type="text" class="form-control" value="<?php echo $post->row()->title ?>" required="" >
                         <input type="hidden" name="ref" value="<?php echo $post->row()->id_post?>" />
                    </div>
                    <div class="form-group">
                      <label>Kategori</label>
                      <select class="form-control col-md-3" name="kategori" required>
                            <?php foreach($kategori->result() as $dt_kategori){ ?>
                                <option value="<?php echo $dt_kategori->id_kategori?>" <?php echo $dt_kategori->id_kategori == $post->row()->kategori_id ? 'selected="selected"':''; ?> ><?php echo $dt_kategori->kategori?></option>
                            <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Konten</label>
                        <textarea class="form-control editor" rows="4" name="content" required=""><?php echo $post->row()->body ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Featured Image</label> <br/>
                        <img src="<?php echo $post->row()->path_featured_image?>" width="200px"  /> <br />
                        
                        <input type="file" name="userfile" class="form-control col-sm-3 mt-3" />
                         <input type="hidden" name="fileold" value="<?php echo $post->row()->featured_image?>"/>
                    </div>
                    <div class="form-group">
                     <label>Tampil</label>
                     <select class="form-control col-md-3" name="status" required>
                            <option value="1" <?php echo  $post->row()->status == 1 ? 'selected="selected"':''; ?>>Tampil</option>
                             <option value="0"  <?php echo  $post->row()->status == 0 ? 'selected="selected"':''; ?>>Tidak Tampil</option>
                      </select>
                      </div>
                    <hr />
                    
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>