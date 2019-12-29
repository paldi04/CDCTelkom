<!-- Content Wrapper. Contains page content -->
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
             <!-- <h3 class="card-title">DataTable with default features</h3> -->
              <div>
                <a class="btn btn-primary" href="<?= base_url() ?>Tampilan/tambah_kerja_sama">Tambah Data</a>
              </div>
           </div>
           <!-- /.card-header -->
           <div class="card-body">
             <table id="tabel-kerja_sama" class="table table-bordered table-striped">
               <thead>
                 <tr>
                  <tr>
                    <th>Gambar kerja sama</th>
                    <th>Deskripsi kerja sama</th>
                    <th>Negara</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Aksi</th>
                  </tr>
								</tr>
               </thead>
               <tbody id="data-kerja_sama">
               </tbody>
             </table>
           </div>
           <!-- /.card-body -->
         </div>
       </div>
     </div>
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <?php echo $modal_tambah_kerja_sama; ?>

 <div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-kerja_sama', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
