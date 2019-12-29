<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark">Event</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Event</a></li>
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
                <a class="btn btn-primary" href="<?= base_url() ?>Event/add">Tambah Data</a>
              </div>
           </div>
           <!-- /.card-header -->
           <div class="card-body">
             <table id="tabel-test_event" class="table table-bordered table-striped">
               <thead>
                 <tr>
                  <tr>

    <th>Gambar</th>

    <th>Petugas</th>

    <th>Judul</th>

    <th>Kategori</th>

    <th>Headline</th>

    <th>Aksi</th>

                  </tr>
								</tr>
               </thead>
               <tbody id="data-test_event">
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
