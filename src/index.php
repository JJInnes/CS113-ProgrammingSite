<?php
    include "./Resources/helper.php";

    //Set up variables

    //Set up components
    $pageHead = getComponent("./Resources/Components/Shared/pagehead.html");

    $header = getComponent("./Resources/Components/Shared/header.html");

    $body = getComponent("./Resources/Components/indexMain.html");

    $footer = getComponent("./Resources/Components/Shared/footer.html");
    

    //Return Page
    returnPage($pageHead, $header, $body, $footer);
?>