class Admin extends Core{
    //fakultas
    fakultas(){
        this.Modal('Tambah Fakultas','admin/fakultas/add','Tambah Fakultas','btn btn-primary');
        $('#id').val('');
        $('#nama').val('');
    }
    editfakultas(id){
        this.Modal('Edit Fakultas','admin/fakultas/edit','Edit Fakultas','btn btn-warning');
        $.ajax({
            url: this.url(`admin/fakultas/id/${id}`),
            method : 'get',
            dataType :'json',
            success: function (data){
                $('#id').val(data.id);
                $('#nama').val(data.nama);
            }
        })
    }
    deletefakultas(id){
        this.Modal('Hapus Fakultas','admin/fakultas/hapus','Hapus Fakultas','btn btn-danger');
        $.ajax({
            url: this.url(`admin/fakultas/id/${id}`),
            method : 'get',
            dataType :'json',
            success: function (data){
                $('#id_del').val(data.id);
                $('#nama_del').html(data.nama);
            }
        })
    }
    //prodi
    prodi(){
        this.Modal('Tambah Prodi','admin/prodi/add','Tambah Prodi','btn btn-primary');
        $('#id').val('');
        $('#id_fakultas').val('');
        $('#nama_prodi').val('');
    }
    editprodi(id){
        this.Modal('Edit Prodi','admin/prodi/edit','Edit Prodi','btn btn-warning');
        $.ajax({
            url : this.url(`admin/prodi/id/${id}`),
            method:'get',
            dataType: 'json',
            success : function(data){
                $('#id').val(data.id);
                $('#id_fakultas').val(data.id_fakultas);
                $('#nama_prodi').val(data.nama_prodi);
            }
        });
    }
    deleteprodi(id){
        this.Modal('Hapus Prodi','admin/prodi/hapus','Hapus Prodi','btn btn-danger');
        $.ajax({
            url : this.url(`admin/prodi/id/${id}`),
            method:'get',
            dataType: 'json',
            success : function(data){
                $('#id_del').val(data.id);
                $('#nama_del').html(`${data.nama_prodi}`);
            }
        });
    }
    //kaprodi
    kaprodi(){
        this.Modal('Tambah Kaprodi','admin/kaprodi/add','Tambah Kaprodi','btn btn-primary');
        $('#id').val('');
        $('#nama_ketua_prodi').val('');
        $('#id_prodi_pilih').html('=== Pilih Prodi ===');
        $('#id_prodi').prop('disabled', false);
        $('#username').val('');
        $('#password').val('');
    }
    editkaprodi(id){
        this.Modal('Edit Kaprodi','admin/kaprodi/edit','Edit Kaprodi','btn btn-warning');
        $.ajax({
            url: this.url(`admin/kaprodi/id/${id}`),
            method : 'get',
            dataType : 'json',
            success: function(data){
                $('#id').val(data.id);
                $('#nama_ketua_prodi').val(data.nama);
                $('#id_prodi').prop('disabled', true);
                $('#id_prodi_pilih').html(data.nama_prodi);
                $('#username').val(data.username);
                $('#password').val(data.password);
            }
        });
    }
    deletekaprodi(id){
        this.Modal('Hapus Kaprodi','admin/kaprodi/hapus','Hapus Kaprodi','btn btn-danger');
        $.ajax({
            url: this.url(`admin/kaprodi/id/${id}`),
            method : 'get',
            dataType : 'json',
            success: function(data){
                $('#id_del').val(data.id);
                $('#nama_del').html(data.nama);
            }
        });
    }
    //user
    user(){
        this.Modal('Tambah User','admin/user/add','Tambah User','btn btn-primary'); 
    }
    edituser(id){
        this.Modal('Edit User','admin/user/edit','Edit User','btn btn-warning');
        $.ajax({
            url: this.url(`admin/user/id/${id}`),
            method : 'get',
            dataType :'json',
            success:function(data){
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#username').val(data.username);
                $('#password').val(data.password);
                $('#no_telpon').val(data.no_telpon);
            }
        })
    }
    deleteuser(id){
        this.Modal('Hapus User','admin/user/hapus','Hapus User','btn btn-danger');
        $.ajax({
            url :this.url(`admin/user/id/${id}`),
            method : 'get',
            dataType :'json',
            success : function(data){
                $('#id_del').val(data.id);
                $('#nama_del').html(data.nama);
            }
        })
    }
}

var admin = new Admin();