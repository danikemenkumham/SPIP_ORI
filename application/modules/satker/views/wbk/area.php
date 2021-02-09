<style>

    td{
        text-align: left;
        vertical-align: top!important;
        font-size: 12px!important;
    }
    .poin td{
         border-color: #D1D1D1!important;
    }
    .area:hover{
        cursor: pointer;
        background-color: #AEE4FF;
        border-color: #7B7B80;
    }
</style>
<div class="col-lg-12 mb-3">
       
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <?php if($this->session->userdata('role') == 5){ ?>
                    <li class="breadcrumb-item"><a href="<?php echo current_url()?>">WBK/WBBM</a></li>
           <?php  }else{?>
                    <li class="breadcrumb-item"><a href="<?php echo site_url('satker/wbk/satker/'.$this->session->userdata('tahun'))?>">SATKER</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo current_url()?>">WBK/WBBM</a></li>
           <?php }?>
            
          </ol>
        </nav>
        
         <h4 class="text-center bg-info p-3 text-white mb-3 rounded">AREA PERUBAHAN WBK/WBBM</h4>
        <div class="row">
            <?php foreach($area->result() as $dt_area){ ?>
            <div class="col-lg-4 grid-margin stretch-card">
              <?php
               if($this->session->userdata('role') == '5'){
                    $satker = $this->session->userdata('satker');
               }else{
                     $last_uri = $this->uri->segment_array();
                     $satker = $last_uri[count($last_uri)];
               }    
               
              ?>  
              <div class="card rounded area" data-satker="<?php echo $satker;?>" data-ref="<?php echo $dt_area->id_area?>">
                  <div class="card-body text-center p-2 bg-danger rounded">
                      <?php 
                      $new_upload =  modules::run('satker/wbk/count_lke_area_upload_new', $dt_area->id_area,$satker);
                      if($new_upload != 0){
                        echo ' <div class="badge badge-pill badge-light" style="position: absolute; right: 5px; top:5px"><b>'.$new_upload.'</b></div>';
                      }
                      ?>
                   
                    <img style="width: 64px;" src="<?php echo base_url()?>assets/image/task.png" class="img-fluid" />
                    <h4 class="card-title align-middle mt-4 text-white"><?php echo $dt_area->nama_area?></h4>
                    <hr />
                    <?php 
                       
                      echo modules::run('satker/wbk/count_lke_area', $dt_area->id_area,$satker);
                      ?>
                  </div>
                </div>
            </div>
            <?php }?>
        </div>
</div>  