<body class="hold-transition skin-blue sidebar-mini" >
  <div class="wrapper" style="background-color: #000000 ">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Data Kategori Artikel
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
          <li><a href="#">Kategori Artikel</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header">
                <div class="box-title">
                  <b><i class="fa fa-tasks"></i> <?= $button ?> Data Artikel</b>
                </div>
                <div class="box-tools pull-right">
                  <button type="button" class="toggle-expand-btn btn btn-default btn-sm"><i class="fa fa-expand"></i></button>
                </div>
              </div>
              <div class="box-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-2" for="varchar">Kategori</label>
                      <div class="col-md-6">
                        <select name="id_kategori" id="id_kategori" class="form-control select2" data-placeholder="Pilih">
                          <?php if (!$id_kategori) {
                            echo "<option value='$id_kategori'>$id_kategori</option>"; 
                          }?>
                          <?php foreach ($data_kategori as $value) {
                            if ($value->id_kategori==$id_kategori) {
                              $selected="selected";
                            } else {
                              $selected="";
                            }
                            echo "<option value='$value->id_kategori' $selected >$value->nama_kategori</option>";
                          } ?>
                        </select>
                        <?= form_error('id_admin') ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-2" for="varchar">Judul</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?= $judul; ?>" />
                        <?= form_error('judul') ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-2" for="varchar">Pengarang</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Pengarang" value="<?= $pengarang; ?>" />
                        <?= form_error('pengarang') ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-2" for="longtext">Isi</label>
                      <div class="col-md-10">
                        <textarea cols="80" rows="5" name="isi" id="isi" placeholder="Isi"><?= $isi; ?></textarea>
                        <?= form_error('isi') ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-2" for="varchar">Foto</label>
                      <div class="col-md-6">
                       <?php if(!empty($foto)) {?>
                        <input type="file" id="file" name="file" class="file-input" data-initial-preview="<img src=<?= base_url();?>assets/artikel/<?php echo $file;?> class=file-preview-image />" data-show-remove="true">
                      <?php } else if(empty($file)){ ?>
                        <input type="file" id="file" name="file" class="file-input" >
                      <?php } ?>
                      <label class="error" for="file">
                        <code>( ext: .jpg</code> <code>.jpeg</code> <code>.png</code> <code>&amp; Max. 5MB )</code>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6 col-md-offset-2">
                      <input type="hidden" name="id_artikel" value="<?= $id_artikel; ?>" />
                      <input type="hidden" name="id_admin" value="<?= $this->session->userdata('id_admin') ?>">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                      <a href="<?= site_url('artikel/artikel_pending') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /.col -->
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