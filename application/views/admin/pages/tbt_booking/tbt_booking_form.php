<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tbt_booking <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Book <?php echo form_error('id_book') ?></label>
            <input type="text" class="form-control" name="id_book" id="id_book" placeholder="Id Book" value="<?php echo $id_book; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Kamar <?php echo form_error('id_kamar') ?></label>
            <input type="text" class="form-control" name="id_kamar" id="id_kamar" placeholder="Id Kamar" value="<?php echo $id_kamar; ?>" />
        </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tbt_booking') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>