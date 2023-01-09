<?php
require('connection.php');
session_start();
if($_SESSION['log']==0){
    echo '<script> window.location = "loginuser.php"; </script>';
}else{
    echo '<script> window.location = "Useracc.php"; </script>'; 
}