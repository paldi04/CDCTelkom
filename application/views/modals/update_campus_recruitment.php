<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Tambah Campus Recruitment</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" id="form-tambah-tampilan" enctype='multipart/form-data' method="POST" action='base_url()CampusRecruitmentsave'>
    <div class="card-body">
      
  <div class="form-group">
    <label for="tanggal">Tanggal</label>
    <input type="text" class="form-control" id="tanggal" placeholder="Tanggal">
  </div>
  
  <div class="form-group">
    <label for="pelaksanaan">Pelaksanaan</label>
    <input type="text" class="form-control" id="pelaksanaan" placeholder="Pelaksanaan">
  </div>
  
  <div class="form-group">
    <label for="jumlah_peserta">Jumlah Peserta</label>
    <input type="number" class="form-control" id="jumlah_peserta" placeholder="Jumlah Peserta">
  </div>
  
  <div class="form-group">
    <label for="tanggal_input">Tanggal Input</label>
    <input type="text" class="form-control" id="tanggal_input" placeholder="Tanggal Input">
  </div>
  
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </div>
  </form>
</div>
