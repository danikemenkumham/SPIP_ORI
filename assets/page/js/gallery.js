
    function uploadFile(event, ref){
            $('.up-form').hide();
            $('.spin').show();
            
            caption = $('.caption').val();
            if(caption == ''){
                alert('masukkan caption foto');
                return false;
            }
            
          
             urls = $('.base').data('url');
             var file=event.target.files[0];
          
             var form = new FormData();
             form.append('userfile', file);
             form.append('caption', caption);
             form.append('gallery', ref);
             $.ajax({
                 url: urls+'master/gallery/do_upload',
                 type:"post",
                 data:form,
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:true,
                 success: function(data){
                      $('.up-form').show();
                      $('.spin').hide();
                      $('.caption').val('');
                      $('.file').val('');
                      $('.list-photo').html(data);
               }
             });
        }
        
       $(document).on('click', '.photo_del', function(data){
        konfirm = confirm('apakah anda ingin menghapus foto ini ? ');
        if(konfirm == false){
            return false;
        }else{
            urls = $('.base').data('url');
            url = ''+urls+'/master/gallery/unset_photo';
            ref = $(this).data('ref');
            old = $(this).data('old');
            $.post(url, {ref:ref, fileold:old}, function(data){
                $('.rows'+ref).remove();
            })      
        }
      
       }) 
        
    