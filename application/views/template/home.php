
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/morvin/layouts/layouts-hori-topbar-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Dec 2021 15:09:56 GMT -->
<head>

    
    <meta charset="utf-8" />
    <title><?=$title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="<?=base_url();?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?=base_url();?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?=base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?=base_url();?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="<?=base_url();?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url();?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?=base_url();?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  

</head>

<body data-topbar="light" data-layout="horizontal">

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
                            <img src="<?=base_url();?>assets/images/logo-dark.png" alt="" height="20">
                        </span>
                    </a>
                    
                    <a href="<?=base_url();?>" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?=base_url();?>assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?=base_url();?>assets/images/logo-light.png" alt="" height="20">
                        </span>
                    </a>
                    
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <i class="mdi mdi-menu"></i>
                </button>
   
            </div>

            <div class="d-flex">
                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>
    
        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
    
                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">

                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url();?>">
                                    <i class="dripicons-home me-2"></i> Home
                                </a>
                            </li> 
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button"
                                >
                                    <i class="fas fa-university me-2"></i> Fakultas <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-more">
                                <?php $fakultas = $this->db->get_where('fakultas')->result_object();foreach($fakultas as $fk):?>
                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="<?=base_url();?>home/fakultas/<?=$fk->id;?>" id="topnav-auth"role="button">
                                            <?=$fk->nama;?> <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                        <?php
                                                $prodi = $this->db->get_where('prodi',['id_fakultas'=>$fk->id])->result_object();
                                                foreach($prodi as $pd):
                                        ?>
                                            <a href="<?=base_url();?>home/prodi/<?=$pd->id;?>" class="dropdown-item"><?=$pd->nama;?></a>
                                        <?php endforeach;?>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                                
                                </div>
                            </li>
 
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url();?>auth">
                                    <i class="dripicons-user me-2"></i> Login
                                </a>
                            </li>  
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

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
                             <div class="page-title">
                                 <h4><?=$title;?></h4>
                             </div>
                         </div>
                     </div>
                    </div>
                 </div>
                 <!-- end page title -->    


                <div class="container-fluid">

                    <div class="page-content-wrapper">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?=$contents;?>
                                    </div>
                                </div>
                            </div>

                        </div>

                </div> <!-- container-fluid -->

                
            </div>
            <!-- End Page-content -->



         
             </div>
        <!-- end page content-->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> ©  Sistem Informasi Repository Dokumen Tugas Akhir dan Skripsi Universitas U'budiyah Indonesia.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Website <i class="mdi mdi-heart text-danger"></i> <a href="https://www.uui.ac.id/">uui.ac.id</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="<?=base_url();?>assets/libs/jquery/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?=base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?=base_url();?>assets/libs/node-waves/waves.min.js"></script>

    <!-- Plugins js-->
    <script src="<?=base_url();?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?=base_url();?>assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
>
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

    <script src="<?=base_url();?>assets/js/app.js"></script>

</body>
</html>