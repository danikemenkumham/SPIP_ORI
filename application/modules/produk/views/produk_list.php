        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card mb-4 rounded">
            <div class="card-body"> 
                <h4 class="text-center bg-danger rounded p-3 text-white mb-3">Porduk RB</h4>
                    <hr />
                   <div class="post-details">
                           <ul class="nav nav-pills nav-pills-danger mb-4" id="pills-tab" role="tablist">
                            <?php  $no=1; foreach($kategori->result() as $dt_kategori){?>
                            <li class="nav-item">
                              <a data-ref="<?php echo $dt_kategori->id_kategori;?>" class="nav-link produk_ <?php echo $no == 1 ? 'active':'';?>" id="pills-<?php echo $dt_kategori->id_kategori;?>-tab" data-toggle="pill" href="#pills-<?php echo $dt_kategori->id_kategori;?>" role="tab" aria-controls="pills-<?php echo $dt_kategori->id_kategori;?>" aria-selected="true"><b><?php echo ucwords($dt_kategori->kategori);?></b></a>
                            </li>
                            
                            <?php $no++;}?>
            
                          </ul>
                            <div class="tab-content" id="pills-tabContent">
                                 <?php  $no=1; foreach($kategori->result() as $dt_kategori){?>
                                     <div class="tab-pane fade  <?php echo $dt_kategori->id_kategori  == 10 ? 'active show':'';?>" id="pills-<?php echo $dt_kategori->id_kategori ?>" role="tabpanel" aria-labelledby="pills-<?php echo $dt_kategori->id_kategori ?>-tab">
                                            <div class="list-group">
                                                   <?php
                                                   if($dt_kategori->id_kategori == 10){
                                                   $no=1; foreach($produk->result() as $dt_produk){?>
                                                  <span class=" del_tab list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="row">
                                                    <div class="col-sm-9">
                                                        <div class="d-flex w-100 justify-content-between">
                                                        <h4 class="mb-1 text-dark"><?php echo $dt_produk->judul?></h4>
                                                        </div>
                                                        <p class="mb-1">
                                                            <?php echo $dt_produk->keterangan?>
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <a class="btn btn-info btn-block h6 text-white" target="_blank"  href="<?php echo $dt_produk->link_file;?>"><i class="mdi-download mdi"></i> Download</a>
                                                    </div>
                                                    </div>
                                                </span>
                                               <?php $no ++; }}?>
                                                <div class="text-center loader_" style="display: none;" >
                                                    <img src="<?php echo base_url()?>assets/image/loader.gif" />
                                                </div>      
                                                <div class="pills-<?php echo  $dt_kategori->id_kategori?>"></div>  
                                            </div> 
                                    </div>  
                                 <?php }?>  
                                    
                            </div>
                        </div>
                   
                   
            </div>
          </div>

        </div>
                    
              