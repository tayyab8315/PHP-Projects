<?php

session_start();
include('include/connection.php');
if(isset($_POST['login'])){
$user_name=$_POST['user_name'];
$password=$_POST['password'];
$register_query= "SELECT * FROM user_accounts WHERE user_name = '".$user_name."' AND password = '".$password."'";
$run_register_query = mysqli_query($conn,$register_query);
    $data = mysqli_fetch_array($run_register_query);
    if($data){
        $_SESSION['admin_id']    = $data['admin_id'];
        $_SESSION['username']  = $data['user_name'];
        header('Location:manage_cards.php');
// echo'success';
    }else{
        header('Location:index.php');
        // echo'fail';
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

      
<title>Arostore-Admin</title>
    <link rel="icon" type="image/png" href="../user/assets/images/admin4.png" />

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
       .bg{
        background:url(assets/upload_images/admin_bg3.jpg);
        background-size:cover;
        background-position: center center;
        background-repeat: no-repeat;
        height:100vh;
    }
</style>
</head>

<body id="page-top">

 
                <main class="" >
              
<div class="container-fluid bg">
    <div class="row rounded text-white">
        <div class="col-md-4 rounded  mx-auto p-4" style="margin-top:100px; /* From https://css.glass */
background: rgba(255, 255, 255, 0.2);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.9);
backdrop-filter: blur(2.1px);
-webkit-backdrop-filter: blur(51px);
border: 0.2.px solid rgba(255, 255, 255, 0.3);">
        <!-- <img src="assets/upload_images/admin4.png" class=" rounded-circle"  alt="" style=" display:inline-block; margin:0px 32% 0px ;  height:150px; width:150px;">    
        <h2 class="text-center text-white  pb-2">Admin Login</h2>
            <form action="index.php" method="POST">
                <div class="input-group mb-3">
                    <span class="input-group-text"  id="basic-addon1"><i class="far fa-user"></i></span>
                    <input type="text" name="user_name" class="form-control  " style="background-color:transparent" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                
                <button type="submit" name="login" class="btn btn-primary text-capitalize text-white mb-3" >Login</button> <button type="submit" name="signup" class="btn btn-primary text-capitalize text-white mb-3" >Sign-Up</button>
             -->
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
        </div>
    </div>
</div>
    </main>
    
</body>

</html>