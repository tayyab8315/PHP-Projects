<?php
session_start();
include('include/connection.php');
if(isset($_GET['status_catid'])){
    $cat_id_upd=$_GET['status_catid'];
  $upd_status = $_GET['status'];

$status_update = "UPDATE manage_category SET status = '".$upd_status."' WHERE cat_id = '".$cat_id_upd."'";
if(mysqli_query($conn,$status_update)){
    header('Location:manage_category.php');
}else{
    echo "Fail";
}
}


if(isset($_GET['faqs_catid'])){
    $faqs_id_upd=$_GET['faqs_catid'];
  $update_status = $_GET['status'];

$faqs_status_update = "UPDATE faqs SET status = '".$update_status."' WHERE faqs_id = '".$faqs_id_upd."'";
if(mysqli_query($conn,$faqs_status_update)){
    header('Location:manage_faqs.php');
}else{
    echo "Fail";
}
}
if(isset($_GET['msg_id'])){
    $msg_id_upd=$_GET['msg_id'];
  $update_status = $_GET['status'];

$msg_status_update = "UPDATE contact_us_message SET message_status = '".$update_status."' WHERE message_id = '".$msg_id_upd."'";
if(mysqli_query($conn,$msg_status_update)){
    header('Location:manage_messages.php');
}else{
    echo "Fail";
}
}








?>