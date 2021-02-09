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
    $kategori_penilaian = modules::run('satker/rkt/get_kategori_penilaian', $this->uri->segment(4), $satker);
    //print_r($kategori_penilaian->result());
?>
<div class="col-lg-12 mb-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('satker/rkt/area/'.date('Y'))?>">WBK/WBBM</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('satker/rkt/poin/'.$rkt->row()->id_area)?><?php echo $this->uri->segment(5) != NULL ? '/'.$this->uri->segment(5):''?>"><?php echo ucwords($rkt->row()->nama_area)?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo current_url()?>"><?php echo ucwords($kategori_penilaian->row()->kegiatan)?></a></li>
      </ol>
    </nav>
       
</div>  
<div class="col-lg-12 grid-margin stretch-card">
   
              <div class="card">
                <div class="card-body">
                  
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                         
                          <th class="text-center">
                          
                           LKE WBK/WBBM <?php echo modules::run('satker/rkt/get_satker', $satker)?>
                          </th>
                          
                       
                        </tr>
                      </thead>
                         <tbody>
                         
                          <?php $no=1; foreach($rkt->result() as $dt_rkt){?>
                           <tr>
                            
                            <td style="font-size: 15px!important; font-weight: bold;"><?php echo $no.'. '. $dt_rkt->nama_area;?>
                           </tr>
                           <tr>     
                               
                                    <td class="p-0">
                                        <table class="table"  >    
                                            <?php
                                            
                                            foreach($kategori_penilaian->result() as $dt_kategori){
                                            ?>
                                            <tr >
                                                <td>
                                                    <b class="bg-warning p-2"><?php echo $dt_kategori->kegiatan;?></b>
                                                    <table class="table mt-2" >
                                                        <?php $poin_penilaian = modules::run('satker/rkt/get_poin_penilaian', $dt_kategori->id_rkt, $satker);  ?>
                                                        <?php  foreach($poin_penilaian->result() as $dt_poin){?>
                                                       
                                                        <tr>
                                                            <td class="p-0" style="border:0px!important" >
                                                            <table class="table mt-3 poins" style="background-color: #F7F7F7;">
                                                                 <tr>
                                                                    <td>Kegiatan</td>
                                                                    <td>Indikator Keberhasilan</td>
                                                                    <td>Data Dukung</td>
                                                                    <td>Target</td>
                                                                    <td>Upload Daduk</td>
                                                                   
                                                                </tr>
                                                                <tr >
                                                                    <td style="width: 25%;"><p><?php echo $dt_poin->kegiatan?></p></td>
                                                                    <td style="width: 25%;"><p><?php echo nl2br($dt_poin->indikator_keberhasilan)?></p></td>
                                                                    <td style="width: 25%;"><p><?php echo nl2br($dt_poin->daduk)?></p></td>
                                                                     <td style="width: 5%;"><b><p><?php echo nl2br($dt_poin->waktu_pelaksanaan)?></p></b></td>
                                                                    <td style="text-align: left; width: 20%;">
                                                                         <?php $data_dukung = modules::run('satker/rkt/get_data_dukung', $dt_poin->id_pelaksanaan)?>
                                                                         <?php  if($data_dukung->num_rows()  > 0 ){ ?>
                                                                            <?php if($this->session->userdata('role') == 2){?>
                                                                            <div class="form-group">
                                                                                <select class="form-control verifikasi" name="verifikasi" data-satker="<?php echo $data_dukung->row()->iduser?>" data-objek="<?php echo $data_dukung->row()->id_pelaksanaan?>">
                                                                                    <?php if($data_dukung->row()->status == NULL || $data_dukung->row()->status == ''){?>
                                                                                    <option value="">Pilih Verifikasi</option>
                                                                                    <?php }?>
                                                                                    <option value="belum lengkap" <?php echo $data_dukung->row()->status == 'belum lengkap'? 'selected="selected"':'';?>  >Belum Lengkap</option>
                                                                                    <option value="lengkap" <?php echo $data_dukung->row()->status == 'lengkap'? 'selected="selected"':'';?>>Lengkap</option>
                                                                                </select>
                                                                            </div>
                                                                            <?php }else if($this->session->userdata('role') == 5){?>
                                                                                <?php if($data_dukung->row()->status == 'lengkap'){ ?>
                                                                                     <p  class="bg-success text-white p-1 rounded text-center"><i class="mdi mdi-check"></i> Lengkap</p>
                                                                                <?php }else if($data_dukung->row()->status == 'belum lengkap'){?>
                                                                                     <p  class="bg-warning text-white p-1 rounded text-center"><i class="mdi mdi-alert"></i> Belum Lengkap</p>
                                                                                <?php }else{ ?>
                                                                                     <p  class="bg-danger text-white p-1 rounded text-center"><i class="mdi mdi-remove"></i> Belum di Verifikasi</p>
                                                                                <?php }?>
                                                                                <hr />
                                                                            <?php }?>
                                                                             <ul class="existdatadukung<?php echo $dt_poin->iduser.$dt_poin->id_pelaksanaan;?>">
                                                                            <?php $no= 1; foreach($data_dukung->result() as $dt_dukung){?>
                                                                                <li>
                                                                                 <a style="width: 100%;" target="_blank" class="text-dark" href="<?php echo $dt_dukung->path?>"><i class="mdi mdi-attachment menu-icon"></i> <?php echo $dt_dukung->caption?></a> 
                                                                                </li>
                                                                            <?php $no++;}?>
                                                                             </ul>
                                                                          
                                                                         <?php }else{ ?>
                                                                           
                                                                                    <p class="alert alert-danger">Belum Upload Data Dukung</p>
                                                                                                                                         
                                                                         <?php }?>
                                                                            
                                                                          <?php $status_lengkap = modules::run('satker/rkt/get_status_penilaian', $dt_poin->id_pelaksanaan)?>  
                                                                          <?php if($status_lengkap->row()->status != 'lengkap'){?>
                                                                              <?php if($this->session->userdata('role') == 5){?>
                                                                                     
                                                                                      <!--<p class="data_pendukung<?php echo $dt_poin->iduser.$dt_poin->id_pelaksanaan;?>">Upload Data Dukung </p>
                                                                                      <hr />
                                                                                      -->
                                                                                        <div class="datapendukung<?php echo $dt_poin->iduser.$dt_poin->id_pelaksanaan;?>">
                                                                                        
                                                                                        </div>
              
                                                                                       <div class="input<?php echo $dt_poin->iduser.$dt_poin->id_pelaksanaan;?>">
                                                                                           <input type="text" name="caption" value="" class="form-control mt-2 mb-2 caption<?php echo $dt_poin->iduser.$dt_poin->id_pelaksanaan;?>" style="height: 30px;" placeholder="keterangan dokumen"  /> 
                                                                                           <input onchange="uploadFile(event,'<?php echo $dt_poin->iduser;?>','<?php echo $dt_poin->id_pelaksanaan;?>','<?php echo $dt_poin->id_rkt;?>' )" style="width: 70%;" class="btn btn-xs btn-primary data_pendukung<?php echo $dt_poin->iduser.$dt_poin->id_pelaksanaan;?>" data-satker="" data-objek="<?php $dt_poin->id_rkt;?>" type="file" name="userfile" />
                                                                                       </div>
                                                                                       <div style="display: none;"  class="spinner-border text-success spin<?php echo $dt_poin->iduser.$dt_poin->id_pelaksanaan;?>" role="status">
                                                                                          <span class="sr-only">Loading...</span>
                                                                                       </div>
                                                                              
                                                                                  <?php }?>
                                                                          <?php } ?>
                                                                         
                                                                        
                                                                         
                                                                        
                                                                         
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5">
                                                                        
                                                                        <ul class="list-unstyled con_catatan<?php echo $dt_poin->id_rkt_user?>">  
                                                                           <?php $catatan = modules::run('satker/pmprb/get_catatan',$dt_poin->id_rkt_user)?>
                                                                          
                                                                          <?php foreach($catatan->result() as $dt_catatan){?>
                                                                          <li class="media my-2  p-1 bg-white border-rounded">
                                                                                                
                                                                            <img class="p-2" src="<?php echo base_url()?>/assets/image/account.png">                    
                                                                            <div class="media-body ">
                                                                              
                                                                               <div class="date"><small><b><?php echo ucwords($dt_catatan->pengirim)?></b> , <i><?php echo $dt_catatan->create_date?></i> </small></div> 
                                                                                <?php echo $dt_catatan->catatan;?>
                                                                            </div>   
                                                                          </li>
                                                                          <?php }?>
      
                                                                        </ul>
                                                                       
                                                                        <div class="form-group">
                                                                            <label>Catatan :</label>
                                                                            <textarea class="form-control catatan<?php echo $dt_poin->id_rkt_user?>" name="catatan<?php echo $dt_poin->id_rkt_user;?>"  rows="2" ></textarea>
                                                                        </div>
                                                                        <button type="button" class="btn btn-xs btn-info catatan" data-satker="<?php echo $dt_poin->iduser?>" data-detail="<?php echo $dt_poin->id_rkt_user?>">Kirim</button>
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