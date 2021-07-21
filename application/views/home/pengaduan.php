<!-- <?php echo $this->session->userdata('id'); ?> -->

<div class="data-table-area">
	<div class="container">
		<div class="row">

			<?php 
			// notifikasi
			if ($this->session->flashdata('sukses')) {
				echo '<p class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>';
				echo $this->session->flashdata('sukses');
				echo '</div>' ;
			}
			?>	
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="data-table-list">
					<div class="basic-tb-hd">
						<h2>Data Pengaduan</h2>
						<?php if($this->session->userdata('status') == "1") :?>
						<span class="pull-right">
							<a href="<?php echo base_url('home/tambah') ?>" class="btn btn-success btn-sm">Tambah Pengaduan</a>
						</span>
						<?php else: ?>
						<div class="alert alert-warning">Verifikasi email <strong><?php echo $this->session->userdata('email'); ?></strong> terlebih dahulu untuk melakukan pengaduan</div>
						<?php endif;?>
					</div>
					<div class="table-responsive">
						<table class="table" id="example">
							<thead>
								<tr>
									<th>No</th>
									<th>No. Pengaduan</th>
									<th>NIK</th>
									<th>Nama Pelapor</th>
									<th>Status</th>
									<th>Tanggal Lapor</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach ($pengaduan as $pengaduan ) : ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><a href="<?php echo base_url('home/detail_pengaduan/'.$pengaduan->no_pengaduan) ?>"><?php echo $pengaduan->no_pengaduan ?></a></td>
									<td><?php echo $pengaduan->nik ?></td>
									<td><?php echo $pengaduan->nama_pegawai ?></td>
									<td>
										<?php if($pengaduan->status == '0') : ?>
											<button class="btn btn-danger btn-sm" disabled><?php echo "Belum Diverifikasi"; ?></button>
										<?php elseif($pengaduan->status == '1') : ?>
											<button class="btn btn-warning btn-sm" disabled><?php echo "Sudah Diverifikasi"; ?></button>
										<?php elseif($pengaduan->status == '2') : ?>
											<button class="btn btn-success btn-sm" disabled><i class="notika-icon notika-checked"></i><?php echo " Selesai diproses "; ?></button>
										<?php endif ?>
									</td>
									<td><?php echo $pengaduan->tanggal_pengaduan ?></td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>