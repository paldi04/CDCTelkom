<?php
$this->load->model('M_Lowongan');
$provinsi = $this->m_lowongan->getProv();
$kota = $this->m_lowongan->getKota();
?>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Tambah Lowongan Pekerjaan</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" id="form-tambah-tampilan" enctype='multipart/form-data' method="POST" action='<?= base_url('Lowongan/Pekerjaansave') ?>'>
    <div class="card-body">

  <div class="form-group">
    <label for="nama_perusahaan">Nama Perusahaan</label>
    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Nama Perusahaan">
  </div>

  <div class="form-group">
    <label for="jenis">Jenis Industri</label>
    <select class="form-control select2" style="width: 100%;" id="jenis" name="jenis">
        <option selected>-- Pilih Jenis Industri -- </option>
        <option value="Semua Industri">Semua Industri</option> <!-- 1 -->
        <option value="Telekomunikasi">Telekomunikasi</option> <!-- 2 -->
        <option value="Pemrograman">Pemrograman</option> <!-- 3 -->
        <option value="Konsultan IT">Konsultan IT</option> <!-- 4 -->
        <option value="Finance">Finance</option> <!-- 5 -->
        <option value="Akuntansi">Akuntansi</option> <!-- 6 -->
        <option value="Industri Komputer dan Elektronik">Industri Komputer dan Elektronik</option> <!-- 7 -->
        <option value="Industri Makanan dan Minuman">Industri Makanan dan Minuman</option> <!-- 8 -->
        <option value="Industri Kerajinan">Industri Kerajinan</option> <!-- 9 -->
        <option value="Industri Percetakan">Industri Percetakan</option> <!-- 10 -->
        <option value="Industri Farmasi">Industri Farmasi</option> <!-- 11 -->
        <option value="Industri Manufaktur">Industri Manufaktur</option> <!-- 12 -->
        <option value="Peternakan dan Perikanan">Peternakan dan Perikanan</option> <!-- 13 -->
        <option value="Limbah dan Daur Ulang">Limbah dan Daur Ulang</option> <!-- 14 -->
        <option value="Perkebunan, Pertanian dan Kehutanan">Perkebunan, Pertanian dan Kehutanan</option> <!-- 15 -->
        <option value="Kesehatan dan Kebersihan">Kesehatan dan Kebersihan</option> <!-- 16 -->
        <option value="Pertambangan">Pertambangan</option> <!-- 17 -->
        <option value="Biro jasa">Biro jasa</option> <!-- 18 -->
        <option value="Property">Property</option> <!-- 19 -->
        <option value="Perdagangan">Perdagangan</option> <!-- 20 -->
        <option value="Penerbitan dan Percetakan">Penerbitan dan Percetakan</option> <!-- 21 -->
        <option value="Pertelevisian dan Broadcasting">Pertelevisian dan Broadcasting</option> <!-- 22 -->
        <option value="Hukum ">Hukum </option> <!-- 23 -->
        <option value="Penelitian">Penelitian</option> <!-- 24 -->
        <option value="Transportasi">Transportasi</option> <!-- 25 -->
        <option value="Tekstil dan Pakaian Jadi">Tekstil dan Pakaian Jadi</option> <!-- 26 -->
        <option value="Sosial">Sosial</option> <!-- 27 -->
        <option value="Seni dan Hiburan">Seni dan Hiburan</option> <!-- 28 -->
        <option value="Politik">Politik</option> <!-- 29 -->
        <option value="LSM dan Kegiatan Badan Internasional">LSM dan Kegiatan Badan Internasional</option> <!-- 30 -->
        <option value="Pendidikan">Pendidikan</option> <!-- 31 -->
        <option value="Auditor">Auditor</option> <!-- 32 -->
        <option value="Banker">Banker</option> <!-- 33 -->
        <option value="Consultant">Consultant</option> <!-- 34 -->
        <option value="Creative Designer">Creative Designer</option> <!-- 35 -->
        <option value="Engineer">Engineer</option> <!-- 36 -->
        <option value="Human Resources">Human Resources</option> <!-- 37 -->
        <option value="Marketing Officer">Marketing Officer</option> <!-- 38 -->
        <option value="Procurement">Procurement</option> <!-- 39 -->
        <option value="Public Relation Officer">Public Relation Officer</option> <!-- 40 -->
        <option value="Trainer/Teacher">Trainer/Teacher</option> <!-- 41 -->
    </select>
  </div>

  <div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
  </div>

  <div class="form-group">
    <label for="prov">Provinsi</label>
    <select class="form-control select2" style="width: 100%;" id="prov" name="prov">
      <option selected>-- Pilih Jenis Provinsi -- </option>
      <?php
        foreach ($provinsi as $key => $value) {
            echo "<option>".$value['nama']."</option>";
        }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label for="kota">Kota</label>
    <select class="form-control select2" style="width: 100%;" id="kota" name="kota">
      <option selected>-- Pilih Jenis Kota -- </option>
      <?php
        foreach ($kota as $key => $value) {
            echo "<option>".$value['nama']."</option>";
        }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label for="posisi">Posisi</label>
    <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Posisi">
  </div>

  <div class="form-group">
    <label for="jumlah_kebutuhan">Jumlah Kebutuhan</label>
    <input type="number" class="form-control" id="jumlah_kebutuhan" name="jumlah_kebutuhan" placeholder="Jumlah Kebutuhan">
  </div>

  <div class="form-group">
    <label for="valid_until">Valid Until</label>
    <input type="text" class="form-control" id="valid_until" name="valid_until" placeholder="Valid Until">
  </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </div>
  </form>
</div>
