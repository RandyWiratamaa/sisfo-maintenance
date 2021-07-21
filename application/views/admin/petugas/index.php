<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-ld-12 col-md-12 col-sm-12">
                <h4 class="text-center">Data Petugas</h4>
                <a href="<?php echo base_url('admin/petugas/tambah') ?>" class="btn btn-info btn-sm pull-right">Tambah Data</a>
                <table class="table" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>No. HP</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($petugas as $petugas ) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $petugas->nip ?></td>
                            <td><?php echo $petugas->nama ?></td>
                            <td><?php echo $petugas->nohp ?></td>
                            <td><?php echo $petugas->jenkel ?></td>
                            <td><?php echo $petugas->jabatan ?></td>
                            <td></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>   
            </div>
        </div>
    </div>
</div>