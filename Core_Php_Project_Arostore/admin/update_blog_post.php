<?php
session_start();
include('include/connection.php');
if(isset($_GET['updatepostid'])){
    $cat_id_upd=$_GET['updatepostid'];
}
    $blog_sub_category=$blog_category='';
// fetch cat data
$query  = "SELECT * FROM `blog_category` ";
$data   = mysqli_query($conn,$query);
$category = '';
while($row    = mysqli_fetch_array($data)){
    $blog_catid = $row['blog_cat_id'];
    $blog_cat = $row['blog_cat'];
    $blog_category .= '<option class="form-control" value='.$blog_catid.'>'.$blog_cat.'</option>';
}
$query11  = "SELECT * FROM `blog_sub_cat` ";
$data11   = mysqli_query($conn,$query11);
$sub_categor = '';
while($row    = mysqli_fetch_array($data11)){
    $blog_sub_catid = $row['blog_sub_cat_id'];
    $blog_sub_cat = $row['blog_sub_cat'];
    $blog_sub_category .= '<option class="form-control" value='.$blog_sub_catid.'>'.$blog_sub_cat.'</option>';
}


if(isset($_POST['add_post'])){
   $post_category  = $_POST['post_category'];
   $post_sub_cat        = $_POST['post_sub_category'];
   $post_title       = $_POST['post_title'];
   $post_Desc   = $_POST['post_Desc']; 
   $post_status = 'Draft';
   $post_img    = $_FILES['post_img']['name']; 
   $post_tmp_name       = $_FILES['post_img']['tmp_name'];
   $path="assets/upload_images/$post_img";
    move_uploaded_file($post_tmp_name,$path);
    $status_update = "UPDATE blog SET blog_cat_id='".$post_category."',blog_sub_cat_id='".$post_sub_cat."',blog_title='".$post_title."',blog_feature_img='".$post_img."',blog_disc='".$post_Desc."' WHERE  blog_id ='".$cat_id_upd."'";
    if(mysqli_query($conn,$status_update)){
        header('Location:manage_blog.php');
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
            <h1 class="m-0 font-weight-bold text-primary float-left">Update Post</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                
                <a href="manage_blog.php" type="button" class="btn btn-sm btn-danger">
                    Back
                </a>
                </div>
            </div>


            <form method="POST" enctype="multipart/form-data" class="py-4">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Select Post Category</label>
                            <select name="post_category" id="blog_cat" class="form-control" >
                                    <?php echo $blog_category; ?>
                            </select>
                        </div>
                    </div>  
                    <div class="col-6">
                            <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"> Select Post Sub Category</label>
                            <select name="post_sub_category"  id="blog_sub_cat" class="form-control" >
                                    <?php echo $blog_sub_category; ?>
                            </select>
                            </div>
                    </div>
                    <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Post Heading</label>
                                <input type="text" class="form-control" name="post_title">
                            </div>
                    </div>
                    <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Post Content</label>
                                <textarea name="post_Desc" type="text" class="form-control" id=""  rows="1"></textarea>
                
                            </div>
                    </div>
                    <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Post Image</label>
                                <input type="file" class="form-control "  name="post_img">
                            </div>
                    </div>
                    
                </div>
                <button type="submit" name="add_post" class="btn btn-outline-secondary">Update</button>
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
            $('#blog_cat').change(function(){
                var catid = $('#blog_cat').val();
                // alert(catid);
                $.ajax({
                    url:'select_post_category.php',
                    type:'POST',
                    data: {blog_cid:catid},
                    success: function(data){
                        $('#blog_sub_cat').html(data);
                    }
                });
            });
        });
    </script>