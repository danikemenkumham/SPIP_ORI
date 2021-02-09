<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Formulir Pendaftaran Permohonan Perundangan</h4>
                  <hr />
                  <form class="forms-sample" action="<?php echo current_url()?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Nama Perundangan</label>
                      <input type="text" class="form-control" id="exampleInputName1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Tentang</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" >
                    </div>
                   
                    
                    <div class="form-group">
                      <label>Softcopy Naskah Perundangan</label>
                        <input type="file" class="form-control file-upload-info col-lg-6" name="naskah"  placeholder="Upload Image">
                    </div>
                    
                     <div class="form-group">
                      <label>Lampiran Analisis Kesesuaian</label>
                        <input type="file" class="form-control file-upload-info col-lg-6" name="kesesuaian"  placeholder="Upload Image">
                    </div>
                     <div class="form-group">
                      <label>Surat Selesai Harmonisasi</label>
                     <input type="file" class="form-control file-upload-info col-lg-6" name="harmonisasi"  placeholder="Upload Image">
                    </div>
                    <div class="form-group">
                      <label>Surat Permohonan</label>
                     
                      <input type="file" class="form-control file-upload-info col-lg-6" name="permohonan"  placeholder="Upload Image">
                    </div>
                    <hr />
                    
                    <input type="submit" name="send" class="btn btn-primary mr-2" value="Submit" />
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>