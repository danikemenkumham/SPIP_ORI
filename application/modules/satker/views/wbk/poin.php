<style>

    td{
        text-align: left;
        vertical-align: top!important;
        font-size: 12px!important;
    }
    .poin td{
         border-color: #D1D1D1!important;
    }
    .poin:hover{
        cursor: pointer;
        background-color: #AEE4FF;
        border-color: #7B7B80;
    }
</style>
<div class="col-lg-12 mb-3">
        
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <?php if($this->session->userdata('role') == 5){ ?>
                       <li class="breadcrumb-item"><a href="<?php echo site_url('satker/wbk/area/'.$this->session->userdata('tahun'))?>">WBK/WBBM</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo current_url()?>"><?php echo ucwords($poin->row()->nama_area)?></a></li>
           <?php  }else{?>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('satker/wbk/satker/'.$this->session->userdata('tahun'))?>">SATKER</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo site_url('satker/wbk/area/'.$this->session->userdata('tahun').'/'.$this->uri->segment(5))?>">WBK/WBBM</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo current_url()?>"><?php echo ucwords($poin->row()->nama_area)?></a></li>
           <?php }?>
            
            
          
          </ol>
        </nav>
        
         <h4 class="text-center bg-dark p-3 text-white mb-3">Indikator <?php echo ucwords($poin->row()->nama_area)?></h4>
<div class="row">
<?php  foreach($poin->result() as $dt_poin){?>
<div class="col-lg-4 grid-margin stretch-card">
    <?php
                $last_uri = $this->uri->segment_array();
               
              ?>
  <div class="card rounded poin" style="width: 18rem;" data-satker="<?php echo $last_uri[count($last_uri)];?>" data-ref="<?php echo $dt_poin->id_wbk?>">
      <div class="card-body text-center p-3 bg-warning rounded">
          <?php
               if($this->session->userdata('role') == '5'){
                    $satker = $this->session->userdata('satker');
               }else{
                     $last_uri = $this->uri->segment_array();
                     $satker = $last_uri[count($last_uri)];
               }    
               
              ?>  
          <?php 
          $new_upload =  modules::run('satker/wbk/count_lke_poin_upload_new', $dt_poin->id_wbk,$satker);
          if($new_upload != 0){
            echo ' <div class="badge badge-pill badge-light" style="position: absolute; right: 5px; top:5px"><b>'.$new_upload.'</b></div>';
          }
          ?>
        <img style="width: 64px;" src="<?php echo base_url()?>assets/image/target.png" class="img-fluid" />
        <h4 class="card-title align-middle mt-4"><?php echo $dt_poin->indikator?></h4>
        <hr />
        
         <?php
              if($this->session->userdata('role') == '5'){
                    $satker = $this->session->userdata('satker');
               }else{
                     $last_uri = $this->uri->segment_array();
                     $satker = $last_uri[count($last_uri)];
               }  
             echo modules::run('satker/wbk/count_lke', $dt_poin->id_wbk,$satker);
         ?>
      </div>
    </div>
</div>
<?php }?>
</div>
</div>  
