<?php
include('include/connection.php');
session_start();
$item_id = $_POST['id'];
foreach($_SESSION['cart'] as $key=> $value){
    if($key==$_POST['item_name']){
    unset($_SESSION['cart'][$key]);
    $_SESSION['cart']=array_values($_SESSION['cart']);                           }
                                          }

                                
?>