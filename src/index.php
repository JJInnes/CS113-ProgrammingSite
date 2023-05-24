<?php
    include "./Resources/helper.php";

    //Set up variables

    //Set up components
    $pageHead = getComponent("./Resources/Components/Shared/pagehead.html");

    $header = getComponent("./Resources/Components/Shared/header.html");
    $header = str_replace("_TITLE_", "Learn to make websites!!", $header);

    $body = getComponent("./Resources/Components/indexMain.html");

    $footer = getComponent("./Resources/Components/Shared/footer.html");
    

    //Return Page
    echo "<!DOCTYPE html>";
    echo '<html lang="en">';

        echo $pageHead;

        echo "<body>";
            echo $header;

            //Internal body goes here
            echo $body;

            echo $footer;
        echo "</body>";

    echo "</html>";
?>