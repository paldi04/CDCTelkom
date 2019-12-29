<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit Testimoni</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" id="form-update-testimoni" enctype='multipart/form-data' method="POST" action='<?= base_url() ?>Tampilan/update_testimoni'>
    <div class="card-body">

    <input type="hidden" name="id" value="<?= $tampil_id ?>">

  <div class="form-group">
    <label for="nama">nama</label>
    <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" value="<?= $data['nama'] ?>">
  </div>

  <div class="form-group">
    <label for="pesan_kesan_testimoni">pesan kesan testimoni</label>
    <input type="text" class="form-control" id="pesan_kesan_testimoni" placeholder="pesan kesan testimoni" name="pesan_kesan_testimoni" value="<?= $data['pesan_kesan_testimoni'] ?>">
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
$('#form-update-testimoni').submit(function(e) {
  var form = $(this)[0];
  var data = new FormData(form);
  $('#alert').html('');

  $.ajax({
    method: 'POST',
    enctype: 'multipart/form-data',
    data: data,
    url: '<?php echo base_url('Tampilan/update_testimoni'); ?>',
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000
  })
  .done(function(data) {
    var out = jQuery.parseJSON(data);

    if (out.success) {
      $('#update-testimoni').modal('hide');
      table.ajax.reload();
    } else {
      // document.getElementById("form-tambah-tampilan").reset();
      // $('#update-testimoni').modal('hide');
      $('#alert_update').html(out.msg);
      // effect_msg();
    }
  })

  e.preventDefault();
});
</script>
