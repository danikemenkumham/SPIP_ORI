<style>
    table th{
        font-size: 12px!important;
        padding: 8px 5px!important;
    }
     table td {
        font-size: 12px!important;
        padding: 5px!important;
    }
</style>

          <div class="row">
            
            <div class="col-md-12 grid-margin bg-in ">
              <div class="d-flex justify-content-between flex-wrap bg-success p-3 rounded">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5 text-white">
                    <h4>
                        Selamat Datang,
                    </h4>
                    <p class="mb-md-0">Dashboard  Elektronik Reformasi Birokrasi Kemenkumham RI</p>
                  </div>
                </div>          
              </div>
            </div>
          
          </div>

          
          <!--
          
          <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Total Satker</h4>
                      <div class="d-flex justify-content-between">
                        <p class="text-muted">Avg. Session</p>
                        <p class="text-muted">max: 40</p>
                      </div>
                      <div class="progress progress-md">
                        <div class="progress-bar bg-info w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">PMPRB</h4>                      
                    
                      <div class="d-flex justify-content-between">
                        <p class="text-muted">Data Lengkap</p>
                        <p class="text-muted"><b>1400</b></p>
                      </div>
                       <div class="progress progress-md">
                        <div class="progress-bar bg-warning w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      
                       <div class="d-flex justify-content-between mt-3">
                        <p class="text-muted">Data Belum Lengkap</p>
                        <p class="text-muted"><b>1400</b></p>
                      </div>
                      
                      <div class="progress progress-md">
                        <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Pending Product</h4>
                      <div class="d-flex justify-content-between">
                        <p class="text-muted">Avg. Session</p>
                        <p class="text-muted">max: 54</p>
                      </div>
                      <div class="progress progress-md">
                        <div class="progress-bar bg-danger w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Sales</h4>
                      <div class="d-flex justify-content-between">
                        <p class="text-muted">Avg. Session</p>
                        <p class="text-muted">max: 143</p>
                      </div>
                      <div class="progress progress-md">
                        <div class="progress-bar bg-warning w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              -->
              
          <div class="row">
             <div class="col-lg-12">
                <div class="card rounded">
                    <div class="row">
                        <div class="col-lg-5 ">
                         
                            <div class="card-body text-center">
                              <h4 class="card-title">Presentase LKP PMPRB Nasional</h4>
                              <canvas id="doughnutChart" width="700" height="500" class="chartjs-render-monitor" ></canvas>
                              <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            </div>
                          
                        </div>
                        <div class="col-lg-7">
                            <div class="card-body ">
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
                                          <td class="py-1"><?php echo $no?></td>
                                          <td>
                                            <a target="_blank" class="text-dark" href="<?php echo site_url('dashboard/satker/'.$dt_satker->SatkerID)?>">
                                            <?php echo $dt_satker->Satker?>
                                            </a>
                                          </td>
                                          <td style="width: 20%;">
                                            <div class="progress progress-md" style="height: 15px;">
                                                <?php $total = modules::run('dashboard/total_pmprb_satker', $dt_satker->SatkerID);?>
                                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: <?php echo $total?>%" role="progressbar" aria-valuenow="<?php echo $total?>" aria-valuemin="0" aria-valuemax="100"><?php echo $total?>%</div>
                                              </div>
                                          </td>
                                        </tr>
                                        <?php $no++;}?>
                                       
                                                          
                                      </tbody>
                                    </table>
                                  </div>
                                  <hr />
                              <div class=" mt-3">
                                <div class="text-right">
                                    <a class="btn-rounded btn-xs btn btn-info text-white" href="<?php echo site_url('dashboard/pmprb')?>">Lihat Semua Satuan Kerja</a>
                                </div>
                              </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
             </div>
             
          </div>
          
          
          <div class="row mt-3">
             <div class="col-lg-12">
                <div class="card rounded">
                    <div class="row">
                        <div class="col-lg-5 ">
                         
                            <div class="card-body text-center">
                              <h4 class="card-title">Presentase LKE WBK/WBBM Nasional</h4>
                              <canvas id="doughnutChartwbk" width="700" height="500" class="chartjs-render-monitor" ></canvas>
                              <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            </div>
                          
                        </div>
                        <div class="col-lg-7">
                            <div class="card-body ">
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
                                          <td class="py-1"><?php echo $no?></td>
                                          <td><?php echo $dt_satker->Satker?></td>
                                          <td style="width: 20%;">
                                            <div class="progress progress-md" style="height: 15px;">
                                                <?php $total = modules::run('dashboard/total_wbk_satker', $dt_satker->SatkerID);?>
                                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: <?php echo $total?>%" role="progressbar" aria-valuenow="<?php echo $total?>" aria-valuemin="0" aria-valuemax="100"><?php echo $total?>%</div>
                                              </div>
                                          </td>
                                        </tr>
                                        <?php $no++;}?>                  
                                      </tbody>
                                    </table>
                                  </div>
                              <hr />
                              <div class=" mt-3">
                                <div class="text-right">
                                    <a href="<?php echo site_url('dashboard/wbk')?>" target="_blank" class="btn-rounded btn-xs btn btn-danger text-white">Lihat Semua Satuan Kerja</a>
                                </div>
                              </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
             </div>
             
          </div>
          
          
                    <div class="row mt-3">
             <div class="col-lg-12">
                <div class="card rounded">
                    <div class="row">
                        <div class="col-lg-5 ">
                         
                            <div class="card-body text-center">
                              <h4 class="card-title">Presentase RKT Nasional</h4>
                              <canvas id="doughnutChartrkt" width="700" height="500" class="chartjs-render-monitor" ></canvas>
                              <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            </div>
                          
                        </div>
                        <div class="col-lg-7">
                            <div class="card-body ">
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
                                          <td class="py-1"><?php echo $no?></td>
                                          <td><?php echo $dt_satker->Satker?></td>
                                          <td style="width: 20%;">
                                            <div class="progress progress-md" style="height: 15px;">
                                                <?php $total = modules::run('dashboard/total_rkt_satker', $dt_satker->SatkerID);?>
                                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: <?php echo $total?>%" role="progressbar" aria-valuenow="<?php echo $total?>" aria-valuemin="0" aria-valuemax="100"><?php echo $total?>%</div>
                                              </div>
                                          </td>
                                        </tr>
                                        <?php $no++;}?>
                                       
                                                          
                                      </tbody>
                                    </table>
                                  </div>
                                  <hr />
                               <div class=" mt-3">
                                <div class="text-right">
                                    <a href="<?php echo site_url('dashboard/rkt')?>" target="_blank" class="btn-rounded btn-xs btn btn-dark text-white">Lihat Semua Satuan Kerja</a>
                                </div>
                              </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
             </div>
             
          </div>
              
              

          