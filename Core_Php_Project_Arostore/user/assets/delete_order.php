<!-- 
<?php
  include 'include/connection.php';
if (isset($_POST['orderId'])) {
    $orderId = $_POST['orderId'];

    $sql = "SELECT * FROM `order` WHERE order_id = $orderId";
    $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $orderStatus = $row['order_status'];

        // Check if the status is 'pending'
        if ($orderStatus == 'Pending') {
            // Delete the record
            $deleteSql = "DELETE FROM `order` WHERE order_id = $orderId ";
            if (mysqli_query($conn, $deleteSql)) {
                echo "Your Order With Order Number ".$row['order_number']." has been Cancelled.";
            } else {
                echo "Error deleting order: " . mysqli_error($conn);
            }
        } else {
            echo "You Cannot Cancel this order because Your Order Is Prepared ";
        }
   
} -->
