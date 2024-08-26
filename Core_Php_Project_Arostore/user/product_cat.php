
<?php
include('include/connection.php');
$blog=$product_categor= $top_rated= $cards= $tabs=$product_kol  = '';
if(isset($_GET['prod_cat_id'])){
 $product_cat_idd= $_GET['prod_cat_id'];

}



 
// fetch data from manege_product table
$fetch_query  = "SELECT * FROM manege_product WHERE category='".$product_cat_idd."' && product_status='Publish'";
$data_from_db   = mysqli_query($conn,$fetch_query);
$count   = mysqli_num_rows($data_from_db );
for($i=1;$i<=$count; $i++){
$fetched_data = mysqli_fetch_array($data_from_db);
$averageRating = $fetched_data['avg_rating'];
  if ($averageRating < 1.5) {
    $star_ratings ='        
    <i class="fa-solid  fa-star"></i>
    <i class="fa-regular   fa-star"></i>
    <i class="fa-regular  fa-star"></i>
    <i class="fa-regular   fa-star"></i>
    <i class="fa-regular   fa-star"></i> ';

 } elseif ($averageRating >= 1.5 && $averageRating < 2.5) {
     $star_ratings ='                
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
     <i class="fa-regular fa-star"></i>
     <i class="fa-regular fa-star"></i>
     <i class="fa-regular fa-star"></i>';
 } elseif ($averageRating >= 2.5 && $averageRating < 3.5) {
    $star_ratings ='        
    <i class="fa-solid  fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
     <i class="fa-regular   fa-star"></i>
     <i class="fa-regular   fa-star"></i> ';
 } elseif ($averageRating >= 3.5 && $averageRating < 4.5) {
    $star_ratings ='        
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid  fa-star"></i>
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid fa-star"></i>
   <i class="fa-regular fa-star"></i>';
 } else { // $averageRating >= 4.5
    $star_ratings ='        
    <i class="fa-solid  fa-star"></i>
    <i class="fa-solid  fa-star"></i>
    <i class="fa-solid  fa-star"></i>
    <i class="fa-solid  fa-star"></i>
    <i class="fa-solid  fa-star"></i> ';
 }
 $p_price=$fetched_data['product_price'];
 $p_title=$fetched_data['product_title'];
  $product_kol.= '

  <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-3 mx-auto">
  
    <div class="productee_card border">
    <div class="imgBox">
    
      <img src="../admin/assets/upload_images/'.$fetched_data['product_img'].'" alt="product_img" class="mouse img-fluid">
    </div>
  
    <div class="contentBox">
    <a href="single_product.php?pd_id='.$fetched_data['product_id'].'">
      <div class="reting mb-2">'.$star_ratings.'</div>
      <h3>'.$fetched_data['product_title'].'</h3>
      <h2 class="price">$'.$fetched_data['product_price'].'</h2>

      
      <form action="manage_cart.php" method="POST">
      
      <div class="buy" role="group" aria-label="Basic example">
      <button type="submit" class="btn "  data-bs-toggle="tooltip" name="add_cart" data-bs-placement="bottom" title="Add To Cart"><i class="fa-solid fa-cart-shopping  fa-2xl pt-2 "></i></button>
  
      <button type="submit" class="btn " data-bs-toggle="tooltip" name="add_wishlist" data-bs-placement="bottom" title="Add to Wishlist"><i class="fa-solid fa-heart fa-2xl mt-1"></i></button>
      
    </div>
    <input type="hidden" value="'.$fetched_data['category'].'" name="p_cat">
    <input type="hidden" value="'.$fetched_data['product_id'].'" name="prod_id">
    <input type="hidden" value="'. $fetched_data['product_title'].'" name="item_name">
    <input type="hidden" value="'.$fetched_data['product_price'].'" name="price">
    <input type="hidden" value="'.$fetched_data['product_img'].'" name="img">
     
          </form>
   
          </a>
    </div>
  </div>
    </div>




    
';

}

$fetch_query_for_blog_catego22  = "SELECT * FROM manage_category  WHERE cat_id ='".$product_cat_idd."'";
$data_from_blog_catego_db22   = mysqli_query($conn,$fetch_query_for_blog_catego22);
$count_category   = mysqli_num_rows($data_from_blog_catego_db22 );
  $fetched_data_from_blog_catego22 = mysqli_fetch_array($data_from_blog_catego_db22);


$fetch_query_for_blog_catego  = "SELECT * FROM manage_category WHERE status='Active'";
$data_from_blog_catego_db   = mysqli_query($conn,$fetch_query_for_blog_catego);
$count_category   = mysqli_num_rows($data_from_blog_catego_db );
for($j=1;$j<=$count_category; $j++){
  $fetched_data_from_blog_catego = mysqli_fetch_array($data_from_blog_catego_db);
  $product_categor.='<a href="product_cat.php?prod_cat_id='.$fetched_data_from_blog_catego['cat_id'].'" class="btn text-start"><li class="border-0 fs-5">'.$fetched_data_from_blog_catego['category'].'</li></a>';

}





$select_query_for_top_rated="SELECT * FROM `manege_product` ORDER BY `manege_product`.`avg_rating` DESC";
$top_rated_from_product_db  = mysqli_query($conn,$select_query_for_top_rated);
for($k=1;$k<=6; $k++){
  $fetched_data_top_rated = mysqli_fetch_array($top_rated_from_product_db );
  $averageRating = $fetched_data_top_rated['avg_rating'];
  if ($averageRating < 1.5) {
    $star_ratings ='        
    <i class="fa-solid  fa-star"></i>
    <i class="fa-regular   fa-star"></i>
    <i class="fa-regular  fa-star"></i>
    <i class="fa-regular   fa-star"></i>
    <i class="fa-regular   fa-star"></i> ';

 } elseif ($averageRating >= 1.5 && $averageRating < 2.5) {
     $star_ratings ='                
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
     <i class="fa-regular fa-star"></i>
     <i class="fa-regular fa-star"></i>
     <i class="fa-regular fa-star"></i>';
 } elseif ($averageRating >= 2.5 && $averageRating < 3.5) {
    $star_ratings ='        
    <i class="fa-solid  fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
     <i class="fa-regular   fa-star"></i>
     <i class="fa-regular   fa-star"></i> ';
 } elseif ($averageRating >= 3.5 && $averageRating < 4.5) {
    $star_ratings ='        
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid  fa-star"></i>
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid fa-star"></i>
   <i class="fa-regular fa-star"></i>';
 } else { // $averageRating >= 4.5
    $star_ratings ='        
    <i class="fa-solid  fa-star"></i>
    <i class="fa-solid  fa-star"></i>
    <i class="fa-solid  fa-star"></i>
    <i class="fa-solid  fa-star"></i>
    <i class="fa-solid  fa-star"></i> ';
 }

  $top_rated.='
  <a href="single_product.php?pd_id='.$fetched_data_top_rated['product_id'].'" class="btn">
  <div class="card mb-3">
  <div class="row g-0">
  <div class="col-4">
    <img src="../admin/assets/upload_images/'.$fetched_data_top_rated['product_img'].'" class="img-fluid rounded h-100"  " alt="top_rated_product_img">
  </div>
  <div class="col-8 text-start">
    <div class="card-body">
    <br>
      <p class="card-text">'.$star_ratings.'</p>
      <h5 class="card-title">'.$fetched_data_top_rated['product_title'].'</h5>
      <p class="card-text">$'.$fetched_data_top_rated['product_price'].'</p>
    </div>
  </div>
</div>
</div>
</a>
  ';
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS Link -->
    <link rel="stylesheet" href="assets\css\style.css">
    <link rel="stylesheet" href="include/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   
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
  </head>
  <?php include('include/header.php'); ?>
  <body>
  
  <div class="card text-white ">
    <img src="../admin/assets/upload_images/<?php echo $fetched_data_from_blog_catego22['cat_img'] ;?>" class="blog_banner img-fluid" alt="product_category_banner_img">
    <div class="card-img-overlay text-center">
      <h1 class="card-title text-end"><?php echo $fetched_data_from_blog_catego22['category'] ;?></h1>
    </div>
  </div>
    <div class="container-fluid">
       
        <div class="row ">

        <div class="col-md-4 pt-5 d-md-none "  style="background-color:#F9F5F6; ">
<h2 class=" bg-dark text-light p-3">Categories</h2>
<ul class="list-group list-group-flush catir me-4 border-0">
  <?php echo  $product_categor ; ?>

</ul>
<h2 class="mt-4  bg-dark text-light p-3">Recent Posts</h2>
<?php echo   $top_rated;?>


            </div>


            <div class=" col-md-8 pt-5">
            <h2 class=" bg-dark text-light p-3 my-4 d-md-none">Posts</h2>
              <div class="row">
          
          <?php echo  $product_kol ;?>
          
              </div>
            </div>
            <div class="col-md-4 pt-5 d-none d-md-block" style="background-color:#F9F5F6; ">
<h2 class=" bg-dark text-light p-3">Categories</h2>
<ul class="list-group list-group-flush catir me-4 border-0">
  <?php echo  $product_categor ; ?>

</ul>
<h2 class="mt-4  bg-dark text-light p-3">Top Rated Produtucts</h2>
<?php echo  $top_rated ;?>


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
<?php include('include/footer.php');?>