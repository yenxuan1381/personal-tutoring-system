<?php

// initialse our connection info
// host name of the mySQL server
$host = "localhost";
// MySQL account username
$dbUsername = "root";
// MySQL account password
$dbPassword = "";
// Default schema
$dbname = "csv_db 15";
//Use date time in Malaysia
date_default_timezone_set("Asia/Kuala_Lumpur"); 
$date=date('F j, Y g:i:a');

// create a connection using the information above
$conn = new mysqli ($host,$dbUsername,$dbPassword,$dbname);

// check for connection error
if (!$conn)
{
    echo 'Connection error <br>';
    echo 'Error id:' . mysqli_connect_errno() . '<br>';
    echo 'Error message:' . mysqli_connect_error() . '<br>';
    die();
}

//error_reporting(0);
//$host = "files.000webhost.com";
//$dbUsername = "id15367782_g2a";
//$dbPassword = "<6Ob1ezfOD6uS4L<";
//$dbname = "id15367782_tutortutee";

?>
