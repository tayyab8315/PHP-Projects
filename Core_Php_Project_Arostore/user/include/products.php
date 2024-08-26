
<?php
   session_start();
include('connection.php');
// fetch data from manege_product table
$fetch_query  = "SELECT * FROM manege_product WHERE product_status='Publish'";
$data_from_db   = mysqli_query($conn,$fetch_query);
$count   = mysqli_num_rows($data_from_db );
$product  = '';
for($i=1;$i<=$count; $i++){
$fetched_data = mysqli_fetch_array($data_from_db);
  $product .= '
  <div class="item1">
    <div class="card ">
    <a  href="single_product.php?pd_id='.$fetched_data['product_id'].'" >
      <img src="assets/images/'.$fetched_data['product_img'].'" class="card-img-top" alt="...">
      </a>
     
      <div class="card-body ">
      <a href="single_product.php?pd_id='.$fetched_data['product_id'].'" class="text-dark text-decoration-none"> <h5 class="card-title fw-bolder">'.$fetched_data['product_title'].'</h5></a>
     
      <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
        
      <h5 class="card-title fw-bold lh-lg">$'.$fetched_data['product_price'].'</h5>
      </div>
    </div>
  </div>
';

}
if(empty($_SESSION['cart'])){
  $total_items ='0'; 
}else{
  $total_items= count( $_SESSION['cart']);
}
?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<body class="product_body">
  <div class="container-flui">
<div class="carousel-wrapper">
  <div class="owl-carousel owl-theme ">

    <!-- <div class="item">
      <div class="card">
        <img src="assets/images/Product-8-600x600.jpg" class="card-img-top" alt="...">
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
          <button type="button" class="btn warning carousalbtn1">Add to Cart</button>
          <button type="button" class="btn warning carousalbtn2">Add to Wishlist</button>
        </div>
        <div class="card-body">
          <h5 class="card-title fw-bolder">A9 Gold With Apple M1</h5>
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
          <h5 class="card-title fw-bold">$150.00-$200.00</h5>
        </div>
      </div>
    </div> -->
    <?php
    echo $product;
    ?>



    <!-- <div class="item">
      <div class="card">
        <img src="assets/images/Product-23-600x600.jpg" class="card-img-top" alt="...">
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
          <button type="button" class="btn warning   carousalbtn1 ">Add to Cart</button>
          <button type="button" class="btn warning  carousalbtn2">Add to Wishlist</button>
        </div>
        <div class="card-body">
          <h5 class="card-title fw-bolder">Air Cooler With A-RGB</h5>
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
          <h5 class="card-title ">$150.00</h5>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="card">
        <img src="assets/images/Product-5-600x600.jpg" class="card-img-top" alt="...">
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
          <button type="button" class="btn warning carousalbtn1">Add to Cart</button>
          <button type="button" class="btn warning carousalbtn2">Add to Wishlist</button>
        </div>
        <div class="card-body">
          <h5 class="card-title fw-bolder">A9 Gold With Apple M1</h5>
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
          <h5 class="card-title fw-bold">$150.00-$200.00</h5>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="card">
        <img src="assets/images/Product-3-600x600.jpg" class="card-img-top" alt="...">
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
          <button type="button" class="btn warning carousalbtn1">Add to Cart</button>
          <button type="button" class="btn warning carousalbtn2">Add to Wishlist</button>
        </div>
        <div class="card-body">
          <h5 class="card-title fw-bolder">A9 Gold With Apple M1</h5>
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
          <h5 class="card-title fw-bold">$150.00-$200.00</h5>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="card">
        <img src="assets/images/Product-15-600x600.jpg" class="card-img-top" alt="...">
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
          <button type="button" class="btn warning carousalbtn1">Add to Cart</button>
          <button type="button" class="btn warning carousalbtn2">Add to Wishlist</button>
        </div>
        <div class="card-body">
          <h5 class="card-title fw-bolder">A9 Gold With Apple M1</h5>
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
          <h5 class="card-title fw-bold">$150.00-$200.00</h5>
        </div>
      </div>
    </div>
     -->
  </div>
</div>
</div>

<button type="button" class="cart " data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fa-solid fa-cart-shopping fa-xl"></i>
<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
    <?php
    echo $total_items;
    ?>
    <span class="visually-hidden">unread messages</span>
  </span>
</button>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
    <button type="button" class="btn-close m-3 bg-warning p-2  rounded rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body">
      <div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="card text-center bg-transparent">
                <div class="card-header rounded-top fs-2 bg-warning text-white">
                    My Cart
                </div>
                <div class="card-body border border-white border-top-0 rounded-bottom">
                    <table class="table text-white ">
                        <thead  class="text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Prduct Name</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Quantity</th>
                                <th>Total</th>
                        
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                         
                            if(isset($_SESSION['cart'])){
                                $serial = '';
                                foreach($_SESSION['cart'] as $key => $value){
                                    $serial = $key + 1;
                                 $signle_product_total = $value['price'] * $value['quantity'] ;
                                    $total = $total + $signle_product_total;
                                    echo '<tr class="text-center " >
                                            <th scope="row">'.$serial.'</th>
                                            <td>'.$value['item_name'].'</td>
                                            <td>'.$value['price'].'<input type="hidden" class="item_price" value="'.$value['price'].'"></td>
                                            <td class="w-25 ">
                                                    <input type="number" name="item_name" class="w-25" value="'.$value['quantity'].'">
                                            </td>
                                            <td class="item_total">'.$signle_product_total.'</td>
                                            <td>
                                            <form action="manage_cart.php" method="POST">
                                            <button name="remove_item" class="btn btn-danger btn-sm">Remove</button>
                                            <input type="hidden" name="item_name" value="'.$value['item_name'].'">
                                            </form>
                                            </td>
                                                
                                        </tr>';
                                }
                            }
                            ?>
           
          
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        <div class="col-md-3   p-0">

        <div class=" fs-2 bg-warning  rounded-top  py-2 text-white text-center">
                    Order Details
                </div>
                <div class=" border border-white rounded-bottom border-top-0 p-3">
<br>
<br>
                <h3 class=" text-white">
                  Total Bill:
                  <?php
                  echo $total; ?>
                </h3>
               
                <div class="form-check">
  <input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label fs-5 text-white" for="flexCheckDefault">
    Cash On Delivery
  </label>
</div>
<br>
<button class=" btn w-100 fs-5 bg-primary py-1 text-white text-center">
                    Order Now
                          </button>

                </div>
        </div>
    </div>
    
</div>
      </div>
    </div>
  </div>
</div>

<!-- <a href="my_cart.php" class="cart"><i class="fa-solid fa-cart-shopping fa-xl"></i></a> -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
      margin: 35,
      nav: true,
      loop:true,
      navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 3
        }
      }
    });
  </script>
</html>