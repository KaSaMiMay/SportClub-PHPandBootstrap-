<?php
session_start();
include "connect.php";

// Ensure the user is logged in
if (!isset($_SESSION['sess_user'])) {
    echo "You need to log in first.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    mysqli_select_db($con, $mydb);

    $oldPassword = $_POST['oldpassword'];
    $confirmPassword = $_POST['confirmpassword'];
    $newPassword = $_POST['newpassword'];
    $username = $_SESSION['sess_user']; // Get the logged-in user's username from session

    // Query to get the stored password
    $query = "SELECT password FROM club WHERE name = ?";
    $stmt = $con->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $username); // Bind as string
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $dbPassword = $row['password'];

            // Verify the old password (direct comparison for plain text)
            if ($oldPassword === $dbPassword) {
                // Check if the new password matches the confirm password
                if ($newPassword === $confirmPassword) {
                    // Update the password in the database
                    $updateQuery = "UPDATE club SET password = ? WHERE name = ?";
                    $updateStmt = $con->prepare($updateQuery);

                    if ($updateStmt) {
                        $updateStmt->bind_param("ss", $newPassword, $username); // Bind as string
                        if ($updateStmt->execute()) {
                            echo "Password changed successfully.";
                        } else {
                            echo "Error updating password: " . $con->error;
                        }
                        $updateStmt->close();
                    } else {
                        echo "Error preparing update statement: " . $con->error;
                    }
                } else {
                    echo "New password and confirm password do not match.";
                }
            } else {
                echo "Old password is incorrect.";
            }
        } else {
            echo "User not found.";
        }
        $stmt->close();
    } else {
        echo "Error preparing query: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <style>
        .boder {
            border: 1px solid yellow;
            width: 50%;
            height: 30%;
        }

        span{
    color:blueviolet;
    font-size: 20px;
}
        label {
            
            font-size: 20px;
            color:aquamarine;
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
        <h1>Change Password</h1>
       

        <div class="container mt-4 boder">
            <form action="changePassword.php" method="POST">
                <label for="oldpassword" class="form-label">Old Password:</label>
                <input type="password" name="oldpassword" id="oldpassword" class="form-control" style="width: 50%;" required><br>
               
                <label for="newpassword" class="form-label">New Password:</label>
                <input type="password" name="newpassword" id="newpassword" class="form-control" style="width: 50%;" required><br>
                <label for="confirmpassword" class="form-label">Confirm Password:</label>
                <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" style="width: 50%;" required><br>
                <a href="#" class="btn btn-success" name="submit">Change</a>
            </form>
        </div>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>