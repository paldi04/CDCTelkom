<script type="text/javascript">

$(document).ready(function() {
  tampilSumber_data();
  tampilSumber_data_mahasiswa();
  <?php
    if ($this->session->flashdata('msg') != '') {
      echo "effect_msg();";
    }
  ?>
});

$('#form-tambah-pengguna').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

$('#update-sumber_data').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

//CREATE
$('#form-tambah-sumber_data').submit(function(e) {
  var form = $(this)[0];
  var data = new FormData(form);

  $.ajax({
    method: 'POST',
    enctype: 'multipart/form-data',
    data: data,
    url: '<?php echo base_url('Sumber_data/prosesTambah'); ?>',
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
      document.getElementById("form-tambah-sumber_data").reset();
      $('#tambah-sumber_data').modal('hide');
      $('.msg').html(out.msg);
      effect_msg();
    }
  })

  e.preventDefault();
});

//READ
function tampilSumber_data() {
      var table;
         //datatables
         table = $('#sumber_data_pengguna').DataTable({

             "processing": true,
             "serverSide": true,
             "order": [],

             "ajax": {
                 "url": "<?php echo base_url('Sumber_data/tampil')?>",
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

function tampilSumber_data_mahasiswa() {
      var table;
         //datatables
         table = $('#sumber_data_mahasiswa').DataTable({

             "processing": true,
             "serverSide": true,
             "order": [],

             "ajax": {
                 "url": "<?php echo base_url('Sumber_data/tampil_mahasiswa')?>",
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
$(document).on("click", ".update-dataSumber_data", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Sumber_data/get_update'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modal').html(data);
    $('#update-sumber_data').modal('show');
  })
})
//UPDATE
$(document).on("click", ".update-dataSumber_pengguna", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Sumber_data/get_update_pengguna'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modal').html(data);
    $('#update-sumber_data_pengguna').modal('show');
  })
})

//DELETE
var id_sumber_data;
$(document).on("click", ".konfirmasiHapus-sumber_data", function() {
  id_sumber_data = $(this).attr("data-id");
})
$(document).on("click", ".hapus-dataSumber_data", function() {
  var id = id_sumber_data;

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Sumber_data/matikan'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#konfirmasiHapus').modal('hide');
    tampilSumber_data();
    $('.msg').html(data);
    effect_msg();
  })
})

</script>
