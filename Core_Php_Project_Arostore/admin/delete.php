<?php
session_start();
include('include/connection.php');
if(isset($_GET['deleteid'])){
  $id = $_GET['deleteid'];
}
$delete_query = "DELETE FROM manage_slider
 		WHERE id = '".$id."'";
        $delete = mysqli_query($conn, $delete_query);
        if($delete){
            header('Location:manage-slider.php');
        }else{
            echo 'Delete Failed';
        }

?>