<?php
session_start();
include('include/connection.php');


                          if(isset($_GET['deleteproid'])){
                              $sub_cat_id = $_GET['deleteproid'];
                            }
                            $delete_pro = "DELETE FROM manege_product
                           WHERE product_id = '".$sub_cat_id."'";
                           $delete3 = mysqli_query($conn,$delete_pro);
                           if($delete3){
                                      echo 'Delete success';
                          //  header('Location:manage_products.php');
                           }else{
                           echo 'Delete Failed';
                            }

                            if(isset($_GET['deletepostid'])){
                               $pst_id = $_GET['deletepostid'];
                              }
                              $delete_pro = "DELETE FROM blog
                             WHERE blog_id = '".$pst_id."'";
                             $delete3 = mysqli_query($conn,$delete_pro);
                             if($delete3){
                                        // echo 'Delete success';
                             header('Location:manage_blog.php');
                             }else{
                             echo 'Delete Failed';
                              }
?>