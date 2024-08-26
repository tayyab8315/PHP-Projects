<?php
session_start();

include('include/connection.php');
    if(!isset($_SESSION['admin_id'])){
        header('Location:index.php');
    }

if(isset($_GET['productid'])){
  echo  $produc_id      = $_GET['productid'];
  echo  $produc_status  = $_GET['status'];

    $prod_status_update = "UPDATE manege_product SET product_status = '".$produc_status."' WHERE product_id = '".$produc_id."'";
    if(mysqli_query($conn,$prod_status_update)){
        
        header('Location:manage_products.php');
    }else{
        echo "Fail";
    }
}

if(isset($_GET['blogid'])){
    $blog_id      = $_GET['blogid'];
    $blog_status  = $_GET['status'];
  
      $blog_status_update = "UPDATE blog SET status = '".$blog_status."' WHERE blog_id = '".$blog_id."'";
      if(mysqli_query($conn,$blog_status_update)){
          
          header('Location:manage_blog.php');
      }else{
          echo "Fail";
      }
  }

?>