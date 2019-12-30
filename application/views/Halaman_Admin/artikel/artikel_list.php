<body class="hold-transition skin-blue sidebar-mini" >
  <div class="wrapper" style="background-color: #000000 ">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Data Artikel
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
          <li><a href="#">Artikel</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">

            <div class="box">
              <div class="box-header">
                <td>
                  <a href="<?= base_url()?>index.php/Halaman_Admin/Artikel/create">
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
                      <th style="text-align: center;">Judul</th>
                      <th style="text-align: center;">Foto</th>                              
                      <th style="text-align: center;">Isi</th>
                      <th style="text-align: center;">Status</th>
                      <th width="15%" style="text-align: center;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($data_artikel as $artikel) { ?>
                      <tr>
                        <td style="vertical-align: middle; text-align: center;"><?= $no++; ?></td>
                        <td style="vertical-align: middle; text-align: center;"><?= $artikel->judul?></td>
                        <?php if (!empty($artikel->judul)) { ?>
                          <td style="vertical-align: middle; text-align: center;">
                            <img src="<?= base_url()?>assets/artikel/<?= $artikel->foto ?>" style="width: 100px; height: 100px;">
                          </td>
                        <?php }else {?>
                          <td style="vertical-align: middle; text-align: center;">
                           Belum Ada Foto
                         <?php } ?>                        
                       </td>
                       <td style="vertical-align: middle; text-align: left;  width: 40%"><?= $artikel->isi ?></td>
                       <td style="vertical-align: middle; text-align: center;"><?= $artikel->status ?></td>
                       <td style="vertical-align: middle; text-align: center; width: 17%">
                        <?php if ($artikel->status == 'pending') { ?>
                          <a href="<?= site_url('Halaman_Admin/Artikel/aksi/'.$artikel->id_artikel.'/yes') ?>" class="btn btn-success proses" style="background:#00b3b3">Aktifkan</a>
                          <a href="<?= site_url('Halaman_Admin/Artikel/aksi/'.$artikel->id_artikel.'/no') ?>" class="btn btn-danger tolak" >Batalkan</a>
                        <?php }elseif ($artikel->status == 'berjalan') { ?>
                          <a href="<?= site_url('Halaman_Admin/Artikel/nonaktif/'.$artikel->id_artikel) ?>" class="btn btn-danger proses">Non aktif</a>
                        <?php }elseif ($artikel->status == 'selesai' OR $artikel->status == 'batal') { ?>
                          <a href="<?= site_url('Halaman_Admin/Artikel/aksi/'.$artikel->id_artikel.'/yes') ?>" class="btn btn-success aktif" style="background:#00b3b3">Aktifkan</a>
                        <?php } ?>
                      </td>
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