<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <div class="box-title">
                    <b><i class="fa fa-tasks"></i> <?= $button ?> Data Admin</b>
                </div>
                <div class="box-tools pull-right">
                    <button type="button" class="toggle-expand-btn btn btn-default btn-sm"><i class="fa fa-expand"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">ID Admin</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="id_admin" id="id_admin" placeholder="ID Admin" value="<?= $id_admin; ?>" />
                                <?= form_error('id_admin') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Nama Lengkap</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?= $nama; ?>" />
                                <?= form_error('nama') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Email</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?= $email; ?>" />
                                <?= form_error('email') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?= $password; ?>" />
                                <?= form_error('password') ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <input type="hidden" name="id_admin" value="<?= $id_admin; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                                <a href="<?= site_url('admin') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
</div>