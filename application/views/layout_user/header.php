
<div class="top-bar">
  <div class="container">
    <div class="row d-flex align-items-center">
      <div class="col-md-6 d-md-block d-none">
        <p>Aplikasi Urunan Project | <?= $this->session->userdata('id_user') ?></p>
      </div>
      <div class="col-md-6">
        <div class="d-flex justify-content-md-end justify-content-between">
          <ul class="list-inline contact-info d-block d-md-none">
            <li class="list-inline-item"><a href="#"><i class="fa fa-phone"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
          </ul>
          <div class="login">
            <?php if ($this->session->userdata('status') == '') { ?>
              <a href="#" data-toggle="modal" data-target="#login-modal" class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">Sign In</span></a>
              <a href="<?= base_url()?>index.php/user" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block">Sign Up</span></a>
            <?php } ?>
            <?php if ($this->session->userdata('status') == 'login_user') { ?>
              <a href="<?= base_url()?>index.php/user/profile" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block">Profile</span></a>
              <a href="<?= base_url()?>index.php/user/logout" class="signup-btn"><i class="fa fa-sign-out"></i><span class="d-none d-md-inline-block">Logout</span></a>
            <?php } ?>
          </div>
          <ul class="social-custom list-inline">
            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end head -->

<!-- Login Modal-->
<div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="login-modalLabel" class="modal-title">Masuk</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form action="<?= $aksi ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <input name="email" id="email" type="text" placeholder="email" class="form-control">
          </div>
          <div class="form-group">
            <input name="password" id="password_modal" type="password" placeholder="password" class="form-control">
          </div>
          <p class="text-center">
            <button name="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> <?= $login ?></button>
          </p>
        </form>
        <p class="text-center text-muted">Belum Punya Akun?</p>
        <p class="text-center text-muted"><a href="<?= base_url()?>index.php/user"><strong>Daftar Sekarang !</strong></a>! Mari berpartisipasi dengan memberikan donasi untuk project atau usaha yang ingin Anda bantu!</p>
      </div>
    </div>
  </div>
</div>
<!-- Login modal end-->

<!-- Navbar Start-->
<header class="nav-holder make-sticky">
  <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
    <div class="container"><a href="index.html" class="navbar-brand home"><img src="<?= base_url()?>assets/images/uproject.png" style="width: 275px; height: 80px;" alt="Universal logo" class="d-none d-md-inline-block"><img src="<?= base_url()?>assets/images/uproject.png" style="width: 275px; height: 80px;" alt="Universal logo" class="d-inline-block d-md-none"><span class="sr-only">Universal - go to homepage</span></a>
      <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
      <div id="navigation" class="navbar-collapse collapse">
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item <?php echo ($this->uri->segment(1) == 'project' && $this->uri->segment(2) == 'home') ? 'active' : ''; ?>"><a href="<?= base_url()?>index.php/project/home">Donasi <b class="caret"></b></a>
          </li>

          <li class="nav-item menu-large <?php echo ($this->uri->segment(1) == 'artikel') ? 'active' : ''; ?>"><a href="<?= base_url()?>index.php/artikel">Artikel<b class="caret"></b></a>
          </li>

          <li class="nav-item dropdown <?php echo ($this->uri->segment(1) == 'tanggapan_user') ? 'active' : ''; ?>"><a href="<?= base_url()?>index.php/tanggapan_user" data-toggle="dropdown" class="dropdown-toggle">Tanggapan User <b class="caret"></b></a>  
            <ul class="dropdown-menu">
              <?php if ($this->session->userdata('status') == 'login_user') { ?>
                <li class="dropdown-item"><a href="<?= base_url()?>index.php/tanggapan_user/create" class="nav-link">Upload Tanggapan User</a></li>
              <?php } ?>
              <li class="dropdown-item"><a href="<?= site_url('tanggapan_user')?>" class="nav-link">Data Tanggapan User</a></li>
            </ul>         
          </li>
          <?php if ($this->session->userdata('status') == 'login_user') { ?>
            <li class="nav-item dropdown <?php echo ($this->uri->segment(1) == 'project' && $this->uri->segment(2) != 'home') ? 'active' : ''; ?>"><a href="<?= base_url()?>index.php/site/project" data-toggle="dropdown" class="dropdown-toggle">Project <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-item"><a href="<?= base_url()?>index.php/project/upload" class="nav-link">Upload Project</a></li>
                <li class="dropdown-item"><a href="<?= site_url('project/project_user')?>" class="nav-link">Project Saya</a></li>
              </ul>
            </li>
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'donasi') ? 'active' : ''; ?>"><a href="<?= site_url('donasi/donasi_user') ?>">My Donation <b class="caret"></b></a>
            </li>
          <?php } ?>

         <!--  <li class="nav-item menu-large <?php echo ($this->uri->segment(1) == 'artikel') ? 'active' : ''; ?>"><a href="<?= base_url()?>index.php/artikel">About Us<b class="caret"></b></a>
          </li>
          <li class="nav-item menu-large <?php echo ($this->uri->segment(1) == 'artikel') ? 'active' : ''; ?>"><a href="<?= base_url()?>index.php/artikel">Contact<b class="caret"></b></a>
          </li> -->

        </ul>
      </div>
      
      <div id="search" class="collapse clearfix">
        <form role="search" class="navbar-form">
          <div class="input-group">
            <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
              <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button></span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>
      <!-- Navbar End