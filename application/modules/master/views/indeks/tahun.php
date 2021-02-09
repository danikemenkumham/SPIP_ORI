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
            <div class="col-md-3">
                <a href="<?php echo site_url('master/indeks/komponen/'.$this->uri->segment(4).'?year=2017')?>">
                    <div class="card">
                        <div class="card-body text-center">
                            2017
                        </div>
                    </div>
                </a>
            </div>
                
             <div class="col-md-3">
                <a href="<?php echo site_url('master/indeks/komponen/'.$this->uri->segment(4).'?year=2018')?>">
                    <div class="card">
                        <div class="card-body text-center">
                            2018
                        </div>
                    </div>
                </a>
            </div>
            
             <div class="col-md-3">
                 <a href="<?php echo site_url('master/indeks/komponen/'.$this->uri->segment(4).'?year=2019')?>">
                    <div class="card">
                        <div class="card-body text-center">
                            2019
                        </div>
                    </div>
                </a>
            </div>
             <div class="col-md-3">
                 <a href="<?php echo site_url('master/indeks/komponen/'.$this->uri->segment(4).'?year=2020')?>">
                    <div class="card">
                        <div class="card-body text-center">
                            2020
                        </div>
                    </div>
                </a>
            </div>
            
        </div>
</div>  