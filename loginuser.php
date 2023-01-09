<?php
session_start();
require("header.php");
if(isset($_POST['Submit'])){
    $Ema=$_POST['Em'];
    $pass=$_POST['pd'];
    $res=mysqli_query($conn,"SELECT * FROM registration WHERE email_address = '$Ema' AND password = '$pass'");
    $count=mysqli_num_rows($res);
    if($count==1){
        $row=mysqli_fetch_assoc($res);
        $acct_type=$row["admin"];
        if($acct_type==0){
            $_SESSION["log"]=$acct_type;
            $_SESSION["UserId"]=$row["user_id"];
            $_SESSION["NamE"]=$row["name"];
            $_SESSION["Ph_nO"]=$row["phone_no"];
            $_SESSION["EmaiL"]=$row["email_address"];
        }
        else{
            echo '<div class="alert alert-danger" role="alert">
            Please Try Again....!   </div>';
        }
            echo '<div class="alert alert-info" role="alert">Login Successfull </div>';
            echo '<script>location.href="Useracc.php"</script>';
    }
    else{
        echo '<div class="alert alert-danger" role="alert">Oops... Something Went Wrong....Try Again</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="project.js">
    <style>
    </style>
</head>
<body>
    <div class="row" style="margin-top:250px;">
        <div class="col-3 col-md-4"></div>
        <div class="col-6 col-md-4">
            <div class="center" style="background-color:(rgb(162, 163, 164));">
                <form method="post" action="" >
                    <h1>LOGIN</h1>
                    <div class="txt_field form-text">
                        <input  type="Email" name="Em" required>
                        <span></span>
                    <label>Email</label>
                    </div>
                    <div class="txt_field form-text">
                        <input  type="password" name="pd" required>
                        <span></span>
                    <label>password</label>
                    </div>
                     <input id="s" style="background-color:rgb(83, 142, 244);" name="Submit" type="submit" value="login">
                    <div class="signup_link text-center">
                     Not a Member?<br><a href="index.php" class="btn btn-primary text-white " style="border-radius:50px;">Sign up</a>   </div>
                </form>
                </div>
             </div>
    <div class="col-3 col-md-4"></div>
    

             <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
             <script src="js/bootstrap.min.js"></script>
             <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            
    
</body>
</html>