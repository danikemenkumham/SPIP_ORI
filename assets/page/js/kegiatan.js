 $( document ).ready(function(){
    base_url = $('.base').data('url');
    $('.perubahan').change(function(){
      url = base_url+'master/kegiatan/get_capaian';
        $.post(url,{ref:$(this).val()}, function(data){
            $('select[name="capaian"]').html(data);
        })
      })

 })