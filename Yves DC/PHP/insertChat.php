<?php
session_start();
if (isset($_SESSION['uniq_id'])) {
  include_once "config.php";
  $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
  $message = mysqli_real_escape_string($conn,$_POST['msg']);
  $k = 0;
  $inc_ids = array();
  $sql1 = mysqli_query($conn,"SELECT uniq_id FROM Reg_Log_info WHERE uniq_id !={$outgoing_id}");
  if (mysqli_num_rows($sql1) > 0) {
    while ($row1 = mysqli_fetch_assoc($sql1)) {
     $k++; 
      $inc_ids[$k] = $row1['uniq_id'];
    if ($k == 1) {
      $sql = mysqli_query($conn,"INSERT INTO messages (outgoing_msg_id,incoming_msg_id,msg) VALUES ({$outgoing_id},{$inc_ids[$k]},'{$message}')");     
    } else {
      $sql = mysqli_query($conn,"INSERT INTO messages (incoming_msg_id,msg) VALUES ({$inc_ids[$k]},'{$message}')");
    }
    
    }
  }
 echo "Success";
//
}
else {
    header("location:./Login/index.php");
}
?>