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
            <li class="breadcrumb-item"><a href="<?php echo current_url()?>">Laporan Pelaksanaan RB</a></li>
          </ol>
        </nav>
        
         <h4 class="text-center bg-dark p-3 text-white mb-3">Tahun Kegiatan</h4>
        
        
        <div class="row">
            <div class="col-md-3 ">
                 <a href="<?php echo site_url('satker/laporan/listlaporan?tahun=2020&satker='.$this->input->get('satker'))?>">
                    <div class="card bg-info rounded">
                        <div class="card-body text-center">
                            <img style="width: 64px;" src="<?php echo base_url()?>assets/image/laporan.png" class="img-fluid text-center" />
                            <hr />
                            <span class="text-white"><b>2020</b></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
</div>  