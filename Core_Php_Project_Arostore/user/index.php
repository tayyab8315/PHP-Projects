<?php
include('include/connection.php');
$query  = "SELECT * FROM manage_slider WHERE slider_status = 'Active' ";
$data    = mysqli_query($conn,$query);
$count   = mysqli_num_rows($data);
$slider =$blog=  $product=$prod_categories='';
for($i=1;$i<=$count; $i++){
  $result = mysqli_fetch_array($data);
  $id = $result['id'];
  $slider_title = $result['slider_tit'];
  $slider_disc = $result['slider_disc'];
  $slider_img = $result['slider_img'];

  if($i==1){
    $slider .= '
    <div class="carousel-item active text-white text-center"  data-bs-interval="2500">
    <div class="card mb-3 slider_card bg-transparent">
      <div class="row g-0">
        <div class="col-12 col-md-4">
          <img src="../admin/assets/upload_images/'.$slider_img.'" class="img-fluid rounded-start" alt="Slider_img">
        </div>
        <div class="col-12 col-md-8">
          <div class="card-body mt-md-5  ">
              
            <span class="card-title h1 ">'.$slider_title.'</span>
            <p class="card-text fs-4">'.$slider_disc.'</p>
           <a href="shop.php" class="fs-5 button button-2">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
            
            ';

  }else{
    $slider .= '

    <div class="carousel-item text-white text-center"  data-bs-interval="2500">
    <div class="card mb-3 slider_card bg-transparent">
      <div class="row g-0">
        <div class="col-12 col-md-4">
          <img src="../admin/assets/upload_images/'.$slider_img.'" class="img-fluid rounded-start" alt="Slider_img">
        </div>
        <div class="col-12 col-md-8">
          <div class="card-body mt-md-5">
              
            <span class="card-title h1 ">'.$slider_title.'</span>
            <p class="card-text fs-4">'.$slider_disc.'</p>
            <a href="shop.php" class="fs-5 button button-2">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
';
  }

}

$fetch_query_for_blog  = "SELECT * FROM `blog` WHERE status = 'Publish' ORDER BY `blog`.`blog_id` DESC";
$data_from_blog_db   = mysqli_query($conn,$fetch_query_for_blog);
// $count   = mysqli_num_rows($data_from_blog_db );

for($i=1;$i<=3; $i++){
  $fetched_data_from_blog = mysqli_fetch_array($data_from_blog_db);
  $blog_cat = $fetched_data_from_blog['blog_cat_id'];

$blog_disc = $fetched_data_from_blog['blog_disc'];
$blog_short_disc= substr($blog_disc,0,145);

$fetch_query_for_blog_cat  = "SELECT * FROM blog_category WHERE  blog_cat_id = '".$blog_cat."'   ";
$data_from_blog_cat_db   = mysqli_query($conn,$fetch_query_for_blog_cat);
$fetched_data_from_blog_cat = mysqli_fetch_array($data_from_blog_cat_db );
// $formattedDate = date('d-m-Y', strtotime($fetched_data_from_blog_cat['date']));
$blog_cat_name = $fetched_data_from_blog_cat['blog_cat'];

$fetch_query_for_count_comments  = "SELECT * FROM blog_comment WHERE  blog_id = '". $fetched_data_from_blog['blog_id']."'   ";
$count_from_blog_comments_db   = mysqli_query($conn,$fetch_query_for_count_comments);
$total_comments= mysqli_num_rows($count_from_blog_comments_db);
  $blog .= '
  <div class="col-12 col-sm-6 col-lg-4 col-xl-4 mb-3">
  <div class="blog" style="
    background-image: url(../admin/assets/upload_images/'.$fetched_data_from_blog['blog_feature_img'].');
   ">
  
    <div class="title-box">
      <h3 class="blog_heading ">
      '.$fetched_data_from_blog['blog_title'].'
      </h3>
      <hr/>
      <div class="intro ">
       Published By <span class="text-warning">Admin</span>
      </div>
    </div>  
    <div class="info">
      <span>'.$blog_short_disc.'</span>
      <br>
      <br>
      <a href="single_post.php?blog_id='.$fetched_data_from_blog['blog_id'].'" class="btn btn-warning text-white">Read More</a>
    </div>
   
  <div class="blog_footer">
    <div class="icon-holder">
      <span>
    <i class="fa fa-comment"></i>
      <span>'.$total_comments.'</span>
      <space></space>
      <i class="fa fa-calendar"></i>
      <span>'.    date('d-m-Y', strtotime($fetched_data_from_blog['date'] )).'</span>
      <space></space>
      <span>
      <i class="fa-solid fa-clipboard"></i>
        <span>'.$blog_cat_name.'</span>
      </span>
    </div>
  </div>
  
  <div class="color-overlay"></div>
  </div>
  </div>


';
}
$fetch_query = "SELECT * FROM manege_product WHERE product_status='Publish'";
$data_from_db = mysqli_query($conn, $fetch_query);
$count = mysqli_num_rows($data_from_db);
$i = 0;

while ($i < 8 && $fetched_data = mysqli_fetch_array($data_from_db)) {
    $averageRating = $fetched_data['avg_rating'];
    if ($averageRating) {
        if ($averageRating < 1.5) {
            $star_ratings = '
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>';
        } elseif ($averageRating >= 1.5 && $averageRating < 2.5) {
            $star_ratings = '
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>';
        } elseif ($averageRating >= 2.5 && $averageRating < 3.5) {
            $star_ratings = '
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>';
        } elseif ($averageRating >= 3.5 && $averageRating < 4.5) {
            $star_ratings = '
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>';
        } else { // $averageRating >= 4.5
            $star_ratings = '
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>';
        }
    } else {
        $star_ratings = 'Not Yet Rated';
    }

    $product .= '
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3 mx-auto">
        <div class="productee_card border">
            <div class="imgBox">
                <img src="../admin/assets/upload_images/' . $fetched_data['product_img'] . '" alt="product_img" class="mouse img-fluid">
            </div>
            <div class="contentBox">
                <a href="single_product.php?pd_id=' . $fetched_data['product_id'] . '">
                    <div class="reting mb-2">' . $star_ratings . '</div>
                    <h3>' . $fetched_data['product_title'] . '</h3>
                    <h2 class="price">$' . $fetched_data['product_price'] . '</h2>
                    <form action="manage_cart.php" method="POST">
                        <div class="buy" role="group" aria-label="Basic example">
                            <button type="submit" class="btn" data-bs-toggle="tooltip" name="add_cart" data-bs-placement="bottom" title="Add To Cart"><i class="fa-solid fa-cart-shopping fa-2xl pt-2"></i></button>
                            <button type="submit" class="btn" data-bs-toggle="tooltip" name="add_wishlist" data-bs-placement="bottom" title="Add to Wishlist"><i class="fa-solid fa-heart fa-2xl mt-1"></i></button>
                        </div>
                        <input type="hidden" value="' . $fetched_data['category'] . '" name="p_cat">
                        <input type="hidden" value="' . $fetched_data['product_id'] . '" name="prod_id">
                        <input type="hidden" value="' . $fetched_data['product_title'] . '" name="item_name">
                        <input type="hidden" value="' . $fetched_data['product_price'] . '" name="price">
                        <input type="hidden" value="' . $fetched_data['product_img'] . '" name="img">
                    </form>
                </a>
            </div>
        </div>
    </div>';
    
    $i++;
}



$fetch_query_from_prod_cat  = "SELECT * FROM manage_category WHERE status='Active'";
$data_from_prod_cat_db   = mysqli_query($conn,$fetch_query_from_prod_cat);
$count_categories   = mysqli_num_rows($data_from_prod_cat_db );
for($kl=1; $kl<= $count_categories; $kl++){
$fetched_data_from_prod_cat = mysqli_fetch_array($data_from_prod_cat_db);
$prod_categories.='
<div class="item text-center  "><span ><a href="product_cat.php?prod_cat_id='.$fetched_data_from_prod_cat['cat_id'].'&prod_cat='.$fetched_data_from_prod_cat['category'].'&prod_img='.$fetched_data_from_prod_cat['cat_img'].'"><img src="../admin/assets/upload_images/'.$fetched_data_from_prod_cat['cat_img'].'" class="rounded-circle bg-light" alt="product_category_img"> <br>
'.$fetched_data_from_prod_cat['category'].'</a></span></div>';
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Noto+Serif:ital@1&family=Poiret+One&family=Poppins:wght@100;400&family=Rajdhani&family=Sigmar&family=Ubuntu&family=Ysabeau:ital@1&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <!-- <link rel="stylesheet" href="include/style.css"> -->
 

 <link rel="stylesheet" href="assets/css/style.css">
 <link rel="stylesheet" href="include/style.css">
<!-- google fonts  -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400&display=swap" rel="stylesheet">
 <!-- <link rel="stylesheet" href="include/card.css"> -->
 <!-- <link rel="stylesheet" href="assets/ads.css"> -->

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
   integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
   crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- owl-carousal  -->
    <!-- Link to Owl Carousel CSS file (you can download it or use a CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!-- Link to Owl Carousel theme CSS file (you can download it or use a CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
   
   
    <head>
    <title>Aerostore</title>
<link rel="icon" type="image/png" href="assets/images/title.png"/>
</head>
    <style>
        *{
  font-family:Source Sans Pro;
}
h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6{
font-family: 'Jost', sans-serif;
/* font-family: Jost, Helvetica, Arial, Lucida, sans-serif; */
}
.carousel-item{
        width: 100vw !important;
      }
.carousel-item img{
    width: 100% !important;
  
}
.owl-carousel {
       
      position: relative;
        }
        .owl-carousel:hover .owl-nav {
          opacity: 1;
         }
        .category{
        }
        .owl-item {
            padding: 20px;
            margin-right: 10px;
        }
        .owl-item a{
          text-decoration:none;
          color:black;
        }
        .owl-nav {
    /* Your custom styles for the buttons container */
 
    /* Add any other styles you need */
    display:inline-block;
    position: absolute;
    top:0px;
    right:20px;
    opacity: 0;
    background:grey !important;
    transition:0.5s ;
    border-radius:5px;
}
        .owl-next {

     font-size: 30px !important; 
     color: white !important;
}
.owl-prev {
  
    font-size: 30px !important;
    color: white !important;
    margin-right:5px !important;
}
.owl-dots {
display:none;
}

    </style>
  </head>
  <body >

   
<?php
include('include/header.php');


?>

<div class="container-fluid  g-0 main_banner " >

<div id="carouselExampleCaptions" class=" carousel  slide " data-bs-ride="carousel">
    <div class="carousel-inner " >




    <?php echo $slider; ?>

    </div>
    <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next bg-drk" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<br>
  <br>
  <br>
  <div class="h2 ms-5 fw-bolder">Shopping By Categories</div>
<div class="category ">
  <div class="owl-carousel owl-theme pt-5">
<?php echo $prod_categories;?>

</div>

</div>
<br><br>
<div class="container-fluid">
<div class="row">
            <div class="col-md-6  ">
                  <div class="card card_ads bg-dark text-white border mb-4 border-0">
                    <img src="assets/images/banner-1.jpg" class="card-img img-fluid" id="card-img_1" alt="ads_card_img">
                    <div class="card-img-overlay  ps-3 pt-3  ps-sm-4 pt-sm-4  ps-md-3 pt-md-3 ps-lg-5 pt-lg-5  ">
                        <div class="btn btn-sm ads_btnup">Digital PC</div>
                        <br><br>
                      <div class="card-title h1">PC & Docking Station</div>
                      <p class="card-text">Discover Now Just From $399</p>
                      <br>
                      <a href="shop.php" class="me-5 btn btn-lg ads_btn">Shop Now</a>
                    </div>
                  </div>
            </div>
            <div class="col-md-6 ">
                <div class="card card_ads bg-dark text-black border border-0">
                    <img src="assets/images/banner-2.jpg" class="card-img img-fluid" id="card-img_1" alt="ads_card_img">
                    <div class="card-img-overlay ps-3 pt-3  ps-sm-4 pt-sm-4  ps-md-3 pt-md-3 ps-lg-5 pt-lg-5  ">
                        <div class="btn btn-sm ads_btnup">Headphones</div>
                        <br><br>
                      <div class="card-title h1">On-sale Best Prices</div>
                      <p class="card-text">Limited Time: Online Only!</p>
                      <br>
                      <a href="shop.php" class="me-5 btn btn-lg ads_btn">Shop Now</a>
                    </div>
                  </div>
            </div>
        </div>
        </div>
        <br>
<div class="container-fluid recco" style="  background-color:#F6F9FC ;">
  
<br><br>
    <div class="h2 ms-5 fw-bolder text-center">Reccommended For You</div>
    <br><br>
  <div class="row">
    <?php echo $product;?>


  </div>

<br>
<br>

  <div class="card card_ads_2 p-0 bg-dark text-white border border-0">
            <img src="assets/images/background-1.jpg" class="card-img img-fluid" id="card-img_2" alt="ads_card_img">
            <div class="card-img-overlay ps-5 pt-5 ">
                <div class="btn ads_btnup ms-5">New Gaming </div>
                <br><br>
              <div class="card-title h1 ms-5">Gamepad-XB1</div>
              <p class="card-text ms-5">10% OFF For All Series</p>
              <br>
              <a href="shop.php" class="ms-5 fs-5 btn btn-lg ads_btn">Shop Now</a>
            </div>
          </div>
          <div class="container-fluid my-5">
  <div class="containe">
    <h2>Latest News</h2>
    <hr>
    <br>

      <div class="row">
      <?php echo $blog ; ?>
      

      
  
    </div>
  </div>
</div>
  <br>
    <div class="h2 ms-5 fw-bolder">Exclusive Brands</div>
    <br>
  <div class="row brands pb-4">
                <div class="col ">

                    <img src="assets/images/brand-1.png" alt="brands_img">
                </div>
                <div class="col ">

                    <img src="assets/images/brand-2.png" alt="brands_img">
                </div>
                <div class="col">

                    <img src="assets/images/brand-3.png" alt="brands_img">
                </div>
                <div class="col  ">

                    <img src="assets/images/brand-4.png" alt="brands_img">
                </div>
                <div class="col ">

                    <img src="assets/images/brand-5.png" alt="brands_img">
                </div>
               
            </div>
  
<div class="row mt-4">
            <div class="col-md-6  ">
                  <div class="card card_ads bg-dark text-white border mb-4 border-0">
                    <img src="assets/images/banner-3.jpg" class="card-img img-fluid" id="card-img_1" alt="ads_card_img">
                    <div class="card-img-overlay  ps-3 pt-3  ps-sm-4 pt-sm-4  ps-md-3 pt-md-3 ps-lg-5 pt-lg-5  ">
                        <div class="btn btn-sm ads_btnup">Digital PC</div>
                        <br><br>
                      <div class="card-title h1">PC & Docking Station</div>
                      <p class="card-text">Discover Now Just From $399</p>
                      <br>
                      <a href="shop.php" class="me-5 btn btn-lg ads_btn">Shop Now</a>
                    </div>
                  </div>
            </div>
            <div class="col-md-6 ">
                <div class="card card_ads bg-dark text-black border mb-4 border-0">
                    <img src="assets/images/banner-4.jpg" class="card-img img-fluid" id="card-img_1" alt="ads_card_img">
                    <div class="card-img-overlay ps-3 pt-3  ps-sm-4 pt-sm-4  ps-md-3 pt-md-3 ps-lg-5 pt-lg-5  ">
                        <div class="btn btn-sm ads_btnup">Headphones</div>
                        <br><br>
                      <div class="card-title h1">On-sale Best Prices</div>
                      <p class="card-text">Limited Time: Online Only!</p>
                      <br>
                      <a href="shop.php" class="me-5 btn btn-lg ads_btn">Shop Now</a>
                    </div>
                  </div>
            </div>
        </div>
        <div class="container-fluid pb-4">
    <div class="row">
        <a class="col-6 mb-4 col-md-3" href="">
            <div class="card contact_us_card bg-dark text-white border-0">
                <img src="assets/images/ins-1.jpg" class="card-img" alt="Social_media_links_img">
                <div class="card-img-overlay  text-center">
                  <span >  <i class="fa-brands fa-facebook-f fa-2xl p-2"></i></span>
                </div>
              </div>
            </a>
        <a class="col-6 mb-4 col-md-3" href="">
            <div class="card contact_us_card bg-dark text-white border-0">
                <img src="assets/images/ins-4.jpg" class="card-img" alt="Social_media_links_img">
                <div class="card-img-overlay  text-center">
                  <span ><i class="fa-brands fa-instagram fa-2xl p-2"></i></span>
                </div>
              </div>
            </a>
        <a class="col-6 mb-4 col-md-3" href="">
            <div class="card contact_us_card bg-dark text-white border-0">
                <img src="assets/images/ins-2.jpg" class="card-img" alt="Social_media_links_img">
                <div class="card-img-overlay  text-center">
                  <span ><i class="fa-brands fa-twitter fa-2xl p-2"></i></span>
                </div>
              </div>
            </a>
      
        <a class="col-6 col-md-3 mb-4" href="">
            <div class="card contact_us_card bg-dark text-white border-0">
                <img src="assets/images/ins-5.jpg" class="card-img" alt="Social_media_links_img">
                <div class="card-img-overlay  text-center">
                  <span ><i class="fa-brands fa-youtube fa-2xl p-2"></i></span>
                </div>
              </div>
            </a>
    </div>
</div>
        </div>
        
<?php

include('include/footer.php');

?>
  



   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

 <!-- Link to jQuery (required for Owl Carousel) -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Link to Owl Carousel JavaScript file (you can download it or use a CDN) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Your custom CSS styles -->
<script>
    $('.owl-carousel').owlCarousel({
loop:true,
margin:10,
nav:true,
center:true,
animateOut: 'fadeOut',
responsive:{
    0:{
        items:1,
    },
     480:{
        items:2
    },
    768:{
        items:3
    },
    992:{
        items:5
    },
    1200:{
        items:5
    },
    1400:{
        items:6
    }
}
})
</script>

  </body>
</html>
 