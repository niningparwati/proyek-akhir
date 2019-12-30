<body class="hold-transition skin-blue sidebar-mini" >
  <div class="wrapper" style="background-color: #000000 ">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Edit Data User
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
          <li><a href="#">User</a></li>
          <li class="active">Data User</li>
          <li class="active">Edit Data User</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header">
                <div class="box-title">
                  <b><i class="fa fa-tasks"></i> Edit Data User <small>( <?= $nama." | ".$id_user ?> )</small></b>
                </div>
                <div class="box-tools pull-right">
                  <button type="button" class="toggle-expand-btn btn btn-default btn-sm"><i class="fa fa-expand"></i></button>
                </div>
              </div>
              <div class="box-body">
                <form style="padding: 15px;" action="<?= site_url('Halaman_Admin/User/updateUser/'.$id_user); ?>" method="POST" enctype="multipart/form-data">
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
                      <label class="col-md-2" for="varchar">Email</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?= $email; ?>" />
                        <?= form_error('email') ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-2" for="varchar">Tanggal Lahir</label>
                      <div class="col-md-6">                                 
                        <?php if ($tanggal_lahir == '0000-00-00') { ?>
                          <input type="text" class="form-control datepicker" name="tanggal_lahir" id="tanggal_lahir" data-date-format="yyyy-mm-dd" placeholder="Tanggal Lahir" />
                        <?php }else{ ?>
                          <input type="text" class="form-control datepicker" name="tanggal_lahir" id="tanggal_lahir" data-date-format="yyyy-mm-dd" placeholder="Tanggal Lahir" value="<?= $tanggal_lahir; ?>" />
                        <?php } ?>
                        <?= form_error('tanggal_lahir') ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-2" for="varchar">Telepon</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon" value="<?= $telepon; ?>" />
                        <?= form_error('telepon') ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-2" for="alamat">Alamat</label>
                      <div class="col-md-6">
                        <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?= $alamat; ?></textarea>
                        <? form_error('alamat')?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-2" for="varchar">Pekerjaan</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?= $pekerjaan; ?>" />
                        <?= form_error('pekerjaan') ?>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-2" for="varchar">Foto</label> 
                      <div class="col-md-6">
                        <?php if(!empty($foto)) {?>
                          <input type="file" id="foto" name="foto" class="photo-input" style="width: 180px; height: 220px;" data-initial-preview="<img src=<?= base_url();?>assets/user/profile/<?php echo $foto;?> class=file-preview-image />" data-show-remove="true">
                        <?php } else if(empty($foto)){ ?>
                          <input type="file" id="foto" name="foto" class="photo-input" >
                        <?php } ?>
                        <label class="error" for="file">
                          <code>( ext: .jpg</code> <code>.jpeg</code> <code>.png</code> <code>&amp; Max. 3MB )</code>
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6 col-md-offset-2">
                        <input type="hidden" name="id_user" value="<?= $id_user; ?>" />
                        <input type="hidden" name="foto_old" value="<?= $foto; ?>" /><br>
                        <a href="<?= site_url('Halaman_Admin/User') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o"></i> Update</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.18
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
      reserved.
    </footer>