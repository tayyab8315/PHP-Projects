<?php
session_start();
include('include/connection.php');


if(isset($_POST['update_abt1'])){
    $team_img_name              = $_FILES['team_img']['name']; 
    $team_img_tmp_name          = $_FILES['team_img']['tmp_name'];
     $path4="assets/upload_images/$team_img_name";
     move_uploaded_file($team_img_tmp_name,$path4);
    $team_name                    = $_POST['team_name'];
    $team_dest                    = $_POST['team_dest'];
   
   
    $update_category = "UPDATE `about_us` SET `team_mamber_1_img`='".$team_img_name."',`team_mamber_1_name`='".$team_name."',`team_mamber_1_destination`='".$team_dest."' WHERE id = 1 ; " ;                                           
     if(mysqli_query($conn,$update_category)){
         header('Location:manage_team_members.php');
        //  echo "success";
     }else{
         echo 'fail';
     }


     
 }
 
if(isset($_POST['update_abt2'])){
    $team_img_2_name              = $_FILES['team_img_2']['name']; 
    $team_img_2_tmp_name          = $_FILES['team_img_2']['tmp_name'];
    $path5="assets/upload_images/$team_img_2_name";
    move_uploaded_file($team_img_2_tmp_name,$path5);
    $team_name_2                    = $_POST['team_name_2'];
    $team_dest_2                    = $_POST['team_dest_2'];
   
   
    $update_category = "UPDATE `about_us` SET `team_mamber_1_img`='".$team_img_2_name ."',`team_mamber_1_name`='".$team_name_2."',`team_mamber_1_destination`='".$team_dest_2."' WHERE id = 2 ; " ;                                           
     if(mysqli_query($conn,$update_category)){
         header('Location:manage_team_members.php');
        //  echo "success";
     }else{
         echo 'fail';
     }


     
 }
 
if(isset($_POST['update_abt3'])){
    $team_img_3_name              = $_FILES['team_img_3']['name']; 
    $team_img_3_tmp_name          = $_FILES['team_img_3']['tmp_name'];
    $path="assets/upload_images/$team_img_3_name";
    move_uploaded_file($team_img_3_tmp_name,$path);
    $team_name_3                    = $_POST['team_name_3'];
    $team_dest_3                    = $_POST['team_dest_3'];
   
    $update_category = "UPDATE `about_us` SET `team_mamber_1_img`='".$team_img_3_name."',`team_mamber_1_name`='".$team_name_3."',`team_mamber_1_destination`='".$team_dest_3."' WHERE id = 3 ; " ;                                           
     if(mysqli_query($conn,$update_category)){
         header('Location:manage_team_members.php');
        //  echo "success";
     }else{
         echo 'fail';
     }


     
 }
 
if(isset($_POST['update_abt4'])){
    $team_img_4_name              = $_FILES['team_img_4']['name']; 
    $team_img_4_tmp_name          = $_FILES['team_img_4']['tmp_name'];
    $path="assets/upload_images/$team_img_4_name";
    move_uploaded_file($team_img_4_tmp_name,$path);
    $team_name_4                    = $_POST['team_name_4'];
    $team_dest_4                    = $_POST['team_dest_4'];

   
    $update_category = "UPDATE `about_us` SET `team_mamber_1_img`='".$team_img_4_name."',`team_mamber_1_name`='".$team_name_4."',`team_mamber_1_destination`='".$team_dest_4."' WHERE id = 4 ; " ;                                           
     if(mysqli_query($conn,$update_category)){
         header('Location:manage_team_members.php');
        //  echo "success";
     }else{
         echo 'fail';
     }


     
 }
 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

      
<title>Arostore-Admin</title>
    <link rel="icon" type="image/png" href="../user/assets/images/admin4.png" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       <!-- include side bar here -->
       <?php include('include/side_baradd.php');?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">






            <!-- Main Content -->
            <div id="content">

              <!-- include top bar here  -->
              <?php include('include/top_baradd.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <main class="" >
                <div class="" style="min-height:84.5vh;">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="m-0 font-weight-bold text-primary float-left">Update Team Members</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                
                </div>
            </div>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">1st Team Member</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">2nd Team Member</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">3rd Team Member</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-fourth-tab" data-bs-toggle="pill" data-bs-target="#pills-fourth" type="button" role="tab" aria-controls="pills-fourth" aria-selected="false">4th Team Member</button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">

  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><form method="POST" enctype="multipart/form-data" class="py-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">1st Team Member image</label>
                            <input type="file" name="team_img" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">1st Team Member Name</label>
                            <input type="text" name="team_name" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">1st Team Member Destination</label>
                            <input type="text" name="team_dest" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>       
                </div>
                <button type="submit" name="update_abt1" class="btn btn-outline-secondary">Update</button>
                </form></div>

  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

  <form method="POST" enctype="multipart/form-data" class="py-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">2nd Team Member image</label>
                            <input type="file" name="team_img_2" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">2nd Team Member Name</label>
                            <input type="text" name="team_name_2" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">2nd Team Member Destination</label>
                            <input type="text" name="team_dest_2" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
                <button type="submit" name="update_abt2" class="btn btn-outline-secondary">Update</button>
                </form>
  </div>

  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"> <form method="POST" enctype="multipart/form-data" class="py-4">
                <div class="row">
                    
                <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">3rd Team Member image</label>
                        <input type="file" name="team_img_3" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">3rd  Team Member Name</label>
                            <input type="text" name="team_name_3" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">3rd  Team Member Destination</label>
                            <input type="text" name="team_dest_3" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
                <button type="submit" name="update_abt3" class="btn btn-outline-secondary">Update</button>
                </form></div>
  
  <div class="tab-pane fade" id="pills-fourth" role="tabpanel" aria-labelledby="pills-fourth-tab"> <form method="POST" enctype="multipart/form-data" class="py-4">
                <div class="row">
                <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">4th Team Member image</label>
                            <input type="file" name="team_img_4" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">4th  Team Member Name</label>
                            <input type="text" name="team_name_4" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">4th  Team Member Destination</label>
                            <input type="text" name="team_dest_4" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>

                </div>
                <button type="submit" name="update_abt4" class="btn btn-outline-secondary">Update</button>
                </form></div>
</div>
    </main>
    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->




            <?php include('include/footeradd.php');?>



</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
