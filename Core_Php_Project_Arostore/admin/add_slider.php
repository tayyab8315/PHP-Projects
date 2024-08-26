<?php

session_start();
include('include/connection.php');
$img_error='';

if(isset($_POST['add_slider'])){
    $title       = $_POST['title'];
    $disc        = $_POST['disc'];
    $img_name   = $_FILES['logo']['name'];
    $tmp_name    = $_FILES['logo']['tmp_name'];
    $path        = "assets/upload_images/$img_name";
    move_uploaded_file($tmp_name,$path);
    // img validation
    $allowed_img_extension = array("png",'PNG',"jpg","jpeg");
// get img extension
$file_extension = pathinfo($_FILES['logo']['name'],PATHINFO_EXTENSION);
if(!in_array($file_extension , $allowed_img_extension )){
    $img_error = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    (choose only jpeg, jpg and png)
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    ';
}else{
    $insert_query = "INSERT INTO manage_slider (slider_tit, 
    slider_disc,
    slider_img)
     VALUES
     ('".$title."','".$disc."',  '".$img_name."')";
       if(mysqli_query($conn,$insert_query)){
           header('Location:manage-slider.php');
           // echo "success";
       }else{
           echo 'fail';
       }
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
            <h1 class="m-0 font-weight-bold text-primary float-left">Add Slider</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                
                <a  href="manage-slider.php" class="btn btn-sm btn-outline-secondary">
                    <!-- <span data-feather="calendar"></span> -->
                    Back
                                        </a>
                </div>
            </div>


            <form method="POST" enctype="multipart/form-data" class="py-4">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Title</label>
                            <input type="text" name="title" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Discription</label>
                            <textarea  name="disc" value="" rows="1" class="form-control" id="exampleInputPassword1"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Site Slider</label>
                            <input type="file"   name="logo" class="form-control">
                            <!-- <img src="assets/upload_images/<?php echo $row['site_logo']; ?>" alt="" width="60px" height="50px"> -->
                        </div>
                    </div>
                    
                </div>
               
                
                
                <button type="submit" name="add_slider" class="btn btn-outline-secondary">Submit</button>
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