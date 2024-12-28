<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    <style>
        .s {
            background-color: green;
            color: white;
            margin: 2%;
        }
       .container{
        border-radius: 10px;
        border: 10% solid white;
        background-color: black;
        color: white;
        border-width: 10px;
        width: 40%;
        height: 60%;
       }
    </style>
</head>
<body>
    
   

        <center>
        <h1 class="s">Welcome to Our Sports Club</h1>
        <div class="container">
        
    <h2>Login</h2>
    <form action="Login.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" class="form-control" style="width: 50%;" required><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" class="form-control" style="width: 50%;" required><br><br>
    <button class="btn btn-success" name="submit" type="submit">Login</button>
    </form>

    </div>
    </center> 
    
     <!-- <?php
    
    ?> 
 -->

 <?php
session_start();
if (isset($_POST['submit'])) {
    $user = trim($_POST['name']);
    $pwd = trim($_POST['password']);

    if (!empty($user) && !empty($pwd)) {
        // Secure database connection
        $con = mysqli_connect('localhost', 'root', '', 'sportclubdb');
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Use prepared statement to prevent SQL injection
        $stmt = $con->prepare("SELECT * FROM club WHERE name = ? AND password = ?");
        $stmt->bind_param("ss", $user, $pwd);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['sess_user'] = $user; // Store username in session
            header("Location: AdminDashboard.php");
            exit(); // Stop further script execution after redirection
        } else {
            echo "<div style='color: red; text-align: center;'>Invalid username or password!</div>";
        }
        $stmt->close();
        $con->close();
    } else {
        echo "<div style='color: red; text-align: center;'>All fields are required!</div>";
    }
}
?>

</body>
</html>