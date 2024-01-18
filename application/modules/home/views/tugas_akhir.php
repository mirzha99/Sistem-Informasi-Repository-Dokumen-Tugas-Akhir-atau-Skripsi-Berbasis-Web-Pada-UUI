<div>
    <h2 class="">Selamat Datang Sistem Informasi Repository Dokumen Tugas Akhir dan Skripsi Universitas U'budiyah Indonesia</h2>
</div>
<div class="row">
    <!-- start card -->
	<div class="col-xl-4 col-md-4">
		<div class="card">
			<div class="card-body bg-dark text-white">
				<div class="text-center">
					<p class="font-size-16">Jumlah Pengunjung</p>
					<div class="mini-stat-icon mx-auto mb-4 mt-3">
						<span class="avatar-title rounded-circle bg-white">
							<i class="fas fa-user text-primary font-size-20"></i>
						</span>
					</div>
					<h5 class="font-size-22 text-white"><?=$jumlah['view'];?></h5>

					<div class="progress mt-3" style="height: 4px">
						<div
							class="progress-bar progress-bar bg-primary"
							role="progressbar"
							style="width: 100%"
							aria-valuenow="100"
							aria-valuemin="0"
							aria-valuemax="100"
						></div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- end card -->
    <!-- start card -->
	<div class="col-xl-4 col-md-4">
		<div class="card">
			<div class="card-body bg-dark text-white">
				<div class="text-center">
					<p class="font-size-16">Jumlah Download Jurnal</p>
					<div class="mini-stat-icon mx-auto mb-4 mt-3">
						<span class="avatar-title rounded-circle bg-white">
							<i class="fas fa-file-pdf text-primary font-size-20"></i>
						</span>
					</div>
					<h5 class="font-size-22 text-white"><?=$jumlah['jurnal'];?></h5>

					<div class="progress mt-3" style="height: 4px">
						<div
							class="progress-bar progress-bar bg-primary"
							role="progressbar"
							style="width: 100%"
							aria-valuenow="100"
							aria-valuemin="0"
							aria-valuemax="100"
						></div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- end card -->
    <!-- start card -->
	<div class="col-xl-4 col-md-4">
		<div class="card">
			<div class="card-body bg-dark text-white">
				<div class="text-center">
					<p class="font-size-16">Jumlah Download Tugas Akhir</p>
					<div class="mini-stat-icon mx-auto mb-4 mt-3">
						<span class="avatar-title rounded-circle bg-white">
							<i class="fas fa-file-pdf text-primary font-size-20"></i>
						</span>
					</div>
					<h5 class="font-size-22 text-white"><?=$jumlah['ta'];?></h5>

					<div class="progress mt-3" style="height: 4px">
						<div
							class="progress-bar progress-bar bg-primary"
							role="progressbar"
							style="width: 100%"
							aria-valuenow="100"
							aria-valuemin="0"
							aria-valuemax="100"
						></div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- end card -->
</div>
<!-- Start Table -->
<table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>No.</th>
            <th>Prodi</th>
            <th>Pengaran</th>
            <th>Tahun</th>
            <th>Judul</th>
            <th>Abstrak</th>
            <th>Keyword</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0; foreach($tugas_akhir as $ta):$no+1; $no++;?>
        <tr>
            <td><?=$no;?>.</td>
            <td><?=$ta->nama_prodi;?></td>
            <td><?=$ta->nama_alumni;?></td>
            <td><?=$ta->tahun_terbit;?></td>
            <td><?=$ta->judul;?></td>
            <td><textarea rows="10" class="form-control" disabled><?=$ta->abstrak;?></textarea></td>
            <td><?=$ta->keyword;?></td>
            <td><a href="<?=base_url();?>home/view/<?=$ta->id;?>" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
        <?php endforeach;?>
        </tr>
    </tbody>
</table>