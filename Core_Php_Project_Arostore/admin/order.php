<?php

session_start();
include('include/connection.php');
 
$select = "SELECT * FROM `order` ORDER BY `order_id` DESC";
$data = mysqli_query($conn, $select);
$serial = 0;
$order = '';

while ($row = mysqli_fetch_array($data)) {
    $select_add = "SELECT * FROM `user_order_info` WHERE `order_number`='" . mysqli_real_escape_string($conn, $row['order_number']) . "' ORDER BY `user_order_id` DESC";
    $data_add = mysqli_query($conn, $select_add);
    $row_add = mysqli_fetch_array($data_add);

    // Ensure the queries returned data before accessing the arrays
    if ($row && $row_add) {
        $formattedTimestamp = date("Y-m-d H:i:s", strtotime($row['order_time']));
        $serial++;

        // Determine the appropriate status button
        if ($row['order_status'] == 'Pending') {
            $status_btn = '<a href="update_order.php?order_id=' . $row['order_id'] . '&status=Preparing" class="btn btn-danger">Pending</a>';
        } elseif ($row['order_status'] == 'Preparing') {
            $status_btn = '<a href="update_order.php?order_id=' . $row['order_id'] . '&status=Delivered" class="btn btn-warning text-light">Preparing</a>';
        } else {
            $status_btn = '<a href="update_order.php?order_id=' . $row['order_id'] . '&status=Pending" class="btn btn-success">Delivered</a>';
        }

        // Build the order row HTML
        $order .= '
        <tr class="text-center">
            <td>' . htmlspecialchars($serial) . '</td>
            <td>' . htmlspecialchars($row['order_number']) . '</td>
            <td>' . htmlspecialchars($row['product_name']) . '</td>
            <td>' . htmlspecialchars($row['product_price']) . '</td>
            <td>' . htmlspecialchars($row['product_quantity']) . '</td>
            <td>' . $status_btn . '</td>
            <td>' . htmlspecialchars($formattedTimestamp) . '</td>
            <td>' . htmlspecialchars($row_add['name']) . '</td>
            <td>' . htmlspecialchars($row_add['mobile']) . '</td>
            <td>' . htmlspecialchars($row_add['city']) . '</td>
            <td>' . htmlspecialchars($row_add['post']) . '</td>
            <td>' . htmlspecialchars($row_add['address']) . '</td>
        </tr>';
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

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h1 class="m-0 font-weight-bold text-primary float-left">Manage Orders</h1>
                          
                
            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Order Number</th>
                        <th scope="col"class="text-center" >Product Name</th>
                        <th scope="col" class="text-center">Price</th>
                        <th scope="col" class="text-center">Quantity</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Order Time</th>
                        <th scope="col" class="text-center">Customer Name</th>
                        <th scope="col" class="text-center">Phone No.</th>  
                        <th scope="col" class="text-center">City</th>
                        <th scope="col" class="text-center">Post Office</th>
                        <th scope="col" class="text-center">Address</th>
    
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                    <?php echo $order; ?>
                                       
                                    </tbody>
                                    <tfoot class="text-center">
                                       <tr>
                                       <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Order Number</th>
                        <th scope="col"class="text-center" >Product Name</th>
                        <th scope="col" class="text-center">Price</th>
                        <th scope="col" class="text-center">Quantity</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Order Time</th>
                        <th scope="col" class="text-center">Customer Name</th>
                        <th scope="col" class="text-center">Phone No.</th>  
                        <th scope="col" class="text-center">City</th>
                        <th scope="col" class="text-center">Post Office</th>
                        <th scope="col" class="text-center">Address</th>
    
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->








            <!-- Footer -->
        
            <?php include('include/footeradd.php');?>

</body>

</html>