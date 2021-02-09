 
function uploadFile(event,satker, ref,tahun){

                $('.upload'+ref).hide();
                $('.spin'+ref).show();
                urls = $('.base').data('url');
                var file=event.target.files[0];
               
                 var form = new FormData();
                 form.append('userfile', file);
                 form.append('satker', satker);
                 form.append('ref', ref);
                 form.append('tahun', tahun);
                $.ajax({
                     url: urls+'satker/laporan/do_upload',
                     type:"post",
                     data:form,
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:true,
                      success: function(data){
                          location.reload();
                          //$('.spin'+ref).hide();
                          //$('.file'+ref).html(data);
                   }
                 });     
         
        }
        
        $(document).on('click', '.lapr', function(){
             konfirm = confirm('Apakah anda yakin menghapus dokumen ini ?');
            if(konfirm == true){
                _baseurl = $('.base').data('url');
                urls = _baseurl+'satker/laporan/rlap';
                ref = $(this).data('ref');
                $.post(urls,{ref:ref}, function(data){
                    location.reload();
                })    
            }else{
               return false; 
            }
            
            
         })
   

    
   
       $(document).on("change", ".verifikasi",function(){
            _baseurl = $('.base').data('url');
            urls = _baseurl+'satker/rkt/verifikasi';
            satker = $(this).data('satker');
            ref = $(this).data('objek');
            val = $(this).val();
            $.post(urls,{satker:satker, ref:ref, val:val}, function(data){
            })
       })
       
        $(document).on("click", ".catatan",function(){
            _baseurl = $('.base').data('url');
            satker = $(this).data('satker');
            detail = $(this).data('detail');
            catatan = $('.catatan'+detail).val();
            urls = _baseurl+'satker/rkt/add_catatan';
            $.post(urls,{satker:satker, detail:detail, catatan:catatan}, function(data){
                $('.catatan'+detail).val('');
                $('.con_catatan'+detail).html(data);
            })
        })
        
        $(document).on('change','.data_pendukusng', function(){
            _baseurl = $('.base').data('url');
            ref = $(this).data('satker')+$(this).data('objek');
       
            var file = _('input[name="userfile'+ref+'"]').files[0]; 
            var form = new FormData();
            form.append('userfile', file);
            $.ajax({
                 url: _baseurl+'satker/rkt/do_upload',
                 type:"post",
                 data:data,
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:false,
                  success: function(data){
                      alert("Upload Image Successful.");
               }
             });
        })
        
        $(document).on('click','.area', function(){
            _baseurl = $('.base').data('url');
           id = $(this).data('ref');
           satker = $(this).data('satker');
           if(satker ==  null || satker ==  ''){
            location.href = ''+_baseurl+'satker/rkt/poin/'+id;
           }else{
            location.href = ''+_baseurl+'satker/rkt/poin/'+id+'/'+satker; 
           }
           
        })
        
         $(document).on('click','.poin', function(){
            _baseurl = $('.base').data('url');
           id = $(this).data('ref');
           
           satker = $(this).data('satker');
           if(satker ==  null || satker ==  ''){
             location.href = ''+_baseurl+'satker/rkt/detail/'+id;
           }else{
            location.href = ''+_baseurl+'satker/rkt/detail/'+id+'/'+satker; 
           }
           
           
          
        })