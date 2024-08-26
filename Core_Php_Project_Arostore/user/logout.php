<?php  
session_start();
if(isset($_SESSION['user_id'])){
  $adminid =   $_SESSION['user_id'];
  $username =  $_SESSION['user_email'];
  unset($adminid);
  unset($username);
  session_destroy();
  
}
header('Location:login.php');
?>