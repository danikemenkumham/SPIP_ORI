      
            <div class="row">
            <div class="col-md-12 grid-margin bg-in ">
              <div class="d-flex justify-content-between flex-wrap bg-primary p-3 rounded">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5 text-white">
                    <h4>
                        LKE WBK dan WBBM,
                    </h4>
                    <p class="mb-md-0">Progress pemenuhan LKE WBK/WBBM untuk semua Satuan Kerja di Kemenkumham</p>
                  </div>
                </div>          
              </div>
            </div>
            </div>
          <div class="card mb-4">
            
            <div class="card-body">
               <h2 class="card-title align-middle text-center">Pemenuhan LKE WBK/WBBM Semua Satuan Kerja</h2> 
               <hr />
               <form action="<?php echo current_url()?>" method="get">
                <div class="input-group  "> 
                  <input type="text" name="q" class="form-control border-warning" value="<?php echo $this->input->get('q')?>" placeholder="Cari Data" aria-label="search" aria-describedby="search">
                  <div class="input-group-prepend border-warning ">
                    <span class="input-group-text  border-warning  bg-warning" id="search">
                      <i class="mdi mdi-magnify text-white"></i>
                    </span>
                  </div>  
                </div>
              </form>
              <div class="table-responsive mt-3">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead >
                    <tr class="text-white bg-info">
                      <th>No</th>
                      <th>Satuan Kerja</th>
                      <th>Progress</th>
                     
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php 
                    if($this->input->get('page') == true){
                          $no=1+$this->input->get('page');
                     }else{
                        $no= 1;
                     } ;
                    foreach($satker->result() as $dt_satker){?>
                    <tr class="row_<?php echo $dt_satker->SatkerID?>">
                      <td class="py-1" style="width: 5%;"><?php echo $no;?></td>
                      <td><b><a class="text-dark" href="<?php echo site_url('dashboard/satker/'.$dt_satker->SatkerID)?>"><?php echo $dt_satker->Satker?></a></b></td>
                      <td style="width: 35%;">
                        <div class="progress progress-md" style="height: 30px;">
                            <?php $total = modules::run('dashboard/total_wbk_satker', $dt_satker->SatkerID);?>
                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated " style="width: <?php echo $total?>%" role="progressbar" aria-valuenow="<?php echo $total?>" aria-valuemin="0" aria-valuemax="100"><?php echo $total?>%</div>
                       </div>
                      </td>
                     
                    </tr>
                    <?php $no++; }?>
                  </tbody>
                </table>
              </div>
              <div class="row justify-content-md-center mt-3">
                <div class="text-center">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div>
            </div>
          </div>
