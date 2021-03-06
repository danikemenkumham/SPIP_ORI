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
           <h4 class="card-title align-middle text-center">Rekapitulasi Pemenuhan LKE WBK/WBBM</h4>   
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
                <a href="<?php echo site_url('dashboard/wbk')?>" target="_blank" class="btn-rounded btn-xs btn btn-danger text-white">Lihat Semua Satuan Kerja</a>
            </div>
            -->
          </div>
        </div>
       
    </div>
</div>