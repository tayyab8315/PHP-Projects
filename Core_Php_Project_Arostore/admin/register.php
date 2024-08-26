<?php
include('include/connection.php');
if(isset($_POST['register'])){

   
        $password = $_POST["pwd"];
    
        // Check if the password meets the criteria
        if (
            strlen($password) >= 8 &&
            preg_match("/[A-Z]/", $password) &&
            preg_match("/[a-z]/", $password) &&
            preg_match("/[0-9]/", $password) &&
            preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password)
        ) {
            if( $_POST['pwd'] == $_POST['pwd2']) {
                $insert = "INSERT INTO `register`(`f_name`, `l_name`, `email`, `password`) VALUES ('" . $_POST['f_name'] . "', '" . $_POST['l_name'] . "', '" . $_POST['mail'] . "', '" . $_POST['pwd'] . "')";
            
                $data= mysqli_query($conn,$insert);
                if($data){
                    echo" <script> window.location.href = 'login.php';</script>";
                   
                }else{
                    echo"failed"; 
                }
                
               }else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" data-mdb-delay="3000">
                Both Passwords Are Not Matching
              </div>';
               }
            
        
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" data-mdb-delay="3000">
           Password Must be more then 8 Characters Atleast one uppercase letter  one lowercase letter  one digit one special character
          </div>';
         
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

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="" style=" background-color: #ffc107;">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7" style=" background-color: #000; color: #ffc107;" >
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4  mb-4">Create an Account!</h1>
                            </div>
                            <form class="user"  method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="f_name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="l_name" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="mail" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="pwd" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="pwd2" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button  type="submit" name="register" class="btn btn-user btn-block"  style=" background-color: #ffc107; color: #000;">
                                    Register Account
                                </button>
                                <hr>
                               
                            </form>
                            <div class="text-center">
                                <a class="small"  style=" color: #ffc107;" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" style=" color: #ffc107;" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<script>
   let alert = document.querySelector('.alert');
   setTimeout(function(){
    alert.remove();
   },3000);
</script>