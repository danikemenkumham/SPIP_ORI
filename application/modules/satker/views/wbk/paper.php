<style>
body{
    font-size: 12px;
}
table {
    border-collapse: collapse;
    vertical-align: text-top;
}
table td, th {
    padding: 5px 10px!important;
    text-align: left;
     vertical-align: top;
}

th{
    background-color: #F7F7F7;
    font-size: 13px;
}

.page_break { page-break-before: always; page-break-inside: avoid;}

</style>
<?php
    $satker = $this->uri->segment(4);
    
?>

<p style="padding-top: 250px;">
<b style="font-size: 30px; text-align: center; ">PEMENUHAN DATA DUKUNG LKE WBK/WBBM <?php echo $this->session->userdata('tahun')?> <br /> 
<?php echo modules::run('satker/pmprb/get_satker', $satker)?> </b><br />
<hr />
<h2 style="margin-bottom: 0px;">Kementerian Hukum dan Hak Asasi Manusia RI</h2> 
<i style="font-size: 14px;">erb.kemenkumham.go.id</i>
</p>


<?php $no=1; foreach($wbk->result() as $dt_wbk){?>
            <?php
            $kategori_penilaian = modules::run('satker/wbk/get_kategori_penilaian_cetak', $this->uri->segment(4), $dt_wbk->id_area);
           
            foreach($kategori_penilaian->result() as $dt_kategori){
            ?>
       
                   <div class="page_break">
                    <table class="table" style="margin-top: 25px;">
                        <?php $poin_penilaian = modules::run('satker/wbk/get_poin_penilaian', $dt_kategori->id_wbk, $satker);  ?>
                        <tr style="background-color: #0FA5D7; color: white;">
                            <td colspan="5" style="font-size: 14px;">
                             Area Perubahan         : <?php echo  ucwords(strtolower($dt_wbk->nama_area));?> <br />
                             Kategori Penilaian : <?php echo $dt_kategori->indikator;?> <br />
                                 <?php 
                                        if($this->session->userdata('role') == '5'){
                                            $satker = $this->session->userdata('satker');
                                       }else{
                                             $last_uri = $this->uri->segment_array();
                                             $satker = $last_uri[count($last_uri)];
                                       } 
                                        $daduk =  modules::run('satker/wbk/count_wbk_cetak', $dt_kategori->id_wbk,$satker);    
                                      echo 'Pemenuhan Data Dukung : <b>'.$daduk.'%</b>';  
                                     
                                      ?>
                            </td>
                        
                        </tr>
                        <tr>
                            <th style="width: 25%; border:1px solid black">Poin Indikator</th>
                            <th style="width: 25%; border:1px solid black">Petunjuk Teknis</th>
                            <th style="width: 25%; border:1px solid black">Data Dukung</th>
                            <th style="width: 15%; border:1px solid black">Upload Daduk</th>
                            <th style="width: 10%; border:1px solid black; text-align: center;">Status</th>
                        </tr>
                        <?php  foreach($poin_penilaian->result() as $dt_poin){?>
                           <?php $data_dukung = modules::run('satker/wbk/get_data_dukung', $dt_poin->id_detail_wbk_user)?>
                        <tr>
                            <td style="border:1px solid black"><p><?php echo $dt_poin->poin_indikator?> </p></td>
                            <td style="border:1px solid black"><p><?php echo nl2br($dt_poin->juknis)?></p></td>
                            <td style="border:1px solid black"><p><?php echo nl2br($dt_poin->daduk)?></p></td>
                            <td style="border:1px solid black;">
                                 <?php  if($data_dukung->num_rows()  > 0 ){ ?>
                                     <ul style="padding-left: 10px;">
                                        <?php $no= 1; foreach($data_dukung->result() as $dt_dukung){?>
                                        <li style="margin: 0px;">
                                         <a style="width: 100%;" target="_blank" class="text-dark" href="<?php echo $dt_dukung->path?>"><i class="mdi mdi-attachment menu-icon"></i> <?php echo $dt_dukung->caption?></a>  
                                        </li>
                                    <?php }?>
                                     </ul>
                                 <?php }else{ ?>
                                            <p>Belum Upload</p>                                                          
                                 <?php }?>

                            </td>
                            <td style="border:1px solid black; text-align: center;">
                                <?php
                                    $status_lengkap = modules::run('satker/wbk/get_status_penilaian', $dt_poin->id_detail_wbk_user);
                                    if($status_lengkap->row()->status != ''){
                                        echo ucwords($status_lengkap->row()->status);
                                    }else{
                                        if($data_dukung->num_rows()  > 0 ){
                                          if($status_lengkap->row()->status == ''){
                                            echo 'Belum Diverifikasi';
                                          }
                                        }else{
                                            echo '-';
                                        }  
                                    }
                                ?>      
                            </td>  
                        </tr>
                        <?php }?>
                    </table>
                    </div>
          
            <?php }?>
<?php  $no++;}?>
