        <div class="container-fluid">
        
          <a href="<?php echo site_url('master/rkt/tambah_rkt/'.$this->uri->segment(4))?>" class="btn btn-success mb-3 ">Tambah Kegiatan RKT</a>

          <!-- DataTales Example -->
          <div class="card mb-4">
            
            <div class="card-body">
            <h4 class="card-title align-middle">Rencana Kerja Tahunan (RKT)</h4> 
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
                  <thead class="text-white bg-info">
                    <tr>
                      <th>No</th>
                      <th>Kegiatan</th>
                      <td>Daduk</td>
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
                      foreach($rkt->result() as $dt_rkt){?>
                    <tr class="row_<?php echo $dt_rkt->id_rkt?>">
                      <td><?php echo $no?></td>
                        <td>
                        <?php echo $dt_rkt->kegiatan?> 
                        <hr />
                        <span class="btn btn-outline-primary btn-xs">
                        <?php echo $dt_rkt->nama_area?>
                        </span> 
                        </td>
                      
                        <td><?php echo $dt_rkt->daduk?></td>
                       
                      </td>
                    
                      <td style="width: 25%;">
                        <a href="" class="btn btn-warning btn-xs"><?php echo modules::run('master/rkt/get_satker_rincian_rkt', $dt_rkt->id_rkt)?> Satker</a>
                        <a href="<?php echo site_url('master/rkt/edit_rkt/'.$this->uri->segment(4).'/'.$dt_rkt->id_rkt)?>"  class="btn btn-dark btn-xs">Edit</a>
                        <button data-ref="<?php echo $dt_rkt->id_rkt?>" class="btn btn-danger btn-xs delete">Hapus</button>
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