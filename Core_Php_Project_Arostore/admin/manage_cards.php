<?php

session_start();

include('include/connection.php');
 
$id=1;
$select="SELECT * FROM manage_site WHERE id ='".$id."'";
$data=mysqli_query($conn,$select);
$row    = mysqli_fetch_array($data);


if($row){
    // echo "Fetch success";
}else{
    echo "Fetch Faild";
}
if(isset($_POST['update'])){
$title=      $_POST['title'];
$disc=       $_POST['disc'];
$mail=       $_POST['mail'];
$address=    $_POST['address'];
$tele=       $_POST['tele'];
$logo_name=  $_FILES['logo']['name'];
$logo_old_name=  $_FILES['logo']['name'];
$tmp_name=  $_FILES['logo']['tmp_name'];


if($logo_old_name ==''){
    $update="UPDATE manage_site SET 
                web_title ='".$title."',
                web_discription ='".$disc."',
                Email ='".$mail."',
                address ='".$address."',
                telephone ='".$tele."',
                logo ='".$logo_name."' 
                WHERE id ='".$id."'
                ";
                $update_run =mysqli_query($conn,$update);
                // if($update_run){
                //     echo "Update Successfully";
    
                // }else{
                //     echo "Update fail";
                // }
}else{
  
        unlink("assets/upload_images/$logo_old_name");
    $update="UPDATE manage_site SET 
                web_title ='".$title."',
                web_discription ='".$disc."',
                Email ='".$mail."',
                address ='".$address."',
                telephone ='".$tele."',
                logo ='".$logo_name."' 
                WHERE id ='".$id."'
                ";
                $path= "assets/upload_images/".$logo_name;
                move_uploaded_file($tmp_name,$path);

                $update_run =mysqli_query($conn,$update);

                if($update_run){
                    // echo "Update Successfully";
    
                }else{
                    echo "Update fail";
                }
}

// $update="UPDATE manage_site SET web_title ='".$title."',
//                 web_discription ='".$disc."',
//                 Email ='".$mail."',
//                 address ='".$address."',
//                 telephone ='".$tele."',
//                 logo ='".$logo_name."' ";

//                 if(mysqli_query($conn,$update)){
//                     // header('Location:manage_website.php');
//                     echo 'update successful';
//                 }else{
//                     echo 'update fail';
//                 }

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
            <h1 class="m-0 font-weight-bold text-primary float-left">Manage Website</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                
               
                </div>
            </div>
      <form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Discription</label>
    <input type="text" name="disc" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" name="mail" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Address</label>
    <input type="text" name="address" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Telephone</label>
    <input type="tele" name="tele" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Logo</label>
    <input type="file" name="logo" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>
      
    </main>
    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->




            <?php include('include/footeradd.php');?>



</body>

</html>