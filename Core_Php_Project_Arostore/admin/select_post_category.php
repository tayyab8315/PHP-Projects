<?php
session_start();
include('include/connection.php');
 
 echo $id = $_POST['blog_cid'];
$query  = "SELECT * FROM blog_sub_cat WHERE blog_cat_id = '".$id."'";
$data   = mysqli_query($conn,$query);

$blog_category = '';
while($row    = mysqli_fetch_array($data)){
    $blog_subcat_id = $row['blog_sub_cat_id'];
    $blog_sub_category = $row['blog_sub_cat'];
    $blog_category .= '<option class="form-control" value='.$blog_subcat_id.'>'.$blog_sub_category.'</option>';
}
echo $blog_category;