<?php
include('connection.php');
session_start();
  //   if(!isset($_SESSION['user_id'])){
  //     header('Location:login.php');
     
  // } 
  $count_wishlist=0;
  if(isset($_SESSION['user_id'])){
     $user_id = $_SESSION['user_id'];
     $fetch_query  = "SELECT * FROM wishlist WHERE user_account_id =$user_id  ";
  $data_from_db   = mysqli_query($conn,$fetch_query);
  $count_wishlist   = mysqli_num_rows($data_from_db );
   
  }
  
  // $fetch_query  = "SELECT * FROM wishlist WHERE user_account_id =$user_id  ";
  // $data_from_db   = mysqli_query($conn,$fetch_query);
  // $count_wishlist   = mysqli_num_rows($data_from_db );

  $count="";
  if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cartCount = count($_SESSION['cart']);
} else {
    $cartCount = 0;
} 




?>


<link rel="stylesheet" href="assets\css\style.css">
    <link rel="stylesheet" href="include/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400&display=swap" rel="stylesheet">
<style>
  
  /* For WebKit (Chrome) */
body::-webkit-scrollbar {
  width: 12px; /* Width of the scrollbar */
}

body::-webkit-scrollbar-thumb {
  background-color: #ffc107; /* Color of the thumb (drag handle) */
  border-radius: 6px; /* Rounded corners for the thumb */
}

body::-webkit-scrollbar-track {
  background-color: black; /* Color of the track (bar behind the thumb) */
}

/* General styles for your notification class */
body {

  overflow-y: scroll; /* Enable vertical scrollbar when content overflows */

}

  /* For WebKit (Chrome) */
  .offcanvas-body::-webkit-scrollbar {
  width: 12px; /* Width of the scrollbar */
}

.offcanvas-body::-webkit-scrollbar-thumb {
  background-color: #ffc107; /* Color of the thumb (drag handle) */
  border-radius: 6px; /* Rounded corners for the thumb */
}

.offcanvas-body::-webkit-scrollbar-track {
  background-color: black; /* Color of the track (bar behind the thumb) */
}

/* General styles for your notification class */
.offcanvas-body {

  overflow-y: scroll; /* Enable vertical scrollbar when content overflows */
  

}
    
*{
        font-family:Source Sans Pro;
      }
      h1,h2,h3,h4,h5,h6{
      font-family: 'Jost', sans-serif;
      /* font-family: Jost, Helvetica, Arial, Lucida, sans-serif; */
     }
     .card-img-top-1{
      height: 10vh !important;
      width: 5vw !important;
      border-radius:50%;
     }

</style>
      <div class="container-fluid top-nav py-1">
      <div class="container ">
        <div class="row my-2">
          <div class="top_nav_left text-warning d-none col-12 col-sm-12 col-md-4 d-lg-block col-lg-4 col-xl-4 pt-2">
Hot days! -50% Get ready for summer!
          </div>
          <div class="top_nav_left text-warning text-center col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-2">
          <i class="fa-brands fa-facebook-f p-2"></i> <i class="fa-brands fa-twitter mx-4 mx-md-2 p-2 "></i> <i class="fa-brands fa-instagram me-4 me-md-2 p-2"></i> <i class="fa-brands fa-youtube  p-2 "></i>
          </div>
          <div class="top_nav_right text-center col-12 col-sm-12 col-md-6  col-lg-4 col-xl-4 ">
            <a href="track_order.php" class="btn bg-warning  fw-bolder"> Track Order</a>
          </div>
        </div>
        </div>
      </div>
      <div class="container-fluid bg-warning navbar_sticky">
        <div class="container px-2">
          <div class="row">
            <div class="col-3 col-sm-4 col-md-2 col-lg-2 ps-4 pt-3 logo">
              <img src="assets/images/logo-demo-400.png" alt="this_is_logo" class="img-fluid ">
            </div>
          
            <div class="col-9 col-sm-8 col-md-10 col-lg-10 fs-4 fw-lg-bolder  text-end  pt-3  carts ">
            <a class="text-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"    data-bs-toggle="tooltip"  data-bs-placement="bottom" title="Search"><i class="fa-solid fa-magnifying-glass me-4  fa-md-xl  "></i></a>

<div class="offcanvas offcanvas-top h-100 " tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
  <div class="offcanvas-header bg-warning">
    <h5 id="offcanvasTopLabel">Find Products</h5>
    <button type="button" class="btn-close text-reset bg-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body text-center">
  <input type="text" class="form-control w-100 mt-4"  id="dataInput" placeholder="Enter Product Name">
  <br>
    <button class="btn btn-warning text-white mb-4" id="submitButton">Search</button>
    
    
    <div id="result" class="row"></div>


  </div>
</div>
            <a  href="myorder.php" class="text-decoration-none user_profile_btn text-dark"  data-bs-toggle="tooltip"  data-bs-placement="bottom" title="Profile"><i class="fa-regular fa-user  me-3  fa-md-xl  d-inline"></i> </a>
            <a type="button" class="btn btn-md-lg fs-4 position-relative" href="my_wishlist.php" data-bs-toggle="tooltip"  data-bs-placement="bottom" title="Wishlist">
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger fs-6 px-1 py-1">
    <?php echo $count_wishlist; ?>
  </span>
  <i class="fa-regular fa-heart fa-md-xl me-1 d-inline"></i><span class="d-inline fs-md-4 "></span>
</a>
       
               <!-- Button trigger modal -->
    <a type="button" class="btn btn-md-lg fs-4 position-relative" href="my_cart.php" data-bs-toggle="tooltip"  data-bs-placement="bottom" title="Cart">
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger fs-6 px-1 py-1">
    <?php echo $cartCount; ?>
  </span>
      <i class="fa-solid fa-cart-shopping fa-md-xl d-inline"></i> <span class="d-inline fs-md-4 "></span>
</a>
    
  
             
            </div>
          </div>
        </div>
     
        <div class=" text-center">
          <div class="row navbar_menu">

       
    <!-- <div class="col-0 col-md-3 ">

    </div> -->
     <div class="col-12 col-md-12 fs-md-5 ">
      
          <nav class="navbar navbar-expand-md  ">
    
            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon text-dark"><i class="fa-solid fa-bars pt-2"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav fw-bolder mx-auto mb-2 mb-lg-0 text-start">
                <li class="nav-item dropdown  ">
                 
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
    
                </li>
                <li class="nav-item me-2 ">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item me-2 ">
                  <a class="nav-link " aria-current="page" href="shop.php">Shop</a>
                </li>
                <li class="nav-item me-2 ">
                <a class="nav-link " aria-current="page" href="blog.php">Blog</a>
                </li>
                <li class="nav-item me-2 ">
                
                  <a class="nav-link " aria-current="page" href="about_us.php">About Us</a>
                </li>
                <li class="nav-item me-2 ">
                <a class="nav-link " aria-current="page" href="contact_us.php">Contact</a>
            
                </li>
                <li class="nav-item me-5 ">
                <a class="nav-link " aria-current="page" href="faqs.php">FAQs</a>
                </li>
                <!-- <li class="nav-item  navbtn d-none d-md-block  mt-2 ps-5">
                  <a class="nav-link d-inline  " aria-current="page" href="#">Extra Sale <span class="d-inline">30% </span> Off  <i class="fa-solid fa-greater-than ms-2"></i></a>
                </li> -->
              </ul>
    
            </div>
          </nav>
          </div>
          <div class=" col-12 col-md-4">
      
          </div>
          </div>
        </div>

      </div>   

     

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#submitButton').click(function() {
                var inputData = $('#dataInput').val();

                $.ajax({
                    type: 'POST',
                    url: 'process.php', // PHP script to handle the data
                    data: { data: inputData },
                    success: function(response) {
                        $('#result').html(response); // Display the response on the page
                    }
                });
            });
        });

$(document).ready(function () {
            $(".delete-button").click(function () {
                var orderId = $(this).data("order-id");
                $.ajax({
                    type: "POST",
                    url: "delete_order.php",
                    data: { orderId: orderId },
                    success: function (response) {
                      var phpResponse = response;
                        alert(phpResponse);
                        // You can update the table or do other actions based on the response
                    }
                });
            });
        });
 
    </script>