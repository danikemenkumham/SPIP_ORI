        <div class="container-fluid">

          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Kegiatan RKT</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post">
                    <div class="form-group">
                      <label>Area Perubahan</label>
                      <select required class="form-control" name="area">
                        <option value="">--Pilih Area Perubahan</option>
                        <?php foreach($area->result() as $dt_area){?>
                            <option value="<?php echo $dt_area->id_area;?>"><?php echo ucwords($dt_area->nama_area)?></option>
                        <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Kegiatan</label>
                      <textarea class="form-control" rows="5" name="kegiatan"></textarea>  
                    </div> 
                    <div class="form-group">
                      <label>Data Dukung</label>
                      <textarea class="form-control" rows="5" name="daduk"></textarea>  
                    </div>
                    <div class="form-group">
                      
                      
                      <label>Waktu Pelaksanaan</label>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="waktu[]" value="B03">
                          B03
                        <i class="input-helper"></i></label>
                      </div>
                       <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="waktu[]" value="B06">
                          B06
                        <i class="input-helper"></i></label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="waktu[]" value="B09">
                          B09
                        <i class="input-helper"></i></label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="waktu[]" value="B12">
                          B12
                        <i class="input-helper"></i></label>
                      </div>
                    
                    </div>
                    
                  
                    <h5>
                    Daftar satuan kerja yang masuk dalam kategori penilaian
                    </h5>
                    <hr />
                    
                    
                    <div class="row">
                        <div class="col-md-6">
                          <h4>Unit Pusat</h4>
                          <div id="satker_pusat">
                                <ul>
                                    <?php $esel = modules::run('master/satker/get_esel')?>
                                    <?php foreach($esel->result() as $dt_esel){?>
                                            <li><?php echo $dt_esel->Satker?>
                                            <ul>
                                                <li class="check_all" data-parent="<?php  echo $dt_esel->SatkerID?>_0" data-ref="<?php  echo $dt_esel->SatkerID?>">Pilih Semua</li>
                                                <li data-parent="<?php echo $dt_esel->SatkerID ?>" data-value="<?php echo $dt_esel->SatkerID?>"><?php echo $dt_esel->Satker?>
                                                <?php
                                                 $biro =  modules::run('master/satker/get_biro', $dt_esel->SatkerID);
                                                 foreach($biro->result() as $dt_biro){
                                                 ?>
                                                  <li data-parent="<?php echo $dt_esel->SatkerID ?>"  data-value="<?php echo $dt_biro->SatkerID?>"><?php echo $dt_biro->Satker?></li>
                                            
                                                 <?php }?>
                                            </ul>
                                            </li>
                                    <?php }?>
                                    
                                    </ul>
                               
                            </div>
                          
                       </div>
                       <div class="col-md-6">
                        <h4>Kantor Wilayah dan UPT</h4>
                          
                            <div id="satker_kanwil">
                                 <ul>
                                    <?php $satker = modules::run('master/satker/get_kanwil')?>
                                    <?php foreach($satker->result() as $dt_satker){?>
                                            <li data-value=""><?php echo $dt_satker->Satker?>
                                            <ul>
                                                <li class="check_all" data-parent="<?php  echo $dt_satker->SatkerID?>_0" data-ref="<?php  echo $dt_satker->SatkerID?>">Pilih Semua</li>
                                                <li data-parent="<?php echo $dt_satker->SatkerID ?>" data-value="<?php echo $dt_satker->SatkerID?>"><?php echo $dt_satker->Satker?> 
                                                 <?php
                                                 $upt =  modules::run('master/satker/get_upt', $dt_satker->SatkerID);
                                                 foreach($upt->result() as $dt_upt){
                                                 ?>
                                                  <li data-parent="<?php echo $dt_satker->SatkerID ?>" data-value="<?php echo $dt_upt->SatkerID?>"><?php echo $dt_upt->Satker?></li>
                                            
                                                 <?php }?>
                                            </ul>
                                            </li>
                                    <?php }?>
                                    </ul>
                                
                            </div> 
                              
                     </div> 
                     </div>  
                   
                   
                   
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>
        </div>