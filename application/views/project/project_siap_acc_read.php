<body class="hold-transition skin-blue sidebar-mini" >
  <div class="wrapper" style="background-color: #000000 ">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Detail UMKM Siap Approve
      </h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
          <li><a href="#">UMKM</a></li>
          <li class="active">UMKM Siap Approve</li>
          <li class="active">Detail UMKM Siap Approve</li>
      </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">    
                    <div class="box-tools pull-right">
                        <button type="button" class="toggle-expand-btn btn btn-default btn-sm"><i class="fa fa-expand"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div style="padding: 15px;">
                        <table class="table table-striped pull-left" id="mytable" style="width: 60%">
                            <tr>
                                <td colspan="2" style="text-align: center;"><h1><?= $nama; ?></h1></td>
                            </tr>
                            <tr>
                                <td colspan="2"><center><img src="<?= base_url()?>assets/foto_project/<?= $foto ?>" style="width: 250px; height: 250px"></center></td>
                            </tr>
                            <tr>
                                <td width="30%"><b>Nama Project Maker</b></td>
                                <td><?= $nama_user ?> | <?= $id_user ?></td>
                            </tr>
                            <tr>
                                <td width="30%"><b>Detail</b></td>
                                <td><?= $detail; ?></td>
                            </tr>
                            <tr>
                                <td width="30%"><b>Dana Dibutuhkan</b></td>
                                <td>Rp <?= $dana_dibutuhkan; ?></td>
                            </tr>
                            <tr>
                                <td width="30%"><b>Tanggal Buat</b></td>
                                <td><?= $tanggal_buat; ?></td>
                            </tr>
                            <tr>
                                <td width="30%"><b>Tanggal Berakhir</b></td>
                                <td>
                                    <?php 
                                    if ($tanggal_berakhir) {
                                        echo $tanggal_berakhir;
                                    }else{
                                        echo "belum diisi";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="30%" style="vertical-align: middle; text-align: left;"><b>Surat Perjanjian</b></td>
                                
                                <?php 
                                if ($surat_perjanjian) {
                                    $nama = $surat_perjanjian;
                                    $pdf = strpos($nama, ".pdf");
                                    $png = strpos($nama, ".png");
                                    $jpg = strpos($nama, ".jpg");
                                    $jpeg = strpos($nama, ".jpeg");
                                    if ($pdf) { ?>
                                        <td>
                                            <embed src="<?= base_url()?>assets/surat_perjanjian/<?= $surat_perjanjian ?>" style="width: 100%; height: 200px"></embed>
                                            <br><br>
                                            <a href="<?= site_url('Halaman_Admin/Project/downloadSuratPerjanjian/'.$id_project) ?>" class="btn btn-success">
                                                <i class="fa fa-download"></i> Download 
                                            </a>
                                        </td>
                                    <?php   }else{ ?>
                                        <td>
                                            <img src="<?= base_url()?>assets/surat_perjanjian/<?= $surat_perjanjian ?>" style="width: 300px">
                                            <br><br>
                                            <a href="<?= site_url('Halaman_Admin/Project/downloadSuratPerjanjian/'.$id_project) ?>" class="btn btn-success">
                                                <i class="fa fa-download"></i> Download 
                                            </a>
                                        </td>
                                    <?php } 
                                }
                                ?>
                                
                            </tr>
                            <tr>
                                <td width="30%" style="vertical-align: middle; text-align: left;"><b>Proposal</b></td>
                                <td>
                                    <embed src="<?= base_url()?>assets/proposal_project/<?= $proposal ?>" style="width: 100%; height: 200px"></embed>
                                    <br><br>
                                    <a href="<?= site_url('Halaman_Admin/Project/downloadProposal/'.$id_project) ?>" class="btn btn-success">
                                        <i class="fa fa-download"></i> Download 
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td width="30%"><b>Status</b></td>
                                <td><?= $status; ?></td>
                            </tr>
                        </table>

                        <table class="table table-bordered table-striped table-hover pull-right" style="width: 35%" id="mytable">
                            <tr>
                                <td style="text-align: center;" colspan="2"><h2>Data Benefit Project</h2></td>
                            </tr>
                            <?php 
                            foreach ($data_benefit as $value) { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center; font-weight: bold;"><?= $value->nama_benefit ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 35%">Minimal Donasi</td>
                                    <td>:<?= $value->minimal?></td>
                                </tr>
                                <tr>
                                    <td style="width: 35%">Maksimal Donasi</td>
                                    <td>:<?= $value->maksimal?></td>
                                </tr>
                                <tr>
                                    <td>Isi Benefit</td>
                                    <td style="text-align: justify;" colspan="2">: <?= $value->isi?></td>
                                </tr>
                            <?php }?>
                            <tr>
                                <td colspan="2"><br><br></td>
                            </tr>                       
                        </table>
                    </div>
                </div>
                <div style="padding: 15px;width: 100%">
                    <a href="<?= site_url('Halaman_Admin/Project/siapApprove') ?>" class="btn btn-danger "><i class="fa fa-arrow-left"></i> Kembali</a>
                    <a href="<?= site_url('Halaman_Admin/Project/Approve/'.$id_project.'/yes')?>" class="btn btn-success pull-right proses"><i class="fa fa-check"></i> Approve</a>
                    <a href="<?= site_url('Halaman_Admin/Project/Approve/'.$id_project.'/no')?>" class="btn btn-warning pull-right tolak"><i class="fa fa-close"></i> Tolak</a>
                    
                </div>
            </div>
        </div>
    </div>
    <?= call_datatable("#mytable") ?>
    <script>
        $(document).ready(function () {
            $('.proses').on('click', function(e){
                e.preventDefault();
                const proses = $('.proses').attr('href');
                Swal.fire({
                    title: 'Apakah Anda Yakin Akan Approve Project Ini?',
                    text: 'Pastikan Data Sudah Lengkap',
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

    <script>
        $(document).ready(function () {
            $('.tolak').on('click', function(e){
                e.preventDefault();
                const tolak = $('.tolak').attr('href');
                Swal.fire({
                    title: 'Tolak Project',
                    text: 'Apakah Anda Yakin Akan Menolak Project Ini?',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'Tidak',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.value) {
                        document.location.href = tolak;
                    }
                })
            });
        });
    </script>

    <?= call_datatable("#mytable") ?>
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