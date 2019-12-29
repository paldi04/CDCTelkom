<script type="text/javascript">

window.onload = function() {
  // tampilCampus();
  <?php
    if ($this->session->flashdata('msg') != '') {
      echo "effect_msg();";
    }
  ?>
}

$('#tambah-campus').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

$('#update-campus').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

//CREATE
$('#form-tambah-campus').submit(function(e) {
  var form = $(this)[0];
  var data = new FormData(form);

  $.ajax({
    method: 'POST',
    enctype: 'multipart/form-data',
    data: data,
    url: '<?php echo base_url('Campus/prosesTambah'); ?>',
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000
  })
  .done(function(data) {
    var out = jQuery.parseJSON(data);

    if (out.status == 'form') {
      $('.form-msg').html(out.msg);
      effect_msg_form();
    } else {
      document.getElementById("form-tambah-campus").reset();
      $('#tambah-campus').modal('hide');
      $('.msg').html(out.msg);
      effect_msg();
    }
  })

  e.preventDefault();
});

//READ
function tampilCampus() {
  $.get('<?php echo base_url('Campus/tampil'); ?>', function(data) {
    MyTable.fnDestroy();
    $('#data-campus').html(data);
    refresh();
  });
}


//UPDATE
$(document).on("click", ".update-dataCampus", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Campus/update'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modal').html(data);
    $('#update-campus').modal('show');
  })
})

//DELETE
var id_campus;
$(document).on("click", ".konfirmasiHapus-campus", function() {
  id_campus = $(this).attr("data-id");
})
$(document).on("click", ".hapus-dataCampus", function() {
  var id = id_campus;

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Campus/matikan'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#konfirmasiHapus').modal('hide');
    tampilCampus();
    $('.msg').html(data);
    effect_msg();
  })
})

</script>
