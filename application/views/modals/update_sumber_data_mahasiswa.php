<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit Data Sumber Data</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" id="form-update-sumber_data" enctype='multipart/form-data' method="POST" action="<?= base_url() ?>Sumber_data/update_sumber_mahasiswa">
    <div class="card-body">
      <input type="hidden" name="id" value="<?= $mahasiswa['usjob_id']; ?>">
      <div class="form-group">
        <label for="nim">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" value="<?= $mahasiswa['usjob_nim']; ?>">
      </div>
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['usjob_nama']; ?>">
      </div>
      <div class="form-group">
        <label>Tempat Lahir</label>
        <select class="form-control select2" style="width: 100%;" id="tempat" name="tempat">
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
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
          </div>
          <input id="datemask" type="text" class="form-control" name="tgl" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask value="<?= $mahasiswa['usjob_tgl_lahir'] ?>">
        </div>
        <!-- /.input group -->
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
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Edit Data</button>
    </div>
  </form>
</div>

<script>
  $(function () {
    $('#datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' });
  });
</script>
