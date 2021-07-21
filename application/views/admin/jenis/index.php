<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-ld-12 col-md-12 col-sm-12">
                <h4 class="text-center">Data Bendungan</h4>
                <a href="<?php echo base_url('admin/jenis/tambah') ?>" class="btn btn-info btn-sm pull-right">Tambah Data</a>
                <table class="table" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($jenis as $jenis ) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $jenis->jenis ?></td>
                            <td></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>    
            </div>
        </div>
    </div>
</div>