<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dungingi | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" href="<?php echo base_url() . 'theme/images/faviconkota.png' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/bootstrap/css/bootstrap.min.css' ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/font-awesome/css/font-awesome.min.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/AdminLTE.min.css' ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/iCheck/square/blue.css' ?>">

  <style>
    .log {
      margin-top: -4px;
      font-size: 20px;
      font-style: italic;
      font-family: verdana;
    }
  </style>




</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div>
      <p><?php echo $this->session->flashdata('msg'); ?></p>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg"> <img width="80px;" src="<?php echo base_url() . 'theme/images/kota.png' ?>"></p>
      <h2 class="text-center log">Kecamatan Dungingi</h2>
      <hr />


      <form action="<?php echo site_url() . 'superadmin/login/auth' ?>" method="post">

        <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <hr />
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <div class="col-xs-6">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <br>
          <!-- /.col -->
          <div class="form-group has-feedback">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->
      <hr />
      <p>
        <center>Copyright <?php echo date('Y'); ?> Dungingi <br /> </center>
      </p>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url() . 'assets/plugins/jQuery/jquery-2.2.3.min.js' ?>"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url() . 'assets/plugins/iCheck/icheck.min.js' ?>"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '30%' // optional
      });
    });
  </script>
</body>

</html>