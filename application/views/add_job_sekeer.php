<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Job Sekeer</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Job Sekeer</a></li>
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
            <h3 class="card-title">Tambah Job Sekeer</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form role="form" enctype='multipart/form-data' method="POST" action='<?= base_url() ?>JobSekeer/save'>
              <div class="card-body">


  <div class="form-group">
    <label for="foto">Foto</label>
    <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto">
  </div>

  <div class="form-group">
    <label for="nim/id_portal">NIM/ID Portal</label>
    <input type="text" class="form-control" id="nim/id_portal" name="nim" placeholder="NIM/ID Portal">
  </div>

  <div class="form-group">
    <label for="nama_jobseeker">Nama Jobseeker</label>
    <input type="text" class="form-control" id="nama_jobseeker" name="nama_jobseeker" placeholder="Nama Jobseeker">
  </div>

  <div class="form-group">
    <label for="tmpt_lahir">Tempat Lahir</label>
    <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" placeholder="Tempat Lahir">
  </div>

  <div class="form-group">
    <label for="tgl_lahir">Tanggal Lahir</label>
    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir">
  </div>

  <div class="form-group">
    <label for="gender">Tanggal Lahir</label>
    <select name="gender" class="form-control">
      <option value="L">Laki-Laki</option>
      <option value="P">Perempuan</option>
    </select>
  </div>

  <div class="form-group">
    <label for="nohp">Hp</label>
    <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Hp">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
  </div>

  <div class="form-group">
    <label for="status">Status</label>
    <input type="text" class="form-control" id="status" name="status" placeholder="Status">
  </div>


  <div class="form-group">
    <label>Provinsi</label>
    <select class="form-control select2" style="width: 100%;" id="prov" name="prov">
      <?php
        foreach ($provinsi as $key => $value) {
          if($value['nama'] == $mahasiswa['usjob_prov']){
            echo "<option selected='selected'>".$value['nama']."</option>";
          }else{
            echo "<option>".$value['nama']."</option>";
          }
        }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="prov">Kota</label>
    <select class="form-control select2" style="width: 100%;" id="kota" name="kota">
      <?php
        foreach ($kota as $key => $value) {
          if($value['nama'] == $mahasiswa['usjob_kota']){
            echo "<option selected='selected'>".$value['nama']."</option>";
          }else{
            echo "<option>".$value['nama']."</option>";
          }
        }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label for="alamat_domisili">Alamat Domisili</label>
    <input type="text" class="form-control" id="alamat_domisili" name="alamat_domisili" placeholder="Alamat Domisili">
  </div>

  <div class="form-group">
    <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
    <input type="text" class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan" placeholder="Jenjang Pendidikan">
  </div>

  <div class="form-group">
    <label for="jurusan">Jurusan</label>
    <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan">
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
