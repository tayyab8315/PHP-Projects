<?php
session_start();
include('include/connection.php');

 echo $id = $_POST['cid'];
$query  = "SELECT * FROM sub_category WHERE category = '".$id."'";
$data   = mysqli_query($conn,$query);

$categor = '';
while($row    = mysqli_fetch_array($data)){
    $subcat = $row['sub_cat_id'];
    $sub_category = $row['sub_category'];
    $categor .= '<option class="form-control" value='.$subcat.'>'.$sub_category.'</option>';
}
echo $categor;
?>