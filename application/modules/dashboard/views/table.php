

<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
              
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bordered table</h4>
                  <p class="card-description">
                    Add class <code>.table-bordered</code>
                  </p>
                  <div class="row">
                        <?php foreach($area->result() as $dt_area){?>
                     <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title"><?php echo $dt_area->nama_area;?></h4>
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
                    <?php }?>
                  </div>
                        
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Poin Penilaian
                          </th>
                          <th>
                            Progress
                          </th>
                          <th>
                            Amount
                          </th>
                          <th>
                            Deadline
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php $no=1; foreach($pmprb->result() as $dt_pmprb){?>
                        <tr>
                          <td>
                            <?php echo $no;?>
                          </td>
                          <td>
                            <?php echo $dt_pmprb->kategori_penilaian?>
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <?php $no++; }?>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
</div>