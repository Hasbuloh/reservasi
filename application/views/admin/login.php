<?php $this->load->view('admin/_component/head')?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <?php
      if (validation_errors()):
    ?>
    <div class="alert alert-warning">
      <?= validation_errors(); ?>
    </div>
    <?php
      elseif ($error != null):
    ?>
    <div class="alert alert-danger">
      <?= $error ?>
    </div>
    <?php
      endif;
    ?>
    <form action="<?= base_url('admin/auth') ?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="username" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
</body>
<?php $this->load->view('admin/_component/foot')?>
