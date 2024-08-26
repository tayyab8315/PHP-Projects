<?php
include('include/header.php');
include('include/connection.php');
$faqs='';
// fetch data from manege_product table
$fetch_query  = "SELECT * FROM faqs where status ='Active' ";
$data_from_db   = mysqli_query($conn,$fetch_query);
$count   = mysqli_num_rows($data_from_db );
for($i=1;$i<=$count; $i++){
$fetched_data = mysqli_fetch_array($data_from_db);

    $faqs .='
    <div class="accordion-item border-0 mb-3">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed bg-light fs-5 fw-bolder" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'.$fetched_data['faqs_id'].'" aria-expanded="false" aria-controls="flush-collapseOne">
       '.$fetched_data['question'].'
      </button>
    </h2>
    <div id="flush-collapse'.$fetched_data['faqs_id'].'" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">  '.$fetched_data['answer'].'</div>
    </div>
  </div>
  '   ;
   }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Arostore</title>
  <link rel="icon" type="image/png" href="assets/images/title.png" />

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS Link -->
    <link rel="stylesheet" href="assets\css\style.css">
    <link rel="stylesheet" href="include/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
 integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
 crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <img src="assets/images/bg-breadcrumb.jpg" class="blog_banner img-fluid" alt="Faqs_Banner_img">
    <div class="card-img-overlay text-center">
      <h1 class="card-title text-end">Frequently Asked Questions</h1>
    </div>
  </div>
    <div class="container py-5">
       <div class="contact_us_head text-start">
        <h1  class="mb-4">General Questions</h1>
        <div class="accordion accordion-flush" id="accordionFlushExample">
<?php echo  $faqs ;?>

 

</div>
</div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <?php include('include/footer.php');?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   
  </body>
</html>




<!-- 


  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='1440' height='560' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1372%26quot%3b)' fill='none'%3e%3crect width='1440' height='560' x='0' y='0' fill='url(%26quot%3b%23SvgjsLinearGradient1373%26quot%3b)'%3e%3c/rect%3e%3cpath d='M73.3 -121.31L244.78 -22.31L244.78 175.69L73.3 274.69L-98.18 175.69L-98.18 -22.31zM244.78 175.69L416.26 274.69L416.26 472.69L244.78 571.69L73.3 472.69L73.3 274.69zM73.3 472.69L244.78 571.69L244.78 769.69L73.3 868.69L-98.18 769.69L-98.18 571.69zM416.26 -121.31L587.73 -22.31L587.73 175.69L416.26 274.69L244.78 175.69L244.78 -22.31zM759.21 472.69L930.69 571.69L930.69 769.69L759.21 868.69L587.73 769.69L587.73 571.69zM1102.17 -121.31L1273.65 -22.31L1273.65 175.69L1102.17 274.69L930.69 175.69L930.69 -22.31zM1273.65 175.69L1445.12 274.69L1445.12 472.69L1273.65 571.69L1102.17 472.69L1102.17 274.69zM1445.12 472.69L1616.6 571.69L1616.6 769.69L1445.12 868.69L1273.65 769.69L1273.65 571.69z' stroke='rgba(255%2c 193%2c 7%2c 1)' stroke-width='2'%3e%3c/path%3e%3cpath d='M53.5 -121.31 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM224.98 -22.31 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM224.98 175.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM53.5 274.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM-117.98 175.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM-117.98 -22.31 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM396.46 274.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM396.46 472.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM224.98 571.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM53.5 472.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM224.98 769.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM53.5 868.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM-117.98 769.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM-117.98 571.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM396.46 -121.31 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM567.93 -22.31 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM567.93 175.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM739.41 472.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM910.89 571.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM910.89 769.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM739.41 868.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM567.93 769.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM567.93 571.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM1082.37 -121.31 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM1253.85 -22.31 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM1253.85 175.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM1082.37 274.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM910.89 175.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM910.89 -22.31 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM1425.32 274.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM1425.32 472.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM1253.85 571.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM1082.37 472.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM1596.8 571.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM1596.8 769.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM1425.32 868.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0zM1253.85 769.69 a19.8 19.8 0 1 0 39.6 0 a19.8 19.8 0 1 0 -39.6 0z' fill='rgba(255%2c 193%2c 7%2c 1)'%3e%3c/path%3e%3cpath d='M303.04 96.88L398.3 151.88L398.3 261.88L303.04 316.88L207.77 261.88L207.77 151.88zM493.57 96.88L588.83 151.88L588.83 261.88L493.57 316.88L398.3 261.88L398.3 151.88zM684.1 426.88L779.36 481.88L779.36 591.88L684.1 646.88L588.83 591.88L588.83 481.88z' stroke='rgba(0%2c 0%2c 0%2c 1)' stroke-width='2'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1372'%3e%3crect width='1440' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3clinearGradient x1='15.28%25' y1='-39.29%25' x2='84.72%25' y2='139.29%25' gradientUnits='userSpaceOnUse' id='SvgjsLinearGradient1373'%3e%3cstop stop-color='%230e2a47' offset='0'%3e%3c/stop%3e%3cstop stop-color='rgba(255%2c 193%2c 7%2c 1)' offset='1'%3e%3c/stop%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e"); -->