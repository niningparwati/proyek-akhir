  <header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url()?>index.php/Halaman_Admin/Dashboard" class="logo"  style="background-color: #212121 ;">
      <img src="<?php echo base_url()?>assets/images/u-project.png" style="width: 110px;">
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #212121 ">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php if ($foto_admin){ ?>
                <img src="<?php echo base_url()?>assets/admin/profile/<?= $foto_admin ?>" class="user-image" alt="User Image">
              <?php }else{ ?>
                <img src="<?php echo base_url()?>assets/admin/profile/user1.png" class="user-image" alt="User Image">
              <?php } ?>
              <span class="hidden-xs"><?= $nama_admin ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php if ($foto_admin){ ?>
                  <img src="<?php echo base_url()?>assets/admin/profile/<?= $foto_admin ?>" class="img-circle" alt="User Image">
                <?php }else{ ?>
                  <img src="<?php echo base_url()?>assets/admin/profile/user1.png" class="img-circle" alt="User Image">
                <?php } ?>
                <p>
                  <?= $nama_admin ?> - <?= $id_admin ?>
                  <small><?= $email_admin ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= $logout ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>