<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">ARTIKEL </h1>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container">
    <div class="row bar">
      <!-- LEFT COLUMN _________________________________________________________-->
      <div id="blog-listing-small" class="col-lg-9">
        <div class="row">

          <?php foreach ($data_artikel as $value) { ?>

            <div class="col-lg-4 col-md-6">
              <div class="home-blog-post">
                <div class="image"><img src="<?= base_url()?>assets/artikel/<?= $value->foto ?>" alt="..." class="img-fluid" style="width:150px; height: 150px">
                  <div class="overlay d-flex align-items-center justify-content-center"><a href="<?= site_url('artikel/detail/'.$value->id_artikel)?>" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                </div>
                <div class="text">
                  <h4><a href="#"><?= $value->judul ?> </a></h4>
                  <p class="author-category"> kategori <a href="#"><?= $value->nama_kategori ?></a> By <a href="#"><?= $value->pengarang?></a></p>
                  <p class="intro"><?= substr($value->isi,0,30) ?>...</p><a href="<?= site_url('artikel/detail/'.$value->id_artikel)?>" class="btn btn-template-outlined">Continue Reading</a>
                </div>
              </div>
            </div>

          <?php } ?>

        </div>
        <div class="row">
          <div class="col">
           <!--Tampilkan pagination-->
           <?php 
           if ($data_artikel != NULL) { ?>
            <?php echo $pagination; ?>
          <?php } else{ ?>
            <center><h3 style="color: grey" >Oops !!! Data Tidak Ditemukan</h3></center>
          <?php } ?>
        </div>
      </div>
    </div>
    <!--  RIGHT COLUMN _________________________________________________________-->
    <div class="col-md-3">
      <!-- MENUS AND FILTERS-->
      <div class="panel panel-default sidebar-menu">
        <div class="panel-body">
          <ul class="nav nav-pills flex-column text-sm category-menu">
            <li class="nav-item"><a href="#" class="nav-link d-flex align-items-center justify-content-between" style="background:grey; color:white"><span>Kategori  </span></a>              
              <ul class="nav nav-pills flex-column">
                <li class="nav-item"><a href="<?= site_url('artikel') ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'artikel' && $this->uri->segment(2) == '') ? 'active' : ''; ?>">Semua Kategori</a></li>
                <?php foreach ($data_kategori as $value) { ?>
                  <li class="nav-item"><a href="<?= site_url('artikel/artikel_by_kategori/'.$value->id_kategori) ?>" class="nav-link <?php echo $id_kategori == $value->id_kategori ? 'active' : ''; ?>"><?= $value->nama_kategori ?></a></li>
                <?php } ?>
              </ul>

            </li>

          </ul>
        </div>
      </div>

    </div>

  </div>
</div>