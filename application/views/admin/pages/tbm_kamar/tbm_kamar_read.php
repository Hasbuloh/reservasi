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
        <h2 style="margin-top:0px">Tbm_kamar Read</h2>
        <table class="table">
	    <tr><td>No Kamar</td><td><?php echo $no_kamar; ?></td></tr>
	    <tr><td>No Blok</td><td><?php echo $no_blok; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tbm_kamar') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>