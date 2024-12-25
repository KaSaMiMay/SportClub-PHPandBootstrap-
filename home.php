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
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
  />
  <style>
    .lblf{
        font-size: 10px;
    }
    .lbl{
        display: inline-block;
    }
    .main_img{
        padding-top: 3px;
    }
    .im{
        width: 100%;
        height: 200px;
    }
    .first{
        display: inline-block;
        margin: 10px;
        padding: 10px;
    }
    .nd{
        display: inline-block;
        margin: 10px;
        padding: 10px;

    }
    .rd{
        display: inline-block;
        margin: 10px;
        padding: 10px;
    }
    .container1{
        margin-left:33%;
        margin-top: 10px;
        margin-bottom: 10px;
        width: 30%;
        font-size: small;
        height: 10%;
        border: 1px solid wheat;
        border-radius: 10px;
    }
    .txtheader{
        color: darkblue;
    }
    body{
        /* background-image: url("images/download\ \(1\).jpg");
        background-repeat: no-repeat; */
        background-color: lightblue;
    }
  </style>
</head>
<body >
    <center>
    <div class="txtheader">
        <h4>Dear visitor,</h4></div>
    <div class="txtheader"><h6>The INSPIRE Registry have been recently migrated to the cloud.</h6></div>
    <div class="txtheader"><h6>If you experience any issues affecting the functionality or quality of the service, please kindly report them through the INSPIRE Registry helpdesk</h6>
    
</div>
</center>
   
    <div class="i">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"> <div class="col-4" >
        <img src="images/images.png" alt="sport logo"  style="height:50px;display:inline-block"><p style="display: inline-block;">SportClub.co.uk</p>
    </div></a>
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

    <div class="container2">
        <h3>Activities of sports clubs</h3>
        <div class="row">
            <div class="col-4">Label</div>
           <div class="col-8">Activities of sports clubs
           </div>
        </div>
       <br><br>
        <div class="row">
            <div class="col-4">Definition</div>
           <div class="col-8"> This class includes the activities of sports clubs, which, whether professional, semi-professional or amateur clubs, give their members the opportunity to engage in sporting activities.This class includes:- operation of sports clubs: • football clubs • bowling clubs • swimming clubs • golf clubs • boxing clubs • winter sports clubs • chess clubs • track and field clubs • shooting clubs, etc.
           </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-4">Description</div>
           <div class="col-8">This class excludes:- sports instruction by individual teachers, trainers, see 85.51- operation of sports facilities, see 93.11- organisation and operation of outdoor or indoor sports events for professionals or amateurs by sports clubs with their own facilities, see 93.11
           </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-4">Collection</div>
           <div class="col-8">EU Economic Activity Classification
           </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-4">Parent</div>
           <div class="col-8">Sports Activities 
           </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-4">Application Schema</div>
           <div class="col-8">Activity Complex
           </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">Governance level</div>
           <div class="col-8">Legal(EU)
           </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">Status</div>
           <div class="col-8">Valid
           </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-4">Insert Date</div>
           <div class="col-8">2019-03-13 11:46 AM UTC
           </div>
        </div>
        
        
    </div>
    <br>
    <br>
    <br>
    <center>
    <h1 style="color: darkblue;">Register for club members</h1></center>
   
    <div class="container1">
   
<div class="form-floating">
    <form action="" method="post" id="student-form">
   
       <label for="" class="form-label"> Name :</label> <input type="text" name="sname" id="" class="form-control" >

       <label for="" class="form-label"> Age : </label><input type="number" name="age" id="" class="form-control" >
       <label for="" class="form-label">Phone number : </label> <input type="phone" name="phone" id="" class="form-control" >
       <label for="" class="form-label"> Date OF Birth : </label> <input type="date" name="dob" id="" class="form-control" >
        
        <label for="" class="form-label">Email :  </label> <input type="email" name="email" id="" class="form-control" placeholder="somehting@gmail.com" >
       
        <label for="" class="form-label"> Address : </label> <textarea name="address" id="" style="width:100%"></textarea><br>
        <label for="" class="form-label"> class  : </label> <input type="text" name="class" id="" class="form-control" >
        <label for="" class="form-label"> Region  : </label> <input type="text" name="region" id="" class="form-control" >

        <input type="submit" name="Save" id="" value="Register" class="btn btn-primary">
        <input type="Cancel" name="cancel" id="" value="Cancel" class="btn btn-primary">


    </form>
</div>
</div>
    <?php
    if(isset($_POST['Save'])){
        
        include "connect.php";
        $query="insert into students(name,age,phone,email,address,dob,class,region) values('$_POST[sname]','$_POST[age]','$_POST[phone]','$_POST[email]','$_POST[address]','$_POST[dob]','$_POST[class]','$_POST[region]')";
        mysqli_select_db($con,$mydb); 
        $result = mysqli_query($con,$query); 
        //$myrow = mysqli_fetch_array($result,MYSQLI_ASSOC);
        if ($result) { 
            
            echo "<center>Successfully added</center>"; 
        } 
    else { 
        die('Error: ' . mysqli_error($con));
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