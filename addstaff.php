<?php
session_start();
if($_SESSION["log"]!=1)
{
echo '<script> window.location = "loginadmin.php"; </script>';
}
require("header.php");
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $phonenumber=$_POST['phone'];
    $email=$_POST['text1'];
    $pwd=$_POST['password'];
    $login=2;
    $notice=mysqli_query($conn,"SELECT * FROM notices");
    $sql="INSERT INTO registration(name,phone_no,email_address,password,admin) values('$name','$phonenumber','$email','$pwd','$login')";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if($result){
        echo '<div class="alert alert-info" role="a">NEW STAFF ACCOUNT ADDED</div>';

    }
    else{
        echo '<div class="alert alert-danger "> Try Again</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addstaff</title>
</head>
<body>
    <div class="row container-fluid">
        <div class="col-12 col-md-4"></div>
<div class="col-12 col-md-4 " >
                <div class="rounded-lg bg-blue p-3 border-light" style="background-image:linear-gradient(0deg,rgba(20, 167, 172, 0.493),rgba(34, 93, 242, 0.489))">
                    <center><h5 id="head">Staff Registration</h5></center>
                    <form class="m-5" action="" method="post" name="form1">
                        <div class="form-group">
                          <label class="text1" for="name">Name</label>
                          <input type="text" class="form-control" placeholder="Enter Full Name" id="name" name="name" value="">
                        </div>
                        <div class="form-group">
                          <label class="text1" for="phone">Phone Number</label>
                          <input type="number" class="form-control" placeholder="Enter a Valid Phone Number" id="ph" name="phone" value="" required>
                        </div>
                        <div class="form-group">
                            <label class="text1" for="email">Email Address</Address></label>
                            <input type="email" class="form-control" placeholder="Enter A Valid Email ID" id="email" value="" name="text1" required>
                        </div>
                        <div class="form-group">
                            <label class="text1" for="">Password</label>
                            <input type="password" class="form-control" placeholder="Password Must Have Atleat 6 characters" id="pwd1" name="password" value="" required>
                        </div>
                        <div class="form-group">
                            <label class="text1" for="">confirm Password</label>
                            <input type="Password" Class="form-control" placeholder="Confirm Your Password" id="pwd2" value="">                   
                        </div>
                        <div class="text-center text1">
                        <input type="submit" name="submit" value="ADD" class="btn but1" onclick="ValidateEmail(document.form1.text1)">
                        </div >
                        <div class="text-center text1">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-4"></div>
            
    </div>
            <script type="text/javascript">
                function ValidateEmail(inputText){
                var pass=document.getElementById('pwd1').value
                var pass1=document.getElementById('pwd2').value
                var phno=document.getElementById('ph').value
                if(pass.length<6){
                    alert('Password must contain atleast 6 characters');
                    return false;

                    }else if(pass!=pass1){
                        alert('Password doesnt match');
                        return false
                    }
              
                if((phno=='')||(phno.length!==10))
                {
                    alert("Please Enter A Valid Phone Number");
                    return false
                }
                    if(inputText.value==''){
                        alert('Please Enter An Email Address');
                        return false
                    }
                    else{
                        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                        if(inputText.value.match(mailformat))
                        {
                        document.form1.text1.focus();
                        return true;
                        }
                        else
                        {
                        alert("You have entered an invalid email address!");
                        document.form1.text1.focus();
                        return false;
                        }
                       }
                    }
            </script>
</body>
</html>