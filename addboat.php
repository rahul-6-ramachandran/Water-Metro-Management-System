<?php
session_start();
if($_SESSION["log"]!=1)
{
echo '<script> window.location = "loginadmin.php"; </script>';
}
require("header.php");
if(isset($_POST['submit'])){
  $id=$_POST['boatid'];
  $time=$_POST['time'];
  $name=$_POST['bname'];
  $route=$_POST['rno'];
  $q="INSERT INTO time(times,boat_id,routeno,Boat_name) values('$time','$id','$route','$name')";
  $res=mysqli_query($conn,$q);
  if($res){
    echo '<div class="alert alert-info" role="alert">
          Successfully Added</div>';
  }
  else{
    echo '<div class="alert alert-danger" role="alert">
          Something Went Wrong</div>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD BOATS</title>
</head>
<body>
<div class="row" style="background:rgba(0, 0, 0, 0.215);">
<div class="col-md-3"></div>
<div class="col-md-6">
<form method="post">
  <div class="form-group">
    <label >Boat ID</label>
    <input type="text" class="form-control" name="boatid" placeholder="Differs Each Time">
  </div>
  <div class="form-group">
    <label>Time</label>
    <input type="text" class="form-control"  name="time" placeholder="Time Of Departure">
  </div>
  <div class="form-group ">
    <label >Boat Name</label>
    <input class="form-control" type="text" name="bname" class="form-check-input">
  </div>
  <div class="form-group ">
    <label >Route Number</label>
    <input class="form-control" type="text" name="rno" class="form-check-input">
  </div>
  <input  type="submit" class="btn btn-primary" name="submit" value="ADD">
</form>
</div>
<div class="col-md-3"></div>
</div>
</body>
</html>