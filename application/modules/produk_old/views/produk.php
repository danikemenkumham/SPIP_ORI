        <div class="container-fluid">

          <!-- Page Heading -->
         
          
          <a href="<?php echo site_url('produk/tambah_produk')?>" class="mb-3 btn btn-success btn-sm btn-icon-text"> <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Produk RB</a>

          <!-- DataTales Example -->
          <div class="card mb-4">
            
            <div class="card-body">
               <h4 class="card-title align-middle">Porduk RB</h4> 
                    <hr />
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Keterangan</th>
                      <th>File</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Keterangan</th>
                      <th>File</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no=1; foreach($produk->result() as $dt_produk){?>
                    <tr class="row_<?php echo $dt_produk->id_produk?>">
                      <td class="py-1"><?php echo $no;?></td>
                       <td><?php echo $dt_produk->judul?></td>
                      <td><?php echo $dt_produk->keterangan?></td>
                      <td><i class="mdi mdi-file mdi-icon-box-primary"></i><a target="_blank" href="<?php echo $dt_produk->link_file?>">File</a></td>
                      <td style="width: 20%;">
                        <a href="<?php echo site_url('produk/edit_produk/'.$dt_produk->id_produk)?>"  class="btn btn-primary btn-xs">Edit</a>
                        <button data-ref="<?php echo $dt_produk->id_produk?>" class="btn btn-danger btn-xs delete">Hapus</button>
                      </td>
                    </tr>
                    <?php $no++; }?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
                    
              