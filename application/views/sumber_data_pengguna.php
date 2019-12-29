<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark">Sumber Data Pengguna</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Sumber Data Pengguna</a></li>
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
           </div>
           <!-- /.card-header -->
           <div class="card-body">
             <table id="sumber_data_pengguna" class="table table-bordered table-striped">
               <thead>
                 <tr>
  								<th>No</th>
                  <th>ID</th>
  								<th>Email</th>
  								<th>Type</th>
  								<th>Status</th>
    							<th>Aksi</th>
    						</tr>
               </thead>
               <tbody id="data-sumber_data_pengguna">
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

 <div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataTampilan', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
