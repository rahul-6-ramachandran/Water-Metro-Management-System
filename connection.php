<?php
   $host="localhost";
   $user="root";
   $password="";
   $db="water_metro";
   $conn=mysqli_connect($host,$user,$password,$db);
   if($conn){
   	echo "";
   }else{
   	die("Can't Connect To The Server");
   }
?>