        <div class="container-fluid">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Artikel</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Judul</label>
                      <input name="title" type="text" class="form-control " required="" >
                    </div>
                  
                    <div class="form-group">
                        <label>Konten</label>
                        <textarea class="form-control editor" rows="4" name="content" required=""></textarea>
                    </div>
                    
                    <hr />
                    
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>