<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    
<style>
    body{
        border: 100px solid white;
    }
</style>

</head>
<body>
    <div class="container">
<div class="form-floating">
    <form action="" method="post">
   
       <label for="" class="form-label"> Name :</label> <input type="text" name="sname" id="" class="form-control" width="100px">

       <label for="" class="form-label"> Age : </label><input type="number" name="age" id="" class="form-control" width="100px">
       <label for="" class="form-label">Phone number : </label> <input type="phone" name="phone" id="" class="form-control" width="100px">
       <label for="" class="form-label"> Date OF Birth : </label> <input type="date" name="dob" id="" class="form-control" width="100px">
        
        <label for="" class="form-label">Email :  </label> <input type="email" name="email" id="" class="form-control" placeholder="somehting@gmail.com" width="100px">
       
        <label for="" class="form-label"> Address : </label> <textarea name="address" id="" width="100px"></textarea><br>
        <label for="" class="form-label"> class  : </label> <input type="text" name="class" id="" class="form-control" >
        <input type="submit" name="Save" id="" value="Register" class="btn btn-primary">

    </form>
</div>
</div>
    <?php
    if(isset($_POST['Save'])){
        
        include "connect.php";
        $query="select * from students";
        mysqli_select_db($con,$mydb); 
        $result = mysqli_query($con,$query); 
        $myrow = mysqli_fetch_array($result,MYSQLI_ASSOC);
    }
    mysqli_close($con);
     ?>
</body>
</html>