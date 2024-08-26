<?php
session_start();
include('include/connection.php');
   



// fetch cat data
$query  = "SELECT * FROM `manage_category`" ;
$data   = mysqli_query($conn,$query);
$category = '';
while($row    = mysqli_fetch_array($data)){
    $catid = $row['cat_id'];
    $cat = $row['category'];

    $category .= '<option class="form-control" value='.$catid.'>'.$cat.'</option>';
}

if(isset($_POST['add_sub_cat'])){
   $cat       = $_POST['cat'];
   $sub_cat   = $_POST['sub_cat'];

   $insert_query = "INSERT INTO sub_category  (category,sub_category)
                                             VALUES
                                             ('".$cat."','".$sub_cat."')";
                                              
    if(mysqli_query($conn,$insert_query)){
        header('Location:manage_sub_category.php');
        // echo "success";
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
            <h1 class="m-0 font-weight-bold text-primary float-left">Add Sub_category</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                
                <a href="manage_sub_category.php" type="button" class="btn btn-sm btn-danger">
                    Back
                </a>
                </div>
            </div>


            <form method="POST" enctype="multipart/form-data" class="py-4">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Select Category</label>
                            <select name="cat" id="" class="form-control" >
                                    <?php echo $category; ?>
                            </select>
                        </div>
                        
                    </div>  
                    <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Sub Category</label>
                                <input type="text" class="form-control" name="sub_cat">
                            </div>
                    </div>
                </div>
                <button type="submit" name="add_sub_cat" class="btn btn-outline-secondary">Submit</button>
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