<?php
include 'ConnectionConfig.php';
include './Helpers/authHelper.php';
include './Helpers/renderHelper.php';

$message = "";


if(isset($_POST['submit'])){
    $emailAddress = strip_tags($_POST['emailaddress']);
    $registerusername = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

}

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

<form action="" role ="form" method="post" class="panel loginForm">
    <h4>Register:</h4>
    
    <h4><?php echo $message; ?></h4>
    <p>Email Address: <input type = "text" name="emailaddress" placeholder="Email Address"></p>
    <p>Username: <input type = "text" name="username" placeholder="Username"></p>
    <p>Password: <input type = "password" name="password" placeholder="Password"></p>
    <br>
    <button type = "submit" name = "submit">Submit</button>

</form>





