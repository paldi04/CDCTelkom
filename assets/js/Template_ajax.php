<script type="text/javascript">
window.onload = function() {
  tampil_NameModul();
  <?php
    if ($this->session->flashdata('msg') != '') {
      echo "effect_msg();";
    }
  ?>
}

$('#tambah-nameClass').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

$('#update-nameClass').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

//CREATE
$('#form-tambah-nameClass').submit(function(e) {
  var form = $(this)[0];
  var data = new FormData(form);

  $.ajax({
    method: 'POST',
    enctype: 'multipart/form-data',
    data: data,
    url: '<?php echo base_url('_NameModul/prosesTambah'); ?>',
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000
  })
  .done(function(data) {
    var out = jQuery.parseJSON(data);

    tampil_NameModul();
    if (out.status == 'form') {
      $('.form-msg').html(out.msg);
      effect_msg_form();
    } else {
      document.getElementById("form-tambah-nameClass").reset();
      $('#tambah-nameClass').modal('hide');
      $('.msg').html(out.msg);
      effect_msg();
    }
  })

  e.preventDefault();
});

//READ
function tampil_NameModul() {
  $.get('<?php echo base_url('_NameModul/tampil'); ?>', function(data) {
    MyTable.fnDestroy();
    $('#data-nameClass').html(data);
    refresh();
  });
}

//UPDATE
$(document).on("click", ".update-data_NameModul", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('_NameModul/update'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modal').html(data);
    $('#update-nameClass').modal('show');
  })
})

//DELETE
var id_nameClass;
$(document).on("click", ".konfirmasiHapus-nameClass", function() {
  id_nameClass = $(this).attr("data-id");
})
$(document).on("click", ".hapus-data_NameModul", function() {
  var id = id_nameClass;

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('_NameModul/matikan'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#konfirmasiHapus').modal('hide');
    tampil_NameModul();
    $('.msg').html(data);
    effect_msg();
  })
})

</script>
