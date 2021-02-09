        <div class="container-fluid">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Page</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Judul</label>
                      <input name="title" type="text" class="form-control" value="<?php echo $page->row()->title ?>" required="" >
                         <input type="hidden" name="ref" value="<?php echo $page->row()->id_page?>" />
                    </div>
                   
                    <div class="form-group">
                        <label>Konten</label>
                        <textarea class="form-control editor" rows="4" name="content" required=""><?php echo $page->row()->body ?></textarea>
                    </div>
                  
                    
                    <hr />
                    
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>