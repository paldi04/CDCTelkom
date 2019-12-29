<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Tambah Daftar Hadir</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" id="form-tambah-tampilan" enctype='multipart/form-data' method="POST" action='base_url()DaftarHadirsave'>
    <div class="card-body">
      
  <div class="form-group">
    <label for="logo">Logo</label>
    <input type="file" class="form-control" id="logo" placeholder="Logo">
  </div>
  
  <div class="form-group">
    <label for="event">Event</label>
    <input type="text" class="form-control" id="event" placeholder="Event">
  </div>
  
  <div class="form-group">
    <label for="nomor_tiket">Nomor Tiket</label>
    <input type="number" class="form-control" id="nomor_tiket" placeholder="Nomor Tiket">
  </div>
  
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama">
  </div>
  
  <div class="form-group">
    <label for="event">Event</label>
    <input type="text" class="form-control" id="event" placeholder="Event">
  </div>
  
  <div class="form-group">
    <label for="ticket_class_/_keterangan">Ticket Class / Keterangan</label>
    <input type="text" class="form-control" id="ticket_class_/_keterangan" placeholder="Ticket Class / Keterangan">
  </div>
  
  <div class="form-group">
    <label for="status_kehadiran">Status Kehadiran</label>
    <input type="text" class="form-control" id="status_kehadiran" placeholder="Status Kehadiran">
  </div>
  
  <div class="form-group">
    <label for="log">Log</label>
    <input type="text" class="form-control" id="log" placeholder="Log">
  </div>
  
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </div>
  </form>
</div>
