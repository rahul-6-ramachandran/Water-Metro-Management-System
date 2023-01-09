<?php
session_start();
require("header.php");
if(isset($_POST['submit'])){
    $admEmail=$_POST['Email'];
    $admpass=$_POST['password'];
    $res=mysqli_query($conn,"SELECT * FROM registration WHERE email_address = '$admEmail' AND password = '$admpass'");
    $count=mysqli_num_rows($res);
    if($count==1){
        $row=mysqli_fetch_assoc($res);
        $acct_type=$row["admin"];
        if($acct_type==1){
            $_SESSION["log"]=$acct_type;
            $_SESSION["AdmId"]=$row["user_id"];
            $_SESSION["AdmnamE"]=$row["name"];
            $_SESSION["Adm_Ph_nO"]=$row["phone_no"];
            $_SESSION["Adm_EmaiL"]=$row["email_address"];
        }
        else{
            echo '<div class="alert alert-danger" role="alert">
            Please Try Again....!   </div>';
        }
            echo '<div class="alert alert-info" role="alert">Login Successfull </div>';
            echo '<script>location.href="Adminacc.php"</script>';
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
    <style>
    </style>
</head>
<body>
    <div class="center" style="background-color:(rgb(162, 163, 164));">
        <h1>LOGIN</h1>
        <form method="post" action="">
            <div class="txt_field form-text">
                <input type="Email" name="Email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field form-text">
                <input type="password" name="password" required>
                <span></span>
                <label>password</label>
            </div>
             <input style="background-color:rgb(83, 142, 244);" name="submit" type="submit" value="login">
            <div class="signup_link text-center">
             Not a Member?<a href="index.php">Sign up</a>   

             <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
             <script src="js/bootstrap.min.js"></script>
             <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    
</body>
</html>