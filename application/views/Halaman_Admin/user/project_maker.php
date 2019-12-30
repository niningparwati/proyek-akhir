<body class="hold-transition skin-blue sidebar-mini" >
  <div class="wrapper" style="background-color: #000000 ">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Data Pemilik Usaha
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
          <li class="active">Data Pemilik Usaha</li>
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
                      <th width="5%" style="text-align: center">No</th>
                      <th style="text-align: center">Nama User</th>
                      <th style="text-align: center">Foto</th>
                      <th style="text-align: center">Email</th>
                      <th style="text-align: center">Tanggal Bergabung</th>
                      <th width="15%" style="text-align: center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ($project_maker as $value) { ?>
                      <tr>
                        <td style="text-align: center"><?= $no++ ?></td>
                        <td><?= $value->nama ?></td>
                        <td style="text-align: center">
                          <?php if (!empty($value->foto)) { ?>
                            <img src="<?= base_url()?>assets/user/profile/<?= $value->foto ?>" style="width: 60px;">
                          <?php } else{ ?>
                            <img src="<?php echo base_url()?>assets/admin/profile/user1.png" style="width: 60px">
                          <?php } ?>
                        </td>
                        <td><?= $value->email ?></td>
                        <td style="text-align: center"><?= $value->tanggal_join ?></td>
                        <td style="text-align: center;">
                          <a href="<?= site_url('Halaman_Admin/User/read_project_maker/'.$value->id_user) ?>" class="btn btn-success" ><i class="fa fa-search"></i> Detail</a>
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