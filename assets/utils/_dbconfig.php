<?php
    $servername = "localhost"; // Replace with your server name or IP address
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $database = "kulkarni"; // Replace with the name of your database

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>