<?php
session_start();
include('include/connection.php');
 
// $category = $status_btn=$cat_update_btn=$cat_delete_btn='';
// fetch data from manage_website tbl
$update_query  = "SELECT * FROM manege_product";
$data   = mysqli_query($conn,$update_query);
$serial = 0;
$product = '';
while($row = mysqli_fetch_array($data)){
    $serial = $serial + 1;
    $product_id          = $row['product_id'];
    $category            = $row['category'];
    $sub_category        = $row['sub_category'];
    $product_title       = $row['product_title'];
    $product_price       = $row['product_price'];
    $product_desc        = $row['product_desc'];
    $product_img         = $row['product_img'];
    $sub_img1         = $row['sub_img1'];
    $sub_img2         = $row['sub_img2'];
    $sub_img3         = $row['sub_img3'];
    $sub_img4         = $row['sub_img4'];
    $product_status      = $row['product_status'];

            // fetch data from manage_category table
        $query1  = "SELECT 	* FROM manage_category WHERE cat_id = '".$category."'";
            $data1   = mysqli_query($conn,$query1);
            $category1 = '';
            while( $row1 = mysqli_fetch_array($data1)){
            $category1 .=$row1['category'];
        }
            // fetch data from sub_category table
            $query2  = "SELECT 	* FROM sub_category WHERE sub_cat_id= '".$sub_category."'";
            $data2   = mysqli_query($conn,$query2);
            $sub_category2 = '';
            while($row2 = mysqli_fetch_array($data2)){ 
             $sub_category2 .=$row2['sub_category'];
            
            }  
          
    if($product_status=='Publish'){
        $status_btn='<a href="update_products.php?productid='.$product_id.'&status=Draft" class="btn btn-success ">Published</a>';
    }
        else{
            $status_btn='<a href="update_products.php?productid='.$product_id.'&status=Publish" class="btn btn-danger ">Draft</a>';
 
        }
        
    $cat_update_btn ='<a href="update_prod.php?updateproid='.$product_id.'" class="btn btn-warning">Update</a>';
    $cat_delete_btn = '<a href="delete_products.php?deleteproid='.$product_id.'" class="btn btn-danger">Delete</a>';
        $product .= '<tr class="pt-5 pe-5 text-center">
                            <td class="pt-3">'.$serial.'</td>
                            <td class="pt-3">'.$category1.'</td>
                                <td class="pt-3 text-center">'.$sub_category2.'</td>
                                <td class="pt-3 text-center">'.$product_title.'</td>
                                <td class="pt-3 text-center">'.$product_price.'</td>
                                <td class="pt-3 text-center">'.$product_desc.'</td>
                                <td class="pt-3 text-center"> <img src="assets/upload_images/'.$product_img.'" alt="" width="100px" height="110px" ></td>
                                <td class="pt-3 " >
                                <div class="row g-2 ">
                                <img src="assets/upload_images/'.$sub_img1.'" alt="" width="50px" height="50px" class="col-6 mt-2 ge-2">
                                <img src="assets/upload_images/'.$sub_img2.'" alt="" width="50px" height="50px" class="col-6 mt-2">
                                <img src="assets/upload_images/'.$sub_img3.'" alt="" width="50px" height="50px" class="col-6 mt-2 ge-2">
                                <img src="assets/upload_images/'.$sub_img4.'" alt="" width="50px" height="50px" class="col-6 mt-2">
                                </div>
                                </td>
                              
                                <td class="pt-3 text-center" >'.$status_btn.'</td>
                                <td class="pt-3 text-center  pe-2" >
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
                            <h1 class="m-0 font-weight-bold text-primary float-left">Manage Products</h1>
                          
                
                <a href="add_products.php" type="button" class="btn btn-sm btn-outline-secondary mt-2 float-right">
                    <span data-feather="calendar"></span>
                    Add Product
                </a>
                
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                        <th scope="col" class="text-center">#</th>
                        <th scope="col"class="text-center" >Category</th>
                        <th scope="col" class="text-center">Sub-Category</th>
                        <th scope="col" class="text-center">Title</th>
                        <th scope="col" class="text-center">Price</th>
                        <th scope="col" class="text-center">Description</th>
                        <th scope="col" class="text-center">Image</th>
                        <th scope="col" class="text-center">Product Sub-Images</th>
                        <!-- <th scope="col">Product 2nd Sub-Image</th>
                        <th scope="col">Product 3rd Sub-Image</th>
                        <th scope="col">Product 4th Sub-Image</th> -->
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                       <tr>
                                       <th scope="col" class="text-center">#</th>
                        <th scope="col"class="text-center" >Category</th>
                        <th scope="col" class="text-center">Sub-Category</th>
                        <th scope="col" class="text-center">Title</th>
                        <th scope="col" class="text-center">Price</th>
                        <th scope="col" class="text-center">Description</th>
                        <th scope="col" class="text-center">Image</th>
                        <th scope="col" class="text-center">Product Sub-Images</th>
                        <!-- <th scope="col">Product 2nd Sub-Image</th>
                        <th scope="col">Product 3rd Sub-Image</th>
                        <th scope="col">Product 4th Sub-Image</th> -->
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php echo $product; ?>
                                       
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