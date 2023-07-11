<?php
    include "./Resources/PHP//Helpers/renderHelper.php";

    //Set up variables

    //Set up components
    $pageHead = getComponent("./Resources/Components/Shared/pagehead.html");

    $header = getComponent("./Resources/Components/Shared/header.html");

    $body = getComponent("./Resources/PHP/register.php");   
    // $body = getComponent("./Resources/Components/RegisterForm.html");


    $footer = getComponent("./Resources/Components/Shared/footer.html");
    
    $pageHead = str_replace("__PLACEHOLDER__", "LearnWebDev", $pageHead);

    //Return Page
    returnPage($pageHead, $header, $body, $footer);
?>