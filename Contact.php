<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    
    <style>
        .lblf{
        font-size: 10px;
    }
        #frame{
            border: 2px solid white;
            width: 49%;
            background-color:lightblue;
            border-radius: 20px;
            margin-bottom: 20px;
            padding: 20px;
            padding-bottom: 3px;
        }
        span{
            color:red;
        }
       .i img{
            width: 49.5%;
            height: 200px;
            display: inline-block;
            opacity: 0.45;
            
        }
        body{
            background-color: lightblue;
        }
        
        
    </style>
</head>
<body>
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
                        <a class="nav-link" href="activity.php">Activity</a>
                    </li>
                </ul>
                <div class="ms-auto navbar-text">
                    Text
                </div>
            </div>
        </div>
    </nav>
    <div class="i">
        
        <img src="images/images (7).jpg" alt="">
        <img src="images/images (10).jpg" alt="">
    </div>
    <!-- <div class="left"> -->
    <div class="row">
    <div class="col-6">
    <h1>Contact Us</h1>
    <p>Get in touch with us to find out more, sign up and ask any questions you may have.

Want a free 7 day demo site? No problem just send us your logo and colours and we’ll spin one up!

Complete the form or drop us an email.</p>
<h3>OUR DETAILS</h3>
<i>hello@mysportsclub.co.uk</i><br>
<i>09403184477</i>
<h6>CONNECT</h6>
<a href="http://facebook.com" style="text-decoration: none;"><i class="fab fa-facebook-f"></i></a>

</div>

<div class="col-6" id="frame">
<form action="Contact.php" method="POST">

<label for="firstname">First Name <span>*</span></label>
<div class="row">
            <div class="col-6">
                <input type="text" name="firstname" id="" placeholder="First Name" class="form-control">
            </div>
            <div class="col-6">
                <input type="text" name="lastname" id="" placeholder="Last Name" class="form-control">
            </div>
        </div>
        <label for="gmail">Email <span>*</span></label>
        
        <input type="email" name="gmail" id="" class="form-control">
        Club Name <span>*</span>
        <input type="text" name="club" id="" class="form-control"><br>
        Message <span>*</span><br>
        <textarea name="message" id="" style="width: 100%;height:70px;"></textarea><br> <br>
        <button class="btn btn-success" name="submit">Report</button>
     <button class="btn btn-success" name="cancel">Cancel</button>

    </form>
    <?php
include "connect.php";
mysqli_select_db($con, $mydb);
if(isset($_POST['submit'])){
$query="insert into reports(firstName,lastName,email,clubName,message,status) values('$_POST[firstname]','$_POST[lastname]','$_POST[gmail]','$_POST[club]','$_POST[message]','new')";

        if (mysqli_query($con, $query)) {
            echo "<center>Successfully added</center>";
        } else {
            die('Error: ' . mysqli_error($con));
        }
        mysqli_close($con);
    }
    ?>

</div>
</div>



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