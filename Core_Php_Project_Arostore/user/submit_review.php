<?php
include('include/connection.php');

$user_rating=$user_name=$user_review=$date='';
if(isset($_POST['rating_data'])){
    $product_id=$_POST['product_id'];
    $user_rating=$_POST['rating_data'];
    $user_name=$_POST['user_name'];
    $user_review=$_POST['user_review'];
    $date= date("Y-m-d h:i:s");
 
}

$insert_review = "INSERT INTO user_review (product_id,user_rating,user_name,user_review)VALUES('".$product_id."','".$user_rating."','". $user_name."','". $user_review."')";
if(mysqli_query($conn,$insert_review)){
    // header('Location:manage-slider.php');
    // echo "success";
}else{
    echo 'fail';
}

// $update_rating = "UPDATE manege_product SET avg_rating = $avg_rat  where product_id = $product_id ";
// if (mysqli_query($conn, $update_rating)) {
//     // Update successful
//     echo "Success";
// } else {
//     // Handle the error
//     echo "Error: " . mysqli_error($conn);
// }
   



?>