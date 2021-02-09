        <div class="container-fluid">

          <!-- Page Heading -->
         
          
          <a href="<?php echo site_url('master/gallery/tambah')?>" class="mb-3 btn btn-success btn-sm btn-icon-text"> <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Gallery</a>

          <!-- DataTales Example -->
          <div class="card mb-4">
            
            <div class="card-body">
               <h4 class="card-title align-middle">Post Page</h4> 
                    <hr />
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Gallery</th>
                      <th>Jumlah Foto</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php $no=1; foreach($album->result() as $dt_post){?>
                    <tr class="row_<?php echo $dt_post->id_gallery?>">
                      <td class="py-1"><?php echo $no;?></td>
                       <td><?php echo $dt_post->nama_gallery?></td>
                        <td>12</td>
                      <td style="width: 20%;">
                        <a href="<?php echo site_url('master/gallery/edit/'.$dt_post->id_gallery)?>"  class="btn btn-primary btn-sm">Edit</a>
                        <button class="btn btn-sm btn-danger delete" data-ref="<?php echo $dt_post->id_gallery;?>">Hapus</button>
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
                    
              