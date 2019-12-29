<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Tambah Lowongan Request</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" id="form-tambah-tampilan" enctype='multipart/form-data' method="POST" action='base_url()LowonganRequestsave'>
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
    <label for="jenis_industri">Jenis Industri</label>
    <input type="text" class="form-control" id="jenis_industri" placeholder="Jenis Industri">
  </div>
  
  <div class="form-group">
    <label for="nama_perusahaan">Nama Perusahaan</label>
    <input type="text" class="form-control" id="nama_perusahaan" placeholder="Nama Perusahaan">
  </div>
  
  <div class="form-group">
    <label for="jumlah_loker">Jumlah Loker</label>
    <input type="text" class="form-control" id="jumlah_loker" placeholder="Jumlah Loker">
  </div>
  
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </div>
  </form>
</div>
