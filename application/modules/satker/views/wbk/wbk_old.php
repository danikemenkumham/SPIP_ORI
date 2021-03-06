<style>

    td{
        text-align: left;
        vertical-align: top!important;
        font-size: 12px!important;
    }
    .poins td{
         border-color: #D1D1D1!important;
    }
</style>
<?php
     if($this->session->role == 1 || $this->session->role == 2 || $this->session->role == 3){
        $satker = $this->uri->segment(5);
      }else{
          $satker = $this->session->userdata('satker');
      }
    $kategori_penilaian = modules::run('satker/wbk/get_kategori_penilaian', $this->uri->segment(4), $satker);
?>
<div class="col-lg-12 mb-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('satker/wbk/area/2020')?>">WBK/WBBM</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('satker/wbk/poin/'.$wbk->row()->id_area)?><?php echo $this->uri->segment(5) != NULL ? '/'.$this->uri->segment(5):''?>"><?php echo ucwords($wbk->row()->nama_area)?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo current_url()?>"><?php echo ucwords($kategori_penilaian->row()->indikator)?></a></li>
      </ol>
    </nav>
       
</div>  
<div class="col-lg-12 grid-margin stretch-card">
   
              <div class="card rounded">
                <div class="card-body">
                  
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                         
                          <th class="text-center bg-info text-white">
                          
                           LKE WBK/WBBM <?php echo modules::run('satker/pmprb/get_satker', $satker)?>
                          </th>
                          
                       
                        </tr>
                      </thead>
                         <tbody>
                         
                          <?php $no=1; foreach($wbk->result() as $dt_wbk){?>
                           <tr>
                            
                            <td class=" text-center text-dark">
                                <span class="badge badge-success rounded"><b class="h4">Area Perubahan : <?php echo  ucwords(strtolower($dt_wbk->nama_area));?></b></span>
                           
                           </tr>
                           <tr>     
                                <td class="p-0">
                                        <table class="table"  >    
                                            <?php
                                            foreach($kategori_penilaian->result() as $dt_kategori){
                                            ?>
                                            <tr >
                                                <td>
                                                    <h5 class="bg-warning p-2 rounded">Poin Penilaian : <?php echo $dt_kategori->indikator;?></h5>
                                                      <?php 
                                                      
                                                       if($this->session->userdata('role') == '5'){
                                                            $satker = $this->session->userdata('satker');
                                                       }else{
                                                             $last_uri = $this->uri->segment_array();
                                                             $satker = $last_uri[count($last_uri)];
                                                       }    
                                                       
                                                    
                                                      echo modules::run('satker/wbk/count_lke', $dt_kategori->id_wbk,$satker );
                                                      ?>
                                                    
                                                    <table class="table mt-1" >
                                                        <?php $poin_penilaian = modules::run('satker/wbk/get_poin_penilaian', $dt_kategori->id_wbk, $satker);  ?>
                                                        <?php  foreach($poin_penilaian->result() as $dt_poin){?>
                                                       
                                                        <tr>
                                                            <td class="p-0" style="border:0px!important" >
                                                            <?php $data_dukung = modules::run('satker/pmprb/get_data_dukung', $dt_poin->id_detail_wbk_user)?>
                                                            <?php if($data_dukung->num_rows() > 0){?>
                                                                <table class="table mt-3 poins" style="background-color: #<?php echo $data_dukung->row()->status != 'lengkap' ? 'ffeeee':'F7F7F7'?>;">
                                                            <?php }else{?>
                                                                <table class="table mt-3 poins" style="background-color: #F7F7F7;">
                                                            <?php }?>
                                                                <tr class="bg-dark text-white">
                                                                    <th>Poin Indikator</th>
                                                                    <th>Petunjuk Teknis</th>
                                                                    <th>Data Dukung</th>
                                                                    <th>Upload Daduk</th>
                                                                </tr>
                                                                <tr >
                                                                    <td style="width: 20%;"><p><?php echo $dt_poin->poin_indikator?></p></td>
                                                                    <td style="width: 25%;"><p><?php echo nl2br($dt_poin->juknis)?></p></td>
                                                                    <td style="width: 25%;"><p><?php echo nl2br($dt_poin->daduk)?></p></td>
                                                                    <td style="text-align: left; width: 30%;">
                                                                         
                                                                         <?php  if($data_dukung->num_rows()  > 0 ){ ?>
                                                                            <?php if($this->session->userdata('role') == 2){?>
                                                                            <div class="form-group">
                                                                                <select class="form-control verifikasi" name="verifikasi" data-satker="<?php echo $data_dukung->row()->iduser?>" data-objek="<?php echo $data_dukung->row()->id_detail?>">
                                                                                    <?php if($data_dukung->row()->status == NULL || $data_dukung->row()->status == ''){?>
                                                                                    <option value="">Pilih Verifikasi</option>
                                                                                    <?php }?>
                                                                                    <option value="belum lengkap" <?php echo $data_dukung->row()->status == 'belum lengkap'? 'selected="selected"':'';?>  >Belum Lengkap</option>
                                                                                    <option value="lengkap" <?php echo $data_dukung->row()->status == 'lengkap'? 'selected="selected"':'';?>>Lengkap</option>
                                                                                </select>
                                                                            </div>
                                                                            <?php }else if($this->session->userdata('role') == 5){?>
                                                                                <?php if($data_dukung->row()->status == 'lengkap'){ ?>
                                                                                     <p  class="bg-success text-white p-3 rounded text-center"><i class="mdi mdi-check"></i> Lengkap</p>
                                                                                <?php }else if($data_dukung->row()->status == 'belum lengkap'){?>
                                                                                     <p  class="bg-warning text-white p-3 rounded text-center"><i class="mdi mdi-alert"></i> Belum Lengkap</p>
                                                                                <?php }else{ ?>
                                                                                     <p  class="bg-danger text-white p-3 rounded text-center"><i class="mdi mdi-remove"></i> Belum di Verifikasi</p>
                                                                                <?php }?>
                                                                                <hr />
                                                                            <?php }?>
                                                                             <ul class="existdatadukung<?php echo $dt_poin->iduser.$dt_poin->id_detail_wbk_user;?>">
                                                                            <?php $no= 1; foreach($data_dukung->result() as $dt_dukung){?>
                                                                                <li class="r<?php echo $dt_dukung->ID?>">
                                                                                 <a style="width: 100%;" target="_blank" class="text-dark" href="<?php echo $dt_dukung->path?>"><i class="mdi mdi-attachment menu-icon"></i> <?php echo $dt_dukung->caption?></a>
                                                                                 <?php if($data_dukung->row()->status != 'lengkap'){ ?>
                                                                                  &nbsp; <span class="mdi mdi-close menu-icon text-white bg-danger rounded dok-rem r<?php echo $dt_dukung->ID?>" data-ref="<?php echo $dt_dukung->ID?>"></span> 
                                                                                 <?php }?>
                                                                                
                                                                                </li>
                                                                            <?php $no++;}?>
                                                                             </ul>
                                                                          
                                                                         <?php }else{ ?>
                                                                           
                                                                                    <p class="alert alert-danger">Belum Upload Data Dukung</p>
                                                                                                                                         
                                                                         <?php }?>
                                                                            
                                                                          <?php $status_lengkap = modules::run('satker/wbk/get_status_penilaian', $dt_poin->id_detail_wbk_user)?>  
                                                                          <?php if($status_lengkap->row()->status != 'lengkap'){?>
                                                                              <?php if($this->session->userdata('role') == 5){?>
                                                                                     
                                                                                      
                                                                                        <div class="datapendukung<?php echo $dt_poin->iduser.$dt_poin->id_detail_wbk_user;?>">
                                                                                        
                                                                                        </div>
                                                                                        
                                                                                       <div class="input<?php echo $dt_poin->iduser.$dt_poin->id_detail_wbk_user;?>">
                                                                                           <input type="text" name="caption" value="" class="form-control mt-2 mb-2 caption<?php echo $dt_poin->iduser.$dt_poin->id_detail_wbk_user;?>" style="height: 30px;" placeholder="keterangan dokumen"  /> 
                                                                                           <input onchange="uploadFile(event,'<?php echo $dt_poin->iduser;?>','<?php echo $dt_poin->id_detail_wbk_user;?>','<?php echo $dt_poin->id_detail_wbk_user;?>' )" style="width: 70%;" class="btn btn-xs btn-primary data_pendukung<?php echo $dt_poin->iduser.$dt_poin->id_detail_wbk_user;?>" data-satker="" data-objek="<?php $dt_poin->id_detail;?>" type="file" name="userfile" />
                                                                                       </div>
                                                                                       <div style="display: none;"  class="spinner-border text-success spin<?php echo $dt_poin->iduser.$dt_poin->id_detail_wbk_user;?>" role="status">
                                                                                          <span class="sr-only">Loading...</span>
                                                                                       </div>
                                                                              
                                                                                  <?php }?>
                                                                          <?php } ?>
                                                                         
                                                                        
                                                                         
                                                                        
                                                                         
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4">
                                                                        <ul class="list-unstyled  p-2 rounded con_catatan<?php echo $dt_poin->id_detail_wbk_user?>">  
                                                                           <?php $catatan = modules::run('satker/pmprb/get_catatan',$dt_poin->id_detail_wbk_user)?>
                                                                          
                                                                          <?php foreach($catatan->result() as $dt_catatan){?>
                                                                          <li class="media my-2  p-1 bg-white rounded border ">
                                                                            <span class="bg-info rounded m-1">                    
                                                                                <img class="p-1" src="<?php echo base_url()?>/assets/image/account.png">                    
                                                                            </span>
                                                                            <div class="media-body ml-2">
                                                                               <div class="date"><small><b><?php echo ucwords($dt_catatan->pengirim)?></b> , <i><?php echo $dt_catatan->create_date?></i> </small></div> 
                                                                                <?php echo $dt_catatan->catatan;?>
                                                                            </div>   
                                                                          </li>
                                                                          <?php }?>
      
                                                                        </ul>
                                                                       
                                                                        <div class="form-group bg-white p-2 border">
                                                                            <label>Catatan :</label>
                                                                            <textarea class="form-control catatan<?php echo $dt_poin->id_detail_wbk_user?>" name="catatan<?php echo $dt_poin->id_detail_wbk_user;?>"  rows="2" ></textarea>
                                                                        </div>
                                                                        <button type="button" class="btn btn-xs btn-info catatan" data-satker="<?php echo $dt_poin->iduser?>" data-detail="<?php echo $dt_poin->id_detail_wbk_user?>">Kirim</button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                           </td>
                                                        </tr>
                                                        
                                                        <?php }?>
                                                    </table>
                                                </td>
                                            </tr>
                                            <?php }?>
                                     
                                       </table>
                                   </td>
                                   
                              </tr>
                           </td>
                            </tr>
                             <?php  $no++;}?>
                          
                      
                         
                         
                      
                      </tbody>
                    
                    </table>
                  </div>
                </div>
              </div>
            </div>