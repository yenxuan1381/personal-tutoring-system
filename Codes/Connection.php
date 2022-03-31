<?php

// initialse our connection info
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "csv_db 15";
date_default_timezone_set("Asia/Kuala_Lumpur"); //Use date time in Malaysia
$date=date('F j, Y g:i:a');

// create a connection using the information above
$conn = new mysqli ($host,$dbUsername,$dbPassword,$dbname);

//error_reporting(0);
//$host = "files.000webhost.com";
//$dbUsername = "id15367782_g2a";
//$dbPassword = "<6Ob1ezfOD6uS4L<";
//$dbname = "id15367782_tutortutee";

?>
