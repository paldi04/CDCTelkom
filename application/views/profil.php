<?php
  // $profil = [
  //   "Followers" => "1,322",
  //   "Following" => "543",
  //   "Friends" => "13,287",
  //   "Friendsdsfsdfds" => "13,287",
  //   "asease" => "13,287",
  // ];
  $isi = "";
  $id = "";
  $image = "user2-160x160.jpg";
    foreach ($profil as $key => $value) {
      $key = str_replace($_SESSION['awal'], "", $key);
      $key = str_replace("_", " ", $key);
      $key = ucfirst($key);
        if($key == "Id"){
          $id = $value;
        }
        elseif($key == "Image"){
          if($value != ""){$image = $value;}
        }
        elseif($value == ""){
          $isi .= ' <li class="list-group-item flex">
            <span><b>'.$key.'</b></span>
            <span><a>-</a></span>
            </li>' ;
        }
        elseif(preg_match('/Update|Create/', $key)){
          continue;
        }
        else{
          $isi .= ' <li class="list-group-item flex">
            <span><b>'.$key.'</b></span>
            <span><a>'.$value.'</a></span>
            </li>' ;
        }

    }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark">Profil</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Profil</a></li>
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
                          src="<?= base_url();?>assets/dist/img/<?=$image;?>"
                          alt="User profile picture">
                   </div>

                   <h3 class="profile-username text-center">Alexander Pierce</h3>

                   <p class="text-muted text-center">Software Engineer</p>

                   <ul class="list-group list-group-unbordered mb-3">
                     <?php
                         echo $isi;
                     ?>
                   </ul>

                     <button class='btn btn-primary update-dataProfil' data-id='<?= $id;?>'> Edit </button>
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
 <!-- /.content-wrapper -->
 <div id="tempat-modal"></div>
