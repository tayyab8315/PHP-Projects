<?php
include('include/connection.php');
$alertt="";
if(isset($_GET['admin_id'])){
    $_GET['admin_id'];
}
    if(isset($_POST['reset'])){
    $status_update = "UPDATE register SET password = '".$_POST['pwd']."' WHERE admin_id = '".$_GET['admin_id']."'";
    if(mysqli_query($conn,$status_update)){
        header('Location:login.php');
    }else{
        echo "Fail";
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

<body class="position-relative" style=" background-color:#ffc107; color:#000;">
<?php echo $alertt ;?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6 " style=" background-color: #000; color:#ffc107;">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4  mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. Verified that your Email Exists You Can Reset Your Passowrd!</p>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="password" name="pwd" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter New Password">
                                        </div>
                                        <button type="submit" name="reset" class="btn  btn-user btn-block" style=" background-color:#ffc107; color:#000;">
                                            Reset Password
</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" style=" color:#ffc107;" href="register.php">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" style=" color:#ffc107;" href="login.php">Already have an account? Login!</a>
                                    </div>
                                </div>
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
    <script>
   let alert = document.querySelector('.alert');
   setTimeout(function(){
    alert.remove();
   },3000);
</script>

</body>

</html>