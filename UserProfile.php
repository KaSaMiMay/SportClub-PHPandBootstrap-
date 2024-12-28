<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["sess_user"]) ) {
    header("Location: Login.php");
    exit();
}

include "connect.php";

// Fetch user ID from the session
$user_name = $_SESSION["sess_user"];
mysqli_select_db($con,$mydb);

// Query to fetch user details
$query = "SELECT id,name,email, phone, address FROM students WHERE name = ?";
$stmt = $con->prepare($query);

if ($stmt) {
    $stmt->bind_param("s", $user_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        die("No user found for the given ID.");
    }
    $stmt->close();
} else {
    die("Failed to prepare SQL statement: " . $con->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
<style>
    span{
    color:blueviolet;
    font-size: 20px;
}
.bd{
    width: 100%;
}
.tt{
    width: 50%;
   
}
label{
    float: left;
    font-size: 20px;
    color: blueviolet;
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
    <div class="container mt-5">
        <div class="card tt">
            <div class="card-header text-center">
                <h2>User Profile</h2>
                <center> <span>Welcome, <?php echo htmlspecialchars($_SESSION['sess_user']); ?>!</span></center>

            </div>
            <div class="card-body bd">
                <div class="mb-3">
                    <label for="userId" class="form-label">User ID:</label>
                    <input type="text" class="form-control" id="userId" value="<?php echo htmlspecialchars($user['id']); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="userName" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="userName" value="<?php echo htmlspecialchars($user['name']); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="userEmail" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="userEmail" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="userPhone" class="form-label">Phone:</label>
                    <input type="text" class="form-control" id="userPhone" value="<?php echo htmlspecialchars($user['phone']); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="userAddress" class="form-label">Address:</label>
                    <textarea class="form-control" id="userAddress" rows="3" readonly><?php echo htmlspecialchars($user['address']); ?></textarea>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="changePassword.php" >change password</a>
               
            </div>
        </div>
    </div>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
