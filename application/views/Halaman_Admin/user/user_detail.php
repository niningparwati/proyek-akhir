<body class="hold-transition skin-blue sidebar-mini" >
  <div class="wrapper" style="background-color: #000000 ">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Detail Data User
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
          <li><a href="#">User</a></li>
          <li class="active">Data User</li>
          <li class="active">Detail Data User</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-body">
                <div style="padding: 15px;">
                  <table class="table table-striped"> 
                    <?php if (!empty($foto)) { ?>
                      <th rowspan="5" width="20%">
                        <img style="height: 140px; width: 140px;" src="<?= base_url();?>assets/user/profile/<?php echo $foto;?>"> </img>
                      </th>
                    <?php } else{ ?>
                      <th rowspan="5" width="20%" style="vertical-align: middle; text-align: center;" >
                        <img src="<?php echo base_url()?>assets/admin/profile/user1.png" style="width: 80%">
                      </th>
                    <?php }?>           
                    <tr>
                      <td width="20%"><b>ID user</b></td>
                      <td><?= $id_user; ?></td>
                    </tr>
                    <tr>
                      <td width="20%"><b>Nama Lengkap</b></td>
                      <td><?= $nama; ?></td>
                    </tr>
                    <tr>
                      <td width="20%"><b>Email</b></td>
                      <td><?= $email; ?></td>
                    </tr>
                    <tr>
                      <td><br></td>
                    </tr>
                    <tr>
                      <td width="20%"><b>Tanggal Lahir</b></td>
                      <td>
                        <?php 
                        if ($tanggal_lahir != '') { 
                          if ($tanggal_lahir == '0000-00-00') {
                            echo "belum diisi";
                          }else{
                            echo $tanggal_lahir ;
                          }
                        }else { 
                          echo "belum diisi";
                        }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td width="20%"><b>Alamat</b></td>
                      <td>
                        <?php 
                        if ($alamat != '') {
                          echo $alamat;
                        }else{
                          echo "belum diisi";
                        }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td width="20%"><b>Telepon</b></td>
                      <td>
                        <?php 
                        if ($telepon != '') {
                          echo $telepon;
                        }else{
                          echo "belum diisi";
                        }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td width="20%"><b>Pekerjaan</b></td>
                      <td>
                        <?php 
                        if ($pekerjaan != '') {
                          echo $pekerjaan;
                        }else{
                          echo "belum diisi";
                        }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td width="20%"><b>Tanggal Join</b></td>
                      <td>
                        <?php 
                        if ($tanggal_join != '') {
                          echo $tanggal_join;
                        }else{
                          echo "belum diisi";
                        }
                        ?>
                      </td>
                    </tr>
                  </table>
                  <a href="<?= site_url('Halaman_Admin/User') ?>" class="btn btn-danger">
                    <i class="fa fa-arrow-left"></i> Kembali
                  </a>
                </div>
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