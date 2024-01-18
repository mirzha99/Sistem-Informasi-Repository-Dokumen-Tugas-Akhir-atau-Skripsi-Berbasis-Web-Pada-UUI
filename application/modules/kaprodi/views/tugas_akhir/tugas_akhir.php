<h3>Table Tugas Akhir</h3>
<!-- Start Table -->
<table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Tahun</th>
            <th>Judul</th>
            <th>Jurnal</th>
            <th>Tugas Akhir</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0; foreach($tugas_akhir as $ta):$no+1; $no++;?>
        <tr>
            <td><?=$no;?>.</td>
            <td><?=$ta->nim;?></td>
            <td><?=$ta->nama_alumni;?></td>
            <td><?=$ta->tahun_terbit;?></td>
            <td><?=$ta->judul;?></td>
            <td>
                <?php if(check_file("pdf/".$ta->file_jurnal)){;?>
                    <a href="<?=base_url();?>assets/pdf/<?=$ta->file_jurnal;?>" class="btn btn-danger">Jurnal</a>
                <?php }else{;?> 
                    <a href="" class="btn btn-dark">Belum Upload</a>
                <?php };?>
               
            </td>
            <td>
                <?php if(check_file("pdf/".$ta->file_tugas_akhir)){;?>
                    <a href="<?=base_url();?>assets/pdf/<?=$ta->file_tugas_akhir;?>" class="btn btn-danger">Tugas Akhir</a>
                <?php }else{;?> 
                    <a href="" class="btn btn-dark">Belum Upload</a>
                <?php };?>
            </td>

        <?php endforeach;?>
        </tr>
    </tbody>
</table>