<?php
include 'ConnectionConfig.php';
include './Helpers/authHelper.php';
include './Helpers/renderHelper.php';

$message = "";


$emailAddress = strip_tags(isset($_POST["emailaddress"]) ? $_POST["emailaddress"] : "");
$registerusername = strip_tags(isset($_POST["username"]) ? $_POST["username"] : "");
$password = strip_tags(isset($_POST["password"]) ? $_POST["password"] : "");

if (!validateEmail($emailAddress)) {
    $message = "Email Address does not follow correct syntax.";
}else{
    $checkIfDetailsTaken = false;

    $checkIfDetailsTaken = checkRegisterDetails($registerusername,$emailAddress);

    if($checkIfDetailsTaken == true){
        $message = "These credentials are available!";
        createNewUser($registerusername,$emailAddress,$password);

        //PASS AUTHENTICATED USER DETAILS TO HOME PAGE HERE

    }else{
        $message = "These credentials are not available.";
    }
}



function validateEmail($emailAddress) {
    $pattern = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
    return preg_match($pattern, $emailAddress);
}

?>
<!-- <form action="<?php //echo htmlspecialchars($_SERVER['PHP_SELF']);?>" role ="form" method="post" class="panel loginForm">  -->

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" role ="form" method="post" class="panel loginForm">
    <h4>Register:</h4>
    
    <h4><?php echo $message; ?></h4>
    <p>Email Address: <input type = "text" name="emailaddress" placeholder="Email Address"></p>
    <p>Username: <input type = "text" name="username" placeholder="Username"></p>
    <p>Password: <input type = "password" name="password" placeholder="Password"></p>
    <br>
    <button type = "submit">Submit</button>

</form>





