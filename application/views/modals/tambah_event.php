<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Tambah Event</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" id="form-tambah-tampilan" enctype='multipart/form-data' method="POST" action='base_url()Eventsave'>
    <div class="card-body">
      
  <div class="form-group">
    <label for="gambar">Gambar</label>
    <input type="file" class="form-control" id="gambar" placeholder="Gambar">
  </div>
  
  <div class="form-group">
    <label for="petugas">Petugas</label>
    <input type="text" class="form-control" id="petugas" placeholder="Petugas">
  </div>
  
  <div class="form-group">
    <label for="judul">Judul</label>
    <input type="text" class="form-control" id="judul" placeholder="Judul">
  </div>
  
  <div class="form-group">
    <label for="kategori">Kategori</label>
    <input type="text" class="form-control" id="kategori" placeholder="Kategori">
  </div>
  
  <div class="form-group">
    <label for="headline">Headline</label>
    <input type="text" class="form-control" id="headline" placeholder="Headline">
  </div>
  
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </div>
  </form>
</div>
