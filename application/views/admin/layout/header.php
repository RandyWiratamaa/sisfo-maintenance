<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="green" data-background-color="white" data-image="<?php echo base_url('assets/web/tmp/img/sidebar-1.jpg') ?>">
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          SISFO MAINTENANCE
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <?php if($this->session->userdata('akses_level') == 'Super Administrator') : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/user') ?>">
              <i class="material-icons">people</i>
              <p>Data User</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('admin/jenis') ?>">
              <i class="material-icons">label</i>
              <p>Jenis Maintenance</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('admin/bendungan') ?>">
              <i class="material-icons">label</i>
              <p>Data Bendungan</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('admin/pintu_air') ?>">
              <i class="material-icons">compress</i>
              <p>Data Pintu Air</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('admin/pintu_air') ?>">
              <i class="material-icons">compress</i>
              <p>Data Barang</p>
            </a>
          </li>
          <?php else: ?>
            <li class="nav-item ">
              <a class="nav-link" href="<?php echo base_url('admin/petugas') ?>">
                <i class="material-icons">compress</i>
                <p>Data Pegawai</p>
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>