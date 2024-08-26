<?php
session_start();
include('include/connection.php');


// fetch data from manage_website tbl
$query  = "SELECT * FROM `blog_sub_cat`";
$data   = mysqli_query($conn,$query);
$serial = 0;
$sub_category = '';
while($row    = mysqli_fetch_array($data)){
    $serial = $serial + 1;
    $blog_subcatid    = $row['blog_sub_cat_id'];
    $blog_cat_id      = $row['blog_cat_id'];
    $blog_sub_cat     = $row['blog_sub_cat'];

    // fetch data from manage_website tbl
$query1  = "SELECT * FROM `blog_category` WHERE blog_cat_id = '".$blog_cat_id."'";
$data1   = mysqli_query($conn,$query1);
$blog_category_name = '';
while($row1    = mysqli_fetch_array($data1)){
    $blog_category_name = $row1['blog_cat'];
}

    
    $sub_category .='<tr class="text-center" >
                <td>'.$serial.'</td>
                <td>'.$blog_category_name.'</td>
                <td>'.$blog_sub_cat.'</td>
                <td class="">
                <div class="btn-group">
                <a href="edit_sub_category.php?blog_sub_catid='.$blog_subcatid.'" class="btn btn-warning">Update</a>
                <a href="delete_sub_category.php?blog_sub_catid='.$blog_subcatid.'" class="btn btn-danger">Delete</a>
                </div>
                </td>
            </tr>';
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

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h1 class="m-0 font-weight-bold text-primary float-left">Manage Blog Sub Categories</h1>
                          
                
                <a href="add_blog_sub_cat.php" type="button" class="btn btn-sm btn-outline-secondary mt-2 float-right">
                    <span data-feather="calendar"></span>
                    Add Blog Sub Category
                </a>
                
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                        <th scope="col">#</th>
                    <th scope="col">Blog Category</th>
                    <th>Blog Sub Category</th>
                    <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                       <tr>
                                       <th scope="col">#</th>
                    <th scope="col">Blog Category</th>
                    <th>Blog Sub Category</th>
                    <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php echo $sub_category; ?> 
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->








            <!-- Footer -->
           
            <?php include('include/footeradd.php');?>
</body>

</html>