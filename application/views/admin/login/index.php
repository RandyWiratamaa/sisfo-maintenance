<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/notika/notika/green-horizontal/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/notika/notika/green-horizontal/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/login.css">
</head>
<body class="main-bg">
  <div class="login-container text-c animated flipInX">
    <div>
      <h1 class="logo-badge text-whitesmoke">
        <img src="<?php echo base_url('assets/web/images/logo.png'); ?>" style="width:100px; height:100px;">
      </h1>
    </div>
    <h3 class="text-whitesmoke">Sign In as Administrator</h3>
      <div class="container-content">
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
                echo form_open(base_url('login/user'));
              ?>
          <div class="form-group">
              <input type="text" class="form-control" name="username" placeholder="Username">
          </div>
          <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Password">
          </div>
          <button type="submit" class="form-button button-l margin-b">Sign In</button>

          <!-- <a class="text-darkyellow" href="#"><small>Forgot your password?</small></a>
          <p class="text-whitesmoke text-center"><small>Do not have an account?</small></p>
          <a class="text-darkyellow" href="#"><small>Sign Up</small></a> -->
        <?php echo form_close(); ?> 
      </div>
  </div>
</body>
</html>