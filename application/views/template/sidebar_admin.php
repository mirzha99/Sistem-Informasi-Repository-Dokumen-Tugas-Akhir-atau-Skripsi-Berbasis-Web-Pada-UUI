<div class="vertical-menu">

<div data-simplebar class="h-100">


	<div class="user-sidebar text-center">
		<div class="dropdown">
			<div class="user-img">
				<img src="<?=$profil['gambar'];?>" alt="" class="rounded-circle">
				<span class="avatar-online bg-success"></span>
			</div>
			<div class="user-info">
				<h5 class="mt-3 font-size-16 text-white"><?=$profil['nama'];?></h5>
				<span class="font-size-13 text-white-50">Administrator</span>
			</div>
		</div>
	</div>



	<!--- Sidemenu -->
	<div id="sidebar-menu">
		<!-- Left Menu Start -->
		<ul class="metismenu list-unstyled" id="side-menu">
			<li class="menu-title">Menu Admin</li>

			<li>
				<a href="<?=base_url();?>admin" class="waves-effect">
					<i class="dripicons-home"></i><span class="badge rounded-pill bg-info float-end">3</span>
					<span>Home</span>
				</a>
			</li>

			<li>
				<a href="<?=base_url();?>admin/fakultas" class="waves-effect">
					<i class="fas fa-university"></i>
					<span>Fakultas</span>
				</a>
			</li>

			<li>
				<a href="<?=base_url();?>admin/prodi" class="waves-effect">
					<i class="dripicons-graduation"></i>
					<span>Program Studi</span>
				</a>
			</li>
			
			<li>
				<a href="<?=base_url();?>admin/kaprodi" class="waves-effect">
					<i class="fas fa-user-graduate"></i>
					<span>Ketua Prodi</span>
				</a>
			</li>

			<li>
				<a href="<?=base_url();?>admin/user" class="waves-effect">
					<i class="dripicons-user"></i>
					<span>Manajemen User</span>
				</a>
			</li>

		</ul>
	</div>
	<!-- Sidebar -->
</div>
</div>