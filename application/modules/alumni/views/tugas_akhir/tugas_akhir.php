<form action="<?=base_url();?>alumni/tugas_akhir/modifikasi" method="post" enctype="multipart/form-data">
    <label for="judul">Judul</label>
    <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul" value="<?=$tugas_akhir['judul'];?>">
    <label for="abstrak">Abstrak</label>
    <textarea name="abstrak" id="abstrak" cols="30" rows="5" class="form-control" placeholder="Abstrak"><?=$tugas_akhir['abstrak'];?></textarea>
    <label for="keyword">Keyword</label>
    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Keyword" value="<?=$tugas_akhir['keyword'];?>">
    <label for="tahun_terbit">Tahun Terbit</label>
    <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control" placeholder="Tahun Terbit" value="<?=$tugas_akhir['tahun_terbit'];?>">
    <label for="referensi">Referensi</label>
    <textarea name="referensi" id="referensi" cols="30" rows="5" class="form-control" placeholder="Referensi"><?=$tugas_akhir['referensi'];?></textarea>
    <label for="jurnal">Jurnal</label>
    <input type="file" name="jurnal" id="jurnal" class="form-control">

    <?php if(check_file("pdf/{$tugas_akhir['file_jurnal']}") && $tugas_akhir['file_jurnal'] !=''){;?>
        <span class="text-small text-success">Jurnal Sudah di Upload</span>
    <?php }else{?>
        <span class="text-small text-danger">Jurnal Belum di Upload</span>
    <?php };?>

    <p>
    <label for="tugas_akhir">Tugas Akhir</label>
    <input type="file" name="tugas_akhir" id="tugas_akhir" class="form-control">
    <?php if(check_file("pdf/".$tugas_akhir['file_tugas_akhir']) && $tugas_akhir['file_tugas_akhir'] !=''){;?>
        <span class="text-small text-success">Tugas Akhir Sudah di Upload</span>
    <?php }else{?>
        <span class="text-small text-danger">Tugas Akhir Belum di Upload</span>
    <?php };?>
    <p>
    <button type="sumbit" class="btn btn-primary my-2 float-rigth">Simpan</button>
</form>