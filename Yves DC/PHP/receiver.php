<?php
session_start();
include_once "config.php";
//include_once "data.php";
if (isset($_SESSION['uniq_id'])) {
    $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming_id']); 
     $output ="";     
  
}
else {
    header('../Login/Login.php');
}
        
?>