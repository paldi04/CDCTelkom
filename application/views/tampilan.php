<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark">Tampilan</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Tampilan</a></li>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambah-tampilan">
                    <i class="glyphicon glyphicon-plus-sign"></i> Tambah Data
                </button>
              </div>
           </div>
           <!-- /.card-header -->
           <div class="card-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
                 <tr>
                   <th>Rendering engine</th>
                   <th>Browser</th>
                   <th>Platform(s)</th>
                   <th>Engine version</th>
                   <th>CSS grade</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody id="data-tampilan">
                 <?php
                 $tampilan = [
                   0 => [
                     "Id" => 1,
                     "Rendering" => "Trident",
                     "Browser" => "Internet Explorer 4.0",
                     "Platform" => "Win 95+",
                     "Engine" => "4",
                     "CSS" => "X",
                   ],
                 ];
                 $isi = "";
                   foreach ($tampilan as $key => $value) {
                    $isi .= "<tr>
                      <td>".$value['Rendering']."</td>
                      <td>".$value['Browser']."</td>
                      <td>".$value['Platform']." 95+</td>
                      <td>".$value['Engine']."</td>
                      <td>".$value['CSS']."</td>
                      <td>
                      <button class='btn btn-success update-dataTampilan' data-id='". $value['Id'] ."'<i class='glyphicon glyphicon-repeat'></i> Edit </button>
                      <button class='btn btn-danger konfirmasiHapus-tampilan' data-id='". $value['Id'] ."' data-toggle='modal' data-target='#konfirmasiHapus'><i class='glyphicon glyphicon-remove-sign'></i> Hapus </button>
                      </td>
                    </tr>";
                   }
                   echo $isi;
                 ?>
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
 <?php echo $modal_tambah_tampilan; ?>

 <div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataTampilan', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
