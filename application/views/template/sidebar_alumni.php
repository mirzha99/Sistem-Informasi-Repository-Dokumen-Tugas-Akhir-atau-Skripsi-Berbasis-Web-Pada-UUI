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
                <h4 class="font-size-13 text-white">(<?=$profil['nim'];?>)</h4>
				<span class="font-size-13 text-white">Alumni</span>
				<br>
				<span class="font-size-13 text-white"><?=$profil['prodi'];?></span>
				<hr>
				<span class="font-size-13 text-white"><?=$profil['fakultas'];?></span>
			</div>
		</div>
	</div>

	<!--- Sidemenu -->
	<div id="sidebar-menu">
		<!-- Left Menu Start -->
		<ul class="metismenu list-unstyled" id="side-menu">
			<li class="menu-title">Menu Alumni</li>

			<li>
				<a href="<?=base_url();?>alumni" class="waves-effect">
					<i class="dripicons-home"></i>
					<span>Home</span>
				</a>
			</li>

			<li>
				<a href="<?=base_url();?>alumni/tugas_akhir" class="waves-effect">
					<i class="dripicons-graduation"></i>
					<span>Tugas Akhir</span>
				</a>
			</li>
			
		</ul>
	</div>
	<!-- Sidebar -->
</div>
</div>