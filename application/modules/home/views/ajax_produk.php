<?php $no=1; foreach($produk->result() as $dt_produk){?>
  <span class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="row">
        <div class="col-sm-12 mb-2">
            <div class="d-flex w-100 justify-content-between">
            <h4 class="mb-1 text-dark"><?php echo $dt_produk->judul?></h4>
            </div>
             <hr />
        </div>
      
        <div class="col-md-9">
             <p class="mb-1">
                <?php echo $dt_produk->keterangan?>
            </p>
        </div>
        <div class="col-sm-3">
            <a class="btn btn-info btn-block h6 text-white" target="_blank"  href="<?php echo $dt_produk->link_file;?>"><i class="mdi-download mdi"></i> Download</a>
        </div>
        
    </div>
</span>
<?php $no ++; }?>