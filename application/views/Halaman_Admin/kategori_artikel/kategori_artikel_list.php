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
          <div class="col-xs-12">

            <div class="box">
              <div class="box-header">
                <td>
                  <a href="<?= base_url()?>index.php/Halaman_Admin/Kategori_Artikel/create">
                    <button class="btn btn-primary" type="button">
                      <div><i class="fa fa-fw fa-plus"></i>Tambah Data</div>
                    </button>
                  </a>
                </td>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="5%" style="text-align: center;">No</th>
                      <th style="text-align: center;">Nama Kategori</th>
                      <th width="15%" style="text-align: center;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($kategori_artikel as $artikel) { ?>
                      <tr>
                        <td style="vertical-align: middle; text-align: center;"><?= $no++; ?></td>
                        <td style="vertical-align: middle;"><?= $artikel->nama_kategori?></td>
                        <td style="vertical-align: middle; text-align: center; width: 30%">
                          <a href="<?= site_url('Halaman_Admin/Kategori_Artikel/update/'.$artikel->id_kategori) ?>" class="btn btn-success">Update</a>
                          <a href="<?= site_url('Halaman_Admin/Kategori_Artikel/delete/'.$artikel->id_kategori) ?>" class="btn btn-danger proses">Hapus</a>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
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