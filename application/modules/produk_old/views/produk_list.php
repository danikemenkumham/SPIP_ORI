        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card mb-4 rounded">
            <div class="card-body"> 
                <h4 class="text-center bg-info rounded p-3 text-white mb-3">Porduk RB</h4>
                    <hr />
                   
                    <div class="list-group">
                       <?php $no=1; foreach($produk->result() as $dt_produk){?>
                      <span class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="row">
                        <div class="col-sm-10">
                            <div class="d-flex w-100 justify-content-between">
                            <h4 class="mb-1 text-dark"><?php echo $dt_produk->judul?></h4>
                            </div>
                            <p class="mb-1">
                                <?php echo $dt_produk->keterangan?>
                            </p>
                         
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-outline-danger btn-block" target="_blank"  href="<?php echo $dt_produk->link_file;?>"><i class="mdi-download mdi"></i> download</a>
                        </div>
                        </div>
                    </span>
                       <?php $no ++; }?>
                    </div>
                   
            </div>
          </div>

        </div>
                    
              