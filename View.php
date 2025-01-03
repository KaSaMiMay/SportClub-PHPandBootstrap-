<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("location:login.php");
    exit;
}

include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <script>
        function checkDelete() {
            return confirm('Are you sure you want to delete this record?');
        }
    </script>
    <style>
        span{
    color:blueviolet;
    font-size: 20px;
}
        .txtheader {
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
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
                <a href="report.php" class="list-group-item list-group-item-action">
                        <i class="fas fa-flag">
                        <span class="d-none d-lg-inline">Reports</span></i>
                    </a>
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
                <center>
                    <h1 class="txtheader">Sport Club Student Information</h1>
                    <form action="" method="GET" class="mb-3">
                        <div class="input-group" style="width: 30%; float: right;">
                            <input type="text" id="search" class="form-control" name="search" placeholder="Search by name">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>

                    <?php
                    // Fetch student data based on search query
                    $searchQuery = "";
                    mysqli_select_db($con,$mydb);

                    if (isset($_GET['search']) && !empty($_GET['search'])) {
                        $search = mysqli_real_escape_string($con, $_GET['search']);
                        $searchQuery = "WHERE name LIKE '%$search%'";
                    }

                    $query = "SELECT * FROM students $searchQuery";
                    $result = mysqli_query($con, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead><tr><th>#</th><th>Student Name</th><th>Age</th><th>Phone</th><th>Email</th><th>Address</th><th>Date of Birth</th><th>Class</th><th>Region</th><th>Actions</th></tr></thead>";
                        echo "<tbody>";

                        $i = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $i++;
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['age']}</td>";
                            echo "<td>{$row['phone']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>{$row['address']}</td>";
                            echo "<td>{$row['dob']}</td>";
                            echo "<td>{$row['class']}</td>";
                            echo "<td>{$row['region']}</td>";
                            echo "<td>
                                <a href='Update.php?edid={$row['id']}' class='btn btn-success btn-sm'>Update</a>
                                <a href='Delete.php?did={$row['id']}' onclick='return checkDelete()' class='btn btn-danger btn-sm'>Delete</a>
                              </td>";
                            echo "</tr>";
                        }

                        echo "</tbody></table>";
                    } else {
                        echo "<p class='text-danger'>No records found.</p>";
                    }

                    mysqli_close($con);
                    ?>
                </center>
            </main>
            <footer class="text-center py-4 text-muted">&copy; Copyright 2024</footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
