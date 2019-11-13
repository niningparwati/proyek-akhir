<body class="hold-transition skin-blue sidebar-mini" >
  <div class="wrapper" style="background-color: #000000 ">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Data Project Siap Acc
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
          <li><a href="#">Project</a></li>
          <li class="active">Data Project</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">

            <div class="box">
              <div class="box-header">

              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="5%" style="text-align: center;">No</th>
                      <th style="text-align: center;">Foto</th>
                      <th style="text-align: center;">Nama</th>
                      <th style="text-align: center;">Detail</th>
                      <th style="text-align: center;">Dana Dibutuhkan</th>
                      <th width="15%" style="text-align: center;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($data_project as $project) { ?>
                      <tr>
                        <td style="vertical-align: middle; text-align: center;"><?= $no++; ?></td>

                        <?php if (!empty($project->foto)) { ?>
                          <td style="vertical-align: middle; text-align: center;">
                            <img src="<?= base_url()?>assets/foto_project/<?= $project->foto ?>" style="width: 100px; height: 100px;">
                          </td>
                        <?php }else {?>
                          <td style="vertical-align: middle; text-align: center;">
                           Belum Ada Foto
                         <?php } ?>                        
                       </td>
                       <td style="vertical-align: middle; text-align: left;"><?= $project->nama ?></td>
                       <td style="vertical-align: middle; text-align: left;"><?= $project->detail ?></td>
                       <td style="vertical-align: middle; text-align: left;">Rp <?= $project->dana_dibutuhkan ?></td>
                       <td style="vertical-align: middle; text-align: center;">
                        <a href="<?= site_url('Halaman_Admin/Project/detailSiapApprove/'.$project->id_project) ?>" title="Lihat Detail Data"class="btn btn-success" style="background:#00b3b3"><i class="fa fa-search"></i> Detail</a>
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