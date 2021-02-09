        <div class="container-fluid">

          <!-- Page Heading -->
         
          
          <a href="<?php echo site_url('master/page/tambah')?>" class="mb-3 btn btn-success btn-sm btn-icon-text"> <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Page</a>

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
                      <th>Judul</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php $no=1; foreach($page->result() as $dt_post){?>
                    <tr class="row_<?php echo $dt_post->id_page?>">
                      <td class="py-1"><?php echo $no;?></td>
                       <td><?php echo $dt_post->title?></td>
          
                      <td style="width: 20%;">
                        <a href="<?php echo site_url('master/page/edit/'.$dt_post->id_page)?>"  class="btn btn-primary btn-xs">Edit</a>
                      </td>
                    </tr>
                    <?php $no++; }?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
                    
              