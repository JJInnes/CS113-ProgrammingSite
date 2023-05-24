<?php
    //Set up variables

    //Set up components
    $pageHead = fread(fopen("./Resources/Components/Shared/pagehead.html", "r"), filesize("./Resources/Components/Shared/pagehead.html"));
    $header = fread(fopen("./Resources/Components/Shared/header.html", "r"), filesize("./Resources/Components/Shared/header.html"));
    $header = str_replace("_TITLE_", "Become a Web Dev!!", $header);
    $body = fread(fopen("./Resources/Components/indexMain.html", "r"), filesize("./Resources/Components/indexMain.html"));
    $footer = fread(fopen("./Resources/Components/Shared/footer.html", "r"), filesize("./Resources/Components/Shared/footer.html"));

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