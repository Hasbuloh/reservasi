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

        <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
	      <div class="form-group">
          <label for="varchar" class="col-sm-2 label-control">No Kamar <?php echo form_error('no_kamar') ?></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="no_kamar" id="no_kamar" placeholder="No Kamar" value="<?php echo $no_kamar; ?>" required=""/>
          </div>
        </div>

	      <div class="form-group">
            <label for="varchar" class="col-sm-2 label-control">No Blok <?php echo form_error('no_blok') ?></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="no_blok" id="no_blok" placeholder="No Blok" value="<?php echo $no_blok; ?>" required=""/>
            </div>
        </div>

        <div class="form-group">
            <label for="varchar" class="col-sm-2 label-control">Harga Kamar <?php echo form_error('harga') ?></label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga Kamar" value="<?php echo $harga; ?>" required=""/>
            </div>
        </div>

        <div class="form-group">
          <label for="varchar" class="col-sm-2 label-control">Type Kamar</label>
          <div class="col-sm-10">
            <select name="type_kamar" id="type_kamar" class="form-control" required="">
              <?php foreach($type_kamar->result() as $item): ?>
                <option value="<?= $item->ID?>"><?= $item->nama ?></option>
              <?php endforeach;?>
            </select>
          </div>
        </div>

         <div class="form-group">
          <label for="varchar" class="col-sm-2 label-control">Kapasitas</label>
          <div class="col-sm-10">
            <select name="kapasitas" id="kapasitas" class="form-control" required="">
              <?php foreach($kapasitas->result() as $item): ?>
                <option value="<?= $item->ID?>"><?= $item->nama ?></option>
              <?php endforeach;?>
            </select>
          </div>
        </div>

         <div class="form-group">
          <label for="varchar" class="col-sm-2 label-control">Tempat Tidur</label>
          <div class="col-sm-10">
            <select name="tempat_tidur" id="tempat_tidur" class="form-control" required="">
              <?php foreach($type_kasur->result() as $item): ?>
                <option value="<?= $item->ID?>"><?= $item->nama ?></option>
              <?php endforeach;?>
            </select>
          </div>
        </div>

         <div class="form-group">
          <label for="varchar" class="col-sm-2 label-control">Kamar Mandi</label>
          <div class="col-sm-10">
            <select name="kamar_mandi" id="kamar_mandi" class="form-control" required="">
              <?php foreach($kamar_mandi->result() as $item): ?>
                <option value="<?= $item->ID?>"><?= $item->nama ?></option>
              <?php endforeach;?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="varchar" class="col-sm-2 label-control">Deskripsi Kamar<?php echo form_error('deskripsi')?></label>
          <div class="col-sm-10">
            <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi Kamar" value="<?php echo $deskripsi; ?>" required=""><?php echo $deskripsi; ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="varchar" class="col-sm-2 label-control">Keyword Pencarian<?php echo form_error('keyword')?></label>
          <div class="col-sm-10">
            <textarea class="form-control" name="keyword" id="keyword" placeholder="Keyword" value="<?php echo $keyword; ?>" required=""><?php echo $keyword; ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="varchar" class="col-sm-2 label-control">Gambar</label>
          <div class="col-sm-10">
            <input type="file" name="image" id="image" class="form-control" id="" placeholder="" required="">
          </div>
        </div>

	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
	    <div class="col-sm-10 col-sm-offset-2">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i><?php echo $button ?></button>
        <a href="<?php echo site_url('admin/tbm_kamar') ?>" class="btn btn-default"><i class="fa fa-close fa-fw"></i>Cancel</a>
      </div>
	</form>
    </div>
    <div class="box-footer">

    </div>
  </div>
</section>
