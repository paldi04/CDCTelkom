
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Tambah Slide Show</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <div id="alert"></div>
  <form role="form" id="form-tambah-slide-show" enctype='multipart/form-data' method="POST" action='<?= base_url() ?>Tampilan/tambah_slide_show'>
    <div class="card-body">

  <div class="form-group">
    <label for="gambar">Gambar</label>
    <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar">
  </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </div>
  </form>
</div>
