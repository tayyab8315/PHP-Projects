<?php
include('include/connection.php');

// fetch id from index page using query string
if(isset($_GET['pd_id'])){
 $product_id = $_GET['pd_id'];
}

// fetch data from 
$fetch_query  = "SELECT * FROM manege_product WHERE product_id = '".$product_id."' ";
$Fetchdata1    = mysqli_query($conn,$fetch_query);
$fetchresult = mysqli_fetch_array($Fetchdata1);
$p_img      = $fetchresult['product_img'];
$p_title    = $fetchresult['product_title'];
$p_cat      = $fetchresult['category'];
$p_subcat   = $fetchresult['sub_category'];
$price      = $fetchresult['product_price'];
$description  = $fetchresult['product_desc'];

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Arostore</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">

        <div class="col-md-7">
            <img src="assets/images/<?php echo $p_img; ?>" alt="" style="height:90vh; width:100%;">
        </div>
        


        
        <div class="col-md-5 p-5 rating">
      <h3 class="card-title fw-bolder"><?php echo $p_title; ?></h3>
        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
                                                    <form action="manage_cart.php" method="POST">
                                                    <h5 class="card-title fw-bold">$<?php echo $price; ?></h5>
                                                        <br>
                                                        <hr>
                                                        <br>
                                                        <p class="fs-5">
                                                        <?php echo $description; ?>
                                                            <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe eius iste, illum molestias fugiat quaerat. -->
                                                        </p>
                                                        <br>
                                                        <div class="row">
                                                        <div class="col">  
                                                           <button type="submit" name="add_cart" class="btn w-100  py-2 fs-5  warning1 ">Add To Cart</button>

                                                        <!-- <a href="" name="add_cart" class="btn w-100  py-2 fs-5  warning1">Add To Cart</a> -->
                                                        </div>
                                                        <div class="col">
                                                        <button type="submit" name="add_wishlist" class="btn w-100  py-2 fs-5  warning1 ">Add To Wishlist</button>
                                                        <!-- <a href="" class="btn w-100  py-2 fs-5 warning1">Add To Wishlist</a> -->
                                                        </div>
                                                    </div>
                                                    <input type="hidden" value="<?php echo $p_cat; ?>" name="p_cat">
                                                    <input type="hidden" value="<?php echo $p_subcat; ?>" name="sub_cat">
                                                    <input type="hidden" value="<?php echo $p_title; ?>" name="item_name">
                                                    <input type="hidden" value="<?php echo $price; ?>" name="price">
                                                        </form>
        <br>
     <br>
    <div class="payments text-center p-4 fs-5">
     <img src="assets/images/payments-2.png" class="w-100" alt="" >
    <br>
  <br>
                                        
  Guaranted Safe Checkout

 </div>
                                    
  <br>
 <div>
 <p class="text-secondary"><i class="fa-solid fa-truck-fast pe-2"></i>Free Worldwide Shipping on all orders over $100</p>
  <p class="text-secondary"><i class="fa-solid fa-business-time  pe-2"></i>Delivers in 3-7 working Days </p>
    </div>
    </div>
    </div>
   </div>
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