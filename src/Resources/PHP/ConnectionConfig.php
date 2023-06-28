<?php
$servername = "devweb2022.cis.strath.ac.uk";
$username = "abc12345";
$password = "xxx";
$dbname = "abc12345";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>