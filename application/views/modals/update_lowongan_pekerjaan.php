<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Tambah Lowongan Pekerjaan</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" id="form-tambah-tampilan" enctype='multipart/form-data' method="POST" action='base_url()LowonganPekerjaansave'>
    <div class="card-body">
      
  <div class="form-group">
    <label for="nama_perusahaan">Nama Perusahaan</label>
    <input type="text" class="form-control" id="nama_perusahaan" placeholder="Nama Perusahaan">
  </div>
  
  <div class="form-group">
    <label for="tipe_kerja">Tipe Kerja</label>
    <input type="text" class="form-control" id="tipe_kerja" placeholder="Tipe Kerja">
  </div>
  
  <div class="form-group">
    <label for="posisi">Posisi</label>
    <input type="text" class="form-control" id="posisi" placeholder="Posisi">
  </div>
  
  <div class="form-group">
    <label for="jumlah_kebutuhan">Jumlah Kebutuhan</label>
    <input type="number" class="form-control" id="jumlah_kebutuhan" placeholder="Jumlah Kebutuhan">
  </div>
  
  <div class="form-group">
    <label for="valid_until">Valid Until</label>
    <input type="text" class="form-control" id="valid_until" placeholder="Valid Until">
  </div>
  
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </div>
  </form>
</div>
