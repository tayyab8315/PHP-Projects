<?php
session_start();
include('include/connection.php');
// update category Status

if(isset($_GET['blog_catid'])){
    $blog_cat_id      = $_GET['blog_catid'];
    $blog_cat_status  = $_GET['status'];

    $blog_cat_status_update = "UPDATE blog_category SET status = '".$blog_cat_status."' WHERE blog_cat_id = '".$blog_cat_id."'";
    if(mysqli_query($conn,$blog_cat_status_update)){
        header('Location:manage_blog_category.php');
    }else{
        echo "Fail";
    }
}
?>