        <div class="container-fluid">
              
          <div class="card mb-4">
            
            <div class="card-body">
               <h4 class="card-title align-middle">LKP PMPRB</h4> 
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
                <thead class="text-white bg-info">
                    <tr>
                      <th>No</th>
                      <th>Satuan Kerja</th>
                      <th>Aksi</th>
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
                      <td class="py-1"><?php echo $no;?></td>
                       <td><?php echo $dt_satker->Satker?></td>
                      <td style="width: 20%;">
                        <a href="<?php echo site_url('satker/pmprb/area/2020/'.$dt_satker->SatkerID) ?>"  class="btn btn-danger btn-sm">Detail</a>
                        <a target="_blank" href="<?php echo site_url('satker/pmprb/paper/'.$dt_satker->SatkerID)?>" class="btn btn-success btn-sm"><small class="text-white"><i class="mdi-printer mdi" style="font-size: 1em;"></i></small></a>
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

        </div>