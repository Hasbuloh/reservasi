<section class="content-header">
      <h1>
        Kelola Kamar
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kelola Kamar</li>
      </ol>
</section>
<section class="content">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

  <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Detail Kamar</h3>
    </div>
    <div class="box-body">
        <table class="table">
	    <tr><td>No Kamar</td><td><?php echo $no_kamar; ?></td></tr>
	    <tr><td>No Blok</td><td><?php echo $no_blok; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td>Keyword</td><td><?php echo $keyword; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/tbm_kamar') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
</div>
</section>
