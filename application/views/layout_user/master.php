<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>U-Project</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= base_url()?>assets/user/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?= base_url()?>assets/user/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="<?= base_url()?>assets/user/vendor/bootstrap-select/css/bootstrap-select.min.css">
    <!-- owl carousel-->
    <link rel="stylesheet" href="<?= base_url()?>assets/user/vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/user/vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= base_url()?>assets/user/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= base_url()?>assets/user/css/custom.css">
    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="<?= base_url()?>assets/user/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= base_url()?>assets/user/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url()?>assets/user/img/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url()?>assets/user/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url()?>assets/user/img/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url()?>assets/user/img/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url()?>assets/user/img/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url()?>assets/user/img/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url()?>assets/user/img/apple-touch-icon-152x152.png">

    <?php 
    //echo $script_captcha; 
    // javascript recaptcha ?>

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body>
        <div id="all">

            <!--Sweet Alert -->
            <?php if($this->session->flashdata('success')) { ?>
                <div class="success-flash" data-success="<?= $this->session->flashdata('success') ?>"></div>
            <?php } else if ($this->session->flashdata('error')) { ?>
                <div class="error-flash" data-error="<?= $this->session->flashdata('error') ?>"></div>
            <?php } ?>
            <!-- End Sweet Alert -->
            <!-- Header -->
            <?php $this->load->view('layout_user/header'); ?>
            <!-- End Header -->

            <!-- Content -->
            <?php echo $contents; ?>
            <!-- End Content-->

            <!-- Footer -->
            <?php $this->load->view('layout_user/footer'); ?>
            <!-- End Footer -->
        </div>
        <!-- Javascript files-->
        <script src="<?= base_url()?>assets/user/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url()?>assets/user/vendor/popper.js/umd/popper.min.js"> </script>
        <script src="<?= base_url()?>assets/user/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url()?>assets/user/vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="<?= base_url()?>assets/user/vendor/waypoints/lib/jquery.waypoints.min.js"> </script>
        <script src="<?= base_url()?>assets/user/vendor/jquery.counterup/jquery.counterup.min.js"> </script>
        <script src="<?= base_url()?>assets/user/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="<?= base_url()?>assets/user/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
        <script src="<?= base_url()?>assets/user/js/jquery.parallax-1.1.3.js"></script>
        <script src="<?= base_url()?>assets/user/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
        <script src="<?= base_url()?>assets/user/vendor/jquery.scrollto/jquery.scrollTo.min.js"></script>
        <script src="<?= base_url()?>assets/user/js/front.js"></script>
        <!-- Sweetalert -->
        <script src="<?= base_url() ?>assets/plugins/sweetalert/dist/sweetalert2.all.min.js"></script>
        <script src="<?= base_url() ?>assets/js/sweetalert.js"></script>
    </body>
</html>