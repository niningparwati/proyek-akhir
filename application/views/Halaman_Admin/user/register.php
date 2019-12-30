<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">NEW ACCOUNT / SIGN IN</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">New Account / Sign In</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="box">
          <h2 class="text-uppercase">New account</h2>
          <p class="lead">Belum melakukan registrasi?</p>
          <p class="text-muted">Dengan melakukan registrasi, kamu bisa mengunggah project kamu jika membutuhkan bantuan donasi finansial. Selain itu, kamu juga bisa ikut berpartisipasi untuk melakukan donasi terhadap suatu project yang sedang berjalan.</p>
          <hr>
          <form action="<?= $action; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="name-login">Name</label>
              <input name="nama" id="nama" type="text" class="form-control" required>
              <?= form_error('nama') ?>
            </div>
            <div class="form-group">
              <label for="email-login">Email</label>
              <input name="email" id="email" type="email" class="form-control" required >
              <?= form_error('email') ?>
            </div>
            <div class="form-group">
              <label for="password-login">Password</label>
              <input name="password" id="password" type="password" class="form-control" required>
              <?= form_error('password') ?>
            </div>
            <div class="form-group">
              <div class="col-12">
                <?php echo $captcha // tampilkan recaptcha ?>
             </div>
           </div>
           <div class="text-center">
            <input type="hidden" name="id_user" value="<?= $id_user ?>">
            <button type="submit" name="submit" class="btn btn-template-outlined"><i class="fa fa-user-md"></i> <?= $button ?></button>
          </div>
        </form>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="box">
        <h2 class="text-uppercase">Login</h2>
        <p class="lead">Sudah mempunyai akun?</p>
        <p class="text-muted">Silahkan Login menggunakan email dan password yang telah Anda daftarkan!</p>
        <hr>
        <form action="<?= $aksi ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="email">Email</label>
            <input name="email" id="email" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input name="password" id="password" type="password" class="form-control">
          </div>
          <div class="text-center">
            <button type="submit" name="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> <?= $login ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>