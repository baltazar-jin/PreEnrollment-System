<?php
$host = "localhost";
$port = "3307"; // use "3306" if default
$user = "root";
$pass = "";
$dbname = "preenrollment_db";

$conn = new mysqli("$host:$port", $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
