<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
           <div class="card-header card-header-success">
              <h4 class="card-title">Data User</h4>
              <p class="card-category">Tambah Data</p>
          </div>
          <div class="card-body">
            <?php echo form_open(base_url('admin/user/tambah')); ?>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="bmd-label-floating">Nama Pengguna</label>
                  <input type="text" name='nama' class="form-control" >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="bmd-label-floating">Email Pengguna</label>
                  <input type="email" name='email' class="form-control" >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="bmd-label-floating">Username</label>
                  <input type="text" name='username' class="form-control" >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="bmd-label-floating">Password</label>
                  <input type="password" name='password' class="form-control" >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="bmd-label-floating">Akses Level</label>
                  <select name="akses_level" id="akses_level" class="form-control">
                    <option value="Super Administrator">Super Administrator</option>
                    <option value="Admin">Admin</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="bmd-label-floating">Bendungan</label>
                        <select name="id_bendungan" id="id_bendungan" class="form-control">
                            <?php foreach ($bendungan as $bendungan) : ?>
                                <option value="<?php echo $bendungan->id ?>">
                                <?php echo $bendungan->nama ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                      <button class="btn btn-success btn-sm" name="submit" type="submit">
                          Simpan
                      </button>
                  </div>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>