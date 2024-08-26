<?php
include('include/connection.php');
include('include/header.php');
if(!isset($_SESSION['user_id'])){
  echo "<script>
  alert('You Must Login First');
  window.location.href='login.php';
  
  </script>";
 
}
if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
 
}
$serial = 0;
$wish='';


$fetch_query  = "SELECT * FROM wishlist WHERE user_account_id =$user_id  ";
$data_from_db   = mysqli_query($conn,$fetch_query);
$count   = mysqli_num_rows($data_from_db );
for($i=1;$i<=$count; $i++){
 
        $fetched_data = mysqli_fetch_array($data_from_db);
   
        $serial =  $serial + 1;
        $wish.='<tr class="text-center " id="tr_'.$fetched_data['wishlisted_pd_id'].'">
                <th scope="row "  class="pt-4" >'.$serial.'</th>
                <td> <img src="../admin/assets/upload_images/'.$fetched_data['product_img'].'" height="50px" width="50px"  alt="product_img"></td>
                <td class="pt-4">'.$fetched_data['product_name'].'</td>
                <td class="pt-4">$'.$fetched_data['product_price'].'</td>
                <td  class="pt-4" >  
                <form action="manage_cart.php" method="POST">
            
                <button name="add_cart" class="bg-warning text-light py-1 px-2 border-0 rounded"  >Add to Cart</button>
            
                <input type="hidden" value="'.$fetched_data['product_id'].'" name="prod_id">
                <input type="hidden" value="'. $fetched_data['product_name'].'" name="item_name">
                <input type="hidden" value="'. $fetched_data['product_price'].'" name="price">
            
                    </form>
   
</td>
                <td  class="pt-4">
              
                <a name="remove_item" href="delete_wushlist.php?wish_id='.$fetched_data['wishlisted_pd_id'].'" class="bg-danger text-light py-1 px-2 border-0 rounded remove-btn text-decoration-none " onclick="delete_date('.$serial.')" >Remove</a>

                </td>
                    
            </tr>';

    }

 




?>
<link rel="stylesheet" href="include/style.css">
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container-fluid cart_table pt-2">
<div class="row">
        <div class="col-12">
        <div class="card shadow mb-4 ">
 
    
 <div class="card-header py-3 " style="background-color:#000;">
     <h1 class="m-0 font-weight-bold text-warning text-center">My Wishlist</h1>
   


 </div>
                <div class="card-body ">
                 
                     
                  

                       
                        <table class="table table-responsive table table-bordered border-dark ">
                        <thead  class="text-center bg-warning">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Prduct Image</th>
                                <th scope="col">Prduct Name</th>
                                <th scope="col">Product Price</th>
                                <th>Buy</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                      
           <?php echo $wish ; ?>
           

           </tbody>
           </table>


                    
              
           </div>   
            </div>
        </div>
    </div>
    
</div>
<?php include('include/footer.php');?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
 <script>

  function delete_date(id){
jQuery.ajax({
url:'delete_cart.php',
type:'post',
data:'wish_id='+id,
  success:function(result) {
    jQuery('#tr_'+id).hide(500); 
  }
})
   
  }
 </script>