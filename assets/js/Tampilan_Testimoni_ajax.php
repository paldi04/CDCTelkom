<script type="text/javascript">

var table;
tampilTestimoni();

//CREATE
$('#form-tambah-testimoni').submit(function(e) {
  var form = $(this)[0];
  var data = new FormData(form);
  $('#alert').html('');

  $.ajax({
    method: 'POST',
    enctype: 'multipart/form-data',
    data: data,
    url: '<?php echo base_url('Tampilan/tambah_testimoni'); ?>',
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000
  })
  .done(function(data) {
    var out = jQuery.parseJSON(data);

    if (out.success) {
      $('#tambah-testimoni').modal('hide');
      table.ajax.reload();
    } else {
      // document.getElementById("form-tambah-tampilan").reset();
      $('#alert').html(out.msg);
      // effect_msg();
    }
  })

  e.preventDefault();
});


//READ
function tampilTestimoni() {
     //datatables
   table = $('#tabel-testimoni').DataTable({

       "processing": true,
       "serverSide": true,
       "order": [],

       "ajax": {
           "url": "<?php echo base_url('Tampilan/data_testimoni')?>",
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
$(document).on("click", ".update-testimoni", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Tampilan/get_update_testimoni'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modal').html(data);
    $('#update-testimoni').modal('show');
  })

})

//DELETE
var id_tampilan;
$(document).on("click", ".konfirmasiHapus-testimoni", function() {
  id_tampilan = $(this).attr("data-id");
})
$(document).on("click", ".hapus-testimoni", function() {
  var id = id_tampilan;

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Tampilan/delete'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#konfirmasiHapus').modal('hide');

    table.ajax.reload();
  })
})

</script>
