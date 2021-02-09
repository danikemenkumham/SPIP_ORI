        <div class="container-fluid">

          <!-- Page Heading -->
          <a href="<?php echo site_url('master/indeks/addkomponen/'.$this->uri->segment(4))?>" class="mb-3 btn btn-success btn-sm btn-icon-text"> <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Komponen</a>

          <!-- DataTales Example -->
          <div class="card mb-4">
            
            <div class="card-body">
               <h4 class=" align-middle">INDEKS <?php echo strtoupper($this->uri->segment(4)) ?></h4> 
               <select class="form-control text-dark year" name="year" data-ref="<?php echo $this->uri->segment(4)?>">
                    <option value="2017" <?php echo $this->input->get('year') == '2017' ? 'selected="selected"':'';?> ><b>2017</b></option>
                    <option value="2018" <?php echo $this->input->get('year') == '2018' ? 'selected="selected"':'';?> ><b>2018</b></option>
                    <option value="2019" <?php echo $this->input->get('year') == '2019' ? 'selected="selected"':'';?> ><b>2019</b></option>
                    <option value="2020" <?php echo $this->input->get('year') == '2020' ? 'selected="selected"':'';?> ><b>2020</b></option>
               </select>

               <hr />
              
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead class="text-white bg-info">
                    <tr>
                      <th>No</th>
                      <th>Komponen</th>
                      <th>Bobot</th>
                      <th>Nilai</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php 
                     if($this->input->get('page') == true){
                          $no=1+$this->input->get('page');
                     }else{
                        $no= 1;
                     } ;
                     $total = 0;
                     $total_nilai = 0;
                    foreach($komponen->result() as $dt_komponen){?>
                    <tr class="row_<?php echo $dt_komponen->id_komponen?>">
                      <td class="py-1"><?php echo $no;?></td>
                      
                      <td><?php echo $dt_komponen->komponen?></td>
                       <td><?php echo $dt_komponen->bobot?></td>
                        <td><?php echo $dt_komponen->nilai?></td>
                   
                      <td style="width: 20%;">
                        <a href="<?php echo site_url('master/indeks/editkomponen/'.$this->uri->segment(4).'/'.$dt_komponen->id_komponen)?>"  class="btn btn-primary btn-xs">Edit</a>
                        <button data-ref="<?php echo $dt_komponen->id_komponen?>" class="btn btn-danger btn-xs delete">Hapus</button>
                      </td>
                    </tr>
                    <?php $total +=$dt_komponen->bobot;$total_nilai +=$dt_komponen->nilai; $no++; }?>
                    <?php if($komponen->num_rows() > 0){?>
                    <tr>
                        <td colspan="2" class="text-right"><b>Total</b></td>
                        <td><b><?php echo $total?></b></td>
                        <td><b><?php echo $total_nilai?></b></td>
                        <td></td>
                    </tr>
                    <?php }?>
                  
                  </tbody>
                </table>
              </div>
              <hr />
              <div class="col-md-12 mt-3">
                <form action="<?php echo current_url()?>" method="post">
                    <div class="form-group">
                        <label><b>Catatan :</b></label>
                        <textarea class="form-control editor" rows="10" name="keterangan"><?php echo $keterangan?></textarea>
                        <input type="hidden" value="<?php echo $this->input->get('year') ?>" name="year" />
                        <input type="hidden" value="<?php echo $this->uri->segment(4) ?>" name="indeks" />
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Simpan" name="submit" class="btn btn-warning" />
                    </div>
                </form>
              </div>
               
            </div>
          </div>

        </div>