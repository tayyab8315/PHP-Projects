<?php
include('include/connection.php');
session_start();
if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
 
}
if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['add_cart'])){
        if(isset($_SESSION['cart'])){
            // The array_column() function returns the values from a single column in the input array.
         $myitem = array_column($_SESSION['cart'],'item_name');
            // The in_array() function searches an array for a specific value
            if(in_array($_POST['item_name'],$myitem)){
                echo "<script>
                    alert('item already added');
                    window.location.href='shop.php';
                  </script>";
            }else{
           $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count] = array('product_id'=>$_POST['prod_id'],'item_name'=>$_POST['item_name'],'price'=>$_POST['price'],'quantity'=>1);
            echo "<script>
            alert('item added Into Cart');
            window.location.href='shop.php';
          </script>";
            }



        }else{
            $_SESSION['cart'][0] = array('item_name'=>$_POST['item_name'],'price'=>$_POST['price'],'quantity'=>1);
            // print_r($_SESSION['cart'][0]);
            echo "<script>
                    alert('item added Into Cart');
                    window.location.href='shop.php';
                  </script>";
        }




    }

            if(isset($_POST['remove_item'])){


        foreach($_SESSION['cart'] as $key=> $value){
            if($value['item_name']==$_POST['item_name']){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            echo "<script>
            alert('item Removed');
           window.location.href='shop.php';
          </script>";
                                                      }
                                                  }
                                            }
                                        }
                                      }else{

                                        echo "<script>
                                        alert('You Must Login First');
                                        window.location.href='login.php';
                                    
                                      </script>";
                                      }
                                      
                                        if(isset($_SESSION['user_id'])){
                                          $user_id = $_SESSION['user_id'];
                                          $fetch_query  = "SELECT * FROM wishlist WHERE user_account_id =$user_id  ";
                                        $data_from_db   = mysqli_query($conn,$fetch_query);
                                        $count   = mysqli_num_rows($data_from_db );
                                        for($i=1;$i<=$count; $i++){
                            
                                    
                                        $fetched_data = mysqli_fetch_array($data_from_db);
                                        }
                                        if(isset($_POST['add_wishlist'])){
  


                                          if($fetched_data['product_name'] ==  $_POST['item_name']){
                                            echo "<script>
                                            alert('item is already Exists in Wishlist');
                                            window.location.href='shop.php';
                                        
                                          </script>";
                                           }else{
                                            $insert_query_message = "INSERT INTO `wishlist` (`product_id`, `product_img`, `product_name`, `product_price`,`user_account_id`) VALUES ('" . $_POST['prod_id'] . "','" . $_POST['img'] . "','" . $_POST['item_name'] . "','" . $_POST['price'] . "','" . $user_id . "')";                                     
                                            if(mysqli_query($conn,$insert_query_message)){
                                                echo "<script>
                                                alert('item added To Wishlist');
                                            window.location.href='shop.php';
                                        
                                              </script>";
                                        
                                              
                                            }else{
                                                echo 'fail';
                                            }
                                           }
                                        
                                        
                                        
                                                                                }
                                        }else{

                                          echo "<script>
                                          alert('You Must Login First');
                                          window.location.href='login.php';
                                      
                                        </script>";
                                        }
                                       
                                            

                                  


?>