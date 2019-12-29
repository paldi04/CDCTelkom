<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit Slide Show</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <div id="alert_update"></div>
  <form role="form" id="form-update-slide-show" enctype='multipart/form-data' method="POST" action='<?= base_url() ?>/Tampilan/update_slide_show'>
    <div class="card-body">
      <input type="hidden" name="id" value="<?= $tampil_id ?>">
  <div class="form-group">
    <label for="gambar">Gambar</label>
    <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Gambar">
  </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Edit Data</button>
    </div>
  </form>
</div>
<script type="text/javascript">

//UPDATE
$('#form-update-slide-show').submit(function(e) {
  var form = $(this)[0];
  var data = new FormData(form);
  $('#alert').html('');

  $.ajax({
    method: 'POST',
    enctype: 'multipart/form-data',
    data: data,
    url: '<?php echo base_url('Tampilan/update_slide_show'); ?>',
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000
  })
  .done(function(data) {
    var out = jQuery.parseJSON(data);

    if (out.success) {
      $('#update-slide_show').modal('hide');
      table.ajax.reload();
    } else {
      // document.getElementById("form-tambah-tampilan").reset();
      // $('#update-slide_show').modal('hide');
      $('#alert_update').html(out.msg);
      // effect_msg();
    }
  })

  e.preventDefault();
});
</script>
