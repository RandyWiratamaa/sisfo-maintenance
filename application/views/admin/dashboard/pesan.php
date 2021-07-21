<?php foreach($detail_pengaduan as $pengaduan) :?>
<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/dashboard/pesan/'.$pengaduan->no_pengaduan),' class="form-horizontal"');
?>
<div class="form-element-area">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-element-list mg-t-30">
          <div class="cmp-tb-hd bcs-hd">
            <h2>Proses Pelaporan Maintenance</h2>
          </div>
          <div class="row">
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
              <div class="form-group ic-cmp-int">
                <div class="form-ic-cmp">
                  <i class="notika-icon notika-support"></i>
                </div>
                <div class="nk-int-st">
                  <input type="text" class="form-control" type="text" placeholder="Nama User" name="nama" value="<?php echo $pengaduan->nama_pegawai ?>" readonly>
                </div>
              </div>
            </div>
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
              <div class="form-group ic-cmp-int">
                <div class="form-ic-cmp">
                  <i class="notika-icon notika-phone"></i>
                </div>
                <div class="nk-int-st">
                  <input type="text" class="form-control" placeholder="telepon" name="telepon" required value="<?php echo $pengaduan->telepon ?>" readonly>
                </div>
              </div>
            </div>

            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
              <div class="form-group ic-cmp-int">
                <div class="form-ic-cmp">
                  <i class="notika-icon notika-edit"></i>
                </div>
                <div class="nk-int-st">
                  <textarea class="form-control" rows="5" name="kendala" placeholder="Kendala" required readonly><?php echo $pengaduan->jenis_id ?></textarea>
                </div>
              </div>
            </div>
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
              <div class="form-group ic-cmp-int">
                <div class="form-ic-cmp">
                  <i class="notika-icon notika-edit"></i>
                </div>
                <div class="nk-int-st">
                  <textarea class="form-control" rows="5" name="catatan" placeholder="Catatan Perbaikan" required></textarea>
                </div>
              </div>
            </div>
            
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
              <div class="form-group ic-cmp-int">
                
                <div class="nk-int-st">
                
                </div>
              </div>
            </div>

            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
              <div class="form-group ic-cmp-int">
                <div class="nk-int-st">
                  <button class="btn btn-success btn-sm" name="submit" type="submit">
                    <i class="fa fa-save"></i> Proses
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
<?php echo form_close(); ?>