        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Kegiatan</h1>
          <p class="mb-4">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
          </p>
          <a href="<?php echo site_url('master/kegiatan/tambah_area_kegiatan')?>" class="btn btn-success mb-2 ">Tambah Kegiatan</a>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Kegiatan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                       <th>No</th>
                      <th>Area Perubahan</th>
                      <th>Capaian</th>
                      <th>Kegiatan</th>
                      <th>Indikator</th>
                      <th>Data Dukung</th>
                      <th>Waktu Pelaksanaan</th>
                      <th>Penanggung Jawab</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Area Perubahan</th>
                      <th>Capaian</th>
                      <th>Kegiatan</th>
                      <th>Indikator</th>
                      <th>Data Dukung</th>
                      <th>Waktu Pelaksanaan</th>
                      <th>Penanggung Jawab</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $no=1; foreach($kegiatan->result() as $dt_kegiatan){?>
                    <tr class="row_<?php echo $dt_kegiatan->id_kegiatan?>">
                      <td><?php echo $no;?></td>
                      <td><?php echo $dt_kegiatan->area_perubahan?></td>
                      <td><?php echo $dt_kegiatan->capaian?></td>
                      <td><?php echo $dt_kegiatan->nama_kegiatan?></td>
                      <td><?php echo $dt_kegiatan->indikator_keberhasilan?></td>
                      <td><?php echo $dt_kegiatan->data_dukung?></td>
                      <td><?php echo $dt_kegiatan->waktu_pelaksanaan?></td>
                      <td><?php echo $dt_kegiatan->penanggung_jawab?></td>
                      <td >
                        <a href="<?php echo site_url('master/kegiatan/edit_kegiatan/'.$dt_kegiatan->id_kegiatan)?>"  class="btn btn-primary btn-sm">Edit</a>
                        <button data-ref="<?php echo $dt_kegiatan->id_kegiatan?>" class="btn btn-danger btn-sm delete">Hapus</button>
                        <button type="button" class="btn btn-sm btn-warning">Detail</button>
                      </td>
                    </tr>
                    <?php $no++;}?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>