 $( document ).ready(function(){
    $('.add_program').click(function(){
        $('.inp-append').append('<div class="input-group mb-3"><div class="input-group-prepend del_inp"><span class="input-group-text btn btn-sm btn-danger" id="basic-addon1">Hapus</span></div><input type="text" class="form-control" name="program[]"></div>')
    })

 })