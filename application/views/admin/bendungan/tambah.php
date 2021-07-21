<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Data Bendungan</h4>
                        <p class="card-category">Tambah Data</p>
                    </div>
                    <div class="card-body">
                        <?php echo form_open(base_url('admin/bendungan/tambah')) ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Bendungan</label>
                                        <input type="text" name='nama' class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Lokasi Bendungan</label>
                                        <textarea rows='5' name='alamat' class="form-control"> </textarea>
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