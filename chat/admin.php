<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("Location: Login.php");
    exit();
}

$username = htmlspecialchars($_SESSION["sess_user"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-2 bg-light">
                <h1 class="h4 text-center text-primary py-3">
                    <i class="fas fa-ghost me-2"></i> Sports ADMIN
                </h1>
                <div class="list-group text-center">
                    <a href="#" class="list-group-item list-group-item-action active">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-users"></i> Students
                        <span class="badge bg-danger rounded-pill float-end">20</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-chart-line"></i> Statistics
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-flag"></i> Reports
                    </a>
                </div>
                <div class="list-group mt-4">
                    <a href="Update.php" class="list-group-item list-group-item-action">
                        <i class="fas fa-edit"></i> Update Data
                    </a>
                    <a href="Delete.php" class="list-group-item list-group-item-action">
                        <i class="fas fa-trash-alt"></i> Delete Data
                    </a>
                    <a href="View.php" class="list-group-item list-group-item-action">
                        <i class="fas fa-eye"></i> View Data
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="far fa-calendar-alt"></i> Add Events
                    </a>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-10 bg-light">
                <nav class="navbar navbar-light bg-light">
                    <span class="navbar-text">Welcome, <?= $username; ?>!</span>
                    <div class="ms-auto">
                        <a href="logout.php" class="btn btn-outline-danger">Logout</a>
                    </div>
                </nav>

                <div class="container mt-4">
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i> New admin dashboard updates available. <a href="#">Download Now!</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="text-primary">Quick Stats</h3>
                            <div class="card p-3">
                                <h5>Daily Visitors: <span class="text-success">1,250</span></h5>
                                <h5>Weekly Visitors: <span class="text-success">8,210</span></h5>
                                <h5>Monthly Visitors: <span class="text-success">12,560</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>