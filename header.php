<?php
require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Header</title>
</head>
<body>
    <section>
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
                            <a class="nav-link icon"  data-toggle="pill"  id="home" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link icon" data-toggle="pill" id="aboutus" href="">About us</a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link icon"  data-toggle="pill"  id="routes" href="Routes.php">Routes</a>
                        <li class="nav-item">
                        <div class="dropdown">
                            <button class="nav-link icon dropdown-toggle " style="background-color:rgb(39, 65, 75); border: none;" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                login
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="loginadmin.php">Admin Login</a>
                                <a class="dropdown-item" href="loginuser.php">User Login</a>
                                <a class="dropdown-item" href="loginstaff.php">Staff Login</a>
                            </div>
                            </div>
                        </li>
                        
                        <li>
                            <img class="mt-2"src="images/nightmode.png" style="max-width: 20px;" onclick="colourchange()">
                        </li>
                    </ul>
            </div>
            </nav>
        </div>
        </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="js/bootstrap.min.js"></script>
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
        document.getElementById("home").onclick = function () {
            location.href = "index.php";
            };
        document.getElementById("aboutus").onclick = function () {
            location.href = "https://kochimetro.org/water-transport/";
            };
            document.getElementById("routes").onclick = function () {
            location.href = "Routes.php";
            };

            document.getElementById("reviews").onclick = function () {
            location.href = "Review.php";
            };
    </script>
    
</body>
</html>