<?php
session_start();
if (isset($_SESSION["sess_user"])) {
    header("Location: AdminDashboard.php");
    exit();
}

if (isset($_POST['submit'])) {
    $user = $_POST['Uname'] ?? '';
    $pwd = $_POST['pss'] ?? '';

    if (!empty($user) && !empty($pwd)) {
        $con = mysqli_connect('localhost', 'root', '', 'sportclubdb');
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = mysqli_prepare($con, "SELECT * FROM club WHERE name = ? AND password = ?");
        mysqli_stmt_bind_param($query, "ss", $user, $pwd);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['sess_user'] = $user;
            header("Location: AdminDashboard.php");
        } else {
            $error = "Invalid username or password!";
        }
        mysqli_close($con);
    } else {
        $error = "All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Club Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Welcome to Our Sports Club</h1>
        <h2 class="text-center">Login</h2>
        <form action="" method="POST" class="mx-auto" style="max-width: 400px;">
            <div class="mb-3">
                <label for="Uname" class="form-label">Name:</label>
                <input type="text" name="Uname" id="Uname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="pss" class="form-label">Password:</label>
                <input type="password" name="pss" id="pss" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger mt-3"><?= htmlspecialchars($error); ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
