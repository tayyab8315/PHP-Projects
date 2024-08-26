<?php
include('include/header.php');
include('include/connection.php');
if(isset($_SESSION['user_id'])){
 $user_id = $_SESSION['user_id'];

}

// Initialize an empty array for order data
$order_data = [];

if (isset($_SESSION['order'])) {
    // Retrieve the order data from the session
    $order_data = $_SESSION['order'];
    // print_r($order_data);
  }
    $itemname=$total_bill= $order_product="";
     // Loop through the order data and populate the form fields
     foreach ($order_data as $product) {
      $item_name = $product['item_name'];
      $price = $product['price'];
      $product_quantity = $product['product_quantity'];
      $status="Pending";

      //         $randomNumber = rand(); // Generates a random integer
      // echo $randomNumber .'<br>';
      $single_itme_total = $product_quantity *  $price;
      $total_bill=intval($total_bill) + $single_itme_total;
      $fetch_query  = "SELECT * FROM manege_product WHERE product_title='".$item_name."'";
      $data_from_db   = mysqli_query($conn,$fetch_query);
      $fetched_data = mysqli_fetch_array($data_from_db);
      // Add more fields as needed
      $order_product.='
      <div class="col-12 col-md-12 mb-3" style=" border-radius:20px;  ">
      <div class="card border-0 "  style="box-shadow:5px 5px 10px gray"; border-radius:20px; >
    <div class="row g-0">
      <div class="col-4 " >
        <img src="../admin/assets/upload_images/'.$fetched_data['product_img'].'" class="img-fluid h-100 " alt="order_product_img">
      </div>
      <div class="col-8" style="background-color:#F9F3CC; ">
        <div class="card-body">
         <div class="row">
          <div class="col-6">
          <h5 class="">Product Name</h5>
          <br>
          <p class="">Product Price</p>
          <p class="">Quantity</p>
          <p class="">Total</p>
          </div>
          <div class="col-6 text-end">
          <h5 class="">'.$item_name.'</h5>
          <br>
          <p class="">$'.$price.'</p>
          <p class="">'.$product_quantity.'</p>
          <p class="">$'.$single_itme_total.'</p>
          </div>
         </div>
  
        </div>
      </div>
    </div>
  </div>
      </div>
      
      ';
  
}   
if(isset($_POST['place_order'])){
  $randomNumber = rand();
  $order_number= 'Aro'.$randomNumber;
  foreach ($order_data as $product) {
    $item_name = $product['item_name'];
    $price = $product['price'];
    $product_quantity = $product['product_quantity'];
    $status="Pending";
  $insert_query_message = "INSERT INTO `order`(`user_id`, `product_name`, `product_price`, `product_quantity`, `order_status`,`order_number`,`order_time`) VALUES ('".$user_id."', '".$item_name."' , '".$price."','".$product_quantity."','".$status."','".$order_number."',NOW())";                                      
      if(mysqli_query($conn,$insert_query_message)){
          //  header('Location:contact_us.php');
           // echo "success";
       }else{
           echo 'fail';
       }
      }
        

     $name=  $_POST['name'];
      $phone= $_POST['tele'];
     $city= $_POST['city'];
     $post= $_POST['pooffice'];
    $address= $_POST['address'];

    $insert_query_user_data = "INSERT INTO user_order_info(user_id,name, mobile, city, post,address,order_number) VALUES ('".$user_id."','".$name."','".$phone."','".$city."','".$post."','".$address."','".$order_number."')";                                      
    if(mysqli_query($conn,$insert_query_user_data)){
    
         // echo "success";
     }else{
         echo 'fail';
     }
     if(isset($_SESSION['cart'])){
            unset( $_SESSION['cart']);
          }
          if(isset($_SESSION['order'])){
            unset( $_SESSION['order']);
         
          }
          echo "<script>
          var orderNumber = '  $order_number  ';
          var newUrl = 'success_order.php?order_num=' + orderNumber;
          window.location.href = newUrl;
      </script>";
          //  header("Location:success_order.php?order_num=$order_number");
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
  
<!-- <title>Magic Zoom Plus</title> -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="include/style.css">
<link rel="stylesheet" href="assets/css/style.css">

<title>Arostore</title>
    <link rel="icon" type="image/png" href="assets/images/title.png" />
    <style>
         *{
        font-family:Source Sans Pro;
      }
      h1,h2,h3,h4,h5,h6{
      font-family: 'Jost', sans-serif;
      /* font-family: Jost, Helvetica, Arial, Lucida, sans-serif; */
     }
    </style>
<div class="container text-end mb-5 ">
    <h1 class="my-5 text-center">Order Confirmation</h1>
    <a href="my_cart.php" class=" btn btn-warning text-light">Make Changes</a>
    <div class="row">
        <div class="col-12 col-md-6 text-start">
        <h2 class="my-5 ">Your Order</h2>
        <div class="row">

<?php echo $order_product;?>
<h2 class="my-5">Total Amount    $<?php echo $total_bill;?></h2> 
</div>
        </div>
        <div class="col-12 col-md-6 text-start">
        <h2 class="my-5  ps-5">Delivery Details</h2>
        <form method="post" class="ms-5 text-start">
  <div class="mb-3">
   
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Name" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
   
   <input type="tel" class="form-control" name="tele" id="exampleInputEmail1" placeholder="Mobile" aria-describedby="emailHelp">
 </div>
 <div class="mb-3">
   
   <input type="text" class="form-control" name="city"  id="exampleInputEmail1" placeholder="City" aria-describedby="emailHelp">
 </div>
 <div class="mb-3">
   
   <input type="text" class="form-control" name="pooffice" id="exampleInputEmail1" placeholder="Post Office" aria-describedby="emailHelp">
 </div>
 <div class="mb-3">
  <textarea class="form-control" name="address" placeholder="Complete Address" id="floatingTextarea2" style="height: 100px"></textarea>
</div>
  <br>
  <button type="submit mt-5"  name="place_order" class="btn text-light btn-warning">Place Order</button>
</form>

   <p class="text-secondary  ps-5 mt-5"><i class="fa-solid fa-truck-fast pe-2"></i>Free Worldwide Shipping on all orders over $100</p>
    <p class="text-secondary  ps-5"><i class="fa-solid fa-business-time  pe-2"></i>Delivers in 3-7 working Days </p>
    <p class="text-secondary  ps-5"><i class="fa-regular fa-money-bill-1 pe-2"></i>Payment Will Be On Delivery </p>
      
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
<?php include('include/footer.php');?>