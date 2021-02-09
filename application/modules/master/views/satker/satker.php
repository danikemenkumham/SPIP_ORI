        <div class="container-fluid">

          <!-- Page Heading -->
         
          <!-- DataTales Example -->
          <div class="card mb-4">
            
            <div class="card-body">
               <h4 class="card-title align-middle">Satker</h4> 
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
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                    
                      <th>Satker</th>
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
                        <a href="<?php echo site_url('master/satker/edit_satker/'.$dt_satker->SatkerID)?>"  class="btn btn-primary btn-xs">Edit</a>
                      
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