<?php
require("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routes</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        table{
            
            border-color:black ;
            border-width: 5px;
            background-color: rgb(249, 203, 255);
            
            
        }
    </style>
</head>
<body>

    <section>
        <div class="row">
            <div class="col-2 col-md-3">
                
            </div>
            <div class="col-8 col-md-6 text-center">
                    <img src="images/routes.png" style="border-radius: 10px; max-width: 250px" alt="">
            </div>
            <div class="col-2 col-md-3">

            </div>

        </div> 
    </section>
    <section>
     <div class="container">
        <div class="row mt-md-5 mb-md-3">
            <div class="col-md-3"></div>
            <div class="col-md-6">
        <table class="text-center">
        <tr>
             <th>Route No</th>
             <th>Starting</th>
             <th>Ending</th>
             <th>Terminals</th>
             <th>Length</th>
             <th>Places</th>
        </tr>
        <?php
        // $sql="SELECT * FROM routes";
        // $result = $conn->query($sql);
// if ($result->num_rows>0) {
//    while ($row =$result->fetch_assoc()) {
    // $temp =json_decode($row['places'], TRUE);
    
    // $places = $temp['places'];
    // $len = sizeof($temp);
    // echo "<tr>
    // <td>".$row['routeno']."</td>
    // <td>".$row['startpoint']."</td>
    // <td>".$row['endpoint']."</td>
    // <td>".$row['jetties']."</td>
    // <td>".$row['length(km)']."</td>";
    
    // for($i=0;$i<$len;$i++){

        // echo  "<td>".$places[$i]."</td>";}
// "</tr>";

//    } 
          
// }
         for($rno=1;$rno<=16;$rno++){
             $Result=mysqli_query($conn,"SELECT * FROM routes Where routeno='$rno'");
             $GetRoutes=mysqli_fetch_array($Result);
           $Start=$GetRoutes['startpoint'];
             $End=$GetRoutes['endpoint'];
             $Jetties=$GetRoutes['jetties'];
             $Length=$GetRoutes['length(km)'];
             echo "<tr>
                     <td>".$rno."</td>
                     <td>".$Start."</td>
                     <td>".$End."</td>
                     <td>".$Jetties."</td>
                     <td>".$Length."</td>
                 </tr>";
             }
        ?>
            
            </div>
            <div class="col-md-3"></div>
        </div>
    </section>


  
</body>
</html>