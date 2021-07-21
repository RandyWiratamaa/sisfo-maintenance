<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Data Pintu Air</h4>
                        <p class="card-category">Tambah Data</p>
                    </div>
                    <div class="card-body">
                        <?php echo form_open(base_url('admin/pintu_air/tambah')) ?>
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
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Pintu Air</label>
                                        <input type="text" name='nama' class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd label-floating">Lebar</label>
                                        <input type="number" name="lebar" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd label-floating">Tinggi Kerangka</label>
                                        <input type="number" name="tinggi_kerangka" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd label-floating">Tinggi Daun Pintu</label>
                                        <input type="number" name="tinggi_daun_pintu" class="form-control">
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