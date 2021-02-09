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
    $kategori_penilaian = modules::run('satker/pmprb/get_kategori_penilaian', $this->uri->segment(4), $satker);
?>
<div class="col-lg-12 mb-3">
    <nav aria-label="breadcrumb bg-primary">
      <ol class="breadcrumb">
          <?php if($this->session->userdata('role') == 5){ ?>
                           <li class="breadcrumb-item"><a href="<?php echo site_url('satker/pmprb/area/'.$this->session->userdata('tahun'));?>">PMRPB</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('satker/pmprb/poin/'.$pmprb->row()->id_area)?><?php echo $this->uri->segment(5) != NULL ? '/'.$this->uri->segment(5):''?>"><?php echo ucwords($pmprb->row()->nama_area)?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo current_url()?>"><?php echo ucwords($kategori_penilaian->row()->kategori_penilaian)?></a></li>
           <?php  }else{?>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('satker/pmprb/satker/'.$this->session->userdata('tahun'))?>">SATKER</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo site_url('satker/pmprb/area/'.$this->session->userdata('tahun').'/'.$this->uri->segment(5))?>">PMRPB</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo site_url('satker/pmprb/poin/'.$pmprb->row()->id_area)?><?php echo $this->uri->segment(5) != NULL ? '/'.$this->uri->segment(5):''?>"><?php echo ucwords($pmprb->row()->nama_area)?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo current_url()?>"><?php echo ucwords($kategori_penilaian->row()->kategori_penilaian)?></a></li>
           <?php }?>
      
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
                         
                          <th class="text-center bg-info text-white">
                          
                           Penilaian PMPRB <?php echo modules::run('satker/pmprb/get_satker', $satker)?>
                          </th>
                          
                       
                        </tr>
                      </thead>
                         <tbody>
                         
                          <?php $no=1; foreach($pmprb->result() as $dt_pmprb){?>
                           <tr>
                            <td class=" text-center text-dark"><span class="badge badge-success rounded"><b class="h4">Area Perubahan : <?php echo  ucwords(strtolower($dt_pmprb->nama_area));?></b></span>
                           </tr>
                           <tr>     
                                <td class="p-0">
                                        <table class="table"  >    
                                            
                                            <?php
                                            
                                            foreach($kategori_penilaian->result() as $dt_kategori){
                                            ?>
                                            
                                            <tr >
                                                <td>
                                                     <h5 class="bg-warning p-2 rounded">Kategori Penilaian : <?php echo $dt_kategori->kategori_penilaian;?></h5>
                                                     <?php 
                                                            if($this->session->userdata('role') == '5'){
                                                                $satker = $this->session->userdata('satker');
                                                           }else{
                                                                 $last_uri = $this->uri->segment_array();
                                                                 $satker = $last_uri[count($last_uri)];
                                                           }   
                                                          echo modules::run('satker/pmprb/count_pmprb', $dt_kategori->id_pmprb,$satker);
                                                          ?>
                                                    <table class="table mt-2" >
                                                        <?php $poin_penilaian = modules::run('satker/pmprb/get_poin_penilaian', $dt_kategori->id_pmprb, $satker);  ?>
                                                        <?php  foreach($poin_penilaian->result() as $dt_poin){?>
                                                        
                                                        <tr>
                                                            <td class="p-0" style="border:0px!important" >
                                                              <?php $data_dukung = modules::run('satker/pmprb/get_data_dukung', $dt_poin->id_detail_pmprb_user)?>
                                                               <?php if($data_dukung->num_rows() > 0){?>
                                                                    <table class="table mt-3 poins" style="background-color: #<?php echo $data_dukung->row()->status != 'lengkap' ? 'ffeeee':'F7F7F7'?>;">
                                                                <?php }else{?>
                                                                    <table class="table mt-3 poins" style="background-color: #F7F7F7;">
                                                                <?php }?>  
                                                                <tr class="bg-<?php echo $dt_poin->jenis_lkp == 'pusat' ? 'danger':'dark'; ?> text-white">
                                                                    <th>Poin Penilaian</th>
                                                                    <th>Petunjuk Teknis</th>
                                                                    <th>Data Dukung</th>
                                                                    <th>Upload Daduk</th>
                                                                </tr>
                                                                <tr >
                                                                    <td style="width: 30%;"><p><?php echo $dt_poin->objek_penilaian?> </p></td>
                                                                    <td style="width: 20%;"><p><?php echo nl2br($dt_poin->penjelasan)?></p></td>
                                                                     <td style="width: 20%;"><p><?php echo nl2br($dt_poin->data_dukung)?></p></td>
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
                                                                             <ul class="existdatadukung<?php echo $dt_poin->iduser.$dt_poin->id_detail_pmprb_user;?>">
                                                                            <?php $no= 1; foreach($data_dukung->result() as $dt_dukung){?>
                                                                                <li class="r<?php echo $dt_dukung->ID?>">
                                                                                 <a style="width: 100%;" target="_blank" class="text-dark" href="<?php echo $dt_dukung->path?>"><i class="mdi mdi-attachment menu-icon"></i> <?php echo $dt_dukung->caption?></a> 
                                                                                 <?php if($this->session->userdata('role') == 5){?> 
                                                                                  <?php if($data_dukung->row()->status != 'lengkap'){ ?>
                                                                                  &nbsp; <span class="mdi mdi-close menu-icon text-white bg-danger rounded dok-rem r<?php echo $dt_dukung->ID?>" data-ref="<?php echo $dt_dukung->ID?>"></span> 
                                                                                 <?php }?>
                                                                                 <?php }?>   
                                                                                </li>
                                                                            <?php $no++;}?>
                                                                             </ul>
                                                                          
                                                                         <?php }else{ ?>
                                                                                    <p class="alert alert-danger">Belum Upload Data Dukung</p>
                                                                                                                                         
                                                                         <?php }?>
                                                                            
                                                                          <?php $status_lengkap = modules::run('satker/pmprb/get_status_penilaian', $dt_poin->id_detail_pmprb_user)?>  
                                                                          <?php if($status_lengkap->row()->status != 'lengkap'){?>
                                                                              <?php if($this->session->userdata('role') == 5){?>
                                                                                     
                                                                                      <!--<p class="data_pendukung<?php echo $dt_poin->iduser.$dt_poin->id_detail_pmprb_user;?>">Upload Data Dukung </p>
                                                                                      <hr />
                                                                                      -->
                                                                                        <div class="datapendukung<?php echo $dt_poin->iduser.$dt_poin->id_detail_pmprb_user;?>">
                                                                                        
                                                                                        </div>
                                                                                        
                                                                                       <div class="input<?php echo $dt_poin->iduser.$dt_poin->id_detail_pmprb_user;?>">
                                                                                           <input type="text" name="caption" value="" class="rounded form-control mt-2 mb-2 caption<?php echo $dt_poin->iduser.$dt_poin->id_detail_pmprb_user;?>" style="height: 35px;" placeholder="keterangan dokumen"  /> 
                                                                                           <input onchange="uploadFile(event,'<?php echo $dt_poin->iduser;?>','<?php echo $dt_poin->id_detail_pmprb_user;?>','<?php echo $dt_poin->id_detail_pmprb_user;?>' )" style="width: 70%;" class="btn btn-xs btn-primary data_pendukung<?php echo $dt_poin->iduser.$dt_poin->id_detail_pmprb_user;?>" data-satker="" data-objek="<?php $dt_poin->id_detail;?>" type="file" name="userfile" />
                                                                                       </div>
                                                                                       <div style="display: none;"  class="spinner-border text-success spin<?php echo $dt_poin->iduser.$dt_poin->id_detail_pmprb_user;?>" role="status">
                                                                                          <span class="sr-only">Loading...</span>
                                                                                       </div>
                                                                                       <br />
                                                                                       <em class="badge badge-secondary rounded"><small> jpg | png | word | excel | pdf | zip/rar | Max 50 Mb</small></em> <br />
                                                                                       
                                                                                  <?php }?>
                                                                          <?php } ?> 
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4">
                                                                        
                                                                        <ul class="list-unstyled con_catatan<?php echo $dt_poin->id_detail_pmprb_user?>">  
                                                                           <?php $catatan = modules::run('satker/pmprb/get_catatan',$dt_poin->id_detail_pmprb_user)?>
                                                                          
                                                                          <?php foreach($catatan->result() as $dt_catatan){?>
                                                                          <li class="media my-2  p-1 bg-white rounded border">
                                                                                                
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
                                                                            <textarea class="form-control catatan<?php echo $dt_poin->id_detail_pmprb_user?>" name="catatan<?php echo $dt_poin->id_detail_pmprb_user;?>"  rows="2" ></textarea>
                                                                        </div>
                                                                        <button type="button" class="btn btn-xs btn-info catatan" data-satker="<?php echo $dt_poin->iduser?>" data-detail="<?php echo $dt_poin->id_detail_pmprb_user?>">Kirim Catatan</button>
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