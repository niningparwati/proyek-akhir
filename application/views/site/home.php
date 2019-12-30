<!-- <div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">HOME</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">All Project</li>
        </ul>
      </div>
    </div>
  </div>
</div> -->
<div id="content">
  <section style="background: url('img/photogrid.jpg') center center repeat; background-size: cover;" class="relative-positioned">
    <!-- Carousel Start-->
    <div class="home-carousel">
      <div class="dark-mask mask-primary"></div>
      <div class="container">
        <div class="homepage owl-carousel">

          <?php foreach ($project_slide as $slide) { ?>
            <div class="item">
              <a href="<?= site_url('project/detail_project/'.$slide->id_project)?>" style="text-decoration: none;">
              <div class="row">
                <div class="col-md-8 text-right">
                  <p><img src="img/logo.png" alt="" class="ml-auto"></p>
                  <h1 style="color: white"><?= $slide->nama; ?></h1>
                  <h3 style=" color: white">Dana Dibutuhkan : Rp <?=  $slide->dana_dibutuhkan; ?></h3>
                  <!-- <p style="font-size: 12px; color: white"><?=  $slide->detail; ?></p> -->
                </div>
                <div class="col-md-4"><img src="<?= base_url()?>assets/foto_project/<?= $slide->foto ?>" alt="" class="img-fluid image1" style="width: 350px; height: 300px;" style="text-decoration: none;"></div>
              </div>
            </a>
            </div>
          <?php } ?>

        </div>
      </div>
    </div>
    <!-- Carousel End-->
  </section>
  <div class="container">
    <div class="row bar">
      <div class="col-md-12">
        <p class="text-muted lead text-center"><center><h1>PROJECT DAN USAHA YANG SEDANG MENCARI DANA</h1></center></p>
        <p><br><br></p>
        <div class="products-big">
          <div class="row products">

            <?php 
            foreach ($data_project as $value) { ?>
              <div class="col-lg-3 col-md-4">
                <div class="product">
                  <div class="image"><a href="<?= site_url('project/detail_project/'.$value->id_project)?>" ><img src="<?= base_url()?>assets/foto_project/<?= $value->foto ?>" alt="" class="img-fluid image1" style="width: 250px; height: 250px"></a></div>
                  <div class="text" style="">
                    <h3><?= $value->nama?></h3>
                      <table style="font-size: 12px; text-align: left;">
                        <tr>
                          <td style="width: 50%">Dana Dibutuhkan </td>
                          <td>: Rp <?= number_format($value->dana_dibutuhkan,2,'.',',')?></td>
                        </tr>
                        <tr>
                          <td colspan="2"><?= substr($value->detail,0,35) ?></td>
                        </tr>
                        <tr >
                          <td colspan="2"><a href="<?= site_url('project/detail_project/'.$value->id_project)?>" style="font-size: 10px; text-align: left; color: blue; text-decoration: none;" >
                            Lihat selengkapnya ...
                          </a></td>
                        </tr>
                      </table>
                  </div>
                  
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="row">
          <div class="col">

            <!--Tampilkan pagination-->
            <?php echo $pagination; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>