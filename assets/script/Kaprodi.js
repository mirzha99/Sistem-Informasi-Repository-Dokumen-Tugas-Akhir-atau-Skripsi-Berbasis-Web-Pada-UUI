class Kaprodi extends Core{
    alumni(){
        this.Modal('Tambah Alumni','kaprodi/alumni/add','Tambah Alumni','btn btn-primary');
        $('#id').val('');
        $('#nim').val('');
        $('#nama').val('');
        $('#username').val('');
        $('#password').val('');
        $('#no_telpon').val('');
    }
    editalumni(id){
        this.Modal('Edit Alumni','kaprodi/alumni/edit','Edit Alumni','btn btn-warning');
        $.ajax({
            url : this.url(`kaprodi/alumni/id/${id}`),
            method : 'get',
            dataType : 'json',
            success: function(data){
                $('#id').val(data.id);
                $('#nim').val(data.nim);
                $('#nama').val(data.nama);
                $('#username').val(data.username);
                $('#password').val(data.password);
                $('#no_telpon').val(data.no_telpon);
            }
        })
    }
    deletealumni(id){
        this.Modal('Hapus Alumni','kaprodi/alumni/hapus','Hapus Alumni','btn btn-danger');
        $.ajax({
            url : this.url(`kaprodi/alumni/id/${id}`),
            method : 'get',
            dataType : 'json',
            success: function(data){
                $('#id_del').val(data.id);
                $('#nama_del').html(data.nama);
            }
        })
    }
}

var kaprodi = new Kaprodi();