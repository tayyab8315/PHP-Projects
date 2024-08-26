<?php
session_start();
include('include/connection.php');

// Initialize variables
$serial = 0;
$messages = '';

// Fetch all reviews
$query = "SELECT * FROM `user_review` ORDER BY `review_id` DESC";
$data = mysqli_query($conn, $query);

if (!$data) {
    die('Error: ' . mysqli_error($conn));
}

// Fetch all products data to avoid repeated queries
$product_query = "SELECT * FROM `manege_product`";
$product_data = mysqli_query($conn, $product_query);

if (!$product_data) {
    die('Error: ' . mysqli_error($conn));
}

// Store products in an associative array
$products = [];
while ($row = mysqli_fetch_assoc($product_data)) {
    $products[$row['product_id']] = $row['product_title'];
}

// Process each review
while ($row = mysqli_fetch_array($data)) {
    $serial++;
    $review_id = $row['review_id'];
    $product_id = $row['product_id'];
    $user_name = $row['user_name'];
    $user_rating = $row['user_rating'];
    $user_review = $row['user_review'];
    $timestamp = strtotime($row['review_date_time']);
    $formattedTime = date("d F Y, h:i A", $timestamp);

    // Get the product title
    $prodt = isset($products[$product_id]) ? $products[$product_id] : 'Product Deleted';

    // Create the delete button
    $rev_delete_btn = '<a href="delete_category.php?delete_review_id=' . $review_id . '" class="btn btn-danger btn-sm">Delete</a>';

    // Append the row to the messages
    $messages .= '<tr class="text-center">
                    <td>' . $serial . '</td>
                    <td>' . $user_name . '</td>
                    <td>' . $prodt . '</td>
                    <td>' . $user_review . '</td>
                    <td>' . $user_rating . '</td>
                    <td>' . $formattedTime . '</td>
                    <td>
                        <div class="btn-group">
                            ' . $rev_delete_btn . '
                        </div>
                    </td>
                </tr>';
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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
                <!-- include top bar here -->
                <?php include('include/top_baradd.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h1 class="m-0 font-weight-bold text-primary float-left">Manage Reviews</h1>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Product</th>
                                            <th>Review</th>
                                            <th>Rating</th>
                                            <th>Rating Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Product</th>
                                            <th>Review</th>
                                            <th>Rating</th>
                                            <th>Rating Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php echo $messages; ?>
                                    </tbody>
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
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
</body>

</html>
