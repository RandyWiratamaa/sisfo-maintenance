<div class="data-table-area">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="data-table-list">
					<div class="basic-tb-hd">
						<h2>Data Master <?php echo $title ?></h2>
						<span class="pull-right">
							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah">Tambah Data</button>
						</span>
					</div>
					<div class="table-responsive">
						<table id="data-table-basic" class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Status User</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach ($status_user as $status_user ) : ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $status_user->status_user ?></td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="modal fade" id="modalTambah" role="dialog">
				<div class="modal-dialog modal-sm">
					<?php echo form_open(base_url('status_user/tambah'), 'class="form-horizontal"') ?>
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<h2>Tambah <?php echo $title ?></h2>
							<div class="form-group ic-cmp-int">
								<div class="form-ic-cmp">
									<i class="notika-icon notika-support"></i>
								</div>
								<div class="nk-int-st">
									<input type="text" class="form-control" name="status_user" placeholder="Status User" required>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Save changes</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>