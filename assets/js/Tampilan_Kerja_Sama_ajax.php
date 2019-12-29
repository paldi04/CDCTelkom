<script type="text/javascript">

var table;
tampilKerjaSama();

function tampilKerjaSama() {
     //datatables
   table = $('#tabel-kerja_sama').DataTable({

       "processing": true,
       "serverSide": true,
       "order": [],

       "ajax": {
           "url": "<?php echo base_url('Tampilan/data_kerja_sama')?>",
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
 
//DELETE
var id_tampilan;
$(document).on("click", ".konfirmasiHapus-kerja_sama", function() {
  id_tampilan = $(this).attr("data-id");
})
$(document).on("click", ".hapus-kerja_sama", function() {
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
