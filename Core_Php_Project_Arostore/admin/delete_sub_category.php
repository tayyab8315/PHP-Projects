<?php
session_start();
include('include/connection.php');
if(isset($_GET['sub_catid'])){
 $sub_cat_id = $_GET['sub_catid'];
  }
  $delete_sub_cat = "DELETE FROM sub_category WHERE sub_cat_id = '".$sub_cat_id."'";
          $delete2 = mysqli_query($conn,$delete_sub_cat);
          if($delete2){
            // echo 'Delete success';
              header('Location:manage_sub_category.php');
          }else{
              echo 'Delete Failed';
          }

          if(isset($_GET['blog_sub_catid'])){
            $blog_sub_cat_id = $_GET['blog_sub_catid'];
             }
             $delete_blog_sub_cat = "DELETE FROM blog_sub_cat WHERE blog_sub_cat_id = '".$blog_sub_cat_id."'";
                     $delete2 = mysqli_query($conn,$delete_blog_sub_cat);
                     if($delete2){
                       // echo 'Delete success';
                         header('Location:manage_blog_sub_cat.php');
                     }else{
                         echo 'Delete Failed';
                     }



?>