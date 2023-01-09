<?php
require('connection.php');
$delete="DELETE * FROM notices";
mysqli_query($conn,$delete);
?>