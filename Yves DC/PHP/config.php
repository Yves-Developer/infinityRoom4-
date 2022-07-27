<?php

//Db Connection
$conn = mysqli_connect("localhost","root","","ydc_db");
if(!$conn){
    echo "Database not connected".mysqli_connect_error();

}

?>