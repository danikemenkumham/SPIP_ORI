        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h4 mb-4 text-gray-800">Tambah Rincian Indikator Penilaian</h4>

     
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Rincian WBK/WBBM</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post">
                    <div class="form-group">
                      <label>Indikator</label>
                      <select required class="form-control" name="wbk">
                        <option value="">--Pilih Indikator</option>
                        <?php foreach($wbk->result() as $dt_wbk){?>
                            <option value="<?php echo $dt_wbk->id_wbk?>"><?php echo $dt_wbk->nama_area.' - '.$dt_wbk->indikator?></option>
                        <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Poin Indikator</label>
                     <input type="text" name="poin_indikator" class="form-control" />
                    </div>
                    
                     <div class="form-group">
                      <label>Petunjuk Teknis</label>
                      <textarea class="form-control" rows="5" name="juknis"></textarea>  
                    </div>
                     
                    <div class="form-group">
                      <label>Data Dukung</label>
                      <textarea class="form-control" rows="5" name="daduk"></textarea>  
                    </div>
                    <h5>Tambahkan Satuan Kerja</h5>
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