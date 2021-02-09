        <div class="container-fluid">

       <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Kegiatan RKT</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post">
                    <div class="form-group">
                      <label>Area Perubahan</label>
                      <select required class="form-control" name="area">
                        <option value="">--Pilih Area Perubahan</option>
                        <?php foreach($area->result() as $dt_area){?>
                            <option <?php echo $rkt->row()->id_area == $dt_area->id_area ? 'selected="selected"':'';?> value="<?php echo $dt_area->id_area;?>"><?php echo ucwords($dt_area->nama_area)?></option>
                        <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Kegiatan</label>
                      <textarea class="form-control" rows="5" name="kegiatan"><?php echo $rkt->row()->kegiatan;?></textarea>  
                    </div> 
                    <div class="form-group">
                      <label>Data Dukung</label>
                      <textarea class="form-control" rows="5" name="daduk"><?php echo $rkt->row()->daduk;?></textarea>  
                    </div>
                    <div class="form-group">
                      
                      
                      <label>Waktu Pelaksanaan</label>
                       <?php
                        $waktu = modules::run('master/rkt/get_waktu', $rkt->row()->id_rkt);
                  
                       ?>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="waktu[]" value="B03" <?php echo in_array('B03', $waktu) ? 'checked="checked"':'';?>  >
                          B03
                        <i class="input-helper"></i></label>
                      </div>
                       <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="waktu[]" value="B06" <?php echo in_array('B06', $waktu) ? 'checked="checked"':'';?>>
                          B06
                        <i class="input-helper"></i></label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="waktu[]" value="B09" <?php echo in_array('B09', $waktu) ? 'checked="checked"':'';?> >
                          B09
                        <i class="input-helper"></i></label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="waktu[]" value="B12" <?php echo in_array('B12', $waktu) ? 'checked="checked"':'';?>>
                          B12
                        <i class="input-helper"></i></label>
                      </div>
                    
                    </div>
                    
                   
                   
                 
                       <h5>
                    Daftar satuan kerja yang masuk dalam kategori penilaian
                    </h5>
                   
                    
                    <div class="row">
                        <div class="col-md-6">
                          <h4>Unit Pusat</h4>
                          <div id="satker_pusat">
                                <ul>
                                    <?php $esel = modules::run('master/satker/get_esel')?>
                                    <?php foreach($esel->result() as $dt_esel){?>
                                             <?php $check_parent= modules::run('master/rkt/check_satker', $dt_esel->SatkerID, $rkt->row()->id_rkt)?>
                                            <li data-check="<?php echo $check_parent == 1 ? 'checked':'' ?>"><?php echo $dt_esel->Satker?>
                                           
                                            <ul class="<?php echo $check_parent == '1' ? 'collapse show':'' ?>">
                                                <li class="check_all" data-parent="<?php  echo $dt_esel->SatkerID?>_0" data-ref="<?php  echo $dt_esel->SatkerID?>">Pilih Semua</li>
                                                
                                                <li data-check="<?php echo $check_parent == '1' ? 'checked':'' ?>" data-parent="<?php echo $dt_esel->SatkerID ?>" data-value="<?php echo $dt_esel->SatkerID?>"><?php echo $dt_esel->Satker?></li>
                                                <?php
                                                 $biro =  modules::run('master/satker/get_biro', $dt_esel->SatkerID);
                                                 foreach($biro->result() as $dt_biro){
                                                 ?>
                                                 <?php $check_child= modules::run('master/rkt/check_satker', $dt_biro->SatkerID, $rkt->row()->id_rkt)?>
                                                  <li data-check="<?php echo $check_child == '1' ? 'checked':'' ?>" data-parent="<?php echo $dt_esel->SatkerID ?>"  data-value="<?php echo $dt_biro->SatkerID?>"><?php echo $dt_biro->Satker?></li>
                                            
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
                                     <?php $esel = modules::run('master/satker/get_kanwil')?>
                                    <?php foreach($esel->result() as $dt_esel){?>
                                             <?php $check_parent= modules::run('master/rkt/check_satker', $dt_esel->SatkerID, $rkt->row()->id_rkt)?>
                                            <li data-check="<?php echo $check_parent == 1 ? 'checked':'' ?>" data-value=""><?php echo $dt_esel->Satker?>
                                           
                                            <ul class="<?php echo $check_parent == '1' ? 'collapse show':'' ?>">
                                                <li class="check_all" data-parent="<?php  echo $dt_esel->SatkerID?>_0" data-ref="<?php  echo $dt_esel->SatkerID?>">Pilih Semua</li>
                                                <?php
                                                 $biro =  modules::run('master/satker/get_upt', $dt_esel->SatkerID);
                                                 foreach($biro->result() as $dt_biro){
                                                 ?>
                                                 <?php $check_child= modules::run('master/rkt/check_satker', $dt_biro->SatkerID, $rkt->row()->id_rkt)?>
                                                  <li data-check="<?php echo $check_child == '1' ? 'checked':'' ?>" data-parent="<?php echo $dt_esel->SatkerID ?>"  data-value="<?php echo $dt_biro->SatkerID?>"><?php echo $dt_biro->Satker?></li>
                                            
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