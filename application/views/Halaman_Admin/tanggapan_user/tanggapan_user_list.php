<body class="hold-transition skin-blue sidebar-mini" >
 <!--Sweet Alert -->
 <?php if($this->session->flashdata('success')) { ?>
  <div class="success-flash" data-success="<?= $this->session->flashdata('success') ?>"></div>
<?php } else if ($this->session->flashdata('error')) { ?>
  <div class="error-flash" data-error="<?= $this->session->flashdata('error') ?>"></div>
<?php } ?>
<!-- End Sweet Alert -->
<div class="wrapper" style="background-color: #000000 ">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tanggapan User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Tanggapan User</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="mytable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="5%" style="text-align: center;">No</th>
                    <th style="text-align: center;">Nama User</th>     
                    <th style="text-align: center;">Foto User</th>                          
                    <th style="text-align: center;">Isi Tanggapan User</th>
                     <!--  <th style="text-align: center;">Aktivasi</th>
                     -->                      <th width="15%" style="text-align: center;">Aksi</th>
                   </tr>
                 </thead>
                 <tbody>

                  <?php
                  $no = 1;
                  foreach ($tanggapan_user as $value) { ?>
                    <tr>
                      <td style="vertical-align: middle; text-align: center;"><?= $no++; ?></td>
                      <td style="vertical-align: middle; text-align: center;"><?= $value->nama?></td>
                      <?php if (!empty($value->foto)) { ?>
                        <td style="vertical-align: middle; text-align: center;">
                          <img src="<?= base_url()?>assets/user/profile/<?= $value->foto ?>" style="width: 120px; height: 80px;">
                        </td>
                      <?php }else {?>
                        <td style="vertical-align: middle; text-align: center;">
                         <img src="<?= base_url()?>assets/user/profile/user.png ?>" style="width: 120px; height: 80px;">
                       <?php } ?>                        
                     </td>
                     <td style="vertical-align: middle; text-align: left;  width: 40%"><?= $value->isi ?></td>
                      <!--  <td style="vertical-align: middle; text-align: left">

                         <?php if ($value->status == 'aktif') { ?>
                          <a href="<?= site_url('Halaman_Admin/Tanggapan_User/delete/'.$value->id_tanggapan_user) ?>" class="btn btn-warning">Non Aktif</a>
                        <?php }elseif ($value->status == 'tidak aktif') { ?>
                          <a href="<?= site_url('Halaman_Admin/Tanggapan_User/delete/'.$value->id_tanggapan_user) ?>" class="btn btn-danger">Aktifkan</a>
                        <?php } ?>
                      </td> -->
                      <td style="vertical-align: middle; text-align: center; width: 17%">
                        <a href="<?= site_url('Halaman_Admin/Tanggapan_User/delete/'.$value->id_tanggapan_user) ?>" class="btn btn-danger proses">Hapus</a>
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
    <?= call_datatable("#mytable") ?>

    <script>
      $(document).ready(function () {
        $('.proses').on('click', function(e){
          e.preventDefault();
          const proses = $('.proses').attr('href');
          Swal.fire({
            title: 'Hapus Tanggapan User',
            text: 'Anda yakin menghapus tanggapan user ini?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Tidak',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
          }).then((result) => {
            if (result.value) {
              document.location.href = proses;
            }
          })
        });
      });
    </script>
    <script src="<?= base_url() ?>assets/plugins/sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>assets/js/sweetalert.js"></script>