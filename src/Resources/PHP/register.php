<?php
include 'ConnectionConfig.php';
include './Helpers/authHelper.php';
include './Helpers/renderHelper.php';

$message = "";


$emailAddress = strip_tags(isset($_POST['emailaddress']) ? $_POST["emailaddress"] : "");
$registerusername = strip_tags(isset($_POST["username"]) ? $_POST["username"] : "");
$password = strip_tags(isset($_POST["password"]) ? $_POST["password"] : "");

if($emailAddress==="" or $registerusername==="" or $password===""){
    echo '<script type="text/javascript">';
    echo ' alert("Fields cannot be blank!")';
    echo '</script>';
    header('Refresh: 0; URL=../../RegisterForm.php');
}else{
    if (!validateEmail($emailAddress)) {

        echo '<script type="text/javascript">';
        echo ' alert("Email Address does not follow correct syntax.")';
        echo '</script>';
        header('Refresh: 0; URL=../../RegisterForm.php');

    }else{
        $checkIfDetailsTaken = false;

        $checkIfDetailsTaken = checkRegisterDetails($registerusername,$emailAddress);

        if($checkIfDetailsTaken == true){
            $message = "These credentials are available!";
            createNewUser($registerusername,$emailAddress,$password);

            //REDIRECT TO LOGIN PAGE HERE
            echo '<script type="text/javascript">';
            echo ' alert("Account created successfully!")';
            echo '</script>';
            header('Refresh: 0; URL=../../loginForm.php');
        }else{
            

            echo '<script type="text/javascript">';
            echo ' alert("These credentials are not available.")';
            echo '</script>';
            header('Refresh: 0; URL=../../RegisterForm.php');
        }
    }
}


function validateEmail($emailAddress) {
    $pattern = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
    return preg_match($pattern, $emailAddress);
}






?>
