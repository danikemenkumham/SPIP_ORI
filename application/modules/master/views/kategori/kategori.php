        <div class="container-fluid">

          <!-- Page Heading -->
         
          
          <a href="<?php echo site_url('master/kategori/tambah_kategori')?>" class="mb-3 btn btn-success btn-sm btn-icon-text"> <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah kategori</a>

          <!-- DataTales Example -->
          <div class="card mb-4">
            
            <div class="card-body">
               <h4 class="card-title align-middle">kategori</h4> 
                    <hr />
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kategori</th>
                      <th>Jenis</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php $no=1; foreach($kategori->result() as $dt_kategori){?>
                    <tr class="row_<?php echo $dt_kategori->id_kategori?>">
                      <td class="py-1"><?php echo $dt_kategori->id_kategori;?></td>
                      <td><?php echo $dt_kategori->kategori?></td>
                      <td><?php echo $dt_kategori->jenis?></td>
                      <td style="width: 20%;">
                        <a href="<?php echo site_url('master/kategori/edit_kategori/'.$dt_kategori->id_kategori)?>"  class="btn btn-primary btn-xs">Edit</a>
                        <button data-ref="<?php echo $dt_kategori->id_kategori?>" class="btn btn-danger btn-xs delete">Hapus</button>
                      </td>
                    </tr>
                    <?php $no++; }?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>