
<?php
include('include/connection.php');
include('include/header.php');
if(!isset($_SESSION['user_id'])){
    echo "<script>
    alert('You Must Login First');
    window.location.href='login.php';
    
    </script>";
   
  }

$reviews= $averageRating= $given_ratings='';
// fetch id from index page using query string
if(isset($_GET['pd_id'])){
 $product_id = $_GET['pd_id'];

   }
   $encode_product_id  = json_encode($product_id);

// fetch data from 
$fetch_query  = "SELECT * FROM manege_product WHERE product_id = '".$product_id."' ";
$Fetchdata1    = mysqli_query($conn,$fetch_query);
$fetchresult = mysqli_fetch_array($Fetchdata1);
 $p_img      = $fetchresult['product_img'];
 $p_sub_img1      = $fetchresult['sub_img1'];
$p_sub_img2      = $fetchresult['sub_img2'];
$p_sub_img3      = $fetchresult['sub_img3'];
$p_sub_img4      = $fetchresult['sub_img4'];
$p_title    = $fetchresult['product_title'];
$p_cat      = $fetchresult['category'];
$p_subcat   = $fetchresult['sub_category'];
$price      = $fetchresult['product_price'];
$description  = $fetchresult['product_desc'];




// Initialize star rating variables
$oneStarCount = 0;
$twoStarCount = 0;
$threeStarCount = 0;
$fourStarCount = 0;
$fiveStarCount = 0;
$star_ratings ='';
// Initialize total reviews and total ratings variables
$totalReviews = 0;
$totalRatings = 0.11;

// Fetch ratings, reviews, and date/time from the database
$sqlFetchRatings = "SELECT * FROM user_review WHERE product_id='".$product_id."'";
$resultFetchRatings = $conn->query($sqlFetchRatings);

if ($resultFetchRatings->num_rows > 0) {
    while ($rowFetchRatings = $resultFetchRatings->fetch_assoc()) {
        // $rating = $rowFetchRatings["user_rating"];
        $rating = (int)$rowFetchRatings["user_rating"];

        $review = $rowFetchRatings["user_review"];
        $ratingDateTime = $rowFetchRatings["review_date_time"];

        // Count ratings by star category using if statements
        if ($rating == 1) {
            $oneStarCount++;
        } elseif ($rating == 2) {
            $twoStarCount++;
        } elseif ($rating == 3) {
            $threeStarCount++;
        } elseif ($rating == 4) {
            $fourStarCount++;
        } elseif ($rating == 5) {
            $fiveStarCount++;
        }

        // Increment total reviews and total ratings
        $totalReviews++;
        $totalRatings += $rating;

        // Display rating details
        "Rating: " . $rating . " Stars<br>";
        "Review: " . $review . "<br>";
        "Date/Time: " . $ratingDateTime . "<br>";
        "<hr>";
    }
}


// Display the star ratings count
"1 Star Count: " . $oneStarCount . "<br>";
"2 Star Count: " . $twoStarCount . "<br>";
"3 Star Count: " . $threeStarCount . "<br>";
"4 Star Count: " . $fourStarCount . "<br>";
"5 Star Count: " . $fiveStarCount . "<br>";


// Calculate and display total reviews and average rating
"Total Reviews: " . $totalReviews . "<br>";
if( $totalReviews == 0 OR $totalRatings  == 0 ){
    $reviews="No Reviews Available For This Product";
}else{
$one_star_progress =  $oneStarCount / $totalReviews * 100;
$two_star_progress =  $twoStarCount / $totalReviews * 100;
$three_star_progress = $threeStarCount / $totalReviews * 100;
$four_star_progress =  $fourStarCount / $totalReviews * 100;
$five_star_progress =  $fiveStarCount / $totalReviews * 100;
}

if ($totalReviews > 0 && $totalRatings > 0) {
     $averageRating = number_format($totalRatings / $totalReviews, 1);
   if ($averageRating < 1.5) {
       $star_ratings ='        
       <i class="fa-solid me-1 fa-star"></i>
       <i class="fa-regular  me-1 fa-star"></i>
       <i class="fa-regular  me-1 fa-star"></i>
       <i class="fa-regular  me-1 fa-star"></i>
       <i class="fa-regular  me-1 fa-star"></i> ';
  
    } elseif ($averageRating >= 1.5 && $averageRating < 2.5) {
        $star_ratings ='                
         <i class="fa-solid me-1 fa-star"></i>
         <i class="fa-solid me-1 fa-star"></i>
        <i class="fa-regular  me-1 fa-star"></i>
        <i class="fa-regular  me-1 fa-star"></i>
        <i class="fa-regular  me-1 fa-star"></i>';
    } elseif ($averageRating >= 2.5 && $averageRating < 3.5) {
       $star_ratings ='        
       <i class="fa-solid me-1 fa-star"></i>
         <i class="fa-solid me-1 fa-star"></i>
         <i class="fa-solid me-1 fa-star"></i>
        <i class="fa-regular  me-1 fa-star"></i>
        <i class="fa-regular  me-1 fa-star"></i> ';
    } elseif ($averageRating >= 3.5 && $averageRating < 4.5) {
       $star_ratings ='        
       <i class="fa-solid me-1 fa-star"></i>
       <i class="fa-solid me-1 fa-star"></i>
       <i class="fa-solid me-1 fa-star"></i>
       <i class="fa-solid me-1 fa-star"></i>
      <i class="fa-regular  me-1 fa-star"></i>';
    } else { // $averageRating >= 4.5
       $star_ratings ='        
       <i class="fa-solid me-1 fa-star"></i>
       <i class="fa-solid me-1 fa-star"></i>
       <i class="fa-solid me-1 fa-star"></i>
       <i class="fa-solid me-1 fa-star"></i>
       <i class="fa-solid me-1 fa-star"></i> ';
    }
} else {
    
}






$fetch_query_for_review  = "SELECT * FROM user_review WHERE product_id='".$product_id."'";
$data_from_review_db   = mysqli_query($conn,$fetch_query_for_review);
$count_reviews   = mysqli_num_rows($data_from_review_db );
for($rev=1;$rev<=$count_reviews; $rev++){
  $fetched_data_from_reviews = mysqli_fetch_array($data_from_review_db);
$fetched_data_from_reviews['user_rating'];
  if ($fetched_data_from_reviews['user_rating'] == 1 ) {
    $given_ratings ='          
    <i class="fa-solid fa-star"></i>
    <i class="fa-regular fa-star"></i>
    <i class="fa-regular fa-star"></i>
    <i class="fa-regular fa-star"></i>
    <i class="fa-regular fa-star"></i>';

 } elseif ($fetched_data_from_reviews['user_rating'] == 2) {
    $given_ratings ='
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid fa-star"></i>
    <i class="fa-regular fa-star"></i>
    <i class="fa-regular fa-star"></i>
    <i class="fa-regular fa-star"></i> ';
 } elseif ($fetched_data_from_reviews['user_rating'] == 3) {
    $given_ratings ='   
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid fa-star"></i>
    <i class="fa-regular fa-star"></i>
    <i class="fa-regular fa-star"></i>';
 } elseif ($fetched_data_from_reviews['user_rating'] == 4) {
    $given_ratings ='
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid fa-star"></i>
    <i class="fa-regular fa-star"></i>';
 } else {
    $given_ratings ='    
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid fa-star"></i>';
 }


  $reviews.='
  <div class=" mb-3">
  <div class="commnet_head ms-2">
  <div class="row">
  <div class="col-3 pt-1">
      <img src="assets/images/admin4.png" class=" comment  rounded-start img-fluid " alt="user_review_img">
  </div>
  <div class="col-9 pt-2">
      <div class=""><h4 class="title text-warning">'.$fetched_data_from_reviews['user_name'].'</h4>
          '.$given_ratings.'</div>
  </div>
</div>
</div>
            
<div class="card-body border">

  <p class="card-text">'.$fetched_data_from_reviews['user_review'].'</p>
</div>
</div>
  ';

}

if(isset($_POST['submit_rating'])){
    $update_rating="UPDATE manege_product SET avg_rating ='".$averageRating."' WHERE product_id ='".$product_id."' " ;
    if(mysqli_query($conn,$update_rating)){
        // echo "Success";
    }else{
        echo "Fail";
    }
   
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="include/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400&display=swap" rel="stylesheet">
  
<!-- <title>Magic Zoom Plus</title> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="assets/magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="assets/magiczoomplus/magiczoomplus.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style type="text/css">
         *{
        font-family:Source Sans Pro;
      }
      h1,h2,h3,h4,h5,h6{
      font-family: 'Jost', sans-serif;
      /* font-family: Jost, Helvetica, Arial, Lucida, sans-serif; */
     }
    html { position: relative; min-height: 100%; }
    body { position: absolute; left:0; right: 0; min-height: 100%; background:#fff; margin:0; padding:0; font-size: 100%; }
    body, td {
        /* font-family: 'Helvetica Neue', Helvetica, 'Lucida Grande', Tahoma, Arial, Verdana, sans-serif; */
        line-height: 1.5em;
        -webkit-text-rendering: geometricPrecision;
        text-rendering: geometricPrecision;
    }



    .cfg-btn {
        background-color: rgb(55, 181, 114);
        color: #fff;
        border: 0;
        box-shadow: 0 0 1px 0px rgba(0,0,0,0.3);
        outline:0;
        cursor: pointer;
        width: 200px;
        padding: 10px;
        font-size: 1em;
        position: relative;
        display: inline-block;
        margin: 10px auto;
    }
    .cfg-btn:hover:not([disabled]) {
        background-color: rgb(37, 215, 120);
    }
    .mobile-magic .cfg-btn:hover:not([disabled]) { background: rgb(55, 181, 114); }
    .cfg-btn[disabled] { opacity: .5; color: #808080; background: #ddd; }

    .cfg-btn.btn-preview,
    .cfg-btn.btn-preview:active,
    .cfg-btn.btn-preview:focus {
        font-size: 1em;
        position: relative;
        display: block;
        margin: 10px auto;
    }

    .cfg-btn,
    .preview,
    .app-figure,
    .api-controls,
    .wizard-settings,
    .wizard-settings .inner,
    .wizard-settings .footer,
    .wizard-settings input,
    .wizard-settings select {
        -webkit-box-sizing: border-box;
           -moz-box-sizing: border-box;
                box-sizing: border-box;
    }
    .preview,
    .wizard-settings {
   
        border: 0;
        min-height: 1px;
    }
    .preview {
        width: 100%  !important;
        position: relative;
 
    }
   


    .app-figure {

        margin: 0px auto;
        border: 0px solid red;
      
    }
    .app-figure .MagicZoom{
        margin: 0 14% !important;
    }
    .selectors { margin-top: 10px;
        padding-left: 29%;
        margin-left: 7%;
        padding-top: 2%;
        padding-bottom: 2%;
        background-color:  #f8f5f4 !important;
     }
    .selectors .mz-thumb img { max-width: 56px;

    }
    .selectors img { 
        width: 100px !important;
    margin-right: 9.9px !important;
    }



    .preview { width: 100% !important; float: left; }
    @media (min-width: 0px) {
        .preview { width: 100%; float: none; }
    }

    @media (min-width: 1024px) {
        .preview { width: calc(100% - 340px); }
        .wizard-settings { top: 0; min-height: 100%; }
        .wizard-settings .inner { margin-top: 60px; }
        .wizard-settings .footer { position: absolute; bottom: 0; left: 0; }
        .wizard-settings .settings-controls {
            position: fixed;
            top: 0; right: 0;
            width: 340px;
            padding: 10px 0 0;
            text-align: center;
            background-color: inherit;
        }
    }
    @media screen and (max-width: 1024px) {
        .api-controls button, .api-controls button:active, .api-controls button:focus {
            width: 70px;
        }
    }
    @media screen and (max-width: 1200px) {
        .selectors { margin-top: 10px;
        padding-left: 18%;
        margin-left: 6%;
        padding-top: 2%;
        padding-bottom: 2%;
    }
    }
    @media screen and (max-width: 1023px) {
      
        .app-code-sample { display: none; }
        .wizard-settings { width: 100%; }
        .selectors { margin-top: 10px;
        padding-left: 14%;
        margin-left: 6%;
        padding-top: 2%;
        padding-bottom: 2%;
    }
    }
    @media screen and (max-width: 768px) {
        .selectors { margin-top: 10px;
        padding-left: 24%;
        margin-left: 6%;
        padding-top: 2%;
        padding-bottom: 2%;
    }
    }
    @media screen and (max-width: 600px) {
        .mz-thumb img { max-width: 39px; }
        .selectors { margin-top: 10px;
        padding-left: 24%;
        margin-left: 6%;
        padding-top: 2%;
        padding-bottom: 2%;
    }
    .selectors img { 
        width: 50px !important;
    margin-right: 9.9px !important;
    }
    }
    @media screen and (max-width: 560px) {
        .api-controls .sep { content: ''; display: table; }

        .selectors { margin-top: 10px;
        padding-left: 12%;
        margin-left: 2%;
        padding-top: 2%;
        padding-bottom: 2%;
    }
    
    .selectors img { 
        width: 50px !important;
    margin-right: 9.9px !important;
    }
        
    }

    @media screen and (min-width: 1600px) {
        .preview { padding: 10px 160px; }
        
    }
    @media screen and (max-width: 1600px) {
        .preview { padding: 10px 160px; }
        .selectors { margin-top: 10px;
        padding-left: 22%;
        margin-left: 2%;
        padding-top: 2%;
        padding-bottom: 2%;
    }
    }
    @media screen and (max-width: 420px) {
        .api-controls .sep { content: ''; display: table; }

        .selectors { margin-top: 10px;
          margin-bottom: 10px;
        padding-left: 3%;
        margin-left: 2%;
        padding-top: 2%;
        padding-bottom: 2%;
    }
    
   
        
    }
</style>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <title>Arostore</title>
    <link rel="icon" type="image/png" href="assets/images/title.png" />
</head>
<body>
<div class="w-100 row g-0">
    

    <div class="app-figure col-12  col-md-7 " id="zoom-fig">
        <a id="Zoom-1" class="MagicZoom" title="This is Product Details to Make Productuct Selection Easy."
            href="../admin/assets/upload_images/<?php echo $p_img; ?>"
        >
            <img src="../admin/assets/upload_images/<?php echo $p_img; ?>"
                alt="product_img"/>
        </a>
        <div class="selectors mx-4">
            <a
                data-zoom-id="Zoom-1"
                href="../admin/assets/upload_images/<?php echo $p_sub_img1; ?>" 
            >
                <img src="../admin/assets/upload_images/<?php echo $p_sub_img1; ?> " alt="product_sub_img" />
            </a>
            <a
                data-zoom-id="Zoom-1"
                href="../admin/assets/upload_images/<?php echo $p_sub_img2; ?>"
                 >
                <img  src="../admin/assets/upload_images/<?php echo $p_sub_img2; ?>" alt="product_sub_img"/>
            </a>
            <a
            data-zoom-id="Zoom-1"
            href="../admin/assets/upload_images/<?php echo $p_sub_img3; ?>"
             >
            <img  src="../admin/assets/upload_images/<?php echo $p_sub_img3; ?>" alt="product_sub_img"/>
        </a>
        <a
        data-zoom-id="Zoom-1"
        href="../admin/assets/upload_images/<?php echo $p_sub_img4; ?>"
         >
        <img  src="../admin/assets/upload_images/<?php echo $p_sub_img4; ?>" alt="product_sub_img"/>
    </a>
    
        </div>


        <div class="card border-0 d-none d-md-block" >
 
        <div class="card-body">
          <h2 class="card-title my-5 ms-3"><?php echo $count_reviews ;?> Reviews and Ratings  <i class="fa-solid fa-comment"></i></h2>
          <?php echo $reviews ;?>

            </div> 
      </div>

      
    </div>
      
    <div class="col-12 col-md-5 p-5 rating border-0 " style="background-color:#F9F5F6; ">
        <h3 class="card-title text-dark fw-bolder"><?php echo $p_title; ?></h3>
        <p class="card-text fw-bolder"><?php echo  $star_ratings; ?></p>
        
                                                      <form action="manage_cart.php" method="POST">
                                                      <h5 class="card-title fw-bold">$<?php echo $price; ?></h5>
                                                          <br>
                                                          <hr>
                                                          <br>
                                                          <p class="fs-5">
                                                          <?php echo $description; ?>

                                                          </p>
                                                          <br>
                                                          <div class="row">
                                                          <div class="col">  
                                                             <button type="submit" name="add_cart" class="btn w-100 py-4  warning_1 "  data-bs-toggle="tooltip"  data-bs-placement="bottom" title="Add to Cart"><i class="fa-solid fa-cart-shopping fa-2xl pt-2 "></i></button>
           

                                                          </div>
                                                          <div class="col">
                                                          <button type="submit" name="add_wishlist" class="btn w-100   py-4 warning_1   "  data-bs-toggle="tooltip"  data-bs-placement="bottom" title="Add to Wishlist"><i class="fa-solid fa-heart  fa-2xl pt-2"></i></button>
                                                          </div>
                                                      </div>
                                                      <input type="hidden" value="<?php echo $p_cat; ?>" name="p_cat">
                                                      <input type="hidden" value="<?php echo $p_subcat; ?>" name="sub_cat">
                                                      <input type="hidden" value="<?php echo $p_title; ?>" name="item_name">
                                                      <input type="hidden" value="<?php echo $price; ?>" name="price">
                                                      <input type="hidden" value="<?php echo $p_img ; ?>" name="img">
                                                          </form>
                                                        
    <div class="card  mt-4" style="background-color:#F9F5F6; ">
    <h1 class=" text-center text-light bg-warning p-2 ">User Rating</h1>
                <div class="card-body">
                        <div class="row">
                                <div class="col-md-12 text-center">
                                      <h1 class="text-warning mt-3 mb-2"><b><span id="average_rating"><?php 
                                      if($totalRatings == 0 ||$totalReviews == 0 ){
                                        echo "0"  ;
                                      }else{  
                                        echo number_format($totalRatings / $totalReviews, 1);}
                                    
                                      
                                      ?></span>/5</b></h1>
                                      <div class="mb-3">
                                        <?php echo  $star_ratings ; ?>
                                  
                                      </div>
                                      <h3 class=" text-dark "><span id="total_review"><?php echo  $totalReviews ;?></span> Reviews</h3>
                                </div>
                                <div class="col-md-12 text-center">
                                              <p>
                                                <div class="row">
                                                  <div class="col-2">
                                                  <div class="progress-label-left"><b>5</b><i class="fa-solid fa-star  ms-1 "></i></div>
                                                  </div>
                                                  <div class="col-8 pt-1">
                                                  <div class="progress">
                                                <div class="progress-bar bg-warning " role="progressbar" style="width: <?php echo $five_star_progress ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                                </div>
                                                  </div>
                                                  <div class="col-2">
                                                  <div class="progress-label-right">( <span id="total_five_star_review" ><?php echo $fiveStarCount ;?></span> )</div>
                                                  </div>
                                                </div>
                                              </p> 
                                              <p>
                                                <div class="row">
                                                  <div class="col-2">
                                                  <div class="progress-label-left"><b>4</b><i class="fa-solid fa-star  ms-1"></i></div>
                                                  </div>
                                                  <div class="col-8 pt-1">
                                                  <div class="progress">
                                                <div class="progress-bar bg-warning " role="progressbar" style="width:  <?php echo $four_star_progress ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                                </div>
                                                  </div>
                                                  <div class="col-2">
                                                  <div class="progress-label-right">( <span id="total_four_star_review" ><?php echo $fourStarCount ;?> </span> )</div>
                                                  </div>
                                                </div>
                                              </p>
                                              <p>
                                                <div class="row">
                                                  <div class="col-2">
                                                  <div class="progress-label-left"><b>3</b><i class="fa-solid fa-star  ms-1 "></i></div>
                                                  </div>
                                                  <div class="col-8 pt-1">
                                                  <div class="progress">
                                                <div class="progress-bar bg-warning " role="progressbar" style="width: <?php echo $three_star_progress ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                                </div>
                                                  </div>
                                                  <div class="col-2">
                                                  <div class="progress-label-right">( <span id="total_three_star_review" ><?php echo $threeStarCount ;?> </span> )</div>
                                                  </div>
                                                </div>
                                              </p>
                                              <p>
                                                <div class="row">
                                                  <div class="col-2">
                                                  <div class="progress-label-left"><b>2</b><i class="fa-solid fa-star  ms-1"></i></div>
                                                  </div>
                                                  <div class="col-8 pt-1">
                                                  <div class="progress">
                                                <div class="progress-bar bg-warning " role="progressbar" style="width: <?php echo $two_star_progress ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                                </div>
                                                  </div>
                                                  <div class="col-2">
                                                  <div class="progress-label-right">( <span id="total_two_star_review" ><?php echo $twoStarCount ;?> </span> )</div>
                                                  </div>
                                                </div>
                                              </p> 
                                              <p>
                                                <div class="row">
                                                  <div class="col-2">
                                                  <div class="progress-label-left"><b>1</b><i class="fa-solid fa-star ms-1"></i></div>
                                                  </div>
                                                  <div class="col-8 pt-1">
                                                  <div class="progress">
                                                <div class="progress-bar bg-warning " role="progressbar" style="width:  <?php echo $one_star_progress ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                                </div>
                                                  </div>
                                                  <div class="col-2">
                                                  <div class="progress-label-right">( <span id="total_one_star_review" ><?php echo $oneStarCount ;?> </span> )</div>
                                                  </div>
                                                </div>
                                              </p> 
                                </div>
                                <div class="col-md-12 text-center">
                                  <h3 class="mt-4 mb-3  text-dark ">Write Review Here</h3>
                                  <!-- <button class="btn btn-primary" name="add_review" id="add_review">Review </button> -->
                                  <!-- modal starts  -->
                                  <!-- Button trigger modal -->
<button type="button" class=" bg-warning p-2 px-4 text-white rounded border-0"  name="add_review"   data-bs-toggle="modal" data-bs-target="#review_modal">
  Review 
</button>



<!-- Modal -->
<div class="modal fade" id="review_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Submit Review</h5>
        <!-- <h5 class="modal-title" >Modal title</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 class="text-center mt-2 mb-4">
        <div class="container mt-5">
  <span class="star" onclick="rate(1)"><i class="fa-regular fa-star me-1"></i> </span>
  <span class="star" onclick="rate(2)"><i class="fa-regular fa-star me-1"></i></span>
  <span class="star" onclick="rate(3)"><i class="fa-regular fa-star me-1"></i></span>
  <span class="star" onclick="rate(4)"><i class="fa-regular fa-star me-1"></i></span>
  <span class="star" onclick="rate(5)"><i class="fa-regular fa-star me-1"></i></span>
</div>

        </h4>
        <form action="" method="post">
        <div class="form-group">
<input type="text" id="user_name" name="user_name" class="form-control" placeholder="Enter Your Name here" >
        </div>
        <div class="form-group  mt-4">
          <textarea name="user_review" id="user_review" cols="10" rows="5" class="form-control" placeholder="Enter Your Review here"></textarea>
        </div>
        <div class="form-group text-center mt-4">
          <button type="submit" class="bg-warning p-2 px-4 text-white rounded border-0" name="submit_rating" id="save_review">Submit</button>
          </div>
          </form>
      </div>
     
    </div>
  </div>
</div>
                                </div>
                        </div>
                </div>
        </div>
        <div class="mt-5" id="review_content">

        <div class="card d-md-none" >
   
        <div class="card-body">
          <h2 class="card-title my-5"><?php echo $count_reviews ;?> Reviews <i class="fa-solid fa-comment"></i></h2>
          <?php echo $reviews ;?>

            </div> 
      </div>
        </div>
          <br>
  
                                      
    <br>
   <div>
   <p class="text-secondary"><i class="fa-solid fa-truck-fast pe-2"></i>Free Worldwide Shipping on all orders over $100</p>
    <p class="text-secondary"><i class="fa-solid fa-business-time  pe-2"></i>Delivers in 3-7 working Days </p>
      </div>
      </div>
</div>
  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/prettify/188.0.0/prettify.min.js"></script>
<script>try { prettyPrint(); } catch(e) {}</script>
<script type="text/javascript">
    var mzOptions = {};
    mzOptions = {
        onZoomReady: function() {
            console.log('onReady', arguments[0]);
        },
        onUpdate: function() {
            console.log('onUpdated', arguments[0], arguments[1], arguments[2]);
        },
        onZoomIn: function() {
            console.log('onZoomIn', arguments[0]);
        },
        onZoomOut: function() {
            console.log('onZoomOut', arguments[0]);
        },
        onExpandOpen: function() {
            console.log('onExpandOpen', arguments[0]);
        },
        onExpandClose: function() {
            console.log('onExpandClosed', arguments[0]);
        }
    };
    var mzMobileOptions = {};

    function isDefaultOption(o) {
        return magicJS.$A(magicJS.$(o).byTag('option')).filter(function(opt){
            return opt.selected && opt.defaultSelected;
        }).length > 0;
    }

    function toOptionValue(v) {
        if ( /^(true|false)$/.test(v) ) {
            return 'true' === v;
        }
        if ( /^[0-9]{1,}$/i.test(v) ) {
            return parseInt(v,10);
        }
        return v;
    }

    function makeOptions(optType) {
        var  value = null, isDefault = true, newParams = Array(), newParamsS = '', options = {};
        magicJS.$(magicJS.$A(magicJS.$(optType).getElementsByTagName("INPUT"))
            .concat(magicJS.$A(magicJS.$(optType).getElementsByTagName('SELECT'))))
            .forEach(function(param){
                value = ('checkbox'==param.type) ? param.checked.toString() : param.value;

                isDefault = ('checkbox'==param.type) ? value == param.defaultChecked.toString() :
                    ('SELECT'==param.tagName) ? isDefaultOption(param) : value == param.defaultValue;

                if ( null !== value && !isDefault) {
                    options[param.name] = toOptionValue(value);
                }
        });
        return options;
    }

    function updateScriptCode() {
        var code = '&lt;script&gt;\nvar mzOptions = ';
        code += JSON.stringify(mzOptions, null, 2).replace(/\"(\w+)\":/g,"$1:")+';';
        code += '\n&lt;/script&gt;';

        magicJS.$('app-code-sample-script').changeContent(code);
    }

    function updateInlineCode() {
        var code = '&lt;a class="MagicZoom" data-options="';
        code += JSON.stringify(mzOptions).replace(/\"(\w+)\":(?:\"([^"]+)\"|([^,}]+))(,)?/g, "$1: $2$3; ").replace(/\{([^{}]*)\}/,"$1").replace(/\s*$/,'');
        code += '"&gt;';

        magicJS.$('app-code-sample-inline').changeContent(code);
    }

    function applySettings() {
        MagicZoom.stop('Zoom-1');
        mzOptions = makeOptions('params');
        mzMobileOptions = makeOptions('mobile-params');
        MagicZoom.start('Zoom-1');
        updateScriptCode();
        updateInlineCode();
        try {
            prettyPrint();
        } catch(e) {}
    }

    function copyToClipboard(src) {
        var
            copyNode,
            range, success;

        if (!isCopySupported()) {
            disableCopy();
            return;
        }
        copyNode = document.getElementById('code-to-copy');
        copyNode.innerHTML = document.getElementById(src).innerHTML;

        range = document.createRange();
        range.selectNode(copyNode);
        window.getSelection().addRange(range);

        try {
            success = document.execCommand('copy');
        } catch(err) {
            success = false;
        }
        window.getSelection().removeAllRanges();
        if (!success) {
            disableCopy();
        } else {
            new magicJS.Message('Settings code copied to clipboard.', 3000,
                document.querySelector('.app-code-holder'), 'copy-msg');
        }
    }

    function disableCopy() {
        magicJS.$A(document.querySelectorAll('.cfg-btn-copy')).forEach(function(node) {
            node.disabled = true;
        });
        new magicJS.Message('Sorry, cannot copy settings code to clipboard. Please select and copy code manually.', 3000,
            document.querySelector('.app-code-holder'), 'copy-msg copy-msg-failed');
    }

    function isCopySupported() {
        if ( !window.getSelection || !document.createRange || !document.queryCommandSupported ) { return false; }
        return document.queryCommandSupported('copy');
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    
    <script>
     
  let currentRating = 0;

  function rate(rating) {
    const stars = document.querySelectorAll('.star');
    for (let i = 0; i < stars.length; i++) {
      if (i < rating) {
        stars[i].innerHTML = '<i class="fa-solid fa-star me-1"></i>';
      } else {
        stars[i].innerHTML = '<i class="fa-regular fa-star me-1"></i>';
      }
    }
    rating_data = rating;
  }


      $(document).ready(function(){
// var rating_data=0;
var count=0;
$(document).on('click','#add_review',function(){
$('#review_modal').modal('show');
});



$('#save_review').on('click', function(){
var product_id = <?php echo $encode_product_id ; ?>;
var user_name = $('#user_name').val();
var user_review = $('#user_review').val();
if( user_name == '' || user_review == '' ){
  alert('Please Fill Both Fields');
  return false;
}else{

  $.ajax({
url:"submit_review.php",
method:"POST",
data:{product_id:product_id,rating_data:rating_data,user_name:user_name,user_review:user_review},
success:function(data){
  alert('Review Submitted Successfully');
  $('#review_modal').modal('hide');
  

}

  });
}


});



      }); 
    </script>
</body></html>
<?php include('include/footer.php');?>