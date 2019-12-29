<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.0.1
  </div>
  <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
  reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url();?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url();?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url();?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url();?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url();?>assets/dist/js/demo.js"></script>
<script src="<?= base_url();?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
  //   $("#example1").DataTable();
    $('.select2').select2();

    $('.textarea').summernote();
  //   //Datemask dd/mm/yyyy
  //   $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
  //   //Datemask2 mm/dd/yyyy
  //   $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
  //   //Money Euro
  //   $('[data-mask]').inputmask();
  });
</script>
<?php include './assets/js/Lowongan_ajax.php'; ?>
<?php include './assets/js/Pelamar_ajax.php'; ?>
<?php include './assets/js/Perusahaan_ajax.php'; ?>
<?php include './assets/js/Profil_ajax.php'; ?>
<?php include './assets/js/Campus_ajax.php'; ?>
<?php include './assets/js/Sumber_data_ajax.php'; ?>
<?php include './assets/js/Tampilan_ajax.php'; ?>
<?php include './assets/js/Tampilan_Video_ajax.php'; ?>
<?php include './assets/js/Tampilan_Testimoni_ajax.php'; ?>
<?php include './assets/js/Tampilan_Kerja_Sama_ajax.php'; ?>
<?php include './assets/js/Tampilan_Career_News_ajax.php'; ?>
<?php include './assets/js/Event_ajax.php'; ?>
<?php include './assets/js/JobSekeer_ajax.php'; ?>
<?php include './assets/js/LowonganRequest_ajax.php'; ?>
</body>
</html>
