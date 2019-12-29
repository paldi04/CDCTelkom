<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit Data Pengguna</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" id="form-tambah-tampilan" enctype='multipart/form-data' method="POST" action="<?= base_url() ?>Sumber_data/update_sumber_pengguna">
    <div class="card-body">
      <input type="hidden" name="id" value="<?= $pengguna['us_id'] ?>">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?= $pengguna['us_email'] ?>">
      </div>
      <div class="form-group">
        <label>Type</label>
        <select class="form-control" style="width: 100%;" id="type" name="type">
          <?php
            foreach ($type_list as $i => $type) {
              if($i == $pengguna['us_type']){
                echo "<option selected='selected' value='". $i ."'>".$type."</option>";
              }else{
                echo "<option value='". $i ."'>".$type."</option>";
              }
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Status</label>
        <select class="form-control" style="width: 100%;" id="status" name="status">
          <option <?= ($pengguna['us_status'] == 1 ? 'selected="selected"' : '' ) ?> value="1">Aktif</option>
          <option <?= ($pengguna['us_status'] == 0 ? 'selected="selected"' : '' ) ?> value="0">Tidak Aktif</option>
        </select>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="">
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Edit Data</button>
    </div>
  </form>
</div>
