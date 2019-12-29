
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark">Kerja Sama</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Kerja Sama</a></li>
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
             <h3 class="card-title">Edit Kerja Sama</h3>
           </div>
           <!-- /.card-header -->
           <div class="card-body">
             <form role="form" id="form-tambah-tampilan" enctype='multipart/form-data' method="POST" action='<?= base_url() ?>Tampilan/update_kerja_sama'>
               <div class="card-body">
                <input type="hidden" name="id" value="<?= $tampil_id ?>">
                <input type="hidden" name="old_gambar" value="<?= $data['gambar'] ?>">
             <div class="form-group">
               <label for="gambar">Gambar</label>
               <input type="file" class="form-control" id="gambar" name="gambar" value="<?= $data['gambar'] ?>" placeholder="Gambar">
             </div>

             <div class="form-group">
               <label for="deskripsi">Deskripsi</label>
               <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $data['deskripsi'] ?>" placeholder="Deskripsi">
             </div>

             <div class="form-group">
               <label for="negara">Negara</label>
               <input type="text" class="form-control" id="negara" name="negara" value="<?= $data['negara'] ?>" placeholder="Negara">
             </div>

             <div class="form-group">
               <label for="provinsi">Provinsi</label>
               <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $data['provinsi'] ?>" placeholder="Provinsi">
             </div>

             <div class="form-group">
               <label for="kota">Kota</label>
               <input type="text" class="form-control" id="kota" name="kota" value="<?= $data['kota'] ?>" placeholder="Kota">
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
