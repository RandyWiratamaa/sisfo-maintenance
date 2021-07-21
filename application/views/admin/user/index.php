<div class="content">
    <div class="container-fluid">
        <div class="row">
			<?php 
			// notifikasi
			if ($this->session->flashdata('sukses')) {
				echo '<p class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>';
				echo $this->session->flashdata('sukses');
				echo '</div>' ;
			}
			?>
            <div class="col-ld-12 col-md-12 col-sm-12">
                <h4 class="text-center">Data User</h4>
                <a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-info btn-sm pull-right">Tambah Data</a>
                <table class="table" id="example">
                    <thead class="text-left text-success">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Lokasi Pengoperasian</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($user as $user ) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $user->nama ?></td>
                            <td><?php echo $user->username ?></td>
                            <td><?php echo $user->akses_level ?></td>
                            <td>
                            <?php if($user->bendungan == '0' || $user->bendungan == NULL) : ?>
                            <a href="#" class="btn btn-success btn-sm">Pilih Lokasi Pengoperasian Bendungan</a>
                            <?php else : ?>
                            <?php echo $user->bendungan ?></td>
                            <?php endif ?>
                            <td>
								<a href="<?php echo base_url('admin/user/edit/'. $user->id_user) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

								<a href="<?php echo base_url('admin/user/delete/'. $user->id_user) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yaking Ingin Menghapus Data ?')"><i class="fa fa-trash-o"></i>Hapus</a>
							</td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>    
            </div>
        </div>
    </div>
</div>