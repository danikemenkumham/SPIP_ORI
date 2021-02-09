 
function uploadFile(event,satker, ref,poin_penilaian){
            caption = $('.caption'+satker+ref).val();
            if(caption == ''){
                alert('harap masukkan keterangan dokumen');
                $('.data_pendukung'+satker+ref).val('');
                return false
            }else{
                $('.input'+satker+ref).hide();
                $('.spin'+satker+ref).show();
                urls = $('.base').data('url');
                var file=event.target.files[0];
                caption = $('.caption'+satker+ref).val();
                console.log(satker);
                 var form = new FormData();
                 form.append('userfile', file);
                 form.append('satker', satker);
                 form.append('ref', ref);
                 form.append('poin_penilaian',poin_penilaian);
                 form.append('caption', caption);
                $.ajax({
                     url: urls+'satker/pmprb/do_upload',
                     type:"post",
                     data:form,
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:true,
                      success: function(data){
                          //$('.data_pendukung'+satker+ref).hide();
                          $('.spin'+satker+ref).hide();
                           $('.caption'+satker+ref).val('');
                           $('.data_pendukung'+satker+ref).val('');
                          $('.existdatadukung'+satker+ref).remove();
                          $('.datapendukung'+satker+ref).html(data);
                          $('.input'+satker+ref).show();
                          $('.datapendukung'+satker+ref).show();
                         // alert(data);
                          //alert("Upload Image Successful.");
                   }
                 });
            } 
        }
   

    
   
       $(document).on("change", ".verifikasi",function(){
            _baseurl = $('.base').data('url');
            urls = _baseurl+'satker/pmprb/verifikasi';
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
            if(catatan == ''){
                alert('catatan harus di isi!');
                $('.catatan'+detail).focus();
                return false;
            }else{
                 urls = _baseurl+'satker/pmprb/add_catatan';
                $.post(urls,{satker:satker, detail:detail, catatan:catatan}, function(data){
                    $('.catatan'+detail).val('');
                    $('.con_catatan'+detail).html(data);
                })       
            }  
        })
        
        $(document).on('change','.data_pendukusng', function(){
            _baseurl = $('.base').data('url');
            ref = $(this).data('satker')+$(this).data('objek');
       
            var file = _('input[name="userfile'+ref+'"]').files[0]; 
            var form = new FormData();
            form.append('userfile', file);
            $.ajax({
                 url: _baseurl+'satker/pmprb/do_upload',
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
            location.href = ''+_baseurl+'satker/pmprb/poin/'+id;
           }else{
            location.href = ''+_baseurl+'satker/pmprb/poin/'+id+'/'+satker; 
           }
           
        })
        
         $(document).on('click','.poin', function(){
            _baseurl = $('.base').data('url');
           id = $(this).data('ref');
           
           satker = $(this).data('satker');
           if(satker ==  null || satker ==  ''){
             location.href = ''+_baseurl+'satker/pmprb/detail/'+id;
           }else{
            location.href = ''+_baseurl+'satker/pmprb/detail/'+id+'/'+satker; 
           }
        })
        
        $(document).on('click', '.dok-rem', function(){
            konfirm = confirm('Apakah anda yakin menghapus dokumen ini ?');
            if(konfirm == true){
                _baseurl = $('.base').data('url');
                url = _baseurl+'satker/pmprb/rdok';
                ref = $(this).data('ref');
                $.post(url,{ref:ref},function(data){
                    location.reload();
                })
            }else{
                return false;
            }
        })
