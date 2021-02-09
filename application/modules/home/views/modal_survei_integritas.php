<h4 class="card-title align-middle text-center ">Survey INTEGRITAS Kantor Wilayah</h4>   
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
                            if($dt_result->kode_wilayah == $wilayah && $dt_result->weight_name == 'INTEGRITAS' && $dt_result->kode_eselon == '05'){
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