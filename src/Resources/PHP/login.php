<?php
include 'ConnectionConfig.php';
include './Helpers/authHelper.php';

$username = strip_tags(isset($_POST["username"]) ? $_POST["username"] : "");
$password = strip_tags(isset($_POST["password"]) ? $_POST["password"] : "");

if($username===""){
    echo "Username cannot be blank";
}

echo '<br>';

if($password==="")
{
    echo "Password cannot be blank";
}
echo "<br>";
$sql = "SELECT * FROM `CS113Proj_Users` WHERE Username = '$username' AND Password = '$password';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "LoggedIn";
    $user = $result->fetch_assoc();
    $token = generateToken($user["Id"], $user["Username"], date("YmdHi"));
    echo "<script>document.cookie = 'authToken=$token;path=/;Max-Age=3600;';</script>";
    
} else {
    echo "Failed to log in";
}
$conn->close();

echo '<meta http-equiv="refresh" content="0;url=../../index.php">';
?>