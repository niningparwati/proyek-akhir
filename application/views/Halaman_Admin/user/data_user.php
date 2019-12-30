<body class="hold-transition skin-blue sidebar-mini" >
  <div class="wrapper" style="background-color: #000000 ">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!--Sweet Alert -->
      <?php if($this->session->flashdata('success')) { ?>
        <div class="success-flash" data-success="<?= $this->session->flashdata('success') ?>"></div>
      <?php } else if ($this->session->flashdata('error')) { ?>
        <div class="error-flash" data-error="<?= $this->session->flashdata('error') ?>"></div>
      <?php } ?>
      <!-- End Sweet Alert -->

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Data Semua User
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
          <li><a href="#">User</a></li>
          <li class="active">Data User</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- sweet aler jquery -->
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
          <?php if ($this->session->flashdata('flash')) { ?>
          <div class="col-xs-12">hehehe</div>
        <?php } ?>
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
                      <th width="20%" style="text-align: center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ($data_user as $value) { ?>
                      <tr>
                        <td style="text-align: center"><?= $no++ ?></td>
                        <td><?= $value->nama ?></td>
                        <td style="text-align: center">
                          <?php if (!empty($value->foto)) { ?>
                            <img src="<?= base_url()?>assets/user/profile/<?= $value->foto ?>" style="width: 100px;">
                          <?php } else{ ?>
                            <img src="<?php echo base_url()?>assets/admin/profile/user1.png" style="width: 50px">
                          <?php } ?>
                        </td>
                        <td><?= $value->email ?></td>
                        <td style="text-align: center"><?= $value->tanggal_join ?></td>
                        <td>
                          <a href="<?= site_url('Halaman_Admin/User/detailUser/'.$value->id_user) ?>" class="btn btn-success" ><i class="fa fa-search"></i> Detail</a>
                          <!--   <a href="<?= site_url('Halaman_Admin/User/editUser/'.$value->id_user) ?>" class="btn btn-info"><i class="fa fa-pencil" style="color: white"></i> Edit</a> -->
                          <?php if ($value->status == "Aktif"){ ?>
                            <a href="<?= site_url('Halaman_Admin/User/Aktivasi/'.$value->id_user) ?>" class="btn btn-danger nonaktif" ><i class="fa fa-close"></i> Non Aktif</a>
                          <?php }elseif($value->status){ ?>
                            <a href="<?= site_url('Halaman_Admin/User/Aktivasi/'.$value->id_user) ?>" class="btn btn-info" id="aktif"><i class="fa fa-check"></i> Aktifkan</a>
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

    <script type="text/javascript" src="<?= base_url()?>assets/sweetalert2.all.min.js"></script>

    <script>
      const aktif = document.querySelector('#aktif');
      aktif.addEventListener('click', function(){
        Swal({
          title: 'Aktifkan User',
          text: 'Berhasil Aktifkan User',
          type: 'success'
        });
      });
    </script>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.18
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
      reserved.
    </footer>