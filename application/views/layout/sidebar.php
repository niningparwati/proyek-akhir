<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $icon; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $nama_user ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU UTAMA</li>
            <li class="<?php echo ($this->uri->segment(1) == 'dashboard' ) ? 'active' : ''; ?>">
                <a href="<?php echo site_url('dashboard') ?>">
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
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('user/user_all')?>"><i class="fa fa-circle-o "></i> Data User</a></li>
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('user/project_maker') ?>"><i class="fa fa-circle-o "></i> Project Maker</a></li>
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="#"><i class="fa fa-circle-o "></i> Donatur</a></li>             
                </ul>
            </li>
            <li class="treeview <?php echo ($this->uri->segment(1) == 'master1' || $this->uri->segment(1) == 'master2' || $this->uri->segment(1) == 'master3') ? 'active open' : ''; ?>">
                <a href="#">
                    <i class="glyphicon glyphicon-user"></i> <span>Project</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('project/get_all')?>"><i class="fa fa-circle-o "></i> Semua Project</a></li>
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('project/siap_acc')?>"><i class="fa fa-circle-o "></i> Project Siap Approve</a></li>
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('project/project_berjalan')?>"><i class="fa fa-circle-o "></i> Project Berjalan</a></li>
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('project/project_selesai')?>"><i class="fa fa-circle-o "></i> Project Selesai</a></li>
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('project/project_ditolak')?>"><i class="fa fa-circle-o "></i> Project Ditolak</a></li>                
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
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?php echo site_url('kategori_artikel/create') ?>"><i class="fa fa-circle-o "></i> Input Artikel</a></li>
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('kategori_artikel/read') ?>"><i class="fa fa-circle-o "></i> Data Kategori Artikel</a></li>           
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
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?php echo site_url('artikel/create') ?>"><i class="fa fa-circle-o "></i> Input Artikel</a></li>
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('artikel/artikel_pending') ?>"><i class="fa fa-circle-o "></i> Artikel Pending</a></li>
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('artikel/artikel_berjalan') ?>"><i class="fa fa-circle-o "></i> Artikel Publish</a></li> 
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('artikel/artikel_history') ?>"><i class="fa fa-circle-o "></i> History Artikel</a></li>            
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
                    <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="<?= site_url('tanggapan_user/list') ?>"><i class="fa fa-circle-o "></i> Data Tanggapan User</a></li>
                    <!-- <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a href="#"><i class="fa fa-circle-o "></i> Tanggapan User Publish</a></li>  -->            
                </ul>
            </li>
            
        </ul>
    </section>
</aside>