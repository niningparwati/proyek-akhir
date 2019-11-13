<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">
				<div class="box-title">
                    <b><i class="fa fa-eye"></i> Detail Data Artikel</b>
                </div>
                <div class="box-tools pull-right">
                    <button type="button" class="toggle-expand-btn btn btn-default btn-sm"><i class="fa fa-expand"></i></button>
                </div>
			</div>
			<div class="box-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>Id Kategori</b></td>
							<td><?= $id_kategori; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Id Admin</b></td>
							<td><?= $id_admin; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Judul</b></td>
							<td><?= $judul; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Pengarang</b></td>
							<td><?= $pengarang; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Tanggal Pos</b></td>
							<td><?= $tanggal_pos; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Isi</b></td>
							<td><?= $isi; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Foto</b></td>
							<td><?= $foto; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('artikel') ?>" class="btn btn-danger pull-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>