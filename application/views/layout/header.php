<style>
    .center-navbar{
      display: block; 
      text-align: center; 
      color: white; 
      padding: 15px; 
    }
</style>
<header class="main-header">
    <!-- Logo -->
    <a href="<?= site_url('dashboard'); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="<?= base_url()?>assets/images/uproject.png"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="<?= base_url()?>assets/images/uproject.png"></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">       
                <!-- User Account: style can be found in dropdown.less -->
               <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $icon; ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $nama_user; ?> <i class="fa fa-caret-down"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $icon; ?>" class="img-circle" alt="User Image">
                            <p>
                                <?= $nama_user; ?>
                                <small><?= $header_judul; ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= site_url('dashboard/change_password') ?>" class="btn btn-warning btn-flat">Change Password</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= site_url('login/logout') ?>" class="btn btn-danger btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="center-navbar"><b><?= $header_judul ?></b></div>
    </nav>
</header>

