<?php
include("connection.php");
$id=$_GET['id'];
$verified="Yes";
$sql="UPDATE tickets SET verified ='$verified' WHERE ticket_id='$id'";
mysqli_query($conn,$sql);
echo '<script> window.location = "Staffacc.php"; </script>';
?>