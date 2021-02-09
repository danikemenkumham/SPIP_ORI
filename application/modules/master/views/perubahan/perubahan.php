        <div class="container-fluid">
        
          <a href="<?php echo site_url('master/perubahan/tambah_area_perubahan')?>" class="btn btn-success mb-3 ">Tambah Area Perubahan</a>

          <!-- DataTales Example -->
          <div class="card mb-4 rounded">
            
            <div class="card-body">
              <h5 class="text-dark">Area Perubahan</h5>
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
                      <th>Program</th>
                      <th>Area</th>
                      <th>Tahun</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php 
                     if($this->input->get('page') == true){
                          $no=1+$this->input->get('page');
                     }else{
                        $no= 1;
                     } 
                    foreach($perubahan->result() as $dt_perubahan){
                     ?>
                    <tr class="row_<?php echo $dt_perubahan->id_area?>">
                      <td><?php echo $no?></td>
                      <td><?php echo $dt_perubahan->nama_program?></td>
                      <td><?php echo $dt_perubahan->nama_area?></td>
                      <td><?php echo $dt_perubahan->tahun_area?></td>
                      <td><?php echo $dt_perubahan->keterangan_area?></td>
                      <td style="width: 15%;">
                        <a href="<?php echo site_url('master/perubahan/edit_area_perubahan/'.$dt_perubahan->id_area)?>"  class="btn btn-dark btn-xs">Edit</a>
                        <button data-ref="<?php echo $dt_perubahan->id_area?>" class="btn btn-danger btn-xs delete">Hapus</button>
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