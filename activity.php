<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <style>
        .lblf{
        font-size: 10px;
    }
        .first {
            display: inline-block;
            margin: 10px;
            padding: 10px;
        }

        .nd {
            display: inline-block;
            margin: 10px;
            padding: 10px;

        }
        .txtheader{
            padding-top: 20px;
            padding-bottom: 20px;
            color: blue;
        }

        .rd {
            display: inline-block;
            margin: 10px;
            padding: 10px;
        }
    </style>
</head>

<body style="background-color:lightblue;">

    <div class="i">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="images/images.jpg" alt="" style="width: 20%;"></a>
                <!-- Toggle button for smaller screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contact.php">Contact US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="AboutUs.php">About US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Activity</a>
                        </li>
                    </ul>
                    <div class="ms-auto navbar-text">
                        Text
                    </div>
                </div>
            </div>
        </nav>
    </div>

        <center>

        <form method="POST" action="">

            <?php
            include "connect.php";
            $query = "select * from sports";
            mysqli_select_db($con, $mydb);
            $result = mysqli_query($con, $query);
            echo "<h1 class='txtheader'>Sports Club Activities List</h1>";
            if ($result) {
                echo "<table border=1 class='table' style='font-size:13px;width:60%;'> <thead>";
                echo "<tr><th></th><th>Event ID</th><th>Event Name</th><th>Event Time</th><th>Event Date</th><th>Venue</th></tr>";
                echo "</thead><tbody>";
                $i = 0;
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $i++;
                    $eid = $row['id'];
                    $ename = $row['Ename'];
                    $etime = $row['Etime'];
                    $edate = $row['Edate'];
                    $venue = $row['venue'];

                    print "<tr align='center'>";
                    print "<td><input type='radio' name='eid' value='$eid'></td>";
                    print "<td>" . $i . "</td>";
                    print "<td>" . $ename . "</td>";
                    print "<td>" . $etime . "</td>";
                    print "<td>" . $edate . "</td>";
                    print "<td>" . $venue . "</td>";
                }
                echo "</tbody></table>";
            } else {
                die("Query=$query failed!");
            }
            mysqli_close($con);


            ?>
            
                
                    Customer Name<input type="text" name="sname" required class="form-control" style="width: 30%;">
                <br>
                
                    Email<input type="text" name="semail" required class="form-control" style="width: 30%;">
                <br>
               
                    <button type="submit" class="btn btn-primary" name="Save"><span class="glyphicon glyphicon-floppydisk"></span> Save</button>
                
            
        </form>
        </center>
    </div>
    <!-- <?php
    // include "connect.php";
    // if(isset($_POST['id'])){
    // $student=$_POST['sname'];
    // $email=$_POST['semail'];
    // $sql="insert into event(sname,email,sportname,date) values($student,$email,$eid,now())";
    // $con->query($sql); 
    // $pid = $con->insert_id;   
    // }
    ?> -->
    <?php
    if (isset($_POST['Save'])) {
        include "connect.php";
        mysqli_select_db($con, $mydb);
        // Retrieve form data
        $sname = $_POST['sname'];
        $semail = $_POST['semail'];
        $eid = $_POST['eid']; // Get selected event ID from the radio button
        if (empty($eid)) {
            die("<div class='alert alert-danger'>Please select an event!</div>");
        }

        // Fetch event details using the selected event ID
        $query = "SELECT Ename, Edate FROM sports WHERE id = $eid";
        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $event = mysqli_fetch_assoc($result);
            $ename = $event['Ename'];
            $edate = $event['Edate'];

            // Insert data into the `event` table
            $sql = "INSERT INTO event (sname, email, sportname, date) VALUES ('$sname', '$semail', '$ename', '$edate')";
            if (mysqli_query($con, $sql)) {
                echo "<div class='alert alert-success'>Data saved successfully!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . mysqli_error($con) . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Event not found!</div>";
        }

        mysqli_close($con);
    }
    ?>

</body>
<footer style="background-color:darkblue;color:white"> 
    <div class="row">
    <div class="col-4" >
        <img src="images/images.png" alt="sport logo"  style="height:50px"><p>SportClub.co.uk</p>
    </div>
    <div class="col-4" style="height:50px">
        <h5>MY SPORTS CLUB</h5>
        <p style="font-size: 10px;">My Sports Club is designed for grassroots clubs who have no time to keep updating their website. Our fully managed system allows you to take care of what you need such as uploading documents and contact details. We take care of the rest.</p>
    </div>
    <div class="col-4"  style="height:50px">
        <i class="far fa-envelope"></i>
        <i class="lblf">nwethinzar119@gmail.com</i><br>
        <i class="fas fa-phone-alt"></i>
        <i class="lblf">09403184477</i><br>
        <h6 class="lblf">follow us on</h6>
       
        <i class="fab fa-facebook"><a href="http://facebook.com">Facebook</a> </i>
        <i class="fab fa-twitter"><a href="http://facebook.com">Twitter</a></i>
        <i class="fab fa-linkedin-in"><a href="http://facebook.com">LinkedIn</a></i>
    </div>
    </div>
</footer>
</html>