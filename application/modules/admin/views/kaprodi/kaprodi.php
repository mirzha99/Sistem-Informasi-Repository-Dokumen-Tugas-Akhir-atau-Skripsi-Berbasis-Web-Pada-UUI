<h3>Table Kaprodi</h3>
<!-- Large modal -->
<button type="button" class="btn btn-primary waves-effect waves-light my-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" onclick="admin.kaprodi()">Tambah Kaprodi</button>
<!-- Start Table -->
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Ketua Prodi</th>
            <th>Username</th>
            <th>Nama Fakultas</th>
            <th>Nama Prodi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0; foreach($kaprodi as $kp):$no+1; $no++;?>
        <tr>
            <td><?=$no;?>.</td>
            <td><?=$kp->nama;?></td>
            <td><?=$kp->username;?></td>
            <td><?=$kp->nama_fakultas;?></td>
            <td><?=$kp->nama_prodi;?></td>
            <td>
                <?php if(check_file("image/kaprodi/{$kp->gambar}") === true){;?>
                    <a class="image-popup-no-margins" href="<?=base_url();?>assets/image/kaprodi/<?=$kp->gambar;?>">
                        <img class="img-fluid" alt="" src="<?=base_url();?>assets/image/kaprodi/<?=$kp->gambar;?>" width="150">
                    </a>
                <?php }else{;?>
                    <a class="image-popup-no-margins" href="<?=base_url();?>assets/image/default.jpeg">
                        <img class="img-fluid" alt="" src="<?=base_url();?>assets/image/default.jpeg" width="150">
                    </a>
                <?php };?>
            </td>
            <td>
                <button type="button" class="btn btn-warning waves-effect waves-light my-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" onclick="admin.editkaprodi(<?=$kp->id;?>)">Edit</button>
                <button type="button" class="btn btn-danger waves-effect waves-light my-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-del" onclick="admin.deletekaprodi(<?=$kp->id;?>)">Hapus</button>
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
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <label for="nama_ketua_prodi">Nama Ketua Prodi</label>
                    <input type="text" name="nama_ketua_prodi" id="nama_ketua_prodi" class="form-control" placeholder="Nama Ketua Prodi">
                    <label for="id_prodi">Prodi</label>
                    <select name="id_prodi" id="id_prodi" class="form-control">
                            <option id="id_prodi_pilih" value="">=== <?= empty($prodi) ? "Semua Prodi Telah Memiliki Kaprodi" :"Pilih Prodi";?> ===</option>
                        <?php foreach($prodi as $prodi):?>
                            <option value="<?=$prodi->id;?>"><?=$prodi->nama_prodi;?> (<?=$prodi->nama_fakultas;?>)</option>
                        <?php endforeach;?>
                    </select>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="username">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" class="form-control">
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
                    <span>Apakah Anda Yakin Ingin Menghapus Kaprodi <span id ="nama_del" class="text-danger"></span> ? </span>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="sumbit" class="btn btn-primary">Hapus</button>
                </div>
                </form>                                                     
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->