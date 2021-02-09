        <div class="container-fluid">

        
          <div class="card mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Produk RB</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo current_url()?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Judul</label>
                      <input name="judul" type="text" class="form-control" value="<?php echo $produk->row()->judul?>" >
                        <input type="hidden" name="ref" value="<?php echo $produk->row()->id_produk?>" />
                    </div>
                     <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control" required >
                            <option value="">-- pilih kategori --</option>
                            <?php foreach($kategori->result() as $dt_kategori){?>
                                <option value="<?php echo $dt_kategori->id_kategori?>" <?php echo $produk->row()->kategori == $dt_kategori->id_kategori ? 'selected="selected"':'';  ?> ><?php echo $dt_kategori->kategori;?> </option>
                            <?php }?>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" rows="4" name="keterangan"><?php echo $produk->row()->keterangan?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>File Produk</label> <br />
                        <a href="<?php echo $produk->row()->link_file?>" target="_blank"><span class="btn btn-outline-primary btn-sm mb-3"><i class="mdi mdi-file "></i> File Produk RB</span></a>
                        <input type="file" name="userfile" class="form-control col-sm-3" />
                        <input type="hidden" name="fileold" value="<?php echo $produk->row()->filename?>"/>
                    </div>
                    <hr />
                     <input class="btn btn-success" name="submit" type="submit" value="Kirim">
                  </form>
            </div>
          </div>

        </div>