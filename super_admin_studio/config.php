<?php

session_start();

// database credentials
$host_name = "localhost";
$user_name = "root";
$db_password = "";
$db_name = "studio_db";

// create Connection
$conn = mysqli_connect($host_name,$user_name,$db_password,$db_name);

// Check Connection
if(!$conn){
    die("Database Connection Failed:" . mysqli_connect_error());
}

// Optionally set charset to utf8mb4 for better security

mysqli_set_charset($conn, "utf8mb4");

?>