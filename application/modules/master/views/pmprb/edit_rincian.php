        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h4 mb-4 text-gray-800">Tambah Rincian Kategori Penilaian</h4>

     
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Rincian PMPRB</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post">
                    <div class="form-group">
                      <label>Kategori Penilaian</label>
                      <select required class="form-control" name="pmprb">
                        <option value="">--Pilih Kategori Penilaian</option>
                        <?php foreach($pmprb->result() as $dt_pmprb){?>
                            <option value="<?php echo $dt_pmprb->id_pmprb?>" <?php echo $rincian->row()->id_pmprb == $dt_pmprb->id_pmprb ? 'selected="selected"':''; ?> ><?php echo $dt_pmprb->nama_area.' - '.$dt_pmprb->kategori_penilaian?></option>
                        <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Objek Penilaian</label>
                     <input type="text" name="objek_penilaian" value="<?php echo $rincian->row()->objek_penilaian?>" class="form-control" />
                    </div> 
                    <div class="form-group">
                      <label>Penjelasan</label>
                      <textarea class="form-control" rows="5"  name="penjelasan"><?php echo $rincian->row()->penjelasan?></textarea>  
                    </div>
                    <div class="form-group">
                      <label>Data Dukung</label>
                      <textarea class="form-control" rows="5"  name="data_dukung"><?php echo $rincian->row()->data_dukung?></textarea>  
                    </div>
                    <div class="form-group">
                      <label>Jenis LKP PMPRB</label>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" name="jenis_lkp" value="pusat" <?php echo $rincian->row()->jenis_lkp == 'pusat' ? 'checked="checked"':'';?>  class="form-check-input">
                              Pusat
                            <i class="input-helper"></i></label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" name="jenis_lkp" value="unit" <?php echo $rincian->row()->jenis_lkp == 'unit' ? 'checked="checked"':'';?> class="form-check-input" >
                              Unit
                            <i class="input-helper"></i></label>
                          </div>
               
                        </div>
                      </div>  
                    </div> 
                   
                   
                 
                    <h5>
                    Daftar satuan kerja yang masuk dalam kategori penilaian
                    </h5>
                    <hr />
                    <div class="row cont_satker">
                        <!--
                        <?php $satker =  modules::run('master/pmprb/get_satker_edit_pmprb', $rincian->row()->id_detail);?>
                        
                        <?php foreach($satker->result() as $dt_satker){?>
                        <div class="input-group mb-3 col-lg-6 <?php echo $dt_satker->SatkerID ?>">
                            <input type="hidden" name="satker_list[]" value="<?php echo $dt_satker->SatkerID ?>" />
                            <input class="form-control" type="text" value="<?php echo $dt_satker->Satker ?>" name="satker[]" />
                            <div class="input-group-append rem_satker_edit" data-ref="<?php echo $dt_satker->SatkerID ?>" data-detail="<?php echo $dt_satker->id_detail_pmprb_user?>">
                                <button class="btn btn-danger"  type="button"><i class="mdi mdi-delete menu-icon"></i></button>
                            </div>
                        </div>
                        <?php }?>
                        -->
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-6">
                          <h4>Unit Pusat</h4>
                          <div id="satker_pusat">
                                <ul>
                                    <?php $esel = modules::run('master/satker/get_esel')?>
                                    <?php foreach($esel->result() as $dt_esel){?>
                                             <?php $check_parent= modules::run('master/pmprb/check_satker', $dt_esel->SatkerID, $rincian->row()->id_detail)?>
                                            <li data-check="<?php echo $check_parent == 1 ? 'checked':'' ?>"><?php echo $dt_esel->Satker?>
                                           
                                            <ul class="<?php echo $check_parent == '1' ? 'collapse show':'' ?>">
                                                <li class="check_all" data-parent="<?php  echo $dt_esel->SatkerID?>_0" data-ref="<?php  echo $dt_esel->SatkerID?>">Pilih Semua</li>
                                                
                                                <li data-check="<?php echo $check_parent == '1' ? 'checked':'' ?>" data-parent="<?php echo $dt_esel->SatkerID ?>" data-value="<?php echo $dt_esel->SatkerID?>"><?php echo $dt_esel->Satker?></li>
                                                <?php
                                                 $biro =  modules::run('master/satker/get_biro', $dt_esel->SatkerID);
                                                 foreach($biro->result() as $dt_biro){
                                                 ?>
                                                 <?php $check_child= modules::run('master/pmprb/check_satker', $dt_biro->SatkerID, $rincian->row()->id_detail)?>
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
                                             <?php $check_parent= modules::run('master/pmprb/check_satker', $dt_esel->SatkerID, $rincian->row()->id_detail)?>
                                            <li data-check="<?php echo $check_parent == 1 ? 'checked':'' ?>" data-value=""><?php echo $dt_esel->Satker?>
                                           
                                            <ul class="<?php echo $check_parent == '1' ? 'collapse show':'' ?>">
                                                <li class="check_all" data-parent="<?php  echo $dt_esel->SatkerID?>_0" data-ref="<?php  echo $dt_esel->SatkerID?>">Pilih Semua</li>
                                                <?php
                                                 $biro =  modules::run('master/satker/get_upt', $dt_esel->SatkerID);
                                                 foreach($biro->result() as $dt_biro){
                                                 ?>
                                                 <?php $check_child= modules::run('master/pmprb/check_satker', $dt_biro->SatkerID, $rincian->row()->id_detail)?>
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