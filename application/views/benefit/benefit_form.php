<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <div class="box-title">
                    <b><i class="fa fa-tasks"></i> <?= $button ?> Data Benefit</b>
                </div>
                <div class="box-tools pull-right">
                    <button type="button" class="toggle-expand-btn btn btn-default btn-sm"><i class="fa fa-expand"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Id Project</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="id_project" id="id_project" placeholder="Id Project" value="<?= $id_project; ?>" />
                                <?= form_error('id_project') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Nama Benefit</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_benefit" id="nama_benefit" placeholder="Nama Benefit" value="<?= $nama_benefit; ?>" />
                                <?= form_error('nama_benefit') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="longtext">Isi</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="isi" id="isi" placeholder="Isi" value="<?= $isi; ?>" />
                                <?= form_error('isi') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <input type="hidden" name="id_benefit" value="<?= $id_benefit; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                                <a href="<?= site_url('benefit') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>