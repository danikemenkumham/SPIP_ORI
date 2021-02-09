<style>
    table th{
        font-size: 13px!important;
        padding: 8px 5px!important;
    }
     table td {
        font-size: 13px!important;
        padding: 5px!important;
    }
</style>

<section class="blog-lists-section ">
        <div class="container">
          <div class="row">
            
            <div class="col-md-12 grid-margin bg-in mb-4 ">
              <div class="d-flex justify-content-between flex-wrap bg-danger p-3 rounded">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5 text-white">
                    <h4 class="text-white">
                        Selamat Datang,
                    </h4>
                    <p class="mb-md-0">Dashboard  Elektronik Reformasi Birokrasi Kementerian Hukum dan Hak Asasi Manusia RI</p>
                  </div>
                </div>          
              </div>
            </div>
          
          </div>
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-body">
                 
                  <ul class="nav nav-pills nav-pills-success" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="pills-pmprb-tab" data-toggle="pill" href="#pills-pmprb" role="tab" aria-controls="pills-home" aria-selected="true"><b>LKP PMPRB</b></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-wbk-tab" data-toggle="pill" href="#pills-wbk" role="tab" aria-controls="pills-profile" aria-selected="false"><b>LKE WBK/WBBM</b></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-rkt-tab" data-toggle="pill" href="#pills-rkt" role="tab" aria-controls="pills-contact" aria-selected="false"><b>RKT</b></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link ikm-pil" id="pills-ikm-tab" data-toggle="pill" href="#pills-ikm" role="tab" aria-controls="pills-contact" aria-selected="false"><b>IKM</b></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link ipk-pil" id="pills-ipk-tab" data-toggle="pill" href="#pills-ipk" role="tab" aria-controls="pills-contact" aria-selected="false"><b>IPK</b></a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link integritas-pil" id="pills-integritas-tab" data-toggle="pill" href="#pills-integritas" role="tab" aria-controls="pills-contact" aria-selected="false"><b>INTEGRITAS</b></a>
                    </li>
                  </ul>
                  <hr />
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="pills-pmprb" role="tabpanel" aria-labelledby="pills-pmprb-tab">
                            <div class="row">
                                <div class="col-lg-5 ">
                                    <div class="card-body text-center p-0">
                                      <h4 class="card-title">Presentase LKP PMPRB Nasional</h4>
                                      <canvas id="doughnutChart" width="700" height="500" class="chartjs-render-monitor" ></canvas>
                                      <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    </div>
                                  
                                </div>
                                <div class="col-lg-7">
                                    <div class="card-body p-0">
                                       <h4 class="card-title align-middle text-center">Top 10 Satker Pemenuhan LKP PMPRB</h4>   
                                      <div class="table-responsive mt-3">
                                        <table class="table table-striped rounded"  width="100%" cellspacing="0">
                                              <thead class="text-white bg-info">
                                                <tr>
                                                  <th>No</th>
                                                  <th>Satuan Kerja</th>
                                                  <th>Pencapaian</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              <?php
                                                    $pmprb = modules::run('dashboard/pmprb_satker', 10);
                                                  
                                                  ?>
                                              <?php $no=1; foreach($pmprb->result() as $dt_satker){?>    
                                              <tr>
                                                  <td class="py-1 text-center"><?php echo $no?></td>
                                                  <td>
                                                    <a target="_blank" class="text-dark" href="#<?php //echo site_url('dashboard/satker/'.$dt_satker->SatkerID)?>">
                                                    <b><?php echo $dt_satker->Satker?></b>
                                                    </a>
                                                  </td>
                                                  <td style="width: 20%;">
                                                    <div class="progress progress-md" style="height: 15px;">
                                                        <?php $total = modules::run('dashboard/total_pmprb_satker', $dt_satker->SatkerID);?>
                                                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: <?php echo $total?>%" role="progressbar" aria-valuenow="<?php echo $total?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                      </div>
                                                  </td>
                                                </tr>
                                                <?php $no++;}?>
                                               
                                                                  
                                              </tbody>
                                            </table>
                                          </div>
                                          <hr />
                                      <div class=" mt-3">
                                        <!--
                                        <div class="text-right">
                                            <a class="btn-rounded btn-xs btn btn-info text-white" href="<?php echo site_url('dashboard/pmprb')?>">Lihat Semua Satuan Kerja</a>
                                        </div>
                                        -->
                                      </div>
                                    </div>
                                   
                                </div>
                            </div>
                    </div>
                    <div class="tab-pane fade" id="pills-wbk" role="tabpanel" aria-labelledby="pills-wbk-tab">
                            <div class="row">
                                <div class="col-lg-5 ">
                                 
                                    <div class="card-body text-center">
                                      <h4 class="card-title">Presentase LKE WBK/WBBM Nasional</h4>
                                      <canvas id="doughnutChartwbk" width="700" height="500" class="chartjs-render-monitor" ></canvas>
                                      <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    </div>
                                  
                                </div>
                                <div class="col-lg-7">
                                    <div class="card-body p-0">
                                       <h4 class="card-title align-middle text-center">Top 10 Satker Pemenuhan LKE WBK/WBBM</h4>   
                                      <div class="table-responsive mt-3">
                                        <table class="table table-striped rounded"  width="100%" cellspacing="0">
                                              <thead class="text-white bg-danger">
                                                <tr>
                                                  <th>No</th>
                                                  <th>Satuan Kerja</th>
                                                  <th>Pencapaian</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              <?php
                                                    $wbk = modules::run('dashboard/wbk_satker', 10);
                                                  
                                                  ?>
                                              <?php $no=1; foreach($wbk->result() as $dt_satker){?>    
                                              <tr>
                                                  <td class="py-1 text-center"><?php echo $no?></td>
                                                  <td><b><?php echo $dt_satker->Satker?></b></td>
                                                  <td style="width: 20%;">
                                                    <div class="progress progress-md" style="height: 15px;">
                                                        <?php $total = modules::run('dashboard/total_wbk_satker', $dt_satker->SatkerID);?>
                                                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: <?php echo $total?>%" role="progressbar" aria-valuenow="<?php echo $total?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                      </div>
                                                  </td>
                                                </tr>
                                                <?php $no++;}?>                  
                                              </tbody>
                                            </table>
                                          </div>
                                      <hr />
                                      <div class=" mt-3">
                                        <!--
                                        <div class="text-right">
                                            <a href="<?php echo site_url('dashboard/wbk')?>" target="_blank" class="btn-rounded btn-xs btn btn-danger text-white">Lihat Semua Satuan Kerja</a>
                                        </div>
                                        -->
                                      </div>
                                    </div>
                                   
                                </div>
                            </div>
                    </div>
                    <div class="tab-pane fade" id="pills-rkt" role="tabpanel" aria-labelledby="pills-rkt-tab">
                            <div class="row">
                                <div class="col-lg-5 ">
                                 
                                    <div class="card-body text-center">
                                      <h4 class="card-title">Presentase RKT Nasional</h4>
                                      <canvas id="doughnutChartrkt" width="700" height="500" class="chartjs-render-monitor" ></canvas>
                                      <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    </div>
                                  
                                </div>
                                <div class="col-lg-7">
                                    <div class="card-body p-0">
                                       <h4 class="card-title align-middle text-center">Top 10 Satker Pemenuhan RKT</h4>   
                                      <div class="table-responsive mt-3">
                                        <table class="table table-striped rounded"  width="100%" cellspacing="0">
                                              <thead class="text-white bg-dark">
                                                <tr>
                                                  <th>No</th>
                                                  <th>Satuan Kerja</th>
                                                  <th>Pencapaian</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              <?php
                                                    $rkt = modules::run('dashboard/rkt_satker', 10);
                                                  
                                                  ?>
                                              <?php $no=1; foreach($rkt->result() as $dt_satker){?>    
                                              <tr>
                                                  <td class="py-1 text-center"><?php echo $no?></td>
                                                  <td><b><?php echo $dt_satker->Satker?></b></td>
                                                  <td style="width: 20%;">
                                                    <div class="progress progress-md" style="height: 15px;">
                                                        <?php $total = modules::run('dashboard/total_rkt_satker', $dt_satker->SatkerID);?>
                                                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: <?php echo $total?>%" role="progressbar" aria-valuenow="<?php echo $total?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                      </div>
                                                  </td>
                                                </tr>
                                                <?php $no++;}?>
                                               
                                                                  
                                              </tbody>
                                            </table>
                                          </div>
                                          <hr />
                                       <div class=" mt-3">
                                        <!--
                                        <div class="text-right">
                                            <a href="<?php echo site_url('dashboard/rkt')?>" target="_blank" class="btn-rounded btn-xs btn btn-dark text-white">Lihat Semua Satuan Kerja</a>
                                        </div>
                                        -->
                                      </div>
                                    </div>
                                   
                                </div>
                            </div>
                    </div>
                     <div class="tab-pane fade show " id="pills-ikm" role="tabpanel" aria-labelledby="pills-ikm-tab">
                            <div class="text-center loader_">
                                <img src="<?php echo base_url()?>assets/image/loader.gif" />
                            </div>      
                            <div class="pills-ikm"></div>   
                     </div>
                      <div class="tab-pane fade  show" id="pills-ipk" role="tabpanel" aria-labelledby="pills-ipk-tab">
                             <div class="text-center loader_">
                                <img src="<?php echo base_url()?>assets/image/loader.gif" />
                            </div>      
                            <div class="pills-ipk"></div>   
                      </div>
                      
                      <div class="tab-pane fade" id="pills-integritas" role="tabpanel" aria-labelledby="pills-integritas-tab">
                         <div class="text-center loader_">
                                <img src="<?php echo base_url()?>assets/image/loader.gif" />
                            </div>      
                            <div class="pills-integritas"></div>  
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
 </div>
 </section> 
 


<!-- Modal -->
<div class="modal fade" id="modal_" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">   
        <div class="text-center loader">
            <img src="<?php echo base_url()?>assets/image/loader.gif" />
        </div>   
        <div class="con-modal">
        </div>                              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Kembali</button>
       
      </div>
    </div>
  </div>
</div>            

          