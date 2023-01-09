<?php
include('connection.php');
$name=$_POST['name'];
$review=$_POST['Review'];
$getreview="INSERT INTO review(name,review) values('$name','$review')";
?>