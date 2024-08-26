<?php
include('include/connection.php');
// if(isset($_GET['pd_id'])){
//   $product_id = $_GET['pd_id'];
// }
$product_id = 1;
$encode_product_id  = json_encode($product_id);

// Initialize star rating variables
$oneStarCount = 0;
$twoStarCount = 0;
$threeStarCount = 0;
$fourStarCount = 0;
$fiveStarCount = 0;
$star_ratings ='';
// Initialize total reviews and total ratings variables
$totalReviews = 0;
$totalRatings = 0;

// Fetch ratings, reviews, and date/time from the database
$sqlFetchRatings = "SELECT * FROM user_review";
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

$one_star_progress =  $oneStarCount / $totalReviews * 100;
$two_star_progress =  $twoStarCount / $totalReviews * 100;
$three_star_progress = $threeStarCount / $totalReviews * 100;
$four_star_progress =  $fourStarCount / $totalReviews * 100;
$five_star_progress =  $fiveStarCount / $totalReviews * 100;



if ($totalReviews > 0) {
     "Average Rating: " . $averageRating = number_format($totalRatings / $totalReviews, 1) . " Stars<br>";
   if ($averageRating < 1.5) {
       $star_ratings .='        
       <i class="fas fa-star text-warning me-1 main_star"></i>  
                      <i class="fas fa-star text-secondary me-1 main_star"></i> 
                      <i class="fas fa-star text-secondary me-1 main_star"></i> 
                      <i class="fas fa-star text-secondary me-1 main_star"></i> 
                      <i class="fas fa-star text-secondary me-1 main_star"></i> ';
  
    } elseif ($averageRating >= 1.5 && $averageRating < 2.5) {
        $star_ratings .='           <i class="fas fa-star text-warning me-1 main_star"></i> 
                      <i class="fas fa-star text-warning me-1 main_star"></i> 
                      <i class="fas fa-star text-secondary me-1 main_star"></i> 
                      <i class="fas fa-star text-secondary me-1 main_star"></i> 
                      <i class="fas fa-star text-secondary me-1 main_star"></i> ';
    } elseif ($averageRating >= 2.5 && $averageRating < 3.5) {
       $star_ratings .='        
       <i class="fas fa-star text-warning me-1 main_star"></i> 
                      <i class="fas fa-star text-warning me-1 main_star"></i> 
                      <i class="fas fa-star text-warning me-1 main_star"></i> 
                      <i class="fas fa-star text-secondary me-1 main_star"></i> 
                      <i class="fas fa-star text-secondary me-1 main_star"></i> ';
    } elseif ($averageRating >= 3.5 && $averageRating < 4.5) {
       $star_ratings .='        
       <i class="fas fa-star text-warning me-1 main_star"></i>  
                      <i class="fas fa-star text-warning me-1 main_star"></i> 
                      <i class="fas fa-star text-warning me-1 main_star"></i> 
                      <i class="fas fa-star text-warning me-1 main_star"></i> 
                      <i class="fas fa-star text-secondary me-1 main_star"></i> ';
    } else { // $averageRating >= 4.5
       $star_ratings .='        
       <i class="fas fa-star text-warning me-1 main_star"></i> 
                      <i class="fas fa-star text-warning me-1 main_star"></i> 
                      <i class="fas fa-star text-warning me-1 main_star"></i> 
                      <i class="fas fa-star text-warning me-1 main_star"></i> 
                      <i class="fas fa-star text-warning me-1 main_star"></i> ';
    }
} else {
    echo "Average Rating: N/A (No reviews available)<br>";
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>Arostore</title>
    <link rel="icon" type="image/png" href="assets/images/title.png" />
    <style>
  
      .star {
    cursor: pointer;
  }
    </style>
  </head>
  <body>
<div class="container">
    <h1 class="my-4">User Rating</h1>
    <div class="card">
      
                <div class="card-body">
                        <div class="row">
                                <div class="col-md-12 text-center">
                                      <h1 class="text-warning mt-3 mb-2"><b><span id="average_rating"><?php echo number_format($totalRatings / $totalReviews, 1); ?></span>/5</b></h1>
                                      <div class="mb-3">
                                        <?php echo  $star_ratings ; ?>
                                  
                                      </div>
                                      <h3><span id="total_review"><?php echo  $totalReviews ;?></span> Reviews</h3>
                                </div>
                                <div class="col-md-12 text-center">
                                              <p>
                                                <div class="row">
                                                  <div class="col-2">
                                                  <div class="progress-label-left"><b>5</b><i class="fas fa-star text-warning ms-1 "></i></div>
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
                                                  <div class="progress-label-left"><b>4</b><i class="fas fa-star text-warning ms-1"></i></div>
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
                                                  <div class="progress-label-left"><b>3</b><i class="fas fa-star text-warning ms-1 "></i></div>
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
                                                  <div class="progress-label-left"><b>2</b><i class="fas fa-star text-warning ms-1"></i></div>
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
                                                  <div class="progress-label-left"><b>1</b><i class="fas fa-star text-warning ms-1"></i></div>
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
                                  <h3 class="mt-4 mb-3">Write Review Here</h3>
                                  <!-- <button class="btn btn-primary" name="add_review" id="add_review">Review </button> -->
                                  <!-- modal starts  -->
                                  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary"  name="add_review"   data-bs-toggle="modal" data-bs-target="#review_modal">
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
  
  <span class="star" onclick="rate(1)"><i class="fas fa-star text-secondary me-1"></i> </span>
  <span class="star" onclick="rate(2)"><i class="fas fa-star text-secondary me-1"></i></span>
  <span class="star" onclick="rate(3)"><i class="fas fa-star text-secondary me-1"></i></span>
  <span class="star" onclick="rate(4)"><i class="fas fa-star text-secondary me-1"></i></span>
  <span class="star" onclick="rate(5)"><i class="fas fa-star text-secondary me-1"></i></span>
</div>

        </h4>
        <div class="form-group">
<input type="text" id="user_name" name="user_name" class="form-control" placeholder="Enter Your Name here" >
        </div>
        <div class="form-group  mt-4">
          <textarea name="user_review" id="user_review" cols="10" rows="5" class="form-control" placeholder="Enter Your Review here"></textarea>
        </div>
        <div class="form-group text-center mt-4">
          <button type="button" class="btn btn-primary" id="save_review">Submit</button>
          </div>
      </div>
     
    </div>
  </div>
</div>
                                </div>
                        </div>
                </div>
        </div>
        <div class="mt-5" id="review_content"></div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    
    <script>
     
  let currentRating = 0;

  function rate(rating) {
    const stars = document.querySelectorAll('.star');
    for (let i = 0; i < stars.length; i++) {
      if (i < rating) {
        stars[i].innerHTML = '<i class="fas fa-star text-warning me-1"></i>';
      } else {
        stars[i].innerHTML = '<i class="fas fa-star text-secondary me-1"></i>';
      }
    }
    rating_data = rating;
  }


      $(document).ready(function(){
// var rating_data=0;
var count=0;
$(document).on('click','#add_review',function(){
// $('#add_review').on click(function(){
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
    
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
