
<?php
include "connect.php";
mysqli_select_db($con, $mydb);

// Count unread notifications
$query = "SELECT COUNT(*) AS newReports FROM reports WHERE status = 0";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
echo $row['newReports'];
?>
