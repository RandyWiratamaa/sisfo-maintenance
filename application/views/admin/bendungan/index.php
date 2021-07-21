<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-ld-12 col-md-12 col-sm-12">
                <h4 class="text-center">Data Bendungan</h4>
                <a href="<?php echo base_url('admin/bendungan/tambah') ?>" class="btn btn-info btn-sm pull-right">Tambah Data</a>
                <table class="table" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($bendungan as $bendungan ) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $bendungan->nama ?></td>
                            <td><?php echo $bendungan->alamat ?></td>
                            <td></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>    
            </div>
        </div>
    </div>
</div>