<?php
$host = "127.0.0.1";  // or "localhost"
$port = 3307;         // your MySQL port
$username = "root";   // or your actual MySQL user
$password = "";       // leave empty if no password
$dbname = "preenrollment_db";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
