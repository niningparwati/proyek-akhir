<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">
				<div class="box-title">
                    <b><i class="fa fa-eye"></i> Detail Data Benefit</b>
                </div>
                <div class="box-tools pull-right">
                    <button type="button" class="toggle-expand-btn btn btn-default btn-sm"><i class="fa fa-expand"></i></button>
                </div>
			</div>
			<div class="box-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>Id Project</b></td>
							<td><?= $id_project; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Nama Benefit</b></td>
							<td><?= $nama_benefit; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Isi</b></td>
							<td><?= $isi; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('benefit') ?>" class="btn btn-danger pull-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>