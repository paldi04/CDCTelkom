<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit Perusahaan</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" id="form-tambah-tampilan" enctype='multipart/form-data' method="POST" action='<?= base_url() ?>Perusahaan/update'>
    <div class="card-body">

      <input type="hidden" name="id" value="<?= $perusahaan['uscom_id'] ?>">

      <div class="form-group">
        <label for="nama_perusahaan">Nama Perusahaan</label>
        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Nama Perusahaan" value="<?= $perusahaan['uscom_nama_com'] ?>">
      </div>
      <div class="form-group">
        <label for="tempat_berdiri">Tempat Berdiri</label>
        <input type="text" class="form-control" id="tempat_berdiri" name="tempat_berdiri" placeholder="Tempat Berdiri" value="<?= $perusahaan['uscom_tmpt_berdiri'] ?>">
      </div>
      <div class="form-group">
        <label for="tgl_berdiri">Tanggal Berdiri</label>
        <input id="tgl_berdiri" type="text" class="form-control" name="tgl_berdiri" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask value="<?= $perusahaan['uscom_tgl_berdiri'] ?>">
      </div>
      <div class="form-group">
        <label for="no_hp">No Hp</label>
        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No Hp"value="<?= $perusahaan['uscom_nohp'] ?>">
      </div>
      <div class="form-group">
        <label for="jenis">Jenis</label>
        <select class="form-control" name="jenis">
          <option value="Lokal" <?= ($perusahaan['uscom_jenis'] == 'Lokal' ? 'selected' : '') ?>>Lokal</option>
          <option value="Nasional" <?= ($perusahaan['uscom_jenis'] == 'Nasional' ? 'selected' : '') ?>>Nasional</option>
          <option value="MultiNasional" <?= ($perusahaan['uscom_jenis'] == 'MultiNasional' ? 'selected' : '') ?>>Multi Nasional</option>
        </select>
      </div>
      <div class="form-group">
        <label for="bidang">Bidang</label>
        <input type="text" class="form-control" id="bidang" name="bidang" placeholder="Bidang" value="<?= $perusahaan['uscom_bidang'] ?>">
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $perusahaan['uscom_alamat'] ?>">
      </div>
      <div class="form-group">
        <label for="telepon">Telepon</label>
        <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon" value="<?= $perusahaan['uscom_telepon'] ?>">
      </div>
      <div class="form-group">
        <label>Provinsi</label>
        <select class="form-control select2" style="width: 100%;" id="provinsi" name="provinsi">
          <?php foreach ($provinsi as $prov) : ?>
          <option value="<?= $prov['nama']; ?>" <?= ($perusahaan['uscom_prov'] == $prov['nama'] ? 'selected' : '') ?>><?= $prov['nama']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label>Kota</label>
        <select class="form-control select2" style="width: 100%;" id="kota" name="kota">
          <?php foreach ($kota as $k) : ?>
          <option value="<?= $k['nama']; ?>"  <?= ($perusahaan['uscom_kota'] == $k['nama'] ? 'selected' : '') ?>><?= $k['nama']; ?></option>
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
      <button type="submit" class="btn btn-primary">Edit Data</button>
    </div>
  </form>
</div>
