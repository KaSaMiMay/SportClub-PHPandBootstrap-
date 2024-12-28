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
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />


    <style>
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
        span{
    color:blueviolet;
    font-size: 20px;
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
                <!-- this for frame body -->
                 <center>
                 <?php
    $edit_id = $_GET['edid'];
    include "connect.php";
    $query = "select * from students where id='$edit_id'";
    mysqli_select_db($con, $mydb);
    $result = mysqli_query($con, $query);
    $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (!$myrow) {
        echo "No data found";
    } else {
        $sid = $myrow['id'];
        $sname = $myrow['name'];
        $age = $myrow['age'];
        $phone = $myrow['phone'];
        $email = $myrow['email'];
        $address = $myrow['address'];
        $dob = $myrow['dob'];
        $class = $myrow['class'];
        $region = $myrow['region'];
    
   

    ?>
    <div class="container">
        <h1 style="color: blue;">Update Students Information Form</h1>
        <br>
        <form action="" name="Updateform" method="post">

    <table class="table ">
    <tr><td>  <label for="" class="form-label"> Studenet ID: </label> </td><td><?php $sid; ?> <input type="hidden" name="stuid" id="" class="form-control"  value="<?php echo $sid;?>"></td> </tr>
        <tr><td>
            <label for="" class="form-label"> Name :</label></td><td> <input type="text" name="sname1" id="" class="form-control"  value="<?php echo $sname;?>"></td> </tr>

            <tr><td>  <label for="" class="form-label"> Age : </label> </td><td> <input type="number" name="age1" id="" class="form-control"  value="<?php echo $age;?>"></td> </tr>
            <tr><td>  <label for="" class="form-label">Phone number : </label> </td><td> <input type="phone" name="phone1" id="" class="form-control"  value="<?php echo $phone;?>"></td> </tr>
            <tr><td> <label for="" class="form-label"> Date OF Birth : </label> </td><td> <input type="date" name="dob1" id="" class="form-control"  value="<?php echo $dob;?>"></td> </tr>

            <tr><td> <label for="" class="form-label">Email : </label></td><td> <input type="email" name="email1" id="" class="form-control" placeholder="somehting@gmail.com"  value="<?php echo $email;?>"></td> </tr>

            <tr><td><label for="" class="form-label"> Address : </label></td><td> <textarea name="address1" id="" style="width:100%" value="<?php echo $address;?>"></textarea></td> </tr>
            <tr><td><label for="" class="form-label"> class : </label></td><td> <input type="text" name="class1" id="" class="form-control" value="<?php echo $class;?>"></td> </tr>
            <tr><td> <label for="" class="form-label"> Region  : </label></td><td> <input type="text" name="region1" id="" class="form-control" value="<?php echo $region;?>"></td> </tr>
            <tr><td> <input type="submit" name="Save" id="" value="Update" class="btn btn-primary"></td> 
            <td> <input type="cancel" name="cancel" id="" value="Cancel" class="btn btn-primary"></td> </tr>

        </table>

        </form>
        <?php
    }
    if(isset($_POST['Save'])){
        $Id=$_POST['stuid'];
        $Name=$_POST['sname1'];
        $age=$_POST['age1'];
        $Phone=$_POST['phone1'];
        $Dob=$_POST['dob1'];
        $Email=$_POST['email1'];
        $Address=$_POST['address1'];
        $Class=$_POST['class1'];
        $Region=$_POST['region1'];
        
        $sql="update students set name='$Name',age='$age',phone='$Phone',email='$Email',address='$Address',dob='$Dob',class='$Class',region='$Region' where id='$Id'";
        if(!mysqli_query($con,$sql)){
            die('Error: ' .mysqli_error($con));
        }
        echo "Your information has been updated in the database";
        mysqli_close($con);
       

    }
        ?>

    </div>
                 </center>
            </main>
        </div>
    </div>
   
</body>

</html>