<script type="text/javascript">
  $('#tabel-lowongan_request').DataTable({

       "processing": true,
       "serverSide": true,
       "order": [],

       "ajax": {
           "url": "<?php echo base_url('LowonganRequest/datatables')?>",
           "type": "POST"
       },


       "columnDefs": [
         {
             "targets": [ 0 ],
             "orderable": false,
         },
       ],

   });

</script>
