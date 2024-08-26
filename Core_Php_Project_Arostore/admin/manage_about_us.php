<?php
session_start();
include('include/connection.php');


if(isset($_POST['update_abt'])){
    $abt_us       = $_POST['abt_us'];
    $abt_us_banner_img                    = $_FILES['abt_us_banner_img']['name']; 
    $abt_us_banner_img_tmp_name           = $_FILES['abt_us_banner_img']['tmp_name'];
     $path1="assets/upload_images/$abt_us_banner_img";
     move_uploaded_file($abt_us_banner_img_tmp_name,$path1);
     $abt_us_sub_img                    = $_FILES['abt_us_sub_img']['name']; 
    $abt_us_sub_imgtmp          = $_FILES['abt_us_sub_img']['tmp_name'];
     $path2="assets/upload_images/$abt_us_sub_img";
     move_uploaded_file( $abt_us_sub_imgtmp,$path2);
    $Banner_3rd_img                    = $_FILES['Banner_3rd_img']['name']; 
    $Banner_3rd_img_tmp_name           = $_FILES['Banner_3rd_img']['tmp_name'];
     $path3="assets/upload_images/$Banner_3rd_img";
     move_uploaded_file($Banner_3rd_img_tmp_name,$path3);
   
    $update_category = "UPDATE `about_us` SET `about_us_detail`='".$abt_us."',`main_banner_img`='".$abt_us_banner_img."',`sub_banner_img`='".$abt_us_sub_img."',`Banner_3rd_img`='".$Banner_3rd_img."' WHERE id = 1 ; " ;                                           
     if(mysqli_query($conn,$update_category)){
        header('Location:manage_team_members.php');
         echo "success";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
            <h1 class="m-0 font-weight-bold text-primary float-left">Update About Us</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                
                </div>
            </div>


            <form method="POST" enctype="multipart/form-data" class="py-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">About Us Details</label>
                            <input type="text" name="abt_us" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Main Banner Image</label>
                            <input type="file" name="abt_us_banner_img" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Right Image</label>
                            <input type="file"  name="abt_us_sub_img" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">3rd About US Image</label>
                            <input type="file"  name="Banner_3rd_img" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                                      
                </div>
                <button type="submit" name="update_abt" class="btn btn-outline-secondary">Update</button>
                </form>

        </div>
    </main>
    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->




            <?php include('include/footeradd.php');?>



</body>

</html>