<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "Pokedex";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");

// Switch to the created database
$conn->select_db($dbname);

// Create table info
$queryInfo = "CREATE TABLE IF NOT EXISTS info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

$conn->query($queryInfo);

?>