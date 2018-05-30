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
        <h2 style="margin-top:0px">Tbm_booking Read</h2>
        <table class="table">
	    <tr><td>Date</td><td><?php echo $date; ?></td></tr>
	    <tr><td>Booking Name</td><td><?php echo $booking_name; ?></td></tr>
	    <tr><td>Booking Date</td><td><?php echo $booking_date; ?></td></tr>
	    <tr><td>Duration Start</td><td><?php echo $duration_start; ?></td></tr>
	    <tr><td>Duration End</td><td><?php echo $duration_end; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tbm_booking') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>