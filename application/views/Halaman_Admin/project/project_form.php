<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <div class="box-title">
                    <b><i class="fa fa-tasks"></i> <?= $button ?> Data UMKM</b>
                </div>
                <div class="box-tools pull-right">
                    <button type="button" class="toggle-expand-btn btn btn-default btn-sm"><i class="fa fa-expand"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Id User</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?= $id_user; ?>" />
                                <?= form_error('id_user') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Foto</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?= $foto; ?>" />
                                <?= form_error('foto') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Nama</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?= $nama; ?>" />
                                <?= form_error('nama') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="detail">Detail</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="3" name="detail" id="detail" placeholder="Detail"><?= $detail; ?></textarea>
                                <? form_error('detail')?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="bigint">Dana Dibutuhkan</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="dana_dibutuhkan" id="dana_dibutuhkan" placeholder="Dana Dibutuhkan" value="<?= $dana_dibutuhkan; ?>" />
                                <?= form_error('dana_dibutuhkan') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="datetime">Tanggal Buat</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tanggal_buat" id="tanggal_buat" placeholder="Tanggal Buat" value="<?= $tanggal_buat; ?>" />
                                <?= form_error('tanggal_buat') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="datetime">Tanggal Berakhir</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tanggal_berakhir" id="tanggal_berakhir" placeholder="Tanggal Berakhir" value="<?= $tanggal_berakhir; ?>" />
                                <?= form_error('tanggal_berakhir') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Surat Perjanjian</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="surat_perjanjian" id="surat_perjanjian" placeholder="Surat Perjanjian" value="<?= $surat_perjanjian; ?>" />
                                <?= form_error('surat_perjanjian') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Proposal</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="proposal" id="proposal" placeholder="Proposal" value="<?= $proposal; ?>" />
                                <?= form_error('proposal') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="enum">Status</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?= $status; ?>" />
                                <?= form_error('status') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <input type="hidden" name="id_project" value="<?= $id_project; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                                <a href="<?= site_url('project') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>