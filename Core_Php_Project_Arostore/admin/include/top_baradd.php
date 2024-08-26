  <?php
    if(!isset( $_SESSION['username'] )){
       $_SESSION['username'] ;
       $_SESSION['admin_id'] ;
       
  echo "<script> window.location.href = 'login.php';</script>";
    }
  // fetch data from manage_website tbl
$query  = "SELECT * FROM `contact_us_message` where message_status= 'Un-Read'  order by message_id DESC ";
$data   = mysqli_query($conn,$query);
$serial = 0;
$category =$messagesss=$message_unread='';
$message_unread=mysqli_num_rows($data);
for($k=1;$k<=$message_unread; $k++){
$row = mysqli_fetch_array($data);
    $messageid        = $row['message_id'];
    $user_name        = $row['user_name'];
    $user_email         = $row['user_mail'];
    $user_message         = $row['message'];
    $message= substr($user_message,0,55);

$timestamp = strtotime($row['message_time']);

// Create a DateTime object for the current time and the message timestamp
$currentTime = new DateTime();
$messageTime = new DateTime('@' . $timestamp);

// Calculate the time difference
$interval = $currentTime->diff($messageTime);

// Format and display the time difference
$formattedTimeAgo = '';

if ($interval->y > 0) {
    $formattedTimeAgo = $interval->format('%y years ago');
} elseif ($interval->m > 0) {
    $formattedTimeAgo = $interval->format('%m months ago');
} elseif ($interval->d > 0) {
    $formattedTimeAgo = $interval->format('%d days ago');
} elseif ($interval->h > 0) {
    $formattedTimeAgo = $interval->format('%h hours ago');
} elseif ($interval->i > 0) {
    $formattedTimeAgo = $interval->format('%i minutes ago');
} else {
    $formattedTimeAgo = 'just now';
}
// echo "Message was sent $formattedTimeAgo";

$messagesss.='   <a class="dropdown-item d-flex align-items-center" href="manage_messages.php">
<div class="dropdown-list-image mr-3">
    <img class="rounded-circle" src="img/undraw_profile.svg"
        alt="...">
 
</div>
<div>
    <div class="text-truncate">'.$message.'</div>
    <div class="small text-gray-500">'.$user_name.' · '.$formattedTimeAgo.'</div>
</div>
</a>';
}

$select  = "SELECT * FROM `order` where `order_status`= 'Pending' ORDER BY `order`.`order_id` DESC ";
$data5   = mysqli_query($conn,$select);
 $pendinggg_oreder = mysqli_num_rows($data5);
 $orderrrrr="";
while($row = mysqli_fetch_array($data5)){
    $select_add  = "SELECT * FROM `user_order_info` where order_number='".$row['order_number']."' ORDER BY `user_order_info`.`user_order_id` DESC ";
$data_add   = mysqli_query($conn,$select_add);
$row_add = mysqli_fetch_array($data_add);
$formattedTimestamp = date("Y-m-d H:i:s", strtotime($row['order_time']));
        
if ($row_add) {
    $formattedTimestamp = date("Y-m-d H:i:s", strtotime($row['order_time']));
    
    $orderrrrr .= '
    <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="mr-3">
            <div class="icon-circle bg-success">
                <i class="fas fa-donate text-white"></i>
            </div>
        </div>
        <div>
            <div class="small text-gray-500">' . htmlspecialchars($formattedTimestamp) . '</div>
            ' . htmlspecialchars($row_add['name']) . ' Order (' . htmlspecialchars($row['product_quantity']) . ') ' . htmlspecialchars($row['product_name']) . ' of Total Price $' . htmlspecialchars($row['product_quantity'] * $row['product_price']) . ' 
        </div>
    </a>';
} else {
    // Handle the case where $row_add is null (i.e., no matching rows found)
    $orderrrrr .= '
    <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="mr-3">
            <div class="icon-circle bg-warning">
                <i class="fas fa-exclamation-triangle text-white"></i>
            </div>
        </div>
        <div>
            <div class="small text-gray-500">' . htmlspecialchars($formattedTimestamp) . '</div>
            <strong>Order information not found.</strong>
        </div>
    </a>';
}
}

  ?>
  <style>
    .notification{
height:60vh !important;
overflow:auto !important;


    }
  /* For WebKit (Chrome) */
.notification::-webkit-scrollbar {
  width: 12px; /* Width of the scrollbar */
}

.notification::-webkit-scrollbar-thumb {
  background-color: #ffc107; /* Color of the thumb (drag handle) */
  border-radius: 6px; /* Rounded corners for the thumb */
}

.notification::-webkit-scrollbar-track {
  background: #f1f1f1; /* Color of the track (bar behind the thumb) */
}

/* General styles for your notification class */
.notification {
  width: 300px; /* Set your desired width */
  height: 300px; /* Set your desired height */
  overflow-y: scroll; /* Enable vertical scrollbar when content overflows */
  border: 1px solid #ccc; /* Add a border for the container */
  padding: 10px; /* Add padding for the content */
}

/* Example styles for the notification content */
.notification-content {
  /* Your styles for the notification content go here */

}

  /* For WebKit (Chrome) */
body::-webkit-scrollbar {
  width: 12px; /* Width of the scrollbar */
}

body::-webkit-scrollbar-thumb {
  background-color: #ffc107; /* Color of the thumb (drag handle) */
  border-radius: 6px; /* Rounded corners for the thumb */
}

body::-webkit-scrollbar-track {
  background: #f1f1f1; /* Color of the track (bar behind the thumb) */
}

/* General styles for your notification class */
body {

  overflow-y: scroll; /* Enable vertical scrollbar when content overflows */

}

  </style>
  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <form class="form-inline">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
    </form>

    <!-- Topbar Search -->
    <!-- <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form> -->

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"><?php echo $pendinggg_oreder;?></span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list  notification dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header bg-warning border-0">
                    Alerts Center
                </h6>
             <?php echo $orderrrrr ;?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-donate text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 7, 2019</div>
                        $290.29 has been deposited into your account!
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 2, 2019</div>
                        Spending Alert: We've noticed unusually high spending for your account.
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter"><?php echo $message_unread;?></span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list notification dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header bg-warning border-0">
                    Message Center
                </h6>
                <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                            alt="...">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                            problem I've been having.</div>
                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                            alt="...">
                        <div class="status-indicator"></div>
                    </div>
                    <div>
                        <div class="text-truncate">I have the photos that you ordered last month, how
                            would you like them sent to you?</div>
                        <div class="small text-gray-500">Jae Chun · 1d</div>
                    </div>
                </a> -->
                <?php echo $messagesss;?>
                <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                            alt="...">
                        <div class="status-indicator bg-warning"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Last month's report looks great, I am very happy with
                            the progress so far, keep up the good work!</div>
                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                            alt="...">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                            told me that people say this to all dogs, even if they aren't good...</div>
                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                    </div>
                </a> -->
                <a class="dropdown-item text-center small text-gray-500" href="manage_messages.php">Read More Messages</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php   echo $_SESSION['f_name'] . " " .  $_SESSION['l_name'] ;?></span>
                <img class="img-profile rounded-circle"
                    src="img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->