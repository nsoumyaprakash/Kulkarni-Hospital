<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "kulkarni";

    error_reporting(0);

    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    if (!$conn) {
        die('Failed to connect: ' . mysql_error());
        exit();
    }
    
    mysqli_set_charset($conn, 'utf8');
?>