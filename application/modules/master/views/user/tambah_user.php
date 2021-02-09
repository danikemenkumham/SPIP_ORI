        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form User</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post">
                      <h4 class="text-danger">Info User</h4>
                     <hr /> 
                    <div class="form-group">
                      <label>Nama</label>
                      <input required name="nama" type="text" class="form-control " >
                    </div>
                    
                    <div class="form-group">
                      <label>Username</label>
                      <div class="inp-append">
                        <input required name="username" type="text" class="form-control mb-3">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Satuan Kerja</label>
                      <select required name="satker" class="form-control">
                        <option value="">-- Pilih Satuan Kerja --</option>
                        <?php foreach($satker->result() as $dt_satker){?> 
                            <option value="<?php echo $dt_satker->SatkerID?>"><?php echo $dt_satker->Satker?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Role</label>
                      <select required name="role" class="form-control">
                        <option value="">-- Pilih Role --</option>
                        <?php foreach($role->result() as $dt_role){?> 
                            <option value="<?php echo $dt_role->id_role?>"><?php echo ucwords($dt_role->role)?></option>
                        <?php } ?>
                      </select>
                    </div>
                    
                    
                    <div class="form-group">
                          <label class="col-form-label">Status </label>
                          <div class="row">
                          <div class="col-sm-2">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="1" checked="">
                                Aktif
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="0">
                                Tidak Aktif
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          </div>
                        </div>
                    
                    
                    
                    <h4 class="text-danger">Password</h4>
                     <hr /> 
                    <div class="form-group">
                      <label>Password</label>
                      <div class="inp-append">
                        <input required name="password"  type="text" class="password form-control mb-3">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Ulangi Password</label>
                      <div class="inp-append">
                        <input required name="repassword"  type="text" class="repassword form-control mb-3">
                         <div class="invalid-feedback relabel" style="hide">
                            Password yang anda masukkan tidak sama
                         </div>
                      </div>
                      
                    </div>
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>
        </div>