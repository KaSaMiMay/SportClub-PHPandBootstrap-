<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min/css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.1/css/fontawesome.min.css"> -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />


    <style>
        span{
    color:blueviolet;
    font-size: 20px;
}
       
        #box {
            position: relative;
            width: 800px;
            height: 30px;
            padding: 10px;
            background: skyblue;
            border: 5px solid darkblue;
        }

        #p {
            position: absolute;
            left: 0;
            top: 0;
            width: 30px;
            height: 30px;

            background-color: red;
        }
    </style>



    <!-- <div id="box">
        <div id="ball"></div>
    </div> -->




</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <div class="container-fluid">
        <div class="row g-0">
            <nav class="col-2 bg-light pe-3">
                <h1 class="h4 py-3 text-center text-primary">
                    <i class="fas fa-ghost me-2"></i>
                    <span class="d-none d-lg-inline">
                        Sports ADMIN
                    </span>
                </h1>
                <div class="list-group text-center text-lg-start">
                    <span class="list-group-item disabled d-none d-lg-block">
                        <small>CONTROLS</small>
                    </span>
                    <a href="#" class="list-group-item list-group-item-action active">
                        <i class="fas fa-home"></i>
                        <span class="d-none d-lg-inline">Dashboard</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-users"></i>
                        <span class="d-none d-lg-inline">Students</span>
                        <span class="d-none d-lg-inline badge bg-danger rounded-pill float-end">20</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-chart-line"></i>
                        <span class="d-none d-lg-inline">Statistics</span>
                    </a>
                   
                    <?php
include "connect.php";
mysqli_select_db($con, $mydb);

// Count unread notifications
$query = "SELECT COUNT(*) AS newReports FROM reports WHERE status = 0";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$newReports = $row['newReports'];
?>
<a href="report.php" class="list-group-item list-group-item-action" onclick="markReportsAsRead()">
    <i class="fas fa-flag"></i>
    <span id="notificationCount" ><?php echo ($newReports > 0) ? "Reports ($newReports New)" : "Reports"; ?></span>
</a>


<script>
    function checkNewReports() {
        $.ajax({
            url: "checkReports.php",
            method: "GET",
            success: function(data) {
                let notificationCount = parseInt(data);
                if (notificationCount > 0) {
                    $('#notificationCount').text('Reports (' + notificationCount + ' New)');
                } else {
                    $('#notificationCount').text('Reports');
                }
            }
        });
    }

    function markReportsAsRead() {
        $.ajax({
            url: "markReportsRead.php",
            method: "GET",
            success: function(data) {
                // Optionally, log success message to console
                console.log(data);
                // Update notification count immediately
                $('#notificationCount').text('Reports');
            }
        });
    }

    // Check for new notifications every 5 seconds
    setInterval(checkNewReports, 5000);
</script>
                </div>
                <div class="list-group mt-4 text-center text-lg-start">
                    <span class="list-group-item disabled d-none d-lg-block">
                        <small>ACTIONS</small>
                    </span>

                    <a href="home.php" class="list-group-item list-group-item-action">
                        <i class="fas fa-edit"></i>
                        <span class="d-none d-lg-inline">Home</span>
                    </a>
                    <!-- <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-edit"></i>
                        <span class="d-none d-lg-inline"> <a href="delete.php">Delete Data</a></span>
                    </a> -->
                    <a href="View.php" class="list-group-item list-group-item-action">
                        <i class="fas fa-edit"></i>
                        <span class="d-none d-lg-inline">View Data</span>
                    </a>
                    <a href="AddEvent.php" class="list-group-item list-group-item-action">
                        <i class="far fa-calendar-alt"></i>
                        <span class="d-none d-lg-inline">Add Events</span>
                    </a>
                </div>

            </nav>
            <main class="col-10 bg-secondary">
            
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="flex-fill">
                    <center> <span>Welcome, <?php echo htmlspecialchars($_SESSION['sess_user']); ?>!</span></center>

                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle"
                                data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="#" class="dropdown-item">User Profile</a>
                                </li>
                                <li>
                                    <a href="logout.php" class="dropdown-item">Logout</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="fas fa-cog"></i></a>
                        </li>
                    </ul>
                    
                </nav>
                <!-- this for frame body -->
                <center>
     <?php
    include "connect.php";
    
    
    

    $query = "SELECT * FROM reports ORDER BY id DESC";
   

   //$query = "SELECT * FROM reports";
    mysqli_select_db($con, $mydb); 
    $result = mysqli_query($con, $query); 
    echo "<h1>Sport Club Student Reports </h1>";
    if ($result) {
        echo "<table border=1 class='table'> <thead>";
        echo "<tr><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Club Name</th><th>Message </th></tr>";
        echo "</thead><tbody>";
        $i = 0;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $i++; 
            $sid = $row['id']; 
            $Fname = $row['firstName'];
            $Lname = $row['lastName']; 
            
           
            $email1 = $row['email']; 
            $club = $row['clubName']; 
            $message = $row['message']; 

            print "<tr align='center'>"; 
            print "<td>" . $i . "</td>"; 
            print "<td>" . $Fname . "</td>"; 
            print "<td>" . $Lname . "</td>"; 
           
            print "<td>" . $email1 . "</td>"; 
           
           
            print "<td>" . $club . "</td>";
            print "<td>" . $message . "</td>"; 
            print "</tr>";
           
        }
        echo "</tbody></table>";
    } else { 
        die("Query=$query failed!"); 
    } 
    mysqli_close($con); 
    ?>

   


</center> 
            </main>
        </div>
    </div>
   
</body>
</html>
