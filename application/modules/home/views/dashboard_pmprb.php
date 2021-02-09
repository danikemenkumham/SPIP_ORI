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
                                      <h4 class="card-title align-middle text-center">Rekapitulasi Pemenuhan LKP PMPRB</h4>   
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
                                                  <td class="py-1 text-center"><?php echo $no?> </td>
                                                  <td>
                                                    <a target="_blank" class="text-dark" href="#<?php //echo site_url('dashboard/satker/'.$dt_satker->SatkerID)?>">
                                                    <b><?php echo $dt_satker->Satker?></b>
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
                                        <!--
                                        <div class="text-right">
                                            <a class="btn-rounded btn-xs btn btn-info text-white" href="<?php echo site_url('dashboard/pmprb')?>">Lihat Semua Satuan Kerja</a>
                                        </div>
                                        -->
                                      </div>
                                    </div>
                                   
                                </div>
                            </div> 