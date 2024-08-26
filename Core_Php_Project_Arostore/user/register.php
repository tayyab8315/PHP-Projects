<?php
include('include/connection.php');
if(isset($_POST['register'])){
 $mail = $_POST['mail'];
 $password = $_POST['password'];
 $enc_password = md5( $password);
 $user_img    = $_FILES['user_img']['name']; 
 $tmp_name       = $_FILES['user_img']['tmp_name'];
 $path="../admin/assets/upload_images/$user_img";
move_uploaded_file($tmp_name,$path);

  $insert_query = "INSERT INTO `user_accounts`(`user_email`, `user_pwd`, `user_img`) VALUES ('".$mail."','".$password."','".$user_img."')";                                      
  if(mysqli_query($conn,$insert_query)){
      header('Location:login.php');
      // echo "success";
  }else{
      echo 'fail';
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>Arostore</title>
    <link rel="icon" type="image/png" href="assets/images/title.png" />
  </head>
  <style>


    .login_page{
    height: 100vh !important;background: linear-gradient(90deg, rgba(0,0,0,1) 50%, rgba(255,193,7,1) 50%);
    background-position: center center;
   background-size: cover;
   background-repeat: no-repeat;
   padding: 10vh 10vw;
}
.form_head {
color:#ffc107 ;
}
.input-group-text i{
    color:black ;
}
.input-group input::placeholder,.form-check-label,.img-select{
    color:  black ;
}
.form_left,.form_right{
        height: 80vh !important;
    }
    .form_right{
        background-color:black;
    }
    .form_left img{
        height: 80vh !important;
        width: 100%;
       background-color:#ffc107;
    }
    .login_btn{
        color: black;
    }
    @media only screen and (max-width: 767px) {
        .login_page{
    /* height: 100vh !important; */
    background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(255,193,7,1) 0%);
    background-position: center center;
   background-size: cover;
   background-repeat: no-repeat;
}

}
  </style>
  <body>
  <div class="container-fluid login_page g-0 bg-primary ">
    <div class="containerrr ">
    <div class="row">
<div class="col-0 col-md-6 d-none d-md-block form_left bg-warning g-0">
<img src="assets/images/Blog-3-720x484-removebg-preview.png" class="img-fluid" alt="registration_banner_img">
</div>
<div class="col-12 col-md-6 g-0 form_right ">
   
    <form method="post" class=" m-1 px-1 m-sm-4 px-sm-4 m-md-2 px-md-2  m-lg-3 pt-lg- px-lg-3" enctype="multipart/form-data">
        <div class="h2 form_head">Welcome To Arostore</div>
        <span  class="h5 form_head">Glad To Start a Journey With You</span>
        <br><br>
        <br>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-solid fa-envelope" ></i></span>
            <input type="email" name="mail" class="form-control py-2" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-solid fa-lock" ></i></span>
            <input type="password" name="password" class="form-control py-2" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-solid fa-image" ></i></span>
            <input type="file" name="user_img" class="form-control img-select py-2" value="Image" aria-label="image" aria-describedby="basic-addon1">
          </div>
       <br>
          <div class="text-center">
        <button type="submit" name="register" class="btn bg-warning login_btn">Register <i class="fa-solid fa-arrow-right-to-bracket"></i></button>
    </div>
       
      </form>
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