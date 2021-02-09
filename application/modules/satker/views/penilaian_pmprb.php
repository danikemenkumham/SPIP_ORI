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
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('satker/pmprb/area/'.date('Y'))?>">PMRPB</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('satker/pmprb/poin/'.$pmprb->row()->id_area)?><?php echo $this->uri->segment(5) != NULL ? '/'.$this->uri->segment(5):''?>"><?php echo ucwords($pmprb->row()->nama_area)?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo current_url()?>"><?php echo ucwords($pmprb->row()->kategori_penilaian)?></a></li>
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
                          
                           Penilaian PMPRB <?php echo  $pmprb->row()->Satker?>
                          </th>
                          
                       
                        </tr>
                      </thead>
                         <tbody>
                         
                          <?php $no=1; foreach($pmprb->result() as $dt_pmprb){?>
                           <tr>
                            
                            <td style="font-size: 15px!important; font-weight: bold;"><?php echo $no.'. '. $dt_pmprb->nama_area;?>
                           </tr>
                           <tr>     
                               
                                    <td class="p-0">
                                        <table class="table"  >    
                                            
                                            <tr >
                                                <td>
                                                    <b class="bg-warning p-2"><?php echo $pmprb->row()->kategori_penilaian;?></b>
                                                    <table class="table mt-2" >
                                                    
                                                        <tr>
                                                            <td class="p-0" style="border:0px!important" >
                                                            <table class="table mt-3 poins" style="background-color: #F7F7F7;">
                                                                <tr >
                                                                    <td style="width: 30%;"><p><?php echo $pmprb->row()->objek_penilaian?></p></td>
                                                                    <td style="width: 50%;"><p><?php echo nl2br($pmprb->row()->penjelasan)?></p></td>
                                                                    <td style="text-align: left; width: 20%;">
                                                                         <?php $data_dukung = modules::run('satker/pmprb/get_data_dukung', $pmprb->row()->id_detail_pmprb_user)?>
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
                                                                                     <p  class="bg-success text-white p-1 rounded text-center"><i class="mdi mdi-check"></i> Lengkap</p>
                                                                                <?php }else if($data_dukung->row()->status == 'belum lengkap'){?>
                                                                                     <p  class="bg-warning text-white p-1 rounded text-center"><i class="mdi mdi-alert"></i> Belum Lengkap</p>
                                                                                <?php }else{ ?>
                                                                                     <p  class="bg-danger text-white p-1 rounded text-center"><i class="mdi mdi-remove"></i> Belum di Verifikasi</p>
                                                                                <?php }?>
                                                                                <hr />
                                                                            <?php }?>
                                                                             <ul class="existdatadukung<?php echo $pmprb->row()->iduser.$pmprb->row()->id_detail_pmprb_user;?>">
                                                                            <?php $no= 1; foreach($data_dukung->result() as $dt_dukung){?>
                                                                                <li>
                                                                                 <a style="width: 100%;" target="_blank" class="text-dark" href="<?php echo $dt_dukung->path?>"><i class="mdi mdi-attachment menu-icon"></i> <?php echo $dt_dukung->caption?></a> 
                                                                                </li>
                                                                            <?php $no++;}?>
                                                                             </ul>
                                                                          
                                                                         <?php }else{ ?>
                                                                                    <p class="alert alert-danger">Belum Upload Data Dukung</p>                                                   
                                                                         <?php }?>
                                                                            
                                                                          <?php $status_lengkap = modules::run('satker/pmprb/get_status_penilaian', $pmprb->row()->id_detail_pmprb_user)?>  
                                                                          <?php if($status_lengkap->row()->status != 'lengkap'){?>
                                                                              <?php if($this->session->userdata('role') == 5){?>
                                                                           
                                                                                        <div class="datapendukung<?php echo $pmprb->row()->iduser.$pmprb->row()->id_detail_pmprb_user;?>">
                                                                                        
                                                                                        </div>
                                                                                        
                                                                                       <div class="input<?php echo $pmprb->row()->iduser.$pmprb->row()->id_detail_pmprb_user;?>">
                                                                                           <input type="text" name="caption" value="" class="form-control mt-2 mb-2 caption<?php echo $pmprb->row()->iduser.$pmprb->row()->id_detail_pmprb_user;?>" style="height: 30px;" placeholder="keterangan dokumen"  /> 
                                                                                           <input onchange="uploadFile(event,'<?php echo $pmprb->row()->iduser;?>','<?php echo $pmprb->row()->id_detail_pmprb_user;?>','<?php echo $pmprb->row()->id_detail_pmprb_user;?>' )" style="width: 70%;" class="btn btn-xs btn-primary data_pendukung<?php echo $pmprb->row()->iduser.$pmprb->row()->id_detail_pmprb_user;?>" data-satker="" data-objek="<?php $pmprb->row()->id_detail;?>" type="file" name="userfile" />
                                                                                       </div>
                                                                                       <div style="display: none;"  class="spinner-border text-success spin<?php echo $pmprb->row()->iduser.$pmprb->row()->id_detail_pmprb_user;?>" role="status">
                                                                                          <span class="sr-only">Loading...</span>
                                                                                       </div>
                                                                              
                                                                                  <?php }?>
                                                                          <?php } ?>
                                                                         
                                                                        
                                                                         
                                                                        
                                                                         
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3">
   
                                                                        <ul class="list-unstyled con_catatan<?php echo $pmprb->row()->iduser.''.$pmprb->row()->id_detail_pmprb_user?>">  
                                                                           <?php $catatan = modules::run('satker/pmprb/get_catatan',$pmprb->row()->id_detail_pmprb_user)?>
                                                                          
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
                                                                            <textarea class="form-control catatan<?php echo $pmprb->row()->id_detail_pmprb_user?>" name="catatan<?php echo $pmprb->row()->id_detail_pmprb_user?>"  rows="2" ></textarea>
                                                                        </div>
                                                                        <button type="button" class="btn btn-xs btn-info catatan" data-satker="<?php echo $pmprb->row()->SatkerID?>" data-detail="<?php echo $pmprb->row()->id_detail_pmprb_user?>">Kirim</button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                           </td>
                                                        </tr>
                                                       
                                                    </table>
                                                </td>
                                            </tr>
                                           
                                     
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