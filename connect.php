<?php

$hostname = "localhost";
$username = "root";
$password = "1200secs";
$db = "acacell members";

$link = mysqli_connect($hostname , $username , $password , $db);
if (!$link) {
    # code...
    die('could not connect'. mysql_error());
}
else{
    //echo "Connection succesful";
}

?>
