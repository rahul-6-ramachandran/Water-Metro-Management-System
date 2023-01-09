<?php
session_start();
if(!isset($_SESSION["log"])){
  echo '<div class="alert alert-danger" role="alert">
  Session Expired...!   </div>';
echo '<script> window.location = "loginuser.php"; </script>';
}
else if($_SESSION["log"]!=0)
  {
    echo '<div class="alert alert-danger" role="alert">
    Session Expired...!   </div>';
  echo '<script> window.location = "loginuser.php"; </script>';
  } 


 require('header.php');
 if(isset($_POST['Book'])){
  $date=$_POST['date'];
  $start=$_POST['Start'];
  $End=$_POST['End'];
  $Time=$_POST['Time'];
  $Tickets=$_POST['Number'];
  $userid=$_SESSION["UserId"];
  $totalprice=20*$Tickets;
  $flag="No";
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
           BOOKING SUCCESSFULL for ID  '.$ticketid.' ....Kindly Keep The ID For Confirmation at Terminal</div>';
           
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

        <section>
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
            <section>
              <div class="row text-center container fixed-bottom mb-2">
              <div class="col-3"><a href="#review"><button type="button" class="btn btn-primary ">Reviews</button></a>
              <a href="index.php"><button type="button" class="btn btn-primary ml-2">Notices</button></a></div>
              <div class="col-7"></div>
              <div class="col-2">
              <div class="ml-5"><form action="logout.php"><input type="submit" class="bg-info " value="logout"></form></div>
              </div>
            </section>
            <section id="review">
              <div class="row mt-md-5">
                <div class="col-md-3"></div>'
                <div class="col-md-6 text-center">
                  <h5 class="text-info">Reviews</h5>
              <form method="POST" class="text-left">
                <div class="form-group">
                  <label >Name</label>
                  <input type="text" class="form-control" name="name" placeholder="fullname">
                </div>
                <div class="form-group">
                  <label>Review</label>
                  <input type="textarea" class="form-control" name="Review" rows="3">
                </div>
                <div >
                 <a href="review.php"><button type="submit" name="revsub"  class="bg-primary">Send</button>
                </div>
              </form> 
              </div>
              </div>
              <div class="col-md-3"></div>
            </section>
            <script type="text/javascript">
              var start = document.getElementById('start')
              var end = document.getElementById('end')
              var time = document.getElementById('time')
              var ticketno = document.getElementById('tickets')
               function ticketvalidate(){
                if((start=='')||(end=='')||(time=='')||(ticketno=='')){
                  alert('PLEASE FILL ALL THE FORMS')
                  return false;
                }
                if(start==end){
                  alert("Please Select a different location")
                  return false
                }
              }
            </script>
</body>
</html>
