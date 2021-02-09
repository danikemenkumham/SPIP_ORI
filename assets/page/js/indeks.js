 $(document).on('change', '.year', function(data){
    ref = $(this).data('ref');
    val = $(this).val();
    urls = $('.base').data('url');
    url = ''+urls+'master/indeks/nilai?tahun='+val+'';
    location.href = url; 
 })
 
  $(document).on('change', '.nilai', function(data){
    
    ref = $(this).data('ref');
    val = $(this).val();
    urls = $('.base').data('url');
    if(val == ''){
        alert('nilai tidak boleh kosong');
        return false;
    }else{
        url = ''+urls+'master/indeks/enilai';
        $.post(url,{ref:ref, val:val}, function(data){
            alert('data berhasil diubah')
        })
    }
    
    
  })
  
  