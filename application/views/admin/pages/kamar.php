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
    <h3 class="box-title">
      <a href="#" id="tambah" class="btn btn-link">Create</a>
    </h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary">
        <i class="fa fa-list fa-fw"></i> Data Kamar
      </span>
    </div>
    <div class="box-body">
    <table class="table table-hover table-bordered table-condensed" id="example1">
      <thead>
        <tr>
          <th>No</th>
          <th>No.Kamar</th>
          <th>Harga</th>
          <th>Delete</th>
          <th>Update</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
    </div>
  </div>

</section>

<!-- modal start here -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Modal Tambah Kamar</h4>
        </div>
        <div class="modal-body">
            <form role="form" method="post" id="form-add">
              <div class="form-group">
                <label for="nomor">No.Kamar</label>
                <input type="text" id="nomor" name="nomor" placeholder="Nomor Kamar" required="" class="form-control">
              </div>
              <div class="form-group">
                <label for="nomor">Harga</label>
                <input type="number" id="harga" name="harga" placeholder="Harga Kamar" required="" class="form-control">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
                    </form>
        </div>
      </div>
    </div>
  </div>
<!-- modal end here -->

<script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  var table;

  $(function () {
    table = $('#example1').DataTable({
      ajax: '<?= base_url('admin/C_Kamar/list')?>',
      processing: true,
      columns: [
        null,
        null,
        {addClass: 'nominal'},
        null,
        null
      ]
    })
  })

  function reload_table() {
    table.ajax.reload(null, false);
  }

  function hapus(id) {
    $.ajax({
      url: '<?= base_url('admin/C_Kamar/delete')?>',
      data: {'id': id},
      type: 'POST',
      dataType: 'JSON',
      success: function(response) {
        if (response.status) {
          reload_table();
        }
      }
    })
  }

  $('#tambah').on('click',function(event){
      event.preventDefault();
      $('#modal-add').modal('show');
      $.ajax({
        url: '<?= base_url('admin/C_Kamar/generate_nomor')?>',
        type: 'GET',
        dataType:'JSON',
        success: function(response) {
            $('#nomor').val(response.nomor);
        }
    })
  })

  $('#form-add').on('submit',function(event){
    var formData = $('#form-add').serialize();
    event.preventDefault();
    // console.log(formData);
    $.ajax({
      url: '<?= base_url('admin/C_Kamar/add')?>',
      data: formData,
      type: 'POST',
      dataType: 'JSON',
      success: function(response) {
        if (response.status) {
          reload_table();
          $('#modal-add').modal('hide');
        }
      }
    })
  })
</script>
