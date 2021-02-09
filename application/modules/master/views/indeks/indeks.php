        <div class="container-fluid">
        
          <a href="<?php echo site_url('master/indeks/addindeks')?>" class="btn btn-success mb-3 ">Tambah Indeks</a>

          <!-- DataTales Example -->
          <div class="card mb-4 rounded">
            
            <div class="card-body">
              <h5 class="text-dark">Indeks Reformasi Birokrasi</h5>
              <hr />
              
              <div class="table-responsive mt-3">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-info text-white">
                    <tr>
                      <th>No</th>
                      <th>Area</th>
                      <th>Indeks</th>
                  
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
                    foreach($indeks->result() as $dt_indeks){
                     ?>
                    <tr class="row_<?php echo $dt_indeks->id_indeks?>">
                      <td><?php echo $no?></td>
                      <td><?php echo $dt_indeks->nama_area?></td>
                      <td><?php echo $dt_indeks->indeks?></td>
                      <td><?php echo $dt_indeks->keterangan?></td>
                      <td style="width: 15%;">
                        <a href="<?php echo site_url('master/indeks/editindeks/'.md5($dt_indeks->id_indeks))?>"  class="btn btn-dark btn-xs">Edit</a>
                        <button data-ref="<?php echo md5($dt_indeks->id_indeks); ?>" class="btn btn-danger btn-xs delete">Hapus</button>
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