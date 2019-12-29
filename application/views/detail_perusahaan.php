
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark">Detail Lowongan Pekerjaan Request</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Detail Lowongan Pekerjaan Request</a></li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">

       <!-- Main content -->
       <section class="content">
         <div class="container-fluid">
           <div class="row">
             <div class="col-md-12">

               <!-- Profile Image -->
               <div class="card card-primary card-outline">
                 <div class="card-body box-profile">
                   <div class="text-center">
                     <img class="profile-user-img img-fluid img-circle"
                          src="<?= base_url();?>uploads/<?=$uscom_image?>"
                          alt="User profile picture">
                   </div>

                   <p class="text-muted text-center"><?= $uscom_nama_com ?></p>

                   <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item flex">
                       <span><b>Tempat Berdiri</b></span>
                       <span><?= $uscom_tmpt_berdiri ?></span>
                     </li>
                     <li class="list-group-item flex">
                       <span><b>Tanggal Berdiri</b></span>
                       <span><?= $uscom_tgl_berdiri ?></span>
                     </li>
                     <li class="list-group-item flex">
                       <span><b>Telepon</b></span>
                       <span><?= $uscom_telepon ?></span>
                     </li>
                     <li class="list-group-item flex">
                       <span><b>Alamat</b></span>
                       <span><?= $uscom_alamat ?></span>
                     </li>
                     <li class="list-group-item flex">
                       <span><b>Hp</b></span>
                       <span><?= $uscom_nohp ?></span>
                     </li>
                     <li class="list-group-item flex">
                       <span><b>Tanggal Daftar</b></span>
                       <span><?= $uscom_create ?></span>
                     </li>
                   </ul>

                 </div>
                 <!-- /.card-body -->
               </div>
               <!-- /.card -->
             </div>
           </div>
           <!-- /.row -->
         </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 </div>
