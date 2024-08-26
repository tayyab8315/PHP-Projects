<?php  
include('include/header.php');
error_reporting(0);
$track_status="";
if(isset($_POST['track_btn'])){
   $tarck_num= $_POST['track_number'];
   $query2 = "SELECT * FROM `order` WHERE `order_number` = '".$tarck_num."' ORDER BY `order_id` DESC";
   $run2  = mysqli_query($conn, $query2);
   $row  = mysqli_fetch_array($run2);
   $query_user = "SELECT * FROM `user_order_info` WHERE `order_number` = '".$tarck_num."' ORDER BY `user_order_id` DESC";
   $run_user  = mysqli_query($conn, $query_user);
   $row_user  = mysqli_fetch_array($run_user);

 $order_staus= $row['order_status'];
if( $order_staus=='Pending'){
$track_status="Your order has been processed and will reach you within 6-7 working days";
}
elseif( $order_staus=='Preparing'){
$track_status="Your order is almost ready and will reach you within 5-6 working days";
}
elseif( $order_staus=='Delivered'){
$track_status="Your order is Delivered to Your Post Office  <span class='fw-bolder'>".$row_user['post']."</span>";
}else{
    $track_status="This Order Number Does Not Exist Please Enter Valid Order Number";  
}


}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400&display=swap" rel="stylesheet">
  
    <link rel="stylesheet" href="include/style.css">
<link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
         *{
        font-family:Source Sans Pro;
      }
      h1,h2,h3,h4,h5,h6{
      font-family: 'Jost', sans-serif;
      /* font-family: Jost, Helvetica, Arial, Lucida, sans-serif; */
     }
     .order_success{
  height: 50vh !important;
}
</style>

<title>Arostore</title>
    <link rel="icon" type="image/png" href="assets/images/title.png" />
</head>

    <div class="conatiner text-center order_success my-5 pt-5 px-5">
        <h1>Track Your Order</h1>
<br>
<div class="row">
    <div class="col">

    </div>
    <div class="col-6">
    <form method="post">

<div class="mb-3">

  <input type="Text" name="track_number" placeholder="Enter Your Order Number" class="form-control" id="exampleInputPassword1">
</div>

<button type="submit" name="track_btn" class="btn bg-warning text-light px-4 py-2">Track</button>
</form>


<p class="mt-5"><?php echo $track_status;?></p>
    </div>
    <div class="col">

    </div>
</div>

    </div>
  </head>
  <body>
   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php include('include/footer.php'); ?>