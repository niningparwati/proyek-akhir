<?php 
	$data = array(
	    'judul'         => 'U-Project',
	    'mini_judul'	=> 'Aplikasi U-Project',
	    'header_judul'	=> 'Aplikasi Urunan Project | U-PROJECT',
	    // 'nama_user'     => $this->session->userdata('nama'),
	    'nama_user'     => $this->session->userdata('email'),
	    'icon'          => base_url('assets/images/telu.jpg'),
	    'id_user'       => $this->session->userdata('id_user')
	);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <link rel="icon" href="<?= $data['icon']; ?>" type="image/jpeg">
	    <title><?= $data['judul'];  ?></title>
	    <!-- Tell the browser to be responsive to screen width -->
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	    <!-- Bootstrap 3.3.7 -->
	    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	    <!-- Font Awesome -->
	    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	    <!-- Ionicons -->
	    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
	    <!-- Theme style -->
	    <link rel="stylesheet" href="<?= base_url() ?>assets/css/AdminLTE.min.css">
	    <!-- AdminLTE Skins. -->
	    <link rel="stylesheet" href="<?= base_url() ?>assets/css/skins/_all-skins.min.css">
	    <!-- Google Font -->
	    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	    <!-- Date Picker -->
	    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	    <!-- Daterange picker -->
	    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	    <!-- DataTables -->
	    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/css/dataTables.bootstrap.min.css">
	    <!-- Select2 -->
	    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/select2/dist/css/select2.min.css">
	    <!--Summernote -->
	    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote.css" >
	    <!--NotifCenter -->
	    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/notifcenter/notifcenter.css" >
	    <!--MaterialSwitch -->
	    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/materialswitch/materialswitch.css" >
	    <!-- file upload -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fileUpload/css/fileinput.css">
	    <!--Lightbox gallery -->
	    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/lightbox-master/dist/ekko-lightbox.css" >
	    <!-- Alacarte Custom CSS -->
	    <link rel="stylesheet" href="<?= base_url() ?>assets/css/alacarte.css" >
	    <!-- jQuery 3 -->
	    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	</head>
	<body class="hold-transition skin-green-light sidebar-mini fixed">
		<div class="wrapper">

			<!-- Header -->
	        <?php $this->load->view('layout/header', $data); ?>
	        <!-- End Header -->

	         <!-- Sidebar -->
	        <?php $this->load->view('layout/sidebar', $data); ?>
	        <!-- End Sidebar -->

	        <!-- Content -->
	        <div class="content-wrapper">
				<?php $this->load->view('layout/breadcrumb', $data); ?>

	        	<?php if ($this->session->userdata('message')) { ?>
	                <div id="NotificationContainer">
	                    <div id="NotificationMessage">
	                        <div id="AppIcon"><img src="http://icons.iconarchive.com/icons/custom-icon-design/mono-general-1/96/information-icon.png" /></div>
	                        <div id="AppMessage">
	                            <h1>Notifikasi</h1>
	                            <span><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></span>
	                        </div>
	                    </div>
	                </div>                  
	            <?php } ?>
	             <!--Sweet Alert -->
	            <?php if($this->session->flashdata('success')) { ?>
	                <div class="success-flash" data-success="<?= $this->session->flashdata('success') ?>"></div>
	            <?php } else if ($this->session->flashdata('error')) { ?>
	                <div class="error-flash" data-error="<?= $this->session->flashdata('error') ?>"></div>
	            <?php } ?>
	            <!-- End Sweet Alert -->

	            <section class="content">
	                <?php echo $contents; ?>      
	            </section>
	        </div>
	        <!-- End Content -->

	        <!-- Footer -->
	        <?php $this->load->view('layout/footer', $data); ?>
	        <!-- End Footer -->
		</div>

		<!-- jQuery UI 1.11.4 -->
	    <script src="<?= base_url() ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
	    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	    <!-- Bootstrap 3.3.7 -->
	    <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	    <!-- FastClick -->
	    <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
	    <!-- AdminLTE App -->
	    <script src="<?= base_url() ?>assets/js/adminlte.min.js"></script>
	    <!-- Sparkline -->
	    <script src="<?= base_url() ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	    <!-- daterangepicker -->
	    <script src="<?= base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
	    <script src="<?= base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	    <!-- datepicker -->
	    <script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	    <!-- DataTables -->
	    <script src="<?= base_url() ?>assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
	    <script src="<?= base_url() ?>assets/plugins/datatables/js/dataTables.bootstrap.min.js"></script>
	    <!-- File Upload -->
	    <script type="text/javascript" src="<?= base_url(); ?>assets/plugins/fileUpload/js/fileinput.js"></script>
	    <!-- Summernote -->
	    <script src="<?php echo base_url() ?>assets/plugins/summernote/summernote.js"></script>
	    <!-- Notifcenter -->
	    <script src="<?php echo base_url() ?>assets/plugins/notifcenter/notifcenter.js"></script>
	    <!-- Sweetalert -->
	    <script src="<?= base_url() ?>assets/plugins/sweetalert/dist/sweetalert2.all.min.js"></script>
	    <script src="<?= base_url() ?>assets/js/sweetalert.js"></script>
	    <!-- Lightbox gallery -->
	    <script src="<?php echo base_url() ?>assets/plugins/lightbox-master/dist/ekko-lightbox.min.js"></script>
	    <!-- Moment Js Local ID -->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/locale/id.js" type="text/javascript"></script>
	    <!-- Select2 -->
	    <script src="<?php echo base_url() ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
	    <!-- Price Format -->
	    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.price_format.2.0.js"></script>
	    <!-- material datetimepicker -->
		<script src="<?php echo base_url() ?>assets/plugins/material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
        <!-- Alacarte Custom -->
        <script src="<?php echo base_url() ?>assets/js/alacarte.js"></script>
	</body>
</html>