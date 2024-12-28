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
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />


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
    </style>



    <!-- <div id="box">
        <div id="ball"></div>
    </div> -->




</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
           
                <!-- this for frame body -->
                <?php
    include "connect.php";

    $delete_id=$_GET['did'];
    $sql="select * from students where id='$delete_id'";
    $query="delete from students where id='$delete_id'";
    mysqli_select_db($con,$mydb);
    $result=mysqli_query($con,$sql);
    $myrow=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(!$myrow){
        echo "NO data found";

    }else{
        mysqli_query($con,$query);
        echo "Students ID '$delete_id' Data deleted successfully";
        echo "<a href='delete.php'>Back</a>";
    }
    mysqli_close($con);
    ?>
            </main>
        </div>
    </div>
   
</body>
</html>