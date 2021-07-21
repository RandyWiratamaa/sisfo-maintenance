<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Jenis Maintenance</h4>
                        <p class="card-category">Tambah Data</p>
                    </div>
                    <div class="card-body">
                        <?php echo form_open(base_url('admin/jenis/tambah')) ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Jenis Maintenance</label>
                                        <input type="text" name='jenis' class="form-control" >
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