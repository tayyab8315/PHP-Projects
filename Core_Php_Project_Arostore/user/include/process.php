<?php
include('connection.php');
    if (isset($_POST['data'])) {
        $query = $_POST['data'];
        $query = '%' . $query . '%';
    
        $stmt = $conn->prepare('SELECT * FROM `manege_product` WHERE product_title LIKE "'.$query.'"');
        $stmt->bind_param('s', $query);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<li class="list-group-item">' . $row['product_title'] . '</li>';
            }
        } else {
            echo '<li class="list-group-item">No products found</li>';
        }
    }
    ?>
    


