<?php
   session_start();
   include_once "config.php";
   $fn = mysqli_real_escape_string($conn,$_POST['fn']);
   $sn = mysqli_real_escape_string($conn,$_POST['sn']);
   $un = mysqli_real_escape_string($conn,$_POST['un']);
   $pass = mysqli_real_escape_string($conn,$_POST['pass']);
   $cpass = mysqli_real_escape_string($conn,$_POST['cpass']);
    #Getting User After data insertation
    $sql = mysqli_query($conn,"SELECT usr_name FROM Reg_Log_info WHERE usr_name ='{$un}'");
   if (empty($fn) && empty($sn) && empty($un) && empty($pass) && empty($cpass)) {
    echo "[*] All input are required!";
   }
   elseif (strlen($pass) < 8) {
      echo "[*] Password must contain atleast 8 character";
   }
   elseif ($pass != $cpass) {
      echo "[*] Password not match!";
   }
   #Checking if uSer is already exist
   elseif(mysqli_num_rows($sql) > 0) {
          echo "User Name .$un. is taken by other!";
          } 
   else {
    $random_id = rand(time(),10000000);
         //let us insert all user info in datbase
         $sql1 = mysqli_query($conn,"INSERT INTO Reg_Log_info (uniq_id,fname,adname,usr_name,pass) VALUES ('{$random_id}','{$fn}','{$sn}','{$un}','{$pass}')");
         if ($sql1) {
            $sql2 = mysqli_query($conn,"SELECT * FROM Reg_Log_info WHERE usr_name ='{$un}'");
            if (mysqli_num_rows($sql2) > 0) {
               $row = mysqli_fetch_assoc($sql2);
               $_SESSION['uniq_id'] = $row['uniq_id'];//we will use it in other php files
               echo "success! [*]";
            }
   }
}

?>