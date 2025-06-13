<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$servername = "localhost"; // Keep this as localhost unless your hosting provider says otherwise
$username = "ucfpuartvseas"; // Replace with the correct username
$password = "nhfnfkrfzsjw"; // Replace with the correct password
$dbname = "db9gl9pdttvgyc"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
