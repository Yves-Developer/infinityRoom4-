<?php
include_once "config.php";
session_start();
if (isset($_SESSION['uniq_id'])){
    echo "<b style='font-style:italic'>Write your name after writing your message because there many things that are not added on!</b>";
    $output ="";
	$outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
    $sql = mysqli_query($conn,"SELECT * FROM messages WHERE outgoing_msg_id = {$outgoing_id} AND incoming_msg_id != {$outgoing_id} OR outgoing_msg_id != {$outgoing_id} AND incoming_msg_id = {$outgoing_id}");
    if (mysqli_num_rows($sql) > 0) {
        while ($row = mysqli_fetch_assoc($sql)) { 
       // $sql1 = mysqli_query($conn,"SELECT usr_name FROM Reg_Log_info LEFT JOIN messages ON Reg_Log_info.uniq_id = messages.incoming_msg_id");
       // $row4 = mysqli_fetch_assoc($sql1); 
        if ($row['outgoing_msg_id'] === $outgoing_id) {### Sender
                $output .="<div class='message my-message'><p><b></b>".$row['msg']."</p></div>";  
        }
        else {##### Receiver

        $output .="<div class='message other-message'><p><b></b>".$row['msg']."</p></div>";

        }
    }
}
      echo $output;
}
else {
    header("location:../Login/Login.php");
}
?>