<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-ld-12 col-md-12 col-sm-12">
                <h4 class="text-center">Data Pintu Air</h4>
                <a href="<?php echo base_url('admin/pintu_air/tambah') ?>" class="btn btn-info btn-sm pull-right">Tambah Data</a>
                <table class="table" id="example">
                    <thead class="text-left text-success">
                        <tr>
                            <th>No</th>
                            <th>Bendungan</th>
                            <th>Pintu Air</th>
                            <th>Lebar</th>
                            <th>Tinggi Kerangka</th>
                            <th>Tinggi Daun Pintu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($pintu_air as $pa ) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $pa->nm_bendungan ?></td>
                            <td><?php echo $pa->nama ?></td>
                            <td><?php echo $pa->lebar ?></td>
                            <td><?php echo $pa->tinggi_kerangka ?></td>
                            <td><?php echo $pa->tinggi_daun_pintu ?></td>
                            <td></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>    
            </div>
        </div>
    </div>
</div>