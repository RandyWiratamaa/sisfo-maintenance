<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Reset Pass</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/notika/notika/green-horizontal/css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/notika/notika/green-horizontal/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/notika/notika/green-horizontal/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/notika/notika/green-horizontal/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/notika/notika/green-horizontal/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/notika/notika/green-horizontal/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/notika/notika/green-horizontal/css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/notika/notika/green-horizontal/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/notika/notika/green-horizontal/css/wave/waves.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/notika/notika/green-horizontal/css/notika-custom-icon.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/notika/notika/green-horizontal/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/notika/notika/green-horizontal/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/notika/notika/green-horizontal/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
            <div class="nk-form">
                Reset Password
              <?php 
                // notifikasi error
                echo validation_errors('<div class="alert alert-success">','</div>');
                // notifikasi gagal login
                if ($this->session->flashdata('warning')) {
                  echo '<div class="alert alert-danger alert-mg-b-0" role="alert">';
                  echo $this->session->flashdata('warning');
                  echo '</div>';
                }
                // notifikasi logout
                if ($this->session->flashdata('sukses')) {
                  echo '<div class="alert alert-success alert-mg-b-0" role="alert">';
                  echo $this->session->flashdata('sukses');
                  echo '</div>';
                }
                // form open login
              ?>
            <form action="<?=base_url('login/updatepass')?>" method="post">
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" name="password" class="form-control" placeholder="New Password">
                    </div>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password">
                    </div>
                </div>
                <p>&nbsp;</p>
                <button type="submit" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
            </form>
            </div>
        </div>
      </div>
      <?php echo form_close(); ?> 
    <!-- Login Register area End-->
    <!-- jquery
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/counterup/waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/knob/jquery.knob.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/knob/jquery.appear.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/knob/knob-active.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/chat/jquery.chat.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/wave/waves.min.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/wave/wave-active.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/icheck/icheck.min.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/icheck/icheck-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/todo/jquery.todo.js"></script>
    <!-- Login JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/login/login-action.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/main.js"></script>
</body>

</html>