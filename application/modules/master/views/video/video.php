        <div class="container-fluid">

          <!-- Page Heading -->
         
          <?php if($this->session->userdata('role') != 3){ ?>
          <a href="<?php echo site_url('master/video/tambah')?>" class="mb-3 btn btn-success btn-sm btn-icon-text"> <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Video</a>
         <?php }?>
          <!-- DataTales Example -->
          <div class="card mb-4">
            
            <div class="card-body">
               <h5 class="text-dark">Video</h5> 
                    <hr />
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="text-white bg-info">
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Video</th>
                      <th>Status</th>
                      <?php if($this->session->userdata('role') != 3){ ?>
                      <th>Aksi</th>
                      <?php }?>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php $no=1; foreach($video->result() as $dt_post){?>
                    <tr class="row_<?php echo $dt_post->id_video?>">
                      <td class="py-1"><?php echo $no;?></td>
                       <td><?php echo $dt_post->caption?></td>
                      <td>
                        <iframe width="200" height="150" src="<?php echo $dt_post->url?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </td>
                      <td>
                        <?php if($dt_post->status == 1){
                            echo '<span class="badge badge-success">Tampil</span>';
                        }else{
                             echo '<span class="badge badge-danger">Tidak Tampil</span>';
                        } 
                        ?>
                      </td>
                        <?php if($this->session->userdata('role') != 3){ ?>
                      <td style="width: 20%;">
                        <a href="<?php echo site_url('master/video/edit/'.$dt_post->id_video)?>"  class="btn btn-dark btn-xs">Edit</a>
                        <button data-ref="<?php echo $dt_post->id_video?>" class="btn btn-danger btn-xs delete">Hapus</button>
                        <?php }?>
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
                    
              