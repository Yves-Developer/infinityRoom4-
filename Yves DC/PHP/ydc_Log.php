<?php
   session_start();
   include_once "config.php";
   $un = mysqli_real_escape_string($conn,$_POST['un']);
   $pass = mysqli_real_escape_string($conn,$_POST['pass']);

   #Testing For User input
   if (empty($un) && empty($pass)) {
      echo "[*] All inputs are required!";
   }
   else {
      #Checking if user entered info matches with thT ONE IN DB
      $sql = mysqli_query($conn,"SELECT * FROM Reg_Log_info WHERE usr_name='{$un}' AND pass = '{$pass}'");
      if (mysqli_num_rows($sql) > 0) {
         $row = mysqli_fetch_assoc($sql);
         $_SESSION['uniq_id'] = $row['uniq_id'];//we will use it in other php files
         echo "success! [*]";         
      }
      else {
         echo "User Name or Password is incorrect!";
      }
   }
   ?>