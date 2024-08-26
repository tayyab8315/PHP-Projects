<?php

include('../admin/include/connection.php');
$id=1;
$query = "SELECT * FROM manage_site";
$run  = mysqli_query($conn, $query);
$row  = mysqli_fetch_array($run);
    $Card_title    = $row['web_title'];
    $Card_disc    =$row['web_discription'];
    $mail    = $row['Email'];
    $address     = $row['address'];
    $phone     =$row['telephone'];
    $image  = $row['logo'];
    $Card_id  = $row['id'];



?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
            <div class="card bg-dark text-white">
                <img src="../admin/assets/upload_images/<?php echo $image?>" height="350px" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h3 class="card-title "><?php echo $Card_title ;?></h5>
                    <p class="card-text"><?php  echo $Card_disc ;?></p>
                    <p class="card-text">Email:<?php  echo $mail;?></p>
                    <p class="card-text">Phone:<?php  echo $phone ;?></p>
                    <p class="card-text">Address:<?php  echo $address ;?></p>
                
               
                  </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card bg-dark text-white">
                <img src="../admin/assets/upload_images/<?php echo $image?>" height="350px" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h3 class="card-title "><?php echo $Card_title ;?></h5>
                    <p class="card-text"><?php  echo $Card_disc ;?></p>
                    <p class="card-text">Email:<?php  echo $mail;?></p>
                    <p class="card-text">Phone:<?php  echo $phone ;?></p>
                    <p class="card-text">Address:<?php  echo $address ;?></p>
                
               
                  </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card bg-dark text-white">
                <img src="../admin/assets/upload_images/<?php echo $image?>" height="350px" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h3 class="card-title "><?php echo $Card_title ;?></h5>
                    <p class="card-text"><?php  echo $Card_disc ;?></p>
                    <p class="card-text">Email:<?php  echo $mail;?></p>
                    <p class="card-text">Phone:<?php  echo $phone ;?></p>
                    <p class="card-text">Address:<?php  echo $address ;?></p>
                
               
                  </div>
                </div>
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