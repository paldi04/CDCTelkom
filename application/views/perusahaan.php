<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark">Perusahaan</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Perusahaan</a></li>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambah-perusahaan">
                    <i class="glyphicon glyphicon-plus-sign"></i> Tambah Data
                </button>
              </div>
           </div>
           <!-- /.card-header -->
           <div class="card-body">
             <table id="table_perusahaan" class="table table-bordered table-striped">
               <thead>
                 <tr>
                  <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Tempat Berdiri</th>
                    <th>Tangal Berdiri</th>
                    <th>Nomor hp</th>
                    <th>Telepon</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Image</th>
                    <th>Aksi</th>
                  </tr>
								</tr>
               </thead>
               <tbody id="data-perusahaan">
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
 <?php echo $modal_tambah_perusahaan; ?>

 <div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-perusahaan', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
