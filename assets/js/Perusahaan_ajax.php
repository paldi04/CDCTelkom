<script type="text/javascript">

$(document).ready(function() {
  tampilPerusahaan();
  <?php
    if ($this->session->flashdata('msg') != '') {
      echo "effect_msg();";
    }
  ?>
});
$('#tgl_berdiri').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' });

$('#tambah-perusahaan').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

$('#update-perusahaan').on('hidden.bs.modal', function () {
  $('.form-msg').html('');
})

//CREATE
$('#form-tambah-perusahaan').submit(function(e) {
  var form = $(this)[0];
  var data = new FormData(form);

  $.ajax({
    method: 'POST',
    enctype: 'multipart/form-data',
    data: data,
    url: '<?php echo base_url('Perusahaan/prosesTambah'); ?>',
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
      document.getElementById("form-tambah-perusahaan").reset();
      $('#tambah-perusahaan').modal('hide');
      $('.msg').html(out.msg);
      effect_msg();
    }
  })

  e.preventDefault();
});

//READ
function tampilPerusahaan() {
      var table;
         //datatables
         table = $('#table_perusahaan').DataTable({

             "processing": true,
             "serverSide": true,
             "order": [],

             "ajax": {
                 "url": "<?php echo base_url('Perusahaan/perusahaan_Tampil')?>",
                 "type": "POST"
             },


             "columnDefs": [
               {
                   "targets": [ 0 ],
                   "orderable": false,
               },
             ],

         });

  // $.get('<?php //echo base_url('Perusahaan/tampil'); ?>', function(data) {
  //   MyTable.fnDestroy();
  //   $('#data-perusahaan').html(data);
  //   refresh();
  // });
}


//UPDATE
$(document).on("click", ".update-dataPerusahaan", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Perusahaan/update_perusahaan'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modal').html(data);
    $('#update-perusahaan').modal('show');
  })
})

//DELETE
var id_perusahaan;
$(document).on("click", ".konfirmasiHapus-perusahaan", function() {
  id_perusahaan = $(this).attr("data-id");
})
$(document).on("click", ".hapus-dataPerusahaan", function() {
  var id = id_perusahaan;

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Perusahaan/matikan'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#konfirmasiHapus').modal('hide');
    tampilPerusahaan();
    $('.msg').html(data);
    effect_msg();
  })
})

</script>
