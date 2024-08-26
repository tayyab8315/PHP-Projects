
<?php
include('include/connection.php');
if(isset($_GET['blog_cat_id'])){
 $blog_cat_id = $_GET['blog_cat_id'];
  $blog_category_dis   =  $_GET['blog_cat'];

    }
$blog=$blog_categor=$recent_blog= $cards= $tabs= '';

// fetch data from manege_product table
$fetch_query_for_blog  = "SELECT * FROM blog WHERE blog_cat_id = '".$blog_cat_id."'";
$data_from_blog_db   = mysqli_query($conn,$fetch_query_for_blog);
$count   = mysqli_num_rows($data_from_blog_db );

for($i=1;$i<=$count; $i++){
  $fetched_data_from_blog = mysqli_fetch_array($data_from_blog_db);
  $blog_cat = $fetched_data_from_blog['blog_cat_id'];

$blog_disc = $fetched_data_from_blog['blog_disc'];
$blog_short_disc= substr($blog_disc,0,145);

$fetch_query_for_blog_cat  = "SELECT * FROM blog_category WHERE  blog_cat_id = '".$blog_cat."'  ";
$data_from_blog_cat_db   = mysqli_query($conn,$fetch_query_for_blog_cat);
$fetched_data_from_blog_cat = mysqli_fetch_array($data_from_blog_cat_db );
$blog_cat_name = $fetched_data_from_blog_cat['blog_cat'];
$fetch_query_for_count_comments  = "SELECT * FROM blog_comment WHERE  blog_id = '". $fetched_data_from_blog['blog_id']."'   ";
$count_from_blog_comments_db   = mysqli_query($conn,$fetch_query_for_count_comments);
$total_comments= mysqli_num_rows($count_from_blog_comments_db);
  $blog .= '
  <div class="col-12 col-sm-6 col-lg-6 col-xl-6 mb-3">
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




$fetch_query_for_blog_catego  = "SELECT * FROM blog_category WHERE status='Active'";
$data_from_blog_catego_db   = mysqli_query($conn,$fetch_query_for_blog_catego);
$count_category   = mysqli_num_rows($data_from_blog_catego_db );
for($j=1;$j<=$count_category; $j++){
  $fetched_data_from_blog_catego = mysqli_fetch_array($data_from_blog_catego_db);
  $blog_categor.='<a href="blog_cat.php?blog_cat_id='.$fetched_data_from_blog_catego['blog_cat_id'].'&blog_cat='.$fetched_data_from_blog_catego['blog_cat'].'" class="btn text-start"><li class="border-0 fs-5">'.$fetched_data_from_blog_catego['blog_cat'].'</li></a>';

}





// SQL query to fetch the most recent 7 posts
$sql_query_for_recent_posts = "SELECT * FROM blog WHERE status = 'Publish' ORDER BY date DESC";
$recent_posts_data_from_blog_cat_db   = mysqli_query($conn,$sql_query_for_recent_posts);
$fetched_data_from_blog_cat = mysqli_fetch_array($recent_posts_data_from_blog_cat_db );
for($k=1;$k<=5; $k++){
  $fetched_data_from_blog_for_recent_posts = mysqli_fetch_array($recent_posts_data_from_blog_cat_db );
  $recent_blog_disc=$fetched_data_from_blog_for_recent_posts['blog_disc'];
  $recent_blog_short_disc = substr($recent_blog_disc,0,75);

  $postDateTime = new DateTime($fetched_data_from_blog_for_recent_posts["date"]);
  $currentDateTime = new DateTime(); // Current date and time
  
  $interval = $postDateTime->diff($currentDateTime);



  $recent_blog.='
  <a href="single_post.php?blog_id='.$fetched_data_from_blog_for_recent_posts['blog_id'].'" class="btn">
  <div class="card mt-3">
  <div class="row g-0">
  <div class="col-4">
    <img src="../admin/assets/upload_images/'.$fetched_data_from_blog_for_recent_posts['blog_feature_img'].'" class="img-fluid rounded h-100"  " alt="Recent_post_img">
  </div>
  <div class="col-8 text-start">
    <div class="card-body p-3">
      <p class="card-text"><small class="text-muted">'.formatInterval($interval).'</small></p>
      <h5 class="card-title">'.$fetched_data_from_blog_for_recent_posts['blog_title'].'</h5>
      <p class="card-text">'.$recent_blog_short_disc.'</p>
    </div>
  </div>
</div>
</div>
</a>
  ';

}function formatInterval($interval) {
  $formatted = "";
  if ($interval->y > 0) {
    $formatted .= $interval->y . " year" . ($interval->y > 1 ? "s" : "") . " ago";
  } elseif ($interval->m > 0) {
    $formatted .= $interval->m . " month" . ($interval->m > 1 ? "s" : "") . " ago";
  } elseif ($interval->d > 0) {
    $formatted .= $interval->d . " day" . ($interval->d > 1 ? "s" : "") . " ago";
  } elseif ($interval->h > 0) {
    $formatted .= $interval->h . " hour" . ($interval->h > 1 ? "s" : "") . " ago";
  } elseif ($interval->i > 0) {
    $formatted .= $interval->i . " minute" . ($interval->i > 1 ? "s" : "") . " ago";
  } else {
    $formatted = "just now";
  }

  return $formatted;
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

    <title>Aerostore</title>
<link rel="icon" type="image/png" href="assets/images/title.png"/>
</head>
    <style>
          *{
        font-family:Source Sans Pro;
      }
      h1,h2,h3,h4,h5,h6{
      font-family: 'Jost', sans-serif;
     
     }

    </style>
  </head>
  <?php include('include/header.php'); ?>
  <body>
   
 
  <div class="card text-white ">
    <img src="assets/images/bg-breadcrumb.jpg" class="blog_banner img-fluid" alt="Blog_category_img">
    <div class="card-img-overlay text-center">
      <h1 class="card-title text-end"><?php echo $blog_category_dis; ?></h1>
    </div>
  </div>
    <div class="container-fluid">
       
        <div class="row bg-light">

        <div class="col-md-4 pt-5 d-md-none "  style="background-color:#F9F5F6; ">
<h2 class=" bg-dark text-light p-3">Categories</h2>
<ul class="list-group list-group-flush catir me-4 border-0">
  <?php echo  $blog_categor ; ?>

</ul>
<h2 class="mt-4  bg-dark text-light p-3">Recent Posts</h2>
<?php echo $recent_blog ;?>


            </div>


            <div class=" col-md-8 mt-5">
            <h2 class=" bg-dark text-light p-3 my-4 d-md-none">Posts</h2>
              <div class="row">
          
          <?php echo $blog ;?>
          
              </div>
            </div>
            <div class="col-md-4 pt-5 d-none d-md-block"  style="background-color:#F9F5F6; ">
<h2 class=" bg-dark text-light p-3">Categories</h2>
<ul class="list-group list-group-flush catir me-4 border-0">
  <?php echo  $blog_categor ; ?>

</ul>
<h2 class="mt-4  bg-dark text-light p-3">Recent Posts</h2>
<?php echo $recent_blog ;?>


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