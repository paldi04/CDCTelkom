<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Tambah Video</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <div id="alert"></div>
  <form role="form" id="form-tambah-video" enctype='multipart/form-data' method="POST" action='<?= base_url() ?>Tampila/tambah_video'>
    <div class="card-body">

  <div class="form-group">
    <label for="url_video">URL Video</label>
    <input type="text" class="form-control" name="url_video" id="url_video" placeholder="URL Video">
  </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </div>
  </form>
</div>
