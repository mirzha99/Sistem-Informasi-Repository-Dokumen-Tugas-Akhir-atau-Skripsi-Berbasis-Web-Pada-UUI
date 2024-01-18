<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
	
				<div class="row mb-3">
					<label  class="col-sm-2 col-form-label">Judul</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" placeholder="Judul" readonly value="<?=$view->judul;?>">
					</div>
				</div>
				<div class="row mb-3">
					<label  class="col-sm-2 col-form-label">Pengarang</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" placeholder="Pengarang" readonly value="<?=$view->nama_alumni;?>">
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-2 col-form-label">Abstrak</label>
					<div class="col-sm-10">
                    <textarea required class="form-control" rows="5" disabled><?=$view->abstrak;?></textarea>
				</div>
				</div>
                <div class="row mb-3">
					<label  class="col-sm-2 col-form-label">Tahun Terbit</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" placeholder="Tahun Terbit" readonly value="<?=$view->tahun_terbit;?>">
					</div>
				</div>
                <div class="row mb-3">
					<label  class="col-sm-2 col-form-label">Keyword</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" placeholder="Keyword" readonly value="<?=$view->keyword;?>">
					</div>
				</div>
                <div class="row mb-3">
					<label class="col-sm-2 col-form-label">Referensi</label>
					<div class="col-sm-10">
                    <textarea required class="form-control" rows="5" disabled><?=$view->referensi;?></textarea>
				</div>
				</div>
				<div class="row mb-3">
					<label  class="col-sm-2 col-form-label">Download</label>
					<div class="col-sm-10">
					<!-- jurnal -->
					<?php if(check_file("pdf/".$view->file_jurnal)){;?>
						<form action="<?=base_url();?>home/donwload_jurnal/<?=$view->id;?>/<?=$view->file_jurnal;?>" method="post">
							<button type="sumbit" name="djurnal" class="btn btn-danger">Donwload Jurnal</button>
						</form>
                	<?php }else{;?> 
                    	<a href="" class="btn btn-dark">Alumni Belum Upload Jurnal</a>
                	<?php };?>
					<!-- tugas akhir -->
					<?php if(check_file("pdf/".$view->file_tugas_akhir)){;?>
						<form action="<?=base_url();?>home/donwload_ta/<?=$view->id;?>/<?=$view->file_tugas_akhir;?>" method="post">
							<button type="sumbit_t" class="btn btn-danger my-2">Donwload Tugas Akhir</button>
						</form>
                	<?php }else{;?> 
                    	<a href="" class="btn btn-dark">Alumni Belum Upload Tugas Akhir</a>
                	<?php };?>
					
						
					</div>
				</div>
				<div class="row mb-3">
					<label  class="col-sm-2 col-form-label">JSON Dokumen</label>
					<div class="col-sm-10">
						<a href="<?=base_url();?>home/json/<?=$view->id;?>" target="_blank"class="btn btn-success">JSON</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end col -->
</div>
