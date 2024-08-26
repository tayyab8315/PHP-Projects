<?php
include('include/header.php');
include('include/connection.php');

if(isset($_POST['send_message'])){
 $_POST['name'];
 $_POST['mail'];
 $_POST['phone'];
 $_POST['message'];
 $status='Un-Read';
 $insert_query_message = "INSERT INTO `contact_us_message`(`user_name`, `user_mail`, `user_phone_number`, `message_status`, `message`) VALUES ('".$_POST['name']."','". $_POST['mail']."','".$_POST['phone']."','".$status."','".$_POST['message']."')";                                      
 if(mysqli_query($conn,$insert_query_message)){
   
    echo "<script> windows.location.href('contact_us.php')  </script>";
    
 }else{
     echo 'fail';
 }
}



?>
<!doctype html>
<html lang="en">
  <head>

  
    <!-- CSS Link -->
    <link rel="stylesheet" href="assets\css\style.css">
    <link rel="stylesheet" href="include/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
 integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
 crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Aerostore</title>
    <link rel="icon" type="image/png" href="assets/images/title.png" />

   
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
  <body>
 
  <div class="card text-white border-0 ">
    <img src="assets/images/bg-breadcrumb.jpg" class="blog_banner img-fluid" alt="Contact_us_banner_img">
    <div class="card-img-overlay text-center">
      <h1 class="card-title text-end">Contact Us</h1>
    </div>
  </div>
    <div class="container-fluid py-5">
       <div class="contact_us_head text-center">
        <h1>Get In Touch</h1>
   
        <p>Phone: +923099999999</p>
       
        <p>Email: <span class="text-danger">team@Arostore.net</span></p>
 
        <p>Address: 84 Main Boluvard,San Fracisco,USA</p>
       </div>
       <div class="container">

      
<form action="" method="post" class="text-center">
<div class="row">
    
    <div class="col">
    <div class="">
        <input type="text" name="name" class="form-control mb-3 py-3" id="exampleFormControlInput1" placeholder=" Your Name" required>
        <input type="email" name="mail" class="form-control mb-3 py-3" id="exampleFormControlInput1" placeholder=" Your Email" required>
        <input type="tel" name="phone" class="form-control mb-3 py-3" id="exampleFormControlInput1" placeholder=" Your Phone" required>
     
    
    </div>
    </div>
    <div class="col">
      <div class="mb-3">
        <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="8" placeholder=" Your Message" required></textarea>
      </div>
    </div>

   
</div>
<button class="btn btn-warning mt-4 text-white" name="send_message"  >Send Message</button>
</form>
</div>
    </div>
<div class="container-fluid mb-4">
    <div class="row">
        <a class="col-6 mb-4 col-md-3" href="">
            <div class="card contact_us_card bg-dark text-white border-0">
                <img src="assets/images/ins-1.jpg" class="card-img" alt="Social_media_links_img">
                <div class="card-img-overlay  text-center">
                  <span >  <i class="fa-brands fa-facebook-f fa-2xl p-2"></i></span>
                </div>
              </div>
            </a>
        <a class="col-6 mb-4 col-md-3" href="">
            <div class="card contact_us_card bg-dark text-white border-0">
                <img src="assets/images/ins-4.jpg" class="card-img" alt="Social_media_links_img">
                <div class="card-img-overlay  text-center">
                  <span ><i class="fa-brands fa-instagram fa-2xl p-2"></i></span>
                </div>
              </div>
            </a>
        <a class="col-6 mb-4 col-md-3" href="">
            <div class="card contact_us_card bg-dark text-white border-0">
                <img src="assets/images/ins-2.jpg" class="card-img" alt="Social_media_links_img">
                <div class="card-img-overlay  text-center">
                  <span ><i class="fa-brands fa-twitter fa-2xl p-2"></i></span>
                </div>
              </div>
            </a>
      
        <a class="col-6 col-md-3 mb-4" href="">
            <div class="card contact_us_card bg-dark text-white border-0">
                <img src="assets/images/ins-5.jpg" class="card-img" alt="Social_media_links_img">
                <div class="card-img-overlay  text-center">
                  <span ><i class="fa-brands fa-youtube fa-2xl p-2"></i></span>
                </div>
              </div>
            </a>
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