<?php
include('include/header.php'); 
include('include/connection.php');
if(isset($_GET['blog_id'])){
  $blog_id = $_GET['blog_id'];
   }
$blog=$blog_categor=$recent_blog= $cards= $tabs=$comments=$count_comments=$bloff='';

// fetch data from manege_product table
$fetch_query_for_blog  = "SELECT * FROM blog WHERE blog_id='".$blog_id."'";
$data_from_blog_db   = mysqli_query($conn,$fetch_query_for_blog);
$fetched_data_from_blog = mysqli_fetch_array($data_from_blog_db);
if($fetched_data_from_blog){
  $bloff.='<div class="card mb-3 border-0">
        <img src="../admin/assets/upload_images/'.$fetched_data_from_blog['blog_feature_img'].'" class="card-img_blog_top img-fluid" alt="Blog_post_img">
        <div class="card-body">
            <p class="card-text text-center post_head"> Published By <b class="text-warning">Admin</b></p>
          <h1 class="card-title">'.$fetched_data_from_blog['blog_title'].'</h1>
          <p class="card-text"><small class="text-muted">'. $fetched_data_from_blog['date'].'</small></p>
          <p class="card-text">'.$fetched_data_from_blog['blog_disc'].'</p>
        </div>
      </div>';
}else{
  $bloff='';
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
    <img src="../admin/assets/upload_images/'.$fetched_data_from_blog_for_recent_posts['blog_feature_img'].'" class="img-fluid rounded h-100"  " alt="recent_post_img">
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

}
function formatInterval($interval) {
  $formatted = "";
  if ($interval->y > 0) {
      $formatted .= $interval->y . " year" . ($interval->y > 1 ? "s" : "") . " ";
  }
  if ($interval->m > 0) {
      $formatted .= $interval->m . " month" . ($interval->m > 1 ? "s" : "") . " ";
  }
  if ($interval->d > 0) {
      $formatted .= $interval->d . " day" . ($interval->d > 1 ? "s" : "") . " ";
  }
  if ($interval->h > 0) {
      $formatted .= $interval->h . " hour" . ($interval->h > 1 ? "s" : "") . " ";
  }
  if ($interval->i > 0) {
    $formatted .= $interval->i . " minute" . ($interval->i > 1 ? "s" : "") . " ";
}
  
  if (empty($formatted)) {
      return "just now";
  }
  
  return $formatted . "ago";
}




if(isset($_POST['submit_comment'])){
   
  if(!isset($_SESSION['user_id'])){

    echo "<script>
    alert('You Must Login First');
    window.location.href='login.php';

  </script>"; 
}

    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $comment = $_POST['comment'];
  //  if(isset($_GET['blog_id'])){
  //    $blog_id = $_GET['blog_id'];
  //    }
    $insert_comment_query = "INSERT INTO blog_comment (blog_id,user_name,email,comment) VALUES ('".$blog_id."','".$name."','".$mail."','".$comment."')";                                      
    if(mysqli_query($conn,$insert_comment_query)){
    }else{
        echo 'isertion failed';
    }
  // }else{

  //   echo "<script>
  //   alert('You Must Login First');
  //   window.location.href='login.php';

  // </script>";
  // }
}



$fetch_query_for_comment  = "SELECT * FROM blog_comment WHERE blog_id='".$blog_id."'";
$data_from_comment_db   = mysqli_query($conn,$fetch_query_for_comment);
$count_comments   = mysqli_num_rows($data_from_comment_db );
for($com=1;$com<=$count_comments; $com++){
  $fetched_data_from_comments = mysqli_fetch_array($data_from_comment_db);
  $comments.='
  <div class=" mb-3">
  <div class="commnet_head ms-2">
  <div class="row">
  <div class="col-3 pt-1">
      <img src="assets/images/admin4.png" class=" comment  rounded-start img-fluid " alt="user_comment_img">
  </div>
  <div class="col-9 pt-2">
      <div class=""><h4 class="title text-warning">'.$fetched_data_from_comments['user_name'].'</h4>
          <small class="text-muted">'.date("Y-m-d H:i:s", strtotime($fetched_data_from_comments['comment_time'])).'</small></div>
  </div>
</div>
</div>
            
<div class="card-body border">

  <p class="card-text">'.$fetched_data_from_comments['comment'].'</p>
</div>
</div>
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

  <body>
  <div class="card bg-dark text-white ">
    <img src="assets/images/about_us_bg.jpg" class="blog_banner img-fluid" alt="blog_banner_img">
    <div class="card-img-overlay text-center">
      <h1 class="card-title">Blog</h1>
    </div>
  </div>
    <div class="container-fluid">
       
        <div class="row">

        <div class="col-md-4 mt-5 d-md-none ">
<h2 class=" bg-dark text-light p-3">Categories</h2>
<ul class="list-group list-group-flush catir me-4 border-0">
  <?php echo  $blog_categor ; ?>

</ul>
<h2 class="mt-4  bg-dark text-light p-3">Recent Posts</h2>
<?php echo $recent_blog ;?>


            </div>


            <div class=" col-md-8 mt-5">
            <h2 class=" bg-dark text-light p-3 my-4 d-md-none">Posts</h2>
            
          <div class="single_post">
  <?php
  echo $bloff;
  ?>



      <form action="" method="post" class=" m-5 p-3 border">
        <div class="h2 text-center">Comments</div>
        <label for="Name">Name</label>
        <input type="text" name="name" class="form-control" id="Name" aria-label="Username">
        <br>
        <label for="mail">Email</label>
        <input type="email" name="mail"  class="form-control" id="mail" aria-label="Server">
        <br>
        <label for="comment">Comment</label>
        <textarea class="form-control" name="comment" id="comment" aria-label="With textarea"></textarea>
        <br>
        <button class="btn btn-warning text-white" name="submit_comment" >Submit</button>
    </form>

    <div class="card" >
   
        <div class="card-body">
          <h2 class="card-title my-5"><?php echo $count_comments ;?> Comments <i class="fa-solid fa-comment"></i></h2>
          <?php echo $comments ;?>

            </div> 
      </div>
            






      </div>
            </div>




            
            <div class="col-md-4 pt-5 bg-light d-none d-md-block">
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