<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("location:Login.php");
    exit();
} else {
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
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />

    <link rel="stylesheet" href="jaction.js">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        #box {
            position: relative;
            width: 800px;
            height: 30px;
            padding: 10px;
            background: skyblue;
            border: 5px solid darkblue;
        }
        span{
    color:blueviolet;
    font-size: 20px;
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
                        <span id="student-badge" class="d-none d-lg-inline badge bg-danger rounded-pill float-end">20</span>
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
                        <span id="notificationCount" style="<?php echo ($newReports > 0) ? 'color: red;' : ''; ?>">
                            Reports (<?php echo $newReports; ?>)
                        </span> </a>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        function checkNewReports() {
                            $.ajax({
                                url: "checkReports.php",
                                method: "GET",
                                success: function(data) {
                                    let notificationCount = parseInt(data);
                                    let notificationElement = $('#notificationCount');

                                    if (notificationCount > 0) {
                                        // Show the count in red if there are new notifications
                                        notificationElement.text(' + notificationCount + ');
                                        notificationElement.css('color', 'red');
                                    } else {
                                        // Show default text when no new notifications exist
                                        notificationElement.text('Reports');
                                        notificationElement.css('color', '');
                                    }
                                }
                            });
                        }



                        function markReportsAsRead() {
        $.ajax({
            url: "markReportsRead.php",
            method: "GET",
            success: function(data) {
                // Optionally log the success message
                console.log(data);
                // Immediately reset notification count
                $('#notificationCount').text('Reports');
                $('#notificationCount').css('color', '');
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
                                    <a href="UserProfile.php" class="dropdown-item">User Profile</a>
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


                <div class="row mt-4 flex-column flex-lg-row">
                    <div class="col">
                        <h2 class="h6 text-white-50">LOCATION</h2>
                        <div class="card mb-3" style="height: 280px">
                            <div class="card-body">
                                <small class="text-muted">Regional</small>
                                <div class="progress mb-4 mt-2" style="height: 5px">
                                    <div class="progress-bar bg-success w-25"></div>
                                </div>
                                <small class="text-muted">Global</small>
                                <div class="progress mb-4 mt-2" style="height: 5px">
                                    <div class="progress-bar bg-primary w-75"></div>
                                </div>
                                <small class="text-muted">Local</small>
                                <div class="progress mb-4 mt-2" style="height: 5px">
                                    <div class="progress-bar bg-warning w-50"></div>
                                </div>
                                <small class="text-muted">Internal</small>
                                <div class="progress mb-4 mt-2" style="height: 5px">
                                    <div class="progress-bar bg-danger w-25"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h2 class="h6 text-white-50">DATA</h2>
                        <div class="card mb-3" style="height: 280px">
                            <div class="card-body">
                                <div class="text-end">
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-sort-amount-up"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-filter"></i>
                                    </button>
                                </div>
                                <table class="table">
                                    <tr>
                                        <th>ID</th>
                                        <th>Age Group</th>
                                        <th>Data</th>
                                        <th>Progress</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>20-30</td>
                                        <td>19%</td>
                                        <td>
                                            <i class="fas fa-chart-pie"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>30-40</td>
                                        <td>40%</td>
                                        <td>
                                            <i class="fas fa-chart-bar"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>40-50</td>
                                        <td>20%</td>
                                        <td>
                                            <i class="fas fa-chart-line"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>>50</td>
                                        <td>11%</td>
                                        <td>
                                            <i class="fas fa-chart-pie"></i>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="progress" id="pro">

                </div>

                <!-- this script for progress bar  -->
                <script type="text/javascript">
                    let count = 0;
                    setInterval(function() {
                        let ball = document.querySelector("#pro").innerHTML = ' <div class="progress-bar bg-danger" style="width:' + count + '%"></div>';
                        count += 5;
                    }, 800);
                </script>

            </main>
            <footer class="text-center py-4 text-muted">
                &copy; Copyright 2020
            </footer>

        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- <script>
            function checkNewReports() {
                $.ajax({
                    url: "checkReports.php",
                    method: "GET",
                    success: function(data) {
                        $('#reportNotification').html(data);
                    }
                });
            }

            setInterval(checkNewReports, 5000); // Check every 5 seconds
        </script> -->

</body>

</html>
<?php
}
?>