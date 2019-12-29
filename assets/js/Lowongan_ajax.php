<script type="text/javascript">

  tampilLowongan();
window.onload = function() {
  <?php
    if ($this->session->flashdata('msg') != '') {
      echo "effect_msg();";
    }
  ?>
}

$('#tambah-lowongan').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

$('#update-lowongan').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

//CREATE
$('#form-tambah-lowongan').submit(function(e) {
  var form = $(this)[0];
  var data = new FormData(form);

  $.ajax({
    method: 'POST',
    enctype: 'multipart/form-data',
    data: data,
    url: '<?php echo base_url('Lowongan/prosesTambah'); ?>',
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
      document.getElementById("form-tambah-lowongan").reset();
      $('#tambah-lowongan').modal('hide');
      $('.msg').html(out.msg);
      effect_msg();
    }
  })

  e.preventDefault();
});

//READ
function tampilLowongan() {
  table = $('#tabel-lowongan').DataTable({

    "processing": true,
    "serverSide": true,
    "order": [],

    "ajax": {
        "url": "<?php echo base_url('Lowongan/datatables')?>",
        "type": "POST"
    },


    "columnDefs": [
      {
          "targets": [ 0 ],
          "orderable": false,
      },
    ],

  });
}


//UPDATE
$(document).on("click", ".update-dataLowongan", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Lowongan/update'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modal').html(data);
    $('#update-lowongan').modal('show');
  })
})

//DELETE
var id_lowongan;
$(document).on("click", ".konfirmasiHapus-lowongan", function() {
  id_lowongan = $(this).attr("data-id");
})
$(document).on("click", ".hapus-dataLowongan", function() {
  var id = id_lowongan;

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Lowongan/matikan'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#konfirmasiHapus').modal('hide');
    tampilLowongan();
    $('.msg').html(data);
    effect_msg();
  })
})

</script>
