<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Tambah Testimoni</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" id="form-tambah-testimoni" enctype='multipart/form-data' method="POST" action='<?=base_url()?>Tampilan/tambah_testimoni'>
    <div class="card-body">

  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" id="nama" placeholder="nama">
  </div>

  <div class="form-group">
    <label for="pesan_kesan_testimoni">Pesan kesan testimoni</label>
    <input type="text" class="form-control" name="pesan_kesan_testimoni" id="pesan_kesan_testimoni" placeholder="pesan kesan testimoni">
  </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </div>
  </form>
</div>
