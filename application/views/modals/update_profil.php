<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit Data profil</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->

  <?php if ($_SESSION['role'] == "admin") { ?>
    <form role="form" id="form-update-profil_admin" enctype='multipart/form-data' method="POST" action="<?=base_url()?>Profil/update">
      <div class="card-body">
        <input type="hidden" name="id" value="<?= $profil['a_id'] ?>">
        <div class="form-group">
          <label for="exampleInputEmail1">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="<?= $profil['a_nama'];?>">
        </div>
        <div class="form-group">
          <label for="tmpt_lahir">Tempat Lahir</label>
          <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" placeholder="Tempat Lahir" value="<?= $profil['a_tmpt_lahir'];?>">
        </div>
        <div class="form-group">
          <label for="tgl_lahir">Tanggal Lahir</label>
          <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?= $profil['a_tgl_lahir'];?>">
        </div>
        <div class="form-group">
          <label for="gender">Gender</label>
          <select class="form-control" name="gender">
            <option value="L" <?= ($profil['a_gender'] == 'L' ? 'selected' : '') ?>>Laki-Laki</option>
            <option value="P" <?= ($profil['a_gender'] == 'P' ? 'selected' : '') ?>>Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nohp">No Hp</label>
          <input type="phone" class="form-control" id="nohp" name="nohp" placeholder="No Hp" value="<?= $profil['a_nohp'];?>">
        </div>
        <div class="form-group">
          <label for="jenis">Jenis</label>
          <select class="form-control" name="jenis">
            <option value="Multi" <?= ($profil['a_jenis'] == 'Multi' ? 'selected' : '') ?>>Multi</option>
            <option value="Nasional" <?= ($profil['a_jenis'] == 'Nasional' ? 'selected' : '') ?>>Nasional</option>
            <option value="Lokal" <?= ($profil['a_jenis'] == 'Lokal' ? 'selected' : '') ?>>Lokal</option>
          </select>
        </div>
        <div class="form-group">
          <label for="bidang">Bidang</label>
          <input type="text" class="form-control" id="bidang" name="bidang" placeholder="Bidang" value="<?= $profil['a_bidang'];?>">
        </div>
        <div class="form-group">
          <label>Provinsi</label>
          <select class="form-control select2" style="width: 100%;" id="prov" name="prov">
            <?php foreach ($provinsi as $prov) : ?>
            <option value="<?= $prov['nama']; ?>" <?= ($profil['a_prov'] == $prov['nama'] ? 'selected' : '') ?>><?= $prov['nama']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label>Kota</label>
          <select class="form-control select2" style="width: 100%;" id="kota" name="kota">
            <?php foreach ($kota as $k) : ?>
            <option value="<?= $k['nama']; ?>" <?= ($profil['a_kota'] == $k['nama'] ? 'selected' : '') ?>><?= $k['nama']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $profil['a_alamat'];?>">
        </div>
        <div class="form-group">
          <label for="gambar">Gambar</label>
          <input type="file" class="form-control" id="gambar">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Edit Data</button>
      </div>
    </form>
<?php } else if ($_SESSION['role'] == "company") { ?>
    <form role="form" id="form-update-profil_company" enctype='multipart/form-data' method="POST">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Email B</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="email" value="abc@abc.abc">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="abc@abc.abc">
        </div>
        <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text" id="">Upload</span>
            </div>
          </div>
        </div>
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Edit Data</button>
      </div>
    </form>
  <?php } ?>
</div>
<script type="text/javascript">
  $('.select2').select2();
</script>
