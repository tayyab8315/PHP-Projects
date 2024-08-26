<?php
session_start();
include('include/connection.php');
if(isset($_GET['updateproid'])){
    $cat_id_upd=$_GET['updateproid'];
}
$cat =$categor='';
// fetch cat data
$query  = "SELECT * FROM `manage_category` ";
$data   = mysqli_query($conn,$query);
$category = '';
while($row    = mysqli_fetch_array($data)){
    $catid = $row['cat_id'];
    $cat = $row['category'];
    $categor .= '<option class="form-control" value='.$catid.'>'.$cat.'</option>';
}
$query11  = "SELECT * FROM `sub_category` ";
$data11   = mysqli_query($conn,$query11);
$sub_categor = '';
while($row    = mysqli_fetch_array($data11)){
    $sub_catid = $row['sub_cat_id'];
    $sub_cat = $row['sub_category'];
    $sub_categor .= '<option class="form-control" value='.$sub_catid.'>'.$sub_cat.'</option>';
}
if(isset($_POST['add_product'])){
    $prod_category  = $_POST['categories'];
    $sub_cat        = $_POST['sub_categories'];
    $prod_tit       = $_POST['prod_tit'];
    $product_price  = $_POST['product_price'];
    $product_Desc   = $_POST['product_Desc']; 
    $product_status = 'Draft';
    $product_img    = $_FILES['product_img']['name']; 
    $tmp_name       = $_FILES['product_img']['tmp_name'];
     $path="assets/upload_images/$product_img";
     move_uploaded_file($tmp_name,$path);
 
     $product_sub_img1    = $_FILES['product_sub_img1']['name']; 
     $sub_img1_tmp_name       = $_FILES['product_sub_img1']['tmp_name'];
      $sub_img1_path="assets/upload_images/$product_sub_img1";
      move_uploaded_file($sub_img1_tmp_name,$sub_img1_path);
 
      $product_sub_img2    = $_FILES['product_sub_img2']['name']; 
      $sub_img2_tmp_name       = $_FILES['product_sub_img2']['tmp_name'];
       $sub_img2_path="assets/upload_images/$product_sub_img2";
       move_uploaded_file($sub_img2_tmp_name,$sub_img2_path);
 
       $product_sub_img3    = $_FILES['product_sub_img3']['name']; 
       $sub_img3_tmp_name       = $_FILES['product_sub_img3']['tmp_name'];
        $sub_img3_path="assets/upload_images/$product_sub_img3";
        move_uploaded_file($sub_img3_tmp_name,$sub_img3_path);
 
        $product_sub_img4    = $_FILES['product_sub_img4']['name']; 
        $sub_img4_tmp_name       = $_FILES['product_sub_img4']['tmp_name'];
         $sub_img4_path="assets/upload_images/$product_sub_img4";
         move_uploaded_file($sub_img4_tmp_name,$sub_img4_path);




$status_update = "UPDATE manege_product SET category='".$prod_category."',sub_category='".$sub_cat."',product_title='".$prod_tit."',product_price='".$product_price."',product_desc='".$product_Desc."',product_img='".$product_img."',sub_img1='".$product_sub_img1."',sub_img2='".$product_sub_img2."',sub_img3='".$product_sub_img3."',sub_img4='".$product_sub_img4."' WHERE  product_id ='".$cat_id_upd."'";
if(mysqli_query($conn,$status_update)){
    header('Location:manage_products.php');
}else{
    echo "Fail";
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
            <h1 class="m-0 font-weight-bold text-primary float-left">Update Products</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                
                <a href="manage_products.php" type="button" class="btn btn-sm btn-danger">
                    Back
                </a>
                </div>
            </div>


            <form method="POST" enctype="multipart/form-data" class="py-4">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Select Category</label>
                            <select name="categories" id="select_cat" class="form-control" >
                                    <?php echo $categor; ?>
                            </select>
                        </div>
                    </div>  
                    <div class="col-6">
                            <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Sub_Category</label>
                            <select name="sub_categories"  id="show_sub_cat" class="form-control" >
                                    <?php echo $sub_categor; ?>
                            </select>
                            </div>
                    </div>
                    <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Product Title</label>
                                <input type="text" class="form-control" name="prod_tit">
                            </div>
                    </div>
                    <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Product Price</label>
                                <input type="text" class="form-control" name="product_price">
                            </div>
                    </div>
                    <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Product Description</label>
                                <textarea name="product_Desc" type="text" class="form-control" id=""  rows="1"></textarea>
                
                            </div>
                    </div>
                    <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Product Image</label>
                                <input type="file"  class="form-control" name="product_img">
                            </div>
                    </div>
                    <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Product 1<sup>st</sup> Sub-Image</label>
                                <input type="file"  class="form-control" name="product_sub_img1">
                            </div>
                    </div>
                    <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Product 2<sup>nd</sup> Sub-Image</label>
                                <input type="file"  class="form-control" name="product_sub_img2">
                            </div>
                    </div>
                    <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Product 3<sup>rd</sup> Sub-Image</label>
                                <input type="file"  class="form-control" name="product_sub_img3">
                            </div>
                    </div>
                    <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Product 4<sup>th</sup> Sub-Image</label>
                                <input type="file"  class="form-control" name="product_sub_img4">
                            </div>
                    </div>
                </div>
                <button type="submit" name="add_product" class="btn btn-outline-secondary">Submit</button>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('#select_cat').change(function(){
                var catid = $('#select_cat').val();
               
                $.ajax({
                    url:'select_cat.php',
                    type:'POST',
                    data: {cid:catid},
                    success: function(data){
                        $('#show_sub_cat').html(data);
                    }
                });
            });
        });
    </script>