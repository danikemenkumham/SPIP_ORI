<h4 class="card-title align-middle text-center ">Survey IKM Kantor Wilayah</h4>   
    <nav class="mt-3">
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-pas-tab" data-toggle="tab" href="#nav-pas" role="tab" aria-controls="nav-pas" aria-selected="true">Pemasyarakatan</a>
        <a class="nav-item nav-link" id="nav-imi-tab" data-toggle="tab" href="#nav-imi" role="tab" aria-controls="nav-imi" aria-selected="false">Keimigrasian</a>
        <a class="nav-item nav-link" id="nav-bhp-tab" data-toggle="tab" href="#nav-bhp" role="tab" aria-controls="nav-bhp" aria-selected="false">BHP</a>
        <a class="nav-item nav-link" id="nav-bd-tab" data-toggle="tab" href="#nav-bd" role="tab" aria-controls="nav-bd" aria-selected="false">Balai Diklat</a>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-pas" role="tabpanel" aria-labelledby="nav-pas-tab">
              <div class="table-responsive mt-3">
                <table class="table table-striped rounded"  width="100%" cellspacing="0">
                      <thead class="text-white bg-success">
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th>Satuan Kerja</th>
                           <th class="text-center">Responden</th>
                          <!--<th class="text-center" style="width: 20%;">Weight Result</th>-->
                          <th class="text-center" style="width: 15%;">Nilai</th>
                          <th class="text-center" style="width: 15%;">Grade</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $no=0;
                       foreach($survey as $dt_result){
                            if($dt_result->kode_wilayah == $wilayah && $dt_result->weight_name == 'IKM' && $dt_result->kode_eselon == '05'){
                             $no = $no+1;
                      ?>
                      <tr>
                          <td class="py-1 text-center"><?php echo $no?></td>
                          <td><b><?php echo $dt_result->subject_organization?></b></td>
                          <td class="text-center"><b><?php echo $dt_result->respondent_count?></b></td>
                          <!-- 
                          <td class="text-center">
                          
                          <div class="progress progress-md" style="height: 20px;">
                                <div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" style="width: <?php echo $dt_result->weight_result/20*100?>%" role="progressbar" aria-valuenow="<?php echo $dt_result->weight_result?>" aria-valuemin="0" aria-valuemax="20"><b class="text-center"><?php echo $dt_result->weight_result?></b></div>
                              </div>
                          </td>
                          -->
                          <td class="text-center">
                            <div class="progress progress-md" style="height: 20px;">
                                <div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" style="width: <?php echo $dt_result->score?>%" role="progressbar" aria-valuenow="<?php echo $dt_result->score?>" aria-valuemin="0" aria-valuemax="100"><b class="text-center"><?php echo $dt_result->score?></b></div>
                              </div>
                          </td>
                          <td class="text-center">
                                <?php if($dt_result->score_grade_name == 'Sangat Baik'){
                                    $class_pill = 'primary';
                                }elseif($dt_result->score_grade_name == 'Baik'){
                                    $class_pill = 'success';
                                }elseif($dt_result->score_grade_name == 'Kurang Baik'){
                                    $class_pill = 'warning';
                                }elseif($dt_result->score_grade_name == 'Tidak Baik'){
                                    $class_pill = 'danger';
                                }else{
                                    $class_pill = 'danger';
                                }?>
                                <span class="badge badge-<?php echo $class_pill?> badge-pill p-2"><b><?php echo $dt_result->score_grade_name?></b></span>
                          </td>
                        </tr>
                        <?php }}?>
                       
                                          
                      </tbody>
                    </table>
                  </div>
      
      </div>
      <div class="tab-pane fade" id="nav-imi" role="tabpanel" aria-labelledby="nav-imi-tab">
        <div class="table-responsive mt-3">
                <table class="table table-striped rounded"  width="100%" cellspacing="0">
                      <thead class="text-white bg-success">
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th>Satuan Kerja</th>
                           <th class="text-center">Responden</th>
                          <!--<th class="text-center" style="width: 20%;">Weight Result</th>-->
                          <th class="text-center" style="width: 15%;">Nilai</th>
                          <th class="text-center" style="width: 15%;">Grade</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $no=0;
                       foreach($survey as $dt_result){
                            if($dt_result->kode_wilayah == $wilayah && $dt_result->weight_name == 'IKM' && $dt_result->kode_eselon == '06'){
                             $no = $no+1;
                      ?>
                      <tr>
                          <td class="py-1 text-center"><?php echo $no?></td>
                          <td><b><?php echo $dt_result->subject_organization?></b></td>
                          <td class="text-center"><b><?php echo $dt_result->respondent_count?></b></td>
                          <!-- 
                          <td class="text-center">
                          
                          <div class="progress progress-md" style="height: 20px;">
                                <div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" style="width: <?php echo $dt_result->weight_result/20*100?>%" role="progressbar" aria-valuenow="<?php echo $dt_result->weight_result?>" aria-valuemin="0" aria-valuemax="20"><b class="text-center"><?php echo $dt_result->weight_result?></b></div>
                              </div>
                          </td>
                          -->
                          <td class="text-center">
                            <div class="progress progress-md" style="height: 20px;">
                                <div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" style="width: <?php echo $dt_result->score?>%" role="progressbar" aria-valuenow="<?php echo $dt_result->score?>" aria-valuemin="0" aria-valuemax="100"><b class="text-center"><?php echo $dt_result->score?></b></div>
                              </div>
                          </td>
                          <td class="text-center">
                                <?php if($dt_result->score_grade_name == 'Sangat Baik'){
                                    $class_pill = 'primary';
                                }elseif($dt_result->score_grade_name == 'Baik'){
                                    $class_pill = 'success';
                                }elseif($dt_result->score_grade_name == 'Kurang Baik'){
                                    $class_pill = 'warning';
                                }elseif($dt_result->score_grade_name == 'Tidak Baik'){
                                    $class_pill = 'danger';
                                }else{
                                    $class_pill = 'danger';
                                }?>
                                <span class="badge badge-<?php echo $class_pill?> badge-pill p-2"><b><?php echo $dt_result->score_grade_name?></b></span>
                          </td>
                        </tr>
                        <?php }}?>
                       
                                          
                      </tbody>
                    </table>
                  </div>
      
      </div>
      
            <div class="tab-pane fade show" id="nav-bhp" role="tabpanel" aria-labelledby="nav-bhp-tab">
         <div class="table-responsive mt-3">
                <table class="table table-striped rounded"  width="100%" cellspacing="0">
                      <thead class="text-white bg-success">
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th>Satuan Kerja</th>
                           <th class="text-center">Responden</th>
                          <!--<th class="text-center" style="width: 20%;">Weight Result</th>-->
                          <th class="text-center" style="width: 15%;">Nilai</th>
                          <th class="text-center" style="width: 15%;">Grade</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $no=0;
                       foreach($survey as $dt_result){
                            if($dt_result->kode_wilayah == $wilayah && $dt_result->weight_name == 'IKM' && $dt_result->kode_eselon == '03'){
                             $no = $no+1;
                      ?>
                      <tr>
                          <td class="py-1 text-center"><?php echo $no?></td>
                          <td><b><?php echo $dt_result->subject_organization?></b></td>
                          <td class="text-center"><b><?php echo $dt_result->respondent_count?></b></td>
                          <!-- 
                          <td class="text-center">
                          
                          <div class="progress progress-md" style="height: 20px;">
                                <div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" style="width: <?php echo $dt_result->weight_result/20*100?>%" role="progressbar" aria-valuenow="<?php echo $dt_result->weight_result?>" aria-valuemin="0" aria-valuemax="20"><b class="text-center"><?php echo $dt_result->weight_result?></b></div>
                              </div>
                          </td>
                          -->
                          <td class="text-center">
                            <div class="progress progress-md" style="height: 20px;">
                                <div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" style="width: <?php echo $dt_result->score?>%" role="progressbar" aria-valuenow="<?php echo $dt_result->score?>" aria-valuemin="0" aria-valuemax="100"><b class="text-center"><?php echo $dt_result->score?></b></div>
                              </div>
                          </td>
                          <td class="text-center">
                                <?php if($dt_result->score_grade_name == 'Sangat Baik'){
                                    $class_pill = 'primary';
                                }elseif($dt_result->score_grade_name == 'Baik'){
                                    $class_pill = 'success';
                                }elseif($dt_result->score_grade_name == 'Kurang Baik'){
                                    $class_pill = 'warning';
                                }elseif($dt_result->score_grade_name == 'Tidak Baik'){
                                    $class_pill = 'danger';
                                }else{
                                    $class_pill = 'danger';
                                }?>
                                <span class="badge badge-<?php echo $class_pill?> badge-pill p-2"><b><?php echo $dt_result->score_grade_name?></b></span>
                          </td>
                        </tr>
                        <?php }}?>
                       
                                          
                      </tbody>
                    </table>
                  </div>
      
      </div>
        <div class="tab-pane fade show" id="nav-bd" role="tabpanel" aria-labelledby="nav-bd-tab">
         <div class="table-responsive mt-3">
                <table class="table table-striped rounded"  width="100%" cellspacing="0">
                      <thead class="text-white bg-success">
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th>Satuan Kerja</th>
                           <th class="text-center">Responden</th>
                          <!--<th class="text-center" style="width: 20%;">Weight Result</th>-->
                          <th class="text-center" style="width: 15%;">Nilai</th>
                          <th class="text-center" style="width: 15%;">Grade</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $no=0;
                       foreach($survey as $dt_result){
                            if($dt_result->kode_wilayah == $wilayah && $dt_result->weight_name == 'IKM' && $dt_result->kode_eselon == '12'){
                             $no = $no+1;
                      ?>
                      <tr>
                          <td class="py-1 text-center"><?php echo $no?></td>
                          <td><b><?php echo $dt_result->subject_organization?></b></td>
                          <td class="text-center"><b><?php echo $dt_result->respondent_count?></b></td>
                          <!-- 
                          <td class="text-center">
                          
                          <div class="progress progress-md" style="height: 20px;">
                                <div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" style="width: <?php echo $dt_result->weight_result/20*100?>%" role="progressbar" aria-valuenow="<?php echo $dt_result->weight_result?>" aria-valuemin="0" aria-valuemax="20"><b class="text-center"><?php echo $dt_result->weight_result?></b></div>
                              </div>
                          </td>
                          -->
                          <td class="text-center">
                            <div class="progress progress-md" style="height: 20px;">
                                <div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" style="width: <?php echo $dt_result->score?>%" role="progressbar" aria-valuenow="<?php echo $dt_result->score?>" aria-valuemin="0" aria-valuemax="100"><b class="text-center"><?php echo $dt_result->score?></b></div>
                              </div>
                          </td>
                          <td class="text-center">
                                <?php if($dt_result->score_grade_name == 'Sangat Baik'){
                                    $class_pill = 'primary';
                                }elseif($dt_result->score_grade_name == 'Baik'){
                                    $class_pill = 'success';
                                }elseif($dt_result->score_grade_name == 'Kurang Baik'){
                                    $class_pill = 'warning';
                                }elseif($dt_result->score_grade_name == 'Tidak Baik'){
                                    $class_pill = 'danger';
                                }else{
                                    $class_pill = 'danger';
                                }?>
                                <span class="badge badge-<?php echo $class_pill?> badge-pill p-2"><b><?php echo $dt_result->score_grade_name?></b></span>
                          </td>
                        </tr>
                        <?php }}?>
                       
                                          
                      </tbody>
                    </table>
                  </div>
      
      </div>
      
    </div>
