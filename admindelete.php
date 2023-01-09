<?php
include("connection.php");
$id=$_GET['id'];
$sql="delete FROM registration WHERE user_id=$id ";
mysqli_query($conn,$sql);
echo '<script> window.location = "Adminacc.php"; </script>';
?>
