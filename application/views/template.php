<?php
if (!function_exists('generatedBreadcrumb')) {

	function generateBreadcrumb() {
		$ci = &get_instance();
		$i = 1;
		$uri = $ci->uri->segment($i);
		$link = '';

		while ($uri != '') {
			$prep_link = '';
			for ($j = 1; $j <= $i; $j++) {
				$prep_link .= $ci->uri->segment($j);
			}

			if ($ci->uri->segment($i + 1) == '') {
				$link .= '<li>';
				$link .=  ucwords(str_replace('_', ' ', $ci->uri->segment($i))) . '</li>';
			} else {
				$link .= '<li>';
				$link .= ucwords(str_replace('_', ' ', $ci->uri->segment($i))) . '<span class="divider"></span></li>';
			}

			$i++;
			$uri = $ci->uri->segment($i);
		}
		$link .= '';
		return $link;
	}

}
$link = generateBreadcrumb();

$data = array(
	'judul'         => 'Purchasing App',
	'mini_judul'	=> 'MP',
	'header_judul'	=> 'PT Manunggal Perkasa',
	'nama_user'     => $this->session->userdata('nama'),
	'icon'          => base_url('assets/images/manunggal.jpg'),
	'id_user'       => $this->session->userdata('id_user')
);
?>
<style type="text/css">
	.select2-container {
		width: 100% !important;
		padding: 0;
	}
</style>
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
	<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/dist/css/skins/_all-skins.min.css">
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- Date time Picker -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/bower_components/select2/dist/css/select2.min.css">
	<!-- file upload -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/fileUpload/css/file-upload.css">
	<!--Summernote -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/summernote/summernote.css" >
	<!--NotifCenter -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/notifcenter/notifcenter.css" >
	<!--MaterialSwitch -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/materialswitch/materialswitch.css" >
	<!--Material Datetimepicker -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/material-datetimepicker/css/bootstrap-material-datetimepicker.css" >
	<!--Lightbox gallery -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/lightbox-master/dist/ekko-lightbox.css" >
	<!--Bootstrap Toggle-->
	<link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap-toggle/css/bootstrap-toggle.min.css" >
	<!-- jQuery 3 -->
	<script src="<?= base_url() ?>assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
	<style>
		[class^='select2'] {
			border-radius: 0px !important;
		}
		.swal2-popup {
			font-size: 1.6rem !important;
		}
	</style>
	
</head>

<body class="hold-transition skin-green-light sidebar-mini sidebar-collapse fixed">
	<div class="wrapper">

		<!-- Header -->
		<?php $this->load->view('layout/header', $data); ?>
		<!-- End Header -->

		<!-- Sidebar -->
		<?php $this->load->view('layout/sidebar', $data); ?>
		<!-- End Sidebar -->

		<!-- Content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<?php 
					$segment = str_replace('_', ' ', $this->uri->segment(1));
					echo ucwords($segment); 
					?>
				</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
					</li>

					<?php
					if ($this->uri->segment(1) != 'dashboard') {
						echo $link;
					}
					?>
				</ol>
			</section>
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
			<!-- Main content -->
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
	<script src="<?= base_url() ?>assets/adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<!-- Bootstrap 3.3.7 -->
	<script src="<?= base_url() ?>assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="<?= base_url() ?>assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>assets/adminlte/dist/js/adminlte.min.js"></script>
	<!-- Sparkline -->
	<script src="<?= base_url() ?>assets/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	
	<!-- daterangepicker -->
	<script src="<?= base_url() ?>assets/adminlte/bower_components/moment/min/moment.min.js"></script>
	<script src="<?= base_url() ?>assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- datepicker -->
	<script src="<?= base_url() ?>assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<!-- DataTables -->
	<script src="<?= base_url() ?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<!-- File Upload -->
	<script type="text/javascript" src="<?= base_url(); ?>assets/adminlte/plugins/fileUpload/js/fileinput.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/adminlte/plugins/fileUpload/js/file-upload.js"></script>
	<!-- Summernote -->
	<script src="<?php echo base_url() ?>assets/adminlte/plugins/summernote/summernote.js"></script>
	<!-- Notifcenter -->
	<script src="<?php echo base_url() ?>assets/adminlte/plugins/notifcenter/notifcenter.js"></script>
	<!-- Sweetalert -->
	<script src="<?= base_url() ?>assets/sweetalert/dist/sweetalert2.all.min.js"></script>
	<script src="<?= base_url() ?>assets/js/sweetalert.js"></script>
	<!-- Lightbox gallery -->
	<script src="<?php echo base_url() ?>assets/lightbox-master/dist/ekko-lightbox.min.js"></script>
	<!-- Bootstrap Toogle -->
	<script src="<?php echo base_url() ?>assets/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
	<!-- Datetimepicker -->
	<script src="<?php echo base_url() ?>assets/adminlte/plugins/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<!-- material datetimepicker -->
	<script src="<?php echo base_url() ?>assets/material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.price_format.2.0.js"></script>
	<script src="<?php echo base_url() ?>assets/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script type="text/javascript">

	</script>
	<script type="text/javascript">
		 //Date range picker
		 $('#reservation').daterangepicker()
		 $('.uang').priceFormat({
		 	prefix: 'Rp  ',
		 	thousandsSeparator: '.',
		 	centsLimit: 0
		 });
		</script>
		<!-- Moment Js Local ID -->
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/locale/id.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function () {
				$('.datetimepicker').bootstrapMaterialDatePicker({ format : 'YYYY-MM-DD HH:mm', lang: 'id' });
			});
		</script>
		<script>
			$(document).ready(function () {
				$('.summernote').summernote({

					height: 200, // set editor height
					minHeight: null, // set minimum height of editor
					maxHeight: null, // set maximum height of editor
					focus: true                  // set focus to editable area after initializing summernote
				});

			});
		</script>
		<!-- Select2 -->
		<script src="<?php echo base_url() ?>assets/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$(".select2").select2({
					placeholder: "Pilih",
				});

			});
		</script>
		<script>
			//Date picker
			$('.datepicker').datepicker({
				autoclose: true,
			});
		</script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?php echo base_url() ?>assets/adminlte/dist/js/demo.js"></script>
	</body>
	</html>