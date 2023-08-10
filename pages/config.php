<?php 
session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "email_verification";

$conn = mysqli_connect($hostname, $username, $password, $databasename);

if($conn) {
    // echo "Connection Successful";
} else {
    $conn_error = mysqli_connect_error();
    echo "Connection Failed: $conn_error";
}