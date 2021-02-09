<style>
.notif a:hover{
    text-decoration: none;
}
</style>
           
              
                   <div class="col-md-12">
                   <h4>Notifikasi</h4> 
                    </div>
                   <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body notif">
                      
                         <?php foreach($notifikasi->result() as $dt_notif){?>
                          <a href="<?php echo site_url('notifikasi/read/'.$dt_notif->id_notif)?>">
                          <blockquote class="blockquote blockquote-<?php echo $dt_notif->is_read == 0 ? 'success':'default'?>">
                            <p><?php echo ucfirst($dt_notif->pesan)?> <br /><small><?php echo $dt_notif->create_date;?></small> </p>
                            <footer class="blockquote-footer"><cite title="Source Title"><?php echo $dt_notif->pengirim?></cite></footer>
                          </blockquote>
                          </a>  
                          <?php }?>
                        </div>
                      </div>
                    </div>
                    
              