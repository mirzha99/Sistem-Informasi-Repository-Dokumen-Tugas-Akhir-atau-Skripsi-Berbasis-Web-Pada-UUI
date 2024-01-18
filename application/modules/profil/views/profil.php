<div class="row">
    <form action="<?=base_url();?>profil/update" method="post" enctype="multipart/form-data">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?=$profil['nama'];?>">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" value="<?=$profil['username'];?>">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" value="">
        <label for="gambar">Gambar</label>
        <input type="file" name="gambar" class="form-control">
        <a class="image-popup-no-margins" href="<?=$profil['gambar'];?>">
            <img class="img-fluid" alt="" src="<?=$profil['gambar'];?>" width="150">
        </a>
        <p></p>
        <button type="sumbit" class="btn btn-warning">Update</button>
    </form>
</div>