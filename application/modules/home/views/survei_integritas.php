                      <div class="card-body p-0">
                                <h4 class="card-title align-middle text-center">Survey INTEGRITAS Unit Pusat</h4>   
                                      <div class="table-responsive mt-3">
                                        <table class="table table-striped rounded"  width="100%" cellspacing="0">
                                              <thead class="text-white bg-info">
                                                <tr>
                                                  <th style="text-align: center; width: 5%;">No</th>
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
                                              
                                               foreach($integritas as $dt_result){
                                                    if($dt_result->kode_wilayah == '' && $dt_result->weight_name == 'INTEGRITAS'){
                                                     $no = $no+1;
                                              ?>
                                              <tr>
                                                  <td class="py-1 text-center"><?php echo $no?></td>
                                                  <td><b  ><?php echo $dt_result->subject_organization?></b></td>
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
                                    
                                    <hr />
                                    
                                    <h4 class="card-title align-middle text-center mt-5">Survey INTEGRITAS Kantor Wilayah</h4>   
                                      <div class="table-responsive mt-3">
                                        <table class="table table-striped rounded"  width="100%" cellspacing="0">
                                              <thead class="text-white bg-danger">
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
                                             
                                               foreach($integritas as $dt_result){
                                                    if($dt_result->kode_eselon == '1301' && $dt_result->weight_name == 'INTEGRITAS'){
                                                    
                                                     $no = $no+1;
                                                     $exist_provinsi = $dt_result->kode_wilayah;
                                                    
                                              ?>
                                              <tr>
                                                  <td class="py-1 text-center"><?php echo $no?></td>
                                                  <td><b  data-ref="<?php echo $dt_result->kode_wilayah?>" class="integritas_modal" style="cursor: pointer;" data-toggle="modal" data-target="#modal_"><?php echo $dt_result->subject_organization?></b></td>
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
                                                <?php $no++;}}?>
                                               <?php
                                                   
                                                    if(isset($exist_provinsi)){
                                                       $not_exist = modules::run('home/get_not_exist_survey', $exist_provinsi);
                                                         $no=1;
                                                        foreach($not_exist->result() as $dt_provinsi){?>
                                                        <tr>
                                                            <td class="py-1 text-center"> <?php echo $no;?></td>
                                                            <td data-ref="<?php echo $dt_provinsi->kd_wilayah?>" class="integritas_modal" style="cursor: pointer;" data-toggle="modal" data-target="#modal_"><?php echo strtoupper($dt_provinsi->provinsi);?></td>
                                                            <td colspan="3" class="text-center">no data</td>
                                                            
                                                        </tr>  
                                                    <?php  $no++;}?>       
                                                    <?php }else{
                                                        $not_exist = modules::run('home/get_wilayah_all');
                                                         $no=1;
                                                        foreach($not_exist->result() as $dt_provinsi){?>
                                                        <tr>
                                                            <td class="py-1 text-center"> <?php echo $no;?></td>
                                                            <td data-ref="<?php echo $dt_provinsi->kd_wilayah?>" class="integritas_modal" style="cursor: pointer;" data-toggle="modal" data-target="#modal_"><?php echo strtoupper($dt_provinsi->provinsi);?></td>
                                                            <td colspan="3" class="text-center">no data</td>
                                                            
                                                        </tr>
                                                    <?php $no++;}
                                                      }?> 
                                                    
                                                                  
                                              </tbody>
                                            </table>
                                          </div>
                                          
                           
                                          
                                          
                                          <hr />
                                      
                                      
                                    </div>