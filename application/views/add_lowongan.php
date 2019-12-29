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
            <h3 class="card-title">Tambah Lowongan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form role="form" enctype='multipart/form-data' method="POST" action='<?= base_url() ?>Lowongan/save'>
              <div class="card-body">


                <div class="form-group">
                  <label for="nama_perusahaan">Nama Perusahaan</label>
                  <select class="form-control" name="nama_perusahaan">
                    <?php foreach ($perusahaan as $p) : ?>
                    <option value="<?= $p['uscom_id'] ?>"><?= $p['uscom_nama_com'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="tipe_kerja">Tipe Kerja</label>
                  <select class="form-control" name="tipe_kerja">
                    <option value="0">Full Time</option>
                    <option value="1">Part Time</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="posisi">Posisi</label>
                  <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Posisi">
                </div>

                <div class="form-group">
                  <label for="jenjang">Jenjang</label>
                  <select class="form-control" name="jenjang">
                    <option value="SMK">SMK</option>
                    <option value="SMA SEDERAJAT">SMA SEDERAJAT</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="jurusan">Jurusan</label>
                  <div class="col-md-12">
                    <div class="row">
                    <?php foreach ($prodi as $key => $val) : ?>
                      <?= (($key + 1) % 4 == 0 ? '</div><div class="row">' : '') ?>

                      <div class="col-md-3">
                        <input type="checkbox" name="jurusan[]" value="<?= $val ?>"><?= $val ?></option>
                      </div>

                    <?php endforeach; ?>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label for="level">Level Pekerjaan</label>
                  <select class="form-control" name="level">
                    <option value="Fresh Graduate">Fresh Graduate</option>
                    <option value="Junior">Junior</option>
                    <option value="Senior">Senior</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="jumlah_kebutuhan">Jumlah Kebutuhan</label>
                  <input type="number" class="form-control" id="jumlah_kebutuhan" name="jumlah_kebutuhan" placeholder="Jumlah Kebutuhan">
                </div>


                <div class="form-group">
                  <label for="syarat">Syarat</label>
                  <textarea class="textarea" name="syarat" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>

                <div class="form-group">
                  <label for="syarat_khusus">Syarat Khusus</label>
                  <textarea class="textarea" name="syarat_khusus" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                </div>

                <div class="form-group">
                  <label for="info">Informasi Umum</label>
                  <textarea class="textarea" name="info" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                </div>

                <div class="form-group">
                  <label for="valid_until">Valid Until</label>
                  <input type="date" class="form-control" id="valid_until" name="valid_until" placeholder="Valid Until">
                </div>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
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
