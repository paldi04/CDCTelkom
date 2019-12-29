<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Lowongan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Lowongan</a></li>
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
            <h3 class="card-title">Edit Lowongan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form role="form" enctype='multipart/form-data' method="POST" action='<?= base_url() ?>Lowongan/update'>
              <div class="card-body">


                <input type="hidden" class="form-control" name="id" value="<?= $low_id ?>">

                  <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan</label>
                    <select class="form-control" name="nama_perusahaan">
                      <?php foreach ($perusahaan as $p) : ?>
                      <option value="<?= $p['uscom_id'] ?>" <?= ($low_company == $p['uscom_id'] ? 'selected' : '') ?>><?= $p['uscom_nama_com'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="tipe_kerja">Tipe Kerja</label>
                    <select class="form-control" name="tipe_kerja">
                      <option value="0" <?= ($low_kategori == 0 ? 'selected' : '') ?>>Full Time</option>
                      <option value="1" <?= ($low_kategori == 1 ? 'selected' : '') ?>>Part Time</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="posisi">Posisi</label>
                    <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Posisi" value="<?= $low_posisi ?>">
                  </div>

                  <div class="form-group">
                    <label for="jenjang">Jenjang</label>
                    <select class="form-control" name="jenjang">
                      <option value="SMK" <?= ($low_jenjang == 'SMK' ? 'selected' : '') ?>>SMK</option>
                      <option value="SMA SEDERAJAT" <?= ($low_jenjang == 'SMA' ? 'selected' : '') ?>>SMA SEDERAJAT</option>
                      <option value="D1" <?= ($low_jenjang == 'D1' ? 'selected' : '') ?>>D1</option>
                      <option value="D2" <?= ($low_jenjang == 'D2' ? 'selected' : '') ?>>D2</option>
                      <option value="D3" <?= ($low_jenjang == 'D3' ? 'selected' : '') ?>>D3</option>
                      <option value="S1" <?= ($low_jenjang == 'S1' ? 'selected' : '') ?>>S1</option>
                      <option value="S2" <?= ($low_jenjang == 'S2' ? 'selected' : '') ?>>S2</option>
                      <option value="S3" <?= ($low_jenjang == 'S3' ? 'selected' : '') ?>>S3</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <div class="col-md-12">
                      <div class="row">
                      <?php foreach ($prodi as $key => $val) : ?>
                        <?= (($key + 1) % 4 == 0 ? '</div><div class="row">' : '') ?>

                        <div class="col-md-3">
                          <input type="checkbox" name="jurusan[]" value="<?= $val ?>"  <?= (in_array($val, json_decode($low_jurusan, true)) ? 'checked' : '') ?>><?= $val ?></option>
                        </div>

                      <?php endforeach; ?>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="level">Level Pekerjaan</label>
                    <select class="form-control" name="level">
                      <option value="Fresh Graduate" <?= ($low_level == 'Fresh Graduate' ? 'selected' : '') ?>>Fresh Graduate</option>
                      <option value="Junior" <?= ($low_level == 'Junior' ? 'selected' : '') ?>>Junior</option>
                      <option value="Senior" <?= ($low_level == 'Senior' ? 'selected' : '') ?>>Senior</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="jumlah_kebutuhan">Jumlah Kebutuhan</label>
                    <input type="number" class="form-control" id="jumlah_kebutuhan" name="jumlah_kebutuhan" placeholder="Jumlah Kebutuhan"  value="<?= $low_jumlah ?>">
                  </div>


                  <div class="form-group">
                    <label for="syarat">Syarat</label>
                    <textarea class="textarea" name="syarat" placeholder="Place some text here"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $low_syarat ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="syarat_khusus">Syarat Khusus</label>
                    <textarea class="textarea" name="syarat_khusus" placeholder="Place some text here"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $low_syarat_khusus ?></textarea>

                  </div>

                  <div class="form-group">
                    <label for="info">Informasi Umum</label>
                    <textarea class="textarea" name="info" placeholder="Place some text here"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $low_info ?></textarea>

                  </div>

                  <div class="form-group">
                    <label for="valid_until">Valid Until</label>
                    <input type="date" class="form-control" id="valid_until" name="valid_until" placeholder="Valid Until" value="<?= $low_valid_until ?>">
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
