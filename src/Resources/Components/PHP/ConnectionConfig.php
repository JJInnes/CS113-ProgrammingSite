<?php
$servername = "devweb2022.cis.strath.ac.uk";
$username = "qsb22117";
$password = "xxxxxx";
$dbname = "qsb22117";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<h1>Connected successfully</h1>";
?>