        <div class="container-fluid">
        
          <a href="<?php echo site_url('master/wbk/tambah_rincian')?>" class="btn btn-success mb-3 ">Tambah Detail WBK/WBBM</a>

          <!-- DataTales Example -->
          <div class="card mb-4 rounded">
            
            <div class="card-body">
             <h5 class="text-dark">Rincinan Penilaian WBK/WBBM</h5> 
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
                      <th>Indikator</th>
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
                    foreach($rincian_wbk->result() as $wbk){?>
                    <tr class="row_<?php echo $wbk->id_detail?>">
                      <td><?php echo $no?></td>
                      <td>
                          
                       
                        <?php echo $wbk->poin_indikator?> <br />
                        <hr />
                         <span class="btn btn-outline-primary btn-xs"><?php echo $wbk->nama_area?></span>
                         <span class="btn btn-outline-success btn-xs"><?php echo $wbk->indikator?></span>
                       
                     
                      </td>
                    
                      <td style="width: 25%;">
                        <a href="" class="btn btn-warning btn-xs"><?php echo modules::run('master/wbk/get_satker_rincian_wbk', $wbk->id_detail)?> Satker</a>
                        <a href="<?php echo site_url('master/wbk/edit_rincian_wbk/'.$wbk->id_detail)?>"  class="btn btn-dark btn-xs">Edit</a>
                        <button data-ref="<?php echo $wbk->id_detail?>" class="btn btn-danger btn-xs delete">Hapus</button>
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