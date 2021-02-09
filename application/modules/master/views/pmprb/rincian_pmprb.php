        <div class="container-fluid">
        
          <a href="<?php echo site_url('master/pmprb/tambah_rincian')?>" class="btn btn-success mb-3 ">Tambah PMPRB</a>

          <!-- DataTales Example -->
          <div class="card mb-4">
            
            <div class="card-body">
            <h4 class="card-title align-middle">PMPRB</h4> 
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
                      <th>Penilaian</th>
                      <th>Penjelasan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php 
                     if($this->input->get('page') == true){
                          $no=1+$this->input->get('page');
                     }else{
                        $no= 1;
                     };
                     foreach($rincian_pmprb->result() as $pmprb){?>
                    <tr class="row_<?php echo $pmprb->id_detail?> bg-<?php echo $pmprb->jenis_lkp  == 'pusat' ? 'primary':'' ?>">
                      <td><?php echo $no?></td>
                      <td>
                      <?php echo $pmprb->objek_penilaian?> <hr />   
                       <span class="btn btn-outline-info btn-xs">
                        <?php echo $pmprb->nama_area?>
                        </span>
                        <span class="btn btn-outline-success btn-xs">
                        <?php echo $pmprb->kategori_penilaian?>
                        </span>
                      </td>
                      <td><?php echo nl2br($pmprb->penjelasan)?></td>
                      <td style="width: 25%;">
                        <a href="" class="btn btn-warning btn-xs"><?php echo modules::run('master/pmprb/get_satker_rincian', $pmprb->id_detail)?> Satker</a>
                        <a href="<?php echo site_url('master/pmprb/edit_rincian_pmprb/'.$pmprb->id_detail)?>"  class="btn btn-dark btn-xs">Edit</a>
                        <button data-ref="<?php echo $pmprb->id_detail?>" class="btn btn-danger btn-xs delete">Hapus</button>
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