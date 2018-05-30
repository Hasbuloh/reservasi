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
  <div class="box">
    <div class="box-header with-border">
    <h2 style="margin-top:0px">Kamar <?php echo $button ?></h2>
    </div>   
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
    </div>
    <div class="box-body">

        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">No Kamar <?php echo form_error('no_kamar') ?></label>
            <input type="text" class="form-control" name="no_kamar" id="no_kamar" placeholder="No Kamar" value="<?php echo $no_kamar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Blok <?php echo form_error('no_blok') ?></label>
            <input type="text" class="form-control" name="no_blok" id="no_blok" placeholder="No Blok" value="<?php echo $no_blok; ?>" />
        </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/tbm_kamar') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
  </div>

</section>