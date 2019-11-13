<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">	
				<div class="box-tools pull-right">
					<button type="button" class="toggle-expand-btn btn btn-default btn-sm"><i class="fa fa-expand"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td colspan="2" style="text-align: center;"><h1><?= $nama; ?></h1></td>
						</tr>
						<tr>
							<td colspan="2"><center><img src="<?= base_url()?>assets/foto_project/<?= $foto ?>" style="width: 250px; height: 250px"></center></td>
						</tr>
						<tr>
							<td width="20%"><b>Nama Project Maker</b></td>
							<td><?= $nama_user ?> | <?= $id_user ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Detail</b></td>
							<td><?= $detail; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Dana Dibutuhkan</b></td>
							<td>Rp <?= $dana_dibutuhkan; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Tanggal Buat</b></td>
							<td><?= $tanggal_buat; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Tanggal Berakhir</b></td>
							<td>
								<?php 
								if ($tanggal_berakhir) {
									echo $tanggal_berakhir;
								}else{
									echo "belum diisi";
								}
								?>
							</td>
						</tr>
						<tr>
							<td width="20%" style="vertical-align: middle; text-align: left;"><b>Surat Perjanjian</b></td>
							
							<?php 
							if ($surat_perjanjian) {
								$nama = $surat_perjanjian;
								$pdf = strpos($nama, ".pdf");
								$png = strpos($nama, ".png");
								$jpg = strpos($nama, ".jpg");
								$jpeg = strpos($nama, ".jpeg");
								if ($pdf) { ?>
									<td>
										<embed src="<?= base_url()?>assets/surat_perjanjian/<?= $surat_perjanjian ?>" style="width: 100%; height: 200px"></embed>
										<br>
										<a href="<?= site_url('project/download_surat_perjanjian/'.$id_project) ?>" class="btn btn-success">
											<i class="fa fa-download"></i> Download 
										</a>
									</td>
								<?php	}else{ ?>
									<td>
										<img src="<?= base_url()?>assets/surat_perjanjian/<?= $surat_perjanjian ?>" style="width: 300px">
										<br>
										<a href="<?= site_url('project/download_surat_perjanjian/'.$id_project) ?>" class="btn btn-success">
											<i class="fa fa-download"></i> Download 
										</a>
									</td>
								<?php }	
							}
							?>
							
						</tr>
						<tr>
							<td width="20%" style="vertical-align: middle; text-align: left;"><b>Proposal</b></td>
							<td>
								<embed src="<?= base_url()?>assets/proposal_project/<?= $proposal ?>" style="width: 50%; height: 200px"></embed>
								<br>
								<a href="<?= site_url('project/download_proposal/'.$id_project) ?>" class="btn btn-success">
									<i class="fa fa-download"></i> Download 
								</a>
							</td>
						</tr>
						<tr>
							<td width="20%"><b>Status</b></td>
							<td><?= $status; ?></td>
						</tr>
					</table>
					<a href="<?= site_url('project/get_all') ?>" class="btn btn-danger pull-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>