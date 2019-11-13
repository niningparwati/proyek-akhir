<body class="hold-transition skin-blue sidebar-mini" >
  <div class="wrapper" style="background-color: #000000 ">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
            Tambah Kategori Artikel
      </h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
          <li><a href="#">Kategori Artikel</a></li>
          <li class="active">Tambah Kategori Artikel</li>
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
                <form style="padding: 15px;" action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Nama Kategori</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori" value="<?= $nama_kategori; ?>" />
                                <?= form_error('nama_kategori') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <input type="hidden" name="id_kategori" value="<?= $id_kategori; ?>" />
                                <a href="<?= site_url('Halaman_Admin/Kategori_Artikel') ?>" class="btn btn-danger "><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                            </div>
                        </div>
                    </div>
                </form>
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