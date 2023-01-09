<?php
session_start();
 if($_SESSION["log"]!=2)
{
  echo '<div class="alert alert-danger" role="alert">
  Session Expired...!   </div>';
echo '<script> window.location = "loginstaff.php"; </script>';
} 
 require('header.php');
 if(isset($_POST['Book'])){
  $date=$_POST['date'];
  $start=$_POST['Start'];
  $End=$_POST['End'];
  $Time=$_POST['Time'];
  $Tickets=$_POST['Number'];
  $userid=$_SESSION["stId"];
  $totalprice=20*$Tickets;
  $flag="Yes";
  $fistResult=mysqli_query($conn,"SELECT routeno FROM terminals WHERE places = '$start'");
  $secondResult=mysqli_query($conn,"SELECT routeno FROM terminals WHERE places = '$End'");
  $first=$fistResult->fetch_row()[0];
  $second=$secondResult->fetch_row()[0];
  if ($first==$second) {
    $boatresult=mysqli_query($conn,"SELECT boat_id FROM time WHERE routeno='$first' AND times='$Time'");
    $boatres=$boatresult->fetch_row()[0];
    if($boatres){
      $total=mysqli_query($conn,"SELECT * FROM tickets WHERE boat_id='$boatres' ");
      $totalbooks=mysqli_num_rows($total);
      if($totalbooks<=100){
        $ticketquery="INSERT INTO tickets(user_id,start,end,routeno,boat_id,date,time,no_of_tickets,total_price,verified) values('$userid','$start','$End','$first','$boatres','$date','$Time','$Tickets','$totalprice','$flag')";
        $tic=mysqli_query($conn,$ticketquery);
        if($tic){
            $tick=mysqli_query($conn,"SELECT ticket_id FROM tickets Where boat_id='$boatres' and user_id='$userid'");
            $ticketid=$tick->fetch_row()[0];
          echo '<div class="alert alert-info" role="alert">
           BOOKING SUCCESSFULL ID='.$ticketid.'</div>';

        }else{
          echo '<div class="alert alert-danger" role="alert">
                 Please Try Again....!   </div>';
        }
      }
    }
  }else
  {
    echo '<div class="alert alert-danger" role="alert"> Please Select A Valid Place</div>';
  }
 }
 if(isset($_POST['revsub'])){
  $name=$_POST['name'];
  $review=$_POST['Review'];
  $getreview="INSERT INTO review(name,reviews) values('$name','$review')";
  $rev=mysqli_query($conn,$getreview);
  if($rev){
    echo '<div class="alert alert-info" role="alert">
           Review Submitted Successfully</div>';
  }else{
    echo '<div class="alert alert-danger" role="alert">
                 Please Try Again....!   </div>';
  }
}
//
//BOOKING DETAILS

$sqlbook="SELECT * FROM tickets ";
$resultbook=mysqli_query($conn,$sqlbook);
$rowbook=mysqli_fetch_assoc($resultbook);
$numbook=mysqli_num_rows($resultbook);
$userid=$rowbook['user_id'];
$user=mysqli_query($conn,"SELECT name FROM registration WHERE user_id='$userid'");
$u=$user->fetch_row()[0];
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">
    <script src="js/bootstrap.min.js"></script>
    <style>
      #btn-back-to-top {
position: fixed;
bottom: 20px;
right: 20px;
display: none;
}
          .cont{
            height: 550px;
            width: 100%;

            
            
          }
          .content{
            width: auto;
            height: 320px;
            background-color: rgb(232, 243, 241);
          }
    </style>
</head>
<body>
          <section>
          <div class="row mt-md-4 container-fluid">
                    <div class="col-12 ml-4">
                        <section id="BOOKINGS" class="mt-md-3">
                            <div class="row pr-md-5 mt-3">
                                <h2>BOOKINGS <?php echo '('. $numbook .')';?></h2><p></p>
                            </div>
                            <div class="row">
                            <div class="table-responsive">
                                <table class="table  info">
                                    <tr class="bg-info">
                                        <th>BOOKING ID</th>
                                        <th>USER ID</th>
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

                                <a href='ticconfirm.php?id=",$rowbook['ticket_id'],"'><button class='btn btn-info'>Confirm</button></a>
                                                               
                                </td>
                                <td>

                                <a href='staffbookdelete.php?id=",$rowbook['ticket_id'],"'><button class='btn btn-danger'>Cancel</button></a>
                                                               
                                </td>
                                
                                </tr>
                                ";
                                
                                }
                                ?>
                                </table>
                            </div>
                            </div>

          </section>
                    </div>
          </div>
            <div class="row">
                <div class="col-md-3 col-1 "></div>
                <div class="col-md-6 col-10 pl-0 mt-md-4 mb-md-4 ">
                  <div class="row content">
                    <div class=" col-6 pl-md-0">
                      <img class="img-fluid"src="images/watermetro.jpg" alt="">

                    </div>
                    <div class="col-6  pr-md-3 pt-md-3">

                  
                    <div class="float-left">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="sel1">From</label>
                                <select id="start" name="Start" class="form-control" id="sel1">
                                    
                                <option>South Chittoor</option>
                                  <option>Edakochi</option>
                                <option>Embarkation(WI)</option>
                                  <option>Ernakulam</option>
                                  <option>Fort Kochi</option>
                                  <option>Kumbalam</option>
                                  
                                  <option>Mulavukadu Panchayath</option>
                                  
                                  
                                  
                                  <option>Ponnarimangalam</option>
                                  
                                  <option>Thanthonnithuruth</option>
                                  <option>Thevara</option>
                                  
                                  <option>Vypeen</option>
                                  
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="sel2">To</label>
                                <select id="end" name="End" class="form-control" id="sel1">
                                <option>South Chittoor</option>
                                  <option>Edakochi</option>
                                <option>Embarkation(WI)</option>
                                  <option>Ernakulam</option>
                                  <option>Fort Kochi</option>
                                  <option>Kumbalam</option>
                                  
                                  <option>Mulavukadu Panchayath</option>
                                  
                                  
                                  
                                  <option>Ponnarimangalam</option>
                                  
                                  <option>Thanthonnithuruth</option>
                                  <option>Thevara</option>
                                  
                                  <option>Vypeen</option>
                                  
                                </select>
                              </div>
                            <div class="form-group">
                              <div class="">
                                <input id="date" type="date" name="date" required>
                              </div>
                              <label class="text-dark">Time</label>
                              <select name="Time" id="time" >
                              <option>6:15 am</option>
                              <option>7:40 am</option>
                              <option>9:10 am</option>
                              <option>6:15 pm</option>
                              </select>
                            </div>
                            <div class="float-left">
                              <label for="">Tickets</label>
                              <select name="Number" id="tickets">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                              </select>
                            </div>
                          <div>
                            <input id="book" type="submit" name="Book" value="Book"  class="btn btn-default bg-primary float-right  text-white" onclick="ticketvalidate()">
                          </div>
                          </form>
                    </div>
                    </div>
                    <div></div>
                    
                  </div>
                  
                </div>

                </div>
                <div class="col-1 col-md-3"></div>

                </div>
              
            </div>
            </section>
            <button type="button" class="btn btn-outline-dark btn-floating btn-lg" id="btn-back-to-top">
  <i class="fas fa-arrow-up"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
</svg></i>
</button>
<div class="ml-5"><form action="logout.php"><input type="submit" class="btn btn-outline-danger " value="logout"></form></div>
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