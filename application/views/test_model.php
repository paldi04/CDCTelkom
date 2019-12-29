abc
<script>
  tampilcikan();
function tampilcikan() {
      var table;
         //datatables
         table = $('#sumber_data_pengguna').DataTable({

             "processing": true,
             "serverSide": true,
             "order": [],

             "ajax": {
                 "url": "<?php echo base_url('Benoy/tampil')?>",
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
</script>
