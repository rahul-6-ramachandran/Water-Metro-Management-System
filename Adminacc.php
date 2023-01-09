<?php
session_start();
if($_SESSION["log"]!=1)
{
echo '<script> window.location = "loginadmin.php"; </script>';
}
require("header.php");
// USER DETAILS
$sqluser="SELECT * FROM registration WHERE admin = '0' ";
$resultuser=mysqli_query($conn,$sqluser);
$num=mysqli_num_rows($resultuser);
$row=mysqli_fetch_assoc($resultuser);
//
//BOOKING DETAILS

$sqlbook="SELECT * FROM tickets ";
$resultbook=mysqli_query($conn,$sqlbook);
$rowbook=mysqli_fetch_assoc($resultbook);
$numbook=mysqli_num_rows($resultbook);
$userid=$rowbook['user_id'];
$user=mysqli_query($conn,"SELECT name FROM registration WHERE user_id='$userid'");
$u=$user->fetch_row()[0];
//
//STAFF DETAILS
$sqlstaff="SELECT * FROM registration WHERE admin = '2' ";
$resultstaff=mysqli_query($conn,$sqlstaff);
$numstaff=mysqli_num_rows($resultstaff);
$rowstaff=mysqli_fetch_assoc($resultstaff);
//
//BOAT DETAILS
$sqlboat="SELECT * FROM time ";
$resultboat=mysqli_query($conn,$sqlboat);
$numboat=mysqli_num_rows($resultboat);
$rowboat=mysqli_fetch_assoc($resultboat);
//
//REVIEW DETAILS
$sqlreview="SELECT * FROM review ";
$resultreview=mysqli_query($conn,$sqlreview);
$numreview=mysqli_num_rows($resultreview);
$rowreview=mysqli_fetch_assoc($resultreview);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2{
            font-size:x-large ;
            font-family: monospace;
            color: rgba(0, 64, 255, 0.443);
        }
    </style>
    
    
</head>
<body>
    <div class="row container">
        <div class="col-4 mt-0">
        <div class="btn-group btn-group-vertical " >
            <a href="#USERS"class="btn btn-outline-primary btn-floating">USERS</a>
            <a href="#BOOKINGS" class="btn btn-outline-primary btn-floating">BOOKINGS</a>
            <a href="#STAFFS" class="btn btn-outline-primary btn-floating">STAFFS</a>
            <a href="Routes.php" class="btn btn-outline-primary btn-floating">ROUTES</a>
            <a href="#BOATS" class="btn btn-outline-primary btn-floating">BOATS</a>
            <a href="notices.php" class="btn btn-outline-primary btn-floating">ISSUE NOTICE</a>
            

        </div>
        
        </div>


        <div class="col-8">
            <section id="USERS" class="mt-3">
                <div class="row pr-md-5 mt-3">
                <h2>USERS <?php echo '('.$num.')'; ?></h2><p>
                   </p>
                </div>
                    <div class="row">
                        <div class="table-responsive">
                        <table class="table  info">
                            <tr class="bg-info">
                                <th>USER ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>PHONE NUMBER</th>
                            </tr>
                            <tr>
                                <?php
                                foreach($resultuser as $row){
                                    if($row['admin']==0){
                                 echo 
                                 "<td>",$row['user_id'],"</td>
                                <td>
                                    
                                        ",$row['name'],"
                                    
                                </td>
                                <td>
                                ",$row['email_address'],"
                                        
                                    
                                </td>
                                <td>
                                ",$row['phone_no'],"
                                        
                                    
                                </td>
                                <td>

                                <a href='admindelete.php?id=",$row['user_id'],"'><button class='btn btn-danger'>Restrict</button></a>
                                                               
                                </td></tr>
                                ";
                                    }
                                }
                                ?>
                            
                        </table>
                        
                    </div>
                    </div>
            </section>
        </div>
            <section>
            <div class="row mt-md-4">
                <div class="col-4"></div>
                    <div class="col-8">
                        <section id="BOOKINGS" class="mt-md-3">
                            <div class="row pr-md-5 mt-3">
                                <h2>BOOKINGS <?php echo '('. $numbook .')';?></h2><p></p>
                            </div>
                            <div class="row">
                            <div class="table-responsive">
                                <table class="table  info">
                                    <tr class="bg-info">
                                        <th>BOOKING ID</th>
                                        <th>USER </th>
                                        <th>FROM</th>
                                        <th>TO</th>
                                        <th>ROUTE NO</th>
                                        <th>BOAT NO</th>
                                        <th>DATE</th>
                                        <th>TIME</th>
                                        <th>NO OF TICKETS</th>
                                        <th>PRICE</th>
                                        <th>VERIFIED OR NOT</th>
                                    </tr>
                                    <tr>
                                <?php
                                foreach($resultbook as $rowbook){

                                 echo "<td>",$rowbook['ticket_id'],"</td>
                                <td>
                                    
                                        ",$u,"
                                    
                                </td>
                                <td>
                                ",$rowbook['start'],"
                                        
                                    
                                </td>
                                <td>
                                ",$rowbook['end'],"
                                        
                                    
                                </td>
                                <td>
                                ",$rowbook['routeno'],"
                                        
                                    
                                </td>
                                <td>
                                ",$rowbook['boat_id'],"
                                        
                                    
                                </td>
                                <td>
                                ",$rowbook['date'],"
                                        
                                    
                                </td>
                                <td>
                                ",$rowbook['time'],"
                                        
                                    
                                </td>
                                <td>
                                ",$rowbook['no_of_tickets'],"
                                        
                                    
                                </td>
                                <td>
                                ",$rowbook['total_price'],"
                                        
                                    
                                </td>
                                <td>
                                ",$rowbook['verified'],"
                                        
                                    
                                </td>
                                <td>

                                <a href='adminbookdelete.php?id=",$rowbook['ticket_id'],"'><button class='btn btn-danger'>Suspend</button></a>
                                                               
                                </td></tr>
                                ";
                                
                                }
                                ?>
                            
                        </table>
                    </div>
                </div>
                </section>
             </div>
            </div>

            
            
            <div class="row mt-md-4">
                <div class="col-4"></div>
                    <div class="col-8">
                        <section id="STAFFS">
                            <div class="row pr-md-5 mt-5">
                                <h2>STAFFS <?php echo '('.$numstaff.')' ?></h2><p></p>
                            </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table  info">
                                    <tr class="bg-info">
                                        <th>STAFF ID</th>
                                        <th>NAME</th>
                                        <th>EMAIL ID</th>
                                        <th>PHONE NUMBER</th>
                                    </tr>
                                    <tr>
                                <?php
                                foreach($resultstaff as $rowstaff){
                                 echo 
                                 "<td>",$rowstaff['user_id'],"</td>
                                <td>
                                    
                                        ",$rowstaff['name'],"
                                    
                                </td>
                                <td>
                                ",$rowstaff['email_address'],"
                                        
                                    
                                </td>
                                <td>
                                ",$rowstaff['phone_no'],"
                                        
                                    
                                </td>
                                <td>

                                <a href='admindelete.php?id=",$rowstaff['user_id'],"'><button class='btn btn-danger'>Restrict</button></a>
                                                               
                                </td></tr>
                                ";
                                    
                                }
                                ?>
                                <a href="addstaff.php"><button class="btn btn-outline-info float-right ">ADD STAFF</button></a>
                            
                        </table>
                        
                    </div>
                            
             </div>
             </section>
        </div>
    </div>

    <div class="row mt-md-4">
                <div class="col-4"></div>
                    <div class="col-8">
                        <section id="BOATS">
                            <div class="row pr-md-5 mt-5">
                                <h2>BOATS</h2><p></p>
                            </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table  info">
                                    <tr>
                                        <th>BOAT ID</th>
                                        <th>BOAT NAME</th>
                                        <th>TIME</th>
                                        <th>ROUTE NUMBER</th>
                                    </tr>
                                    <tr>
                                <?php
                                foreach($resultboat as $rowboat){
                                 echo 
                                 "<td>",$rowboat['boat_id'],"</td>
                                <td>
                                    
                                        ",$rowboat['Boat_name'],"
                                    
                                </td>
                                <td>
                                ",$rowboat['times'],"
                                        
                                    
                                </td>
                                <td>
                                ",$rowboat['routeno'],"
                                        
                                    
                                </td>
                                <td>

                                <a href='boatdelete.php?id=",$rowboat['boat_id'],"'><button class='btn btn-danger'>SUSPEND</button></a>
                                                               
                                </td></tr>
                                ";
                                    
                                }
                                ?>
                                <a href="addboat.php"><button class="btn btn-outline-info float-right">ADD BOAT</button></a>
                            
                        </table>
                        
                    </div>
                            
             </div>
             </section>
        </div>
    </div>
    <div class="row mt-md-4">
                <div class="col-4"></div>
                    <div class="col-8">
                        <section id="REVIEWS">
                            <div class="row pr-md-5 mt-5">
                                <h2>REVIEWS</h2><p></p>
                            </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table  info">
                                    <tr>
                                        <th>USER</th>
                                        <th>REVIEWS</th>
                                    </tr>
                                    <tr>
                                <?php
                                foreach($resultreview as $rowreview){
                                 echo 
                                 "<td>",$rowreview['name'],"</td>
                                <td>
                                    
                                        ",$rowreview['reviews'],"
                                    
                                </td></tr>";
                                }
                                ?>
                                    
                                
                            
                        </table>
                        
                    </div>
                            
             </div>
             </section>
        </div>
    </div>
        
    <button type="button" class="btn btn-outline-dark btn-floating btn-lg" id="btn-back-to-top">
  <i class="fas fa-arrow-up"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
</svg></i></button>
<div class="ml-4 fixed-bottom text-right">
             <div><form action="logout.php"><input class="btn btn-outline-danger" type="submit" value="logout" ></form></div>
        </div>
    
    <script>
        
    let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
scrollFunction();
};

function scrollFunction() {
if (
document.body.scrollTop > 20 ||
document.documentElement.scrollTop > 20
) {
mybutton.style.display = "block";
} else {
mybutton.style.display = "none";
}
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
}

 </script>  
    
    
</body>
</html>


