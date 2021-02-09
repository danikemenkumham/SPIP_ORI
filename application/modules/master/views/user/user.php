        <div class="container-fluid">

          <!-- Page Heading -->
         
          
          <a href="<?php echo site_url('master/user/tambah_user')?>" class="mb-3 btn btn-success btn-sm btn-icon-text"> <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah User</a>

          <!-- DataTales Example -->
          <div class="card mb-4">
            
            <div class="card-body">
               <h4 class="card-title align-middle">User</h4> 
                    <hr />
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  
                  <thead>
                    <tr>
                       <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Role</th>
                      <th>Satker</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php $no=1; foreach($user->result() as $dt_user){?>
                    <tr class="row_<?php echo $dt_user->iduser?>">
                      <td class="py-1"><?php echo $no;?></td>
                      <td class="py-1"><?php echo $dt_user->nama;?></td>
                      <td><?php echo $dt_user->username?></td>
                      <td><?php echo $dt_user->role?></td>
                      <td><?php echo $dt_user->Satker?></td>
                      <td style="width: 20%;">
                        <a href="<?php echo site_url('master/user/edit_user/'.$dt_user->iduser)?>"  class="btn btn-primary btn-xs">Edit</a>
                        <button data-ref="<?php echo $dt_user->iduser?>" class="btn btn-danger btn-xs delete">Hapus</button>
                      </td>
                    </tr>
                    <?php $no++; }?>
                  
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