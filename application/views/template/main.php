<!doctype html>
<html lang="en">
	<head>
        <meta charset="utf-8" />
        <title><?=$title;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="<?=base_url();?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?=base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?=base_url();?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <!-- Lightbox css -->
        <link href="<?=base_url();?>assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
        <!-- DataTables -->
        <link href="<?=base_url();?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="<?=base_url();?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  
        <?php $profil= $this->auth_lib->profil();?>
    </head>

    <body>

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">

                           <!-- LOGO -->
                     <div class="navbar-brand-box">
                        <a href="<?=base_url();?>" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?=base_url();?>assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?=base_url();?>assets/images/logo-dark.png" alt="" height="35">
                            </span>
                        </a>

                        <!-- <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?=base_url();?>assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?=base_url();?>assets/images/logo-light.png" alt="" height="20">
                            </span>
                        </a> -->
                    </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-menu"></i>
                        </button>


                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?=$profil['gambar'];?>"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1"><?=$profil['username'];?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="<?=base_url();?>profil"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="<?=base_url();?>logout"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
			<?php 
                if($this->session->userdata('admin')){
                    include_once('sidebar_admin.php');
                }elseif($this->session->userdata('kaprodi')){
                    include_once('sidebar_kaprodi.php');
                }elseif($this->session->userdata('alumni')){
                    include_once('sidebar_alumni.php');
                }
            ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">

                    <!-- start page title -->
                    <div class="page-title-box">
                        <div class="container-fluid">
                         <div class="row align-items-center">
                             <div class="col-sm-6">
                                 <div class="page-title my-3">
                                     <h4><?=$title;?></h4>
                                         <!-- <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="javascript: void(0);">Morvin</a></li>
                                             <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                             <li class="breadcrumb-item active"></li>
                                         </ol> -->
                                 </div>
                             </div>
                             <!-- <div class="col-sm-6">
                                <div class="float-end d-none d-sm-block">
                                    <a href="#" class="btn btn-success">Add Widget</a>
                                </div>
                             </div> -->
                         </div>
                        </div>
                     </div>
                     <!-- end page title -->    
                    <div class="container-fluid">
                        <div class="page-content-wrapper">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <?=$this->session->flashdata('flash');?>         
											<?=$contents;?>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>          
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © UUI.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Sistem Informasi Repository Dokumen Tugas Akhir dan Skripsi Universitas U'budiyah Indonesia
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
     
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="<?=base_url();?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?=base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?=base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?=base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?=base_url();?>assets/libs/node-waves/waves.min.js"></script>

         <!-- Required datatable js -->
         <script src="<?=base_url();?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
         <script src="<?=base_url();?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
         <!-- Buttons examples -->
         <script src="<?=base_url();?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
         <script src="<?=base_url();?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
         <script src="<?=base_url();?>assets/libs/jszip/jszip.min.js"></script>
         <script src="<?=base_url();?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
         <script src="<?=base_url();?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
         <script src="<?=base_url();?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
         <script src="<?=base_url();?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
         <script src="<?=base_url();?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
         <!-- Responsive examples -->
         <script src="<?=base_url();?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
         <script src="<?=base_url();?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <!-- Magnific Popup-->
        <script src="<?=base_url();?>assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

        <!-- Tour init js-->
        <script src="<?=base_url();?>assets/js/pages/lightbox.init.js"></script>
        <!-- Datatable init js -->
        <script src="<?=base_url();?>assets/js/pages/datatables.init.js"></script>
        <!-- script -->
        <script src="<?=base_url();?>assets/script/Core.js"></script>

        <?php if($this->session->userdata('admin')){;?>
            <script src="<?=base_url();?>assets/script/Admin.js"></script>
        <?php }elseif($this->session->userdata('kaprodi')){;?>
            <script src="<?=base_url();?>assets/script/Kaprodi.js"></script>
        <?php }elseif($this->session->userdata('alumni')){;?>
                    
        <?php }?>
        

        <script src="<?=base_url();?>assets/js/app.js"></script>
            
        <script>
            if (window.history.replaceState) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
    </body>

<!-- Mirrored from themesdesign.in/morvin/layouts/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Dec 2021 15:09:51 GMT -->
</html>
