        <div class="container-fluid">
          <a href="<?php echo site_url('master/indeks/addnilai/'.$this->uri->segment(4))?>" class="mb-3 btn btn-success btn-sm btn-icon-text"> <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Nilai</a>
          <!-- DataTales Example -->
          <div class="card mb-4">
            
            <div class="card-body">
               <h4 class=" align-middle">Indeks Nilai </h4> 
               <select class="form-control text-dark year" name="year" data-ref="<?php echo $this->uri->segment(4)?>">
                     <?php
                    $tahun = array('2016','2017','2018','2019','2020');
                    foreach($tahun as $dt_tahun){
                        if($this->input->get('tahun') == $dt_tahun){
                            $selected = 'selected="selected"';
                        }else{
                            $selected = '';
                        }
                       echo ' <option value="'.$dt_tahun.'"  '.$selected.'>'.$dt_tahun.'</option>';
                    }
                ?>
               </select>
               
               
               

               <hr />
              
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead class="text-white bg-info">
                    <tr>
                      <th>No</th>
                      <th>Indeks</th>
                      <th>Nilai</th>
                      <th>Tahun</th>
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
                    foreach($indeks->result() as $dt_indeks){?>
                    <tr class="row_<?php echo $dt_indeks->idnilai?>">
                      <td class="py-1"><?php echo $no;?></td>
                      
                      <td><?php echo $dt_indeks->indeks?></td>
                       <td style="width: 20%;">
                        <input  data-ref="<?php echo md5($dt_indeks->idnilai)?>" type="number"  step="0.01" min="0" value="<?php echo $dt_indeks->nilai?>" class="form-control nilai" name="nilai" />
                       </td>
                        <td><?php echo $dt_indeks->tahun?></td>
                   
                      <td style="width: 20%;">
                        <button data-ref="<?php echo md5($dt_indeks->idnilai)?>" class="btn btn-danger btn-xs delete">Hapus</button>
                      </td>
                    </tr>
                    <?php  $no++; }?>
                   
                  
                  </tbody>
                </table>
              </div>
              
            </div>
          </div>

        </div>