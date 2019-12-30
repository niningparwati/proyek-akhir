  <!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar"  style="background-color: #000000">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
               <?php if ($foto_admin){ ?>
                <img src="<?php echo base_url()?>assets/admin/profile/<?= $foto_admin ?>" class="img-circle" alt="User Image">
              <?php }else{ ?>
                <img src="<?php echo base_url()?>assets/admin/profile/user1.png" class="img-circle" alt="User Image">
              <?php } ?>
            </div>
            <div class="pull-left info">
                <p><?= $nama_admin ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU UTAMA</li>
            <li class="<?php echo ($this->uri->segment(1) == 'dashboard' ) ? 'active' : ''; ?>">
                <a href="<?php echo site_url('Halaman_Admin/Dashboard') ?>">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview <?php echo ($this->uri->segment(1) == 'master1' || $this->uri->segment(1) == 'master2' || $this->uri->segment(1) == 'master3') ? 'active open' : ''; ?>">
                <a href="#">
                    <i class="glyphicon glyphicon-user"></i> <span>User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('Halaman_Admin/User')?>"><i class="fa fa-circle-o "></i> Data User</a></li>
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('Halaman_Admin/User/projectMaker') ?>"><i class="fa fa-circle-o "></i> Pemilik Usaha</a></li>
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('Halaman_Admin/User/Donatur') ?>"><i class="fa fa-circle-o "></i> Donatur</a></li>             
                </ul>
            </li>
            <li class="treeview <?php echo ($this->uri->segment(1) == 'master1' || $this->uri->segment(1) == 'master2' || $this->uri->segment(1) == 'master3') ? 'active open' : ''; ?>">
                <a href="#">
                    <i class="glyphicon glyphicon-user"></i> <span>UMKM</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('Halaman_Admin/Project')?>"><i class="fa fa-circle-o "></i> Semua UMKM</a></li>
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('Halaman_Admin/Project/siapApprove')?>"><i class="fa fa-circle-o "></i> UMKM Siap Approve</a></li>
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('Halaman_Admin/Project/projectBerjalan')?>"><i class="fa fa-circle-o "></i> UMKM Berjalan</a></li>
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('Halaman_Admin/Project/projectSelesai')?>"><i class="fa fa-circle-o "></i> UMKM Selesai</a></li>
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('Halaman_Admin/Project/projectDitolak')?>"><i class="fa fa-circle-o "></i> UMKM Ditolak</a></li>                
                </ul>
            </li>
            <li class="treeview <?php echo ($this->uri->segment(1) == 'master1' || $this->uri->segment(1) == 'master2' || $this->uri->segment(1) == 'master3') ? 'active open' : ''; ?>">
                <a href="#">
                    <i class="glyphicon glyphicon-briefcase"></i> <span>Kategori Artikel</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('Halaman_Admin/Kategori_Artikel') ?>"><i class="fa fa-circle-o "></i> Data Kategori Artikel</a></li>           
                </ul>
            </li>
            <li class="treeview <?php echo ($this->uri->segment(1) == 'master1' || $this->uri->segment(1) == 'master2' || $this->uri->segment(1) == 'master3') ? 'active open' : ''; ?>">
                <a href="#">
                    <i class="glyphicon glyphicon-briefcase"></i> <span>Artikel</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?php echo site_url('Halaman_Admin/Artikel') ?>"><i class="fa fa-circle-o "></i> Data Artikel</a></li>           
                </ul>
            </li>
            <li class="treeview <?php echo ($this->uri->segment(1) == 'master1' || $this->uri->segment(1) == 'master2' || $this->uri->segment(1) == 'master3') ? 'active open' : ''; ?>">
                <a href="#">
                    <i class="glyphicon glyphicon-comment"></i> <span>Tanggapan User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('Halaman_Admin/Tanggapan_User') ?>"><i class="fa fa-circle-o "></i> Data Tanggapan User</a></li>
                    <!-- <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="#"><i class="fa fa-circle-o "></i> Tanggapan User Publish</a></li>  -->            
                </ul>
            </li>
            
        </ul>
    </section>
</aside>
