<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2"><?= $nama?> </h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="shop-category.html"><?= $jenis_pendanaan ?></a></li>
          <li class="breadcrumb-item"><a href="shop-category.html">Detail <?= $jenis_pendanaan ?></a></li>
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
        <div id="productMain" class="row">
          <div class="col-sm-6">
            <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
              <div> <img src="<?= base_url()?>assets/foto_project/<?= $foto ?>" alt="" class="img-fluid"></div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="box">
              <form style=" margin-left: 100px;">
                <div class="sizes" style="text-align: left;">
                  <h5>Dana Yang Dibutuhkan</h5>
                </div>
                <p class="price" style="font-size: 20px; text-align: left;">Rp <?= number_format($dana_dibutuhkan,2,',','.') ?></p><br>
                <div class="sizes" style="text-align: left;">
                  <h5>Dana Terkumpul </h5>
                </div>
                <?php if ($donasi_masuk) { 
                  if($donasi_masuk <= $dana_dibutuhkan){ ?>
                    <p style="font-weight: bold; color: red; text-align: left;" class="price">Rp <?= number_format($donasi_masuk,2,',','.') ?></p>
                  <?php }else if($donasi_masuk > $dana_dibutuhkan){ ?>
                    <p style="font-weight: bold; color: green; text-align: left;" class="price">Rp <?= number_format($donasi_masuk,2,',','.') ?></p>
                  <?php } }else{ ?>
                    <p style="font-weight: bold; color: red; text-align: left;" class="price">Rp 0</p>
                  <?php } ?>
                </form>
                <?php 
                $a = ( $donasi_masuk/$dana_dibutuhkan);
                $b = ($a * 100);

                if ($b <= 100) { ?>
                  Persentase Dana Terkumpul ( <?= $b ?>% ) <br>
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
            <h4>Creator</h4>
            <p><?= $nama_user ?></p>

            <blockquote class="blockquote">
              <p class="mb-0"><em>Bukan seberapa banyak yang kau beri, tetapi seberapa ikhlas dan tulus yang kau beri.</em></p>
            </blockquote>
          </div>
        </div>
        <div class="col-lg-3">
          <!-- MENUS AND FILTERS-->
          <div class="panel panel-default sidebar-menu">
            <div class="panel-heading">
              <button class="btn btn-bg" style="background:#00cc99"><i class="fa fa-fw fa-calendar"></i>
                <?php 
                $hari_ini = new DateTime();
                $tanggal_berakhir = new DateTime($tanggal_akhir);
                $sisa = $hari_ini->diff($tanggal_berakhir);
                echo $sisa->d." days again";
                ?></button>
              </div>
              <div style="width: 100%; text-align: center;color: grey">
                <br><h3 class="h4 panel-title">Ingin memberikan donasi ?</h3>
                <small>Klik tombol di bawah ini untuk donasi !</small>
              </div>
              <div style="width: 100%; text-align: center;">
                <br>
                <?php 
                if ($this->session->userdata('id_user')) { ?>
                  <a href="<?= site_url('donasi/cek/'.$id_project.'/yes')?>" class="btn btn-bg" style="background: blue; color:white; font-size: 16px">DONASI !</a>
                <?php  } else{ ?>
                  <a href="<?= site_url('donasi/cek/'.$id_project.'/no')?>" class="btn btn-bg" style="background: blue; color:white; font-size: 16px">DONASI</a>
                <?php } ?>
              </div>
              <div class="panel-body">
                <ul class="nav nav-pills flex-column text-sm category-menu">
                  <br><br>
                  <li><hr style="color:1px solid black;"></li>
                  <li class="nav-item"><a href="#" class="nav-link d-flex align-items-center justify-content-between"><span>Tanggal publish</span><span class="badge badge-secondary"></span></a>
                    <ul class="nav nav-pills flex-column">
                      <li class="nav-item"><p style="padding-left: 20px"><?= $tanggal_buat?></p></li>
                      <li class="nav-item"></li>
                    </ul>
                  </li>

                  <li class="nav-item"><a href="#" class="nav-link d-flex align-items-center justify-content-between"><span>Tanggal berakhir</span><span class="badge badge-secondary"></span></a>
                    <ul class="nav nav-pills flex-column">
                      <li class="nav-item"><p style="padding-left: 20px"><?= $tanggal_akhir?></p></li>
                      <li class="nav-item"></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>

