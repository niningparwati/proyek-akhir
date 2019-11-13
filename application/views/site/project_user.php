<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">Project Saya</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="index.html">Project</a></li>
          <li class="breadcrumb-item active">User</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container">
    <section class="bar">
      <div class="row">
        <div class="col-md-12">
          <p class="lead">Project yang telah kamu unggah sudah di publikasi. Pantau terus perkembangan donasi yang masuk di project kamu.</p>
        </div>
      </div>
      <div class="row portfolio text-center">
        <?php foreach ($data_project as $value) { ?>
          <div class="col-md-4">
            <div class="box-image">
              <div class="image"><img src="<?= base_url()?>assets/foto_project/<?= $value->foto ?>" alt="..." class="img-fluid" style="width: 150px; height: 150px">
                <div class="overlay d-flex align-items-center justify-content-center">
                  <div class="content">
                    <div class="name">
                      <h3><a href="portfolio-detail.html" class="color-white"><?= $value->nama ?></a></h3>
                    </div>
                    <div class="text">
                      <p class="d-none d-sm-block">Rp <?= number_format($value->dana_dibutuhkan,2,',','.') ?></p>
                      <p class="buttons"><a href="<?= site_url('project/detail_project_user/'.$value->id_project)?>" class="btn btn-template-outlined-white">View</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </section>
  </div>
</div>