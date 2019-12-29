<script type="text/javascript">

var table;
tampilCareerNews();

function tampilCareerNews() {
     //datatables
   table = $('#tabel-career_news').DataTable({

       "processing": true,
       "serverSide": true,
       "order": [],

       "ajax": {
           "url": "<?php echo base_url('Tampilan/data_career_news')?>",
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
$(document).on("click", ".konfirmasiHapus-career_news", function() {
  id_tampilan = $(this).attr("data-id");
})
$(document).on("click", ".hapus-career_news", function() {
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
