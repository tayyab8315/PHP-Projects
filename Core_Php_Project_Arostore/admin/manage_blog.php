<?php
session_start();
include('include/connection.php');
 
// $category = $status_btn=$cat_update_btn=$cat_delete_btn='';
// fetch data from manage_website tbl
$update_query  = "SELECT * FROM blog";
$data   = mysqli_query($conn,$update_query);
$serial = 0;
$blog =  $post_time='';
while($row = mysqli_fetch_array($data)){
    $serial = $serial + 1;
    $blog_id                     = $row['blog_id'];
    $blog_category_id            = $row['blog_cat_id'];
    $blog_sub_category_id        = $row['blog_sub_cat_id'];
    $blog_title                  = $row['blog_title'];
    $blog_desc                   = $row['blog_disc'];
    $blog_img                    = $row['blog_feature_img'];
    $blog_status                 = $row['status'];
    $fetch_time                  = $row['date'];
    $post_time                   = date('d M Y ',strtotime($fetch_time ));


            // fetch data from manage_category table
        $query1  = "SELECT 	* FROM blog_category WHERE blog_cat_id = '".$blog_category_id."'";
            $data1   = mysqli_query($conn,$query1);
            $category1 = '';
            while( $row1 = mysqli_fetch_array($data1)){
            $category1 .=$row1['blog_cat'];
        }
            // fetch data from sub_category table
            $query2  = "SELECT 	* FROM blog_sub_cat WHERE blog_sub_cat_id= '".$blog_sub_category_id."'";
            $data2   = mysqli_query($conn,$query2);
            $sub_category2 = '';
            while($row2 = mysqli_fetch_array($data2)){ 
             $sub_category2 .=$row2['blog_sub_cat'];
            
            }  
          
    if($blog_status=='Publish'){
        $status_btn='<a href="update_products.php?blogid='.$blog_id.'&status=Draft" class="btn btn-success">Published</a>';
    }
        else{
            $status_btn='<a href="update_products.php?blogid='.$blog_id.'&status=Publish" class="btn btn-danger">Draft</a>';
 
        }
        
    $cat_update_btn ='<a href="update_blog_post.php?updatepostid='.$blog_id.'" class="btn btn-warning">Update</a>';
    $cat_delete_btn = '<a href="delete_products.php?deletepostid='.$blog_id.'" class="btn btn-danger">Delete</a>';
        $blog .= '<tr class="text-center">
                            <td>'.$serial.'</td>
                            <td>'.$category1.'</td>
                                <td>'.$sub_category2.'</td>
                                <td>'.$blog_title.'</td>
                                <td>'.$blog_desc.'</td>
                                <td>'.$post_time.'</td>
                                <td> <img src="assets/upload_images/'.$blog_img.'" alt="" width="50px" height="50px"></td>
                                <td>'.$status_btn.'</td>
                                <td>
                                <div class="btn-group">
                                '.$cat_update_btn.$cat_delete_btn.'
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
                            <h1 class="m-0 font-weight-bold text-primary float-left">Manage Posts</h1>
                          
                
                <a href="add_blog_post.php" type="button" class="btn btn-sm btn-outline-secondary mt-2 float-right">
                    <span data-feather="calendar"></span>
                    Add Post
                </a>
                
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                        <th scope="col">#</th>
                        <th scope="col">Post Category</th>
                        <th scope="col">Post Sub-Category</th>
                        <th scope="col">Post Heading</th>
                        <th scope="col">Post Description</th>
                        <th scope="col">Post Time</th>
                        <th scope="col">Post Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                       <tr>
                                       <th scope="col">#</th>
                        <th scope="col">Post Category</th>
                        <th scope="col">Post Sub-Category</th>
                        <th scope="col">Post Heading</th>
                        <th scope="col">Post Description</th>
                        <th scope="col">Post Time</th>
                        <th scope="col">Post Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php echo $blog; ?>
                                       
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