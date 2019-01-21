<?php 
$host = "localhost";
$userName = "oceanpla_eatery";
$password = "james@1234";
$database = "oceanpla_eatery";

// Create connection
// $conn = new mysqli($servername, $userName, $password, $dbname);
$conn = new mysqli($host, $userName, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

?>