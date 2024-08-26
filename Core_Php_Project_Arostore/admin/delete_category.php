<?php
session_start();
include('include/connection.php');

if(isset($_GET['delete_cat_id'])){
    echo  $cat_id = $_GET['delete_cat_id'];
    }
    $delete_cat = "DELETE FROM manage_category
         WHERE cat_id = '".$cat_id."'";
            $delete1 = mysqli_query($conn, $delete_cat);
            if($delete1){
              // echo 'Delete success';
                header('Location:manage_category.php');
            }else{
                echo 'Delete Failed';
            }



            if(isset($_GET['delete_blog_cat_id'])){
                echo  $blog_cat_id = $_GET['delete_blog_cat_id'];
                }
                $delete_blog_cat = "DELETE FROM blog_category
                     WHERE blog_cat_id = '".$blog_cat_id."'";
                        $delete1 = mysqli_query($conn, $delete_blog_cat);
                        if($delete1){
                          // echo 'Delete success';
                            header('Location:manage_blog_category.php');
                        }else{
                            echo 'Delete Failed';
                        }


                        if(isset($_GET['delete_review_id'])){
                          echo  $rev_id = $_GET['delete_review_id'];
                          }
                          $delete_review = "DELETE FROM  user_review
                               WHERE review_id = '".$rev_id."'";
                                  $delete1 = mysqli_query($conn, $delete_review);
                                  if($delete1){
                                    // echo 'Delete success';
                                      header('Location:manage_review.php');
                                  }else{
                                      echo 'Delete Failed';
                                  }

                                  if(isset($_GET['delete_comt_id'])){
                                    echo  $com_id = $_GET['delete_comt_id'];
                                    }
                                    $delete_comment = "DELETE FROM  blog_comment
                                         WHERE comment_id = '".$com_id."'";
                                            $delete3 = mysqli_query($conn, $delete_comment);
                                            if($delete3){
                                              // echo 'Delete success';
                                                header('Location:manage_comments.php');
                                            }else{
                                                echo 'Delete Failed';
                                            }
          

            
?>