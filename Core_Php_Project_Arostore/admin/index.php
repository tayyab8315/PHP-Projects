<?php

 session_start();
 if(isset( $_SESSION['username'] )){
    $_SESSION['username'] ;
    $_SESSION['admin_id'] ;
    $_SESSION['f_name'] ;
    $_SESSION['l_name'] ;
}
include('include/connection.php');

// $category = $status_btn=$cat_update_btn=$cat_delete_btn='';
// fetch data from manage_website tbl
$select  = "SELECT * FROM `order` ORDER BY `order`.`order_id` DESC ";
$data   = mysqli_query($conn,$select);
$serial = 0;
$product = $order=$html_content='';

for($k=1;$k<=5; $k++){
$row = mysqli_fetch_array($data);
    // $row = mysqli_fetch_array($data)
$select_add  = "SELECT * FROM `user_order_info` where order_number='".$row['order_number']."' ORDER BY `user_order_info`.`user_order_id` DESC ";
$data_add   = mysqli_query($conn,$select_add);
$row_add = mysqli_fetch_array($data_add);
$formattedTimestamp = date("Y-m-d H:i:s", strtotime($row['order_time']));
$serial=$serial+1;

    
$order.=  '<tr class="text-center"> 
<td>
'.$serial.'
</td>

<td>
'.$row['product_name'].'
</td>
 <td>
'.$row['product_quantity'].'
</td> 
<td>
'. $formattedTimestamp.'
</td>
<td>
'.$row_add['name'].'
</td>

</tr>';


                                    
}


$sql = "SELECT * , COUNT(*) AS order_count, SUM(product_quantity) AS total_quantity_sold FROM `order` GROUP BY `product_name` ORDER BY total_quantity_sold DESC ";

// Execute the query
$result = $conn->query($sql);
$sr=0;
if ($result->num_rows > 0) {
    // Output data in a table
    while ($row2 = $result->fetch_assoc()) {
        $sr=$sr+1;
  
        $html_content .= '<tr class="text-center">';
        $html_content .= '<td>' .$sr. '</td>';
        $html_content .= '<td>' . $row2['product_name'] . '</td>';
        $html_content .= '<td>' . $row2['total_quantity_sold'] . '</td>';
        $html_content .= '</tr>';
    }
} else {
    $html_content .= 'No orders found.';
}




$query5 = "SELECT 
            SUM(CASE WHEN order_status = 'Pending' THEN 1 ELSE 0 END) AS pending_count,
            SUM(CASE WHEN order_status = 'Preparing' THEN 1 ELSE 0 END) AS ready_count,
            SUM(CASE WHEN order_status = 'Delivered' THEN 1 ELSE 0 END) AS delivered_count
          FROM  `order`";

$result5 = $conn->query($query5);

if ($result5) {
    $row5 = $result5->fetch_assoc();
     $pendingCount = $row5['pending_count'];
     $readyCount = $row5['ready_count'];
     $deliveredCount = $row5['delivered_count'];
    }
    $query66 = "SELECT 
            SUM(CASE WHEN message_status = 'Un-Read' THEN 1 ELSE 0 END) AS unread_count
          FROM  `contact_us_message`";

$result66 = $conn->query($query66);

if ($result66) {
    $row66 = $result66->fetch_assoc();
     $unreadCount = $row66['unread_count'];
   
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

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       <!-- include side bar here -->
       <?php include('include/side_baradd.php');?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">






            <!-- Main Content -->
            <div id="content">

              <!-- include top bar here  -->
              <?php include('include/top_baradd.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <main class="" >
                <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="m-0 font-weight-bold text-primary ">Dashboard</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
<a href="order.php " class="text-decoration-none">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Pending Orders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pendingCount ;?></div>
                    </div>
                    <div class="col-auto">
                    <!-- <i class="fas fa-clipboard-question fa-2x text-gray-300"></i> -->
                    <i class="fas fa-regular fa-clipboard fa-2x text-gray-300"></i>
                    <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>

       <!-- Earnings (Monthly) Card Example -->
       <div class="col-xl-3 col-md-6 mb-4">
       <a href="order.php " class="text-decoration-none">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Preparing Orders </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $readyCount ;?></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
</a>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <a href="order.php " class="text-decoration-none">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Completed Orders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $deliveredCount ;?></div>
                    </div>
                    <div class="col-auto">
                        <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                        <!-- <i class="fas fa-solid fa-clipboard-list fa-2x text-gray-300"></i> -->
                        <i class="fas fa-solid fa-clipboard-check fa-2x text-gray-300"></i>
                        <i class="fa-solid fa-clipboard-question"></i>
                    </div>
                </div>
            </div>
        </div>
</a>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <a href="manage_messages.php " class="text-decoration-none">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            New Messages</div> 
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $unreadCount ;?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>
</div>


</div>

<div class="container-fluid">
<div class="card-body">
                           <div class="row ">
                            <!-- <div class="col-7">


<div class="card shadow ">
    <div class="card-header ">
        <h6 class="m-0 font-weight-bold text-primary">Recent Orders</h6>
    </div>
    <div class="card-body">

       
    
                            <div class="table-responsive">
                                <table class="table table-bordered " width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                    
                                            <th>Date</th>
                                            <th>Customer</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <?php echo $order ;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            </div>
                         
    
        </div> -->
        <div class="col">
           
<div class="card shadow ">
    <div class="card-header ">
        <h6 class="m-0 font-weight-bold text-primary">Products Demand</h6>
    </div>
    <div class="card-body">

       
    
                            <div class="table-responsive">
                                <table class="table table-bordered "  id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Total Sold</th>
                                            
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                      <?php echo $html_content;?>       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            </div>
        </div>
</div>



</div>


</div>
    </main>
    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->




            <?php include('include/footeradd.php');?>



</body>

</html>