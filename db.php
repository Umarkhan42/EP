<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fdmlogin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die ("Connection failed: " . $conn->connect_error);
}
?>
<!-- 
// Establish a connection to the MySQL database
        $servername = "127.0.0.1";
        $username = "root";
        $password = "root";
        $dbname = "ecs417";

        // Creates connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Checks connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } -->