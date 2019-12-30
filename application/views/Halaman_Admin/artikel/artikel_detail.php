<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">DETAIL ARTIKEL</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item">Artikel</li>
          <li class="breadcrumb-item active">Detail Artikel</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container">
    <div class="row bar">
      <!-- LEFT COLUMN _________________________________________________________-->
      <div id="blog-listing-big" class="col-md-9">
        <section class="post">
          <h2><a href="post.htmls"><?= $judul ?></a></h2>
          <div class="row">
            <div class="col-sm-6">
              <p class="author-category">By <a href="#"><?= $pengarang ?></p>
            </div>
            <div class="col-sm-6 text-right">
              <p class="date-comments"><a href="#l"><i class="fa fa-calendar-o"></i> <?= tgl_indo($tanggal_pos)?></a></p>
            </div>
          </div>
          <div class="image"><a href="blog-post.html"><img src="<?= base_url()?>assets/artikel/<?= $foto ?>" alt="Example blog post alt" class="img-fluid"></a></div>
          <p class="intro"><?= $isi ?></p>
        </section>
      </div>
      <!-- RIGHT COLUMN _________________________________________________________-->
      <div class="col-md-3">
        <div class="panel panel-default sidebar-menu">
          <div class="panel-body">
            <ul class="nav nav-pills flex-column text-sm category-menu">
              <li class="nav-item"><a href="#" class="nav-link d-flex align-items-center justify-content-between" style="background:grey; color:white"><span>Kategori  </span></a>              
                <ul class="nav nav-pills flex-column">
                  <?php foreach ($data_kategori as $value) { ?>
                    <li class="nav-item"><a href="<?= site_url('artikel/artikel_by_kategori/'.$value->id_kategori) ?>" class="nav-link <?= $kategori == $value->nama_kategori ? 'active' : ''; ?>"><?= $value->nama_kategori ?></a></li>
                  <?php } ?>
                </ul>
                
              </li>
              
            </ul>
          </div>
        </div>
        <div class="panel panel-default sidebar-menu">
          <div class="panel panel-default sidebar-menu">
            <div>
              <p style="color: #555; font-size: 14px"><br><br>Diterbitkan Oleh :<br><?= $nama ?></p>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>