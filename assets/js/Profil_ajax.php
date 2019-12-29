<script type="text/javascript">

window.onload = function() {
  // tampilProfil();
  <?php
    if ($this->session->flashdata('msg') != '') {
      echo "effect_msg();";
    }
  ?>
}

$('#tambah-profil').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

$('#update-profil').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

//CREATE
$('#form-tambah-profil').submit(function(e) {
  var form = $(this)[0];
  var data = new FormData(form);

  $.ajax({
    method: 'POST',
    enctype: 'multipart/form-data',
    data: data,
    url: '<?php echo base_url('Profil/prosesTambah'); ?>',
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
      document.getElementById("form-tambah-profil").reset();
      $('#tambah-profil').modal('hide');
      $('.msg').html(out.msg);
      effect_msg();
    }
  })

  e.preventDefault();
});

//READ
function tampilProfil() {
  $.get('<?php echo base_url('Profil/tampil'); ?>', function(data) {
    MyTable.fnDestroy();
    $('#data-profil').html(data);
    refresh();
  });
}


//UPDATE
$(document).on("click", ".update-dataProfil", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Profil/get_update'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modal').html(data);
    $('#update-profil').modal('show');
  })
})

//DELETE
var id_profil;
$(document).on("click", ".konfirmasiHapus-profil", function() {
  id_profil = $(this).attr("data-id");
})
$(document).on("click", ".hapus-dataProfil", function() {
  var id = id_profil;

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Profil/matikan'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#konfirmasiHapus').modal('hide');
    tampilProfil();
    $('.msg').html(data);
    effect_msg();
  })
})

</script>
