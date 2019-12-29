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
            <h3 class="card-title">Edit Job Sekeer</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form role="form" enctype='multipart/form-data' method="POST" action='<?= base_url() ?>JobSekeer/update'>
              <div class="card-body">

             
<input type="hidden" class="form-control" name="id" value="<?= $usjob_id ?>">

  <div class="form-group">
    <label for="foto">Foto</label>
    <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto" value="<?= $usjob_image ?>">
  </div>
  
  <div class="form-group">
    <label for="nim/id_portal">NIM/ID Portal</label>
    <input type="text" class="form-control" id="nim/id_portal" name="nim/id_portal" placeholder="NIM/ID Portal" value="<?= $usjob_nim ?>">
  </div>
  
  <div class="form-group">
    <label for="nama_jobseeker">Nama Jobseeker</label>
    <input type="text" class="form-control" id="nama_jobseeker" name="nama_jobseeker" placeholder="Nama Jobseeker" value="<?= $usjob_nama ?>">
  </div>
  
  <div class="form-group">
    <label for="hp">Hp</label>
    <input type="text" class="form-control" id="hp" name="hp" placeholder="Hp" value="<?= $usjob_nohp ?>">
  </div>
  
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $us_email ?>">
  </div>
  
  <div class="form-group">
    <label for="status">Status</label>
    <input type="text" class="form-control" id="status" name="status" placeholder="Status" value="<?= $usjob_stat_mahasiswa ?>">
  </div>
  
  <div class="form-group">
    <label for="alamat_domisili">Alamat Domisili</label>
    <input type="text" class="form-control" id="alamat_domisili" name="alamat_domisili" placeholder="Alamat Domisili" value="<?= $usjob_kota ?>">
  </div>
  
  <div class="form-group">
    <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
    <input type="text" class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan" placeholder="Jenjang Pendidikan" value="<?= $usjob_jenjang ?>">
  </div>
  
  <div class="form-group">
    <label for="jurusan">Jurusan</label>
    <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan" value="<?= $usjob_prog_study ?>">
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
