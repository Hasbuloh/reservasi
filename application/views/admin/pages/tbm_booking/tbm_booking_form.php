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
        <h2 style="margin-top:0px">Tbm_booking <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="timestamp">Date <?php echo form_error('date') ?></label>
            <input type="text" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo $date; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Booking Name <?php echo form_error('booking_name') ?></label>
            <input type="text" class="form-control" name="booking_name" id="booking_name" placeholder="Booking Name" value="<?php echo $booking_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Booking Date <?php echo form_error('booking_date') ?></label>
            <input type="text" class="form-control" name="booking_date" id="booking_date" placeholder="Booking Date" value="<?php echo $booking_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Duration Start <?php echo form_error('duration_start') ?></label>
            <input type="text" class="form-control" name="duration_start" id="duration_start" placeholder="Duration Start" value="<?php echo $duration_start; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Duration End <?php echo form_error('duration_end') ?></label>
            <input type="text" class="form-control" name="duration_end" id="duration_end" placeholder="Duration End" value="<?php echo $duration_end; ?>" />
        </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tbm_booking') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>