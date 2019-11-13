<div id="heading-breadcrumbs" class="brder-top-0 border-bottom-0">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Tanggapan User</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Tanggapan User</a></li>
                <li class="breadcrumb-item active">Create Tanggapan User</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div id="contact" class="container">
          <section class="bar">
            <div class="row">
              <div class="col-md-12">
                <p class="lead">Aplikasi U-Project merupakan sebuah aplikasi yang digunakan sebagai wadah untuk mempublikasikan project-project dari para project maker, yang mana project-project tersebut membutuhkan donasi untuk menunjang proses pembuatannya.</p>
                <p class="text-sm">Apa saja yang ada di aplikasi U-Project?</p>
              </div>
            </div>
          </section>
          <section>
            <div class="row text-center">
              <div class="col-md-3">
                <div class="box-simple">
                  <div class="icon-outlined"><i class="fa fa-upload"></i></div>
                  <h3 class="h4">Publikasi Project</h3>
                  <p>Project Maker dapat mengunggah projectnya di aplikasi <strong>U-Project</strong> untuk mencari donasi</p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="box-simple">
                  <div class="icon-outlined"><i class="fa fa-money"></i></div>
                  <h3 class="h4">Donasi</h3>
                  <p>User dapat memberikan donasi terhadap project-project yang ada di aplikasi <strong>U-Project</strong></p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="box-simple">
                  <div class="icon-outlined"><i class="fa fa-envelope"></i></div>
                  <h3 class="h4">Artikel</h3>
                  <p>Dalam aplikasi <strong>U-Project</strong> menyajikan beberapa artikel tentang teknologi, sosial, maupun ekonomi</p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="box-simple">
                  <div class="icon-outlined"><i class="fa fa-comment"></i></div>
                  <h3 class="h4">Tanggapan User</h3>
                  <p>User dapat memberikan tanggapan mereka terhadap aplikasi <strong>U-Project</strong> sebagai umpan balik terhadap aplikasi <strong>U-Project</strong></p>
                </div>
              </div>
            </div>
          </section>
          <section class="bar pt-0">
            <div class="row">
              <div class="col-md-12">
                <div class="heading text-center">
                  <h2>Input Tanggapan User</h2>
                </div>
              </div>
              <div class="col-md-12 mx-auto">
                <form action="<?= site_url('tanggapan_user/create_action') ?>" method="POST" enctype="multipart/form-data">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <textarea name="isi" id="message" class="form-control" style="height: 150px" placeholder="Tulis tanggapanmu di sini..."></textarea>
                      </div>
                    </div>
                    <div class="col-sm-12 text-center">
                      <input type="hidden" name="id_user" value="<?= $user ?>">
                      <input type="hidden" name="tanggal_pos" value="<?= $tanggal_pos ?>">
                      <button type="submit" class="btn btn-template-outlined"><i class="fa fa-envelope-o"></i> Kirim</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>
      </div>