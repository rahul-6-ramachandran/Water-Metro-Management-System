<?php
session_start();
if($_SESSION["log"]!=1)
{
echo '<script> window.location = "loginadmin.php"; </script>';
}
require("header.php");
if(isset($_POST['Submit'])){
  $date=$_POST['date'];
  $notice=$_POST['survey_options'];
  $query="INSERT INTO notices(date,notice) values('$date','$notice')";
  $Result=mysqli_query($conn,$query) or die(mysqli_error($conn));
  if($Result){
    echo "<div class='alert alert-info' role='alert'>
    Notice Issued Successfully
  </div>";
  }
  else{
    echo "<div class='alert alert-info role='alert'>Please Try Again</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body style= " background:url(../images/Myproject.jpg);">
<div class="row">
    <div class="col-1 col-md-2"></div>
    <div class="col-10 col-md-8">
    <section>
        <div class="card text-white m-4 " style="background-color:rgba(7, 5, 90, 0.527); max-width: 200em; max-height:200em;">
            <div class="card-header text-center">NOTICES</div>
            <div class="card-body">
            <form action="" method="POST">
              <h5 class="card-title text-left" id="">Date</h5>
              <input class="text-center float-left " type="date" name="date" required>
              <div id="survey_options">
            <input type="textarea" name="survey_options" id="notice" class="ml-md-2 w-75 h-100% inline-block card-text" ><br><br>
            <input id="sbtBtn" type="submit" name="Submit" class="btn btn-primary" value="Submit">
           <a href="deletenotice.php"><button class="btn btn-outline-info">Delete All</button></a>
            
            </div>
            </form>
            </div>
          </div>
    </section>
    <section>
      
    </section>

    </div>
    <div class="col-1 col-md-2"></div>

</div>
</div>
<script>
  document.getElementById('sbtBtn').onclick = function(){
    var not=document.getElementById('notice')
    if(not==''){
      alert('Please Fill All Forms')
      return false;
    }
  }

  </script>

</body>
</html>

  