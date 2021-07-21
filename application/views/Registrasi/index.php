<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>

  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/lib/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/lib/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/web/css/registrasi.css">
</head>
<body>
  <div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="<?php echo base_url('assets/web/images/logo.png'); ?>" style="width:70px; height:70px;">
            <h3>Welcome</h3>
            <p>Silahkan melakukan Pendaftaran dengan melakukan pengisian form disamping</p>
            <a href="<?php echo base_url('login/pegawai') ?>" class="btn btn-primary">Saya sudah punya akun </a>
        </div>
        <div class="col-md-9 register-right">
          <div class="tab-pane  active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <h3 class="register-heading">Buat Akun</h3>
                <?php 
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
                  echo form_open(base_url('registrasi'));
                ?>
                <div class="row register-form">
                  <div class="col-md-6">
                      <div class="form-group">
                          <input type="number" name="nik" class="form-control" placeholder="NIK Pegawai *" value="" />
                      </div>
                      <div class="form-group">
                          <input type="text" name="nama_pegawai" class="form-control" placeholder="Nama Lengkap *" value="" />
                      </div>
                      <div class="form-group">
                          <input type="password" name="password" class="form-control" placeholder="Password *" value="" />
                      </div>
                      <div class="form-group">
                          <input type="password" name="repeat_password" class="form-control"  placeholder="Ulangi Password *" value="" />
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <input type="email" name="email" class="form-control" placeholder="Email Aktif *" value="" />
                      </div>
                      <div class="form-group">
                          <input type="text" minlength="10" maxlength="20" name="telepon" class="form-control" placeholder="Telephone *" value="" />
                      </div>
                      <div class="form-group">
                          <input type="text" name="alamat" class="form-control" placeholder="Alamat *" value="" />
                      </div>
                      <button type="submit" class="btnRegister">Daftar</button>
                  </div>
                </div>
                <?php echo form_close(); ?>
          </div>
        </div>
    </div>

  </div>				                            
</body>
</html>