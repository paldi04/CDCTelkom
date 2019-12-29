<!-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul> -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark">Dashboard</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
     <div class="row">
       <?php
         $dashboard = [
           0 => [
             "name" => "abc",
             "total" => 120,
             "background" => 'bg-primary',
             "ionicon" => 'ion-bag',
           ],
         ];
         $isi = "";
         foreach ($total as $key => $value) {
           $isi .= '  <div class="col-lg-3 col-6">
               <div class="small-box '.$value['background'].'">
                 <div class="inner">
                   <h3>'.$value['total'].'</h3>

                   <p>'.$key.'</p>
                 </div>
                 <div class="icon">
                   <i class="ion '.$value['ionicon'].'"></i>
                 </div>
                 <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
             </div>';
         }
         echo $isi;
       ?>
     </div>
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
