<?php
		include_once "./config.php";
        $output ="";
		#$usr_id = mysqli_query($conn,$_GET['uniq_id']) ;
		$sql = mysqli_query($conn,"SELECT * FROM Reg_Log_info");
        if (mysqli_num_rows($sql) > 0) {
            while($row = mysqli_fetch_assoc($sql)) {
                    $output .= "<div>
                                <a href='index.php?user_id=".$row['uniq_id']."' style='text-decoration: none;color: #000;'>".$row['usr_name']."</a>
                                </div>";
                            
            }
        }
        
        echo $output;
		 ?>