<?php
session_start();
include('include/connection.php');

// fetch data from manage_website tbl
$query  = "SELECT * FROM `manage_category`";
$data   = mysqli_query($conn,$query);
$serial = 0;
$pp_category = '';
while($row = mysqli_fetch_array($data)){
    $serial = $serial + 1;
    $catid         = $row['cat_id'];
    $cat         = $row['category'];
    $cat_img     = $row['cat_img'];
    $cat_status     = $row['status'];
    if($cat_status=='Active'){
        $status_btn = '<a href="update_product_cat_status.php?status_catid='.$catid.'& status=De-Active" class="btn btn-success">Active</a>';
    }
        else{
            $status_btn = '<a href="update_product_cat_status.php?status_catid='.$catid.'& status=Active" class="btn btn-danger">De-Active</a>';
 
        }
        
    $cat_update_btn = '<a href="update_category.php?update_cat_id='.$catid.'" class="btn btn-warning">Update</a>';
    $cat_delete_btn = '<a href="delete_category.php?delete_cat_id='.$catid.'" class="btn btn-danger">Delete</a>';

    $pp_category .='<tr class="text-center">
                    <td>'.$serial.'</td>
                    <td>'.$cat.'</td>
                    <td><img src="assets/upload_images/'.$cat_img.'" alt="" width="60px" height="60px" ></td>
                    <td>
                        <div class="btn-group">
                            '.$cat_update_btn.$cat_delete_btn.'
                        </div>
                    </td>
                  <td>'.$status_btn.'</td>
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
                            <h1 class="m-0 font-weight-bold text-primary float-left">Manage Categories</h1>
                          
                
                <a href="add_category.php" type="button" class="btn btn-sm btn-outline-secondary mt-2 float-right">
                    <span data-feather="calendar"></span>
                    Add Category
                </a>
                
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                        <th>#</th>
                    <th>Title</th>
                    <th>image</th>
                    <th>Action</th>
                    <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                       <tr>
                                       <th>#</th>
                    <th>Title</th>
                    <th>image</th>
                    <th>Action</th>
                    <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php echo $pp_category; ?>
                                       
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
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Arostore 2023</span>
                    </div>
                </div>
            </footer>
        
            <?php include('include/footeradd.php');?>

</body>

</html>