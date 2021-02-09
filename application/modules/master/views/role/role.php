        <div class="container-fluid">

          <!-- Page Heading -->
         
          
          <a href="<?php echo site_url('master/role/tambah_role')?>" class="mb-3 btn btn-success btn-sm btn-icon-text"> <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Role</a>

          <!-- DataTales Example -->
          <div class="card mb-4">
            
            <div class="card-body">
               <h4 class="card-title align-middle">Role</h4> 
                    <hr />
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Role</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php $no=1; foreach($role->result() as $dt_role){?>
                    <tr class="row_<?php echo $dt_role->id_role?>">
                      <td class="py-1"><?php echo $dt_role->id_role;?></td>
                      <td><?php echo $dt_role->role?></td>
                   
                      <td style="width: 20%;">
                        <a href="<?php echo site_url('master/role/edit_role/'.$dt_role->id_role)?>"  class="btn btn-primary btn-xs">Edit</a>
                        <button data-ref="<?php echo $dt_role->id_role?>" class="btn btn-danger btn-xs delete">Hapus</button>
                      </td>
                    </tr>
                    <?php $no++; }?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>