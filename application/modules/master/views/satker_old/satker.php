        <div class="container-fluid">

          <!-- Page Heading -->
         
          
          <a href="<?php echo site_url('master/satker/tambah_satker')?>" class="mb-3 btn btn-success btn-sm btn-icon-text"> <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Satker</a>

          <!-- DataTales Example -->
          <div class="card mb-4">
            
            <div class="card-body">
               <h4 class="card-title align-middle">Satker</h4> 
                    <hr />
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Satker</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                      <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Satker</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no=1; foreach($satker->result() as $dt_satker){?>
                    <tr class="row_<?php echo $dt_satker->SatkerID?>">
                      <td class="py-1"><?php echo $no;?></td>
                        <td class="py-1"><?php echo $dt_satker->SatkerID;?></td>
                       <td><?php echo $dt_satker->Satker?></td>
                   
                      <td style="width: 20%;">
                        <a href="<?php echo site_url('master/satker/edit_satker/'.$dt_satker->SatkerID)?>"  class="btn btn-primary btn-xs">Edit</a>
                        <button data-ref="<?php echo $dt_satker->SatkerID?>" class="btn btn-danger btn-xs delete">Hapus</button>
                      </td>
                    </tr>
                    <?php $no++; }?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>