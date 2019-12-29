<script type="text/javascript">
  $('#tabel-job_sekeer').DataTable({

       "processing": true,
       "serverSide": true,
       "order": [],

       "ajax": {
           "url": "<?php echo base_url('JobSekeer/datatables')?>",
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
