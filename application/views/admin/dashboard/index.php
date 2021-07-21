<!-- <?php print_r ($this->session->userdata); ?> -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header card-header-info card-header-icon">
						<div class="card-icon">
							<i class="material-icons">person</i>
						</div>
						<p class="card-category">Total Pegawai</p>
						<?php foreach($total_user_reguler as $user_reguler) : ?>
						<h3 class="card-title"><?php echo $user_reguler; ?></h3>
						<?php endforeach ?>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons text-danger">add</i>
							<a href="javascript:;">Add more data...</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h3 class="text-center">Laporan Maintenance</h3>
				<div class="table-responsive table-stripped">
					<table class="table" id="example">
						<thead>
							<tr>
								<th>No</th>
								<th>No. Pengaduan</th>
								<th>NIK</th>
								<th>Nama Pelapor</th>
								<th>Alamat</th>
								<th>Jenis Perbaikan</th>
								<th>Status</th>
								<th>Tanggal Lapor</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($pengaduan as $pengaduan ) : ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $pengaduan->no_pengaduan ?></td>
								<td><?php echo $pengaduan->nik ?></td>
								<td><?php echo $pengaduan->nama_pegawai ?></td>
								<td><?php echo $pengaduan->alamat ?></td>
								<!-- <td><?php echo $pengaduan->jenis_id ?></td> -->
								<td>
									<?php if($pengaduan->status == '0') : ?>
										<button class="btn btn-danger btn-sm" disabled><?php echo "Belum Diverifikasi"; ?></button>
									<?php elseif($pengaduan->status == '1') : ?>
										<button class="btn btn-warning btn-sm" disabled><?php echo "Telah diverifikasi"; ?></button>
									<?php endif ?>
								</td>
								<td><?php echo $pengaduan->tanggal_pengaduan ?></td>
									<?php if($pengaduan->status != '1')  :?>
									<td>
										<a href="<?php echo base_url('admin/dashboard/verifikasi/' .$pengaduan->id) ?>" class="btn btn-info btn-sm">Verifikasi</a>
									</td>
									<?php else : ?>
									<td><a href="#" class="btn btn-danger btn-sm" disabled>Verified</a></td>
								<?php endif ?>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="data-table-area">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="data-table-list">
					<div class="basic-tb-hd">
						<h2>Data Pengaduan</h2>
					</div>
					<div class="table-responsive">
						<table id="example" class="table table-striped">
							<thead>
								<tr>
									
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>