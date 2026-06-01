<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "createmyresume_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    // Database not connected yet.
    // Later this will be used when MySQL database is created.
}

?>