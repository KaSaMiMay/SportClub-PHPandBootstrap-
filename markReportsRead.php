<?php
include "connect.php";
mysqli_select_db($con, $mydb);

// Mark all notifications as read
$query = "UPDATE reports SET status = 1 WHERE status = 0";
if (mysqli_query($con, $query)) {
    echo "Notifications marked as read.";
} else {
    echo "Error updating notifications: " . mysqli_error($con);
}
?>
