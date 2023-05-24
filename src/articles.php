<?php
    //Set up variables
    $topic = "";
    $article = "";
    if (isset($_GET['topic']) and isset($_GET['article'])) {
        $topic = $_GET['topic'];
        $article = $_GET['article'];
    } else {
        throw new Exception("No ARTICLE OR TOPIC PROVIDED");
    }

    //Set up components
    $pageHead = fread(fopen("./Resources/Components/Shared/pagehead.html", "r"), filesize("./Resources/Components/Shared/pagehead.html"));
    $header = fread(fopen("./Resources/Components/Shared/header.html", "r"), filesize("./Resources/Components/Shared/header.html"));
    $header = str_replace("_TITLE_", $topic, $header);
    //$body = fread(fopen("./Resources/Components/Shared/pagehead.html", "r"), filesize("./Resources/Components/Shared/pagehead.html"));
    $footer = fread(fopen("./Resources/Components/Shared/footer.html", "r"), filesize("./Resources/Components/Shared/footer.html"));

    //Return Page
    echo "<!DOCTYPE html>";
    echo '<html lang="en">';

        echo $pageHead;

        echo "<body>";
            echo $header;

            //Internal body goes here
            //echo $body;

            echo $footer;
        echo "</body>";

    echo "</html>";
?>