<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">Tanggapan User</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Our Team</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <section class="bar bg-gray no-mb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="heading text-center">
            <h2>Aplikasi U-Project itu...?</h2>
          </div>
          <!-- Carousel Start-->
          <ul class="owl-carousel testimonials list-unstyled equal-height">
            <?php foreach ($tanggapan_user as $value) { ?>

              <li class="item">
                <div class="testimonial d-flex flex-wrap">
                  <div class="text">
                    <p><?= $value->isi ?></p>
                  </div>
                  <div class="bottom d-flex align-items-center justify-content-between align-self-end">
                    <div class="icon"><i class="fa fa-quote-left"></i></div>
                    <div class="testimonial-info d-flex">
                      <div class="title">
                        <h5><?= $value->nama ?></h5>
                        <p><?= tgl_indo($value->tanggal_pos) ?></p>
                      </div>
                      <div class="avatar">
                        <?php if ($value->foto != '') { ?>
                          <img alt="" src="<?= base_url()?>assets/user/profile/<?= $value->foto ?>" class="img-fluid">
                        <?php } else{?>
                          <img alt="" src="<?= base_url()?>assets/user/profile/user.png ?>" class="img-fluid">
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            <?php } ?>
          </ul>
          <!-- Carousel End-->
          <div>
          <center><?php echo $pagination; ?></center>
        </div>
        </div>   
      </div>
    </div>
  </section>
</div>