 $( document ).ready(function(){
    $('.repassword').change(function(){
       if($(this).val() !== $('.password').val()){
        $(this).addClass('is-invalid');
        $('.relabel').show();
       }else{
        $(this).removeClass('is-invalid');
        $('.relabel').hide();
       }
    })
 })