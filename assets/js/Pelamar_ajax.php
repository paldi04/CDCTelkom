<script type="text/javascript">

window.onload = function() {
  // tampilPelamar();
  <?php
    if ($this->session->flashdata('msg') != '') {
      echo "effect_msg();";
    }
  ?>
}

$('#tambah-pelamar').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

$('#update-pelamar').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

//CREATE
$('#form-tambah-pelamar').submit(function(e) {
  var form = $(this)[0];
  var data = new FormData(form);

  $.ajax({
    method: 'POST',
    enctype: 'multipart/form-data',
    data: data,
    url: '<?php echo base_url('Pelamar/prosesTambah'); ?>',
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
      document.getElementById("form-tambah-pelamar").reset();
      $('#tambah-pelamar').modal('hide');
      $('.msg').html(out.msg);
      effect_msg();
    }
  })

  e.preventDefault();
});

//READ
function tampilPelamar() {
  $.get('<?php echo base_url('Pelamar/tampil'); ?>', function(data) {
    MyTable.fnDestroy();
    $('#data-pelamar').html(data);
    refresh();
  });
}


//UPDATE
$(document).on("click", ".update-dataPelamar", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Pelamar/update'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modal').html(data);
    $('#update-pelamar').modal('show');
  })
})

//DELETE
var id_pelamar;
$(document).on("click", ".konfirmasiHapus-pelamar", function() {
  id_pelamar = $(this).attr("data-id");
})
$(document).on("click", ".hapus-dataPelamar", function() {
  var id = id_pelamar;

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Pelamar/matikan'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#konfirmasiHapus').modal('hide');
    tampilPelamar();
    $('.msg').html(data);
    effect_msg();
  })
})

</script>
