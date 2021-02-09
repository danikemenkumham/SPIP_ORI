        <div class="container-fluid">
        
          <a href="<?php echo site_url('master/wbk/tambah_wbk')?>" class="btn btn-success mb-3 ">Tambah WBK WBBM</a>

          <!-- DataTales Example -->
          <div class="card mb-4 rounded">
            
            <div class="card-body">
             <h5 class="text-dark">WBBK/WBBM</h5>
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
                      <th>Indikator</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php $no=1; foreach($wbk->result() as $wbk){?>
                    <tr class="row_<?php echo $wbk->id_wbk?>">
                      <td><?php echo $no?></td>
                      <td><?php echo $wbk->nama_area?></td>
                      <td><?php echo $wbk->indikator?></td>
                      <td style="width: 15%;">
                        <a href="<?php echo site_url('master/wbk/edit_wbk/'.$wbk->id_wbk)?>"  class="btn btn-dark btn-xs">Edit</a>
                        <button data-ref="<?php echo $wbk->id_wbk?>" class="btn btn-danger btn-xs delete">Hapus</button>
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