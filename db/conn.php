<?php
$servername = "localhost";
$username = "u216861206_formSoft";
$password = "Tc5j~94$";
$db = "u216861206_formSoft";


// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>