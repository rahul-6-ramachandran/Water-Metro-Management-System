<?php
include("connection.php");
$id=$_GET['id'];
$sql="delete FROM tickets WHERE ticket_id=$id ";
mysqli_query($conn,$sql);
echo '<script> window.location = "Staffacc.php"; </script>';
?>