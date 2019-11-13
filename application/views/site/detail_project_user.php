<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2"><?= $nama ?></h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="index.html">Project Saya</a></li>
          <li class="breadcrumb-item active">Detail</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container">
    <div class="row bar">
      <!-- LEFT COLUMN _________________________________________________________-->
      <div class="col-lg-9">
        <p class="lead">Project Anda telah dipublikasi di Aplikasi U-Project. Pantau terus untuk melihat perkembangan donasi yang masuk !</p>
        <div id="productMain" class="row">
          <div class="col-sm-6">
            <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
              <div> <img src="<?= base_url()?>assets/foto_project/<?= $foto ?>" alt="" class="img-fluid"></div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="box">
              <form>
                <div class="sizes">
                  <h5>Dana Yang Dibutuhkan</h5>
                </div>
                <p class="price" style="font-size: 20px">Rp <?= number_format($dana_dibutuhkan,2,',','.') ?></p><br>
                <div class="sizes">
                  <h5>Dana Terkumpul </h5>
                </div>
                <?php if ($donasi_masuk) { 
                  if($donasi_masuk <= $dana_dibutuhkan){ ?>
                    <p style="font-weight: bold; color: red" class="price">Rp <?= number_format($donasi_masuk,2,',','.') ?></p>
                  <?php }else if($donasi_masuk > $dana_dibutuhkan){ ?>
                    <p style="font-weight: bold; color: green" class="price">Rp <?= number_format($donasi_masuk,2,',','.') ?></p>
                  <?php } }else{ ?>
                    <p style="font-weight: bold; color: red" class="price">Rp 0</p>
                  <?php } ?>
                </form>

                <?php 
                $a = ( $donasi_masuk/$dana_dibutuhkan);
                $b = ($a * 100);

                if ($b <= 100) { ?>
                  Persentase Dana ( <?= $b ?>% ) <br>
                  <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria_valuemin="0" aria-valuemax="100" style="width: <?= $b ?>%">
                    </div>
                  </div>

                <?php } else if ($b > 100){ ?>
                  Persentase Dana ( 100% ) <br>
                  <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria_valuemin="0" aria-valuemax="100" style="width:100%">
                    </div>
                  </div> 
                <?php } ?>

              </div>
            </div>
          </div>
          <div id="details" class="box mb-4 mt-4">
            <p></p>
            <h4>Detail Project</h4>
            <p><?= $detail ?></p>
            <br>
          </div>
          <div class="box">
            <div class="table-responsive">
              <h3>Donasi Yang Masuk</h3>
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th colspan="2" class="border-top-0" style="text-align: center;">Donatur</th>
                    <th class="border-top-0">Nominal Donasi</th>
                    <th class="border-top-0">Benefit</th>
                    <th class="border-top-0">Status Benefit</th>
                    <th class="border-top-0">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  foreach ($data_donatur as $value) { ?>
                    <tr>
                      <td>
                        <?= $no++ ?>
                      </td>
                      <td>
                        <?php if ($value->foto != '') { ?>
                          <a href="#"><img src="<?= base_url()?>assets/user/profile/<?= $value->foto ?>" alt="White Blouse Armani" class="img-fluid"></a>
                        <?php }else{ ?>
                          belum ada foto
                        <?php } ?>
                      </td>
                      <td><?= $value->nama_user ?></td>
                      <td>Rp <?= number_format($value->nominal,2,',','.') ?></td>
                      <td><?= $value->isi ?></td>
                      <td><?= $value->status_benefit ?></td>
                      <td>
                        <?php if ($value->status_benefit == 'Menunggu Konfirmasi') { ?>
                          <a href="<?= site_url('donasi/kirim_benefit/'.$value->id_donasi) ?>" class="btn btn-success">Approve</a>
                        <?php }else if($value->status_benefit == 'Benefit Sudah Dikirim'){ ?>
                          <a href="#" class="btn btn-bg">Sudah dikirim</a>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="5" class="text-right" style="font-size: 20px">Dana Terkumpul</th>
                    <th colspan="2">
                      <?php if ($donasi_masuk) { ?>
                        <p style="font-weight: bold;font-size: 20px" class="price">Rp <?= number_format($donasi_masuk,2,',','.') ?></p>
                      <?php }else{ ?>
                        <p style="font-weight: bold;font-size: 20px" class="price">Rp 0</p>
                      <?php } ?>
                    </th>
                  </tr>
                  <tr>
                    <th colspan="5" class="text-right" style="font-size: 20px;color: red">Dana Kurang</th>
                    <th colspan="2">
                      <?php if ($donasi_masuk <= $dana_dibutuhkan) { ?>
                        <p style="font-weight: bold;font-size: 20px;color: red" class="price">Rp <?= number_format($dana_dibutuhkan-$donasi_masuk,2,',','.') ?></p>
                      <?php }else if($donasi_masuk > $dana_dibutuhkan){ ?>
                        <p style="font-weight: bold;font-size: 20px;color: red" class="price">Rp 0</p>
                      <?php } ?>
                    </th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <!-- MENUS AND FILTERS-->
          <div class="panel panel-default sidebar-menu">
            <div class="panel-heading">
              <button class="btn btn-bg" style="background:#00cc99"><i class="fa fa-fw fa-calendar"></i>
                <?php 
                $hari_ini = new DateTime();
                $tanggal_akhir = new DateTime($tanggal_berakhir);
                $sisa = $hari_ini->diff($tanggal_akhir);
                echo $sisa->d." days again";
                ?></button>
              </div>
              <div style="width: 100%; text-align: center;color: grey">
                <br><h3 class="h4 panel-title">BENEFIT</h3>
              </div>
              <?php foreach ($data_benefit as $value) { ?>
                <div>
                  <ul class="nav nav-pills flex-column text-sm category-menu">
                    <li><hr style="color:1px solid black;"></li>
                    <li class="nav-item"><a href="#" class="nav-link active d-flex align-items-center justify-content-between"><span><?= $value->nama_benefit ?></span><span class="badge badge-secondary"></span></a>
                      <br>
                      <p style="text-align: center;"><b>
                        <?php if ($value->minimal == 0) { ?>
                        Rp 0
                      <?php }else{ ?>
                        Rp <?= number_format($value->minimal,2,',','.') ?>
                      <?php } ?>
                      </b> - <b>Rp <?= number_format($value->maksimal,2,',','.') ?></b></p>
                      <p style="text-align: justify;"><?= $value->isi ?></p>
                    </li>
                  </ul>
                </div>
              <?php } ?>
              <div class="panel-body">
                <ul class="nav nav-pills flex-column text-sm category-menu">
                  <li><hr style="color:1px solid black;"></li>
                  <li class="nav-item"><a href="#" class="nav-link d-flex align-items-center justify-content-between"><span>Tanggal publish</span><span class="badge badge-secondary"></span></a>
                    <ul class="nav nav-pills flex-column">
                      <li class="nav-item"><p style="padding-left: 20px"><?= $tanggal_buat?></p></li>
                      <li class="nav-item"></li>
                    </ul>
                  </li>

                  <li class="nav-item"><a href="#" class="nav-link d-flex align-items-center justify-content-between"><span>Tanggal berakhir</span><span class="badge badge-secondary"></span></a>
                    <ul class="nav nav-pills flex-column">
                      <li class="nav-item"><p style="padding-left: 20px"><?= $tanggal_berakhir?></p></li>
                      <li class="nav-item"></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>