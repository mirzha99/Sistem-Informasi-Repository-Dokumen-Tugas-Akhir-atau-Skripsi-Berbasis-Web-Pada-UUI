
<!doctype html>
<html lang="en">

<head>
    
    <meta charset="utf-8" />
    <title>Login page | UUI</title>
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


</head>


<body class="authentication-bg bg-danger">
    <div class="home-center">
        <div class="home-desc-center">

            <div class="container">


                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">


                                    <div class="text-center">
                                        <a href="<?=base_url();?>">
                                            <img src="<?=base_url();?>assets/images/logo-dark.png" height="22" alt="logo">
                                        </a>
                                        
                                        <h5 class="text-danger mb-2 mt-4">Selamat datang</h5>
                                        <p class="text-muted">Login</p>

                                        <?=$this->session->flashdata('flash');?>
                                    </div>


                                    <form class="form-horizontal mt-4 pt-2" action="<?=base_url();?>auth/login" method="post">

                                        <div class="mb-3">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                                        </div>

                                        <div class="mb-3">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password">
                                        </div>
                                        <!-- <div class="mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="customControlInline">
                                                    <label class="form-label"
                                                        for="customControlInline">Remember me</label>
                                                </div>
                                        </div> -->

                                        <div>
                                            <button class="btn btn-primary w-100 waves-effect waves-light"
                                                type="submit">Log In</button>
                                        </div>
                                    
                                        <div class="mt-4 text-center">
                                            <a href="<?=base_url();?>" class="text-danger"><i class="fas fa-home"></i> Kembali Ke Home ?</a>
                                        </div>
    

                                    </form>

                                  
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center text-white">
                            <!-- <p>Don't have an account ?<a href="auth-register.html" class="fw-bold text-white"> Register</a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script> UUI. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p> -->
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!-- End Log In page -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="<?=base_url();?>assets/libs/jquery/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?=base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?=base_url();?>assets/libs/node-waves/waves.min.js"></script>

    <script src="<?=base_url();?>assets/js/app.js"></script>

</body>

</html>