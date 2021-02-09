<div class="row">
            <div class="col-md-12 grid-margin bg-in">
              <div class="d-flex justify-content-between flex-wrap bg-info p-3">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5 text-white">
                    <h2>Selamat Datang,</h2>
                    <p class="mb-md-0">Portal Reformasi Birokrasi Kementerian Hukum dan HAM RI</p>
                  </div>
                </div>          
              </div>
            </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin grid-margin-md-0 stretch-card">
      <div class="card rounded">
         <div class="card-header">
           <b class="text-dark">LKE WBK/WBBM</b>
          </div>
        <div class="card-body">
          
          <div class="row px-2 template-demo">
                <?php
                foreach($lke_area->result() as $dt_area){
                $ran = array("FDD60C","FC8C00","9D3459","048AAF","09B3C7",'FB318B','16181F','00A7DE','00E7CB');
                $ran_1 = array("info","danger","primary","warning",'success','secondary','primary');
                $color = $ran[array_rand($ran, 1)];
                $color_2 = $ran_1[array_rand($ran_1, 1)];
                ?>
                 <div class="col-sm-3 col-md-2 col-6 circle-progress-block text-center ">
                 <?php
                    $count = Modules::run('dashboard/count_lke_area', $dt_area->id_area, $this->session->userdata('satker'));
                    $speedo = $count*3-300;
                 ?>
                  <div id="circleProgress2" class="progressbar-js-circle border rounded-top p-3 border-<?php echo $color_2?>"><svg viewBox="0 0 100 100" style="display: block; width: 100%;"><path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#eee" stroke-width="5" fill-opacity="0"></path><path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#<?php echo $color?>" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 300, 300; stroke-dashoffset: <?php echo $speedo?>;"></path></svg><div class="progressbar-text" style="position: absolute; left: 50%; top: 35%!important; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(0, 0, 0); font-size: 1rem;"><b class="text-dark"><?php echo $count?>%</b></div></div>
                   <div class="bg-<?php echo $color_2?> p-2 text-white">
                    <small><?php echo $dt_area->nama_area?></small>
                    </div>
                </div>
            <?php }?>
           
            
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row mt-3">
     <div class="col-md-6 grid-margin grid-margin-md-0 stretch-card">
              <div class="card">
                 <div class="card-header">
                   <b class="text-dark">LKP PMPRB</b>
                  </div>
                <div class="card-body">
                 
                  <div class="template-demo">
                    
                    <?php
                    
                    $ran = array("info","danger","primary","warning",'success','secondary','primary');
                    foreach($pmprb_area->result() as $dt_pmprb){$color = $ran[array_rand($ran, 1)]; 
                    ?>
                    
                    <div class="d-flex justify-content-between mt-4">
                      <small><b class="text-secondary"><?php echo ucwords(strtolower($dt_pmprb->nama_area));?></b></small>
                       <?php
                            $count = Modules::run('dashboard/count_pmprb_area', $dt_pmprb->id_area, $this->session->userdata('satker'));
                       ?>
                      <small class="text-secondary"><?php echo $count?>%</small>
                    </div>
                    <div class="progress progress-sm mt-2">
                      <div class="progress-bar bg-<?php echo $color?>" role="progressbar" style="width: <?php echo $count?>%" aria-valuenow="<?php echo $count?>" aria-valuemin="0" aria-valuemax="100"><?php echo $total?>%</div>
                    </div>
                    <?php }?>
                  </div>
                </div>
              </div>
            </div>
    <div class="col-md-6 grid-margin grid-margin-md-0 stretch-card">
      <div class="card">
        <div class="card-header">
           <b class="text-dark">Rencana Kerja Tahunan</b>
          </div>
        <div class="card-body">
      
          <div class="template-demo">
            
             <?php foreach($rkt_area->result() as $dt_rkt){?>
            <div class="d-flex justify-content-between mt-2">
              <small class="text-secondary"><b><?php echo ucwords(strtolower($dt_rkt->nama_area));?></b></small>
              <?php
                    $count = Modules::run('dashboard/count_rkt_area', $dt_rkt->id_area, $this->session->userdata('satker'));
               ?>
              <small class="text-secondary"><?php echo $count; ?>%</small>
            </div>
            <div class="progress progress-sm mt-2">
              <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $count?>%" aria-valuenow="<?php echo $count?>" aria-valuemin="0" aria-valuemax="100"><?php echo $total?>%</div>
            </div>
            <?php }?>
          
          </div>
        </div>
      </div>
    </div>
    

</div>