<script type="text/javascript">

  tampilEvent();
window.onload = function() {
  <?php
    if ($this->session->flashdata('msg') != '') {
      echo "effect_msg();";
    }
  ?>
}

$('#tambah-event').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

$('#update-event').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

//CREATE
$('#form-tambah-event').submit(function(e) {
  var form = $(this)[0];
  var data = new FormData(form);

  $.ajax({
    method: 'POST',
    enctype: 'multipart/form-data',
    data: data,
    url: '<?php echo base_url('Event/prosesTambah'); ?>',
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
      document.getElementById("form-tambah-event").reset();
      $('#tambah-event').modal('hide');
      $('.msg').html(out.msg);
      effect_msg();
    }
  })

  e.preventDefault();
});

//READ
function tampilEvent() {
table = $('#tabel-test_event').DataTable({

  "processing": true,
  "serverSide": true,
  "order": [],

  "ajax": {
      "url": "<?php echo base_url('Event/datatables')?>",
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
$(document).on("click", ".update-dataEvent", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Event/update'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modal').html(data);
    $('#update-event').modal('show');
  })
})

//DELETE
var id_event;
$(document).on("click", ".konfirmasiHapus-event", function() {
  id_event = $(this).attr("data-id");
})
$(document).on("click", ".hapus-dataEvent", function() {
  var id = id_event;

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Event/matikan'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#konfirmasiHapus').modal('hide');
    tampilEvent();
    $('.msg').html(data);
    effect_msg();
  })
})

</script>
