<h3>Table Prodi</h3>
<!-- Large modal -->
<button type="button" class="btn btn-primary waves-effect waves-light my-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" onclick="admin.prodi()">Tambah Prodi</button>
<!-- Start Table -->
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Fakultas</th>
            <th>Nama Prodi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0; foreach($prodi as $p):$no+1; $no++;?>
        <tr>
            <td><?=$no;?>.</td>
            <td><?=$p->nama_fakultas;?></td>
            <td><?=$p->nama_prodi;?></td>
            <td>
                <button type="button" class="btn btn-warning waves-effect waves-light my-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" onclick="admin.editprodi(<?=$p->id;?>)">Edit</button>
                <button type="button" class="btn btn-danger waves-effect waves-light my-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-del" onclick="admin.deleteprodi(<?=$p->id;?>)">Hapus</button>
            </td>
        <?php endforeach;?>
        </tr>
    </tbody>
</table>
<!-- Start Table -->
<!-- Add And Edit -->
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="Labels">Large modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="id" id="id">
                    <label for="id_fakultas">Nama Fakultas</label>
                    <select name="id_fakultas" id="id_fakultas" class="form-control">
                            <option value="">=== Pilih Fakultas ===</option>
                        <?php foreach($fakultas as $f):?>
                            <option value="<?=$f->id;?>"><?=$f->nama;?></option>
                        <?php endforeach;?>
                    </select>
                    <label for="nama_prodi">Nama Prodi</label>
                    <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" placeholder="Nama Prodi">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="sumbit" class="btn btn-primary">Simpan</button>
                </div>
                </form>                                                     
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Delete -->
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-del" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="Labels_del">Large modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="id" id="id_del">
                    <span>Apakah Anda Yakin Ingin Menghapus Prodi <span id ="nama_del" class="text-danger"></span> </span>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="sumbit" class="btn btn-primary">Hapus</button>
                </div>
                </form>                                                     
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->