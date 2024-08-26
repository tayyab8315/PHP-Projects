<?php  
session_start();
if(isset($_SESSION['admin_id'])){
  $adminid =  $_SESSION['admin_id'];
  $username =  $_SESSION['username'];
  unset($adminid);
  unset($username);
  session_destroy();
  
}
header('Location:login.php');
?>