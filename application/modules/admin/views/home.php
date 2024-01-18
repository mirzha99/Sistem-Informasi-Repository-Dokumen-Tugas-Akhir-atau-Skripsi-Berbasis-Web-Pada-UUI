<div class="row">
    <!-- start card -->
	<div class="col-xl-3 col-md-6">
		<div class="card">
			<div class="card-body bg-dark text-white">
				<div class="text-center">
					<p class="font-size-16">Fakultas</p>
					<div class="mini-stat-icon mx-auto mb-4 mt-3">
						<span class="avatar-title rounded-circle bg-white">
							<i class="fas fa-university text-primary font-size-20"></i>
						</span>
					</div>
					<h5 class="font-size-22 text-white"><?=$jumlah['fakultas'];?></h5>

					<a href="<?=base_url();?>admin/fakultas" class="text-white">view</a>

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
	<div class="col-xl-3 col-md-6">
		<div class="card">
			<div class="card-body bg-dark text-white">
				<div class="text-center">
					<p class="font-size-16">Prodi</p>
					<div class="mini-stat-icon mx-auto mb-4 mt-3">
						<span class="avatar-title rounded-circle bg-white">
							<i class="dripicons-graduation text-primary font-size-20"></i>
						</span>
					</div>
					<h5 class="font-size-22 text-white"><?=$jumlah['prodi'];?></h5>

					<a href="<?=base_url();?>admin/prodi" class="text-white">view</a>

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
	<div class="col-xl-3 col-md-6">
		<div class="card">
			<div class="card-body bg-dark text-white">
				<div class="text-center">
					<p class="font-size-16">Ketua Prodi</p>
					<div class="mini-stat-icon mx-auto mb-4 mt-3">
						<span class="avatar-title rounded-circle bg-white">
							<i class="fas fa-user-graduate text-primary font-size-20"></i>
						</span>
					</div>
					<h5 class="font-size-22 text-white"><?=$jumlah['kaprodi'];?></h5>

					<a href="<?=base_url();?>admin/kaprodi" class="text-white">view</a>

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
	<div class="col-xl-3 col-md-6">
		<div class="card">
			<div class="card-body bg-dark text-white">
				<div class="text-center">
					<p class="font-size-16">User</p>
					<div class="mini-stat-icon mx-auto mb-4 mt-3">
						<span class="avatar-title rounded-circle bg-white">
							<i class="dripicons-user text-primary font-size-20"></i>
						</span>
					</div>
					<h5 class="font-size-22 text-white"><?=$jumlah['user'];?></h5>

					<a href="<?=base_url();?>admin/user" class="text-white">view</a>

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
