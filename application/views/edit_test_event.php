<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Event</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Event</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Event</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form role="form" enctype='multipart/form-data' method="POST" action='<?= base_url() ?>Event/update'>
              <div class="card-body">


<input type="hidden" class="form-control" name="id" value="<?= $e_id ?>">

  <div class="form-group">
    <label for="gambar">Gambar</label>
    <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar" value="<?= $e_gambar ?>">
  </div>

  <div class="form-group">
    <label for="petugas">Petugas</label>
    <input type="text" class="form-control" id="petugas" name="petugas" placeholder="Petugas" value="<?= $e_petugas ?>">
  </div>

  <div class="form-group">
    <label for="judul">Judul</label>
    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" value="<?= $e_judul ?>">
  </div>

  <div class="form-group">
    <label for="kategori">Kategori</label>
    <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori" value="<?= $e_kategori ?>">
  </div>

  <div class="form-group">
    <label for="headline">Headline</label>
    <input type="text" class="form-control" id="headline" name="headline" placeholder="Headline" value="<?= $e_headline ?>">
  </div>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edit Data</button>
              </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
