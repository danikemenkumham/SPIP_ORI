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

.page_break { page-break-before: always; }

</style>
<?php
    $satker = $this->uri->segment(4);
    
?>

<p style="padding-top: 250px;">
<b style="font-size: 30px; text-align: center; ">PEMENUHAN DATA DUKUNG RENCANA KERJA TAHUNAN(RKT) <?php echo $this->session->userdata('tahun')?> <br /> 
<?php echo modules::run('satker/rkt/get_satker', $satker)?> </b><br />
<hr />
<h2 style="margin-bottom: 0px;">Kementerian Hukum dan Hak Asasi Manusia RI</h2> 
<i style="font-size: 14px;">erb.kemenkumham.go.id</i>
</p>


<?php $no=1; foreach($rkt->result() as $dt_rkt){?>
<div class="">
            <?php
            $kategori_penilaian = modules::run('satker/rkt/get_kategori_penilaian_cetak', $this->uri->segment(4));
            foreach($kategori_penilaian->result() as $dt_kategori){
            ?>
       
                   <div class="page_break">
                    <table class="table" style="margin-top: 25px;">
                        <?php $poin_penilaian = modules::run('satker/rkt/get_poin_penilaian', $dt_kategori->id_rkt, $satker);  ?>
                        <tr style="background-color: #0FA5D7; color: white;">
                            <td colspan="6" style="font-size: 14px;">
                             Area Perubahan         : <?php echo  ucwords(strtolower($dt_rkt->nama_area));?> <br />
                             Kategori Penilaian : <?php echo $dt_kategori->kegiatan;?> <br />
                                 <?php 
                                        if($this->session->userdata('role') == '5'){
                                            $satker = $this->session->userdata('satker');
                                       }else{
                                             $last_uri = $this->uri->segment_array();
                                             $satker = $last_uri[count($last_uri)];
                                       } 
                                        $daduk =  modules::run('satker/rkt/count_rkt_cetak', $dt_kategori->id_rkt,$satker);    
                                      echo 'Pemenuhan Data Dukung : <b>'.$daduk.'%</b>';  
                                     
                                      ?>
                            </td>
                        
                        </tr>
                        <tr>
                            <th style="width: 20%; border:1px solid black">Kegiatan</th>                                
                            <th style="width: 25%; border:1px solid black">Indikator Keberhasilan</th>
                            <th style="width: 25%; border:1px solid black">Data Dukung</th>
                            <th style="width: 5%; border:1px solid black">Target</th>
                            <th style="width: 15%; border:1px solid black">Upload Daduk</th>
                            <th style="width: 10%; border:1px solid black; text-align: center;">Status</th>
                        </tr>
                        <?php  foreach($poin_penilaian->result() as $dt_poin){?>
                           <?php $data_dukung = modules::run('satker/rkt/get_data_dukung', $dt_poin->id_pelaksanaan)?>
                        <tr>
                                    <td style="width: 20%;border:1px solid black;"><p><?php echo $dt_poin->kegiatan?></p></td>
                                    <td style="width: 20%;border:1px solid black;"><p><?php echo nl2br($dt_poin->indikator_keberhasilan)?></p></td>
                                    <td style="width: 25%;border:1px solid black;"><p><?php echo nl2br($dt_poin->daduk)?></p></td>
                                    <td style="width: 5%;border:1px solid black;"><b><p><?php echo nl2br($dt_poin->waktu_pelaksanaan)?></p></b></td>
                                    
                                    <td style="border:1px solid black;">
                                         <?php if($data_dukung->num_rows()  > 0 ){?>
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
                                            $status_lengkap = modules::run('satker/rkt/get_status_penilaian', $dt_poin->id_pelaksanaan);
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
  
       </div>
<?php  $no++;}?>
