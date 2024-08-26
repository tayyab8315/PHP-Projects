<?php
include('include/connection.php');
include('include/header.php');
if(!isset($_SESSION['user_id'])){
  echo "<script>
  alert('You Must Login First');
  window.location.href='login.php';
  
  </script>";
 
}

$user_id=$_SESSION['user_id'];
$fetch_query  = "SELECT * FROM user_accounts WHERE user_id='".$user_id."'";
$data_from_db   = mysqli_query($conn,$fetch_query);
$fetched_data = mysqli_fetch_array($data_from_db);
$user_img= $fetched_data['user_img'];
$user_mail= $fetched_data['user_email'];



$select  = "SELECT * FROM `order`WHERE user_id='".$user_id."' ORDER BY `order`.`order_id` DESC  ";
$data   = mysqli_query($conn,$select);
$serial = 0;
$product = $order= $login_error='';
while($row = mysqli_fetch_array($data)){
  $select_add  = "SELECT * FROM `user_order_info` where order_number='".$row['order_number']."' ORDER BY `user_order_info`.`user_order_id` DESC ";
$data_add   = mysqli_query($conn,$select_add);
$row_add = mysqli_fetch_array($data_add);
$formattedTimestamp = date("H:i A, d M Y ", strtotime($row['order_time']));
  $serial=$serial+1;
  $order_id =$row['order_id'];
$order.=  '<tr class="text-center"> 
<td>
'.$serial.'
</td>
<td>
'.$row['order_number'].'
</td>
<td>
'.$row['product_name'].'
</td>
<td>
'. $row['product_price'].'
</td> <td>
'.$row['product_quantity'].'
</td> <td>
'.$row['order_status'].'

</td>
<td>
'. $formattedTimestamp.'
</td>
<td>
<form action="" method="post">
<button name="can_order" class="delete-button btn-danger btn-sm border-0 ">Cancel</button>
</form>
</td>
</tr>';

                                      
}

if (isset($_POST['can_order'])) {
  $sql = "SELECT * FROM `order` WHERE order_id = '".$order_id."' ";
  $result = mysqli_query($conn, $sql);
      $row2 = mysqli_fetch_assoc($result);
     $orderStatus = $row2['order_status'];

      // Check if the status is 'pending'
      if ($orderStatus == 'Pending') {
          // Delete the record
          $deleteSql = "DELETE FROM `order` WHERE order_id = '".$order_id."' ";
          if (mysqli_query($conn, $deleteSql)) {
              echo "";
              $login_error.='<div id="myAlert" class="alert alert-success position-absolute top-0 start-0 w-100" role="alert">
              Your Order With Order Number "'.$row2['order_number'].'" has been Cancelled.
              </div>';
              echo '<script>window.location.href = "myorder.php"</script>';
          } else {
              echo "Error deleting order: " . mysqli_error($conn);
          }
      } else {
          
          $login_error.='<div id="myAlert" class="alert alert-danger position-absolute top-0 start-0 w-100" role="alert">
          You Cannot Cancel this order because Your Order Is Prepared
          </div>';
      }
 
}
// echo $response= "<script>'".phpResponse."'</script>";
?>
<head>
  
<title>Arostore</title>
    <link rel="icon" type="image/png" href="assets/images/title.png" />
</head>
<link rel="stylesheet" href="include/style.css">
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container-fluid cart_table pt-2 ">
 

<div class="row position-relative">



  <div class="col-2 pt-3" tabindex="-1" >
    <div class="offcanvas-header text-white text-center ">
  
        <div class="col g-0">
        <img src="../admin/assets/upload_images/<?php echo  $user_img ;?>"class="card-img-top-1  img-fluid " alt="user_profile_picture">
       
        <h5 class="card-title text-dark pt-3"><?php echo  $user_mail ;?></h5>
        
          <a type="button"  href="logout.php" class="bg-danger  text-decoration-none  px-2 text-light rounded ">Logout</a>
  
          
          
        </div>
     
    </div>
    </div>
    <div class="offcanvas-body col-10">
    <div class="row  ">
    <div class="col">
      <div class="card  border-0 text-center bg-transparent">
  
        <div class="card-body">
  
  
  
   <div class="container-fluid">
  

  
  <!-- DataTales Example -->
  <div class="card shadow mb-4 ">
 
    
      <div class="card-header py-3 " style="background-color:#000;">
      <?php echo $login_error; ?>
          <h1 class="m-0 font-weight-bold text-warning float-left">My Orders</h1>
        
  
  
      </div>
      <div class="card-body position-relative">
     
          <div class="table-responsive">
              <table class="table table-bordered border-dark" id="dataTable" width="100%" cellspacing="0">
                  <thead class="text-center bg-warning ">
                      <tr>
                      <th scope="col" class="text-center ">#</th>
      <th scope="col" class="text-center">Order Number</th>
      <th scope="col"class="text-center" >Product Name</th>
      <th scope="col" class="text-center">Price</th>
      <th scope="col" class="text-center">Quantity</th>
      <th scope="col" class="text-center">Status</th>
      <th scope="col" class="text-center">Order Time</th>
      <th scope="col" class="text-center">Action</th>
  
     
  
                      </tr>
                  </thead>
               
                  <tbody>
                  <?php echo $order; ?>
                     
                  </tbody>
            
              </table>
              Note: You Can Cancel Order Only When Your Order Status Is Pending</div>
      </div>
  </div>
  
  </div>
        </div>
      </div>
    </div>
  </div>
    </div>
  </div>
  </div>
</div>
<?php include('include/footer.php');?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> -->











