<?php
include('include/connection.php');


                                          if(isset($_GET['wish_id'])){
                                           $wislist_id = $_GET['wish_id'];
                                           $del_query='DELETE FROM `wishlist` WHERE wishlisted_pd_id = "'.$wislist_id.'" ';
                                           $delete1 = mysqli_query($conn, $del_query);
                                           if($delete1) {
                                           echo  header('Location:my_wishlist.php') ;
                                           }
                                        }
?>