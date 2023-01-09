<?php
    require("connection.php");
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $phonenumber=$_POST['phone'];
        $email=$_POST['text1'];
        $pwd=$_POST['password'];
        $login=0;
        $sql="INSERT INTO registration(name,phone_no,email_address,password,admin) values('$name','$phonenumber','$email','$pwd','$login')";
        $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        if($result){
            echo '<div class="alert alert-info" role="a">Registration Successful</div>';

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
    <title>Home Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
    .status{
    z-index: 1;
    margin-top: 50%;
    margin-left: auto;
    margin-right: auto;
    color: black;
    border: 20px;
    border-radius: 4px;
    border-color: black;
    font-size: medium;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-weight: 400;
    }
        .header{
            height: 236px;
            background: linear-gradient(180deg,rgb(20, 167, 172),rgb(34, 93, 242));
            border-bottom-left-radius: 50% 134%;
            border-bottom-right-radius: 50% 134%;
            box-shadow: 0px 8px 13px 3px  rgb(77, 21, 73);
        }
        #footer{
            max-height: auto;
            width: 100%;
            background-color: darkslategray;
        }
        .b1{
            max-height: 210px;
            max-width: 300px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
            border-radius: 10px;
            margin-top: 6px;
        }
        h1{
            backdrop-filter: blur(1px);
            text-align: center;
            background-image: linear-gradient(45deg, #ec407a, #3f51b5,#29b6f6);
            font-size: smaller;
            font-weight: 800;
            color: snow;
            margin-top: -150px;
            max-width: 256px;
            max-height: initial;
            border-radius: 10px;
            margin-left: 17px;
            filter: drop-shadow(2px 4px 6px black);
        }
        #head{
            filter: drop-shadow(4px 4px 4px black);
            color: bisque;
        }
        .sec{
             margin-top: 20px;

        }
       
        .d1{
            padding-top:16px;
            width: auto;
        }
        #pic2{
            max-width: 350px;
            max-height: 200px;
        }

    </style>
</head>
<body id="body1" onload='document.form1.text1.focus()' style="background-color:aliceblue">
        <div class="row m-2 " style="background-color: rgb(39, 65, 75);">
            <div  class="col-3 col-sm-6 col-md-6 col-lg-6 col-xl-6 " >
                <div>
                    <img id="logo" src="images/logo2.png">
                </div>
            </div>
            <div class="col-9 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="padding-left: 100px;">
                <nav class ="navbar navbar-expand-xl navbar-dark " style=" background-color: rgb(39, 65, 75);">
                    <a class ="navbar-brand" href ="#"> </a>
                    <button class ="navbar-toggler" style="background-color: rgb(39, 65, 75);" type ="button" data-toggle ="collapse" data-target ="#colNav">
                    <span class ="navbar-toggler-icon"></span>
                    </button>
                    <div class ="collapse navbar-collapse ml-md-5 pl-md-5" style="background-color: rgb(39, 65, 75);" id ="colNav">
                        <ul class="nav nav-pills ">
                            <li class="nav-item ">
                                <a class="nav-link icon "  data-toggle="pill"  id="log" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link icon" data-toggle="pill" id="aboutus" href="https://kochimetro.org/water-transport/">About us</a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link icon"  data-toggle="pill"  id="routes" href="">Routes</a>
                            <li class="nav-item">
                            <div class="dropdown">
                            <button class="nav-link icon dropdown-toggle " style="background-color:rgb(39, 65, 75); border: none;" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                login
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item c " href="loginadmin.php">Admin Login</a>
                                <a class="dropdown-item c" href="loginuser.php">User Login</a>
                                <a class="dropdown-item c" href="loginstaff.php">Staff Login</a>
                            </div>
                            </div>
                            </li>
                            
                            <li>
                                <img class="mt-2"  src="nightmode.png" style="max-width: 20px;" onclick="colourchange()">
                            </li>
                        </ul>
                </div>
                </nav>
            </div>
            
        </div>
        <div class="row m-2">
            <div  class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 header">
                <div class="b1">
                    <img src="images/boat5.png" class="b1 img-fluid" >
                    <div style="width:300px;">
                        <h1>LETS FLOW THROUGH KOCHI</h1>
                    </div>
                </div>
            </div>
        </div>
        <section>
        <div class="row mt-3 pt-3">
            <div class="col-1 col-md-2 pt-5">
                <div class="left-container">
                </div>
            </div>
            <div class="col-1 col-md-1" >
            </div>
            <div class="col-8 col-md-6" >
                <div class="rounded-lg bg-blue p-3 border-light" style="background-image:linear-gradient(0deg,rgb(20, 167, 172),rgb(34, 93, 242))">
                    <center><h5 id="head">User Registration</h5></center>
                    <form class="m-5" action="" method="post" name="form1">
                        <div class="form-group">
                          <label class="text1" for="name">Name</label>
                          <input type="text" class="form-control" placeholder="Enter Full Name" id="name" name="name" value="">
                        </div>
                        <div class="form-group">
                          <label class="text1" for="phone">Phone Number</label>
                          <input type="number" class="form-control" placeholder="Enter a Valid Phone Number" id="ph" name="phone" value="">
                        </div>
                        <div class="form-group">
                            <label class="text1" for="email">Email Address</Address></label>
                            <input type="email" class="form-control" placeholder="Enter A Valid Email ID" id="email" value="" name="text1">
                        </div>
                        <div class="form-group">
                            <label class="text1" for="">Password</label>
                            <input type="password" class="form-control" placeholder="Password Must Have Atleat 6 characters" id="pwd1" name="password" value="">
                        </div>
                        <div class="form-group">
                            <label class="text1" for="">confirm Password</label>
                            <input type="Password" Class="form-control" placeholder="Confirm Your Password" id="pwd2" value="">                   
                        </div>
                        <div class="text-center text1">
                        <input type="submit" name="submit" value="Sign Up" class="btn but1" onclick="ValidateEmail(document.form1.text1)">
                        </div >
                        <div class="text-center text1">
                        <p id="p1">you can Access Our Services By Logging In By The Above Entered EMail ID And Password</p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-1 col-md-1 " >
            </div>
            <div class="col-1 col-md-2 text-right m-0 pt-5">
                <div class="right-container ml-0">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="card text-white bg-primary m-4" style="max-width: 200em; max-height: 500em;">
            <div class="card-header text-center">NOTICES</div>
            <div class="card-body">
              <h5 class="card-title" id=""></h5><?php  
              $notice=mysqli_query($conn,"SELECT * FROM notices");
              $getnotice=mysqli_fetch_array($notice);
              $date=$getnotice['date'];
              $notice=$getnotice['notice'];
              
              echo 
              "<p class='card-text' id='notices'>$date</p>
              <p class='card-text' id='notices'>$notice</p>";
              ?>
            </div>
          </div>
    </section>
        
    <section id="aboutus">
        <div class="row " >
            <div class="col-12 col-md-6 p-3 text-center text-md-right img-fluid " style=" align-items: center;" >
                 <img src="boat12.jpg" style="max-width: 50%; border-radius: 20px;"  alt="" >
                 <img src="boat8.jpg" style="max-width: 50%; border-radius: 20px;" alt="">
            </div>
            <div class="col-12 col-md-6 text-dark align-text-bottom ">
                <div>
                    <h2 id="h2" class="mt-5 font-weight-bold container">Check Our Official Page<br> For More Details
                    </h2>
                </div>

            </div>
        </div>
        <div class="row ">
            <div class="col-12 col-md-6 pl-md-5 img-fluid">
                <img src="boat9.jpg" style="max-width: 100%; border-radius: 20px;" alt="">
            </div>
            <div class="col-12 col-md-6   text-center " >
                <div>
                  <a href="https://kochimetro.org/water-transport/"><img src="images/homwlink.png" class="m-md-2 linkimg"alt="" style="border-radius: 100%;max-width: 400px;"></a>
                </div>
            </div>
        </div>

    </section>
    <section>
        <div class="row m-3 pt-2 rounded " >
            <div class="col-12">
                    <div class="row p-2 rounded" style="background-image:linear-gradient(0deg,rgb(136, 46, 197),white) ;">
                        <div class="col-12 col-md-4 text-center p-4">
                            <div class="text-black-50">
                                <a href="ticketpic.php"  class="text-dark " style="text-decoration: none;">
                                
                                  <div id="ticket" class="card ml-md-5 c " style="width: 18rem;">
                               
                                    <img style="width:100px;height:100px;" class="card-img-top img-fluid ci" src="images/pngegg.png" alt="Card image cap">
                                    <div class="card-title">
                                        <h5>ONLINE TICKETS</h5>
                                    </div>
                                    <div class="card-body">
                                    <p class="card-text">Click here to buy and Reserve Tickets</p>
                                    </div>
                                </div>

                                </a>
                            </div>
                    </div>
                    <div class="col-12 col-md-4 text-center p-4">
                        <div >
                            <a href="routes.php" class="text-dark " style="text-decoration: none;">
                            <div class="card ml-md-5 c" style="width: 18rem;">
                                <img style="width:100px;height:100px;" class="card-img-top ci" src="images/pngwing.com.png" alt="Card image cap" class="ci">
                                <div class="card-title">
                                    <h5>ROUTES</h5>
                                </div>
                                <div class="card-body">
                                <p class="card-text">See The Places Connecting Boat Services</p>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 text-center p-4">
                        <div class="text-black-50 ">
                            <a href="ticketpic.php" class="text-dark " style="text-decoration: none;">
                                <div class="card ml-md-5 c" style="width: 18rem;" >
                                    <img style="width:100px;height:100px;" class="card-img-top ci" src="images/comment.png" alt="Card image" >
                                    <div class="card-title">
                                        <h5>COMMENTS</h5>
                                    </div>
                                    <div class="card-body">
                                    <p class="card-text">Open up your worries and querries Here</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            </div>
    </section>
    

           
    
        
        
            

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="project.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function colourchange(){
            colour1=document.getElementById('body1').style.backgroundColor
            if(colour1=="aliceblue"){
                document.getElementById('body1').style.backgroundColor="rgb(12, 18, 28)"
                document.getElementById('h2').style.color="white"
            }
            else if(colour1=="rgb(12, 18, 28)"){
                document.getElementById('body1').style.backgroundColor="aliceblue"
                document.getElementById('h2').style.color="black"
            }
        }
        function ValidateEmail(inputText)
            {
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
            document.getElementById("aboutus").onclick = function () {
            location.href = "https://kochimetro.org/water-transport/";
            };
            document.getElementById("routes").onclick = function () {
            location.href = "Routes.php";
            };
            document.getElementById("login").onclick = function () {
            location.href = "login.php";
            };
            document.getElementById("reviews").onclick = function () {
            location.href = "Review.php";
            };
        var login=0;
        document.getElementById("ticket").onclick=function(){
             if(login==1){
                location.href="Useracc.html"
             }
             else{
                alert("You Are Not Logged In")
             }
        }

    </script> 
</body>
</html>