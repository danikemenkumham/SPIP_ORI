        <div class="container-fluid">
        
          <a href="<?php echo site_url('master/pmprb/tambah_pmprb')?>" class="btn btn-success mb-3 ">Tambah PMPRB</a>

          <!-- DataTales Example -->
          <div class="card mb-4 rounded">
            
            <div class="card-body">
            <h5 class="text-dark" >PMPRB</h5> 
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-info text-white">
                    <tr>
                      <th>No</th>
                      <th>Area Perubahan</th>
                      <th>Kategori Penilaian</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php  if($this->input->get('page') == true){
                          $no=1+$this->input->get('page');
                     }else{
                        $no= 1;
                     } ;
                      foreach($pmprb->result() as $pmprb){?>
                    <tr class="row_<?php echo $pmprb->id_pmprb?>">
                      <td><?php echo $no?></td>
                      <td><?php echo $pmprb->nama_area?></td>
                      <td><?php echo $pmprb->kategori_penilaian?></td>
                      <td style="width: 25%;">
                       
                        <a href="<?php echo site_url('master/pmprb/edit_pmprb/'.$pmprb->id_pmprb)?>"  class="btn btn-dark btn-xs">Edit</a>
                        <button data-ref="<?php echo $pmprb->id_pmprb?>" class="btn btn-danger btn-xs delete">Hapus</button>
                      </td>
                    </tr>
                    <?php $no++;}?>
                  
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