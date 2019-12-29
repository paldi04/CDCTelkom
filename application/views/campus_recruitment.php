<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark">Campus Recruitment</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Campus Recruitment</a></li>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambah-campus_recruitment">
                    <i class="glyphicon glyphicon-plus-sign"></i> Tambah Data
                </button>
              </div>
           </div>
           <!-- /.card-header -->
           <div class="card-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
                 <tr>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Pelaksanaan</th>
                    <th>Jumlah Peserta</th>
                    <th>Tanggal Input</th>
                    <th>Aksi</th>
                  </tr>
								</tr>
               </thead>
               <tbody id="data-campus_recruitment">
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
 <?php echo $modal_tambah_campus_recruitment; ?>

 <div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-campus_recruitment', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
