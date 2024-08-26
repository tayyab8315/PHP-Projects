<?php 
session_start();

include('include/connection.php');
if(isset($_GET['order_id'])){
   $order_id      = $_GET['order_id'];
  $order_status  = $_GET['status'];
  
      $order_status_update = "UPDATE `order` SET `order_status` = '".$order_status."' WHERE `order_id` ='".$order_id."' ";
      if(mysqli_query($conn,$order_status_update)){
          header('Location:order.php');
      }else{
          echo "Fail";
      }
  }


?>