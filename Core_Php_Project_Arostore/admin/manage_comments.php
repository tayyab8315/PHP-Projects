<?php
session_start();
include('include/connection.php');

// fetch data from manage_website tbl
$query  = "SELECT * FROM `blog_comment` order by comment_id DESC ";
$data   = mysqli_query($conn,$query);
$serial = 0;
$category =$messages=$prodt=$commentssss='';
while($row = mysqli_fetch_array($data)){
    $serial = $serial + 1;
    $comment_id          = $row['comment_id'];
    $blog_id        = $row['blog_id'];
    $user_name         = $row['user_name'];
    $email     = $row['email'];
    $comment     = $row['comment'];
    $timestamp = strtotime($row['comment_time']);
    $formattedTime = date("d F Y, h:i A", $timestamp);

// fetch data from manage_website tbl
$query22  = "SELECT * FROM `blog` WHERE blog_id = '".$blog_id."' ";
$data22   = mysqli_query($conn,$query22);
$row22 = mysqli_fetch_array($data22);
if($row22){
    $blog_title=$row22['blog_title'];
}else{
    $blog_title='blog deleted';
}

    $cmt_delete_btn = '<a href="delete_category.php?delete_comt_id='.$comment_id.'" class="btn btn-danger btn-sm">Delete</a>';

    $commentssss .='<tr class="text-center">
                    <td>'.$serial.'</td>
                    <td>'.$user_name.'</td>
                    <td>'.$email.'</td>
                    <td>'.$blog_title.'</td>
                    <td>'.$comment.'</td>
                   
                  <td>'.$formattedTime.'</td>
                  <td>
                  <div class="btn-group">
                      '.$cmt_delete_btn.'
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
                            <h1 class="m-0 font-weight-bold text-primary float-left">Manage Comments</h1>
                          
                
        
                
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                        <th>#</th>
                    <th>Name</th>
   
                    <th>Email</th>
                    <th>Blog</th>
                    <th>Comment</th>
                  
                    <th>Comment Time</th>
                    <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                       <tr>
                                       <th>#</th>
                     <th>Name</th>
   
                    <th>Email</th>
                    <th>Blog</th>
                    <th>Comment</th>
                  
                    <th>Comment Time</th>
                    <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php echo $commentssss ; ?>
                                       
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