<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    <style>
        .container1{
            border-radius: 20px;
            border: 2px solid beige;
            width: 40%;
            margin-bottom: 2px;
            margin-left: 30%;
            padding-top: 2%;
            padding-bottom: 3px;
            background-color: beige;
            color: black;
            
            
        }
    </style>
    <link rel="stylesheet" href="jaction.js">
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
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="far fa-calendar-alt"></i>
                        <span class="d-none d-lg-inline">Add Events</span>
                    </a>
                </div>

            </nav>
            <main class="col-10 bg-secondary">
            
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="flex-fill"></div>
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
<div class="container1">
<div class="form-floating">
    <form action="" method="post" id="student-form">
   
       <label for="" class="form-label"> Event Name :</label> <input type="text" name="Ename" id="" class="form-control" width="100px">

       <label for="" class="form-label"> Event Date : </label><input type="date" name="Edate" id="" class="form-control" width="100px">
       <label for="" class="form-label">Event Time :</label> <input type="time" name="Etime" id="" class="form-control" width="100px">
       <label for="" class="form-label">Venue :</label> <input type="text" name="venue" id="" class="form-control" width="100px">

        

        <input type="submit" name="Save" id="" value="Register" class="btn btn-primary">

    </form>
</div>
</div>
    <?php
    if(isset($_POST['Save'])){
        
        include "connect.php";
        $query="insert into sports(Ename,Etime,Edate,venue) values('$_POST[Ename]','$_POST[Etime]','$_POST[Edate]','$_POST[venue]')";
        mysqli_select_db($con,$mydb); 
        $result = mysqli_query($con,$query); 
        // $myrow = mysqli_fetch_array($result,MYSQLI_ASSOC);
        if ($result) { 
            
            echo "<center>Successfully added</center>"; 
        } 
    else { 
        die('Error: ' . mysqli_error($con));
        } 
        mysqli_close($con);
    }
     ?>
            </main>
            <footer class="text-center py-4 text-muted">
                &copy; Copyright 2020
            </footer>
</body>
</html>