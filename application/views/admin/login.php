<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login | Sertifikasi Holcim</title>
    <meta name="author" content="navagiaginasta@gmail.com | 087820033395" />
    <link rel="icon" href="<?php echo base_url();?>templates/admin/images/logoholcim.png" type="image/x-icon">
    <link href="<?php echo base_url();?>templates/admin/css/roboto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/admin/css/materialicons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/admin/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>templates/admin/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>templates/admin/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Sertifikasi <b> Holcim</b></a>
            <br>
            <center> <img class="profile-img" src="<?php echo base_url();?>templates/admin/images/logo.png"
                    alt=""></center>
           </br>   
         
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in"  action="<?php echo site_url();?>internal/ceklogin"  method="POST">
                
                    <div class="msg">Sign in to start your session <br>  <center><b>Administrator</b> </center></div>

                       <!-- ========== Flashdata ========== -->
                      <?php if ($this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert bg-pink alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                      <?php } ?>
                  <!-- ========== End Flashdata ========== -->
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="admin_username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="admin_password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div> -->
                        <div class="col-xs-12">
                            <input type="submit" name="login" class="btn btn-block btn-lg bg-red waves-effect" value="LOGIN">
                        </div>
                    </div>
                    <!-- <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url();?>templates/admin/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url();?>templates/admin/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url();?>templates/admin/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url();?>templates/admin/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url();?>templates/admin/js/admin.js"></script>
    <script src="<?php echo base_url();?>templates/admin/js/pages/examples/sign-in.js"></script>
</body>

</html>