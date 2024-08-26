<link rel="stylesheet" href="assets\css\style.css">
    <link rel="stylesheet" href="include/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<?php
include('include/connection.php');
$searc_data="";
if (isset($_POST['data'])) {
    $query = $_POST['data'];
    $query = '%' . $query . '%';

    $stmt = $conn->prepare('SELECT * FROM `manege_product` WHERE product_status= "Publish" AND product_title LIKE ?');
    $stmt->bind_param('s', $query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $averageRating = $row['avg_rating'];
if ($averageRating < 1.5) {
  $star_ratingsss ='        
  <i class="fa-solid  fa-star"></i>
  <i class="fa-regular   fa-star"></i>
  <i class="fa-regular  fa-star"></i>
  <i class="fa-regular   fa-star"></i>
  <i class="fa-regular   fa-star"></i> ';

} elseif ($averageRating >= 1.5 && $averageRating < 2.5) {
   $star_ratingsss ='                
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid fa-star"></i>
   <i class="fa-regular fa-star"></i>
   <i class="fa-regular fa-star"></i>
   <i class="fa-regular fa-star"></i>';
} elseif ($averageRating >= 2.5 && $averageRating < 3.5) {
  $star_ratingsss ='        
  <i class="fa-solid  fa-star"></i>
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid fa-star"></i>
   <i class="fa-regular   fa-star"></i>
   <i class="fa-regular   fa-star"></i> ';
} elseif ($averageRating >= 3.5 && $averageRating < 4.5) {
  $star_ratingsss ='        
  <i class="fa-solid fa-star"></i>
  <i class="fa-solid  fa-star"></i>
  <i class="fa-solid fa-star"></i>
  <i class="fa-solid fa-star"></i>
 <i class="fa-regular fa-star"></i>';
} else { // $averageRating >= 4.5
  $star_ratingsss ='        
  <i class="fa-solid  fa-star"></i>
  <i class="fa-solid  fa-star"></i>
  <i class="fa-solid  fa-star"></i>
  <i class="fa-solid  fa-star"></i>
  <i class="fa-solid  fa-star"></i> ';
}

            $searc_data.='

            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-3 mx-auto">
            
             <div class="productee_card border">
              <div class="imgBox">
              
                <img src="../admin/assets/upload_images/'.$row['product_img'].'" alt="product_img" class="mouse img-fluid">
              </div>
            
              <div class="contentBox">
              <a href="single_product.php?pd_id='.$row['product_id'].'">
                <div class="reting mb-2">'.$star_ratingsss.'</div>
                <h3>'.$row['product_title'].'</h3>
                <h2 class="price">$'.$row['product_price'].'</h2>
          
                
                <form action="manage_cart.php" method="POST">
                
                <div class="buy" role="group" aria-label="Basic example">
                <button type="submit" class="btn "  data-bs-toggle="tooltip" name="add_cart" data-bs-placement="bottom" title="Add To Cart"><i class="fa-solid fa-cart-shopping  fa-2xl pt-2 "></i></button>
            
                <button type="submit" class="btn " data-bs-toggle="tooltip" name="add_wishlist" data-bs-placement="bottom" title="Add to Wishlist"><i class="fa-solid fa-heart fa-2xl mt-1"></i></button>
          
              </div>
                <input type="hidden" value="'.$row['category'].'" name="p_cat">
                <input type="hidden" value="'.$row['product_id'].'" name="prod_id">
                <input type="hidden" value="'. $row['product_title'].'" name="item_name">
                <input type="hidden" value="'.$row['product_price'].'" name="price">
                <input type="hidden" value="'.$row['product_img'].'" name="img">
                    </form>
             
                    </a>
              </div>
            </div>
              </div>
          
          
          ';
        }
    } else {
      $searc_data.= '<li class="list-group-item border-0">No Product Found</li>';
    }
}

?>
<div class="container">
  <div class="row">
<?php  echo $searc_data ;?>
  </div>
</div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
