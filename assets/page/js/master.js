$(document).ready(function(){
    
    $('.tambah_satker').click(function(){
        satkerid = $('.satker').val();
        satker = $('.satker option:selected').text();
       
        if(satkerid == ''){
           alert('pilih salah satu satuan kerja untuk di tambahkan');
            return false;
        }else{
            $('.cont_satker').append('<div class="input-group mb-3 col-lg-6 '+satkerid+'"><input type="hidden" name="satker_list[]" value="'+satkerid+'"/><input class="form-control" type="text" value="'+satker+'" name="satker[]" /><div class="input-group-append rem_satker" data-ref="'+satkerid+'"><button class="btn btn-danger " type="button" ><i  class="mdi mdi-delete menu-icon"></i></button></div></div>')    
        }  
    })    
})
       $(document).on("click", ".rem_satker",function() {
          ref= $(this).attr('data-ref');
        $('.'+ref).remove();
       })
      
      //detail pmprb
      $('.tambah_satker_edit').click(function(){
            _baseurl = $('.base').data('url');
            satkerid = $('.satker').val();
            satker = $('.satker option:selected').text();
            detail = $(this).data('ref');
           
            if(satkerid == ''){
               alert('pilih salah satu satuan kerja untuk di tambahkan');
                return false;
            }else{
                url = _baseurl+'master/pmprb/add_satker_detail';
                $.post(url,{detail:detail, satker: satkerid}, function(data){
                    
                })
                $('.cont_satker').append('<div class="input-group mb-3 col-lg-6 '+satkerid+'"><input type="hidden" name="satker_list[]" value="'+satkerid+'"/><input class="form-control" type="text" value="'+satker+'" name="satker[]" /><div class="input-group-append rem_satker" data-ref="'+satkerid+'"><button class="btn btn-danger " type="button" ><i  class="mdi mdi-delete menu-icon"></i></button></div></div>')    
            }
            
        })
        
        $(document).on("click", ".rem_satker_edit",function() {
          _baseurl = $('.base').data('url');
          ref= $(this).attr('data-ref');
          detail = $(this).data('detail');
          url = _baseurl+'master/pmprb/rem_satker_detail';
          $.post(url,{detail:detail}, function(data){
                $('.'+ref).remove();
          })
       })
       
       //detail wbk
       $('.tambah_satker_edit_wbk').click(function(){
            _baseurl = $('.base').data('url');
            satkerid = $('.satker').val();
            satker = $('.satker option:selected').text();
            detail = $(this).data('ref');
           
            if(satkerid == ''){
               alert('pilih salah satu satuan kerja untuk di tambahkan');
                return false;
            }else{
                url = _baseurl+'master/wbk/add_satker_detail';
                $.post(url,{detail:detail, satker: satkerid}, function(data){
                    
                })
                $('.cont_satker').append('<div class="input-group mb-3 col-lg-6 '+satkerid+'"><input type="hidden" name="satker_list[]" value="'+satkerid+'"/><input class="form-control" type="text" value="'+satker+'" name="satker[]" /><div class="input-group-append rem_satker" data-ref="'+satkerid+'"><button class="btn btn-danger " type="button" ><i  class="mdi mdi-delete menu-icon"></i></button></div></div>')    
            }
            
        })
       
       
       $(document).on("click", ".rem_satker_edit_wbk",function() {
          _baseurl = $('.base').data('url');
          ref= $(this).attr('data-ref');
          detail = $(this).data('detail');
          url = _baseurl+'master/wbk/rem_satker_detail';
          $.post(url,{detail:detail}, function(data){
                $('.'+ref).remove();
          })
       })
    
    //pmrpb master page
    $(document).ready(function(){
        $('.g_satker').change(function(){
            _baseurl = $('.base').data('url');
            ref = $(this).val();
            
            url = _baseurl+'master/pmprb/get_satker_list';
            $.post(url,{tipe:ref},function(data){
                $('.satker-row').html(data);
            })
        })
    })
    
    
