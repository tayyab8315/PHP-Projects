<?php
include('include/connection.php');
include('include/header.php');
if(!isset($_SESSION['user_id'])){
    echo "<script>
    alert('You Must Login First');
    window.location.href='login.php';
    
    </script>";
   
  }
$total = 0;
$cart='';
if(isset($_SESSION['cart'])){
    $serial = '';
    foreach($_SESSION['cart'] as $key => $value){
        $serial = $key + 1;
     $signle_product_total = $value['price'] * $value['quantity'] ;
        $total = $total + $signle_product_total;
        $cart.='<tr class="text-center " id="tr_'.$serial.'">
                <th scope="row">'.$serial.'</th>
                <td>'.$value['item_name'].'</td>
                <td>$'.$value['price'].'<input type="hidden" class="iprice" name="item_price[]" value="'.$value['price'].'"></td>
                <td class="w-25 ">
                        <input type="number" name="item_quantity[]" onchange="subTotal()" min="1" max="10" class="w-25 iquantity" value="'.$value['quantity'].'">
                        <input type="hidden" name="item_name[]" class="product" value="'.$value['item_name'].'">
        
                </td>
                <td > $<span class="itotal"></span> </td>
                <td>
              
                <button name="remove_item" class="bg-danger text-light py-1 px-2 border-0 rounded remove-btn " onclick="delete_date('.$serial.')" >Remove</button>

                </td>
                    
            </tr>';
    }
   
}else{
   $cart.= "Your Cart is empty ";
}

$order_data = [];

if (isset($_POST['order'])) {
    // Retrieve and display the product_id and product_quantity values from the submitted form
   
    $product_quantities = $_POST['item_quantity'];
    $item_price = $_POST['item_price'];
    $item_name = $_POST['item_name'];

    // Loop through and store the product details in the order_data array
    for ($i = 0; $i < count($item_name); $i++) {

        $product_quantity = $product_quantities[$i];
        $price = $item_price[$i];
        $itemname = $item_name[$i];
        $status = "Pending";

        // Create an associative array with the product details
        $product_details = [
            'product_quantity' => $product_quantity,
            'price' => $price,
            'item_name' => $itemname,
            'status' => $status,
        ];

        // Add the product details to the order_data array
        $order_data[] = $product_details;
    }


    // Store the order_data array in the session named "order"
    $_SESSION['order'] = $order_data;
    // $newLocation ="order.php";
 echo '<script>window.location.href = "order.php"</script>';
}

?>
<head>
  
<title>Arostore</title>
    <link rel="icon" type="image/png" href="assets/images/title.png" />
</head>
<link rel="stylesheet" href="include/style.css">
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container-fluid cart_table pt-2">
<div class="row">
        <div class="col-12">
        <div class="card shadow mb-4 ">
 
    
 <div class="card-header py-3 " style="background-color:#000;">
     <h1 class="m-0 font-weight-bold text-warning text-center">My Cart</h1>
   


 </div>
                <div class="card-body ">
                 
                     
                 <form method="post" action="">
                  

                        <tbody>
                        <table class="table table-bordered border-dark table-responsive ">
                        <thead  class="text-center bg-warning">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Prduct Name</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                        
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                      
           <?php echo $cart ; ?>
           

           </tbody>
           </table>
           <h3 class="mt-5 text-start text-dark">
                  Total Amount:
                 $<span id="total_bill"> </span>
                </h3>
           <button name="order" class="bg-Warning rounded py-2 px-4 text-light border-0 mt-5 ">Proceed Order</button>
                               </form>

                    
                </div>
                
            </div>
        </div>

    </div>
    
</div>
<?php include('include/footer.php');?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
 <script>




var grand_total=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('itotal');
var total_bill=document.getElementById('total_bill');
function subTotal(){
  grand_total=0;
  for(i=0; i < iprice.length;i++ )
  {
itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
grand_total=grand_total+(iprice[i].value)*(iquantity[i].value);
  }
  total_bill.innerText=grand_total;
}
subTotal();

  function delete_date(id){
jQuery.ajax({
url:'delete_cart.php',
type:'post',
data:'id='+id,
  success:function(result) {
    jQuery('#tr_'+id).hide(500); 
  }
})
   
  }
 </script>