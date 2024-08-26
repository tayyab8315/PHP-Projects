<?php

include('../admin/include/connection.php');
    $query1 = "SELECT * FROM `about_us` WHERE id = 1";
    $run1  = mysqli_query($conn, $query1);
    $row  = mysqli_fetch_array($run1);
    $about_us_detail              = $row['about_us_detail'];
    $main_banner_img              = $row['main_banner_img'];
    $sub_banner_img               = $row['sub_banner_img'];
    $Banner_3rd_img               = $row['Banner_3rd_img'];
    $team_mamber_1_img            = $row['team_mamber_1_img'];
    $team_mamber_1_name           = $row['team_mamber_1_name'];
    $team_mamber_1_destination    = $row['team_mamber_1_destination'];

    $query2 = "SELECT * FROM `about_us` WHERE id = 2";
    $run2  = mysqli_query($conn, $query2);
    $row  = mysqli_fetch_array($run2);
    $team_mamber_2_img            = $row['team_mamber_1_img'];
    $team_mamber_2_name           = $row['team_mamber_1_name'];
    $team_mamber_2_destination    = $row['team_mamber_1_destination'];

    $query3 = "SELECT * FROM `about_us` WHERE id = 3 ";
    $run3  = mysqli_query($conn, $query3);
    $row  = mysqli_fetch_array($run3);
    $team_mamber_3_img            = $row['team_mamber_1_img'];
    $team_mamber_3_name           = $row['team_mamber_1_name'];
    $team_mamber_3_destination    = $row['team_mamber_1_destination'];

    $query4 = "SELECT * FROM `about_us` WHERE id = 4 ";
    $run4  = mysqli_query($conn, $query4);
    $row  = mysqli_fetch_array($run4);
    $team_mamber_4_img            = $row['team_mamber_1_img'];
    $team_mamber_4_name           = $row['team_mamber_1_name'];
    $team_mamber_4_destination    = $row['team_mamber_1_destination'];

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="include/style.css">
<!-- google fonts cdn  -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400&display=swap" rel="stylesheet">
<!-- Fontawesome CDN  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
      /* font-family: Jost, Helvetica, Arial, Lucida, sans-serif; */
     }
    </style>
  </head>
  <body>
       
<?php
include('include/header.php');


?>

    <div class="card border-0 rounded rounded-0">
    <img src="../admin/assets/upload_images/<?php echo  $main_banner_img ; ?>" class="card-img about_us_img" alt="About_us_main_banner">
    <div class="card-img-overlay text-center text-white">
      <h1 class="card-title">About Us</h1>
      <p class="card-text">About Aro. We believe the best experience always wins</p>
    </div>
  </div>
  </div>
  <div class="container">
    <div class="row my-3 my-md-5">
        <div class="col-md-6 ">
          <img src="../admin/assets/upload_images/<?php echo  $sub_banner_img ; ?>" class="img-fluid banner_subimg d-none d-md-block"  alt="About_us_sub_banner">
                   
        </div>
        <div class="col-md-6  ps-5">
          <span class="sm_heading">Our Story</span>
          <h2>About Us</h2>
          <p class="text-break" ><?php echo $about_us_detail  ; ?></p>
          <br>  <br>
          <p class="socail_icons ">
           <a href=""><i class="fa-brands fa-facebook-f fs-3 me-2"></i></a> <a href=""><i class="fa-brands fa-twitter fs-3 me-2"></i></a> <a href=""><i class="fa-brands fa-linkedin-in fs-3 me-2"></i></a><a href=""><i class="fa-brands fa-instagram fs-3"></i></a>
          </p>
        </div>
    </div>
  </div>
  <div class="container-fluid team pt-4">
    <div class="container text-center">
        <span class="sm_heading">Our Story</span>
        <h2>Our Team</h2>
            <div class="row my-5 py-5">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <div class="our-team">
          <div class="picture ">
            <img class="img-fluid team_img " src="../admin/assets/upload_images/<?php echo  $team_mamber_1_img ; ?>">
          </div>
          <div class="team-content">
            <h3 class="name text-dark"><?php echo  $team_mamber_1_name ; ?></h3>
            <h4 class="title"><?php echo $team_mamber_1_destination ; ?></h4>
          </div>
          <ul class="social">
            <li><a href="https://codepen.io/collection/XdWJOQ/" aria-hidden="true"><i class="fa-brands fa-facebook-f px-2"></i></a></li>
            <li><a href="https://codepen.io/collection/XdWJOQ/"  aria-hidden="true"><i class="fa-brands fa-twitter   px-2"></i></a></li>
            <li><a href="https://codepen.io/collection/XdWJOQ/"  aria-hidden="true"><i class="fa-brands fa-instagram px-2"></i></a></li>
            <li><a href="https://codepen.io/collection/XdWJOQ/" aria-hidden="true"><i class="fa-brands fa-youtube  px-2 "></i></a></li>
          </ul>
        </div>
      </div> 
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <div class="our-team">
          <div class="picture ">
            <img class="img-fluid team_img " src="../admin/assets/upload_images/<?php echo  $team_mamber_2_img ; ?>">
          </div>
          <div class="team-content">
            <h3 class="name text-dark"><?php echo  $team_mamber_2_name ; ?></h3>
            <h4 class="title"><?php echo $team_mamber_2_destination ; ?></h4>
          </div>
          <ul class="social">
            <li><a href="https://codepen.io/collection/XdWJOQ/" aria-hidden="true"><i class="fa-brands fa-facebook-f px-2"></i></a></li>
            <li><a href="https://codepen.io/collection/XdWJOQ/"  aria-hidden="true"><i class="fa-brands fa-twitter   px-2"></i></a></li>
            <li><a href="https://codepen.io/collection/XdWJOQ/"  aria-hidden="true"><i class="fa-brands fa-instagram px-2"></i></a></li>
            <li><a href="https://codepen.io/collection/XdWJOQ/" aria-hidden="true"><i class="fa-brands fa-youtube  px-2 "></i></a></li>
          </ul>
        </div>
      </div> 
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <div class="our-team">
          <div class="picture ">
            <img class="img-fluid team_img " src="../admin/assets/upload_images/<?php echo  $team_mamber_3_img ; ?>">
          </div>
          <div class="team-content">
            <h3 class="name text-dark"><?php echo  $team_mamber_3_name ; ?></h3>
            <h4 class="title"><?php echo $team_mamber_3_destination ; ?></h4>
          </div>
          <ul class="social">
            <li><a href="https://codepen.io/collection/XdWJOQ/" aria-hidden="true"><i class="fa-brands fa-facebook-f px-2"></i></a></li>
            <li><a href="https://codepen.io/collection/XdWJOQ/"  aria-hidden="true"><i class="fa-brands fa-twitter   px-2"></i></a></li>
            <li><a href="https://codepen.io/collection/XdWJOQ/"  aria-hidden="true"><i class="fa-brands fa-instagram px-2"></i></a></li>
            <li><a href="https://codepen.io/collection/XdWJOQ/" aria-hidden="true"><i class="fa-brands fa-youtube  px-2 "></i></a></li>
          </ul>
        </div>
      </div>    
         <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <div class="our-team">
          <div class="picture ">
            <img class="img-fluid team_img " src="../admin/assets/upload_images/<?php echo  $team_mamber_4_img ; ?>">
          </div>
          <div class="team-content">
            <h3 class="name text-dark"><?php echo  $team_mamber_4_name ; ?></h3>
            <h4 class="title"><?php echo $team_mamber_4_destination ; ?></h4>
          </div>
          <ul class="social">
            <li><a href="https://codepen.io/collection/XdWJOQ/" aria-hidden="true"><i class="fa-brands fa-facebook-f px-2"></i></a></li>
            <li><a href="https://codepen.io/collection/XdWJOQ/"  aria-hidden="true"><i class="fa-brands fa-twitter   px-2"></i></a></li>
            <li><a href="https://codepen.io/collection/XdWJOQ/"  aria-hidden="true"><i class="fa-brands fa-instagram px-2"></i></a></li>
            <li><a href="https://codepen.io/collection/XdWJOQ/" aria-hidden="true"><i class="fa-brands fa-youtube  px-2 "></i></a></li>
          </ul>
        </div>
      </div>
              
            </div>
        </div>
</div>
<div class="container mb-5">
    <div class="row">
        <div class="col-md-4 ps-5 ps-md-0">
<h4>Who we are</h4>
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. accusantium tempore magnam eos! Enim error facilis omnis ab obcaecati magnam deleniti quod eos, dicta eaque temporibus rerum!</p>
<br><br>
<h4>Our mission</h4>
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. accusantium tempore magnam eos! Enim error facilis omnis ab obcaecati magnam deleniti quod eos, dicta eaque temporibus rerum!</p>
        </div>
        <br><br>
        <br><br>
        <div class="col-md-4  ps-5 ps-md-0">
          <h4>How we started</h4>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. accusantium tempore magnam eos! Enim error facilis omnis ab obcaecati magnam deleniti quod eos, dicta eaque temporibus rerum!</p>
          <br><br>
          <h4>Our vision</h4>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. accusantium tempore magnam eos! Enim error facilis omnis ab obcaecati magnam deleniti quod eos, dicta eaque temporibus rerum!</p> 
        </div>
        <div class="col-md-4 d-none d-md-block">
          <img src="../admin/assets/upload_images/<?php echo  $Banner_3rd_img ; ?>" class="img-fluid h-100 "  alt="About_us_sub_banner">
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
<?php
include('include/footer.php');


?>