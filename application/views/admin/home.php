<?php error_reporting(0); date_default_timezone_set('Asia/Jakarta'); session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sertifikasi Holcim</title>
    <meta name="author" content="navagiaginasta@gmail.com | 087820033395" />
    <link rel="icon" href="<?php echo base_url();?>templates/admin/images/logoholcim.png" type="image/x-icon">
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?php echo base_url();?>templates/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>templates/admin/css/roboto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/admin/css/materialicons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/admin/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>templates/admin/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>templates/admin/plugins/morrisjs/morris.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>templates/admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/admin/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/admin/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>templates/admin/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
   <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>-->
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url(); ?>admin">SERTIFIKASI HOLCIM</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> -->
                    
                    <li class="pull-right"><a href="<?php echo base_url(); ?>/internal/keluar" title="Sign Out" class="js-right-sidebar" data-close="true"><i class="material-icons">input</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <!-- <div class="image">
                    <img src="<?php echo base_url();?>templates/admin/images/user.png" width="48" height="48" alt="User" />
                </div> -->
                <div class="info-container"><br><br><!-- 
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $admin->admin_nama;?></div>
                    <div class="email"><?php echo $admin->admin_email;?></div> -->
                    <!-- <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>internal/keluar"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list"> 
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="<?php echo base_url(); ?>admin/dashboard" >
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo base_url(); ?>admin/adm">
                            <i class="material-icons">person</i>
                            <span>Administrator</span>
                        </a>
                    </li>
                       <li>
                        <a href="<?php echo base_url(); ?>admin/departemen">
                            <i class="material-icons">assignment</i>
                            <span>Departemen</span>
                        </a>
                    </li>

                     <li>
                        <a href="<?php echo base_url(); ?>admin/karyawan">
                            <i class="material-icons">account_box</i>
                            <span>Data Karyawan</span>
                        </a>
                    </li> 
                     <li>
                        <a href="<?php echo base_url(); ?>admin/subarea">
                            <i class="material-icons">donut_large</i>
                            <span>Sub Area</span>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo base_url(); ?>admin/tahun">
                            <i class="material-icons">date_range</i>
                            <span>Tahun Sertifikasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/penerima">
                            <i class="material-icons">account_circle</i>
                            <span>Penerima Sertifikasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/sertifikasi">
                            <i class="material-icons">list</i>
                            <span>Sertifikasi</span>
                        </a>
                    </li>
                    <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="javascript:void(0);">Administrator</a>
                </div>
                <!-- <div class="version">
                    <b>Version: </b> 1.0.5
                </div> -->
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        

    <!-- Page Content -->
    <?php $this->load->view($content);?>
    <!-- End Page Content -->

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url();?>templates/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url();?>templates/admin/plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Select Plugin Js -->
    <script src="<?php echo base_url();?>templates/admin/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url();?>templates/admin/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url();?>templates/admin/plugins/node-waves/waves.js"></script>
    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url();?>templates/admin/plugins/jquery-countto/jquery.countTo.js"></script>
    <!-- Morris Plugin Js -->
   
    <script src="<?php echo base_url();?>templates/admin/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url();?>templates/admin/plugins/morrisjs/morris.js"></script>

    <script src="<?php echo base_url();?>templates/admin/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>templates/admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url();?>templates/admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    
    <script src="<?php echo base_url();?>templates/admin/plugins/jquery-validation/jquery.validate.js"></script>
    <script src="<?php echo base_url();?>templates/admin/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <script src="<?php echo base_url();?>templates/admin/plugins/jquery-countto/jquery.countTo.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url();?>templates/admin/js/admin.js"></script>
    <script src="<?php echo base_url();?>templates/admin/js/pages/forms/form-validation.js"></script>
    <script src="<?php echo base_url();?>templates/admin/js/pages/tables/jquery-datatable.js"></script>
    <script src="<?php echo base_url();?>templates/admin/js/pages/index.js"></script>
    <!-- Demo Js -->
    <!-- Moment Plugin Js -->
    <!-- Autosize Plugin Js -->
    <script src="<?php echo base_url();?>templates/admin/plugins/autosize/autosize.js"></script>
    <script src="<?php echo base_url();?>templates/admin/plugins/momentjs/moment.js"></script>
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo base_url();?>templates/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="<?php echo base_url();?>templates/admin/js/pages/forms/basic-form-elements.js"></script>
    <script src="<?php echo base_url();?>templates/admin/js/pages/ui/modals.js"></script>
    <script src="<?php echo base_url();?>templates/admin/js/demo.js"></script>
    <script type="text/javascript">
        $('#sertifikasi_tgl').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
        $('#sertifikasi_tglpelaksanaan').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
        $('#sertifikasi_tglberlaku').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
        $('#sertifikasi_masaberlaku').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
    </script>
</body>

</html>