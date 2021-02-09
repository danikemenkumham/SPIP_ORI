        <style>
            table tr td {
                padding: 40px 15px!important;
               
            }
          
        </style>
        <div class="container-fluid">

          <!-- Page Heading -->
         
        
          <!-- DataTales Example -->
          <div class="card mb-4">
            
            <div class="card-body">
               <h4 class="card-title align-middle">Laporan Pelaksanaan RB</h4> 
                    <hr />
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-info">
                    <tr>
                      <th class="text-white" style="width: 5%;">No</th>
                      <th class="text-white">Laporan</th>
                     
                      <th class="text-white" style="width: 40%;">File Laporan</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                        <tr>
                            <td>1</td>
                            <td>Laporan Triwulan 1 <?php echo $this->input->get('tahun')?></td>
                            <td>
                                <?php if(date('m') <= '12'){?>
                                      <div style="display: none;"  class="spinner-border text-primary spin1 role="status">
                                          <span class="sr-only">Loading...</span>
                                       </div>
                               
                               <?php
                                    if($this->input->get('sk') == true){
                                        $satker = $this->input->get('sk');
                                    }else{
                                        $satker = $this->session->userdata('satker');
                                    }
                                    $check_laporan = Modules::run('satker/laporan/check_laporan', $this->input->get('tahun'), 1, $this->input->get('satker'));
                                   
                                    if($check_laporan->num_rows() > 0){ ?>
                                        <div class="file1">
                                            <i class="mdi mdi-attachment mdi-icon"></i> &nbsp;
                                            <a target="_blank" href="<?php echo $check_laporan->row()->path_file_laporan;?>"><?php echo $check_laporan->row()->caption;?></a>
                                            
                                        </div>
                                    <?php }else{ ?>
                                        <div class="alert alert-warning">Belum Upload Laporan</div>                                      
                                    <?php } ?>
                               
                                <?php }else{?>
                                <span class="alert alert-danger">
                                    belum waktunya upload laporan
                                </span>
                                <?php }?>
                            
                            </td>
                            
                        </tr>
                         <tr>
                            <td>2</td>
                            <td>Laporan Triwulan 2 <?php echo $this->input->get('tahun')?></td>
                            <td>
                            <?php if(date('m') >= '01' && date('m') <= '12'){?>
                                
                                  <div style="display: none;"  class="spinner-border text-primary spin2 role="status">
                                  <span class="sr-only">Loading...</span>
                               </div>
                               
                               <?php
                                    if($this->input->get('sk') == true){
                                        $satker = $this->input->get('sk');
                                    }else{
                                        $satker = $this->session->userdata('satker');
                                    }
                                    $check_laporan = Modules::run('satker/laporan/check_laporan', $this->input->get('tahun'), 2, $this->input->get('satker'));
                                    if($check_laporan->num_rows() > 0){ ?>
                                        <div class="file2">
                                            <i class="mdi mdi-attachment mdi-icon"></i> &nbsp;
                                            <a target="_blank" href="<?php echo $check_laporan->row()->path_file_laporan;?>"><?php echo $check_laporan->row()->caption;?></a>
                                           
                                        </div>
                                    <?php }else{ ?>
                                        <div class="alert alert-warning">Belum Upload Laporan</div>                                     
                                    <?php } ?>
                               
                                <?php }else{?>
                                <span class="alert alert-danger">
                                    belum waktunya upload laporan
                                </span>
                                <?php }?>
                            </td>
                            
                        </tr>
                         <tr>
                            <td>3</td>
                            <td>Laporan Triwulan 3 <?php echo $this->input->get('tahun')?></td>
                            <td>
                            <?php if(date('m') >= '01' && date('m') <= '12'){?>
                                <div style="display: none;"  class="spinner-border text-primary spin3 role="status">
                                  <span class="sr-only">Loading...</span>
                               </div>
                               
                               <?php
                                    if($this->input->get('sk') == true){
                                        $satker = $this->input->get('sk');
                                    }else{
                                        $satker = $this->session->userdata('satker');
                                    }
                                    $check_laporan = Modules::run('satker/laporan/check_laporan', $this->input->get('tahun'), 3, $this->input->get('satker'));
                                    if($check_laporan->num_rows() > 0){ ?>
                                        <div class="file3">
                                            <i class="mdi mdi-attachment mdi-icon"></i> &nbsp;
                                            <a target="_blank" href="<?php echo $check_laporan->row()->path_file_laporan;?>"><?php echo $check_laporan->row()->caption;?></a>
                                            
                                        </div>
                                    <?php }else{ ?>
                                       <div class="alert alert-warning">Belum Upload Laporan</div>                                         
                                    <?php } ?>
                                <?php }else{?>
                                <span class="alert alert-danger">
                                    belum waktunya upload laporan
                                </span>
                                <?php }?>
                            </td>
                            
                        </tr>
                         <tr>
                            <td>4</td>
                            <td>Laporan Triwulan 4 <?php echo $this->input->get('tahun')?></td>
                            <td> 
                            <?php if(date('m') >= '01' && date('m') <= '12'){?>
                                
                                  <div style="display: none;"  class="spinner-border text-primary spin4 role="status">
                                  <span class="sr-only">Loading...</span>
                               </div>
                               
                               <?php
                                 
                                    $check_laporan = Modules::run('satker/laporan/check_laporan', $this->input->get('tahun'), 4, $this->input->get('satker'));
                                    if($check_laporan->num_rows() > 0){ ?>
                                        <div class="file4">
                                            <i class="mdi mdi-attachment mdi-icon"></i> &nbsp;
                                            <a target="_blank" href="<?php echo $check_laporan->row()->path_file_laporan;?>"><?php echo $check_laporan->row()->caption;?></a>
                                           
                                        </div>
                                    <?php }else{ ?>
                                        <div class="alert alert-warning">Belum Upload Laporan</div>                                         
                                    <?php } ?>
                                
                                
                                <?php }else{?>
                                <span class="alert alert-danger">
                                    belum waktunya upload laporan
                                </span>
                                <?php }?>
                            </td>
                        </tr>
                        
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
                    
              