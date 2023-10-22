<?php

    $servername = "localhost"; // Change to your database host if necessary
    $username = "root"; // Change to your database username
    $password = ""; // Change to your database password
    $database = "lelang"; // Change to your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
