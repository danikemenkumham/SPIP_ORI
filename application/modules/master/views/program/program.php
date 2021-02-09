        <div class="container-fluid">

          <!-- Page Heading -->
         
          
          <a href="<?php echo site_url('master/program/tambah_program')?>" class="mb-3 btn btn-success btn-sm btn-icon-text"> <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah program</a>

          <!-- DataTales Example -->
          <div class="card mb-4">
            
            <div class="card-body">
               <h4 class="card-title align-middle">Program</h4> 
                    <hr />
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-info text-white">
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Program</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php $no=1; foreach($program->result() as $dt_program){?>
                    <tr class="row_<?php echo $dt_program->id_program?>">
                      <td class="py-1"><?php echo $no;?></td>
                       <td><?php echo $dt_program->kode_program?></td>
                      <td><?php echo $dt_program->nama_program?></td>
                   
                      <td style="width: 20%;">
                        <a href="<?php echo site_url('master/program/edit_program/'.$dt_program->id_program)?>"  class="btn btn-dark btn-xs">Edit</a>
                        <button data-ref="<?php echo $dt_program->id_program?>" class="btn btn-danger btn-xs delete">Hapus</button>
                      </td>
                    </tr>
                    <?php $no++; }?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>