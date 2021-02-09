        <div class="container-fluid">

          <!-- Page Heading -->
         
          
          <a href="<?php echo site_url('master/posts/tambah')?>" class="mb-3 btn btn-success btn-sm btn-icon-text"> <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Artikel</a>

          <!-- DataTales Example -->
          <div class="card mb-4">
            
            <div class="card-body">
               <h4 class="card-title align-middle">Post Artikel</h4> 
                    <hr />
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Featured Image</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                
                  <tbody>
                    <?php $no=1; foreach($post->result() as $dt_post){?>
                    <tr class="row_<?php echo $dt_post->id_post?>">
                      <td class="py-1"><?php echo $no;?></td>
                       <td><?php echo $dt_post->title?></td>
                      <td>
                        <img src="<?php echo $dt_post->path_featured_image?>" width="100px"  />
                      </td>
                      <td>
                        <?php if($dt_post->status == 1){
                            echo '<span class="badge badge-success">Tampil</span>';
                        }else{
                             echo '<span class="badge badge-danger">Tidak Tampil</span>';
                        } 
                        ?>
                      </td>
                      <td style="width: 20%;">
                        <a href="<?php echo site_url('master/posts/edit/'.$dt_post->id_post)?>"  class="btn btn-primary btn-xs">Edit</a>
                        <button data-ref="<?php echo $dt_post->id_post?>" class="btn btn-danger btn-xs delete">Hapus</button>
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
                    
              