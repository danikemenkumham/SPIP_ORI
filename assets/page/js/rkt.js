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
      
      //detail rkt
      $('.tambah_satker_edit').click(function(){
  
            satkerid = $('.satker').val();
            satker = $('.satker option:selected').text();
            detail = $(this).data('ref');
           
            if(satkerid == ''){
               alert('pilih salah satu satuan kerja untuk di tambahkan');
                return false;
            }else{
                $('.cont_satker').append('<div class="input-group mb-3 col-lg-6 '+satkerid+'"><input type="hidden" name="satker_list[]" value="'+satkerid+'"/><input class="form-control" type="text" value="'+satker+'" name="satker[]" /><div class="input-group-append rem_satker" data-ref="'+satkerid+'"><button class="btn btn-danger " type="button" ><i  class="mdi mdi-delete menu-icon"></i></button></div></div>')    
            }
            
        })
        
        $(document).on("click", ".rem_satker_edit",function() {
          ref= $(this).attr('data-ref');
          detail = $(this).data('detail');
          $('.'+ref).remove();
         
       })
       
   