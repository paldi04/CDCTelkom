<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Tambah Perusahaan</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" id="form-tambah-tampilan" enctype='multipart/form-data' method="POST" action='<?= base_url() ?>Perusahaan/save'>
    <div class="card-body">

      <div class="form-group">
        <label for="nama_perusahaan">Nama Perusahaan</label>
        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Nama Perusahaan">
      </div>
      <div class="form-group">
        <label for="tempat_berdiri">Tempat Berdiri</label>
        <input type="text" class="form-control" id="tempat_berdiri" name="tempat_berdiri" placeholder="Tempat Berdiri">
      </div>
      <div class="form-group">
        <label for="tgl_berdiri">Tanggal Berdiri</label>
        <input id="tgl_berdiri" type="text" class="form-control" name="tgl_berdiri" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
      </div>
      <div class="form-group">
        <label for="no_hp">No Hp</label>
        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No Hp">
      </div>
      <div class="form-group">
        <label for="jenis">Jenis</label>
        <select class="form-control" name="jenis">
          <option value="Lokal">Lokal</option>
          <option value="Nasional">Nasional</option>
          <option value="MultiNasional">Multi Nasional</option>
        </select>
      </div>
      <div class="form-group">
        <label for="bidang">Bidang</label>
        <input type="text" class="form-control" id="bidang" name="bidang" placeholder="Bidang">
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
      </div>
      <div class="form-group">
        <label for="telepon">Telepon</label>
        <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon">
      </div>
      <div class="form-group">
        <label>Provinsi</label>
        <select class="form-control select2" style="width: 100%;" id="provinsi" name="provinsi">
          <?php foreach ($provinsi as $prov) : ?>
          <option value="<?= $prov['nama']; ?>"><?= $prov['nama']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label>Kota</label>
        <select class="form-control select2" style="width: 100%;" id="kota" name="kota">
          <?php foreach ($kota as $k) : ?>
          <option value="<?= $k['nama']; ?>"><?= $k['nama']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
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
