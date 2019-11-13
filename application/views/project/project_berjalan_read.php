<body class="hold-transition skin-blue sidebar-mini" >
  <div class="wrapper" style="background-color: #000000 ">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
            Detail Project Berjalan
      </h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
          <li><a href="#">Project</a></li>
          <li class="active">Project Berjalan</li>
          <li class="active">Detail Project Berjalan</li>
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
                    <button class="btn bg-red btn-flat margin pull-right" style="margin-right: 40px"><i class="fa fa-fw fa-calendar"></i>
                        <?php 
                        $hari_ini = new DateTime();
                        $tanggal_berakhir = new DateTime($tanggal_berakhir);
                        $sisa = $hari_ini->diff($tanggal_berakhir);
                        echo $sisa->d." days again";
                        ?>
                        
                    </button>
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
                                <td><button class="btn bg-blue btn-flat margin">Rp <?= $dana_dibutuhkan; ?></button></td>
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
                            <tr>
                                <td style="text-align: left; vertical-align: middle;"><b>Dana Kurang</b></td>
                                <td>
                                    <?php 
                                    $dana_kurang = $dana_dibutuhkan-$donasi_masuk;
                                    if ($donasi_masuk < $dana_dibutuhkan) { ?>
                                        <button class="btn btn-danger btn-flat margin">Rp <?= $dana_kurang ?></button>
                                    <?php }else{ ?>
                                        <button class="btn btn-success btn-flat margin">Rp 0 Target</button>
                                    <?php }?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div style="padding: 15px;width: 100%">
                    <hr color="1px solid grey">
                    <div class="col-md-9 pull-left">
                        <h3 style="font-weight: bold;">Data Donasi Yang Masuk</h3>
                    </div>
                    <div class="col-md-3">
                        <?php if ($donasi_masuk) { ?>
                            <h3 style="font-weight: bold; color: red">Rp <?= $donasi_masuk?></h3>
                        <?php }else{ ?>
                            <h3 style="font-weight: bold; color: red">Rp 0</h3>
                        <?php } ?>  
                    </div>
                    <table style="width: 100%; border:1px solid black">
                        <thead>
                            <tr>
                                <th style="text-align: center; border:1px solid black">No</th>
                                <th style="text-align: center; border:1px solid black">Nama Donatur</th>
                                <th style="text-align: center; border:1px solid black">Nominal</th>
                                <th style="text-align: center; border:1px solid black">Benefit yang diterima</th>
                                <th style="text-align: center; border:1px solid black">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($data_donasi as $value) { ?>
                                <tr>
                                    <td style="text-align: center; border:1px solid black; "><?= $no++ ?></td>
                                    <td style="text-align: left; border:1px solid black; padding-left: 5px"><?= $value->nama ?></td>
                                    <td style="text-align: left; border:1px solid black; padding-left: 5px">Rp <?= $value->nominal ?></td>
                                    <td style="text-align: left; border:1px solid black; padding-left: 5px"><?= $value->isi ?></td>
                                    <td style="text-align: center; border:1px solid black; "><?= $value->status_benefit ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <br><br><br><br>
                    <a href="<?= site_url('Halaman_Admin/Project/projectBerjalan') ?>" class="btn btn-danger">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                    <br><br>
                </div>

                <div style="padding: 15px;width: 100%">

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