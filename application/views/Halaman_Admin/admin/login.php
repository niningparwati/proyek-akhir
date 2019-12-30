<!doctype html>
<html lang="en" class="no-focus">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <title><?= $judul; ?></title>
  <link rel="icon" href="<?= $logo; ?>" type="image/png"/>
  <link rel="stylesheet" id="css-main" href="<?php echo base_url()?>assets/themes/assets/css/codebasic.css">
  <style type="text/css">
    .form-material > .form-control {
      background-color: #dcdcdc;
      padding-left: 8px;
      padding-right: 8px;
      border: 1px solid #dcdcdc;
    }
    .form-material > .form-control:focus {
      background-color: #dcdcdc;
      box-shadow: 0px 0px 0px #dcdcdc;
      border: 1px solid #dcdcdc;
    }
    .form-material > label {
      left: 8px;
    }
    .form-material.floating.open > label {
      left: 0;
    }
    .is-invalid .form-material > .form-control {
      box-shadow: 0 0px 0 #ef5350;
      border: 1px solid #ef5350;
    }
    .is-invalid .form-material > .form-control:focus {
      box-shadow: 0 0px 0 #ef5350;
      border: 1px solid #ef5350;
    }
    .btn, .custom-checkbox{
      cursor: pointer;
    }
    .custom-checkbox {
      margin-top: 5px;
    }
    .form-group {
      margin-bottom: 0
    }
    .bg-logo {

      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      background-position-y: 100px; 
    }
    .content-full {
      background: rgba(255, 255, 255, 0.7);
    }
  </style>
</head>
<body>
  <div id="page-container" class="main-content-boxed">
    <main id="main-container">
      <div class="bg-image" style="background-image: url('<?php echo base_url()?>assets/images/umkm.png');">
        <div class="row mx-0 bg-black-op">
          <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
            <div class="p-30 invisible" data-toggle="appear">
            </div>
          </div>
          <div class="hero-static col-md-6 col-xl-4 bg-logo d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
            <div class="content content-full">
              <div>
                <center><img src="<?= base_url()?>assets/images/uproject.png" style="width: 80%"></center><br>
              </div>
              <div class="px-30 py-10">
                <hr>
                <center><h3>Login Pengelola</h3></center>
              </div>
              <form class="js-validation-signin px-30" action="<?= $action ?>" method="post" autocomplete="off">
                <div class="form-group row">
                  <div class="col-12">
                    <div class="form-material floating">
                      <input type="text" class="form-control" name="email" required oninvalid="this.setCustomValidity('Gak Boleh Kosong Bro..')" oninput="setCustomValidity('')">
                      <label for="email">Email <span class="text-danger">*</span></label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-12">
                    <div class="form-material floating">
                      <input type="password" class="form-control" id="password" name="password">
                      <label for="password">Password <span class="text-danger">*</span></label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-12">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="show-password" name="show-password">
                      <span class="custom-control-indicator"></span>
                      <span class="custom-control-description text-muted">Show Password</span>
                    </label>
                  </div>
                </div>
                <div class="form-group row">
                </div>
                <br />
                <div class="form-group">
                  <button type="submit" name="masuk" class="btn btn-sm btn-hero btn-alt-primary">
                    <i class="si si-login mr-10"></i> Login
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <script src="<?php echo base_url()?>assets/themes/assets/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/themes/assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url()?>assets/themes/assets/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>assets/themes/assets/js/core/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url()?>assets/themes/assets/js/core/jquery.scrollLock.min.js"></script>
  <script src="<?php echo base_url()?>assets/themes/assets/js/core/jquery.appear.min.js"></script>
  <script src="<?php echo base_url()?>assets/themes/assets/js/codebasic.js"></script>
  <script src="<?php echo base_url()?>assets/themes/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?php echo base_url()?>assets/themes/assets/js/pages/op_auth_signin.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $("#show-password").click(function () {
        if ($("#password").attr("type")=="password") {
          $("#password").attr("type", "text"); 
        } else {
          $("#password").attr("type", "password");
        }
      });
    });
  </script>
</body>
</html>