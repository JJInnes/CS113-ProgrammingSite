<?php
include 'ConnectionConfig.php';
include './Helpers/authHelper.php';
//print_r($_GET);
//echo '<br>';
//print_r($_POST);
//echo '<br>';

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
    echo "Valid user, logged in:\n";
    $user = $result->fetch_assoc();
    $token = createRawToken($user["Id"], $user["Username"], date("YmdHi"));
    echo implode(",", $token)."\n";
    $encodedToken = encodeToken($token);
    echo $encodedToken."\n";
    $decodedToken = decodeToken($encodedToken);
    echo implode(",", $decodedToken)."\n";
    //$token = generateToken();
    
} else {
    echo "FALSE";
}
$conn->close();

?>

