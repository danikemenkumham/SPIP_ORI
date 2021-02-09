        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Waktu Pelaksanaan</h1>
          <p class="mb-4">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
          </p>
          <a href="<?php echo site_url('master/pelaksanaan/tambah_pelaksanaan')?>" class="btn btn-success mb-2 ">Tambah Waktu Pelaksanaan</a>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pelaksanaan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Waktu Pelaksanaan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>No</th>
                     <th>Kode</th>
                     <th>Waktu Pelaksanaan</th>
                     <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no=1; foreach($pelaksanaan->result() as $dt_pelaksanaan){?>
                    <tr class="row_<?php echo $dt_pelaksanaan->id_waktu_pelaksanaan?>">
                      <td><?php echo $no;?></td>
                       <td><?php echo $dt_pelaksanaan->kode_waktu_pelaksanaan?></td>
                      <td><?php echo $dt_pelaksanaan->waktu_pelaksanaan?></td>
                      <td style="width: 15%;">
                        <a href="<?php echo site_url('master/pelaksanaan/edit_pelaksanaan/'.$dt_pelaksanaan->id_waktu_pelaksanaan)?>"  class="btn btn-primary btn-sm">Edit</a>
                        <button data-ref="<?php echo $dt_pelaksanaan->id_waktu_pelaksanaan?>" class="btn btn-danger btn-sm delete">Hapus</button>
                      </td>
                    </tr>
                    <?php $no++;}?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>