<?php

$hostname = "localhost";
$dBUser = "root";
$dBPassword = "";
$dBName = "user_details";
$conn = mysqli_connect($hostname, $dBUser, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
?>