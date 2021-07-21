<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Pelaporan Maintenance</h4>
                        <p class="card-category">Tambah Data</p>
                    </div>
                    <div class="card-body">
                        <?php
                            echo validation_errors('<div class="alert alert-warning">','</div>');
                            echo form_open(base_url('home/tambah'));
                            $no_pengaduan	= date('dmY').strtoupper(random_string('alnum',5));
                        ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nama Pegawai</label>
                                        <input type="text" class="form-control" type="text" placeholder="Nama User" name="nama" required value="<?php echo $this->session->userdata('nama_pegawai') ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_pelanggan" value="<?php echo $this->session->userdata('id') ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">No. Pengaduan</label>
                                        <input type="text" class="form-control" name="no_pengaduan" required value="<?php echo $no_pengaduan ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tanggal</label>
                                        <input type="text" class="form-control" name="tanggal_pengaduan" required value="<?php echo date('Y-m-d'); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Bendungan</label>
                                        <select name="bendungan_id" id="bendungan_id" class="form-control">
                                            <option>--Pilih Bendungan--</option>
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
                                        <label class="bmd-label-floating">Pintu Air</label>
                                        <select name="pintu_air" id="pintu_air" class="form-control">
                                          <option value="">Pilih</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Jenis Maintenance</label>
                                        <select name="jenis_id[]" class="form-control multiple-select" multiple>
                                          <?php foreach ($jenis_maintenance as $jenis) : ?>
                                            <option value="<?php echo $jenis->id ?>">
                                            <?php echo $jenis->jenis ?>
                                            </option>
                                          <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Rincian Kendala</label>
                                        <textarea class="form-control" rows="5" name="rincian_kendala"required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Photo</label>
                                        <input type="file" name="gambar" class="form-control">
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