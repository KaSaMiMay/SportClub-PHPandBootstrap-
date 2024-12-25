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
    <form action="AdminDashboard.php" method="POST">
        <label for="">Name :</label>
        <input type="text" name="Uname" id=""  class="form-control" style="width: 50%;"><br><br>
        <label for="">Password :</label>
        <input type="password" name="pss" id=""  class="form-control" style="width: 50%;"><br><br>
        <button class="btn btn-success" name="submit">Login</button>
    </form>
    </div>
    </center>
    
    <?php
    if (isset($_POST['submit'])) {
        if (!empty($_POST['Uname']) && !empty($_POST['pss'])) {
            $user = $_POST['Uname'];
            $pwd = $_POST['pss'];

            include "connect.php";

            $con = mysqli_connect('localhost', 'root', '', 'sportclubdb') ;
            $query = mysqli_query($con, "SELECT * FROM club WHERE name='$user' AND password='$pwd' ");
            $numrows = mysqli_num_rows($query);
            if ($numrows != 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $dbusername = $row['name'];
                    $dbpassword = $row['password'];
                }
                if ($user == $dbusername && $pwd == $dbpassword) {
                    session_start();
                    $_SESSION['sess_user'] = $user;
                    header("Location: AdminDashboard.php");
                }
            } else {
                echo "Invalid username or password!";
            }
        } else {
            echo "All fields are required!";
        }
        mysqli_close($con);
    }
   
    ?> 
</body>
</html>
